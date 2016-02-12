<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Aws\Sns\SnsClient;

class SnsCommand extends ContainerAwareCommand
{
    /**
     * @var \Aws\Sns\SnsClient
     */
    private $client;
    /**
     * @var OutputInterface
     */
    private $output;

    protected function configure()
    {
        $this
            ->setName('sns')
            ->setDescription('Debug sending of push notification with amazon SNS')
            ->addOption(
                'list-android',
                null,
                InputOption::VALUE_NONE,
                'List of endpoints for android'
            )->addOption(
                'list-ios',
                null,
                InputOption::VALUE_NONE,
                'List of endpoints for ios'
            )->addOption(
                'delete',
                null,
                InputOption::VALUE_NONE,
                'Delete endpoint'
            )->addArgument(
                'endpoint',
                InputArgument::OPTIONAL, 'Send notification to specified endpoint'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        $this->client = $client = SnsClient::factory(array(
            'key'    => $this->getContainer()->getParameter('amazon_s3.key'),
            'secret' => $this->getContainer()->getParameter('amazon_s3.secret'),
            'region' => $this->getContainer()->getParameter('amazon_s3.region')
        ));

        if ($input->getOption('list-android')) {
            $this->showEndpoints(
                $this->getContainer()->getParameter('amazon_sns.android_arn'),
                'List of GCM endpoints:'
            );
        }

        if ($input->getOption('list-ios')) {
            $this->showEndpoints($this->getContainer()->getParameter('amazon_sns.ios_arn'), 'List of APNS endpoints:');
        }

        $endpoint = $input->getArgument('endpoint');

        if ($endpoint) {
            if ($input->getOption('delete')) {
                $output->writeln('<comment>Delete endpoint</comment>');
                $client->deleteEndpoint(array(
                    'EndpointArn' => $endpoint
                ));
            } else {
                $testMessage = 'Test notification';
                try {
                    $client->publish(array(
                        'TargetArn' => $endpoint,
                        'MessageStructure' => 'json',
                        'Message' => json_encode(array(
                            'APNS' => json_encode(array('aps' => array('alert' => $testMessage))),
                            'GCM' => json_encode(array('data' => array('message' => $testMessage)))
                        ))
                    ));
                } catch (\Aws\Sns\Exception\SnsException $e) {
                    $output->writeln("<error>{$e->getMessage()}</error>");
                }
            }
        }
    }

    private function showEndpoints($platformArn, $title = 'List of endpoints:')
    {
        $result = $this->client->listEndpointsByPlatformApplication(array(
            'PlatformApplicationArn' =>  $platformArn
        ));
        $output = $this->output;
        $output->writeln("<comment>{$title}</comment>");
        foreach ($result['Endpoints'] as $endpoint) {
            $output->writeln($endpoint['EndpointArn']);
            $output->writeln("<info>CustomUserData:</info> {$endpoint['Attributes']['CustomUserData']}");
            $output->writeln("<info>Enabled:</info> {$endpoint['Attributes']['Enabled']}");
        }
    }
}
