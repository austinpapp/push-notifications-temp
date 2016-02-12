<?php

namespace Civix\FrontBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Question
{

    /**
     * @Assert\Valid()
     */
    private $question;

    /**
     * @Assert\Valid()
     */
    private $educationalContext;

    public function __construct(\Civix\CoreBundle\Entity\Poll\Question $question = null)
    {
        $this->question = $question;
        $this->educationalContext = new EducationalContext($question);

    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion(\Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $this->question = $question;

        return $this;
    }

    public function getEducationalContext()
    {
        return $this->educationalContext;
    }

    public function setEducationalContext(EducationalContext $educationalContext)
    {
        $this->educationalContext = $educationalContext;

        return $this;
    }
}
