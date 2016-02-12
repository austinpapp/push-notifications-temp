<?php

namespace Civix\FrontBundle\Controller;

use Civix\CoreBundle\Entity\Poll\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\FrontBundle\Form\Model\PaymentRequest as PaymentRequestFormModel;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Poll\Option;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Customer\Order\PaymentRequestOrder;
use Civix\BalancedBundle\Entity\PaymentHistory;
use Civix\FrontBundle\Form\Type\Order\PRPayoutType;
use Civix\CoreBundle\Entity\Stripe\Charge;
use Civix\CoreBundle\Entity\Stripe\Card;

abstract class PaymentRequestController extends Controller
{
    abstract public function getPaymentRequestFormClass();

    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:PaymentRequest:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        /* @var $repository \Civix\CoreBundle\Repository\Poll\PaymentRequestRepository */
        $repository = $this->getDoctrine()->getRepository($this->getClassName());

        $query = $repository->getPublishedPaymentRequestsQuery($this->getUser());

        $paginator = $this->get('knp_paginator');
        $paginationPublished = $paginator->paginate(
            $query,
            $request->get('page_published', 1),
            10,
            [
                'pageParameterName' => 'page_published',
                'sortDirectionParameterName' => 'dir_published',
                'sortFieldParameterName' => 'sort_published',
            ]
        );

        $query = $repository->getNewPaymentRequestsQuery($this->getUser());

        $paginationNew = $paginator->paginate(
            $query,
            $request->get('page_new', 1),
            10,
            [
                'pageParameterName' => 'page_new',
                'sortDirectionParameterName' => 'dir_new',
                'sortFieldParameterName' => 'sort_new',
            ]
        );

