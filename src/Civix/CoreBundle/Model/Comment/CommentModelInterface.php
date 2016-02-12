<?php

namespace Civix\CoreBundle\Model\Comment;

interface CommentModelInterface
{
    public function getRepositoryName();
    public function setEntityForComment($entity, $comment);
    public function getEntityForComment($comment);
}
