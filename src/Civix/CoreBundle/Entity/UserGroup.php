<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Group\GroupField;

/**
 * User follower
 *
 * @ORM\Table(
 *      name="users_groups",
 *      uniqueConstraints=
 *      {
 *          @ORM\UniqueConstraint(name="unique_user_group", columns={"user_id", "group_id"})
 *      }
 * )
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\UserGroupRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class UserGroup
{
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-groups"})
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User", inversedBy="groups", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="cascade")
     * @Serializer\Expose()
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="cascade")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     */
    private $group;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer", nullable=true)
     */
    private $group_id;

    /**
     * @var \DateTime created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-info", "api-groups"})
     * 
     */
    private $status;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_name", type="boolean", options={"default" = false})
     *
     */
    private $permissionsName;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_contacts", type="boolean", options={"default" = false})
     * @deprecated
     */
    private $permissionsContacts;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_address", type="boolean", options={"default" = false})
     *
     */
    private $permissionsAddress;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_email", type="boolean", options={"default" = false})
     *
     */
    private $permissionsEmail;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_phone", type="boolean", options={"default" = false})
     *
     */
    private $permissionsPhone;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @ORM\Column(name="permissions_responses", type="boolean", options={"default" = false})
     *
     */
    private $permissionsResponses;

    /**
     * @var \DateTime created_at
     * @Serializer\Expose()
     * @Serializer\Groups({"api-permissions"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s'>")
     * @ORM\Column(name="permissions_approved_at", type="datetime", nullable=true)
     */
    private $permissionsApprovedAt;
    
    public function __construct(User $user, Group $group)
    {
        $this->setUser($user);
        $this->setGroup($group);
        $this->setCreatedAt(new \DateTime());

        //set status according to membership control in group
        if ($group->getMembershipControl() == Group::GROUP_MEMBERSHIP_APPROVAL) {
            $this->setStatus(self::STATUS_PENDING);
        } else {
            $this->setStatus(self::STATUS_ACTIVE);
        }
        
        $this->setPermissionsName(false);
        $this->setPermissionsContacts(false);
        $this->setPermissionsEmail(false);
        $this->setPermissionsPhone(false);
        $this->setPermissionsAddress(false);
        $this->setPermissionsResponses(false);
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
     * @return UserGroup
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
     * Set user
     *
     * @param \Civix\CoreBundle\Entity\User $user
     * @return UserGroup
     */
    public function setUser(\Civix\CoreBundle\Entity\User $user)
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
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return UserGroup
     */
    public function setGroup(\Civix\CoreBundle\Entity\Group $group)
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
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param int $group_id
     * @return $this
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createdAt
     * @return UserGroup
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set permissionsName
     *
     * @param boolean $permissionsName
     * @return UserGroup
     */
    public function setPermissionsName($permissionsName)
    {
        $this->permissionsName = $permissionsName;
    
        return $this;
    }

    /**
     * Get permissionsName
     *
     * @return boolean 
     */
    public function getPermissionsName()
    {
        return $this->permissionsName;
    }

    /**
     * Set permissionsContacts
     *
     * @param boolean $permissionsContacts
     * @return UserGroup
     */
    public function setPermissionsContacts($permissionsContacts)
    {
        $this->permissionsContacts = $permissionsContacts;
    
        return $this;
    }

    /**
     * Get permissionsContacts
     *
     * @return boolean 
     */
    public function getPermissionsContacts()
    {
        return $this->permissionsContacts;
    }

    /**
     * Set permissionsResponses
     *
     * @param boolean $permissionsResponses
     * @return UserGroup
     */
    public function setPermissionsResponses($permissionsResponses)
    {
        $this->permissionsResponses = $permissionsResponses;
    
        return $this;
    }

    /**
     * Get permissionsResponses
     *
     * @return boolean 
     */
    public function getPermissionsResponses()
    {
        return $this->permissionsResponses;
    }

    /**
     * @return mixed
     */
    public function getPermissionsAddress()
    {
        return $this->permissionsAddress;
    }

    /**
     * @param mixed $permissionsAddress
     * @return $this
     */
    public function setPermissionsAddress($permissionsAddress)
    {
        $this->permissionsAddress = $permissionsAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermissionsEmail()
    {
        return $this->permissionsEmail;
    }

    /**
     * @param mixed $permissionsEmail
     * @return $this
     */
    public function setPermissionsEmail($permissionsEmail)
    {
        $this->permissionsEmail = $permissionsEmail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermissionsPhone()
    {
        return $this->permissionsPhone;
    }

    /**
     * @param mixed $permissionsPhone
     * @return $this
     */
    public function setPermissionsPhone($permissionsPhone)
    {
        $this->permissionsPhone = $permissionsPhone;

        return $this;
    }

    /**
     * Set permissionsApprovedAt
     *
     * @param \DateTime $permissionsApprovedAt
     * @return UserGroup
     */
    public function setPermissionsApprovedAt($permissionsApprovedAt)
    {
        $this->permissionsApprovedAt = $permissionsApprovedAt;
    
        return $this;
    }

    /**
     * Get permissionsApprovedAt
     *
     * @return \DateTime 
     */
    public function getPermissionsApprovedAt()
    {
        return $this->permissionsApprovedAt;
    }

    public function setPermissionsByGroup(Group $group)
    {
        if (!$group->getRequiredPermissions()) {
            return $this;
        }
        foreach ($group->getRequiredPermissions() as $permissionKey) {
            $method = 'set' . (str_replace('_', '', $permissionKey));
            $this->$method(true);
        }

        return $this;
    }

    public function getUserDataRow()
    {
        $user = $this->getUser();
        $result = [
            $this->getPermissionsName() ? $user->getFullName() : '',
            $this->getPermissionsAddress() ? implode(', ', $user->getAddressArray()) : '',
            $this->getPermissionsEmail() ? $user->getEmail() : '',
            $this->getPermissionsPhone() ? $user->getPhone() : '',
            $user->getFacebookId() ? 'Yes' : 'No',
        ];

        /* @var GroupField $field */
        foreach ($this->getGroup()->getFields() as $field) {
            $result[] = $field->getUserValue($user);
        }
        $result[] = $this->createdAt->format(\DateTime::RFC822);
        $result[] = $user->getFollowers()->count();

        return $result;
    }
}
