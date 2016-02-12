<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class SuperuserPasswordCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('superuser:password')
            ->setDescription('Update password for superuser according to username')
            ->setHelp('Usage: <info>php app/console superuser:password admin newpassword</info>')
            ->addArgument(
                'username',
                InputArgument::REQUIRED, 'Superuser\'s username'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        
        $superuser = $entityManager->getRepository('CivixCoreBundle:Superuser')
                ->findOneByUsername($input->getArgument('username'));
        if ($superuser) {
            $dialog = $this->getHelperSet()->get('dialog');
            $newPassword = $dialog->askHiddenResponse(
                $output,
                'New password:',
                false
            );
            
            $encoder = $this->getContainer()->get('security.encoder_factory')->getEncoder($superuser);
            $password = $encoder->encodePassword($newPassword, $superuser->getSalt());
            $superuser->setPassword($password);
            $entityManager->persist($superuser);
            $entityManager->flush();
            $output->writeln('Password of superuser '.$input->getArgument('username').' has been updated.');
        } else {
            $output->writeln('Superuser with username '.$input->getArgument('username').' has not been founded.');
        }
    }
}
