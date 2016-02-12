<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Representative;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\RepresentativeStorage;

class LoadRepresentativeStorageData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = new RepresentativeStorage();
        $representative->setStorageId(52990);
        $representative->setFirstName('Joseph');
        $representative->setLastName('Biden');
        $representative->setOfficialTitle('Vice President');
        $representative->setOpenstateId('DC000000');
        $representative->setAvatarSrc('http://google.com');
        $this->addReference('representativeStorage', $representative);

        $manager->persist($representative);
        $manager->flush();
    }
}
