<?php
/*
 * お知らせの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_news_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_news_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_news_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_news_theme_options_validate' );


// タブの名前
function add_news_tab_label( $tab_labels ) {
  $options = get_design_plus_option();
  $tab_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );
  $tab_labels['news'] = $tab_label;
  return $tab_labels;
}


// 初期値
function add_news_dp_default_options( $dp_default_options ) {

	// 基本設定
	$dp_default_options['news_label'] = __( 'News', 'tcd-w' );
	$dp_default_options['news_slug'] = 'news';

	// ヘッダー
	$dp_default_options['archive_news_header_catch'] = __( 'Catchphrase', 'tcd-w' );
	$dp_default_options['archive_news_header_catch_direction'] = '';
	$dp_default_options['archive_news_header_catch_font_type'] = 'type3';
	$dp_default_options['archive_news_header_catch_animation_type'] = 'type1';
	$dp_default_options['archive_news_header_catch_font_size'] = '30';
	$dp_default_options['archive_news_header_catch_font_size_mobile'] = '20';
	$dp_default_options['archive_news_header_catch_color'] = '#FFFFFF';
	$dp_default_options['archive_news_header_bg_image'] = false;
	$dp_default_options['archive_news_header_use_overlay'] = 1;
	$dp_default_options['archive_news_header_overlay_color'] = '#000000';
	$dp_default_options['archive_news_header_overlay_opacity'] = '0.3';

	// アーカイブページ
	$dp_default_options['archive_news_headline'] = __( 'News', 'tcd-w' );
	$dp_default_options['archive_news_headline_show_icon'] = '';
	$dp_default_options['archive_news_headline_direction'] = '';
	$dp_default_options['archive_news_headline_font_type'] = 'type3';
	$dp_default_options['archive_news_headline_font_size'] = '28';
	$dp_default_options['archive_news_headline_font_size_mobile'] = '22';
	$dp_default_options['archive_news_sub_headline'] = '';
	$dp_default_options['archive_news_sub_headline_font_size'] = '14';
	$dp_default_options['archive_news_sub_headline_font_size_mobile'] = '12';
	$dp_default_options['archive_news_title_font_size'] = '20';
	$dp_default_options['archive_news_title_font_size_mobile'] = '16';
	$dp_default_options['archive_news_desc_font_size'] = '16';
	$dp_default_options['archive_news_desc_font_size_mobile'] = '14';
	$dp_default_options['archive_news_show_date'] = 1;
  $dp_default_options['archive_news_show_thumbnail'] = 1;
	$dp_default_options['archive_news_num'] = '5';

	// 詳細ページ
	$dp_default_options['single_news_sidebar'] = 'type2';
	$dp_default_options['single_news_title_font_size'] = '26';
	$dp_default_options['single_news_title_font_size_mobile'] = '20';
	$dp_default_options['single_news_title_font_type'] = 'type2';
	$dp_default_options['single_news_content_font_size'] = '16';
	$dp_default_options['single_news_content_font_size_mobile'] = '14';
	$dp_default_options['single_news_show_image'] = 1;
	$dp_default_options['single_news_show_date'] = 1;
	$dp_default_options['single_news_show_update'] = '';
	$dp_default_options['single_news_show_sns_top'] = 1;
	$dp_default_options['single_news_show_sns_btm'] = 1;
	$dp_default_options['single_news_show_copy_top'] = 1;
	$dp_default_options['single_news_show_copy_btm'] = 1;
	$dp_default_options['single_news_show_nav'] = 1;

	// 最新のお知らせ一覧
	$dp_default_options['show_recent_news'] = 1;
	$dp_default_options['recent_news_headline'] = __( 'Latest news', 'tcd-w' );
	$dp_default_options['recent_news_headline_font_size'] = '20';
	$dp_default_options['recent_news_headline_font_size_mobile'] = '16';
	$dp_default_options['recent_news_num'] = '3';
	$dp_default_options['recent_news_num_mobile'] = '3';
	$dp_default_options['recent_news_show_date'] = 1;
	$dp_default_options['recent_news_title_font_size'] = '16';
	$dp_default_options['recent_news_title_font_size_mobile'] = '14';

	// 広告
	$dp_default_options['news_single_top_ad_code'] = '';
	$dp_default_options['news_single_top_ad_image'] = false;
	$dp_default_options['news_single_top_ad_url'] = '';

	$dp_default_options['news_single_bottom_ad_code'] = '';
	$dp_default_options['news_single_bottom_ad_image'] = false;
	$dp_default_options['news_single_bottom_ad_url'] = '';

	$dp_default_options['news_single_shortcode_ad_code'] = '';
	$dp_default_options['news_single_shortcode_ad_image'] = false;
	$dp_default_options['news_single_shortcode_ad_url'] = '';

	$dp_default_options['news_single_mobile_ad_code'] = '';
	$dp_default_options['news_single_mobile_ad_image'] = false;
	$dp_default_options['news_single_mobile_ad_url'] = '';


	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_news_tab_panel( $options ) {

  global $dp_default_options, $no_image_options, $font_type_options, $layout_options, $headline_animation_options;
  $news_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );

?>

<div id="tab-content-news" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Name of content', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This name will also be used in breadcrumb link.', 'tcd-w'); ?></p>
     </div>
     <input id="dp_options[news_label]" class="regular-text" type="text" name="dp_options[news_label]" value="<?php echo esc_attr( $options['news_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Slug setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[news_slug]" class="hankaku regular-text" type="text" name="dp_options[news_slug]" value="<?php echo sanitize_title( $options['news_slug'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブページのヘッダー設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Archive page header setting', 'tcd-w'); ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea class="full_width" cols="50" rows="3" name="dp_options[archive_news_header_catch]"><?php echo esc_textarea(  $options['archive_news_header_catch'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_news_header_catch_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_news_header_catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[archive_news_header_catch_direction]" type="checkbox" value="1" <?php checked( $options['archive_news_header_catch_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Animation type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_news_header_catch_animation_type]">
        <?php foreach ( $headline_animation_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_news_header_catch_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_header_catch_font_size]" value="<?php esc_attr_e( $options['archive_news_header_catch_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_header_catch_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_header_catch_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_news_header_catch_color]" value="<?php echo esc_attr( $options['archive_news_header_catch_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Background image', 'tcd-w'); ?></h4>
     <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_news_header_bg_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_news_header_bg_image'] ); ?>" id="archive_news_header_bg_image" name="dp_options[archive_news_header_bg_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_news_header_bg_image']){ echo wp_get_attachment_image($options['archive_news_header_bg_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_news_header_bg_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[archive_news_header_use_overlay]" type="checkbox" value="1" <?php checked( $options['archive_news_header_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['archive_news_header_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_news_header_overlay_color]" value="<?php echo esc_attr( $options['archive_news_header_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
       <li class="cf">
        <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[archive_news_header_overlay_opacity]" value="<?php echo esc_attr( $options['archive_news_header_overlay_opacity'] ); ?>" />
        <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
         <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
        </div>
       </li>
      </ul>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブページの設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Archive page other setting', 'tcd-w'); ?></h3>
    <div class="theme_option_field_ac_content">

     <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_news_headline]" value="<?php echo esc_attr(  $options['archive_news_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span><label><input name="dp_options[archive_news_headline_show_icon]" type="checkbox" value="1" <?php checked( $options['archive_news_headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[archive_news_headline_direction]" type="checkbox" value="1" <?php checked( $options['archive_news_headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
       <select name="dp_options[archive_news_headline_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_news_headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_headline_font_size]" value="<?php esc_attr_e( $options['archive_news_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_news_sub_headline]" value="<?php echo esc_attr(  $options['archive_news_sub_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_sub_headline_font_size]" value="<?php esc_attr_e( $options['archive_news_sub_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_sub_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $news_label); ?></h4>
     <ul class="option_list">
      <li class="cf">
       <span class="label"><?php _e('Number of post to display', 'tcd-w'); ?></span>
       <select name="dp_options[archive_news_num]">
        <?php for($i=5; $i<= 10; $i++): ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['archive_news_num'], $i ); ?>><?php echo esc_html($i); ?></option>
        <?php endfor; ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_title_font_size]" value="<?php esc_attr_e( $options['archive_news_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_title_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_desc_font_size]" value="<?php esc_attr_e( $options['archive_news_desc_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of description (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_news_desc_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Display date', 'tcd-w'); ?></span><input name="dp_options[archive_news_show_date]" type="checkbox" value="1" <?php checked( '1', $options['archive_news_show_date'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display featured image', 'tcd-w'); ?></span><input name="dp_options[archive_news_show_thumbnail]" type="checkbox" value="1" <?php checked( '1', $options['archive_news_show_thumbnail'] ); ?> /></li>
     </ul>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 詳細ページの設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <h4 class="theme_option_headline2"><?php _e('Post title setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font type of title', 'tcd-w');  ?></span>
       <select name="dp_options[single_news_title_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_news_title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_news_title_font_size]" value="<?php esc_attr_e( $options['single_news_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_news_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_news_title_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Post content setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_news_content_font_size]" value="<?php esc_attr_e( $options['single_news_content_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of content (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_news_content_font_size_mobile]" value="<?php esc_attr_e( $options['single_news_content_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Display featured image', 'tcd-w');  ?></span><input name="dp_options[single_news_show_image]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_image'] ); ?> /></li>
      <li class="cf blog_single_show_date"><span class="label"><?php _e('Display date', 'tcd-w');  ?></span><input name="dp_options[single_news_show_date]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_date'] ); ?> /></li>
      <li class="cf blog_single_show_update"><span class="label"><?php _e('Display modified date', 'tcd-w');  ?></span><input name="dp_options[single_news_show_update]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_update'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display next previous link', 'tcd-w');  ?></span><input name="dp_options[single_news_show_nav]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_nav'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under featured image', 'tcd-w');  ?></span><input name="dp_options[single_news_show_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_sns_top'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under post content', 'tcd-w');  ?></span><input name="dp_options[single_news_show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_sns_btm'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display "COPY Title&amp;URL" button under featured image', 'tcd-w');  ?></span><input name="dp_options[single_news_show_copy_top]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_copy_top'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display "COPY Title&amp;URL" button under post content', 'tcd-w');  ?></span><input name="dp_options[single_news_show_copy_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_news_show_copy_btm'] ); ?> /></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Side content setting', 'tcd-w');  ?></h4>
     <select name="dp_options[single_news_sidebar]">
      <?php $i = 1; foreach ( $layout_options as $option ) { if($i == 3 || $i == 4) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_news_sidebar'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; $i++; }; ?>
     </select>

     <h4 class="theme_option_headline2"><?php echo __('Recent post setting', 'tcd-w'); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[show_recent_news]" type="checkbox" value="1" <?php checked( $options['show_recent_news'], 1 ); ?>><?php echo __('Display recent post', 'tcd-w'); ?></label></p>
     <div style="<?php if($options['show_recent_news'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><input type="text" class="full_width" name="dp_options[recent_news_headline]" value="<?php echo esc_textarea(  $options['recent_news_headline'] ); ?>" /></li>
       <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[recent_news_headline_font_size]" value="<?php esc_attr_e( $options['recent_news_headline_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[recent_news_headline_font_size_mobile]" value="<?php esc_attr_e( $options['recent_news_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf">
        <span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
        <select name="dp_options[recent_news_num]">
         <?php for($i=3; $i<= 10; $i++): ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['recent_news_num'], $i ); ?>><?php echo esc_html($i); ?></option>
         <?php endfor; ?>
        </select>
       </li>
       <li class="cf">
        <span class="label"><?php _e('Number of post to display (mobile)', 'tcd-w');  ?></span>
        <select name="dp_options[recent_news_num_mobile]">
         <?php for($i=3; $i<= 10; $i++): ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['recent_news_num_mobile'], $i ); ?>><?php echo esc_html($i); ?></option>
         <?php endfor; ?>
        </select>
       </li>
       <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[recent_news_title_font_size]" value="<?php esc_attr_e( $options['recent_news_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[recent_news_title_font_size_mobile]" value="<?php esc_attr_e( $options['recent_news_title_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Display date', 'tcd-w'); ?></span><input name="dp_options[recent_news_show_date]" type="checkbox" value="1" <?php checked( '1', $options['recent_news_show_date'] ); ?> /></li>
      </ul>
     </div>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 広告 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Banner setting', 'tcd-w'); ?></h3>
    <div class="theme_option_field_ac_content">

     <?php // アイキャッチ画像の下 -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Under featured image', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('This banner will be displayed after featured image.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[news_single_top_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[news_single_top_ad_code]"><?php echo esc_textarea( $options['news_single_top_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '730'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js news_single_top_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['news_single_top_ad_image'] ); ?>" id="news_single_top_ad_image" name="dp_options[news_single_top_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['news_single_top_ad_image']){ echo wp_get_attachment_image($options['news_single_top_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['news_single_top_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[news_single_top_ad_url]" class="regular-text" type="text" name="dp_options[news_single_top_ad_url]" value="<?php esc_attr_e( $options['news_single_top_ad_url'] ); ?>" />
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <?php // 新着お知らせの上 -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php echo __('Above recent post', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php echo __('This banner will be displayed before recent post', 'tcd-w'); ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[news_single_bottom_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[news_single_bottom_ad_code]"><?php echo esc_textarea( $options['news_single_bottom_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '730'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js news_single_bottom_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['news_single_bottom_ad_image'] ); ?>" id="news_single_bottom_ad_image" name="dp_options[news_single_bottom_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['news_single_bottom_ad_image']){ echo wp_get_attachment_image($options['news_single_bottom_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['news_single_bottom_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[news_single_bottom_ad_url]" class="regular-text" type="text" name="dp_options[news_single_bottom_ad_url]" value="<?php esc_attr_e( $options['news_single_bottom_ad_url'] ); ?>" />
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <?php // ショートコード -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Short code', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('Please copy and paste the short code inside the content to show this banner.', 'tcd-w'); ?></p>
       </div>
       <p><?php _e('Short code', 'tcd-w');  ?> : <input type="text" readonly="readonly" value="[news_s_ad]" /></p>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[news_single_shortcode_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[news_single_shortcode_ad_code]"><?php echo esc_textarea( $options['news_single_shortcode_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '730'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js news_single_shortcode_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['news_single_shortcode_ad_image'] ); ?>" id="news_single_shortcode_ad_image" name="dp_options[news_single_shortcode_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['news_single_shortcode_ad_image']){ echo wp_get_attachment_image($options['news_single_shortcode_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['news_single_shortcode_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[news_single_shortcode_ad_url]" class="regular-text" type="text" name="dp_options[news_single_shortcode_ad_url]" value="<?php esc_attr_e( $options['news_single_shortcode_ad_url'] ); ?>" />
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <?php // モバイル用 -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Mobile device', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('This banner will be displayed on mobile device.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[news_single_mobile_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[news_single_mobile_ad_code]"><?php echo esc_textarea( $options['news_single_mobile_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js news_single_mobile_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['news_single_mobile_ad_image'] ); ?>" id="news_single_mobile_ad_image" name="dp_options[news_single_mobile_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['news_single_mobile_ad_image']){ echo wp_get_attachment_image($options['news_single_mobile_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['news_single_mobile_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[news_single_mobile_ad_url]" class="regular-text" type="text" name="dp_options[news_single_mobile_ad_url]" value="<?php esc_attr_e( $options['news_single_mobile_ad_url'] ); ?>" />
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_news_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_news_theme_options_validate( $input ) {

  global $dp_default_options, $no_image_options, $font_type_options, $headline_animation_options;

  //基本設定
  $input['news_slug'] = sanitize_title( $input['news_slug'] );
  $input['news_label'] = wp_filter_nohtml_kses( $input['news_label'] );


  //ヘッダーの設定
  $input['archive_news_header_catch'] = wp_filter_nohtml_kses( $input['archive_news_header_catch'] );
  if ( ! isset( $value['archive_news_header_catch_font_type'] ) )
    $value['archive_news_header_catch_font_type'] = null;
  if ( ! array_key_exists( $value['archive_news_header_catch_font_type'], $font_type_options ) )
    $value['archive_news_header_catch_font_type'] = null;
  if ( ! isset( $value['archive_news_header_catch_animation_type'] ) )
    $value['archive_news_header_catch_animation_type'] = null;
  if ( ! array_key_exists( $value['archive_news_header_catch_animation_type'], $headline_animation_options ) )
    $value['archive_news_header_catch_animation_type'] = null;
  $input['archive_news_header_catch_direction'] = ! empty( $input['archive_news_header_catch_direction'] ) ? 1 : 0;
  $input['archive_news_header_catch_font_size'] = wp_filter_nohtml_kses( $input['archive_news_header_catch_font_size'] );
  $input['archive_news_header_catch_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_header_catch_font_size_mobile'] );
  $input['archive_news_header_catch_color'] = wp_filter_nohtml_kses( $input['archive_news_header_catch_color'] );
  $input['archive_news_header_bg_image'] = wp_filter_nohtml_kses( $input['archive_news_header_bg_image'] );
  $input['archive_news_header_use_overlay'] = ! empty( $input['archive_news_header_use_overlay'] ) ? 1 : 0;
  $input['archive_news_header_overlay_color'] = wp_filter_nohtml_kses( $input['archive_news_header_overlay_color'] );
  $input['archive_news_header_overlay_opacity'] = wp_filter_nohtml_kses( $input['archive_news_header_overlay_opacity'] );


  // アーカイブ
  $input['archive_news_headline'] = wp_filter_nohtml_kses( $input['archive_news_headline'] );
  $input['archive_news_sub_headline'] = wp_filter_nohtml_kses( $input['archive_news_sub_headline'] );
  $input['archive_news_headline_show_icon'] = ! empty( $input['archive_news_headline_show_icon'] ) ? 1 : 0;
  $input['archive_news_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_news_headline_font_size'] );
  $input['archive_news_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_headline_font_size_mobile'] );
  $input['archive_news_sub_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_news_sub_headline_font_size'] );
  $input['archive_news_sub_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_sub_headline_font_size_mobile'] );
  $input['archive_news_headline_direction'] = ! empty( $input['archive_news_headline_direction'] ) ? 1 : 0;
  $input['archive_news_headline_font_type'] = wp_filter_nohtml_kses( $input['archive_news_headline_font_type'] );
  $input['archive_news_title_font_size'] = wp_filter_nohtml_kses( $input['archive_news_title_font_size'] );
  $input['archive_news_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_title_font_size_mobile'] );
  $input['archive_news_desc_font_size'] = wp_filter_nohtml_kses( $input['archive_news_desc_font_size'] );
  $input['archive_news_desc_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_desc_font_size_mobile'] );
  $input['archive_news_num'] = wp_filter_nohtml_kses( $input['archive_news_num'] );
  $input['archive_news_show_date'] = ! empty( $input['archive_news_show_date'] ) ? 1 : 0;
  $input['archive_news_show_thumbnail'] = ! empty( $input['archive_news_show_thumbnail'] ) ? 1 : 0;


  //詳細ページ
  $input['single_news_sidebar'] = wp_filter_nohtml_kses( $input['single_news_sidebar'] );
  if ( ! isset( $value['single_news_title_font_type'] ) )
    $value['single_news_title_font_type'] = null;
  if ( ! array_key_exists( $value['single_news_title_font_type'], $font_type_options ) )
    $value['single_news_title_font_type'] = null;
  $input['single_news_title_font_size'] = wp_filter_nohtml_kses( $input['single_news_title_font_size'] );
  $input['single_news_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_news_title_font_size_mobile'] );
  $input['single_news_content_font_size'] = wp_filter_nohtml_kses( $input['single_news_content_font_size'] );
  $input['single_news_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_news_content_font_size_mobile'] );
  $input['single_news_show_date'] = ! empty( $input['single_news_show_date'] ) ? 1 : 0;
  $input['single_news_show_update'] = ! empty( $input['single_news_show_update'] ) ? 1 : 0;
  $input['single_news_show_nav'] = ! empty( $input['single_news_show_nav'] ) ? 1 : 0;
  $input['single_news_show_image'] = ! empty( $input['single_news_show_image'] ) ? 1 : 0;
  $input['single_news_show_sns_top'] = ! empty( $input['single_news_show_sns_top'] ) ? 1 : 0;
  $input['single_news_show_sns_btm'] = ! empty( $input['single_news_show_sns_btm'] ) ? 1 : 0;
  $input['single_news_show_copy_top'] = ! empty( $input['single_news_show_copy_top'] ) ? 1 : 0;
  $input['single_news_show_copy_btm'] = ! empty( $input['single_news_show_copy_btm'] ) ? 1 : 0;


  // 最新お知らせ一覧
  $input['show_recent_news'] = ! empty( $input['show_recent_news'] ) ? 1 : 0;
  $input['recent_news_headline'] = wp_filter_nohtml_kses( $input['recent_news_headline'] );
  $input['recent_news_headline_font_size'] = wp_filter_nohtml_kses( $input['recent_news_headline_font_size'] );
  $input['recent_news_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['recent_news_headline_font_size_mobile'] );
  $input['recent_news_num'] = wp_filter_nohtml_kses( $input['recent_news_num'] );
  $input['recent_news_num_mobile'] = wp_filter_nohtml_kses( $input['recent_news_num_mobile'] );
  $input['recent_news_show_date'] = ! empty( $input['recent_news_show_date'] ) ? 1 : 0;
  $input['recent_news_title_font_size'] = wp_filter_nohtml_kses( $input['recent_news_title_font_size'] );
  $input['recent_news_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['recent_news_title_font_size_mobile'] );


  // 広告
  $input['news_single_top_ad_code'] = $input['news_single_top_ad_code'];
  $input['news_single_top_ad_image'] = wp_filter_nohtml_kses( $input['news_single_top_ad_image'] );
  $input['news_single_top_ad_url'] = wp_filter_nohtml_kses( $input['news_single_top_ad_url'] );

  $input['news_single_bottom_ad_code'] = $input['news_single_bottom_ad_code'];
  $input['news_single_bottom_ad_image'] = wp_filter_nohtml_kses( $input['news_single_bottom_ad_image'] );
  $input['news_single_bottom_ad_url'] = wp_filter_nohtml_kses( $input['news_single_bottom_ad_url'] );

  $input['news_single_shortcode_ad_code'] = $input['news_single_shortcode_ad_code'];
  $input['news_single_shortcode_ad_image'] = wp_filter_nohtml_kses( $input['news_single_shortcode_ad_image'] );
  $input['news_single_shortcode_ad_url'] = wp_filter_nohtml_kses( $input['news_single_shortcode_ad_url'] );

  $input['news_single_mobile_ad_code'] = $input['news_single_mobile_ad_code'];
  $input['news_single_mobile_ad_image'] = wp_filter_nohtml_kses( $input['news_single_mobile_ad_image'] );
  $input['news_single_mobile_ad_url'] = wp_filter_nohtml_kses( $input['news_single_mobile_ad_url'] );

	return $input;

};


?>