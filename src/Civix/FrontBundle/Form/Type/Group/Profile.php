<?php
namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Group profile form
 */
class Profile extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');
        $builder->add('managerFirstName', null, array('label'=> 'Manager First Name'));
        $builder->add('managerLastName', null, array('label'=> 'Manager Last Name'));
        $builder->add('managerEmail', null, array('label'=> 'Manager Email'));
        $builder->add('managerPhone', null, array('label'=> 'Manager Phone'));
        $builder->add('officialType', 'choice', array(
            'label'=> 'Group Type',
            'choices' => array(
                'Educational' => 'Educational',
                'Non-Profit (Not Campaign)' => 'Non-Profit (Not Campaign)',
                'Non-Profit (Campaign)' => 'Non-Profit (Campaign)',
                'Business' => 'Business',
                'Cooperative/Union' => 'Cooperative/Union',
                'Other' => 'Other',
            ),
        ));
        $builder->add('officialName', null, array('label'=> 'Group Name'));
        $builder->add('officialDescription', null, array('label'=> 'Group Description'));
        $builder->add('acronym', null, array('label'=> 'Acronym', 'max_length'=> 4));
        $builder->add('officialAddress', null, array('label'=> 'Group Address'));
        $builder->add('officialCity', null, array('label'=> 'Group City'));
        $builder->add('officialState', null, array('label'=> 'Group State'));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'group_information';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('profile'),
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
