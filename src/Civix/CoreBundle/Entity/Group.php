<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as RecaptchaAssert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Avatar;
use Civix\CoreBundle\Entity\CheckingLimits;
use Civix\CoreBundle\Model\CropAvatarInterface;
use Civix\CoreBundle\Service\Micropetitions\PetitionManager;
use Civix\CoreBundle\Serializer\Type\JoinStatus;

/**
 * Group entity
 *
 * @ORM\Table(name="groups",  indexes={
 *      @ORM\Index(name="group_officialName_ind", columns={"official_name"})
 * })
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\GroupRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"username","officialName"}, groups={"registration", "user-registration"})
 * @Vich\Uploadable
 * @Serializer\ExclusionPolicy("all")
 */
class Group implements UserInterface, EquatableInterface, \Serializable, CheckingLimits, CropAvatarInterface
{
    const DEFAULT_AVATAR = '/bundles/civixfront/img/default_group.png';

    const GROUP_TYPE_COMMON = 0;
    const GROUP_TYPE_COUNTRY = 1;
    const GROUP_TYPE_STATE = 2;
    const GROUP_TYPE_LOCAL = 3;

    const GROUP_MEMBERSHIP_PUBLIC = 0;
    const GROUP_MEMBERSHIP_APPROVAL = 1;
    const GROUP_MEMBERSHIP_PASSCODE = 2;

    const COUNT_PETITION_PER_MONTH = 5;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups(
     *      {"api-activities", "api-poll", "api-groups", "api-search", "api-poll-public",
     *      "api-petitions-list", "api-petitions-info", "api-info", "api-invites-create", "api-invites"}
     * )
     */
    private $id;

    /**
     * @Serializer\Expose()
     * @Serializer\ReadOnly()
     * @Serializer\Groups({"api-activities", "api-poll", "api-search", "api-invites", "api-poll-public"})
     */
    private $type = 'group';

    /**
     * @var integer
     * 
     * @ORM\Column(name="group_type", type="smallint")
     * @Serializer\Expose()
     * @Serializer\Groups(
     *      {"api-activities", "api-poll", "api-groups", "api-search", "api-poll-public",
     *      "api-petitions-list", "api-petitions-info", "api-info", "api-invites", "api-create-by-user"}
     * )
     *  
     */
    private $groupType;

    /**
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\NotBlank(groups={"registration", "user-registration"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-create-by-user", "api-groups"})
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     * @var string
     */
    private $password;

