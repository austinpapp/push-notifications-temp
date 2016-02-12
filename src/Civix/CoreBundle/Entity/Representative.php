<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use \JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Avatar;
use Civix\CoreBundle\Model\CropAvatarInterface;
use Civix\CoreBundle\Entity\CheckingLimits;
use Civix\CoreBundle\Entity\RepresentativeStorage;
use Civix\CoreBundle\Entity\Group;

/**
 * Representative
 *
 * @ORM\Table(
 *      name="representatives",
 *      indexes={
 *          @ORM\Index(name="is_nonlegislative", columns={"is_nonlegislative"}),
 *          @ORM\Index(name="rep_firstName_ind", columns={"firstName"}),
 *          @ORM\Index(name="rep_lastName_ind", columns={"lastName"}),
 *          @ORM\Index(name="rep_officialTitle_ind", columns={"officialTitle"})
 *      }
 * )
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\RepresentativeRepository")
 * @UniqueEntity(fields={"username"}, groups={"registration"})
 * @Vich\Uploadable
 * @Serializer\ExclusionPolicy("all")
 */
class Representative implements UserInterface, \Serializable, CheckingLimits, CropAvatarInterface
{
    const DEFAULT_AVATAR = '/bundles/civixfront/img/default_representative.png';

    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll", "api-representatives-list", "api-info",
     *      "api-search", "api-poll-public"})
     */
    private $id;

    /**
     * @Serializer\Expose()
     * @Serializer\ReadOnly()
     * @Serializer\Groups({"api-activities", "api-poll", "api-search", "api-poll-public"})
     */
    private $type = 'representative';

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank(groups={"registration", "profile"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getFirstName")
     * @Serializer\Groups({"api-activities", "api-representatives-list", "api-poll", "api-info",
     *      "api-search", "api-poll-public"})
     */
    private $firstName;

     /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank(groups={"registration", "profile"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getLastName")
     * @Serializer\Groups({"api-activities", "api-representatives-list", "api-poll", "api-info",
     *     "api-search", "api-poll-public"})
     */
    private $lastName;

    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=true, unique=true)
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     * @var string
     */
    private $salt;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     groups={"profile"}
     * )
     * @Vich\UploadableField(mapping="avatar_image", fileNameProperty="avatarFileName")
     *
     * @var File $avatar
     */
    private $avatar;

    /**
     * @ORM\Column(name="avatar_file_name", type="string", nullable=true)
     * @var string $avatarFileName
     */
    private $avatarFileName;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll", "api-representatives-list", "api-info",
     *      "api-search", "api-poll-public"})
     * @Serializer\Type("Avatar")
     * @Serializer\Accessor(getter="getAvatarSrc")
     * @var string $avatarFilePath
     */
    private $avatarFilePath;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     groups={"profile"}
     * )
     * @Vich\UploadableField(mapping="avatar_source_image", fileNameProperty="avatarSourceFileName")
     *
     * @var File $avatarSource
     */
    private $avatarSource;

    /**
     * @ORM\Column(name="avatar_source_file_name", type="string", nullable=true)
     * @var string $avatarSourceFileName
     */
    private $avatarSourceFileName;

    /**
     * @var string
     */
    private $avatarSrc;

    /**
     * @var string
     *
     * @ORM\Column(name="officialTitle", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getOfficialTitle")
     * @Serializer\Groups({"api-activities", "api-representatives-list", "api-poll", "api-info",
     *      "api-search", "api-poll-public"})
     */
    private $officialTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=2)
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info"})
     */
    private $country;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\State", cascade="persist")
     * @ORM\JoinColumn(name="state", referencedColumnName="code", nullable=true, onDelete="SET NULL")
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Type("string")
     * @Serializer\Accessor(getter="getStateCode")
     * @Serializer\Groups({"api-info"})
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getCity")
     * @Serializer\Groups({"api-info"})
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="officialAddress", type="text")
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getOfficialAddress")
     * @Serializer\Groups({"api-info"})
     */
    private $officialAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="officialPhone", type="string", length=15)
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getOfficialPhone")
     * @Serializer\Groups({"api-info"})
     */
    private $officialPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     *
     * @ORM\Column(name="email", type="string", length=50)
     * @Assert\NotBlank(groups={"registration"})
     * @Assert\Email(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getEmail")
     * @Serializer\Groups({"api-info"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=true)
     *
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getFax")
     * @Serializer\Groups({"api-info"})
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     *
     * @Serializer\Expose()
     * @Serializer\Accessor(getter="getWebsite")
     * @Serializer\Groups({"api-info"})
     */
    private $website;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\District", cascade="persist")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $district;

    /**
     * @ORM\Column(name="storage_id", type="integer", nullable=true, unique=true)
     * @var Integer
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll", "api-search", "api-info", "api-poll-public"})
     */
    private $storageId;

    /**
     * @ORM\OneToOne(
     *  targetEntity="Civix\CoreBundle\Entity\RepresentativeStorage",
     *  inversedBy="representative", cascade="persist")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="storage_id",  nullable=true, onDelete="SET NULL")
     */
    private $representativeStorage;

    /**
     * @ORM\Column(name="upd_storage_at", type="date", nullable=true)
     * @var \DateTime
     */
    private $storageUpdateAt;

    /**
     * @Assert\Regex(
     *      pattern="/^\d+$/",
     *      message="The value cannot contain a non-numerical symbols"
     * )
     * @ORM\Column(name="questions_limit", type="integer", nullable=true)
     * @var Integer
     */
    private $questionLimit;

    /**
     * @ORM\Column(name="is_nonlegislative", type="integer", nullable=true)
     * @var Integer 
     */
    private $isNonLegislative;

     /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="localRepresentatives", cascade="persist")
     * @ORM\JoinColumn(name="local_group", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $localGroup;
   
    public function __construct()
    {
        $this->setCountry('US');
        $this->setStatus(self::STATUS_PENDING);
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
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
     * Get avatarSrc
     *
     * @return \Civix\CoreBundle\Model\Avatar
     */
    public function getAvatarSrc()
    {
        if ($this->getRepresentativeStorage() && !$this->getAvatarFileName()) {
            return new Avatar($this->getRepresentativeStorage());
        }

        return new Avatar($this);
    }

    /**
     * Serializes the representative
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
                $this->id
            ));
    }

    /**
     * Unserializes the representative
     *
     * @param string $serialized
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        list(
            $this->id
            ) = unserialize($serialized);
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
     * Get name
     *
     * @return string
     */
    public function getFirstName()
    {
        if ($this->getRepresentativeStorage() && !$this->firstName) {
            return $this->getRepresentativeStorage()->getFirstName();
        }

        return $this->firstName;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        if ($this->getRepresentativeStorage() && !$this->fax) {
            return $this->getRepresentativeStorage()->getFax();
        }

        return $this->fax;
    }

    /**
     * Set fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        if ($this->getRepresentativeStorage() && !$this->website) {
            return $this->getRepresentativeStorage()->getWebsite();
        }

        return $this->website;
    }

    /**
     * Set website
     *
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Representative
     */
    public function setFirstName($name)
    {
        $this->firstName = $name;

        return $this;
    }

        /**
     * Get name
     *
     * @return string
     */
    public function getLastName()
    {
        if ($this->getRepresentativeStorage() && !$this->lastName) {
            return $this->getRepresentativeStorage()->getLastName();
        }

        return $this->lastName;
    }

     /**
     * Set name
     *
     * @param string $name
     *
     * @return Representative
     */
    public function setLastName($name)
    {
        $this->lastName = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

     /**
     * Set username
     *
     * @param string $username
     *
     * @return Representative
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Representative
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get user Roles
     *
     * @return Array
     */
    public function getRoles()
    {
        return array('ROLE_REPRESENTATIVE');
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getOfficialTitle()
    {
        if ($this->getRepresentativeStorage() && !$this->officialTitle) {
            return $this->getRepresentativeStorage()->getOfficialTitle();
        }

        return $this->officialTitle;
    }

     /**
     * Get username
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

     /**
     * Set officialTitle
     *
     * @param string $officialTitle
     *
     * @return Representative
     */
    public function setOfficialTitle($officialTitle)
    {
        $this->officialTitle = $officialTitle;

        return $this;
    }

    /**
     * Set country of address
     *
     * @param string $country
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country of address
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state of country
     *
     * @param string $state
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state of country
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    public function getOfficialState()
    {
        return $this->state;
    }

    public function getStateCode()
    {
        if ($this->state instanceof \Civix\CoreBundle\Entity\State) {
            return $this->state->getCode();
        }

        return null;
    }

    /**
     * Set city
     * @param string $city
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    public function getOfficialCity()
    {
        return $this->city;
    }

    /**
     * Set officialAddress
     *
     * @param string $officialAddress
     *
     * @return Representative
     */
    public function setOfficialAddress($officialAddress)
    {
        $this->officialAddress = $officialAddress;

        return $this;
    }

    /**
     * Get officialAddress
     *
     * @return string
     */
    public function getOfficialAddress()
    {
        if ($this->getRepresentativeStorage() && !$this->officialAddress) {
            return $this->getRepresentativeStorage()->getAddress();
        }

        return $this->officialAddress;
    }

    /**
     * Set officialPhone
     *
     * @param string $officialPhone
     *
     * @return Representative
     */
    public function setOfficialPhone($officialPhone)
    {
        $this->officialPhone = $officialPhone;

        return $this;
    }

    /**
     * Get officialPhone
     *
     * @return string
     */
    public function getOfficialPhone()
    {
        if ($this->getRepresentativeStorage() && !$this->officialPhone) {
            return $this->getRepresentativeStorage()->getPhone();
        }

        return $this->officialPhone;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Representative
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
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        if ($this->getRepresentativeStorage() && !$this->email) {
            return $this->getRepresentativeStorage()->getContactEmail();
        }

        return $this->email;
    }

     /**
     * Set email
     *
     * @param string $email
     *
     * @return Representative
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Erase credentials
     *
     */
    public function eraseCredentials()
    {

    }

    /**
     * Compare users
     *
     * @param UserInterface $user
     *
     * @return Bool
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Representative
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Representative
     */
    public function setAvatar(UploadedFile $avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get default avatar
     *
     * @return string
     */
    public function getDefaultAvatar()
    {
        return self::DEFAULT_AVATAR;
    }

    /**
     * Set avatarFileName
     *
     * @param string $avatarFileName
     *
     * @return Representative
     */
    public function setAvatarFileName($avatarFileName)
    {
        $this->avatarFileName = $avatarFileName;

        return $this;
    }

    /**
     * Get avatarFileName
     *
     * @return string
     */
    public function getAvatarFileName()
    {
        return $this->avatarFileName;
    }

    /**
     * Set avatarSourceFileName
     *
     * @param string $avatarSourceFileName
     *
     * @return Representative
     */
    public function setAvatarSourceFileName($avatarSourceFileName)
    {
        $this->avatarSourceFileName = $avatarSourceFileName;

        return $this;
    }

    /**
     * Get avatarSourceFileName
     *
     * @return string
     */
    public function getAvatarSourceFileName()
    {
        return $this->avatarSourceFileName;
    }

    /**
     * Set avatarSource
     *
     * @param string $avatarSource
     *
     * @return Representative
     */
    public function setAvatarSource($avatarSource)
    {
        $this->avatarSource = $avatarSource;

        return $this;
    }

    /**
     * Get avatarSource
     *
     * @return string
     */
    public function getAvatarSource()
    {
        return $this->avatarSource;
    }

    /**
     * Get DistrictId
     * @return Integer
     */
    public function getDistrictId()
    {
        $district = $this->getDistrict();

        return $district ? $district->getId() : null;
    }

     /**
     * Get StorageId
     * @return Integer
     */
    public function getStorageId()
    {
         return $this->storageId;
    }

    /**
     * Set StorageId
     * @param Integer $storageId
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setStorageId($storageId)
    {
        $this->storageId = $storageId;
        $this->setStorageUpdateAt(new \DateTime());

        return $this;
    }

    /**
     * Set avatarFilePath
     *
     * @param string $avatarFilePath
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setAvatarFilePath($avatarFilePath)
    {
        $this->avatarFilePath = $avatarFilePath;

        return $this;
    }

    /**
     * Get avatarFilePath
     *
     * @return string
     */
    public function getAvatarFilePath()
    {
        return $this->avatarFilePath;
    }

     /**
     * Set storage update date
     *
     * @param \DateTime $updateDate
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setStorageUpdateAt($updateDate)
    {
        $this->storageUpdateAt = $updateDate;

        return $this;
    }

    /**
     * Get storage update date
     *
     * @return \DateTime
     */
    public function getStorageUpdateAt()
    {
        return $this->storageUpdateAt;
    }

    /**
     * Get limit of question
     *
     * @return Integer
     */
    public function getQuestionLimit()
    {
        return $this->questionLimit;
    }

    /**
     * Set limit of question
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setQuestionLimit($limit)
    {
        $this->questionLimit = $limit;

        return $this;
    }

    /**
     * Get Non-Legislative District relation
     *
     * @return Integer
     */
    public function getIsNonLegislative()
    {
        return $this->isNonLegislative;
    }

    /**
     * Set Non-Legislative District relation
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function setIsNonLegislative($isNonLegislative)
    {
        $this->isNonLegislative = $isNonLegislative;

        return $this;
    }

    /**
     * Get representative storage
     *
     * @return \Civix\CoreBundle\Entity\RepresentativeStorage
     */
    public function getRepresentativeStorage()
    {
        return $this->representativeStorage;
    }

    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName . ' ('.$this->officialTitle.')';
    }

    /**
     * Check is representative in local district
     *
     * @return boolean
     */
    public function isLocalLeader()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->isLocalLeader();
        } elseif ($this->getDistrictId()) {
            return true;
        }

        return false;
    }

    /**
     * Set representativeStorage
     *
     * @param \Civix\CoreBundle\Entity\RepresentativeStorage $representativeStorage
     * @return Representative
     */
    public function setRepresentativeStorage(RepresentativeStorage $representativeStorage = null)
    {
        $this->representativeStorage = $representativeStorage;
    
        return $this;
    }

    /**
     * Set localGroup
     *
     * @param \Civix\CoreBundle\Entity\Group $localGroup
     * @return Representative
     */
    public function setLocalGroup(Group $localGroup = null)
    {
        $this->localGroup = $localGroup;
    
        return $this;
    }

    /**
     * Get localGroup
     *
     * @return \Civix\CoreBundle\Entity\Group 
     */
    public function getLocalGroup()
    {
        return $this->localGroup;
    }

    /**
     * Check if representative can to admin local group
     * 
     * @return boolean
     */
    public function isLocalAdmin()
    {
        return ($this->getLocalGroup() instanceof Group);
    }

    /**
     * Set district
     *
     * @param \Civix\CoreBundle\Entity\District $district
     * @return Representative
     */
    public function setDistrict(\Civix\CoreBundle\Entity\District $district = null)
    {
        $this->district = $district;
    
        return $this;
    }

    /**
     * Get district
     *
     * @return \Civix\CoreBundle\Entity\District 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("birthday")
     * @Serializer\Type("DateTime<'m/d/Y'>")
     */
    public function getBirthday()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getBirthday();
        }

        return null;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("start_term")
     * @Serializer\Type("DateTime<'m/d/Y'>")
     */
    public function getStartTerm()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getStartTerm();
        }

        return null;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("end_term")
     * @Serializer\Type("DateTime<'m/d/Y'>")
     */
    public function getEndTerm()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getEndTerm();
        }

        return null;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("facebook")
     */
    public function getFacebook()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getFacebook();
        }

        return null;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("twitter")
     */
    public function getTwitter()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getTwitter();
        }

        return null;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-info"})
     * @Serializer\SerializedName("youtube")
     */
    public function getYoutube()
    {
        if ($this->getRepresentativeStorage()) {
            return $this->getRepresentativeStorage()->getYoutube();
        }

        return null;
    }

    public function getAddressArray()
    {
        return [
            'city' => $this->getOfficialCity(),
            'line1' => $this->getOfficialAddress(),
            'line2' => '',
            'state' => $this->getOfficialState(),
            'postal_code' => '',
            'country_code' => 'US'
        ];
    }
}
