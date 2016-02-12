<?php

namespace Civix\CoreBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface CropAvatarInterface
{
    public function getAvatar();
    public function setAvatar(UploadedFile $avatar);
    public function getAvatarSource();
    public function setAvatarSource($avatarSrc);
    public function getAvatarFileName();
    public function setAvatarFileName($avatarName);
}
