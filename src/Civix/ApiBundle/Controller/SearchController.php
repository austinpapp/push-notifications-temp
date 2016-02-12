<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;

/**
 * @Route("/search")
 */
class SearchController extends BaseController
{

    /**
     * @Route("", name="api_search")
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Get list of search items",
     *     filters={
     *         {"name"="query", "dataType"="string"}
     *     },
     *     statusCodes={
     *         200="Returns list search items",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getGroupsAction(Request $request)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $entityManager = $this->getDoctrine()->getManager();
        $query = $request->get('query');

        if (!$query) {
            return $response;
        }
        $groups = $entityManager->getRepository('CivixCoreBundle:Group')
            ->findByQuery($query, $this->getUser());
        $representatives = $entityManager->getRepository('CivixCoreBundle:Representative')
            ->findByQuery($query, $this->getUser());
        $users = $entityManager->getRepository('CivixCoreBundle:User')
            ->findByQueryForFollow($query, $this->getUser());

        $result = array(
            'groups' => $groups,
            'representatives' => $representatives,
            'users' => $users,
        );

        $response->setContent($this->jmsSerialization($result, array('api-search')));

        return $response;
    }

    /**
     * @Route("/by-hash-tags", name="api_search_hash_tag")
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Search micropetitions by hash tag",
     *     filters={
     *         {"name"="query", "dataType"="string"}
     *     },
     *     statusCodes={
     *         200="Returns list search items",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function findByHashTag(Request $request)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $query = $request->get('query');

        if (!$query) {
            return $response;
        }
        $petitions = $this->getDoctrine()->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->findActiveByHashTag($query, $this->getUser());
        $response->setContent($this->jmsSerialization($petitions, array('api-petitions-list')));

        return $response;
    }
}
