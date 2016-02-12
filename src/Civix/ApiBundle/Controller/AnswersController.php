<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Micropetitions\Petition as MicroPetition;
use Civix\CoreBundle\Entity\Micropetitions\Answer as MicroAnswer;
use Civix\BalancedBundle\Entity\PaymentHistory;
use Civix\CoreBundle\Entity\Stripe\Charge;
use Civix\CoreBundle\Entity\Stripe\Customer;

class AnswersController extends BaseController
{
    /**
     * Unsign petition answer
     *
     * @Route(
     *      "/petition/{id}/answers/{answerId}",
     *      requirements={"entityId"="\d+", "answerId"="\d+"},
     *      name="api_petition_answer_unsign"
     * )
     * @Method("DELETE")
     * @ParamConverter("answer", options={"mapping": {"answerId": "id"}})
     * @ApiDoc(
     *     resource=true,
     *     description="Unsign answer",
     *     filters={
     *         {"name"="entityId", "dataType"="integer"},
     *         {"name"="answerId", "dataType"="integer"},
     *     },
     *     statusCodes={
     *         200="Answer successfully removed",
     *         400="Bad Request",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function unsignPetitionAnswerAction(Petition $petition, $answerId)
    {
        $em = $this->getDoctrine()->getManager();

        $answer = $em->getRepository('CivixCoreBundle:Poll\Answer')->findOneBy(array(
            'user' => $this->getUser(),
            'question' => $petition
        ));

        if (!$answer || $answerId != $answer->getOption()->getId()) {
            throw $this->createNotFoundException();
        }
        $em->remove($answer);
        $em->flush();
        $response = new Response(json_encode(array('status' => 'ok')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Unsign petition answer
     *
     * @Route(
     *      "/micro-petitions/{id}/answers/{answerId}",
     *      requirements={"entityId"="\d+", "answerId"="\d+"},
     *      name="api_micro_petition_answer_unsign"
     * )
     * @Method("DELETE")
     * @ApiDoc(
     *     resource=true,
     *     description="Unsign answer",
     *     filters={
     *         {"name"="entityId", "dataType"="integer"},
     *         {"name"="answerId", "dataType"="integer"},
     *     },
     *     statusCodes={
     *         200="Answer successfully removed",
     *         400="Bad Request",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function unsignMicroPetitionsAnswerAction(MicroPetition $microPetition, $answerId)
    {
        $em = $this->getDoctrine()->getManager();

        $answer = $em->getRepository('CivixCoreBundle:Micropetitions\Answer')->findOneBy(array(
            'user' => $this->getUser(),
            'petition' => $microPetition
        ));

        if (!$answer || $answerId != $answer->getOptionId()) {
            throw $this->createNotFoundException();
        }

        $em->remove($answer);
        $em->flush();
        $response = new Response(json_encode(array('status' => 'ok')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/answers/payment-history/{id}")
     * @Method("GET")
     * @deprecated
     */
    public function paymentHistory(Answer $answer)
    {
        if ($answer->getUser() !== $this->getUser()) {
            throw $this->createNotFoundException();
        }

        $paymentHistory = $this->getDoctrine()->getRepository(PaymentHistory::class)->findOneBy([
            'question_id' => $answer->getQuestion()->getId(),
            'fromUser' => $this->get('civix_core.customer_manager')->getCustomerByUser($this->getUser()),
        ]);

        return $this->createJSONResponse($this->jmsSerialization($paymentHistory, ['api-answer-private']));
    }

    /**
     * @Route("/answers/{id}/charges/")
     * @Method("GET")
     */
    public function charges(Answer $answer)
    {
        if ($answer->getUser() !== $this->getUser()) {
            throw $this->createNotFoundException();
        }

        $customer = $this->getDoctrine()
            ->getRepository(Customer::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);

        if (!$customer) {
            throw $this->createNotFoundException();
        }

        $charge = $this->getDoctrine()
            ->getRepository(Charge::class)
            ->findOneBy([
                'questionId' => $answer->getQuestion()->getId(),
                'fromCustomer' => $customer,
            ])
        ;

        return $this->createJSONResponse(
            $this->jmsSerialization($charge->toArray(), ['api-answer-private'])
        );
    }
}
