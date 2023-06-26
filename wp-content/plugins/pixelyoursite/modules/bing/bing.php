<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Bing extends Settings implements Pixel {

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

	public function __construct() {
        add_action( 'pys_admin_pixel_ids', array( $this, 'renderPixelIdField' ) );
	}
	
	public function enabled() {
		return false;
	}
	
	public function configured() {
		return false;
	}
	
	public function getPixelIDs() {
		return array();
	}
	
	public function getPixelOptions() {
	    return array();
    }
    
    public function getEventData( $eventType, $args = null ) {
	    return false;
    }
	
	public function outputNoScriptEvents() {}

	public function render_switcher_input( $key, $collapse = false, $disabled = false ) {

		$attr_id = 'pys_bing_' . $key;

		?>

		<div class="custom-switch disabled">
			<input type="checkbox" value="1" disabled="disabled"
			       id="<?php esc_attr_e( $attr_id ); ?>" class="custom-switch-input">
			<label class="custom-switch-btn" for="<?php esc_attr_e( $attr_id ); ?>"></label>
		</div>

		<?php
	}

	public function renderCustomEventOptions( $event ) {}

	public function renderAddonNotice() {
	    echo '&nbsp;<a href="https://www.pixelyoursite.com/bing-tag?utm_source=pys-free-plugin&utm_medium=bing-badge&utmcampaign=bing-free-plugin" target="_blank" class="badge badge-pill badge-secondary">Requires paid add-on</a>';
    }

    public function renderPixelIdField() {
        ?>

            <div class="row align-items-center">
                <div class="col-2 py-4">
                    <img class="tag-logo" src="<?php echo PYS_FREE_URL; ?>/dist/images/microsoft-small-square.png">
                </div>
                <div class="col-10">
                    <h4 class="label">Microsoft the UET Tag (Bing) with <a href="https://www.pixelyoursite.com/bing-tag?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-bing" target="_blank">this pro add-on.</a></h4>
                </div>
            </div>
            <hr>

        <?php
    }
}

/**
 * @return Bing
 */
function Bing() {
	return Bing::instance();
}

Bing();