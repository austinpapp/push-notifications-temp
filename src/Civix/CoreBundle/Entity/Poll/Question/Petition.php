<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Civix\CoreBundle\Entity\Poll\Question;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\PetitionRepository")
 */
abstract class Petition extends Question
{

    /**
     *
     * @ORM\Column(name="is_outsiders_sign", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $isOutsidersSign;

    /**
     *
     * @ORM\Column(name="petition_title", type="string")
     * @Assert\NotBlank(groups={"petition-manage"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $petitionTitle;

    /**
     *
     * @ORM\Column(name="petition_body", type="text")
     * @Assert\NotBlank(groups={"petition-manage"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $petitionBody;

    /**
     * Set isOutsidersSign
     *
     * @param boolean $isOutsidersSign
     * @return GroupPetition
     */
    public function setIsOutsidersSign($isOutsidersSign)
    {
        $this->isOutsidersSign = $isOutsidersSign;

        return $this;
    }

    /**
     * Get isOutsidersSign
     *
     * @return boolean
     */
    public function getIsOutsidersSign()
    {
        return $this->isOutsidersSign;
    }

    /**
     * Set petitionTitle
     *
     * @param string $petitionTitle
     * @return GroupPetition
     */
    public function setPetitionTitle($petitionTitle)
    {
        $this->petitionTitle = $petitionTitle;

        return $this;
    }

    /**
     * Get petitionTitle
     *
     * @return string
     */
    public function getPetitionTitle()
    {
        return $this->petitionTitle;
    }

    /**
     * Set petitionBody
     *
     * @param string $petitionBody
     * @return GroupPetition
     */
    public function setPetitionBody($petitionBody)
    {
        $this->petitionBody = $petitionBody;

        return $this;
    }

    /**
     * Get petitionBody
     *
     * @return string
     */
    public function getPetitionBody()
    {
        return $this->petitionBody;
    }
}
