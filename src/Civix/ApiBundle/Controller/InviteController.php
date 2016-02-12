<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\CoreBundle\Entity\Invites;

/**
 * @Route("/invites")
 */
class InviteController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function getAction()
    {
        $invites = $this->getDoctrine()->getManager()->getRepository(Invites\BaseInvite::class)
            ->findByUser($this->getUser());
        $response = new Response($this->jmsSerialization($invites, ['api-invites']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var Invites\BaseInvite $invite */
        $invites = $this->jmsDeserialization($request->getContent(), 'array<' . Invites\BaseInvite::class . '>',
            ['api-invites-create']);
        $results = [];
        foreach ($invites as $invite) {
            $invite->setInviter($this->getUser());
            $invite->merge($em);
            $errors = $this->getValidator()->validate($invite);
            if (!$errors->count()) {
                $em->persist($invite);
                $em->flush($invite);
                $results[] = $invite;
            }
        }
        $this->container->get('civix_core.invite_sender')->sendUserInvites($results);

        $response = new Response($this->jmsSerialization($results, ['api-invites']), 201);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var Invites\BaseInvite $invite */
        $invite = $em->getRepository(Invites\BaseInvite::class)->find($id);
        if (!$invite) {
            throw $this->createNotFoundException();
        }
        if ($invite->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        $em->remove($invite);
        $em->flush($invite);

        return new Response(null, 204);
    }
}
