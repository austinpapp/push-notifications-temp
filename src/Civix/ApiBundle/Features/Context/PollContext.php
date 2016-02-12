<?php

namespace Civix\ApiBundle\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Option;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Micropetitions\Petition as Micropetition;
use Civix\CoreBundle\Entity\Micropetitions\Comment as MicropetitionComment;

class PollContext extends BehatContext
{
    use SubContextHelper;

    /**
     * @Given /^There are published questions$/
     */
    public function thereArePublishedQuestions(TableNode $table)
    {
        $em = $this->getEm();
        $hash = $table->getHash();
        foreach ($hash as $row) {
            $class = 'Civix\\CoreBundle\\Entity\\Poll\\Question\\' . $row['type'];
            /* @var $entity \Civix\CoreBundle\Entity\Poll\Question */
            $entity = new $class;
            $entity->setSubject($row['subject']);
            $entity->setPublishedAt(new \DateTime());
            $expire = new \DateTime();
            $expire->add(new \DateInterval('P1D'));
            $entity->setExpireAt($expire);
            $entity->setUser($em->getRepository('Civix\\CoreBundle\\Entity\\' . $row['owner'])
                ->findOneByUsername($row['username']));
            foreach (range(1, 2) as $value) {
                $option = new Option();
                $option->setValue($value);
                $entity->addOption($option);
            }

            $em->persist($entity);
            $em->flush($entity);
        }
    }

    /**
     * @Given /^User "([^"]*)" answered to questions$/
     */
    public function userAnsweredToQuestions($username, TableNode $table)
    {
        $em = $this->getEm();

        $user = $em->getRepository(User::class)
            ->findOneByUsername($username);

        $hash = $table->getHash();
        foreach ($hash as $row) {
            /* @var $question Question */
            $question = $em->getRepository(Question::class)
                ->findOneBySubject($row['question']);

            $option = $question->getOptions()->first();
            $answer = new Answer();
            $answer->setQuestion($question);
            $answer->setOption($option);
            $answer->setUser($user);
            $answer->setComment('');
            $em->persist($answer);
            $em->flush($answer);
        }
    }

    /**
     * @When /^"([^"]*)" create a post "([^"]*)" in "([^"]*)" community$/
     */
    public function createAPostInCommunity($username, $post, $group)
    {
        $group = $this->getEm()->getRepository(Group::class)
            ->findOneByUsername($group);
        $this->getMainContext()->callPost(
            $this->getMainContext()->getAbsoluteUrl('/api/micro-petitions'),
            json_encode([
                'group_id' => $group->getId(),
                'user_expire_interval' => 7,
                'type' => 'quorum',
                'petition_body' => $post
            ]),
            $this->getAuthHeader($username)
        );
        $this->getMainContext()->responseStatusShouldBe(200);
    }

    /**
     * @When /^"([^"]*)" comment to post "([^"]*)" with message "([^"]*)"$/
     */
    public function commentToPostWithMessage($username, $post, $message)
    {
        $em = $this->getEm();

        $micropetition = $em->getRepository(Micropetition::class)
            ->findOneByPetitionBody($post);

        $parentComment = $em->getRepository(MicropetitionComment::class)->findOneBy([
            'petition' => $micropetition,
            'parentComment' => null
        ]);

        $this->getMainContext()->callPost(
            $this->getMainContext()->getAbsoluteUrl(
                "/api/micro-petitions/{$micropetition->getId()}/comments/"
            ),
            json_encode([
                'parent_comment' => $parentComment->getId(),
                'comment_body' => $message,
                'privacy' => 0,
            ]),
            $this->getAuthHeader($username)
        );

        $this->getMainContext()->responseStatusShouldBe(200);
    }
}
