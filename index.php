<?php
use \Controller\FrontController;
use \Routing\Router;
use \Routing\Dispatcher;
use \Http\Request;
use \Http\Response;

require 'autoload.php';

$front = new FrontController(
    new Router($_SERVER), new Dispatcher(new Request($_POST, $_GET, $_SERVER), new Response())
);
$front->run();
