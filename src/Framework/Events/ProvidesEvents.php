<?php
namespace Framework\Events;

trait ProvidesEvents
{
    /** @type EventsDispatcher */
    protected $dispatcher;

    /**
     * @param EventsDispatcher $dispatcher
     */
    public function setEventsDispatcher(EventsDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
}
