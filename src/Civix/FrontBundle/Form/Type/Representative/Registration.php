<?php
namespace Civix\FrontBundle\Form\Type\Representative;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Representative registration form
 */
class Registration extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', null, array('label'=> 'First name'));
        $builder->add('lastname', null, array('label'=> 'Last name'));
        $builder->add('officialTitle', null, array('label'=> 'Official Title'));
        $builder->add('officialAddress', 'textarea', array('label'=> 'Official Address'));
        $builder->add('city', null, array('label'=>'City'));
        $builder->add('state', 'entity', array('class'=>'Civix\CoreBundle\Entity\State', 'property' => 'code'));
        $builder->add('country', 'choice', array('choices' => array('US'=> 'USA')));
        $builder->add('officialPhone', null, array('label'=> 'Official Phone'));
        $builder->add('email', null, array('label'=> 'Email'));
        $builder->add('fax', null, array('label'=> 'Fax', 'required' => false));
        $builder->add('website', null, array('label'=> 'Website', 'required' => false));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'representative_registration';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('registration'),
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
