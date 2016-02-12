<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Entity\Notification;

class SnsMigrateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('sns-migrate')
            ->setDescription('Create amazon SNS endpoints for current users');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $notification \Civix\CoreBundle\Service\Notification */
        $notification = $this->getContainer()->get('civix_core.notification');
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $users = $em->getRepository('CivixCoreBundle:User')->findAll();
        /* @var $user \Civix\CoreBundle\Entity\User */
        foreach ($users as $user) {
            if ($user->getAndroidDevice()) {
                $endpoint = new Notification\AndroidEndpoint();
                $endpoint->setToken($user->getAndroidDevice())
                    ->setUser($user)
                ;
                $notification->handleEndpoint($endpoint);
                $output->writeln("<comment>Added android endpoint for user:</comment> {$user->getUsername()}");
            }
            if ($user->getIosDevice()) {
                $endpoint = new Notification\IOSEndpoint();
                $endpoint->setToken($user->getIosDevice())
                    ->setUser($user)
                ;
                $notification->handleEndpoint($endpoint);
                $output->writeln("<comment>Added ios endpoint for user:</comment> {$user->getUsername()}");
            }
        }
    }
}
