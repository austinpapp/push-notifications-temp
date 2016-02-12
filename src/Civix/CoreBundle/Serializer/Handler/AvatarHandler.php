<?php
namespace Civix\CoreBundle\Serializer\Handler;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\JsonDeserializationVisitor;

use Civix\CoreBundle\Serializer\Type\Avatar;

class AvatarHandler implements SubscribingHandlerInterface
{
    private $serviceVich;
    private $serviceRequest;

    public static function getSubscribingMethods()
    {

    }

    public function __construct(
        \Vich\UploaderBundle\Templating\Helper\UploaderHelper $serviceVich,
        \Symfony\Component\HttpFoundation\Request $serviceRequest
    ) {
        $this->serviceVich = $serviceVich;
        $this->serviceRequest = $serviceRequest;
    }

    public function serialize(JsonSerializationVisitor $visitor, Avatar $avatar, array $type)
    {
        $scheme = $this->serviceRequest->getScheme() . '://' . $this->serviceRequest->getHttpHost();

        if (!$avatar->isPrivacy()) {
            if ($avatar->getEntity()->getAvatar()) {
                return $this->serviceVich->asset($avatar->getEntity(), 'avatar');

            } else {
                return $scheme . $avatar->getEntity()->getDefaultAvatar();
            }
        }

        return $scheme . \Civix\CoreBundle\Entity\User::SOMEONE_AVATAR;
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param $avatar
     * @param array       $type
     * 
     * @return string|null return base64 string or null
     */
    public function deserialize(JsonDeserializationVisitor $visitor, $avatar, array $type)
    {
        return !preg_match('/^http/', $avatar) ? $avatar : null;
    }
}
