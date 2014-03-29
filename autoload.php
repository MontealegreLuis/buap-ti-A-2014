<?php
use Autoloader\StandardAutoloader;

require 'Autoloader/StandardAutoloader.php';
spl_autoload_register(new StandardAutoloader());
