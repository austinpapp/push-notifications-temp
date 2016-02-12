<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Serializer\Type\OwnerData;
use Civix\CoreBundle\Serializer\Type\Image;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\ActivityRepository")
 * @ORM\Table(name="activities")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "question"  = "Civix\CoreBundle\Entity\Activities\Question",
 *      "micro-petition" = "Civix\CoreBundle\Entity\Activities\MicroPetition",
 *      "petition" = "Civix\CoreBundle\Entity\Activities\Petition",
 *      "leader-news" = "Civix\CoreBundle\Entity\Activities\LeaderNews",
 *      "payment-request" = "Civix\CoreBundle\Entity\Activities\PaymentRequest",
 *      "crowdfunding-payment-request" = "Civix\CoreBundle\Entity\Activities\CrowdfundingPaymentRequest",
 *      "leader-event" = "Civix\CoreBundle\Entity\Activities\LeaderEvent"
 * })
 * @Serializer\ExclusionPolicy("all")
 * @Vich\Uploadable
 */
abstract class Activity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     *
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(name="description", type="text")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(name="sent_at", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     *
     * @var \DateTime()
     */
    protected $sentAt;

    /**
     * @ORM\Column(name="expire_at", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     *
     * @var \DateTime()
     */
    protected $expireAt;

     /**
     * @ORM\Column(name="responses_count", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     *
     * @var integer
     */
    protected $responsesCount;

    /**
     * @var array
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Type("OwnerData")
     * @Serializer\Accessor(getter="getOwnerData")
     *
     * @ORM\Column(name="owner", type="array")
     */
    protected $owner;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @ORM\JoinColumn(name="representative_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $representative;

     /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $group;

     /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\Superuser")
     * @ORM\JoinColumn(name="superuser_id", referencedColumnName="id")
     */
    protected $superuser;

     /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",  referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="ActivityCondition", mappedBy="activity")
     */
    protected $activityConditions;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Accessor(getter="getEntity")
     */
    protected $entity;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Accessor(getter="getPicture")
     */
    protected $picture;

    /**
     * @ORM\Column(name="is_outsiders", type="boolean", nullable=true)
     * @var type 
     */
    protected $isOutsiders;

    /**
     * @var boolean
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    protected $read;

    /**
     * @ORM\Column(name="rate_up", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    private $rateUp;

    /**
     * @ORM\Column(name="rate_down", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    private $rateDown;

    /**
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    protected $imageSrc;

    /**
     *
     * @Vich\UploadableField(mapping="educational_image", fileNameProperty="imageSrc")
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\Type("Image")
     * @Serializer\SerializedName("image_src")
     * @Serializer\Accessor(getter="getActivityImage")
     *
     */
    protected $image;

    public function __construct()
    {
        $this->setResponsesCount(0);
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
     *
     * @return Activity
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
     * Set description
     *
     * @param string $description
     *
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sentAt
     *
     * @param \DateTime $sentAt
     *
     * @return Activity
     */
    public function setSentAt($sentAt)
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * Get sentAt
     *
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * Set expireAt
     *
     * @param \DateTime $expireAt
     *
     * @return Activity
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
     * Set responses_count
     *
     * @param integer $responsesCount
     *
     * @return Activity
     */
    public function setResponsesCount($responsesCount)
    {
        $this->responsesCount = $responsesCount;

        return $this;
    }

    /**
     * Get responses_count
     *
     * @return integer
     */
    public function getResponsesCount()
    {
        return $this->responsesCount;
    }

    public function setRepresentative(Representative $representative)
    {
        $this->representative = $representative;
        $this->owner = self::toRepresentativeOwnerData($representative);
    }

    public function setGroup(Group $group)
    {
        $this->group = $group;
        $this->owner = self::toGroupOwnerData($group);
    }

    public function setSuperuser(Superuser $superuser)
    {
        $this->superuser = $superuser;
        $this->owner = [
            'type' => 'admin',
            'official_title' => 'The Global Forum'
        ];
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->owner = self::toUserOwnerData($user);
    }

    public static function toRepresentativeOwnerData(Representative $representative)
    {
        $data = [
            'id' => $representative->getId(),
            'type' => $representative->getType(),
            'official_title' => $representative->getOfficialTitle(),
            'first_name' => $representative->getFirstName(),
            'last_name' => $representative->getLastName(),
            'avatar_file_path' => $representative->getAvatarFileName(),
        ];
        if ($representative->getStorageId()) {
            $data['storage_id'] = $representative->getStorageId();
        }

        return $data;
    }

    public static function toGroupOwnerData(Group $group)
    {
        return [
            'id' => $group->getId(),
            'type' => $group->getType(),
            'group_type' => $group->getGroupType(),
            'official_title' => $group->getOfficialName(),
            'avatar_file_path' => $group->getAvatarFileName()
        ];
    }

    public static function toUserOwnerData(User $user)
    {
        return [
            'id' => $user->getId(),
            'type' => $user->getType(),
            'official_title' => '',
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'avatar_file_path' => $user->getAvatarFileName()
        ];
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($data)
    {
        $this->owner = $data;

        return $this;
    }

    public function getOwnerData()
    {
        return new OwnerData($this->owner);
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Set isOutsiders 
     *
     * @param \DateTime $expireAt
     *
     * @return Activity
     */
    public function setIsOutsiders($isOutsiders)
    {
        $this->isOutsiders = $isOutsiders;

        return $this;
    }

    /**
     * Get isOutsiders
     *
     * @return boolean
     */
    public function getIsOutsiders()
    {
        return $this->isOutsiders;
    }

    abstract public function getEntity();

    /**
     * Get representative
     *
     * @return \Civix\CoreBundle\Entity\Representative 
     */
    public function getRepresentative()
    {
        return $this->representative;
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
     * Get superuser
     *
     * @return \Civix\CoreBundle\Entity\Superuser 
     */
    public function getSuperuser()
    {
        return $this->superuser;
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
     * Add activityConditions
     *
     * @param \Civix\CoreBundle\Entity\ActivityCondition $activityConditions
     * @return Activity
     */
    public function addActivityCondition(\Civix\CoreBundle\Entity\ActivityCondition $activityConditions)
    {
        $this->activityConditions[] = $activityConditions;
    
        return $this;
    }

    /**
     * Remove activityConditions
     *
     * @param \Civix\CoreBundle\Entity\ActivityCondition $activityConditions
     */
    public function removeActivityCondition(\Civix\CoreBundle\Entity\ActivityCondition $activityConditions)
    {
        $this->activityConditions->removeElement($activityConditions);
    }

    /**
     * Get activityConditions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivityConditions()
    {
        return $this->activityConditions;
    }

    /**
     * @return boolean
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * @param boolean $read
     * @return $this
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRateUp()
    {
        return $this->rateUp;
    }

    /**
     * @param mixed $rateUp
     * @return $this
     */
    public function setRateUp($rateUp)
    {
        $this->rateUp = $rateUp;

        return $this;
    }

    /**
     * @return integer|null
     */
    public function getRateDown()
    {
        return $this->rateDown;
    }

    /**
     * @param integer $rateDown
     * @return $this
     */
    public function setRateDown($rateDown)
    {
        $this->rateDown = $rateDown;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * @param mixed $imageSrc
     * @return $this
     */
    public function setImageSrc($imageSrc)
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getActivityImage()
    {
        return $this->imageSrc ? new Image($this, 'image', $this->imageSrc): null;
    }

    public static function getActivityClassByEntity($question)
    {
        if ($question instanceof Question\LeaderNews) {
            return Activities\LeaderNews::class;
        }
        if ($question instanceof Question\PaymentRequest && $question->getIsCrowdfunding()) {
            return Activities\CrowdfundingPaymentRequest::class;
        }
        if ($question instanceof Question\PaymentRequest) {
            return Activities\PaymentRequest::class;
        }
        if ($question instanceof Question\LeaderEvent) {
            return Activities\LeaderEvent::class;
        }
        if ($question instanceof Micropetitions\Petition) {
            return Activities\MicroPetition::class;
        }
        if ($question instanceof Question\Petition) {
            return Activities\Petition::class;
        }

        return Activities\Question::class;
    }
}
