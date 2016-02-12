<?php

namespace Civix\CoreBundle\Model\User;

use Symfony\Component\HttpFoundation\Request;

interface UserCreatorInterface
{
     public function create(Request $request);
     public function getValidationGroups();
}
