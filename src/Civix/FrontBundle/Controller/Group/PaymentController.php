<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\PaymentController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PaymentController extends Controller
{
    public function getCustomerClass()
    {
        return '\Civix\CoreBundle\Entity\Customer\CustomerGroup';
    }
}
