<?php
namespace PixelYourSite;

use PixelYourSite;
use PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\Event;
use PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\UserData;
use PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\CustomData;
use PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\Content;
defined('ABSPATH') or die('Direct access not allowed');


class ServerEventHelper {

    /**
     * @param SingleEvent $event
     * @return Event | null
     */
    public static function mapEventToServerEvent($event) {

        $eventData = $event->getData();
        $eventData = EventsManager::filterEventParams($eventData,$event->getCategory(),[
            'event_id'=>$event->getId(),
            'pixel'=>Facebook()->getSlug()
        ]);

        $eventName = $eventData['name'];
        $eventParams = $eventData['params'];
        $eventId = $event->payload['eventID'];
        $wooOrder = isset($event->payload['woo_order']) ? $event->payload['woo_order'] : null;
        $eddOrder = isset($event->payload['edd_order']) ? $event->payload['edd_order'] : null;

        if(!$eventId) return null;

        $user_data = ServerEventHelper::getUserData($wooOrder,$eddOrder)
            ->setClientIpAddress(self::getIpAddress())
            ->setClientUserAgent(self::getHttpUserAgent());


        $fbp = self::getFbp();
        $fbc = self::getFbc();

        if(!$fbp && $wooOrder) {
            $fbp = ServerEventHelper::getFbStatFromOrder('fbp',$wooOrder);
        }
        if(!$fbc && $wooOrder) {
            $fbc = ServerEventHelper::getFbStatFromOrder('fbc',$wooOrder);
        }

        $user_data->setFbp($fbp);
        $user_data->setFbc($fbc);

        $customData = self::paramsToCustomData($eventParams);
        $uri = self::getRequestUri(PYS()->getOption('enable_remove_source_url_params'));

        // set custom uri use in ajax request
        if(isset($_POST['url'])) {
            if(PYS()->getOption('enable_remove_source_url_params')) {
                $list = explode("?",$_POST['url']);
                if(is_array($list) && count($list) > 0) {
                    $uri = $list[0];
                } else {
                    $uri = $_POST['url'];
                }
            } else {
                $uri = $_POST['url'];
            }
        }

        $event = (new Event())
            ->setEventName($eventName)
            ->setEventTime(time())
            ->setEventId($eventId)
            ->setEventSourceUrl($uri)
            ->setActionSource("website")
            ->setCustomData($customData)
            ->setUserData($user_data);


        return $event;
    }

    /**
     * @param $key
     * @param $wooOrder
     * @return string|null
     */
    private static function getFbStatFromOrder($key,$wooOrder) {

        $order = wc_get_order( $wooOrder );
        if($order) {
            $fbCookie = $order->get_meta('pys_fb_cookie',true);
            if($fbCookie){
                if(!empty($fbCookie[$key])) {
                    return $fbCookie[$key];
                }
            }
        }
        return null;
    }


    private static function getIpAddress() {
        $HEADERS_TO_SCAN = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );

        foreach ($HEADERS_TO_SCAN as $header) {
            if (array_key_exists($header, $_SERVER)) {
                $ip_list = explode(',', $_SERVER[$header]);
                foreach($ip_list as $ip) {
                    $trimmed_ip = trim($ip);
                    if (self::isValidIpAddress($trimmed_ip)) {
                        return $trimmed_ip;
                    }
                }
            }
        }

