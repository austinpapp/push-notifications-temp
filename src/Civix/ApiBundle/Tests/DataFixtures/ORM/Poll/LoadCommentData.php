<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Poll;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Poll\Comment;

class LoadCommentData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $firstComment = new Comment();
        $firstComment->setCommentBody('comment');
        $firstComment->setParentComment(null);
        $firstComment->setQuestion($this->getReference('question1'));

        $this->addReference('comment1', $firstComment);
        $manager->persist($firstComment);
        $manager->flush();
    }
}
