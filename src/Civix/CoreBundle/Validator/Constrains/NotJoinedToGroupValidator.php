<?php

namespace Civix\CoreBundle\Validator\Constrains;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;

/**
 * @Annotation
 */
class NotJoinedToGroupValidator extends ConstraintValidator
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function validate($entity, Constraint $constraint)
    {
        $user = $entity->{$constraint->userGetter}();
        $group = $entity->{$constraint->groupGetter}();

        if ($this->em->getRepository('CivixCoreBundle:UserGroup')->isJoinedUser($group, $user)) {
            $this->context->addViolationAt('user', $constraint->message, [], null);
        }
    }
}