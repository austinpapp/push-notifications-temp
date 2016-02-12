<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativeNews;

class LoadRepresentativeNewsData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = $this->getReference('representative1');

        $news = new RepresentativeNews();
        $news->setUser($representative);
        $news->setSubject('test');

        $this->addReference('representativeNews1', $news);
        $manager->persist($news);
        
        //published
        $newsPublished = new RepresentativeNews();
        $newsPublished->setUser($representative);
        $newsPublished->setSubject('testPublish');
        $newsPublished->setPublishedAt(new \DateTime());

        $this->addReference('representativeNewsPublished1', $newsPublished);
        $manager->persist($newsPublished);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 11;
    }
}
