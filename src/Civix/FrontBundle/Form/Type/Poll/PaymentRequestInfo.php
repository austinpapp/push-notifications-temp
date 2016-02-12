<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentRequestInfo extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, ['label' => 'Title']);
        $builder->add('subject', 'textarea', ['label' => 'Subject', 'attr' => ['class' => 'span12']]);
        $builder->add('isCrowdfunding', null, ['label' => 'Crowdfunding']);
        $builder->add('crowdfundingGoalAmount', null, ['label' => 'Goal Amount']);
        $builder->add('crowdfundingDeadline', null, ['label' => 'Deadline']);
        $builder->add('isAllowOutsiders', 'checkbox', array('label' => 'Allow Outsiders', 'required' => false));
        $builder->add('options', 'collection', array(
            'label' => 'Options',
            'attr' => array('class' => 'options-list'),
            'type' => new PaymentOption(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'by_reference' => false,
        ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_payment_request';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Question\PaymentRequest'
        ]);
    }
}
