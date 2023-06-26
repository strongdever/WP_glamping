<?php
require_once(ABSPATH.'wp-admin/includes/file.php');

class TypeSquare_ST_Api {
	private static $instance;

	private function __construct(){}

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}


	/**
	 * Create Font List JSON Files
	 *   Usage
	 *     Create Font JSON
	 *     $API = TypeSquare_ST_Api::get_instance();
	 *     $API->update_font_list();
	 *
	 *     Load Font JSON
	 *     $result = file_get_contents( path_join( TS_PLUGIN_URL, 'inc/font.json' ) );
	 *     $array = json_decode( $result, true );
	 */
	public function update_font_list() {

		$path_name = path_join( TS_PLUGIN_PATH , 'inc/assets/json/data.json' );
		if(WP_Filesystem()){
			global $wp_filesystem;
			$arr = $wp_filesystem->get_contents($path_name);
		}
		$url = json_decode( $arr , true ) ;
		$file_domain_url = $url['url']['file_domain'];
		$typesquare_file_domain = $file_domain_url;

		if (empty($file_domain_url)) {
			return;
		}

		try {
			$font_css_url = $typesquare_file_domain . $url['url']['font_css'];
			$result = wp_remote_get( $font_css_url , array(
					'timeout' => 30,
				)
			);
			if ( is_wp_error( $result ) ) {
				error_log( $result->get_error_message() );
				throw new Exception( $result->get_error_message() );
			} elseif ( 200 === $result['response']['code'] ) {
				$font_file_path = path_join( TS_PLUGIN_PATH , 'inc/assets/css/font.css' );
				file_put_contents( $font_file_path, $result['body'] );
			}
			$font_json_url = $typesquare_file_domain . $url['url']['font_json'];
			$result = wp_remote_get( $font_json_url , array(
					'timeout' => 30,
				)
			);
			if ( is_wp_error( $result ) ) {
				error_log( $result->get_error_message() );
				throw new Exception( $result->get_error_message() );
			} elseif ( 200 === $result['response']['code'] ) {
				$font_file_path = path_join( TS_PLUGIN_PATH , 'inc/font.json' );
				file_put_contents( $font_file_path, $result['body'] );
			}
		} catch ( Exception $e ) {
			$error = new WP_Error();
			$error->add( 'Morisawa Web API ERROR', $e->getMessage() );
			return $error;
		}
	}
}
