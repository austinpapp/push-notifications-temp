<?php
namespace Civix\FrontBundle\Form\Type\Representative;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Civix\FrontBundle\Form\Type\Poll\EducationalContext;

/**
 * Representative news form
 */
class News extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('question', new NewsInfo());
        $builder->add('educationalContext', new EducationalContext());
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'representative_news';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\FrontBundle\Form\Model\Question',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }
}
