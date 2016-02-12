<?php

namespace Civix\ApiBundle\Controller;

use Cocur\Slugify\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\Serializer\Exception\RuntimeException;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;

/**
 * @Route("/groups")
 */
class GroupController extends BaseController
{

    /**
     * @Route("/", name="api_groups")
     * @Method("GET")
     */
    public function getGroupsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $groups = $entityManager->getRepository('CivixCoreBundle:Group')
                ->getGroupsByUser($this->getUser());

        $response = new Response($this->jmsSerialization($groups, ['api-groups']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/")
     * @Method("POST")
     */
    public function createGroupAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $groups = $em->getRepository(Group::class)->findBy(['owner' => $this->getUser()]);

        if (count($groups) > 4) {
            return $this->createJSONResponse(json_encode([
                'error' => 'You have reached a limit for creating groups'
            ]), 403);
        }

        /** @var Group $group */
        $group = $this->jmsDeserialization($request->getContent(), Group::class, ['api-create-by-user']);
        $group->init();

        $errors = $this->getValidator()->validate($group, ['user-registration']);

        if (count($errors) > 0) {
            return $this->createJSONResponse(json_encode(['errors' => $this->transformErrors($errors)]), 400);
        }

        $password = substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 9);
        $encoder = $this->get('security.encoder_factory')->getEncoder($group);
        $encodedPassword = $encoder->encodePassword($password, $group->getSalt());
        $group->setPassword($encodedPassword)->setOwner($this->getUser());

        $slugify = new Slugify();

        $groupName = $slugify->slugify($group->getOfficialName(),'');

        $mailgun = $this->get('civix_core.mailgun')->listcreateAction($groupName,$group->getOfficialDescription(),$group->getManagerEmail(),$group->getManagerFirstName().' '.$group->getManagerLastName());

        if($mailgun['http_response_code'] != 200){

            return $this->createJSONResponse( json_encode(['error' => 'cannot add to mailgun list']),403);

        }
            $em->persist($group);
            $em->flush();

        $mailgun = $this->get('civix_core.mailgun')->listaddmemberAction($groupName,$this->getUser()->getEmail(),$this->getUser()->getFirstName().' '.$this->getUser()->getLastName());

        if($mailgun['http_response_code'] != 200){

               $this->createJSONResponse(json_encode(['error' => 'cannot add owner\'s email to mailgun list']),403) ;

        }
        $this->get('civix_core.group_manager')
            ->joinToGroup($this->getUser(), $group);
        $em->flush();

        $this->get('civix_core.email_sender')
            ->sendUserRegistrationSuccessGroup($group, $password);
        $em->getRepository('CivixCoreBundle:Group')
            ->getTotalMembers($group);

        return $this->createJSONResponse($this->jmsSerialization($group, ['api-info']), 201);
    }

