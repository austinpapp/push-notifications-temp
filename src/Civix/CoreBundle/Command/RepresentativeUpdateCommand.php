<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\District;

class RepresentativeUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cicero:update')
            ->setDescription('Update data of representative from Cicero API.')
            ->addOption(
                'purge',
                null,
                InputOption::VALUE_NONE,
                'If set, all saved storage representative will be rejected, incorrect districts'
            )
            ->addOption(
                'by-users',
                null,
                InputOption::VALUE_NONE,
                'If set, will be to get all representative by all user\'s profile'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ciceroService = $this->getContainer()->get('civix_core.cicero_api');
        $userManager = $this->getContainer()->get('civix_core.user_manager');
        $groupManager = $this->getContainer()->get('civix_core.group_manager');
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $avatarsStorage = $this->getContainer()->get('knp_gaufrette.filesystem_map')->get('avatar_representative_fs');

        // delete all representative storage
        if ($input->getOption('purge')) {
            $output->writeln('Purge all storage representative');
            $entityManager->getRepository('CivixCoreBundle:Representative')
                     ->cleanStorageIds();
            $entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                    ->purgeRepresentativeStorage();

            //clean incorrect local group
            $output->writeln('Purge all incorrect local groups');
            $entityManager->getRepository('CivixCoreBundle:Group')
                    ->cleanIncorrectLocalGroup();

            //clean old photos
            $contentsFolder = $avatarsStorage->listKeys();
            foreach ($contentsFolder['keys'] as $file) {
                $avatarsStorage->delete($file);
            }
        }

        // update representative by user profile
        if ($input->getOption('by-users')) {
            $output->writeln('Start update by user\'s profiles');

            $output->writeln(' Get users with address');
            $users = $entityManager->getRepository('CivixCoreBundle:User')
                    ->getAllUsersWithAddressProfile();

            foreach ($users as $user) {
                $output->writeln(' Get all districts id (fill representative storage) for user '.
                    $user->getFirstName().' '.$user->getLastName());
                $userManager->updateDistrictsIds($user);
                $output->writeln(' Join to global groups for user '.$user->getFirstName().' '.$user->getLastName());
                $groupManager->autoJoinUser($user);
                
                $entityManager->persist($user);
            }
        }

        $output->writeln('Update link between active representative and storage');
        //update link between active representative and storage
        $representatives = $entityManager->getRepository('CivixCoreBundle:Representative')
                ->getQueryRepresentativeByStatus(Representative::STATUS_ACTIVE)->getResult();

        foreach ($representatives as $representative) {
            $district = $ciceroService->updateByRepresentativeInfo($representative);
            if ($district instanceof District) {
                $representative->setDistrict($district);
            }
            $entityManager->persist($representative);
        }

        $entityManager->flush();

        $output->writeln('Update complete.');
    }
}
