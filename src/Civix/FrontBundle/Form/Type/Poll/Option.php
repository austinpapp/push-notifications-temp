<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Option form type
 */
class Option extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('value', null, array(
                'widget_control_group' => false,
                'label_render' => false,
                'attr' => array('class' => 'span10 editable-question-option')
            ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_option';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Option',
        ));
    }
}
