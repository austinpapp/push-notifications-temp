<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deferred Invites
 *
 * @ORM\Table(name="deferred_invites", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="unique_group", columns={"group_id", "email"})
 *   }
 * )
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\DeferredInvitesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class DeferredInvites
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime $dateCreate
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $dateCreate;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="cascade")
     */
    private $group;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", options={"default" = 0})
     */
    private $status = self::STATUS_ACTIVE;

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
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setDateCreate(new \DateTime());
    }
    
    /**
     * Set date create
     *
     * @param \DateTime $date
     *
     * @return DefferredInvites
     */
    public function setDateCreate(\DateTime $date)
    {
        $this->dateCreate = $date;

        return $this;
    }

    /**
     * Get date create
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     *
     * @return DefferredInvites
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
     * Set email
     *
     * @param $email
     *
     * @return DefferredInvites
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

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
