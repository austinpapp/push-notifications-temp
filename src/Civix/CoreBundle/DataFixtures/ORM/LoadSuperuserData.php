<?php

namespace Civix\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\Superuser;

/**
 * LoadSuperuserData
 */
class LoadSuperuserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    const SUPERUSER_NAME = 'admin';
    const SUPERUSER_PASSWORD = 'admin';
    const SUPERUSER_EMAIL = 'admin@example.com';

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
        //create superuser
        $superuser = new Superuser();
        $superuser->setUsername(self::SUPERUSER_NAME);
        $superuser->setEmail(self::SUPERUSER_EMAIL);

        //encode password according configuration
        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($superuser);
        $password = $encoder->encodePassword(self::SUPERUSER_PASSWORD, $superuser->getSalt());
        $superuser->setPassword($password);

        $this->addReference('superuser', $superuser);
        $manager->persist($superuser);
        $manager->flush();
    }
}
