<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadInvitesData
 */
class LoadInvitesData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = $this->getReference('user-mobile1');
        
        $user->addInvite($this->getReference('group-group1'))
            ->addInvite($this->getReference('group-group2'));
        
        $manager->persist($user);

        $manager->flush();
    }
}
