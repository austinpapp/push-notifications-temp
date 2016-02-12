<?php

namespace Civix\CoreBundle\Tests\Mock\Service;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Civix\CoreBundle\Service\PushTask as Base;

class PushTask extends Base
{
    private $logger;

    public function __construct($rabbitMq, $logDir)
    {
        parent::__construct($rabbitMq);

        self::clearLog($logDir, 'push_task');
        $this->logger = self::createLogger($logDir, 'push_task');
    }

    public function addToQueue($method, $params, $class = 'Civix\CoreBundle\Service\PushSender')
    {
        $this->logger->addInfo($class . '::' . $method, $params);
    }

    public static function createLogger($dir, $key)
    {
        $log = new Logger($key);
        $log->pushHandler(new StreamHandler($dir . "/{$key}.log", Logger::INFO));

        return $log;
    }

    public static function getLog($dir, $key)
    {
        return file_get_contents($dir . "/{$key}.log");
    }

    public static function clearLog($dir, $key)
    {
        @unlink($dir . "/{$key}.log");
    }
}
