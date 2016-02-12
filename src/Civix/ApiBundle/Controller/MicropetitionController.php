<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\CoreBundle\Entity\Micropetitions\Answer;

class MicropetitionController extends BaseController
{
    /**
     * @Route(
     *      "/micro-petitions",
     *      name="api_micropetition_create"
     * )
     * @Method("POST")
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Create micropetition by user",
     *      input={
     *          "class"="Civix\CoreBundle\Entity\Micropetitions\Petition",
     *          "groups"="api-petitions-create"
     *      },
     *      statusCodes={
     *          200="Returns new micropetition",
     *          400="Bad Request",
     *          405="Method Not Allowed"
     *      }
     * )
     */
    public function createPetitionAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $micropetitionService = $this->get('civix_core.poll.micropetition_manager');

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        /**
        * @var $newPetition \Civix\CoreBundle\Entity\Micropetitions\Petition
        */
        $newPetition = $this->jmsDeserialization($request->getContent(),
            'Civix\CoreBundle\Entity\Micropetitions\Petition', array('api-petitions-create'));
        if ($newPetition->getType() !== Petition::TYPE_LONG_PETITION) {
            $newPetition->setTitle(''); //title should be removed in the future
        }
        
        $errors = $this->getValidator()->validate($newPetition);

        if (count($errors) > 0) {
            $response->setStatusCode(400)->setContent(json_encode(array('errors' => $this->transformErrors($errors))));

            return $response;
        } else {
            $petitionGroup = $entityManager->getRepository('CivixCoreBundle:Group')
                ->find($newPetition->getGroupId());
            if (!($petitionGroup instanceof Group)) {
                throw $this->createNotFoundException();
            }

            //check limit petition
            if (!$micropetitionService->checkPetitionLimitPerMonth($this->getUser(), $petitionGroup)) {
                $response->setStatusCode(406)->setContent(json_encode(
                    array('errors' => array('Your limit of petitions per month is reached')))
                );

                return $response;
            }

            $interval = $this->get('civix_core.settings')
                ->get('micropetition_expire_interval_' . $petitionGroup->getGroupType())->getValue();
            $newPetition = $micropetitionService
                ->createPetitionInterval($newPetition, $petitionGroup, $this->getUser(), $interval);

            $entityManager->persist($newPetition);
            $entityManager->flush();
            $entityManager->getRepository('CivixCoreBundle:HashTag')->addForPetition($newPetition);

            //publish to activity (for followers only)
            $this->get('civix_core.activity_update')->publishMicroPetitionToActivity($newPetition);
            $this->get('civix_core.social_activity_manager')->noticeMicropetitionCreated($newPetition);
            $this->get('civix_core.poll.comment_manager')->addMicropetitionRootComment($newPetition);

            $response->setContent($this->jmsSerialization($newPetition, array('api-petitions-info')));

            return $response;
        }
    }

    /**
     * @Route("/micro-petitions", name="api_micropetition_list")
     * @Method("GET")
     * @deprecated
     * @ApiDoc(
     *      resource=true,
     *      description="List micropetitions from user's groups",
     *      statusCodes={
     *          200="Returns list micropetitions",
     *          400="Bad Request",
     *          405="Method Not Allowed"
     *      }
     * )
     */
    public function getListMicropetitions(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $currentDate = new \DateTime();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $myPetitions = $entityManager
            ->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->getMyGroupsMicropitions($this->getUser());

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Server-Time', $currentDate->format('Y-m-d H:i:s'));
        $response->setContent($this->jmsSerialization($myPetitions, array('api-petitions-list')));

        return $response;
    }

    /**
     * @Route("/micro-petitions/", name="api_get_micropetitions")
     * @Method("GET")
     */
    public function getMicropetitions(Request $request)
    {
        $currentDate = new \DateTime();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $petitions = $this->getDoctrine()
            ->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->findByParams($request->query->all());

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Server-Time', $currentDate->format('Y-m-d H:i:s'));
        $response->setContent($this->jmsSerialization($petitions, array('api-petitions-list')));

        return $response;
    }

    /**
     * @Route(
     *      "/micro-petitions/{id}",
     *      name="api_micropetition_info",
     *      requirements={"id"="\d+"}
     * )
     * @Method("GET")
     * @ApiDoc(
     *      resource=true,
     *      description="Get micropetition by ID",
     *      statusCodes={
     *          200="Returns micropetition's info",
     *          400="Bad Request",
     *          405="Method Not Allowed"
     *      }
     * )
     */
    public function getMicropetition(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $micropetition = $entityManager
            ->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->getPetitionForUser($id, $this->getUser());
        $micropetition = $this->get('civix_core.poll.micropetition_manager')
            ->recalcVoicesForPetitions($micropetition);

        $response->setContent($this->jmsSerialization(
            $micropetition,
            array('api-petitions-info', 'api-petitions-create', 'api-petitions-get'))
        );

        return $response;
    }

    /**
     * @Route(
     *      "/micro-petitions/{id}/answers/{option_id}",
     *      requirements={"id"="\d+", "option_id"="\d+"},
     *      name="api_micropetition_choice"
     * )
     * @Method("POST")
     * @ParamConverter("micropetition", class="CivixCoreBundle:Micropetitions\Petition")
     * @ApiDoc(
     *      resource=true,
     *      description="Answer to micropetition",
     *      statusCodes={
     *          200="Returns micropetition's info",
     *          400="Bad Request",
     *          405="Method Not Allowed"
     *      }
     * )
     */
    public function choiceMicropetition(Request $request, Petition $micropetition)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $micropetitionService = $this->get('civix_core.poll.micropetition_manager');

        $optionId = $request->get('option_id');
        $answer = $micropetitionService
            ->answerToPetitition($micropetition, $this->getUser(), $optionId);
        if (!$answer) {
            $response->setStatusCode(400)->setContent(json_encode(array(
                'errors'=>$micropetitionService->getErrors()))
            );
        } else {
            $micropetitionService->recalcVoicesForPetitions($micropetition);
            $response->setContent($this->jmsSerialization($answer, array('api-answers-list')));
        }

        return $response;
    }

    /**
     * @Route("/micro-petitions/answers/")
     * @Method("GET")
     */
    public function answersAction()
    {
        return new Response($this->jmsSerialization($this->getDoctrine()->getRepository(Answer::class)
            ->findLastByUser($this->getUser()), array('api-answers-list')));
    }
}
