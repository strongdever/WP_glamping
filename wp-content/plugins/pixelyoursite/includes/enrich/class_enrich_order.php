<?php
namespace PixelYourSite;

class EnrichOrder {
    private static $_instance;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function init() {
        //woo
        if(PYS()->getOption("woo_enabled_save_data_to_orders")) {
            add_action( 'woocommerce_checkout_update_order_meta',array($this,'woo_save_checkout_fields'),10, 2);
            add_action( 'add_meta_boxes', array($this,'woo_add_order_meta_boxes') );
            if(PYS()->getOption("woo_add_enrich_to_admin_email")) {
                add_action( 'woocommerce_email_customer_details', array($this,'woo_add_enrich_to_admin_email'),80,4 );
            }
        }

        // edd
        if(PYS()->getOption("edd_enabled_save_data_to_orders")) {
            add_filter('edd_payment_meta', array($this, 'edd_save_checkout_fields'),10,2);
            add_action('edd_view_order_details_main_after', array($this, 'add_edd_order_details'));
        }
    }

    function add_edd_order_details($payment_id) {
        echo '<div id="edd-payment-notes" class="postbox">
    <h3 class="hndle"><span>PixelYourSite</span></h3>';
        echo "<div style='margin:20px'><p>With the paid plugin, you can see more data on the Easy Digital Downloads Reports page.
<a target='_blank' href='https://www.pixelyoursite.com/easy-digital-downloads-first-party-reports/?utm_source=free-plugin-edd-order&utm_medium=free-plugin-edd-order&utm_campaign=free-plugin-edd-order&utm_content=free-plugin-edd-order&utm_term=free-plugin-edd-order'>Click here for details.</a>
</p>You can stop storing this data from the plugin's <a href='".admin_url("admin.php?page=pixelyoursite&tab=edd")."' target='_blank'>Easy Digital Downloads page</a></div>";
        include 'views/html-edd-order-box.php';
        echo '</div>';
    }

    function woo_add_order_meta_boxes () {
        $screen = isWooUseHPStorage()
            ? wc_get_page_screen_id( 'shop-order' )
            : 'shop_order';
        add_meta_box( 'pys_enrich_fields_woo', __('PixelYourSite','pixelyoursite'),
            array($this,"woo_render_order_fields"), $screen);
    }

    function woo_render_order_fields($post) {
        $orderId = ( $post instanceof \WP_Post ) ? $post->ID : $post->get_id();
        echo "<div style='margin:20px 10px'><p>With the paid plugin, you can see more data on the WooCommerce Reports page. 
                <a href='https://www.pixelyoursite.com/woocommerce-first-party-reports?utm_source=free-plugin&utm_medium=order-page&utm_campaign=reports-order-page&utm_content=woocommerce-reports-client-page&utm_term=order-page-reports' target='_blank'>Click here for details</a>
                </p>You can stop storing this data from the plugin's <a href='".admin_url("admin.php?page=pixelyoursite&tab=woo")."' target='_blank'>WooCommerce page</a>.</div>";
        include 'views/html-order-meta-box.php';
    }

