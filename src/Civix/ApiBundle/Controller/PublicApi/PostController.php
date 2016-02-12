<?php

namespace Civix\ApiBundle\Controller\PublicApi;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\ApiBundle\Controller\BaseController;

/**
 * @Route("/posts")
 */
class PostController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function getPosts()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $posts = $this->getDoctrine()->getManager()
            ->getRepository('CivixCoreBundle:Content\Post')
            ->findLastPosts();

        $response->setContent($this->jmsSerialization($posts, ['api-post']));

        return $response;
    }
}
