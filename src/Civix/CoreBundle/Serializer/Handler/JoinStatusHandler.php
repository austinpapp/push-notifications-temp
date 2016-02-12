<?php

namespace Civix\CoreBundle\Serializer\Handler;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Civix\CoreBundle\Serializer\Type\JoinStatus;

class JoinStatusHandler implements SubscribingHandlerInterface
{

    private $user;

    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'JoinStatus',
                'method' => 'serialize',
            ),
        );
    }

    public function __construct(SecurityContextInterface $security)
    {
        $this->user = $security->getToken()->getUser();
    }

    public function serialize(JsonSerializationVisitor $visitor, JoinStatus $joinStatusType)
    {
        return $joinStatusType->getEntity()->getJoined($this->user);
    }
}
