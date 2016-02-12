<?php

namespace Civix\FrontBundle\Controller\Group;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Civix\CoreBundle\Entity\Group;
use Civix\FrontBundle\Form\Type\Group\Membership;

/**
 * @Route("/membership")
 */
class MembershipController extends Controller
{
    /**
     * @Route("/", name="civix_front_group_membership")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:membership/membershipEdit.html.twig")
     */
    public function membershipAction(Request $request)
    {
        $membershipForm = $this->createForm(new Membership(), $this->getUser());

        return array(
            'membershipForm' => $membershipForm->createView(),
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        );
    }

    /**
     * @Route("/", name="civix_front_group_membership_save")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Group:membership/membershipEdit.html.twig")
     */
    public function membershipSaveAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $currentGroup = $this->getUser();
        $membershipForm = $this->createForm(new Membership(), $currentGroup);

        $membershipForm->bind($this->getRequest());

        if ($membershipForm->isValid()) {

            if ($currentGroup->getMembershipControl() == Group::GROUP_MEMBERSHIP_PUBLIC) {
                $entityManager->getRepository('CivixCoreBundle:UserGroup')
                    ->setApprovedAllUsersInGroup($currentGroup);
            }

            $entityManager->persist($currentGroup);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Membership control has been successfully saved');
        }

        return array(
            'membershipForm' => $membershipForm->createView(),
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        );
    }
}
