<?php

namespace Civix\CoreBundle\Model\Subscription;

class PackageLimitState
{
    private $currentValue;

    private $limitValue;

    public function setCurrentValue($value)
    {
        $this->currentValue = $value;

        return $this;
    }

    public function getCurrentValue()
    {
        return $this->currentValue;
    }

    public function setLimitValue($limit)
    {
        $this->limitValue = $limit;

        return $this;
    }

    public function getLimitValue()
    {
        return $this->limitValue;
    }

    public function hasLimitation()
    {
        return null !== $this->limitValue;
    }

    public function isAllowed()
    {
        return !$this->hasLimitation() ||
            ($this->hasLimitation() && ($this->currentValue < $this->limitValue));
    }

    public function isAllowedWith($addValue = 1)
    {
        return !$this->hasLimitation() ||
            ($this->hasLimitation() && (($addValue + $this->currentValue) <= $this->limitValue));
    }
}
