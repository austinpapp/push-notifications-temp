<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(
 *      name="districts",
 *      indexes={@ORM\Index(name="distr_type", columns={"district_type"})}
 * )
 */
class District
{
    const LOCAL = 1;
    const LOCAL_EXEC = 2;
    const STATE_LOWER = 3;
    const STATE_UPPER = 4;
    const STATE_EXEC = 5;
    const NATIONAL_LOWER = 6;
    const NATIONAL_UPPER = 7;
    const NATIONAL_EXEC = 8;

    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="NONE")
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="label", type="string", length=250)
    */
    private $label;

    /**
    * @var integer
    *
    * @ORM\Column(name="district_type", type="integer")
    */
    private $districtType;

    /**
    *
    * @var Array
    */
    private $districtNames = array(
           self::LOCAL => 'Local',
           self::LOCAL_EXEC => 'Town Council',
           self::STATE_LOWER => 'State Assembly',
           self::STATE_UPPER => 'State Senate',
           self::STATE_EXEC => 'Office of the Governor',
           self::NATIONAL_LOWER => 'US House',
           self::NATIONAL_UPPER => 'US Senate',
           self::NATIONAL_EXEC => 'Office of the President'
    );

    /**
    * @ORM\ManyToMany(targetEntity="User", mappedBy="districts")
    */
    private $users;

    public function __construct($id = null, $label = null, $districtType = null)
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id = $id;
        $this->label = $label;
        $this->districtType = $districtType;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return District
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return District
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set districtType
     *
     * @param integer $districtType
     *
     * @return District
     */
    public function setDistrictType($districtType)
    {
        $this->districtType = $districtType;

        return $this;
    }

    /**
     * Get districtType
     *
     * @return integer
     */
    public function getDistrictType()
    {
        return $this->districtType;
    }

    /**
     * Get district type name by district type id
     *
     * @return String
     */
    public function getDistrictTypeName()
    {
        $districtType = $this->getDistrictType();

        return isset($this->districtNames[$districtType])?$this->districtNames[$districtType]:false;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }
    
    /**
     * Add users
     *
     * @param \Civix\CoreBundle\Entity\User $users
     * @return District
     */
    public function addUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Civix\CoreBundle\Entity\User $users
     */
    public function removeUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
