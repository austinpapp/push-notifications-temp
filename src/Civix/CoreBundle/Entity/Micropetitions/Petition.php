<?php

namespace Civix\CoreBundle\Entity\Micropetitions;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Image;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Micropetitions\PetitionRepository")
 * @ORM\Table(name="micropetitions")
 * @ORM\HasLifecycleCallbacks
 * @Serializer\ExclusionPolicy("all")
 */
class Petition
{
    const STATUS_USER = 0;
    const STATUS_PUBLISH = 1;

    const TYPE_QUORUM = 'quorum';
    const TYPE_OPEN_LETTER = 'open letter';
    const TYPE_LONG_PETITION = 'long petition';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-info", "api-petitions-list", "api-leader-micropetition"})
     */
    private $id;

    /**
     *
     * @ORM\Column(name="title", type="string")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-petitions-list", "api-leader-micropetition"})
     */
    private $title;

    /**
     *
     * @ORM\Column(name="petition", type="text")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-petitions-list", "api-leader-micropetition"})
     */
    private $petitionBody;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info", "api-leader-micropetition"})
     */
    private $group;

    /**
     * @ORM\Column(name="group_id", type="integer")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-petitions-list", "api-leader-micropetition"})
     */
    private $groupId;

    /**
     * @ORM\Column(name="link", type="string", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-petitions-list"})
     */
    private $link;

    /**
     * 
     * @ORM\Column(name="is_outsiders_sign", type="boolean")
     * @Assert\Type(type="boolean")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-leader-micropetition"})
     */
    private $isOutsidersSign;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info", "api-leader-micropetition"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $createdAt;

    /**
     * @var \DateTime $expireAt
     *
     * @ORM\Column(name="expire_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info", "api-leader-micropetition"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $expireAt;

    /**
     * @ORM\Column(name="user_expire_interval", type="integer")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create"})
     * 
     * @var integer
     */
    private $userExpireInterval;

    /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info", "api-leader-micropetition"})
     */
    private $user;

