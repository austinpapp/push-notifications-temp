<?php

namespace Civix\CoreBundle\Tests\Mock\RabbitMq;

use OldSound\RabbitMqBundle\RabbitMq\Producer as BaseProducer;

class Producer extends BaseProducer
{
    public function __construct()
    {

    }

    public function publish($msgBody, $routingKey = '')
    {

    }
}
