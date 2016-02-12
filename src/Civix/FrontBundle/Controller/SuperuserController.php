<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use Civix\FrontBundle\Form\Type\Superuser\RepresentativeEdit;
use Civix\FrontBundle\Form\Type\Poll\QuestionLimit;
use Civix\CoreBundle\Entity\QuestionLimit as DefaultQuestionLimit;

/**
 * Superuser controller
 *
 */
class SuperuserController extends Controller
{
    /**
     * @Route("/", name="civix_front_superuser")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        if (true === $this->get('security.context')->isGranted('ROLE_SUPERUSER')) {
            return $this->redirect($this->generateUrl('civix_front_superuser_approvals'));
        }

        return array();
    }

    /**
     * @Route("/approvals", name="civix_front_superuser_approvals")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:approvals.html.twig")
     */
    public function approvalsAction()
    {
        $queryList =  $this->getDoctrine()
                ->getRepository('CivixCoreBundle:Representative')
                ->getQueryRepresentativeByStatus(Representative::STATUS_PENDING);

        $pagination = $this->get('knp_paginator')->paginate(
            $queryList,
            $this->get('request')->query->get('page', 1),
            20
        );

        return compact('pagination');
    }

    /**
     * @Route("/representative/edit/{id}", name="civix_front_superuser_representative_edit")
     * @Method({"GET", "POST"})
     * @Template("CivixFrontBundle:Superuser:form.html.twig")
     */
    public function editRepresentativeAction($id)
    {
        $representativeObj = $this->getDoctrine()
               ->getRepository('CivixCoreBundle:Representative')->find($id);

        if ($representativeObj) {
            $form =  $this->createForm(new RepresentativeEdit(), $representativeObj);
            $request = $this->getRequest();

            if ($request->getMethod() == 'POST') {
                $form->bind($request);
                if ($form->isValid()) {
                    $representativeObj = $form->getData();

                    // save user
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($representativeObj);
                    $entityManager->flush();

                    $this->get('session')->getFlashBag()->add('notice', 'Representative was saved');
                }
            }
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Representative is not found');

            return $this->redirect($this->generateUrl('civix_front_superuser_approvals'));
        }

        return array(
            'form' => $form->createView(),
            'form_title' => 'Edit representative',
            'form_link' => $this->generateUrl('civix_front_superuser_representative_edit', array('id'=> $id)),
            'back_link' => $this->generateUrl('civix_front_superuser_approvals')
        );
    }

