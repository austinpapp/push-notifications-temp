<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Poll\Question;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\LeaderEventRepository")
 * @Serializer\ExclusionPolicy("all")
 */
abstract class LeaderEvent extends Question
{
    /**
     * @ORM\Column(name="title", type="string")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $title;

    /**
     * @ORM\Column(name="is_allow_outsiders", type="boolean", options={"default" = false})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $isAllowOutsiders = false;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=false)
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s'>")
     */
    protected $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finished_at", type="datetime", nullable=false)
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s'>")
     */
    protected $finishedAt;

    /**
     * Set event title
     *
     * @param string $title
     * @return LeaderEvent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get Leader Event title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setIsAllowOutsiders($isAllowOutsiders)
    {
        $this->isAllowOutsiders = $isAllowOutsiders;

        return $this;
    }

    public function getIsAllowOutsiders()
    {
        return $this->isAllowOutsiders;
    }

   /**
     * @param \DateTime $startedAt
     * @return $this
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getStartedAt()
    {
        return $this->startedAt;
    }

    public function setFinishedAt($finishedAt)
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    public function getFinishedAt()
    {
        return $this->finishedAt;
    }
}
