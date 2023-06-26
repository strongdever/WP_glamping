<?php

namespace PixelYourSite\GA\Helpers;

use PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Render Cross Domain Domain text field
 *
 * @param int    $index
 */
function renderCrossDomainDomain( $index = 0 ) {
    
    $slug = PixelYourSite\GA()->getSlug();
    
    $attr_name = "pys[$slug][cross_domain_domains][]";
    $attr_id = 'pys_' . $slug . '_cross_domain_domains_' . $index;
    
    $values = (array) PixelYourSite\GA()->getOption( 'cross_domain_domains' );
    $attr_value = isset( $values[ $index ] ) ? $values[ $index ] : null;
    
    ?>
    
    <input type="text" name="<?php esc_attr_e( $attr_name ); ?>"
           id="<?php esc_attr_e( $attr_id ); ?>"
           value="<?php esc_attr_e( $attr_value ); ?>"
           placeholder="Enter domain"
           class="form-control">
    
    <?php
    
}

function getWooProductContentId( $product_id ) {

    if ( PixelYourSite\GA()->getOption( 'woo_content_id' ) == 'product_sku' ) {
        $content_id = get_post_meta( $product_id, '_sku', true );
    } else {
        $content_id = $product_id;
    }

    $prefix = PixelYourSite\GA()->getOption( 'woo_content_id_prefix' );
    $suffix = PixelYourSite\GA()->getOption( 'woo_content_id_suffix' );

    $value = $prefix . $content_id . $suffix;

    return $value;
}

function getWooCartItemId( $item ) {

    if ( ! PixelYourSite\GA()->getOption( 'woo_variable_as_simple' ) && isset( $item['variation_id'] ) && $item['variation_id'] !== 0 ) {
        $product_id = $item['variation_id'];
    } else {
        $product_id = $item['product_id'];
    }

    return $product_id;
}

/*
 * EASY DIGITAL DOWNLOADS
 */

function getEddDownloadContentId( $download_id )
{

    if (PixelYourSite\GA()->getOption('edd_content_id') == 'download_sku') {
        $content_id = get_post_meta($download_id, 'edd_sku', true);
    } else {
        $content_id = $download_id;
    }

    $prefix = PixelYourSite\GA()->getOption('edd_content_id_prefix');
    $suffix = PixelYourSite\GA()->getOption('edd_content_id_suffix');

    return $prefix . $content_id . $suffix;
}