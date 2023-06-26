<?php

namespace PixelYourSite\Events;

use PixelYourSite;
use PixelYourSite\CustomEvent;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderHiddenInput( &$event, $key ) {

	$attr_name = "pys[event][$key]";
	$attr_value = $event->$key;

	?>

	<input type="hidden" name="<?php esc_attr_e( $attr_name ); ?>"
	       value="<?php esc_attr_e( $attr_value ); ?>">

	<?php

}

/**
 * @param CustomEvent $event
 * @param string      $key
 * @param string      $placeholder
 */
function renderTextInput( &$event, $key, $placeholder = '' ) {

	$attr_name = "pys[event][$key]";
	$attr_id = 'pys_event_' . $key;
	$attr_value = $event->$key;

	?>

	<input type="text" name="<?php esc_attr_e( $attr_name ); ?>"
	       id="<?php esc_attr_e( $attr_id ); ?>"
	       value="<?php esc_attr_e( $attr_value ); ?>"
	       placeholder="<?php esc_attr_e( $placeholder ); ?>"
	       class="form-control">

	<?php

}
/**
 * @param CustomEvent $event
 * @param string      $key
 * @param array       $options
 */
function renderGroupSelectInput( &$event, $key, $groups, $full_width = false ) {

    $attr_name  = "pys[event][$key]";
    $attr_id    = 'pys_event_' . $key;
    $attr_value = $event->$key;

    $attr_width = $full_width ? 'width: 100%;' : '';

    ?>

    <select class="form-control-sm" id="<?php esc_attr_e( $attr_id ); ?>"
            name="<?php esc_attr_e( $attr_name ); ?>" autocomplete="off" style="<?php esc_attr_e( $attr_width ); ?>">

        <?php foreach ($groups as $group => $options) :?>
            <optgroup label="<?=$group?>">
                <?php foreach ( $options as $option_key => $option_value ) : ?>
                    <option group="<?=$group?>" value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key,
                        esc_attr( $attr_value ) ); ?> <?php disabled( $option_key,
                        'disabled' ); ?>><?php echo esc_attr( $option_key ); ?></option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    </select>

    <?php
}

/**
 * @param CustomEvent $event
 * @param string      $key
 * @param string      $placeholder
 */
function renderGAParamInput( $key, $val ) {

    $attr_name = "pys[event][ga_params][$key]";
    $attr_id = 'pys_event_ga_' . $key;
    $attr_value = $val;

    ?>

    <input type="text" name="<?php esc_attr_e( $attr_name ); ?>"
           id="<?php esc_attr_e( $attr_id ); ?>"
           value="<?php esc_attr_e( $attr_value ); ?>"
           class="form-control">

    <?php

}

/**
 * @param CustomEvent $event
 * @param string      $key
 * @param string      $placeholder
 */
function renderNumberInput( &$event, $key, $placeholder = null ) {

	$attr_name = "pys[event][$key]";
	$attr_id = 'pys_event_' . $key;
	$attr_value = $event->$key;

	?>

	<input type="number" name="<?php esc_attr_e( $attr_name ); ?>"
	       id="<?php esc_attr_e( $attr_id ); ?>"
	       value="<?php esc_attr_e( $attr_value ); ?>"
	       placeholder="<?php esc_attr_e( $placeholder ); ?>"
	       min="0" class="form-control">

	<?php

}

/**
 * @param CustomEvent $event
 * @param string $key
 * @param bool $disabled
 */
function renderSwitcherInput( &$event, $key,$disabled = false ) {



	$attr_name  = "pys[event][$key]";
	$attr_id    = 'pys_event_' . $key;
	$attr_value = $event->$key;

	$classes = array( 'custom-switch' );

    if ( $disabled ) {
	    $attr_value = false;
	    $classes[] = 'disabled';
    }

	$classes = implode( ' ', $classes );

	?>

	<div class="<?php esc_attr_e( $classes ); ?>">

		<?php if ( ! $disabled ) : ?>
            <input type="hidden" name="<?php esc_attr_e( $attr_name ); ?>" value="0">
		<?php endif; ?>

		<input type="checkbox" name="<?php esc_attr_e( $attr_name ); ?>" value="1" <?php checked( $attr_value,
			true ); ?> <?php disabled( $disabled, true ); ?>
               id="<?php esc_attr_e( $attr_id ); ?>" class="custom-switch-input">
		<label class="custom-switch-btn" for="<?php esc_attr_e( $attr_id ); ?>"></label>
	</div>

	<?php

}

