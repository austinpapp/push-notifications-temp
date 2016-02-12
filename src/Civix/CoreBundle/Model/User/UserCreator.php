<?php

namespace Civix\CoreBundle\Model\User;

use Symfony\Component\HttpFoundation\Request;

class UserCreator
{
    public static function createUserFromRequest(Request $request)
    {
        $facebookId = $request->get('facebook_id');
        $facebookToken = $request->get('facebook_token');

        if (isset($facebookId) && isset($facebookToken)) {
            return new FacebookUserCreator();
        }

        return new DefaultUserCreator();
    }
}
