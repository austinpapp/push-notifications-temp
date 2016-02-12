<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\SocialActivity;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Service\PushTask;
use Civix\CoreBundle\Entity\UserFollow;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Entity\Micropetitions\Petition as Micropetition;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Micropetitions;

use Civix\CoreBundle\Entity\BaseComment;
use Civix\CoreBundle\Entity\Micropetitions\Comment as MicropetitionComment;
use Civix\CoreBundle\Entity\Poll\Comment;

class SocialActivityManager
{
    const PREVIEW_LENGTH = 20;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var PushTask
     */
    private $pt;

    public function __construct(EntityManager $em, PushTask $pt)
    {
        $this->em = $em;
        $this->pt = $pt;
    }

    public function sendUserFollowRequest(UserFollow $follow)
    {
        $socialActivity = (new SocialActivity(SocialActivity::TYPE_FOLLOW_REQUEST, $follow->getFollower()))
            ->setTarget(['id' => $follow->getId(), 'type' => 'user'])
            ->setRecipient($follow->getUser())
        ;
        $this->em->persist($socialActivity);
        $this->em->flush($socialActivity);
        $this->pt
            ->addToQueue('sendInfluencePush', array($follow->getUser()->getId(), $follow->getFollower()->getId()));

        return $socialActivity;
    }

    public function noticeGroupJoiningApproved(UserGroup $userGroup)
    {
        $socialActivity = (new SocialActivity(SocialActivity::TYPE_JOIN_TO_GROUP_APPROVED, null, $userGroup->getGroup()))
            ->setTarget(['id' => $userGroup->getGroup()->getId(), 'type' => 'group'])
            ->setRecipient($userGroup->getUser())
        ;
        $this->em->persist($socialActivity);
        $this->em->flush($socialActivity);
        $this->pt->addToQueue('sendSocialActivity', [$socialActivity->getId()]);

        return $socialActivity;
    }

    public function noticeMicropetitionCreated(Micropetition $micropetition)
    {
        $socialActivity = (new SocialActivity(SocialActivity::TYPE_GROUP_POST_CREATED, $micropetition->getUser(),
            $micropetition->getGroup()))
            ->setTarget([
                'id' => $micropetition->getId(),
                'title' => $micropetition->getTitle(),
                'type' => $micropetition->getType(),
                'body' => $micropetition->getPetitionBody()
            ])
        ;
        $this->em->persist($socialActivity);
        $this->em->flush($socialActivity);
        $this->pt->addToQueue('sendSocialActivity', [$socialActivity->getId()]);

        return $socialActivity;
    }

    public function noticeAnsweredToQuestion(Answer $answer)
    {
        $question = $answer->getQuestion();
        if (!$question->getUser() instanceof Group) {
            return;
        }
        $target = [
            'id' => $question->getId(),
            'type' => $question->getType(),
        ];
        $target['label'] = $this->getLabelByPoll($question);
        $target['preview'] = $this->getPreviewByPoll($question);

        $socialActivity = (new SocialActivity(SocialActivity::TYPE_ANSWERED, $answer->getUser(),
            $answer->getQuestion()->getUser()))
            ->setTarget($target)
        ;
        $this->em->persist($socialActivity);
        $this->em->flush($socialActivity);

        return $socialActivity;
    }

    public function noticePollCommented(Comment $comment)
    {
        $question = $comment->getQuestion();
        if (!$question->getUser() instanceof Group) {
            return;
        }
        $target = [
            'id' => $question->getId(),
            'type' => $question->getType(),
        ];
        $target['label'] = $this->getLabelByPoll($question);
        $target['preview'] = $this->preparePreview($comment->getCommentBody());

        $socialActivity1 = (new SocialActivity(SocialActivity::TYPE_FOLLOW_POLL_COMMENTED, $comment->getUser(),
            $comment->getQuestion()->getUser()))
            ->setTarget($target)
        ;
        if ($comment->getParentComment()->getUser()) {
            $target['comment_id'] = $comment->getId();
        }
        $this->em->persist($socialActivity1);
        $this->em->flush($socialActivity1);

        if ($comment->getParentComment()->getUser()
            && $comment->getUser() !== $comment->getParentComment()->getUser()) {
            $socialActivity2 = (new SocialActivity(SocialActivity::TYPE_COMMENT_REPLIED, $comment->getUser(),
                $comment->getQuestion()->getUser()))
                ->setTarget($target)
                ->setRecipient($comment->getParentComment()->getUser())
            ;
            $this->em->persist($socialActivity2);
            $this->em->flush($socialActivity2);
            $this->pt->addToQueue('sendSocialActivity', [$socialActivity2->getId()]);
        }
    }

