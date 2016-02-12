<?php

namespace Civix\CoreBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\Representative;

/**
 * LoadRepresentativeData
 */
class LoadInitRepresentativeData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    const REPRESENTATIVE_NAME = 'testrepresentative';
    const REPRESENTATIVE_PASSWORD = 'testrepresentative7ZAPe3QnZhbdec';
    const REPRESENTATIVE_TITLE = 'test representative';
    const REPRESENTATIVE_ADDRESS = 'Mensk';
    const REPRESENTATIVE_PHONE = '375291111111';
    const REPRESENTATIVE_EMAIL = 'testrepresentative@example.com';
    const REPRESENTATIVE_COUNTRY = 'US';
    const REPRESENTATIVE_CITY = 'New York';

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
        // Create representative
        /** @var $representative Representative */
        $representative = new Representative();
        $representative->setFirstName(self::REPRESENTATIVE_NAME);
        $representative->setLastName(self::REPRESENTATIVE_NAME);
        $representative->setUsername(self::REPRESENTATIVE_NAME);
        $representative->setOfficialTitle(self::REPRESENTATIVE_TITLE);
        $representative->setOfficialAddress(self::REPRESENTATIVE_ADDRESS);
        $representative->setOfficialPhone(self::REPRESENTATIVE_PHONE);
        $representative->setEmail(self::REPRESENTATIVE_EMAIL);
        $representative->setCountry(self::REPRESENTATIVE_COUNTRY);
        $representative->setCity(self::REPRESENTATIVE_CITY);
        $representative->setDistrict($this->getReference('district_us'));

        //encode password according configuration
        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($representative);
        $password = $encoder->encodePassword(self::REPRESENTATIVE_PASSWORD, $representative->getSalt());
        $representative->setPassword($password);

        $this->addReference('representative1', $representative);
        $manager->persist($representative);
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
