<?php
namespace PixelYourSite;

/*
 * Automatic Events we will fire this event in order to capture all actions  like clicks, video
views, downloads, comments, forms.
 * */

class EventsAutomatic extends EventsFactory {
    private static $_instance;

    private $events = array(
        'automatic_event_form' ,
        'automatic_event_signup' ,
        'automatic_event_login' ,
        'automatic_event_download' ,
        'automatic_event_comment' ,

        'automatic_event_scroll' ,
        'automatic_event_time_on_page' ,
        'automatic_event_search' ,
    );

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    private function __construct() {
        add_filter("pys_event_factory",[$this,"register"]);
    }

    function register($list) {
        $list[] = $this;
        return $list;
    }

    static function getSlug() {
        return "automatic";
    }

    function getEvents() {
        return $this->events;
    }

    function getCount() {
        $count = 0;
        if($this->isEnabled()) {
            foreach ($this->events as $event) {
                if(PYS()->getOption($event."_enabled")) {
                    $count++;
                }
            }
        }
        return $count;
    }


    function isEnabled() {
        return PYS()->getOption("automatic_events_enabled");
    }

    // return option for js part
    function getOptions() {
        return array(

        );
    }

    /**
     * Check is event ready for fire
     * @param $event
     * @return bool
     */
    function isReadyForFire($event) {

        if(!$this->isEnabled()) return false;

        if(!in_array($event,$this->events)) return false;

        switch($event) {

            case "automatic_event_login" : {
                if($user_id = get_current_user_id()) {
                    if (get_user_meta($user_id, 'pys_just_login', true)) {
                        delete_user_meta($user_id, 'pys_just_login');
                        return PYS()->getOption( $event."_enabled");
                    }
                }
                return false;
            }
            case 'automatic_event_signup' : {
                if ( $user_id = get_current_user_id() ) {
                    if ( get_user_meta( $user_id, 'pys_complete_registration', true ) ) {
                        return PYS()->getOption( $event."_enabled");
                    }
                }
                return false;
            }
            case 'automatic_event_search' : {
                return  PYS()->getOption( $event."_enabled") && is_search();
            }
            default: {
                return PYS()->getOption( $event."_enabled");
            }
        }
    }

    /**
     * @param String $event
     * @return SingleEvent
     */
    function getEvent($event) {
        $payload = [];
        $params = [];
        $item =  new SingleEvent($event,EventTypes::$DYNAMIC,self::getSlug());
        switch ($event) {


            case "automatic_event_form": {
                $payload['name'] = 'Form';
            }break;
            case "automatic_event_download": {
                $payload['name'] = 'Download';
                $payload["extensions"] = PYS()->getOption( 'automatic_event_download_extensions' );
            }break;
            case "automatic_event_comment": {
                $payload['name'] = 'Comment';
            }break;

            case "automatic_event_scroll": {
                $payload['name'] = 'PageScroll';
                $payload["scroll_percent"] = PYS()->getOption('automatic_event_scroll_value');
            }break;
            case "automatic_event_time_on_page": {
                $payload['name'] = 'TimeOnPage';
                $payload["time_on_page"] = PYS()->getOption('automatic_event_time_on_page_value');

            }break;
            case "automatic_event_search":
            case "automatic_event_signup":
            case "automatic_event_login": {
                $item =  new SingleEvent($event,EventTypes::$STATIC,self::getSlug());
            }  break;
        }

        $item->addParams($params);
        $item->addPayload($payload);
        return $item;
    }

}

/**
 * @return EventsAutomatic
 */
function EventsAutomatic() {
    return EventsAutomatic::instance();
}

EventsAutomatic();