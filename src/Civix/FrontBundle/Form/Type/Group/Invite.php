<?php

namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Invite form type
 */
class Invite extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'emails',
            'text',
            array('attr' => array('class' => 'span12'), 'label'=> 'Emails (separator ",")')
        );
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'invite';
    }
}
