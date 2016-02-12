<?php

namespace Civix\CoreBundle\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Customer\Customer;

/**
 * @ORM\Entity
 */
class CustomerGroup extends Customer
{
     /**
     * @ORM\OneToOne(targetEntity="\Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Get user
     *
     * @return \Civix\CoreBundle\Entity\Group
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser(Group $user = null)
    {
        $this->user = $user;

        return $this;
    }

    public function getEmail()
    {
        return $this->getUser()->getManagerEmail();
    }
}
