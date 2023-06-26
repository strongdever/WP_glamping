<?php

function tcd_quicktag_admin_init() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	if ( $dp_options['use_quicktags'] && ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) ) {
		add_filter( 'mce_external_plugins', 'tcd_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'tcd_register_mce_button' );
		add_action( 'admin_print_footer_scripts', 'tcd_add_quicktags' );

		// Dynamic css for classic visual editor
		add_filter( 'editor_stylesheets', 'editor_stylesheets_tcd_visual_editor_dynamic_css' );

		// Dymamic css for visual editor on block editor
		wp_enqueue_style( 'tcd-quicktags', get_tcd_quicktags_dynamic_css_url(), false, version_num() );
	}
}
add_action( 'admin_init', 'tcd_quicktag_admin_init' );

// Declare script for new button
function tcd_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['tcd_mce_button'] = get_template_directory_uri() . '/admin/js/mce-button.js?ver=' . version_num();
	return $plugin_array;
}

// Register new button in the editor
function tcd_register_mce_button( $buttons ) {
	array_push( $buttons, 'tcd_mce_button' );
	return $buttons;
}

function tcd_add_quicktags() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	$custom_buttons = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$custom_button_class = 'q_custom_button' . $i;
		$custom_button_class .= ' animation_' . $dp_options['qt_custom_button_animation_type' . $i];

		if ( 'type2' === $dp_options['qt_custom_button_type' . $i] ) {
			$custom_button_class .= ' rounded';
		} elseif ( 'type3' === $dp_options['qt_custom_button_type' . $i] ) {
			$custom_button_class .= ' pill';
		}
		if ( 'type1' === $dp_options['qt_custom_button_size' . $i] ) {
			$custom_button_size = 'width:130px; height:40px;';
		} elseif ( 'type2' === $dp_options['qt_custom_button_size' . $i] ) {
			$custom_button_size = 'width:240px; height:60px;';
		} elseif ( 'type3' === $dp_options['qt_custom_button_size' . $i] ) {
			$custom_button_size = 'width:400px; height:70px;';
		}

		$custom_buttons[$i] = '<a href="#" class="q_custom_button ' . $custom_button_class . '" style="' . $custom_button_size . '">' . sprintf( __( 'Button %d', 'tcd-w' ), $i ) . '</a>';
	}

	$speech_balloons = array();
	for ( $i = 1; $i <= 4; $i++ ) {
		$user_image = null;
		if ( $dp_options['qt_speech_balloon_user_image' . $i] ) {
			$user_image = wp_get_attachment_url( $dp_options['qt_speech_balloon_user_image' . $i] );
		}

		if ( $user_image ) {
			$user_image_url = $user_image;
		} else {
			$user_image_url = get_template_directory_uri() . '/img/common/no_avatar.png';
		}

		if ( 2 === $i ) {
			$tag = 'speech_balloon_left2';
		} elseif ( 3 === $i ) {
			$tag = 'speech_balloon_right1';
		} elseif ( 4 === $i ) {
			$tag = 'speech_balloon_right2';
		} elseif ( 1 === $i ) {
			$tag = 'speech_balloon_left1';
		}

		$speech_balloons[$i] = '[' . $tag . ' user_image_url="' . esc_attr( $user_image_url ) . '" user_name="' . esc_attr( $dp_options['qt_speech_balloon_user_name' . $i] ) . '"]' . __( 'Text and image tags to display in the speech balloon', 'tcd-w' ) . '[/' . $tag . ']';
	}

	$tcdQuicktagsL10n = array(
		'pulldown_title' => array(
			'display' => __( 'quicktags', 'tcd-w' ),
		),
		'ytube' => array(
			'display' => __( 'Youtube', 'tcd-w' ),
			'tag' => __( '<div class="ytube">Youtube code here</div>', 'tcd-w' )
		),
		'relatedcardlink' => array(
			'display' => __( 'Cardlink', 'tcd-w' ),
			'tag' => __( '[clink url="Post URL to display"]', 'tcd-w' )
		),
		'post_col-2' => array(
			'display' => __( '2 column', 'tcd-w' ),
			'tag' => __( '<div class="post_row"><div class="post_col post_col-2">Text and image tags to display in the left column</div><div class="post_col post_col-2">Text and image tags to display in the right column</div></div>', 'tcd-w' )
		),
		'post_col-3' => array(
			'display' => __( '3 column', 'tcd-w' ),
			'tag' => __( '<div class="post_row"><div class="post_col post_col-3">Text and image tags to display in the left column</div><div class="post_col post_col-3">Text and image tags to display in the center column</div><div class="post_col post_col-3">Text and image tags to display in the right column</div></div>', 'tcd-w' )
		),
		'q_comment_out' => array(
			'display' => __( 'Comment out', 'tcd-w' ),
			'tag' => '<div class="hidden"><!-- ' . __( 'Text entered in this area will not be displayed on the browser', 'tcd-w' ) . ' --></div>'
		),
		'q_h2' => array(
			'display' => __( 'Styled h2 tag', 'tcd-w' ),
			'tag' => '<h2 class="styled_h2">' . __( 'Heading 2', 'tcd-w' ) . '</h2>'
		),
		'q_h3' => array(
			'display' => __( 'Styled h3 tag', 'tcd-w' ),
			'tag' => '<h3 class="styled_h3">' . __( 'Heading 3', 'tcd-w' ) . '</h3>'
		),
		'q_h4' => array(
			'display' => __( 'Styled h4 tag', 'tcd-w' ),
			'tag' => '<h3 class="styled_h4">' . __( 'Heading 4', 'tcd-w' ) . '</h4>'
		),
		'q_h5' => array(
			'display' => __( 'Styled h5 tag', 'tcd-w' ),
			'tag' => '<h3 class="styled_h5">' . __( 'Heading 5', 'tcd-w' ) . '</h5>'
		),
		'well2' => array(
			'display' => __( 'Frame style', 'tcd-w' ),
			'tag' => __( '<p class="well2">Frame style</p>', 'tcd-w' )
		),
		'q_custom_button1' => array(
			'display' => sprintf( __( 'Button %d', 'tcd-w' ), 1 ),
			'tag' => $custom_buttons[1]
		),
		'q_custom_button2' => array(
			'display' => sprintf( __( 'Button %d', 'tcd-w' ), 2 ),
			'tag' => $custom_buttons[2]
		),
		'q_custom_button3' => array(
			'display' => sprintf( __( 'Button %d', 'tcd-w' ), 3 ),
			'tag' => $custom_buttons[3]
		),
		'q_underline1' => array(
			'display' => sprintf( __( 'Underline %d', 'tcd-w' ), 1 ),
			'tag' => '<span class="q_underline q_underline1" style="border-bottom-color: ' . esc_attr( $dp_options['qt_underline_color1'] ) . ';">' . __( 'Underline1', 'tcd-w' ) . '</span>'
		),
		'q_underline2' => array(
			'display' => sprintf( __( 'Underline %d', 'tcd-w' ), 2 ),
			'tag' => '<span class="q_underline q_underline2" style="border-bottom-color: ' . esc_attr( $dp_options['qt_underline_color2'] ) . ';">' . __( 'Underline2', 'tcd-w' ) . '</span>'
		),
		'q_underline3' => array(
			'display' => sprintf( __( 'Underline %d', 'tcd-w' ), 3 ),
			'tag' => '<span class="q_underline q_underline3" style="border-bottom-color: ' . esc_attr( $dp_options['qt_underline_color3'] ) . ';">' . __( 'Underline3', 'tcd-w' ) . '</span>'
		),
		'speech_balloon_left1' => array(
			'display' => __( 'Speech balloon left 1', 'tcd-w' ),
			'tag' => $speech_balloons[1]
		),
		'speech_balloon_left2' => array(
			'display' => __( 'Speech balloon left 2', 'tcd-w' ),
			'tag' => $speech_balloons[2]
		),
		'speech_balloon_right1' => array(
			'display' => __( 'Speech balloon right 1', 'tcd-w' ),
			'tag' => $speech_balloons[3]
		),
		'speech_balloon_right2' => array(
			'display' => __( 'Speech balloon right 2', 'tcd-w' ),
			'tag' => $speech_balloons[4]
		),
		'single_banner' => array(
			'display' => __( 'advertisement', 'tcd-w' ),
			'tag' => '[s_ad]'
		),
		'google_map' => array(
			'display' => __( 'Google map' ),
			'tag' => '[qt_google_map address="'. __( 'Enter address here', 'tcd-w' ) . '"]'
		)
	);
