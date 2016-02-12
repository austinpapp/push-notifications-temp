<?php
namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\FormBuilderInterface;
use Civix\FrontBundle\Form\Type\Representative\NewsInfo as NewsInfoType;
use Civix\CoreBundle\Entity\Group;

/**
 * Question form type
 */
class NewsInfo extends NewsInfoType
{
    /**
     * @var Group
     */
    protected $user;

    public function __construct(Group $group)
    {
        $this->user = $group;
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
            'choices' => $this->user->getGroupSections(),
            'required' => false,
            'expanded' => true,
            'multiple' => true
        ]);
    }
}
