<?php
use Framework\Autoloader\StandardAutoloader;

require 'src/Framework/Autoloader/StandardAutoloader.php';
spl_autoload_register(new StandardAutoloader());
