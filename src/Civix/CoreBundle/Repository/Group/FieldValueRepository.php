<?php

namespace Civix\CoreBundle\Repository\Group;

use Doctrine\ORM\EntityRepository;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;

class FieldValueRepository extends EntityRepository
{
    public function getFieldsValuesByUser(User $user, Group $group)
    {
        $fieldIds = $group->getFillFieldsRequired()?$group->getFieldsIds():false;

        return $this->createQueryBuilder('fv')
            ->where('fv.user = :user')
            ->andWhere('fv.field IN (:fieldsIds)')
            ->setParameter('user', $user)
            ->setParameter('fieldsIds', $fieldIds)
            ->orderBy('fv.field', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function removeUserFields(User $user, Group $group)
    {
        $fieldIds = $group->getFillFieldsRequired()?$group->getFieldsIds():false;

        return $this->getEntityManager()
          ->createQuery('DELETE FROM CivixCoreBundle:Group\FieldValue fv
                          WHERE fv.user = :user AND fv.field in (:fieldsIds)')
          ->setParameter('user', $user)
          ->setParameter('fieldsIds', $fieldIds)
          ->execute();
    }
}
