<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\CoreBundle\Entity\Notification;

/**
 * @Route("/endpoints")
 */
class EndpointController extends BaseController
{
    /**
     * @Route("/", name="api_endpoints_get")
     * @Method("GET")
     * @ApiDoc(
     *     resource=true,
     *     description="Endpoint",
     *     statusCodes={
     *         200="Returns user endpoints",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getAction()
    {
        $endpoints = $this->getDoctrine()->getManager()->getRepository(Notification\AbstractEndpoint::class)
            ->findByUser($this->getUser());
        $response = new Response($this->jmsSerialization($endpoints, array('owner-get')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/", name="api_endpoints_create")
     * @Method("POST")
     * @ApiDoc(
     *     resource=true,
     *     description="Endpoint",
     *     statusCodes={
     *         201="Endpoints created",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function createAction(Request $request)
    {
        /* @var Notification\AbstractEndpoint $endpoint */
        $endpoint = $this->jmsDeserialization($request->getContent(), Notification\AbstractEndpoint::class,
            array('owner-create'));
        $endpoint->setUser($this->getUser());
        $this->getNotificationService()->handleEndpoint($endpoint);
        $response = new Response($this->jmsSerialization($endpoint, array('owner-get')), 201);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @return \Civix\CoreBundle\Service\Notification
     */
    private function getNotificationService()
    {
        return $this->get('civix_core.notification');
    }
}
