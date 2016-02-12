<?php

namespace Civix\CoreBundle\Model\Group;

trait GroupSectionTrait
{
    /**
     * Add group section
     *
     * @param \Civix\CoreBundle\Entity\GroupSection $section
     * @return Group
     */
    public function addGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        if (!$this->groupSections->contains($section)) {
            $this->groupSections[] = $section;
        }

        return $this;
    }

    /**
     * Remove section
     *
     * @param \Civix\CoreBundle\Entity\GroupSection $section
     */
    public function removeGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        $this->groupSections->removeElement($section);
    }
    
    public function getGroupSections()
    {
        return $this->groupSections;
    }
}
