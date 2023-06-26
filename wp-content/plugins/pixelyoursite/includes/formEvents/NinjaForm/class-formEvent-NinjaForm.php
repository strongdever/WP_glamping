<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class FormEventNinjaForm extends Settings implements FormEventsFactory {
    private static $_instance;
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    public function __construct() {
        parent::__construct( 'NinjaForm' );

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
        return "ninjaform";
    }
    public function getName() {
        return "Ninja Form";
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

        return is_plugin_active( 'ninja-forms/ninja-forms.php' );
    }
    function getForms(){
        global $wpdb, $table_prefix;
        $forms = array();
        if ( empty( $forms ) ) {
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
            $forms = $wpdb->get_results(
                $wpdb->prepare(
                    'SELECT id, title FROM '.$table_prefix.'nf3_forms ORDER BY %s DESC', "created_at"
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
 * @return FormEventNinjaForm
 */
function FormEventNinjaForm() {
    return FormEventNinjaForm::instance();
}

FormEventNinjaForm();