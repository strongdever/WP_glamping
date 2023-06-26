<?php
/**
 * Manage acceleration tab
 */

// Add default values
add_filter( 'before_getting_design_plus_option', 'add_acceleration_dp_default_options' );

// Add label of acceleration tab
add_action( 'tcd_tab_labels', 'add_acceleration_tab_label' );

// Add HTML of acceleration tab
add_action( 'tcd_tab_panel', 'add_acceleration_tab_panel' );

// Register sanitize function
add_filter( 'theme_options_validate', 'add_acceleration_theme_options_validate' );

function add_acceleration_dp_default_options( $dp_default_options ) {
	$dp_default_options['use_emoji'] = 0;
	$dp_default_options['use_js_optimization'] = 0;
	$dp_default_options['use_css_optimization'] = 0;
	$dp_default_options['use_html_optimization'] = 0;

	return $dp_default_options;
}

function add_acceleration_tab_label( $tab_labels ) {
	$tab_labels['acceleration'] = __( 'Acceleration', 'tcd-w' );
	return $tab_labels;
}

function add_acceleration_tab_panel( $dp_options ) {
?>
<div id="tab-content-acceleration" class="tab-content">
	<div class="theme_option_field cf theme_option_field_ac open active">
		<h3 class="theme_option_headline"><?php _e( 'Acceleration setting', 'tcd-w' ); ?></h3>
		<div class="theme_option_field_ac_content">
			<h4 class="theme_option_headline2"><?php _e( 'Emoji setting', 'tcd-w' ); ?></h4>
			<div class="theme_option_message2">
				<p><?php _e( "We recommend to checkoff this option if you dont use any Emoji in your post content.", 'tcd-w' ); ?></p>
			</div>
			<p><label><input name="dp_options[use_emoji]" type="checkbox" value="1" <?php checked( 1, $dp_options['use_emoji'] ); ?>><?php _e( 'Use emoji', 'tcd-w' ); ?></label></p>
			<h4 class="theme_option_headline2"><?php _e( 'Optimization setting', 'tcd-w' ); ?></h4>
			<div class="theme_option_message2">
				<p><?php _e( 'Check here to remove margins and line breaks in JavaScript.', 'tcd-w' ); ?></p>
			</div>
			<p><label><input name="dp_options[use_js_optimization]" type="checkbox" value="1" <?php checked( 1, $dp_options['use_js_optimization'] ); ?>> <?php _e( 'Use JavaScript optimization', 'tcd-w' ); ?></label></p>
			<div class="theme_option_message2">
				<p><?php _e( 'Check here to remove margins and line breaks in CSS.<br>It also improves the loading speed by generating a page common CSS cache file.<br>* This specification does not apply to external CSS (CDN, etc.).', 'tcd-w' ); ?></p>
			</div>
			<p><label><input name="dp_options[use_css_optimization]" type="checkbox" value="1" <?php checked( 1, $dp_options['use_css_optimization'] ); ?>> <?php _e( 'Use CSS optimization', 'tcd-w' ); ?></label></p>
			<div class="theme_option_message2">
				<p><?php _e( 'Check here to remove margins and line breaks in HTML.', 'tcd-w' ); ?></p>
			</div>
			<p><label><input name="dp_options[use_html_optimization]" type="checkbox" value="1" <?php checked( 1, $dp_options['use_html_optimization'] ); ?>> <?php _e( 'Use HTML optimization', 'tcd-w' ); ?></label></p>

			<ul class="button_list cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>"></li>
			</ul>
		</div>
	</div>
</div>
<?php
}

function add_acceleration_theme_options_validate( $input ) {
	$input['use_emoji'] = ! empty( $input['use_emoji'] ) ? 1 : 0;
	$input['use_js_optimization'] = ! empty( $input['use_js_optimization'] ) ? 1 : 0;
	$input['use_css_optimization'] = ! empty( $input['use_css_optimization'] ) ? 1 : 0;
	$input['use_html_optimization'] = ! empty( $input['use_html_optimization'] ) ? 1 : 0;

	return $input;
}
