<?php

namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupFields extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fields', 'collection', array(
                'label' => 'Fields',
                'attr' => array('class' => 'options-list'),
                'type' => new GroupField(),
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
        return 'group_fields';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Group',
            'validation_groups' => array('fields'),
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
