<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\FormBuilderInterface;
use Civix\CoreBundle\Entity\Group;

class PaymentRequestInfoGroup extends PaymentRequestInfo
{
    private $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }
    
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('groupSections', 'entity', [
           'label' => false,
           'class' => 'CivixCoreBundle:GroupSection',
           'choices' => $this->group->getGroupSections(),
           'required' => false,
           'expanded' => true,
           'multiple' => true
        ]);
    }
}
