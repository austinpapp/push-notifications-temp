<?php

namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Common\Collections\ArrayCollection;

abstract class CommentRepository extends EntityRepository
{
    abstract public function getCommentEntityField();

    public function getCommentsByEntityId($entityId, $user)
    {
        $commentEntityField = 'com.' . $this->getCommentEntityField();
        $comments = new ArrayCollection();
        $commentsObjs = $this->getEntityManager()->createQueryBuilder()
            ->select('com, u, q, r.rateValue ')
            ->from($this->getEntityName(), 'com')
            ->leftJoin('com.user', 'u')
            ->leftJoin($commentEntityField, 'q')
            ->leftJoin('com.rates', 'r', Join::WITH, 'r.user = :user')
            ->where($commentEntityField.' = :entity')
            ->orderBy('com.parentComment, com.id', 'ASC')
            ->setParameter('user', $user)
            ->setParameter('entity', $entityId)
            ->getQuery()
            ->getResult();

        foreach ($commentsObjs as $comment) {
            $comment[0]->setRateStatus($comment['rateValue']);
            $comment[0]->setIsOwner($comment[0]->getUser() === $user);
            $comments->add($comment[0]);
        }

        return $comments;
    }

    public function getRootCommentByEntityId($entityId)
    {
        return $this->findOneBy([$this->getCommentEntityField() => $entityId, 'parentComment' => null]);
    }
}
