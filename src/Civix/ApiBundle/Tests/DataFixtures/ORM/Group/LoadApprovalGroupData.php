<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Group;

class LoadApprovalGroupData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setUsername('approval-group')
            ->setManagerEmail('approval-group@example.com')
            ->setPassword('fakepassword');

        $group->setMembershipControl(Group::GROUP_MEMBERSHIP_APPROVAL);
        
        $this->addReference('approval-group', $group);
        $manager->persist($group);
        $manager->flush();
    }
}