    public function noticeMicropetitionCommented(Micropetitions\Comment $comment)
    {
        $micropetition = $comment->getPetition();
        $target = [
            'id' => $micropetition->getId(),
            'preview' => $this->preparePreview($comment->getCommentBody()),
            'type' => $micropetition->getType(),
            'label' => $micropetition->getType() === $micropetition::TYPE_QUORUM ? 'post' : 'petition',
        ];
        if ($comment->getParentComment()->getUser()) {
            $target['comment_id'] = $comment->getId();
        }
        $socialActivity = (new SocialActivity(SocialActivity::TYPE_FOLLOW_MICROPETITION_COMMENTED, $comment->getUser(),
            $micropetition->getGroup()))
            ->setTarget($target)
        ;
        $this->em->persist($socialActivity);
        $this->em->flush($socialActivity);

        if ($comment->getParentComment()->getUser()
            && $comment->getUser() !== $comment->getParentComment()->getUser()) {
            $socialActivity2 = (new SocialActivity(SocialActivity::TYPE_COMMENT_REPLIED, $comment->getUser(),
                $micropetition->getGroup()))
                ->setTarget($target)
                ->setRecipient($comment->getParentComment()->getUser())
            ;
            $this->em->persist($socialActivity2);
            $this->em->flush($socialActivity2);
        }
    }

    public function noticeGroupsPermissionsChanged(Group $group)
    {
        $target = [
            'id' => $group->getId(),
            'type' => 'group'
        ];
        /** @var User $user */
        foreach ($group->getUsers() as $user) {
            $socialActivity = (new SocialActivity(SocialActivity::TYPE_GROUP_PERMISSIONS_CHANGED, null, $group))
                ->setTarget($target)
                ->setRecipient($user)
            ;
            $this->em->persist($socialActivity);
            $this->em->flush($socialActivity);
            $this->pt->addToQueue('sendSocialActivity', [$socialActivity->getId()]);
        }
    }

    public function noticeCommentMentioned(BaseComment $comment, $recipients)
    {
        $group = null;
        if ($comment instanceof MicropetitionComment) {
            $micropetition = $comment->getPetition();
            $group = $micropetition->getGroup();
            $target = [
                'id' => $micropetition->getId(),
                'preview' => $this->preparePreview($comment->getCommentBody()),
                'type' => $micropetition->getType(),
                'label' => $micropetition->getType() === $micropetition::TYPE_QUORUM ? 'post' : 'petition',
            ];
        } else if ($comment instanceof Comment) {
            $question = $comment->getQuestion();
            $target = [
                'id' => $question->getId(),
                'type' => $question->getType(),
            ];
            $target['label'] = $this->getLabelByPoll($question);
            $group = $question->getUser();
        }
        if ($comment->getParentComment()->getUser()) {
            $target['comment_id'] = $comment->getId();
        }

        $user = $comment->getUser();
        $target['user_id'] = $user->getId();
        $target['first_name'] = $user->getFirstName();
        $target['last_name'] = $user->getLastName();

        foreach ($recipients as $recipient) {
            if ($group instanceof Group &&
                $this->em->getRepository(UserGroup::class)
                    ->isJoinedUser($group, $recipient)) {
                $socialActivity = (new SocialActivity(SocialActivity::TYPE_COMMENT_MENTIONED, null, $group))
                    ->setTarget($target)
                    ->setRecipient($recipient)
                ;
                $this->em->persist($socialActivity);
                $this->em->flush($socialActivity);
                $this->pt->addToQueue('sendSocialActivity', [$socialActivity->getId()]);
            } else if ($this->em->getRepository(UserFollow::class)->findActiveFollower($user, $recipient)) {
                $socialActivity = (new SocialActivity(SocialActivity::TYPE_COMMENT_MENTIONED, $user, null))
                    ->setTarget($target)
                    ->setRecipient($recipient)
                ;
                $this->em->persist($socialActivity);
                $this->em->flush($socialActivity);
                $this->pt->addToQueue('sendSocialActivity', [$socialActivity->getId()]);
            }
        }
    }

    private function preparePreview($text = '')
    {
        if (mb_strlen($text) > self::PREVIEW_LENGTH) {
            return mb_substr($text, 0 , 20, 'utf8') . '...';
        }

        return $text;
    }

    private function getPreviewByPoll(Question $question)
    {
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\Petition) {
            return $this->preparePreview($question->getPetitionTitle());
        }
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\PaymentRequest) {
            return $this->preparePreview($question->getTitle());
        }
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\LeaderEvent) {
            return $this->preparePreview($question->getTitle());
        }

        return $this->preparePreview($question->getSubject());
    }

    private function getLabelByPoll(Question $question)
    {
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\Petition) {
            return 'petition';
        }
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\PaymentRequest) {
            return 'payment request';
        }
        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question\LeaderEvent) {
            return 'event';
        }

        return 'question';
    }
}