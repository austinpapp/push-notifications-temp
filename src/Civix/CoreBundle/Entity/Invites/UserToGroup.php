<?php

namespace Civix\CoreBundle\Entity\Invites;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Validator\Constrains\NotJoinedToGroup;

/**
 * @ORM\Entity()
 * @UniqueEntity(fields={"group", "inviter", "user"})
 * @NotJoinedToGroup(userGetter="getUser", groupGetter="getGroup")
 */
class UserToGroup extends BaseInvite
{
    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="cascade")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-invites", "api-invites-create"})
     */
    protected $group;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="inviter_user_id", referencedColumnName="id", onDelete="cascade")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-invites"})
     */
    protected $inviter;

    /**
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return $this
     */
    public function setGroup(Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return \Civix\CoreBundle\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param \Civix\CoreBundle\Entity\User $inviter
     * @return $this
     */
    public function setInviter($inviter)
    {
        $this->inviter = $inviter;

        return $this;
    }

    /**
     * @return \Civix\CoreBundle\Entity\User
     */
    public function getInviter()
    {
        return $this->inviter;
    }

    public function merge(EntityManager $em)
    {
        if ($this->getUser()) {
            $this->setUser($em->getRepository(User::class)->find($this->getUser()->getId()));
        }
        if ($this->getGroup()) {
            $this->setGroup($em->getRepository(Group::class)->find($this->getGroup()->getId()));
        }
    }
}
