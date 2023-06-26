<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function maybeMigrate() {
	
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	
	if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	$pys_free_7_version = get_option( 'pys_core_version', false );

    if ($pys_free_7_version && version_compare($pys_free_7_version, '9.0.0', '<') ) {
        migrate_9_0_0();

        update_option( 'pys_core_version', PYS_FREE_VERSION );
        update_option( 'pys_updated_at', time() );
    } elseif ($pys_free_7_version && version_compare($pys_free_7_version, '7.1.0', '<')) {

        migrate_7_1_0_bing_defaults();

        update_option( 'pys_core_version', PYS_FREE_VERSION );
        update_option( 'pys_updated_at', time() );

    }
	
}

function migrate_9_0_0() {
    $globalOptions = [
        "automatic_events_enabled" => PYS()->getOption("signal_events_enabled") || PYS()->getOption("automatic_events_enabled"),
        "automatic_event_form_enabled" => PYS()->getOption("signal_form_enabled"),
        "automatic_event_download_enabled" => PYS()->getOption("signal_download_enabled"),
        "automatic_event_comment_enabled" => PYS()->getOption("signal_comment_enabled"),
        "automatic_event_scroll_enabled" => PYS()->getOption("signal_page_scroll_enabled"),
        "automatic_event_time_on_page_enabled" => PYS()->getOption("signal_time_on_page_enabled"),
        "automatic_event_scroll_value" => PYS()->getOption("signal_page_scroll_value"),
        "automatic_event_time_on_page_value" => PYS()->getOption("signal_time_on_page_value"),
        "automatic_event_download_extensions" => PYS()->getOption("download_event_extensions"),
    ];
    PYS()->updateOptions($globalOptions);
}

function migrate_7_1_0_bing_defaults() {

    $bing_defaults = array(
        'gdpr_bing_prior_consent_enabled' => true,
        'gdpr_cookiebot_bing_consent_category' => 'marketing',
    );

    // update settings
    PYS()->updateOptions( $bing_defaults );
    PYS()->reloadOptions();

}
