<?php

namespace Civix\CoreBundle\Entity\Customer\Order;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;

/**
 * @ORM\Entity()
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "payment-request" = "Civix\CoreBundle\Entity\Customer\Order\PaymentRequestOrder"
 * })
 */
abstract class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $balancedUri
     *
     * @ORM\Column(name="balanced_uri", type="string", length=255)
     */
    protected $balancedUri;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var string $publicId
     *
     * @ORM\Column(name="public_id", type="string", length=255, nullable=true)
     */
    private $publicId;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->setPublicId(self::generateToken());
    }

    /**
     * @param string $balancedUri
     * @return $this
     */
    public function setBalancedUri($balancedUri)
    {
        $this->balancedUri = $balancedUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalancedUri()
    {
        return $this->balancedUri;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function beforePersist()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function beforeUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @param string $publicId
     * @return $this
     */
    public function setPublicId($publicId)
    {
        $this->publicId = $publicId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicId()
    {
        return $this->publicId;
    }

    public static function generateToken()
    {
        return  mb_strtoupper(uniqid());
    }
}
