<?php

namespace PixelYourSite\Facebook\Helpers;

use PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @return array
 */
function getAdvancedMatchingParams() {

	$params = array();
	$user = wp_get_current_user();

	if ( $user->ID ) {

		// get user regular data
		$params['fn'] = $user->get( 'user_firstname' );
		$params['ln'] = $user->get( 'user_lastname' );
		$params['em'] = $user->get( 'user_email' );

	}

	/**
	 * Add common WooCommerce Advanced Matching params
	 */

	if ( PixelYourSite\isWooCommerceActive() ) {

		// if first name is not set in regular wp user meta
		if ( empty( $params['fn'] ) ) {
			$params['fn'] = $user->get( 'billing_first_name' );
		}

		// if last name is not set in regular wp user meta
		if ( empty( $params['ln'] ) ) {
			$params['ln'] = $user->get( 'billing_last_name' );
		}

		$params['ph'] = $user->get( 'billing_phone' );
		$params['ct'] = $user->get( 'billing_city' );
		$params['st'] = $user->get( 'billing_state' );

		$params['country'] = $user->get( 'billing_country' );

		/**
		 * Add purchase WooCommerce Advanced Matching params
		 */

		if ( is_order_received_page() && isset( $_REQUEST['key'] ) && $_REQUEST['key'] != "" ) {
            $key = sanitize_key($_REQUEST['key']);
			$order_id = wc_get_order_id_by_order_key($key );
			$order    = wc_get_order( $order_id );

			if ( $order ) {

				if ( PixelYourSite\isWooCommerceVersionGte( '3.0.0' ) ) {

					$params = array(
						'em'      => $order->get_billing_email(),
						'ph'      => $order->get_billing_phone(),
						'fn'      => $order->get_billing_first_name(),
						'ln'      => $order->get_billing_last_name(),
						'ct'      => $order->get_billing_city(),
						'st'      => $order->get_billing_state(),
						'country' => $order->get_billing_country(),
					);

				} else {

					$params = array(
						'em'      => $order->billing_email,
						'ph'      => $order->billing_phone,
						'fn'      => $order->billing_first_name,
						'ln'      => $order->billing_last_name,
						'ct'      => $order->billing_city,
						'st'      => $order->billing_state,
						'country' => $order->billing_country,
					);

				}

			}

		}

	}

	/**
	 * Add common EDD Advanced Matching params
	 */

	if ( PixelYourSite\isEddActive()) {

		/**
		 * Add purchase EDD Advanced Matching params
		 */

		// skip payment confirmation page
		if ( edd_is_success_page() && ! isset( $_GET['payment-confirmation'] ) ) {
			global $edd_receipt_args;

			$session = edd_get_purchase_session();
			if ( isset( $_GET['payment_key'] ) ) {
				$payment_key = urldecode( $_GET['payment_key'] );
			} else if ( $session ) {
				$payment_key = $session['purchase_key'];
			} elseif ( $edd_receipt_args && $edd_receipt_args['payment_key'] ) {
				$payment_key = $edd_receipt_args['payment_key'];
			}

			if ( isset( $payment_key ) ) {

				$payment_id = edd_get_purchase_id_by_key( $payment_key );

				if ( $payment = edd_get_payment( $payment_id ) ) {

					// if first name is not set in regular wp user meta
					if ( empty( $params['fn'] ) ) {
						$params['fn'] = $payment->user_info['first_name'];
					}

					// if last name is not set in regular wp user meta
					if ( empty( $params['ln'] ) ) {
						$params['ln'] = $payment->user_info['last_name'];
					}

					$params['ct'] = $payment->address['city'];
					$params['st'] = $payment->address['state'];

					$params['country'] = $payment->address['country'];

				}

			}

		}

	}

	$sanitized = array();

	foreach ( $params as $key => $value ) {

		if ( ! empty( $value ) ) {
			$sanitized[ $key ] = sanitizeAdvancedMatchingParam( $value, $key );
		}

	}

	return $sanitized;

}

