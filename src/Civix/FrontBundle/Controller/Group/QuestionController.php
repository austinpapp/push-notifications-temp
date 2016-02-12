<?php

namespace Civix\FrontBundle\Controller\Group;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Civix\FrontBundle\Controller\QuestionController as Controller;

/**
 * @Route("/question")
 */
class QuestionController extends Controller
{
    public function getQuestionClass()
    {
        return '\Civix\CoreBundle\Entity\Poll\Question\Group';
    }

    public function getQuestionFormClass()
    {
        if (!$this->isAvailableGroupSection()) {
            return '\Civix\FrontBundle\Form\Type\Poll\Question';
        }

        return '\Civix\FrontBundle\Form\Type\Poll\QuestionGroup';
    }
    
    public function isCanPublishQuestion()
    {
        return $this->get('civix_core.question_limit')
            ->checkQuestionLimit($this->getUser());
    }
}