        return "127.0.0.1";
    }

    private static function isValidIpAddress($ip_address) {
        return filter_var($ip_address,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4
            | FILTER_FLAG_IPV6
            | FILTER_FLAG_NO_PRIV_RANGE
            | FILTER_FLAG_NO_RES_RANGE);
    }

    private static function getHttpUserAgent() {
        $user_agent = null;

        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
        }

        return $user_agent;
    }

    private static function getRequestUri($removeQuery = false) {
        $request_uri = null;

        if (!empty($_SERVER['REQUEST_URI'])) {
            $start = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://";
            $request_uri = $start.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        }
        if($removeQuery && isset($_SERVER['QUERY_STRING'])) {
            $request_uri = str_replace("?".$_SERVER['QUERY_STRING'],"",$request_uri);
        }


        return $request_uri;
    }

    public static function getFbp() {
        $fbp = null;

        if (!empty($_COOKIE['_fbp'])) {
            $fbp = $_COOKIE['_fbp'];
        }

        return $fbp;
    }

    public static function getFbc() {
        $fbc = null;

        if (!empty($_COOKIE['_fbc'])) {
            $fbc = $_COOKIE['_fbc'];
        }

        return $fbc;
    }

    private static function getUserData($wooOrder = null,$eddOrder = null) {
        $userData = new UserData();

        /**
         * Add purchase WooCommerce Advanced Matching params
         */
        if ( PixelYourSite\isWooCommerceActive() && isEventEnabled( 'woo_purchase_enabled' ) &&
            ($wooOrder || ( is_order_received_page() && wooIsRequestContainOrderId() ))
        ) {
            if(wooIsRequestContainOrderId()) {
                $order_id = wooGetOrderIdFromRequest();
            } else {
                $order_id = $wooOrder;
            }

            $order = wc_get_order( $order_id );

            if ( $order ) {

                if ( PixelYourSite\isWooCommerceVersionGte( '3.0.0' ) ) {
                    if($order->get_billing_postcode()) {
                        $userData->setZipCode($order->get_billing_postcode());
                    }
                    if($order->get_billing_country()) {
                        $userData->setCountryCode(strtolower($order->get_billing_country()));
                    }
                    if($order->get_billing_email()) {
                        $userData->setEmail($order->get_billing_email());
                    }

                    if($order->get_billing_phone()) {
                        $userData->setPhone($order->get_billing_phone());
                    }

                    if($order->get_billing_first_name()) {
                        $userData->setFirstName($order->get_billing_first_name());
                    }

                    if($order->get_billing_last_name()) {
                        $userData->setLastName($order->get_billing_last_name());
                    }

                    if($order->get_billing_city()) {
                        $userData->setCity($order->get_billing_city());
                    }

                    if($order->get_billing_state()) {
                        $userData->setState($order->get_billing_state());
                    }

                } else {
                    if($order->billing_postcode) {
                        $userData->setZipCode($order->billing_postcode);
                    }
                    $userData->setCountryCode(strtolower($order->billing_country));
                    $userData->setEmail($order->billing_email);
                    $userData->setPhone($order->billing_phone);
                    $userData->setFirstName($order->billing_first_name);
                    $userData->setLastName($order->billing_last_name);
                    $userData->setCity($order->billing_city);
                    $userData->setState($order->billing_state);
                }
            } else {
                return ServerEventHelper::getRegularUserData();
            }

        } else {

            if(PixelYourSite\isEddActive() && isEventEnabled( 'edd_purchase_enabled' ) &&
                ($eddOrder ||  edd_is_success_page()) ) {

                if($eddOrder)
                    $payment_id = $eddOrder;
                else {
                    $payment_key = getEddPaymentKey();
                    $payment_id = (int) edd_get_purchase_id_by_key( $payment_key );
                }
                $user_info = edd_get_payment_meta_user_info($payment_id);
                $email = edd_get_payment_user_email($payment_id);
                if($email) {
                    $userData->setEmail($email);
                }


                if(isset($user_info['first_name']))
                    $userData->setFirstName($user_info['first_name']);
                if(isset($user_info['last_name']))
                    $userData->setLastName($user_info['last_name']);

            } else {
                return ServerEventHelper::getRegularUserData();
            }
        }



        return $userData;
    }

    private static function getRegularUserData() {
        $user = wp_get_current_user();
        $userData = new UserData();
        if ( $user->ID ) {
            // get user regular data
            $userData->setFirstName($user->get( 'user_firstname' ));
            $userData->setLastName($user->get( 'user_lastname' ));
            $userData->setEmail($user->get( 'user_email' ));

            /**
             * Add common WooCommerce Advanced Matching params
             */
            if ( PixelYourSite\isWooCommerceActive() ) {
                // if first name is not set in regular wp user meta
                if (empty($userData->getFirstName())) {
                    $userData->setFirstName($user->get('billing_first_name'));
                }

                // if last name is not set in regular wp user meta
                if (empty($userData->getLastName())) {
                    $userData->setLastName($user->get('billing_last_name'));
                }

                if($user->get('billing_phone'))
                    $userData->setPhone($user->get('billing_phone'));
                if($user->get('billing_city'))
                    $userData->setCity($user->get('billing_city'));
                if($user->get('billing_state'))
                    $userData->setState($user->get('billing_state'));
                if($user->get('shipping_country'))
                    $userData->setCountryCode(strtolower($user->get('shipping_country')));
                if($user->get('billing_postcode')) {
                    $userData->setZipCode($user->get('billing_postcode'));
                }
            }
        } else {
            // $userData->setFirstName("undefined");
            // $userData->setLastName("undefined");
            // $userData->setEmail("undefined");
        }
        return $userData;
    }

    static function paramsToCustomData($data) {

        if(isset($data['contents']) && is_array($data['contents'])) {
            $contents = array();
            foreach ($data['contents'] as $c) {
                $contents[] = new Content([
                    'product_id' => $c['id'],
                    'quantity'  => $c['quantity']
                ]);
            }
            $data['contents'] = $contents;
        } else {
            $data['contents'] = array();
        }

        $customData = new CustomData($data);
        $customProperties = array();


        if(isset($data['category_name'])) {
            $customData->setContentCategory($data['category_name']);
        }

        $custom_values = ['event_action','download_type','download_name','download_url','target_url','text','trigger','traffic_source','plugin','user_role','event_url','page_title',"post_type",'post_id','categories','tags','video_type',
            'video_id','video_title','event_trigger','link_type','tag_text',"URL",
            'form_id','form_class','form_submit_label','transactions_count','average_order',
            'shipping_cost','tax','total','shipping','coupon_used','post_category','landing_page'];


        $adding_custom_field = array();

        $eventsCustom = EventsCustom()->getEvents();
        foreach ($eventsCustom as $event)
        {
            $fbCustomEvents = $event->getFacebookCustomParams();

            foreach ($fbCustomEvents as $paramKey => $params)
            {
                if(!in_array($params['name'], $custom_values))
                {
                    $adding_custom_field[] = $params['name'];
                }
            }
        }
        $result_custom_values = array_merge($custom_values, $adding_custom_field);
        foreach ($result_custom_values as $val) {
            if(isset($data[$val])){
                $customProperties[$val] = $data[$val];
            }
        }

        $customData->setCustomProperties($customProperties);
        return $customData;
    }

}