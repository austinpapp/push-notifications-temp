<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Service\API\ServiceApi;
use Civix\CoreBundle\Entity\RepresentativeStorage;

class CongressApi extends ServiceApi
{
    const API_URL = 'http://congress.api.sunlightfoundation.com/';

    const API_METHOD_LEGISLATORS = 'legislators';

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
            'per_page' => 'all',
            'apikey' => $this->apiKey
        );
        if (!empty($state)) {
            $getParameters['state'] = $state;
        }
        $representative = $this->getResponse(
            self::API_URL . self::API_METHOD_LEGISLATORS,
            $getParameters
        );
        
        if ($representative && $representative->count && $representative->count>0) {
            return array(
                'startTerm' => new \DateTime($representative->results[0]->term_start),
                'endTerm' => new \DateTime($representative->results[0]->term_end),
                'birthday' => new \DateTime($representative->results[0]->birthday),
                'facebook' => isset($representative->results[0]->facebook_id)?
                    $representative->results[0]->facebook_id:
                    null,
                'youtube' => isset($representative->results[0]->youtube_id)?
                    $representative->results[0]->youtube_id:
                    null,
                'twitter' => isset($representative->results[0]->twitter_id)?
                    $representative->results[0]->twitter_id:
                    null
            );
        }

        return array();
    }

    public function updateReprStorageProfile(RepresentativeStorage $representative)
    {
        $response = $this->getRepresentativeByName(
            $representative->getFirstName(),
            $representative->getLastName()
        );

        foreach ($response as $objField => $objValue) {
            $fieldName = ucfirst($objField);
            $representativeSetMethod = 'set'.$fieldName;
            $representativeGetMethod = 'get'.$fieldName;

            if (method_exists($representative, $representativeSetMethod) &&
                method_exists($representative, $representativeGetMethod)
            ) {
                $currentPropertyValue = $representative->$representativeGetMethod();
                if (empty($currentPropertyValue)) {
                    $representative->$representativeSetMethod($objValue);
                }
            }
        }

        return $representative;
    }
}
