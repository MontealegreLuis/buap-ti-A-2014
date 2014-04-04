<?php
namespace Routing;

use \SplFileInfo;

class Router
{
    /** @type string[] */
    protected $server;

    /**
     * @param string[] $server
     */
    public function __construct(array $server)
    {
        $this->server = $server;
    }

    /**
     * @param  array $this->server
     * @return Route
     */
    public function route()
    {
        $scriptName = new SplFileInfo($this->server['SCRIPT_NAME']);
        $requestedUrl = substr($this->server['REQUEST_URI'], strlen($scriptName->getPath()));

        $routeParts = explode('/', ltrim($requestedUrl, '/'));

        $controller = $action = 'index';
        $routeParams = [];

        if (count($routeParts) > 2) {
            $controller = $routeParts[0];
            $action = $routeParts[1];
            $routeParams = array_slice($routeParts, 2);
        } elseif (count($routeParts) === 2) {
            $controller = $routeParts[0];
            $action = $routeParts[1];
        } elseif (count($routeParts) === 1) {
            $controller = $routeParts[0];
        }

        return new Route($controller, $action, $routeParams);
    }
}
