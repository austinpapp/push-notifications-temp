<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\Superuser as SuperuserQuestion;

class LoadSuperuserQuestionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $superuser = $this->getReference('superuser');

        $question = new SuperuserQuestion();
        $question->setUser($superuser);
        $question->setSubject('test');

        $this->addReference('superuserQuestion1', $question);
        $manager->persist($question);
        $manager->flush();
    }
}
