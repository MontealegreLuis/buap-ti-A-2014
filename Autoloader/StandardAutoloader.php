<?php
namespace Autoloader;

class StandardAutoloader
{
    public function __invoke($classname)
    {
        require str_replace('\\', '/', $classname) . '.php';
    }
}
