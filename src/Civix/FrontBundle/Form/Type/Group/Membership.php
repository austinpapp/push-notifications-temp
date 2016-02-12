<?php

namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Civix\CoreBundle\Entity\Group;

class Membership extends AbstractType
{
     /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'membershipControl',
            'choice',
            array(
                'empty_value' => false,
                'choices' => array(
                    Group::GROUP_MEMBERSHIP_PUBLIC => 'Public (Open to all)',
                    Group::GROUP_MEMBERSHIP_APPROVAL => 'Private (requires approval)',
                    Group::GROUP_MEMBERSHIP_PASSCODE => 'Private (requires passcode)'
                ),
                'label'=> 'Membership Control'
            )
        );
        $builder->add('membershipPasscode', null, array('label'=> 'Passcode'));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'membership';
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
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
