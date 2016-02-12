<?php

namespace Civix\CoreBundle\Service;

use Doctrine\ORM\EntityManager;
use Aws\Sns\SnsClient;
use Aws\Sns\Exception;
use Civix\CoreBundle\Entity\Notification as Model;

class Notification
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var SnsClient
     */
    private $sns;

    /**
     * @var string
     */
    private $androidArn;

    /**
     * @var string
     */
    private $iosArn;

    public function __construct(EntityManager $em, SnsClient $sns, $androidArn, $iosArn)
    {
        $this->em = $em;
        $this->sns = $sns;
        $this->androidArn = $androidArn;
        $this->iosArn = $iosArn;
    }

    public function handleEndpoint(Model\AbstractEndpoint $newEndpoint)
    {
        $endpoints = $this->em->getRepository(get_class($newEndpoint))->createQueryBuilder('e')
            ->where('e.token = :token OR e.user = :user')
            ->setParameter('token', $newEndpoint->getToken())
            ->setParameter('user', $newEndpoint->getUser())
            ->getQuery()
            ->getResult()
        ;

        $this->removeEndpoints($endpoints);

        $this->addEndpoint($newEndpoint);
    }

    public function send($message, $type, $entityData, Model\AbstractEndpoint $endpoint, $avatarUrl)
    {
        try {
            $this->sns->publish(array(
                'TargetArn' => $endpoint->getArn(),
                'MessageStructure' => 'json',
                'Message' => $endpoint->getPlatformMessage($message, $type, $entityData, $avatarUrl)
            ));
        } catch (Exception\SnsException $e) {
            if ($e instanceof Exception\EndpointDisabledException || $e instanceof Exception\NotFoundException) {
                $this->removeEndpoint($endpoint);
            }
        }
    }

    private function removeEndpoints($endpoints)
    {
        /* @var $endpoint Model\AbstractEndpoint */
        foreach ($endpoints as $endpoint) {
            $this->removeEndpoint($endpoint);
        }
    }

    private function removeEndpoint(Model\AbstractEndpoint $endpoint)
    {
        $this->sns->deleteEndpoint(array(
            'EndpointArn' => $endpoint->getArn()
        ));
        $this->em->remove($endpoint);
        $this->em->flush($endpoint);
    }

    private function addEndpoint(Model\AbstractEndpoint $endpoint)
    {
        try {
            $result = $this->sns->createPlatformEndpoint([
                'PlatformApplicationArn' => $this->getPlatformArn($endpoint),
                'Token' => $endpoint->getToken(),
                'CustomUserData' => $endpoint->getUser()->getId()
            ]);
        } catch (\Aws\Sns\Exception\InvalidParameterException $e) {
            if (preg_match(
                '/Endpoint (.*) already exists/',
                $e->getResponse()->getMessage(),
                $matches
            )) {
                $this->sns->deleteEndpoint(array(
                    'EndpointArn' => $matches[1]
                ));
                $result = $this->sns->createPlatformEndpoint([
                    'PlatformApplicationArn' => $this->getPlatformArn($endpoint),
                    'Token' => $endpoint->getToken(),
                    'CustomUserData' => $endpoint->getUser()->getId()
                ]);
            } else {
                return;
            }

        }

        $endpoint->setArn($result['EndpointArn']);

        $this->em->persist($endpoint);
        $this->em->flush($endpoint);

    }

    private function getPlatformArn(Model\AbstractEndpoint $endpoint)
    {
        if ($endpoint instanceof Model\AndroidEndpoint) {
            return $this->androidArn;
        }
        if ($endpoint instanceof Model\IOSEndpoint) {
            return $this->iosArn;
        }
    }
}
