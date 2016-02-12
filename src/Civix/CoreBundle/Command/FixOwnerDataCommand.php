<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;

use Civix\CoreBundle\Entity\Activity;

class FixOwnerDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('fix:activity:owner-data')
            ->setDescription('Set activity owner data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $em EntityManager */
        $em = $this->getContainer()->get('doctrine')->getManager();

        $activities = $em->getRepository(Activity::class)->findAll();

        /* @var $activity Activity */
        foreach ($activities as $activity) {
            if ($activity->getSuperuser()) {
                $activity->setSuperuser($activity->getSuperuser());
            }
            if ($activity->getGroup()) {
                $activity->setGroup($activity->getGroup());
            }
            if ($activity->getRepresentative()) {
                $activity->setRepresentative($activity->getRepresentative());
            }
            if ($activity->getUser()) {
                $activity->setUser($activity->getUser());
            }
            $output->writeln(json_encode($activity->getOwner()));
        }
        $em->flush();
    }
}