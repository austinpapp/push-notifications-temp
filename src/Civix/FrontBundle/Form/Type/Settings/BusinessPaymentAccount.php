<?php

namespace Civix\FrontBundle\Form\Type\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BusinessPaymentAccount extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('businessName', 'text', ['label' => 'Business Name'])
            ->add('ein', 'number', ['label' => 'EIN'])
        ;
    }

    public function getName()
    {
        return 'business_payment_account_form';
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\FrontBundle\Form\Model\PaymentAccountSettings',
            'validation_groups' => ['business'],
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ]);
    }
} 