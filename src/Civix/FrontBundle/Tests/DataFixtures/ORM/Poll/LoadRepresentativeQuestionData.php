<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Question\Representative as RepresentativeQuestion;

class LoadRepresentativeQuestionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representative = $this->getReference('representative1');

        $question = new RepresentativeQuestion();
        $question->setUser($representative);
        $question->setSubject('test');

        $this->addReference('representativeQuestion1', $question);
        $manager->persist($question);
        $manager->flush();
    }

    public function getOrder()
    {
        return 103;
    }
}
