<?php

namespace Civix\FrontBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Petition
{

    /**
     * @Assert\Valid()
     */
    private $petition;

    /**
     * @Assert\Valid()
     */
    private $educationalContext;

    public function __construct(\Civix\CoreBundle\Entity\Poll\Question\Petition $petition = null)
    {
        $this->petition = $petition;
        $this->educationalContext = new EducationalContext($petition);

    }

    public function getPetition()
    {
        return $this->petition;
    }

    public function setPetition(\Civix\CoreBundle\Entity\Poll\Question\Petition $petition)
    {
        $this->petition = $petition;

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
