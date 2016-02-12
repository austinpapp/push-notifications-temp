<?php

namespace Civix\CoreBundle\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Customer\Customer;

/**
 * @ORM\Entity
 */
class CustomerUser extends Customer
{
    /**
     * @ORM\OneToOne(targetEntity="\Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    public function getEmail()
    {
        return $this->getUser()->getEmail();
    }
}
