<?php

namespace Civix\CoreBundle\Model\Subscription\Package;

class Gold extends Package
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
        return null;
    }


    public function getMicropetitionLimitation()
    {
        return null;
    }

    public function getGroupSizeLimitation()
    {
        return 5000;
    }
}
