<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Civix\CoreBundle\Entity\UserInterface;

interface CustomerInterface
{
    /**
     * @return UserInterface
     */
    public function getUser();

    public function setUser();

    public function setStripeId($stripeId);

    public function getStripeId();

    public function getCards();

    public function updateCards($cards);
}