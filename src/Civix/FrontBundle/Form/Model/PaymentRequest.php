<?php

namespace Civix\FrontBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PaymentRequest
{

    /**
     * @Assert\Valid()
     */
    private $paymentRequest;

    /**
     * @Assert\Valid()
     */
    private $educationalContext;

    public function __construct(\Civix\CoreBundle\Entity\Poll\Question\PaymentRequest $paymentRequest = null)
    {
        $this->paymentRequest = $paymentRequest;
        $this->educationalContext = new EducationalContext($paymentRequest);

    }

    public function getPaymentRequest()
    {
        return $this->paymentRequest;
    }

    public function setPaymentRequest(\Civix\CoreBundle\Entity\Poll\Question\PaymentRequest $paymentRequest)
    {
        $this->paymentRequest = $paymentRequest;

        return $this;
    }

    public function getEducationalContext()
    {
        return $this->educationalContext;
    }

    public function setEducationalContext(EducationalContext $educationalContext)
    {
        $this->educationalContext = $educationalContext;

        return $this;
    }
}
