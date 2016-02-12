<?php

namespace Civix\CoreBundle\Model\Comment;

class CommentPollModel implements CommentModelInterface
{
    public function getRepositoryName()
    {
        return 'Civix\CoreBundle\Entity\Poll\Comment';
    }

    public function setEntityForComment($entity, $comment)
    {
        $comment->setQuestion($entity);

        return $comment;
    }

    public function getEntityForComment($comment)
    {
        return $comment->getQuestion();
    }
}
