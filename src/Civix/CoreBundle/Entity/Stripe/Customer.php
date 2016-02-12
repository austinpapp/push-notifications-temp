<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;

use Civix\CoreBundle\Entity\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Stripe\CustomerRepository")
 * @ORM\Table(name="stripe_customers")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "representative"  = "Civix\CoreBundle\Entity\Stripe\CustomerRepresentative",
 *      "group"  = "Civix\CoreBundle\Entity\Stripe\CustomerGroup",
 *      "user"  = "Civix\CoreBundle\Entity\Stripe\CustomerUser"
 * })
 */
abstract class Customer implements CustomerInterface
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
     * @ORM\Column(name="cards", type="text", nullable=true)
     */
    private $cards;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStripeId()
    {
        return $this->stripeId;
    }

    /**
     * @param mixed $stripeId
     * @return $this
     */
    public function setStripeId($stripeId)
    {
        $this->stripeId = $stripeId;

        return $this;
    }

    public function getCards()
    {
        if ($this->cards) {
            return json_decode($this->cards, true);
        }

        return [];
    }

    public function updateCards($cards)
    {
        $this->cards = json_encode(array_map(function($card) {
            return [
                'id'      => $card->id,
                'last4'   => $card->last4,
                'brand'   => $card->brand,
                'funding' => $card->funding,
            ];
        }, $cards));
    }

    public static function getEntityClassByUser(UserInterface $user)
    {
        $type = ucfirst($user->getType());

        return "Civix\\CoreBundle\\Entity\\Stripe\\Customer{$type}";
    }
}