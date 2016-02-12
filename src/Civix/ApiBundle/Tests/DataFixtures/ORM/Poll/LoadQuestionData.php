<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\Group as Question;

/**
 * LoadQuestionData
 */
class LoadQuestionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = new Question();
        $question->setSubject('question1');
        $question->setUser($this->getReference('group-group1'));
        
        $this->addReference('question1', $question);
        
        $manager->persist($question);
        $manager->flush();
    }
}
