<?php

namespace Civix\CoreBundle\Repository\Subscription;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\CoreBundle\Entity\Subscription\Subscription;

class SubscriptionRepository extends EntityRepository
{
    public function findForRenew()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $end = new \DateTime();
        $end->add(new \DateInterval('PT1M'));

        return $qb
            ->select('s, g, r, c')
            ->from(Subscription::class, 's')
            ->leftJoin('s.representative', 'r')
            ->leftJoin('s.group', 'g')
            ->leftJoin('s.card', 'c')
            ->where('s.enabled = 1')
            ->andWhere('s.expiredAt < :end')
            ->andWhere('s.nextPaymentAt < :end OR s.nextPaymentAt IS NULL')
            ->setParameter(':end', $end)
            ->getQuery()
            ->getResult()
        ;
    }
}
