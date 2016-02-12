<?php
namespace Civix\CoreBundle\Service\API;

class ServiceApi
{
    private $agent = "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 6.0)'";
    
    protected function getResponse($url, $parameters = array(), $method = 'GET')
    {
        $cHandle = curl_init();

        if ($method == 'GET' && !empty($parameters)) {
            $url.= '?'. http_build_query($parameters);
        }
        curl_setopt($cHandle, CURLOPT_URL, $url);
        curl_setopt($cHandle, CURLOPT_RETURNTRANSFER, true);
        if (($method == 'POST') && (!empty($parameters))) {
            curl_setopt($cHandle, CURLOPT_POST, true);
            curl_setopt($cHandle, CURLOPT_POSTFIELDS, http_build_query($parameters));
        }
        $result = curl_exec($cHandle);
        curl_close($cHandle);

        return json_decode($result);
    }

    protected function checkLink($url)
    {
        $cHandle = curl_init($url);
        curl_setopt($cHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cHandle, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($cHandle, CURLOPT_FOLLOWLOCATION, 1);

        curl_exec($cHandle);
        $httpCode = curl_getinfo($cHandle, CURLINFO_HTTP_CODE);
        $header = curl_getinfo($cHandle, CURLINFO_CONTENT_TYPE);

        curl_close($cHandle);
        if ($httpCode != 200) {
            return false;
        }

        return $header;
    }

    protected function saveImageFromUrl($imageUrl, $destImPath)
    {
        $ch = curl_init($imageUrl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        if (file_exists($destImPath)) {
            unlink($destImPath);
        }
        $fp = fopen($destImPath, 'x');
        fwrite($fp, $rawdata);
        fclose($fp);
    }
}
