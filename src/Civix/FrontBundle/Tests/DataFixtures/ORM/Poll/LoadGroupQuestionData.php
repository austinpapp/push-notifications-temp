<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\Group as GroupQuestion;

class LoadGroupQuestionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = $this->getReference('group');

        $question = new GroupQuestion();
        $question->setUser($group);
        $question->setSubject('test');

        $this->addReference('groupQuestion1', $question);
        $manager->persist($question);
        $manager->flush();
    }
}
