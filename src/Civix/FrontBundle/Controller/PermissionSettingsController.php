<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\FrontBundle\Form\Type\Settings\Permissions;

class PermissionSettingsController extends Controller
{
    /**
     * @Route("/")
     * @Template("CivixFrontBundle:PermissionSettings:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $permissionForm = $this->createForm(new Permissions(), $user);
        $oldGroup = clone $user;
        
        if ('POST' === $request->getMethod() && $permissionForm->submit($request)->isValid()) {
            $shouldNotify = $this->get('civix_core.group_manager')->isMorePermissions($oldGroup, $user);
            $user->setPermissionsChangedAt(new \DateTime());
            $entityManager->persist($user);
            $entityManager->flush($user);
            if ($shouldNotify) {
                $this->get('civix_core.social_activity_manager')->noticeGroupsPermissionsChanged($user);
            }
        }

        return [
            'form' => $permissionForm->createView()
        ];
    }
}
