<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\GroupPetition;

class LoadGroupPetitionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = $this->getReference('group');

        $petition = new GroupPetition();
        $petition->setUser($group);
        $petition->setPetitionBody('test');
        $petition->setPetitionTitle('test');

        $this->addReference('groupPetition1', $petition);
        $manager->persist($petition);
        
        //outsider sign petition
        $publicPetition = new GroupPetition();
        $publicPetition->setUser($group);
        $publicPetition->setPetitionBody('test');
        $publicPetition->setPetitionTitle('test_public');
        $publicPetition->setIsOutsidersSign(true);
        
        $this->addReference('groupPublicPetition1', $publicPetition);
        $manager->persist($publicPetition);
        
        //published
        $petitionPublished = new GroupPetition();
        $petitionPublished->setUser($group);
        $petitionPublished->setPetitionBody('testPublish');
        $petitionPublished->setPetitionTitle('testPublish');
        $petitionPublished->setPublishedAt(new \DateTime());

        $this->addReference('groupPetitionPublished1', $petitionPublished);
        $manager->persist($petitionPublished);
        $manager->flush();
    }

    public function getOrder()
    {
        return 104;
    }
}
