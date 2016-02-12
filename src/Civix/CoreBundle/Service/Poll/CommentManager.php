<?php

namespace Civix\CoreBundle\Service\Poll;

use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Entity\BaseComment;
use Civix\CoreBundle\Entity\Poll\Comment;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Service\ContentManager;
use Civix\CoreBundle\Service\SocialActivityManager;
use Civix\CoreBundle\Entity\Micropetitions\Petition as Micropetition;
use Civix\CoreBundle\Entity\Micropetitions\Comment as MicropetitionComment;

class CommentManager
{
    private $em;
    private $cm;
    private $sam;

    public function __construct(EntityManager $em, ContentManager $cm,
                                SocialActivityManager $sam)
    {
        $this->em = $em;
        $this->cm = $cm;
        $this->sam = $sam;
    }

    public function updateRateToComment(BaseComment $comment, $user, $rateValue)
    {
        $rateCommentObj = $this->em
            ->getRepository('CivixCoreBundle:Poll\CommentRate')
            ->findOneBy(array('user' => $user, 'comment' => $comment));

        if (!$rateCommentObj) {
            $rateCommentObj = $this->em
                ->getRepository('CivixCoreBundle:Poll\CommentRate')
                ->addRateToComment($comment, $user, $rateValue);
        } else {
            $rateCommentObj->setRateValue($rateValue);
        }

        $this->em->persist($rateCommentObj);
        $this->em->flush();

        $comment = $this->updateRateSumForComment($comment);
        $comment->setRateStatus($rateValue);

        return $comment;
    }

    public function updateRateSumForComment(BaseComment $comment)
    {
        $rateSumArr = $this->em
            ->getRepository('CivixCoreBundle:Poll\CommentRate')
            ->calcRateCommentSum($comment);

        $comment->setRateSum($rateSumArr['rateSum']);
        $comment->setRatesCount($comment->getRates()->count());
        $this->em->persist($comment);
        $this->em->flush();

        return $comment;
    }

    public function addCommentByQuestionAnswer(Answer $answer)
    {

        $parent = $this->em->getRepository('CivixCoreBundle:Poll\Comment')
            ->findOneBy(array(
                'question' => $answer->getQuestion(),
                'parentComment' => null
            ));

        if ($answer->getComment()) {
            $comment = new Comment();
            $comment->setUser($answer->getUser())
                ->setCommentBody($answer->getComment())
                ->setQuestion($answer->getQuestion())
                ->setPrivacy($answer->getPrivacy())
                ->setParentComment($parent)
            ;

            return $this->saveNewComment($comment);
        }
    }

    public function addMicropetitionRootComment(Micropetition $micropetition)
    {
        $comment = new MicropetitionComment();
        $comment->setPetition($micropetition);
        $comment->setCommentBody($micropetition->getPetitionBody());
        $comment->setUser($micropetition->getUser());

        return $this->saveNewComment($comment);
    }

    public function addPollRootComment(Question $question, $message = '')
    {
        $comment = new Comment();
        $comment
            ->setQuestion($question)
            ->setCommentBody($message)
        ;

        return $this->saveNewComment($comment);
    }

    public function addComment(BaseComment $comment)
    {
        return $this->saveNewComment($comment, true);
    }

    private function saveNewComment(BaseComment $comment, $notify = false)
    {
        $this->em->persist($comment);
        $users = $this->cm->handleCommentContent($comment);
        $this->em->flush($comment);
        if ($notify) {
            $this->sam->noticeCommentMentioned($comment, $users);
        }

        return $comment;
    }
}
