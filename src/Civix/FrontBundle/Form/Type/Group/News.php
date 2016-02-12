<?php
namespace Civix\FrontBundle\Form\Type\Group;

use Symfony\Component\Form\FormBuilderInterface;
use Civix\FrontBundle\Form\Type\Poll\EducationalContext;
use  Civix\FrontBundle\Form\Type\Representative\News as NewsType;
use Civix\CoreBundle\Entity\Group;

/**
 * Group news form
 */
class News extends NewsType
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
        $builder->add('question', new NewsInfo($this->user));
        $builder->add('educationalContext', new EducationalContext());
    }
}
