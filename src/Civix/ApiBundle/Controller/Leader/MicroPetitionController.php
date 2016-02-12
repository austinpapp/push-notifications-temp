<?php

namespace Civix\ApiBundle\Controller\Leader;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\CoreBundle\Entity\Micropetitions\Answer;

/**
 * @Route("/micro-petitions")
 */
class MicroPetitionController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $microPetitions = [];
        if ($request->query->has('mine')) {
            $microPetitions = $this->getDoctrine()
                ->getRepository(Petition::class)
                ->findBy(['group' => $this->getUser()], ['id' => 'DESC']);
        }

        return $this->createJSONResponse($this->jmsSerialization($microPetitions, ['api-leader-micropetition']));
    }

    /**
     * @Route("/{id}/answers/")
     * @Method("GET")
     */
    public function answersListAction(Petition $microPetition)
    {
        if ($microPetition->getGroup() !== $this->getUser()) {
            return $this->createJSONResponse('', 403);
        }
        $answers = $this->getDoctrine()->getRepository(Answer::class)->findByPetition($microPetition);

        return $this->createJSONResponse($this->jmsSerialization($answers, ['api-leader-answers']));
    }
}
