<?php

namespace Civix\ApiBundle\Controller\PublicApi;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\User;

/**
 * @Route("/users")
 */
class UserController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function getUsers(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findBy(['username' => $request->query->get('username')]);

        return $this->createJSONResponse(
            $this->jmsSerialization($users, ['api-public'])
        );
    }
}
