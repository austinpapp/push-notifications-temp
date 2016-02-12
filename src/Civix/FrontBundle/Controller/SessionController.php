<?php

namespace Civix\FrontBundle\Controller;

use Civix\ApiBundle\Controller\BaseController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Civix\CoreBundle\Entity\Session;

abstract class SessionController extends Controller
{
    /**
     * @Route("/create-session")
     * @Method("POST")
     */
    public function createLeaderSession()
    {
        $user = $this->getUser();
        if (!$user) {
            throw new AccessDeniedHttpException;
        }
        $em = $this->getDoctrine()->getManager();

        $sessions = $em->getRepository(Session::class)->findBy([
            'userType' => $user->getType(),
            'userId'   => $user->getId(),
        ], null, 1);
        if (empty($sessions)) {
            $session = new Session($user);
            $em->persist($session);
            $em->flush($session);
        } else {
            $session = $sessions[0];
        }

        return $this->createJSONResponse($this->jmsSerialization($session, ['Default']), 201);
    }
}