<?php

namespace Civix\CoreBundle\Repository\Poll;

use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Common\Collections\ArrayCollection;
use Civix\CoreBundle\Entity\Poll\Comment;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Repository\CommentRepository as BaseCommentRepository;

class CommentRepository extends BaseCommentRepository
{
    public function getCommentEntityField()
    {
        return 'question';
    }

    public function findCommentsTreeByQuestion(Question $question)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->select('c, u, ch, chu')
            ->from('CivixCoreBundle:Poll\Comment', 'c')
            ->leftJoin('c.user', 'u')
            ->leftJoin('c.childrenComments', 'ch')
            ->leftJoin('ch.user', 'chu')
            ->where('c.question = :question')
            ->setParameter('question', $question)
            ->getQuery()->getResult();
        ;

        return $this->getEntityManager()->createQueryBuilder()
            ->select('c, u, ch, chu')
            ->from('CivixCoreBundle:Poll\Comment', 'c')
            ->leftJoin('c.user', 'u')
            ->leftJoin('c.childrenComments', 'ch')
            ->leftJoin('ch.user', 'chu')
            ->where('c.question = :question')
            ->andWhere('c.parentComment IS NULL')
            ->orderBy('ch.id', 'ASC')
            ->setParameter('question', $question)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getCommentsByPetition(Petition $petition)
    {
        $comments = new ArrayCollection();

        $commentsObjs = $this->getEntityManager()->createQueryBuilder()
            ->select('com, u, q, r.rateValue ')
            ->from('CivixCoreBundle:Poll\Comment', 'com')
            ->leftJoin('com.user', 'u')
            ->leftJoin('com.question', 'q')
            ->leftJoin('com.rates', 'r')
            ->where('com.question = :petition')
            ->orderBy('com.parentComment, com.id', 'ASC')
            ->setParameter('petition', $petition)
            ->getQuery()
            ->getResult();

        foreach ($commentsObjs as $comment) {
            $comment[0]->setRateStatus($comment['rateValue']);
            $comments->add($comment[0]);
        }

        return $comments;
    }
}
