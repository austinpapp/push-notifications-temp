<?php

namespace Civix\CoreBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Representative;

class LoadRepresentativeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = new Representative();
        $representative->setFirstName('Joseph');
        $representative->setLastName('Biden');
        $representative->setUsername('JosephBiden');
        $representative->setOfficialTitle('Vice President');
        $representative->setCity('Washington');
        $representative->setOfficialAddress('1600 Pennsylvania Avenue NW');
        $representative->setOfficialPhone('');
        $representative->setEmail('hhhh@ysyy.com');
        $representative->setDistrict($this->getReference('district_us'));
        $representative->setRepresentativeStorage($this->getReference('vice_president'));

        $this->addReference('vice_president_representative', $representative);
        $manager->persist($representative);
        $manager->flush($representative);
    }

    public function getOrder()
    {
        return 10;
    }
}
