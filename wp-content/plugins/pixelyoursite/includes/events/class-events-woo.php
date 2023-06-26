<?php
namespace PixelYourSite;


class EventsWoo extends EventsFactory {

    private $events = array(
        //"woo_frequent_shopper",
        //"woo_vip_client",
        //"woo_big_whale",
        "woo_view_content",
        //"woo_view_content_for_category",
        "woo_view_category",
        "woo_view_item_list",
        //"woo_view_item_list_single",
        //"woo_view_item_list_search",
        //"woo_view_item_list_shop",
        //"woo_view_item_list_tag",
        "woo_add_to_cart_on_cart_page",
        //"woo_add_to_cart_on_cart_page_category",
        "woo_add_to_cart_on_checkout_page",
        //"woo_add_to_cart_on_checkout_page_category",
        "woo_initiate_checkout",
        //"woo_initiate_checkout_category",
        "woo_purchase",
        //"woo_initiate_set_checkout_option",
        //"woo_initiate_checkout_progress_f",
        //"woo_initiate_checkout_progress_l",
        //"woo_initiate_checkout_progress_e",
        //"woo_initiate_checkout_progress_o",
        "woo_remove_from_cart",
        "woo_add_to_cart_on_button_click",
        //"woo_affiliate",
        //"woo_paypal",
        //"woo_select_content_category",
        //"woo_select_content_single",
        //"woo_select_content_search",
        //"woo_select_content_shop",
       // "woo_select_content_tag",
    );
    public $doingAMP = false;


    private static $_instance;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    static function getSlug() {
        return "woo";
    }

    private function __construct() {
        add_filter("pys_event_factory",[$this,"register"]);
    }

    function register($list) {
        $list[] = $this;
        return $list;
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
        if(PYS()->getOption( 'woo_complete_registration_enabled' ))
            $size++;
        return $size;
    }

    function isEnabled()
    {
        return isWooCommerceActive();
    }

    function getOptions() {

        if($this->isEnabled()) {
            global $post;
            $data = array(
                'enabled'                       => true,
                'enabled_save_data_to_orders'  => PYS()->getOption('woo_enabled_save_data_to_orders'),
                'addToCartOnButtonEnabled'      => PYS()->getOption( 'woo_add_to_cart_enabled' ) && PYS()->getOption( 'woo_add_to_cart_on_button_click' ),
                'addToCartOnButtonValueEnabled' => PYS()->getOption( 'woo_add_to_cart_value_enabled' ),
                'addToCartOnButtonValueOption'  => PYS()->getOption( 'woo_add_to_cart_value_option' ),
                'singleProductId'               => isWooCommerceActive() && is_singular( 'product' ) ? $post->ID : null,
                'removeFromCartSelector'        => isWooCommerceVersionGte( '3.0.0' )
                    ? 'form.woocommerce-cart-form .remove'
                    : '.cart .product-remove .remove',
                'addToCartCatchMethod'  => PYS()->getOption('woo_add_to_cart_catch_method')
            );

            return $data;
        } else {
            return array(
                'enabled' => false,
            );
        }

    }

    function isReadyForFire($event)
    {
        switch ($event) {
            case 'woo_add_to_cart_on_button_click': {
                return PYS()->getOption( 'woo_add_to_cart_enabled' )
                        && PYS()->getOption( 'woo_add_to_cart_on_button_click' )
                        && PYS()->getOption('woo_add_to_cart_catch_method') == "add_cart_js"; // or use in hook
            }


            case 'woo_remove_from_cart': {
                return PYS()->getOption( 'woo_remove_from_cart_enabled') && is_cart();
            }


            case 'woo_purchase' : {
                if(PYS()->getOption( 'woo_purchase_enabled' ) && is_order_received_page() &&
                    isset( $_REQUEST['key'] )  && $_REQUEST['key'] != ""
                    && empty($_REQUEST['wc-api']) // if is not api request
                ) {
                    $order_key = sanitize_key($_REQUEST['key']);
                    $order_id = (int) wc_get_order_id_by_order_key( $order_key );

                    $order = wc_get_order($order_id);
                    if(!$order) return false;
                    $status = "wc-".$order->get_status("edit");

                    $disabledStatuses = (array)PYS()->getOption("woo_order_purchase_disabled_status");

                    if( in_array($status,$disabledStatuses)) {
                        return false;
                    }
                    return true;
                }
                return false;
            }
            case 'woo_view_content' : {
                return PYS()->getOption( 'woo_view_content_enabled' ) && is_product();
            }
            case 'woo_view_category': {
                return PYS()->getOption( 'woo_view_category_enabled' ) &&  is_tax( 'product_cat' );
            }
            case 'woo_view_item_list': {
                return PYS()->getOption( 'woo_view_item_list_enabled' ) &&  is_tax( 'product_cat' );
            }
            case 'woo_add_to_cart_on_cart_page': {
                return PYS()->getOption( 'woo_add_to_cart_enabled' ) &&
                    PYS()->getOption( 'woo_add_to_cart_on_cart_page' ) &&
                    is_cart()
                    && count(WC()->cart->get_cart())>0;
            }
            case 'woo_add_to_cart_on_checkout_page': {
                return PYS()->getOption( 'woo_add_to_cart_enabled' ) && PYS()->getOption( 'woo_add_to_cart_on_checkout_page' )
                    && is_checkout() && ! is_wc_endpoint_url()
                    && count(WC()->cart->get_cart())>0;
            }

            case 'woo_initiate_checkout': {
                return PYS()->getOption( 'woo_initiate_checkout_enabled' ) && is_checkout() && ! is_wc_endpoint_url();
            }

        }
        return false;
    }

