<?php
namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Model\Geocode\AddressComponent;
use Symfony\Component\Security\Core\Util\SecureRandom;

class GroupRepository extends EntityRepository
{
    public function getGroupsByUser(User $user)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        return $queryBuilder
                ->select('gr')
                ->from('CivixCoreBundle:Group', 'gr')
                ->getQuery()
                ->getResult();
    }

    public function getUserGroupsByUser(User $user)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb
            ->select('ug, g')
            ->from(UserGroup::class, 'ug')
            ->leftJoin('ug.group', 'g')
            ->where('ug.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getPopularGroupsByUser(User $user)
    {
        $groupOfUserIds = $user->getGroupsIds();

        $qb = $this->getEntityManager()
            ->createQueryBuilder();

        $qb->select('g, COUNT(u) AS HIDDEN count_users')
            ->from('CivixCoreBundle:Group', 'g')
            ->leftJoin('g.users', 'u')
            ->where('g.groupType = :type')
            ->setParameters(array(
                'type' => Group::GROUP_TYPE_COMMON
            ))
            ->groupBy('g')
            ->orderBy('count_users', 'DESC')
            ->setMaxResults(5)
        ;
        if (!empty($groupOfUserIds)) {
            $qb->andWhere('g.id NOT IN (:ids)')
                ->setParameter('ids', $groupOfUserIds);
        }

        return $qb->getQuery()->getResult();
    }

    public function getNewGroupsByUser(User $user)
    {
        $groupOfUserIds = $user->getGroupsIds();

        $qb = $this->getEntityManager()
        ->createQueryBuilder();

        $limitDate = new \DateTime('NOW');
        $limitDate->sub(new \DateInterval('P7D'));
        $qb->select('g')
            ->from('CivixCoreBundle:Group', 'g')
            ->leftJoin('g.users', 'u')
            ->where('g.groupType = :type')
            ->andWhere('g.createdAt > :limit_date')
            ->setParameters(array(
                'type' => Group::GROUP_TYPE_COMMON,
                'limit_date' => $limitDate
            ))
            ->orderBy('g.createdAt', 'DESC')
        ;
        if (!empty($groupOfUserIds)) {
            $qb->andWhere('g.id NOT IN (:ids)')
            ->setParameter('ids', $groupOfUserIds);
        }

        return $qb->getQuery()->getResult();
    }

    public function getQueryGroupOrderedById($type = Group::GROUP_TYPE_COMMON, $order = 'DESC')
    {
        return $this->createQueryBuilder('g')
                ->where('g.groupType = :type')
                ->setParameter('type', $type)
                ->orderBy('g.id', $order);
    }

    public function getQueryCountryGroupChildren(Group $countryGroup)
    {
        return $this->createQueryBuilder('g')
            ->where('g.parent = :parent')
            ->setParameter('parent', $countryGroup)
        ;
    }

    public function removeGroup(Group $group)
    {
        $this->getEntityManager()
            ->createQueryBuilder()
            ->update('CivixCoreBundle:Poll\Question\Group g')
            ->set('g.user', 'NULL')
            ->where('g.user = :groupId')
            ->setParameter('groupId', $group->getId())
            ->getQuery()
            ->execute();

        $this->getEntityManager()
            ->createQueryBuilder()
            ->update('CivixCoreBundle:Activity a')
            ->set('a.group', 'NULL')
            ->where('a.group = :groupId')
            ->setParameter('groupId', $group->getId())
            ->getQuery()
            ->execute();

        $this->getEntityManager()->getConnection()
                ->delete('users_groups', array('group_id'=>$group->getId()));

        $this->getEntityManager()
            ->createQueryBuilder()
            ->delete('CivixCoreBundle:Group g')
            ->where('g.id = :groupId')
            ->setParameter('groupId', $group->getId())
            ->getQuery()
            ->execute();

    }

    public function getTotalMembers(Group $group)
    {
        $count = $this->getEntityManager()
                ->createQuery('
                    SELECT COUNT(u)
                    FROM CivixCoreBundle:Group g
                    LEFT JOIN g.users u
                    WHERE g.id = :id
                ')
            ->setParameter('id', $group->getId())
            ->getSingleScalarResult();

        $group->setTotalMembers((int) $count);

        return $count;
    }

    public function getGroupByIdAndType($id, $type = Group::GROUP_TYPE_COMMON)
    {
        return $this->findOneBy(array(
            'id' => $id,
            'groupType' => $type
        ));
    }

    public function getLocalGroupsByState($state)
    {
        return $this->createQueryBuilder('g')
                ->where('g.groupType = :type')
                ->andWhere('g.localState = :state')
                ->setParameter('type', Group::GROUP_TYPE_LOCAL)
                ->setParameter('state', $state)
                ->getQuery()->getResult()
        ;
    }

    public function getLocalGroupForRepr($id, $representativeId)
    {
        return $this->createQueryBuilder('gr')
            ->innerJoin('gr.localRepresentatives', 'repr')
            ->where('gr.id = :id')
            ->andWhere('gr.groupType = :type')
            ->andWhere('repr.id = :representativeId')
            ->setParameters(array(
                'id' => $id,
                'type' => Group::GROUP_TYPE_LOCAL,
                'representativeId' => $representativeId
            ))
            ->getQuery()
            ->getOneOrNullResult();
    }


    public function cleanIncorrectLocalGroup()
    {
        return $this->getEntityManager()
            ->createQuery('DELETE FROM CivixCoreBundle:Group gr
                            WHERE gr.localDistrict IS NULL AND gr.groupType=:type')
            ->setParameter('type', Group::GROUP_TYPE_LOCAL)
            ->execute();
    }

    public function findByQuery($query, User $user)
    {
        $qb = $this->createQueryBuilder('g');
        $qb->leftJoin('g.users', 'u')
            ->where('u.user = :user')
            ->andWhere($qb->expr()->like('g.officialName', $qb->expr()->literal('%' . $query . '%')))
            ->setParameter('user', $user)
        ;

        return $qb->getQuery()->getResult();
    }

    public function cleanCommonGroups()
    {
         return $this->getEntityManager()
            ->createQuery('DELETE FROM CivixCoreBundle:Group gr
                            WHERE gr.groupType=:type')
            ->setParameter('type', Group::GROUP_TYPE_COMMON)
            ->execute();
    }

    public function findCountryGroup($country)
    {
        return $this->findOneBy([
            'locationName' => $country,
            'groupType' => Group::GROUP_TYPE_COUNTRY
        ]);
    }

    public function findStateGroup($state, Group $countryGroup = null)
    {
        return $this->findOneBy([
            'locationName' => $state,
            'parent' => $countryGroup,
            'groupType' => Group::GROUP_TYPE_STATE
        ]);
    }

    public function findLocalGroup($location, Group $stateGroup = null)
    {
        return $this->findOneBy([
            'locationName' => $location,
            'parent' => $stateGroup,
            'groupType' => Group::GROUP_TYPE_LOCAL
        ]);
    }

    public function getCountryGroup(AddressComponent $addressComponent)
    {
        $group = $this->findCountryGroup($addressComponent->getShortName());
        if (!$group) {
            $group = new Group();
            $group
                ->setGroupType(Group::GROUP_TYPE_COUNTRY)
                ->setUsername($addressComponent->getShortName() . uniqid())
                ->setOfficialName($addressComponent->getLongName())
                ->setLocationName($addressComponent->getShortName())
                ->setAcronym($addressComponent->getShortName())
            ;

            $generator = new SecureRandom();
            $group->setPassword(sha1($generator->nextBytes(10)));

            $this->getEntityManager()->persist($group);
            $this->getEntityManager()->flush($group);
        }

        return $group;
    }

    public function getStateGroup(AddressComponent $addressComponent, Group $countryGroup = null)
    {
        $group = $this->findStateGroup($addressComponent->getShortName(), $countryGroup);
        if (!$group) {
            $group = new Group();
            $group
                ->setGroupType(Group::GROUP_TYPE_STATE)
                ->setUsername($addressComponent->getShortName() . uniqid())
                ->setOfficialName($addressComponent->getLongName())
                ->setLocationName($addressComponent->getShortName())
                ->setParent($countryGroup)
            ;

            $generator = new SecureRandom();
            $group->setPassword(sha1($generator->nextBytes(10)));

            $this->getEntityManager()->persist($group);
            $this->getEntityManager()->flush($group);
        }

        return $group;
    }

    public function getLocalGroup(AddressComponent $addressComponent, Group $stateGroup = null)
    {
        $group = $this->findLocalGroup($addressComponent->getShortName(), $stateGroup);
        if (!$group) {
            $group = new Group();
            $group
                ->setGroupType(Group::GROUP_TYPE_LOCAL)
                ->setUsername($addressComponent->getShortName() . uniqid())
                ->setOfficialName($addressComponent->getLongName())
                ->setLocationName($addressComponent->getShortName())
                ->setParent($stateGroup)
            ;

            $generator = new SecureRandom();
            $group->setPassword(sha1($generator->nextBytes(10)));

            $this->getEntityManager()->persist($group);
            $this->getEntityManager()->flush($group);
        }

        return $group;
    }
}
