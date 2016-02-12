<?php

namespace Civix\CoreBundle\Service\RabbitMQCallback;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Civix\CoreBundle\Service\PushSender;

class PushTest implements ConsumerInterface
{
    private $executorsArray;
    private $logger;

    public function __construct(PushSender $pushSender, \Symfony\Bridge\Monolog\Logger $logger)
    {
        $this->executorsArray = array();
        $this->executorsArray[] = $pushSender;
	$this->logger = $logger;
    }

    public function execute(AMQPMessage $msg)
    {
	$executeParams = unserialize($msg->body);

        foreach ($this->executorsArray as $executorObj) {
            if (method_exists($executorObj, $executeParams['method'])) {
                call_user_func_array(
                    array($executorObj, $executeParams['method']),
                    $executeParams['params']
                );
            }
        }
	
    }
}
