<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\PaymentRequestController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/payment-request")
 */
class PaymentRequestController extends Controller
{
    public function getPaymentRequestFormClass()
    {
        return '\Civix\FrontBundle\Form\Type\Poll\PaymentRequest';
    }
}
