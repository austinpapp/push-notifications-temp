<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\ReportContoller as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/reports")
 */
class ReportController extends Controller
{
    public function getQuestionClass()
    {
        return 'CivixCoreBundle:Poll\Question\Representative';
    }

    public function getEventClass()
    {
        return 'CivixCoreBundle:Poll\Question\RepresentativeEvent';
    }

    public function getPaymentRequestClass()
    {
        return 'CivixCoreBundle:Poll\Question\RepresentativePaymentRequest';
    }
}
