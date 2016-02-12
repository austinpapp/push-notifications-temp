<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Service\API\ServiceApi;
use Symfony\Bridge\Monolog\Logger;

class CiceroCalls extends ServiceApi
{
    const API_URL = 'https://cicero.azavea.com/v3.1/';
    const GET_TOKEN_SUFFIX = 'token/new.json';
    const OFFICIAL = 'official';
    const NONLEGISLATIVE_DISTRICT = 'nonlegislative_district';
    const CENSUS_SUBTYPE = 'SUBDIVISION';

    private $apiLogin;
    private $apiPassword;
    private $logger;
    private $locationLat;
    private $locationLon;

    private $user;
    private $token;
    
    public function __construct($login, $password, Logger $logger)
    {
        $this->apiLogin = $login;
        $this->apiPassword = $password;
        $this->logger = $logger;

        $this->getApiToken();
    }

    public function findRepresentativeByLocation($address, $city, $state, $country = 'US')
    {
        $response = $this->getResponse(self::API_URL . self::OFFICIAL,
            array(
                'search_address' => $address,
                'search_city' => $city,
                'search_state' => $state,
                'search_country' => empty($country)?'US':$country,
                'user' => $this->user,
                'token' => $this->token
            ),
            'GET'
        );

        if (!isset($response->response->results->candidates) ||
                count($response->response->results->candidates)<1 ||
                $response->response->results->candidates[0]->count->total == 0
        ) {
            return false;
        }

        //set coordinates of match address
        $this->locationLat = $response->response->results->candidates[0]->y;
        $this->locationLon = $response->response->results->candidates[0]->x;

        return $response->response->results->candidates[0]->officials;
    }

    public function findRepresentativeByOfficialData($firstName, $lastName, $officialTitle)
    {
        $response = $this->getResponse(self::API_URL . self::OFFICIAL,
            array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'title' => $officialTitle,
                'user' => $this->user,
                'token' => $this->token
            )
        );

        if (!isset($response->response->results->count) || $response->response->results->count->total == 0) {
            return false;
        }

        return $response->response->results->officials;
    }

    /**
     * Get representative's information by firstname, lastname, storageId from cicero.
     * Search by only storageId in cicero is not working.
     * 
     * @param string $firstName
     * @param string $lastName
     * @param integer $storageId
     * 
     * @return boolean | object
     */
    public function findRepresentativeByNameAndId($firstName, $lastName, $storageId)
    {
        $response = $this->getResponse(self::API_URL . self::OFFICIAL,
            array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'id' => $storageId,
                'user' => $this->user,
                'token' => $this->token
            )
        );

        if (!isset($response->response->results->count) || $response->response->results->count->total <> 1) {
            return false;
        }

        return current($response->response->results->officials);
    }

    public function findNonLegislativeDistricts()
    {
        $response = $this->getResponse(self::API_URL . self::NONLEGISLATIVE_DISTRICT,
            array(
                'user' => $this->user,
                'token' => $this->token,
                'lat' => $this->locationLat,
                'lon' => $this->locationLon,
                'type' => 'CENSUS'
            ),
            'GET'
        );
        
        if (isset($response->response->results) && isset($response->response->results->districts)) {
            return $response->response->results->districts;
        }

        return array();
    }

    /**
     * Get current credit balance
     *
     * @return Integer
     */
    public function getCreditBalance()
    {
        $response = $this->getResponse(self::API_URL . 'account/credits_remaining',
            array(
                'user' => $this->user,
                'token' => $this->token
            ),
            'GET'
        );
        if (isset($response->response->results->credit_balance)) {
            return (int) $response->response->results->credit_balance;
        }

        return false;
    }

    protected function getApiToken()
    {
        $response = $this->getResponse(self::API_URL . self::GET_TOKEN_SUFFIX,
            array(
                 'username' => $this->apiLogin,
                 'password' => $this->apiPassword
             ),
            'POST'
        );

        if ($response === null) {
            return;
        }

        if ($response->success) {
            $this->user = $response->user;
            $this->token = $response->token;
        } else {
            $this->logger->addError($response->errors);
        }
    }
}
