<?php

namespace Civix\FrontBundle\Form\Type\Superuser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class LocalRepresentative extends AbstractType
{
     private $currentLocalGroup;

    public function __construct($group)
    {
        $this->currentLocalGroup = $group;
    }

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $group = $this->currentLocalGroup;
        $builder->add('localRepresentatives', 'entity', array(
            'class' => 'CivixCoreBundle:Representative',
            'label' => 'Local representatives',
            'attr' => array('class' => 'span6'),
            'by_reference' => false,
            'multiple' => true,
            'required' => false,
            'query_builder' => function (EntityRepository $er) use ($group) {
                return $er->getQueryBuilderLocalRepr($group);
            }
        ));
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Group'
        ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'assign_local_groups';
    }
}
