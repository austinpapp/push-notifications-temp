<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\User;

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
}
