<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use JMS\Serializer\Annotation as Serializer;

/**
 * Representative event entity
 *
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\LeaderEventRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class RepresentativeEvent extends LeaderEvent
{
    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @JoinColumn(name="representative_id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    private $user;

    public function getType()
    {
        return 'representative_event';
    }

    /**
     * Set user
     *
     * @param  \Civix\CoreBundle\Entity\Representative $user
     * @return Representative
     */
    public function setUser(\Civix\CoreBundle\Entity\Representative $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function getUser()
    {
        return $this->user;
    }
}
