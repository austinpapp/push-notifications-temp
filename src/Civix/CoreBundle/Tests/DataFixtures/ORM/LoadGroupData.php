<?php

namespace Civix\CoreBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\Group;

/**
 * LoadGroupData
 */
class LoadGroupData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    const GROUP_NAME = 'testgroup';
    const GROUP_PASSWORD = 'testgroup7ZAPe3QnZhbdec';
    const GROUP_EMAIL = 'testgroup@example.com';

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
        //create group
        $group = new Group();
        $group->setUsername(self::GROUP_NAME);
        $group->setManagerEmail(self::GROUP_EMAIL);

        //encode password according configuration
        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($group);
        $password = $encoder->encodePassword(self::GROUP_PASSWORD, $group->getSalt());
        $group->setPassword($password);

        $manager->persist($group);
        $manager->flush();
        
        $this->addReference('group', $group);
    }
}
