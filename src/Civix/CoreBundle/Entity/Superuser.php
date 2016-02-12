<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Avatar;

/**
 * Superuser Entity
 *
 * @ORM\Table(name="superusers")
 * @ORM\Entity()
 * @UniqueEntity(fields={"username"}, groups={"registration"})
 */
class Superuser implements UserInterface
{
    const DEFAULT_AVATAR = '/bundles/civixfront/img/default_superuser.jpg';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=true, unique=true)
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * @var string
     */
    private $password;

     /**
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     * @var string
     */
    private $salt;

     /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var File $avatar
     */
    private $avatar;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll","api-groups"})
     * @Serializer\Type("Avatar")
     * @Serializer\Accessor(getter="getAvatarSrc")
     * @var string $avatarFilePath
     */
    private $avatarFilePath;

    /**
     * @var string
     */
    private $avatarSrc;

    /**
     * @Serializer\Expose()
     * @Serializer\ReadOnly()
     * @Serializer\Groups({"api-activities", "api-poll"})
     */
    private $type = 'admin';

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll","api-groups"})
     * @Serializer\SerializedName("official_title")
     */
    private $officialTitle = 'The Global Forum';

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

     /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

     /**
     * Set username
     *
     * @param string $username
     *
     * @return Superuser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Superuser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Superuser
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

     /**
     * Set email
     *
     * @param string $email
     *
     * @return Superuser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get user Roles
     *
     * @return Array
     */
    public function getRoles()
    {
        return array('ROLE_SUPERUSER');
    }

    /**
     * Erase credentials
     *
     */
    public function eraseCredentials()
    {

    }

    /**
     * Get officialName
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->officialTitle;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get default avatar
     *
     * @return string
     */
    public function getDefaultAvatar()
    {
        return self::DEFAULT_AVATAR;
    }

    /**
     * Get avatarSrc
     *
     * @return \Civix\CoreBundle\Model\Avatar
     */
    public function getAvatarSrc()
    {
        return new Avatar($this);
    }

    public function getType()
    {
        return 'superuser';
    }
}
