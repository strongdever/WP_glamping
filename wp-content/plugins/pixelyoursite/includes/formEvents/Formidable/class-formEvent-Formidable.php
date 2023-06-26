<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class FormEventFormidable extends Settings implements FormEventsFactory {
    private static $_instance;


    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }


    public function __construct() {
        parent::__construct( 'Formidable' );

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
        return "formidable";
    }
    public function getName() {
        return "Formidable";
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

        return is_plugin_active( 'formidable/formidable.php' );
    }
    function getForms(){
        global $wpdb, $table_prefix;
        $forms = array();
        if ( empty( $forms ) ) {
            $forms = $wpdb->get_results(
                $wpdb->prepare(
                    'SELECT id, name FROM `'.$table_prefix.'frm_forms` WHERE `status` LIKE %s ORDER BY created_at DESC', "published"
                )
            );
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = wp_list_pluck( $forms, 'name', 'id' );
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
function FormEventFormidable() {
    return FormEventFormidable::instance();
}

FormEventFormidable();