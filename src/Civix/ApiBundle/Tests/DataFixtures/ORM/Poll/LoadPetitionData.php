<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\GroupPetition;
use Civix\CoreBundle\Entity\Poll\Option;

class LoadPetitionData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $petition = new GroupPetition();
        $petition->setPetitionTitle('Petition title');
        $petition->setPetitionBody('Petition body');
        $petition->setUser($this->getReference('group-group1'));
        $petition->setPublishedAt(new \DateTime('now'));
        
        $option = new Option();
        $option->setQuestion($petition)
            ->setValue('sign')
        ;

        $this->addReference('petition1', $petition);
        $this->addReference('petition-option1', $option);
        
        $manager->persist($option);
        $manager->persist($petition);
        $manager->flush();
    }
}
