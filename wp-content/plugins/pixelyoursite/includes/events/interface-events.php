<?php
namespace PixelYourSite;

abstract class EventsFactory {


    static function getSlug(){
        return "";
    }
    abstract function getCount();
    abstract function isEnabled();
    abstract function getOptions();

    abstract  function getEvents();
    /**
     * Check is event ready for fire
     * @param $event
     * @return bool
     */
    abstract function isReadyForFire($event);

    /**
     * @param String $event
     * @return SingleEvent
     */
    abstract function getEvent($event);


    function generateEvents() {
        if(!$this->isEnabled())  return array();
        $eventsList = array();
        foreach ($this->getEvents() as $eventName) {
            if($this->isReadyForFire($eventName)) {

                foreach ( PYS()->getRegisteredPixels() as $pixel ) {
                    $events = $this->getEvent($eventName);
                    if(!is_array($events))  $events = array($events); // some type of events can return array

                    foreach ($events as $event) {
                        $singleEvents = $pixel->generateEvents( $event );
                        foreach ($singleEvents as $singleEvent) {
                            if(!apply_filters("pys_validate_pixel_event",true,$singleEvent,$pixel)) continue;
                            $eventsList[$pixel->getSlug()][] = $singleEvent;
                        }
                    }
                }
            }
        }

        return $eventsList;
    }
}
