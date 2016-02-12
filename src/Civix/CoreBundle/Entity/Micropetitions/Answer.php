<?php

namespace Civix\CoreBundle\Entity\Micropetitions;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Micropetitions Answer entity
 *
 * @ORM\Table(name="micropetitions_answers")
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Micropetitions\AnswerRepository")
 * @ORM\HasLifecycleCallbacks
 * @Serializer\ExclusionPolicy("all")
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answers-list", "api-leader-answers"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-leader-answers"})
     */
    private $user;

    /**
     * @ORM\Column(name="option_id", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-leader-answers", "api-answers-list"})
     */
    private $optionId;

    /**
     * @ORM\Column(name="petition_id", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-answers-list"})
     */
    private $petitionId;

    /**
     * @ORM\ManyToOne(targetEntity="Petition", inversedBy="answers")
     * @ORM\JoinColumn(name="petition_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $petition;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-leader-answers"})
     */
    private $createdAt;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set optionId
     *
     * @param integer $optionId
     * @return Answer
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;
    
        return $this;
    }

    /**
     * Get optionId
     *
     * @return integer 
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Set user
     *
     * @param \Civix\CoreBundle\Entity\User $user
     * @return Answer
     */
    public function setUser(\Civix\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set petition
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Petition $petition
     * @return Answer
     */
    public function setPetition(\Civix\CoreBundle\Entity\Micropetitions\Petition $petition = null)
    {
        $this->petition = $petition;
    
        return $this;
    }

    /**
     * Get petition
     *
     * @return \Civix\CoreBundle\Entity\Micropetitions\Petition 
     */
    public function getPetition()
    {
        return $this->petition;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Petition
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreationData()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * @param mixed $petitionId
     */
    public function setPetitionId($petitionId)
    {
        $this->petitionId = $petitionId;
    }

    /**
     * @return mixed
     */
    public function getPetitionId()
    {
        return $this->petitionId;
    }
}
