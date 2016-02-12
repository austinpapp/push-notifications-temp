<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\UserGroup;

/**
 * @Route("/groups")
 */
class PermissionController extends BaseController
{
    /**
     * @Route("/{id}/permissions", requirements={"id"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function permissionsAction(Group $group, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userGroup = $entityManager->getRepository(UserGroup::class)
            ->findOneBy(['user' => $this->getUser(), 'group' => $group]);
        if (!$userGroup) {
            throw $this->createNotFoundException();
        }
        
        if ('POST' === $request->getMethod()) {
            $model = $this->jmsDeserialization($request->getContent(), UserGroup::class, ['api-permissions']);
            
            $userGroup->setPermissionsName($model->getPermissionsName());
            $userGroup->setPermissionsAddress($model->getPermissionsAddress());
            $userGroup->setPermissionsEmail($model->getPermissionsEmail());
            $userGroup->setPermissionsPhone($model->getPermissionsPhone());
            $userGroup->setPermissionsResponses($model->getPermissionsResponses());
            $userGroup->setPermissionsApprovedAt(new \DateTime());
            
            $entityManager->persist($userGroup);
            $entityManager->flush($userGroup);
        }
        
        return $this->createJSONResponse($this->jmsSerialization($userGroup, ['api-info','api-permissions']));
    }
}
