<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\StatesRepository")
 * @ORM\Table(name="states")
 */
class State
{

    /**
     * @ORM\Id
     * @ORM\Column(name="code", type="string", length=2, unique=true)
     *
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Group", mappedBy="localState")
     */
    protected $localGroups;

    /**
     * @ORM\OneToMany(targetEntity="RepresentativeStorage", mappedBy="state")
     */
    protected $stRepresentatives;
    
    public function __construct()
    {
        $this->localGroups = new ArrayCollection();
        $this->stRepresentatives = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->code;
    }

    /**
     * Set code
     *
     * @param  string $code
     * @return State
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->getCode();
    }

    /**
     * Add localGroups
     *
     * @param \Civix\CoreBundle\Entity\Group $localGroups
     * @return State
     */
    public function addLocalGroup(\Civix\CoreBundle\Entity\Group $localGroups)
    {
        $this->localGroups[] = $localGroups;

        return $this;
    }

    /**
     * Remove localGroups
     *
     * @param \Civix\CoreBundle\Entity\Group $localGroups
     */
    public function removeLocalGroup(\Civix\CoreBundle\Entity\Group $localGroups)
    {
        $this->localGroups->removeElement($localGroups);
    }

    /**
     * Get localGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocalGroups()
    {
        return $this->localGroups;
    }

    /**
     * Add stRepresentatives
     *
     * @param \Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives
     * @return State
     */
    public function addStRepresentative(\Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives)
    {
        $this->stRepresentatives[] = $stRepresentatives;
    
        return $this;
    }

    /**
     * Remove stRepresentatives
     *
     * @param \Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives
     */
    public function removeStRepresentative(\Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives)
    {
        $this->stRepresentatives->removeElement($stRepresentatives);
    }

    /**
     * Get stRepresentatives
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStRepresentatives()
    {
        return $this->stRepresentatives;
    }
}
