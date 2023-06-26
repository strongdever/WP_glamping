<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

const HTML_WARNING  = '<i class="fa fa-exclamation-triangle text-warning" aria-hidden="true" style="color: #fa0;"></i> ';
const HTML_CRITICAL = '<i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #d64d4d;"></i> ';
const TEXT_WARNING  = '[warning] ';
const TEXT_CRITICAL = '[critical] ';

/**
 * @return array
 */
function get_system_report_data( $for_download = false ) {
    global $wpdb;


    /**
     * Wordpress
     */
    
    $wordpress = array(
        'Home URL'     => get_option( 'home' ),
        'Site URL'     => get_option( 'siteurl' ),
        'WP version'   => get_bloginfo( 'version' ),
        'WP multisite' => is_multisite() ? 'Yes' : 'No',
        'Language'     => get_locale(),
    );
    
    /**
     * Server
     */

    // check php version
    if ( version_compare( phpversion(), '5.3.0', '<' ) ) {
        $version_check  = $for_download ? TEXT_CRITICAL : HTML_CRITICAL;
        $version_check .= 'Ask your hosting company to upgrade you to at least PHP 5.6.15 or newer. ';
    } elseif ( version_compare( phpversion(), '5.6.14', '<' ) ) {
        $version_check = $for_download ? TEXT_WARNING : HTML_WARNING;
        $version_check .= 'Ask your hosting company to upgrade you to at least PHP 5.6.15 or newer. ';
    } else {
        $version_check = '';
    }

    // check mb_string extension presence
    if ( extension_loaded( 'mbstring' ) ) {
        $mb_string_check = 'Yes';
    } else {
        $mb_string_check = $for_download ? TEXT_WARNING : HTML_WARNING;
        $mb_string_check .= 'No. Ask your hosting company to upgrade to enable "mbstring" extension.';
    }
    
    $server = array(
        'Server info'      => isset( $_SERVER['SERVER_SOFTWARE'] ) ? $_SERVER['SERVER_SOFTWARE'] : 'Unknown',
        'PHP version'      => phpversion() . $version_check,
        'Multibyte string' => $mb_string_check,
        'MySQL version'    => ( ! empty( $wpdb->is_mysql ) ? $wpdb->db_version() : 'Unknown' ),
    );
    
    /**
     * Plugins
     */
    
    $plugins = array();

    $conflict_plugins = array(
        'sumodiscounts/sumodiscounts.php' => array(
            'type' => 'warning',
        ),
        'imagify/imagify.php'             => array(
            'type' => 'warning',
        ),
    );
    
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    require_once( ABSPATH . 'wp-admin/includes/update.php' );
    
    if ( function_exists( 'get_plugin_updates' ) ) {
        
        // Get both site plugins and network plugins
        $active_plugins = (array) get_option( 'active_plugins', array() );
        if ( is_multisite() ) {
            $network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
            $active_plugins            = array_merge( $active_plugins, $network_activated_plugins );
        }
        
        $available_updates = get_plugin_updates();
        
        foreach ( $active_plugins as $plugin ) {

            $data  = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            $name  = $data['Name'];
            $value = '';

            // check for conflicts
            if ( array_key_exists( $plugin, $conflict_plugins ) ) {

                $conflict_data = $conflict_plugins[ $plugin ];

                if ( $for_download ) {
                    $value .= $conflict_data['type'] == 'warning' ? TEXT_WARNING : TEXT_CRITICAL;
                } else {
                    $value .= $conflict_data['type'] == 'warning' ? HTML_WARNING : HTML_CRITICAL;
                }

            }

            // add plugin author name and URL
            if ( $for_download ) {
                $value .= 'by ' . $data['AuthorName'] . ' [' . esc_url_raw( $data['PluginURI'] ) . ']';
            } else {
                $value .= 'by <a href="' . esc_url_raw( $data['PluginURI'] ) . '" target="_blank">' .
                    $data['AuthorName'] . '</a> ';
            }

            // plugin version
            $value .= '[' . $data['Version'] . '] ';

            // available update version if any
            if ( array_key_exists( $plugin, $available_updates ) ) {
                $update = $available_updates[ $plugin ];
                $value .= '[Update available: ' . $update->update->new_version . '] ';
            }

            // is network activated?
            if ( $data['Network'] ) {
                $value .= '[Network] ';
            }
            
            $plugins[ $name ] = trim( $value );
            
        }
        
    }
    
    /**
     * Theme
     */
    
    $active_theme = wp_get_theme();
    
    $theme = array(
        'Name'        => $active_theme->Name,
        'Version'     => $active_theme->Version,
        'Author URL'  => esc_url_raw( $active_theme->{'Author URI'} ),
        'Child Theme' => is_child_theme() ? 'Yes' : 'No',
    );
    
    if ( is_child_theme() ) {
        
        $parent_theme = wp_get_theme( $active_theme->Template );
        
        $theme['Parent Theme Name']    = $parent_theme->Name;
        $theme['Parent Theme Version'] = $parent_theme->Version;
        $theme['Parent Author URL']    = $parent_theme->{'Author URI'};
        
    }
    
    $report = array(
        'WordPress Environment' => $wordpress,
        'Server Environment'    => $server,
        'Active Plugins'        => $plugins,
        'Theme'                 => $theme,
    );
    
    return apply_filters( 'pys_system_report', $report, $for_download );
    
}

/**
 * Process a system report download.
 */
function download_system_report() {
    
    if ( empty( $_POST['pys_action'] ) || 'download_system_report' !== $_POST['pys_action'] ) {
        return;
    }
    
    if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'pys_download_system_report_nonce' ) ) {
        return;
    }
    
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    // prepare human-readable system report
    $output      = "";
    $report_data = get_system_report_data( true );
    
    foreach ( $report_data as $section_name => $section_report ) {
        
        $output .= "\r\n";
        $output .= "### {$section_name } ###";
        $output .= "\r\n";
        $output .= "\r\n";
        
        foreach ( $section_report as $name => $value ) {
            
            $output .= "{$name}: $value";
            $output .= "\r\n";
            
        }
        
    }
    
    // send report to client browser
    ignore_user_abort( true );
    nocache_headers();
    header( 'Content-Type: text/plain; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=pys-system-report-' . date( 'm-d-Y' ) . '.txt' );
    header( "Expires: 0" );
    echo $output;
    exit;
    
}

add_action( 'admin_init', 'PixelYourSite\download_system_report' );