<?php
namespace Handler;

use \ErrorException;

class ErrorHandler
{
    public function __invoke(
        $errno, $errstr, $errfile, $errline
    )
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
}
