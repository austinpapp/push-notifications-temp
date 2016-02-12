<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\Representative as Question;

/**
 * LoadQuestionData
 */
class LoadQuestionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $questionData = array('question1', 'question2');
        foreach ($questionData as $key => $questionSubject) {
            $question = new Question();
            $question->setSubject($questionSubject);
            $this->addReference($questionSubject, $question);

            $manager->persist($question);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 110;
    }
}
