<?php

namespace Civix\CoreBundle\Service;

use Doctrine\ORM\EntityManager;

use Civix\CoreBundle\Entity\UserInterface;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Stripe\Customer;
use Civix\CoreBundle\Entity\Stripe\CustomerInterface;
use Civix\CoreBundle\Entity\Stripe\AccountInterface;
use Civix\CoreBundle\Entity\Stripe\Account;
use Civix\CoreBundle\Entity\Stripe\Charge;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Subscription\Subscription;

use Stripe\Error;

class Stripe
{
    private $em;

    public function __construct($apiKey, EntityManager $em)
    {
        $this->em = $em;
        \Stripe\Stripe::setApiKey($apiKey);
    }

    public function addCard(UserInterface $user, $source)
    {
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user])
        ;
        if (!$customer) {
            $customer = $this->createCustomer($user);
        }

        $stripeCustomer = \Stripe\Customer::retrieve($customer->getStripeId());
        $stripeCustomer->source = $source;
        $stripeCustomer->save();

        $customer->updateCards($this->getCards($customer)->data);
        $this->em->flush($customer);
    }

    public function getStripeCustomer(CustomerInterface $customer)
    {
        return \Stripe\Customer::retrieve($customer->getStripeId());
    }

    public function getCards(CustomerInterface $customer)
    {
        return \Stripe\Customer::retrieve($customer->getStripeId())
            ->sources->all(['object' => 'card']);
    }

    public function getBankAccounts(AccountInterface $account)
    {
        return \Stripe\Account::retrieve($account->getStripeId())
            ->bank_accounts;
    }

    public function addBankAccount(UserInterface $user, $dto)
    {
        $account = $this->em
            ->getRepository(Account::getEntityClassByUser($user))
            ->findOneBy(['user' => $user])
        ;
        if (!$account) {
            $account = $this->createAccount($user);
        }

        $sa = \Stripe\Account::retrieve($account->getStripeId());

        $sa->bank_account     = $dto->source;
        $sa->email            = $user->getEmail();
        $sa->default_currency = $dto->currency;

        $sa->legal_entity->type          = $dto->type;
        $sa->legal_entity->first_name    = $dto->first_name;
        $sa->legal_entity->last_name     = $dto->last_name;
        $sa->legal_entity->ssn_last_4    = $dto->ssn_last_4;
        $sa->legal_entity->business_name = $dto->business_name;

        $sa->legal_entity->address = [
            'line1'       => $dto->address_line1,
            'line2'       => $dto->address_line2 ?: null,
            'city'        => $dto->city,
            'state'       => $dto->state,
            'postal_code' => $dto->postal_code,
            'country'     => $dto->country,
        ];

        $sa->save();

        $account->updateBankAccounts($this->getBankAccounts($account)->data);
        $this->em->flush($account);
    }

    public function removeCard(CustomerInterface $customer, $cardId)
    {
        \Stripe\Customer::retrieve($customer->getStripeId())->sources
            ->retrieve($cardId)->delete();

        $customer->updateCards($this->getCards($customer)->data);
        $this->em->flush($customer);
    }

    public function hasPayoutAccount(UserInterface $user)
    {
        $account = $this->em
            ->getRepository(Account::getEntityClassByUser($user))
            ->findOneBy(['user' => $user])
        ;
        if ($account) {
            return count($account->getBankAccounts());
        }

        return false;
    }

    public function hasCard(UserInterface $user)
    {
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user])
        ;

        return $customer && count($customer->getCards());
    }

    public function chargeToPaymentRequest(PaymentRequest $paymentRequest, Answer $answer, UserInterface $user)
    {
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user]);

        $account = $this->em
            ->getRepository(Account::getEntityClassByUser($paymentRequest->getUser()))
            ->findOneBy(['user' => $paymentRequest->getUser()])
        ;

        $charge = new Charge($customer, $account, $paymentRequest->getId());
        $amount = $answer->getCurrentPaymentAmount() * 100;

        $sc = \Stripe\Charge::create([
            'amount'               => $amount,
            'application_fee'      => ceil($amount * 0.021 + 50),
            'currency'             => 'usd',
            'customer'               => $customer->getStripeId(),
            'statement_descriptor' => 'PowerlinePay-' .
                                        $this->getAppearsOnStatement($paymentRequest->getUser()),
            'destination'          => $account->getStripeId(),
            'description'          => 'Powerline Payment: (' . $paymentRequest->getUser()->getOfficialName()
                                        . ') - (' . $paymentRequest->getTitle() .')',
        ]);

        $charge->updateStripeData($sc);
        $this->em->persist($charge);
        $this->em->flush($charge);

        return $charge;
    }

    public function chargeCustomer(Customer $customer, $amount, $statement = null, $description = null)
    {
        $charge = new Charge($customer);

        $sc = \Stripe\Charge::create([
            'amount'               => $amount,
            'currency'             => 'usd',
            'customer'             => $customer->getStripeId(),
            'statement_descriptor' => $statement,
            'description'          => $description,
        ]);

        $charge->updateStripeData($sc);
        $this->em->persist($charge);
        $this->em->flush($charge);

        return $charge;
    }

    public function chargeUser(UserInterface $user, $amount, $statement = null, $description = null)
    {
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user]);

        return $this->chargeCustomer($customer, $amount, $statement, $description);
    }

    public function handleSubscription(Subscription $subscription, $coupon = null)
    {
        $user = $subscription->getUserEntity();
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user]);
        $stripeCustomer = $this->getStripeCustomer($customer);

        if ($subscription->getStripeId()) {
            try {
                $ss = $stripeCustomer->subscriptions
                    ->retrieve($subscription->getStripeId());
                $ss->plan = $subscription->getPlanId();
                if ($coupon) {
                    $ss->coupon = $coupon;
                }
                $ss->save();
            } catch( Error\InvalidRequest $e) {
                if (404 === $e->getHttpStatus()) {
                    $subscription->stripeReset();
                }
                $ss = $stripeCustomer->subscriptions
                    ->create([
                        'plan'   => $subscription->getPlanId(),
                        'coupon' => $coupon,
                    ]);
            }
        } else {
            $ss = $stripeCustomer->subscriptions
                ->create([
                    'plan'   => $subscription->getPlanId(),
                    'coupon' => $coupon,
                ]);
        }

        $subscription->syncStripeData($ss);
        $this->em->persist($subscription);
        $this->em->flush($subscription);

        return $subscription;
    }

    public function cancelSubscription(Subscription $subscription)
    {
        if (!$subscription->getStripeId()) {
            $subscription->setEnabled(false);
            $this->em->flush($subscription);

            return $subscription;
        }
        $user = $subscription->getUserEntity();
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user]);
        $stripeCustomer = $this->getStripeCustomer($customer);

        try {
            $ss = $stripeCustomer->subscriptions
                ->retrieve($subscription->getStripeId());
            $ss->cancel(['at_period_end' => true]);
            $subscription->syncStripeData($ss);
        } catch( Error\InvalidRequest $e) {
            if (404 === $e->getHttpStatus()) {
                $subscription->stripeReset();
            }
        }

        $this->em->flush($subscription);

        return $subscription;
    }

    public function syncSubscription(Subscription $subscription)
    {
        $user = $subscription->getUserEntity();
        $customer = $this->em
            ->getRepository(Customer::getEntityClassByUser($user))
            ->findOneBy(['user' => $user]);
        $stripeCustomer = $this->getStripeCustomer($customer);

        try {
            $ss = $stripeCustomer->subscriptions
                ->retrieve($subscription->getStripeId());
            $subscription->syncStripeData($ss);
        } catch(Error\InvalidRequest $e) {
            if (404 === $e->getHttpStatus()) {
                $subscription->stripeReset();
            }
        }

        $this->em->flush($subscription);

        return $subscription;
    }

    public function getCoupons($limit, $after = null, $before = null)
    {
        return \Stripe\Coupon::all([
            'limit'          => $limit,
            'starting_after' => $after,
            'ending_before'  => $before,
        ]);
    }

    private function createCustomer(UserInterface $user)
    {
        $entityClass = Customer::getEntityClassByUser($user);
        /* @var $customer CustomerInterface */
        $customer = new $entityClass;
        $customer->setUser($user);

        $response = \Stripe\Customer::create([
            'description' => $user->getOfficialName(),
            'email' => $user->getEmail(),
        ]);

        $customer->setStripeId($response->id);

        $this->em->persist($customer);
        $this->em->flush($customer);

        return $customer;
    }

    private function createAccount(UserInterface $user)
    {
        $entityClass = Account::getEntityClassByUser($user);
        /* @var $account AccountInterface */
        $account = new $entityClass;
        $account->setUser($user);

        $response = \Stripe\Account::create([
            'managed'      => true,
            'metadata'     => ['id' => $user->getId(), 'type' => $user->getType()],
            'email'        => $user->getEmail(),
        ]);

        $account
            ->setStripeId($response->id)
            ->setSecretKey($response->keys->secret)
            ->setPublishableKey($response->keys->publishable)
        ;

        $this->em->persist($account);
        $this->em->flush($account);

        return $account;
    }

    private function getAppearsOnStatement(UserInterface $user)
    {
        if ($user instanceof Group) {
            return $user->getAcronym() ?: mb_substr($user->getOfficialName(), 0, 5);
        }

        return 'PowerlineAppPay';
    }
}