    /**
     * @Route("/user-groups/")
     * @Method("GET")
     */
    public function getUserGroupsAction()
    {
        $groups = $this->getDoctrine()->getRepository('CivixCoreBundle:Group')
            ->getUserGroupsByUser($this->getUser());

        $response = new Response($this->jmsSerialization($groups, ['api-groups']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/popular", name="api_popular_groups")
     * @Method("GET")
     */
    public function getPopularGroupsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $groups = $entityManager->getRepository('CivixCoreBundle:Group')
            ->getPopularGroupsByUser($this->getUser());

        $response = new Response($this->jmsSerialization($groups, ['api-groups']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/new", name="api_new_groups")
     * @Method("GET")
     */
    public function getNewGroupsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $groups = $entityManager->getRepository('CivixCoreBundle:Group')
            ->getNewGroupsByUser($this->getUser());

        $response = new Response($this->jmsSerialization($groups, ['api-groups']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/join/{id}", name="api_groups_join")
     * @Method("POST")
     * @ParamConverter(
     *      "group",
     *      class="CivixCoreBundle:Group",
     *      options={"repository_method" = "getGroupByIdAndType"}
     * )
     */
    public function joinToGroupAction(Request $request, Group $group)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var $user User */
        $user = $this->getUser();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $responseContentArray = [];
        
        //check invites
        $isNeedToCheckPasscode = $this->get('civix_core.group_manager')
                ->isNeedCheckPasscode($group, $user);
        
        $serializerGroups = [];
        if ($group->getFillFieldsRequired()) {
            $serializerGroups[] = 'api-group-field';
        }
        if ($isNeedToCheckPasscode) {
            $serializerGroups[] = 'api-group-passcode';
        }

        if (!empty($serializerGroups)) {
            try {
                $worksheet = $this->jmsDeserialization(
                    $request->getContent(),
                    'Civix\CoreBundle\Model\Group\Worksheet',
                    $serializerGroups
                );
                $worksheet->setUser($user);
                $worksheet->setGroup($group);

                //check passcode
                if ($isNeedToCheckPasscode &&
                    $worksheet->getPasscode() != $group->getMembershipPasscode()
                ) {
                    throw new AccessDeniedHttpException('Incorrect passcode');
                }
            } catch (RuntimeException $exc) {
                //incorrect json or empty
                if ($isNeedToCheckPasscode) {
                    throw new AccessDeniedHttpException('Incorrect passcode');
                } else {
                    throw new BadRequestHttpException('Incorrect request body');
                }
            }

            $errors = $this->getValidator()->validate($worksheet, $serializerGroups);
            if (count($errors) > 0) {
                $response->setStatusCode(400)->setContent(
                    json_encode(['errors' => $this->transformErrors($errors)])
                );

                return $response;
            }
        }

        if (!$this->get('civix_core.package_handler')->getPackageStateForGroupSize($group)->isAllowed()) {
            $response->setStatusCode(403)->setContent(
                json_encode(['error' => 'The group is full'])
            );

            return $response;
        }

        $slugify = new Slugify();

        $groupName = $slugify->slugify($group->getOfficialName(),'');

        $mailgun = $this->get('civix_core.mailgun')->listaddmemberAction($groupName,$this->getUser()->getEmail(),$this->getUser()->getFirstName().' '.$this->getUser()->getLastName());

        if($mailgun['http_response_code'] != 200){
            $response->setStatusCode(403)->setContent(
                json_encode(['error' => 'cannot add to mailgun list'])
            );
        }

        else{

        $changedUser = $this->get('civix_core.group_manager')
            ->joinToGroup($user, $group);

        if ($changedUser instanceof User) {
            //save fields values
            if ($group->getFillFieldsRequired()) {
                foreach ($worksheet->getFields() as $fieldValue) {
                    $entity = $entityManager->merge($fieldValue);
                    $entityManager->persist($entity);
                }
            }
            
            $entityManager->persist($changedUser);
            $entityManager->flush();

        }




        //check status of join
        $userGroup = $entityManager
            ->getRepository('CivixCoreBundle:UserGroup')
            ->isJoinedUser($group, $user);
        $responseContentArray['status'] = $userGroup->getStatus();

        $response->setContent(json_encode($responseContentArray));
    }
        return $response;
    }

    /**
     * @Route("/join/{id}", name="api_groups_unjoin")
     * @Method("DELETE")
     * @ParamConverter(
     *      "group",
     *      class="CivixCoreBundle:Group",
     *      options={"repository_method" = "getGroupByIdAndType"}
     * )
     */
    public function unjoinFromGroup(Group $group)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $successRespContent = json_encode(['success'=>'ok']);

        $this->get('civix_core.group_manager')->unjoinGroup($this->getUser(), $group);

        $slugify = new Slugify();

        $groupName = $slugify->slugify($group->getOfficialName(),'');

        $mailgun = $this->get('civix_core.mailgun')->listremovememberAction($groupName,$this->getUser()->getEmail());

        if($mailgun['http_response_code'] != 200){
            $response->setStatusCode(403)->setContent(
                json_encode(['error' => 'cannot remove this user from mailgun list'])
            );
        }else{
            $response->setContent($successRespContent);
        }


        return $response;
    }
    
    /**
     * @Route("/info/{group}", requirements={"group"="\d+"}, name="api_group_information")
     * @Method("GET")
     * @ParamConverter("group", class="CivixCoreBundle:Group")
     */
    public function getInformationAction(Request $request, $group)
    {
        $entityManager = $this->getDoctrine()->getManager();

        if (!$group) {
            throw $this->createNotFoundException();
        }

        $count = $entityManager->getRepository('CivixCoreBundle:Group')
                ->getTotalMembers($group);

        $response = new Response($this->jmsSerialization($group, ['api-info']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/invites", name="api_group_invites")
     * @Method("GET")
     */
    public function getInvitesAction(Request $request)
    {
        $response = new Response($this->jmsSerialization($this->getUser()->getInvites(), ['api-groups']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route(
     *     "/invites/{status}/{group}", 
     *     requirements={"group"="\d+", "status"="approve|reject"},
     *     name="api_group_invites_approval"
     * )
     * @Method("POST")
     * @ParamConverter("group", class="CivixCoreBundle:Group")
     */
    public function invitesApprovalAction(Request $request, $status, $group)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $user = $this->getUser();

        if ($status == 'reject') {
            if (true === $user->getInvites()->contains($group)) {
                $user->removeInvite($group);
            } else {
                $response->setStatusCode(405);
            }
        }
        if ($status == 'approve') {
            if (false === $user->getGroups()->contains($group) && true === $user->getInvites()->contains($group)) {

                $slugify = new Slugify();

                $groupName = $slugify->slugify($group->getOfficialName(),'');

                $mailgun = $this->get('civix_core.mailgun')->listaddmemberAction($groupName,$this->getUser()->getEmail(),$this->getUser()->getFirstName().' '.$this->getUser()->getLastName());

                if($mailgun['http_response_code'] != 200){
                    $response->setStatusCode(403)->setContent(
                        json_encode(['error' => 'cannot add to mailgun list'])
                    );
                }
                else{
                    $this->get('civix_core.group_manager')
                        ->joinToGroup($user, $group, true);
                }

            } else {
                $response->setStatusCode(405);
            }
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $response;
    }

    /**
     * @Route(
     *     "/{group}/fields",
     *     requirements={"group"="\d+"},
     *     name="api_group_fields"
     * )
     * @Method("GET")
     */
    public function getGroupRequiredFields(Group $group)
    {
        $response = new Response($this->jmsSerialization($group->getFields(), ['api-groups-fields']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
