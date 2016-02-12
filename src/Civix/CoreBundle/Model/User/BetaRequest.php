<?php
namespace Civix\CoreBundle\Model\User;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class BetaRequest
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Email
     *
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotBlank
     *
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $company;

    /**
     * @param string $company
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
