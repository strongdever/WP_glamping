<?php

/**
 * 広告
 */
function theme_option_single_banner() {

	$options = get_design_plus_option();

    if( $options['single_shortcode_ad_code'] || $options['single_shortcode_ad_image'] ) {

      $html = '';

      $html .= '<div id="single_banner_shortcode" class="single_banner">' . "\n";

      if ($options['single_shortcode_ad_code']) {
        $html .= $options['single_shortcode_ad_code'] . "\n";
      } else {
        $banner_image = wp_get_attachment_image_src( $options['single_shortcode_ad_image'], 'full' );
        $html .= '<a href="' . $options['single_shortcode_ad_url'] . '" target="_blank"><img class="single_banner_image" src="' . $banner_image[0] . '" alt="" title="" /></a>' . "\n";
      }

      $html .= '</div>' . "\n";

      return $html;

    };

}
add_shortcode('s_ad', 'theme_option_single_banner');


/**
 * 広告（お知らせ用）
 */
function theme_option_news_single_banner() {

	$options = get_design_plus_option();

    if( $options['news_single_shortcode_ad_code'] || $options['news_single_shortcode_ad_image'] ) {

      $html = '';

      $html .= '<div id="single_banner_shortcode" class="single_banner">' . "\n";

      if ($options['news_single_shortcode_ad_code']) {
        $html .= $options['news_single_shortcode_ad_code'] . "\n";
      } else {
        $banner_image = wp_get_attachment_image_src( $options['news_single_shortcode_ad_image'], 'full' );
        $html .= '<a href="' . $options['news_single_shortcode_ad_url'] . '" target="_blank"><img class="single_banner_image" src="' . $banner_image[0] . '" alt="" title="" /></a>' . "\n";
      }

      $html .= '</div>' . "\n";

      return $html;

    };

}
add_shortcode('news_s_ad', 'theme_option_news_single_banner');


/**
 * 広告（特集用）
 */
function theme_option_featured_single_banner() {

	$options = get_design_plus_option();

    if( $options['featured_single_shortcode_ad_code'] || $options['featured_single_shortcode_ad_image'] ) {

      $html = '';

      $html .= '<div id="single_banner_shortcode" class="single_banner">' . "\n";

      if ($options['featured_single_shortcode_ad_code']) {
        $html .= $options['featured_single_shortcode_ad_code'] . "\n";
      } else {
        $banner_image = wp_get_attachment_image_src( $options['featured_single_shortcode_ad_image'], 'full' );
        $html .= '<a href="' . $options['featured_single_shortcode_ad_url'] . '" target="_blank"><img class="single_banner_image" src="' . $banner_image[0] . '" alt="" title="" /></a>' . "\n";
      }

      $html .= '</div>' . "\n";

      return $html;

    };

}
add_shortcode('featured_s_ad', 'theme_option_featured_single_banner');


/**
 * 吹き出しクイックタグ用ショートコード
 */
function tcd_shortcode_speech_balloon( $atts, $content, $tag ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$atts = shortcode_atts( array(
		'user_image_url' => '',
		'user_name' => ''
	), $atts );

	// user_image_urlが指定されていればメディアID取得・差し替えを試みる
	$user_image_url = $atts['user_image_url'];
	if ( $atts['user_image_url'] ) {
		$attachment_id = attachment_url_to_postid( $atts['user_image_url'] );
		if ( $attachment_id ) {
			$user_image = wp_get_attachment_image_src( $attachment_id, array( 300, 300, true ) );
			if ( $user_image ) {
				$atts['user_image_url'] = $user_image[0];
			}
		}
	}

	$html = '<div class="speach_balloon ' . esc_attr( $tag ) . '">'
		  . '<div class="speach_balloon_user">';

	if ( $atts['user_image_url'] ) {
		$html .= '<img class="speach_balloon_user_image" src="' . esc_attr( $atts['user_image_url'] ) . '" alt="' . esc_attr( $atts['user_image_url'] ) . '">';
	}

	$html .= '<div class="speach_balloon_user_name">' . esc_html( $atts['user_name'] ) . '</div>'
		  . '</div>'
		  . '<div class="speach_balloon_text">' .  wpautop( $content )   . '</div>'
		  .  '</div>';

	return $html;
}
add_shortcode( 'speech_balloon_left1', 'tcd_shortcode_speech_balloon' );
add_shortcode( 'speech_balloon_left2', 'tcd_shortcode_speech_balloon' );
add_shortcode( 'speech_balloon_right1', 'tcd_shortcode_speech_balloon' );
add_shortcode( 'speech_balloon_right2', 'tcd_shortcode_speech_balloon' );


/**
 * Google Map用ショートコード
 */
function tcd_google_map( $atts) {
  global $options;
  if ( ! $options ) $options = get_design_plus_option();

  $atts = shortcode_atts( array(
    'address' => '',
  ), $atts );

  $html = '';

  if ( $atts['address'] ) {

    $use_custom_overlay = 'type2' === $options['qt_gmap_marker_type'] ? 1 : 0;
    $marker_img = $options['qt_gmap_marker_img'] ? wp_get_attachment_url( $options['qt_gmap_marker_img'] ) : '';
    if(!empty($marker_img)) {
      $marker_text = '';
    } else {
      $marker_text = $options['qt_gmap_marker_text'];
    }
    $access_saturation = isset( $options['qt_access_saturation'] ) ? intval( $options['qt_access_saturation'] ) : -100;
    $rand = rand();

    $html .= "<div class='qt_google_map'>\n";
    $html .= " <div class='qt_googlemap clearfix'>\n";
    $html .= "  <div id='qt_google_map".$rand."' class='qt_googlemap_embed'></div>\n";
    $html .= " </div>\n";
    $html .= " <script>\n";
    $html .= " jQuery(window).on('load', function() {\n";
    $html .= "  initMap('qt_google_map" . $rand . "', '" . esc_js( $atts['address'] ) . "', " . esc_js( $access_saturation ) . ", " . esc_js( $use_custom_overlay ) . ", '" . esc_js( $marker_img ) . "', '" . esc_js( $marker_text ) . "');\n";
    $html .= " });\n";
    $html .= " </script>\n";
    $html .= "</div>\n";

    if ( ! wp_script_is( 'qt_google_map_api', 'enqueued' ) ) {
      wp_enqueue_script( 'qt_google_map_api', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr( $options['qt_gmap_api_key'] ), array(), version_num(), true );
      wp_enqueue_script( 'qt_google_map', get_template_directory_uri() . '/js/googlemap.js', array(), version_num(), true );
    }
  }

	return $html;
}
add_shortcode( 'qt_google_map', 'tcd_google_map' );
?>