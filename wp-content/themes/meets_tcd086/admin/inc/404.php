<?php
/*
 * 404設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_404_dp_default_options' );


// Add label of basic tab
add_action( 'tcd_tab_labels', 'add_404_tab_label' );


// Add HTML of basic tab
add_action( 'tcd_tab_panel', 'add_404_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_404_theme_options_validate' );


// タブの名前
function add_404_tab_label( $tab_labels ) {
	$tab_labels['404'] = __( '404 page', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_404_dp_default_options( $dp_default_options ) {

	// 404 ページ
	$dp_default_options['header_image_404'] = false;
	$dp_default_options['header_txt_404'] = '404 NOT FOUND';
	$dp_default_options['header_txt_size_404'] = 48;
	$dp_default_options['header_txt_size_404_mobile'] = 32;
	$dp_default_options['header_txt_color_404'] = '#ffffff';
	$dp_default_options['dropshadow_404_h'] = 0;
	$dp_default_options['dropshadow_404_v'] = 0;
	$dp_default_options['dropshadow_404_b'] = 0;
	$dp_default_options['dropshadow_404_c'] = '#888888';
	$dp_default_options['header_sub_txt_404'] = __( 'The page you are looking for are not found', 'tcd-w' );
	$dp_default_options['header_sub_txt_size_404'] = 16;
	$dp_default_options['header_sub_txt_size_404_mobile'] = 14;
	$dp_default_options['use_overlay_404'] = 1;
	$dp_default_options['overlay_color_404'] = '#000000';
	$dp_default_options['overlay_opacity_404'] = '0.5';

	$dp_default_options['hide_header_404'] = 1;
	$dp_default_options['hide_footer_404'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_404_tab_panel( $options ) {

  global $dp_default_options;

?>

<div id="tab-content-basic" class="tab-content">


   <?php // 404 ページ ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac open active">
    <h3 class="theme_option_headline"><?php _e( 'Settings for 404 page', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'Background image', 'tcd-w' ); ?></h4>
     <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '815'); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js header_image_404">
       <input type="hidden" value="<?php echo esc_attr( $options['header_image_404'] ); ?>" id="header_image_404" name="dp_options[header_image_404]" class="cf_media_id">
       <div class="preview_field"><?php if ( $options['header_image_404'] ) { echo wp_get_attachment_image( $options['header_image_404'], 'medium' ); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['header_image_404'] ) { echo 'hidden'; } ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
     <textarea class="large-text" cols="50" rows="2" name="dp_options[header_txt_404]"><?php echo esc_textarea( $options['header_txt_404'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_txt_size_404]" value="<?php echo esc_attr( $options['header_txt_size_404'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_txt_size_404_mobile'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[header_txt_color_404]" value="<?php echo esc_attr( $options['header_txt_color_404'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e( 'Dropshadow of headline', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'Enter "0" if you don\'t want to use dropshadow.', 'tcd-w' ); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Dropshadow position (left)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[dropshadow_404_h]" value="<?php echo esc_attr( $options['dropshadow_404_h'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Dropshadow position (top)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[dropshadow_404_v]" value="<?php echo esc_attr( $options['dropshadow_404_v'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Dropshadow size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[dropshadow_404_b]" value="<?php echo esc_attr( $options['dropshadow_404_b'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Dropshadow color', 'tcd-w'); ?></span><input type="text" name="dp_options[dropshadow_404_c]" value="<?php echo esc_attr( $options['dropshadow_404_c'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e( 'Subtitle', 'tcd-w' ); ?></h4>
     <textarea class="full_width" cols="50" rows="2" name="dp_options[header_sub_txt_404]"><?php echo esc_textarea( $options['header_sub_txt_404'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404]" value="<?php echo esc_attr( $options['header_sub_txt_size_404'] ); ?>"><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_sub_txt_size_404_mobile'] ); ?>"><span>px</span></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Overlay setting', 'tcd-w');  ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[use_overlay_404]" type="checkbox" value="1" <?php checked( $options['use_overlay_404'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['use_overlay_404'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Overlay color', 'tcd-w'); ?></span><input type="text" name="dp_options[overlay_color_404]" value="<?php echo esc_attr( $options['overlay_color_404'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
       <li class="cf">
        <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[overlay_opacity_404]" value="<?php echo esc_attr( $options['overlay_opacity_404'] ); ?>" />
        <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
         <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
        </div>
       </li>
      </ul>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Hide header', 'tcd-w');  ?></span><input name="dp_options[hide_header_404]" type="checkbox" value="1" <?php checked( '1', $options['hide_header_404'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Hide footer', 'tcd-w');  ?></span><input name="dp_options[hide_footer_404]" type="checkbox" value="1" <?php checked( '1', $options['hide_footer_404'] ); ?> /></li>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_basic_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_404_theme_options_validate( $input ) {

  global $dp_default_options;


  // 404 ページ
  $input['header_image_404'] = wp_filter_nohtml_kses( $input['header_image_404'] );
  $input['header_txt_404'] = wp_filter_nohtml_kses( $input['header_txt_404'] );
  $input['header_sub_txt_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_404'] );
  $input['header_txt_size_404'] = wp_filter_nohtml_kses( $input['header_txt_size_404'] );
  $input['header_sub_txt_size_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404'] );
  $input['header_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_txt_size_404_mobile'] );
  $input['header_sub_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404_mobile'] );
  $input['header_txt_color_404'] = wp_filter_nohtml_kses( $input['header_txt_color_404'] );
  $input['dropshadow_404_h'] = wp_filter_nohtml_kses( $input['dropshadow_404_h'] );
  $input['dropshadow_404_v'] = wp_filter_nohtml_kses( $input['dropshadow_404_v'] );
  $input['dropshadow_404_b'] = wp_filter_nohtml_kses( $input['dropshadow_404_b'] );
  $input['dropshadow_404_c'] = wp_filter_nohtml_kses( $input['dropshadow_404_c'] );
  $input['use_overlay_404'] = ! empty( $input['use_overlay_404'] ) ? 1 : 0;
  $input['overlay_color_404'] = wp_filter_nohtml_kses( $input['overlay_color_404'] );
  $input['overlay_opacity_404'] = wp_filter_nohtml_kses( $input['overlay_opacity_404'] );

  $input['hide_header_404'] = ! empty( $input['hide_header_404'] ) ? 1 : 0;
  $input['hide_footer_404'] = ! empty( $input['hide_footer_404'] ) ? 1 : 0;

	return $input;

};


?>