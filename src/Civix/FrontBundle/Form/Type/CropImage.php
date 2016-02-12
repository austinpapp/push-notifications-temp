<?php
namespace Civix\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Crop image form type
 */
class CropImage extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('x', 'hidden');
        $builder->add('y', 'hidden');
        $builder->add('w', 'hidden');
        $builder->add('h', 'hidden');
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'crop_image';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }
}
