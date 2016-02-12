<?php

namespace Civix\CoreBundle\Repository\Subscription;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\Subscription\DiscountCode;
use Civix\CoreBundle\Entity\Subscription\DiscountCodeHistory;
use Civix\CoreBundle\Entity\Customer\Customer;

class DiscountHistoryRepository extends EntityRepository
{
    public function getCountNumberUsedCode(DiscountCode $code)
    {
        return $this->getEntityManager()->createQueryBuilder()
                ->select('count(DISTINCT dh.customer)')
                ->from(DiscountCodeHistory::class, 'dh')
                ->where('dh.code = :code')
                ->setParameter('code', $code)
                ->getQuery()
                ->getSingleScalarResult();
    }

    public function getCountNumberUsedCodeWithStatus(DiscountCode $code, $status = DiscountCodeHistory::STATUS_APPLIED_ONLY)
    {
        return $this->getEntityManager()->createQueryBuilder()
                ->select('count(dh)')
                ->from(DiscountCodeHistory::class, 'dh')
                ->where('dh.code = :code')
                ->andWhere('dh.status = :status')
                ->setParameter('code', $code)
                ->setParameter('status', $status)
                ->getQuery()
                ->getSingleScalarResult();
    }

    public function getCountUsedMonth(DiscountCode $code, Customer $customer)
    {
        return $this->getEntityManager()->createQueryBuilder()
                ->select('count(dh)')
                ->from(DiscountCodeHistory::class, 'dh')
                ->where('dh.code = :code')
                ->andWhere('dh.customer = :customer')
                ->setParameter('code', $code)
                ->setParameter('customer', $customer)
                ->getQuery()
                ->getSingleScalarResult();
    }

    public function findAppropriateCode(Customer $customer, $packageType)
    {
        $history = $this->getEntityManager()->createQueryBuilder()
                ->select('dh, d')
                ->from(DiscountCodeHistory::class, 'dh')
                ->leftJoin('dh.code', 'd')
                ->where('dh.customer = :customer')
                ->andWhere('dh.status = :status')
                ->andWhere('d.packageType IS NULL OR d.packageType = :package')
                ->setParameter('customer', $customer)
                ->setParameter('status', DiscountCodeHistory::STATUS_APPLIED_ONLY)
                ->setParameter('package', $packageType)
                ->orderBy('dh.createdAt', 'ASC')
                ->getQuery()
                ->getOneOrNullResult();
        
        return ($history)?$history->getCode():null;
    }
}
