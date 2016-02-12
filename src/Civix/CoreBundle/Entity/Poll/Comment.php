<?php

namespace Civix\CoreBundle\Entity\Poll;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\BaseComment;

/**
 * Comments entity
 *
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\CommentRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Comment extends BaseComment
{
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="comments")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $question;

    /**
     * Set question
     *
     * @param \Civix\CoreBundle\Entity\Poll\Question $question
     * 
     * @return Comment
     */
    public function setQuestion(\Civix\CoreBundle\Entity\Poll\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Civix\CoreBundle\Entity\Poll\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
