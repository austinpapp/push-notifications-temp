<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\FormBuilderInterface;
use Civix\FrontBundle\Form\Type\Poll\EducationalContext;

/**
 * Petition form
 */
class PetitionGroup extends Petition
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('petition', new PetitionInfoGroup($this->user));
        $builder->add('educationalContext', new EducationalContext());
    }
}
