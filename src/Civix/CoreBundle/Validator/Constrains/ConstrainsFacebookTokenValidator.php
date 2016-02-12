<?php

namespace Civix\CoreBundle\Validator\Constrains;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Civix\CoreBundle\Service\FacebookApi;

class ConstrainsFacebookTokenValidator extends ConstraintValidator
{
    private $facebookApi;
    
    public function __construct(FacebookApi $facebookApi)
    {
        $this->facebookApi = $facebookApi;
    }

    public function validate($token, Constraint $constraint)
    {
        if (!$this->facebookApi->getFacebookId($token)) {
            $this->context->addViolation($constraint->message);
        }
    }
}
