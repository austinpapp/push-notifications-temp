<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Civix\CoreBundle\Entity\Poll\Question;
use JMS\Serializer\Annotation as Serializer;

/**
 * Superuser question entity
 *
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class Superuser extends Question
{
    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Superuser")
     * @JoinColumn(name="superuser_id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    private $user;

    public function getType()
    {
        return 'superuser_question';
    }

    /**
     * Set user
     *
     * @param  \Civix\CoreBundle\Entity\Superuser $user
     * @return Superuser
     */
    public function setUser(\Civix\CoreBundle\Entity\Superuser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\Superuser
     */
    public function getUser()
    {
        return $this->user;
    }
}
