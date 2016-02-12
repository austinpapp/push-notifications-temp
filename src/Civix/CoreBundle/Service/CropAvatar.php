<?php

namespace Civix\CoreBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Civix\CoreBundle\Model\CropAvatarInterface;
use Civix\CoreBundle\Entity\User;

/**
 * Avatar crop class
 *
 * @author Valentin Shevko <valentin.shevko@intellectsoft.org>
 */
class CropAvatar
{
    const AVATAR_WIDTH = 256;
    const AVATAR_HEIGHT = 256;

    protected $serviceCropImage;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(
        \Civix\CoreBundle\Service\CropImage $serviceCropImage,
        $logger
    ) {
        $this->serviceCropImage = $serviceCropImage;
        $this->logger = $logger;
    }

    /**
     * Crop entity avatar
     *
     * @param Object   $entity
     * @param int      $x
     * @param int      $y
     * @param int|null $w
     * @param int|null $h
     */
    public function crop(CropAvatarInterface $entity, $x = 0, $y = 0, $w = null, $h = null)
    {
        $avatarSourcePath = $entity->getAvatarSource();
        $filename = basename($avatarSourcePath);
        $fileInfo = explode('.', $filename);
        $fileExt = array_pop($fileInfo);

        $tempFile = tempnam(sys_get_temp_dir(), 'avatar').'.'.$fileExt;

        try {
            $this->serviceCropImage
                ->crop($tempFile, $avatarSourcePath, 0, 0, $x, $y, self::AVATAR_WIDTH, self::AVATAR_HEIGHT, $w, $h);
        } catch (\Exception $exc) {
            $this->logger->addError('Image '.  $avatarSourcePath . '. '.$exc->getMessage());
        }

        $entity->setAvatarFileName($filename);
        $fileUpload = new UploadedFile($tempFile, $filename);
        $entity->setAvatar($fileUpload);
    }

    public function saveSquareAvatarFromPath(User $entity, $srcPath, $size = self::AVATAR_HEIGHT)
    {
        $fileInfo = explode('.', basename($srcPath));
        $fileExt = array_pop($fileInfo);
        $filename = uniqid().'.'.$fileExt;
        $tempFile = tempnam(sys_get_temp_dir(), 'avatar').'.'.$fileExt;

        //square avatars
        try {
            $this->serviceCropImage->rebuildImage(
                $tempFile,
                $srcPath,
                $size
            );
        } catch (\Exception $exc) {
            $this->logger->addError('Image '.  $srcPath . '. '.$exc->getMessage());
        }
        
        $entity->setAvatarFileName($tempFile);
        $fileUpload = new UploadedFile($tempFile, $filename);
        $entity->setAvatar($fileUpload);
    }
}
