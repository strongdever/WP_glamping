<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function getEddPaymentKey() {
	global $edd_receipt_args;

	$session = edd_get_purchase_session();

	if ( isset( $_GET['payment_key'] ) ) {
		return urldecode( $_GET['payment_key'] );
	} else if ( $session && isset($session['purchase_key']) ) {
		return $session['purchase_key'];
	} elseif (  $edd_receipt_args && isset($edd_receipt_args['payment_key']) && $edd_receipt_args['payment_key'] ) {
		return $edd_receipt_args['payment_key'];
	} else {
		return false;
	}

}

/**
 * Always returns download price as is to make Free compatible with PRO.
 * Used by Pinterest add-on.
 *
 * @return float
 */
function getEddDownloadPrice( $download_id, $price_index = null ) {
    return getEddDownloadPriceToDisplay( $download_id, $price_index );
}

function getEddDownloadPriceToDisplay( $download_id, $price_index = null  ) {

	if ( edd_has_variable_prices( $download_id ) ) {

		$prices = edd_get_variable_prices( $download_id );

		if ( $price_index !== null ) {

			// get selected price option
			$price = isset( $prices[ $price_index ] ) ? $prices[ $price_index ]['amount'] : 0;

		} else {

			// get default price option
			$default_option = edd_get_default_variable_price( $download_id );
			$price = $prices[ $default_option ]['amount'];

		}

	} else {

		$price = edd_get_download_price( $download_id );

	}

	return (float) $price;

}

function getEddEventValue( $option, $amount, $global, $percent = 100 ) {

	switch ( $option ) {
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

/**
 * Always returns array with empty values.
 * Used by Pinterest add-on.
 *
 * @return array
 */
function getEddDownloadLicenseData( $download_id ) {
    return array(
        'transaction_type' => null,
        'license_site_limit' => null,
        'license_time_limit' => null,
        'license_version' => null,
    );
}