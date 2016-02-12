<?php

namespace Civix\CoreBundle\Serializer\Type;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\User;

/**
 * @Vich\Uploadable
 */
class OwnerData
{
    private $data;

    /**
     * @Vich\UploadableField(mapping="avatar_image", fileNameProperty="avatarFileName")
     */
    private $avatar;

    private $avatarFileName;


    public function __construct($data)
    {
        if (empty($data)) {
            $data = ['type' => 'deleted', 'official_title' => 'deleted'];
        }
        $this->data = $data;
        if (!empty($data['avatar_file_path'])) {
            $this->avatarFileName = $data['avatar_file_path'];
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarFileName()
    {
        return $this->avatarFileName;
    }

    /**
     * @param mixed $avatarFileName
     * @return $this
     */
    public function setAvatarFileName($avatarFileName)
    {
        $this->avatarFileName = $avatarFileName;

        return $this;
    }

    public function getDefaultAvatar()
    {
        if (!empty($this->data['type'])) {
            $method = 'getDefaultAvatarFor' . $this->data['type'];
            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }
    }

    private function getDefaultAvatarForAdmin()
    {
        return Superuser::DEFAULT_AVATAR;
    }

    private function getDefaultAvatarForGroup()
    {
        return Group::DEFAULT_AVATAR;
    }

    private function getDefaultAvatarForRepresentative()
    {
        return Representative::DEFAULT_AVATAR;
    }

    private function getDefaultAvatarForUser()
    {
        return User::DEFAULT_AVATAR;
    }

    private function getDefaultAvatarForDeleted()
    {
        return User::DEFAULT_AVATAR;
    }
}