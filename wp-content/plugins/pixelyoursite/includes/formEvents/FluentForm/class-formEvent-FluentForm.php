<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class FormEventFluentForm extends Settings implements FormEventsFactory {
    private static $_instance;
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    public function __construct() {
        parent::__construct( 'Fluentform' );

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
        return "fluentform";
    }
    public function getName() {
        return "Fluentform";
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

        return is_plugin_active( 'fluentform/fluentform.php' );
    }
    function getForms(){
        global $wpdb, $table_prefix;
        $forms = array();
        if ( empty( $forms ) ) {
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = $wpdb->get_results(
                $wpdb->prepare(
                    'SELECT id, title FROM '.$table_prefix.'fluentform_forms WHERE `status` = %s ORDER BY %s DESC', "published", "created_at"
                )
            );
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = wp_list_pluck( $forms, 'title', 'id' );
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
 * @return FormEventFluentForm
 */
function FormEventFluentForm() {
    return FormEventFluentForm::instance();
}

FormEventFluentForm();