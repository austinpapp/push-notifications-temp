<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Service\QueueTask;

class PushTask extends QueueTask
{
    public function addToQueue($method, $params, $class = 'Civix\CoreBundle\Service\PushSender')
    {
        parent::addToQueue($class, $method, $params);
    }
}
