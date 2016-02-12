<?php

namespace Civix\BalancedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Civix\BalancedBundle\Model\BalancedUserInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Table(name="balanced_payment", indexes={
 *      @ORM\Index(name="state", columns={"state"}),
 *      @ORM\Index(name="question_id", columns={"question_id"}),
 *      @ORM\Index(name="orderId", columns={"order_id"})
 * })
 * @ORM\Entity(repositoryClass="Civix\BalancedBundle\Repository\PaymentHistoryRepository")
 * @ORM\HasLifecycleCallbacks
 * @Serializer\ExclusionPolicy("all")
 */
class PaymentHistory
{
    const STATE_SUCCESS = 'succeeded';
    const STATE_PENDING = 'pending';

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $publicId
     *
     * @ORM\Column(name="public_id", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answer-private"})
     */
    private $publicId;

    /**
     * @var string $publicId
     *
     * @ORM\Column(name="order_id", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answer-private"})
     */
    private $orderId;

    /**
     * @ORM\JoinColumn(name="from_user", nullable=false)
     * @ORM\ManyToOne(targetEntity="Civix\BalancedBundle\Model\BalancedUserInterface")
     */
    private $fromUser;

    /**
     * @ORM\JoinColumn(name="to_user", nullable=true)
     * @ORM\ManyToOne(targetEntity="Civix\BalancedBundle\Model\BalancedUserInterface")
     */
    private $toUser;

    /**
     * @var decimal $amount
     *
     * @ORM\Column(name="amount", type="float")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answer-private"})
     */
    private $amount;

    /**
     * @var string $currency
     *
     * @ORM\Column(name="currency", type="string", length=3)
     */
    private $currency;

    /**
      * @ORM\Column(name="reference", type="string", length=255, nullable=true)
      */
    private $reference;

    /**
      * @ORM\Column(name="data", type="text")
      */
    private $data;

    /**
      * @ORM\Column(name="state", type="string", length=10)
      */
    private $state;

    /**
      * @ORM\Column(name="balanced_uri", type="string", length=255, nullable=true)
      */
    private $balancedUri;
    
    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answer-private"})
     */
    private $createdAt;

    /**
     * @var integer $question_id
     *
     * @ORM\Column(name="question_id", type="integer", nullable=true)
     */
    private $question_id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paid_out", type="boolean", nullable=true)
     */
    private $paidOut;

    public function __construct()
    {
        $this->currency = "USD"; //http://www.xe.com/iso4217.php
        $this->setPublicId(self::generateToken());
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
     * Set publicId
     *
     * @param  string  $publicId
     * @return Payment
     */
    public function setPublicId($publicId)
    {
        $this->publicId = $publicId;

        return $this;
    }

    /**
     * Get publicId
     *
     * @return string
     */
    public function getPublicId()
    {
        return $this->publicId;
    }

    /**
     * Set amount
     *
     * @param  float   $amount
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param  string  $currency
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Get reference.
     *
     * @return reference.
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set reference.
     *
     * @param reference the value to set.
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get data.
     *
     * @return data.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set data.
     *
     * @param data the value to set.
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get state.
     *
     * @return state.
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param state the value to set.
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get fromUser.
     *
     * @return fromUser.
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * Set fromUser.
     *
     * @param fromUser the value to set.
     */
    public function setFromUser($fromUser)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * Get toUser.
     *
     * @return toUser.
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * Set toUser.
     *
     * @param toUser the value to set.
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;

        return $this;
    }
    
    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Payment
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
     * @param  \DateTime $updatedAt
     * @return Payment
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

    public function isCredit()
    {
        return (Boolean) !$this->isDebit();
    }

    public function isDebit()
    {
        return (Boolean) null === $this->getToUser();
    }

    /**
     * Set balancedUri
     *
     * @param string $balancedUri
     * @return PaymentHistory
     */
    public function setBalancedUri($balancedUri)
    {
        $this->balancedUri = $balancedUri;
    
        return $this;
    }

    /**
     * @param int $question_id
     * @return $this
     */
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @Serializer\Groups({"api-answer-private"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("data")
     */
    public function getPublicData()
    {
        $data = json_decode($this->getData(), true);

        return [
            'order' => $this->getOrderId(),
            'status' => isset($data['status']) ? $data['status'] : null
        ];
    }

    public function getDataAsArray()
    {
        return json_decode($this->getData(), true);
    }


    /**
     * Get balancedUri
     *
     * @return string 
     */
    public function getBalancedUri()
    {
        return $this->balancedUri;
    }

    public function isSucceeded()
    {
        return $this->getState() === self::STATE_SUCCESS;
    }

    public function isPending()
    {
        return $this->getState() === self::STATE_PENDING;
    }

    public function isOK()
    {
        return $this->isSucceeded() || $this->isPending();
    }

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return boolean
     */
    public function isPaidOut()
    {
        return $this->paidOut;
    }

    /**
     * @param boolean $paidOut
     * @return $this
     */
    public function setPaidOut($paidOut)
    {
        $this->paidOut = $paidOut;

        return $this;
    }

    public static function generateToken()
    {
        return  mb_strtoupper(substr(uniqid(), 10, 3)) . '-' . mt_rand(10000000, 99999999);
    }
}
