<?php

namespace Civix\CoreBundle\Entity\Subscription;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Subscription\DiscountHistoryRepository")
 * @ORM\Table(name="discounts_codes_history")
 * @ORM\HasLifecycleCallbacks
 */
class DiscountCodeHistory
{
    const STATUS_APPLIED_ONLY = 0;
    const STATUS_PAYED = 1;
    
   /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Subscription\DiscountCode")
     * @ORM\JoinColumn(name="code_id", referencedColumnName="id", onDelete="cascade")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Customer\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", onDelete="cascade")
     */
    private $customer;

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
        $this->status = self::STATUS_APPLIED_ONLY;
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
     * Set status
     *
     * @param integer $status
     * @return DiscountCodeHistory
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
     * @return DiscountCodeHistory
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
     * @return DiscountCodeHistory
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
     * Set code
     *
     * @param \Civix\CoreBundle\Entity\Subscription\DiscountCode $code
     * @return DiscountCodeHistory
     */
    public function setCode(\Civix\CoreBundle\Entity\Subscription\DiscountCode $code = null)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return \Civix\CoreBundle\Entity\Subscription\DiscountCode 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set customer
     *
     * @param \Civix\CoreBundle\Entity\Customer\Customerp $customer
     * @return DiscountCodeHistory
     */
    public function setCustomer(\Civix\CoreBundle\Entity\Customer\Customer $customer = null)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Civix\CoreBundle\Entity\Customer\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreationData()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}
