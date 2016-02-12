<?php

namespace Civix\CoreBundle\Model\Geocode;

class AddressComponent
{
    /**
     * @var string
     */
    private $longName;

    /**
     * @var string
     */
    private $shortName;

    function __construct($longName = '', $shortName = '')
    {
        $this->longName = $longName;
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * @param string $longName
     * @return $this
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return $this
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }
}