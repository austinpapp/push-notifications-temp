<?php

namespace Civix\CoreBundle\Entity\Poll;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\BaseComment;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\CommentRateRepository")
 * @ORM\Table(name="poll_questions_comments_rate")
 * @ORM\HasLifecycleCallbacks
 */
class CommentRate
{
    const RATE_UP = 1;
    const RATE_DOWN = -1;
    const RATE_DELETE = 0;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\BaseComment", inversedBy="rates")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column(name="rate_value", type="smallint")
     */
    private $rateValue;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
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
     * Set rateValue
     *
     * @param integer $rateValue
     * 
     * @return CommentRate
     */
    public function setRateValue($rateValue)
    {
        $this->rateValue = $rateValue;

        return $this;
    }

    /**
     * Get rateValue
     *
     * @return integer 
     */
    public function getRateValue()
    {
        return $this->rateValue;
    }

    /**
     * Set comment
     *
     * @param BaseComment $comment
     * 
     * @return CommentRate
     */
    public function setComment(BaseComment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return BaseComment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param \Civix\CoreBundle\Entity\User $user
     * 
     * @return CommentRate
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
     * @return Comment
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
