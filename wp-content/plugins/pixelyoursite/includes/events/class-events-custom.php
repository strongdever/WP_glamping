<?php
namespace PixelYourSite;
class EventsCustom extends EventsFactory {
    private static $_instance;
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    static function getSlug() {
        return "custom";
    }

    private function __construct() {
        add_filter("pys_event_factory",[$this,"register"]);
    }

    function register($list) {
        $list[] = $this;
        return $list;
    }


    function getEvents(){
        return CustomEventFactory::get( 'active' );
    }

    function getCount()
    {
        if(!$this->isEnabled()) {
            return 0;
        }
        return count($this->getEvents());
    }

    function isEnabled()
    {
        return PYS()->getOption( 'custom_events_enabled' );
    }

    function getOptions()
    {
        return array();
    }

    /**
     * @param CustomEvent $event
     * @return bool
     */
    function isReadyForFire($event)
    {
        switch ($event->getTriggerType()) {

            case 'page_visit': {
                $triggers = $event->getPageVisitTriggers();
                return !empty( $triggers ) && compareURLs( $triggers );
            }

        }
        return false;
    }
    /**
     * @param CustomEvent $event
     * @return PYSEvent
     */
    function getEvent($event)
    {

        switch ($event->getTriggerType()) {
            case 'page_visit': {
                $singleEvent = new SingleEvent('custom_event',EventTypes::$STATIC,'custom');
                $singleEvent->args = $event;
                return $singleEvent;
            }

        }
    }
}
/**
 * @return EventsCustom
 */
function EventsCustom() {
    return EventsCustom::instance();
}

EventsCustom();
