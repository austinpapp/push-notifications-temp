<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\LeaderEventController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/leader-event")
 */
class LeaderEventController extends Controller
{
    public function getLeaderEventFormClass()
    {
        return '\Civix\FrontBundle\Form\Type\Poll\LeaderEvent';
    }
}
