<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Group;

class LoadPasscodeGroupData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setUsername('passcode-group')
            ->setManagerEmail('passcode-group@example.com')
            ->setPassword('fakepassword');

        $group->setMembershipControl(Group::GROUP_MEMBERSHIP_PASSCODE);
        $group->setMembershipPasscode('passcode');

        $manager->persist($group);
        $manager->flush();

        $this->addReference('passcode-group', $group);
    }
}
