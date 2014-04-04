<?php
namespace Routing;

use Http\Request;
use Http\Response;
class Dispatcher
{
    /** @type Request */
    protected $request;

    /** @type Response */
    protected $response;

    /**
     * @param Request  $request
     * @param Response $response
     * @param Route    $route
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param Route $route
     * @todo
     */
    public function dispatch(Route $route)
    {
        /*$data = $controller->{$route->action}($route->params);

        $view->assign($data);
        $content = $view->render();*/

        $response = new Response();
        $response->setBody('$content');

        return $response;
    }
}
