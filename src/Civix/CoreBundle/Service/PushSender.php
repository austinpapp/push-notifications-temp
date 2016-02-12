<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativeNews;
use Civix\CoreBundle\Service\Notification;
use Civix\CoreBundle\Entity\Micropetitions\Petition as Micropetition;
use Civix\CoreBundle\Entity\Notification\AbstractEndpoint;
use Civix\CoreBundle\Entity\SocialActivity;
use Civix\CoreBundle\Service\S3clientApi as S3;

class PushSender
{
    const QUESTION_PUSH_MESSAGE = 'New question has been published';
    const INVITE_PUSH_MESSAGE = 'You have been invited to a group';
    const INFLUENCE_PUSH_MESSAGE = 'You got new followers';
    const ANNOUNCEMENT_PUSH_MESSAGE = 'New announcement has been published';
    const NEWS_PUSH_MESSAGE = 'New discussion has been published';
    const PAYMENT_REQUEST_PUSH_MESSAGE = 'New Payment Request';
    const EVENT_PUSH_MESSAGE = 'New event has been published';

    const TYPE_PUSH_ACTIVITY = 'activity';
    const TYPE_PUSH_ANNOUNCEMENT = 'announcement';
    const TYPE_PUSH_INFLUENCE = 'influence';
    const TYPE_PUSH_INVITE = 'invite';
    const TYPE_PUSH_MICRO_PETITION = 'micro_petition';
    /*Not used in push notification but reserved and use in settings*/
    const TYPE_PUSH_PETITION = 'petition';
    const TYPE_PUSH_NEWS = 'leader_news';
    const TYPE_PUSH_EVENT = 'leader_event';
    const TYPE_PUSH_SOCIAL_ACTIVITY = 'social_activity';
    
    const MAX_USERS_PER_QUERY = 5000;
    
