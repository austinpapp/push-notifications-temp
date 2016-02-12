<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Micropetitions;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Micropetitions\Petition;

/**
 * LoadQuestionData
 */
class LoadPetitionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = $this->getReference('group-group1');
        $user = $this->getReference('user-mobile1');
        $expireDate = new \DateTime();
        $expireDate->add(new \DateInterval('P10D'));
        
        $micropetition = new Petition();
        $micropetition->setTitle('Title');
        $micropetition->setPetitionBody('Text of petition');
        $micropetition->setGroup($group);
        $micropetition->setUser($user);
        $micropetition->setIsOutsidersSign(false);
        $micropetition->setPublishStatus(Petition::STATUS_USER);
        $micropetition->setExpireAt($expireDate);
        $micropetition->setUserExpireInterval(2);
        
        $this->addReference('petition1', $micropetition);
        
        $manager->persist($micropetition);
        $manager->flush();
    }
}
