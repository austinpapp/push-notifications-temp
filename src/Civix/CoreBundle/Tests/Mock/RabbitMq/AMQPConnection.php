<?php

namespace Civix\CoreBundle\Tests\Mock\RabbitMq;

use PhpAmqpLib\Connection\AMQPConnection as Connection;

class AMQPConnection extends Connection
{
    public function __construct()
    {

    }
}
