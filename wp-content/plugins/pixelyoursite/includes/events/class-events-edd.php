<?php
namespace PixelYourSite;

class EventsEdd extends EventsFactory {
    private $events = array(
        //'edd_frequent_shopper', pro
        //'edd_vip_client',pro
        //'edd_big_whale',pro
        'edd_view_content',
        'edd_view_category',
        'edd_add_to_cart_on_checkout_page',
        'edd_remove_from_cart',
        'edd_initiate_checkout',
        'edd_purchase',
        'edd_add_to_cart_on_button_click'
    );


    private static $_instance;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    static function getSlug() {
        return "edd";
    }

    private function __construct() {
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
        $size = 0;
        if(!$this->isEnabled()) {
            return 0;
        }
        foreach ($this->events as $event) {
            if($this->isActive($event)){
                $size++;
            }
        }
        return $size;
    }

    function isEnabled()
    {
        return isEddActive();
    }

    function getOptions()
    {
        if($this->isEnabled()) {
            return array(
                'enabled'                       => true,
                'enabled_save_data_to_orders'  => PYS()->getOption('edd_enabled_save_data_to_orders'),
                'addToCartOnButtonEnabled'      => isEventEnabled( 'edd_add_to_cart_enabled' ) && PYS()->getOption( 'edd_add_to_cart_on_button_click' ),
                'addToCartOnButtonValueEnabled' => PYS()->getOption( 'edd_add_to_cart_value_enabled' ),
                'addToCartOnButtonValueOption'  => PYS()->getOption( 'edd_add_to_cart_value_option' ),
            );
        } else {
            return array(
                'enabled'                       => false
            );
        }
    }

    function isReadyForFire($event)
    {
        switch ($event) {
            case 'edd_add_to_cart_on_button_click': {
                return PYS()->getOption( 'edd_add_to_cart_enabled' ) && PYS()->getOption( 'edd_add_to_cart_on_button_click' );
            }
            case 'edd_purchase': {
                if(PYS()->getOption( 'edd_purchase_enabled' ) && edd_is_success_page()) {
                    /**
                     * When a payment gateway used, user lands to Payment Confirmation page first, which does automatic
                     * redirect to Purchase Confirmation page. We filter Payment Confirmation to avoid double Purchase event.
                     */
                    if ( isset( $_GET['payment-confirmation'] ) ) {
                        //@fixme: some users will not reach success page and event will not be fired
                        //return;
                    }
                    $payment_key = getEddPaymentKey();
                    $order_id = (int) edd_get_purchase_id_by_key( $payment_key );
                    $status = edd_get_payment_status( $order_id );

                    // pending payment status used because we can't fire event on IPN
                    if ( strtolower( $status ) != 'publish' && strtolower( $status ) != 'pending' &&  strtolower( $status ) != 'complete' ) {
                        return false;
                    }

                    update_post_meta( $order_id, '_pys_purchase_event_fired', true );
                    return true;
                }
                return false;
            }
            case 'edd_initiate_checkout': {
                return  PYS()->getOption( 'edd_initiate_checkout_enabled' ) && edd_is_checkout();
            }
            case 'edd_remove_from_cart': {
                return PYS()->getOption( 'edd_remove_from_cart_enabled') && edd_is_checkout();
            }
            case 'edd_add_to_cart_on_checkout_page' : {
                return PYS()->getOption( 'edd_add_to_cart_enabled' ) && PYS()->getOption( 'edd_add_to_cart_on_checkout_page' )
                    && edd_is_checkout();
            }
            case 'edd_view_category': {
                return PYS()->getOption( 'edd_view_category_enabled' ) && is_tax( 'download_category' );
            }
            case 'edd_view_content' : {
                return PYS()->getOption( 'edd_view_content_enabled' ) && is_singular( 'download' );
            }



        }
        return false;
    }

    function getEvent($event)
    {
        switch ($event) {
            case 'edd_initiate_checkout':
            case 'edd_purchase':
            case 'edd_add_to_cart_on_checkout_page' :
            case 'edd_view_category':
            case 'edd_view_content':{
                return new SingleEvent($event,EventTypes::$STATIC,'edd');
            }

            case 'edd_remove_from_cart': {
                return $this->getRemoveFromCartEvents($event);
            }
            case 'edd_add_to_cart_on_button_click': {

                return new SingleEvent($event,EventTypes::$DYNAMIC,'edd');
            }
        }
    }

    private function isActive($event)
    {
        switch ($event) {
            case 'edd_add_to_cart_on_button_click': {
                return PYS()->getOption( 'edd_add_to_cart_enabled' ) && PYS()->getOption( 'edd_add_to_cart_on_button_click' );
            }
            case 'edd_purchase': {
                return PYS()->getOption( 'edd_purchase_enabled' );
            }
            case 'edd_initiate_checkout': {
                return  PYS()->getOption( 'edd_initiate_checkout_enabled' ) ;
            }
            case 'edd_remove_from_cart': {
                return PYS()->getOption( 'edd_remove_from_cart_enabled');
            }
            case 'edd_add_to_cart_on_checkout_page' : {
                return PYS()->getOption( 'edd_add_to_cart_enabled' ) && PYS()->getOption( 'edd_add_to_cart_on_checkout_page' );
            }
            case 'edd_view_category': {
                return PYS()->getOption( 'edd_view_category_enabled' ) ;
            }
            case 'edd_view_content' : {
                return PYS()->getOption( 'edd_view_content_enabled' ) ;
            }

        }
        return false;
    }

    private function getRemoveFromCartEvents($eventId) {
        $events = [];


        foreach (edd_get_cart_contents() as $cart_item_key => $cart_item) {
            $event = new SingleEvent($eventId,EventTypes::$DYNAMIC,self::getSlug());
            $event->args = ['key'=>$cart_item_key,'item'=>$cart_item];
            $events[]=$event;
        }
        return $events;
    }

    private function getEddCartActiveCategories($categoryPixels){
        $catIds = array();
        $keys = array_keys($categoryPixels);
        $cart = edd_get_cart_contents();
        foreach ( $cart as $cart_item_key => $cart_item ) {
            $download_id   = (int) $cart_item['id'];
            $productCatIds = Facebook\HelpersCategory\getIntersectEddProduct($download_id,$keys);
            foreach ($productCatIds as $id) {
                if(!in_array($categoryPixels[$id],$catIds)) // disable duplicate pixel_id
                    $catIds[]=$id;
            }
        }
        return array_unique($catIds);
    }

}

/**
 * @return EventsEdd
 */
function EventsEdd() {
    return EventsEdd::instance();
}

EventsEdd();
