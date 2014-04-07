<?php
namespace Framework\Autoloader;

class StandardAutoloader
{
    /**
     * @param string $classname
     */
    public function __invoke($classname)
    {
        require 'src/'. str_replace('\\', '/', $classname) . '.php';
    }
}
