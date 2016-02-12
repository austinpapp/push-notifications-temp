<?php

namespace Civix\CoreBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\RepresentativeStorage;

class LoadSTRepresentativeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $stRepresentative = new RepresentativeStorage();
        $stRepresentative->setStorageId(44926);
        $stRepresentative->setFirstName('Joseph');
        $stRepresentative->setLastName('Biden');
        $stRepresentative->setOfficialTitle('Vice President');
        $stRepresentative->setDistrict($this->getReference('district_us'));
        $stRepresentative->setAvatarSrc('http://google.com/');
        $stRepresentative->setUpdatedAt(new \DateTime('2010-01-01'));

        $this->addReference('vice_president', $stRepresentative);
        $manager->persist($stRepresentative);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
