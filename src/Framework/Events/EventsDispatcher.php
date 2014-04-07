<?php
namespace Framework\Events;

class EventsDispatcher
{
    /** @type Callable[] */
    protected $listeners = [];

    /**
     * @param string   $eventName
     * @param Callable $listener
     */
    public function attach($eventName, Callable $listener)
    {
        if (!isset($this->listeners[$eventName])) {
            $this->listeners[$eventName] = [];
        }
        $this->listeners[$eventName][] = $listener;
    }

    /**
     * @param string $eventName
     * @param mixed  $target
     */
    public function dispatch($eventName, $target)
    {
        foreach ($this->listeners[$eventName] as $listener) {
            $listener($target);
        }
    }
}
