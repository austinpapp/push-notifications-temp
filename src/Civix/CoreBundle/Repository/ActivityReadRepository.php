<?php

namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\ActivityRead;
use Civix\CoreBundle\Entity\User;

class ActivityReadRepository extends EntityRepository
{
    public function save($items)
    {
        $em = $this->getEntityManager();

        /* @var ActivityRead $item */
        foreach ($items as $item) {
            if (!$this->isRead($item)) {
                $em->persist($item);
                $em->flush($item);
            }
        }
    }

    public function findLastIdsByUser(User $user, \DateTime $start)
    {
        $items = $this->createQueryBuilder('ar')
            ->where('ar.user = :user')
            ->andWhere('ar.createdAt > :start')
            ->setParameter('user', $user)
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;

        return array_map(function (ActivityRead $item) {
            return $item->getActivityId();
        }, $items);
    }

    private function isRead(ActivityRead $item)
    {
        return !empty($this->findBy([
            'activityId' => $item->getActivityId(),
            'user' => $item->getUser()
        ]));
    }
}