<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LeaderEventInfo extends AbstractType
{

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, ['label' => 'Event name']);
        $builder->add('subject', 'textarea', ['label' => 'Description', 'attr' => ['class' => 'span12']]);
        $builder->add('isAllowOutsiders', 'checkbox', ['label' => 'Allow outsiders to sign', 'required' => false]);
        $builder->add('startedAt', null, ['label' => 'Start Event']);
        $builder->add('finishedAt', null, ['label' => 'End Event']);
        $builder->add('options', 'collection', [
            'label' => 'Options',
            'attr' => ['class' => 'options-list'],
            'type' => new Option(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'by_reference' => false,
        ]);
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_leader_event';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Question\LeaderEvent'
        ]);
    }
}
