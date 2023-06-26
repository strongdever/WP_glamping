<?php
/*
 * ブログの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_blog_dp_default_options' );


//  Add label of blog tab
add_action( 'tcd_tab_labels', 'add_blog_tab_label' );


// Add HTML of blog tab
add_action( 'tcd_tab_panel', 'add_blog_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_blog_theme_options_validate' );


// タブの名前
function add_blog_tab_label( $tab_labels ) {
	$tab_labels['blog'] = __( 'Blog', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_blog_dp_default_options( $dp_default_options ) {

	// 基本設定
	$dp_default_options['blog_label'] = __( 'Blog', 'tcd-w' );

	// ヘッダー
	$dp_default_options['archive_blog_header_catch'] = __( 'Catchphrase', 'tcd-w' );
	$dp_default_options['archive_blog_header_catch_direction'] = '';
	$dp_default_options['archive_blog_header_catch_font_type'] = 'type3';
	$dp_default_options['archive_blog_header_catch_animation_type'] = 'type1';
	$dp_default_options['archive_blog_header_catch_font_size'] = '30';
	$dp_default_options['archive_blog_header_catch_font_size_mobile'] = '20';
	$dp_default_options['archive_blog_header_catch_color'] = '#FFFFFF';
	$dp_default_options['archive_blog_header_bg_image'] = false;
	$dp_default_options['archive_blog_header_use_overlay'] = 1;
	$dp_default_options['archive_blog_header_overlay_color'] = '#000000';
	$dp_default_options['archive_blog_header_overlay_opacity'] = '0.3';

	// アーカイブページ
	$dp_default_options['archive_blog_headline'] = __( 'Blog', 'tcd-w' );
	$dp_default_options['archive_blog_headline_show_icon'] = '';
	$dp_default_options['archive_blog_headline_direction'] = '';
	$dp_default_options['archive_blog_headline_font_type'] = 'type3';
	$dp_default_options['archive_blog_headline_font_size'] = '28';
	$dp_default_options['archive_blog_headline_font_size_mobile'] = '22';
	$dp_default_options['archive_blog_sub_headline'] = '';
	$dp_default_options['archive_blog_sub_headline_font_size'] = '14';
	$dp_default_options['archive_blog_sub_headline_font_size_mobile'] = '12';
	$dp_default_options['archive_blog_title_font_size'] = '20';
	$dp_default_options['archive_blog_title_font_size_mobile'] = '16';
	$dp_default_options['archive_blog_show_date'] = 1;
	$dp_default_options['archive_blog_show_category'] = 1;
	$dp_default_options['archive_blog_show_ads'] = '';
	$dp_default_options['archive_blog_banner_num'] = '3';

	// 記事ページ
	$dp_default_options['single_blog_sidebar'] = 'type2';
	$dp_default_options['single_blog_title_font_size'] = '26';
	$dp_default_options['single_blog_title_font_size_mobile'] = '20';
	$dp_default_options['single_blog_title_font_type'] = 'type2';
	$dp_default_options['single_blog_content_font_size'] = '16';
	$dp_default_options['single_blog_content_font_size_mobile'] = '14';
	$dp_default_options['single_blog_show_image'] = 1;
	$dp_default_options['single_blog_show_date'] = 1;
	$dp_default_options['single_blog_show_update'] = '';
	$dp_default_options['single_blog_show_category'] = 1;
	$dp_default_options['single_blog_show_comment'] = 1;
	$dp_default_options['single_blog_show_trackback'] = 1;
	$dp_default_options['single_blog_show_nav'] = 1;
	$dp_default_options['single_blog_show_sns_top'] = 1;
	$dp_default_options['single_blog_show_sns_btm'] = 1;
	$dp_default_options['single_blog_show_copy_top'] = 1;
	$dp_default_options['single_blog_show_copy_btm'] = 1;
	$dp_default_options['pagenation_type'] = 'type1';
	$dp_default_options['single_blog_show_meta_box'] = '';
	$dp_default_options['single_blog_show_meta_category'] = 1;
	$dp_default_options['single_blog_show_meta_tag'] = 1;
	$dp_default_options['single_blog_show_meta_author'] = 1;
	$dp_default_options['single_blog_show_meta_comment'] = 1;

  // バナーコンテンツ
	$dp_default_options['show_single_blog_banner'] = '';
	$dp_default_options['single_blog_banner_title'] = '';
	$dp_default_options['single_blog_banner_sub_title'] = '';
	$dp_default_options['single_blog_banner_desc'] = '';
	$dp_default_options['single_blog_banner_title_font_type'] = 'type3';
	$dp_default_options['single_blog_banner_title_font_color'] = '#ffffff';
	$dp_default_options['single_blog_banner_title_bg_color'] = '#000000';
	$dp_default_options['single_blog_banner_title_font_size'] = '28';
	$dp_default_options['single_blog_banner_title_font_size_mobile'] = '20';
	$dp_default_options['single_blog_banner_sub_title_font_size'] = '16';
	$dp_default_options['single_blog_banner_sub_title_font_size_mobile'] = '14';
	$dp_default_options['single_blog_banner_desc_font_size'] = '16';
	$dp_default_options['single_blog_banner_desc_font_size_mobile'] = '14';
	$dp_default_options['single_blog_banner_url'] = '';
	$dp_default_options['single_blog_banner_target'] = '';
	$dp_default_options['single_blog_banner_image'] = false;

	// 関連記事
	$dp_default_options['show_related_post'] = 1;
	$dp_default_options['related_post_headline'] = __( 'Related post', 'tcd-w' );
	$dp_default_options['related_post_headline_font_size'] = '20';
	$dp_default_options['related_post_headline_font_size_mobile'] = '16';
	$dp_default_options['related_post_num'] = '4';
	$dp_default_options['related_post_num_mobile'] = '3';
	$dp_default_options['related_post_title_font_size'] = '16';
	$dp_default_options['related_post_title_font_size_mobile'] = '14';

	// コメントの見出し
	$dp_default_options['comment_headline_font_size'] = '20';
	$dp_default_options['comment_headline_font_size_mobile'] = '16';

	// 記事ページのバナー
	$dp_default_options['single_top_ad_code'] = '';
	$dp_default_options['single_top_ad_image'] = false;
	$dp_default_options['single_top_ad_url'] = '';

	$dp_default_options['single_bottom_ad_code'] = '';
	$dp_default_options['single_bottom_ad_image'] = false;
	$dp_default_options['single_bottom_ad_url'] = '';

	$dp_default_options['single_shortcode_ad_code'] = '';
	$dp_default_options['single_shortcode_ad_image'] = false;
	$dp_default_options['single_shortcode_ad_url'] = '';

	$dp_default_options['single_mobile_ad_code'] = '';
	$dp_default_options['single_mobile_ad_image'] = false;
	$dp_default_options['single_mobile_ad_url'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_tab_panel( $options ) {

  global $dp_default_options, $pagenation_type_options, $font_type_options, $layout_options, $headline_animation_options;
  $blog_label = $options['blog_label'] ? esc_html( $options['blog_label'] ) : __( 'Blog', 'tcd-w' );

?>

<div id="tab-content-blog" class="tab-content">

   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <h4 class="theme_option_headline2"><?php _e('Name of content', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('This name will also be used in breadcrumb link.', 'tcd-w'); ?></p>
     </div>
     <input class="full_width" type="text" name="dp_options[blog_label]" value="<?php echo esc_attr($options['blog_label']); ?>" />

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブページのヘッダー設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Archive page header setting', 'tcd-w'); ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea class="full_width" cols="50" rows="3" name="dp_options[archive_blog_header_catch]"><?php echo esc_textarea(  $options['archive_blog_header_catch'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_blog_header_catch_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_blog_header_catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><label><input name="dp_options[archive_blog_header_catch_direction]" type="checkbox" value="1" <?php checked( $options['archive_blog_header_catch_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></label></li>
      <li class="cf"><span class="label"><?php _e('Animation type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_blog_header_catch_animation_type]">
        <?php foreach ( $headline_animation_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_blog_header_catch_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_header_catch_font_size]" value="<?php esc_attr_e( $options['archive_blog_header_catch_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_header_catch_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_header_catch_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_blog_header_catch_color]" value="<?php echo esc_attr( $options['archive_blog_header_catch_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Background image', 'tcd-w'); ?></h4>
     <div class="theme_option_message2">
      <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
     </div>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_blog_header_bg_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_blog_header_bg_image'] ); ?>" id="archive_blog_header_bg_image" name="dp_options[archive_blog_header_bg_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_blog_header_bg_image']){ echo wp_get_attachment_image($options['archive_blog_header_bg_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_blog_header_bg_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[archive_blog_header_use_overlay]" type="checkbox" value="1" <?php checked( $options['archive_blog_header_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['archive_blog_header_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_blog_header_overlay_color]" value="<?php echo esc_attr( $options['archive_blog_header_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
       <li class="cf">
        <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[archive_blog_header_overlay_opacity]" value="<?php echo esc_attr( $options['archive_blog_header_overlay_opacity'] ); ?>" />
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
      <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_blog_headline]" value="<?php echo esc_attr(  $options['archive_blog_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span></label><input name="dp_options[archive_blog_headline_show_icon]" type="checkbox" value="1" <?php checked( $options['archive_blog_headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[archive_blog_headline_direction]" type="checkbox" value="1" <?php checked( $options['archive_blog_headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
       <select name="dp_options[archive_blog_headline_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_blog_headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_headline_font_size]" value="<?php esc_attr_e( $options['archive_blog_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_blog_sub_headline]" value="<?php echo esc_attr(  $options['archive_blog_sub_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_sub_headline_font_size]" value="<?php esc_attr_e( $options['archive_blog_sub_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_sub_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php echo __('Post list setting', 'tcd-w'); ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_title_font_size]" value="<?php esc_attr_e( $options['archive_blog_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_blog_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_title_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Display category', 'tcd-w'); ?></span><input name="dp_options[archive_blog_show_category]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_show_category'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display date', 'tcd-w'); ?></span><input name="dp_options[archive_blog_show_date]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_show_date'] ); ?> /></li>
      <li class="cf">
       <span class="label"><?php _e('Native ads setting', 'tcd-w'); ?></span>
       <p class="displayment_checkbox"><label><input name="dp_options[archive_blog_show_ads]" type="checkbox" value="1" <?php checked( $options['archive_blog_show_ads'], 1 ); ?>> <?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
       <div style="<?php if($options['archive_blog_show_ads'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
        <div class="theme_option_message2">
         <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
        </div>
        <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="dp_options[archive_blog_banner_num]" value="<?php echo esc_attr( $options['archive_blog_banner_num'] ); ?>" /></p>
       </div>
      </li>
     </ul>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 記事ページの設定 -------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <h4 class="theme_option_headline2"><?php _e('Post title setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
       <select name="dp_options[single_blog_title_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_blog_title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_title_font_size]" value="<?php esc_attr_e( $options['single_blog_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_title_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Post content setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_content_font_size]" value="<?php esc_attr_e( $options['single_blog_content_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of content (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_content_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_content_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Display featured image', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_image]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_image'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display category', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_category]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_category'] ); ?> /></li>
      <li class="cf blog_single_show_date"><span class="label"><?php _e('Display date', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_date]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_date'] ); ?> /></li>
      <li class="cf blog_single_show_update"><span class="label"><?php _e('Display modified date', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_update]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_update'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display next previous link', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_nav]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_nav'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display comment', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_comment]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_comment'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display trackbacks', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_trackback'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under featured image', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_sns_top'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under post content', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_sns_btm'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display "COPY Title&amp;URL" button under featured image', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_copy_top]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_copy_top'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display "COPY Title&amp;URL" button under post content', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_copy_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_copy_btm'] ); ?> /></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Side content setting', 'tcd-w');  ?></h4>
     <select name="dp_options[single_blog_sidebar]">
      <?php $i = 1; foreach ( $layout_options as $option ) { if($i == 3 || $i == 4) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_blog_sidebar'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; $i++; }; ?>
     </select>

     <h4 class="theme_option_headline2"><?php _e('Meta box setting', 'tcd-w');  ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[single_blog_show_meta_box]" type="checkbox" value="1" <?php checked( $options['single_blog_show_meta_box'], 1 ); ?>><?php _e( 'Display meta box', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['single_blog_show_meta_box'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Display author', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_meta_author]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_meta_author'] ); ?> /></li>
       <li class="cf"><span class="label"><?php _e('Display category', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_meta_category]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_meta_category'] ); ?> /></li>
       <li class="cf"><span class="label"><?php _e('Display tag', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_meta_tag]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_meta_tag'] ); ?> /></li>
       <li class="cf"><span class="label"><?php _e('Display comment', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_meta_comment]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_meta_comment'] ); ?> /></li>
      </ul>
     </div>

     <h4 class="theme_option_headline2"><?php _e( 'Pagenation settings', 'tcd-w' ); ?></h4>
     <ul class="design_radio_button image_radio_button cf">
      <?php foreach ( $pagenation_type_options as $option ) : ?>
      <li>
       <input type="radio" id="pagenation_type_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[pagenation_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['pagenation_type'] ); ?>>
       <label for="pagenation_type_<?php esc_attr_e( $option['value'] ); ?>">
        <span><?php echo esc_html( $option['label'] ); ?></span>
        <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo esc_attr($option['img']); ?>?ver=1.0.2" alt="" title="" />
       </label>
      </li>
      <?php endforeach; ?>
     </ul>

     <?php // バナーコンテンツ ----------------------------- ?>
     <h4 class="theme_option_headline2"><?php _e('Banner content setting', 'tcd-w');  ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[show_single_blog_banner]" type="checkbox" value="1" <?php checked( $options['show_single_blog_banner'], 1 ); ?>><?php _e( 'Display content banner', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['show_single_blog_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Title', 'tcd-w');  ?></span><input type="text" class="full_width" name="dp_options[single_blog_banner_title]" value="<?php echo esc_attr($options['single_blog_banner_title']); ?>"></li>
       <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_title_font_size]" value="<?php esc_attr_e( $options['single_blog_banner_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_banner_title_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font type of title', 'tcd-w');  ?></span>
        <select name="dp_options[single_blog_banner_title_font_type]">
         <?php foreach ( $font_type_options as $option ) { ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_blog_banner_title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
         <?php } ?>
        </select>
       </li>
       <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input class="c-color-picker" type="text" name="dp_options[single_blog_banner_title_font_color]" value="<?php echo esc_attr( $options['single_blog_banner_title_font_color'] ); ?>" data-default-color="#ffffff"></li>
       <li class="cf"><span class="label"><?php _e('Background color of title', 'tcd-w'); ?></span><input class="c-color-picker" type="text" name="dp_options[single_blog_banner_title_bg_color]" value="<?php echo esc_attr( $options['single_blog_banner_title_bg_color'] ); ?>" data-default-color="#000000"></li>
       <li class="cf"><span class="label"><?php _e('Subtitle', 'tcd-w');  ?></span><input type="text" class="full_width" name="dp_options[single_blog_banner_sub_title]" value="<?php echo esc_attr($options['single_blog_banner_sub_title']); ?>"></li>
       <li class="cf"><span class="label"><?php _e('Font size of subtitle', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_sub_title_font_size]" value="<?php esc_attr_e( $options['single_blog_banner_sub_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of subtitle (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_banner_sub_title_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Description', 'tcd-w');  ?></span><textarea class="full_width" cols="50" rows="3" name="dp_options[single_blog_banner_desc]"><?php echo esc_textarea(  $options['single_blog_banner_desc'] ); ?></textarea></li>
       <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_desc_font_size]" value="<?php esc_attr_e( $options['single_blog_banner_desc_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of description (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_banner_desc_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_banner_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf">
        <span class="label"><?php _e('Background image', 'tcd-w'); ?></span>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js single_blog_banner_image">
          <input type="hidden" value="<?php echo esc_attr( $options['single_blog_banner_image'] ); ?>" id="single_blog_banner_image" name="dp_options[single_blog_banner_image]" class="cf_media_id">
          <div class="preview_field"><?php if($options['single_blog_banner_image']){ echo wp_get_attachment_image($options['single_blog_banner_image'], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_blog_banner_image']){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
       </li>
       <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[single_blog_banner_url]" value="<?php echo esc_attr( $options['single_blog_banner_url'] ); ?>"></li>
       <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[single_blog_banner_target]" type="checkbox" value="1" <?php checked( $options['single_blog_banner_target'], 1 ); ?>></li>
      </ul>
     </div>

     <?php // 関連記事 ----------------------------- ?>
     <h4 class="theme_option_headline2"><?php _e('Related post setting', 'tcd-w');  ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( $options['show_related_post'], 1 ); ?>><?php _e( 'Display related post', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['show_related_post'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><input type="text" class="full_width" name="dp_options[related_post_headline]" value="<?php echo esc_attr($options['related_post_headline']); ?>"></li>
       <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[related_post_headline_font_size]" value="<?php esc_attr_e( $options['related_post_headline_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[related_post_headline_font_size_mobile]" value="<?php esc_attr_e( $options['related_post_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
        <select name="dp_options[related_post_num]">
         <?php for($i=3; $i<= 12; $i++): ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['related_post_num'], $i ); ?>><?php echo esc_html($i); ?></option>
         <?php endfor; ?>
        </select>
       </li>
       <li class="cf"><span class="label"><?php _e('Number of post to display (mobile)', 'tcd-w');  ?></span>
        <select name="dp_options[related_post_num_mobile]">
         <?php for($i=2; $i<= 12; $i++): ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['related_post_num_mobile'], $i ); ?>><?php echo esc_html($i); ?></option>
         <?php endfor; ?>
        </select>
       </li>
       <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[related_post_title_font_size]" value="<?php esc_attr_e( $options['related_post_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[related_post_title_font_size_mobile]" value="<?php esc_attr_e( $options['related_post_title_font_size_mobile'] ); ?>" /><span>px</span></li>
      </ul>
     </div>

     <h4 class="theme_option_headline2"><?php _e('Comment headline setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[comment_headline_font_size]" value="<?php esc_attr_e( $options['comment_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[comment_headline_font_size_mobile]" value="<?php esc_attr_e( $options['comment_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

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

     <?php // メインコンテンツの上部 -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Above main content', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('This banner will be displayed after featured image.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[single_top_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[single_top_ad_code]"><?php echo esc_textarea( $options['single_top_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '700'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_top_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['single_top_ad_image'] ); ?>" id="single_top_ad_image" name="dp_options[single_top_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_top_ad_image']){ echo wp_get_attachment_image($options['single_top_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_top_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_top_ad_url]" class="regular-text" type="text" name="dp_options[single_top_ad_url]" value="<?php esc_attr_e( $options['single_top_ad_url'] ); ?>" />
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <?php // メインコンテンツの下部 -------------------------------- ?>
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Below main content', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('This banner will be displayed before related post.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[single_bottom_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[single_bottom_ad_code]"><?php echo esc_textarea( $options['single_bottom_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '700'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_bottom_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['single_bottom_ad_image'] ); ?>" id="single_bottom_ad_image" name="dp_options[single_bottom_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_bottom_ad_image']){ echo wp_get_attachment_image($options['single_bottom_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_bottom_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_bottom_ad_url]" class="regular-text" type="text" name="dp_options[single_bottom_ad_url]" value="<?php esc_attr_e( $options['single_bottom_ad_url'] ); ?>" />
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
       <p><?php _e('Short code', 'tcd-w');  ?> : <input type="text" readonly="readonly" value="[s_ad]" /></p>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[single_shortcode_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[single_shortcode_ad_code]"><?php echo esc_textarea( $options['single_shortcode_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
        <p><?php printf(__('Maximum image width is %1$spx.', 'tcd-w'), '700'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_shortcode_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['single_shortcode_ad_image'] ); ?>" id="single_shortcode_ad_image" name="dp_options[single_shortcode_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_shortcode_ad_image']){ echo wp_get_attachment_image($options['single_shortcode_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_shortcode_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_shortcode_ad_url]" class="regular-text" type="text" name="dp_options[single_shortcode_ad_url]" value="<?php esc_attr_e( $options['single_shortcode_ad_url'] ); ?>" />
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
        <p><?php _e('This banner will be display above related post and will be repleace by banner for PC device.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <div class="theme_option_message2">
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       </div>
       <textarea id="dp_options[single_mobile_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code]"><?php echo esc_textarea( $options['single_mobile_ad_code'] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <div class="theme_option_message2">
        <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '300', '250'); ?></p>
       </div>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image">
         <input type="hidden" value="<?php echo esc_attr( $options['single_mobile_ad_image'] ); ?>" id="single_mobile_ad_image" name="dp_options[single_mobile_ad_image]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_mobile_ad_image']){ echo wp_get_attachment_image($options['single_mobile_ad_image'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_mobile_ad_image']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_mobile_ad_url]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url]" value="<?php esc_attr_e( $options['single_mobile_ad_url'] ); ?>" />
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
} // END add_blog_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_theme_options_validate( $input ) {

  global $dp_default_options, $pagenation_type_options, $font_type_options, $layout_options, $headline_animation_options;

  // 基本設定
  $input['blog_label'] = wp_filter_nohtml_kses( $input['blog_label'] );


  //ヘッダーの設定
  $input['archive_blog_header_catch'] = wp_filter_nohtml_kses( $input['archive_blog_header_catch'] );
  if ( ! isset( $value['archive_blog_header_catch_font_type'] ) )
    $value['archive_blog_header_catch_font_type'] = null;
  if ( ! array_key_exists( $value['archive_blog_header_catch_font_type'], $font_type_options ) )
    $value['archive_blog_header_catch_font_type'] = null;
  if ( ! isset( $value['archive_blog_header_catch_animation_type'] ) )
    $value['archive_blog_header_catch_animation_type'] = null;
  if ( ! array_key_exists( $value['archive_blog_header_catch_animation_type'], $headline_animation_options ) )
    $value['archive_blog_header_catch_animation_type'] = null;
  $input['archive_blog_header_catch_direction'] = ! empty( $input['archive_blog_header_catch_direction'] ) ? 1 : 0;
  $input['archive_blog_header_catch_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_header_catch_font_size'] );
  $input['archive_blog_header_catch_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_header_catch_font_size_mobile'] );
  $input['archive_blog_header_catch_color'] = wp_filter_nohtml_kses( $input['archive_blog_header_catch_color'] );
  $input['archive_blog_header_bg_image'] = wp_filter_nohtml_kses( $input['archive_blog_header_bg_image'] );
  $input['archive_blog_header_use_overlay'] = ! empty( $input['archive_blog_header_use_overlay'] ) ? 1 : 0;
  $input['archive_blog_header_overlay_color'] = wp_filter_nohtml_kses( $input['archive_blog_header_overlay_color'] );
  $input['archive_blog_header_overlay_opacity'] = wp_filter_nohtml_kses( $input['archive_blog_header_overlay_opacity'] );


  // アーカイブ
  $input['archive_blog_headline'] = wp_filter_nohtml_kses( $input['archive_blog_headline'] );
  $input['archive_blog_headline_show_icon'] = ! empty( $input['archive_blog_headline_show_icon'] ) ? 1 : 0;
  $input['archive_blog_headline_direction'] = ! empty( $input['archive_blog_headline_direction'] ) ? 1 : 0;
  $input['archive_blog_headline_font_type'] = wp_filter_nohtml_kses( $input['archive_blog_headline_font_type'] );
  $input['archive_blog_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_headline_font_size'] );
  $input['archive_blog_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_headline_font_size_mobile'] );
  $input['archive_blog_sub_headline'] = wp_filter_nohtml_kses( $input['archive_blog_sub_headline'] );
  $input['archive_blog_sub_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_sub_headline_font_size'] );
  $input['archive_blog_sub_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_sub_headline_font_size_mobile'] );
  $input['archive_blog_title_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_title_font_size'] );
  $input['archive_blog_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_title_font_size_mobile'] );
  $input['archive_blog_show_date'] = ! empty( $input['archive_blog_show_date'] ) ? 1 : 0;
  $input['archive_blog_show_category'] = ! empty( $input['archive_blog_show_category'] ) ? 1 : 0;
  $input['archive_blog_show_ads'] = ! empty( $input['archive_blog_show_ads'] ) ? 1 : 0;
  $input['archive_blog_banner_num'] = wp_filter_nohtml_kses( $input['archive_blog_banner_num'] );


  // 記事ページ
  $input['single_blog_sidebar'] = wp_filter_nohtml_kses( $input['single_blog_sidebar'] );
  if ( ! isset( $value['single_blog_title_font_type'] ) )
    $value['single_blog_title_font_type'] = null;
  if ( ! array_key_exists( $value['single_blog_title_font_type'], $font_type_options ) )
    $value['single_blog_title_font_type'] = null;
  $input['single_blog_title_font_size'] = wp_filter_nohtml_kses( $input['single_blog_title_font_size'] );
  $input['single_blog_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_title_font_size_mobile'] );
  $input['single_blog_content_font_size'] = wp_filter_nohtml_kses( $input['single_blog_content_font_size'] );
  $input['single_blog_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_content_font_size_mobile'] );
  $input['single_blog_show_image'] = ! empty( $input['single_blog_show_image'] ) ? 1 : 0;
  $input['single_blog_show_date'] = ! empty( $input['single_blog_show_date'] ) ? 1 : 0;
  $input['single_blog_show_update'] = ! empty( $input['single_blog_show_update'] ) ? 1 : 0;
  $input['single_blog_show_category'] = ! empty( $input['single_blog_show_category'] ) ? 1 : 0;
  $input['single_blog_show_comment'] = ! empty( $input['single_blog_show_comment'] ) ? 1 : 0;
  $input['single_blog_show_trackback'] = ! empty( $input['single_blog_show_trackback'] ) ? 1 : 0;
  $input['single_blog_show_nav'] = ! empty( $input['single_blog_show_nav'] ) ? 1 : 0;
  $input['single_blog_show_sns_top'] = ! empty( $input['single_blog_show_sns_top'] ) ? 1 : 0;
  $input['single_blog_show_sns_btm'] = ! empty( $input['single_blog_show_sns_btm'] ) ? 1 : 0;
  $input['single_blog_show_copy_top'] = ! empty( $input['single_blog_show_copy_top'] ) ? 1 : 0;
  $input['single_blog_show_copy_btm'] = ! empty( $input['single_blog_show_copy_btm'] ) ? 1 : 0;
  $input['single_blog_show_meta_box'] = ! empty( $input['single_blog_show_meta_box'] ) ? 1 : 0;
  $input['single_blog_show_meta_category'] = ! empty( $input['single_blog_show_meta_category'] ) ? 1 : 0;
  $input['single_blog_show_meta_comment'] = ! empty( $input['single_blog_show_meta_comment'] ) ? 1 : 0;
  $input['single_blog_show_meta_tag'] = ! empty( $input['single_blog_show_meta_tag'] ) ? 1 : 0;
  $input['single_blog_show_meta_author'] = ! empty( $input['single_blog_show_meta_author'] ) ? 1 : 0;


  // バナーコンテンツ
  $input['show_single_blog_banner'] = ! empty( $input['show_single_blog_banner'] ) ? 1 : 0;
  $input['single_blog_banner_image'] = wp_filter_nohtml_kses( $input['single_blog_banner_image'] );
  $input['single_blog_banner_title'] = wp_filter_nohtml_kses( $input['single_blog_banner_title'] );
  $input['single_blog_banner_sub_title'] = wp_filter_nohtml_kses( $input['single_blog_banner_sub_title'] );
  $input['single_blog_banner_desc'] = wp_filter_nohtml_kses( $input['single_blog_banner_desc'] );
  if ( ! isset( $value['single_blog_banner_title_font_type'] ) )
    $value['single_blog_banner_title_font_type'] = null;
  if ( ! array_key_exists( $value['single_blog_banner_title_font_type'], $font_type_options ) )
    $value['single_blog_banner_title_font_type'] = null;
  $input['single_blog_banner_title_font_color'] = wp_filter_nohtml_kses( $input['single_blog_banner_title_font_color'] );
  $input['single_blog_banner_title_bg_color'] = wp_filter_nohtml_kses( $input['single_blog_banner_title_bg_color'] );
  $input['single_blog_banner_title_font_size'] = wp_filter_nohtml_kses( $input['single_blog_banner_title_font_size'] );
  $input['single_blog_banner_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_banner_title_font_size_mobile'] );
  $input['single_blog_banner_sub_title_font_size'] = wp_filter_nohtml_kses( $input['single_blog_banner_sub_title_font_size'] );
  $input['single_blog_banner_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_banner_sub_title_font_size_mobile'] );
  $input['single_blog_banner_desc_font_size'] = wp_filter_nohtml_kses( $input['single_blog_banner_desc_font_size'] );
  $input['single_blog_banner_desc_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_banner_desc_font_size_mobile'] );
  $input['single_blog_banner_url'] = wp_filter_nohtml_kses( $input['single_blog_banner_url'] );
  $input['single_blog_banner_target'] = ! empty( $input['single_blog_banner_target'] ) ? 1 : 0;


  // 関連記事
  $input['show_related_post'] = ! empty( $input['show_related_post'] ) ? 1 : 0;
  $input['related_post_headline'] = wp_filter_nohtml_kses( $input['related_post_headline'] );
  $input['related_post_headline_font_size'] = wp_filter_nohtml_kses( $input['related_post_headline_font_size'] );
  $input['related_post_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['related_post_headline_font_size_mobile'] );
  $input['related_post_num'] = wp_filter_nohtml_kses( $input['related_post_num'] );
  $input['related_post_num_mobile'] = wp_filter_nohtml_kses( $input['related_post_num_mobile'] );
  $input['related_post_title_font_size'] = wp_filter_nohtml_kses( $input['related_post_title_font_size'] );
  $input['related_post_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['related_post_title_font_size_mobile'] );


  // コメントの見出し
  $input['comment_headline_font_size'] = wp_filter_nohtml_kses( $input['comment_headline_font_size'] );
  $input['comment_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['comment_headline_font_size_mobile'] );


  // 記事ページ　その他
  if ( ! isset( $input['pagenation_type'] ) ) $input['pagenation_type'] = null;
  if ( ! array_key_exists( $input['pagenation_type'], $pagenation_type_options ) ) $input['pagenation_type'] = null;

  // 記事ページのバナー広告
  $input['single_top_ad_code'] = $input['single_top_ad_code'];
  $input['single_top_ad_image'] = wp_filter_nohtml_kses( $input['single_top_ad_image'] );
  $input['single_top_ad_url'] = wp_filter_nohtml_kses( $input['single_top_ad_url'] );

  $input['single_bottom_ad_code'] = $input['single_bottom_ad_code'];
  $input['single_bottom_ad_image'] = wp_filter_nohtml_kses( $input['single_bottom_ad_image'] );
  $input['single_bottom_ad_url'] = wp_filter_nohtml_kses( $input['single_bottom_ad_url'] );

  $input['single_shortcode_ad_code'] = $input['single_shortcode_ad_code'];
  $input['single_shortcode_ad_image'] = wp_filter_nohtml_kses( $input['single_shortcode_ad_image'] );
  $input['single_shortcode_ad_url'] = wp_filter_nohtml_kses( $input['single_shortcode_ad_url'] );

  $input['single_mobile_ad_code'] = $input['single_mobile_ad_code'];
  $input['single_mobile_ad_image'] = wp_filter_nohtml_kses( $input['single_mobile_ad_image'] );
  $input['single_mobile_ad_url'] = wp_filter_nohtml_kses( $input['single_mobile_ad_url'] );

	return $input;

};


?>