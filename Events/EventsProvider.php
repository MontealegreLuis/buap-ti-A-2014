<?php
namespace Events;

interface EventsProvider
{
    /**
     * @param EventsDispatcher $dispatcher
     */
    public function setEventsDispatcher(EventsDispatcher $dispatcher);
}
