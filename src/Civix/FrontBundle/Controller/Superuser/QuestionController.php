<?php

namespace Civix\FrontBundle\Controller\Superuser;

use Civix\FrontBundle\Controller\QuestionController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/question")
 */
class QuestionController extends Controller
{
    public function getQuestionClass()
    {
        return '\Civix\CoreBundle\Entity\Poll\Question\Superuser';
    }

    public function getQuestionFormClass()
    {
        return '\Civix\FrontBundle\Form\Type\Poll\Question';
    }
    
    public function isCanPublishQuestion()
    {
        return true;
    }
}
