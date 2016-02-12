<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Announcement\RepresentativeAnnouncement;

class LoadAnnouncementData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = $this->getReference('representative1');
        
        $announcement = new RepresentativeAnnouncement();
        $announcement->setUser($representative);
        $announcement->setContent('test');
        $this->addReference('announcement1', $announcement);
        $manager->persist($announcement);

        //published
        $announcementPublished = new RepresentativeAnnouncement();
        $announcementPublished->setUser($representative);
        $announcementPublished->setContent('testPublish');
        $announcementPublished->setPublishedAt(new \DateTime());

        $this->addReference('announcementPublished1', $announcementPublished);
        $manager->persist($announcementPublished);
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}
