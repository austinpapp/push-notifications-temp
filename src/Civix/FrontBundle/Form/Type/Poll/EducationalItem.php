<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Educational Text form type
 */
class EducationalItem extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('video', 'url', array(
            'label' => '',
            'required' => false,
            'attr' => array('class' => 'span11 video-control'),
            'label_render' => false,
        ));

        $builder->add('text', 'textarea', array(
            'label' => '',
            'required' => false,
            'attr' => array('class' => 'span11 text-control'),
            'label_render' => false,
        ));

        $builder->add('imageFile', 'file', array(
            'label' => '',
            'required' => false,
            'label_render' => false,
            'attr' => array('class' => 'image-control'),
        ));

        $builder->add('image', 'hidden', array(
            'required' => false,
            'label_render' => false,
        ));

    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_educational_item';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\FrontBundle\Form\Model\EducationalItem',
        ));
    }
}
