<?php
namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\Superuser;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Comment;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Poll\Question\LeaderNews;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Question\LeaderEvent;
use Civix\CoreBundle\Entity\Poll\EducationalContext;
use Civix\CoreBundle\Entity\Activities\Question as ActivityQuestion;
use Civix\CoreBundle\Entity\Activities\MicroPetition as ActivityMicroPetition;
use Civix\CoreBundle\Entity\Activities\Petition as ActivityPetition;
use Civix\CoreBundle\Entity\Activities\LeaderNews as ActivityLeaderNews;
use Civix\CoreBundle\Entity\Activities\LeaderEvent as ActivityLeaderEvent;
use Civix\CoreBundle\Entity\Activities\PaymentRequest as ActivityPaymentRequest;
use Civix\CoreBundle\Entity\Activities\CrowdfundingPaymentRequest as ActivityCrowdfundingPaymentRequest;
use Civix\CoreBundle\Entity\Activity;
use Civix\CoreBundle\Entity\ActivityCondition;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\GroupSection;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Micropetitions\Petition as MicroPetition;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Service\PushTask;
use Symfony\Component\Security\Core\User\UserInterface;

class ActivityUpdate
{
    protected $entityManager;
    protected $pushSender;
    protected $validator;
    /**
     * @var Settings
     */
    private $settings;
    private $cm;

    public function __construct(EntityManager $entityManager, PushTask $pushSender,
                                $validator, Settings $settings, Poll\CommentManager $cm)
    {
        $this->entityManager = $entityManager;
        $this->pushSender = $pushSender;
        $this->validator = $validator;
        $this->settings = $settings;
        $this->cm = $cm;
    }

    public function publishQuestionToActivity(Question $question)
    {
        $errors = $this->validator->validate($question, array('publish'));
        if (count($errors)!=0) {
            return $errors;
        }

        //update question
        $publishDate = new \DateTime('now');
        
        $question->setPublishedAt($publishDate);
        $this->entityManager->persist($question);

        //create activity
        $activity = new ActivityQuestion();
        $activity->setQuestionId($question->getId());
        $activity->setTitle('');
        $activity->setDescription($question->getSubject());
        $activity->setSentAt($publishDate);
        $activity->setExpireAt($question->getExpireAt());
        $userMethod = 'set'. $this->getClassName($question);
        $activity->$userMethod($question->getUser());
        $this->setImage($activity, $question);

        $this->cm->addPollRootComment($question, $question->getSubject());

        //send push notifications
        $this->pushSender->addToQueue('sendPushPublishQuestion', [
            $question->getId(),
            "Answer: {$this->preview($question->getSubject())}"
        ]);

        $this->entityManager->persist($activity);
        $this->entityManager->flush();
        $this->createActivityConditionsForQuestion($activity, $question);

        return $activity;
    }

    public function publishMicroPetitionToActivity(MicroPetition $petition, $isPublic = false)
    {
        //update petition
        if ($isPublic) {
            $expireDate = new \DateTime('now');
            $expireDate->add(new \DateInterval('P' . $petition->getUserExpireInterval() . 'D'));
            $petition->setExpireAt($expireDate);
            $petition->setPublishStatus(MicroPetition::STATUS_PUBLISH);
            $this->entityManager->persist($petition);
        }

        //create activity
        $activity = new ActivityMicroPetition();
        $activity->setPetitionId($petition->getId());
        $activity->setTitle('');
        if ($petition->getType() === MicroPetition::TYPE_LONG_PETITION) {
            $activity->setTitle($petition->getTitle());
            $activity->setDescription($petition->getPetitionBody());
        } else {
            $activity->setDescription($petition->getPetitionBody());
        }
        $activity->setSentAt(new \DateTime());
        $activity->setExpireAt($petition->getExpireAt());
        $activity->setResponsesCount($petition->getAnswers()->count());
        $activity->setIsOutsiders($petition->getIsOutsidersSign());
        $activity->setGroup($petition->getGroup());
        $activity->setQuorum($petition->getQuorumCount());
        if (!$isPublic) {
            $activity->setUser($petition->getUser());
        }

        $this->entityManager->persist($activity);
        $this->entityManager->flush();

        $this->createActivityConditionsForMicroPetition($activity, $petition);

        if ($isPublic) {
            $this->pushSender->addToQueue(
                'sendGroupPetitionPush',
                [$petition->getGroup()->getId(), $petition->getId()]);
        }

        return true;
    }

