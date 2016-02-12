<?php

namespace Civix\CoreBundle\Entity\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Customer\BankAccountRepository")
 * @ORM\Table(name="bank_accounts")
 * @ORM\HasLifecycleCallbacks()
 * @Serializer\ExclusionPolicy("all")
 */
class BankAccount implements CustomerAccessorInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\NotNull
     * @Serializer\Expose()
     * @Serializer\Groups({"api-account-manage"})
     *
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $customer;

    /**
     * @var boolean $enabled
     *
     * @ORM\Column(name="verified", type="boolean")
     */
    protected $verified;

    /**
     * @var string $balancedUri
     *
     * @ORM\Column(name="balanced_uri", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-account-manage"})
     */
    protected $balancedUri;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->verified = false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $balancedUri
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
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
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
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param mixed $customer
     * @return $this
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param boolean $verified
     * @return $this
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAtDate()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate()
     */
    public function setUpdatedAtDate()
    {
        $this->setUpdatedAt(new \DateTime());
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
}
