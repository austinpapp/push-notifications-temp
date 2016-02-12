<?php

namespace Civix\BalancedBundle\Service;

use Civix\BalancedBundle\Model\BalancedUserInterface;
use Civix\BalancedBundle\Model\Card as CardModel;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Customer\BankAccount;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\FrontBundle\Form\Model\PaymentAccountSettings;

class BalancedPaymentManager
{
    protected $balancedPaymentCalls;

    protected $logger;

    protected $userClass;

    protected $marketPlaceUserId;

    protected $debug;

    public function __construct(
        \Civix\BalancedBundle\Service\BalancedPaymentCalls $balancedPaymentCalls,
        \Symfony\Component\HttpKernel\Log\LoggerInterface $logger,
        $userClass,
        $marketplaceUserId,
        $debug
    ) {
        $this->balancedPaymentCalls   = $balancedPaymentCalls;
        $this->logger            = $logger;
        $this->userClass         = $userClass;
        $this->marketplaceUserId = $marketplaceUserId;
        $this->debug             = $debug;
    }

    public function createCustomer(BalancedUserInterface $user)
    {
        if ($this->debug) {
            $this->logger->info(
                sprintf("[Balanced Payment] Create account for user email %s", $user->getEmail())
            );
        }

        $data = $this->balancedPaymentCalls
            ->createCustomer([
                'email' => $user->getEmail(),
                'name' => $user->getUser()->getOfficialName(),
                'address' => $user->getUser()->getAddressArray()
            ]);
        $user->setBalancedUri($data->href);

        return $user;
    }

    public function updateCustomer(BalancedUserInterface $customerEntity, PaymentAccountSettings $accountSettings = null)
    {
        $customer = $this->balancedPaymentCalls->getCustomer($customerEntity->getBalancedUri());

        $customer->email = $customerEntity->getEmail();
        $customer->address = $customerEntity->getUser()->getAddressArray();

        if ($accountSettings) {
            $customer->business_name = $accountSettings->getBusinessName();
            $customer->ein = $accountSettings->getEin();
            $customer->name = $accountSettings->getName();
            $customer->ssn_last4 = $accountSettings->getSSNLast4();
            if ($accountSettings->getBirth()) {
                $customer->dob_month = $accountSettings->getBirth()->format('m');
                $customer->dob_year = $accountSettings->getBirth()->format('Y');
            }
        }

        $customer->save();
    }

    public function associateBankAccount(BankAccount $bankAccountEntity, Customer $customerEntity)
    {
        $customer = $this->balancedPaymentCalls->getCustomer($customerEntity->getBalancedUri());

        $bankAccount = $this->balancedPaymentCalls->getBankAccount($bankAccountEntity->getBalancedUri());
        $bankAccount->associateToCustomer($customer);
    }

    public function unstoreBankAccount(BankAccount $bankAccountEntity)
    {
        $bankAccount = $this->balancedPaymentCalls->getBankAccount($bankAccountEntity->getBalancedUri());
        $bankAccount->unstore();
    }

    public function associateCard(Card $cardEntity, Customer $customerEntity)
    {
        $customer = $this->balancedPaymentCalls->getCustomer($customerEntity->getBalancedUri());

        $card = $this->balancedPaymentCalls->getCard($cardEntity->getBalancedUri());
        $card->associateToCustomer($customer);
    }

    public function unstoreCard(Card $cardEntity)
    {
        $card = $this->balancedPaymentCalls->getCard($cardEntity->getBalancedUri());
        $card->unstore();
    }

    public function unstoreCustomer(Customer $customerEntity)
    {
        $customer = $this->balancedPaymentCalls->getCustomer($customerEntity->getBalancedUri());
        $customer->unstore();
    }

    public function createCard(CardModel $card, BalancedUserInterface $user)
    {
        if ($this->debug) {
            $this->logger->info(
                sprintf("[Balanced Payment] Adding card %d", $card->getName())
            );
        }

        $cardData = $this->balancedPaymentCalls
            ->createCard(
                array(
                    'name' => $card->getName(),
                    'number' => $card->getNumber(),
                    'cvv' => $card->getCvv(),
                    'month' => $card->getExpirationMonth(),
                    'year' => $card->getExpirationYear()
                )
            );

        $customer = $this->balancedPaymentCalls->getCustomer($user->getBalancedUri());
        $customer->addCard($cardData->{'uri'});
        $card->setBalancedUri($cardData->{'uri'});

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
        if ($this->debug) {
            $this->logger->info(
                sprintf("[Balanced Payment] Creating a debit of %d from %d", $amount, $card->getName())
            );
        }

        return $this->balancedPaymentCalls->debit(
            $user->getBalancedUri(),
            $card->getBalancedUri(),
            $amount,
            $statement,
            $description,
            $meta
        );
    }
}
