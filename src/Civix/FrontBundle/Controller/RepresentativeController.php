<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\FrontBundle\Form\Type\Representative\Registration;
use Civix\FrontBundle\Form\Type\Representative\Profile;
use Civix\FrontBundle\Form\Type\Representative\Avatar;
use Civix\FrontBundle\Form\Type\Poll\Question as QuestionType;
use Civix\FrontBundle\Form\Model\Question as QuestionModel;
use Civix\FrontBundle\Form\Type\CropImage;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Poll\Question\Representative as Question;
use Civix\CoreBundle\Entity\Activity;

/**
 * Representative controller
 */
class RepresentativeController extends Controller
{
    /**
     * @Route("/", name="civix_front_representative")
     * @Route("/")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/registration", name="civix_front_representative_registration")
     * @Method({"GET", "POST"})
     */
    public function registrationAction()
    {
        $representative = new Representative();
        $form = $this->createForm(new Registration(), $representative);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $representative = $form->getData();

                // save user
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($representative);
                $entityManager->flush();

                $superuserList = $this->getDoctrine()->getRepository('CivixCoreBundle:Superuser')->findAll();
                $superuserEmailList = array_map(function ($superuser) {
                    return $superuser->getEmail();
                }, $superuserList);

                //send notification
                $this->get('civix_core.email_sender')
                    ->sendNewRepresentativeNotification($superuserEmailList, $representative->getOfficialTitle());

                return $this->render('CivixFrontBundle:Representative:thanks.html.twig',
                    array('name' => $representative->getOfficialTitle())
                );
            }
        }

        return $this->render('CivixFrontBundle:Representative:registration.html.twig',
            array('form'=>$form->createView())
        );
    }

    /**
     * @Route("/login", name="civix_front_representative_login")
     * @Method({"GET"})
     */
    public function loginAction()
    {
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('representative_authentication');

        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
            $this->get('request')->getSession()->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('CivixFrontBundle:Representative:login.html.twig', array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * @Route("/edit-profile", name="civix_front_representative_edit_profile")
     * @Method({"GET"})
     * @Template()
     */
    public function editProfileAction()
    {
        $representative = $this->getUser();
        $avatarForm = $this->createForm(new Avatar(), $representative);
        $profileForm = $this->createForm(new Profile(), $representative);

        return array(
            'avatarForm'  => $avatarForm->createView(),
            'profileForm' => $profileForm->createView()
        );
    }

    /**
     * @Route("/update-profile", name="civix_front_representative_update_profile")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Representative:editProfile.html.twig")
     */
    public function updateProfileAction()
    {
        $representative = $this->getUser();
        $form = $this->createForm(new Profile(), $representative);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            /** @var $entityManager \Doctrine\ORM\EntityManager */
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($representative);
            $entityManager->flush();
            $this->get('civix_core.customer_manager')->updateCustomer($representative);

            $this->get('session')->getFlashBag()->add('notice', 'Changes have been successfully saved');
        }

        return array(
            'avatarForm' => $this->createForm(new Avatar(), $representative)->createView(),
            'profileForm' => $form->createView()
        );
    }

    /**
     * @Route("/crop-avatar", name="civix_front_representative_crop_avatar")
     * @Method({"POST"})
     */
    public function cropAvatarAction()
    {
        /** @var $representative Representative */
        $representative = $this->getUser();
        $avatarForm = $this->createForm(new Avatar(), $representative);
        $avatarForm->bind($this->getRequest());

        if ($avatarForm->isValid()) {
            $cropImageForm = $this->createForm(new CropImage());
            $representative->setAvatar($representative->getAvatarSource());
            $this->get('vich_uploader.storage')->upload($representative);

            /** @var $entityManager \Doctrine\ORM\EntityManager */
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($representative);
            $entityManager->flush();

            return $this->render('CivixFrontBundle:Representative:cropAvatar.html.twig', array(
                'avatarForm' => $avatarForm->createView(),
                'cropImageForm' => $cropImageForm->createView()
            ));
        } else {
            $profileForm = $this->createForm(new Profile(), $representative);

            return $this->render('CivixFrontBundle:Representative:editProfile.html.twig', array(
                'avatarForm' => $avatarForm->createView(),
                'profileForm' => $profileForm->createView()
            ));
        }
    }

    /**
     * @Route("/update-avatar", name="civix_front_representative_update_avatar")
     * @Method({"POST"})
     */
    public function updateAvatarAction()
    {
        /** @var $representative Representative */
        $representative = $this->getUser();
        $cropImageForm = $this->createForm(new CropImage());
        $cropImageForm->bind($this->getRequest());
        $cropData = $cropImageForm->getData();

        $this->get('civix_core.crop_avatar')
            ->crop($representative, $cropData['x'], $cropData['y'], $cropData['w'], $cropData['h']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($representative);
        $entityManager->flush();
        
        $this->get('session')->getFlashBag()->add('notice', 'Avatar have been successfully saved');

        return $this->redirect($this->generateUrl('civix_front_representative_edit_profile'));
    }

    /**
     * @Route("/incoming-answers", name="civix_front_representative_incoming_answers")
     * @Method({"GET"})
     * @Template()
     */
    public function incomingAnswersAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->getRepository('CivixCoreBundle:Poll\Question')
                ->getIncomingAnswersByRepr($this->getUser());

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
     * @Route("/incoming-answers/{id}", name="civix_front_representative_incoming_answers_details")
     * @Method({"GET"})
     * @Template()
     */
    public function incomingAnswersDetailsAction($id)
    {
        return $this->getQuestionDetails($id);
    }

     /**
     * @Route("/municipal", name="civix_front_representative_municipal")
     * @Method({"GET"})
     * @Template()
     */
    public function municipalAction()
    {
         $this->get('session')->set('groupid_to_switch', $this->getUser()->getLocalGroup()->getId());
         $this->get('session')->set('switch_representative', $this->getUser()->getId());

         return $this->redirect($this->generateUrl('civix_account_switch'));
    }

    private function getQuestionDetails($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $question = $entityManager->getRepository('CivixCoreBundle:Poll\Question')->getQuestionWithAnswers($id);
        if (!$question) {
            throw $this->createNotFoundException();
        }

        $statistics = $question->getStatistic(array('#7ac768', '#ba3830', '#4fb0f3', '#dbfa08', '#08fac4'));

        $query = $entityManager->getRepository('CivixCoreBundle:Poll\Answer')->getAnswersByQuestion($id);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return array(
            'statistics' => $statistics,
            'pagination' => $pagination
        );
    }
}
