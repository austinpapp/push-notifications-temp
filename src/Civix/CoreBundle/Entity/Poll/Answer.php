<?php

namespace Civix\CoreBundle\Entity\Poll;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Answer entity
 *
 * @ORM\Table(name="poll_answers")
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\AnswerRepository")
 * @ORM\HasLifecycleCallbacks
 * @Serializer\ExclusionPolicy("all")
 */
class Answer
{
    const PRIVACY_PUBLIC = 0;
    const PRIVACY_PRIVATE = 1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-answer", "api-answers-list", "api-leader-answers"})
     */
    private $id;

    /**
     * @Serializer\Expose()
     *  @Serializer\Groups({"api-leader-answers"})
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Option", inversedBy="answers")
     * @ORM\JoinColumn(name="option_id", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll"})
     */
    private $option;
    
    /**
     * @ORM\Column(name="option_id", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answer", "api-answers-list", "api-leader-answers"})
     */
    private $optionId;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-answers-list"})
     */
    private $question;

    /**
     * @ORM\Column(name="comment", type="text")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-answer"})
     * @Assert\Length(max=500, groups={"api-poll"})
     */
    private $comment;

    /**
     * @var integer
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-leader-answers"})
     * @ORM\Column(name="payment_amount", type="integer", nullable=true)
     */
    private $payment_amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="privacy", type="integer")
     */
    private $privacy = self::PRIVACY_PUBLIC;

    /**
     * @var \DateTime $createdAt
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-leader-answers"})
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;
    
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
     * Set privacy
     *
     * @param integer $privacy
     *
     * @return UserFollow
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy == self::PRIVACY_PRIVATE ? self::PRIVACY_PRIVATE : self::PRIVACY_PUBLIC;
        
        return $this;
    }

    /**
     * Get privacy
     *
     * @return integer
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }
    
    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("user")
     */
    public function getUserInfo()
    {
        return $this->privacy === self::PRIVACY_PUBLIC ? $this->user : null;
    }
    /**
     * Set user
     *
     * @param  \Civix\CoreBundle\Entity\User $user
     * @return Answer
     */
    public function setUser(\Civix\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set comment
     *
     * @param  string $comment
     * @return Answer
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set question
     *
     * @param  \Civix\CoreBundle\Entity\Poll\Question $question
     * @return Answer
     */
    public function setQuestion(\Civix\CoreBundle\Entity\Poll\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Civix\CoreBundle\Entity\Poll\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set option
     *
     * @param  \Civix\CoreBundle\Entity\Poll\Option $option
     * @return Answer
     */
    public function setOption(\Civix\CoreBundle\Entity\Poll\Option $option = null)
    {
        $this->option = $option;
        $this->optionId = $option->getId();

        return $this;
    }

    /**
     * Get option
     *
     * @return \Civix\CoreBundle\Entity\Poll\Option
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param int $payment_amount
     * @return $this
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->payment_amount = $payment_amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentAmount()
    {
        return $this->payment_amount;
    }

    /**
     * @Serializer\Groups({"api-poll", "api-answer"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("current_payment_amount")
     */
    public function getCurrentPaymentAmount()
    {
        return intval($this->getOption()->getIsUserAmount() ?
            $this->getPaymentAmount() :
            $this->getOption()->getPaymentAmount());
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCurrentTimeAsCreatedAt()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Question
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
}