    protected $entityManager;
    protected $questionUsersPush;
    protected $notification;
    protected $logger;
    protected $s3client;

    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        \Civix\CoreBundle\Service\Poll\QuestionUserPush $questionUsersPush,
        Notification $notification,
        S3 $s3client,
        \Symfony\Bridge\Monolog\Logger $logger
    ) {
        $this->entityManager = $entityManager;
        $this->questionUsersPush = $questionUsersPush;
        $this->notification = $notification;
        $this->s3client = $s3client;
        $this->logger = $logger;
    }

    public function sendPushPublishQuestion($questionId, $messageBody = self::QUESTION_PUSH_MESSAGE)
    {
        /** @var $petition \Civix\CoreBundle\Entity\Poll\Question */
        $question = $this->entityManager
            ->getRepository('CivixCoreBundle:Poll\Question')
            ->find($questionId);

        if (!$question) {
            return;
        }

        $this->questionUsersPush->setQuestion($question);
        $lastId = 0;

        $avatarUrl = $this->getGroupAvatar($go

        do {
            $users = $this->questionUsersPush->getUsersForPush($lastId, self::MAX_USERS_PER_QUERY);

            if ($users) {
                foreach ($users as $recipient) {
                    $this->send($recipient, $messageBody, $question->getType(), [
                        'id' => $question->getId(),
                    ]);
                    $lastId = $recipient->getId();
                }
            }

            $this->entityManager->clear();

        } while ($users);
    }

    public function sendGroupPetitionPush($groupId, $microPetitionId = null)
    {
        $users = $this->entityManager
                ->getRepository('CivixCoreBundle:User')
                ->getUsersByGroupForPush($groupId, self::TYPE_PUSH_PETITION);

        $microPetition = $this->entityManager->getRepository(Micropetition::class)->find($microPetitionId);

        $msgBody    = "Boosted: {$this->preview($microPetition->getPetitionBody())}";   // frontbundle
        $type       = self::TYPE_PUSH_MICRO_PETITION;
        $avatarUrl  = $this->getGroupAvatar($groupId);
        $entityData = ['id' => $microPetitionId,];

        foreach ($users as $recipient) {
            $this->send($recipient, $msgBody, $type, $avatarUrl, $entityData);
        }
    }

    public function sendRepresentativeAnnouncementPush($representativeId, $message = self::ANNOUNCEMENT_PUSH_MESSAGE)
    {
        $representative = $this->entityManager
            ->getRepository('CivixCoreBundle:Representative')
            ->findOneById($representativeId);

        if (!$representative) {
            return;
        }
        $users = $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getUsersByDistrictForPush($representative->getDistrictId(), self::TYPE_PUSH_ANNOUNCEMENT);
        foreach ($users as $recipient) {
            $this->send($recipient, $this->preview($message), self::TYPE_PUSH_ANNOUNCEMENT);
        }
    }
    
    /**
    *
    *   Send push notification for group announcement
    */
    public function sendGroupAnnouncementPush($groupId, $message = self::ANNOUNCEMENT_PUSH_MESSAGE)
    {
        $users = $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getUsersByGroupForPush($groupId, self::TYPE_PUSH_ANNOUNCEMENT);

        $msgBody   = $this->preview($message);      // frontbundle
        $type 	   = self::TYPE_PUSH_ANNOUNCEMENT;
        $avatarUrl = $this->getGroupAvatar($groupId);

        foreach ($users as $recipient) {
            $this->send($recipient, $msgBody, $type, $avatarUrl);
        }
    }

    public function sendInvitePush($userId)
    {
        $user = $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getUserForPush($userId);
        
        if ($user instanceof User) {
            $this->send($user, self::INVITE_PUSH_MESSAGE, self::TYPE_PUSH_INVITE);
        }
    }

    public function sendInfluencePush($userId, $followerId = 0)
    {
        $user = $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getUserForPush($userId);

        $follower = $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->find($followerId);

        if ($user instanceof User && $follower) {
            $this->send($user, $follower->getFullName() . ' wants to follow you', self::TYPE_PUSH_INFLUENCE);
        }
    }

    public function sendSocialActivity($id)
    {
        $socialActivity = $this->entityManager->getRepository(SocialActivity::class)->find($id);
        if ($socialActivity->getRecipient()) {
            $user = $this->entityManager->getRepository('CivixCoreBundle:User')
                ->getUserForPush($socialActivity->getRecipient()->getId());
            if ($user) {
                $this->send(
                    $user, $socialActivity->getTextMessage(), self::TYPE_PUSH_SOCIAL_ACTIVITY,
                    ['id' => $socialActivity->getId(), 'target' => $socialActivity->getTarget()]
                );
            }
        } else if ($socialActivity->getFollowing()) {
            $recipients = $this->entityManager
                ->getRepository('CivixCoreBundle:User')
                ->getUsersByFollowingForPush($socialActivity->getFollowing());
            $userGroupRepository = $this->entityManager->getRepository('CivixCoreBundle:UserGroup');
            foreach ($recipients as $recipient) {
                if (!$socialActivity->getGroup() ||
                    $userGroupRepository->isJoinedUser($socialActivity->getGroup(), $recipient)) {
                    $this->send(
                        $recipient, $socialActivity->getTextMessage(), self::TYPE_PUSH_SOCIAL_ACTIVITY,
                        ['id' => $socialActivity->getId(), 'target' => $socialActivity->getTarget()]
                    );
                }
            }
        }
    }

    /**
    *
    * Helper to get the group avatar url
    */
    public function getGroupAvatar($groupId) 
    {
        $url = "";
        $group = $this->entityManager->find("CivixCoreBundle:Group", $groupId);
        $filename = $group->getAvatarFileName();
        if ( !empty($filename) ) {
            $url = $this->s3client->getGroupAvatarUrl($filename);
            $this->logger->debug($url);
        } else {
            $url = "default.png";
        }
        return $url;
    }

    public function send(User $recipient, $messageBody, $type, $avatarUrl, $entityData = null)
    {
        $endpoints = $this->entityManager->getRepository(AbstractEndpoint::class)->findByUser($recipient);
        foreach ($endpoints as $endpoint) {
            try {
                $this->notification->send($messageBody, $type, $entityData, $endpoint, $avatarUrl);
            } catch (\Exception $e) {
                $this->logger->addError($e->getMessage());
            }
        }
    }

    private function preview($text)
    {
        if (mb_strlen($text) > 50) {
            return mb_substr($text, 0, 50) . '...';
        }

        return $text;
    }
}
