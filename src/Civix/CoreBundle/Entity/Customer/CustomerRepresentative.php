<?php

namespace Civix\CoreBundle\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Customer\Customer;

/**
 * @ORM\Entity
 */
class CustomerRepresentative extends Customer
{
    /**
     * @ORM\OneToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @ORM\JoinColumn(name="representative_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Get user
     *
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

    public function getEmail()
    {
        return $this->getUser()->getEmail();
    }
}
