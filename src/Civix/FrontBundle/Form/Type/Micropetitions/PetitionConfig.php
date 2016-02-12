<?php

namespace Civix\FrontBundle\Form\Type\Micropetitions;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PetitionConfig extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('petitionPerMonth', null, array('label' => 'Limit micropetitions per month'));
        $builder->add('petitionPercent', null, array('label' => 'Quorum percentage'));
        $builder->add('petitionDuration', null, array('label' => 'Quorum duration'));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'petition_config';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
