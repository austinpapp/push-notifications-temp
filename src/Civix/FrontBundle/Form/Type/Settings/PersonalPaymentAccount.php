<?php

namespace Civix\FrontBundle\Form\Type\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalPaymentAccount extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'Name'])
            ->add('birth', 'date', ['label' => 'Date of Birth'])
            ->add('SSNLast4', 'number', ['label' => 'Last four digits of the Social Security Number'])
        ;
    }

    public function getName()
    {
        return 'personal_payment_account_form';
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\FrontBundle\Form\Model\PaymentAccountSettings',
            'validation_groups' => ['personal'],
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
} 