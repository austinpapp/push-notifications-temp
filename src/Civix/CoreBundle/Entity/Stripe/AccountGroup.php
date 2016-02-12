<?php

namespace Civix\CoreBundle\Entity\Stripe;

use Doctrine\ORM\Mapping as ORM;
use Civix\CoreBundle\Entity\Group;

/**
 * @ORM\Entity
 */
class AccountGroup extends Account
{
     /**
     * @ORM\OneToOne(targetEntity="\Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
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
}
