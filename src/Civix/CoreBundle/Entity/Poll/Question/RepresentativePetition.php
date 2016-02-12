<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use JMS\Serializer\Annotation as Serializer;

/**
 * Representative petition entity
 *
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class RepresentativePetition extends Petition
{
    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @JoinColumn(name="representative_id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    private $user;

    public function getType()
    {
        return 'representative_petition';
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
