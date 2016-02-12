<?php

namespace Civix\CoreBundle\Service;

use Aws\S3\S3Client;
use Aws\S3\Exception as S3Exception;

class S3clientApi 
{
    # change these to be picked up in parameters.yaml
    const FOLDER_AVATARS = "avatars";

    private $s3;
    private $bucket;
    private $logger;

    public function __construct(
        S3Client $s3,
        $bucket,
        \Symfony\Bridge\Monolog\Logger $logger) 
    {
        $this->s3 = $s3;
        $this->bucket = $bucket;
        $this->logger = $logger;

        # Register this as a stream
        # Fakes a local filesystem
        $this->s3->registerStreamWrapper();
    }

    /**
     * 
     * Get the group avatar url
     */
    public function getGroupAvatarUrl($groupAvatarFilename) 
    {
        return $this->getUrl(self::FOLDER_AVATARS, $groupAvatarFilename);
    }

    public function getUserAvatarUrl($userAvatarFilename)
    {
    }

    /**
     * 
     * Return the plain url
     */
    private function getUrl($folder, $filename) 
    {
        $dir = "s3://{$this->bucket}/{$folder}";
        $key = "{$folder}/{$filename}";
        $fullpath = $dir . "/" . $filename;

        # check dir exists
        if (!is_dir($dir)) {
           $this->logger->error("dir {$dir} does not exist!"); 
           return null;
        }

        # check if file exists
        if (!file_exists( $fullpath ) ) {
           $this->logger->error("file {$s3file} does not exist!"); 
           return null;
        }

        try {
            return $this->s3->getObjectUrl($this->bucket, $key);
        } catch (S3Exception $e) {
            $this->logger->error($e->getResponse());
            return null;
        }
    }

}

