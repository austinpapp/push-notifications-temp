<?php

namespace Civix\CoreBundle\Service\Customer;

use Civix\BalancedBundle\Service\BalancedPaymentManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Customer\BankAccount;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\BalancedBundle\Entity\PaymentHistory;

class CustomerManager
{
    /**
     * @var BalancedPaymentManager
     */
    private $bp;

    private $entityManager;

    public function __construct(BalancedPaymentManager $bp, \Doctrine\ORM\EntityManager $entityManager)
    {
        $this->bp = $bp;
        $this->entityManager = $entityManager;
    }

    /**
     * @param UserInterface $user
     * @return Customer
     */
    public function getCustomerByUser(UserInterface $user)
    {
        $customer = $this->entityManager->getRepository($this->getCustomerClass($user))
            ->findOneByUser($user);

        if (!$customer) {
            $customer = $this->createCustomer($user);
            $this->saveCustomer($customer);
        }

        if (!$customer->getBalancedUri()) {
            $this->bp->createCustomer($customer);
            $this->saveCustomer($customer);
        }

        return $customer;
    }

    public function updateCustomer(UserInterface $user)
    {
        $this->bp->updateCustomer($this->getCustomerByUser($user));
    }

    public function removeCustomer(UserInterface $user)
    {
        /* @var Customer $customer */
        $customer = $this->entityManager->getRepository($this->getCustomerClass($user))
            ->findOneByUser($user);

        if (!$customer) {
            return;
        }

        $transactions = $this->entityManager->createQueryBuilder()
            ->select('ph')
            ->from(PaymentHistory::class, 'ph')
            ->where('ph.fromUser = :customer OR ph.toUser = :customer')
            ->setMaxResults(1)
            ->setParameter('customer', $customer)
            ->getQuery()
            ->getResult()
        ;

        if (!empty($transactions)) {
            throw new \Exception('This group cannot be deleted because of payments transactions');
        }

        $cards = $this->entityManager->getRepository(Card::class)->findByCustomer($customer);
        foreach ($cards as $card) {
            $this->removeCard($card);
        }

        try {$this->bp->unstoreCustomer($customer);} catch (\Exception $e) {}


        $this->entityManager->remove($customer);
        $this->entityManager->flush($customer);
    }

    public function removeCard(Card $card)
    {
        try {$this->bp->unstoreCard($card);} catch (\Exception $e) {}

        $this->entityManager->remove($card);
        $this->entityManager->flush($card);
    }


    /**
     * @param UserInterface $user
     * @return Customer
     */
    public function createCustomer(UserInterface $user)
    {
        $customerClass = $this->getCustomerClass($user);
        $customer = new $customerClass;
        $customer->setUser($user);

        return $customer;
    }

    public function saveCustomer(Customer $customer)
    {
        $this->entityManager->persist($customer);
        $this->entityManager->flush($customer);
    }

    public function addBankAccount(BankAccount $bankAccount, Customer $customer)
    {
        $bankAccount->setCustomer($customer);
        $this->entityManager->persist($bankAccount);
        $this->entityManager->flush($bankAccount);
    }

    public function addCard(Card $card, Customer $customer)
    {
        $card->setCustomer($customer);
        $this->entityManager->persist($card);
        $this->entityManager->flush($card);
    }

    public function hasPaymentAccount(UserInterface $user)
    {
        $customer = $this->getCustomerByUser($user);

        return (boolean) $this->entityManager->getRepository(BankAccount::class)->findOneByCustomer($customer) ||
            $this->entityManager->getRepository(Card::class)->findOneByCustomer($customer);
    }

    /**
     * @param Customer $customer
     * @return BankAccount
     */
    public function getBankAccount(Customer $customer)
    {
        return $this->entityManager->getRepository(BankAccount::class)->findOneByCustomer($customer);
    }

    /**
     * @param Customer $customer
     * @return Card
     */
    public function getCard(Customer $customer)
    {
        return $this->entityManager->getRepository(Card::class)->findOneByCustomer($customer);
    }

    private function getCustomerClass(UserInterface $user)
    {
        return '\Civix\CoreBundle\Entity\Customer\Customer' . ucfirst($user->getType());
    }
}
