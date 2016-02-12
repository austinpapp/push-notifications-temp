<?php

namespace Civix\CoreBundle\Service\Subscription;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Service\Stripe;
use Civix\CoreBundle\Service\EmailSender;
use Civix\CoreBundle\Service\Subscription\DiscountCodeManager;
use Civix\CoreBundle\Entity\Subscription\Subscription;
use Civix\CoreBundle\Entity\Subscription\DiscountCode;
use Civix\CoreBundle\Model\Subscription\Package;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\BalancedBundle\Entity\PaymentHistory;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Group;


class SubscriptionManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Stripe
     */
    private $stripe;

    /**
     * @var EmailSender
     */
    private $es;

    /**
     * @var DiscountCodeManager
     */
    private $dm;
    
    private $packageKeyToClass = [
        Subscription::PACKAGE_TYPE_FREE => 'Free',
        Subscription::PACKAGE_TYPE_SILVER => 'Silver',
        Subscription::PACKAGE_TYPE_GOLD => 'Gold',
        Subscription::PACKAGE_TYPE_PLATINUM => 'Platinum',
        Subscription::PACKAGE_TYPE_COMMERCIAL => 'Commercial',
    ];

    private $prices = [
        Subscription::PACKAGE_TYPE_FREE => 0,
        Subscription::PACKAGE_TYPE_SILVER => 19,
        Subscription::PACKAGE_TYPE_GOLD => 39,
        Subscription::PACKAGE_TYPE_PLATINUM => 125,
        Subscription::PACKAGE_TYPE_COMMERCIAL => null,
    ];

    public function __construct(EntityManager $em, Stripe $stripe, EmailSender $es, DiscountCodeManager $dm)
    {
        $this->em = $em;
        $this->stripe = $stripe;
        $this->es = $es;
        $this->dm = $dm;
    }

    /**
     * @param UserInterface $user
     * @return Subscription
     */
    public function getSubscription(UserInterface $user)
    {
        $subscription = $this->em->getRepository(Subscription::class)->findOneBy([
            $user->getType() => $user
        ]);

        if (!$subscription) {
            $subscription = new Subscription;
            $subscription
                ->setPackageType(Subscription::PACKAGE_TYPE_FREE)
                ->setUserEntity($user)
            ;
        } else if ($subscription->isSyncNeeded()) {
            return $this->stripe->syncSubscription($subscription);
        }

        return $subscription;
    }

    /**
     * @param UserInterface $user
     * @return Package\Package
     */
    public function getPackage(UserInterface $user)
    {
        $subscription = $this->getSubscription($user);

        if ($subscription->isActive()) {
            return $this->createPackageObject($subscription->getPackageType());
        } else {
            return $this->createPackageObject($subscription::PACKAGE_TYPE_FREE);
        }
    }

    public function getPackagesInfo(Subscription $subscription)
    {
        $isCommercialAccount = $subscription->getGroup() && $subscription->getGroup()->isCommercial();

        $memberCount = 0;
        if ($subscription->getGroup()) {
            $memberCount = $this->em->getRepository(Group::class)->getTotalMembers($subscription->getGroup());
        }

        return [
            Subscription::PACKAGE_TYPE_FREE => [
                'title' => Subscription::$labels[Subscription::PACKAGE_TYPE_FREE],
                'price' => $this->prices[Subscription::PACKAGE_TYPE_FREE],
                'isBuyAvailable' => false,
            ],
            Subscription::PACKAGE_TYPE_SILVER => [
                'title' => Subscription::$labels[Subscription::PACKAGE_TYPE_SILVER],
                'price' => $this->prices[Subscription::PACKAGE_TYPE_SILVER],
                'isBuyAvailable' => $subscription->getPackageType() <= Subscription::PACKAGE_TYPE_SILVER
                    && !$isCommercialAccount
                    && $memberCount < $this->createPackageObject($subscription::PACKAGE_TYPE_SILVER)
                        ->getGroupSizeLimitation(),
            ],
            Subscription::PACKAGE_TYPE_GOLD => [
                'title' => Subscription::$labels[Subscription::PACKAGE_TYPE_GOLD],
                'price' => $this->prices[Subscription::PACKAGE_TYPE_GOLD],
                'isBuyAvailable' => $subscription->getPackageType() <= Subscription::PACKAGE_TYPE_GOLD
                    && $memberCount < $this->createPackageObject($subscription::PACKAGE_TYPE_GOLD)
                        ->getGroupSizeLimitation(),
            ],
            Subscription::PACKAGE_TYPE_PLATINUM => [
                'title' => Subscription::$labels[Subscription::PACKAGE_TYPE_PLATINUM],
                'price' => $this->prices[Subscription::PACKAGE_TYPE_PLATINUM],
                'isBuyAvailable' => $subscription->getPackageType() <= Subscription::PACKAGE_TYPE_PLATINUM
                    && !$isCommercialAccount,
            ],
            Subscription::PACKAGE_TYPE_COMMERCIAL => [
                'title' => Subscription::$labels[Subscription::PACKAGE_TYPE_COMMERCIAL],
                'price' => $this->prices[Subscription::PACKAGE_TYPE_COMMERCIAL],
                'isBuyAvailable' => false,
            ],
        ];
    }

    public function getPackagePrice($packageType, DiscountCode $discount = null)
    {
        $percents = ($discount)?$discount->getPercents():0;
        
        return $this->prices[$packageType] - ($this->prices[$packageType]*$percents/100);
    }
    
    /**
     * @param $typeId
     * @return Package\Package
     */
    private function createPackageObject($typeId)
    {
        $class = '\\Civix\\CoreBundle\\Model\\Subscription\\Package\\' .
            $this->packageKeyToClass[$typeId];

        return new $class;
    }
}
