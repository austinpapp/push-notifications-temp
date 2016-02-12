<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\User;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\User;

class LoadFacebookUserData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $users = array(
            array('username' => 'facebook1'),
            array('username' => 'facebook2'),
        );

        foreach ($users as $key => $data) {
            $user = new User();
            
            $user->setUsername($data['username'])
                ->setEmail($data['username'] . '@example.com')
                ->setPassword('fakepassword')
                ->setFacebookId('1000000000'. $key);

            $this->addReference('user-'.$data['username'], $user);
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}
