<?php

namespace Civix\CoreBundle\DataFixtures\ORM\States\Groups;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\Group;
use Symfony\Component\Security\Core\Util\SecureRandom;

class LoadGroupStateData implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    const COMMON_STATE_GROUP_EMAIL = 'support@powerli.ne';
    /**
     * @var ContainerInterface
     */
    private $container;
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = __DIR__.'/../states.csv';
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //create country
        $countryGroup = $this->creatGroup(
            'US',
            'US1',
            'The United States of America',
            Group::GROUP_TYPE_COUNTRY
        );
        $manager->persist($countryGroup);

        //create state groups
        $dataFileHandler = fopen($this->dataFile, 'r');
        while (($csvRow = fgetcsv($dataFileHandler)) !== false) {
            $stateGroup = $this->creatGroup(
                $csvRow[1],
                $csvRow[1].'1',
                $csvRow[0],
                Group::GROUP_TYPE_STATE,
                $countryGroup
            );

            $manager->persist($stateGroup);
        }

        fclose($dataFileHandler);

        $manager->flush();

        //update current users
        $allUsers = $manager->getRepository('CivixCoreBundle:User')
            ->findAll();
        foreach ($allUsers as $currentUser) {
             $this->container->get('civix_core.group_manager')
                ->autoJoinUser($currentUser);
             $manager->persist($currentUser);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

    private function creatGroup($username, $password, $officialName, $groupType, $parent = null)
    {
        $stateGroup = new Group();
        $stateGroup->setUsername($username);
        $stateGroup->setManagerEmail(self::COMMON_STATE_GROUP_EMAIL);
        $stateGroup->setOfficialName($officialName);
        $stateGroup->setGroupType($groupType);
        $stateGroup->setParent($parent);
        $stateGroup->setLocationName($username);

        $generator = new SecureRandom();

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($stateGroup);
        $password = $encoder->encodePassword(sha1($generator->nextBytes(10)), $stateGroup->getSalt());
        $stateGroup->setPassword($password);

        return $stateGroup;
    }
}
