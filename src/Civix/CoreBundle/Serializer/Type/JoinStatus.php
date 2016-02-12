<?php

namespace Civix\CoreBundle\Serializer\Type;

class JoinStatus
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function getEntity()
    {
        return $this->entity;
    }
}
