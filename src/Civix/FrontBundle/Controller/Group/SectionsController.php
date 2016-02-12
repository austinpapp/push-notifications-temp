<?php

namespace Civix\FrontBundle\Controller\Group;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\FrontBundle\Form\Type\Group\Section as SectionFormType;
use Civix\CoreBundle\Entity\GroupSection;
use Civix\CoreBundle\Entity\User;

/**
 * @Route("/sections")
 */
class SectionsController extends Controller
{
    /**
     * @Route("/", name="civix_front_group_sections_index")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        $sections = $this->getDoctrine()->getRepository('CivixCoreBundle:GroupSection')->findByGroup($this->getUser());

        return array(
            'sections' => $sections,
        );
    }

    /**
     * @Route("/new", name="civix_front_group_sections_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        $sections = $this->getDoctrine()->getRepository('CivixCoreBundle:GroupSection')->findBy(array(
            'group' => $this->getUser()
        ));

        if (count($sections) > 4) {
            throw new AccessDeniedHttpException();
        }

        $form = $this->createForm(new SectionFormType, new GroupSection());

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                /* @var $section \Civix\CoreBundle\Entity\GroupSection */
                $section = $form->getData();
                $section->setGroup($this->getUser());
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($section);
                $manager->flush();

                return $this->redirect($this->generateUrl('civix_front_group_sections_view', array(
                    'id' => $section->getId()
                )));
            }
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/edit/{id}", name="civix_front_group_sections_edit", requirements={"id"="\d+"})
     * @Template()
     */
    public function editAction(Request $request, GroupSection $section)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        if ($section->getGroup() !== $this->getUser()) {
            throw $this->createNotFoundException();
        }

        $form = $this->createForm(new SectionFormType, $section);

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $section->setGroup($this->getUser());
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($section);
                $manager->flush();

                return $this->redirect($this->generateUrl('civix_front_group_sections_view', array(
                    'id' => $section->getId()
                )));
            }
        }

        return array(
            'form' => $form->createView(),
            'section' => $section,
            'token' => $this->getToken()
        );
    }

    /**
     * @Route("/view/{id}", name="civix_front_group_sections_view", requirements={"id"="\d+"})
     * @Template()
     */
    public function viewAction(Request $request, GroupSection $section)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        if ($section->getGroup() !== $this->getUser()) {
            throw $this->createNotFoundException();
        }

        $query = $this->getDoctrine()->getRepository('CivixCoreBundle:GroupSection')
            ->getUnassignedUsersQueryByGroup($section);

        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query,
            $request->get('page_ua', 1),
            10,
            array(
                'pageParameterName' => 'page_ua',
                'sortDirectionParameterName' => 'dir_ua',
                'sortFieldParameterName' => 'sort_ua',
            )
        );

        return array(
            'section' => $section,
            'token' => $this->getToken(),
            'pagination' => $pagination
        );
    }

    /**
     * @Route("/assign/{id}/{user_id}", name="civix_front_group_sections_assign")
     * @ParamConverter("section", class="CivixCoreBundle:GroupSection", options={"id" = "id"})
     * @ParamConverter("user", class="CivixCoreBundle:User", options={"id" = "user_id"})
     */
    public function assignAction(Request $request, GroupSection $section, User $user)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        if ($section->getGroup() !== $this->getUser() || $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }

        $manager = $this->getDoctrine()->getManager();
        $section->addUser($user);
        $manager->flush();

        return $this->redirect($this->generateUrl('civix_front_group_sections_view', array(
            'id' => $section->getId()
        )));
    }

    /**
     * @Route("/remove-user/{id}/{user_id}", name="civix_front_group_sections_remove_user")
     * @ParamConverter("section", class="CivixCoreBundle:GroupSection", options={"id" = "id"})
     * @ParamConverter("user", class="CivixCoreBundle:User", options={"id" = "user_id"})
     */
    public function removeUserAction(Request $request, GroupSection $section, User $user)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        if ($section->getGroup() !== $this->getUser() || $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }

        $manager = $this->getDoctrine()->getManager();
        $section->getUsers()->removeElement($user);
        $manager->flush();

        return $this->redirect($this->generateUrl('civix_front_group_sections_view', array(
            'id' => $section->getId()
        )));
    }

    /**
     * @Route("/delete/{id}", name="civix_front_group_sections_delete", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, GroupSection $section)
    {
        if (!$this->checkSubscriptionPackage()) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Group sections are not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_group_subscription_index'));
        }
        if ($section->getGroup() !== $this->getUser() || $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($section);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Group section has been successfully removed');

        return $this->redirect($this->generateUrl('civix_front_group_sections_index'));
    }

    /**
     * @return string
     */
    private function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('groups');
    }

    private function checkSubscriptionPackage()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }
}
