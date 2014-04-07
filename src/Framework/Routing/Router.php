<?php
namespace Framework\Routing;

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
            $routeParams = $this->processRouteParams(array_slice($routeParts, 2));
        } elseif (count($routeParts) === 2) {
            $controller = $routeParts[0];
            $action = $routeParts[1];
        } elseif (count($routeParts) === 1) {
            $controller = $routeParts[0];
        }

        return new Route($controller, $action, $routeParams);
    }

    /**
     * @param  array $params
     * @return array
     */
    protected function processRouteParams(array $params)
    {
        $routeParams = [];
        for ($i = 0 ; $i < count($params); $i++) {
            if ($i % 2 === 0) {
                $key = $params[$i];
            }
            if ($i % 2 === 1) {
                $routeParams[$key] = $params[$i];
            }
        }

        return $routeParams;
    }
}
