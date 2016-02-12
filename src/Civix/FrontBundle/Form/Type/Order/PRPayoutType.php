<?php

namespace Civix\FrontBundle\Form\Type\Order;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Civix\CoreBundle\Entity\Customer\BankAccount;
use Civix\CoreBundle\Entity\Customer\Card;

class PRPayoutType extends AbstractType
{
    private $choices = [];

    public function __construct(BankAccount $bankAccount = null, Card $card = null)
    {
        if ($bankAccount) {
            $this->choices['bank'] = 'Bank Account (' . $bankAccount->getName() . ')';
        }
        if ($card) {
            $this->choices['card'] = 'Debit Card (' . $card->getName() . ')';
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('to', 'choice', [
            'choices'   => $this->choices,
            'required'  => true,
            'label' => 'Account'
        ]);
    }

    public function getName()
    {
        return 'pr_payout';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'show_legend' => false,
        ]);
    }
} 