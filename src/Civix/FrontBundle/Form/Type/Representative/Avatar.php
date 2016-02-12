<?php
namespace Civix\FrontBundle\Form\Type\Representative;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Representative avatar form
 */
class Avatar extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('avatarSource', 'editable_avatar');
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'representative_avatar';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('profile')
        ));
    }
}
