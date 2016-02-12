<?php

namespace Civix\FrontBundle\Form\Type\Superuser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Civix\FrontBundle\Form\Model\CoreSettings;


class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach (CoreSettings::$fields as $key => $params) {
            $builder->add($key, $params[0], ['label' => $params[1]]);
        }
    }

    public function getName()
    {
        return 'settings';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Civix\FrontBundle\Form\Model\CoreSettings',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ]);
    }
} 