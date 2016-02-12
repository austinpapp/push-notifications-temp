<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comments entity
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "poll"  = "Civix\CoreBundle\Entity\Poll\Comment",
 *      "micropetition" = "Civix\CoreBundle\Entity\Micropetitions\Comment",
 * })
 * @Serializer\ExclusionPolicy("all")
 */
class BaseComment
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
     * @Serializer\Groups({"api-comments", "api-comments-parent", "api-comments-add"})
     */
    private $id;

    /**
     * @ORM\Column(name="comment_body", type="text")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments", "api-comments-add"})
     * @Assert\NotBlank()
     * @Assert\Length(max=500)
     */
    private $commentBody;

    /**
     * @ORM\Column(name="comment_body_html", type="text")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments", "api-comments-add"})
     */
    private $commentBodyHtml;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments", "api-comments-add"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $createdAt;
    
    /**
     * @ORM\ManyToOne(targetEntity="BaseComment", inversedBy="childrenComments")
     * @ORM\JoinColumn(name="pid", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments", "api-comments-add"})
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getParentId")
     */
    private $parentComment;

    /**
     * @ORM\OneToMany(targetEntity="BaseComment", mappedBy="parentComment")
     */
    private $childrenComments;

    /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments-add"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="\Civix\CoreBundle\Entity\Poll\CommentRate", mappedBy="comment")
     */
    private $rates;
    
    /**
     * @ORM\Column(name="rate_sum", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments"})
     */
    private $rateSum;

    /**
     * @ORM\Column(name="rates_count", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments"})
     */
    private $ratesCount;

    /**
    * @Serializer\Expose()
    * @Serializer\Groups({"api-comments"})
    */
    private $rateStatus;

    private $isOwner;

    /**
     * @var integer
     *
     * @ORM\Column(name="privacy", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-comments", "api-comments-add"})
     */
    private $privacy = self::PRIVACY_PUBLIC;

    public function __construct()
    {
        $this->rateSum = 0;
        $this->ratesCount = 0;
        $this->rates = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set commentBody
     *
     * @param string $commentBody
     * 
     * @return Comment
     */
    public function setCommentBody($commentBody)
    {
        $this->commentBody = $commentBody;

        return $this;
    }

    /**
     * Get commentBody
     *
     * @return string 
     */
    public function getCommentBody()
    {
        return $this->commentBody;
    }

    /**
     * Set parentComment
     *
     * @param \Civix\CoreBundle\Entity\BaseComment $parentComment
     * 
     * @return Comment
     */
    public function setParentComment(BaseComment $parentComment = null)
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    /**
     * Get parentComment
     *
     * @return \Civix\CoreBundle\Entity\BaseComment 
     */
    public function getParentComment()
    {
        return $this->parentComment;
    }

    /**
     * Set user
     *
     * @param \Civix\CoreBundle\Entity\User $user
     * 
     * @return Comment
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
    public function setDefaultData()
    {
        $this->setCreatedAt(new \DateTime('now'));

        if (is_null($this->rateSum)) {
            $this->setRateSum(0);
        }
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

    /**
     * Set crate sum
     *
     * @param integer $rateSum
     *
     * @return Comment
     */
    public function setRateSum($rateSum)
    {
        $this->rateSum = $rateSum;

        return $this;
    }

    /**
     * Get rate sum
     *
     * @return integer
     */
    public function getRateSum()
    {
        return $this->rateSum;
    }

    public function setRateStatus($userStatus)
    {
        $this->rateStatus = $userStatus;

        return $this;
    }

    public function getRateStatus()
    {
        return $this->rateStatus;
    }

    public function getRates()
    {
        return $this->rates;
    }

    public function getParentId()
    {
        if (isset($this->parentComment)) {
            return $this->parentComment->getId();
        }

        return 0;
    }

    /**
     * Set privacy
     *
     * @param integer $privacy
     *
     * @return Comment
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy === self::PRIVACY_PRIVATE ? self::PRIVACY_PRIVATE : self::PRIVACY_PUBLIC;

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

    public function setIsOwner($status)
    {
        $this->isOwner = $status;

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-comments"})
     * @Serializer\SerializedName("is_owner")
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-comments"})
     * @Serializer\Type("Avatar")
     * @Serializer\SerializedName("author_picture")
     */
    public function getCommentPicture()
    {
        return $this->privacy === self::PRIVACY_PUBLIC ?
            ($this->user instanceof User ? $this->user->getAvatarWithPath():null):
            $this->user->getAvatarWithPath($this->privacy)
        ;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-comments"})
     * @Serializer\SerializedName("user")
     */
    public function getUserInfo()
    {
        return $this->privacy === self::PRIVACY_PUBLIC ? $this->user : null;
    }

    /**
     * Add childrenComments
     *
     * @param \Civix\CoreBundle\Entity\BaseComment $childrenComments
     * @return Comment
     */
    public function addChildrenComment(\Civix\CoreBundle\Entity\BaseComment $childrenComments)
    {
        $this->childrenComments[] = $childrenComments;
    
        return $this;
    }

    /**
     * Remove childrenComments
     *
     * @param \Civix\CoreBundle\Entity\BaseComment $childrenComments
     */
    public function removeChildrenComment(\Civix\CoreBundle\Entity\BaseComment $childrenComments)
    {
        $this->childrenComments->removeElement($childrenComments);
    }

    /**
     * Get childrenComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenComments()
    {
        return $this->childrenComments;
    }

    /**
     * Add rates
     *
     * @param \Civix\CoreBundle\Entity\Poll\CommentRate $rates
     * @return Comment
     */
    public function addRate(\Civix\CoreBundle\Entity\Poll\CommentRate $rates)
    {
        $this->rates[] = $rates;
    
        return $this;
    }

    /**
     * Remove rates
     *
     * @param \Civix\CoreBundle\Entity\Poll\CommentRate $rates
     */
    public function removeRate(\Civix\CoreBundle\Entity\Poll\CommentRate $rates)
    {
        $this->rates->removeElement($rates);
    }

    /**
     * @param mixed $ratesCount
     * @return $this
     */
    public function setRatesCount($ratesCount)
    {
        $this->ratesCount = $ratesCount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentBodyHtml()
    {
        return $this->commentBodyHtml;
    }

    /**
     * @param mixed $commentBodyHtml
     * @return $this
     */
    public function setCommentBodyHtml($commentBodyHtml)
    {
        $this->commentBodyHtml = $commentBodyHtml;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRatesCount()
    {
        return $this->ratesCount;
    }

    public function getRateUp()
    {
        return $this->ratesCount ? ($this->ratesCount + $this->rateSum) / 2 : 0;
    }

    public function getRateDown()
    {
        return $this->ratesCount ? ($this->ratesCount - $this->rateSum) / 2 : 0;
    }
}
