<?php
namespace Civix\FrontBundle\Form\Type\Superuser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Civix\CoreBundle\Entity\Subscription\Subscription;

class DiscountCode extends AbstractType
{
    /**
     * Set form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code', null, ['label' => 'Code name']);
        $builder->add('percents', null, ['label' => '% Discount']);
        $builder->add('month', null, ['label' => 'Number of months that code applies for']);
        $builder->add('maxUsers', null, ['label' => 'Number of times code can be used']);
        
        $builder->add('packageType', 'choice', [
            'label' => 'Valid packages',
            'choices' => Subscription::$labels,
            'empty_value' => 'All',
            'required' => false
        ]);
    }

    /**
     * Set default form option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Civix\CoreBundle\Entity\Subscription\DiscountCode',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }

    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'discount_code';
    }
}
