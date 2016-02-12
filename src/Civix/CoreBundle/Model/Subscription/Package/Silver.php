<?php

namespace Civix\CoreBundle\Model\Subscription\Package;

class Silver extends Package
{
    public function getInviteByEmailLimitation()
    {
        return null;
    }

    public function getGroupDivisionLimitation()
    {
        return null;
    }

    public function getAnnouncementLimitation()
    {
        return 50;
    }

    public function getMicropetitionLimitation()
    {
        return null;
    }

    public function getGroupSizeLimitation()
    {
        return 1000;
    }

    public function getSumForPetitionInvites()
    {
        return 15;
    }
}
