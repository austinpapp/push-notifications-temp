<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\AnnouncementController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/announcements")
 */
class AnnouncementController extends Controller
{
    protected function getAnnouncementClass()
    {
        return '\Civix\CoreBundle\Entity\Announcement\RepresentativeAnnouncement';
    }

    protected function getSendPushMethodName()
    {
        return 'sendRepresentativeAnnouncementPush';
    }
}
