<?php

namespace Civix\CoreBundle\Model\Comment;

class CommentModelFactory
{
    public static function createByType($type)
    {
        switch ($type) {
            case 'poll':
                return new CommentPollModel();
            case 'micro-petitions':
                return new CommentMicropetitionModel();
        }

        return null;
    }
}