function sanitizeAdvancedMatchingParam( $value, $key ) {
    
    // prevents fatal error when mb_string extension not enabled
    if ( function_exists( 'mb_strtolower' ) ) {
        $value = mb_strtolower( $value );
    } else {
        $value = strtolower( $value );
    }

	if ( $key == 'ph' ) {
		$value = preg_replace( '/\D/', '', $value );
	} elseif ( $key == 'em' ) {
		$value = preg_replace( '/[^a-z0-9._+-@]+/i', '', $value );
	} else {
		$value = preg_replace( '/[^a-z]/', '', $value );
	}

	return $value;

}

/**
 * @param string $product_id
 *
 * @return array
 */
function getFacebookWooProductContentId( $product_id ) {

	if ( PixelYourSite\Facebook()->getOption( 'woo_content_id' ) == 'product_sku' ) {
		$content_id = get_post_meta( $product_id, '_sku', true );
	} else {
		$content_id = $product_id;
	}

	$prefix = PixelYourSite\Facebook()->getOption( 'woo_content_id_prefix' );
	$suffix = PixelYourSite\Facebook()->getOption( 'woo_content_id_suffix' );

	$value = $prefix . $content_id . $suffix;
	$value = array( $value );

	// Facebook for WooCommerce plugin integration
	if ( ! isDefaultWooContentIdLogic() ) {

		$product = wc_get_product($product_id);

		if ( ! $product ) {
			return $value;
		}


        $ids = array(
            get_fb_plugin_retailer_id($product)
		);

		$value = array_values( array_filter( $ids ) );
		
	}

	return $value;

}
function get_fb_plugin_retailer_id( $woo_product ) {
    if(!$woo_product) return "";
    $woo_id = $woo_product->get_id();

    // Call $woo_product->get_id() instead of ->id to account for Variable
    // products, which have their own variant_ids.
    return $woo_product->get_sku() ? $woo_product->get_sku() . '_' .
        $woo_id : 'wc_post_id_'. $woo_id;
}
function getFacebookWooCartItemId( $item ) {

	if ( ! PixelYourSite\Facebook()->getOption( 'woo_variable_as_simple' ) && isset( $item['variation_id'] ) && $item['variation_id'] !== 0 ) {
		$product_id = $item['variation_id'];
	} else {
		$product_id = $item['product_id'];
	}

	// Facebook for WooCommerce plugin integration
	if ( ! isDefaultWooContentIdLogic() ) {

		if ( isset( $item['variation_id'] ) && $item['variation_id'] !== 0 ) {
			$product_id = $item['variation_id'];
		} else {
			$product_id = $item['product_id'];
		}

	}

	return $product_id;

}

/**
 * Adds "content_name" and "category_name" params
 */
function getWooCustomAudiencesOptimizationParams( $post_id ) {

	$post = get_post( $post_id );

	$params = array(
		'content_name'  => '',
		'category_name' => '',
	);

	if ( ! $post ) {
		return $params;
	}

	if ( $post->post_type == 'product_variation' ) {
		$post_id = $post->post_parent; // get terms from parent
	}

	$params['content_name'] = $post->post_title;
	$params['category_name'] = implode( ', ', PixelYourSite\getObjectTerms( 'product_cat', $post_id ) );

	return $params;

}

