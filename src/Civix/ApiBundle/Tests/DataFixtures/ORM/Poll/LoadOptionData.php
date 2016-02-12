<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Option;

/**
 * LoadOptionData
 */
class LoadOptionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = $this->getReference('question1');
        
        $options = array(
            array('value' => 'option1'),
            array('value' => 'option2'),
            array('value' => 'option3'),
        );
        
        foreach ($options as $data) {
            $option = new Option();
            $option->setValue($data['value'])
                ->setQuestion($question);
            
            $this->addReference('option-'.$data['value'], $option);
            
            $manager->persist($option);
        }

        $manager->flush();
    }
}