/**
 * @param CustomEvent $event
 * @param string      $key
 * @param array       $options
 */
function renderSelectInput( &$event, $key, $options, $full_width = false ) {

	if ( $key == 'currency' ) {
		
		$attr_name  = "pys[event][facebook_params][$key]";
		$attr_id    = 'pys_event_facebook_params_' . $key;
		$attr_value = $event->getFacebookParam( $key );
        
	} else {

		$attr_name  = "pys[event][$key]";
		$attr_id    = 'pys_event_' . $key;
		$attr_value = $event->$key;

    }

	$attr_width = $full_width ? 'width: 100%;' : '';

	?>

	<select class="form-control-sm" id="<?php esc_attr_e( $attr_id ); ?>"
	        name="<?php esc_attr_e( $attr_name ); ?>" autocomplete="off" style="<?php esc_attr_e( $attr_width ); ?>">
		<?php foreach ( $options as $option_key => $option_value ) : ?>
            <?php if ( ! PixelYourSite\startsWith( $option_key, 'disabled' ) ) : ?>
                <option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key,
                    esc_attr( $attr_value ) ); ?>><?php echo esc_attr( $option_value ); ?></option>
            <?php else : ?>
                <option disabled="disabled"><?php echo esc_attr( $option_value ); ?></option>
            <?php endif; ?>
		<?php endforeach; ?>
	</select>

	<?php
}

/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderTriggerTypeInput( &$event, $key ) {

	$options = array(
        'page_visit'    => 'Page visit',
        'url_click'     => 'Click on HTML link - PRO',
        'css_click'     => 'Click on CSS selector - PRO',
        'css_mouseover' => 'Mouse over CSS selector - PRO',
        'scroll_pos'    => 'Page Scroll - PRO',
        'post_type'    => 'Post type - PRO',
	);
    $eventsFormFactory = apply_filters("pys_form_event_factory",[]);
    foreach ($eventsFormFactory as $activeFormPlugin) :
        $options[$activeFormPlugin->getSlug()] = $activeFormPlugin->getName().' - PRO';
    endforeach;
	renderSelectInput( $event, $key, $options );

}
/**
 * @param CustomEvent $event
 * @param string      $key
 */

function renderPostTypeSelect(&$event, $key) {
    $types = get_post_types(null,"objects ");

    $options = array();
    foreach ($types as $type) {
        $options[$type->name]=$type->label;
    }

    renderSelectInput( $event, $key, $options );
}
/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderCurrencyParamInput( &$event, $key ) {
	
	$currencies = array(
		'AUD' => 'Australian Dollar',
		'BRL' => 'Brazilian Real',
		'CAD' => 'Canadian Dollar',
		'CZK' => 'Czech Koruna',
		'DKK' => 'Danish Krone',
		'EUR' => 'Euro',
		'HKD' => 'Hong Kong Dollar',
		'HUF' => 'Hungarian Forint',
		'IDR' => 'Indonesian Rupiah',
		'ILS' => 'Israeli New Sheqel',
		'JPY' => 'Japanese Yen',
		'KRW' => 'Korean Won',
		'MYR' => 'Malaysian Ringgit',
		'MXN' => 'Mexican Peso',
		'NOK' => 'Norwegian Krone',
		'NZD' => 'New Zealand Dollar',
		'PHP' => 'Philippine Peso',
		'PLN' => 'Polish Zloty',
		'RON' => 'Romanian Leu',
		'GBP' => 'Pound Sterling',
		'SGD' => 'Singapore Dollar',
		'SEK' => 'Swedish Krona',
		'CHF' => 'Swiss Franc',
		'TWD' => 'Taiwan New Dollar',
		'THB' => 'Thai Baht',
		'TRY' => 'Turkish Lira',
		'USD' => 'U.S. Dollar',
		'ZAR' => 'South African Rands'
	);
    
    $currencies = apply_filters( 'pys_currencies_list', $currencies );

	$options['']         = 'Please, select...';
	$options             = array_merge( $options, $currencies );
	$options['disabled'] = '';
	$options['custom']   = 'Custom currency';
	
	renderSelectInput( $event, $key, $options, true );
	
}

