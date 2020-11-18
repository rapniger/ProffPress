<?php

namespace LifePHP\Exception;

use LifePHP\Core\Logger;
 
class CoreException extends \Exception 
{

    public function logError() 
    {      
        $logger = new Logger();
        $logger->warning($this->getMessage());
    }

}
