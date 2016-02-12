<?php

namespace Civix\CoreBundle\Serializer\Type;

class Avatar
{
    protected $entity;
    protected $privacy;

    public function __construct($entity, $privacy = false)
    {
        $this->entity = $entity;
        $this->privacy = $privacy;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function isPrivacy()
    {
        return $this->privacy;
    }
}