    public function publishLeaderNewsToActivity(LeaderNews $news)
    {
        $expireDate = new \DateTime('now');
        $expireDate->add(
            new \DateInterval('P' . $this->settings->get(Settings::DEFAULT_EXPIRE_INTERVAL)->getValue() . 'D')
        );

        $activity = new ActivityLeaderNews();
        $activity->setQuestionId($news->getId());
        $activity->setTitle('');
        $activity->setDescription(strip_tags($news->getSubjectParsed()));
        $activity->setSentAt($news->getPublishedAt());
        $activity->setExpireAt($expireDate);
        $method = 'set' . ucfirst($news->getUser()->getType());
        $activity->$method($news->getUser());
        $this->setImage($activity, $news);

        $this->cm->addPollRootComment($news, $news->getSubject());

        $this->pushSender->addToQueue(
            'sendPushPublishQuestion',
            [
                $news->getId(),
                "Discuss: {$this->preview($news->getSubject())}"
            ]
        );

        $this->entityManager->persist($activity);
        $this->entityManager->flush();
        $this->createActivityConditionsForQuestion($activity, $news);

        return $activity;
    }

    public function publishPetitionToActivity(Petition $petition)
    {
        $expireDate = new \DateTime('now');
        $expireDate->add(
            new \DateInterval('P' . $this->settings->get(Settings::DEFAULT_EXPIRE_INTERVAL)->getValue() . 'D')
        );
        $activity = new ActivityPetition();
        $activity->setQuestionId($petition->getId())
            ->setTitle($petition->getPetitionTitle())
            ->setDescription($petition->getPetitionBody())
            ->setExpireAt($expireDate)
            ->setSentAt($petition->getPublishedAt());

        $userMethod = 'set'. ucfirst($petition->getUser()->getType());
        $activity->$userMethod($petition->getUser());
        $this->setImage($activity, $petition);

        $this->cm->addPollRootComment($petition, $petition->getPetitionBody());

        //send push notifications
        $this->pushSender->addToQueue('sendPushPublishQuestion', array(
            $petition->getId(),
            "Sign: {$petition->getPetitionTitle()}"
        ));

        $this->entityManager->persist($activity);
        $this->entityManager->flush();
        $this->createActivityConditionsForQuestion($activity, $petition);
    }

    public function publishPaymentRequestToActivity(PaymentRequest $paymentRequest, $users = null)
    {
        if ($paymentRequest->getIsCrowdfunding()) {
            $activity = new ActivityCrowdfundingPaymentRequest();
            $activity->setExpireAt($paymentRequest->getCrowdfundingDeadline());
        } else {
            $activity = new ActivityPaymentRequest();
            $expireDate = new \DateTime('now');
            $expireDate->add(
                new \DateInterval('P' . $this->settings->get(Settings::DEFAULT_EXPIRE_INTERVAL)->getValue() . 'D')
            );
            $activity->setExpireAt($expireDate);
        }

        $activity
            ->setQuestionId($paymentRequest->getId())
            ->setTitle($paymentRequest->getTitle())
            ->setDescription($paymentRequest->getSubject())
            ->setSentAt($paymentRequest->getPublishedAt())
        ;
        $method = 'set' . ucfirst($paymentRequest->getUser()->getType());
        $activity->$method($paymentRequest->getUser());
        $this->setImage($activity, $paymentRequest);

        $this->cm->addPollRootComment($paymentRequest, $paymentRequest->getTitle());

        $this->entityManager->persist($activity);
        $this->entityManager->flush($activity);
        if ($users) {
            $this->createActivityConditionsForUsers($activity, $users);
        } else {
            $this->createActivityConditionsForQuestion($activity, $paymentRequest);
        }

        $this->pushSender->addToQueue(
            'sendPushPublishQuestion',
            [
                $paymentRequest->getId(),
                "Donate: {$paymentRequest->getTitle()}"
            ]
        );

        return $activity;
    }

    public function publishLeaderEventToActivity(LeaderEvent $event)
    {
        $publishedAt = new \DateTime();
        //update event       
        $event->setPublishedAt($publishedAt);
        $this->entityManager->persist($event);
        
         //create activity
        $activity = new ActivityLeaderEvent();
        $activity->setQuestionId($event->getId());
        $activity->setTitle($event->getTitle());
        $activity->setDescription($event->getSubject());
        $activity->setSentAt($publishedAt);
        $activity->setExpireAt($event->getStartedAt());
        $userMethod = 'set'. $this->getClassName($event->getUser());
        $activity->$userMethod($event->getUser());
        $this->setImage($activity, $event);
        
        $this->cm->addPollRootComment($event, $event->getSubject());
        
        //send push notifications
        $this->pushSender->addToQueue(
            'sendPushPublishQuestion',
            [
                $event->getId(),
                "RSVP: {$event->getTitle()}"
            ]
        );

        $this->entityManager->persist($activity);
        $this->entityManager->flush();
        $this->createActivityConditionsForQuestion($activity, $event);

        return $activity;
    }
    
