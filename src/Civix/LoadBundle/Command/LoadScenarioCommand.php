<?php
namespace Civix\LoadBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

class LoadScenarioCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $parts = [
            'users',
            'followers',
            'districts',
            'userdistrict',
            'strepresentatives',
            'representatives',
            'groups',
            'usergroups',
            'questions',
            'petitions',
            'comments',
            'micropetitions',
            'socialActivities',
        ];
        
        $this
            ->setName('load:scenario')
            ->setDescription('Load fake date for load testing')
            ->addOption(
                '10000',
                null,
                InputOption::VALUE_NONE,
                'If set, loading scenario with 10000 users'
            )
            ->addOption(
                '100000',
                null,
                InputOption::VALUE_NONE,
                'If set, loading scenario with 100000 users'
            )
            ->addOption(
                '1000000',
                null,
                InputOption::VALUE_NONE,
                'If set, loading scenario with 1000000 users'
            )
            ->addOption(
                'append',
                null,
                InputOption::VALUE_NONE,
                'If set, load scenarios without drop'
            )
            ->addOption(
                'part',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'If set, load scenarios partially (users, followers, districts, userdistrict,'.
                ' strepresentatives, representatives, groups, usergroups, comments, micropetitions, socialActivities)',
                $parts
            );
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $resourcePath = 'src/Civix/LoadBundle/Resources/scenarios/';
        $tokensOutput = 'src/Civix/LoadBundle/Resources/jmeter/';
        $generateScenario = $resourcePath. 'generateScenario.sql';
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $dataGenerator = $this->getContainer()->get('civix_load.generator');
        $executeTime = 0;
        $timeStart = microtime(true);

        $optionsValues = ['10000', '100000', '1000000'];
        $scenarios = [
            '10000' => [
                'users' => 10000,
                'representative' => 100,
                'st_representative' => 300,
                'groups' => 100,
                'districts' => 20,
                'userdistricts' => 5,
                'followers' => 5,
                'questions' => 300,
                'petitions' => 300,
                'comments' => 100,
                'micropetitions' => 1000,
                'socialActivities' => 10,
            ],
            '100000' => [
                'users' => 100000,
                'representative' => 300,
                'st_representative' => 3000,
                'groups' => 300,
                'districts' => 40,
                'userdistricts' => 5,
                'followers' => 10,
                'questions' => 3000,
                'petitions' => 3000,
                'comments' => 300,
                'micropetitions' => 10000,
                'socialActivities' => 30,
            ],
            '1000000' => [
                'users' => 1000000,
                'representative' => 500,
                'st_representative' => 5000,
                'groups' => 500,
                'districts' => 70,
                'userdistricts' => 5,
                'followers' => 10,
                'questions' => 30000,
                'petitions' => 30000,
                'comments' => 500,
                'micropetitions' => 100000,
                'socialActivities' => 100,
            ]
        ];
        
        if (!$input->getOption('append')) {
            //truncate database
            $dropArguments = array(
                'command' => 'doctrine:schema:drop',
                '--force' => true
            );
            $createArgument = array(
                'command' => 'doctrine:schema:create'
            );
            
            $inputDrop = new ArrayInput($dropArguments);
            $inputCreate = new ArrayInput($createArgument);

            $command = $this->getApplication()->find('doctrine:schema:drop');
            $command->run($inputDrop, $output);

            $command = $this->getApplication()->find('doctrine:schema:create');
            $command->run($inputCreate, $output);
        }

        foreach ($optionsValues as $scenarioNumber) {
            if ($input->getOption($scenarioNumber)) {
                $tokensFile = $tokensOutput. 'tokens'.$scenarioNumber.'.csv';

                $output->writeln('Try to load scenario with '. $scenarioNumber . ' users');
                
                //generate
                if (isset($scenarios[$scenarioNumber])) {
                     //stop logging
                    $this->getContainer()
                        ->get('doctrine')
                        ->getConnection()
                        ->getConfiguration()
                        ->setSQLLogger(null);

                    $scenarioConfig = $scenarios[$scenarioNumber];

                    $connection = $entityManager->getConnection();
                    $connection->beginTransaction();
                    $connection->query('SET FOREIGN_KEY_CHECKS=0');

                    $this->runGenerator($scenarioConfig, $input->getOption('part'), $dataGenerator, $output);

                    $connection->query('SET FOREIGN_KEY_CHECKS=1');
                    $connection->commit();
                }

                //generate activities
                $this->generateActivity($generateScenario, $entityManager);

                //generate tokens for jmeter
                $this->getTokensForJmeter($tokensFile, $entityManager);
            }
        }

        $executeTime = microtime(true) - $timeStart;
        $output->writeln('Loading complete. Execute time = '.$executeTime. ' seconds');
    }

    private function getTokensForJmeter($csvFile, $entityManager)
    {
        $connection = $entityManager->getConnection();
        $tokens = $connection->fetchAll('SELECT token FROM `user` Limit 500');
        $csvHandle = fopen($csvFile, 'w');
        
        if ($csvHandle) {
            foreach ($tokens as $singleRowToken) {
                fputcsv($csvHandle, array_values($singleRowToken));
            }
            fclose($csvHandle);
        }
    }

    private function generateActivity($scenarioFile, $entityManager)
    {
        $connection = $entityManager->getConnection();
        $sqlQueries = file_get_contents($scenarioFile);
        $connection->executeQuery($sqlQueries);

    }

    private function runGenerator($scenarioConfig, $parts, $dataGenerator, $output)
    {
        foreach ($parts as $part) {
            $methodName = 'generate'. ucfirst($part);
            if (method_exists($dataGenerator, $methodName)) {
                $dataGenerator->$methodName($scenarioConfig);
                $output->writeln('Generation of '. $part .' is completed.');
            }
        }
    }
}
