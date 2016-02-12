<?php
namespace Civix\CoreBundle\Serializer\Handler;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;

use Civix\CoreBundle\Serializer\Type\Image;

class ImageHandler implements SubscribingHandlerInterface
{
    private $serviceVich;
    private $serviceRequest;

    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'Image',
                'method' => 'serialize',
            ),
        );
    }

    public function __construct(
        \Vich\UploaderBundle\Templating\Helper\UploaderHelper $serviceVich,
        \Symfony\Component\HttpFoundation\Request $serviceRequest
    ) {
        $this->serviceVich = $serviceVich;
        $this->serviceRequest = $serviceRequest;
    }

    public function serialize(JsonSerializationVisitor $visitor, Image $image, array $type)
    {
        if ($image->isAvailable()) {
            return $image->isUrl() ? $image->getImageSrc() :
                $this->serviceVich->asset($image->getEntity(), $image->getField());
        }
    }
}
