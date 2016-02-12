<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\ActivityReadRepository")
 * @ORM\Table(name="activities_read", indexes={
 *      @ORM\Index(name="user_activity_ind", columns={"activity_id", "user_id"}),
 *      @ORM\Index(name="created_ind", columns={"created_at"})
 * })
 * @Serializer\ExclusionPolicy("all")
 */
class ActivityRead
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity_id", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    private $activityId;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",  referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime()
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param int $activityId
     * @return $this
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}