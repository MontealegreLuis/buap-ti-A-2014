<?php
use \Framework\Controller\FrontController;
use \Framework\Routing\Router;
use \Framework\Routing\Dispatcher;
use \Framework\Http\Request;
use \Framework\Http\Response;
use \Framework\View\View;
use \Framework\DependencyInjection\Container;

require 'vendor/autoload.php';

$front = new FrontController(
    new Router($_SERVER),
    new Dispatcher(
        new Request($_POST, $_GET, $_SERVER),
        new Response(),
        new View(__DIR__ . '/views', __DIR__ . '/views/layout.phtml'),
        new Container(require 'config/services.php')
    )
);
$front->run();
