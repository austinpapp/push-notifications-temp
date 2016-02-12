<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Answer;

/**
 * LoadAnswerData
 */
class LoadAnswerData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = $this->getReference('question1');
        
        $answers = array(
            array(
                'reference' => 'answer1',
                'comment' => 'comment1',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PRIVATE,
                'user' => $this->getReference('user-mobile1'),
                'option' => $this->getReference('option-option1'),
            ),
            array(
                'reference' => 'answer2',
                'comment' => 'comment2',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile2'),
                'option' => $this->getReference('option-option2'),
            ),
            array(
                'reference' => 'answer3',
                'comment' => 'comment3',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile3'),
                'option' => $this->getReference('option-option3'),
            ),
            array(
                'reference' => 'answer4',
                'comment' => 'comment4',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile5'),
                'option' => $this->getReference('option-option1'),
            ),
        );
        
        foreach ($answers as $data) {
            $answer = new Answer();
            
            $answer->setComment($data['comment'])
                ->setPrivacy($data['privacy'])
                ->setUser($data['user'])
                ->setOption($data['option'])
                ->setQuestion($question);
            
            $this->addReference($data['reference'], $answer);
            $manager->persist($answer);
        }
        
        $manager->flush();
    }
}
