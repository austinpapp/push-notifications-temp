<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\NewsController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
    public function getNewsFormClass()
    {
        if (!$this->isAvailableGroupSection()) {
            return 'Civix\FrontBundle\Form\Type\Representative\News';
        }

        return 'Civix\FrontBundle\Form\Type\Group\News';
    }
    
    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('group-news');
    }
}
