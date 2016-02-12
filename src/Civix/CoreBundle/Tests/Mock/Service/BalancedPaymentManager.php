<?php

namespace Civix\CoreBundle\Tests\Mock\Service;

use Civix\BalancedBundle\Service\BalancedPaymentManager as Base;
use Civix\BalancedBundle\Model\BalancedUserInterface;
use Civix\BalancedBundle\Model\Card as CardModel;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Customer\BankAccount;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\FrontBundle\Form\Model\PaymentAccountSettings;

class BalancedPaymentManager extends Base
{
    public function createCustomer(BalancedUserInterface $user)
    {
        $user->setBalancedUri(uniqid());

        return $user;
    }

    public function updateCustomer(BalancedUserInterface $customerEntity, PaymentAccountSettings $accountSettings = null)
    {
    }

    public function associateBankAccount(BankAccount $bankAccountEntity, Customer $customerEntity)
    {
    }

    public function unstoreBankAccount(BankAccount $bankAccountEntity)
    {
    }

    public function associateCard(Card $cardEntity, Customer $customerEntity)
    {
    }

    public function unstoreCard(Card $cardEntity)
    {
    }

    public function unstoreCustomer(Customer $customerEntity)
    {
    }

    public function createCard(CardModel $card, BalancedUserInterface $user)
    {
        $card->setBalancedUri(uniqid());

        return $card;
    }

    public function debit(
        CardModel $card,
        BalancedUserInterface $user,
        $amount,
        $statement = null,
        $description = null,
        $meta = null
    ) {
        throw new \Exception('mock object: implementation needed');
    }
}
