<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Option;

/**
 * LoadOptionData
 */
class LoadOptionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $questionData = array('question1', 'question2');
        $options = array(
            array('value' => 'option1'),
            array('value' => 'option2'),
        );
        
        foreach ($questionData as $key => $questionSubject) {
            $question = $this->getReference($questionSubject);
            
            foreach ($options as $optionKey => $data) {
                if ($key <= $optionKey) {
                    $option = new Option();
                    $option->setValue($data['value'])
                        ->setQuestion($question);

                    $this->addReference($questionSubject.'-option-'.$data['value'], $option);

                    $manager->persist($option);
                }
            }

        }
  
        $manager->flush();
    }

    public function getOrder()
    {
        return 120;
    }
}
