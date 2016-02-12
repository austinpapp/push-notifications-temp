<?php

namespace Civix\CoreBundle\Repository\Poll;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;

class LeaderEventRepository extends EntityRepository
{
    public function getPublishedLeaderEventQuery(UserInterface $user)
    {
        $className = ucfirst($user->getType()) . 'Event';

        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('ev')
            ->from("CivixCoreBundle:Poll\\Question\\{$className}", 'ev')
            ->where('ev.publishedAt IS NOT NULL')
            ->andWhere('ev.user = :userId')
            ->setParameter('userId', $user->getId())
            ->orderBy('ev.publishedAt', 'DESC')
            ->getQuery()
        ;
    }
    
    public function getNewLeaderEventQuery(UserInterface $user)
    {
        $className = ucfirst($user->getType()) . 'Event';

        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('ev')
            ->from("CivixCoreBundle:Poll\\Question\\{$className}", 'ev')
            ->where('ev.publishedAt IS NULL')
            ->andWhere('ev.user = :userId')
            ->setParameter('userId', $user->getId())
            ->orderBy('ev.createdAt', 'DESC')
            ->getQuery()
        ;
    }
}
