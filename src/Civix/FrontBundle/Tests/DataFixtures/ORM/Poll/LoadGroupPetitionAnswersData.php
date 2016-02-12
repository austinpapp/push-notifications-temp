<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Option;

/**
 * LoadGroupPetitionAnswersData
 */
class LoadGroupPetitionAnswersData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $petition = $this->getReference('groupPetitionPublished1');
        $user1 = $this->getReference('user-mobile1');
        
        $signOption = new Option();
        $signOption->setValue('sign');
        $petition->addOption($signOption);
        $manager->persist($signOption);

        $answer = new Answer();
        $answer->setQuestion($petition);
        $answer->setPrivacy(Answer::PRIVACY_PUBLIC);
        $answer->setUser($user1);
        $answer->setComment('Test comment');
        $answer->setOption($signOption);
        $manager->persist($answer);
        
        $petition->addAnswer($answer);
        $manager->persist($petition);
        $manager->flush();
    }

    public function getOrder()
    {
        return 124;
    }
}
