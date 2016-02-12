<?php

namespace Civix\CoreBundle\Repository;

use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\Group;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Activity;
use Civix\CoreBundle\Entity\ActivityRead;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\CoreBundle\Entity\Poll\Question;

class ActivityRepository extends EntityRepository
{
    public function findActivities(\DateTime $start, User $user, $closed = false)
    {
        /** @var $em EntityManager */
        $em = $this->getEntityManager();

        /** @var $qb QueryBuilder */
        $qb = $em->createQueryBuilder();
        $expr = $qb->expr();

        $districtsIds = $user->getDistrictsIds();
        $sectionsIds = $user->getGroupSectionsIds();
        $activeGroups = $this->getEntityManager()->getRepository('CivixCoreBundle:UserGroup')->getActiveGroupIds($user);

        $userFollowingIds = $user->getFollowingIds();

        return $qb->select('act')
            ->from('CivixCoreBundle:Activity', 'act')
            ->leftJoin('act.activityConditions', 'act_c')
            ->where($expr->gt('act.sentAt', ':start'))
            ->andWhere(
                $expr->orX(
                    $expr->in('act_c.districtId', ':userDistrictsIds'),
                    'act_c.isSuperuser = 1',
                    $expr->in('act_c.groupId', ':userGroupsIds'),
                    $expr->in('act_c.userId', ':userFollowingIds'),
                    $expr->in('act_c.groupSectionId', ':userGroupSectionIds'),
                    ':user MEMBER OF act_c.users'
                )
            )
            ->andWhere($closed ? 'act.expireAt < :now' :
                'act.expireAt > :now OR act INSTANCE OF CivixCoreBundle:Activities\Petition
                OR act INSTANCE OF CivixCoreBundle:Activities\PaymentRequest')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('userDistrictsIds', empty($districtsIds)?false:$districtsIds)
            ->setParameter('userGroupsIds', empty($activeGroups)?false:$activeGroups)
            ->setParameter('userFollowingIds', empty($userFollowingIds)?false:$userFollowingIds)
            ->setParameter('userGroupSectionIds', empty($sectionsIds)?false:$sectionsIds)
            ->setParameter('now', new \DateTime())
            ->setParameter('user', $user)
            ->orderBy('act.sentAt', 'DESC')
            ->setMaxResults(500)
            ->getQuery()->getResult();
    }

    /**
     * Find activities by user
     *
     * @param User $user
     * @param \DateTime $start
     * @param $offset
     * @param $limit
     * @return array
     */
    public function findActivitiesByUser(User $user, \DateTime $start, $offset, $limit)
    {
        /** @var $em EntityManager */
        $em = $this->getEntityManager();

        /** @var $qb QueryBuilder */
        $qb = $em->createQueryBuilder();
        $expr = $qb->expr();

        $districtsIds = $user->getDistrictsIds();
        $sectionsIds = $user->getGroupSectionsIds();
        $activeGroups = $this->getEntityManager()->getRepository('CivixCoreBundle:UserGroup')
            ->getActiveGroupIds($user);

        $userFollowingIds = $user->getFollowingIds();

        $activities = $qb->select('act')
            ->from('CivixCoreBundle:Activity', 'act')
            ->leftJoin('act.activityConditions', 'act_c')
            ->where($expr->gt('act.sentAt', ':start'))
            ->andWhere(
                $expr->orX(
                    $expr->in('act_c.districtId', ':userDistrictsIds'),
                    'act_c.isSuperuser = 1',
                    $expr->in('act_c.groupId', ':userGroupsIds'),
                    $expr->in('act_c.userId', ':userFollowingIds'),
                    $expr->in('act_c.groupSectionId', ':userGroupSectionIds'),
                    ':user MEMBER OF act_c.users'
                )
            )
            ->setParameter('userDistrictsIds', empty($districtsIds)?false:$districtsIds)
            ->setParameter('userGroupsIds', empty($activeGroups)?false:$activeGroups)
            ->setParameter('userFollowingIds', empty($userFollowingIds)?false:$userFollowingIds)
            ->setParameter('userGroupSectionIds', empty($sectionsIds)?false:$sectionsIds)
            ->setParameter('user', $user)
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->orderBy('act.sentAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()->getResult();

        // $this->getReadItems($user, $start, $activities);
        $readItems = $this->getEntityManager()->getRepository(ActivityRead::class)->findLastIdsByUser($user, $start);
        foreach ($activities as $activity) {
            if (in_array($activity->getId(), $readItems)) {
                $activity->setRead(true);
            }
        }

        return $activities;
    }

    /**
     * Return the count of activities by user
     *
     * Not Implemented Yet
     *
     * @param User $user
     * @param \DateTime $start
     * @return array
     */
    public function findActivitiesByUserCount(User $user, \DateTime $start)
    {
        /** @var $em EntityManager */
        $em = $this->getEntityManager();

        /** @var $qb QueryBuilder */
        $qb = $em->createQueryBuilder();
        $expr = $qb->expr();

        $districtsIds = $user->getDistrictsIds();
        $sectionsIds = $user->getGroupSectionsIds();
        $activeGroups = $this->getEntityManager()->getRepository('CivixCoreBundle:UserGroup')
            ->getActiveGroupIds($user);

        $userFollowingIds = $user->getFollowingIds();

        return $qb->select('COUNT(act.id)')
            ->from('CivixCoreBundle:Activity', 'act')
            ->leftJoin('act.activityConditions', 'act_c')
            ->where($expr->gt('act.sentAt', ':start'))
            ->andWhere(
                $expr->orX(
                    $expr->in('act_c.districtId', ':userDistrictsIds'),
                    'act_c.isSuperuser = 1',
                    $expr->in('act_c.groupId', ':userGroupsIds'),
                    $expr->in('act_c.userId', ':userFollowingIds'),
                    $expr->in('act_c.groupSectionId', ':userGroupSectionIds'),
                    ':user MEMBER OF act_c.users'
                )
            )
            ->setParameter('userDistrictsIds', empty($districtsIds)?false:$districtsIds)
            ->setParameter('userGroupsIds', empty($activeGroups)?false:$activeGroups)
            ->setParameter('userFollowingIds', empty($userFollowingIds)?false:$userFollowingIds)
            ->setParameter('userGroupSectionIds', empty($sectionsIds)?false:$sectionsIds)
            ->setParameter('user', $user)
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->getQuery()->getSingleScalarResult();
    }

    /**
     * return an array of activities that are read
     *
     * @param User $user
     * @param \Datetime $start
     * @param array $activites
     * @return mixed
     */
    public function getReadItems(User $user, \Datetime $start, array $activites)
    {
        $readItems = $this->getEntityManager()->getRepository(ActivityRead::class)
            ->findLastIdsByUser($user, $start);
        foreach ($activities as $activity) {
            if (in_array($activity->getId(), $readItems)) {
                $activity->setRead(true);
            }
        }
        return $activities;
    }

    /**
     * Find activities by Following the user
     *
     * @param User $following
     * @param $offset
     * @param $limit
     * @return array
     */
    public function findActivitiesByFollowing(User $following, $offset, $limit)
    {
        return $this->createQueryBuilder('act')
            ->leftJoin('act.activityConditions', 'act_c')
            ->where('act_c.userId = :following')
            ->setParameter('following', $following->getId())
            ->orderBy('act.sentAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()->getResult()
        ;
    }

    public function updateResponseCountQuestion(Question $question)
    {
        $query = $this->getEntityManager()
            ->createQuery('UPDATE Civix\CoreBundle\Entity\Activities\Question a
                              SET a.responsesCount = :questions_count
                            WHERE a.questionId = :question');
        $query->setParameter('question', $question->getId())
            ->setParameter('questions_count', $question->getAnswersCount())
        ;

        return $query->execute();
    }

    public function updateLeaderNewsResponseCountQuestion(Question $question)
    {
        $count = $this->getEntityManager()
            ->createQuery('SELECT count(c) FROM CivixCoreBundle:Poll\Comment c WHERE c.question = :question')
            ->setParameter('question', $question)
            ->getSingleScalarResult()
        ;
        
        //representative news auto add new comment after creation
        $count--;

        $this->getEntityManager()
            ->createQuery('UPDATE Civix\CoreBundle\Entity\Activities\LeaderNews rn
                              SET rn.responsesCount = :rn_count
                            WHERE rn.questionId = :question')
            ->setParameter('question', $question->getId())
            ->setParameter('rn_count', $count)
            ->execute()
        ;
    }

    public function updateResponseCountMicroPetition(Petition $micropetition)
    {
        $count = $this->getEntityManager()
            ->createQuery('SELECT count(a) FROM CivixCoreBundle:Micropetitions\Answer a '.
                'WHERE a.petition = :micropetition')
            ->setParameter('micropetition', $micropetition)
            ->getSingleScalarResult()
        ;

        $quorum = $micropetition->getQuorumCount();
        $query = $this->getEntityManager()
            ->createQuery('UPDATE Civix\CoreBundle\Entity\Activities\MicroPetition a
                              SET a.responsesCount = :a_count, a.quorum = :quorum
                            WHERE a.petitionId = :petition');
        $query->setParameter('petition', $micropetition->getId())
            ->setParameter('quorum', $quorum)
            ->setParameter('a_count', $count);

        return $query->execute();
    }

    public function getActivitiesByGroupId($groupId, $maxResults = 500)
    {
        /** @var $entityManager EntityManager */
        $entityManager = $this->getEntityManager();

        /** @var $qb QueryBuilder */
        $qb = $entityManager->createQueryBuilder();

        $activities = $qb->select('act, gr')
            ->from('CivixCoreBundle:Activity', 'act')
            ->leftJoin('act.group', 'gr')
            ->where('gr.id =  :groupId')
            ->setParameter('groupId', (int) $groupId)
            ->orderBy('act.sentAt', 'DESC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult();

        return $activities;
    }

    public function getActivitiesByRepresentativeId($representativeId, $maxResults = 500)
    {
        /** @var $entityManager EntityManager */
        $entityManager = $this->getEntityManager();

        /** @var $qb QueryBuilder */
        $qb = $entityManager->createQueryBuilder();

        $activities = $qb->select('act, repr')
            ->from('CivixCoreBundle:Activities\Question', 'act')
            ->leftJoin('act.representative', 'repr')
            ->where('repr.id =  :representativeId')
            ->setParameter('representativeId', (int) $representativeId)
            ->orderBy('act.sentAt', 'DESC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult();

        return $activities;
    }

    public function updateOwnerUser(User $owner)
    {
        $this->createQueryBuilder('a')
            ->update()
            ->set('a.owner', ':data')
            ->where('a.user = :owner')
            ->setParameter('owner', $owner)
            ->setParameter('data', serialize(Activity::toUserOwnerData($owner)))
            ->getQuery()
            ->execute()
        ;
    }

    public function updateOwnerGroup(Group $owner)
    {
        $this->createQueryBuilder('a')
            ->update()
            ->set('a.owner', ':data')
            ->where('a.group = :owner')
            ->andWhere('a.user IS NULL')
            ->setParameter('owner', $owner)
            ->setParameter('data', serialize(Activity::toGroupOwnerData($owner)))
            ->getQuery()
            ->execute()
        ;
    }

    public function updateOwnerRepresentative(Representative $owner)
    {

    }

    public function updateOwnerAdmin(Superuser $owner)
    {

    }
}
