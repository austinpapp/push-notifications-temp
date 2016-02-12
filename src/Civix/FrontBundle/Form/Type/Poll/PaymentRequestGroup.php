<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\FormBuilderInterface;

class PaymentRequestGroup extends PaymentRequest
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paymentRequest', new PaymentRequestInfoGroup($this->user));
        $builder->add('educationalContext', new EducationalContext());
    }
}
