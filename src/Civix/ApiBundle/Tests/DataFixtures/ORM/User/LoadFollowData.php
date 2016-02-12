<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\User;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\UserFollow;

/**
 * LoadFollowData
 */
class LoadFollowData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userRepository = $manager->getRepository('CivixCoreBundle:User');
        
        $userRepository->follow($this->getReference('user-mobile1'), $this->getReference('user-mobile2'));
        $userRepository->follow($this->getReference('user-mobile1'), $this->getReference('user-mobile3'));
        $userRepository->follow($this->getReference('user-mobile1'), $this->getReference('user-mobile4'));
        $userRepository->follow($this->getReference('user-mobile4'), $this->getReference('user-mobile1'));
        $userRepository->follow($this->getReference('user-mobile6'), $this->getReference('user-mobile1'));
        
        $manager->flush();
        
        $userRepository->active($this->getReference('user-mobile2'), $this->getReference('user-mobile1'));
        $userRepository->active($this->getReference('user-mobile3'), $this->getReference('user-mobile1'));
        $userRepository->active($this->getReference('user-mobile1'), $this->getReference('user-mobile4'));
        
        $manager->flush();
    }
}
