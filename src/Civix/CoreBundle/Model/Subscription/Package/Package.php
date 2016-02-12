<?php

namespace Civix\CoreBundle\Model\Subscription\Package;

abstract class Package
{
    abstract public function getInviteByEmailLimitation();
    abstract public function getGroupDivisionLimitation();
    abstract public function getAnnouncementLimitation();
    abstract public function getMicropetitionLimitation();

    public function getGroupSizeLimitation()
    {
        return null;
    }

    public function isGroupJoinManagementAvailable()
    {
        return true;
    }

    public function isTargetedPetitionFundraisingAvailable()
    {
        return true;
    }

    public function getTargetedPetitionFundraisingPrice()
    {
        return 5;
    }
        
    public function getSumForPetitionInvites()
    {
        return 0;
    }

    public function getPetitionDataEmailPrice()
    {
        return 7;
    }
}