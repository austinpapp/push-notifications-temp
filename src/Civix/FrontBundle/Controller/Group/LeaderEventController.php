<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\LeaderEventController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/leader-event")
 */
class LeaderEventController extends Controller
{
    public function getLeaderEventFormClass()
    {
        if (!$this->isAvailableGroupSection()) {
            return '\Civix\FrontBundle\Form\Type\Poll\LeaderEvent';
        }

        return '\Civix\FrontBundle\Form\Type\Poll\LeaderEventGroup';
    }
}
