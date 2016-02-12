<?php

namespace Civix\FrontBundle\Form\Type\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Permissions extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                $builder->create(
                    'requiredPermissions',
                    'choice',
                    [
                        'label' => 'Ask for permission',
                        'choices' => [
                            'permissions_name' => 'Name',
                            'permissions_address' => 'Address',
                            'permissions_email' => 'Email',
                            'permissions_phone' => 'Phone Number',
                            'permissions_responses' => 'Responses'
                        ],
                        'multiple' => true,
                        'expanded' => true
                    ]
                )
            );
    }

    public function getName()
    {
        return 'required_permissions';
    }
}
