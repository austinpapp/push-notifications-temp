<?php

namespace Civix\FrontBundle\Controller\Group;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\Micropetitions\Petition;
use Civix\FrontBundle\Form\Type\Micropetitions\PetitionConfig;

/**
 * @Route("/micro-petitions")
 */
class MicropetitionController extends Controller
{
    /**
     * @Route("", name="civix_front_petitions")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:petition.html.twig")
     */
    public function petitionAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $petitionQuery = $entityManager->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->getClosedMicropetition($this->getUser());

        $pagination = $this->get('knp_paginator')->paginate(
            $petitionQuery,
            $this->getRequest()->get('page', 1),
            20
        );

        return array('pagination' => $pagination);
    }

    /**
     * @Route("/open", name="civix_front_petitions_open")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:openPetition.html.twig")
     */
    public function openPetitionAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $petitionQuery = $entityManager->getRepository('CivixCoreBundle:Micropetitions\Petition')
            ->getOpenMicropetition($this->getUser());

        $pagination = $this->get('knp_paginator')->paginate(
            $petitionQuery,
            $this->getRequest()->get('page', 1),
            20
        );

        return array('pagination' => $pagination);
    }

    /**
     * @Route("/boost/{id}", requirements={"id"="\d+"}, name="civix_front_petitions_boost")
     * @Method({"GET"})
     */
    public function petitionBoostAction(Petition $petition)
    {
        if ($petition->getGroup() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }
        if (!$petition->getPublishStatus()) {
            $this->get('civix_core.activity_update')->publishMicroPetitionToActivity($petition, true);
        }

        return $this->redirect($this->generateUrl('civix_front_petitions_open'));
    }

    /**
     * @Route("/details/{id}", requirements={"id"="\d+"}, name="civix_front_petitions_details")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:petitionDetails.html.twig")
     */
    public function petitionDetailsAction(Petition $petition)
    {
        if ($petition->getGroup() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        $statistics = $this->get('civix_core.poll.micropetition_manager')
            ->getStatisticByPetition($petition, array('#7ac768', '#ba3830'));

        return array(
            'petition' => $petition,
            'statistics' => $statistics
        );
    }

    /**
     * @Route("/config", name="civix_front_petitions_config")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:petitionConfig.html.twig")
     */
    public function petitionConfigAction()
    {
        $isChangeConfig = $this->isAvailableChangeConfig();
        if (!$isChangeConfig) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'MicroPetition\'s configuration is not available for this subscription');
        }
        
        $petitionConfigForm = $this->createForm(
            new PetitionConfig(),
            $this->getUser(),
            ['read_only' => !$isChangeConfig]
        );

        return [
            'petitionConfigForm' => $petitionConfigForm->createView(),
            'updatePath' => 'civix_front_petitions_config_save',
            'isChangeConfig' => $isChangeConfig
        ];
    }

    /**
     * @Route("/config", name="civix_front_petitions_config_save")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Group:petitionConfig.html.twig")
     */
    public function petitionConfigSaveAction()
    {
        $isChangeConfig = $this->isAvailableChangeConfig();
        if (!$isChangeConfig) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'MicroPetition\'s configuration is not available for this subscription');

            return $this->redirect($this->generateUrl('civix_front_petitions'));
        }
        
        $entityManager = $this->getDoctrine()->getManager();
        $currentGroup = $this->getUser();

        $petitionConfigForm = $this->createForm(new PetitionConfig(), $currentGroup, ['read_only' => !$isChangeConfig]);
        $petitionConfigForm->handleRequest($this->getRequest());

        if ($petitionConfigForm->isValid()) {

            $entityManager->persist($currentGroup);
            $entityManager->flush();

            $this->get('session')->getFlashBag()
                ->add('notice', 'Petition\'s configuration has been successfully saved');
        } else {
            return [
                'petitionConfigForm' => $petitionConfigForm->createView(),
                'updatePath' => 'civix_front_petitions_config_save',
                'isChangeConfig' => $isChangeConfig
                ];
        }

        return $this->redirect($this->generateUrl('civix_front_petitions'));
    }

    protected function isAvailableChangeConfig()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForMicropetition($this->getUser());

        return $packLimitState->isAllowed();
    }
}
