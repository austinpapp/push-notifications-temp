<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HashTag
 *
 * @ORM\Table(name="hash_tags", indexes={
 *      @ORM\Index(name="hash_tag_name_ind", columns={"name"})
 * })
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\HashTagRepository")
 */
class HashTag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Civix\CoreBundle\Entity\Micropetitions\Petition", inversedBy="hashTags")
     * @ORM\JoinTable(name="hash_tags_petitions",
     *      joinColumns={@ORM\JoinColumn(name="hash_tag_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="petition_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $petitions;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Civix\CoreBundle\Entity\Poll\Question", inversedBy="hashTags")
     * @ORM\JoinTable(name="hash_tags_questions",
     *      joinColumns={@ORM\JoinColumn(name="hash_tag_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $questions;

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
     * Set name
     *
     * @param string $name
     * @return HashTag
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct($name = null)
    {
        $this->petitions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setName($name);
    }
    
    /**
     * Add petitions
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Petition $petitions
     * @return HashTag
     */
    public function addPetition(\Civix\CoreBundle\Entity\Micropetitions\Petition $petitions)
    {
        $this->petitions[] = $petitions;
    
        return $this;
    }

    /**
     * Remove petitions
     *
     * @param \Civix\CoreBundle\Entity\Micropetitions\Petition $petitions
     */
    public function removePetition(\Civix\CoreBundle\Entity\Micropetitions\Petition $petitions)
    {
        $this->petitions->removeElement($petitions);
    }

    /**
     * Get petitions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPetitions()
    {
        return $this->petitions;
    }

    /**
     * Add questions
     *
     * @param \Civix\CoreBundle\Entity\Poll\Question $question
     * @return HashTag
     */
    public function addQuestion(\Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $this->questions[] = $question;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Civix\CoreBundle\Entity\Poll\Question $question
     */
    public function removeQuestion(\Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
