<?php
namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Service\API\ServiceApi;
use Civix\CoreBundle\Entity\RepresentativeStorage;
use Civix\CoreBundle\Serializer\Adapter\CommitteeAdapter;
use Civix\CoreBundle\Serializer\Adapter\BillAdapter;

class OpenstatesApi extends ServiceApi
{
    const API_URL = 'http://openstates.org/api/v1/';

    const API_METHOD_LEGISLATORS = 'legislators/';
    const API_METHOD_BILLS = 'bills/';
    
    private $apiKey;

    public function __construct($apikey)
    {
        $this->apiKey = $apikey;
    }

    public function getRepresentativeByName($firstName, $lastName, $state = '')
    {
        $getParameters = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'apikey' => $this->apiKey
        );
        if (!empty($state)) {
            $getParameters['state'] = $state;
        }
        $representativesArray = $this->getResponse(
            self::API_URL . self::API_METHOD_LEGISLATORS,
            $getParameters
        );

        if ($representativesArray) {
            $representative = current($representativesArray);

            if (isset($representative->leg_id)) {
                return $representative->leg_id;
            }
        }

        return false;
    }

    public function getCommiteeMembership($openStateId)
    {
        $committee = $this->getCommiteeMembershipFromApi($openStateId);
        if ($committee) {
            return $this->convertToCommitteeAdapter($committee);
        }

        return array();
    }

    public function getBillsBySponsorId($openStateId)
    {
        return array_map(
            function ($singleBill) {
                return new BillAdapter($singleBill);
            },
            $this->getBillsBySponsorIdFromApi($openStateId)
        );
    }

    public function updateReprStorageProfile(RepresentativeStorage $representative)
    {
        $openStateId = $this->getRepresentativeByName(
            $representative->getFirstName(),
            $representative->getLastName()
        );

        if ($openStateId) {
            $representative->setOpenstateId($openStateId);
        }

        return $representative;
    }

    /**
     * 
     * @param array $responseObjects
     * @return Array of CommitteeAdapter
     */
    private function convertToCommitteeAdapter($responseObjects)
    {
        $committee = array();
        
        foreach ($responseObjects as $singleCommittee) {
            if (isset($singleCommittee->committee)) {
                   $committee[] = new CommitteeAdapter($singleCommittee);
            }
        }

        return $committee;
    }

    private function getCommiteeMembershipFromApi($openStateId)
    {
        $representative = $this->getResponse(
            self::API_URL . self::API_METHOD_LEGISLATORS . $openStateId . '/',
            array(
                'apikey' => $this->apiKey,
                'fields' => 'roles'
            )
        );
        if (isset($representative->roles)) {
            return $representative->roles;
        }

        return false;
    }

    private function getBillsBySponsorIdFromApi($openStateId)
    {
        return $this->getResponse(
            self::API_URL . self::API_METHOD_BILLS,
            array(
                'apikey' => $this->apiKey,
                'search_window' => 'term',
                'sponsor_id' => $openStateId,
                'per_page' => 5,
                'fields' => 'sources,title'
            )
        );
    }
}
