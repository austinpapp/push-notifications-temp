<?php

namespace Civix\CoreBundle\Entity\Announcement;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Announcement;

/**
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class GroupAnnouncement extends Announcement
{
    /**
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return GroupAnnouncement
     */
    public function setUser(\Civix\CoreBundle\Entity\Group $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Civix\CoreBundle\Entity\Group 
     */
    public function getUser()
    {
        return $this->group;
    }
}
