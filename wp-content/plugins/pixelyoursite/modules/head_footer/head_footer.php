<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class HeadFooter extends Settings {

	private static $_instance;

	private $is_mobile;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

	public function __construct() {
		
		parent::__construct( 'head_footer' );
		
		$this->locateOptions(
            PYS_FREE_PATH . '/modules/head_footer/options_fields.json',
            PYS_FREE_PATH . '/modules/head_footer/options_defaults.json'
		);
		
		add_action( 'pys_register_plugins', function( $core ) {
			/** @var PYS $core */
			$core->registerPlugin( $this );
		} );
		
		if ( $this->getOption( 'enabled' ) ) {
			add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
			add_action( 'save_post', array( $this, 'save_meta_box' ) );
		}
		
		if ( $this->getOption( 'enabled' ) ) {
			add_action( 'template_redirect', array( $this, 'output_scripts' ) );
		}
		
	}

	/**
	 * Register meta box for each public post type.
	 */
	public function register_meta_box() {
		
		if ( current_user_can( 'manage_pys' ) ) {
			
			$screens = get_post_types( array( 'public' => true ) );
			
			foreach ( $screens as $screen ) {
				add_meta_box( 'pys-head-footer', 'PixelYourSite Head & Footer Scripts',
					array( $this, 'render_meta_box' ),
					$screen );
			}
			
		}

	}

	public function render_meta_box() {
		include 'views/html-meta-box.php';
	}

	public function save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		
		if ( ! current_user_can( 'manage_pys' ) ) {
			return;
		}

		if ( ! isset( $_POST['pys_head_footer'] ) ) {
		//	delete_post_meta( $post_id, '_pys_head_footer' );
			return;
		}

		$data = $_POST['pys_head_footer'];

		$meta = array(
			'disable_global' => isset( $data['disable_global'] ) ? true : false,
			'head_any'       => isset( $data['head_any'] ) ? trim( $data['head_any'] ) : '',
			'head_desktop'   => isset( $data['head_desktop'] ) ? trim( $data['head_desktop'] ) : '',
			'head_mobile'    => isset( $data['head_mobile'] ) ? trim( $data['head_mobile'] ) : '',
			'footer_any'     => isset( $data['footer_any'] ) ? trim( $data['footer_any'] ) : '',
			'footer_desktop' => isset( $data['footer_desktop'] ) ? trim( $data['footer_desktop'] ) : '',
			'footer_mobile'  => isset( $data['footer_mobile'] ) ? trim( $data['footer_mobile'] ) : '',
		);

		update_post_meta( $post_id, '_pys_head_footer', $meta );

	}

	public function output_scripts() {
		global $post;

		if ( is_admin() || defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) ) {
			return;
		}
        
        $this->is_mobile = wp_is_mobile();

		/**
		 * WooCommerce Order Received page
		 */

		if ( isWooCommerceActive() && is_order_received_page() ) {
			add_action( 'wp_head', array( $this, 'output_head_woo_order_received' ) );
			add_action( 'wp_footer', array( $this, 'output_footer_woo_order_received' ) );
		}

		$disabled_by_woo = isWooCommerceActive() && is_order_received_page() &&
		                   $this->getOption( 'woo_order_received_disable_global' );

		if ( $disabled_by_woo ) {
			return;
		}

		/**
		 * Single Post
		 */

		if ( is_singular() && $post ) {
			$post_meta = get_post_meta( $post->ID, '_pys_head_footer', true );
		} else {
			$post_meta = array();
		}

		if ( ! empty( $post_meta ) ) {
			add_action( 'wp_head', array( $this, 'output_head_post' ) );
			add_action( 'wp_footer', array( $this, 'output_footer_post' ) );
		}

		/**
		 * Global
		 */

		$disabled_by_post = ! empty( $post_meta ) && isset($post_meta['disable_global']) && $post_meta['disable_global'];

		if ( ! $disabled_by_post ) {
			add_action( 'wp_head', array( $this, 'output_head_global' ) );
			add_action( 'wp_footer', array( $this, 'output_footer_global' ) );
		}

	}

	public function output_head_woo_order_received() {

		$scripts_any = $this->getOption( 'woo_order_received_head_any' );

		if ( $scripts_any ) {
            echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = $this->getOption( 'woo_order_received_head_mobile' );
		} else {
			$scripts_by_device = $this->getOption( 'woo_order_received_head_desktop' );
		}

		if ( $scripts_by_device ) {
			echo "\r\n{$scripts_by_device}\r\n";
		}

	}

	public function output_footer_woo_order_received() {

		$scripts_any = $this->getOption( 'woo_order_received_footer_any' );

		if ( $scripts_any ) {
            echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = $this->getOption( 'woo_order_received_footer_mobile' );
		} else {
			$scripts_by_device = $this->getOption( 'woo_order_received_footer_desktop' );
		}

		if ( $scripts_by_device ) {
            echo "\r\n{$scripts_by_device}\r\n";
		}

	}

	public function output_head_global() {

		$scripts_any = $this->getOption( 'head_any' );

		if ( $scripts_any ) {
            echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = $this->getOption( 'head_mobile' );
		} else {
			$scripts_by_device = $this->getOption( 'head_desktop' );
		}

		if ( $scripts_by_device ) {
            echo "\r\n{$scripts_by_device}\r\n";
		}

	}

	public function output_footer_global() {

		$scripts_any = $this->getOption( 'footer_any' );

		if ( $scripts_any ) {
            echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = $this->getOption( 'footer_mobile' );
		} else {
			$scripts_by_device = $this->getOption( 'footer_desktop' );
		}

		if ( $scripts_by_device ) {
            echo "\r\n{$scripts_by_device}\r\n";
		}

	}

	public function output_head_post() {
		global $post;

		$post_meta = get_post_meta( $post->ID, '_pys_head_footer', true );

		$scripts_any = isset( $post_meta['head_any'] ) ? $post_meta['head_any'] : false;

		if ( $scripts_any ) {
            echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = isset( $post_meta['head_mobile'] ) ? $post_meta['head_mobile'] : false;
		} else {
			$scripts_by_device = isset( $post_meta['head_desktop'] ) ? $post_meta['head_desktop'] : false;
		}

		if ( $scripts_by_device ) {
            echo "\r\n{$scripts_by_device}\r\n";
		}

	}

	public function output_footer_post() {
		global $post;

		$post_meta = get_post_meta( $post->ID, '_pys_head_footer', true );

		$scripts_any = isset( $post_meta['footer_any'] ) ? $post_meta['footer_any'] : false;

		if ( $scripts_any ) {
			echo "\r\n{$scripts_any}\r\n";
		}

		if ( $this->is_mobile ) {
			$scripts_by_device = isset( $post_meta['footer_mobile'] ) ? $post_meta['footer_mobile'] : false;
		} else {
			$scripts_by_device = isset( $post_meta['footer_desktop'] ) ? $post_meta['footer_desktop'] : false;
		}

		if ( $scripts_by_device ) {
            echo "\r\n{$scripts_by_device}\r\n";
		}

	}

}

/**
 * @return HeadFooter
 */
function HeadFooter() {
	return HeadFooter::instance();
}

HeadFooter();