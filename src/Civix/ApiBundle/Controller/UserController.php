<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception as HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @Route("/users")
 */
class UserController extends BaseController
{
    /**
     * @Route("/find", name="api_user_by_username")
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Find user by username",
     *     filters={
     *             {"name"="username", "dataType"="string"}
     *      },
     *     statusCodes={
     *         200="Returns user info",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     *
     * @deprecated Use users resource instead
     */
    public function findByUsernameAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $entityManager->getRepository('CivixCoreBundle:User')
                ->getUserByUsername($this->getUser(), $request->get('username'));

        $response = new Response($this->jmsSerialization($user, array('api-info')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/", name="api_users")
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="List of users",
     *     filters={
     *             {"name"="q", "dataType"="string"}
     *      },
     *     statusCodes={
     *         200="Returns users",
     *         400="Bad request",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function usersAction(Request $request)
    {
        $limit = $request->query->get('max_count', 50);
        $page = $request->query->get('page', 1);
        $offset = ($page - 1) * $limit;
        $q = $request->query->get('q');

        if ($limit > 100) {
            throw new HttpException\BadRequestHttpException();
        }

        if ($request->query->has('q')) {
            $q = $request->query->get('q');
            if (!$q) {
                throw new HttpException\BadRequestHttpException('The query cannot be empty string');
            }
        }

        $users = $this->getDoctrine()->getRepository('CivixCoreBundle:User')->findByParams(array(
            'query' => $q,
            'unfollowing' => $request->query->get('unfollowing', false),
        ), array(), $limit, $offset, $this->getUser());

        $response = new Response($this->jmsSerialization($users, array('api-info')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
