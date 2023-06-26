<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/*
 * @see https://github.com/facebook/facebook-php-business-sdk
 * This class use for sending facebook server events
 */

require_once PYS_FREE_PATH . '/modules/facebook/facebook-server-async-task.php';
require_once PYS_FREE_PATH . '/modules/facebook/PYSServerEventHelper.php';

use PYS_PRO_GLOBAL\FacebookAds\Api;
use PYS_PRO_GLOBAL\FacebookAds\Http\Exception\RequestException;
use PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\EventRequest;


class FacebookServer {

    private static $_instance;
    private $isEnabled;
    private $hours = ['00-01', '01-02', '02-03', '03-04', '04-05', '05-06', '06-07', '07-08',
        '08-09', '09-10', '10-11', '11-12', '12-13', '13-14', '14-15', '15-16', '16-17',
        '17-18', '18-19', '19-20', '20-21', '21-22', '22-23', '23-24'
    ];
    private $access_token;
    private $testCode;
    private $isDebug;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }


    public function __construct() {

        $this->isEnabled = Facebook()->enabled() && Facebook()->isServerApiEnabled();
        $this->isDebug = PYS()->getOption( 'debug_enabled' );

        if($this->isEnabled) {
            add_action( 'woocommerce_checkout_update_order_meta',array($this,'saveFbTagsInOrder'),10, 2);
            add_action( 'wp_ajax_pys_api_event',array($this,"catchAjaxEvent"));
            add_action( 'wp_ajax_nopriv_pys_api_event', array($this,"catchAjaxEvent"));
            add_action( 'woocommerce_remove_cart_item', array($this, 'trackRemoveFromCartEvent'), 10, 2);
            add_action( 'woocommerce_add_to_cart', array($this, 'trackAddToCartEvent'), 40, 4);

            //add_action( 'woocommerce_order_status_completed', array( $this, 'completed_purchase' ) );
            // initialize the s2s event async task
            new FacebookAsyncTask();
        }
    }

    /**
     * Send event in shutdown hook (not work in ajax)
     * @param SingleEvent[] $events
     */
    public function sendEventsAsync($events) {

        $serverEvents = [];
        foreach ($events as $event) {
            $ids = $event->payload['pixelIds'];
            $serverEvents[] = [
                "pixelIds" => $ids,
                "event" => ServerEventHelper::mapEventToServerEvent($event)
            ];
        }

        if(count($serverEvents) > 0) {
            do_action('pys_send_server_event', $serverEvents);
        }
    }

    /**
     * Send Event Now
     *
     * @param SingleEvent[] $events
     */
    public function sendEventsNow($events) {

        foreach ($events as $event) {
            $serverEvent = ServerEventHelper::mapEventToServerEvent($event);
            $ids = $event->payload['pixelIds'];

            $this->sendEvent($ids,$serverEvent);
        }
    }


    /**
     * Tracks a completed purchase
     *
     * @param int $order_id the order ID
     */
    function completed_purchase($order_id) {
        $order = wc_get_order($order_id);
        if(!$order
            || $order->get_meta( '_pys_purchase_event_fired', true )
            || !PYS()->getOption( 'woo_purchase_enabled' )) {
            return;
        }
        add_filter("pys_woo_checkout_order_id",function () use ($order_id) {return $order_id;});
        $event = EventsWoo()->getEvent('woo_purchase');
        if ( $event == null ) {
            return;
        }
        $events = Facebook()->generateEvents($event);

        foreach ($events as $singleEvent) {
            if(isset($_COOKIE['pys_landing_page']))
                $singleEvent->addParams(['landing_page'=>$_COOKIE['pys_landing_page']]);
        }

        $this->sendEventsNow($events);
    }

    function trackAddToCartEvent($cart_item_key, $product_id, $quantity, $variation_id) {
        if(EventsWoo()->isReadyForFire("woo_add_to_cart_on_button_click")
            && PYS()->getOption('woo_add_to_cart_catch_method') == "add_cart_js")
        {
            PYS()->getLog()->debug('trackAddToCartEvent send fb server with out browser event');
            if( !empty($variation_id)
                && $variation_id > 0
                && ( !Facebook()->getOption( 'woo_variable_as_simple' )
                    || ( Facebook()->getSlug() == "facebook"
                        && !Facebook\Helpers\isDefaultWooContentIdLogic()
                    )
                )
            ) {
                $_product_id = $variation_id;
            } else {
                $_product_id = $product_id;
            }

            $event =  new SingleEvent("woo_add_to_cart_on_button_click",EventTypes::$DYNAMIC,'woo');
            $event->args = ['productId' => $_product_id,'quantity' => $quantity];
            add_filter('pys_conditional_post_id', function($id) use ($product_id) { return $product_id; });
            $events = Facebook()->generateEvents($event);
            remove_all_filters('pys_conditional_post_id');

            foreach ($events as $singleEvent) {

                if(isset($_COOKIE['pys_landing_page']))
                    $singleEvent->addParams(['landing_page'=>$_COOKIE['pys_landing_page']]);

                if(isset($_COOKIE["pys_fb_event_id"])) {
                    $singleEvent->payload['eventID'] = json_decode(stripslashes($_COOKIE["pys_fb_event_id"]))->AddToCart;
                }
            }

            $this->sendEventsAsync($events);
        }

    }

    /**
     * @param String $cart_item_key
     * @param \WC_Cart $cart
     */

    function trackRemoveFromCartEvent ($cart_item_key,$cart) {
        $eventId = 'woo_remove_from_cart';

        $url = $_SERVER['HTTP_HOST'].strtok($_SERVER["REQUEST_URI"], '?');
        $postId = url_to_postid($url);
        $cart_id = wc_get_page_id( 'cart' );
        $item = $cart->get_cart_item($cart_item_key);



        if(PYS()->getOption( 'woo_remove_from_cart_enabled') && $cart_id==$postId) {
            PYS()->getLog()->debug('trackRemoveFromCartEvent send fb server with out browser event');
            $event = new SingleEvent("woo_remove_from_cart",EventTypes::$STATIC,'woo');
            $event->args=['item'=>$item];

            $events = Facebook()->generateEvents($event);

            foreach ($events as $singleEvent) {
                $singleEvent->addParams(getStandardParams());
                if(isset($_COOKIE['pys_landing_page'])){
                    $singleEvent->addParams(['landing_page'=>$_COOKIE['pys_landing_page']]);
                }
                if(isset($_COOKIE["pys_fb_event_id"])) {
                    $singleEvent->payload['eventID'] = json_decode(stripslashes($_COOKIE["pys_fb_event_id"]))->RemoveFromCart;
                }

            }

            $this->sendEventsAsync($events);
        }
    }

    /*
     * If server message is blocked by gprg or it dynamic
     * we send data by ajax request from js and send the same data like browser event
     */
    function catchAjaxEvent() {
        PYS()->getLog()->debug('catchAjaxEvent send fb server from ajax');
        $event = $_POST['event'];
        $data = isset($_POST['data']) ? $_POST['data'] : array();
        $ids = $_POST['ids'];
        $eventID = $_POST['eventID'];
        $wooOrder = isset($_POST['woo_order']) ? $_POST['woo_order'] : null;
        $eddOrder = isset($_POST['edd_order']) ? $_POST['edd_order'] : null;


        if ( empty( $_REQUEST['ajax_event'] ) || !wp_verify_nonce( $_REQUEST['ajax_event'], 'ajax-event-nonce' ) ) {
            wp_die();
            return;
        }

        if($event == "hCR") $event="CompleteRegistration"; // de mask completer registration event if it was hidden

        $singleEvent = $this->dataToSingleEvent($event,$data,$eventID,$ids,$wooOrder,$eddOrder);

        $this->sendEventsNow([$singleEvent]);

        wp_die();
    }

    /**
     * @param $eventName
     * @param $params
     * @param $eventID
     * @param $ids
     * @param $wooOrder
     * @param $eddOrder
     * @return SingleEvent
     */
    private function dataToSingleEvent($eventName,$params,$eventID,$ids,$wooOrder,$eddOrder) {
        $singleEvent = new SingleEvent("","");

        $payload = [
            'name' => $eventName,
            'eventID'   => $eventID,
            'woo_order' => $wooOrder,
            'edd_order' => $eddOrder,
            'pixelIds'  => $ids
        ];
        $singleEvent->addParams($params);
        $singleEvent->addPayload($payload);

        return $singleEvent;
    }



    /**
     * Send event for each pixel id
     * @param array $pixel_Ids //array of facebook ids
     * @param \PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\Event $event //One Facebook event object
     */
    function sendEvent($pixel_Ids, $event) {

        if (!$event || apply_filters('pys_disable_server_event_filter',false)) {
            return;
        }

        if(!$this->access_token) {
            $this->access_token = Facebook()->getApiToken();
            $this->testCode = Facebook()->getApiTestCode();
        }

        foreach($pixel_Ids  as $pixel_Id) {

            if(empty($this->access_token[$pixel_Id])) continue;

            $event->setEventId($event->getEventId());

            $api = Api::init(null, null, $this->access_token[$pixel_Id],false);

            /**
             * filter pys_before_send_fb_server_event
             * Help add custom options or get data from event before send
             * FacebookAds\Object\ServerSide\Event $event
             * String $pixel_Id
             * String EventId
             */
            $event = apply_filters("pys_before_send_fb_server_event",$event,$pixel_Id,$event->getEventId());

            $request = (new EventRequest($pixel_Id))->setEvents([$event]);
            $request->setPartnerAgent("dvpixelyoursite");
            if(!empty($this->testCode[$pixel_Id])) {
                $request->setTestEventCode($this->testCode[$pixel_Id]);
            }

            PYS()->getLog()->debug('Send FB server event',$request);
            try{
                $response = $request->execute();
                PYS()->getLog()->debug('Response from FB server',$response);
            } catch (\Exception   $e) {
                if($e instanceof RequestException) {
                    PYS()->getLog()->error('Error send FB server event '.$e->getErrorUserMessage(),$e->getResponse());
                } else {
                    PYS()->getLog()->error('Error send FB server event',$e);
                }
            }
        }
    }

    public function saveFbTagsInOrder($order_id, $data) {
        $pysData = [];
        $pysData['fbc'] = ServerEventHelper::getFbc();
        $pysData['fbp'] = ServerEventHelper::getFbp();
        $order = wc_get_order($order_id);
        if($order) {
            $order->update_meta_data("pys_fb_cookie",$pysData);
            $order->save();
        }
    }

}

/**
 * @return FacebookServer
 */
function FacebookServer() {
    return FacebookServer::instance();
}

FacebookServer();





