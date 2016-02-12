<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadInvitesApprovalGroupData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = $this->getReference('user-mobile1');
        $user->addInvite($this->getReference('approval-group'));
        
        $manager->persist($user);
        $manager->flush();
    }
}
