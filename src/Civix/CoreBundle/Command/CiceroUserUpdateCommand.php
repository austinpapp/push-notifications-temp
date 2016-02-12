<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\District;

class CiceroUserUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cicero:update:user')
            ->setDescription('Update data of representative from Cicero API.')
            ->addArgument('user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userManager = $this->getContainer()->get('civix_core.user_manager');
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->getRepository('CivixCoreBundle:User')
            ->find($input->getArgument('user'));

        $userManager->updateDistrictsIds($user);

        $entityManager->persist($user);

        $output->writeln('<comment>Completed</comment>');
    }
}
