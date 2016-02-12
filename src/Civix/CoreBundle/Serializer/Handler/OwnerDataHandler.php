<?php

namespace Civix\CoreBundle\Serializer\Handler;

use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\JsonDeserializationVisitor;
use Civix\CoreBundle\Serializer\Type\OwnerData;

class OwnerDataHandler implements SubscribingHandlerInterface
{
    /**
     * @var UploaderHelper
     */
    private $uh;

    /**
     * @var Request
     */
    private $request;

    public function __construct(UploaderHelper $uh, Request $request)
    {
        $this->uh = $uh;
        $this->request = $request;
    }

    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'OwnerData',
                'method' => 'serialize',
            ),
        );
    }

    public function serialize(JsonSerializationVisitor $visitor, OwnerData $owner, array $type)
    {
        $scheme = $this->request->getScheme() . '://' . $this->request->getHttpHost();

        $data = $owner->getData();

        if ($owner->getAvatarFileName()) {
            $data['avatar_file_path'] = $this->uh->asset($owner, 'avatar');
        } else {
            $data['avatar_file_path'] = $scheme . $owner->getDefaultAvatar();
        }

        return $data;
    }
}