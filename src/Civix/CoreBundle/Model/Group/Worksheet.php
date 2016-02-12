<?php

namespace Civix\CoreBundle\Model\Group;

use JMS\Serializer\Annotation as Serializer;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;

/**
 * @Serializer\ExclusionPolicy("all")
 * @Assert\Callback(methods={"isCorrectRequiredFields"}, groups={"api-group-field"})
 */
class Worksheet
{
    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-group-field"})
     * @Serializer\Type("ArrayCollection<Civix\CoreBundle\Entity\Group\FieldValue>")
     * @Assert\NotBlank(groups={"api-group-field"})
     * @Assert\Collection(
     *      fields={
     *          "field" =  @Assert\Required({@Assert\NotBlank(groups={"api-group-field"})}),
     *          "field_value" = @Assert\Required({@Assert\NotBlank(groups={"api-group-field"})})
     *      }
     * )
     */
    private $fields;

     /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-group-passcode"})
     * @Serializer\Type("string")
     * @Assert\NotBlank(groups={"api-group-passcode"})
     */
    private $passcode;

    private $group;

    public function __construct()
    {
        $this->fields = new ArrayCollection();
    }
    
    public function getFields()
    {
        return $this->fields;
    }

    public function getFieldsIds()
    {
        if (!($this->fields instanceof ArrayCollection)) {
            return array();
        }

        return $this->fields->map(function ($fieldValue) {
                return $fieldValue->getField()->getId();
        })->toArray();
    }
    
    public function getPasscode()
    {
        return $this->passcode;
    }

    public function setUser(User $user)
    {
        if (!empty($this->fields)) {
            foreach ($this->fields as $field) {
                $field->setUser($user);
            }
        }
    }

    public function setGroup(Group $group)
    {
        $this->group = $group;
    }
    
    public function isCorrectRequiredFields(ExecutionContextInterface $context)
    {
        if ($this->group->getFillFieldsRequired()) {
            $groupFieldsIds = $this->group->getFieldsIds();
            $userFieldsIds = $this->getFieldsIds();

            if (!empty(array_diff($groupFieldsIds, $userFieldsIds))) {
                 $context->addViolationAt('fields', 'Please to fill required fields', array(), null);
            }
        }
    }
}
