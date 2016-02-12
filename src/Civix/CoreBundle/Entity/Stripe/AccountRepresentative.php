<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\Representative;

/**
 * @ORM\Entity
 */
class AccountRepresentative extends Account
{
    /**
     * @ORM\OneToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @ORM\JoinColumn(name="representative_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @return \Civix\CoreBundle\Entity\Representative
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser(Representative $user = null)
    {
        $this->user = $user;
        
        return $this;
    }
}
