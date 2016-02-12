<?php

namespace Civix\CoreBundle\Entity\Micropetitions;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\BaseComment;

/**
 * Micropetition comments entity
 *
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Micropetitions\CommentRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Comment extends BaseComment
{
    /**
     * @ORM\ManyToOne(targetEntity="Petition", inversedBy="comments")
     * @ORM\JoinColumn(name="petition_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $petition;

    /**
     * Set micropetition
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Petition $petition
     * 
     * @return Comment
     */
    public function setPetition(\Civix\CoreBundle\Entity\Micropetitions\Petition $petition = null)
    {
        $this->petition = $petition;

        return $this;
    }

    /**
     * Get micropetition
     *
     * @return \Civix\CoreBundle\Entity\Micropetitions\Petition 
     */
    public function getPetition()
    {
        return $this->petition;
    }
}
