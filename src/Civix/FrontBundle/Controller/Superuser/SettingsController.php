<?php

namespace Civix\FrontBundle\Controller\Superuser;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Civix\CoreBundle\Entity\State;
use Civix\FrontBundle\Form\Type\Superuser\SettingsType;
use Civix\FrontBundle\Form\Model\CoreSettings;

/**
 * @Route("/settings")
 */
class SettingsController extends Controller
{
    /**
     * @Route("/states", name="civix_front_superuser_settings_states")
     * @Method({"GET", "POST"})
     * @Template("CivixFrontBundle:Superuser:statesSettings.html.twig")
     */
    public function statesListAction(Request $request)
    {
        $settingsForm = $this->createForm(new SettingsType(), new CoreSettings($this->get('civix_core.settings')));
        $query =  $this->getDoctrine()
            ->getRepository('CivixCoreBundle:State')
            ->getStatesWithSTRepresentative();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            60
        );

        if ('POST' === $request->getMethod()) {
            if ($settingsForm->submit($request)->isValid()) {
                $settingsForm->getData()->save();
                $this->get('session')->getFlashBag()->add('notice', 'The settings have been updated.');
                return $this->redirect($this->generateUrl('civix_front_superuser_settings_states'));
            }
        }

        return [
            'pagination' => $pagination,
            'settingsForm' => $settingsForm->createView(),
        ];
    }
    
    /**
     * @Route("/states/{state}", name="civix_front_superuser_settings_states_update")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Superuser:statesSettings.html.twig")
     */
    public function statesUpdateAction(State $state)
    {
        $csrfProvider = $this->get('form.csrf_provider');
        
        if ($csrfProvider->isCsrfTokenValid(
            'state_repr_update_' . $state->getCode(), $this->getRequest()->get('_token')
        )) {
            $this->get('civix_core.queue_task')
                ->addToQueue(
                    'Civix\CoreBundle\Service\Representative\RepresentativeSTManager',
                    'synchronizeByStateCode',
                    array($state->getCode())
                );
            $this->get('session')->getFlashBag()->add('notice', 'The representatives of the State will be updated.');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'State is not found');
        }

        return $this->redirect($this->generateUrl('civix_front_superuser_settings_states'));
    }
}
