<?php
namespace Civix\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Announcement form
 */
class Announcement extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content', null, array(
            'label' => 'Message',
            'attr' => array('class' => 'span9'),
            'help_inline' => 'Please be aware that the limit is 250 symbols. Long hyperlinks will be cut to 20 symbols.'
        ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'announcement';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Announcement',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',

        ));
    }
}
