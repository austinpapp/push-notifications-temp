<?php
namespace Civix\FrontBundle\Controller\Superuser;

use Cocur\Slugify\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\FrontBundle\Form\Type\Poll\QuestionLimit;
use Civix\FrontBundle\Form\Type\Superuser\LocalRepresentative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\State;

/**
 * @Route("/group")
 */
class GroupController extends Controller
{
    /**
     * @Route("/limits/{id}", name="civix_front_superuser_group_limits")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:limitQuestionEdit.html.twig")
     */
    public function limitsGroupAction(Group $group)
    {
        $questionLimitForm = $this->createForm(new QuestionLimit(), $group);

        return array(
            'questionLimitForm' => $questionLimitForm->createView(),
            'updatePath' => 'civix_front_superuser_group_limits_update'
        );
    }

    /**
     * @Route("/limits/{id}/save", name="civix_front_superuser_group_limits_update")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Superuser:limitQuestionEdit.html.twig")
     */
    public function limitsGroupEditAction(Group $group)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $questionLimitForm = $this->createForm(new QuestionLimit(), $group);
        $questionLimitForm->bind($this->getRequest());

        if ($questionLimitForm->isValid()) {

            $entityManager->persist($group);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Question\'s limit has been successfully saved');
        } else {
            return array(
                'questionLimitForm' => $questionLimitForm->createView(),
                'updatePath' => 'civix_front_superuser_group_limits_update'
            );
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_groups'));
    }

    /**
     * @Route("/remove/{id}", name="civix_front_superuser_group_remove")
     * @Method({"POST"})
     */
    public function removeGroupAction(Group $group)
    {
        $entityManager = $this->getDoctrine()->getManager();

        /** @var $csrfProvider \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider */
        $csrfProvider = $this->get('form.csrf_provider');

        if ($csrfProvider->isCsrfTokenValid('remove_group_' . $group->getId(), $this->getRequest()->get('_token'))) {

            $slugify = new Slugify();

            $groupName = $slugify->slugify($group->getOfficialName(),'');

            $mailgun = $this->get('civix_core.mailgun')->listremoveAction($groupName);

            if($mailgun['http_response_code'] != 200){
                $this->get('session')->getFlashBag()->add('error', 'Something went wrong removing the group from mailgun');
                return $this->redirect($this->generateUrl('civix_front_superuser_manage_groups'));

            }

            try {
                $this->get('civix_core.customer_manager')->removeCustomer($group);
            } catch(\Exception $e) {
                $this->get('session')->getFlashBag()->add('error', $e->getMessage());
                return $this->redirect($this->generateUrl('civix_front_superuser_manage_groups'));
            }

            $entityManager
                    ->getRepository('CivixCoreBundle:Group')
                    ->removeGroup($group);
            $this->get('session')->getFlashBag()->add('notice', 'Group was removed');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_groups'));
    }

    /**
     * @Route("/switch/{id}", name="civix_front_superuser_group_switch")
     */
    public function switchToStateGroup($id)
    {
         $this->get('session')->set('groupid_to_switch', $id);

         return $this->redirect($this->generateUrl('civix_account_switch'));
    }

    /**
     * @Route("/state", name="civix_front_superuser_state_groups")
     * @Route("/state/{id}", name="civix_front_superuser_country_groups_children")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageStateGroups.html.twig")
     */
    public function stateGroupAction(Group $countryGroup = null)
    {
        $pagination = null;

        if ($countryGroup) {
            $query =  $this->getDoctrine()
                ->getRepository('CivixCoreBundle:Group')
                ->getQueryCountryGroupChildren($countryGroup);

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $this->getRequest()->get('page', 1),
                20
            );
        }

        return array(
            'pagination' => $pagination,
            'countryGroup' => $countryGroup,
            'countryGroups' => $this->getCountryGroups(),
        );
    }

    /**
     * @Route("/local/assign/{group}", name="civix_front_superuser_local_groups_assign")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:assignLocalGroups.html.twig")
     */
    public function assignLocalGroup(Group $group)
    {
        $localGroupForm = $this->createForm(new LocalRepresentative($group), $group);

        return array(
            'localGroupForm' => $localGroupForm->createView(),
            'group' => $group
        );
    }

    /**
     * @Route("/local/assign/{group}", name="civix_front_superuser_local_groups_assign_save")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Superuser:assignLocalGroups.html.twig")
     */
    public function saveAssignLocalGroup(Group $group)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $localGroupForm = $this->createForm(new LocalRepresentative($group), $group);
        $localGroupForm->bind($this->getRequest());
        
        if ($localGroupForm->isValid()) {

            $entityManager->persist($group);
            $entityManager->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Assign to local group is completed');
        } else {
            return array(
                'localGroupForm' => $localGroupForm->createView(),
                'group' => $group
            );
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_local_groups_by_parent',
            array('id' => $group->getParent()->getId())
        ));
    }

    /**
     * @Route("/local/{id}", name="civix_front_superuser_local_groups_by_parent")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageLocalGroups.html.twig")
     */
    public function localGroupActionByState(Group $parent)
    {
        if ($parent->getGroupType() !== Group::GROUP_TYPE_STATE && $parent->getGroupType() !== Group::GROUP_TYPE_COUNTRY) {
            throw $this->createNotFoundException();
        }

        return array(
            'selectedGroup'=> $parent,
            'countryGroups' => $this->getCountryGroups()
        );
    }

    /**
     * @Route("/local", name="civix_front_superuser_local_groups")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageLocalGroups.html.twig")
     */
    public function localGroupAction()
    {
        return array(
            'selectedGroup' => null,
            'countryGroups' => $this->getCountryGroups()
        );
    }

    private function getCountryGroups()
    {
        return $this->getDoctrine()->getRepository(Group::class)->findBy([
            'groupType' => Group::GROUP_TYPE_COUNTRY
        ]);
    }
}
