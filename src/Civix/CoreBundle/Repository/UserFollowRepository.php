<?php

namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\UserFollow;
use Civix\CoreBundle\Entity\User;

/**
 * UserFollowRepository
 *
 */
class UserFollowRepository extends EntityRepository
{
    public function getFollowersByFStatus($user, $status)
    {
         return $this->createQueryBuilder('uf')
                ->where('uf.user = :user')
                ->andWhere('uf.status = :status')
                ->setParameter('user', $user)
                ->setParameter('status', $status)
                ->orderBy('uf.dateCreate', 'asc')
                ->getQuery()
                ->getResult();
    }

    public function getFollowingByFStatus($user, $status)
    {
         return $this->createQueryBuilder('uf')
                ->where('uf.follower = :user')
                ->andWhere('uf.status = :status')
                ->setParameter('user', $user)
                ->setParameter('status', $status)
                ->orderBy('uf.dateCreate', 'asc')
                ->getQuery()
                ->getResult();
    }

    public function getFollowingByUser($user)
    {
        return $this->createQueryBuilder('uf')
            ->where('uf.follower = :user')
            ->setParameter('user', $user)
            ->orderBy('uf.dateCreate', 'asc')
            ->getQuery()
            ->getResult();
    }

    /**
     * @deprecated
     */
    public function getLastApprovedFollowing($follower, $lastApprovedDate)
    {
        return $this->createQueryBuilder('uf')
                ->where('uf.follower = :follower')
                ->andWhere('uf.status = :status')
                ->andWhere('uf.dateApproval >= :approvedDate')
                ->setParameter('follower', $follower)
                ->setParameter('status', UserFollow::STATUS_ACTIVE)
                ->setParameter('approvedDate', $lastApprovedDate)
                ->orderBy('uf.dateApproval', 'desc')
                ->getQuery()
                ->getResult();
    }

    public function findByUser(User $user)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $pendingStart = new \DateTime;
        $pendingStart->sub(new \DateInterval('P6M'));

        return $qb->select('uf, f, u')
            ->from(UserFollow::class, 'uf')
            ->leftJoin('uf.user', 'u')
            ->leftJoin('uf.follower', 'f')
            ->where('uf.user = :user AND uf.status = :active')
            ->orWhere('uf.follower = :user AND uf.status = :active')
            ->orWhere('(uf.user = :user OR uf.follower = :user)'
                . ' AND uf.status = :pending AND uf.dateCreate > :pendingStart')
            ->setParameter('active', UserFollow::STATUS_ACTIVE)
            ->setParameter('pending', UserFollow::STATUS_PENDING)
            ->setParameter('pendingStart', $pendingStart)
            ->setParameter('user', $user)
            ->orderBy('uf.dateCreate', 'DESC')
            ->getQuery()
            ->getResult()
        ;

    }

    public function findActiveFollower(User $user, User $follower)
    {
        return $this->findOneBy([
            'user'     => $user,
            'follower' => $follower,
            'status'   => UserFollow::STATUS_ACTIVE
        ]);
    }

    public function handle(UserFollow $follow)
    {
        /* @var $entity UserFollow */
        $entity = $this->findOneBy(['user' => $follow->getUser(), 'follower' => $follow->getFollower()]);

        $entity = $entity ?: $follow;
        $entity->setStatus($follow->getStatus())
            ->setDateCreate(new \DateTime())
        ;

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);

        return $entity;
    }
}
