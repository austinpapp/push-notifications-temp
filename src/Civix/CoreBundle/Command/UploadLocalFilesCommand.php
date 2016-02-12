<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\File\File;
use Gaufrette\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gaufrette\Stream\Local as LocalStream;
use Gaufrette\StreamMode;
use Gaufrette\Adapter\MetadataSupporter;

class UploadLocalFilesCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var \Vich\UploaderBundle\Storage\FileSystemStorage
     */
    private $vichLocalStorage;

    /**
     * @var \Vich\UploaderBundle\Storage\GaufretteStorage
     */
    private $vichGaufretteStorage;

    /**
     * @var \Aws\S3\S3Client
     */
    private $s3;

    protected function configure()
    {
        $this
            ->setName('local-files:upload')
            ->setDescription('Upload local files to amazon S3')
            ->addOption(
                '--dump',
                null,
                InputOption::VALUE_NONE,
                'Show files which need to upload instead of uploading'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var EntityManager $em
         */
        $this->em = $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->s3 = $this->getContainer()->get('aws_s3.client');
        $this->vichLocalStorage = $this->getContainer()->get('vich_uploader.storage.file_system');
        $this->vichGaufretteStorage = $this->getContainer()->get('vich_uploader.storage.gaufrette');

        $representativeStorage = $em->getRepository('CivixCoreBundle:RepresentativeStorage')->findAll();
        $representatives = $em->getRepository('CivixCoreBundle:Representative')->findAll();
        $groups = $em->getRepository('CivixCoreBundle:Group')->findAll();
        $users = $em->getRepository('CivixCoreBundle:User')->findAll();
        $educational = $em->getRepository('CivixCoreBundle:Poll\EducationalContext')->findAll();

        $representativeStorage = $this->checkAvatars($representativeStorage,
            $this->getContainer()->get('gaufrette.avatar_representative_fs_filesystem'), '/avatars/representatives/');
        $representatives = $this->checkAvatars($representatives,
            $this->getContainer()->get('gaufrette.avatar_representative_fs_filesystem'), '/avatars/representatives/');
        $groups = $this->checkAvatars($groups,
            $this->getContainer()->get('gaufrette.avatar_image_fs_filesystem'), '/avatars/');
        $users = $this->checkAvatars($users,
            $this->getContainer()->get('gaufrette.avatar_image_fs_filesystem'), '/avatars/');
        $images = $this->checkImages($educational);

        if ($input->getOption('dump')) {

            $output->writeln('<info>Next files ready to upload:</info>');

            /* @var \Civix\CoreBundle\Entity\RepresentativeStorage $item */
            foreach ($representativeStorage as $item) {
                $output->writeln("<comment>RepresentativeStorage:</comment> {$item->getId()} ".
                    "{$item->getFirstName()} {$item->getLastName()} {$item->getAvatar()->getPathname()}"
                );
            }

            /* @var \Civix\CoreBundle\Entity\Representative $item */
            foreach ($representatives as $item) {
                $output->writeln("<comment>Representative:</comment> {$item->getId()} ".
                    "{$item->getFirstName()} {$item->getLastName()} {$item->getAvatar()->getPathname()}"
                );
            }

            /* @var \Civix\CoreBundle\Entity\Group $item */
            foreach ($groups as $item) {
                $output->writeln("<comment>Group:</comment> {$item->getId()} ".
                    "{$item->getOfficialName()} {$item->getAvatar()->getPathname()}"
                );
            }

            /* @var \Civix\CoreBundle\Entity\User $item */
            foreach ($users as $item) {
                $output->writeln("<comment>User:</comment> {$item->getId()} ".
                    "{$item->getUsername()} {$item->getAvatar()->getPathname()}"
                );
            }

            /* @var \Civix\CoreBundle\Entity\Poll\EducationalContext $item */
            foreach ($images as $item) {
                $output->writeln("<comment>EducationalContext:</comment> ".
                    "{$item->getId()} {$item->getImage()->getPathname()}"
                );
            }

        } else {
            $output->writeln('<info>RepresentativeStorage uploading:</info>');
            /* @var \Civix\CoreBundle\Entity\RepresentativeStorage $item */
            foreach ($representativeStorage as $item) {
                $this->uploadAvatar($item->getAvatar(), '/avatars/representatives/',
                    $this->getContainer()->get('gaufrette.avatar_representative_fs_filesystem'), $output);
            }

            $output->writeln('<info>Representative uploading:</info>');
            /* @var \Civix\CoreBundle\Entity\Representative $item */
            foreach ($representatives as $item) {
                $this->uploadAvatar($item->getAvatar(), '/avatars/representatives/',
                    $this->getContainer()->get('gaufrette.avatar_representative_fs_filesystem'), $output);
            }

            $output->writeln('<info>Group uploading:</info>');
            /* @var \Civix\CoreBundle\Entity\Group $item */
            foreach ($groups as $item) {
                $this->uploadAvatar($item->getAvatar(), '/avatars/',
                    $this->getContainer()->get('gaufrette.avatar_image_fs_filesystem'), $output);
            }

            $output->writeln('<info>User uploading:</info>');
            /* @var \Civix\CoreBundle\Entity\User $item */
            foreach ($users as $item) {
                $this->uploadAvatar($item->getAvatar(), '/avatars/',
                    $this->getContainer()->get('gaufrette.avatar_image_fs_filesystem'), $output);
            }

            $output->writeln('<info>EducationalContext uploading:</info>');
            /* @var \Civix\CoreBundle\Entity\Poll\EducationalContext $item */
            foreach ($images as $item) {
                $this->uploadImage($item, $output);
            }
        }

    }

    private function checkAvatars($items, Filesystem $filesystem, $localDir)
    {
        $result = [];
        $localPath = $this->getContainer()->getParameter('kernel.root_dir') . '/../web/images' . $localDir;

        foreach ($items as $item) {
            /** @var File $avatar */
            $avatar = $item->getAvatar();
            if ($avatar && !$filesystem->has($avatar->getFilename()) &&
                @file_exists($localPath . $avatar->getFilename())
            ) {
                $result[] = $item;
            }
        }

        return $result;
    }

    private function checkImages($items)
    {
        $result = [];
        $localPath = $this->getContainer()->getParameter('kernel.root_dir') . '/../web/images/educational/';
        /* @var Filesystem $filesystem */
        $filesystem = $this->getContainer()->get('gaufrette.educational_image_fs_filesystem');

        /* @var \Civix\CoreBundle\Entity\Poll\EducationalContext $context */
        foreach ($items as $context) {
            if ($context->getType() === $context::IMAGE_TYPE &&
                !$filesystem->has($context->getImage()->getFilename()) &&
                @file_exists($localPath . $context->getImage()->getFilename())) {
                $result[] = $context;
            }
        }

        return $result;
    }

    private function uploadAvatar(File $file, $localDir, Filesystem $filesystem, OutputInterface $output)
    {
        $localPath = $this->getContainer()->getParameter('kernel.root_dir') . '/../web/images' . $localDir;

        $fileUpload = new UploadedFile($localPath . $file->getFilename(), $file->getFilename());


        $output->writeln('<comment>upload: </comment> ' . $fileUpload->getPathname());
        $this->doUpload($fileUpload, $file->getFilename(), $filesystem);
    }

    private function uploadImage(\Civix\CoreBundle\Entity\Poll\EducationalContext $context, OutputInterface $output)
    {
        /* @var Filesystem $filesystem */
        $filesystem = $this->getContainer()->get('gaufrette.educational_image_fs_filesystem');
        $localPath = $this->getContainer()->getParameter('kernel.root_dir') . '/../web/images/educational/';
        $file = $context->getImage();
        $fileUpload = new UploadedFile($localPath . $file->getFilename(), $file->getFilename());


        $output->writeln('<comment>upload: </comment> ' . $fileUpload->getPathname());
        $this->doUpload($fileUpload, $file->getFilename(), $filesystem);
    }

    private function doUpload(UploadedFile $file, $name, Filesystem $filesystem)
    {

        if ($filesystem->getAdapter() instanceof MetadataSupporter) {
            $filesystem->getAdapter()->setMetadata($name, array('contentType' => $file->getMimeType()));
        }

        $src = new LocalStream($file->getPathname());
        $dst = $filesystem->createStream($name);

        $src->open(new StreamMode('rb+'));
        $dst->open(new StreamMode('ab+'));

        while (!$src->eof()) {
            $data = $src->read(100000);
            $written = $dst->write($data);
        }
        $dst->close();
        $src->close();
    }
}
