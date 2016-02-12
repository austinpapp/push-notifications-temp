<?php

namespace Civix\CoreBundle\Model\Subscription\Package;

class Free extends Package
{
    public function getInviteByEmailLimitation()
    {
        return 100;
    }

    public function getGroupDivisionLimitation()
    {
        return -1;
    }

    public function getAnnouncementLimitation()
    {
        return null;
    }

    public function getMicropetitionLimitation()
    {
        return -1;
    }

    public function isGroupJoinManagementAvailable()
    {
        return false;
    }

    public function isTargetedPetitionFundraisingAvailable()
    {
        return false;
    }

    public function getSumForPetitionInvites()
    {
        return 25;
    }

    public function getPetitionDataEmailPrice()
    {
        return 10;
    }
}
