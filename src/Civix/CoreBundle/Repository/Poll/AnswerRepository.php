<?php

namespace Civix\CoreBundle\Repository\Poll;

use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Doctrine\ORM\EntityRepository;

use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Poll\Answer;

class AnswerRepository extends EntityRepository
{
    public function getAnswersByQuestion($questionId)
    {
        return $this->getEntityManager()
                ->createQueryBuilder()
                ->select('a, u')
                ->from('CivixCoreBundle:Poll\Answer', 'a')
                ->join('a.user', 'u')
                ->where('a.question  = :questionId')
                ->setParameter('questionId', $questionId)
                ->getQuery();
    }
    
    public function getAnswersByInfluence(\Civix\CoreBundle\Entity\User $follower, $questionId)
    {
        return $this->getEntityManager()
                ->createQueryBuilder()
                ->select('a, u')
                ->from('CivixCoreBundle:Poll\Answer', 'a')
                ->leftJoin('a.user', 'u')
                ->leftJoin('CivixCoreBundle:UserFollow', 'uf', 'WITH', 'a.user = uf.user')
                ->where('a.question  = :questionId')
                ->AndWhere('uf.status  = :status')
                ->AndWhere('uf.follower  = :followerId')
                ->setParameter('questionId', $questionId)
                ->setParameter('status', \Civix\CoreBundle\Entity\UserFollow::STATUS_ACTIVE)
                ->setParameter('followerId', $follower)
                ->getQuery()
                ->getResult();
    }
    
    public function getAnswersByNotInfluence($follower, $questionId, $maxResults = 5)
    {
        return $this->getEntityManager()
                ->createQuery('SELECT a FROM CivixCoreBundle:Poll\Answer a 
                    WHERE a.user NOT IN(SELECT IDENTITY(uf.user) 
                    FROM  CivixCoreBundle:UserFollow uf 
                    WHERE uf.follower = :followerId
                    AND uf.status  = :status)
                    AND a.user <> :followerId
                    AND a.question = :questionId')
                ->setParameter('questionId', $questionId)
                ->setParameter('followerId', $follower)
                ->setParameter('status', \Civix\CoreBundle\Entity\UserFollow::STATUS_ACTIVE)
                ->setMaxResults($maxResults)
                ->getResult();
    }

    public function findLastByUser(User $user)
    {
        $start = new \DateTime();
        $start->sub(new \DateInterval('P35D'));

        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('a, q')
            ->from(Answer::class, 'a')
            ->leftJoin('a.question', 'q')
            ->where('a.user = :user')
            ->andWhere('q.publishedAt > :start')
            ->setParameter('user', $user)
            ->setParameter('start', $start)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSignedUsersByPetition(Petition $petition)
    {
        $answers =  $this->getEntityManager()
            ->createQueryBuilder()
            ->select('a, u')
            ->from(Answer::class, 'a')
            ->leftJoin('a.user', 'u')
            ->where('a.question = :petition')
            ->setParameter('petition', $petition)
            ->getQuery()
            ->getResult()
        ;

        return array_map(function (Answer $answer) {
            return $answer->getUser();
        }, $answers);

    }

}
