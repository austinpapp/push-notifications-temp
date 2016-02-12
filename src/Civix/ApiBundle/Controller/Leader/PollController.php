<?php

namespace Civix\ApiBundle\Controller\Leader;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Answer;

/**
 * @Route("/polls")
 */
class PollController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $polls = [];
        if ($request->query->has('mine')) {
            $polls = $this->getDoctrine()
                ->getRepository($this->getEntityRepository($request->get('type'), ucfirst($this->getUser()->getType())))
                ->findBy(['user' => $this->getUser()], ['id' => 'DESC']);
        }

        return $this->createJSONResponse($this->jmsSerialization($polls, ['api-leader-poll']));
    }

    /**
     * @Route("/{id}/answers/")
     * @Method("GET")
     */
    public function answersListAction(Question $question)
    {
        if ($question->getUser() !== $this->getUser()) {
            return $this->createJSONResponse('', 403);
        }
        $answers = $this->getDoctrine()->getRepository(Answer::class)->findByQuestion($question);

        return $this->createJSONResponse($this->jmsSerialization($answers, ['api-leader-answers']));
    }

    private function getEntityRepository($type, $prefix)
    {
        $className = $prefix;

        if ('petition' === $type) {
            $className = $prefix . 'Petition';
        }
        if ('news' === $type) {
            $className = $prefix . 'News';
        }
        if ('payment_request' === $type) {
            $className = $prefix . 'PaymentRequest';
        }
        if ('petition' === $type) {
            $className = $prefix . 'Event';
        }

        return "Civix\\CoreBundle\\Entity\\Poll\\Question\\{$className}";
    }
}
