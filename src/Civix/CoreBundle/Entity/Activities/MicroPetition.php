<?php

namespace Civix\CoreBundle\Entity\Activities;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Entity\Activity;

/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class MicroPetition extends Activity
{
    /**
     * @ORM\Column(name="petition_id", type="integer")
     * @var integer
     */
    protected $petitionId;

    /**
     * @var integer
     * @ORM\Column(name="quorum", type="integer")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities"})
     */
    protected $quorum;

    public function setPetitionId($id)
    {
         $this->petitionId = $id;

         return $this;
    }

    public function getPetitionId()
    {
         return $this->petitionId;
    }

    public function getEntity()
    {
        return array(
            'type' => 'micro-petition',
            'id' => $this->getPetitionId(),
            'group_id' => $this->getGroup() ? $this->getGroup()->getId() : null
        );
    }

    /**
     * @param int $quorum
     */
    public function setQuorum($quorum)
    {
        $this->quorum = $quorum;
    }

    /**
     * @return int
     */
    public function getQuorum()
    {
        return $this->quorum;
    }
}
