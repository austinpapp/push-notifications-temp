<?php

namespace Civix\FrontBundle\Controller\Group;

use Cocur\Slugify\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/members")
 */
class MemberController extends Controller
{
    /**
     * @Route("", name="civix_front_group_members")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:members/members.html.twig")
     */
    public function membersAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /**
         * @var $currentGroup \Civix\CoreBundle\Entity\Group
         */
        $currentGroup = $this->getUser();
        
        $status = ($currentGroup->getMembershipControl() == Group::GROUP_MEMBERSHIP_APPROVAL)?
               $currentGroup->getMembershipControl():null;
        
        $query = $entityManager->getRepository('CivixCoreBundle:UserGroup')
            ->getUsersByGroupQuery($currentGroup, $status);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20,
            array('distinct' => false)
        );

        return array(
            'pagination' => $pagination,
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        );
    }

    /**
     * @Route("/{id}/remove", name="civix_front_group_members_remove")
     * @Method({"POST"})
     */
    public function memberRemoveAction(User $user)
    {
        $entityManager = $this->getDoctrine()->getManager();

        if (!$this->getUser() instanceof \Civix\CoreBundle\Entity\Group) {
            throw $this->createNotFoundException('The group is not found');
        }

        $csrfProvider = $this->get('form.csrf_provider');
        if ($csrfProvider->isCsrfTokenValid(
            'remove_members_' . $user->getId(), $this->getRequest()->get('_token')
        )) {

            $slugify = new Slugify();

            $groupName = $slugify->slugify($this->getUser()->getOfficialName(),'');

            $mailgun = $this->get('civix_core.mailgun')->listremovememberAction($groupName,$this->getUser()->getEmail());

            if($mailgun['http_response_code'] != 200) {
                $this->get('session')->getFlashBag()->add('error' , 'cannot remove this user from mailgun list');
                return $this->redirect($this->generateUrl('civix_front_group_members'));
            }
            $this->get('civix_core.group_manager')
                ->unjoinGroup($user, $this->getUser());

            $entityManager->persist($user);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'User has been successfully removed from group');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_group_members'));
    }

    /**
     * @Route("/approvals", name="civix_front_group_manage_approvals")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:members/approvals.html.twig")
     */
    public function manageApprovalsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->getRepository('CivixCoreBundle:UserGroup')
            ->getUsersByGroupQuery($this->getUser(), UserGroup::STATUS_PENDING);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20,
            array('distinct' => false)
        );

        return array(
            'pagination' => $pagination,
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        );
    }

    /**
     * @Route("/{id}/approve",requirements={"id"="\d+"}, name="civix_front_group_members_approve")
     * @Method({"POST"})
     */
    public function approveUser(User $user)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $csrfProvider = $this->get('form.csrf_provider');

        if ($csrfProvider->isCsrfTokenValid(
            'approve_members_' . $user->getId(), $this->getRequest()->get('_token')
        )) {
            $userGroup = $entityManager
                ->getRepository('CivixCoreBundle:UserGroup')
                ->isJoinedUser($this->getUser(), $user);

            if ($userGroup) {

                $slugify = new Slugify();
                $groupName = $slugify->slugify($userGroup->getGroup()->getOfficialName(),'');

                $mailgun = $this->get('civix_core.mailgun')->listaddmemberAction($groupName,$userGroup->getUser()->getEmail(),$userGroup->getUser()->getFirstName().' '.$userGroup->getUser()->getLastName());


                if($mailgun['http_response_code'] != 200){

                    $this->get('session')->getFlashBag()->add('error' , 'cannot add user to mailgun list');
                    return $this->redirect($this->generateUrl('civix_front_group_manage_approvals'));

                }
                $userGroup->setStatus(UserGroup::STATUS_ACTIVE);
                $entityManager->persist($userGroup);
                $entityManager->flush();
                $this->get('civix_core.social_activity_manager')->noticeGroupJoiningApproved($userGroup);
                $this->get('session')->getFlashBag()->add('notice', 'User has been successfully approved');

                return $this->redirect($this->generateUrl('civix_front_group_manage_approvals'));
            }
        }

        $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
    }

    /**
     * @Route("/{id}/fields",requirements={"id"="\d+"}, name="civix_front_group_members_fields")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:members/fields.html.twig")
     */
    public function getUserFields(User $user)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $fieldValues = $entityManager->getRepository('CivixCoreBundle:Group\FieldValue')
            ->getFieldsValuesByUser($user, $this->getUser());

        return array(
            'fieldValues' => $fieldValues,
            'user' => $user,
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        );
    }

    protected function createJSONResponse($content = '', $status = 200)
    {
        $response = new Response($content, $status);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
