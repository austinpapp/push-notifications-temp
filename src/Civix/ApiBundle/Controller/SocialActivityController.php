<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\SocialActivity;

/**
 * @Route("/social-activities")
 */
class SocialActivityController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $response = $this->createJSONResponse($this->jmsSerialization(
            array_merge(
                $this->getDoctrine()->getRepository(SocialActivity::class)->findFollowingForUser($this->getUser()),
                $this->getDoctrine()->getRepository(SocialActivity::class)->findByRecipient($this->getUser())
            ),
            ['api-activities']
        ));
        $response->headers->set('Server-Time', (new \DateTime)->format('D, d M Y H:i:s O'));

        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function removeAction(SocialActivity $socialActivity)
    {
        if ($this->getUser() !== $socialActivity->getRecipient()) {
            throw $this->createNotFoundException();
        }
        $this->getDoctrine()->getManager()->remove($socialActivity);
        $this->getDoctrine()->getManager()->flush($socialActivity);

        return $this->createJSONResponse('', 204);
    }

    /**
     * @Route("/{id}")
     * @Method("PUT")
     */
    public function putAction(SocialActivity $socialActivity)
    {
        if ($this->getUser() !== $socialActivity->getRecipient()) {
            throw $this->createNotFoundException();
        }
        //only ignore
        $data = json_decode($this->getRequest()->getContent(), true);
        if (isset($data['ignore'])) {
            $socialActivity->setIgnore($data['ignore']);
        }
        $this->getDoctrine()->getManager()->flush($socialActivity);

        return $this->createJSONResponse('', 200);
    }
}