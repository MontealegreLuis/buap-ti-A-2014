<?php
namespace Framework\Routing;

use Framework\Http\Request;
use Framework\Http\Response;
use Framework\View\View;
use Framework\DependencyInjection\Container;

class Dispatcher
{
    /** @type Request */
    protected $request;

    /** @type Response */
    protected $response;

    /** @type View */
    protected $view;

    /** @type Container */
    protected $controllerResolver;

    /**
     * @param Request  $request
     * @param Response $response
     * @param Route    $route
     */
    public function __construct(
        Request $request,
        Response $response,
        View $view,
        Container $controllerResolver
    )
    {
        $this->request = $request;
        $this->response = $response;
        $this->view = $view;
        $this->controllerResolver = $controllerResolver;
    }

    /**
     * @param Route $route
     * @todo
     */
    public function dispatch(Route $route)
    {
        $controller = $this->controllerResolver->get("{$route->controller}.{$route->action}");
        $data = $controller->{"{$route->action}Action"}($this->request, $this->response, $route->params);

        $this->view->assign($data);
        $content = $this->view->render("{$route->controller}/{$route->action}.phtml");

        $this->response->setBody($content);

        return $this->response;
    }
}