function getWooSingleAddToCartParams( $_product_id, $qty = 1 ) {

	$params = array();
    $product = wc_get_product($_product_id);
    if(!$product) return array();
    $product_ids = array();
    $isGrouped = $product->get_type() == "grouped";
    if($isGrouped) {
        $product_ids = $product->get_children();
    } else {
        $product_ids[] = $_product_id;
    }
    $params['content_type'] = 'product';
    $params['content_ids']  = array();
    $params['contents'] = array();




	// content_name, category_name, tags
	$params['tags'] = implode( ', ', PixelYourSite\getObjectTerms( 'product_tag', $_product_id ) );
	$params = array_merge( $params, getWooCustomAudiencesOptimizationParams( $_product_id ) );
	
	// currency, value
	if ( PixelYourSite\PYS()->getOption( 'woo_add_to_cart_value_enabled' ) ) {

		$value_option = PixelYourSite\PYS()->getOption( 'woo_add_to_cart_value_option' );
		$global_value = PixelYourSite\PYS()->getOption( 'woo_add_to_cart_value_global', 0 );

		$params['value']    = PixelYourSite\getWooEventValue( $value_option, $global_value,100, $_product_id,$qty );
        $params['currency'] = get_woocommerce_currency();

	}

    foreach ($product_ids as $product_id) {
        $product = wc_get_product($product_id);
        if(!$product) continue;
        if($product->get_type() == "variable" && $isGrouped) {
            continue;
        }
        $content_id = getFacebookWooProductContentId( $product_id );
        $params['content_ids'] = array_merge($params['content_ids'],$content_id);
        // contents
        if ( isDefaultWooContentIdLogic() ) {

            // Facebook for WooCommerce plugin does not support new Dynamic Ads parameters
            $params['contents'][] = array(
                'id'         => (string) reset( $content_id ),
                'quantity'   => $qty,
                //'item_price' => PixelYourSite\getWooProductPriceToDisplay( $product_id ),// remove because price need send only with currency
            );
        }
    }

	return $params;

}

function getWooCartParams( $context = 'cart' ) {

	$params['content_type'] = 'product';

	$content_ids        = array();
	$content_names      = array();
	$content_categories = array();
	$tags               = array();
	$contents           = array();

	foreach ( WC()->cart->cart_contents as $cart_item_key => $cart_item ) {

		$product_id = getFacebookWooCartItemId( $cart_item );
		$content_id = getFacebookWooProductContentId( $product_id );

		$content_ids = array_merge( $content_ids, $content_id );

		// content_name, category_name, tags
		$custom_audiences = getWooCustomAudiencesOptimizationParams( $product_id );

		$content_names[]      = $custom_audiences['content_name'];
		$content_categories[] = $custom_audiences['category_name'];

		$cart_item_tags = PixelYourSite\getObjectTerms( 'product_tag', $product_id );
		$tags = array_merge( $tags, $cart_item_tags );
		
		// raw product id
		$_product_id = empty( $cart_item['variation_id'] ) ? $cart_item['product_id'] : $cart_item['variation_id'];

		// contents
		$contents[] = array(
			'id'         => (string) reset( $content_id ),
			'quantity'   => $cart_item['quantity'],
			//'item_price' => PixelYourSite\getWooProductPriceToDisplay( $_product_id ),
		);

	}

	$params['content_ids']   = ( $content_ids );
	$params['content_name']  = implode( ', ', $content_names );
	$params['category_name'] = implode( ', ', $content_categories );

	// contents
	if ( isDefaultWooContentIdLogic() ) {

		// Facebook for WooCommerce plugin does not support new Dynamic Ads parameters
		$params['contents'] = ( $contents );

	}

	$tags           = array_unique( $tags );
	$tags           = array_slice( $tags, 0, 100 );
	$params['tags'] = implode( ', ', $tags );

	if ( $context == 'InitiateCheckout' ) {

		$params['num_items'] = WC()->cart->get_cart_contents_count();

		$value_enabled_option = 'woo_initiate_checkout_value_enabled';
		$value_option_option  = 'woo_initiate_checkout_value_option';
		$value_global_option  = 'woo_initiate_checkout_value_global';
		
		$params['subtotal'] = PixelYourSite\getWooCartSubtotal();

	} else { // AddToCart

		$value_enabled_option = 'woo_add_to_cart_value_enabled';
		$value_option_option  = 'woo_add_to_cart_value_option';
		$value_global_option  = 'woo_add_to_cart_value_global';

	}

	if ( PixelYourSite\PYS()->getOption( $value_enabled_option ) ) {

		$value_option = PixelYourSite\PYS()->getOption( $value_option_option );
		$global_value = PixelYourSite\PYS()->getOption( $value_global_option, 0 );

		$params['value']    = PixelYourSite\getWooEventValueCart( $value_option, $global_value );
        $params['currency'] = get_woocommerce_currency();

	}

	return $params;

}

function isFacebookForWooCommerceActive() {
	return class_exists( 'WC_Facebookcommerce' );
}

