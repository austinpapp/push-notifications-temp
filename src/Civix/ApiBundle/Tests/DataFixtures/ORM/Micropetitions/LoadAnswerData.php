<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Micropetitions;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Micropetitions\Answer;

class LoadAnswerData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = $this->getReference('petition1');
        
        $answers = array(
            array(
                'reference' => 'micropetition-answer1',
                'user' => $this->getReference('user-mobile1'),
                'option' => 1,
            ),
            array(
                'reference' => 'micropetition-answer2',
                'user' => $this->getReference('user-mobile2'),
                'option' => 2,
            ),
            array(
                'reference' => 'micropetition-answer3',
                'user' => $this->getReference('user-mobile3'),
                'option' => 1,
            ),
            array(
                'reference' => 'petition-answer4',
                'user' => $this->getReference('user-mobile5'),
                'option' => 2,
            ),
        );
        
        foreach ($answers as $data) {
            $answer = new Answer();
            
            $answer
                ->setUser($data['user'])
                ->setOptionId($data['option'])
                ->setPetition($question);
            
            $this->addReference($data['reference'], $answer);
            $manager->persist($answer);
        }
        
        $manager->flush();
    }
}