     /**
     * @ORM\Column(name="salt", type="string", length=255)
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
     * @Serializer\Groups(
     *      {"api-activities", "api-poll","api-groups", "api-info", "api-search",
     *      "api-petitions-list", "api-petitions-info", "api-invites", "api-poll-public"}
     * )
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
     * @ORM\Column(name="manager_first_name", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-create-by-user"})
     */
    private $managerFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="manager_last_name", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-create-by-user"})
     */
    private $managerLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="manager_email", type="string", length=255, nullable=true)
     * @Assert\Email(groups={"registration"})
     * @Assert\NotBlank(groups={"registration"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-create-by-user"})
     */
    private $managerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="manager_phone", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-create-by-user"})
     */
    private $managerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="official_name", type="string", length=255, nullable=true, unique=true)
     * @Assert\NotBlank(groups={"registration", "user-registration"})
     * @Serializer\Expose()
     * @Serializer\Groups(
     *      {"api-activities", "api-poll","api-groups", "api-info", "api-search", "api-create-by-user",
     *      "api-petitions-list", "api-petitions-info", "api-invites", "api-poll-public"}
     * )
     * @Serializer\SerializedName("official_title")
     *
     */
    private $officialName;

    /**
     * @var string
     *
     * @ORM\Column(name="official_description", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-create-by-user"})
     */
    private $officialDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="acronym", type="string", length=4, nullable=true)
     * @Assert\Length(min = 2, max = 4, groups={"registration", "profile"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-groups", "api-poll-public", "api-create-by-user"})
     * @Serializer\Accessor(getter="getAcronym")
     */
    private $acronym;

    /**
     * @var string
     *
     * @ORM\Column(name="official_type", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups={"user-registration"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-create-by-user"})
     */
    private $officialType;

    /**
     * @var string
     *
     * @ORM\Column(name="official_address", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-create-by-user"})
     */
    private $officialAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="official_city", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-create-by-user"})
     */
    private $officialCity;

    /**
     * @var string
     *
     * @ORM\Column(name="official_state", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-create-by-user"})
     */
    private $officialState;

    /**
     * @RecaptchaAssert\True(groups={"registration"})
     */
    private $recaptcha;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups", "api-info"})
     * @Serializer\Type("JoinStatus")
     * @Serializer\Accessor(getter="getJoinStatus")
     * @var Integer
     */
    private $joined;

    /**
     * @ORM\OneToMany(targetEntity="UserGroup", mappedBy="group")
     */
    private $users;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="invites")
     */
    private $invites;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $owner;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     * @Serializer\Accessor(getter="getPicture")
     */
    protected $picture;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info"})
     */
    protected $totalMembers = 0;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

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
     * @Assert\Regex(
     *      pattern="/^\d+$/",
     *      message="The value cannot contain a non-numerical symbols"
     * )
     * @Assert\Range(
     *      min = 1,
     *      max = 50
     * )
     * @ORM\Column(name="petition_percent", type="integer", nullable=true)
     */
    private $petitionPercent;

    /**
     * @Assert\Regex(
     *      pattern="/^\d+$/",
     *      message="The value cannot contain a non-numerical symbols"
     * )
     * @Assert\Range(
     *      min = 1,
     *      max = 30
     * )
     * @ORM\Column(name="petition_duration", type="integer", nullable=true)
     */
    private $petitionDuration;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups", "api-info", "api-invites"})
     * @ORM\Column(
     *      name="membership_control",
     *      type="smallint",
     *      nullable=false,
     *      options={"default" = 0}
     * )
     */
    private $membershipControl;

    /**
     * @ORM\Column(name="membership_passcode", type="string", nullable=true)
     */
    private $membershipPasscode;

    /**
     * @ORM\ManyToOne(targetEntity="State", inversedBy="localGroups")
     * @ORM\JoinColumn(name="local_state", referencedColumnName="code")
     */
    private $localState;

    /**
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(name="local_district", referencedColumnName="id")
     */
    private $localDistrict;

    /**
     * @ORM\OneToMany(targetEntity="Representative", mappedBy="localGroup", cascade={"persist"})
     */
    private $localRepresentatives;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Civix\CoreBundle\Entity\Group\GroupField",
     *      mappedBy="group",
     *      cascade={"persist"},
     *      orphanRemoval=true
     * )
     * @Assert\Count(
     *      max = "5",
     *      maxMessage = "You can add up to 5 fields",
     *      groups = {"fields"}
     * )
     */
    private $fields;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Civix\CoreBundle\Entity\GroupSection",
     *      mappedBy="group"
     * )
     */
    private $groupSections;
    
    /**
     *
     * @ORM\Column(name="fill_fields_required", type="boolean", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups", "api-info", "api-invites"})
     */
    private $fillFieldsRequired = false;

    /**
     * @Assert\Regex(
     *      pattern="/^\d+$/",
     *      message="The value cannot contain a non-numerical symbols"
     * )
     * @ORM\Column(
     *      name="petition_per_month",
     *      type="integer",
     *      nullable=false,
     *      options={"default" = 5}
     * )
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     * @Serializer\Accessor(getter="getPetitionPerMonth")
     *
     * @var Integer
     */
    private $petitionPerMonth;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info"})
     * @Serializer\Accessor(getter="serializeRequiredPermissions")
     * @ORM\Column(name="required_permissions", type="array", nullable=true)
     */
    private $requiredPermissions = [];

    /**
     * @var \DateTime $permissionsChangedAt
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s'>")
     * @ORM\Column(name="permission_changed_at", type="datetime", nullable=true)
     */
    private $permissionsChangedAt;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="children")
     */
    private $parent;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="parent")
     */
    private $children;

    /**
     * @var string
     *
     * @ORM\Column(name="location_name", type="string", nullable=true)
     */
    private $locationName;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->invites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->localRepresentatives = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fields = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupSections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupType = self::GROUP_TYPE_COMMON;
        $this->membershipControl = self::GROUP_MEMBERSHIP_PUBLIC;
        $this->petitionPerMonth = self::COUNT_PETITION_PER_MONTH;
    }

    /**
     * Add invite
     *
     * @param \Civix\CoreBundle\Entity\User $user
     *
     * @return Group
     */
    public function addInvite(\Civix\CoreBundle\Entity\User $user)
    {
        $this->invites[] = $user;

        return $this;
    }

    /**
     * Remove invite
     *
     * @param \Civix\CoreBundle\Entity\User $user
     */
    public function removeInvite(\Civix\CoreBundle\Entity\User $user)
    {
        $this->invites->removeElement($user);
    }

    /**
     * Get invites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvites()
    {
        return $this->invites;
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
        return new Avatar($this);
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
     * Set totalMembers
     *
     * @param integer $count
     *
     * @return Group
     */
    public function setTotalMembers($count)
    {
        $this->totalMembers = $count;

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
     * @return Group
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
     * @return Group
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
     * Returns group role
     *
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_GROUP');
    }

    /**
     * Removes sensitive data from the user.
     *
     * @return void
     */
    public function eraseCredentials()
    {
    }

    /**
     * @param SymfonyUserInterface $user
     *
     * @return bool
     */
    public function isEqualTo(SymfonyUserInterface $user)
    {
        return $this->getUsername() === $user->getUsername();
    }

    /**
     * Serializes the group
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
                $this->id,
            ));
    }

    /**
     * Unserializes the group
     *
     * @param string $serialized
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getUsername();
    }

    /**
     * Set managerFirstName
     *
     * @param string $managerFirstName
     *
     * @return Group
     */
    public function setManagerFirstName($managerFirstName)
    {
        $this->managerFirstName = $managerFirstName;

        return $this;
    }

    /**
     * Get managerFirstName
     *
     * @return string
     */
    public function getManagerFirstName()
    {
        return $this->managerFirstName;
    }

    /**
     * Set managerLastName
     *
     * @param string $managerLastName
     *
     * @return Group
     */
    public function setManagerLastName($managerLastName)
    {
        $this->managerLastName = $managerLastName;

        return $this;
    }

    /**
     * Get managerLastName
     *
     * @return string
     */
    public function getManagerLastName()
    {
        return $this->managerLastName;
    }

    /**
     * Set managerEmail
     *
     * @param string $managerEmail
     *
     * @return Group
     */
    public function setManagerEmail($managerEmail)
    {
        $this->managerEmail = $managerEmail;

        return $this;
    }

    /**
     * Get managerEmail
     *
     * @return string
     */
    public function getManagerEmail()
    {
        return $this->managerEmail;
    }

    /**
     * Set managerPhone
     *
     * @param string $managerPhone
     *
     * @return Group
     */
    public function setManagerPhone($managerPhone)
    {
        $this->managerPhone = $managerPhone;

        return $this;
    }

    /**
     * Get managerPhone
     *
     * @return string
     */
    public function getManagerPhone()
    {
        return $this->managerPhone;
    }

    /**
     * Set officialName
     *
     * @param string $officialName
     *
     * @return Group
     */
    public function setOfficialName($officialName)
    {
        $this->officialName = $officialName;

        return $this;
    }

    /**
     * Get officialName
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->officialName;
    }

    /**
     * Set officialDescription
     *
     * @param string $officialDescription
     *
     * @return Group
     */
    public function setOfficialDescription($officialDescription)
    {
        $this->officialDescription = $officialDescription;

        return $this;
    }

    /**
     * Get officialDescription
     *
     * @return string
     */
    public function getOfficialDescription()
    {
        return $this->officialDescription;
    }

    /**
     * Set officialType
     *
     * @param string $officialType
     *
     * @return Group
     */
    public function setOfficialType($officialType)
    {
        $this->officialType = $officialType;

        return $this;
    }

    /**
     * Get officialType
     *
     * @return string
     */
    public function getOfficialType()
    {
        return $this->officialType;
    }

    /**
     * Set officialAddress
     *
     * @param string $officialAddress
     *
     * @return Group
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
        return $this->officialAddress;
    }

    /**
     * Set officialCity
     *
     * @param string $officialCity
     *
     * @return Group
     */
    public function setOfficialCity($officialCity)
    {
        $this->officialCity = $officialCity;

        return $this;
    }

    /**
     * Get officialCity
     *
     * @return string
     */
    public function getOfficialCity()
    {
        return $this->officialCity;
    }

    /**
     * Set officialState
     *
     * @param string $officialState
     *
     * @return Group
     */
    public function setOfficialState($officialState)
    {
        $this->officialState = $officialState;

        return $this;
    }

    /**
     * Get officialState
     *
     * @return string
     */
    public function getOfficialState()
    {
        return $this->officialState;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * Set avatarSource
     *
     * @param string $avatarSource
     *
     * @return Group
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
     * Set avatarSourceFileName
     *
     * @param string $avatarSourceFileName
     *
     * @return Group
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
     * Set avatarFilePath
     *
     * @param string $avatarFilePath
     *
     * @return Group
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

    public function getJoinStatus()
    {
        return new JoinStatus($this);
    }

    /**
     * Get Join status
     *
     * @return Integer
     */
    public function getJoined(User $user)
    {
        return $user->getGroups()->contains($this) ? 1 : 0;
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
     * Add users
     *
     * @param  \Civix\CoreBundle\Entity\UserGroup $users
     * @return Group
     */
    public function addUser(UserGroup $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Civix\CoreBundle\Entity\User $user
     */
    public function removeUser(UserGroup $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return new ArrayCollection(array_map(
            function ($usergroup) {
                return $usergroup->getUser();
            },
            $this->users->toArray()
        ));
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return $this
     */
    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedDate()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Request
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
     * @return \Civix\CoreBundle\Entity\Group
     */
    public function setQuestionLimit($limit)
    {
        $this->questionLimit = $limit;

        return $this;
    }

    /**
     * Get petition's percent
     *
     * @return Integer
     */
    public function getPetitionPercent()
    {
        return empty($this->petitionPercent)?
            PetitionManager::PERCENT_IN_GROUP : $this->petitionPercent;
    }

    /**
     * Set petition's percent
     *
     * @return \Civix\CoreBundle\Entity\Group
     */
    public function setPetitionPercent($percent)
    {
        $this->petitionPercent = $percent;

        return $this;
    }

    /**
     * Get petition's duration
     *
     * @return Integer
     */
    public function getPetitionDuration()
    {
        return empty($this->petitionDuration)?
            PetitionManager::EXPIRE_INTERVAL : $this->petitionDuration;
    }

    /**
     * Set petition's duration
     *
     * @return \Civix\CoreBundle\Entity\Group
     */
    public function setPetitionDuration($duration)
    {
        $this->petitionDuration = $duration;

        return $this;
    }

    public function getGroupType()
    {
        return $this->groupType;
    }

    public function setGroupType($type)
    {
        $this->groupType = $type;

        return $this;
    }

    /**
     * Set localState
     *
     * @param \Civix\CoreBundle\Entity\State $localState
     * @return Group
     */
    public function setLocalState(\Civix\CoreBundle\Entity\State $localState = null)
    {
        $this->localState = $localState;

        return $this;
    }

    /**
     * Get localState
     *
     * @return \Civix\CoreBundle\Entity\State 
     */
    public function getLocalState()
    {
        return $this->localState;
    }

    /**
     * Get localDistrictId
     *
     * @return integer 
     */
    public function getLocalDistrictId()
    {
        return $this->getLocalDistrict()->getId();
    }

    /**
     * Add localRepresentatives
     *
     * @param \Civix\CoreBundle\Entity\Representative $localRepresentatives
     * @return Group
     */
    public function addLocalRepresentative(\Civix\CoreBundle\Entity\Representative $localRepresentative)
    {
        $localRepresentative->setLocalGroup($this);
        $this->localRepresentatives[] = $localRepresentative;

        return $this;
    }

    /**
     * Remove localRepresentatives
     *
     * @param \Civix\CoreBundle\Entity\Representative $localRepresentatives
     */
    public function removeLocalRepresentative(\Civix\CoreBundle\Entity\Representative $localRepresentative)
    {
        $localRepresentative->setLocalGroup(null);
        $this->localRepresentatives->removeElement($localRepresentative);
    }

    /**
     * Get localRepresentatives
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocalRepresentatives()
    {
        return $this->localRepresentatives;
    }

    /**
     * Set localDistrict
     *
     * @param \Civix\CoreBundle\Entity\District $localDistrict
     * @return Group
     */
    public function setLocalDistrict(\Civix\CoreBundle\Entity\District $localDistrict = null)
    {
        $this->localDistrict = $localDistrict;
    
        return $this;
    }

    /**
     * Get localDistrict
     *
     * @return \Civix\CoreBundle\Entity\District 
     */
    public function getLocalDistrict()
    {
        return $this->localDistrict;
    }

    /**
     * Set membershipControl
     *
     * @param integer $membershipControl
     * @return Group
     */
    public function setMembershipControl($membershipControl)
    {
        $this->membershipControl = $membershipControl;

        return $this;
    }

    /**
     * Get membershipControl
     *
     * @return integer 
     */
    public function getMembershipControl()
    {
        return $this->membershipControl;
    }

    /**
     * Set membershipPasscode
     *
     * @param string $membershipPasscode
     * @return Group
     */
    public function setMembershipPasscode($membershipPasscode)
    {
        $this->membershipPasscode = $membershipPasscode;

        return $this;
    }

    /**
     * Get membershipPasscode
     *
     * @return string 
     */
    public function getMembershipPasscode()
    {
        return $this->membershipPasscode;
    }

    /**
     * Add fields
     *
     * @param \Civix\CoreBundle\Entity\Group\GroupField $fields
     * @return Group
     */
    public function addField(\Civix\CoreBundle\Entity\Group\GroupField $fields)
    {
        $this->fields[] = $fields;
    
        return $this;
    }

    /**
     * Remove fields
     *
     * @param \Civix\CoreBundle\Entity\Group\GroupField $fields
     */
    public function removeField(\Civix\CoreBundle\Entity\Group\GroupField $fields)
    {
        $this->fields->removeElement($fields);
    }

    /**
     * Get fields
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set fillFieldsRequired
     *
     * @param boolean $fillFieldsRequired
     * @return Group
     */
    public function setFillFieldsRequired($fillFieldsRequired)
    {
        $this->fillFieldsRequired = $fillFieldsRequired;
    
        return $this;
    }

    /**
     * Get fillFieldsRequired
     *
     * @return boolean 
     */
    public function getFillFieldsRequired()
    {
        return $this->fillFieldsRequired;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateFillFieldsRequired()
    {
        $this->fillFieldsRequired = (boolean) $this->fields->count();
    }

    public function getFieldsIds()
    {
        return $this->fields->count()>0?$this->fields->map(function ($groupField) {
                return $groupField->getId();
        })->toArray():false;
    }

    /**
     * Set petitionPerMonth
     *
     * @param integer $petitionPerMonth
     * @return Group
     */
    public function setPetitionPerMonth($petitionPerMonth)
    {
        $this->petitionPerMonth = $petitionPerMonth;
    
        return $this;
    }

    /**
     * Get petitionPerMonth
     *
     * @return integer 
     */
    public function getPetitionPerMonth()
    {
        return $this->petitionPerMonth === null ? self::COUNT_PETITION_PER_MONTH : $this->petitionPerMonth;
    }

    /**
     * Set acronym
     *
     * @param string $acronym
     * @return Group
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    
        return $this;
    }

    /**
     * Get acronym
     *
     * @return string 
     */
    public function getAcronym()
    {
        return $this->acronym ?: $this->getDefaultAcronym();
    }

    public function getDefaultAcronym()
    {
        if (self::GROUP_TYPE_COUNTRY === $this->getGroupType() || self::GROUP_TYPE_STATE === $this->getGroupType()) {
            return $this->getLocationName();
        }
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

    public function isCommercial()
    {
        return $this->getOfficialType() === 'Business';
    }

    public function getEmail()
    {
        return $this->getManagerEmail();
    }

    public function getRequiredPermissions()
    {
        return $this->requiredPermissions;
    }

    public function serializeRequiredPermissions()
    {
        return array_values($this->requiredPermissions);
    }

    public function setRequiredPermissions($permissions)
    {
        $this->requiredPermissions = $permissions;

        return $this;
    }

    public function hasRequiredPermissions($key)
    {
        return in_array($key, $this->requiredPermissions);
    }

    public function setPermissionsChangedAt($date)
    {
        $this->permissionsChangedAt = $date;

        return $this;
    }

    public function getPermissionsChangedAt()
    {
        return $this->permissionsChangedAt;
    }

    public function getGroupSections()
    {
        return $this->groupSections;
    }

    public function setGroupSections($groupSection)
    {
        $this->groupSections = $groupSection;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param string $locationName
     * @return $this
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     * @return $this
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return Group
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Group $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    public function isLocalGroup()
    {
        return $this->groupType === self::GROUP_TYPE_LOCAL;
    }

    public function isCountryGroup()
    {
        return $this->groupType === self::GROUP_TYPE_COUNTRY;
    }

    public function isStateGroup()
    {
        return $this->groupType === self::GROUP_TYPE_STATE;
    }
}
