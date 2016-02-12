<?php
namespace Civix\FrontBundle\Form\Type\Content;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Post extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, ['label' => 'Title']);
        $builder->add('shortDescription', 'textarea', [
            'label' => 'Short description',
            'attr' => ['class' => 'span11 text-control']
        ]);
        $builder->add('content', 'textarea', [
            'label' => 'Post',
            'attr' => ['class' => 'span11 text-control', 'data-provide' => 'markdown']
        ]);
        $builder->add('image', 'file', ['label' => 'Post image', 'required' => false]);
        $builder->add('createdAt', 'date', ['label' => 'Date']);
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'post';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\CoreBundle\Entity\Content\Post',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'validation_groups' => ['blog-post']
        ]);
    }
}
