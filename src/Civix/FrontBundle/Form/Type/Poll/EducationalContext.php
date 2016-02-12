<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Educational Text form type
 */
class EducationalContext extends AbstractType
{

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('items', 'collection', array(
            'type' => new EducationalItem(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'by_reference' => false,
            'label_render' => false
        ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_educational_context';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\FrontBundle\Form\Model\EducationalContext',
        ));
    }
}