    /**
     * @Route("/representative/delete/{id}", name="civix_front_superuser_representative_delete")
     * @Method({"POST"})
     */
    public function deleteRepresentativeAction($id)
    {
        $representativeObj = $this->getDoctrine()
              ->getRepository('CivixCoreBundle:Representative')->find($id);

        if (!$representativeObj) {
            $this->get('session')->getFlashBag()->add('error', 'Representative is not found');
        }
        
        $csrfProvider = $this->get('form.csrf_provider');
        
        if ($csrfProvider->isCsrfTokenValid(
            'representative_delete_' . $representativeObj->getId(), $this->getRequest()->get('_token')
        )) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($representativeObj);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Representative was removed');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Representative is not found');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_approvals'));
    }

    /**
     * @Route("/representative/approve/{id}", name="civix_front_superuser_representative_approve")
     * @Method({"POST"})
     */
    public function approveRepresentativeAction($id)
    {
        /** @var $representative Representative */
        $representative = $this->getDoctrine()
            ->getRepository('CivixCoreBundle:Representative')->find($id);

        if (!$representative) {
            $this->get('session')->getFlashBag()->add('error', 'Representative is not found');
        }
        
        $csrfProvider = $this->get('form.csrf_provider');
        
        if ($csrfProvider->isCsrfTokenValid(
            'representative_approve_' . $representative->getId(), $this->getRequest()->get('_token')
        )) {
            $representativeManager = $this->get('civix_core.representative_manager');
            $newUsername = $representativeManager->generateRepresentativeUsername($representative);
            $newPassword = $representativeManager->generateRepresentativePassword($representative);

            //approve representative
            if (!$representativeManager->approveRepresentative($representative)) {
                $this->get('session')->getFlashBag()->add('error',
                    'Representative\'s address is not found in Cicero API'
                );

                return $this->redirect($this->generateUrl('civix_front_superuser_approvals'));
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($representative);
            $entityManager->flush();

            //send notification
            $this->get('civix_core.email_sender')
                ->sendToApprovedRepresentative($representative, $newUsername, $newPassword);
            
            $this->get('session')->getFlashBag()->add('notice', 'Representative was approved');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Representative is not found');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_approvals'));
    }

    /**
     * @Route("/login", name="civix_front_superuser_login")
     * @Method({"GET"})
     */
    public function loginAction()
    {
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('superuser_authentication');

        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
            $this->get('request')->getSession()->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('CivixFrontBundle:Superuser:login.html.twig', array(
                'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
                'error' => $error,
                'csrf_token' => $csrfToken
            ));
    }

    /**
     * @Route("/manage/representatives", name="civix_front_superuser_manage_representatives")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageRepresentatives.html.twig")
     */
    public function manageRepresentativesAction()
    {
        $query =  $this->getDoctrine()
            ->getRepository('CivixCoreBundle:Representative')
            ->getQueryRepresentativeOrderedById();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return array(
            'pagination' => $pagination
        );
    }

    /**
     * @Route("/manage/groups", name="civix_front_superuser_manage_groups")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageGroups.html.twig")
     */
    public function manageGroupsAction()
    {
        $query =  $this->getDoctrine()
            ->getRepository('CivixCoreBundle:Group')
            ->getQueryGroupOrderedById();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return array(
            'pagination' => $pagination
        );
    }

    /**
     * @Route("/manage/users", name="civix_front_superuser_manage_users")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageUsers.html.twig")
     */
    public function manageUsersAction()
    {
        $query =  $this->getDoctrine()
            ->getRepository('CivixCoreBundle:User')
            ->getQueryUserOrderedById();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken(),
        ];
    }

    /**
     * @Route("/manage/users/{id}/reset-password", name="civix_front_superuser_reset_user_password")
     * @Method({"GET"})
     */
    public function resetUserPasswordAction(User $user, Request $request)
    {
        if ($request->get('token') !== $this->getToken()) {
            throw new AccessDeniedException();
        }

        $resetPasswordToken = base_convert(bin2hex(hash('sha256', uniqid(mt_rand(), true), true)), 16, 36);
        $user->setResetPasswordToken($resetPasswordToken);
        $user->setResetPasswordAt(new \DateTime());
        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->flush($user);

        //send mail
        $this->get('civix_core.email_sender')->sendResetPasswordEmail(
            $user->getEmail(),
            array(
                'name' => $user->getOfficialName(),
                'link' => $this->getWebDomain() . '/#/reset-password/'. $resetPasswordToken
            )
        );

        $this->get('session')->getFlashBag()->add('notice', 'The email has been sent to ' . $user->getEmail());

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_users'));
    }

    /**
     * @Route("/manage/limits", name="civix_front_superuser_manage_limits")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:manageLimits.html.twig")
     */
    public function manageLimitsAction()
    {
        $query =  $this->getDoctrine()
            ->getRepository('CivixCoreBundle:QuestionLimit')
            ->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return array(
            'pagination' => $pagination
        );
    }
    /**
     * @Route("/representative/remove/{id}", name="civix_front_superuser_representative_remove")
     * @Method({"POST"})
     */
    public function removeRepresentativeAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $representative = $entityManager->getRepository('CivixCoreBundle:Representative')->find($id);

        if (!$representative instanceof \Civix\CoreBundle\Entity\Representative) {
            throw $this->createNotFoundException('The representative is not found');
        }

        /** @var $csrfProvider \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider */
        $csrfProvider = $this->get('form.csrf_provider');

        if ($csrfProvider->isCsrfTokenValid('remove_representative_' . $representative->getId(),
            $this->getRequest()->get('_token'))
        ) {

            $entityManager
                    ->getRepository('CivixCoreBundle:Representative')
                    ->removeRepresentative($representative);

            $this->get('session')->getFlashBag()->add('notice', 'Representative was removed');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_representatives'));

    }

    /**
     * @Route("/limits/edit/{id}", name="civix_front_superuser_limit_edit")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:defaultLimitEdit.html.twig")
     */
    public function defaultLimitEditAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var $questionLimit QuestionLimit */
        $questionLimit = $entityManager->getRepository('CivixCoreBundle:QuestionLimit')->find($id);

        if (!$questionLimit instanceof DefaultQuestionLimit) {
            throw $this->createNotFoundException('The default question limit is not found');
        }

        $questionLimitForm = $this->createForm(new QuestionLimit(), $questionLimit);

        return array(
            'questionLimitForm' => $questionLimitForm->createView()
        );
    }

    /**
     * @Route("/limits/save/{id}", name="civix_front_superuser_limit_save")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Superuser:defaultLimitEdit.html.twig")
     */
    public function defaultLimitSaveAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
         /** @var $questionLimit QuestionLimit */
        $questionLimit = $entityManager->getRepository('CivixCoreBundle:QuestionLimit')->find($id);

        if (!$questionLimit instanceof DefaultQuestionLimit) {
            throw $this->createNotFoundException('The default question limit is not found');
        }

        $questionLimitForm = $this->createForm(new QuestionLimit(), $questionLimit);

        $questionLimitForm->bind($this->getRequest());

        if ($questionLimitForm->isValid()) {

            $entityManager->persist($questionLimit);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Question\'s limit has been successfully saved');
        } else {
            return array(
                'questionLimitForm' => $questionLimitForm->createView()
             );
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_limits'));
    }

    /**
     * @Route("/representative/limits/{id}", name="civix_front_superuser_representative_limits")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Superuser:limitQuestionEdit.html.twig")
     */
    public function limitsRepresentativeAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var $representative Representative */
        $representative= $entityManager->getRepository('CivixCoreBundle:Representative')->find($id);

        if (!$representative instanceof Representative) {
            throw $this->createNotFoundException('The representative is not found');
        }

        $questionLimitForm = $this->createForm(new QuestionLimit(), $representative);

        return array(
            'questionLimitForm' => $questionLimitForm->createView(),
            'updatePath' => 'civix_front_superuser_representative_limits_update'
        );
    }

    /**
     * @Route("/representative/limits/{id}/save", name="civix_front_superuser_representative_limits_update")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Superuser:limitQuestionEdit.html.twig")
     */
    public function limitsRepresentativeEditAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var $representative Representative */
        $representative= $entityManager->getRepository('CivixCoreBundle:Representative')->find($id);

        if (!$representative instanceof Representative) {
            throw $this->createNotFoundException('The representative is not found');
        }

        $questionLimitForm = $this->createForm(new QuestionLimit(), $representative);

        $questionLimitForm->bind($this->getRequest());

        if ($questionLimitForm->isValid()) {

            $entityManager->persist($representative);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Question\'s limit has been successfully saved');
        } else {
            return array(
                'questionLimitForm' => $questionLimitForm->createView(),
                'updatePath' => 'civix_front_superuser_representative_limits_update'
                );
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_representatives'));
    }

    /**
     * @Route("/user/remove/{id}", name="civix_front_superuser_user_remove")
     * @Method({"POST"})
     */
    public function removeUserAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository('CivixCoreBundle:User')->find($id);

        if (!$user instanceof \Civix\CoreBundle\Entity\User) {
            throw $this->createNotFoundException('The user is not found');
        }

        /** @var $csrfProvider \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider */
        $csrfProvider = $this->get('form.csrf_provider');

        if ($csrfProvider->isCsrfTokenValid('remove_user_' . $user->getId(), $this->getRequest()->get('_token'))) {

            $entityManager
                    ->getRepository('CivixCoreBundle:User')
                    ->removeUser($user);

            $this->get('session')->getFlashBag()->add('notice', 'User was removed');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_manage_users'));
    }

    /**
     * @return string
     */
    private function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('superuser');
    }

    private function getWebDomain()
    {
        $request = $this->getRequest();
        $host = $request->getHttpHost();

        return $request->getScheme() . '://' .  str_replace('admin.', '', $host);
    }
}
