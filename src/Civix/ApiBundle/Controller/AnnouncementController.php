<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AnnouncementController extends BaseController
{
    /**
     * @Route("/announcements", name="api_announcements")
     * @Method("GET")
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Announcements",
     *      filters={
     *        {"name"="start", "dataType"="datetime"}
     *     },
     *      statusCodes={
     *          200="Returns announcements",
     *          400="Bad Request",
     *          405="Method Not Allowed"
     *      }
     * )
     */
    public function listAction(Request $request)
    {
        $start = new \DateTime($request->get('start', 'now'));
        $announcements = $this->getDoctrine()->getRepository('CivixCoreBundle:Announcement')
            ->findByUser($this->getUser(), $start);
        $response = new Response($this->jmsSerialization($announcements, array('api', 'api-activities')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
