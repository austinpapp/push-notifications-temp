<?php
namespace Civix\FrontBundle\Form\Type\Representative;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Civix\CoreBundle\Entity\Representative;

/**
 * Question form type
 */
class NewsInfo extends AbstractType
{

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject', 'textarea', array(
            'label' => 'Subject',
            'attr' => array('class' => 'span12'),
            'help_inline' => 'Please be aware that the limit is 500 symbols. Long hyperlinks will be cut to 20 symbols.'
        ));
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
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Question'
        ));
    }
}
