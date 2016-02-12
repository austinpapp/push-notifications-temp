<?php
namespace Civix\CoreBundle\Model\User;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ChangePassword
{
    /**
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $passwordConfirm;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    public function getPasswordConfim()
    {
        return $this->passwordConfirm;
    }

    public function setPasswordConfirm($password)
    {
        $this->passwordConfirm = $password;

        return $this;
    }

    /**
     * @Assert\True(message = "Passwords entered do not match")
     */
    public function isIdenticalPasswords()
    {
        return $this->password === $this->passwordConfirm;
    }
}
