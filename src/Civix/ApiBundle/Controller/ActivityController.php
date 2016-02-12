<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\ActivityRead;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\UserFollow;

class ActivityController extends BaseController
{
    /**
     * @Route("/activity/", name="api_activity_index")
     * @Method("GET")
     *
     * @deprecated change to one query with sorting on client side (/activities/)
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $start = new \DateTime($request->get('start'));
        $currentDate = new \DateTime();

        $activities = $entityManager->getRepository('CivixCoreBundle:Activity')
            ->findActivities($start, $this->getUser(), $request->get('closed'));

        $response = new Response($this->jmsSerialization($activities, ['api-activities']));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Server-Time', $currentDate->format('Y-m-d H:i:s'));

        return $response;
    }

    /**
     * @Route("/activities/")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $offset = $request->query->get('offset', 0);
        $limit = $request->query->get('limit', 10);

        $start = new \DateTime;
        $start->sub(new \DateInterval('P30D'));

        if ($request->query->has('following')) {
            // following var set in request

            // get following users
            $following = $this->getDoctrine()->getRepository(User::class)
                ->find($request->get('following'));

            // get user follow status
            $userFollow = $this->getDoctrine()
                ->getRepository('CivixCoreBundle:UserFollow')->findOneBy([
                    'user' => $following,
                    'follower' => $this->getUser()
                ]);
            if (!$following || !$userFollow ||
                $userFollow->getStatus() !== $userFollow::STATUS_ACTIVE) {
                $activities = [];
            } else {
                $activities = $this->getDoctrine()->getRepository('CivixCoreBundle:Activity')
                    ->findActivitiesByFollowing($following, (int) $offset, (int) $limit);
            }
        } else {
            // get activities by user with offset + limit
            $activities = $this->getDoctrine()->getRepository('CivixCoreBundle:Activity')
                ->findActivitiesByUser($this->getUser(), $start, (int) $offset, (int) $limit);
        }

        $response = $this->createJSONResponse($this->jmsSerialization($activities, ['api-activities']));
        $response->headers->set('Server-Time', (new \DateTime)->format('D, d M Y H:i:s O'));

        return $response;
    }

    /**
     * @Route("/activities/read/")
     * @Method("POST")
     */
    public function saveReadAction(Request $request)
    {
        $items = $this->jmsDeserialization($request->getContent(),
            'array<' . ActivityRead::class . '>', ['api-activities']);

        /* @var ActivityRead $item */
        foreach ($items as $item) {
            $item->setUser($this->getUser())->setCreatedAt(new \DateTime());
        }
        $this->getDoctrine()->getRepository(ActivityRead::class)->save($items);

        return $this->createJSONResponse('[]', 201);
    }

}
