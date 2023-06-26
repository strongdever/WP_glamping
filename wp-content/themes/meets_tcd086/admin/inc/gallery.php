<?php
/*
 * ギャラリーの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_gallery_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_gallery_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_gallery_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_gallery_theme_options_validate' );


// タブの名前
function add_gallery_tab_label( $tab_labels ) {
  $options = get_design_plus_option();
  $tab_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $tab_labels['gallery'] = $tab_label;
  return $tab_labels;
}


// 初期値
function add_gallery_dp_default_options( $dp_default_options ) {

	// 基本設定
	$dp_default_options['gallery_label'] = __( 'Gallery', 'tcd-w' );
	$dp_default_options['gallery_slug'] = 'gallery';
	$dp_default_options['gallery_category_label'] = __( 'Gallery category', 'tcd-w' );
	$dp_default_options['gallery_category_slug'] = 'gallery_category';

	// ヘッダー
	$dp_default_options['archive_gallery_header_catch'] = __( 'Catchphrase', 'tcd-w' );
	$dp_default_options['archive_gallery_header_catch_direction'] = '';
	$dp_default_options['archive_gallery_header_catch_font_type'] = 'type3';
	$dp_default_options['archive_gallery_header_catch_animation_type'] = 'type1';
	$dp_default_options['archive_gallery_header_catch_font_size'] = '30';
	$dp_default_options['archive_gallery_header_catch_font_size_mobile'] = '20';
	$dp_default_options['archive_gallery_header_catch_color'] = '#FFFFFF';
	$dp_default_options['archive_gallery_header_bg_image'] = false;
	$dp_default_options['archive_gallery_header_use_overlay'] = 1;
	$dp_default_options['archive_gallery_header_overlay_color'] = '#000000';
	$dp_default_options['archive_gallery_header_overlay_opacity'] = '0.3';

	// アーカイブページ
	$dp_default_options['archive_gallery_headline_show_icon'] = '';
	$dp_default_options['archive_gallery_headline_direction'] = '';
	$dp_default_options['archive_gallery_headline_font_type'] = 'type3';
	$dp_default_options['archive_gallery_headline_font_size'] = '84';
	$dp_default_options['archive_gallery_headline_font_size_mobile'] = '50';
	$dp_default_options['archive_gallery_sub_headline_font_size'] = '16';
	$dp_default_options['archive_gallery_sub_headline_font_size_mobile'] = '14';

	$dp_default_options['archive_gallery_desc'] = '';
	$dp_default_options['archive_gallery_desc_font_size'] = '16';
	$dp_default_options['archive_gallery_desc_font_size_mobile'] = '14';

	$dp_default_options['archive_gallery_list_headline'] = __( 'Gallery', 'tcd-w' );
	$dp_default_options['archive_gallery_list_headline_show_icon'] = '';
	$dp_default_options['archive_gallery_list_headline_direction'] = '';
	$dp_default_options['archive_gallery_list_headline_font_type'] = 'type3';
	$dp_default_options['archive_gallery_list_headline_font_size'] = '28';
	$dp_default_options['archive_gallery_list_headline_font_size_mobile'] = '22';
	$dp_default_options['archive_gallery_list_sub_headline'] = '';
	$dp_default_options['archive_gallery_list_sub_headline_font_size'] = '14';
	$dp_default_options['archive_gallery_list_sub_headline_font_size_mobile'] = '12';
	$dp_default_options['archive_gallery_list_title_font_size'] = '18';
	$dp_default_options['archive_gallery_list_title_font_size_mobile'] = '14';
	$dp_default_options['archive_gallery_list_post_num'] = '8';
	$dp_default_options['archive_gallery_list_post_num_mobile'] = '4';

	$dp_default_options['archive_gallery_list_show_category'] = '';
	$dp_default_options['archive_gallery_list_category_direction'] = '';
	$dp_default_options['archive_gallery_list_category_font_type'] = 'type3';
	$dp_default_options['archive_gallery_list_category_font_size'] = '30';
	$dp_default_options['archive_gallery_list_category_font_size_mobile'] = '20';
	$dp_default_options['archive_gallery_list_font_color'] = '#ffffff';

	$dp_default_options['archive_gallery_show_category_sort_button'] = 1;
	$dp_default_options['archive_gallery_show_category_sort_button_icon'] = '';
	$dp_default_options['archive_gallery_category_sort_button_all_label'] = __( 'ALL', 'tcd-w' );
	$dp_default_options['archive_gallery_animation_type'] = 'type1';
	$dp_default_options['archive_gallery_load_button_label'] = __( 'LOAD MORE', 'tcd-w' );
	$dp_default_options['archive_gallery_show_load_button_icon'] = '';
	$dp_default_options['archive_gallery_category_sort_button_font_size'] = '18';
	$dp_default_options['archive_gallery_category_sort_button_font_size_mobile'] = '16';
	$dp_default_options['archive_gallery_category_load_button_font_size'] = '16';
	$dp_default_options['archive_gallery_category_load_button_font_size_mobile'] = '14';

	$dp_default_options['show_archive_gallery_category_list'] = 1;
	$dp_default_options['archive_gallery_category_list_title_show_icon'] = '';
	$dp_default_options['archive_gallery_category_list_title_direction'] = '';
	$dp_default_options['archive_gallery_category_list_title_font_type'] = 'type3';
	$dp_default_options['archive_gallery_category_list_title_font_color'] = '#ffffff';
	$dp_default_options['archive_gallery_category_list_title_font_size'] = '48';
	$dp_default_options['archive_gallery_category_list_title_font_size_mobile'] = '32';
	$dp_default_options['archive_gallery_category_list_sub_title_font_size'] = '16';
	$dp_default_options['archive_gallery_category_list_sub_title_font_size_mobile'] = '14';
	$dp_default_options['archive_gallery_category_list_desc_font_size'] = '16';
	$dp_default_options['archive_gallery_category_list_desc_font_size_mobile'] = '14';

	// 詳細ページ
	$dp_default_options['single_gallery_title_font_size'] = '26';
	$dp_default_options['single_gallery_title_font_size_mobile'] = '20';
	$dp_default_options['single_gallery_title_font_type'] = 'type2';
	$dp_default_options['single_gallery_content_font_size'] = '16';
	$dp_default_options['single_gallery_content_font_size_mobile'] = '14';

	$dp_default_options['single_gallery_close_label'] = 'ARCHIVE';
	$dp_default_options['signle_gallery_close_button_show_icon'] = '1';
	$dp_default_options['single_gallery_show_nav'] = 1;
	$dp_default_options['single_gallery_show_header'] = 1;

	$dp_default_options['single_gallery_headline_direction'] = '';
	$dp_default_options['single_gallery_headline_font_type'] = 'type3';
	$dp_default_options['single_gallery_headline_font_size'] = '28';
	$dp_default_options['single_gallery_headline_font_size_mobile'] = '20';
	$dp_default_options['single_gallery_sub_headline_font_size'] = '14';
	$dp_default_options['single_gallery_sub_headline_font_size_mobile'] = '12';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_gallery_tab_panel( $options ) {

  global $dp_default_options, $no_image_options, $font_type_options, $headline_animation_options;
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );

?>

<div id="tab-content-gallery" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Name of content', 'tcd-w');  ?></h4>
     <input class="regular-text" type="text" name="dp_options[gallery_label]" value="<?php echo esc_attr( $options['gallery_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Slug setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input class="hankaku regular-text" type="text" name="dp_options[gallery_slug]" value="<?php echo sanitize_title( $options['gallery_slug'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php printf(__('Name of %s category', 'tcd-w'), $gallery_label); ?></h4>
     <input class="regular-text" type="text" name="dp_options[gallery_category_label]" value="<?php echo esc_attr( $options['gallery_category_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php printf(__('%s category slug setting', 'tcd-w'), $gallery_label); ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input class="hankaku regular-text" type="text" name="dp_options[gallery_category_slug]" value="<?php echo sanitize_title( $options['gallery_category_slug'] ); ?>" /></p>
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
     <textarea class="full_width" cols="50" rows="3" name="dp_options[archive_gallery_header_catch]"><?php echo esc_textarea(  $options['archive_gallery_header_catch'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_header_catch_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_header_catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_header_catch_direction]" type="checkbox" value="1" <?php checked( $options['archive_gallery_header_catch_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Animation type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_header_catch_animation_type]">
        <?php foreach ( $headline_animation_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_header_catch_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_header_catch_font_size]" value="<?php esc_attr_e( $options['archive_gallery_header_catch_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_header_catch_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_header_catch_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_gallery_header_catch_color]" value="<?php echo esc_attr( $options['archive_gallery_header_catch_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Background image', 'tcd-w'); ?></h4>
     <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_gallery_header_bg_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_gallery_header_bg_image'] ); ?>" id="archive_gallery_header_bg_image" name="dp_options[archive_gallery_header_bg_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_gallery_header_bg_image']){ echo wp_get_attachment_image($options['archive_gallery_header_bg_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_gallery_header_bg_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[archive_gallery_header_use_overlay]" type="checkbox" value="1" <?php checked( $options['archive_gallery_header_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
     <div style="<?php if($options['archive_gallery_header_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
       <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_gallery_header_overlay_color]" value="<?php echo esc_attr( $options['archive_gallery_header_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
       <li class="cf">
        <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[archive_gallery_header_overlay_opacity]" value="<?php echo esc_attr( $options['archive_gallery_header_overlay_opacity'] ); ?>" />
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

     <?php // 見出し ------------------------ ?>
     <h4 class="theme_option_headline2"><?php _e('Headline setting for category page', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Icon setting', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_headline_show_icon]" type="checkbox" value="1" <?php checked( $options['archive_gallery_headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_headline_direction]" type="checkbox" value="1" <?php checked( $options['archive_gallery_headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_headline_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_headline_font_size]" value="<?php esc_attr_e( $options['archive_gallery_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subtitle', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_sub_headline_font_size]" value="<?php esc_attr_e( $options['archive_gallery_sub_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subtitle (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_sub_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <?php // 説明文 ------------------------ ?>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea class="full_width" cols="50" rows="5" name="dp_options[archive_gallery_desc]"><?php echo esc_textarea(  $options['archive_gallery_desc'] ); ?></textarea>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_desc_font_size]" value="<?php esc_attr_e( $options['archive_gallery_desc_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of description (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_desc_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <?php // ギャラリー一覧 ------------------------ ?>
     <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $gallery_label); ?></h4>
     <div class="theme_option_message2">
      <p><?php printf(__('Headline and subheadline of category page can be set in <a href="./edit-tags.php?taxonomy=gallery_category&post_type=gallery" target="_blank">%s edit page</a>.', 'tcd-w'), $gallery_category_label); ?></p>
      <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_gallery_list_headline]" value="<?php echo esc_attr(  $options['archive_gallery_list_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Icon of headline', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_list_headline_show_icon]" type="checkbox" value="1" <?php checked( $options['archive_gallery_list_headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font direction of headline', 'tcd-w'); ?></span><label><input name="dp_options[archive_gallery_list_headline_direction]" type="checkbox" value="1" <?php checked( $options['archive_gallery_list_headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></label></li>
      <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_list_headline_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_list_headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_headline_font_size]" value="<?php esc_attr_e( $options['archive_gallery_list_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_list_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_gallery_list_sub_headline]" value="<?php echo esc_attr(  $options['archive_gallery_list_sub_headline'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_sub_headline_font_size]" value="<?php esc_attr_e( $options['archive_gallery_list_sub_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_sub_headline_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_list_sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf">
       <span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_list_post_num]">
        <?php for($i=4; $i<= 16; $i++): if( ($i % 4) == 0 ){ ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['archive_gallery_list_post_num'], $i ); ?>><?php echo esc_html($i); ?></option>
        <?php }; endfor; ?>
       </select>
      </li>
      <li class="cf">
       <span class="label"><?php _e('Number of post to display (mobile)', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_list_post_num_mobile]">
        <?php for($i=4; $i<= 20; $i++): if( ($i % 4) == 0 ){ ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $options['archive_gallery_list_post_num_mobile'], $i ); ?>><?php echo esc_html($i); ?></option>
        <?php }; endfor; ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Display category', 'tcd-w'); ?></span><label><input class="display_option" data-option-name="archive_gallery_list_show_category" name="dp_options[archive_gallery_list_show_category]" type="checkbox" value="1" <?php checked( $options['archive_gallery_list_show_category'], 1 ); ?>><?php _e( 'Display category', 'tcd-w' ); ?></label></li>
      <li class="cf archive_gallery_list_show_category"><span class="label"><?php _e('Font direction of category', 'tcd-w'); ?></span><label><input name="dp_options[archive_gallery_list_category_direction]" type="checkbox" value="1" <?php checked( $options['archive_gallery_list_category_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></label></li>
      <li class="cf archive_gallery_list_show_category"><span class="label"><?php _e('Font type of category', 'tcd-w');  ?></span>
       <select name="dp_options[archive_gallery_list_category_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_list_category_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf archive_gallery_list_show_category"><span class="label"><?php _e('Font size category', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_category_font_size]" value="<?php esc_attr_e( $options['archive_gallery_list_category_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf archive_gallery_list_show_category"><span class="label"><?php _e('Font size category (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_category_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_list_category_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_title_font_size]" value="<?php esc_attr_e( $options['archive_gallery_list_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of description (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_list_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_list_title_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_gallery_list_font_color]" value="<?php echo esc_attr( $options['archive_gallery_list_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     </ul>

     <?php // カテゴリーソートボタン ------------------------ ?>
     <h4 class="theme_option_headline2"><?php echo __('Category sort button and AJAX load setting', 'tcd-w'); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[archive_gallery_show_category_sort_button]" type="checkbox" value="1" <?php checked( $options['archive_gallery_show_category_sort_button'], 1 ); ?>><?php echo __('Display category sort button', 'tcd-w'); ?></label></p>
     <div style="<?php if($options['archive_gallery_show_category_sort_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <div class="theme_option_message2">
       <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
      </div>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Icon of category sort button', 'tcd-w'); ?></span><label><input name="dp_options[archive_gallery_show_category_sort_button_icon]" type="checkbox" value="1" <?php checked( $options['archive_gallery_show_category_sort_button_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
       <li class="cf"><span class="label"><?php _e('Label of all button', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_gallery_category_sort_button_all_label]" value="<?php echo esc_attr(  $options['archive_gallery_category_sort_button_all_label'] ); ?>" /></li>
       <li class="cf"><span class="label"><?php _e('Font size of sort button', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_sort_button_font_size]" value="<?php esc_attr_e( $options['archive_gallery_category_sort_button_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of sort button (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_sort_button_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_category_sort_button_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Icon of load button', 'tcd-w'); ?></span><label><input name="dp_options[archive_gallery_show_load_button_icon]" type="checkbox" value="1" <?php checked( $options['archive_gallery_show_load_button_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
       <li class="cf"><span class="label"><?php _e('Label of load button', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[archive_gallery_load_button_label]" value="<?php echo esc_attr(  $options['archive_gallery_load_button_label'] ); ?>" /></li>
       <li class="cf"><span class="label"><?php _e('Font size of load button', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_load_button_font_size]" value="<?php esc_attr_e( $options['archive_gallery_category_load_button_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of load button (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_load_button_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_category_load_button_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Animation of post', 'tcd-w');  ?></span>
        <select name="dp_options[archive_gallery_animation_type]">
         <option style="padding-right: 10px;" value="type1" <?php selected( $options['archive_gallery_animation_type'], 'type1' ); ?>><?php _e('Fade in', 'tcd-w');  ?></option>
         <option style="padding-right: 10px;" value="type2" <?php selected( $options['archive_gallery_animation_type'], 'type2' ); ?>><?php _e('Slide up', 'tcd-w');  ?></option>
         <option style="padding-right: 10px;" value="type3" <?php selected( $options['archive_gallery_animation_type'], 'type3' ); ?>><?php _e('Pop up', 'tcd-w');  ?></option>
        </select>
       </li>
      </ul>
     </div>

     <?php // カテゴリー一覧 ------------------------ ?>
     <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $gallery_category_label); ?></h4>
     <p class="displayment_checkbox"><label><input name="dp_options[show_archive_gallery_category_list]" type="checkbox" value="1" <?php checked( $options['show_archive_gallery_category_list'], 1 ); ?>><?php printf(__('Display %s list', 'tcd-w'), $gallery_category_label); ?></label></p>
     <div style="<?php if($options['show_archive_gallery_category_list'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <div class="theme_option_message2">
       <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
      </div>
      <ul class="option_list">
       <li class="cf"><span class="label"><?php _e('Icon of title', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_category_list_title_show_icon]" type="checkbox" value="1" <?php checked( $options['archive_gallery_category_list_title_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
       <li class="cf"><span class="label"><?php _e('Font direction of title', 'tcd-w'); ?></span><input name="dp_options[archive_gallery_category_list_title_direction]" type="checkbox" value="1" <?php checked( $options['archive_gallery_category_list_title_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
       <li class="cf"><span class="label"><?php _e('Font type of title', 'tcd-w');  ?></span>
        <select name="dp_options[archive_gallery_category_list_title_font_type]">
         <?php foreach ( $font_type_options as $option ) { ?>
         <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['archive_gallery_category_list_title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
         <?php } ?>
        </select>
       </li>
       <li class="cf"><span class="label"><?php _e('Font color of title', 'tcd-w'); ?></span><input type="text" name="dp_options[archive_gallery_category_list_title_font_color]" value="<?php echo esc_attr( $options['archive_gallery_category_list_title_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
       <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_title_font_size]" value="<?php esc_attr_e( $options['archive_gallery_category_list_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_category_list_title_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_sub_title_font_size]" value="<?php esc_attr_e( $options['archive_gallery_category_list_sub_title_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_category_list_sub_title_font_size_mobile'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_desc_font_size]" value="<?php esc_attr_e( $options['archive_gallery_category_list_desc_font_size'] ); ?>" /><span>px</span></li>
       <li class="cf"><span class="label"><?php _e('Font size of description (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[archive_gallery_category_list_desc_font_size_mobile]" value="<?php esc_attr_e( $options['archive_gallery_category_list_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
      </ul>
     </div>

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
       <select name="dp_options[single_gallery_title_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_gallery_title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_title_font_size]" value="<?php esc_attr_e( $options['single_gallery_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of title (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_gallery_title_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Post content setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_content_font_size]" value="<?php esc_attr_e( $options['single_gallery_content_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of content (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_content_font_size_mobile]" value="<?php esc_attr_e( $options['single_gallery_content_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php printf(__('Headline can be set in <a href="./edit-tags.php?taxonomy=gallery_category&post_type=gallery" target="_blank">%s edit page</a>.', 'tcd-w'), $gallery_category_label); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font direction of headline', 'tcd-w'); ?></span><input name="dp_options[single_gallery_headline_direction]" type="checkbox" value="1" <?php checked( $options['single_gallery_headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
      <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
       <select name="dp_options[single_gallery_headline_font_type]">
        <?php foreach ( $font_type_options as $option ) { ?>
        <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $options['single_gallery_headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
        <?php } ?>
       </select>
      </li>
      <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_headline_font_size]" value="<?php esc_attr_e( $options['single_gallery_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_headline_font_size_mobile]" value="<?php esc_attr_e( $options['single_gallery_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subtitle', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_sub_headline_font_size]" value="<?php esc_attr_e( $options['single_gallery_sub_headline_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of subtitle (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_gallery_sub_headline_font_size_mobile]" value="<?php esc_attr_e( $options['single_gallery_sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
     </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Label of archive button', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[single_gallery_close_label]" value="<?php echo esc_attr(  $options['single_gallery_close_label'] ); ?>" /></li>
      <li class="cf"><span class="label"><?php _e('Display icon on archive button', 'tcd-w');  ?></span><input name="dp_options[signle_gallery_close_button_show_icon]" type="checkbox" value="1" <?php checked( '1', $options['signle_gallery_close_button_show_icon'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display next previous link', 'tcd-w');  ?></span><input name="dp_options[single_gallery_show_nav]" type="checkbox" value="1" <?php checked( '1', $options['single_gallery_show_nav'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display header', 'tcd-w');  ?></span><input name="dp_options[single_gallery_show_header]" type="checkbox" value="1" <?php checked( '1', $options['single_gallery_show_header'] ); ?> /></li>
     </ul>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

</div><!-- END .tab-content -->

<?php
} // END add_gallery_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_gallery_theme_options_validate( $input ) {

  global $dp_default_options, $no_image_options, $font_type_options, $headline_animation_options;

  //基本設定
  $input['gallery_slug'] = sanitize_title( $input['gallery_slug'] );
  $input['gallery_label'] = wp_filter_nohtml_kses( $input['gallery_label'] );
  $input['gallery_category_label'] = wp_filter_nohtml_kses( $input['gallery_category_label'] );
  $input['gallery_category_slug'] = sanitize_title( $input['gallery_category_slug'] );


  //ヘッダーの設定
  $input['archive_gallery_header_catch'] = wp_filter_nohtml_kses( $input['archive_gallery_header_catch'] );
  if ( ! isset( $value['archive_gallery_header_catch_font_type'] ) )
    $value['archive_gallery_header_catch_font_type'] = null;
  if ( ! array_key_exists( $value['archive_gallery_header_catch_font_type'], $font_type_options ) )
    $value['archive_gallery_header_catch_font_type'] = null;
  if ( ! isset( $value['archive_gallery_header_catch_animation_type'] ) )
    $value['archive_gallery_header_catch_animation_type'] = null;
  if ( ! array_key_exists( $value['archive_gallery_header_catch_animation_type'], $headline_animation_options ) )
    $value['archive_gallery_header_catch_animation_type'] = null;
  $input['archive_gallery_header_catch_direction'] = ! empty( $input['archive_gallery_header_catch_direction'] ) ? 1 : 0;
  $input['archive_gallery_header_catch_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_header_catch_font_size'] );
  $input['archive_gallery_header_catch_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_header_catch_font_size_mobile'] );
  $input['archive_gallery_header_catch_color'] = wp_filter_nohtml_kses( $input['archive_gallery_header_catch_color'] );
  $input['archive_gallery_header_bg_image'] = wp_filter_nohtml_kses( $input['archive_gallery_header_bg_image'] );
  $input['archive_gallery_header_use_overlay'] = ! empty( $input['archive_gallery_header_use_overlay'] ) ? 1 : 0;
  $input['archive_gallery_header_overlay_color'] = wp_filter_nohtml_kses( $input['archive_gallery_header_overlay_color'] );
  $input['archive_gallery_header_overlay_opacity'] = wp_filter_nohtml_kses( $input['archive_gallery_header_overlay_opacity'] );


  // アーカイブ
  $input['archive_gallery_headline_show_icon'] = ! empty( $input['archive_gallery_headline_show_icon'] ) ? 1 : 0;
  $input['archive_gallery_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_headline_font_size'] );
  $input['archive_gallery_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_headline_font_size_mobile'] );
  $input['archive_gallery_sub_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_sub_headline_font_size'] );
  $input['archive_gallery_sub_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_sub_headline_font_size_mobile'] );
  $input['archive_gallery_headline_direction'] = ! empty( $input['archive_gallery_headline_direction'] ) ? 1 : 0;
  $input['archive_gallery_desc'] = wp_filter_nohtml_kses( $input['archive_gallery_desc'] );
  $input['archive_gallery_desc_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_desc_font_size'] );
  $input['archive_gallery_desc_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_desc_font_size_mobile'] );

  // ギャラリー一覧
  $input['archive_gallery_list_headline'] = wp_filter_nohtml_kses( $input['archive_gallery_list_headline'] );
  $input['archive_gallery_list_headline_show_icon'] = ! empty( $input['archive_gallery_list_headline_show_icon'] ) ? 1 : 0;
  $input['archive_gallery_list_headline_direction'] = ! empty( $input['archive_gallery_list_headline_direction'] ) ? 1 : 0;
  $input['archive_gallery_list_headline_font_type'] = wp_filter_nohtml_kses( $input['archive_gallery_list_headline_font_type'] );
  $input['archive_gallery_list_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_list_headline_font_size'] );
  $input['archive_gallery_list_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_list_headline_font_size_mobile'] );
  $input['archive_gallery_list_sub_headline'] = wp_filter_nohtml_kses( $input['archive_gallery_list_sub_headline'] );
  $input['archive_gallery_list_sub_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_list_sub_headline_font_size'] );
  $input['archive_gallery_list_sub_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_list_sub_headline_font_size_mobile'] );
  $input['archive_gallery_list_title_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_list_title_font_size'] );
  $input['archive_gallery_list_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_list_title_font_size_mobile'] );
  $input['archive_gallery_list_show_category'] = ! empty( $input['archive_gallery_list_show_category'] ) ? 1 : 0;
  $input['archive_gallery_list_category_direction'] = ! empty( $input['archive_gallery_list_category_direction'] ) ? 1 : 0;
  $input['archive_gallery_list_category_font_type'] = wp_filter_nohtml_kses( $input['archive_gallery_list_category_font_type'] );
  $input['archive_gallery_list_category_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_list_category_font_size'] );
  $input['archive_gallery_list_category_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_list_category_font_size_mobile'] );
  $input['archive_gallery_list_font_color'] = wp_filter_nohtml_kses( $input['archive_gallery_list_font_color'] );

  $input['archive_gallery_list_post_num'] = wp_filter_nohtml_kses( $input['archive_gallery_list_post_num'] );
  $input['archive_gallery_list_post_num_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_list_post_num_mobile'] );

  $input['archive_gallery_show_category_sort_button'] = ! empty( $input['archive_gallery_show_category_sort_button'] ) ? 1 : 0;
  $input['archive_gallery_show_category_sort_button_icon'] = ! empty( $input['archive_gallery_show_category_sort_button_icon'] ) ? 1 : 0;
  $input['archive_gallery_category_sort_button_all_label'] = wp_filter_nohtml_kses( $input['archive_gallery_category_sort_button_all_label'] );
  $input['archive_gallery_show_load_button_icon'] = ! empty( $input['archive_gallery_show_load_button_icon'] ) ? 1 : 0;
  $input['archive_gallery_animation_type'] = wp_filter_nohtml_kses( $input['archive_gallery_animation_type'] );
  $input['archive_gallery_load_button_label'] = wp_filter_nohtml_kses( $input['archive_gallery_load_button_label'] );
  $input['archive_gallery_category_sort_button_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_category_sort_button_font_size'] );
  $input['archive_gallery_category_sort_button_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_category_sort_button_font_size_mobile'] );
  $input['archive_gallery_category_load_button_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_category_load_button_font_size'] );
  $input['archive_gallery_category_load_button_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_category_load_button_font_size_mobile'] );


  // ギャラリーカテゴリー一覧
  $input['show_archive_gallery_category_list'] = ! empty( $input['show_archive_gallery_category_list'] ) ? 1 : 0;
  $input['archive_gallery_category_list_title_show_icon'] = ! empty( $input['archive_gallery_category_list_title_show_icon'] ) ? 1 : 0;
  $input['archive_gallery_category_list_title_direction'] = ! empty( $input['archive_gallery_category_list_title_direction'] ) ? 1 : 0;
  $input['archive_gallery_category_list_title_font_type'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_title_font_type'] );
  $input['archive_gallery_category_list_title_font_color'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_title_font_color'] );
  $input['archive_gallery_category_list_title_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_title_font_size'] );
  $input['archive_gallery_category_list_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_title_font_size_mobile'] );
  $input['archive_gallery_category_list_sub_title_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_sub_title_font_size'] );
  $input['archive_gallery_category_list_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_sub_title_font_size_mobile'] );
  $input['archive_gallery_category_list_desc_font_size'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_desc_font_size'] );
  $input['archive_gallery_category_list_desc_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_gallery_category_list_desc_font_size_mobile'] );

  //詳細ページ
  $input['single_gallery_title_font_type'] = wp_filter_nohtml_kses( $input['single_gallery_title_font_type'] );
  $input['single_gallery_title_font_size'] = wp_filter_nohtml_kses( $input['single_gallery_title_font_size'] );
  $input['single_gallery_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_gallery_title_font_size_mobile'] );
  $input['single_gallery_content_font_size'] = wp_filter_nohtml_kses( $input['single_gallery_content_font_size'] );
  $input['single_gallery_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_gallery_content_font_size_mobile'] );

  $input['single_gallery_headline_show_icon'] = ! empty( $input['single_gallery_headline_show_icon'] ) ? 1 : 0;
  $input['single_gallery_headline_direction'] = ! empty( $input['single_gallery_headline_direction'] ) ? 1 : 0;
  $input['single_gallery_headline_font_type'] = wp_filter_nohtml_kses( $input['single_gallery_headline_font_type'] );
  $input['single_gallery_headline_font_size'] = wp_filter_nohtml_kses( $input['single_gallery_headline_font_size'] );
  $input['single_gallery_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_gallery_headline_font_size_mobile'] );
  $input['single_gallery_sub_headline_font_size'] = wp_filter_nohtml_kses( $input['single_gallery_sub_headline_font_size'] );
  $input['single_gallery_sub_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_gallery_sub_headline_font_size_mobile'] );

  $input['single_gallery_close_label'] = wp_filter_nohtml_kses( $input['single_gallery_close_label'] );
  $input['signle_gallery_close_button_show_icon'] = ! empty( $input['signle_gallery_close_button_show_icon'] ) ? 1 : 0;
  $input['single_gallery_show_nav'] = ! empty( $input['single_gallery_show_nav'] ) ? 1 : 0;
  $input['single_gallery_show_header'] = ! empty( $input['single_gallery_show_header'] ) ? 1 : 0;

	return $input;

};


?>