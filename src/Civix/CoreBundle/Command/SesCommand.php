<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Aws\Ses\SesClient;
use \Aws\Ses\Exception\SesException;

class SesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ses')
            ->setDescription('Debug sending emails with amazon SES')
            ->addArgument(
                'email',
                InputArgument::REQUIRED, 'destination'
            )->addArgument(
                'subject',
                InputArgument::REQUIRED, 'Email subject'
            )->addArgument(
                'message',
                InputArgument::REQUIRED, 'Text message'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $client SesClient */
        $client = $this->getContainer()->get('aws_ses.client');
        $params = array(
            'Source' => $this->getContainer()->getParameter('mailer_from'),
            'Destination' => array(
                'ToAddresses' => array($input->getArgument('email'))
            ),
            'Message' => array(
                'Subject' => array(
                    'Data' => $input->getArgument('subject'),
                ),
                'Body' => array(
                    'Text' => array(
                        'Data' => $input->getArgument('message')
                    )
                ),
            )
        );

        try {
            $client->sendEmail($params);
        } catch (SesException $e) {
            $output->writeln("<error>{$e->getMessage()}</error>");
        }
    }
}