    function getEvent($event)
    {
        switch ($event) {
            case 'woo_remove_from_cart':{
                return $this->getRemoveFromCartEvents($event);
            }

            case 'woo_initiate_checkout':
            case 'woo_add_to_cart_on_checkout_page':
            case 'woo_add_to_cart_on_cart_page':
            case 'woo_view_category':
            case 'woo_view_item_list':
            case 'woo_view_content':
                return new SingleEvent($event,EventTypes::$STATIC,'woo');

            case 'woo_add_to_cart_on_button_click':
                return new SingleEvent($event,EventTypes::$DYNAMIC,'woo');
            case 'woo_purchase' : {
                $events = array();
                $order_key = sanitize_key($_REQUEST['key']);
                $order_id = (int) wc_get_order_id_by_order_key( $order_key );
                $order = wc_get_order($order_id);
                if($order) {
                    $order->update_meta_data("_pys_purchase_event_fired",true);
                    $order->save();
                }
                $events[] = new SingleEvent($event,EventTypes::$STATIC,'woo');

                // add child event complete_registration
                if(PYS()->getOption( 'woo_complete_registration_enabled' )) {
                    $events[] = new SingleEvent('woo_complete_registration',EventTypes::$STATIC,'woo');
                }


                return $events;
            }
        }
        error_log("Not handle event ".$event);
        return null;
    }

    private function isActive($event)
    {
        switch ($event) {
            case 'woo_add_to_cart_on_button_click': {
                return PYS()->getOption( 'woo_add_to_cart_enabled' ) && PYS()->getOption( 'woo_add_to_cart_on_button_click' );
            }

            case 'woo_remove_from_cart': {
                return PYS()->getOption( 'woo_remove_from_cart_enabled') ;
            }

            case 'woo_purchase' : {
                return PYS()->getOption( 'woo_purchase_enabled' );
            }


            case 'woo_view_content' : {
                return PYS()->getOption( 'woo_view_content_enabled' ) ;
            }
            case 'woo_view_category': {
                return PYS()->getOption( 'woo_view_category_enabled' ) ;
            }

            case 'woo_initiate_checkout': {
                return PYS()->getOption( 'woo_initiate_checkout_enabled' );
            }

        }
        return false;
    }

    function getRemoveFromCartEvents($eventId) {
        $events = [];
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $event = new SingleEvent($eventId,EventTypes::$DYNAMIC,self::getSlug());
            $event->args = ['key'=>$cart_item_key,'item'=>$cart_item];
            $events[]=$event;
        }
        return $events;
    }

    private function getWooCartActiveCategories($activeIds) {
        $fireForCategory = array();
        foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) {
            $_product =  wc_get_product( $cart_item['product_id'] );
            if(!$_product) continue;
            $productCat = $_product->get_category_ids();
            foreach ($activeIds as $key => $value) {
                if(in_array($key,$productCat)) {
                    $fireForCategory[] = $key;
                }
            }
        }
        return array_unique($fireForCategory);
    }

    private function getWooOrderActiveCategories($orderId,$activeIds) {
        $order = new \WC_Order( $orderId );

        $fireForCategory = array();
        foreach ($order->get_items() as $item) {
            $_product =  wc_get_product( $item->get_product_id() );
            if(!$_product) continue;
            $productCat = $_product->get_category_ids();
            foreach ($activeIds as $key => $value) {
                if(in_array($key,$productCat)) { // fire initiate_checkout for all category pixel
                    $fireForCategory[] = $key;
                }
            }
        }
        return array_unique($fireForCategory);
    }
    /**
     * Always returns empty customer LTV-related values to make plugin compatible with PRO version.
     * Used by Pinterest add-on.
     *
     * @return array
     */
    function getCustomerTotals($order_id = null){
         return [
            'ltv' => null,
            'avg_order_value' => null,
            'orders_count' => null,
        ];
    }

    function getEvents() {
        return $this->events;
    }
}

/**
 * @return EventsWoo
 */
function EventsWoo() {
    return EventsWoo::instance();
}

EventsWoo();
