<?php

namespace Civix\CoreBundle\Repository\Content;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function getPostQueryByStatus($status)
    {
        return $this->createQueryBuilder('p')
            ->where('p.isPublished = :status')
            ->setParameter('status', $status)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery();
    }

    public function findLastPosts()
    {
        return $this->getPostQueryByStatus(true)
            ->getResult();
    }
}
