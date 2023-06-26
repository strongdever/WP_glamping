<?php

namespace PixelYourSite;
/**
 * @deprecated
 */
class GroupedEvent extends PYSEvent
{
    private $events = array();
    public function __construct($id, $type,$category='') {
        parent::__construct($id, $type,$category);
    }

    /**
     * @param PYSEvent $event
     */
    public function addEvent($event) {
        $this->events[] = $event;
    }

    /**
     * @return PYSEvent[]
     */
    public function getEvents() {
        return $this->events;
    }


}
