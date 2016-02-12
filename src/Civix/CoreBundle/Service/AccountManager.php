<?php

namespace Civix\CoreBundle\Service;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Civix\CoreBundle\Entity\Group;

class AccountManager
{
    const ACCOUNT_TYPE_STATE = 'state';
    const ACCOUNT_TYPE_LOCAL = 'local';
    
    protected $entityManager;
    protected $securityContext;
    protected $session;
    protected $eventDispatcher;
    protected $serviceRequest;

    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        \Symfony\Component\Security\Core\SecurityContext $securityContext,
        \Symfony\Component\HttpFoundation\Session\Session $session,
        \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher $eventDispatcher,
        \Symfony\Component\HttpFoundation\Request $serviceRequest
    ) {
        $this->entityManager = $entityManager;
        $this->securityContext = $securityContext;
        $this->session = $session;
        $this->eventDispatcher = $eventDispatcher;
        $this->serviceRequest = $serviceRequest;
    }

    public function swithToGroup()
    {
        $swithGroup = $this->getEntityToSwitch($this->session->get('groupid_to_switch'));

        if ($swithGroup) {
            //create token instance
            //2nd argument is password, but empty string is accepted
            //3rd argument is "firewall" name
            $token = new UsernamePasswordToken(
                $swithGroup,
                null,
                'group_security_area',
                $swithGroup->getRoles()
            );

            //set token instance to security context
            $this->securityContext->setToken($token);
            $this->session->set('_security_group_security_area', serialize($token));

            //fire a login event
            $event = new InteractiveLoginEvent($this->serviceRequest, $token);
            $this->eventDispatcher->dispatch('security.interactive_login', $event);
                
            return $token;
        }
 
        return false;
    }

    public function isLocalSwitch()
    {
        $representativeFromSession = $this->session->get('switch_representative');
        if (!empty($representativeFromSession)) {
            return true;
        }

        return false;
    }

    private function getEntityToSwitch($id)
    {
        if ($this->isLocalSwitch()) {
            return  $this->entityManager->getRepository('CivixCoreBundle:Group')
                ->getLocalGroupForRepr($id, $this->session->get('switch_representative'));
        } else {
            return $this->entityManager->getRepository('CivixCoreBundle:Group')
                ->getGroupByIdAndType($id, [Group::GROUP_TYPE_STATE, Group::GROUP_TYPE_COUNTRY]);
        }
    }
}
