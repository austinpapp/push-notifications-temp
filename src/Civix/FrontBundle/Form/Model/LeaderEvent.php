<?php

namespace Civix\FrontBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class LeaderEvent
{
    /**
     * @Assert\Valid()
     */
    private $leaderEvent;

    /**
     * @Assert\Valid()
     */
    private $educationalContext;

    public function __construct(\Civix\CoreBundle\Entity\Poll\Question\LeaderEvent $leaderEvent = null)
    {
        $this->leaderEvent = $leaderEvent;
        $this->educationalContext = new EducationalContext($leaderEvent);

    }

    public function getLeaderEvent()
    {
        return $this->leaderEvent;
    }

    public function setLeaderEvent(\Civix\CoreBundle\Entity\Poll\Question\LeaderEvent $leaderEvent)
    {
        $this->leaderEvent = $leaderEvent;

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
