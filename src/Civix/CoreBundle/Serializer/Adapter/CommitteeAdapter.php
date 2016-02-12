<?php

namespace Civix\CoreBundle\Serializer\Adapter;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class CommitteeAdapter
{
    private $committeeObj;

    public function __construct($committe)
    {
        $this->committeeObj = $committe;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-committee"})
     * @Serializer\SerializedName("id")
     */
    public function getId()
    {
        return $this->committeeObj->committee_id;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-committee"})
     * @Serializer\SerializedName("committee")
     */
    public function getCommittee()
    {
        return $this->committeeObj->committee;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-committee"})
     * @Serializer\SerializedName("subcommittee")
     */
    public function getSubcommittee()
    {
        return $this->committeeObj->subcommittee;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\Groups({"api-committee"})
     * @Serializer\SerializedName("position")
     */
    public function getPosition()
    {
        return $this->committeeObj->position;
    }
}
