<?php

namespace Civix\CoreBundle\Service\RabbitMQCallback;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use RMS\PushNotificationsBundle\Message\MessageInterface;
use RMS\PushNotificationsBundle\Service\Notifications;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class Push implements ConsumerInterface
{
    private $pushSender;
    private $logger;

    public function __construct(Notifications $pushSender, LoggerInterface $logger)
    {
        $this->pushSender = $pushSender;
        $this->logger = $logger;
    }

    public function execute(AMQPMessage $msg)
    {
        $message = unserialize($msg->body);
        if ($message instanceof MessageInterface) {
            if ($this->pushSender->send($message) === false) {
                $this->logger
                    ->addError('Push notification hasn\'t been sent. DeviceID = '
                        . $message->getDeviceIdentifier());

            }
            if ('rms_push_notifications.os.ios' === $message->getTargetOS()) {
                usleep(700000);
            }
        }
    }
}
