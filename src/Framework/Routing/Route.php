<?php
namespace Framework\Routing;

/**
 * @property string   $controller
 * @property string   $action
 * @property string[] $params
 */
class Route
{
    /** @type string */
    protected $controller;

    /** @type string */
    protected $action;

    /** @type string[] */
    protected $params;

    /**
     * @param string   $controller
     * @param string   $action
     * @param string[] $params
     */
    public function __construct($controller, $action, array $params)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    /**
     * @param  string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->{$property};
    }
}
