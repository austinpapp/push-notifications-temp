<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Civix\CoreBundle\Entity\UserInterface;

interface AccountInterface
{
    /**
     * @return UserInterface
     */
    public function getUser();

    public function setUser();

    public function setStripeId($stripeId);

    public function getStripeId();

    public function getSecretKey();

    public function setSecretKey($secretKey);

    public function getPublishableKey();

    public function setPublishableKey($publishableKey);

    public function getBankAccounts();

    public function updateBankAccounts($bankAccounts);
}