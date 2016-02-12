<?php
namespace Civix\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Editable avatar form type
 */
class EditableAvatar extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('source', 'file', array(
                'label_render' => false,
                'label' => 'Upload avatar image',
                'widget_control_group' => false,
                'attr' => array('onchange' => 'document.avatar-form.submit();')
            ));

        $builder->addModelTransformer(new \Civix\FrontBundle\Form\DataTransformer\SourceToAvatarTransformer());
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'editable_avatar';
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'label_render' => false,
            'widget_control_group' => false,
            'error_bubbling' => true
        ));
    }
}
