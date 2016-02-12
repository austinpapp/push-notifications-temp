<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * GroupSection
 *
 * @ORM\Table(name="group_sections")
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\GroupSectionRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class GroupSection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups"})
     * @ORM\ManyToMany(targetEntity="User",  inversedBy="groupSections", cascade={"remove"})
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="groupSections")
     * @ORM\JoinColumn(name="group_id", onDelete="CASCADE")
     */
    private $group;

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
     * @return GroupSection
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
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param \Civix\CoreBundle\Entity\User $users
     * @return GroupSection
     */
    public function addUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Civix\CoreBundle\Entity\User $users
     */
    public function removeUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return GroupSection
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

    public function __toString()
    {
        return $this->getTitle();
    }
}