        return [
            'paginationPublished' => $paginationPublished,
            'paginationNew' => $paginationNew,
            'token' => $this->getToken(),
            'hasPaymentAccount' => $this->get('civix_core.stripe')->hasPayoutAccount($this->getUser())
        ];
    }

    /**
     * @Route("/follow-up/{petition}")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:PaymentRequest:follow-up.html.twig")
     */
    public function followUpAction(Petition $petition, Request $request)
    {
        /* @var $repository \Civix\CoreBundle\Repository\Poll\PaymentRequestRepository */
        $repository = $this->getDoctrine()->getRepository($this->getClassName());

        $paginator = $this->get('knp_paginator');
        $query = $repository->getNewPaymentRequestsQuery($this->getUser());

        $paginationNew = $paginator->paginate(
            $query,
            $request->get('page_new', 1),
            10,
            [
                'pageParameterName' => 'page_new',
                'sortDirectionParameterName' => 'dir_new',
                'sortFieldParameterName' => 'sort_new',
            ]
        );

        return [
            'paginationNew' => $paginationNew,
            'token' => $this->getToken(),
            'petition' => $petition,
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
        ];
    }


    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:PaymentRequest:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $class = $this->getClassName();
        $formClass = $this->getPaymentRequestFormClass();
        $paymentRequest = new $class;
        $form = $this->createForm(new $formClass($this->getUser()), new PaymentRequestFormModel($paymentRequest));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $manager = $this->getDoctrine()->getManager();

                $paymentRequest->setUser($this->getUser());

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $paymentRequest->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($paymentRequest);
                        $manager->persist($entity);
                    }
                }
                foreach ($paymentRequest->getOptions() as $option) {
                    $manager->persist($option);
                }
                $manager->persist($paymentRequest);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The payment request has been successfully saved');

                if ($request->get('petition')) {
                    return $this->redirect(
                        $this->generateUrl("civix_front_{$this->getUser()->getType()}_paymentrequest_followup", [
                            'petition' => $request->get('petition')
                        ])
                    );
                }

                return $this->redirect(
                    $this->generateUrl("civix_front_{$this->getUser()->getType()}_paymentrequest_index")
                );
            }
        }

        return [
            'form' => $form->createView(),
            'isShowGroupSection' => $this->isShowGroupSections($paymentRequest)
        ];
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @Template("CivixFrontBundle:PaymentRequest:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        $paymentRequest = $this->getPaymentRequest($id);
        if ($paymentRequest->getUser() !== $this->getUser() || $paymentRequest->getPublishedAt()) {
            throw $this->createNotFoundException();
        }
        $formClass = $this->getPaymentRequestFormClass();

        $form = $this->createForm(new $formClass($this->getUser()), new PaymentRequestFormModel($paymentRequest));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $paymentRequest->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $paymentRequest->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($paymentRequest);
                        $manager->persist($entity);
                    }
                }

                $manager->persist($paymentRequest);
                $manager->flush();
                $this->get('session')
                    ->getFlashBag()->add('notice', 'The payment request has been successfully updated');

                return $this->redirect(
                    $this->generateUrl("civix_front_{$this->getUser()->getType()}_paymentrequest_index")
                );
            }
        }

        return [
            'form' => $form->createView(),
            'paymentRequest' => $paymentRequest,
            'isShowGroupSection' => $this->isShowGroupSections($paymentRequest)
        ];
    }

    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     */
    public function publishAction(Request $request, $id)
    {
        $paymentRequest = $this->getPaymentRequest($id);
        if ($paymentRequest->getUser() !== $this->getUser() || $paymentRequest->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }

        $paymentRequest->setPublishedAt(new \DateTime());
        $ignore = new Option();
        $ignore->setPaymentAmount(0)->setValue('Ignore')->setQuestion($paymentRequest);
        $this->getDoctrine()->getManager()->persist($ignore);
        $this->getDoctrine()->getManager()->flush($paymentRequest);
        $this->getDoctrine()->getManager()->flush($ignore);

        $this->get('civix_core.activity_update')->publishPaymentRequestToActivity($paymentRequest);
        $this->get('session')->getFlashBag()->add('notice', 'The payment request has been successfully published');
        $this->getDoctrine()
            ->getRepository('CivixCoreBundle:HashTag')->addForQuestion($paymentRequest);

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_paymentrequest_index"));
    }

    /**
     * @Route("/publish/{id}/follow-up/{petition}", requirements={"id"="\d+"})
     * @Template("CivixFrontBundle:PaymentRequest:follow-up-publish.html.twig")
     */
    public function publishFollowUpAction(Request $request, $id, Petition $petition)
    {
        $paymentRequest = $this->getPaymentRequest($id);
        $package = $this->get('civix_core.subscription_manager')->getPackage($this->getUser());
        if ($paymentRequest->getUser() !== $this->getUser() || $paymentRequest->getPublishedAt()
            || !$package->isTargetedPetitionFundraisingAvailable()) {
            throw new AccessDeniedHttpException();
        }

        $users = $this->getDoctrine()->getRepository(Answer::class)->findSignedUsersByPetition($petition);
        $amount = $package->getTargetedPetitionFundraisingPrice() * count($users);
        $form = $this->createForm('form', null, ['label' => ($amount / 100) . '$']);

        if ('POST' === $request->getMethod() && $form->submit($request)->isValid()) {
            if (intval($request->get('user_count')) !== count($users)) {
                $this->get('session')->getFlashBag()->add('notice', 'Users amount has changed. Please review.');
            } else {

                try {
                    $this->get('civix_core.stripe')
                        ->chargeUser($this->getUser(), $amount, 'PowerlinePay', 'Powerline Payment:  Payment Request Publishing');
                } catch (\Stripe\Error\Card $e) {
                    $this->get('session')->getFlashBag()->add('error', $e->getJsonBody()['error']['message']);

                    return $this->redirect($this->generateUrl(
                        "civix_front_{$this->getUser()->getType()}_paymentrequest_publishfollowup", [
                        'id' => $id, 'petition' => $petition->getId()
                    ]));
                }

                $paymentRequest->setPublishedAt(new \DateTime());
                $ignore = new Option();
                $ignore->setPaymentAmount(0)->setValue('Ignore')->setQuestion($paymentRequest);
                $this->getDoctrine()->getManager()->persist($ignore);
                $this->getDoctrine()->getManager()->flush($paymentRequest);
                $this->getDoctrine()->getManager()->flush($ignore);

                $this->get('civix_core.activity_update')->publishPaymentRequestToActivity($paymentRequest, $users);

                if ($paymentRequest->getIsAllowOutsiders()) {
                    /* @var User $user */
                    foreach ($users as $user) {
                        if (!$user->getIsRegistrationComplete()) {
                            $this->get('civix_core.email_sender')->sendPaymentRequest($paymentRequest, $user);
                        }
                    }
                }

                return $this->redirect($this->generateUrl(
                    "civix_front_{$this->getUser()->getType()}_paymentrequest_index"));
            }
        }

        return [
            'paymentRequest' => $paymentRequest,
            'users' => $users,
            'petition' => $petition,
            'hasCard' => $this->get('civix_core.stripe')->hasCard($this->getUser()),
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $paymentRequest = $this->getPaymentRequest($id);
        if ($paymentRequest->getUser() !== $this->getUser() || $paymentRequest->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($paymentRequest);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'The payment request has been successfully removed');

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_paymentrequest_index"));
    }

    /**
     * @Route("/funds/{id}", requirements={"id"="\d+"})
     * @Method({"GET|POST"})
     * @Template("CivixFrontBundle:PaymentRequest:show-funds.html.twig")
     */
    public function fundsAction(Request $request, $id)
    {
        $paymentRequest = $this->getPaymentRequest($id);
        if ($paymentRequest->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        $amount = $this->getDoctrine()
            ->getRepository(Charge::class)
            ->getAmountForPaymentRequest($paymentRequest->getId());


        return ['amount' => $amount];
    }

    /**
     * @param $id
     * @return PaymentRequest
     */
    protected function getPaymentRequest($id)
    {
        $paymentRequest = $this->getDoctrine()->getRepository($this->getClassName())->find($id);
        if (!$paymentRequest) {
            throw $this->createNotFoundException();
        }

        return $paymentRequest;
    }

    protected function getClassName()
    {
        $className = ucfirst($this->getUser()->getType()) . 'PaymentRequest';

        return "Civix\\CoreBundle\\Entity\\Poll\\Question\\{$className}";
    }

    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('payment-request');
    }

    protected function isAvailableGroupSection()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }

    protected function isShowGroupSections($paymentRequest)
    {
        return ($paymentRequest instanceof GroupSectionInterface) &&
            $this->isAvailableGroupSection();
    }
}
