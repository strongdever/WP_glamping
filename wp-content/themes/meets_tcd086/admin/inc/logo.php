<?php
/*
 * ロゴの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_logo_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_logo_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_logo_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_logo_theme_options_validate' );


// タブの名前
function add_logo_tab_label( $tab_labels ) {
	$tab_labels['logo'] = __( 'Logo setting', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_logo_dp_default_options( $dp_default_options ) {

  //ヘッダーロゴ
	$dp_default_options['header_logo_type'] = 'type1';
	$dp_default_options['header_logo_font_size'] = '32';
	$dp_default_options['header_logo_font_size_mobile'] = '24';
	$dp_default_options['header_logo_image'] = false;
	$dp_default_options['header_logo_retina'] = '';
	$dp_default_options['header_logo_image_mobile'] = false;
	$dp_default_options['header_logo_retina_mobile'] = '';

  //フッターロゴ
	$dp_default_options['footer_logo_type'] = 'type1';
	$dp_default_options['footer_logo_font_size'] = '32';
	$dp_default_options['footer_logo_font_size_mobile'] = '24';
	$dp_default_options['footer_logo_image'] = false;
	$dp_default_options['footer_logo_retina'] = '';
	$dp_default_options['footer_logo_image_mobile'] = false;
	$dp_default_options['footer_logo_retina_mobile'] = '';
	$dp_default_options['footer_logo_font_color'] = '#ffffff';
	$dp_default_options['footer_logo_font_color_hover'] = '#cccccc';

	// トップページのロゴ
	$dp_default_options['index_logo_type'] = 'type1';
	$dp_default_options['index_logo_font_size'] = '32';
	$dp_default_options['index_logo_font_size_mobile'] = '24';
	$dp_default_options['index_logo_font_color'] = '#ffffff';
	$dp_default_options['index_logo_font_color_hover'] = '#cccccc';
	$dp_default_options['index_logo_image'] = false;
	$dp_default_options['index_logo_retina'] = '';
	$dp_default_options['index_logo_image_mobile'] = false;
	$dp_default_options['index_logo_retina_mobile'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_tab_panel( $options ) {

  global $dp_default_options, $logo_type_options, $site_desc_options;

?>

<div id="tab-content-logo" class="tab-content">


   <?php // ヘッダーのロゴの設定 ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header logo setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button select_logo_type">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" class="logo_type_option_<?php esc_attr_e( $option['value'] ); ?>" id="header_logo_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[header_logo_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['header_logo_type'], $option['value'] ); ?> />
       <label for="header_logo_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area" style="<?php if( $options['header_logo_type'] == 'type1' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_logo_font_size]" value="<?php echo esc_attr( $options['header_logo_font_size'] ); ?>"><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[header_logo_font_size_mobile]" value="<?php echo esc_attr( $options['header_logo_font_size_mobile'] ); ?>"><span>px</span></li>
      </ul>
     </div>
     <div class="logo_image_area" style="<?php if( $options['header_logo_type'] == 'type2' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Logo image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '150'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image'] ); ?>" id="header_logo_image" name="dp_options[header_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image']){ echo wp_get_attachment_image($options['header_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[header_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
      <h4 class="theme_option_headline2"><?php _e('Logo image (mobile)', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php printf(__('Maximum height is %s. We recommend to use the background transparent PNG image.', 'tcd-w'), '50'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image_mobile'] ); ?>" id="header_logo_image_mobile" name="dp_options[header_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image_mobile']){ echo wp_get_attachment_image($options['header_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[header_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターのロゴの設定 ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Footer logo setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button select_logo_type">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" class="logo_type_option_<?php esc_attr_e( $option['value'] ); ?>" id="footer_logo_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[footer_logo_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['footer_logo_type'], $option['value'] ); ?> />
       <label for="footer_logo_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area" style="<?php if( $options['footer_logo_type'] == 'type1' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_logo_font_size]" value="<?php echo esc_attr( $options['footer_logo_font_size'] ); ?>"><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_logo_font_size_mobile]" value="<?php echo esc_attr( $options['footer_logo_font_size_mobile'] ); ?>"><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_logo_font_color]" value="<?php echo esc_attr( $options['footer_logo_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
       <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_logo_font_color_hover]" value="<?php echo esc_attr( $options['footer_logo_font_color_hover'] ); ?>" data-default-color="#cccccc" class="c-color-picker"></li>
      </ul>
     </div>
     <div class="logo_image_area" style="<?php if( $options['footer_logo_type'] == 'type2' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Logo image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php echo __('We recommend to use the background transparent PNG image.', 'tcd-w'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js footer_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['footer_logo_image'] ); ?>" id="footer_logo_image" name="dp_options[footer_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['footer_logo_image']){ echo wp_get_attachment_image($options['footer_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['footer_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[footer_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['footer_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
      <h4 class="theme_option_headline2"><?php _e('Logo image (mobile)', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p>
        <?php echo __('We recommend to use the background transparent PNG image.', 'tcd-w'); ?><br />
        <?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?>
       </p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js footer_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['footer_logo_image_mobile'] ); ?>" id="footer_logo_image_mobile" name="dp_options[footer_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['footer_logo_image_mobile']){ echo wp_get_attachment_image($options['footer_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['footer_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input name="dp_options[footer_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['footer_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // トップページのロゴの設定 ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Front page logo setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Type of logo', 'tcd-w');  ?></h4>
     <ul class="design_radio_button select_logo_type">
      <?php foreach ( $logo_type_options as $option ) { ?>
      <li>
       <input type="radio" class="logo_type_option_<?php esc_attr_e( $option['value'] ); ?>" id="front_page_logo_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[index_logo_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $options['index_logo_type'], $option['value'] ); ?> />
       <label for="front_page_logo_<?php esc_attr_e( $option['value'] ); ?>"><?php echo $option['label']; ?></label>
      </li>
      <?php } ?>
     </ul>
     <div class="logo_text_area" style="<?php if( $options['index_logo_type'] == 'type1' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font setting', 'tcd-w');  ?></h4>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[index_logo_font_size]" value="<?php echo esc_attr( $options['index_logo_font_size'] ); ?>"><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[index_logo_font_size_mobile]" value="<?php echo esc_attr( $options['index_logo_font_size_mobile'] ); ?>"><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[index_logo_font_color]" value="<?php echo esc_attr( $options['index_logo_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
       <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[index_logo_font_color_hover]" value="<?php echo esc_attr( $options['index_logo_font_color_hover'] ); ?>" data-default-color="#cccccc" class="c-color-picker"></li>
      </ul>
     </div>
     <div class="logo_image_area" style="<?php if( $options['index_logo_type'] == 'type2' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js index_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['index_logo_image'] ); ?>" id="index_logo_image" name="dp_options[index_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['index_logo_image']){ echo wp_get_attachment_image($options['index_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[index_logo_retina]" name="dp_options[index_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
      <h4 class="theme_option_headline2"><?php _e('Image (mobile)', 'tcd-w');  ?></h4>
      <div class="theme_option_message2">
       <p><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></p>
      </div>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js index_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['index_logo_image_mobile'] ); ?>" id="index_logo_image_mobile" name="dp_options[index_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['index_logo_image_mobile']){ echo wp_get_attachment_image($options['index_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <p><label><input id="dp_options[index_logo_retina_mobile]" name="dp_options[index_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['index_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

</div><!-- END .tab-content -->

<?php
} // END add_logo_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_theme_options_validate( $input ) {

  global $dp_default_options, $logo_type_options;

  // ヘッダーロゴ
  if ( ! isset( $input['header_logo_type'] ) )
    $input['header_logo_type'] = null;
  if ( ! array_key_exists( $input['header_logo_type'], $logo_type_options ) )
    $input['header_logo_type'] = null;
  $input['header_logo_font_size'] = wp_filter_nohtml_kses( $input['header_logo_font_size'] );
  $input['header_logo_font_size_mobile'] = wp_filter_nohtml_kses( $input['header_logo_font_size_mobile'] );
  $input['header_logo_image'] = wp_filter_nohtml_kses( $input['header_logo_image'] );
  $input['header_logo_retina'] = ! empty( $input['header_logo_retina'] ) ? 1 : 0;
  $input['header_logo_image_mobile'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile'] );
  $input['header_logo_retina_mobile'] = ! empty( $input['header_logo_retina_mobile'] ) ? 1 : 0;


  // フッターロゴ
  if ( ! isset( $input['footer_logo_type'] ) )
    $input['footer_logo_type'] = null;
  if ( ! array_key_exists( $input['footer_logo_type'], $logo_type_options ) )
    $input['footer_logo_type'] = null;
  $input['footer_logo_font_size'] = wp_filter_nohtml_kses( $input['footer_logo_font_size'] );
  $input['footer_logo_font_size_mobile'] = wp_filter_nohtml_kses( $input['footer_logo_font_size_mobile'] );
  $input['footer_logo_image'] = wp_filter_nohtml_kses( $input['footer_logo_image'] );
  $input['footer_logo_retina'] = ! empty( $input['footer_logo_retina'] ) ? 1 : 0;
  $input['footer_logo_image_mobile'] = wp_filter_nohtml_kses( $input['footer_logo_image_mobile'] );
  $input['footer_logo_retina_mobile'] = ! empty( $input['footer_logo_retina_mobile'] ) ? 1 : 0;
  $input['footer_logo_font_color'] = wp_filter_nohtml_kses( $input['footer_logo_font_color'] );
  $input['footer_logo_font_color_hover'] = wp_filter_nohtml_kses( $input['footer_logo_font_color_hover'] );


  // トップページのロゴ
  if ( ! isset( $input['index_logo_type'] ) )
    $input['index_logo_type'] = null;
  if ( ! array_key_exists( $input['index_logo_type'], $logo_type_options ) )
    $input['index_logo_type'] = null;
  $input['index_logo_font_size'] = wp_filter_nohtml_kses( $input['index_logo_font_size'] );
  $input['index_logo_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_logo_font_size_mobile'] );
  $input['index_logo_font_color'] = wp_filter_nohtml_kses( $input['index_logo_font_color'] );
  $input['index_logo_font_color_hover'] = wp_filter_nohtml_kses( $input['index_logo_font_color_hover'] );
  $input['index_logo_image'] = wp_filter_nohtml_kses( $input['index_logo_image'] );
  $input['index_logo_retina'] = ! empty( $input['index_logo_retina'] ) ? 1 : 0;
  $input['index_logo_image_mobile'] = wp_filter_nohtml_kses( $input['index_logo_image_mobile'] );
  $input['index_logo_retina_mobile'] = ! empty( $input['index_logo_retina_mobile'] ) ? 1 : 0;

	return $input;

};


?>