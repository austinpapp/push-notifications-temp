<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Civix\CoreBundle\Entity\Representative;

/**
 * Petition info form type
 */
class PetitionInfo extends AbstractType
{

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('petitionTitle', null, array('label' => 'Title'));
        $builder->add('petitionBody', 'textarea', array('label' => 'Petition', 'attr' => array('class' => 'span12')));
        $builder->add('isOutsidersSign', 'checkbox', array('label' => 'Let Outsiders Sign', 'required' => false));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'poll_petition';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Question\Petition'
        ));
    }
}
