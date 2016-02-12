<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\AnnouncementController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/announcements")
 */
class AnnouncementController extends Controller
{
    protected function getAnnouncementClass()
    {
        return '\Civix\CoreBundle\Entity\Announcement\GroupAnnouncement';
    }

    protected function getSendPushMethodName()
    {
        return 'sendGroupAnnouncementPush';
    }
}
