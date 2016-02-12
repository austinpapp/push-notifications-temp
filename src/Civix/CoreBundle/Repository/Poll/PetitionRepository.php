<?php

namespace Civix\CoreBundle\Repository\Poll;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Group;

class PetitionRepository extends EntityRepository
{
    public function getPublishPetitonById($id)
    {
        return $this->createQueryBuilder('p')
            ->where('p.publishedAt IS NOT NULL')
            ->andWhere('p.id = :questionId')
            ->setParameter('questionId', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getPetitionEmails(Petition $petition)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('u.firstName, u.lastName, u.email')
            ->from('CivixCoreBundle:Poll\Answer', 'a')
            ->join('a.user', 'u')
            ->where('a.question  = :petition')
            ->andWhere('a.privacy = :privacy')
            ->setParameter('petition', $petition)
            ->setParameter('privacy', Answer::PRIVACY_PUBLIC)
            ->getQuery()
            ->getArrayResult();
    }

    public function getPetitionEmailsCount(Petition $petition)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('count(u.email)')
            ->from('CivixCoreBundle:Poll\Answer', 'a')
            ->join('a.user', 'u')
            ->where('a.question  = :petition')
            ->andWhere('a.privacy = :privacy')
            ->setParameter('petition', $petition)
            ->setParameter('privacy', Answer::PRIVACY_PUBLIC)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getSignedUsersNotInGroup(Petition $petition, Group $group)
    {
        $allUsersInGroup = $this->getEntityManager()->createQueryBuilder()
                ->select('us.id')
                ->from('CivixCoreBundle:User', 'us')
                ->innerJoin('us.groups', 'gu')
                ->where('gu.group = :group');

        $query = $this->getEntityManager()
            ->createQueryBuilder();
        
        return $query
            ->select('a, u')
            ->from('CivixCoreBundle:Poll\Answer', 'a')
            ->join('a.user', 'u')
            ->where('a.question = :petition')
            ->andWhere($query->expr()->notIn('u.id', $allUsersInGroup->getDQL()))
            ->setParameter('petition', $petition)
            ->setParameter('group', $group)
            ->getQuery()
            ->getResult();
    }
}