    function woo_save_checkout_fields($order_id, $data) {
        $pysData = [];
        $pysData['pys_landing'] = isset($_REQUEST['pys_landing']) ? sanitize_text_field($_REQUEST['pys_landing']) : "";
        $pysData['pys_source'] = isset($_REQUEST['pys_source']) ? sanitize_text_field($_REQUEST['pys_source']) : "";
        $pysData['pys_utm'] = isset($_REQUEST['pys_utm']) ? sanitize_text_field($_REQUEST['pys_utm']) : "";
        $pysData['pys_browser_time'] = isset($_REQUEST['pys_browser_time']) ? sanitize_text_field($_REQUEST['pys_browser_time']) : "";

        $pysData['last_pys_landing'] = isset($_REQUEST['last_pys_landing']) ? sanitize_text_field($_REQUEST['last_pys_landing']) : "";
        $pysData['last_pys_source'] = isset($_REQUEST['last_pys_source']) ? sanitize_text_field($_REQUEST['last_pys_source']) : "";
        $pysData['last_pys_utm'] = isset($_REQUEST['last_pys_utm']) ? sanitize_text_field($_REQUEST['last_pys_utm']) : "";

        $pysData['pys_utm_id'] = isset($_REQUEST['pys_utm_id']) ? sanitize_text_field($_REQUEST['pys_utm_id']) : "";
        $pysData['last_pys_utm_id'] = isset($_REQUEST['last_pys_utm_id']) ? sanitize_text_field($_REQUEST['last_pys_utm_id']) : "";

        $order = wc_get_order($order_id);
        if($order) {
            $order->update_meta_data("pys_enrich_data",$pysData);
            $order->save();
        }
    }

    /**
     * @param \WC_Order$order
     * @param $sent_to_admin
     * @param $plain_text
     * @param $email
     */

    function woo_add_enrich_to_admin_email($order, $sent_to_admin) {
        if($sent_to_admin) {
            $orderId = $order->get_id();
            echo "<h2 style='text-align: center'>". __('PixelYourSite','pixelyoursite')."</h2>";
            echo "Your clients don't see this information! We send it to you in this \"New Order\" email. If you want to remove this data from the \"New Order\" email, open <a href='".admin_url("admin.php?page=pixelyoursite&tab=woo")."' target='_blank'>PixelYourSite's WooCommerce page</a>, disable \"Send reports data to the New Order email\" and save.
            <br/>With PixelYourSite Professional, you can view and download this data from the plugin's own reports page. Find out how WooCommerce Reports work and how to visualize and download your data: <a href='https://www.pixelyoursite.com/woocommerce-first-party-reports?utm_source=free-plugin&utm_medium=order-email&utm_campaign=order-email-link&utm_content=woocommerce-reports&utm_term=woocommerce-reports-email-link' target='_blank'>Click here for details</a>.<br/>";
            include 'views/html-order-meta-box.php';
        }
    }


    function edd_save_checkout_fields( $payment_meta ,$init_payment_data) {

        if ( 0 !== did_action('edd_pre_process_purchase') ) {
            $pysData = [];

            $pysData['pys_landing'] = isset($_POST['pys_landing']) ? sanitize_text_field($_POST['pys_landing']) : "";
            $pysData['pys_source'] = isset($_POST['pys_source']) ? sanitize_text_field($_POST['pys_source']) : "";
            $pysData['pys_utm'] = isset($_POST['pys_utm']) ? sanitize_text_field($_POST['pys_utm']) : "";
            $pysData['pys_browser_time'] = isset($_POST['pys_browser_time']) ? sanitize_text_field($_POST['pys_browser_time']) : "";


            $pysData['last_pys_landing'] = isset($_REQUEST['last_pys_landing']) ? sanitize_text_field($_REQUEST['last_pys_landing']) : "";
            $pysData['last_pys_source'] = isset($_REQUEST['last_pys_source']) ? sanitize_text_field($_REQUEST['last_pys_source']) : "";
            $pysData['last_pys_utm'] = isset($_REQUEST['last_pys_utm']) ? sanitize_text_field($_REQUEST['last_pys_utm']) : "";

            $pysData['pys_utm_id'] = isset($_REQUEST['pys_utm_id']) ? sanitize_text_field($_REQUEST['pys_utm_id']) : "";
            $pysData['last_pys_utm_id'] = isset($_REQUEST['last_pys_utm_id']) ? sanitize_text_field($_REQUEST['last_pys_utm_id']) : "";

            $payment_meta['pys_enrich_data'] = $pysData;
        }
        return $payment_meta;
    }
}

/**
 * @return EnrichOrder
 */
function EnrichOrder() {
    return EnrichOrder::instance();
}

EnrichOrder();