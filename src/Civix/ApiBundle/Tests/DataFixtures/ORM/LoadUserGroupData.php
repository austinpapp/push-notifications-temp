<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\UserGroup;

class LoadUserGroupData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = $this->getReference('user-mobile1');
        $userGroup = new UserGroup($user, $this->getReference('group-group1'));
        $manager->persist($userGroup);
        $userGroup = new UserGroup($user, $this->getReference('group-state'));
        $manager->persist($userGroup);
        $userGroup = new UserGroup($user, $this->getReference('group-country'));
        $manager->persist($userGroup);
        $manager->flush();
    }
}
