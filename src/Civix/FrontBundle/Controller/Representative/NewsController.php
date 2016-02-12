<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\NewsController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
    public function getNewsFormClass()
    {
        return '\Civix\FrontBundle\Form\Type\Representative\News';
    }

    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('representative-news');
    }
}