    /**
     * @ORM\Column(name="publish_status", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info", "api-leader-micropetition"})
     * @var integer
     */
    private $publishStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-create", "api-petitions-list", "api-petitions-info",
     *      "api-leader-micropetition"})
     * @Assert\Choice(callback = "getTypes")
     */
    private $type = self::TYPE_QUORUM;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="petition", cascade={"remove"})
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="petition", cascade={"remove","persist"})
     */
    private $comments;
    
    /**
     * @ORM\ManyToMany(targetEntity="Civix\CoreBundle\Entity\HashTag", mappedBy="petitions")
     */
    private $hashTags;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-info", "api-leader-micropetition"})
     * @Serializer\Accessor(getter="getOptions")
     */
    private $options;

    /**
     * @var array
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list", "api-petitions-info"})
     * @ORM\Column(name="cached_hash_tags", type="array", nullable=true)
     */
    private $cachedHashTags = array();

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-get"})
     * @Serializer\Accessor(getter="getAnswerId")
     * @Serializer\Type("integer")
     * @Serializer\ReadOnly()
     */
    private $answerId;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-petitions-list"})
     * @Serializer\Accessor(getter="getResponsesCount")
     * @Serializer\Type("integer")
     * @Serializer\ReadOnly()
     */
    private $responsesCount;

    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hashTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Petition
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set petitionBody
     *
     * @param string $petitionBody
     * @return Petition
     */
    public function setPetitionBody($petitionBody)
    {
        $this->petitionBody = $petitionBody;
    
        return $this;
    }

    /**
     * Get petitionBody
     *
     * @return string 
     */
    public function getPetitionBody()
    {
        return $this->petitionBody;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Petition
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set isOutsidersSign
     *
     * @param boolean $isOutsidersSign
     * @return Petition
     */
    public function setIsOutsidersSign($isOutsidersSign)
    {
        $this->isOutsidersSign = $isOutsidersSign;
    
        return $this;
    }

    /**
     * Get isOutsidersSign
     *
     * @return boolean 
     */
    public function getIsOutsidersSign()
    {
        return $this->isOutsidersSign;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Petition
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
     * Set expireAt
     *
     * @param \DateTime $expireAt
     * @return Petition
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * Get expireAt
     *
     * @return \DateTime 
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return Petition
     */
    public function setGroup(\Civix\CoreBundle\Entity\Group $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Civix\CoreBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set user
     *
     * @param  \Civix\CoreBundle\Entity\User $user
     * @return Petition
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

    public function setPublishStatus($status)
    {
        $this->publishStatus = $status;

        return $this;
    }

    public function getPublishStatus()
    {
        return $this->publishStatus;
    }

    public function getUserExpireInterval()
    {
        return $this->userExpireInterval;
    }

    public function setUserExpireInterval($interval)
    {
        $this->userExpireInterval = $interval;

        return $this;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getOptions()
    {
        if (!$this->options) {
            $this->options = [
                ['id' => 1, 'value' => 'Upvote', 'votes_count' => 0],
                ['id' => 2, 'value' => 'Downvote', 'votes_count' => 0]
            ];
        }

        if ($this->getPublishStatus() === self::STATUS_PUBLISH && !isset($this->options[2])) {
            $this->options[] = ['id' => 3, 'value' => 'Ignore', 'votes_count' => 0];
        }

        return $this->options;
    }

    /**
     * Set type
     *
     * @param  string             $type
     * @return Petition
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreationData()
    {
        $this->setCreatedAt(new \DateTime('now'));
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();

        if (is_null($this->isOutsidersSign)) {
            $this->isOutsidersSign = false;
        }
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function getOptionsIds()
    {
        return array_map(function ($option) {
                    return $option['id'];
        }, $this->getOptions());
    }

    public function setCountVoices($calcArray)
    {
        foreach ($this->getOptions() as &$option) {
            $option['votes_count'] = isset($calcArray[$option['id']]) ? (int) $calcArray[$option['id']] : 0;
        }
    }


    /**
     * Return option id if petition answered
     * Can be used when petition fetch by getPetitionForUser() method
     *
     * @return integer
     */
    public function getAnswerId()
    {
        if ($this->getAnswers()->count()) {
            return $this->getAnswers()->first()->getOptionId();
        }

        return null;
    }

    public function getResponsesCount()
    {
        return $this->getAnswers()->count();
    }

    /**
     * @return int
     */
    public function getMaxAnswers()
    {
        $max = 0;
        foreach ($this->getOptions() as $option) {
            if ($max < $option['votes_count']) {
                $max = $option['votes_count'];
            }
        }

        return $max;
    }

    /**
     * @Serializer\Groups({"api-petitions-list"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("quorum_count")
     */
    public function getQuorumCount()
    {
        $currentPercent = $this->getGroup()->getPetitionPercent();
        if (empty($currentPercent)) {
            $currentPercent = \Civix\CoreBundle\Service\Micropetitions\PetitionManager::PERCENT_IN_GROUP;
        }

        return round((
                $this->getGroup()->getUsers()->count() * $currentPercent)/100
        );
    }

    public function getTypes()
    {
        return array(self::TYPE_QUORUM, self::TYPE_OPEN_LETTER, self::TYPE_LONG_PETITION);
    }

    /**
     * Add answers
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Answer $answers
     * @return Petition
     */
    public function addAnswer(\Civix\CoreBundle\Entity\Micropetitions\Answer $answers)
    {
        $this->answers[] = $answers;
    
        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Answer $answers
     */
    public function removeAnswer(\Civix\CoreBundle\Entity\Micropetitions\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Add hashTags
     *
     * @param \Civix\CoreBundle\Entity\HashTag $hashTags
     * @return Petition
     */
    public function addHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->hashTags[] = $hashTags;
    
        return $this;
    }

    /**
     * Remove hashTags
     *
     * @param \Civix\CoreBundle\Entity\HashTag $hashTags
     */
    public function removeHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->hashTags->removeElement($hashTags);
    }

    /**
     * Get hashTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHashTags()
    {
        return $this->hashTags;
    }

    /**
     * Set cachedHashTags
     *
     * @param array $cachedHashTags
     * @return Petition
     */
    public function setCachedHashTags($cachedHashTags)
    {
        $this->cachedHashTags = $cachedHashTags;
    
        return $this;
    }

    /**
     * Get cachedHashTags
     *
     * @return array 
     */
    public function getCachedHashTags()
    {
        return $this->cachedHashTags;
    }

    /**
     * @Serializer\Groups({"api-petitions-info"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("share_picture")
     * @Serializer\Type("Image")
     */
    public function getSharePicture()
    {
        $entity = $this->getPublishStatus() ? $this->getGroup() : $this->getUser();

        return new Image($entity, 'avatar');
    }

    public function getComments()
    {
        return $this->comments;
    }
}
