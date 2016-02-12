<?php

namespace Civix\CoreBundle\Entity\Group;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

use Civix\CoreBundle\Entity\User;

/**
 * Field entity
 *
 * @ORM\Table(name="groups_fields")
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class GroupField
{
     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups-fields", "api-group-field"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="field_name", type="string", length=150)
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-groups-fields"})
     */
    private $fieldName;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group", inversedBy="fields")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $group;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Civix\CoreBundle\Entity\Group\FieldValue",
     *      mappedBy="field", cascade={"persist"}, orphanRemoval=true
     * )
     */
    private $values;

    public function __construct()
    {
        $this->values = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fieldName
     *
     * @param string $fieldName
     * @return GroupField
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    
        return $this;
    }

    /**
     * Get fieldName
     *
     * @return string 
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set group
     *
     * @param \Civix\CoreBundle\Entity\Group $group
     * @return GroupField
     */
    public function setGroup(\Civix\CoreBundle\Entity\Group $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Civix\CoreBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
    
    /**
     * Add values
     *
     * @param \Civix\CoreBundle\Entity\Group\FieldValue $values
     * @return GroupField
     */
    public function addValue(\Civix\CoreBundle\Entity\Group\FieldValue $values)
    {
        $this->values[] = $values;
    
        return $this;
    }

    /**
     * Remove values
     *
     * @param \Civix\CoreBundle\Entity\Group\FieldValue $values
     */
    public function removeValue(\Civix\CoreBundle\Entity\Group\FieldValue $values)
    {
        $this->values->removeElement($values);
    }

    /**
     * Get values
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValues()
    {
        return $this->values;
    }

    public function getUserValue(User $user)
    {
        /* @var FieldValue $value */
        foreach ($this->values as $value) {
            if ($value->getUser() === $user) {
                return $value->getFieldValue();
            }
        }
    }
}
