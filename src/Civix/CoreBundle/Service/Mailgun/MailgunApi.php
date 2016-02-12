<?php
/**
 * Created by PhpStorm.
 * User: sofien
 * Date: 11/10/15
 * Time: 11:50
 */

namespace Civix\CoreBundle\Service\Mailgun;


use Mailgun\Mailgun;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MailgunApi {

    public $APIURL = "api.mailgun.net" ;
    public $GROUPEMAIL = '@powerlinegroups.com' ;

    public $public_key;
    public $private_key;
    public $container;

    function __construct($public_key,$private_key, ContainerInterface $container)
    {
        $this->public_key = $public_key;
        $this->private_key = $private_key;
        $this->container = $container;
    }


    public function listcreateAction($listname,$description,$email,$name)
    {

        $mailgun = new Mailgun($this->private_key,$this->APIURL,"v3",true);
        $publicmailgun = new Mailgun($this->public_key,$this->APIURL,"v3",true);

        $validation = $publicmailgun->get("address/validate", array('address' => $listname.$this->GROUPEMAIL));
        $validationresponse = json_decode(json_encode($validation),true);

        if($validationresponse['http_response_code'] == 200 AND $validationresponse['http_response_body']['is_valid'] === false){
            return $validationresponse;
        }
        $result = $mailgun->post("lists", array(
            'address'     => $listname.$this->GROUPEMAIL,
            'description' => ''.$description,
            'access_level' => 'members'
        ));

        $result = $this->JsonResponse($result);

        if($result['http_response_code'] == 200){

            $this->listaddmemberAction($listname,$email,$name);

        }

        return $result;

    }

    public function listaddmemberAction($listname,$address,$name)
    {
        $logger = $this->container->get('logger');


        $mailgun = new Mailgun($this->private_key,$this->APIURL,"v3",true);

        $listAddress = $listname.$this->GROUPEMAIL;

        $checkresult = $mailgun->get("lists", array(
            'address'     => ''.$listAddress,
        ));
        $decodedresult = json_decode(json_encode($checkresult),true);
        $count = $decodedresult['http_response_body']['total_count'];

        $logger->info('Testing adding member '.$address);
        if($decodedresult['http_response_code'] != 200){
           $result = $this->listcreateAction($listname,' the list '.$listname,$address,$name);
            $logger->info('adding list '.$address. ' '.serialize($result));
        }
            $result = $mailgun->post("lists/$listAddress/members", array(
                'address'     => ''.$address,
                'name'        => ''.$name,
                'subscribed'  => true,
                'upsert'      => true
            ));

        $logger->info('adding member '.$address. ' '.serialize($result));


        return $this->JsonResponse($result);

    }

    public function listremovememberAction($listname,$address)
    {

        $mailgun = new Mailgun($this->private_key,$this->APIURL,"v3",true);

        $listAddress = $listname.$this->GROUPEMAIL;
        $listMember = ''.$address;

        $checkresult = $mailgun->get("lists", array(
            'address'     => ''.$listAddress,
        ));
        $decodedresult = json_decode(json_encode($checkresult),true);
        $count = $decodedresult['http_response_body']['total_count'];

        if($count == 0){
            $result = $this->listcreateAction($listname,' the list '.$listname,$address,' ');

            if($result['http_response_code'] != 200){

                return $this->JsonResponse($result);

            }
        }

        $checkadress = $mailgun->get("lists/$listAddress/members", array(
            'address'     => ''.$address,
        ));

        $decodedresult = json_decode(json_encode($checkadress),true);
        $count = $decodedresult['http_response_body']['total_count'];

        if($count > 0){
            $result = $mailgun->delete("lists/$listAddress/members/$listMember");
        }else{
            $result = $this->listcreateAction($listname,'new list '.$listname,$address,' ');
        }


        return $this->JsonResponse($result);

    }

    public function listremoveAction($listname)
    {

        $mailgun = new Mailgun($this->private_key,$this->APIURL,"v3",true);

        $listAddress = $listname.$this->GROUPEMAIL;

        $result = $mailgun->delete("lists/$listAddress");


        return $this->JsonResponse($result);

    }

    public function JsonResponse($result){

        return json_decode(json_encode($result),true);
    }

}
