<?php

namespace Civix\CoreBundle\Service\Payments;

use Civix\BalancedBundle\Model\Card;
use Civix\BalancedBundle\Entity\PaymentHistory;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Customer\Card as CardEntity;

class BalancedPayment
{
    const PRICE_PUBLISH_PETITION = 50;
    
    private $paymentManager;
    private $entityManager;
    private $marketPlaceToken;

    public function __construct(
        \Civix\BalancedBundle\Service\BalancedPaymentManager $paymentManager,
        \Doctrine\ORM\EntityManager $entityManager,
        $marketPlaceToken
    ) {
        $this->paymentManager = $paymentManager;
        $this->entityManager = $entityManager;
        $this->marketPlaceToken = $marketPlaceToken;
    }

    public function getMarketPlaceToken()
    {
        return $this->marketPlaceToken;
    }

    public function chargeCard(Card $card, Customer $customer, $amount, $statement = null, $description = null)
    {
        if (!$customer->getBalancedUri()) {
            //create customer if need
            $this->paymentManager->createCustomer($customer);
        }

        if (!$card->getBalancedUri()) {
            //create card
            $this->paymentManager->createCard($card, $customer);
        }

        //save transaction data
        $payment = new PaymentHistory();
        $payment->setFromUser($customer);
        $payment->setAmount($amount/100);
        
        if ($amount > 0) {
            $debitData = $this->paymentManager->debit($card, $customer, $amount, $statement, $description);

            $payment->setReference($debitData->id);
            $payment->setData(json_encode($debitData));
            $payment->setState($debitData->status);
            $payment->setBalancedUri($debitData->href);
           
        } else {
            $payment->setData(json_encode([
                'created_at' => (new \DateTime('now'))->format('d-m-Y H:i:s'),
                'amount' => 0
            ]));
            $payment->setState(PaymentHistory::STATE_SUCCESS);
        }
        
        $this->entityManager->persist($payment);
        $this->entityManager->flush($payment);
        
        return $payment;
    }

    public function chargeSavedCard(CardEntity $cardEntity, Customer $customer, $amount, $statement = null, $description = null)
    {
        $card = new Card();
        $card->setBalancedUri($cardEntity->getBalancedUri());

        return $this->chargeCard($card, $customer, $amount, $statement, $description);
    }

    public function buyPublishOutsiderPetition(Card $card, Customer $user)
    {
        return $this->chargeCard($card, $user, self::PRICE_PUBLISH_PETITION);
    }

    public function buyPetitionsInvites(CardEntity $cardEntity, Customer $customer, $amount)
    {
        return $this->chargeSavedCard(
                $cardEntity,
                $customer,
                $amount,
                'PowerlinePay',
                'Powerline Payment: Invites for petition'
        );
    }
}
