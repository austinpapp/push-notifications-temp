<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Service\API\ServiceApi;

class FacebookApi extends ServiceApi
{
    const FACEBOOK_URL_GRAPH = 'https://graph.facebook.com/';

    public function getFacebookId($accessToken)
    {
        $userInfo = $this->getResponse(
            self::FACEBOOK_URL_GRAPH . 'me',
            array('access_token' => $accessToken)
        );

        return isset($userInfo->id) ? $userInfo->id : null;
    }

    public function checkFacebookToken($token, $userFacebookId)
    {
        $facebookId = $this->getFacebookId($token);
        if (!empty($facebookId) && $facebookId == $userFacebookId) {
            return true;
        }

        return false;
    }
}
