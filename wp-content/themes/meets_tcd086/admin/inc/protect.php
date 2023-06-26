<?php
/*
 * 保護ページの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_protect_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_protect_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_protect_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_protect_theme_options_validate' );


// タブの名前
function add_protect_tab_label( $tab_labels ) {
	$tab_labels['protect'] = __( 'Password protected page', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_protect_dp_default_options( $dp_default_options ) {

	$dp_default_options['pw_label'] = '';
	for ( $i = 1; $i <= 5; $i++ ) {
		$dp_default_options['pw_name' . $i] = '';
		$dp_default_options['pw_btn_display' . $i] = '';
		$dp_default_options['pw_btn_label' . $i] = '';
		$dp_default_options['pw_btn_url' . $i] = '';
		$dp_default_options['pw_btn_target' . $i] = 0;
		$dp_default_options['pw_editor' . $i] = '';
		$dp_default_options['pw_direction' . $i] = 'type1';
		$dp_default_options['pw_password_button_label' . $i] = __( 'Send', 'tcd-w' );
	}

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_protect_tab_panel( $options ) {

  global $dp_default_options, $content_direction_options;

?>

<div id="tab-content-protect" class="tab-content">


   <?php // 保護ページの設定 ?>
   <div class="theme_option_field cf theme_option_field_ac open active">
   <h3 class="theme_option_headline"><?php _e( 'Password protected pages settings', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'Label of password field', 'tcd-w' ); ?></h4>
     <p><input class="full_width" type="text" name="dp_options[pw_label]" value="<?php echo esc_attr( $options['pw_label'] ); ?>"></p>
     <h4 class="theme_option_headline2"><?php _e( 'Contents to encourage member registration', 'tcd-w' ); ?></h4>
     <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
     <div class="sub_box">
      <h4 class="theme_option_subbox_headline"><?php echo  __( 'Content', 'tcd-w' ) . $i; ?><span><?php if ( $options['pw_name' . $i] ) { echo ' : ' . esc_html( $options['pw_name' . $i] ); } ?></span></h4>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Name of contents', 'tcd-w' ); ?></h4>
       <p><input type="text" class="theme_option_subbox_headline_label full_width" name="dp_options[pw_name<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_name' . $i] ); ?>"></label></p>
       <div class="theme_option_message2">
        <p><?php _e( '"Name of contents" is used in edit post page.', 'tcd-w' ); ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Button settings', 'tcd-w' ); ?></h4>
       <ul class="option_list">
        <li class="cf"><span class="label"><?php _e( 'Display button', 'tcd-w' ); ?></span><input type="checkbox" name="dp_options[pw_btn_display<?php echo $i; ?>]" value="1" <?php checked( 1, $options['pw_btn_display' . $i] ); ?>></li>
        <li class="cf"><span class="label"><?php _e( 'Label', 'tcd-w' ); ?></span><input type="text" class="full_width" name="dp_options[pw_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_btn_label' . $i] ); ?>"></li>
        <li class="cf"><span class="label"><?php _e( 'URL', 'tcd-w' ); ?></span><input type="text" class="full_width" name="dp_options[pw_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_btn_url' . $i] ); ?>"></li>
        <li class="cf"><span class="label"><?php _e( 'Open link in new window', 'tcd-w' ); ?></span><input name="dp_options[pw_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( 1, $options['pw_btn_target' . $i] ); ?>></li>
        <li class="cf">
         <span class="label"><?php _e( 'Direction', 'tcd-w' ); ?></span>
         <select name="dp_options[pw_direction<?php echo $i; ?>]">
          <?php foreach ( $content_direction_options as $option ) { ?>
          <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['pw_direction'.$i], $option['value'] ); ?>><?php echo $option['label']; ?></option>
          <?php } ?>
         </select>
        </li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e( 'Sentences to encourage member registration', 'tcd-w' ); ?></h4>
       <div class="theme_option_message2">
        <p><?php _e( '"Sentences to encourage member registration" is displayed under excerpts.', 'tcd-w' ); ?></p>
       </div>
       <?php wp_editor( $options['pw_editor' . $i], 'pw_editor' . $i, array ( 'textarea_name' => 'dp_options[pw_editor' . $i . ']' ) ); ?>
       <h4 class="theme_option_headline2"><?php _e( 'Name of password button', 'tcd-w' ); ?></h4>
       <p><input class="full_width" type="text" name="dp_options[pw_password_button_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_password_button_label' . $i] ); ?>"></label></p>
      </div>
     </div>
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_protect_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_protect_theme_options_validate( $input ) {

  global $dp_default_options, $content_direction_options;


  $input['pw_label'] = wp_filter_nohtml_kses( $input['pw_label'] );
  for ( $i = 1; $i <= 5; $i++ ) {
    $input['pw_name' . $i] = wp_filter_nohtml_kses( $input['pw_name' . $i] );
    if ( ! isset( $input['pw_btn_display' . $i] ) ) $input['pw_btn_display' . $i] = null;
    $input['pw_btn_display' . $i] = ( $input['pw_btn_display' . $i] == 1 ? 1 : 0 );
    $input['pw_btn_label' . $i] = wp_filter_nohtml_kses( $input['pw_btn_label' . $i] );
    $input['pw_btn_url' . $i] = wp_filter_nohtml_kses( $input['pw_btn_url' . $i] );
    if ( ! isset( $input['pw_btn_target' . $i] ) ) $input['pw_btn_target' . $i] = null;
    $input['pw_btn_display' . $i] = ( $input['pw_btn_display' . $i] == 1 ? 1 : 0 );
    $input['pw_editor' . $i] = wp_kses_post($input['pw_editor' . $i]);
    if ( ! isset( $value['pw_direction'.$i] ) )
      $value['pw_direction'.$i] = null;
    if ( ! array_key_exists( $value['pw_direction'.$i], $content_direction_options ) )
      $value['pw_direction'.$i] = null;
    $input['pw_password_button_label' . $i] = wp_filter_nohtml_kses( $input['pw_password_button_label' . $i] );
  }


	return $input;

};


?>