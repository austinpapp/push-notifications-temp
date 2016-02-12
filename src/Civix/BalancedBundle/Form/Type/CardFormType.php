<?php

namespace Civix\BalancedBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'Name'
            ))
            ->add('number', null, array(
                'label' => 'Credit card number',
                'max_length' => 16
            ))
            ->add('expirationMonth', null, array(
                'label' => 'Expiration month',
                'max_length' => 2
            ))
            ->add('expirationYear', null, array(
                'label' => 'Expiration year',
                'max_length' => 4
            ))
            ->add('cvv', null, array(
                'label' => 'CVV',
                'max_length' => 4
            ))
            ->add('balancedUri', 'hidden')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\BalancedBundle\Model\Card',
            'validation_groups' => array('payment'),
        ));
    }

    public function getName()
    {
        return 'creditcard';
    }
}
