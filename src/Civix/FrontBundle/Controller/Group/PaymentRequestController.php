<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\PaymentRequestController as Controller;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/payment-request")
 */
class PaymentRequestController extends Controller
{
    public function getPaymentRequestFormClass()
    {
        if (!$this->isAvailableGroupSection()) {
            return '\Civix\FrontBundle\Form\Type\Poll\PaymentRequest';
        }

        return '\Civix\FrontBundle\Form\Type\Poll\PaymentRequestGroup';
    }
}
