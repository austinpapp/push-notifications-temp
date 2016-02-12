<?php

namespace Civix\CoreBundle\Entity\Activities;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 * @Vich\Uploadable
 */
class Petition extends Question
{
    public function getEntity()
    {
        return array(
            'type' => 'petition',
            'id' => $this->getQuestionId()
        );
    }
}
