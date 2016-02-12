<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Exception\LogicException;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Question\LeaderEvent;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;

abstract class ReportContoller extends Controller
{
    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:questions.html.twig")
     */
    public function indexAction(Request $request)
    {
        return $this->getQuestionList($request, $this->getQuestionClass());
    }
    
    /**
     * @Route("/{id}",  requirements={"id"="\d+"})
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:questionDetails.html.twig")
     */
    public function questionAction(Question $question)
    {
        return $this->getQuestionDetails($question, $this->getQuestionClass());
    }

    /**
     * @Route("/events")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:events.html.twig")
     */
    public function eventsAction(Request $request)
    {
        return $this->getQuestionList($request, $this->getEventClass());
    }

    /**
     * @Route("/events/{id}",  requirements={"id"="\d+"})
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:eventDetails.html.twig")
     */
    public function eventAction(LeaderEvent $event)
    {
        return $this->getQuestionDetails($event, $this->getEventClass());
    }

    /**
     * @Route("/payment-requests")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:payments.html.twig")
     */
    public function paymentsAction(Request $request)
    {
        return $this->getQuestionList($request, $this->getPaymentRequestClass());
    }
    
    /**
     * @Route("/payment-requests/{id}",  requirements={"id"="\d+"})
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:paymentDetails.html.twig")
     */
    public function paymentAction(PaymentRequest $payment)
    {
        return $this->getQuestionDetails($payment, $this->getPaymentRequestClass());
    }
    
    abstract public function getQuestionClass();
    abstract public function getEventClass();
    abstract public function getPaymentRequestClass();

    private function getQuestionList(Request $request, $class)
    {
        try {
            $query =  $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question')
                ->getPublishedQuestionQuery($this->getUser(), $class);
        } catch (LogicException $e) {
            throw $this->createNotFoundException();
        }
        
        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $request->get('page', 1),
            10
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken(),
        ];
    }
    
    private function getQuestionDetails(Question $question, $class)
    {
        try {
            $questionDetails = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question')
                ->getPublishedQuestionWithAnswers($question->getId(), $class);
        } catch (LogicException $e) {
            throw $this->createNotFoundException();
        }
            
        if (!$questionDetails) {
            throw $this->createNotFoundException();
        }
        $statistics = $question->getStatistic(['#7ac768', '#ba3830', '#4fb0f3', '#dbfa08', '#08fac4']);
        
        return [
            'statistics' => $statistics,
            'question' => $questionDetails
        ];
    }
    
    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('question');
    }
}
