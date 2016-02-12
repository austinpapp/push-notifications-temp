<?php

namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\FormBuilderInterface;

class QuestionGroup extends Question
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('question', new QuestionInfoGroup($this->doctrine, $this->user));
        $builder->add('educationalContext', new EducationalContext());
    }
}
