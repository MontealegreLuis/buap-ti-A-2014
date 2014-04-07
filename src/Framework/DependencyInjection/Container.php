<?php
namespace Framework\DependencyInjection;

class Container
{
    /** @type mixed[] */
    protected $objects = [];

    /** @type Callable */
    protected $factories = [];

    /**
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        foreach ($configuration as $key =>$value) {
            $this->set($key, $value);
        }
    }

    /**
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {
        if (isset($objects[$key])) {
            return $objects[$key];
        }
        $factory = $this->factories[$key];
        $objects[$key] = $factory($this);

        return $objects[$key];
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        if (is_callable($value)) {
            $this->factories[$key] = $value;

            return;
        }
        $this->objects[$key] = $value;
    }
}
