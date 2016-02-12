<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\CoreBundle\Entity\UserFollow;
use Civix\CoreBundle\Entity\User;

/**
 * @Route("/follow")
 */
class FollowController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function getAction()
    {
        $follows = $this->getDoctrine()->getRepository(UserFollow::class)
            ->findByUser($this->getUser());

        return $this->createJSONResponse($this->jmsSerialization($follows, ['api-follow', 'api-info']));
    }

    /**
     * @Route("/")
     * @Method("POST")
     */
    public function postAction(Request $request)
    {
        /* @var UserFollow $follow */
        $follow = $this->jmsDeserialization($request->getContent(), UserFollow::class,
            ['api-follow-create']);
        $follow->setFollower($this->getUser())->setStatus(UserFollow::STATUS_PENDING)
            ->setUser($this->getDoctrine()->getRepository(User::class)->find($follow->getUser()->getId()))
        ;
        $this->getDoctrine()->getRepository(UserFollow::class)->handle($follow);
        $this->get('civix_core.social_activity_manager')->sendUserFollowRequest($follow);

        return $this->createJSONResponse($this->jmsSerialization($follow, ['api-follow', 'api-info']), 201);
    }

    /**
     * @Route("/{id}")
     * @Method("PUT")
     */
    public function putAction(UserFollow $follow, Request $request)
    {
        if ($this->getUser() !== $follow->getUser()) {
            throw new AccessDeniedHttpException();
        }

        $data = json_decode($request->getContent(), true);
        if (!empty($data) && isset($data['status'])) {
            $follow->setStatus($data['status']);
            if ($follow->getStatus() === $follow::STATUS_ACTIVE) {
                $follow->setDateApproval(new \DateTime());
            }
        }

        $this->getDoctrine()->getManager()->flush($follow);

        return $this->createJSONResponse($this->jmsSerialization($follow, ['api-follow', 'api-info']), 200);
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function deleteAction(UserFollow $follow)
    {
        if ($this->getUser() !== $follow->getUser() && $this->getUser() !== $follow->getFollower()) {
            throw new AccessDeniedHttpException();
        }

        $this->getDoctrine()->getManager()->remove($follow);
        $this->getDoctrine()->getManager()->flush($follow);

        return $this->createJSONResponse(null, 204);
    }
}
