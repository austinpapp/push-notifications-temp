<?php

namespace Civix\CoreBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\User;

/**
 * LoadSuperuserData
 */
class LoadUserData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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
        );

        foreach ($users as $data) {
            $user = new User();
            $user->setUsername($data['username']);
            $user->setEmail($data['username'] . '@example.com');

            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($data['username'], $user->getSalt());
            $user->setPassword($password);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 11;
    }
}