?>
<script type="text/javascript">
<?php
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		echo "var tcdQuicktagsL10n = " . json_encode( $tcdQuicktagsL10n ) . ";\n";
	}
	if ( wp_script_is( 'quicktags' ) ) {
		foreach ( $tcdQuicktagsL10n as $key => $value ) {
			if ( is_numeric( $key ) || empty( $value['display'] ) ) continue;
			if ( empty( $value['tag'] ) && empty( $value['tagStart'] ) ) continue;

			if ( isset( $value['tag'] ) && ! isset( $value['tagStart'] ) ) {
				$value['tagStart'] = $value['tag'] . "\n\n";
			}
			if ( ! isset( $value['tagEnd'] ) ) {
				$value['tagEnd'] = '';
			}

			$key = json_encode( $key );
			$display = json_encode( $value['display'] );
			$tagStart = json_encode( $value['tagStart'] );
			$tagEnd = json_encode( $value['tagEnd'] );
			echo "QTags.addButton($key, $display, $tagStart, $tagEnd);\n";
		}
	}
?>
</script>
<?php
}

// Get dymamic css url
function get_tcd_quicktags_dynamic_css_url() {
	return admin_url( 'admin-ajax.php?action=tcd_quicktags_dynamic_css' );
}

// Dymamic css for visual editor
function tcd_ajax_quicktags_dynamic_css() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	header( 'Content-Type: text/css; charset=UTF-8' );

