<?php

namespace Civix\CoreBundle\Validator\Constrains;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NotJoinedToGroup extends Constraint
{
    public $message = 'User already joined to group';
    public $userGetter;
    public $groupGetter;

    public function validatedBy()
    {
        return 'civix_core.validator.not_joined_to_group';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function getRequiredOptions()
    {
        return ['userGetter', 'groupGetter'];
    }
}