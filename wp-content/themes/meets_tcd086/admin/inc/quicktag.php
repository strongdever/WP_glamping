<?php
/*
 * クイックタグの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_quicktag_dp_default_options' );


//  Add label of quicktag tab
add_action( 'tcd_tab_labels', 'add_quicktag_tab_label' );


// Add HTML of quicktag tab
add_action( 'tcd_tab_panel', 'add_quicktag_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_quicktag_theme_options_validate' );


// タブの名前
function add_quicktag_tab_label( $tab_labels ) {
	$tab_labels['quicktag'] = __( 'Quick tag', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_quicktag_dp_default_options( $dp_default_options ) {

	$dp_default_options['use_quicktags'] = 1;
	$dp_default_options['qt_custom_button_type1'] = 'type1';
	$dp_default_options['qt_custom_button_size1'] = 'type2';
	$dp_default_options['qt_custom_button_font_color1'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color1'] = '#535353';
	$dp_default_options['qt_custom_button_border_color1'] = '#535353';
	$dp_default_options['qt_custom_button_border_color_opacity1'] = '1';
	$dp_default_options['qt_custom_button_font_color_hover1'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color_hover1'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover1'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover_opacity1'] = '1';
	$dp_default_options['qt_custom_button_animation_type1'] = 'type1';
	$dp_default_options['qt_custom_button_type2'] = 'type2';
	$dp_default_options['qt_custom_button_size2'] = 'type2';
	$dp_default_options['qt_custom_button_font_color2'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color2'] = '#535353';
	$dp_default_options['qt_custom_button_border_color2'] = '#535353';
	$dp_default_options['qt_custom_button_border_color_opacity2'] = '1';
	$dp_default_options['qt_custom_button_font_color_hover2'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color_hover2'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover2'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover_opacity2'] = '1';
	$dp_default_options['qt_custom_button_animation_type2'] = 'type1';
	$dp_default_options['qt_custom_button_type3'] = 'type3';
	$dp_default_options['qt_custom_button_size3'] = 'type2';
	$dp_default_options['qt_custom_button_font_color3'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color3'] = '#535353';
	$dp_default_options['qt_custom_button_border_color3'] = '#535353';
	$dp_default_options['qt_custom_button_border_color_opacity3'] = '1';
	$dp_default_options['qt_custom_button_font_color_hover3'] = '#ffffff';
	$dp_default_options['qt_custom_button_bg_color_hover3'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover3'] = '#7d7d7d';
	$dp_default_options['qt_custom_button_border_color_hover_opacity3'] = '1';
	$dp_default_options['qt_custom_button_animation_type3'] = 'type1';
	$dp_default_options['qt_underline_color1'] = '#fff799';
	$dp_default_options['qt_underline_color2'] = '#99f9ff';
	$dp_default_options['qt_underline_color3'] = '#ff99b8';
	$dp_default_options['qt_speech_balloon_user_image1'] = '';
	$dp_default_options['qt_speech_balloon_user_name1'] = '';
	$dp_default_options['qt_speech_balloon_font_color1'] = '#000000';
	$dp_default_options['qt_speech_balloon_bg_color1'] = '#ffdfdf';
	$dp_default_options['qt_speech_balloon_border_color1'] = '#ffdfdf';
	$dp_default_options['qt_speech_balloon_user_image2'] = '';
	$dp_default_options['qt_speech_balloon_user_name2'] = '';
	$dp_default_options['qt_speech_balloon_font_color2'] = '#000000';
	$dp_default_options['qt_speech_balloon_bg_color2'] = '#ffffff';
	$dp_default_options['qt_speech_balloon_border_color2'] = '#ff5353';
	$dp_default_options['qt_speech_balloon_user_image3'] = '';
	$dp_default_options['qt_speech_balloon_user_name3'] = '';
	$dp_default_options['qt_speech_balloon_font_color3'] = '#000000';
	$dp_default_options['qt_speech_balloon_bg_color3'] = '#ccf4ff';
	$dp_default_options['qt_speech_balloon_border_color3'] = '#ccf4ff';
	$dp_default_options['qt_speech_balloon_user_image4'] = '';
	$dp_default_options['qt_speech_balloon_user_name4'] = '';
	$dp_default_options['qt_speech_balloon_font_color4'] = '#000000';
	$dp_default_options['qt_speech_balloon_bg_color4'] = '#ffffff';
	$dp_default_options['qt_speech_balloon_border_color4'] = '#0789b5';

	$dp_default_options['qt_h2_text_align'] = 'left';
	$dp_default_options['qt_h2_font_size'] = '26';
	$dp_default_options['qt_h2_font_color'] = '#ffffff';
	$dp_default_options['show_qt_h2_bg_color'] = '1';
	$dp_default_options['qt_h2_bg_color'] = '#000000';
	$dp_default_options['qt_h2_border_top_width'] = '0';
	$dp_default_options['qt_h2_border_bottom_width'] = '0';
	$dp_default_options['qt_h2_border_left_width'] = '0';
	$dp_default_options['qt_h2_border_right_width'] = '0';
	$dp_default_options['qt_h2_border_top_color'] = '#dddddd';
	$dp_default_options['qt_h2_border_bottom_color'] = '#dddddd';
	$dp_default_options['qt_h2_border_left_color'] = '#dddddd';
	$dp_default_options['qt_h2_border_right_color'] = '#dddddd';
	$dp_default_options['qt_h2_padding_top'] = '15';
	$dp_default_options['qt_h2_padding_bottom'] = '15';
	$dp_default_options['qt_h2_padding_left'] = '15';
	$dp_default_options['qt_h2_padding_right'] = '15';
	$dp_default_options['qt_h2_margin_top'] = '0';
	$dp_default_options['qt_h2_margin_bottom'] = '30';

	$dp_default_options['qt_h3_text_align'] = 'left';
	$dp_default_options['qt_h3_font_size'] = '22';
	$dp_default_options['qt_h3_font_color'] = '#000000';
	$dp_default_options['show_qt_h3_bg_color'] = '';
	$dp_default_options['qt_h3_bg_color'] = '#fafafa';
	$dp_default_options['qt_h3_border_top_width'] = '0';
	$dp_default_options['qt_h3_border_bottom_width'] = '0';
	$dp_default_options['qt_h3_border_left_width'] = '2';
	$dp_default_options['qt_h3_border_right_width'] = '0';
	$dp_default_options['qt_h3_border_top_color'] = '#dddddd';
	$dp_default_options['qt_h3_border_bottom_color'] = '#dddddd';
	$dp_default_options['qt_h3_border_left_color'] = '#000000';
	$dp_default_options['qt_h3_border_right_color'] = '#dddddd';
	$dp_default_options['qt_h3_padding_top'] = '6';
	$dp_default_options['qt_h3_padding_bottom'] = '6';
	$dp_default_options['qt_h3_padding_left'] = '16';
	$dp_default_options['qt_h3_padding_right'] = '0';
	$dp_default_options['qt_h3_margin_top'] = '0';
	$dp_default_options['qt_h3_margin_bottom'] = '30';

	$dp_default_options['qt_h4_text_align'] = 'left';
	$dp_default_options['qt_h4_font_size'] = '18';
	$dp_default_options['qt_h4_font_color'] = '#000000';
	$dp_default_options['show_qt_h4_bg_color'] = '';
	$dp_default_options['qt_h4_bg_color'] = '#ffffff';
	$dp_default_options['qt_h4_border_top_width'] = '0';
	$dp_default_options['qt_h4_border_bottom_width'] = '1';
	$dp_default_options['qt_h4_border_left_width'] = '0';
	$dp_default_options['qt_h4_border_right_width'] = '0';
	$dp_default_options['qt_h4_border_top_color'] = '#dddddd';
	$dp_default_options['qt_h4_border_bottom_color'] = '#dddddd';
	$dp_default_options['qt_h4_border_left_color'] = '#dddddd';
	$dp_default_options['qt_h4_border_right_color'] = '#dddddd';
	$dp_default_options['qt_h4_padding_top'] = '3';
	$dp_default_options['qt_h4_padding_bottom'] = '3';
	$dp_default_options['qt_h4_padding_left'] = '20';
	$dp_default_options['qt_h4_padding_right'] = '0';
	$dp_default_options['qt_h4_margin_top'] = '0';
	$dp_default_options['qt_h4_margin_bottom'] = '30';

	$dp_default_options['qt_h5_text_align'] = 'left';
	$dp_default_options['qt_h5_font_size'] = '14';
	$dp_default_options['qt_h5_font_color'] = '#000000';
	$dp_default_options['show_qt_h5_bg_color'] = '';
	$dp_default_options['qt_h5_bg_color'] = '#ffffff';
	$dp_default_options['qt_h5_border_top_width'] = '0';
	$dp_default_options['qt_h5_border_bottom_width'] = '1';
	$dp_default_options['qt_h5_border_left_width'] = '0';
	$dp_default_options['qt_h5_border_right_width'] = '0';
	$dp_default_options['qt_h5_border_top_color'] = '#dddddd';
	$dp_default_options['qt_h5_border_bottom_color'] = '#dddddd';
	$dp_default_options['qt_h5_border_left_color'] = '#dddddd';
	$dp_default_options['qt_h5_border_right_color'] = '#dddddd';
	$dp_default_options['qt_h5_padding_top'] = '3';
	$dp_default_options['qt_h5_padding_bottom'] = '3';
	$dp_default_options['qt_h5_padding_left'] = '24';
	$dp_default_options['qt_h5_padding_right'] = '0';
	$dp_default_options['qt_h5_margin_top'] = '0';
	$dp_default_options['qt_h5_margin_bottom'] = '30';

	$dp_default_options['qt_gmap_api_key'] = '';
	$dp_default_options['qt_gmap_marker_type'] = 'type1';
	$dp_default_options['qt_gmap_custom_marker_type'] = 'type1';
	$dp_default_options['qt_gmap_marker_text'] = '';
	$dp_default_options['qt_gmap_marker_color'] = '#ffffff';
	$dp_default_options['qt_gmap_marker_img'] = '';
	$dp_default_options['qt_gmap_marker_bg'] = '#000000';
	$dp_default_options['qt_gmap_marker_bg_use_main'] = '1';
	$dp_default_options['qt_access_saturation'] = '-100';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_quicktag_tab_panel( $options ) {

  global $dp_default_options, $qt_custom_button_type_options, $qt_custom_button_size_options, $text_align_options, $font_type_options, $gmap_marker_type_options, $gmap_custom_marker_type_options;

?>

<div id="tab-content-quicktag" class="tab-content">

   <div class="theme_option_field cf theme_option_field_ac open active">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e( 'If you don\'t want to use quicktags included in the theme, please uncheck the box below.', 'tcd-w' ); ?></p>
     <p><label><input name="dp_options[use_quicktags]" type="checkbox" value="1" <?php checked( 1, $options['use_quicktags'] ); ?>><?php _e( 'Use quicktags', 'tcd-w' ); ?></label></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 見出し --------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Headline setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'These settings will be reflected in the quick tag button on the edit screen.', 'tcd-w' ); ?></p>
     </div>
     <?php for ( $i = 2; $i <= 5; $i++ ) : ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php printf( __( 'H%d tag', 'tcd-w' ), $i ); ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Font setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_font_size]" value="<?php esc_attr_e( $options['qt_h'. $i .'_font_size'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_h<?php echo $i; ?>_font_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_font_color'] ); ?>" data-default-color="<?php if($i == 2){ echo '#ffffff'; } else { echo '#000000'; }; ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Text align', 'tcd-w'); ?></span>
         <select name="dp_options[qt_h<?php echo $i; ?>_text_align]">
          <?php foreach ( $text_align_options as $option ) : ?>
          <option style="padding-right: 10px;" value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $options['qt_h'.$i.'_text_align'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
          <?php endforeach; ?>
         </select>
        </li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e( 'Background color setting', 'tcd-w' ); ?></h4>
       <p class="displayment_checkbox"><label><input name="dp_options[show_qt_h<?php echo $i; ?>_bg_color]" type="checkbox" value="1" <?php checked( $options['show_qt_h'.$i.'_bg_color'], 1 ); ?>><?php _e( 'Display background color', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['show_qt_h'.$i.'_bg_color'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <p><input type="text" name="dp_options[qt_h<?php echo $i; ?>_bg_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_bg_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Border width setting', 'tcd-w' ); ?></h4>
       <div class="theme_option_message2">
        <p><?php _e( 'Please enter 0 if you don\'t want to display border.', 'tcd-w' ); ?></p>
       </div>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Top', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_border_top_width]" value="<?php esc_attr_e( $options['qt_h'.$i.'_border_top_width'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Bottom', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_border_bottom_width]" value="<?php esc_attr_e( $options['qt_h'.$i.'_border_bottom_width'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Left', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_border_left_width]" value="<?php esc_attr_e( $options['qt_h'.$i.'_border_left_width'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Right', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_border_right_width]" value="<?php esc_attr_e( $options['qt_h'.$i.'_border_right_width'] ); ?>" /><span>px</span></li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e( 'Border color setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Top', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_h<?php echo $i; ?>_border_top_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_border_top_color'] ); ?>" data-default-color="#222222" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Bottom', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_h<?php echo $i; ?>_border_bottom_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_border_bottom_color'] ); ?>" data-default-color="#222222" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Left', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_h<?php echo $i; ?>_border_left_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_border_left_color'] ); ?>" data-default-color="#222222" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Right', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_h<?php echo $i; ?>_border_right_color]" value="<?php echo esc_attr( $options['qt_h'.$i.'_border_right_color'] ); ?>" data-default-color="#222222" class="c-color-picker"></li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e( 'Padding setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Top', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_padding_top]" value="<?php esc_attr_e( $options['qt_h'.$i.'_padding_top'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Bottom', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_padding_bottom]" value="<?php esc_attr_e( $options['qt_h'.$i.'_padding_bottom'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Left', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_padding_left]" value="<?php esc_attr_e( $options['qt_h'.$i.'_padding_left'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Right', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_padding_right]" value="<?php esc_attr_e( $options['qt_h'.$i.'_padding_right'] ); ?>" /><span>px</span></li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e( 'Margin setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Top', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_margin_top]" value="<?php esc_attr_e( $options['qt_h'.$i.'_margin_top'] ); ?>" /><span>px</span></li>
        <li class="cf"><span class="label"><?php _e('Bottom', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[qt_h<?php echo $i; ?>_margin_bottom]" value="<?php esc_attr_e( $options['qt_h'.$i.'_margin_bottom'] ); ?>" /><span>px</span></li>
       </ul>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div>
     </div>
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ボタン --------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Button setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'These settings will be reflected in the quick tag button on the edit screen.', 'tcd-w' ); ?></p>
      <p><?php _e( 'You can also change the size of each button directly from edit screen.', 'tcd-w' ); ?></p>
     </div>
     <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php printf( __( 'Button %d settings', 'tcd-w' ), $i ); ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Button type', 'tcd-w' ); ?></h4>
       <fieldset class="cf select_type2">
        <?php foreach ( $qt_custom_button_type_options as $option ) : ?>
        <label><input type="radio" name="dp_options[qt_custom_button_type<?php echo $i; ?>]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['qt_custom_button_type' . $i] ); ?>><?php echo $option['label']; ?></label>
        <?php endforeach; ?>
       </fieldset>
       <h4 class="theme_option_headline2"><?php _e( 'Button size', 'tcd-w' ); ?></h4>
       <fieldset class="cf select_type2">
        <?php foreach ( $qt_custom_button_size_options as $option ) : ?>
        <label><input type="radio" name="dp_options[qt_custom_button_size<?php echo $i; ?>]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['qt_custom_button_size' . $i] ); ?>><?php echo $option['label']; ?></label>
        <?php endforeach; ?>
       </fieldset>
       <p><a href="#" class="q_custom_button<?php echo $i; ?> pill" style="width:130px; height:40px;"><?php _e( 'Small button', 'tcd-w' ); ?></a></p>
       <p><a href="#" class="q_custom_button<?php echo $i; ?> rounded" style="width:240px; height:60px;"><?php _e( 'Medium button', 'tcd-w' ); ?></a></p>
       <p><a href="#" class="q_custom_button<?php echo $i; ?> pill" style="width:400px; height:70px;"><?php _e( 'Large button', 'tcd-w' ); ?></a></p>
       <h4 class="theme_option_headline2"><?php _e( 'Color setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_font_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_font_color' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf button_animation_option_type1"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_bg_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_bg_color' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_border_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_border_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_border_color' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf">
         <span class="label"><?php _e('Transparency of border', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[qt_custom_button_border_color_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_border_color_opacity'.$i] ); ?>" />
         <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
          <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
         </div>
        </li>
        <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_font_color_hover' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_font_color_hover' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_bg_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_bg_color_hover' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_bg_color_hover' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_custom_button_border_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_border_color_hover' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_custom_button_border_color_hover' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf">
         <span class="label"><?php _e('Transparency of border on mouseover', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[qt_custom_button_border_color_hover_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_custom_button_border_color_hover_opacity'.$i] ); ?>" />
         <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
          <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
         </div>
        </li>
        <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
         <select class="button_animation_option" name="dp_options[qt_custom_button_animation_type<?php echo $i; ?>]">
          <option style="padding-right: 10px;" value="type1" <?php selected( $options['qt_custom_button_animation_type'.$i], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
          <option style="padding-right: 10px;" value="type2" <?php selected( $options['qt_custom_button_animation_type'.$i], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
          <option style="padding-right: 10px;" value="type3" <?php selected( $options['qt_custom_button_animation_type'.$i], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
         </select>
        </li>
       </ul>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div>
     </div>
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 下線 --------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Underline setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'These settings will be reflected in the quick tag button on the edit screen.', 'tcd-w' ); ?></p>
      <p><?php _e( 'You can also change the color of each underline directly from edit screen.', 'tcd-w' ); ?></p>
     </div>
     <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php printf( __( 'Underline %d setting', 'tcd-w' ), $i ); ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Color setting', 'tcd-w' ); ?></h4>
       <input class="c-color-picker" name="dp_options[qt_underline_color<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $options['qt_underline_color'.$i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_underline_color'.$i] ); ?>">
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div>
     </div>
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 吹き出し --------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Speech balloon setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e( 'These settings will be reflected in the quick tag button on the edit screen.', 'tcd-w' ); ?></p>
      <p><?php _e( 'You can also change the user image and name directly from short code generated on the edit screen.', 'tcd-w' ); ?></p>
     </div>
     <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline">
       <?php
            if ( 1 === $i ) printf( __( '%s settings', 'tcd-w' ), __( 'Speech balloon left 1', 'tcd-w' ) );
            elseif ( 2 === $i ) printf( __( '%s settings', 'tcd-w' ), __( 'Speech balloon left 2', 'tcd-w' ) );
            elseif ( 3 === $i ) printf( __( '%s settings', 'tcd-w' ), __( 'Speech balloon right 1', 'tcd-w' ) );
            elseif ( 4 === $i ) printf( __( '%s settings', 'tcd-w' ), __( 'Speech balloon right 2', 'tcd-w' ) );
       ?>
      </h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'User image', 'tcd-w' ); ?></h4>
       <p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 80, 80 ); ?></p>
       <div class="image_box cf index_slider_image<?php echo $i; ?>">
        <div class="cf cf_media_field hide-if-no-js qt_speech_balloon_user_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['qt_speech_balloon_user_image'.$i] ); ?>" id="qt_speech_balloon_user_image<?php echo $i; ?>" name="dp_options[qt_speech_balloon_user_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['qt_speech_balloon_user_image'.$i]){ echo wp_get_attachment_image($options['qt_speech_balloon_user_image'.$i], 'full'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['qt_speech_balloon_user_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'User name', 'tcd-w' ); ?></h4>
       <input class="regular-text" name="dp_options[qt_speech_balloon_user_name<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $options['qt_speech_balloon_user_name' . $i] ); ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Color setting', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_speech_balloon_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_speech_balloon_font_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_speech_balloon_font_color' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_speech_balloon_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_speech_balloon_bg_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_speech_balloon_bg_color' . $i] ); ?>" class="c-color-picker"></li>
        <li class="cf"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[qt_speech_balloon_border_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['qt_speech_balloon_border_color' . $i] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['qt_speech_balloon_border_color' . $i] ); ?>" class="c-color-picker"></li>
       </ul>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div>
     </div>
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Google Map ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e( 'Google Maps settings', 'tcd-w' );  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message2">
      <p><?php _e('You can set styles of marker in Google maps using this option.<br />You can also set the saturation of map.', 'tcd-w');  ?></p>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'API key', 'tcd-w' ); ?></h4>
     <input type="text" class="regular-text" name="dp_options[qt_gmap_api_key]" value="<?php echo esc_attr( $options['qt_gmap_api_key'] ); ?>">
     <h4 class="theme_option_headline2"><?php _e( 'Marker type', 'tcd-w' ); ?></h4>
     <ul class="design_radio_button image_radio_button cf">
      <?php foreach ( $gmap_marker_type_options as $option ) : ?>
      <li class="gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
       <input type="radio" id="qt_gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>" name="dp_options[qt_gmap_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['qt_gmap_marker_type'] ); ?>>
       <label for="qt_gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
        <span><?php echo esc_html( $option['label'] ); ?></span>
        <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo esc_attr($option['img']); ?>" alt="" title="" />
       </label>
      </li>
      <?php endforeach; ?>
     </ul>
     <div class="gmap_marker_type2_area" style="<?php if($options['qt_gmap_marker_type'] == 'type1'){ echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e( 'Custom marker type', 'tcd-w' ); ?></h4>
      <ul class="design_radio_button">
       <?php foreach ( $gmap_custom_marker_type_options as $option ) : ?>
       <li class="gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>">
        <input type="radio" id="qt_gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>" name="dp_options[qt_gmap_custom_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['qt_gmap_custom_marker_type'] ); ?>>
        <label for="qt_gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>"><?php echo esc_html_e( $option['label'] ); ?></label>
       </li>
       <?php endforeach; ?>
      </ul>
      <div class="gmap_custom_marker_type1_area" style="<?php if ( $options['qt_gmap_custom_marker_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker text', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e('Text', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[qt_gmap_marker_text]" value="<?php echo esc_attr( $options['qt_gmap_marker_text'] ); ?>"></li>
        <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" class="c-color-picker" name="dp_options[qt_gmap_marker_color]" value="<?php echo esc_attr( $options['qt_gmap_marker_color'] ); ?>" data-default-color="#ffffff"></li>
       </ul>
      </div>
      <div class="gmap_custom_marker_type2_area" style="<?php if ( $options['qt_gmap_custom_marker_type'] == 'type1') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker image', 'tcd-w' ); ?></h4>
       <p><?php _e( 'Recommended size: width:60px, height:20px', 'tcd-w' ); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js qt_gmap_marker_img">
         <input type="hidden" value="<?php echo esc_attr( $options['qt_gmap_marker_img'] ); ?>" id="qt_gmap_marker_img" name="dp_options[qt_gmap_marker_img]" class="cf_media_id">
         <div class="preview_field"><?php if ( $options['qt_gmap_marker_img'] ) { echo wp_get_attachment_image($options['qt_gmap_marker_img'], 'medium' ); } ?></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['qt_gmap_marker_img'] ) { echo 'hidden'; } ?>">
         </div>
        </div>
       </div>
      </div>
      <h4 class="theme_option_headline2"><?php _e( 'Background color of marker', 'tcd-w' ); ?></h4>
      <ul class="option_list">
       <li class="cf">
        <div class="use_main_color">
         <input type="text" class="c-color-picker" name="dp_options[qt_gmap_marker_bg]" data-default-color="#000000" value="<?php echo esc_attr( $options['qt_gmap_marker_bg'] ); ?>">
        </div>
        <div class="use_main_color_checkbox">
         <label>
          <input name="dp_options[qt_gmap_marker_bg_use_main]" type="checkbox" value="1" <?php checked( $options['qt_gmap_marker_bg_use_main'], 1 ); ?>>
          <span><?php _e('Apply main color', 'tcd-w'); ?></span>
         </label>
        </div>
       </li>
      </ul>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Saturation of map', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'Please set the saturation of the map. If you set it to -100 the output map is monochrome.', 'tcd-w' ); ?></p>
     </div>
     <p class="range-output"><?php _e( 'Current value: ', 'tcd-w' ); ?><span><?php echo esc_html( $options['qt_access_saturation'] ); ?></span></p>
     <input class="range" type="range" name="dp_options[qt_access_saturation]" value="<?php echo esc_attr($options['qt_access_saturation']); ?>" min="-100" max="100" step="10" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_quicktag_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_quicktag_theme_options_validate( $input ) {

  global $dp_default_options, $qt_custom_button_type_options, $qt_custom_button_size_options, $text_align_options, $font_type_options, $gmap_marker_type_options, $gmap_custom_marker_type_options;

  if ( ! isset( $input['use_quicktags'] ) )
    $input['use_quicktags'] = null;
    $input['use_quicktags'] = ( $input['use_quicktags'] == 1 ? 1 : 0 );

  for ( $i = 2; $i <= 5; $i++ ) {
    if ( ! isset( $value['qt_h'.$i.'_text_align'] ) )
      $value['qt_h'.$i.'_text_align'] = null;
    if ( ! array_key_exists( $value['qt_h'.$i.'_text_align'], $text_align_options ) )
      $value['qt_h'.$i.'_text_align'] = null;
    $input['qt_h'.$i.'_font_size'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_font_size'] );
    $input['qt_h'.$i.'_font_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_font_color'] );
    if ( ! isset( $input['show_qt_h'.$i.'_bg_color'] ) )
      $input['show_qt_h'.$i.'_bg_color'] = null;
      $input['show_qt_h'.$i.'_bg_color'] = ( $input['show_qt_h'.$i.'_bg_color'] == 1 ? 1 : 0 );
    $input['qt_h'.$i.'_bg_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_bg_color'] );
    $input['qt_h'.$i.'_border_top_width'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_top_width'] );
    $input['qt_h'.$i.'_border_bottom_width'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_bottom_width'] );
    $input['qt_h'.$i.'_border_left_width'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_left_width'] );
    $input['qt_h'.$i.'_border_right_width'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_right_width'] );
    $input['qt_h'.$i.'_border_top_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_top_color'] );
    $input['qt_h'.$i.'_border_bottom_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_bottom_color'] );
    $input['qt_h'.$i.'_border_left_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_left_color'] );
    $input['qt_h'.$i.'_border_right_color'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_border_right_color'] );
    $input['qt_h'.$i.'_padding_top'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_padding_top'] );
    $input['qt_h'.$i.'_padding_bottom'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_padding_bottom'] );
    $input['qt_h'.$i.'_padding_left'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_padding_left'] );
    $input['qt_h'.$i.'_padding_right'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_padding_right'] );
    $input['qt_h'.$i.'_margin_top'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_margin_top'] );
    $input['qt_h'.$i.'_margin_bottom'] = wp_filter_nohtml_kses( $input['qt_h'.$i.'_margin_bottom'] );
  };

  for ( $i = 1; $i <= 3; $i++ ) {
    $input['qt_custom_button_type'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_type'.$i] );
    $input['qt_custom_button_size'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_size'.$i] );
    $input['qt_custom_button_font_color'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_font_color'.$i] );
    $input['qt_custom_button_bg_color'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_bg_color'.$i] );
    $input['qt_custom_button_border_color'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_border_color'.$i] );
    $input['qt_custom_button_border_color_opacity'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_border_color_opacity'.$i] );
    $input['qt_custom_button_font_color_hover'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_font_color_hover'.$i] );
    $input['qt_custom_button_bg_color_hover'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_bg_color_hover'.$i] );
    $input['qt_custom_button_border_color_hover'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_border_color_hover'.$i] );
    $input['qt_custom_button_border_color_hover_opacity'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_border_color_hover_opacity'.$i] );
    $input['qt_custom_button_animation_type'.$i] = wp_filter_nohtml_kses( $input['qt_custom_button_animation_type'.$i] );
  }

  for ( $i = 1; $i <= 3; $i++ ) {
    $input['qt_underline_color'.$i] = wp_filter_nohtml_kses( $input['qt_underline_color'.$i] );
  }

  for ( $i = 1; $i <= 4; $i++ ) {
    $input['qt_speech_balloon_user_image'.$i] = wp_filter_nohtml_kses( $input['qt_speech_balloon_user_image'.$i] );
    $input['qt_speech_balloon_user_name'.$i] = wp_filter_nohtml_kses( $input['qt_speech_balloon_user_name'.$i] );
    $input['qt_speech_balloon_font_color'.$i] = wp_filter_nohtml_kses( $input['qt_speech_balloon_font_color'.$i] );
    $input['qt_speech_balloon_bg_color'.$i] = wp_filter_nohtml_kses( $input['qt_speech_balloon_bg_color'.$i] );
    $input['qt_speech_balloon_border_color'.$i] = wp_filter_nohtml_kses( $input['qt_speech_balloon_border_color'.$i] );
  }

  // Google Maps 
  $input['qt_gmap_api_key'] = wp_filter_nohtml_kses( $input['qt_gmap_api_key'] );
  if ( ! isset( $input['qt_gmap_marker_type'] ) ) $input['qt_gmap_marker_type'] = null;
  if ( ! array_key_exists( $input['qt_gmap_marker_type'], $gmap_marker_type_options ) ) $input['qt_gmap_marker_type'] = null;
  if ( ! isset( $input['qt_gmap_custom_marker_type'] ) ) $input['qt_gmap_custom_marker_type'] = null;
  if ( ! array_key_exists( $input['qt_gmap_custom_marker_type'], $gmap_custom_marker_type_options ) ) $input['qt_gmap_custom_marker_type'] = null;
  $input['qt_gmap_marker_text'] = wp_filter_nohtml_kses( $input['qt_gmap_marker_text'] );
  $input['qt_gmap_marker_color'] = wp_filter_nohtml_kses( $input['qt_gmap_marker_color'] );
  $input['qt_gmap_marker_color_use_main'] = ! empty( $input['qt_gmap_marker_color_use_main'] ) ? 1 : 0;
  $input['qt_gmap_marker_img'] = wp_filter_nohtml_kses( $input['qt_gmap_marker_img'] );
  $input['qt_access_saturation'] = wp_filter_nohtml_kses( $input['qt_access_saturation'] );

	return $input;

};


?>