?>
.styled_h2, .editor-styles-wrapper .styled_h2 {
  font-size:<?php echo esc_attr($dp_options['qt_h2_font_size']); ?>px; text-align:<?php echo esc_attr($dp_options['qt_h2_text_align']); ?>; color:<?php echo esc_attr($dp_options['qt_h2_font_color']); ?>; <?php if($dp_options['show_qt_h2_bg_color']) { ?>background:<?php echo esc_attr($dp_options['qt_h2_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($dp_options['qt_h2_border_top_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h2_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($dp_options['qt_h2_border_bottom_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h2_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($dp_options['qt_h2_border_left_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h2_border_left_color']); ?>;
  border-right:<?php echo esc_attr($dp_options['qt_h2_border_right_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h2_border_right_color']); ?>;
  padding:<?php echo esc_attr($dp_options['qt_h2_padding_top']); ?>px <?php echo esc_attr($dp_options['qt_h2_padding_right']); ?>px <?php echo esc_attr($dp_options['qt_h2_padding_bottom']); ?>px <?php echo esc_attr($dp_options['qt_h2_padding_left']); ?>px;
  margin:<?php echo esc_attr($dp_options['qt_h2_margin_top']); ?>px 0px <?php echo esc_attr($dp_options['qt_h2_margin_bottom']); ?>px;
}
.styled_h3, .editor-styles-wrapper .styled_h3 {
  font-size:<?php echo esc_attr($dp_options['qt_h3_font_size']); ?>px; text-align:<?php echo esc_attr($dp_options['qt_h3_text_align']); ?>; color:<?php echo esc_attr($dp_options['qt_h3_font_color']); ?>; <?php if($dp_options['show_qt_h3_bg_color']) { ?>background:<?php echo esc_attr($dp_options['qt_h3_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($dp_options['qt_h3_border_top_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h3_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($dp_options['qt_h3_border_bottom_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h3_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($dp_options['qt_h3_border_left_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h3_border_left_color']); ?>;
  border-right:<?php echo esc_attr($dp_options['qt_h3_border_right_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h3_border_right_color']); ?>;
  padding:<?php echo esc_attr($dp_options['qt_h3_padding_top']); ?>px <?php echo esc_attr($dp_options['qt_h3_padding_right']); ?>px <?php echo esc_attr($dp_options['qt_h3_padding_bottom']); ?>px <?php echo esc_attr($dp_options['qt_h3_padding_left']); ?>px;
  margin:<?php echo esc_attr($dp_options['qt_h3_margin_top']); ?>px 0px <?php echo esc_attr($dp_options['qt_h3_margin_bottom']); ?>px;
}
.styled_h4, .editor-styles-wrapper .styled_h4 {
  font-size:<?php echo esc_attr($dp_options['qt_h4_font_size']); ?>px; text-align:<?php echo esc_attr($dp_options['qt_h4_text_align']); ?>; color:<?php echo esc_attr($dp_options['qt_h4_font_color']); ?>; <?php if($dp_options['show_qt_h4_bg_color']) { ?>background:<?php echo esc_attr($dp_options['qt_h4_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($dp_options['qt_h4_border_top_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h4_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($dp_options['qt_h4_border_bottom_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h4_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($dp_options['qt_h4_border_left_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h4_border_left_color']); ?>;
  border-right:<?php echo esc_attr($dp_options['qt_h4_border_right_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h4_border_right_color']); ?>;
  padding:<?php echo esc_attr($dp_options['qt_h4_padding_top']); ?>px <?php echo esc_attr($dp_options['qt_h4_padding_right']); ?>px <?php echo esc_attr($dp_options['qt_h4_padding_bottom']); ?>px <?php echo esc_attr($dp_options['qt_h4_padding_left']); ?>px;
  margin:<?php echo esc_attr($dp_options['qt_h4_margin_top']); ?>px 0px <?php echo esc_attr($dp_options['qt_h4_margin_bottom']); ?>px;
}
.styled_h5, .editor-styles-wrapper .styled_h5 {
  font-size:<?php echo esc_attr($dp_options['qt_h5_font_size']); ?>px; text-align:<?php echo esc_attr($dp_options['qt_h5_text_align']); ?>; color:<?php echo esc_attr($dp_options['qt_h5_font_color']); ?>; <?php if($dp_options['show_qt_h5_bg_color']) { ?>background:<?php echo esc_attr($dp_options['qt_h5_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($dp_options['qt_h5_border_top_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h5_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($dp_options['qt_h5_border_bottom_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h5_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($dp_options['qt_h5_border_left_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h5_border_left_color']); ?>;
  border-right:<?php echo esc_attr($dp_options['qt_h5_border_right_width']); ?>px solid <?php echo esc_attr($dp_options['qt_h5_border_right_color']); ?>;
  padding:<?php echo esc_attr($dp_options['qt_h5_padding_top']); ?>px <?php echo esc_attr($dp_options['qt_h5_padding_right']); ?>px <?php echo esc_attr($dp_options['qt_h5_padding_bottom']); ?>px <?php echo esc_attr($dp_options['qt_h5_padding_left']); ?>px;
  margin:<?php echo esc_attr($dp_options['qt_h5_margin_top']); ?>px 0px <?php echo esc_attr($dp_options['qt_h5_margin_bottom']); ?>px;
}
<?php
     for ( $i = 1; $i <= 3; $i++ ) {
       $qt_custom_button_border_color = hex2rgb($dp_options['qt_custom_button_border_color' . $i]);
       $qt_custom_button_border_color = implode(",",$qt_custom_button_border_color);
       $qt_custom_button_border_color_hover = hex2rgb($dp_options['qt_custom_button_border_color_hover' . $i]);
       $qt_custom_button_border_color_hover = implode(",",$qt_custom_button_border_color_hover);
?>
.q_custom_button<?php echo $i; ?> {
  color:<?php echo esc_attr($dp_options['qt_custom_button_font_color' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color); ?>,<?php echo esc_attr($dp_options['qt_custom_button_border_color_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1 { background:<?php echo esc_attr($dp_options['qt_custom_button_bg_color' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:hover, .q_custom_button<?php echo $i; ?>:focus {
  color:<?php echo esc_attr($dp_options['qt_custom_button_font_color_hover' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color_hover); ?>,<?php echo esc_attr($dp_options['qt_custom_button_border_color_hover_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1:hover { background:<?php echo esc_attr($dp_options['qt_custom_button_bg_color_hover' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:before { background:<?php echo esc_attr($dp_options['qt_custom_button_bg_color_hover' . $i]); ?>; }
<?php }; ?>
<?php
	exit;
}
add_action( 'wp_ajax_tcd_quicktags_dynamic_css', 'tcd_ajax_quicktags_dynamic_css' );

// add_editor_style()だとテーマ内のcssが最後になるためここで最後尾にcss追加
function editor_stylesheets_tcd_visual_editor_dynamic_css( $stylesheets ) {
	$stylesheets[] = get_tcd_quicktags_dynamic_css_url();
	$stylesheets = array_unique( $stylesheets );
	return $stylesheets;
}
