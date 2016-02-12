<?php

namespace Civix\CoreBundle\Repository\Poll;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\Poll\Comment;
use Civix\CoreBundle\Entity\Poll\CommentRate;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\BaseComment;

class CommentRateRepository extends EntityRepository
{
    public function addRateToComment(BaseComment $comment, User $user, $rateValue)
    {
        $rateComment = new CommentRate();
        $rateComment->setComment($comment);
        $rateComment->setUser($user);
        $rateComment->setRateValue($rateValue);

        return $rateComment;
    }

    public function calcRateCommentSum(BaseComment $comment)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT SUM(cr.rateValue) as rateSum 
                             FROM Civix\CoreBundle\Entity\Poll\CommentRate cr
                            WHERE cr.comment = :comment')
            ->setParameter('comment', $comment)
            ->getOneOrNullResult();
    }
}
