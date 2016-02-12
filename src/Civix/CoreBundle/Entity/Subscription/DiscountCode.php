<?php

namespace Civix\CoreBundle\Entity\Subscription;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Subscription\DiscountRepository")
 * @ORM\Table(name="discounts_codes")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("code")
 */
class DiscountCode
{
    const STATUS_ACTIVE = 0;
    const STATUS_USED = 1;
    
   /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 1,
     *      max = 100,
     * )
     * @ORM\Column(name="percents", type="integer")
     */
    private $percents;

    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThan(
     *     value = 0
     * )
     * @ORM\Column(name="month", type="integer")
     */
    private $month;

    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThan(
     *     value = 0
     * )
     * @ORM\Column(name="max_users", type="integer")
     */
    private $maxUsers;

    /**
     * @ORM\Column(name="package_type", type="integer", nullable = true)
     */
    private $packageType;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    public function __construct()
    {
        $this->status = self::STATUS_ACTIVE;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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
     * Set code
     *
     * @param string $code
     * @return DiscountCode
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set percents
     *
     * @param integer $percents
     * @return DiscountCode
     */
    public function setPercents($percents)
    {
        $this->percents = $percents;
    
        return $this;
    }

    /**
     * Get percents
     *
     * @return integer 
     */
    public function getPercents()
    {
        return $this->percents;
    }

    /**
     * Set month
     *
     * @param integer $month
     * @return DiscountCode
     */
    public function setMonth($month)
    {
        $this->month = $month;
    
        return $this;
    }

    /**
     * Get month
     *
     * @return integer 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set maxUsers
     *
     * @param integer $maxUsers
     * @return DiscountCode
     */
    public function setMaxUsers($maxUsers)
    {
        $this->maxUsers = $maxUsers;
    
        return $this;
    }

    /**
     * Get maxUsers
     *
     * @return integer 
     */
    public function getMaxUsers()
    {
        return $this->maxUsers;
    }

    public function getPackageType()
    {
        return $this->packageType;
    }

    public function setPackageType($packageType)
    {
        $this->packageType = $packageType;

        return $this;
    }

        
    /**
     * Set status
     *
     * @param integer $status
     * @return DiscountCode
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

        
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Post
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreationData()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}
