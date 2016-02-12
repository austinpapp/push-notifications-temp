<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Entity\Representative;
use Doctrine\ORM\EntityManager;

class CiceroSynchCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cicero:synch')
            ->setDescription('Synchronize data of representative storage from Cicero API (Check exists)')
            ->addOption(
                'records',
                null,
                InputOption::VALUE_REQUIRED,
                'How many records of representative should be synchronized with cicero api? (Default 1000)',
                1000
            )
            ->addOption(
                'state',
                null,
                InputOption::VALUE_OPTIONAL,
                'Update only representative in state'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $entityManager EntityManager */
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        if ($input->getOption('state')) {
            $representatives = $entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                ->findSTRepresentativeByState($input->getOption('state'));
        } else {
            $representatives = $entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                ->findSTRepresentativeByUpdatedAt(new \DateTime(), $input->getOption('records'));
        }

        /** @var $storageRepresentative \Civix\CoreBundle\Entity\RepresentativeStorage */
        foreach ($representatives as $storageRepresentative) {
            $output->writeln(
                'Checking '.$storageRepresentative->getFirstName().' '.$storageRepresentative->getLastName()
            );

            $isUpdated = $this->getContainer()->get('civix_core.representative_storage_manager')
                ->synchronizeRepresentative($storageRepresentative);
            
            if (!$isUpdated) {
                $output->writeln(
                    '<error>'.$storageRepresentative->getFirstName().' '.
                    $storageRepresentative->getLastName().' is not found and will be removed</error>'
                );
            }
        }
        $output->writeln('Synchronization is completed');
    }
}
