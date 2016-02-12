<?php

namespace Civix\CoreBundle\Entity\Invites;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\User;

/**
 * @ORM\Entity()
 * @ORM\Table(name="invites")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "user-to-group" = "Civix\CoreBundle\Entity\Invites\UserToGroup"
 * })
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\Discriminator(field = "type", map = {
 *      "user-to-group": "Civix\CoreBundle\Entity\Invites\UserToGroup"
 * })
 */
abstract class BaseInvite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-invites"})
     */
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="cascade")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-invites-create"})
     */
    protected $user;

    /**
     * @param \Civix\CoreBundle\Entity\User $user
     * @return $this
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Civix\CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    abstract public function setInviter($inviter);

    abstract public function merge(EntityManager $em);
}
