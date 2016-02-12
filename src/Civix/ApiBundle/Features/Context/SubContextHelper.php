<?php

namespace Civix\ApiBundle\Features\Context;

use Doctrine\ORM\EntityManager;
use Buzz\Message\Response;

trait SubContextHelper
{
    /**
     * @return EntityManager
     */
    protected function getEm()
    {
        return $this->getMainContext()->getEntityManager();
    }

    protected function get($key)
    {
        return $this->getMainContext()->getContainer()->get($key);
    }

    protected function getAbsoluteUrl($path)
    {
        return $this->getMainContext()->getAbsoluteUrl($path);
    }

    protected function getAuthHeader($username)
    {
        $token = $this->getMainContext()->getSubcontext('secure')
            ->generateUserToken($username);

        return ['token' => $token];
    }

    protected function getLastResponseContent()
    {
        return $this->getMainContext()->getLastResponse()->getContent();
    }

    /**
     * @return Response
     */
    protected function getLastResponse()
    {
        return $this->getMainContext()->getLastResponse();
    }
}