function isDefaultWooContentIdLogic() {
	return ! isFacebookForWooCommerceActive() || PixelYourSite\Facebook()->getOption( 'woo_content_id_logic' ) != 'facebook_for_woocommerce';
}

/**
 * EASY DIGITAL DOWNLOADS
 */

function getFacebookEddDownloadContentId( $download_id ) {

	if ( PixelYourSite\PYS()->getOption( 'edd_content_id' ) == 'download_sku' ) {
		$content_id = get_post_meta( $download_id, 'edd_sku', true );
	} else {
		$content_id = $download_id;
	}

	$prefix = PixelYourSite\PYS()->getOption( 'edd_content_id_prefix' );
	$suffix = PixelYourSite\PYS()->getOption( 'edd_content_id_suffix' );

	return $prefix . $content_id . $suffix;

}

/**
 * Adds "content_name" and "category_name" params
 */
function getEddCustomAudiencesOptimizationParams( $post_id ) {

	$post = get_post( $post_id );

	$params = array(
		'content_name'  => '',
		'category_name' => '',
	);

	if ( ! $post ) {
		return $params;
	}

	$params['content_name'] = $post->post_title;
	$params['category_name'] = implode( ', ', PixelYourSite\getObjectTerms( 'download_category', $post_id ) );

	return $params;

}

function getFDPViewContentEventParams() {
    $tagsArray = wp_get_post_tags();
    $catArray = get_the_category();

    $tags = "";
    if(is_array($tagsArray)) {
        $tags = implode(", ",$tagsArray);
    }

    $func = function($value) {
        return $value->cat_name;
    };
    $catArray = array_map($func,$catArray);
    $categories = implode(", ",$catArray);


    $params = array(
        'content_name'     => get_the_title(),
        'content_ids'      => get_the_ID(),
        'tags'             => $tags,
        'categories'       => $categories
    );


    return $params;
}

function getFDPViewCategoryEventParams() {
    global $wp_query;
    $func = function($value) {
        return $value->ID;
    };
    $ids = array_map($func,$wp_query->posts);


    $params = array(
        'content_name'     => single_term_title('', 0),
        'content_ids'      => ($ids)
    );

    return $params;
}

function getFDPAddToCartEventParams() {
    $tagsArray = wp_get_post_tags();
    $catArray = get_the_category();

    $tags = "";
    if(is_array($tagsArray)) {
        $tags = implode(", ",$tagsArray);
    }

    $func = function($value) {
        return $value->cat_name;
    };
    $catArray = array_map($func,$catArray);
    $categories = implode(", ",$catArray);


    $params = array(
        'content_name'     => get_the_title(),
        'content_ids'      => get_the_ID(),
        'tags'             => $tags,
        'categories'       => $categories,
        'value'            => 0
    );


    return $params;
}

function getFDPPurchaseEventParams() {
    $tagsArray = wp_get_post_tags();
    $catArray = get_the_category();

    $tags = "";
    if(is_array($tagsArray)) {
        $tags = implode(", ",$tagsArray);
    }

    $func = function($value) {
        return $value->cat_name;
    };
    $catArray = array_map($func,$catArray);
    $categories = implode(", ",$catArray);


    $params = array(
        'content_name'     => get_the_title(),
        'content_ids'      => get_the_ID(),
        'tags'             => $tags,
        'categories'       => $categories,
        'value'            => 0
    );


    return $params;
}

function getCompleteRegistrationOrderParams() {
    $params = array();
    $order_key = sanitize_key( $_REQUEST['key']);
    $order_id = (int) wc_get_order_id_by_order_key( $order_key );
    $order = new \WC_Order( $order_id );

    $value_option   = PixelYourSite\Facebook()->getOption( 'woo_complete_registration_custom_value' );
    $global_value   = PixelYourSite\Facebook()->getOption( 'woo_complete_registration_global_value', 0 );
    $percents_value = PixelYourSite\Facebook()->getOption( 'woo_complete_registration_percent_value', 100 );

    $params['value'] = PixelYourSite\getWooEventValueOrder( $value_option, $order, $global_value, $percents_value );
    $params['currency'] = get_woocommerce_currency();
    return $params;
}