<?php

namespace Civix\CoreBundle\Entity\Announcement;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Announcement;

/**
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class RepresentativeAnnouncement extends Announcement
{

    /**
     * Set representative
     *
     * @param \Civix\CoreBundle\Entity\Representative $representative
     * @return Announcement
     */
    public function setUser(\Civix\CoreBundle\Entity\Representative $representative = null)
    {
        $this->representative = $representative;

        return $this;
    }

    /**
     * Get representative
     *
     * @return \Civix\CoreBundle\Entity\Representative 
     */
    public function getUser()
    {
        return $this->representative;
    }
}
