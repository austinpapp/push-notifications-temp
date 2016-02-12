<?php

namespace Civix\CoreBundle\Repository\Stripe;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\CoreBundle\Entity\Stripe\Charge;

class ChargeRepository extends EntityRepository
{
    public function getAmountForPaymentRequest($id)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('SUM(c.amount) as amount')
            ->from(Charge::class, 'c')
            ->where('c.questionId = :id')
            ->andWhere('c.status = :status')
            ->setParameter('id', $id)
            ->setParameter('status', 'succeeded')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
