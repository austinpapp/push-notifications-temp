<?php

namespace Civix\CoreBundle\Model\User;

use Symfony\Component\HttpFoundation\Request;

class FacebookUserCreator extends DefaultUserCreator implements UserCreatorInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->validationGroups[] = 'facebook';
    }

    public function create(Request $request)
    {
        $user = parent::create($request);
        $user->setFacebookId($request->get('facebook_id'))
            ->setFacebookToken($request->get('facebook_token'))
            ->setFacebookLink($request->get('facebook_link'))
            ->setSex($request->get('sex'));

        if ($request->get('birth')) {
            $user->setBirth(new \DateTime($request->get('birth')));
        }
        
        $user->generateToken();
        $user->setPassword($user->getToken());

        return $user;
    }
}
