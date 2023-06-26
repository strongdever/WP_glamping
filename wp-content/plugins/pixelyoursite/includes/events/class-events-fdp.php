<?php
namespace PixelYourSite;

class EventsFdp extends EventsFactory
{
    private $events = array(
        'fdp_view_content',
        'fdp_view_category',
        'fdp_add_to_cart',
        'fdp_purchase',
    );


    private static $_instance;

    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    static function getSlug() {
        return "fdp";
    }

    private function __construct()
    {
        add_filter("pys_event_factory",[$this,"register"]);
    }

    function register($list) {
        $list[] = $this;
        return $list;
    }
    function getEvents() {
        return $this->events;
    }

    function getCount()
    {
        return 0;
    }

    function isEnabled()
    {
        return Facebook()->enabled() && PYS()->getOption( 'fdp_enabled' );
    }

    function getOptions()
    {
        return array();
    }

    function isReadyForFire($event)
    {
        switch ($event) {
            case 'fdp_purchase':
            case 'fdp_add_to_cart':
            case 'fdp_view_content': {
                return is_single() && get_post_type() == 'post';
            }
            case 'fdp_view_category': {
                return is_category();
            }
        }
    }

    function getEvent($event)
    {
        switch ($event) {
            case 'fdp_view_category':
            case 'fdp_view_content': {
                return new SingleEvent($event,EventTypes::$STATIC,'fdp');
            }
            case 'fdp_add_to_cart':
            case 'fdp_purchase': {
                return new SingleEvent($event,EventTypes::$TRIGGER,'fdp');
            }
        }
    }
}

/**
 * @return EventsFdp
 */
function EventsFdp() {
    return EventsFdp::instance();
}

EventsFdp();
