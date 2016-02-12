<?php
namespace Civix\FrontBundle\Form\Type\Poll;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Civix\CoreBundle\Entity\Representative;

/**
 * Question form type
 */
class QuestionInfo extends AbstractType
{
    protected $doctrine;
    protected $user;

    public function __construct(RegistryInterface $doctrine, $representative = false)
    {
        $this->doctrine = $doctrine;
        $this->user = $representative;
    }

    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $representative = $this->user;
        $builder->add('subject', 'textarea', ['label' => 'Subject', 'attr' => ['class' => 'span12']]);
        $builder->add('options', 'collection', [
                'label' => 'Options',
                'attr' => ['class' => 'options-list'],
                'type' => new Option(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ]);

        $builder->add('reportRecipientGroup', 'choice', array(
           'label' => 'Representative',
           'required' => false,
           'choices' => $this->getOfficialTitlesOptions($representative)
        ));

        $builder->add('reportRecipient', 'entity', array(
           'label' => 'Specific Representative',
           'class' => 'CivixCoreBundle:Representative',
           'required' => false,
           'query_builder' => function (EntityRepository $er) use ($representative) {
                return $er->getQueryBuilderReprByStatus(Representative::STATUS_ACTIVE, $representative);
           }
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
        $resolver->setDefaults([
            'data_class' => 'Civix\CoreBundle\Entity\Poll\Question'
        ]);
    }

    private function getOfficialTitlesOptions($representative)
    {
        $choices = [];
        $titles = $this->doctrine->getRepository('CivixCoreBundle:Representative')
                ->getOfficialTitles($representative);

        foreach ($titles as $offTitle) {
            $choices[$offTitle['officialTitle']] = $offTitle['officialTitle'];
        }

        return $choices;
    }
}
