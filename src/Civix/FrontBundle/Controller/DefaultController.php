<?php

namespace Civix\FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Controller for index page
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="civix_front_homepage")
     * @Route("/help", name="civix_front_help")
     *
     * @return Response A Response instance
     */
    public function indexAction()
    {
        return $this->render('CivixFrontBundle:Default:index.html.twig');
    }

    /**
     * @Template("CivixFrontBundle:Default:header.html.twig")
     */
    public function headerAction()
    {
        $logoutPath = null;

        if ($this->get('session')->get('groupid_to_switch')) {
            if ($this->get('session')->get('switch_representative')) {
                $logoutPath = ['Back to the Representative', $this->generateUrl('civix_account_exit_switch')];
            } else {
                $logoutPath = ['Back to the Superuser', $this->generateUrl('civix_account_exit_switch')];
            }
        }

        return [
            'paths' => [
                'profile' => [
                    'group' => 'civix_front_group_edit_profile',
                    'representative' => 'civix_front_representative_edit_profile',
                    'superuser' => 'civix_front_superuser',
                ],
                'settings' => [
                    'group' => 'civix_front_group_membership',
                    'representative' => 'civix_front_representative_paymentsettings_index',
                    'superuser' => 'civix_front_superuser_settings_states',
                ]
            ],
            'logoutPath' => $logoutPath
        ];
    }
}
