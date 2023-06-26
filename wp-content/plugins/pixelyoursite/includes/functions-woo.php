<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function isWooCommerceVersionGte( $version ) {

	if ( defined( 'WC_VERSION' ) && WC_VERSION ) {
		return version_compare( WC_VERSION, $version, '>=' );
	} else if ( defined( 'WOOCOMMERCE_VERSION' ) && WOOCOMMERCE_VERSION ) {
		return version_compare( WOOCOMMERCE_VERSION, $version, '>=' );
	} else {
		return false;
	}

}

/**
 * @param \WC_Product|\WP_Post $product
 *
 * @return bool
 */
function wooProductIsType( $product, $type ) {

	if ( isWooCommerceVersionGte( '2.7' ) ) {
		return $type == $product->is_type( $type );
	} else {
		return $product->product_type == $type;
	}

}
function wooIsRequestContainOrderId() {
    return  isset( $_REQUEST['key'] )  && $_REQUEST['key'] != ""
        || isset( $_REQUEST['referenceCode'] )  && $_REQUEST['referenceCode'] != ""
        || isset( $_REQUEST['ref_venta'] )  && $_REQUEST['ref_venta'] != ""
        || !empty( $_REQUEST['wcf-order'] );
}
function getWooProductPriceToDisplay( $product_id, $qty = 1 ) {

	if ( ! $product = wc_get_product( $product_id ) ) {
		return 0;
	}

    // for Woo Discount Rules
    if(method_exists('\Wdr\App\Controllers\ManageDiscount','calculateInitialAndDiscountedPrice')) {
        $salePrice = \Wdr\App\Controllers\ManageDiscount::calculateInitialAndDiscountedPrice($product,$qty);
        if(is_array($salePrice) && isset($salePrice['discounted_price'])) {
            return $salePrice['discounted_price'];
        }
    }
    $productPrice = "";

    // take min price for variable product
    if($product->get_type() == "variable") {
        $prices = $product->get_variation_prices( true );
        if(!empty( $prices['price'] )) {
            $productPrice = current( $prices['price'] );
        }
    }

    return (float) wc_get_price_to_display( $product, array( 'qty' => $qty,'price'=>$productPrice ) );
}

function getWooCartSubtotal() {

	// subtotal is always same value on front-end and depends on PYS options
	$include_tax = get_option( 'woocommerce_tax_display_cart' ) == 'incl';

	if ( $include_tax ) {

		if ( isWooCommerceVersionGte( '3.2.0' ) ) {
			$subtotal = (float) WC()->cart->get_subtotal() + (float) WC()->cart->get_subtotal_tax();
		} else {
			$subtotal = WC()->cart->subtotal;
		}

	} else {

		if ( isWooCommerceVersionGte( '3.2.0' ) ) {
			$subtotal = (float) WC()->cart->get_subtotal();
		} else {
			$subtotal = WC()->cart->subtotal_ex_tax;
		}

	}

	return $subtotal;

}

function getWooEventValue( $valueOption, $global, $percent, $product_id,$qty ) {

    $product = wc_get_product($product_id);

    if(!$product) return 0;

    if($valueOption == 'cog' && isPixelCogActive()) {

        $args = array( 'qty'   => $qty, 'price' => $product->get_price());
        if(get_option( '_pixel_cog_tax_calculating')  == 'no') {
            $amount = wc_get_price_excluding_tax($product, $args);
        } else {
            $amount = wc_get_price_including_tax($product,$args);
        }

        $cog = getAvailableProductCog($product);

        if ($cog['val']) {
            if ($cog['type'] == 'fix') {
                $value = round((float)$amount - (float)$cog['val'], 2);
            } else {
                $value = round((float)$amount - ((float)$amount * (float)$cog['val'] / 100), 2);
            }
        } else {
            $value = (float)$amount;
        }
        return $value;
    }

    $amount = getWooProductPriceToDisplay( $product_id, $qty );

    switch ( $valueOption ) {
        case 'global': $value = $global; break;
        case 'percent':
            $percents = (float) $percent;
            $percents = str_replace( '%', null, $percents );
            $percents = (float) $percents / 100;
            $value    = (float) $amount * $percents;
            break;
        default:$value = (float)$amount;
    }

    return $value;

}
/**
 * @param $valueOption
 * @param \WC_Order $order
 * @param $global
 * @param $order_id
 * @param $content_ids
 * @param int $percent
 * @return float|int
 */
function getWooEventValueOrder( $valueOption, $order, $global, $percent = 100 ) {

    $amount = $order->get_total();
    switch ( $valueOption ) {
        case 'global':
            $value = (float) $global;
            break;

        case 'cog':
            $cog_value = getAvailableProductCogOrder($order);
            ($cog_value !== '') ? $value = (float) round($cog_value, 2) : $value = (float) $amount;
            if ( !isPixelCogActive() ) $value = (float) $amount;
            break;

        case 'percent':
            $percents = (float) $percent;
            $percents = str_replace( '%', null, $percents );
            $percents = (float) $percents / 100;
            $value    = (float) $amount * $percents;
            break;

        default:    // "price" option
            $value = (float) $amount;
    }

    return $value;

}

function getWooEventValueCart( $valueOption, $global, $percent = 100 ) {

    if($valueOption == 'cog' && isPixelCogActive()) {
        $cog_value = getAvailableProductCogCart();
        if($cog_value !== '')
            return (float) round($cog_value, 2) ;

        if ( get_option( '_pixel_cog_tax_calculating')  == 'no' ) {
            return WC()->cart->cart_contents_total;
        }

        return WC()->cart->cart_contents_total + WC()->cart->tax_total;
    }


    $amount = $params['value'] = WC()->cart->subtotal;

    switch ( $valueOption ) {
        case 'global':
            $value = (float) $global;
            break;

        case 'percent':
            $percents = (float) $percent;
            $percents = str_replace( '%', null, $percents );
            $percents = (float) $percents / 100;
            $value    = (float) $amount * $percents;
            break;

        default:    // "price" option
            $value = (float) $amount;
    }

    return $value;
}

function wooGetOrderIdFromRequest() {
    if(isset( $_REQUEST['key'] )  && $_REQUEST['key'] != "") {
        $order_key = sanitize_key($_REQUEST['key']);
        $order_id = (int) wc_get_order_id_by_order_key( $order_key );
        return $order_id;
    }
    if(isset( $_REQUEST['referenceCode'] )  && $_REQUEST['referenceCode'] != "") {
        return (int)$_REQUEST['referenceCode'];
    }
    if(isset( $_REQUEST['ref_venta'] )  && $_REQUEST['ref_venta'] != "") {
        return (int)$_REQUEST['ref_venta'];
    }
    if(!empty($_REQUEST['wcf-order'])) {
        return (int)$_REQUEST['wcf-order'];
    }
    return -1;
}

/**
 * Check is Woo Supporting High-Performance Order Storage
 * @return bool
 */
function isWooUseHPStorage() {
    if(class_exists( \Automattic\WooCommerce\Utilities\OrderUtil::class )) {
        return \Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
    }
    return false;

}