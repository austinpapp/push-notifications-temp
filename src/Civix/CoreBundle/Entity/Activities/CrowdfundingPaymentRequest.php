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
class CrowdfundingPaymentRequest extends Question
{
    public function getEntity()
    {
        return array(
            'type' => 'crowdfunding-payment-request',
            'id' => $this->getQuestionId()
        );
    }
}
