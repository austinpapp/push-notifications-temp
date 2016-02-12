<?php
namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Group section form
 */
class Section extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'group_section';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\GroupSection',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',

        ));
    }
}
