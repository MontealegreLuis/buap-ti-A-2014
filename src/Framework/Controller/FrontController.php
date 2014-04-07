<?php
namespace Framework\Controller;

use \Framework\Routing\Router;
use \Framework\Routing\Dispatcher;

class FrontController
{
    /** @type Router */
    protected $router;

    /** @type Dispatcher */
    protected $dispatcher;

    /**
     * @param Router $router
     */
    public function __construct(Router $router, Dispatcher $dispatcher)
    {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Route the request, dispatch it and send the response back.
     */
    public function run()
    {
        $route = $this->router->route();
        $response = $this->dispatcher->dispatch($route);
        $response->send();
    }
}
