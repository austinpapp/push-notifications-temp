<?php

namespace Civix\CoreBundle\Model\Group;

interface GroupSectionInterface
{
    public function addGroupSection(\Civix\CoreBundle\Entity\GroupSection $section);
    public function removeGroupSection(\Civix\CoreBundle\Entity\GroupSection $section);
    public function getGroupSections();
}
