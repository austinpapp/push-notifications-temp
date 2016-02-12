<?php

namespace Civix\CoreBundle\Service\Customer;

use Civix\CoreBundle\Exception\LogicException;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\CoreBundle\Entity\Customer\Order\Order;
use Civix\CoreBundle\Entity\Customer\Order\PaymentRequestOrder;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\BalancedBundle\Service\BalancedPaymentCalls;
use Civix\BalancedBundle\Entity\PaymentHistory;
use Civix\CoreBundle\Service\EmailSender;
use Doctrine\ORM\EntityManager;

class OrdersManager
{
    const BALANCED_FEE = 2.9;
    const BALANCED_TRANSACTION_FEE_AMOUNT = 30;
    const POWERLINE_FEE = 2;
    const POWERLINE_TRANSACTION_FEE_AMOUNT = 20;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var BalancedPaymentCalls
     */
    private $bpc;

    /**
     * @var CustomerManager
     */
    private $cm;

    /**
     * @var EmailSender
     */
    private $es;

    public function __construct(BalancedPaymentCalls $bpc, CustomerManager $cm, EntityManager $em, EmailSender $es)
    {
        $this->bpc = $bpc;
        $this->cm = $cm;
        $this->em = $em;
        $this->es = $es;
    }

    public function createPaymentRequestOrder(PaymentRequest $paymentRequest)
    {
        $customer = $this->bpc->getCustomer($this->cm->getCustomerByUser($paymentRequest->getUser())->getBalancedUri());
        $order = $customer->orders->create();
        $order->description = $paymentRequest->getTitle();
        $order->meta = [
            'payment_request_id' => $paymentRequest->getId(),
        ];
        $order->save();
        $paymentRequestOrder = new PaymentRequestOrder();
        $paymentRequestOrder
            ->setBalancedUri($order->href)
            ->setPaymentRequest($paymentRequest)
        ;
        $this->em->persist($paymentRequestOrder);
        $this->em->flush($paymentRequestOrder);

        return $paymentRequestOrder;
    }

    public function chargeToPaymentRequest(PaymentRequest $paymentRequest, Answer $answer, UserInterface $user)
    {
        $customerEntity = $this->cm->getCustomerByUser($user);
        /** @var Card $cardEntity */
        $cardEntity = $this->em->getRepository(Card::class)->findOneByCustomer($customerEntity);
        /** @var PaymentRequestOrder $orderEntity */
        $orderEntity = $this->em->getRepository(PaymentRequestOrder::class)->findOneByPaymentRequest($paymentRequest);
        $card = $this->bpc->getCard($cardEntity->getBalancedUri());
        $debitData = $card->debits->create(array(
            'amount' => $answer->getCurrentPaymentAmount() * 100,
            'order' => $orderEntity->getBalancedUri(),
            'appears_on_statement_as' => 'PowerlinePay-' . $this->getAppearsOnStatement($paymentRequest->getUser()),
            'description' => 'Powerline Payment: (' . $paymentRequest->getUser()->getOfficialName()
                . ') - (' . $paymentRequest->getTitle() .')',
        ));
        $paymentHistory = $this->saveToPaymentHistory($debitData, $customerEntity,
            $this->cm->getCustomerByUser($paymentRequest->getUser()), $answer->getCurrentPaymentAmount(),
            $paymentRequest->getId(),
            $orderEntity->getPublicId()
        );

        if ($paymentHistory->isSucceeded()) {
            $this->es->sendPaymentRequestCharged($paymentHistory, $paymentRequest, $user);
        }
    }

    public function paymentRequestPayout(PaymentRequest $paymentRequest, \Balanced\Resource $to)
    {
        /** @var PaymentRequestOrder $orderEntity */
        $orderEntity = $this->em->getRepository(PaymentRequestOrder::class)->findOneByPaymentRequest($paymentRequest);
        $order = $this->bpc->getOrder($orderEntity->getBalancedUri());

        if (empty($order->amount_escrowed)) {
            throw new LogicException('Incorrect amount escrowed');
        }
        $customer = $this->cm->getCustomerByUser($paymentRequest->getUser());
        $transactions = $this->em->getRepository(PaymentHistory::class)
            ->findNotPaidOut($paymentRequest);
        $tCnt = count($transactions);
        $balancedFee = ceil($order->amount_escrowed * self::BALANCED_FEE / 100 + $tCnt * self::BALANCED_TRANSACTION_FEE_AMOUNT);
        $powerlineFee = ceil($order->amount_escrowed * self::POWERLINE_FEE / 100 + $tCnt * self::POWERLINE_TRANSACTION_FEE_AMOUNT);

        $marketplaceAmount = $balancedFee + $powerlineFee;
        $customerAmount = $order->amount_escrowed - $marketplaceAmount;
        if (!$customerAmount) {
            throw new LogicException('Too small amount escrowed');
        }

        $data = $order->creditTo(
            $to,
            $customerAmount
        );

        $paymentHistory = $this->saveToPaymentHistory($data, $customer, null, $paymentRequest->getId(),
            $orderEntity->getPublicId()
        );

        if (!$paymentHistory->isOK()) {
            throw new LogicException($data->failure_reason);
        }

        foreach ($transactions as $transaction) {
            /* @var $transaction PaymentHistory */
            $transaction->setPaidOut(true);
        }
        $this->em->flush();

        $this->es->sendPaymentRequestOrderPayout($paymentRequest, $paymentHistory, $marketplaceAmount, $customerAmount);

        $data = $order->creditTo(
            $this->bpc->getMarketPlaceBankAccount(),
            $marketplaceAmount
        );

        $paymentHistoryMarketPlace = $this->saveToPaymentHistory($data, $customer, null, $paymentRequest->getId(),
            $orderEntity->getPublicId()
        );

        if (!$paymentHistoryMarketPlace->isOK()) {
            throw new LogicException($data->failure_reason);
        }
    }

    private function saveToPaymentHistory($debitData, Customer $from, Customer $to = null, $amount, $question_id = null, $orderId = null)
    {
        $payment = new PaymentHistory();
        $payment->setReference($debitData->id);
        $payment->setData(json_encode($debitData));
        $payment->setFromUser($from);
        $payment->setToUser($to);
        $payment->setState($debitData->status);
        $payment->setAmount($amount);
        $payment->setBalancedUri($debitData->href);
        $payment->setQuestionId($question_id);
        $payment->setOrderId($orderId);
        $this->em->persist($payment);
        $this->em->flush($payment);

        return $payment;
    }

    private function getAppearsOnStatement(UserInterface $user)
    {
        if ($user instanceof Group) {
            return $user->getAcronym() ?: mb_substr($user->getOfficialName(), 0, 5);
        }

        return 'PowerlineAppPay';
    }
}
