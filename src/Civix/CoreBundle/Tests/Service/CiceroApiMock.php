<?php

namespace Civix\CoreBundle\Tests\Service;

use Civix\CoreBundle\Service\CiceroApi;

/**
 * Class for access to private methods of CiceroApi
 */
class CiceroApiMock extends CiceroApi
{
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func(array('parent',$name), $arguments);
        }
    }
}
