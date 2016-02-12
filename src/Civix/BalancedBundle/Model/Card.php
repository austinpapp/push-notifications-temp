<?php

namespace Civix\BalancedBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Card
{
    /**
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @Assert\NotBlank()
     * @Assert\CardScheme(
     *      schemes = {"VISA", "AMEX", "MASTERCARD", "DISCOVER"},
     *      message = "Your credit card number is invalid."
     * )
     */
    protected $number;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = "3", max = "4")
     */
    protected $cvv;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/\d+/")
     * @Assert\Length(min = "2", max = "2")
     */
    protected $expirationMonth;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/\d+/")
     * @Assert\Length(min = 4, max = 4)
     */
    protected $expirationYear;

    /**
     * @Assert\NotBlank(groups={"payment"})
     */
    protected $balancedUri;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * Get card number.
     *
     * @return number.
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set card number.
     *
     * @param Number the value to set.
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Set cvv
     *
     * @param  string     $cvv
     * @return CreditCard
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get cvv
     *
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Get expirationMonth.
     *
     * @return expirationMonth.
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * Set expirationMonth.
     *
     * @param expirationMonth the value to set.
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
    }

    /**
     * Get expirationYear.
     *
     * @return expirationYear.
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * Set expirationYear.
     *
     * @param expirationYear the value to set.
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
    }

    /**
     * Set balancedUri.
     *
     * @param balancedUri the value to set.
     */
    public function setBalancedUri($balancedUri)
    {
        $this->balancedUri = $balancedUri;

        return $this;
    }

    /**
     * Get balancedUri.
     *
     * @return balancedUri.
     */
    public function getBalancedUri()
    {
        return $this->balancedUri;
    }
}
