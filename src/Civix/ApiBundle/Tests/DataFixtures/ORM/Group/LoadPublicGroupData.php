<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Group\GroupField;

class LoadPublicGroupData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setUsername('public-group')
            ->setManagerEmail('public-group@example.com')
            ->setPassword('fakepassword');

        $group->setMembershipControl(Group::GROUP_MEMBERSHIP_PUBLIC);

        $manager->persist($group);
        $manager->flush();

        $this->addReference('public-group-fields', $group);
    }
}
