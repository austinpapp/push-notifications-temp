<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativePetition;

class LoadRepresentativePetitionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = $this->getReference('representative1');

        $petition = new RepresentativePetition();
        $petition->setUser($representative);
        $petition->setPetitionBody('test');
        $petition->setPetitionTitle('test');

        $this->addReference('representativePetition1', $petition);
        $manager->persist($petition);
        
        //outsider sign petition
        $publicPetition = new RepresentativePetition();
        $publicPetition->setUser($representative);
        $publicPetition->setPetitionBody('test');
        $publicPetition->setPetitionTitle('test_public');
        $publicPetition->setIsOutsidersSign(true);
        
        $this->addReference('representativePublicPetition1', $publicPetition);
        $manager->persist($publicPetition);
        
        //published
        $petitionPublished = new RepresentativePetition();
        $petitionPublished->setUser($representative);
        $petitionPublished->setPetitionBody('testPublish');
        $petitionPublished->setPetitionTitle('testPublish');
        $petitionPublished->setPublishedAt(new \DateTime());

        $this->addReference('representativePetitionPublished1', $petitionPublished);
        $manager->persist($petitionPublished);
        $manager->flush();
    }

    public function getOrder()
    {
        return 102;
    }
}
