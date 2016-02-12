<?php

namespace Civix\CoreBundle\Entity\Notification;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass = "Civix\CoreBundle\Repository\Notification\EndpointRepository")
 * @ORM\Table(name="notification_endpoints", indexes={
 *      @ORM\Index(name="token", columns={"token"})
 * })
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "ios" = "Civix\CoreBundle\Entity\Notification\IOSEndpoint",
 *      "android" = "Civix\CoreBundle\Entity\Notification\AndroidEndpoint"
 * })
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\Discriminator(field = "type", map = {
 *      "ios": "Civix\CoreBundle\Entity\Notification\IOSEndpoint",
 *      "android": "Civix\CoreBundle\Entity\Notification\AndroidEndpoint",
 * })
 */
abstract class AbstractEndpoint
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"owner-get"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"owner-get", "owner-create"})
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="arn", type="string", length=255)
     */
    private $arn;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="cascade")
     */
    private $user;

    abstract public function getPlatformMessage($message, $type, $entityData, $avatarUrl);

    /**
     * @param string $arn
     * @return self
     */
    public function setArn($arn)
    {
        $this->arn = $arn;

        return $this;
    }

    /**
     * @return string
     */
    public function getArn()
    {
        return $this->arn;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param User $user
     * @return self
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
