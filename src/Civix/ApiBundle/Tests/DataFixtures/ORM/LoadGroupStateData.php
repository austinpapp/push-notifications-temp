<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Civix\CoreBundle\Entity\Group;

class LoadGroupStateData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //create country
        $countryGroup = $this->creatGroup(
            'US',
            'US1',
            'The United States of America',
            Group::GROUP_TYPE_COUNTRY
        );
        $this->addReference('group-country', $countryGroup);
        $manager->persist($countryGroup);

        //create state group
        $stateGroup = $this->creatGroup(
            'DC',
            'DC1',
            'District of Columbia',
            Group::GROUP_TYPE_STATE
        );
        $this->addReference('group-state', $stateGroup);
        $manager->persist($stateGroup);
        
        $manager->flush();
    }

    private function creatGroup($username, $password, $officialName, $groupType)
    {
        $stateGroup = new Group();
        $stateGroup->setUsername($username);
        $stateGroup->setManagerEmail('user@user.com');
        $stateGroup->setOfficialName($officialName);
        $stateGroup->setGroupType($groupType);

        $generator = new SecureRandom();
        $password = $generator->nextBytes(10);
        $stateGroup->setPassword($password);

        return $stateGroup;
    }
}
