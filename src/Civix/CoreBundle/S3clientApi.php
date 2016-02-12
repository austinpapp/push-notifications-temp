<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\SocialActivity;

use Doctrine\ORM\EntityManager;

use Aws\S3\S3Client;
use Aws\S3\Exception;

class S3clientApi 
{
    private $em;
    private $s3;

    public function __construct(
        EntityManager $em, 
        S3Client $s3,
        \Symfony\Bridge\Monolog\Logger $logger) 
    {

        $this->em = $em;
        $this->s3 = $s3;

    }

}


