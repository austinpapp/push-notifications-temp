<?php

namespace Civix\CoreBundle\Entity\Customer\Order;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;

/**
 * @ORM\Entity()
 */
class PaymentRequestOrder extends Order
{
    /**
     * @ORM\OneToOne(targetEntity="\Civix\CoreBundle\Entity\Poll\Question\PaymentRequest")
     * @ORM\JoinColumn(name="payment_request_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $paymentRequest;

    /**
     * @param mixed $paymentRequest
     * @return $this
     */
    public function setPaymentRequest($paymentRequest)
    {
        $this->paymentRequest = $paymentRequest;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentRequest()
    {
        return $this->paymentRequest;
    }
}
