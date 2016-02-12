<?php

namespace Civix\CoreBundle\Service\Google;

use Civix\CoreBundle\Model\Geocode\AddressComponent;

class Geocode
{
    /**
     * @var string
     */
    private $key = '';

    /**
     * @var string
     */
    private $url = 'https://maps.googleapis.com/maps/api/geocode/json';

    private $results = [];

    public function getCountry($query)
    {
        return $this->getAddressComponent($query, 'country');
    }

    public function getState($query)
    {
        return $this->getAddressComponent($query, 'administrative_area_level_1');
    }

    public function getLocality($query)
    {
        return $this->getAddressComponent($query, 'locality');
    }

    /**
     * @param string $query
     * @param string $component
     * @param string $type
     * @return AddressComponent
     */
    private function getAddressComponent($query, $type)
    {
        if (isset($this->results[$query])) {
            $result = $this->results[$query];
        } else {
            $this->results[$query] = $result = $this->getResult($query);
        }

        if (!empty($result) && count($result['results']) === 1 && isset($result['results'][0]['address_components'])) {
            foreach ($result['results'][0]['address_components'] as $item) {
                if (in_array($type, $item['types'])) {
                    return new AddressComponent($item['long_name'], $item['short_name']);
                }
            }
        }
    }

    private function getResult($query)
    {
        return $this->getResponse($this->url . '?' . http_build_query(['address' => $query]));
    }

    private function getResponse($url)
    {
        $cHandle = curl_init();

        curl_setopt($cHandle, CURLOPT_URL, $url);
        curl_setopt($cHandle, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($cHandle);
        curl_close($cHandle);

        if ($result) {
            return json_decode($result, true);
        }
    }
} 