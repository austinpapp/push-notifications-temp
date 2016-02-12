<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Civix\CoreBundle\Entity\Activities\Question;
use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Option;
use Civix\CoreBundle\Entity\User;

/**
 * @Route("/poll")
 */
class PollController extends BaseController
{
    /**
     * Get Question by ID
     *
     * @Route("/question/{question_id}", requirements={"question_id"="\d+"}, name="api_question_get")
     * @Method("GET")
     * @ApiDoc(
     *     resource=true,
     *     description="Get Question by ID",
     *     statusCodes={
     *         200="Returns question",
     *         400="Bad Request",
     *         401="Authorization required",
     *         404="Question not found",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function questionGetAction(Request $request)
    {
        $id = $request->get('question_id');

        $entityManager = $this->getDoctrine()->getManager();
        /** @var $question \Civix\CoreBundle\Entity\Poll\Question */
        $question = $entityManager->getRepository('CivixCoreBundle:Poll\Question')->findAsUser($id, $this->getUser());
        if (!$question) {
            throw $this->createNotFoundException();
        }

        $response = new Response($this->jmsSerialization($question, array('api-poll')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get Questions by representative
     *
     * @Route(
     *      "/question/representative/{id}",
     *      requirements={"id"="\d+"},
     *      name="api_question_get_by_representative"
     * )
     * @Method("GET")
     * @ParamConverter(
     *      "activities",
     *      class="CivixCoreBundle:Activity",
     *      options={"repository_method" = "getActivitiesByRepresentativeId"}
     * )
     * @ApiDoc(
     *     resource=true,
     *     description="Get Questions by representative",
     *     statusCodes={
     *         200="Returns questions",
     *         400="Bad Request",
     *         401="Authorization required",
     *         404="Question not found",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function questionGetByRepresentativeAction(Request $request, $activities)
    {
        $response = new Response($this->jmsSerialization($activities, array('api-activities')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get Questions by group
     *
     * @Route("/question/group/{id}", requirements={"id"="\d+"}, name="api_question_get_by_group")
     * @Method("GET")
     * @ParamConverter(
     *      "activities",
     *      class="CivixCoreBundle:Activity",
     *      options={"repository_method" = "getActivitiesByGroupId"}
     * )
     * @ApiDoc(
     *     resource=true,
     *     description="Get Questions by group",
     *     statusCodes={
     *         200="Returns questions",
     *         400="Bad Request",
     *         401="Authorization required",
     *         404="Question not found",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function questionGetByGroupAction(Request $request, $activities)
    {
        $response = new Response($this->jmsSerialization($activities, array('api-activities')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get question answers
     *
     * @Route(
     *      "/question/{question}/answers/influence",
     *      requirements={"question"="\d+"},
     *      name="api_question_answers_influence"
     * )
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     * @Method("GET")
     * @ApiDoc(
     *     resource=true,
     *     description="Get question answers",
     *     statusCodes={
     *         200="Returns answers",
     *         400="Bad Request",
     *         401="Authorization required",
     *         404="Question not found",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function answersByInfluenceAction(Request $request, \Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $answers = $entityManager
                ->getRepository('CivixCoreBundle:Poll\Answer')
                ->getAnswersByInfluence($this->getUser(), $question);

        $result = array(
            'answers' => $answers,
            'avatar_friend_hidden' => $this->getRequest()->getScheme()
                . '://'
                . $this->getRequest()->getHttpHost()
                . \Civix\CoreBundle\Entity\User::SOMEONE_AVATAR,
        );


        $response = new Response($this->jmsSerialization($result, array('api-answer', 'api-info')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get question answers
     *
     * @Route(
     *      "/question/{question}/answers/influence/outside",
     *      requirements={"question"="\d+"},
     *      name="api_question_answers_influence_outside"
     * )
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     * @Method("GET")
     * @ApiDoc(
     *     resource=true,
     *     description="Get question answers",
     *     statusCodes={
     *         200="Returns answers",
     *         400="Bad Request",
     *         401="Authorization required",
     *         404="Question not found",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function answersByOutsideInfluenceAction(Request $request, \Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $answers = $entityManager
                ->getRepository('CivixCoreBundle:Poll\Answer')
                ->getAnswersByNotInfluence($this->getUser(), $question, 5);

        $result = array(
            'answers' => $answers,
            'avatar_someone' => $this->getRequest()->getScheme()
                . '://'
                . $this->getRequest()->getHttpHost()
                . \Civix\CoreBundle\Entity\User::SOMEONE_AVATAR,
        );

        $response = new Response($this->jmsSerialization($result, array('api-answer')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Add new Answer
     *
     * @Route("/question/{question_id}/answer/add", requirements={"question_id"="\d+"}, name="api_answer_add")
     * @Method("POST")
     */
    public function answerAddAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $dispatcher = $this->get('event_dispatcher');

        /** @var $user User */
        $user = $this->getUser();
        /** @var $question Question */
        $question = $entityManager->getRepository('CivixCoreBundle:Poll\Question')->find($request->get('question_id'));
        if (is_null($question)) {
            throw new BadRequestHttpException('Question not found');
        }
        /** @var $option Option */
        $option = $entityManager->getRepository('CivixCoreBundle:Poll\Option')->find($request->get('option_id'));
        if (is_null($option) || $option->getQuestion()->getId() !== $question->getId()) {
            throw new BadRequestHttpException('Wrong option ID');
        }
        
        $isCanAnswer = $this->get('civix_core.poll.answer_manager')->checkAccessAnswer($user, $question);
        if (!$isCanAnswer) {
            throw new AccessDeniedHttpException();
        }

        /** @var $answer Answer */
        $answer = $entityManager->getRepository('CivixCoreBundle:Poll\Answer')
            ->findOneBy(array(
                'option' => $option,
                'user' => $user
            ));
        if (!is_null($answer)) {
            throw new BadRequestHttpException('User is already answered this question');
        }

        $answer = new Answer();
        $answer->setQuestion($question);
        $answer->setOption($option);
        $answer->setUser($user);
        $answer->setComment($request->get('comment'));
        $answer->setPrivacy($request->get('privacy'));
        $answer->setPaymentAmount($request->get('payment_amount'));

        $errors = $this->getValidator()->validate($answer, array('api-poll'));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        if (count($errors) > 0) {
            $response->setStatusCode(400)
                ->setContent(json_encode(array('errors' => $this->transformErrors($errors))));
        } else {

            if ($question instanceof PaymentRequest && !$question->getIsCrowdfunding() &&
                $answer->getCurrentPaymentAmount()) {
                $this->get('civix_core.stripe')->chargeToPaymentRequest($question, $answer, $user);
            }
            $entityManager->persist($answer);
            $entityManager->flush();

            if ($question instanceof PaymentRequest && $question->getIsCrowdfunding() &&
                $answer->getCurrentPaymentAmount()) {
                $entityManager->getRepository(PaymentRequest::class)->updateCrowdfundingPledgedAmount($answer);
            }
            //update activity responses
            $this->get('civix_core.activity_update')->updateResponsesQuestion($question);

            $this->get('civix_core.poll.answer_manager')->setVisibleAnswersForRecipent($answer);
            $this->get('civix_core.poll.comment_manager')->addCommentByQuestionAnswer($answer);
            $this->get('civix_core.social_activity_manager')->noticeAnsweredToQuestion($answer);

            $response->setContent($this->jmsSerialization($answer, array('api-answers-list')));
        }

        return $response;
    }

    /**
     * Add rate to comment
     * @Route(
     *      "/comments/rate/{id}/{action}",
     *      requirements={"id"="\d+", "action"="up|down|delete"},
     *      name="api_question_rate_comment"
     * )
     * @ParamConverter("comment", class="CivixCoreBundle:BaseComment")
     * @Method("POST")
     * @ApiDoc(
     *     resource=true,
     *     description="Add rate to comment",
     *     statusCodes={
     *         200="Returns comment with new rate",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * ) 
     */
    public function rateCommentAction(\Civix\CoreBundle\Entity\BaseComment $comment, $action)
    {
        $user = $this->getUser();
        $rateActionConstant = 'Civix\CoreBundle\Entity\Poll\CommentRate::RATE_' . strtoupper($action);

        if ($comment->getUser() == $user) {
            throw new BadRequestHttpException('You can\'t rate your comment');
        }

        $comment = $this->get('civix_core.poll.comment_manager')
                ->updateRateToComment($comment, $user, constant($rateActionConstant));

        if ($comment instanceof \Civix\CoreBundle\Entity\Poll\Comment &&
            !$comment->getParentComment() &&
            $comment->getQuestion() instanceof \Civix\CoreBundle\Entity\Poll\Question\LeaderNews) {
            $this->get('civix_core.activity_update')->updateEntityRateCount($comment);
        }

        $response = new Response($this->jmsSerialization($comment, array('api-comments', 'api-comments-parent')));

        return $response;
    }

    /**
     * @Route("/answers/")
     * @Method("GET")
     */
    public function answersAction()
    {
        return new Response($this->jmsSerialization($this->getDoctrine()->getRepository(Answer::class)
            ->findLastByUser($this->getUser()), array('api-answers-list')));
    }
}
