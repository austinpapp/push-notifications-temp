<?php

namespace Civix\CoreBundle\Repository\Subscription;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\Subscription\DiscountCode;
use Civix\CoreBundle\Entity\Subscription\Subscription;

class DiscountRepository extends EntityRepository
{
    public function findDiscountCodesQuery()
    {
        return $this->createQueryBuilder('d')
                ->orderBy('d.status', 'ASC')
                ->addOrderBy('d.updatedAt', 'DESC')
                ->getQuery();
    }

    public function findAvailableCode($package, $code)
    {
        return $this->createQueryBuilder('d')
                ->where('d.code = :code')
                ->andWhere('d.packageType IS NULL OR d.packageType = :package')
                ->andWhere('d.status = :status')
                ->setParameter('code', $code)
                ->setParameter('package', $package)
                ->setParameter('status', DiscountCode::STATUS_ACTIVE)
                ->getQuery()
                ->getOneOrNullResult();
    }
}
