<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Question form type
 */
class Question extends AbstractType
{
    protected $doctrine;
    protected $user;

    public function __construct(RegistryInterface $doctrine, $excludeRepr = false)
    {
        $this->doctrine = $doctrine;
        $this->user = $excludeRepr;
    }

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('question', new QuestionInfo($this->doctrine, $this->user));
        $builder->add('educationalContext', new EducationalContext());
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_question';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\FrontBundle\Form\Model\Question',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ]);
    }
}
