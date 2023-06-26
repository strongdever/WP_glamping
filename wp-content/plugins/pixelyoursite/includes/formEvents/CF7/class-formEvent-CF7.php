<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class FormEventCF7 extends Settings implements FormEventsFactory {
    private static $_instance;


    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }


    public function __construct() {
        parent::__construct( 'CF7' );

        $this->locateOptions(
            PYS_FREE_PATH . '/includes/formEvents/options_fields.json',
            PYS_FREE_PATH . '/includes/formEvents/options_defaults.json'
        );

        if($this->isActivePlugin()){
            add_filter("pys_form_event_factory",[$this,"register"]);
        }
    }

    function register($list) {
        $list[] = $this;
        return $list;
    }

    public function getSlug() {
        return "CF7";
    }
    public function getName() {
        return "Contact Form 7";
    }

    function isEnabled()
    {
        return $this->getOption( 'enabled' );
    }
    function isActivePlugin()
    {
        if ( ! function_exists( 'is_plugin_active' ) ) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        return is_plugin_active( 'contact-form-7/wp-contact-form-7.php' );
    }
    function getForms(){
        global $wpdb;
        $forms = wp_cache_get( 'cf7-forms' );
        if ( empty( $forms ) ) {
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = $wpdb->get_results(
                $wpdb->prepare(
                    'SELECT ID, post_title FROM ' . $wpdb->posts . ' WHERE post_type = %s AND post_status = %s', "wpcf7_contact_form", "publish"
                )
            );
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = wp_list_pluck( $forms, 'post_title', 'ID' );
            wp_cache_add( 'cf7-forms', $forms );
        }
        return $forms;

    }
    function getOptions() {
        return array(
            "name" => $this->getName(),
            "enabled" => $this->getOption( "enabled"),
            "form_ID_event" => $this->getOption( "form_ID_event")
        );
    }
}
/**
 * @return EventsCustom
 */
function FormEventCF7() {
    return FormEventCF7::instance();
}

FormEventCF7();