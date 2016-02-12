<?php

namespace Civix\ApiBundle\Request;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

class AuthRequest
{
    /**
     * @Assert\NotBlank
     * @Serializer\Type("string")
     */
    private $username;

    /**
     * @Assert\NotBlank
     * @Serializer\Type("string")
     */
    private $password;

    /**
     * @Assert\NotBlank
     * @Assert\Choice(choices = {"group", "representative", "superuser"}, message = "Choose a valid type.")
     * @Serializer\Type("string")
     */
    private $type;

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getType()
    {
        return $this->type;
    }
}