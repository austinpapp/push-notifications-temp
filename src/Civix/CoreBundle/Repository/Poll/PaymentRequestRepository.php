<?php

namespace Civix\CoreBundle\Repository\Poll;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Question\GroupPaymentRequest;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativePaymentRequest;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Answer;
use Symfony\Component\Security\Core\User\UserInterface;

class PaymentRequestRepository extends EntityRepository
{
    public function getPublishPaymentRequestById($id)
    {
        return $this->createQueryBuilder('p')
            ->where('p.publishedAt IS NOT NULL')
            ->andWhere('p.id = :questionId')
            ->setParameter('questionId', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAllowOutsidersPaymentRequestById($id)
    {
        return $this->createQueryBuilder('p')
            ->where('p.publishedAt IS NOT NULL')
            ->andWhere('p.id = :questionId')
            ->andWhere('p.isAllowOutsiders = true')
            ->setParameter('questionId', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getPublishedPaymentRequestsQuery(UserInterface $user)
    {
        $className = ucfirst($user->getType()) . 'PaymentRequest';

        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('pr')
            ->from("CivixCoreBundle:Poll\\Question\\{$className}", 'pr')
            ->where('pr.publishedAt IS NOT NULL')
            ->andWhere('pr.user = :userId')
            ->setParameter('userId', $user->getId())
            ->orderBy('pr.publishedAt', 'DESC')
            ->getQuery()
        ;
    }

    public function getNewPaymentRequestsQuery(UserInterface $user)
    {
        $className = ucfirst($user->getType()) . 'PaymentRequest';

        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('pr')
            ->from("CivixCoreBundle:Poll\\Question\\{$className}", 'pr')
            ->where('pr.publishedAt IS NULL')
            ->andWhere('pr.user = :userId')
            ->setParameter('userId', $user->getId())
            ->orderBy('pr.createdAt', 'DESC')
            ->getQuery()
        ;
    }

    public function updateCrowdfundingPledgedAmount(Answer $answer)
    {
        $this->getEntityManager()
            ->createQuery('UPDATE CivixCoreBundle:Poll\Question\PaymentRequest q
                SET q.crowdfundingPledgedAmount = COALESCE(q.crowdfundingPledgedAmount,0) + :amount WHERE q.id = :id')
            ->setParameter('amount', $answer->getCurrentPaymentAmount())
            ->setParameter('id', $answer->getQuestion()->getId())
            ->getSingleScalarResult()
        ;
    }

    public function findChargeNeeded()
    {
        return array_merge(
            $this->findChargeNeededByEntity(GroupPaymentRequest::class),
            $this->findChargeNeededByEntity(RepresentativePaymentRequest::class)
        );
    }

    private function findChargeNeededByEntity($entity)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('pr')
            ->from($entity, 'pr')
            ->where('pr.isCrowdfunding = 1')
            ->andWhere('pr.crowdfundingDeadline < :now')
            ->andWhere('pr.isCrowdfundingCompleted IS NULL')
            ->setParameter('now', new \DateTime)
            ->getQuery()->getResult();
    }
}
