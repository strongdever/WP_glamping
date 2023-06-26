<?php
/*
 * マーケティングの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_marketing_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_marketing_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_marketing_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_marketing_theme_options_validate' );


// タブの名前
function add_marketing_tab_label( $tab_labels ) {
	$tab_labels['marketing'] = __( 'Marketing', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_marketing_dp_default_options( $dp_default_options ) {

	$dp_default_options['cta_display'] = 5;
	$dp_default_options['footer_cta_display'] = 5;
	$dp_default_options['footer_cta_hide_on_front'] = 0;

	for ( $i = 1; $i<= 3; $i++ ) {
		$dp_default_options['cta_type' . $i] = 'type1';

		$dp_default_options['cta_type1_catch' . $i] = '';
		$dp_default_options['cta_type1_catch_font_size' . $i] = 20;
		$dp_default_options['cta_type1_catch_font_color' . $i] = "#ffffff";
		$dp_default_options['cta_type1_catch_font_color_hover' . $i] = "#cccccc";
		$dp_default_options['cta_type1_url' . $i] = '';
		$dp_default_options['cta_type1_target' . $i] = 0;
		$dp_default_options['cta_type1_image' . $i] = '';
		$dp_default_options['cta_type1_image_sp' . $i] = '';
		$dp_default_options['cta_type1_overlay' . $i] = '#000000';
		$dp_default_options['cta_type1_overlay_opacity' . $i] = 0.5;

		$dp_default_options['cta_type2_catch' . $i] = '';
		$dp_default_options['cta_type2_catch_font_size' . $i] = 20;
		$dp_default_options['cta_type2_catch_font_color' . $i] = "#ffffff";
		$dp_default_options['cta_type2_catch_font_color_hover' . $i] = "#cccccc";
		$dp_default_options['cta_type2_catch_bg_color' . $i] = "#000000";
		$dp_default_options['cta_type2_url' . $i] = '';
		$dp_default_options['cta_type2_target' . $i] = 0;
		$dp_default_options['cta_type2_image' . $i] = '';
		$dp_default_options['cta_type2_image_sp' . $i] = '';

		$dp_default_options['cta_type3_catch' . $i] = '';
		$dp_default_options['cta_type3_catch_font_size' . $i] = 20;
		$dp_default_options['cta_type3_catch_font_color' . $i] = "#000000";
		$dp_default_options['cta_type3_catch_font_color_hover' . $i] = "#cccccc";
		$dp_default_options['cta_type3_url' . $i] = '';
		$dp_default_options['cta_type3_target' . $i] = 0;
		$dp_default_options['cta_type3_image' . $i] = '';
		$dp_default_options['cta_type3_image_sp' . $i] = '';

		$dp_default_options['cta_random' . $i] = 0;

		$dp_default_options['footer_cta_type' . $i] = 'type1';

		$dp_default_options['footer_cta_type1_catch' . $i] = '';
		$dp_default_options['footer_cta_type1_catch_font_size' . $i] = 20;
		$dp_default_options['footer_cta_type1_catch_font_size_mobile' . $i] = 16;
		$dp_default_options['footer_cta_type1_catch_font_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type1_btn_label' . $i] = '';
		$dp_default_options['footer_cta_type1_btn_font_size' . $i] = 16;
		$dp_default_options['footer_cta_type1_btn_font_size_mobile' . $i] = 15;
		$dp_default_options['footer_cta_type1_btn_url' . $i] = '';
		$dp_default_options['footer_cta_type1_btn_target' . $i] = 0;
		$dp_default_options['footer_cta_type1_btn_font_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type1_btn_font_color_hover' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type1_btn_bg_color' . $i] = '#950000';
		$dp_default_options['footer_cta_type1_btn_bg_color_hover' . $i] = '#780000';
		$dp_default_options['footer_cta_type1_bg_color' . $i] = '#000000';
		$dp_default_options['footer_cta_type1_bg_opacity' . $i] = 1;
		$dp_default_options['footer_cta_type1_close_font_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type1_close_font_color_hover' . $i] = '#cccccc';

		$dp_default_options['footer_cta_type2_catch' . $i] = '';
		$dp_default_options['footer_cta_type2_catch_font_size' . $i] = 20;
		$dp_default_options['footer_cta_type2_catch_font_size_mobile' . $i] = 16;
		$dp_default_options['footer_cta_type2_catch_font_color' . $i] = '#000000';
		$dp_default_options['footer_cta_type2_btn_label' . $i] = '';
		$dp_default_options['footer_cta_type2_btn_font_size' . $i] = 16;
		$dp_default_options['footer_cta_type2_btn_font_size_mobile' . $i] = 15;
		$dp_default_options['footer_cta_type2_btn_url' . $i] = '';
		$dp_default_options['footer_cta_type2_btn_target' . $i] = 0;
		$dp_default_options['footer_cta_type2_btn_font_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type2_btn_font_color_hover' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type2_btn_bg_color' . $i] = '#950000';
		$dp_default_options['footer_cta_type2_btn_bg_color_hover' . $i] = '#780000';
		$dp_default_options['footer_cta_type2_bg_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type2_bg_opacity' . $i] = 1;
		$dp_default_options['footer_cta_type2_show_border' . $i] = '1';
		$dp_default_options['footer_cta_type2_border_color' . $i] = '#dddddd';
		$dp_default_options['footer_cta_type2_border_opacity' . $i] = 1;
		$dp_default_options['footer_cta_type2_close_font_color' . $i] = '#aaaaaa';
		$dp_default_options['footer_cta_type2_close_font_color_hover' . $i] = '#cccccc';

		$dp_default_options['footer_cta_type3_catch' . $i] = '';
		$dp_default_options['footer_cta_type3_catch_font_size' . $i] = 20;
		$dp_default_options['footer_cta_type3_catch_font_size_mobile' . $i] = 16;
		$dp_default_options['footer_cta_type3_catch_font_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type3_btn_label' . $i] = '';
		$dp_default_options['footer_cta_type3_btn_font_size' . $i] = 16;
		$dp_default_options['footer_cta_type3_btn_font_size_mobile' . $i] = 15;
		$dp_default_options['footer_cta_type3_btn_url' . $i] = '';
		$dp_default_options['footer_cta_type3_btn_target' . $i] = 0;
		$dp_default_options['footer_cta_type3_btn_font_color' . $i] = '#000000';
		$dp_default_options['footer_cta_type3_btn_font_color_hover' . $i] = '#666666';
		$dp_default_options['footer_cta_type3_btn_bg_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type3_btn_bg_color_hover' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type3_bg_color' . $i] = '#ffffff';
		$dp_default_options['footer_cta_type3_bg_opacity' . $i] = 1;
		$dp_default_options['footer_cta_type3_image' . $i] = 0;
		$dp_default_options['footer_cta_type3_image_sp' . $i] = 0;
		$dp_default_options['footer_cta_type3_overlay_color' . $i] = '#000000';
		$dp_default_options['footer_cta_type3_overlay_opacity' . $i] = 0.2;
		$dp_default_options['footer_cta_type3_edge_angle' . $i] = 0;
		$dp_default_options['footer_cta_type3_show_border' . $i] = '1';
		$dp_default_options['footer_cta_type3_border_color' . $i] = '#dddddd';
		$dp_default_options['footer_cta_type3_border_opacity' . $i] = 1;
		$dp_default_options['footer_cta_type3_close_font_color' . $i] = '#aaaaaa';
		$dp_default_options['footer_cta_type3_close_font_color_hover' . $i] = '#cccccc';

		$dp_default_options['footer_cta_random' . $i] = 0;

	}

  // ネイティブ広告
	for ( $i = 1; $i <= 7; $i++ ) {
		$dp_default_options['show_pr_banner'.$i] = '';
		$dp_default_options['pr_banner_image'.$i] = false;
		$dp_default_options['pr_banner_url'.$i] = '#';
		$dp_default_options['pr_banner_target'.$i] = '';
		$dp_default_options['pr_banner_title'.$i] = '';
		$dp_default_options['pr_banner_client'.$i] = '';
		$dp_default_options['show_pr_banner_label'.$i] = 1;
		$dp_default_options['pr_banner_label'.$i] = 'PR';
		$dp_default_options['pr_banner_label_bg_color'.$i] = '#000000';
		$dp_default_options['pr_banner_label_bg_color_use_main'.$i] = '1';
	}

	$dp_default_options['index_carousel_show_banner'] = '';
	$dp_default_options['index_carousel_banner_num'] = '3';

	$dp_default_options['mobile_index_carousel_show_banner'] = '';
	$dp_default_options['mobile_index_carousel_banner_num'] = '3';

	$dp_default_options['archive_blog_show_banner'] = '';
	$dp_default_options['archive_blog_banner_num'] = '3';

	$dp_default_options['footer_carousel_show_banner'] = '';
	$dp_default_options['footer_carousel_banner_num'] = '3';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_marketing_tab_panel( $options ) {

  global $dp_default_options, $cta_type_options, $cta_type3_layout_options, $cta_display_options, $footer_cta_type_options;

	$cta_names = array(
		1 => 'CTA-A',
		2 => 'CTA-B',
		3 => 'CTA-C',
	);

?>

<div id="tab-content-marketing" class="tab-content">


   <?php // 記事下CTA ----------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('CTA under the post content', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'CTA under the post content', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'You can set up CTA under the post content.', 'tcd-w' ); ?></p>
      <p><?php _e( 'You can register up to three contents.', 'tcd-w' ); ?></p>
     </div>

     <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline">CTA-<?php echo 1 === $i ? 'A' : ( 2 === $i ? 'B' : 'C' ); ?></h3>
      <div class="sub_box_content">

       <h5 class="theme_option_headline2"><?php _e( 'Type of CTA', 'tcd-w' ); ?></h5>
       <ul class="c-preview-list">
        <?php foreach( $cta_type_options as $option ) : ?>
        <li class="c-preview-list__item"><label><?php if ( $option['image'] ) { ?><img src="<?php echo esc_attr( $option['image'] ); ?>?ver=1.0.2" class="c-preview-list__item-img" alt=""><?php } ?><input type="radio" class="cta-type" name="dp_options[cta_type<?php echo $i; ?>]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $options['cta_type' . $i], $option['value'] ); ?>><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></li>
        <?php endforeach; ?>
       </ul>

       <?php // cta-type1 ------------------------------------ ?>
       <div class="cta-type1-content cta-content <?php if ( 'type1' !== $options['cta_type' . $i] ) { echo 'u-hidden'; } ?>">
        <h6 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h6>
        <textarea name="dp_options[cta_type1_catch<?php echo $i; ?>]" class="large-text"><?php echo esc_textarea( $options['cta_type1_catch' . $i] ); ?></textarea>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[cta_type1_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type1_catch_font_size'.$i] ); ?>" /><span>px</span></li>
         <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type1_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type1_catch_font_color'.$i] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
         <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type1_catch_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type1_catch_font_color_hover'.$i] ); ?>" data-default-color="#cccccc" class="c-color-picker"></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Link setting', 'tcd-w' ); ?></h6>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[cta_type1_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type1_url'.$i] ); ?>" /></li>
         <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[cta_type1_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['cta_type1_target'.$i], 1 ); ?>></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '250'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type1_image<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type1_image' . $i] ); ?>" id="cta_type1_image<?php echo $i; ?>" name="dp_options[cta_type1_image<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type1_image' . $i] ) { echo wp_get_attachment_image( $options['cta_type1_image' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type1_image' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <h6 class="theme_option_headline2"><?php _e( 'Image (mobile)', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '350', '200'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type1_image_sp<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type1_image_sp' . $i] ); ?>" id="cta_type1_image_sp<?php echo $i; ?>" name="dp_options[cta_type1_image_sp<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type1_image_sp' . $i] ) { echo wp_get_attachment_image( $options['cta_type1_image_sp' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type1_image_sp' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <h6 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h6>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type1_overlay<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type1_overlay'.$i] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
         <li class="cf"><span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[cta_type1_overlay_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type1_overlay_opacity'.$i] ); ?>" /><p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p></li>
        </ul>
        <ul class="button_list cf">
         <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
         <li><a class="button-ml close_sub_box" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        </ul>
       </div><!-- END .cta-type1-content -->

       <?php // cta-type2 ------------------------------------ ?>
       <div class="cta-type2-content cta-content <?php if ( 'type2' !== $options['cta_type' . $i] ) { echo 'u-hidden'; } ?>">
        <h6 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h6>
        <textarea name="dp_options[cta_type2_catch<?php echo $i; ?>]" class="large-text"><?php echo esc_textarea( $options['cta_type2_catch' . $i] ); ?></textarea>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[cta_type2_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type2_catch_font_size'.$i] ); ?>" /><span>px</span></li>
         <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type2_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type2_catch_font_color'.$i] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
         <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type2_catch_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type2_catch_font_color_hover'.$i] ); ?>" data-default-color="#cccccc" class="c-color-picker"></li>
         <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type2_catch_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type2_catch_bg_color'.$i] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Link setting', 'tcd-w' ); ?></h6>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[cta_type2_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type2_url'.$i] ); ?>" /></li>
         <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[cta_type2_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['cta_type2_target'.$i], 1 ); ?>></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '375', '250'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type2_image<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type2_image' . $i] ); ?>" id="cta_type2_image<?php echo $i; ?>" name="dp_options[cta_type2_image<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type2_image' . $i] ) { echo wp_get_attachment_image( $options['cta_type2_image' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type2_image' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <h6 class="theme_option_headline2"><?php _e( 'Image (mobile)', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '350', '250'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type2_image_sp<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type2_image_sp' . $i] ); ?>" id="cta_type2_image_sp<?php echo $i; ?>" name="dp_options[cta_type2_image_sp<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type2_image_sp' . $i] ) { echo wp_get_attachment_image( $options['cta_type2_image_sp' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type2_image_sp' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <ul class="button_list cf">
         <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
         <li><a class="button-ml close_sub_box" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        </ul>
       </div><!-- END .cta-type2-content -->

       <?php // cta-type3 ------------------------------------ ?>
       <div class="cta-type3-content cta-content <?php if ( 'type3' !== $options['cta_type' . $i] ) { echo 'u-hidden'; } ?>">
        <h6 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h6>
        <textarea name="dp_options[cta_type3_catch<?php echo $i; ?>]" class="large-text"><?php echo esc_textarea( $options['cta_type3_catch' . $i] ); ?></textarea>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[cta_type3_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type3_catch_font_size'.$i] ); ?>" /><span>px</span></li>
         <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type3_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type3_catch_font_color'.$i] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
         <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[cta_type3_catch_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['cta_type3_catch_font_color_hover'.$i] ); ?>" data-default-color="#cccccc" class="c-color-picker"></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Link setting', 'tcd-w' ); ?></h6>
        <ul class="option_list">
         <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[cta_type3_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['cta_type3_url'.$i] ); ?>" /></li>
         <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[cta_type3_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['cta_type3_target'.$i], 1 ); ?>></li>
        </ul>
        <h6 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '250'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type3_image<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type3_image' . $i] ); ?>" id="cta_type3_image<?php echo $i; ?>" name="dp_options[cta_type3_image<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type3_image' . $i] ) { echo wp_get_attachment_image( $options['cta_type3_image' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type3_image' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <h6 class="theme_option_headline2"><?php _e( 'Image (mobile)', 'tcd-w' ); ?></h6>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '350', '250'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js cta_type3_image_sp<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['cta_type3_image_sp' . $i] ); ?>" id="cta_type3_image_sp<?php echo $i; ?>" name="dp_options[cta_type3_image_sp<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if ( $options['cta_type3_image_sp' . $i] ) { echo wp_get_attachment_image( $options['cta_type3_image_sp' . $i], 'full' ); } ?></div>
          <div class="button_area">
           <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['cta_type3_image_sp' . $i] ) { echo 'hidden'; } ?>">
          </div>
         </div>
        </div>
        <ul class="button_list cf">
         <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
         <li><a class="button-ml close_sub_box" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        </ul>
       </div><!-- END .cta-type3-content -->

      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>

     <?php // 表示設定 --------------------------------------------- ?>
     <h4 class="theme_option_headline2"><?php echo __( 'Display settings', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'Please select the CTA to display under the post content.', 'tcd-w' ); ?></p>
     </div>
     <select id="js-cta-display" name="dp_options[cta_display]">
      <?php foreach ( $cta_display_options as $option ) : ?>
      <option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $options['cta_display'] ); ?>><?php esc_html_e( $option['label'] ); ?></option>
      <?php endforeach; ?>
     </select>
     <div id="js-cta-random-display" class="<?php if ( '4' !== $options['cta_display'] ) { echo 'u-hidden'; } ?>">
      <h4 class="theme_option_headline2"><?php _e( 'Random display', 'tcd-w' ); ?></h4>
      <p><?php _e( 'Please select CTA to use in random display.', 'tcd-w' ); ?></p>
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <p><label><input type="checkbox" name="dp_options[cta_random<?php echo $i; ?>]" value="1" <?php checked( 1, $options['cta_random' . $i] ); ?>>CTA-<?php echo 1 === $i ? 'A' : ( 2 === $i ? 'B' : 'C' ); ?></label></p>
      <?php endfor; ?>
     </div>

     <?php // ABテスト --------------------------------------------- ?>
     <h4 class="theme_option_headline2"><?php _e( 'A/B Testing', 'tcd-w' ); ?></h4>
     <div class="theme_option_message">
      <p><?php _e( 'To measure conversions, copy and paste the following code in the editor of "thanks page".', 'tcd-w' ); ?></p>
     </div>
     <p><textarea class="large-text" readonly="readonly"><div id="js-cta-conversion"></div></textarea></p>
     <table class="c-ab-table">
      <tr class="c-ab-table__row">
       <th>CTA</th>
       <th><?php _e( 'Impressions', 'tcd-w' ); ?></th>
       <th><?php _e( 'Number of clicks', 'tcd-w' ); ?></th>
       <th><?php _e( 'Click-through rate', 'tcd-w' ); ?></th>
       <th><?php _e( 'Conversions', 'tcd-w' ); ?></th>
       <th><?php _e( 'Conversion rate', 'tcd-w' ); ?></th>
       <th><?php _e( 'Reset', 'tcd-w' ); ?></th>
      </tr>
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <tr class="c-ab-table__row">
       <td>CTA-<?php echo 1 === $i ? 'A' : ( 2 === $i ? 'B' : 'C' ); ?></td>
       <td class="c-ab-table__impression"><?php echo esc_html( get_option( 'tcd_cta_impression' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__click"><?php echo esc_html( get_option( 'tcd_cta_click' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__ctr"><?php echo esc_html( get_option( 'tcd_cta_ctr' . $i, 0 ) ); ?>%</td>
       <td class="c-ab-table__conversion"><?php echo esc_html( get_option( 'tcd_cta_conversion' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__cvr"><?php echo esc_html( get_option( 'tcd_cta_cvr' . $i, 0 ) ); ?>%</td>
       <td><a class="js-cta-reset c-ab-table__reset" href="#" data-cta-index="<?php echo $i; ?>"><?php _e( 'Reset values', 'tcd-w' ); ?></a></td>
      </tr>
      <?php endfor; ?>
     </table>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターCTA -------------------------------------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e( 'Footer CTA', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">

     <div class="theme_option_message2">
      <p><?php _e( 'You can set up Footer CTA which is displayed at the bottom of the footer on scroll.', 'tcd-w' ); ?><br><?php _e( 'You can register up to three contents.', 'tcd-w' ); ?><br><?php _e( 'If click the close button in footer CTA, hide the footer CTA until browser closes.', 'tcd-w' ); ?></p>
     </div>

     <?php foreach ( $cta_names as $i => $cta_name ) : ?>
     <div class="sub_box cf">
      <h4 class="theme_option_subbox_headline"><?php echo esc_html( $cta_name ); ?></h4>
       <div class="sub_box_content">

        <h5 class="theme_option_headline2"><?php _e( 'Type of CTA', 'tcd-w' ); ?></h5>
        <ul class="cf footer_cta_type">
         <?php foreach( $footer_cta_type_options as $option ) : ?>
         <li><label><input type="radio" class="cta-type" name="dp_options[footer_cta_type<?php echo $i; ?>]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $options['footer_cta_type' . $i], $option['value'] ); ?>><?php echo esc_html( $option['label'] ); ?><img src="<?php echo esc_attr( $option['image'] ); ?>?ver=1.0.2" alt="<?php echo esc_attr( $option['label'] ); ?>"></label></li>
         <?php endforeach; ?>
        </ul>

        <?php // footer cta type1 ------------------------------------------ ?>
        <div class="cta-type1-content cta-content <?php if ( 'type1' !== $options['footer_cta_type' . $i] ) { echo 'u-hidden'; } ?>">

         <h5 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h5>
         <textarea name="dp_options[footer_cta_type1_catch<?php echo $i; ?>]" class="large-text" rows="4"><?php echo esc_textarea( $options['footer_cta_type1_catch' . $i] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type1_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type1_catch_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type1_catch_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type1_catch_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_catch_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_catch_font_color' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Label', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type1_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_label' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type1_btn_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type1_btn_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type1_btn_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type1_btn_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type1_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_url' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[footer_cta_type1_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['footer_cta_type1_btn_target' . $i], 1 ); ?>></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_btn_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_btn_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_btn_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_btn_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_btn_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_btn_font_color_hover' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_btn_bg_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_btn_bg_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_btn_bg_color_hover' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Background color setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type1_bg_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_bg_opacity' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Close button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_close_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_close_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_close_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type1_close_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type1_close_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type1_close_font_color_hover' . $i] ); ?>"></li>
         </ul>

        </div>

        <?php // footer cta type2 -------------------------------------------- ?>
        <div class="cta-type2-content cta-content <?php if ( 'type2' !== $options['footer_cta_type' . $i] ) { echo 'u-hidden'; } ?>">

         <h5 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h5>
         <textarea name="dp_options[footer_cta_type2_catch<?php echo $i; ?>]" class="large-text" rows="4"><?php echo esc_textarea( $options['footer_cta_type2_catch' . $i] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type2_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type2_catch_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type2_catch_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type2_catch_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_catch_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_catch_font_color' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Label', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type2_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_label' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type2_btn_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type2_btn_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type2_btn_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type2_btn_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type2_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_url' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[footer_cta_type2_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['footer_cta_type2_btn_target' . $i], 1 ); ?>></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_btn_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_btn_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_btn_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_btn_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_btn_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_btn_font_color_hover' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_btn_bg_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_btn_bg_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_btn_bg_color_hover' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Background color setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type2_bg_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_bg_opacity' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Border setting', 'tcd-w' ); ?></h5>
         <p class="displayment_checkbox"><label><input class="show_button" name="dp_options[footer_cta_type2_show_border<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['footer_cta_type2_show_border' . $i], 1 ); ?>><?php _e( 'Display border', 'tcd-w' ); ?></label></p>
         <div style="<?php if($options['footer_cta_type2_show_border' . $i] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_border_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_border_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_border_color' . $i] ); ?>"></li>
           <li class="cf"><span class="label"><?php _e('Border opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type2_border_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_border_opacity' . $i] ); ?>"></li>
          </ul>
         </div>

         <h5 class="theme_option_headline2"><?php _e( 'Close button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_close_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_close_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_close_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type2_close_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type2_close_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type2_close_font_color_hover' . $i] ); ?>"></li>
         </ul>

        </div>

        <?php // footer cta type3 -----------------------------------------  ?>
        <div class="cta-type3-content cta-content <?php if ( 'type3' !== $options['footer_cta_type' . $i] ) { echo 'u-hidden'; } ?>">

         <h5 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h5>
         <textarea name="dp_options[footer_cta_type3_catch<?php echo $i; ?>]" class="large-text" rows="4"><?php echo esc_textarea( $options['footer_cta_type3_catch' . $i] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type3_catch_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type3_catch_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type3_catch_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type3_catch_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_catch_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_catch_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_catch_font_color' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Label', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type3_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_label' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type3_btn_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type3_btn_font_size'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[footer_cta_type3_btn_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['footer_cta_type3_btn_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[footer_cta_type3_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_url' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[footer_cta_type3_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['footer_cta_type3_btn_target' . $i], 1 ); ?>></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_btn_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_btn_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_btn_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_btn_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_btn_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_btn_font_color_hover' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_btn_bg_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_btn_bg_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_btn_bg_color_hover' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Background color setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_bg_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_bg_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type3_bg_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_bg_opacity' . $i] ); ?>"></li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h5>
         <div class="theme_option_message2">
          <p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 725, 100 ); ?></p>
         </div>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js footer_cta_type3_image<?php echo $i; ?>">
           <input type="hidden" value="<?php echo esc_attr( $options['footer_cta_type3_image' . $i] ); ?>" id="footer_cta_type3_image<?php echo $i; ?>" name="dp_options[footer_cta_type3_image<?php echo $i; ?>]" class="cf_media_id">
           <div class="preview_field"><?php if ( $options['footer_cta_type3_image' . $i] ) { echo wp_get_attachment_image( $options['footer_cta_type3_image' . $i], 'full' ); } ?></div>
           <div class="button_area">
            <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['footer_cta_type3_image' . $i] ) { echo 'hidden'; } ?>">
           </div>
          </div>
         </div>

         <h5 class="theme_option_headline2"><?php _e( 'Image (mobile)', 'tcd-w' ); ?></h5>
         <div class="theme_option_message2">
          <p><?php printf( __( 'Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w' ), 400, 60 ); ?></p>
         </div>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js footer_cta_type3_image_sp<?php echo $i; ?>">
           <input type="hidden" value="<?php echo esc_attr( $options['footer_cta_type3_image_sp' . $i] ); ?>" id="footer_cta_type3_image_sp<?php echo $i; ?>" name="dp_options[footer_cta_type3_image_sp<?php echo $i; ?>]" class="cf_media_id">
           <div class="preview_field"><?php if ( $options['footer_cta_type3_image_sp' . $i] ) { echo wp_get_attachment_image( $options['footer_cta_type3_image_sp' . $i], 'full' ); } ?></div>
           <div class="button_area">
            <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['footer_cta_type3_image_sp' . $i] ) { echo 'hidden'; } ?>">
           </div>
          </div>
         </div>

         <h5 class="theme_option_headline2"><?php _e( 'Image setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Overlay color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_overlay_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_overlay_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_overlay_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Background opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type3_overlay_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_overlay_opacity' . $i] ); ?>"></li>
          <li class="cf">
           <span class="label"><?php _e('Edge angle', 'tcd-w'); ?></span>
           <input class="small-text" type="number" max="30" min="-30" step="1" name="dp_options[footer_cta_type3_edge_angle<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_edge_angle' . $i] ); ?>">
           <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
            <p><?php _e( 'Set the right edge angle of image. It can be set within the range of -30 to 30 degrees on the premise that 0 is vertical.', 'tcd-w' ); ?></p>
           </div>
          </li>
         </ul>

         <h5 class="theme_option_headline2"><?php _e( 'Border setting', 'tcd-w' ); ?></h5>
         <p class="displayment_checkbox"><label><input class="show_button" name="dp_options[footer_cta_type3_show_border<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['footer_cta_type3_show_border' . $i], 1 ); ?>><?php _e( 'Display border', 'tcd-w' ); ?></label></p>
         <div style="<?php if($options['footer_cta_type3_show_border' . $i] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_border_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_border_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_border_color' . $i] ); ?>"></li>
           <li class="cf"><span class="label"><?php _e('Border opacity', 'tcd-w'); ?></span><input class="small-text" type="number" max="1" min="0" step="0.1" name="dp_options[footer_cta_type3_border_opacity<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_border_opacity' . $i] ); ?>"></li>
          </ul>
         </div>

         <h5 class="theme_option_headline2"><?php _e( 'Close button setting', 'tcd-w' ); ?></h5>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_close_font_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_close_font_color' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_close_font_color' . $i] ); ?>"></li>
          <li class="cf"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[footer_cta_type3_close_font_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_cta_type3_close_font_color_hover' . $i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr( $dp_default_options['footer_cta_type3_close_font_color_hover' . $i] ); ?>"></li>
         </ul>

        </div>

        <ul class="button_list cf">
         <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
         <li><a class="button-ml close_sub_box" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        </ul>
       </div>
      </div>
      <?php endforeach; ?>

     <?php // 表示設定 --------------------------------------------- ?>
     <h4 class="theme_option_headline2"><?php echo __( 'Display settings', 'tcd-w' ); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e( 'Please select the Footer CTA to display.', 'tcd-w' ); ?></p>
      <p><?php _e( 'Note: when the Footer CTA is displayed, the footer bar is hidden.', 'tcd-w' ); ?></p>
     </div>
     <select id="js-footer-cta-display" name="dp_options[footer_cta_display]">
      <?php foreach ( $cta_display_options as $option ) : ?>
      <option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $option['value'], $options['footer_cta_display'] ); ?>><?php esc_html_e( $option['label'] ); ?></option>
      <?php endforeach; ?>
     </select>
     <p><label><input type="checkbox" name="dp_options[footer_cta_hide_on_front]" value="1" <?php checked( 1, $options['footer_cta_hide_on_front'] ); ?>> <?php _e( 'Hide Footer CTA on front page', 'tcd-w' ); ?></label></p>

     <?php // ランダムの設定 --------------------------------------------- ?>
     <div id="js-footer-cta-random-display" class="<?php if ( '4' !== $options['footer_cta_display'] ) { echo 'u-hidden'; } ?>">
      <h4 class="theme_option_headline2"><?php _e( 'Random display', 'tcd-w' ); ?></h4>
      <p><?php _e( 'Please select CTA to use in random display.', 'tcd-w' ); ?></p>
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <p><label><input type="checkbox" name="dp_options[footer_cta_random<?php echo $i; ?>]" value="1" <?php checked( 1, $options['footer_cta_random' . $i] ); ?>>CTA-<?php echo 1 === $i ? 'A' : ( 2 === $i ? 'B' : 'C' ); ?></label></p>
      <?php endfor; ?>
     </div>

     <?php // ABテスト --------------------------------------------- ?>
     <h4 class="theme_option_headline2"><?php _e( 'A/B Testing', 'tcd-w' ); ?></h4>
     <div class="theme_option_message">
      <p><?php _e( 'To measure conversions, copy and paste the following code in the editor of "thanks page".', 'tcd-w' ); ?></p>
     </div>
     <p><textarea class="large-text" readonly="readonly"><div id="js-footer-cta-conversion"></div></textarea></p>
     <table class="c-ab-table">
      <tr class="c-ab-table__row">
       <th>CTA</th>
       <th><?php _e( 'Impressions', 'tcd-w' ); ?></th>
       <th><?php _e( 'Number of clicks', 'tcd-w' ); ?></th>
       <th><?php _e( 'Click-through rate', 'tcd-w' ); ?></th>
       <th><?php _e( 'Conversions', 'tcd-w' ); ?></th>
       <th><?php _e( 'Conversion rate', 'tcd-w' ); ?></th>
       <th><?php _e( 'Reset', 'tcd-w' ); ?></th>
      </tr>
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <tr class="c-ab-table__row">
       <td>CTA-<?php echo 1 === $i ? 'A' : ( 2 === $i ? 'B' : 'C' ); ?></td>
       <td class="c-ab-table__impression"><?php echo esc_html( get_option( 'tcd_footer_cta_impression' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__click"><?php echo esc_html( get_option( 'tcd_footer_cta_click' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__ctr"><?php echo esc_html( get_option( 'tcd_footer_cta_ctr' . $i, 0 ) ); ?>%</td>
       <td class="c-ab-table__conversion"><?php echo esc_html( get_option( 'tcd_footer_cta_conversion' . $i, 0 ) ); ?></td>
       <td class="c-ab-table__cvr"><?php echo esc_html( get_option( 'tcd_footer_cta_cvr' . $i, 0 ) ); ?>%</td>
       <td><a class="js-footer-cta-reset c-ab-table__reset" href="#" data-footer-cta-index="<?php echo $i; ?>"><?php _e( 'Reset values', 'tcd-w' ); ?></a></td>
      </tr>
      <?php endfor; ?>
     </table>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div>
   </div>


   <?php // ネイティブ広告 ---------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Native ads', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php echo __('Ads setting', 'tcd-w'); ?></h3>
      <div class="sub_box_content">

     <?php for($i = 1; $i <= 7; $i++) : ?>
     <div class="sub_box cf"<?php if($i == 1){ echo ' style="margin-top:20px;"'; }; ?>>
      <h3 class="theme_option_subbox_headline"><?php printf(__('Ads%s setting', 'tcd-w'), $i); ?></h3>
      <div class="sub_box_content">
       <p class="displayment_checkbox"><label><input id="dp_options[show_pr_banner<?php echo $i; ?>]" name="dp_options[show_pr_banner<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['show_pr_banner'.$i] ); ?> /> <?php printf(__('Display ads%s', 'tcd-w'), $i); ?></label></p>
       <div style="<?php if($options['show_pr_banner'.$i] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
        <textarea class="repeater-label full_width" cols="50" rows="4" name="dp_options[pr_banner_title<?php echo $i; ?>]"><?php echo esc_textarea( $options['pr_banner_title'.$i] ); ?></textarea>
        <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '460'); ?></p>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js pr_banner_image<?php echo $i; ?>">
          <input type="hidden" value="<?php echo esc_attr( $options['pr_banner_image'.$i] ); ?>" id="pr_banner_image<?php echo $i; ?>" name="dp_options[pr_banner_image<?php echo $i; ?>]" class="cf_media_id">
          <div class="preview_field"><?php if($options['pr_banner_image'.$i]){ echo wp_get_attachment_image($options['pr_banner_image'.$i], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['pr_banner_image'.$i]){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
        <h4 class="theme_option_headline2"><?php _e('URL', 'tcd-w');  ?></h4>
        <input class="regular-text full_width" type="text" name="dp_options[pr_banner_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['pr_banner_url'.$i] ); ?>" />
        <p><label><input name="dp_options[pr_banner_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['pr_banner_target'.$i], 1 ); ?>> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>
        <h4 class="theme_option_headline2"><?php _e('Ads client name', 'tcd-w');  ?></h4>
        <div class="theme_option_message2">
         <p><?php _e('Date will be replace by ads name in post list area.', 'tcd-w'); ?></p>
        </div>
        <input class="regular-text full_width" type="text" name="dp_options[pr_banner_client<?php echo $i; ?>]" value="<?php esc_attr_e( $options['pr_banner_client'.$i] ); ?>" />
        <h4 class="theme_option_headline2"><?php _e('Label setting', 'tcd-w');  ?></h4>
        <p class="displayment_checkbox"><label><input name="dp_options[show_pr_banner_label<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['show_pr_banner_label'.$i] ); ?> /> <?php _e( 'Display label', 'tcd-w' ); ?></label></p>
        <div style="<?php if($options['show_pr_banner_label'.$i] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
         <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
          <li class="cf">
           <span class="label"><?php _e('Label', 'tcd-w'); ?></span>
           <input class="full_width" type="text" name="dp_options[pr_banner_label<?php echo $i; ?>]" value="<?php echo esc_html($options['pr_banner_label'.$i]); ?>" />
          </li>
          <li class="cf">
           <span class="label"><?php _e('Background color', 'tcd-w'); ?></span>
           <div class="use_main_color">
            <input class="c-color-picker" type="text" name="dp_options[pr_banner_label_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pr_banner_label_bg_color'.$i] ); ?>" data-default-color="#000000">
           </div>
           <div class="use_main_color_checkbox">
            <label>
             <input name="dp_options[pr_banner_label_bg_color_use_main<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( $options['pr_banner_label_bg_color_use_main'.$i], 1 ); ?>>
             <span><?php _e('Apply main color', 'tcd-w'); ?></span>
            </label>
           </div>
          </li>
         </ul>
        </div>
       </div>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>

       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <?php // 表示設定 -------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php echo __('Display setting', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('Front page tab post list, mega menu, and post list widget native ads can be set from each option area.', 'tcd-w'); ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Front page header carousel', 'tcd-w' ); ?></h4>
       <p class="displayment_checkbox"><label><input name="dp_options[index_carousel_show_banner]" type="checkbox" value="1" <?php checked( $options['index_carousel_show_banner'], 1 ); ?>><?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['index_carousel_show_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <div class="theme_option_message2">
         <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
        </div>
        <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="dp_options[index_carousel_banner_num]" value="<?php echo esc_attr( $options['index_carousel_banner_num'] ); ?>" /></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Front page header carousel (mobile)', 'tcd-w' ); ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('This option will be applied when mobile header carousel is setted.', 'tcd-w'); ?></p>
       </div>
       <p class="displayment_checkbox"><label><input name="dp_options[mobile_index_carousel_show_banner]" type="checkbox" value="1" <?php checked( $options['mobile_index_carousel_show_banner'], 1 ); ?>><?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['mobile_index_carousel_show_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <div class="theme_option_message2">
         <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
        </div>
        <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="dp_options[mobile_index_carousel_banner_num]" value="<?php echo esc_attr( $options['mobile_index_carousel_banner_num'] ); ?>" /></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Archive page post list (category, tag, author, monthly archive page)', 'tcd-w' ); ?></h4>
       <p class="displayment_checkbox"><label><input name="dp_options[archive_blog_show_banner]" type="checkbox" value="1" <?php checked( $options['archive_blog_show_banner'], 1 ); ?>><?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['archive_blog_show_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <div class="theme_option_message2">
         <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
        </div>
        <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="dp_options[archive_blog_banner_num]" value="<?php echo esc_attr( $options['archive_blog_banner_num'] ); ?>" /></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Footer carousel', 'tcd-w' ); ?></h4>
       <p class="displayment_checkbox"><label><input name="dp_options[footer_carousel_show_banner]" type="checkbox" value="1" <?php checked( $options['footer_carousel_show_banner'], 1 ); ?>><?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['footer_carousel_show_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <div class="theme_option_message2">
         <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
        </div>
        <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="dp_options[footer_carousel_banner_num]" value="<?php echo esc_attr( $options['footer_carousel_banner_num'] ); ?>" /></p>
       </div>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_marketing_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_marketing_theme_options_validate( $input ) {

  global $dp_default_options, $cta_type_options, $cta_type3_layout_options, $cta_display_options, $footer_cta_type_options;


	for ( $i = 1; $i <= 3; $i++ ) {

 		if ( ! isset( $input['cta_type' . $i] ) ) $input['cta_type' . $i] = null;
 		if ( ! array_key_exists( $input['cta_type' . $i], $cta_type_options ) ) $input['cta_type' . $i] = null;

    // CTA type1
		$input['cta_type1_catch' . $i] = $input['cta_type1_catch' . $i]; // HTML対応
		$input['cta_type1_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['cta_type1_catch_font_size' . $i] );
		$input['cta_type1_catch_font_color' . $i] = wp_filter_nohtml_kses( $input['cta_type1_catch_font_color' . $i] );
		$input['cta_type1_catch_font_color_hover' . $i] = wp_filter_nohtml_kses( $input['cta_type1_catch_font_color_hover' . $i] );
		$input['cta_type1_url' . $i] = wp_filter_nohtml_kses( $input['cta_type1_url' . $i] );
 		if ( ! isset( $input['cta_type1_target' . $i] ) ) $input['cta_type1_target' . $i] = null;
  	$input['cta_type1_target' . $i] = ( $input['cta_type1_target' . $i] == 1 ? 1 : 0 );
		$input['cta_type1_image' . $i] = wp_filter_nohtml_kses( $input['cta_type1_image' . $i] );
		$input['cta_type1_image_sp' . $i] = wp_filter_nohtml_kses( $input['cta_type1_image_sp' . $i] );
		$input['cta_type1_overlay' . $i] = wp_filter_nohtml_kses( $input['cta_type1_overlay' . $i] );
		$input['cta_type1_overlay_opacity' . $i] = wp_filter_nohtml_kses( $input['cta_type1_overlay_opacity' . $i] );

    // CTA type2
		$input['cta_type2_catch' . $i] = $input['cta_type2_catch' . $i]; // HTML対応
		$input['cta_type2_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['cta_type2_catch_font_size' . $i] );
		$input['cta_type2_catch_font_color' . $i] = wp_filter_nohtml_kses( $input['cta_type2_catch_font_color' . $i] );
		$input['cta_type2_catch_font_color_hover' . $i] = wp_filter_nohtml_kses( $input['cta_type2_catch_font_color_hover' . $i] );
		$input['cta_type2_catch_bg_color' . $i] = wp_filter_nohtml_kses( $input['cta_type2_catch_bg_color' . $i] );
		$input['cta_type2_url' . $i] = wp_filter_nohtml_kses( $input['cta_type2_url' . $i] );
 		if ( ! isset( $input['cta_type2_target' . $i] ) ) $input['cta_type2_target' . $i] = null;
  	$input['cta_type2_target' . $i] = ( $input['cta_type2_target' . $i] == 1 ? 1 : 0 );
		$input['cta_type2_image' . $i] = wp_filter_nohtml_kses( $input['cta_type2_image' . $i] );
		$input['cta_type2_image_sp' . $i] = wp_filter_nohtml_kses( $input['cta_type2_image_sp' . $i] );

    // CTA type3
		$input['cta_type3_catch' . $i] = $input['cta_type3_catch' . $i]; // HTML対応
		$input['cta_type3_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['cta_type3_catch_font_size' . $i] );
		$input['cta_type3_catch_font_color' . $i] = wp_filter_nohtml_kses( $input['cta_type3_catch_font_color' . $i] );
		$input['cta_type3_catch_font_color_hover' . $i] = wp_filter_nohtml_kses( $input['cta_type3_catch_font_color_hover' . $i] );
		$input['cta_type3_url' . $i] = wp_filter_nohtml_kses( $input['cta_type3_url' . $i] );
 		if ( ! isset( $input['cta_type3_target' . $i] ) ) $input['cta_type3_target' . $i] = null;
  	$input['cta_type3_target' . $i] = ( $input['cta_type3_target' . $i] == 1 ? 1 : 0 );
		$input['cta_type3_image' . $i] = wp_filter_nohtml_kses( $input['cta_type3_image' . $i] );
		$input['cta_type3_image_sp' . $i] = wp_filter_nohtml_kses( $input['cta_type3_image_sp' . $i] );

 		if ( ! isset( $input['cta_random' . $i] ) ) $input['cta_random' . $i] = null;
  	$input['cta_random' . $i] = ( $input['cta_random' . $i] == 1 ? 1 : 0 );

	}//endfor

 	if ( ! isset( $input['cta_display'] ) ) $input['cta_display'] = null;
 	if ( ! array_key_exists( $input['cta_display'], $cta_display_options ) ) $input['cta_display'] = null;

	for ( $i = 1; $i <= 3; $i++ ) {

		if ( ! isset( $input['footer_cta_type' . $i] ) || ! array_key_exists( $input['footer_cta_type' . $i], $footer_cta_type_options ) )
			$input['footer_cta_type' . $i] = $dp_default_options['footer_cta_type' . $i];

		// Footer CTA type1
		$input['footer_cta_type1_catch' . $i] = $input['footer_cta_type1_catch' . $i]; // HTML対応
		$input['footer_cta_type1_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type1_catch_font_size' . $i] );
		$input['footer_cta_type1_catch_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type1_catch_font_size_mobile' . $i] );
		$input['footer_cta_type1_catch_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_catch_font_color' . $i] );
		$input['footer_cta_type1_btn_label' . $i] = sanitize_text_field( $input['footer_cta_type1_btn_label' . $i] );
		$input['footer_cta_type1_btn_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type1_btn_font_size' . $i] );
		$input['footer_cta_type1_btn_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type1_btn_font_size_mobile' . $i] );
		$input['footer_cta_type1_btn_url' . $i] = sanitize_text_field( $input['footer_cta_type1_btn_url' . $i] );
		$input['footer_cta_type1_btn_target' . $i] = ! empty( $input['footer_cta_type1_btn_target' . $i] ) ? 1 : 0;
		$input['footer_cta_type1_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_btn_font_color' . $i] );
		$input['footer_cta_type1_btn_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type1_btn_font_color_hover' . $i] );
		$input['footer_cta_type1_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_btn_font_color' . $i] );
		$input['footer_cta_type1_btn_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_btn_bg_color' . $i] );
		$input['footer_cta_type1_btn_bg_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type1_btn_bg_color_hover' . $i] );
		$input['footer_cta_type1_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_bg_color' . $i] );
		$input['footer_cta_type1_bg_opacity' . $i] = sanitize_text_field( $input['footer_cta_type1_bg_opacity' . $i] );
		$input['footer_cta_type1_close_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type1_close_font_color' . $i] );
		$input['footer_cta_type1_close_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type1_close_font_color_hover' . $i] );

		// Footer CTA type2
		$input['footer_cta_type2_catch' . $i] = $input['footer_cta_type2_catch' . $i]; // HTML対応
		$input['footer_cta_type2_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type2_catch_font_size' . $i] );
		$input['footer_cta_type2_catch_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type2_catch_font_size_mobile' . $i] );
		$input['footer_cta_type2_catch_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_catch_font_color' . $i] );
		$input['footer_cta_type2_btn_label' . $i] = sanitize_text_field( $input['footer_cta_type2_btn_label' . $i] );
		$input['footer_cta_type2_btn_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type2_btn_font_size' . $i] );
		$input['footer_cta_type2_btn_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type2_btn_font_size_mobile' . $i] );
		$input['footer_cta_type2_btn_url' . $i] = sanitize_text_field( $input['footer_cta_type2_btn_url' . $i] );
		$input['footer_cta_type2_btn_target' . $i] = ! empty( $input['footer_cta_type2_btn_target' . $i] ) ? 1 : 0;
		$input['footer_cta_type2_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_btn_font_color' . $i] );
		$input['footer_cta_type2_btn_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type2_btn_font_color_hover' . $i] );
		$input['footer_cta_type2_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_btn_font_color' . $i] );
		$input['footer_cta_type2_btn_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_btn_bg_color' . $i] );
		$input['footer_cta_type2_btn_bg_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type2_btn_bg_color_hover' . $i] );
		$input['footer_cta_type2_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_bg_color' . $i] );
		$input['footer_cta_type2_bg_opacity' . $i] = sanitize_text_field( $input['footer_cta_type2_bg_opacity' . $i] );
		$input['footer_cta_type2_border_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_border_color' . $i] );
		$input['footer_cta_type2_border_opacity' . $i] = sanitize_text_field( $input['footer_cta_type2_border_opacity' . $i] );
		$input['footer_cta_type2_close_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type2_close_font_color' . $i] );
		$input['footer_cta_type2_close_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type2_close_font_color_hover' . $i] );
		$input['footer_cta_type2_show_border' . $i] = ! empty( $input['footer_cta_type2_show_border' . $i] ) ? 1 : 0;

		// Footer CTA type3
		$input['footer_cta_type3_catch' . $i] = $input['footer_cta_type3_catch' . $i]; // HTML対応
		$input['footer_cta_type3_catch_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type3_catch_font_size' . $i] );
		$input['footer_cta_type3_catch_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type3_catch_font_size_mobile' . $i] );
		$input['footer_cta_type3_catch_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_catch_font_color' . $i] );
		$input['footer_cta_type3_btn_label' . $i] = sanitize_text_field( $input['footer_cta_type3_btn_label' . $i] );
		$input['footer_cta_type3_btn_font_size' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type3_btn_font_size' . $i] );
		$input['footer_cta_type3_btn_font_size_mobile' . $i] = wp_filter_nohtml_kses( $input['footer_cta_type3_btn_font_size_mobile' . $i] );
		$input['footer_cta_type3_btn_url' . $i] = sanitize_text_field( $input['footer_cta_type3_btn_url' . $i] );
		$input['footer_cta_type3_btn_target' . $i] = ! empty( $input['footer_cta_type3_btn_target' . $i] ) ? 1 : 0;
		$input['footer_cta_type3_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_btn_font_color' . $i] );
		$input['footer_cta_type3_btn_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type3_btn_font_color_hover' . $i] );
		$input['footer_cta_type3_btn_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_btn_font_color' . $i] );
		$input['footer_cta_type3_btn_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_btn_bg_color' . $i] );
		$input['footer_cta_type3_btn_bg_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type3_btn_bg_color_hover' . $i] );
		$input['footer_cta_type3_bg_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_bg_color' . $i] );
		$input['footer_cta_type3_bg_opacity' . $i] = sanitize_text_field( $input['footer_cta_type3_bg_opacity' . $i] );
		$input['footer_cta_type3_image' . $i] = absint( $input['footer_cta_type3_image' . $i] );
		$input['footer_cta_type3_image_sp' . $i] = absint( $input['footer_cta_type3_image_sp' . $i] );
		$input['footer_cta_type3_overlay_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_overlay_color' . $i] );
		$input['footer_cta_type3_overlay_opacity' . $i] = sanitize_text_field( $input['footer_cta_type3_overlay_opacity' . $i] );
		$input['footer_cta_type3_edge_angle' . $i] = intval( $input['footer_cta_type3_edge_angle' . $i] );
		$input['footer_cta_type3_border_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_border_color' . $i] );
		$input['footer_cta_type3_border_opacity' . $i] = sanitize_text_field( $input['footer_cta_type3_border_opacity' . $i] );
		$input['footer_cta_type3_close_font_color' . $i] = sanitize_hex_color( $input['footer_cta_type3_close_font_color' . $i] );
		$input['footer_cta_type3_close_font_color_hover' . $i] = sanitize_hex_color( $input['footer_cta_type3_close_font_color_hover' . $i] );
		$input['footer_cta_type3_show_border' . $i] = ! empty( $input['footer_cta_type3_show_border' . $i] ) ? 1 : 0;

	}//endfor

 	if ( ! isset( $input['footer_cta_display'] ) ) $input['footer_cta_display'] = null;
 	if ( ! array_key_exists( $input['footer_cta_display'], $cta_display_options ) ) $input['footer_cta_display'] = null;

 	if ( ! isset( $input['footer_cta_hide_on_front'] ) ) $input['footer_cta_hide_on_front'] = null;
  $input['footer_cta_hide_on_front'] = ( $input['footer_cta_hide_on_front'] == 1 ? 1 : 0 );

  // ネイティブ広告
  for ( $i = 1; $i <= 7; $i++ ) {
    $input['show_pr_banner'.$i] = ! empty( $input['show_pr_banner'.$i] ) ? 1 : 0;
    $input['pr_banner_title'.$i] = $input['pr_banner_title'.$i];
    $input['pr_banner_image'.$i] = wp_filter_nohtml_kses( $input['pr_banner_image'.$i] );
    $input['pr_banner_url'.$i] = wp_filter_nohtml_kses( $input['pr_banner_url'.$i] );
    $input['pr_banner_target'.$i] = ! empty( $input['pr_banner_target'.$i] ) ? 1 : 0;
    $input['pr_banner_client'.$i] = $input['pr_banner_client'.$i];
    $input['pr_banner_label'.$i] = $input['pr_banner_label'.$i];
    $input['show_pr_banner_label'.$i] = ! empty( $input['show_pr_banner_label'.$i] ) ? 1 : 0;
    $input['pr_banner_label_bg_color'.$i] = wp_filter_nohtml_kses( $input['pr_banner_label_bg_color'.$i] );
    $input['pr_banner_label_bg_color_use_main'.$i] = ! empty( $input['pr_banner_label_bg_color_use_main'.$i] ) ? 1 : 0;
  }

  $input['index_carousel_show_banner'] = ! empty( $input['index_carousel_show_banner'] ) ? 1 : 0;
  $input['index_carousel_banner_num'] = wp_filter_nohtml_kses( $input['index_carousel_banner_num'] );

  $input['mobile_index_carousel_show_banner'] = ! empty( $input['mobile_index_carousel_show_banner'] ) ? 1 : 0;
  $input['mobile_index_carousel_banner_num'] = wp_filter_nohtml_kses( $input['mobile_index_carousel_banner_num'] );

  $input['archive_blog_show_banner'] = ! empty( $input['archive_blog_show_banner'] ) ? 1 : 0;
  $input['archive_blog_banner_num'] = wp_filter_nohtml_kses( $input['archive_blog_banner_num'] );

  $input['footer_carousel_show_banner'] = ! empty( $input['footer_carousel_show_banner'] ) ? 1 : 0;
  $input['footer_carousel_banner_num'] = wp_filter_nohtml_kses( $input['footer_carousel_banner_num'] );

	return $input;

};


?>