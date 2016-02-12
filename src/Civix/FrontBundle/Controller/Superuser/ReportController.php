<?php

namespace Civix\FrontBundle\Controller\Superuser;

use Civix\FrontBundle\Controller\ReportContoller as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/reports")
 */
class ReportController extends Controller
{
    public function getQuestionClass()
    {
        return 'CivixCoreBundle:Poll\Question\Superuser';
    }

    public function getEventClass()
    {
        throw new \Civix\CoreBundle\Exception\LogicException('Superuser can\'t create events');
    }

    public function getPaymentRequestClass()
    {
        throw new \Civix\CoreBundle\Exception\LogicException('Superuser can\'t create payment requests');
    }
}
