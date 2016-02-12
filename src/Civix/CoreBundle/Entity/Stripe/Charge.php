<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Stripe\ChargeRepository")
 * @ORM\Table(name="stripe_charges")
 */
class Charge
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="stripe_id", type="string")
     */
    private $stripeId;

    /**
     * @ORM\Column(name="status", type="string")
     */
    private $status;

    /**
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(name="application_fee", type="integer", nullable=true)
     */
    private $applicationFee;

    /**
     * @ORM\Column(name="currency", type="string", length=3)
     */
    private $currency;

    /**
     * @ORM\Column(name="receipt_number", type="string", nullable=true)
     */
    private $receiptNumber;

    /**
     * @ORM\Column(name="created", type="integer")
     */
    private $created;

    /**
     * @ORM\Column(name="question_id", type="integer", nullable=true)
     */
    private $questionId;

    /**
     * @ORM\JoinColumn(name="from_customer", nullable=false)
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Stripe\Customer")
     */
    private $fromCustomer;

    /**
     * @ORM\JoinColumn(name="to_account")
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Stripe\Account")
     */
    private $toAccount;

    public function __construct(Customer $customer, Account $account = null,
                                $questionId = null)
    {
        $this->fromCustomer = $customer;
        $this->toAccount = $account;
        $this->questionId = $questionId;
    }

    public function updateStripeData(\Stripe\Charge $sc)
    {
        $this->stripeId       = $sc->id;
        $this->status         = $sc->status;
        $this->amount         = $sc->amount;
        $this->currency       = $sc->currency;
        $this->applicationFee = $sc->application_fee;
        $this->receiptNumber  = $sc->receipt_number;
        $this->created        = $sc->created;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isSucceeded()
    {
        return $this->status === 'succeeded';
    }

    public function toArray()
    {
        return [
            'receipt_number' => $this->receiptNumber,
            'status'         => $this->status,
            'amount'         => $this->amount,
            'currency'       => $this->currency,
            'created'        => $this->created,
        ];
    }
}
