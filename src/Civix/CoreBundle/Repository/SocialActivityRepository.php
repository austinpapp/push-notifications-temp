<?php

namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\SocialActivity;

class SocialActivityRepository extends EntityRepository
{
    public function findFollowingForUser(User $user)
    {
        $userFollowingIds = $user->getFollowingIds();
        if (empty($userFollowingIds)) {
            return [];
        }
        $activeGroups = $this->getEntityManager()->getRepository('CivixCoreBundle:UserGroup')->getActiveGroupIds($user);

        $qb = $this->createQueryBuilder('sa');

        $qb
            ->addSelect('f')
            ->addSelect('g')
            ->leftJoin('sa.following', 'f')
            ->leftJoin('sa.group', 'g')
            ->where($qb->expr()->andX(
                'sa.recipient is NULL',
                $qb->expr()->in('sa.following', ':followings'),
                empty($activeGroups) ? 'sa.group is NULL' : 'sa.group is NULL OR sa.group IN (:groups)'
            ))
            ->setParameter('followings', $userFollowingIds)
            ->setParameter('groups', $activeGroups)
            ->orderBy('sa.id', 'DESC')
            ->setMaxResults(200)
        ;

        return $qb->getQuery()->getResult();
    }

    public function findByRecipient(User $user)
    {
        return $this->createQueryBuilder('sa')
            ->addSelect('f')
            ->addSelect('g')
            ->leftJoin('sa.following', 'f')
            ->leftJoin('sa.group', 'g')
            ->where('sa.recipient = :recipient')
            ->setParameter('recipient', $user)
            ->orderBy('sa.id', 'DESC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }
}