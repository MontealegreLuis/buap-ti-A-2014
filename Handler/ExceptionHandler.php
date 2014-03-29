<?php
namespace Handler;

use \Exception;

class ExceptionHandler
{
    public function __invoke(Exception $e)
    {
        // write to a file
        //echo $e;
    }
}
