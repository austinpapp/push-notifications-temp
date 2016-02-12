<?php

namespace Civix\CoreBundle\Service\Group;

use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Entity\Invites\UserToGroup;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Model\Geocode\AddressComponent;
use Civix\CoreBundle\Service\Google\Geocode;

class GroupManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Geocode
     */
    private $geocode;

    private $permissionPriority = [
        'permissions_name', 'permissions_address', 'permissions_email', 'permissions_phone', 'permissions_responses'
    ];

    public function __construct(EntityManager $entityManager, Geocode $geocode)
    {
        $this->entityManager = $entityManager;
        $this->geocode = $geocode;
    }

    public function joinToGroup(User $user, Group $group)
    {
        //current status Group
        $userGroup = $this->entityManager
            ->getRepository('CivixCoreBundle:UserGroup')
            ->isJoinedUser($group, $user);

        //check if user is joined yet and want to join
        if ($userGroup) {
            return $userGroup;
        }

        $userGroup = new UserGroup($user, $group);
        if ($user->getInvites()->contains($group)) {
            $userGroup->setStatus(UserGroup::STATUS_ACTIVE);
            $user->removeInvite($group);
        }
        $userGroup->setPermissionsByGroup($group);
        $this->entityManager->createQueryBuilder()
            ->delete(UserToGroup::class, 'i')
            ->where('i.user = :user AND i.group = :group')
            ->setParameter('user', $user)
            ->setParameter('group', $group)
            ->getQuery()->execute();
        $this->entityManager->persist($userGroup);
        $this->entityManager->flush($userGroup);

        return $user;
    }

    public function unjoinGroup(User $user, Group $group)
    {
        $this->entityManager->createQueryBuilder()
            ->delete(UserGroup::class, 'ug')
            ->where('ug.group = :group AND ug.user = :user')
            ->setParameter('group', $group)
            ->setParameter('user', $user)
            ->getQuery()->execute();
    }

    /**
     * Check if $group not fixed (may to join and unjoin without limiations)
     * 
     * @param \Civix\CoreBundle\Entity\Group $group
     * 
     * @return boolean
     */
    public function isCommonGroup(Group $group)
    {
        return ($group->getGroupType() === Group::GROUP_TYPE_COMMON);
    }

     /**
     * Check if $group private (need passcode) and not invited user
     * 
     * @param \Civix\CoreBundle\Entity\Group $group
     * 
     * @return boolean
     */
    public function isNeedCheckPasscode(Group $group, User $user)
    {
        return ($group->getMembershipControl() === Group::GROUP_MEMBERSHIP_PASSCODE &&
            !$user->getInvites()->contains($group)
        );
    }

    public function autoJoinUser(User $user)
    {
        $this->resetGeoGroups($user);

        $query = $user->getAddressQuery();
        $repository = $this->entityManager->getRepository('CivixCoreBundle:Group');

        $country = $this->geocode->getCountry($query);
        if ($country) {
            $countryGroup = $repository->getCountryGroup($country);
        } else {
            $countryGroup = $repository->findCountryGroup($user->getCountry());
        }

        if (!$countryGroup) {
            return $user;
        }

        $this->joinToGroup($user, $countryGroup);

        $state = $this->geocode->getState($query);
        if ($state) {
            $stateGroup = $repository->getStateGroup($state, $countryGroup);
        } else {
            $stateGroup = $repository->findStateGroup($user->getState(), $countryGroup);
        }

        if ($stateGroup) {
            $this->joinToGroup($user, $stateGroup);
        }

        $locality = $this->geocode->getLocality($query);
        if ($locality) {
            $localityGroup = $repository->getLocalGroup($locality, $stateGroup ? $stateGroup : $countryGroup);
        } else {
            $localityGroup = $repository->findLocalGroup($user->getCity(), $stateGroup ? $stateGroup : $countryGroup);
        }

        if ($localityGroup) {
            $this->joinToGroup($user, $localityGroup);
        }

        return $user;
    }

    public function isMorePermissions(Group $oldGroup, Group $newGroup)
    {
        $oldSumPriorityValue = 0;
        $newSumPriorityValue = 0;
        
        $previousPermissions = $oldGroup->getRequiredPermissions();
        $newPermissions = $newGroup->getRequiredPermissions();
        
        foreach ($this->permissionPriority as $priority => $key) {
            $oldSumPriorityValue += $this->calcPriorityValue(
                $previousPermissions, $key, $priority
            );
            $newSumPriorityValue += $this->calcPriorityValue(
                $newPermissions, $key, $priority
            );
        }

        return $oldSumPriorityValue < $newSumPriorityValue;
    }

    public function resetGeoGroups(User $user)
    {
        $userGroups = $this->entityManager->getRepository(UserGroup::class)->getGeoUserGroups($user);
        if (!empty($userGroups)) {
            $this->entityManager->createQueryBuilder()
                ->delete(UserGroup::class, 'ug')
                ->where('ug.id IN (:ids)')
                ->setParameter('ids', array_map(function (UserGroup $userGroup) {
                    return $userGroup->getId();
                }, $userGroups))
                ->getQuery()->execute();
        }
    }

    private function calcPriorityValue($permissions, $key, $priority)
    {
        return (array_search($key, $permissions)!==false?1:0) * pow(10, $priority);
    }
}
