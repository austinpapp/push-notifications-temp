<?php

namespace Civix\CoreBundle\Model\User;

use Symfony\Component\HttpFoundation\Request;
use Civix\CoreBundle\Entity\User;

class DefaultUserCreator implements UserCreatorInterface
{
    protected $validationGroups;
    
    public function __construct()
    {
        $this->validationGroups = array('registration');
    }

    public function create(Request $request)
    {
        $user = new User();
        $user
            ->setUsername($request->get('username'))
            ->setFirstName($request->get('first_name'))
            ->setLastName($request->get('last_name'))
            ->setEmail($request->get('email'))
            ->setBirth($request->get('birth') ? new \DateTime($request->get('birth')) : null)
            ->setAddress1($request->get('address1'))
            ->setAddress2($request->get('address2'))
            ->setCity($request->get('city'))
            ->setState($request->get('state'))
            ->setZip($request->get('zip'))
            ->setCountry($request->get('country'))
            ->setPhone($request->get('phone'))
            ->setPassword($request->get('password'));

        return $user;
    }

    public function getValidationGroups()
    {
        return $this->validationGroups;
    }
}
