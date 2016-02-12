<?php

namespace Civix\CoreBundle\Service;

class QueueTask
{
    protected $rabbitMQ;
    protected $logger;
    
    public function __construct($rabbitMq, \Symfony\Bridge\Monolog\Logger $logger)
    {
        $this->rabbitMQ = $rabbitMq;
	$this->logger = $logger;
    }
    
    public function addToQueue($class, $method, $params)
    {
	$this->logger->debug("Trying to add to queueu!!!!!");
	$this->logger->debug($class . " " . $method);
        $message = array(
            'class' => $class,
            'method' => $method,
            'params' => $params
        );

        $this->addMessageToQueue($message);
    }

    public function addMessageToQueue($message)
    {
        $this->rabbitMQ->publish(serialize($message));
    }
}
