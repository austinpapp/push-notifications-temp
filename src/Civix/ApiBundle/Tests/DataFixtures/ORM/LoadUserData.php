<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\User;

/**
 * LoadUserData
 */
class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $factory = $this->container->get('security.encoder_factory');

        $users = array(
            array('username' => 'mobile1'),
            array('username' => 'mobile2'),
            array('username' => 'mobile3'),
            array('username' => 'mobile4'),
            array('username' => 'mobile5'),
            array('username' => 'mobile6'),
        );
        
        foreach ($users as $data) {
            $user = new User();
            
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($data['username'], $user->getSalt());
            
            $user->setUsername($data['username'])
                ->setEmail($data['username'] . '@example.com')
                ->setPassword($password);
            if ('mobile1' === $data['username']) {
                $user->setResetPasswordToken(sha1($data['username']));
            }
 
            $this->addReference('user-'.$data['username'], $user);
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}
