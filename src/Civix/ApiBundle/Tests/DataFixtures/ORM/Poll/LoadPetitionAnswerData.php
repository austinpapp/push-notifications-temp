<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Answer;

/**
 * LoadPetitionData
 */
class LoadPetitionAnswerData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = $this->getReference('petition1');
        
        $answers = array(
            array(
                'reference' => 'petition-answer1',
                'comment' => 'comment1',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PRIVATE,
                'user' => $this->getReference('user-mobile1'),
                'option' => $this->getReference('petition-option1'),
            ),
            array(
                'reference' => 'petition-answer2',
                'comment' => 'comment2',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile2'),
                'option' => $this->getReference('petition-option1'),
            ),
            array(
                'reference' => 'petition-answer3',
                'comment' => 'comment3',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile3'),
                'option' => $this->getReference('petition-option1'),
            ),
            array(
                'reference' => 'petition-answer4',
                'comment' => 'comment4',
                'privacy' => \Civix\CoreBundle\Entity\Poll\Answer::PRIVACY_PUBLIC,
                'user' => $this->getReference('user-mobile5'),
                'option' => $this->getReference('petition-option1'),
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
