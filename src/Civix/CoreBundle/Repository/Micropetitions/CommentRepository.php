<?php

namespace Civix\CoreBundle\Repository\Micropetitions;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Common\Collections\ArrayCollection;
use Civix\CoreBundle\Repository\CommentRepository as BaseCommentRepository;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\CoreBundle\Entity\Micropetitions\Comment;

class CommentRepository extends BaseCommentRepository
{
    public function getCommentEntityField()
    {
        return 'petition';
    }
}
