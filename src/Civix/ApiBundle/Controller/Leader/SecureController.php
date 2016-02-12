<?php

namespace Civix\ApiBundle\Controller\Leader;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\ApiBundle\Controller\BaseController;
use Civix\ApiBundle\Request\AuthRequest;
use Civix\CoreBundle\Entity\Session;

class SecureController extends BaseController
{

    /**
     * @Route("/sessions/")
     * @Method("POST")
     */
    public function createSessionAction(Request $request)
    {
        /* @var $auth AuthRequest */
        $auth = $this->jmsDeserialization($request->getContent(), AuthRequest::class, ['Default']);
        $this->validate($auth);
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('CivixCoreBundle:' . ucfirst($auth->getType()))
            ->findOneByUsername($auth->getUsername());

        if (!$user) {
            return $this->createJSONResponse(json_encode(['errors' =>
                ['property' => 'username', 'message' => 'Incorrect username or password']]), 400);
        }

        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $password = $encoder->encodePassword($auth->getPassword(), $user->getSalt());

        if ($password === $user->getPassword()) {
            $session = new Session($user);
            $em->persist($session);
            $em->flush($session);

            return $this->createJSONResponse($this->jmsSerialization($session, ['Default']), 201);
        }

        return $this->createJSONResponse(json_encode(['errors' =>
            ['property' => 'username', 'message' => 'Incorrect username or password']]), 400);
    }
}