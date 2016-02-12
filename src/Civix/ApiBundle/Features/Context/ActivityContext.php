<?php

namespace Civix\ApiBundle\Features\Context;

use PHPUnit_Framework_Assert as Assert;

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManager;

use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativeNews;
use Civix\CoreBundle\Entity\Activities\Question as QuestionActivity;
use Civix\CoreBundle\Entity\Activities\LeaderNews as LeaderNewsActivity;
use Civix\CoreBundle\Entity\Activity;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\User;

class ActivityContext extends BehatContext
{
    use SubContextHelper;

    /**
     * @Given /^There are activity for questions$/
     */
    public function thereAreActivityForQuestions(TableNode $table)
    {
        /* @var $em EntityManager */
        $em = $this->getEm();
        /* @var $activityService \Civix\CoreBundle\Service\ActivityUpdate */
        $activityService = $this->getMainContext()->getContainer()->get('civix_core.activity_update');
        $hash = $table->getHash();
        $diffSec = 0;
        foreach ($hash as $row) {
            /* @var $question Question */
            $diffSec++;
            $question = $em->getRepository(Question::class)->findOneBySubject($row['question']);
            $activity = $activityService->publishQuestionToActivity($question);
            Assert::assertInstanceOf(Activity::class, $activity);
            $activity->getSentAt()->sub(new \DateInterval('PT' . (count($hash) - $diffSec) .'S'));
            $activity->setSentAt(clone $activity->getSentAt());
            $em->flush($activity);
            if (!empty($row['expired_interval_direction'])) {
                $expired = new \DateTime();
                $expired->$row['expired_interval_direction'](new \DateInterval($row['expired_interval_value']));
                $activity->setExpireAt($expired);
                $em->flush($activity);
            }
        }
        $result = $em->getRepository(QuestionActivity::class)->findAll();
        Assert::assertTrue(count($result) >= count($hash));
    }

    /**
     * @Given /^There are published representative news$/
     */
    public function thereArePublishedLeaderNews(TableNode $table)
    {
        /* @var $em EntityManager */
        $em = $this->getEm();
        /* @var $activityService \Civix\CoreBundle\Service\ActivityUpdate */
        $activityService = $this->getMainContext()->getContainer()->get('civix_core.activity_update');
        $hash = $table->getHash();
        $diffSec = 0;
        foreach ($hash as $row) {
            $diffSec++;
            $news = new RepresentativeNews();
            $news->setUser($em->getRepository(Representative::class)
                ->findOneByUsername($row['username']));
            $news->setSubject($row['subject']);
            $news->setPublishedAt(new \DateTime());
            $em->persist($news);
            $em->flush($news);
            $activity = $activityService->publishLeaderNewsToActivity($news);
            $activity->getSentAt()->sub(new \DateInterval('PT' . (count($hash) - $diffSec) .'S'));
            $activity->setSentAt(clone $activity->getSentAt());
            if (!empty($row['expired_interval_direction'])) {
                $expired = new \DateTime();
                $expired->$row['expired_interval_direction'](new \DateInterval($row['expired_interval_value']));
                $activity->setExpireAt($expired);
                $em->flush($activity);
            }
        }

        $result = $em->getRepository(LeaderNewsActivity::class)->findAll();
        Assert::assertTrue(count($result) >= count($hash));
    }

    /**
     * @Then /^"([^"]*)" sees "([^"]*)" activity on "([^"]*)" profile$/
     */
    public function seesActivityOnProfile($username, $activity, $following)
    {
        $following = $this->getEm()->getRepository(User::class)
            ->findOneByUsername($following);
        $this->getMainContext()
            ->callGET($this->getAbsoluteUrl(
                '/api/activities/?following=' . $following->getId()
            ), $this->getAuthHeader($username));
        Assert::assertEquals(200, $this->getLastResponse()->getStatusCode());
        Assert::assertContains($activity, $this->getLastResponseContent());
    }

    /**
     * @Then /^"([^"]*)" sees mentioned social activity item on "([^"]*)" tab from "([^"]*)"$/
     */
    public function seesMentionedSocialActivityItemOnTabFrom($username, $tab, $from)
    {
        $this->getMainContext()
            ->callGET(
                $this->getAbsoluteUrl('/api/social-activities/'),
                $this->getAuthHeader($username)
            );

        Assert::assertEquals(200, $this->getLastResponse()->getStatusCode());
        Assert::assertContains(
            "<strong>$from<\/strong> mentioned you in a comment",
            $this->getLastResponseContent()
        );
        Assert::assertContains('"tab":"' . $tab . '"', $this->getLastResponseContent());
    }
}
