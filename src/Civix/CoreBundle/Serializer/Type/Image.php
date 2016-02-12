<?php

namespace Civix\CoreBundle\Serializer\Type;

class Image
{
    protected $entity;

    /**
     * @var string
     */
    protected $field;

    protected $src;

    public function __construct($entity, $field, $src = null)
    {
        $this->entity = $entity;
        $this->field = $field;
        $this->src = $src;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    public function isAvailable()
    {
        if (method_exists($this->entity, 'get' . $this->field)) {
            return $this->entity->{'get' . $this->field}();
        }
    }

    public function isUrl()
    {
        return $this->src && preg_match('/^http(s)?:\/\//', $this->src);
    }

    public function getImageSrc()
    {
        return $this->src;
    }
}
