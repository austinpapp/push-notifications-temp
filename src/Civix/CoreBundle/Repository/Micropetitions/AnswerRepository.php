<?php

namespace Civix\CoreBundle\Repository\Micropetitions;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\CoreBundle\Entity\Micropetitions\Answer;

class AnswerRepository extends EntityRepository
{
    public function createAnswer(Petition $petition, User $user, $option)
    {
        $answer = new Answer();
        $answer->setUser($user);
        $answer->setPetition($petition);
        $answer->setOptionId($option);

        return $answer;
    }

    public function calcVoices(Petition $petition)
    {
        $calcResult = $this->getEntityManager()->createQueryBuilder()
            ->select('ma.optionId, count(ma.optionId) as voice_count')
            ->from('CivixCoreBundle:Micropetitions\Answer', 'ma')
            ->where('ma.petition = :petition')
            ->groupBy('ma.optionId')
            ->setParameter('petition', $petition)
            ->getQuery()
            ->getResult();

        $voicesByOptionId = array();
        foreach ($calcResult as $voicesRow) {
            $voicesByOptionId[$voicesRow['optionId']] = $voicesRow['voice_count'];
        }

        return $voicesByOptionId;
    }

    public function getCountAnswerFromGroup(Petition $petition)
    {
        $calcResult = $this->getEntityManager()->createQueryBuilder()
            ->select('count(ma) as groupAnswers')
            ->from('CivixCoreBundle:Micropetitions\Answer', 'ma')
            ->innerJoin('ma.petition', 'p')
            ->innerJoin('p.group', 'gr')
            ->innerJoin('gr.users', 'ug')
            ->innerJoin('ug.user', 'u', 'WITH', 'u.id = ma.user')
            ->where('ma.petition = :petition')
            ->setParameter('petition', $petition)
            ->getQuery()
            ->getOneOrNullResult();

        return isset($calcResult['groupAnswers'])?(int) $calcResult['groupAnswers']:0;
    }

    public function findLastByUser(User $user)
    {
        $start = new \DateTime();
        $start->sub(new \DateInterval('P35D'));

        $answers = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('a')
            ->from(Answer::class, 'a')
            ->where('a.user = :user')
            ->andWhere('a.createdAt > :start')
            ->setParameter('user', $user)
            ->setParameter('start', $start)
            ->getQuery()
            ->getResult()
        ;

        $userPetitions = $this->getEntityManager()->getRepository(Petition::class)->findByUser($user);
        foreach ($userPetitions as $petition) {
            $answer = new Answer();
            $answer->setPetitionId($petition->getId());
            $answers[] = $answer;
        }

        return $answers;
    }
}