/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderFacebookEventTypeInput( &$event, $key ) {
	
	$options = array(
		'ViewContent'          => 'ViewContent',
		'AddToCart'            => 'AddToCart',
		'AddToWishlist'        => 'AddToWishlist',
		'InitiateCheckout'     => 'InitiateCheckout',
		'AddPaymentInfo'       => 'AddPaymentInfo',
		'Purchase'             => 'Purchase',
		'Lead'                 => 'Lead',
		'CompleteRegistration' => 'CompleteRegistration',
		
		'Subscribe'         => 'Subscribe',
		'CustomizeProduct'  => 'CustomizeProduct',
		'FindLocation'      => 'FindLocation',
		'StartTrial'        => 'StartTrial',
		'SubmitApplication' => 'SubmitApplication',
		'Schedule'          => 'Schedule',
		'Contact'           => 'Contact',
		'Donate'            => 'Donate',
		
		'disabled'    => '',
		'CustomEvent' => 'CustomEvent',
	);

	renderSelectInput( $event, $key, $options );

}

/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderFacebookParamInput( &$event, $key ) {
	
	$attr_name  = "pys[event][facebook_params][$key]";
	$attr_id    = 'pys_event_facebook_' . $key;
	$attr_value = $event->getFacebookParam( $key );
	
	?>

    <input type="text" name="<?php esc_attr_e( $attr_name ); ?>"
           id="<?php esc_attr_e( $attr_id ); ?>"
           value="<?php esc_attr_e( $attr_value ); ?>"
           placeholder="Enter value"
           class="form-control">
	
	<?php
	
}

/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderGoogleAnalyticsActionInput( &$event, $key ) {
 
	$options = array(
		'_custom'             => 'Custom Action',
		'disabled'            => '',
		'add_payment_info'    => 'add_payment_info',
		'add_to_cart'         => 'add_to_cart',
		'add_to_wishlist'     => 'add_to_wishlist',
		'begin_checkout'      => 'begin_checkout',
		'checkout_progress'   => 'checkout_progress',
		'generate_lead'       => 'generate_lead',
		'login'               => 'login',
		'purchase'            => 'purchase',
		'refund'              => 'refund',
		'remove_from_cart'    => 'remove_from_cart',
		'search'              => 'search',
		'select_content'      => 'select_content',
		'set_checkout_option' => 'set_checkout_option',
		'share'               => 'share',
		'sign_up'             => 'sign_up',
		'view_item'           => 'view_item',
		'view_item_list'      => 'view_item_list',
		'view_promotion'      => 'view_promotion',
		'view_search_results' => 'view_search_results',
	);

	renderSelectInput( $event, $key, $options, true );

}
/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderGoogleAnalyticsV4ActionInput( &$event, $key ) {
    renderGroupSelectInput( $event, $key, $event->GAEvents, false );
}
/**
 * @param CustomEvent $event
 * @param string      $key
 */
function renderPinterestEventTypeInput( &$event, $key ) {
	
	$options = array(
		'pagevisit'    => 'PageVisit',
		'viewcategory' => 'ViewCategory',
		'search'       => 'Search',
		'addtocart'    => 'AddToCart',
		'checkout'     => 'Checkout',
		'watchvideo'   => 'WatchVideo',
		'signup'       => 'Signup',
		'lead'         => 'Lead',
		'custom'       => 'Custom',
		'disabled'     => '',
		'CustomEvent'  => 'Partner Defined',
	);
	
	renderSelectInput( $event, $key, $options );
	
}
