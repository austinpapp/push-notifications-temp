<?php

namespace Civix\LoadBundle\DBAL\Logging;

use Doctrine\DBAL\Logging\SQLLogger;

class QueryLogging implements SQLLogger
{
    private $fileHandle;
    
    public function __construct($fileName)
    {
        $this->fileHandle = fopen($fileName, 'w');
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        fwrite($this->fileHandle, serialize(array(
            'sql' => $sql,
            'params' => $params,
            'types' => $types
        )) . "\n");
    }

    public function stopQuery()
    {
        
    }

    public function __destruct()
    {
        fclose($this->fileHandle);
    }
}
