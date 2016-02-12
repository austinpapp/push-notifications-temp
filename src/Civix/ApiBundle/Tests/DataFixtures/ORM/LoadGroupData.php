<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Group\GroupField;

/**
 * LoadGroupData
 */
class LoadGroupData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
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

        $groups = array(
            array('username' => 'group1'),
            array('username' => 'group2'),
        );

        foreach ($groups as $data) {
            $group = new Group();
            
            $encoder = $factory->getEncoder($group);
            $password = $encoder->encodePassword($data['username'], $group->getSalt());
            
            $group->setUsername($data['username'])
                ->setManagerEmail($data['username'] . '@example.com')
                ->setPassword($password);

            $this->addReference('group-'.$data['username'], $group);
            
            $manager->persist($group);
        }

        $manager->flush();
    }
}
