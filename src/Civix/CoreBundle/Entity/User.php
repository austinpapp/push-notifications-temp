<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Civix\CoreBundle\Serializer\Type\Avatar;
use Civix\CoreBundle\Entity\UserFollow;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Validator\Constrains\ConstrainsFacebookToken;


/**
 * User
 *
 * @ORM\Table(name="user", indexes={
 *      @ORM\Index(name="ios_token", columns={"ios_token"}),
 *      @ORM\Index(name="android_token", columns={"android_token"}),
 *      @ORM\Index(name="user_token", columns={"token"}),
 *      @ORM\Index(name="user_firstName_ind", columns={"firstName"}),
 *      @ORM\Index(name="user_lastName_ind", columns={"lastName"})
 * })
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\UserRepository")
 * @UniqueEntity(
 *      fields={"username"},
 *      groups={"registration", "profile"}
 * )
 * @UniqueEntity(
 *      fields={"email"},
 *      groups={"registration", "profile"}
 * )
 * @UniqueEntity(
 *      fields={"facebookId"},
 *      groups={"facebook"},
 *      message="This Facebook account is already linked to other Civix account."
 * )
 * @Serializer\ExclusionPolicy("all")
 * @Vich\Uploadable
 */
class User implements UserInterface, \Serializable
{
    const DEFAULT_AVATAR = '/bundles/civixfront/img/default_user.png';
    const SOMEONE_AVATAR = '/bundles/civixfront/img/default_someone.png';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-info", "api-device", "api-comments", "api-settings", "api-full-info",
     *      "api-session", "api-petitions-list", "api-petitions-info", "api-activities", "api-search", "api-invites",
     *      "api-invites-create", "api-follow-create", "api-leader-answers"}
     * )
     */
    private $id;

    /**
     * @Serializer\Expose()
     * @Serializer\ReadOnly()
     * @Serializer\Groups({"api-activities", "api-poll", "api-search", "api-comments", "api-full-info", "api-invites"})
     */
    private $type = 'user';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Serializer\Expose()
     * @Serializer\Groups(
     *      {"api-profile", "api-info", "api-comments", "api-session", "api-full-info", "api-public",
     *      "api-petitions-list", "api-petitions-info", "api-search", "api-invites", "api-leader-answers"}
     * )
     * @Assert\NotBlank(groups={"registration", "profile"})
     * @Assert\Regex(pattern="/^[a-zA-Z0-9._-]+[a-zA-Z0-9]$/", match="true", groups={"registration", "profile"})
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({
     *  "api-profile", "api-comments", "api-info", "api-petitions-list",
     *  "api-petitions-info", "api-search", "api-full-info", "api-invites", "api-leader-answers"
     * })
     * @Serializer\SerializedName("first_name")
     * @Assert\NotBlank(groups={"registration", "profile"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({
     *  "api-profile", "api-comments", "api-info", "api-petitions-list", 
     *  "api-petitions-info", "api-search", "api-full-info", "api-invites", "api-leader-answers"
     * })
     * @Serializer\SerializedName("last_name")
     * @Assert\NotBlank(groups={"registration", "profile"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     * @Serializer\SerializedName("official_title")
     * @Serializer\Accessor(getter="getOfficialName")
     */
    private $officialName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     * @Assert\NotBlank(groups={"registration", "profile"})
     * @Assert\Email(groups={"registration", "profile"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     * @Assert\NotBlank(groups={"registration", "profile"})
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Type("Avatar")
     * @Serializer\Groups({"api-profile", "api-info", "api-petitions-list", "api-petitions-info", "api-full-info",
     *      "api-activities", "api-search", "api-comments", "api-invites"})
     * @Serializer\Accessor(getter="getAvatarWithPath")
     */
    private $avatarFileName;

    /**
     * @Vich\UploadableField(mapping="avatar_image", fileNameProperty="avatarFileName")
     */

    private $avatar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="date", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-info", "api-full-info", "api-leader-answers"})
     * @Serializer\Type("DateTime<'m/d/Y'>")
     */
    private $birth;

    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-full-info", "api-leader-answers"})
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-full-info", "api-leader-answers"})
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-info", "api-full-info", "api-leader-answers"})
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookLink", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-full-info"})
     */
    private $facebookLink;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterLink", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-full-info"})
     */
    private $twitterLink;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $orientation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="maritalStatus", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $religion;

    /**
     * @var string
     *
     * @ORM\Column(name="employmentStatus", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     * @Serializer\SerializedName("employment_status")
     */
    private $employmentStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="incomeLevel", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     * @Serializer\SerializedName("income_level")
     */
    private $incomeLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="educationLevel", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     * @Serializer\SerializedName("education_level")
     */
    private $educationLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="party", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $party;

    /**
     * @var string
     *
     * @ORM\Column(name="philosophy", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $philosophy;

    /**
     * @var string
     *
     * @ORM\Column(name="donor", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $donor;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="text", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     */
    private $slogan;

    /**
     * @var array
     *
     * @ORM\Column(name="interests", type="array", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $interests;

    /**
     * @var string
     *
     * @ORM\Column(name="registration", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-leader-answers"})
     */
    private $registration;

    /**
     * @var string
     * @Serializer\Expose()
     * @Serializer\Groups({"api-session"})
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var string
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true, unique=true)
     * @Assert\NotBlank(groups={"facebook"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile"})
     */
    private $facebookId;

    /**
     * @var string
     * @ORM\Column(name="facebook_token", type="string", length=255, nullable=true)
     * @ConstrainsFacebookToken(groups={"facebook"})
     */
    private $facebookToken;

    private $avatarPath;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="upd_profile_at", type="date", nullable=true)
     */
    private $updateProfileAt;

    /**
     * @deprecated Use Notification\IOSEndpoint instead (Amazon SNS integration)
     *
     * @var string
     *
     * @ORM\Column(name="ios_token", type="string", length=64, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-device"})
     */
    private $iosDevice;

    /**
     * @deprecated Use Notification\AndroidEndpoint instead (Amazon SNS integration)
     *
     * @var string
     *  
     * @ORM\Column(name="android_token", type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-device"})
     */
    private $androidDevice;

    /**
     *
     * @ORM\OneToMany(targetEntity="Civix\CoreBundle\Entity\UserGroup", mappedBy="user", cascade={"remove", "persist"})
     */
    private $groups;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="invites", cascade={"remove"})
     * @ORM\JoinTable(name="notification_invites",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $invites;
    
    /**
     * @ORM\OneToMany(targetEntity="Civix\CoreBundle\Entity\UserFollow",
     *      mappedBy="follower", cascade={"remove","persist"}
     * )
     */
    private $following;

    /**
     * @ORM\OneToMany(targetEntity="Civix\CoreBundle\Entity\UserFollow", mappedBy="user", cascade={"remove","persist"})
     */
    private $followers;

    /**
     *
     * @ORM\ManyToMany(targetEntity="District", inversedBy="users", cascade={"remove"})
     * @ORM\JoinTable(name="users_districts",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="district_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $districts;

    /**
     *
     * @ORM\ManyToMany(targetEntity="GroupSection", mappedBy="users")
     */
    private $groupSections;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = false})
     */
    private $doNotDisturb;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isNotifQuestions;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isNotifDiscussions;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isNotifMessages;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isNotifMicroFollowing;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isNotifMicroGroup;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @ORM\Column(type="boolean", options={"default" = false})
     */
    private $isNotifScheduled;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     * @ORM\Column(type="time", nullable=true)
     */
    private $scheduledFrom;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-settings"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     * @ORM\Column(type="time", nullable=true)
     */
    private $scheduledTo;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-profile", "api-session"})
     * @ORM\Column(type="boolean", options={"default" = true})
     */
    private $isRegistrationComplete;

    /**
     * @ORM\Column(name="reset_password_at", type="date", nullable=true)
     */
    private $resetPasswordAt;

    /**
     * @ORM\Column(name="reset_password_token", type="string", length=255, nullable=true)
     */
    private $resetPasswordToken;

    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Type("string")
     * @Serializer\Groups({"api-change-password"})
     */
    private $plainPassword;

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->groups = new ArrayCollection();
        $this->country = 'US';
        $this->following = new \Doctrine\Common\Collections\ArrayCollection();
        $this->followers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->invites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->districts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupSections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->interests = [];

        $this->isRegistrationComplete = true;

        //default settings
        $this->doNotDisturb = false;
        $this->isNotifDiscussions = true;
        $this->isNotifMessages = true;
        $this->isNotifMicroFollowing = true;
        $this->isNotifMicroGroup = true;
        $this->isNotifQuestions = true;
        $this->isNotifScheduled = false;
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
     * Add invite
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     *
     * @return User
     */
    public function addInvite(\Civix\CoreBundle\Entity\Group $group)
    {
        $this->invites[] = $group;

        return $this;
    }

    /**
     * Remove invite
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     */
    public function removeInvite(\Civix\CoreBundle\Entity\Group $group)
    {
        $this->invites->removeElement($group);
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
     * Add following
     *
     * @param \Civix\CoreBundle\Entity\User $following
     *
     * @return User
     */
    public function addFollowing(UserFollow $following)
    {
        $this->following[] = $following;

        return $this;
    }

    /**
     * Remove following
     *
     * @param \Civix\CoreBundle\Entity\UserFollow $following
     */
    public function removeFollowing(UserFollow $following)
    {
        $this->following->removeElement($following);
    }

    /**
     * Get following
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFollowing()
    {
        return $this->following;
    }

    /**
     * Add follower
     *
     * @param \Civix\CoreBundle\Entity\User $follower
     *
     * @return User
     */
    public function addFollower(UserFollow $follower)
    {
        $this->followers[] = $follower;

        return $this;
    }

    /**
     * Remove follower
     *
     * @param \Civix\CoreBundle\Entity\UserFollow $follower
     */
    public function removeFollower(UserFollow $follower)
    {
        $this->followers->removeElement($follower);
    }

    /**
     * Get followers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
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
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return User
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
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

    public function getAvatarWithPath($privacy = false)
    {
        return new Avatar($this, $privacy);
    }

    public function setAvatarPath($path)
    {
        $this->avatarPath = $path;

        return $this;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     *
     * @return User
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return User
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return User
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
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

    /**
     * Set state
     *
     * @param string $state
     *
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get country
     *
     * @return String
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param String $country
     *
     * @return \Civix\CoreBundle\Entity\User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set facebookLink
     *
     * @param string $facebookLink
     *
     * @return User
     */
    public function setFacebookLink($facebookLink)
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    /**
     * Get facebookLink
     *
     * @return string
     */
    public function getFacebookLink()
    {
        return $this->facebookLink;
    }

    /**
     * Set twitterLink
     *
     * @param string $twitterLink
     *
     * @return User
     */
    public function setTwitterLink($twitterLink)
    {
        $this->twitterLink = $twitterLink;

        return $this;
    }

    /**
     * Get twitterLink
     *
     * @return string
     */
    public function getTwitterLink()
    {
        return $this->twitterLink;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return User
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set maritalStatus
     *
     * @param string $maritalStatus
     *
     * @return User
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set religion
     *
     * @param string $religion
     *
     * @return User
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return string
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set employmentStatus
     *
     * @param string $employmentStatus
     *
     * @return User
     */
    public function setEmploymentStatus($employmentStatus)
    {
        $this->employmentStatus = $employmentStatus;

        return $this;
    }

    /**
     * Get employmentStatus
     *
     * @return string
     */
    public function getEmploymentStatus()
    {
        return $this->employmentStatus;
    }

    /**
     * Set incomeLevel
     *
     * @param string $incomeLevel
     *
     * @return User
     */
    public function setIncomeLevel($incomeLevel)
    {
        $this->incomeLevel = $incomeLevel;

        return $this;
    }

    /**
     * Get incomeLevel
     *
     * @return string
     */
    public function getIncomeLevel()
    {
        return $this->incomeLevel;
    }

    /**
     * Set educationLevel
     *
     * @param string $educationLevel
     *
     * @return User
     */
    public function setEducationLevel($educationLevel)
    {
        $this->educationLevel = $educationLevel;

        return $this;
    }

    /**
     * Get educationLevel
     *
     * @return string
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get user Roles
     *
     * @return Array
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Erase credentials
     *
     */
    public function eraseCredentials()
    {

    }

    public function generateToken()
    {
        $bytes = false;
        if (function_exists('openssl_random_pseudo_bytes') && 0 !== stripos(PHP_OS, 'win')) {
            $bytes = openssl_random_pseudo_bytes(32, $strong);

            if (true !== $strong) {
                $bytes = false;
            }
        }

        if (false === $bytes) {
            $bytes = hash('sha256', uniqid(mt_rand(), true), true);
        }

        $this->setToken(base_convert(bin2hex($bytes), 16, 36) . $this->getId());
    }

    /**
     * Get all districts ids
     *
     * @return array
     */
    public function getDistrictsIds()
    {
        $districtsIds = $this->districts->map(function ($district) {
                return $district->getId();
        })->toArray();

        return empty($districtsIds)?false:$districtsIds;
    }

     /**
     * Set profile update date
     *
     * @param \DateTime $updateDate
     *
     * @return User
     */
    public function setUpdateProfileAt($updateDate)
    {
        $this->updateProfileAt = $updateDate;

        return $this;
    }

    /**
     * Get profile update date
     *
     * @return \DateTime
     */
    public function getUpdateProfileAt()
    {
        return $this->updateProfileAt;
    }

    /**
     * Get ios token device of user
     * 
     * @return string
     */
    public function getIosDevice()
    {
        return $this->iosDevice;
    }

    /**
     * Set android token device of user
     * 
     * @param string $token
     * 
     * @return \Civix\CoreBundle\Entity\User
     */
    public function setIosToken($token)
    {
        $this->iosDevice = $token;

        return $this;
    }

    /**
     * Get android token device of user
     * 
     * @return string
     */
    public function getAndroidDevice()
    {
        return $this->androidDevice;
    }

    /**
     * Set android token device of user
     * 
     * @param string $token
     * 
     * @return \Civix\CoreBundle\Entity\User
     */
    public function setAndroidToken($token)
    {
        $this->androidDevice = $token;

        return $this;
    }

    public function getUserGroups()
    {
        return $this->groups;
    }

    /**
     * Return joined to user groups
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGroups()
    {
        $groups = array_reduce($this->groups->toArray(), function ($result, UserGroup $userGroup) {
            if ($userGroup->getStatus() === UserGroup::STATUS_ACTIVE) {
                $result[] = $userGroup->getGroup();
            }

            return $result;
        }, []);

        return new ArrayCollection($groups);
    }

    /**
     * Remove group
     *
     * @param \Civix\CoreBundle\Entity\UserGroup $group
     */
    public function removeGroup(UserGroup $group)
    {
        $this->groups->removeElement($group);
    }

    public function getLineAddress()
    {
        return $this->address1 . ' ' . $this->address2;
    }

    public function getGroupsIds()
    {
        return $this->groups->map(function ($userGroup) {
                return $userGroup->getGroup()->getId();
        })->toArray();
    }

    public function getFollowingIds()
    {
        return $this->following->map(function ($userFollow) {
                    return $userFollow->getUser()->getId();
        })->toArray();
    }

    /**
     * Serializes the user
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
     * Unserializes the user
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
     * Get officialName
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Add districts
     *
     * @param \Civix\CoreBundle\Entity\District $districts
     * @return User
     */
    public function addDistrict(\Civix\CoreBundle\Entity\District $district)
    {
        if (!$this->districts->contains($district)) {
            $this->districts[] = $district;
        }

        return $this;
    }

    /**
     * Remove districts
     *
     * @param \Civix\CoreBundle\Entity\District $districts
     */
    public function removeDistrict(\Civix\CoreBundle\Entity\District $districts)
    {
        $this->districts->removeElement($districts);
    }

    /**
     * Get districts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDistricts()
    {
        return $this->districts;
    }

    /**
     * Add section
     *
     * @param \Civix\CoreBundle\Entity\GroupSection $section
     * @return User
     */
    public function addGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        if (!$this->groupSections->contains($section)) {
            $this->groupSections[] = $section;
        }

        return $this;
    }

    /**
     * Remove section
     *
     * @param \Civix\CoreBundle\Entity\GroupSection $section
     */
    public function removeGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        $this->groupSections->removeElement($section);
    }

    /**
     * Get section
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupSections()
    {
        return $this->groupSections;
    }

    /**
     * Get all group sections ids
     *
     * @return array
     */
    public function getGroupSectionsIds()
    {
        $sectionsIds = $this->groupSections->map(function ($section) {
                return $section->getId();
        })->toArray();

        return empty($sectionsIds)?false:$sectionsIds;
    }
    
    /**
     * Set doNotDisturb
     *
     * @param boolean $doNotDisturb
     * @return User
     */
    public function setDoNotDisturb($doNotDisturb)
    {
        $this->doNotDisturb = $doNotDisturb;
    
        return $this;
    }

    /**
     * Get doNotDisturb
     *
     * @return boolean 
     */
    public function getDoNotDisturb()
    {
        return $this->doNotDisturb;
    }

    /**
     * Set isNotifQuestions
     *
     * @param boolean $isNotifQuestions
     * @return User
     */
    public function setIsNotifQuestions($isNotifQuestions)
    {
        $this->isNotifQuestions = $isNotifQuestions;
    
        return $this;
    }

    /**
     * Get isNotifQuestions
     *
     * @return boolean 
     */
    public function getIsNotifQuestions()
    {
        return $this->isNotifQuestions;
    }

    /**
     * Set isNotifDiscussions
     *
     * @param boolean $isNotifDiscussions
     * @return User
     */
    public function setIsNotifDiscussions($isNotifDiscussions)
    {
        $this->isNotifDiscussions = $isNotifDiscussions;
    
        return $this;
    }

    /**
     * Get isNotifDiscussions
     *
     * @return boolean 
     */
    public function getIsNotifDiscussions()
    {
        return $this->isNotifDiscussions;
    }

    /**
     * Set isNotifMessages
     *
     * @param boolean $isNotifMessages
     * @return User
     */
    public function setIsNotifMessages($isNotifMessages)
    {
        $this->isNotifMessages = $isNotifMessages;
    
        return $this;
    }

    /**
     * Get isNotifMessages
     *
     * @return boolean 
     */
    public function getIsNotifMessages()
    {
        return $this->isNotifMessages;
    }

    /**
     * Set isNotifMicroFollowing
     *
     * @param boolean $isNotifMicroFollowing
     * @return User
     */
    public function setIsNotifMicroFollowing($isNotifMicroFollowing)
    {
        $this->isNotifMicroFollowing = $isNotifMicroFollowing;
    
        return $this;
    }

    /**
     * Get isNotifMicroFollowing
     *
     * @return boolean 
     */
    public function getIsNotifMicroFollowing()
    {
        return $this->isNotifMicroFollowing;
    }

    /**
     * Set isNotifMicroGroup
     *
     * @param boolean $isNotifMicroGroup
     * @return User
     */
    public function setIsNotifMicroGroup($isNotifMicroGroup)
    {
        $this->isNotifMicroGroup = $isNotifMicroGroup;
    
        return $this;
    }

    /**
     * Get isNotifMicroGroup
     *
     * @return boolean 
     */
    public function getIsNotifMicroGroup()
    {
        return $this->isNotifMicroGroup;
    }

    /**
     * Add groups
     *
     * @param \Civix\CoreBundle\Entity\UserGroup $usergroup
     * @return User
     */
    public function addGroup(UserGroup $usergroup)
    {
        $this->groups[] = $usergroup;
    
        return $this;
    }

    /**
     * Set isNotifSchedule
     *
     * @param boolean $isNotifSchedule
     * @return User
     */
    public function setIsNotifScheduled($isNotifSchedule)
    {
        $this->isNotifScheduled = $isNotifSchedule;
    
        return $this;
    }

    /**
     * Get isNotifSchedule
     *
     * @return boolean 
     */
    public function getIsNotifScheduled()
    {
        return $this->isNotifScheduled;
    }

    /**
     * Set scheduleFrom
     *
     * @param \DateTime $scheduleFrom
     * @return User
     */
    public function setScheduledFrom($scheduleFrom)
    {
        $this->scheduledFrom = $scheduleFrom;
    
        return $this;
    }

    /**
     * Get scheduleFrom
     *
     * @return \DateTime 
     */
    public function getScheduledFrom()
    {
        return $this->scheduledFrom;
    }

    /**
     * Set scheduleTo
     *
     * @param \DateTime $scheduleTo
     * @return User
     */
    public function setScheduledTo($scheduleTo)
    {
        $this->scheduledTo = $scheduleTo;
    
        return $this;
    }

    /**
     * Get scheduleTo
     *
     * @return \DateTime 
     */
    public function getScheduledTo()
    {
        return $this->scheduledTo;
    }

    /**
     * Set orientation
     *
     * @param string $orientation
     * @return User
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    
        return $this;
    }

    /**
     * Get orientation
     *
     * @return string 
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set party
     *
     * @param string $party
     * @return User
     */
    public function setParty($party)
    {
        $this->party = $party;
    
        return $this;
    }

    /**
     * Get party
     *
     * @return string 
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * Set philosophy
     *
     * @param string $philosophy
     * @return User
     */
    public function setPhilosophy($philosophy)
    {
        $this->philosophy = $philosophy;
    
        return $this;
    }

    /**
     * Get philosophy
     *
     * @return string 
     */
    public function getPhilosophy()
    {
        return $this->philosophy;
    }

    /**
     * Set donor
     *
     * @param string $donor
     * @return User
     */
    public function setDonor($donor)
    {
        $this->donor = $donor;
    
        return $this;
    }

    /**
     * Get donor
     *
     * @return string 
     */
    public function getDonor()
    {
        return $this->donor;
    }

    /**
     * Set registration
     *
     * @param string $registration
     * @return User
     */
    public function setRegistration($registration)
    {
        $this->registration = $registration;
    
        return $this;
    }

    /**
     * Get registration
     *
     * @return string 
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * @return string
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * @param string $slogan
     * @return $this
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     * @return $this
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return array
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param array $interests
     * @return $this
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;

        return $this;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookToken
     *
     * @param string $facebookToken
     * @return User
     */
    public function setFacebookToken($facebookToken)
    {
        $this->facebookToken = $facebookToken;

        return $this;
    }

    /**
     * Get facebookToken
     *
     * @return string 
     */
    public function getFacebookToken()
    {
        return $this->facebookToken;
    }

    /**
     * Set isRegistrationComplete
     *
     * @param boolean $isRegistrationComplete
     * @return User
     */
    public function setIsRegistrationComplete($isRegistrationComplete)
    {
        $this->isRegistrationComplete = $isRegistrationComplete;
    
        return $this;
    }

    /**
     * Get isRegistrationComplete
     *
     * @return boolean 
     */
    public function getIsRegistrationComplete()
    {
        return $this->isRegistrationComplete;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return $this
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @param string $avatarFileName
     */
    public function setAvatarFileName($avatarFileName)
    {
        $this->avatarFileName = $avatarFileName;
    }

    /**
     * @return string
     */
    public function getAvatarFileName()
    {
        return $this->avatarFileName;
    }

    /**
     * Set resetPasswordAt
     *
     * @param \DateTime $resetPasswordAt
     * @return User
     */
    public function setResetPasswordAt($resetPasswordAt)
    {
        $this->resetPasswordAt = $resetPasswordAt;
    
        return $this;
    }

    /**
     * Get resetPasswordAt
     *
     * @return \DateTime 
     */
    public function getResetPasswordAt()
    {
        return $this->resetPasswordAt;
    }

    /**
     * Set resetPasswordToken
     *
     * @param string $resetPasswordToken
     * @return User
     */
    public function setResetPasswordToken($resetPasswordToken)
    {
        $this->resetPasswordToken = $resetPasswordToken;
    
        return $this;
    }

    /**
     * Get resetPasswordToken
     *
     * @return string 
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @Serializer\Groups({"api-profile", "api-info", "api-petitions-list", "api-petitions-info",
     *      "api-activities", "api-search", "api-comments"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("full_name")
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getAddressArray()
    {
        return [
            'city' => $this->getCity(),
            'line1' => $this->getAddress1(),
            'line2' => $this->getAddress2(),
            'state' => $this->getState(),
            'postal_code' => $this->getZip(),
            'country_code' => $this->getCountry()
        ];
    }

    public function getAddressQuery()
    {
        return $this->getAddress1() . ',' . $this->getCity() . ',' . $this->getState() . ',' . $this->getCountry();
    }
}