    public function updateResponsesQuestion(Question $question)
    {
        if ($question instanceof LeaderNews) {
            $this->entityManager->getRepository('CivixCoreBundle:Activity')
                ->updateLeaderNewsResponseCountQuestion($question);
        } else {
            $this->entityManager->getRepository('CivixCoreBundle:Poll\Question')->updateAnswersCount($question);
            $this->entityManager->getRepository('CivixCoreBundle:Activity')->updateResponseCountQuestion($question);
        }
    }

    public function updateResponsesPetition(MicroPetition $petition)
    {
        $this->entityManager->getRepository('CivixCoreBundle:Activity')->updateResponseCountMicroPetition($petition);
    }

    public function updateOwnerData(UserInterface $owner)
    {
        $this->entityManager->getRepository('CivixCoreBundle:Activity')->{'updateOwner' . $owner->getType()}($owner);
    }

    public function updateEntityRateCount(Comment $comment)
    {
        $activities = $this->entityManager->getRepository(Activity::getActivityClassByEntity($comment->getQuestion()))
            ->findBy(['questionId' => $comment->getQuestion()->getId()]);

        /* @var Activity $activity */
        foreach ($activities as $activity) {
            $activity->setRateUp($comment->getRateUp())->setRateDown($comment->getRateDown());
            $this->entityManager->flush($activity);
        }
    }

    private function setImage(Activity $activity, Question $question)
    {
        /* @var EducationalContext $ec */
        foreach ($question->getEducationalContext() as $ec) {
            if ($ec->hasPreviewImage()) {
                return $activity->setImageSrc($ec->getPreviewSrc());
            }
        }
    }

    private function createActivityConditionsForQuestion(Activity $activity, Question $question)
    {
        if ($activity->getRepresentative() && $activity->getRepresentative()->getDistrict()) {
            $this->createRepresentativeActivityConditions($activity);
        } elseif ($activity->getGroup()) {
            if (($question instanceof GroupSectionInterface) && $question->getGroupSections()->count()>0) {
                foreach ($question->getGroupSections() as $section) {
                    $this->createGroupSectionActivityConditions($activity, $section);
                }
            } else {
                $this->createGroupActivityConditions($activity);
            }
        } elseif ($activity->getSuperuser()) {
            $this->createSuperuserActivityConditions($activity);
        }
    }

    private function createActivityConditionsForUsers(Activity $activity, array $users)
    {
        $condition = new ActivityCondition($activity);
        $condition->setUsers($users);
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }

    private function createActivityConditionsForMicroPetition(Activity $activity, MicroPetition $microPetition)
    {
        $this->createGroupActivityConditions($activity);
        if ($microPetition->getIsOutsidersSign() ||
            $microPetition->getPublishStatus() === $microPetition::STATUS_USER
        ) {
            $this->createUserActivityConditions($activity, $microPetition->getUser());
        }
    }

    private function createRepresentativeActivityConditions(Activity $activity)
    {
        $condition = new ActivityCondition($activity);
        $condition->setDistrictId($activity->getRepresentative()->getDistrictId());
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }

    private function createGroupActivityConditions(Activity $activity)
    {
        $condition = new ActivityCondition($activity);
        $condition->setGroupId($activity->getGroup()->getId());
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }

    private function createGroupSectionActivityConditions(Activity $activity, GroupSection $section)
    {
        $condition = new ActivityCondition($activity);
        $condition->setGroupSectionId($section->getId());
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }
    
    private function createUserActivityConditions(Activity $activity, User $user)
    {
        $condition = new ActivityCondition($activity);
        $condition->setUserId($user->getId());
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }

    private function createSuperuserActivityConditions(Activity $activity)
    {
        $condition = new ActivityCondition($activity);
        $condition->setIsSuperuser(true);
        $this->entityManager->persist($condition);
        $this->entityManager->flush($condition);
    }

    private function getClassName($object)
    {
        $className = explode('\\', get_class($object));

        return $className[count($className)-1];
    }

    private function preview($text)
    {
        if (mb_strlen($text) > 50) {
            return mb_substr($text, 0, 50) . '...';
        }

        return $text;
    }
}
