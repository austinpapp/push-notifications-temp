<?php

namespace Civix\CoreBundle\Serializer\Adapter;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class BillAdapter
{
    private $billObj;

    public function __construct($billObj)
    {
        $this->billObj = $billObj;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-bills"})
     * @Serializer\SerializedName("id")
     */
    public function getId()
    {
        return $this->billObj->id;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-bills"})
     * @Serializer\SerializedName("title")
     */
    public function getTitle()
    {
        return $this->billObj->title;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-bills"})
     * @Serializer\SerializedName("url")
     */
    public function getUrl()
    {
        if (isset($this->billObj->sources[0]->url)) {
            return $this->billObj->sources[0]->url;
        }

        return null;
    }
}
