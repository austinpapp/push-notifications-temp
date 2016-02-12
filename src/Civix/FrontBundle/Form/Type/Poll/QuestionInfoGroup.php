<?php

namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\FormBuilderInterface;

class QuestionInfoGroup extends QuestionInfo
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('groupSections', 'entity', [
           'label' => false,
           'class' => 'CivixCoreBundle:GroupSection',
           'choices' => $this->user->getGroupSections(),
           'required' => false,
           'expanded' => true,
           'multiple' => true
        ]);
    }
}
