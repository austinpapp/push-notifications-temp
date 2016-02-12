<?php

namespace Civix\FrontBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PaymentAccountSettings
{
    /**
     * @var string
     *
     * @Assert\NotBlank(groups={"personal"})
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank(groups={"personal"})
     */
    private $birth;

    /**
     * @var integer
     *
     * @Assert\NotBlank(groups={"personal"})
     */
    private $SSNLast4;

    /**
     * @var string
     *
     * @Assert\NotBlank(groups={"business"})
     */
    private $businessName;

    /**
     * @var string
     *
     * @Assert\NotBlank(groups={"business"})
     */
    private $ein;

    /**
     * @param mixed $SSNLast4
     * @return $this
     */
    public function setSSNLast4($SSNLast4)
    {
        $this->SSNLast4 = $SSNLast4;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSSNLast4()
    {
        return $this->SSNLast4;
    }

    /**
     * @param mixed $birth
     * @return $this
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $businessName
     * @return $this
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * @param string $ein
     * @return $this
     */
    public function setEin($ein)
    {
        $this->ein = $ein;

        return $this;
    }

    /**
     * @return string
     */
    public function getEin()
    {
        return $this->ein;
    }
}
