<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Civix\CoreBundle\Entity\Group;

class AccountController extends Controller
{
    /**
     * @Route("/switch", name="civix_account_switch")
     */
    public function switchAction()
    {
        $accountManager = $this->get('civix_core.account_manager');

        if ($this->get('session')->get('groupid_to_switch')) {
            if ($accountManager->swithToGroup()) {
                //redirect to group index
                return $this->redirect($this->generateUrl('civix_front_group_index'));
            }
        }

        //fallback
        return $this->redirect($this->generateUrl('civix_front_superuser_state_groups'));
    }

    /**
     * @Route("/exit-switch", name="civix_account_exit_switch")
     */
    public function exitSwitchAction()
    {
        $backUrl = 'civix_front_superuser_state_groups';
        
        if ($this->get('civix_core.account_manager')->isLocalSwitch()) {
            $backUrl = 'civix_front_representative';
        }

        //unset "groupid_to_switch" in session to avoid conflicts
        $this->get('session')->set('groupid_to_switch', null);
        $this->get('session')->set('switch_representative', null);

        //logout as user
        $this->get('security.context')->setToken(null);

        //going back to admin context...
        return $this->redirect($this->generateUrl($backUrl));
    }
}
