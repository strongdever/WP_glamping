<?php
/*
 * トップページの設定（モバイル用）
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_front_page_mobile_dp_default_options' );


// Add label of front page tab
add_action( 'tcd_tab_labels', 'add_front_page_mobile_tab_label' );


// Add HTML of front page tab
add_action( 'tcd_tab_panel', 'add_front_page_mobile_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_front_page_mobile_theme_options_validate' );


// タブの名前
function add_front_page_mobile_tab_label( $tab_labels ) {
	$tab_labels['front_page_mobile'] = __( 'Front page (smartphone)', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_front_page_mobile_dp_default_options( $dp_default_options ) {

	// ヘッダースライダー
	$dp_default_options['mobile_show_index_slider'] = 'type2';
	$dp_default_options['mobile_index_slider_time'] = '7000';
	$dp_default_options['mobile_index_slider'] = array();
	$dp_default_options['mobile_stop_index_slider_animation'] = '';

	// ロゴの設定
	$dp_default_options['mobile_show_index_logo'] = '';

  // 矢印のメッセージ
	$dp_default_options['mobile_index_slider_message'] = __( 'MORE', 'tcd-w' );
	$dp_default_options['mobile_index_slider_message_font_size'] = '16';

  // コンテンツビルダー
	$dp_default_options['mobile_index_content_type'] = 'type1';
	$dp_default_options['mobile_contents_builder'] = array();

	return $dp_default_options;

}

// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_front_page_mobile_tab_panel( $options ) {

  global $dp_default_options, $item_type_options, $time_options, $font_type_options, $slider_animation_options, $layout_options, $logo_type_options, $layer_image_animation_options;

  $blog_label = $options['blog_label'] ? esc_html( $options['blog_label'] ) : __( 'Blog', 'tcd-w' );
  $news_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );
  $featured_label = $options['featured_label'] ? esc_html( $options['featured_label'] ) : __( 'Featured', 'tcd-w' );
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );

?>

<div id="tab-content-front-page-mobile" class="tab-content">

   <?php // ヘッダーコンテンツの設定 ---------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header content setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <ul class="design_radio_button">
      <li id="mobile_show_index_slider_type1_button">
       <input type="radio" id="mobile_show_index_slider_type1" name="dp_options[mobile_show_index_slider]" value="type1" <?php checked( $options['mobile_show_index_slider'], 'type1' ); ?> />
       <label for="mobile_show_index_slider_type1"><?php _e('Display same header content in smartphone', 'tcd-w');  ?></label>
      </li>
      <li id="mobile_show_index_slider_type2_button">
       <input type="radio" id="mobile_show_index_slider_type2" name="dp_options[mobile_show_index_slider]" value="type2" <?php checked( $options['mobile_show_index_slider'], 'type2' ); ?> />
       <label for="mobile_show_index_slider_type2"><?php _e('Display different header content in smartphone', 'tcd-w');  ?></label>
      </li>
      <li id="mobile_show_index_slider_type3_button">
       <input type="radio" id="mobile_show_index_slider_type3" name="dp_options[mobile_show_index_slider]" value="type3" <?php checked( $options['mobile_show_index_slider'], 'type3' ); ?> />
       <label for="mobile_show_index_slider_type3"><?php _e('Don\'t display header content in smartphone', 'tcd-w');  ?></label>
      </li>
     </ul>

     <div id="index_slider_input_area" style="<?php if($options['mobile_show_index_slider'] == 'type2'){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>">

     <h4 class="theme_option_headline2"><?php _e('Header logo', 'tcd-w');  ?></h4>
     <p><label><input name="dp_options[mobile_show_index_logo]" type="checkbox" value="1" <?php checked( $options['mobile_show_index_logo'], 1 ); ?>><?php _e( 'Display logo', 'tcd-w' ); ?></label></p>
     <div class="theme_option_message2">
      <p><?php _e('Please register logo image from Logo option section.', 'tcd-w'); ?></p>
     </div>

     <h4 class="theme_option_headline2"><?php _e('Slider setting', 'tcd-w');  ?></h4>

     <?php //繰り返しフィールド ----- ?>
     <div class="repeater-wrapper">
      <input type="hidden" name="dp_options[mobile_index_slider]" value="">
      <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
       <?php
            if ( $options['mobile_index_slider'] ) :
              foreach ( $options['mobile_index_slider'] as $key => $value ) :
       ?>
       <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
        <h4 class="theme_option_subbox_headline"><?php _e( 'Item', 'tcd-w' ); echo esc_attr( $key+1 ); ?></h4>
        <div class="sub_box_content">
         <h4 class="theme_option_headline2"><?php _e('Slider type', 'tcd-w');  ?></h4>
         <ul class="design_radio_button">
          <?php foreach ( $item_type_options as $option ) { ?>
          <li class="index_slider_item_<?php esc_attr_e( $option['value'] ); ?>">
           <input type="radio" id="mobile_index_slider_item_<?php esc_attr_e( $option['value'] ); ?>_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][slider_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $value['slider_type'], $option['value'] ); ?> />
           <label for="mobile_index_slider_item_<?php esc_attr_e( $option['value'] ); ?>_<?php echo esc_attr( $key ); ?>"><?php echo $option['label']; ?></label>
          </li>
          <?php } ?>
         </ul>
         <?php // video ----------------------- ?>
         <div class="index_slider_video_area" style="<?php if($value['slider_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Video setting', 'tcd-w');  ?></h4>
          <div class="theme_option_message2">
           <p><?php _e('Please upload MP4 format file.', 'tcd-w');  ?></p>
           <p><?php _e('Web browser takes few second to load the data of video so we recommend to use loading screen if you want to display video.', 'tcd-w'); ?></p>
          </div>
          <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video">
           <input type="hidden" value="<?php if($value['video']) { echo esc_attr( $value['video'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_video" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][video]" class="cf_media_id">
           <div class="preview_field preview_field_video">
            <?php if($value['video']){ ?>
            <h4><?php _e( 'Uploaded MP4 file', 'tcd-w' ); ?></h4>
            <p><?php echo esc_url(wp_get_attachment_url($value['video'])); ?></p>
            <?php }; ?>
           </div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select MP4 file', 'tcd-w'); ?>" class="cfmf-select-video button">
            <input type="button" value="<?php _e('Remove MP4 file', 'tcd-w'); ?>" class="cfmf-delete-video button <?php if(!$value['video']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div><!-- END .index_slider_video_area -->
         <?php // youtube ----------------------- ?>
         <div class="index_slider_youtube_area" style="<?php if($value['slider_type'] == 'type3') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Youtube setting', 'tcd-w');  ?></h4>
          <div class="theme_option_message2">
           <p><?php _e('Please enter Youtube URL.', 'tcd-w');  ?></p>
           <p><?php _e('Web browser takes few second to load the data of video so we recommend to use loading screen if you want to display video.', 'tcd-w'); ?></p>
          </div>
          <input class="regular-text" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][youtube]" value="<?php echo esc_attr( $value['youtube'] ); ?>">
         </div><!-- END .index_slider_youtube_area -->
         <?php // 背景画像 ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Background image', 'tcd-w' ); ?></h4>
         <div class="theme_option_message2">
          <div class="index_slider_video_image" style="<?php if($value['slider_type'] != 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
           <p><?php _e('If the mobile device can\'t play video this image will be displayed instead.', 'tcd-w');  ?></p>
          </div>
          <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '1050'); ?></p>
         </div>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js mobile_index_slider_image<?php echo esc_attr( $key ); ?>">
           <input type="hidden" value="<?php if($value['image']) { echo esc_attr( $value['image'] ); }; ?>" id="mobile_index_slider_image<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][image]" class="cf_media_id">
           <div class="preview_field"><?php if($value['image']){ echo wp_get_attachment_image($value['image'], 'full'); }; ?></div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['image']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div>
         <div class="index_slider_image_area" style="<?php if($value['slider_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <?php // アニメーション ----------------------- ?>
          <h4 class="theme_option_headline2"><?php _e('Animation of background image', 'tcd-w');  ?></h4>
          <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][bg_image_animation_type]">
           <?php foreach ( $slider_animation_options as $option ) { ?>
           <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['bg_image_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
           <?php } ?>
          </select>
         </div><!-- END .index_slider_image_area -->
         <?php // ロゴ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Logo image', 'tcd-w');  ?></h4>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js mobile_center_logo_image<?php echo esc_attr( $key ); ?>">
           <input type="hidden" value="<?php echo esc_attr( $value['center_logo_image'] ); ?>" id="mobile_center_logo_image<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][center_logo_image]" class="cf_media_id">
           <div class="preview_field"><?php if($value['center_logo_image']){ echo wp_get_attachment_image($value['center_logo_image'], 'full'); }; ?></div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['center_logo_image']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div>
         <div class="default_background_image" style="display:none;">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/admin/img/top_slider_image_mobile.jpg" alt="" title="" />
         </div>
         <div class="slider_logo_preview-wrapper" style="display:none;">
          <h4 class="theme_option_headline2"><?php _e( 'Logo image preview', 'tcd-w' ); ?></h4>
          <div class="theme_option_message2">
           <p><?php _e( 'You can change the image size by moving the mouse cursor over the image and dragging the arrow. Double-click on the image to return to the original size.', 'tcd-w' ); ?></p>
          </div>
          <input type="hidden" value="<?php echo esc_attr( $value['center_logo_image_width'] ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][center_logo_image_width]" id="mobile_center_logo_image_width<?php echo esc_attr( $key ); ?>">
          <div class="slider_logo_preview slider_logo_preview-mobile" data-logo-width-input="#mobile_center_logo_image_width<?php echo esc_attr( $key ); ?>" data-logo-img=".mobile_center_logo_image<?php echo esc_attr( $key ); ?> img" data-bg-img=".mobile_index_slider_image<?php echo esc_attr( $key ); ?> img, .mobile_default_background_image img" data-display-overlay=".mobile_index_slider_use_overlay<?php echo esc_attr( $key ); ?>" data-overlay-color=".mobile_index_slider_overlay_color<?php echo esc_attr( $key ); ?>" data-overlay-opacity=".mobile_index_slider_overlay_opacity<?php echo esc_attr( $key ); ?>"></div>
         </div>
         <?php // キャッチフレーズ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h4>
         <textarea class="large-text" cols="50" rows="3" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch]"><?php echo esc_textarea(  $value['catch'] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
           <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_type]">
            <?php foreach ( $font_type_options as $option ) { ?>
            <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
            <?php } ?>
           </select>
          </li>
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size]" value="<?php echo esc_attr( $value['catch_font_size'] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_color]" value="<?php echo esc_attr( $value['catch_font_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
         </ul>
         <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
         <textarea class="large-text" cols="50" rows="4" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc_font_size]" value="<?php echo esc_attr( $value['desc_font_size'] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc_font_color]" value="<?php echo esc_attr( $value['desc_font_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
         </ul>
         <?php // ボタン ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
         <p class="displayment_checkbox"><label><input class="show_button" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <div class="theme_option_message2 button_animation_option_type1">
           <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
          </div>
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('label', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_label]" value="<?php echo esc_attr( $value['button_label'] ); ?>" /></li>
           <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_url]" value="<?php echo esc_attr( $value['button_url'] ); ?>"></li>
           <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_target]" type="checkbox" value="1" <?php checked( $value['button_target'], 1 ); ?>></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2">
            <span class="label"><?php _e('Transparency of border', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_opacity]" value="<?php echo esc_attr( $value['button_border_color_opacity'] ); ?>" />
            <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
             <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
            </div>
           </li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2">
            <span class="label"><?php _e('Transparency of border on mouseover', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_opacity_hover]" value="<?php echo esc_attr( $value['button_border_color_opacity_hover'] ); ?>" />
            <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
             <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
            </div>
           </li>
           <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
            <select class="button_animation_option" name="dp_options[mobile_index_slider][<?php echo esc_attr($key); ?>][button_animation_type]">
             <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
             <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
             <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
            </select>
           </li>
          </ul>
         </div>
         <?php // オーバーレイ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
         <p class="displayment_checkbox"><label><input class="mobile_index_slider_use_overlay<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][use_overlay]" type="checkbox" value="1" <?php checked( $value['use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input class="c-color-picker mobile_index_slider_overlay_color<?php echo esc_attr( $key ); ?>" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][overlay_color]" value="<?php echo esc_attr( $value['overlay_color'] ); ?>" data-default-color="#000000"></li>
           <li class="cf"><span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku mobile_index_slider_overlay_opacity<?php echo esc_attr( $key ); ?>" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][overlay_opacity]" value="<?php echo esc_attr( $value['overlay_opacity'] ); ?>" /><p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p></li>
          </ul>
         </div>
         <?php // レイヤー画像画像 ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Layer image', 'tcd-w');  ?></h4>
         <div class="theme_option_message2">
          <p><?php echo __('Layer image will be displayed at the four corners of each item.', 'tcd-w'); ?></p>
         </div>
         <p class="displayment_checkbox"><label><input name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e( 'Display layer image', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['show_layer_image'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <div class="image_list">
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Left top', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image1_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image1'] ); ?>" id="mobile_layer_image1_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image1]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image1']){ echo wp_get_attachment_image($value['layer_image1'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image1']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Right top', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image2_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image2'] ); ?>" id="mobile_layer_image2_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image2]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image2']){ echo wp_get_attachment_image($value['layer_image2'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image2']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
          </div><!-- END image_list -->
          <div class="image_list">
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Left bottom', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image3_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image3'] ); ?>" id="mobile_layer_image3_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image3]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image3']){ echo wp_get_attachment_image($value['layer_image3'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image3']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Right bottom', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image4_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image4'] ); ?>" id="mobile_layer_image4_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image4]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image4']){ echo wp_get_attachment_image($value['layer_image4'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image4']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
          </div><!-- END image_list -->
          <h4 class="theme_option_headline2"><?php _e('Animation of layer image', 'tcd-w');  ?></h4>
          <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image_animation_type]">
           <?php foreach ( $layer_image_animation_options as $option ) { ?>
           <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['layer_image_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
           <?php } ?>
          </select>
         </div>
         <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
        </div><!-- END .sub_box_content -->
       </div><!-- END .sub_box -->
       <?php
              endforeach;
            endif;
            $key = 'addindex';
            $value = array(
             'slider_type' => 'type1',
             'image' => false,
             'bg_image_animation_type' => 'type1',
             'video' => '',
             'youtube' => '',
             'catch' => '',
             'catch_font_type' => 'type3',
             'catch_font_size' => '24',
             'catch_font_color' => '#ffffff',
             'desc' => '',
             'desc_mobile' => '',
             'desc_font_size' => '15',
             'desc_font_color' => '#ffffff',
             'show_button' => '',
             'button_label' => '',
             'button_url' => '',
             'button_target' => '',
             'button_font_color' => '#ffffff',
             'button_border_color' => '#ffffff',
             'button_border_color_opacity' => '1',
             'button_font_color_hover' => '#ffffff',
             'button_bg_color_hover' => '#950000',
             'button_border_color_hover' => '#950000',
             'button_border_color_opacity_hover' => '1',
             'button_animation_type' => 'type1',
             'use_overlay' => '',
             'overlay_color' => '#000000',
             'overlay_opacity' => '0.3',
             'center_logo_image' => false,
             'center_logo_image_width' => '',
             'show_layer_image' => '',
             'layer_image1' => '',
             'layer_image2' => '',
             'layer_image3' => '',
             'layer_image4' => '',
             'layer_image_animation_type' => 'type1',
            );
            ob_start();
       ?>
       <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
        <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
        <div class="sub_box_content">
         <h4 class="theme_option_headline2"><?php _e('Slider type', 'tcd-w');  ?></h4>
         <ul class="design_radio_button">
          <?php foreach ( $item_type_options as $option ) { ?>
          <li class="index_slider_item_<?php esc_attr_e( $option['value'] ); ?>">
           <input type="radio" id="mobile_index_slider_item_<?php esc_attr_e( $option['value'] ); ?>_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][slider_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $value['slider_type'], $option['value'] ); ?> />
           <label for="mobile_index_slider_item_<?php esc_attr_e( $option['value'] ); ?>_<?php echo esc_attr( $key ); ?>"><?php echo $option['label']; ?></label>
          </li>
          <?php } ?>
         </ul>
         <?php // video ----------------------- ?>
         <div class="index_slider_video_area" style="<?php if($value['slider_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Video setting', 'tcd-w');  ?></h4>
          <div class="theme_option_message2">
           <p><?php _e('Please upload MP4 format file.', 'tcd-w');  ?></p>
           <p><?php _e('Web browser takes few second to load the data of video so we recommend to use loading screen if you want to display video.', 'tcd-w'); ?></p>
          </div>
          <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video">
           <input type="hidden" value="<?php if($value['video']) { echo esc_attr( $value['video'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_video" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][video]" class="cf_media_id">
           <div class="preview_field preview_field_video">
            <?php if($value['video']){ ?>
            <h4><?php _e( 'Uploaded MP4 file', 'tcd-w' ); ?></h4>
            <p><?php echo esc_url(wp_get_attachment_url($value['video'])); ?></p>
            <?php }; ?>
           </div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select MP4 file', 'tcd-w'); ?>" class="cfmf-select-video button">
            <input type="button" value="<?php _e('Remove MP4 file', 'tcd-w'); ?>" class="cfmf-delete-video button <?php if(!$value['video']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div><!-- END .index_slider_video_area -->
         <?php // youtube ----------------------- ?>
         <div class="index_slider_youtube_area" style="<?php if($value['slider_type'] == 'type3') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Youtube setting', 'tcd-w');  ?></h4>
          <div class="theme_option_message2">
           <p><?php _e('Please enter Youtube URL.', 'tcd-w');  ?></p>
           <p><?php _e('Web browser takes few second to load the data of video so we recommend to use loading screen if you want to display video.', 'tcd-w'); ?></p>
          </div>
          <input class="regular-text" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][youtube]" value="<?php echo esc_attr( $value['youtube'] ); ?>">
         </div><!-- END .index_slider_youtube_area -->
         <?php // 背景画像 ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Background image', 'tcd-w' ); ?></h4>
         <div class="theme_option_message2">
          <div class="index_slider_video_image" style="<?php if($value['slider_type'] != 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
           <p><?php _e('If the mobile device can\'t play video this image will be displayed instead.', 'tcd-w');  ?></p>
          </div>
          <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '1050'); ?></p>
         </div>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js mobile_index_slider_image<?php echo esc_attr( $key ); ?>">
           <input type="hidden" value="<?php if($value['image']) { echo esc_attr( $value['image'] ); }; ?>" id="mobile_index_slider_image<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][image]" class="cf_media_id">
           <div class="preview_field"><?php if($value['image']){ echo wp_get_attachment_image($value['image'], 'full'); }; ?></div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['image']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div>
         <div class="index_slider_image_area" style="<?php if($value['slider_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <?php // アニメーション ----------------------- ?>
          <h4 class="theme_option_headline2"><?php _e('Animation of background image', 'tcd-w');  ?></h4>
          <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][bg_image_animation_type]">
           <?php foreach ( $slider_animation_options as $option ) { ?>
           <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['bg_image_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
           <?php } ?>
          </select>
         </div><!-- END .index_slider_image_area -->
         <?php // ロゴ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Logo image', 'tcd-w');  ?></h4>
         <div class="image_box cf">
          <div class="cf cf_media_field hide-if-no-js mobile_center_logo_image<?php echo esc_attr( $key ); ?>">
           <input type="hidden" value="<?php echo esc_attr( $value['center_logo_image'] ); ?>" id="mobile_center_logo_image<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][center_logo_image]" class="cf_media_id">
           <div class="preview_field"><?php if($value['center_logo_image']){ echo wp_get_attachment_image($value['center_logo_image'], 'full'); }; ?></div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
            <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['center_logo_image']){ echo 'hidden'; }; ?>">
           </div>
          </div>
         </div>
         <div class="default_background_image" style="display:none;">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/admin/img/top_slider_image_mobile.jpg" alt="" title="" />
         </div>
         <div class="slider_logo_preview-wrapper" style="display:none;">
          <h4 class="theme_option_headline2"><?php _e( 'Logo image preview', 'tcd-w' ); ?></h4>
          <div class="theme_option_message2">
           <p><?php _e( 'You can change the image size by moving the mouse cursor over the image and dragging the arrow. Double-click on the image to return to the original size.', 'tcd-w' ); ?></p>
          </div>
          <input type="hidden" value="<?php echo esc_attr( $value['center_logo_image_width'] ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][center_logo_image_width]" id="mobile_center_logo_image_width<?php echo esc_attr( $key ); ?>">
          <div class="slider_logo_preview slider_logo_preview-mobile" data-logo-width-input="#mobile_center_logo_image_width<?php echo esc_attr( $key ); ?>" data-logo-img=".mobile_center_logo_image<?php echo esc_attr( $key ); ?> img" data-bg-img=".mobile_index_slider_image<?php echo esc_attr( $key ); ?> img, .mobile_default_background_image img" data-display-overlay=".mobile_index_slider_use_overlay<?php echo esc_attr( $key ); ?>" data-overlay-color=".mobile_index_slider_overlay_color<?php echo esc_attr( $key ); ?>" data-overlay-opacity=".mobile_index_slider_overlay_opacity<?php echo esc_attr( $key ); ?>"></div>
         </div>
         <?php // キャッチフレーズ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h4>
         <textarea class="large-text" cols="50" rows="3" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch]"><?php echo esc_textarea(  $value['catch'] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
           <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_type]">
            <?php foreach ( $font_type_options as $option ) { ?>
            <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
            <?php } ?>
           </select>
          </li>
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size]" value="<?php echo esc_attr( $value['catch_font_size'] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_color]" value="<?php echo esc_attr( $value['catch_font_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
         </ul>
         <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
         <textarea class="large-text" cols="50" rows="4" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
         <ul class="option_list">
          <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc_font_size]" value="<?php echo esc_attr( $value['desc_font_size'] ); ?>" /><span>px</span></li>
          <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][desc_font_color]" value="<?php echo esc_attr( $value['desc_font_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
         </ul>
         <?php // ボタン ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
         <p class="displayment_checkbox"><label><input class="show_button" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <div class="theme_option_message2 button_animation_option_type1">
           <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
          </div>
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('label', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_label]" value="<?php echo esc_attr( $value['button_label'] ); ?>" /></li>
           <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_url]" value="<?php echo esc_attr( $value['button_url'] ); ?>"></li>
           <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_target]" type="checkbox" value="1" <?php checked( $value['button_target'], 1 ); ?>></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2">
            <span class="label"><?php _e('Transparency of border', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_opacity]" value="<?php echo esc_attr( $value['button_border_color_opacity'] ); ?>" />
            <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
             <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
            </div>
           </li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Font color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
           <li class="cf button_animation_option_type2">
            <span class="label"><?php _e('Transparency of border on mouseover', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][button_border_color_opacity_hover]" value="<?php echo esc_attr( $value['button_border_color_opacity_hover'] ); ?>" />
            <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
             <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
            </div>
           </li>
           <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
            <select class="button_animation_option" name="dp_options[mobile_index_slider][<?php echo esc_attr($key); ?>][button_animation_type]">
             <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
             <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
             <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
            </select>
           </li>
          </ul>
         </div>
         <?php // オーバーレイ ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
         <p class="displayment_checkbox"><label><input class="mobile_index_slider_use_overlay<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][use_overlay]" type="checkbox" value="1" <?php checked( $value['use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
           <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input class="c-color-picker mobile_index_slider_overlay_color<?php echo esc_attr( $key ); ?>" type="text" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][overlay_color]" value="<?php echo esc_attr( $value['overlay_color'] ); ?>" data-default-color="#000000"></li>
           <li class="cf"><span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku mobile_index_slider_overlay_opacity<?php echo esc_attr( $key ); ?>" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][overlay_opacity]" value="<?php echo esc_attr( $value['overlay_opacity'] ); ?>" /><p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p></li>
          </ul>
         </div>
         <?php // レイヤー画像画像 ----------------------- ?>
         <h4 class="theme_option_headline2"><?php _e('Layer image', 'tcd-w');  ?></h4>
         <div class="theme_option_message2">
          <p><?php echo __('Layer image will be displayed at the four corners of each item.', 'tcd-w'); ?></p>
         </div>
         <p class="displayment_checkbox"><label><input name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e( 'Display layer image', 'tcd-w' ); ?></label></p>
         <div style="<?php if($value['show_layer_image'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <div class="image_list">
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Left top', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image1_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image1'] ); ?>" id="mobile_layer_image1_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image1]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image1']){ echo wp_get_attachment_image($value['layer_image1'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image1']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Right top', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image2_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image2'] ); ?>" id="mobile_layer_image2_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image2]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image2']){ echo wp_get_attachment_image($value['layer_image2'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image2']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
          </div><!-- END image_list -->
          <div class="image_list">
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Left bottom', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image3_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image3'] ); ?>" id="mobile_layer_image3_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image3]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image3']){ echo wp_get_attachment_image($value['layer_image3'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image3']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
           <div class="list_item">
            <h5 class="theme_option_headline4"><span><?php _e('Right bottom', 'tcd-w');  ?></span></h5>
            <div class="image_box cf">
             <div class="cf cf_media_field hide-if-no-js mobile_layer_image4_<?php echo esc_attr( $key ); ?>">
              <input type="hidden" value="<?php echo esc_attr( $value['layer_image4'] ); ?>" id="mobile_layer_image4_<?php echo esc_attr( $key ); ?>" name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image4]" class="cf_media_id">
              <div class="preview_field"><?php if($value['layer_image4']){ echo wp_get_attachment_image($value['layer_image4'], 'full'); }; ?></div>
              <div class="buttton_area">
               <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
               <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['layer_image4']){ echo 'hidden'; }; ?>">
              </div>
             </div>
            </div>
           </div><!-- END list item -->
          </div><!-- END image_list -->
          <h4 class="theme_option_headline2"><?php _e('Animation of layer image', 'tcd-w');  ?></h4>
          <select name="dp_options[mobile_index_slider][<?php echo esc_attr( $key ); ?>][layer_image_animation_type]">
           <?php foreach ( $layer_image_animation_options as $option ) { ?>
           <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['layer_image_animation_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
           <?php } ?>
          </select>
         </div>
         <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
        </div><!-- END .sub_box_content -->
       </div><!-- END .sub_box -->
       <?php
            $clone = ob_get_clean();
       ?>
      </div><!-- END .repeater -->
      <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo htmlspecialchars( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
     </div><!-- END .repeater-wrapper -->
     <?php //繰り返しフィールドここまで ----- ?>

     <h4 class="theme_option_headline2"><?php _e('Animation setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message2">
      <p><?php _e('Please check the checkbox below if you want to stop animation of header logo, slider content, and arrow message.', 'tcd-w');  ?></p>
     </div>
     <p><label><input class="stop_index_slider_animation" name="dp_options[mobile_stop_index_slider_animation]" type="checkbox" value="1" <?php checked( $options['mobile_stop_index_slider_animation'], 1 ); ?>><?php _e( 'Stop all animation in header content.', 'tcd-w' ); ?></label></p>

     <?php // スピードの設定 ---------- ?>
     <h4 class="theme_option_headline2"><?php _e('Slider speed setting', 'tcd-w');  ?></h4>
     <select class="index_slider_time" name="dp_options[mobile_index_slider_time]">
      <?php
           $i = 1;
           foreach ( $time_options as $option ):
             if( $i >= 3 && $i <= 15 ){
      ?>
      <option <?php if($i < 7){ echo 'class="no_animation"'; }; ?>style="padding-right: 10px;" value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $options['mobile_index_slider_time'], $option['value'] ); ?>><?php echo esc_html($option['label']); ?></option>
      <?php
             }
             $i++;
          endforeach;
      ?>
     </select>

     <?php // 矢印メッセージの設定 ---------- ?>
     <h4 class="theme_option_headline2"><?php _e('Arrow message setting', 'tcd-w');  ?></h4>
     <input type="text" class="full_width" name="dp_options[mobile_index_slider_message]" value="<?php echo esc_attr($options['mobile_index_slider_message']); ?>">
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_index_slider_message_font_size]" value="<?php echo esc_attr( $options['mobile_index_slider_message_font_size'] ); ?>"><span>px</span></li>
     </ul>

     </div><!-- END .displayment_checkbox -->

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // コンテンツビルダー ここから ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ ?>
   <div class="theme_option_field theme_option_field_ac open active <?php if($options['mobile_index_content_type'] == 'type2') { echo 'show_arrow'; }; ?>">
    <h3 class="theme_option_headline"><?php _e('Content builder', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <ul class="design_radio_button" style="margin-bottom:25px;">
      <li class="mobile_index_content_type1_button">
       <input type="radio" id="mobile_index_content_type1" name="dp_options[mobile_index_content_type]" value="type1" <?php checked( $options['mobile_index_content_type'], 'type1' ); ?> />
       <label for="mobile_index_content_type1"><?php _e('Display same content builder in smartphone', 'tcd-w');  ?></label>
      </li>
      <li class="mobile_index_content_type2_button">
       <input type="radio" id="mobile_index_content_type2" name="dp_options[mobile_index_content_type]" value="type2" <?php checked( $options['mobile_index_content_type'], 'type2' ); ?> />
       <label for="mobile_index_content_type2"><?php _e('Display diffrent content builder in smartphone', 'tcd-w');  ?></label>
      </li>
      <li class="mobile_index_content_type3_button">
       <input type="radio" id="mobile_index_content_type3" name="dp_options[mobile_index_content_type]" value="type3" <?php checked( $options['mobile_index_content_type'], 'type3' ); ?> />
       <label for="mobile_index_content_type3"><?php _e('Use page content instead of content builder', 'tcd-w');  ?></label>
      </li>
     </ul>

     <ul class="button_list cf mobile_index_content_type1_option <?php if($options['mobile_index_content_type'] != 'type2') { echo 'display:block'; }; ?>">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
     </ul>

     <?php
          $pront_page_id = get_option('page_on_front');
          if($pront_page_id){
     ?>
     <div class="mobile_index_content_type3_option" style="<?php if($options['mobile_index_content_type'] == 'type3') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <div class="theme_option_message2">
       <p><?php printf(__('Please set content from <a href="post.php?post=%s&action=edit" target="_blank">Front page edit screen</a>.', 'tcd-w'), $pront_page_id); ?></p>
      </div>
      <ul class="button_list cf">
       <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      </ul>
     </div>
     <?php }; ?>

     <div class="mobile_index_content_type2_option" style="<?php if($options['mobile_index_content_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">

     <div class="theme_option_message no_arrow">
      <?php echo __( '<p>You can build contents freely with this function.</p><br /><p>STEP1: Click Add content button.<br />STEP2: Select content from dropdown menu.<br />STEP3: Input data and save the option.</p><br /><p>You can change order by dragging MOVE button and you can delete content by clicking DELETE button.</p>', 'tcd-w' ); ?>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Content image', 'tcd-w' ); ?></h4>
     <ul class="design_button_list cf rebox_group">
      <li><a href="<?php bloginfo('template_url'); ?>/admin/img/cb_design_content.jpg" title="<?php _e( 'Design content', 'tcd-w' ); ?>"><?php _e( 'Design content', 'tcd-w' ); ?></a></li>
      <li><a href="<?php bloginfo('template_url'); ?>/admin/img/cb_featured_post_list.jpg" title="<?php printf(__('%s post list', 'tcd-w'), $featured_label); ?>"><?php printf(__('%s post list', 'tcd-w'), $featured_label); ?></a></li>
      <li><a href="<?php bloginfo('template_url'); ?>/admin/img/cb_gallery_list.jpg" title="<?php printf(__('%s list', 'tcd-w'), $gallery_label); ?>"><?php printf(__('%s list', 'tcd-w'), $gallery_label); ?></a></li>
      <li><a href="<?php bloginfo('template_url'); ?>/admin/img/cb_gallery_category_list.jpg" title="<?php printf(__('%s list', 'tcd-w'), $gallery_category_label); ?>"><?php printf(__('%s list', 'tcd-w'), $gallery_category_label); ?></a></li>
      <li><a href="<?php bloginfo('template_url'); ?>/admin/img/cb_banner_content.jpg" title="<?php _e( 'Banner content', 'tcd-w' ); ?>"><?php _e( 'Banner content', 'tcd-w' ); ?></a></li>
     </ul>

     </div>

    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

   <div class="contents_builder_wrap mobile_index_content_type2_option" style="<?php if($options['mobile_index_content_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">

    <div class="contents_builder">
     <p class="cb_message"><?php _e( 'Click Add content button to start content builder', 'tcd-w' ); ?></p>
     <?php
          if (!empty($options['mobile_contents_builder'])) {
            foreach($options['mobile_contents_builder'] as $key => $content) :
              $cb_index = 'cb_'.$key.'_'.mt_rand(0,999999);
     ?>
     <div class="cb_row">
      <ul class="cb_button cf">
       <li><span class="cb_move"><?php echo __('Move', 'tcd-w'); ?></span></li>
       <li><span class="cb_delete"><?php echo __('Delete', 'tcd-w'); ?></span></li>
      </ul>
      <div class="cb_column_area cf">
       <div class="cb_column">
        <input type="hidden" class="cb_index" value="<?php echo $cb_index; ?>" />
        <?php mobile_the_cb_content_select($cb_index, $content['cb_content_select']); ?>
        <?php if (!empty($content['cb_content_select'])) mobile_the_cb_content_setting($cb_index, $content['cb_content_select'], $content); ?>
       </div>
      </div><!-- END .cb_column_area -->
     </div><!-- END .cb_row -->
     <?php
          endforeach;
         };
     ?>
    </div><!-- END .contents_builder -->
    <ul class="button_list cf cb_add_row_buttton_area">
     <li><input type="button" value="<?php echo __( 'Add content', 'tcd-w' ); ?>" class="button-ml add_row"></li>
     <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
    </ul>

    <?php // コンテンツビルダー追加用 非表示 ?>
    <div class="contents_builder-clone hidden">
     <div class="cb_row">
      <ul class="cb_button cf">
       <li><span class="cb_move"><?php echo __('Move', 'tcd-w'); ?></span></li>
       <li><span class="cb_delete"><?php echo __('Delete', 'tcd-w'); ?></span></li>
      </ul>
      <div class="cb_column_area cf">
       <div class="cb_column">
        <input type="hidden" class="cb_index" value="cb_cloneindex" />
        <?php mobile_the_cb_content_select('cb_cloneindex'); ?>
       </div>
      </div><!-- END .cb_column_area -->
     </div><!-- END .cb_row -->
     <?php
          mobile_the_cb_content_setting('cb_cloneindex', 'design_content');
          mobile_the_cb_content_setting('cb_cloneindex', 'featured_post_list');
          mobile_the_cb_content_setting('cb_cloneindex', 'gallery_list');
          mobile_the_cb_content_setting('cb_cloneindex', 'gallery_category_list');
          mobile_the_cb_content_setting('cb_cloneindex', 'banner_content');
          mobile_the_cb_content_setting('cb_cloneindex', 'free_space');
     ?>
    </div><!-- END .contents_builder-clone -->

   </div><!-- END .contents_builder_wrap -->
   <?php // コンテンツビルダーここまで ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ ?>


</div><!-- END .tab-content -->

<?php
} // END add_front_page_mobile_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_front_page_mobile_theme_options_validate( $input ) {

  global $dp_default_options, $item_type_options, $time_options, $font_type_options, $slider_animation_options, $layout_options, $logo_type_options, $layer_image_animation_options;

  // ロゴの設定
  $input['mobile_show_index_logo'] = ! empty( $input['mobile_show_index_logo'] ) ? 1 : 0;

  // 矢印メッセージの設定
  $input['mobile_index_slider_message'] = wp_filter_nohtml_kses( $input['mobile_index_slider_message'] );
  $input['mobile_index_slider_message_font_size'] = wp_filter_nohtml_kses( $input['mobile_index_slider_message_font_size'] );

  // スライダーの基本設定
  $input['mobile_show_index_slider'] = wp_filter_nohtml_kses( $input['mobile_show_index_slider'] );
  if ( ! isset( $value['mobile_index_slider_time'] ) )
    $value['mobile_index_slider_time'] = null;
  if ( ! array_key_exists( $value['mobile_index_slider_time'], $time_options ) )
    $value['mobile_index_slider_time'] = null;
  $input['mobile_stop_index_slider_animation'] = ! empty( $input['mobile_stop_index_slider_animation'] ) ? 1 : 0;

  //スライダーの設定
  $index_slider = array();
  if ( isset( $input['mobile_index_slider'] ) && is_array( $input['mobile_index_slider'] ) ) {
    foreach ( $input['mobile_index_slider'] as $key => $value ) {
      $index_slider[] = array(
        'slider_type' => ( isset( $input['mobile_index_slider'][$key]['slider_type'] ) && array_key_exists( $input['mobile_index_slider'][$key]['slider_type'], $item_type_options ) ) ? $input['mobile_index_slider'][$key]['slider_type'] : 'type1',
        'image' => isset( $input['mobile_index_slider'][$key]['image'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['image'] ) : '',
        'bg_image_animation_type' => ( isset( $input['mobile_index_slider'][$key]['bg_image_animation_type'] ) && array_key_exists( $input['mobile_index_slider'][$key]['bg_image_animation_type'], $slider_animation_options ) ) ? $input['mobile_index_slider'][$key]['bg_image_animation_type'] : 'type1',
        'video' => isset( $input['mobile_index_slider'][$key]['video'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['video'] ) : '',
        'youtube' => isset( $input['mobile_index_slider'][$key]['youtube'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['youtube'] ) : '',
        'catch' => isset( $input['mobile_index_slider'][$key]['catch'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['catch'] ) : '',
        'catch_font_type' => ( isset( $input['mobile_index_slider'][$key]['catch_font_type'] ) && array_key_exists( $input['mobile_index_slider'][$key]['catch_font_type'], $font_type_options ) ) ? $input['mobile_index_slider'][$key]['catch_font_type'] : 'type1',
        'catch_font_size' => isset( $input['mobile_index_slider'][$key]['catch_font_size'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['catch_font_size'] ) : '30',
        'catch_font_color' => isset( $input['mobile_index_slider'][$key]['catch_font_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['catch_font_color'] ) : '#FFFFFF',
        'desc' => isset( $input['mobile_index_slider'][$key]['desc'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['desc'] ) : '',
        'desc_font_size' => isset( $input['mobile_index_slider'][$key]['desc_font_size'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['desc_font_size'] ) : '20',
        'desc_font_color' => isset( $input['mobile_index_slider'][$key]['desc_font_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['desc_font_color'] ) : '#FFFFFF',
        'show_button' => ! empty( $input['mobile_index_slider'][$key]['show_button'] ) ? 1 : 0,
        'button_label' => isset( $input['mobile_index_slider'][$key]['button_label'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_label'] ) : '',
        'button_url' => isset( $input['mobile_index_slider'][$key]['button_url'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_url'] ) : '',
        'button_target' => ! empty( $input['mobile_index_slider'][$key]['button_target'] ) ? 1 : 0,
        'button_font_color' => isset( $input['mobile_index_slider'][$key]['button_font_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_font_color'] ) : '#FFFFFF',
        'button_bg_color' => isset( $input['mobile_index_slider'][$key]['button_bg_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_bg_color'] ) : '#950000',
        'button_border_color' => isset( $input['mobile_index_slider'][$key]['button_border_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_border_color'] ) : '#950000',
        'button_border_color_opacity' => isset( $input['mobile_index_slider'][$key]['button_border_color_opacity'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_border_color_opacity'] ) : '1',
        'button_font_color_hover' => isset( $input['mobile_index_slider'][$key]['button_font_color_hover'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_font_color_hover'] ) : '#FFFFFF',
        'button_bg_color_hover' => isset( $input['mobile_index_slider'][$key]['button_bg_color_hover'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_bg_color_hover'] ) : '#780000',
        'button_border_color_hover' => isset( $input['mobile_index_slider'][$key]['button_border_color_hover'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_border_color_hover'] ) : '#780000',
        'button_border_color_opacity_hover' => isset( $input['mobile_index_slider'][$key]['button_border_color_opacity_hover'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_border_color_opacity_hover'] ) : '0.5',
        'button_animation_type' => isset( $input['mobile_index_slider'][$key]['button_animation_type'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['button_animation_type'] ) : 'type1',
        'use_overlay' => ! empty( $input['mobile_index_slider'][$key]['use_overlay'] ) ? 1 : 0,
        'overlay_color' => isset( $input['mobile_index_slider'][$key]['overlay_color'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['overlay_color'] ) : '#000000',
        'overlay_opacity' => isset( $input['mobile_index_slider'][$key]['overlay_opacity'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['overlay_opacity'] ) : '0.3',
        'center_logo_image' => isset( $input['mobile_index_slider'][$key]['center_logo_image'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['center_logo_image'] ) : '',
        'center_logo_image_width' => isset( $input['mobile_index_slider'][$key]['center_logo_image_width'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['center_logo_image_width'] ) : '',
        'show_layer_image' => ! empty( $input['mobile_index_slider'][$key]['show_layer_image'] ) ? 1 : 0,
        'layer_image1' => isset( $input['mobile_index_slider'][$key]['layer_image1'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['layer_image1'] ) : '',
        'layer_image2' => isset( $input['mobile_index_slider'][$key]['layer_image2'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['layer_image2'] ) : '',
        'layer_image3' => isset( $input['mobile_index_slider'][$key]['layer_image3'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['layer_image3'] ) : '',
        'layer_image4' => isset( $input['mobile_index_slider'][$key]['layer_image4'] ) ? wp_filter_nohtml_kses( $input['mobile_index_slider'][$key]['layer_image4'] ) : '',
        'layer_image_animation_type' => ( isset( $input['mobile_index_slider'][$key]['layer_image_animation_type'] ) && array_key_exists( $input['mobile_index_slider'][$key]['layer_image_animation_type'], $layer_image_animation_options ) ) ? $input['mobile_index_slider'][$key]['layer_image_animation_type'] : 'type1',
      );
    }
  };
  $input['mobile_index_slider'] = $index_slider;


  // コンテンツビルダーの代わりに、固定ページのコンテンツを使う
  $input['mobile_index_content_type'] = wp_filter_nohtml_kses( $input['mobile_index_content_type'] );


  // コンテンツビルダー -----------------------------------------------------------------------------
  if (!empty($input['mobile_contents_builder'])) {

    $input_cb = $input['mobile_contents_builder'];
    $input['mobile_contents_builder'] = array();

    foreach($input_cb as $key => $value) {

      // クローン用はスルー
      //if (in_array($key, array('cb_cloneindex', 'cb_cloneindex2'))) continue;
      if (in_array($key, array('cb_cloneindex', 'cb_cloneindex2'), true)) continue;

      // デザインコンテンツ -----------------------------------------------------------------------
      if ($value['cb_content_select'] == 'design_content') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;

        $value['show_news'] = ! empty( $value['show_news'] ) ? 1 : 0;
        $value['post_num_mobile'] = wp_filter_nohtml_kses( $value['post_num_mobile'] );
        $value['post_type'] = wp_filter_nohtml_kses( $value['post_type'] );
        $value['post_bg_color'] = wp_filter_nohtml_kses( $value['post_bg_color'] );
        $value['post_order'] = wp_filter_nohtml_kses( $value['post_order'] );

        $value['headline'] = wp_filter_nohtml_kses( $value['headline'] );
        $value['headline_font_size'] = wp_filter_nohtml_kses( $value['headline_font_size'] );
        $value['headline_font_type'] = wp_filter_nohtml_kses( $value['headline_font_type'] );
        $value['headline_direction'] = wp_filter_nohtml_kses( $value['headline_direction'] );
        $value['headline_show_icon'] = ! empty( $value['headline_show_icon'] ) ? 1 : 0;

        $value['sub_headline'] = wp_filter_nohtml_kses( $value['sub_headline'] );
        $value['sub_headline_font_size'] = wp_filter_nohtml_kses( $value['sub_headline_font_size'] );

        $value['desc'] = wp_filter_nohtml_kses( $value['desc'] );
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_url'] = wp_filter_nohtml_kses( $value['button_url'] );
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;

        $value['show_layer_image'] = ! empty( $value['show_layer_image'] ) ? 1 : 0;
        $value['layer_image1'] = wp_filter_nohtml_kses( $value['layer_image1'] );
        $value['layer_image2'] = wp_filter_nohtml_kses( $value['layer_image2'] );
        $value['layer_image3'] = wp_filter_nohtml_kses( $value['layer_image3'] );
        $value['layer_image4'] = wp_filter_nohtml_kses( $value['layer_image4'] );


      // 特集記事一覧 -----------------------------------------------------------------------
      } elseif ($value['cb_content_select'] == 'featured_post_list') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;
          $value['show_content'] = ( $value['show_content'] == 1 ? 1 : 0 );

        $value['post_num_mobile'] = wp_filter_nohtml_kses( $value['post_num_mobile'] );

        $value['headline'] = wp_filter_nohtml_kses( $value['headline'] );
        $value['headline_font_size'] = wp_filter_nohtml_kses( $value['headline_font_size'] );
        $value['headline_font_type'] = wp_filter_nohtml_kses( $value['headline_font_type'] );
        $value['headline_direction'] = wp_filter_nohtml_kses( $value['headline_direction'] );
        $value['headline_show_icon'] = ! empty( $value['headline_show_icon'] ) ? 1 : 0;

        $value['sub_headline'] = wp_filter_nohtml_kses( $value['sub_headline'] );
        $value['sub_headline_font_size'] = wp_filter_nohtml_kses( $value['sub_headline_font_size'] );

        $value['large_title_font_size'] = wp_filter_nohtml_kses( $value['large_title_font_size'] );
        $value['small_title_font_size'] = wp_filter_nohtml_kses( $value['small_title_font_size'] );
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['show_category'] = ! empty( $value['show_category'] ) ? 1 : 0;
        $value['show_post_num'] = ! empty( $value['show_post_num'] ) ? 1 : 0;

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;


      // ギャラリー一覧 -----------------------------------------------------------------------
      } elseif ($value['cb_content_select'] == 'gallery_list') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;
          $value['show_content'] = ( $value['show_content'] == 1 ? 1 : 0 );

        $value['headline'] = wp_filter_nohtml_kses( $value['headline'] );
        $value['headline_font_size'] = wp_filter_nohtml_kses( $value['headline_font_size'] );
        $value['headline_font_type'] = wp_filter_nohtml_kses( $value['headline_font_type'] );
        $value['headline_direction'] = wp_filter_nohtml_kses( $value['headline_direction'] );
        $value['headline_show_icon'] = ! empty( $value['headline_show_icon'] ) ? 1 : 0;

        $value['sub_headline'] = wp_filter_nohtml_kses( $value['sub_headline'] );
        $value['sub_headline_font_size'] = wp_filter_nohtml_kses( $value['sub_headline_font_size'] );

        $value['desc'] = wp_filter_nohtml_kses( $value['desc'] );
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );

        $value['post_num_mobile'] = wp_filter_nohtml_kses( $value['post_num_mobile'] );

        $value['show_category_sort_button'] = ! empty( $value['show_category_sort_button'] ) ? 1 : 0;
        $value['show_category_sort_button_icon'] = ! empty( $value['show_category_sort_button_icon'] ) ? 1 : 0;
        $value['all_label'] = wp_filter_nohtml_kses( $value['all_label'] );
        $value['sort_button_font_size'] = wp_filter_nohtml_kses( $value['sort_button_font_size'] );

        $value['category_ids'] = wp_filter_nohtml_kses( $value['category_ids'] );

        $value['category_direction'] = ! empty( $value['category_direction'] ) ? 1 : 0;
        $value['category_font_size'] = wp_filter_nohtml_kses( $value['category_font_size'] );
        $value['category_font_type'] = wp_filter_nohtml_kses( $value['category_font_type'] );
        $value['post_font_color'] = wp_filter_nohtml_kses( $value['post_font_color'] );
        $value['title_font_size'] = wp_filter_nohtml_kses( $value['title_font_size'] );
        $value['animation_type'] = wp_filter_nohtml_kses( $value['animation_type'] );

        $value['show_more_button'] = ! empty( $value['show_more_button'] ) ? 1 : 0;
        $value['more_label'] = wp_filter_nohtml_kses( $value['more_label'] );
        $value['show_more_label_icon'] = ! empty( $value['show_more_label_icon'] ) ? 1 : 0;
        $value['load_button_font_size'] = wp_filter_nohtml_kses( $value['load_button_font_size'] );


      // ギャラリーカテゴリー一覧 -----------------------------------------------------------------------
      } elseif ($value['cb_content_select'] == 'gallery_category_list') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;
          $value['show_content'] = ( $value['show_content'] == 1 ? 1 : 0 );

        $value['category_ids'] = wp_filter_nohtml_kses( $value['category_ids'] );

        $value['title_show_icon'] = ! empty( $value['title_show_icon'] ) ? 1 : 0;
        $value['title_direction'] = ! empty( $value['title_direction'] ) ? 1 : 0;
        $value['title_font_type'] = wp_filter_nohtml_kses( $value['title_font_type'] );
        $value['title_font_color'] = wp_filter_nohtml_kses( $value['title_font_color'] );
        $value['title_font_size'] = wp_filter_nohtml_kses( $value['title_font_size'] );
        $value['sub_title_font_size'] = wp_filter_nohtml_kses( $value['sub_title_font_size'] );


      // バナーコンテンツ -----------------------------------------------------------------------
      } elseif ($value['cb_content_select'] == 'banner_content') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;
          $value['show_content'] = ( $value['show_content'] == 1 ? 1 : 0 );

        $value['catch'] = wp_filter_nohtml_kses( $value['catch'] );
        $value['catch_font_size'] = wp_filter_nohtml_kses( $value['catch_font_size'] );
        $value['catch_font_type'] = wp_filter_nohtml_kses( $value['catch_font_type'] );
        $value['catch_font_color'] = wp_filter_nohtml_kses( $value['catch_font_color'] );

        $value['desc'] = wp_filter_nohtml_kses( $value['desc'] );
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_type'] = wp_filter_nohtml_kses( $value['desc_font_type'] );
        $value['desc_font_color'] = wp_filter_nohtml_kses( $value['desc_font_color'] );

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_url'] = wp_filter_nohtml_kses( $value['button_url'] );
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_border_color_opacity'] = wp_filter_nohtml_kses( $value['button_border_color_opacity'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_border_color_hover_opacity'] = wp_filter_nohtml_kses( $value['button_border_color_hover_opacity'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;

        $value['bg_image'] = wp_filter_nohtml_kses( $value['bg_image'] );
        $value['bg_use_overlay'] = ! empty( $value['bg_use_overlay'] ) ? 1 : 0;
        $value['bg_overlay_color'] = wp_filter_nohtml_kses( $value['bg_overlay_color'] );
        $value['bg_overlay_opacity'] = wp_filter_nohtml_kses( $value['bg_overlay_opacity'] );

        $value['use_para'] = ! empty( $value['use_para'] ) ? 1 : 0;


      // フリースペース -----------------------------------------------------------------------
      } elseif ($value['cb_content_select'] == 'free_space') {

        if ( ! isset( $value['show_content'] ) )
          $value['show_content'] = null;
          $value['show_content'] = ( $value['show_content'] == 1 ? 1 : 0 );

        if ( ! isset( $value['free_space'] )) {
          $value['free_space'] = null;
        } else {
          $value['free_space'] = $value['free_space'];
        }

        $value['content_width'] = wp_filter_nohtml_kses( $value['content_width'] );

        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );

        $value['margin_top'] = wp_filter_nohtml_kses( $value['margin_top'] );
        $value['margin_bottom'] = wp_filter_nohtml_kses( $value['margin_bottom'] );

      }

      $input['mobile_contents_builder'][] = $value;

    }

  } //コンテンツビルダーここまで -----------------------------------------------------------------------

  return $input;

};


/**
 * コンテンツビルダー用 コンテンツ選択プルダウン　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
 */
function mobile_the_cb_content_select($cb_index = 'cb_cloneindex', $selected = null) {

  $options = get_design_plus_option();
  $blog_label = $options['blog_label'] ? esc_html( $options['blog_label'] ) : __( 'Blog', 'tcd-w' );
  $news_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );
  $featured_label = $options['featured_label'] ? esc_html( $options['featured_label'] ) : __( 'Featured', 'tcd-w' );
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );

  $cb_content_select = array(
    'design_content' => __('Design content', 'tcd-w'),
    'featured_post_list' => sprintf(__('%s post list', 'tcd-w'), $featured_label),
    'gallery_list' => sprintf(__('%s list', 'tcd-w'), $gallery_label),
    'gallery_category_list' => sprintf(__('%s list', 'tcd-w'), $gallery_category_label),
    'banner_content' => __('Banner content', 'tcd-w'),
    'free_space' => __('Free space', 'tcd-w')
  );

  if ($selected && isset($cb_content_select[$selected])) {
    $add_class = ' hidden';
  } else {
    $add_class = '';
  }

  $out = '<select name="dp_options[mobile_contents_builder]['.esc_attr($cb_index).'][cb_content_select]" class="cb_content_select'.$add_class.'">';
  $out .= '<option value="" style="padding-right: 10px;">'.__("Choose the content", "tcd-w").'</option>';

  foreach($cb_content_select as $key => $value) {
    $attr = '';
    if ($key == $selected) {
      $attr = ' selected="selected"';
    }
    $out .= '<option value="'.esc_attr($key).'"'.$attr.' style="padding-right: 10px;">'.esc_html($value).'</option>';
  }

  $out .= '</select>';

  echo $out; 

}


/**
 * コンテンツビルダー用 コンテンツ設定　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
 */
function mobile_the_cb_content_setting($cb_index = 'cb_cloneindex', $cb_content_select = null, $value = array()) {

  global $content_direction_options, $font_type_options, $content_width_options, $time_options;
  $options = get_design_plus_option();
  $blog_label = $options['blog_label'] ? esc_html( $options['blog_label'] ) : __( 'Blog', 'tcd-w' );
  $news_label = $options['news_label'] ? esc_html( $options['news_label'] ) : __( 'News', 'tcd-w' );
  $featured_label = $options['featured_label'] ? esc_html( $options['featured_label'] ) : __( 'Featured', 'tcd-w' );
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );

?>

<div class="cb_content_wrap cf <?php echo esc_attr($cb_content_select); ?>">

<?php
     // デザインコンテンツ　-------------------------------------------------------------
     if ($cb_content_select == 'design_content') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['headline'])) { $value['headline'] = ''; }
       if (!isset($value['headline_font_size'])) { $value['headline_font_size'] = '20'; }
       if (!isset($value['headline_font_type'])) { $value['headline_font_type'] = 'type3'; }
       if (!isset($value['headline_direction'])) { $value['headline_direction'] = ''; }
       if (!isset($value['headline_show_icon'])) { $value['headline_show_icon'] = ''; }

       if (!isset($value['sub_headline'])) { $value['sub_headline'] = ''; }
       if (!isset($value['sub_headline_font_size'])) { $value['sub_headline_font_size'] = '14'; }

       if (!isset($value['show_news'])) { $value['show_news'] = 1; }
       if (!isset($value['post_num_mobile'])) { $value['post_num_mobile'] = '4'; }
       if (!isset($value['post_type'])) { $value['post_type'] = 'post'; }
       if (!isset($value['post_bg_color'])) { $value['post_bg_color'] = '#f4f4f4'; }
       if (!isset($value['post_order'])) { $value['post_order'] = 'date'; }

       if (!isset($value['desc'])) { $value['desc'] = ''; }
       if (!isset($value['desc_font_size'])) { $value['desc_font_size'] = '14'; }

       if (!isset($value['show_button'])) { $value['show_button'] = ''; }
       if (!isset($value['button_label'])) { $value['button_label'] = ''; }
       if (!isset($value['button_url'])) { $value['button_url'] = ''; }
       if (!isset($value['button_font_color'])) { $value['button_font_color'] = '#ffffff'; }
       if (!isset($value['button_border_color'])) { $value['button_border_color'] = '#950000'; }
       if (!isset($value['button_font_color_hover'])) { $value['button_font_color_hover'] = '#ffffff'; }
       if (!isset($value['button_bg_color_hover'])) { $value['button_bg_color_hover'] = '#780000'; }
       if (!isset($value['button_border_color_hover'])) { $value['button_border_color_hover'] = '#780000'; }
       if (!isset($value['button_animation_type'])) { $value['button_animation_type'] = 'type1'; }
       if (!isset($value['button_target'])) { $value['button_target'] = ''; }

       if (!isset($value['layer_image1'])) { $value['layer_image1'] = ''; }
       if (!isset($value['layer_image2'])) { $value['layer_image2'] = ''; }
       if (!isset($value['layer_image3'])) { $value['layer_image3'] = ''; }
       if (!isset($value['layer_image4'])) { $value['layer_image4'] = ''; }

       if (!isset($value['show_layer_image'])) { $value['show_layer_image'] = ''; }

?>

  <h3 class="cb_content_headline"><?php _e('Design content', 'tcd-w');  ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display design content', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('News ticker setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_news]" type="checkbox" value="1" <?php checked( $value['show_news'], 1 ); ?>><?php _e( 'Display news ticker', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_news'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
      <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_num_mobile]">
       <?php for($post_num=3; $post_num<= 10; $post_num++): ?>
       <option style="padding-right: 10px;" value="<?php echo esc_attr($post_num); ?>" <?php selected( $value['post_num_mobile'], $post_num ); ?>><?php echo esc_html($post_num); ?></option>
       <?php endfor; ?>
      </select>
     </li>
     <li class="cf"><span class="label"><?php _e('Post type', 'tcd-w'); ?></span>
      <select class="cb_news_ticker_post_type" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_type]">
       <option style="padding-right: 10px;" value="post" <?php selected( $value['post_type'], 'post' ); ?>><?php echo esc_html($blog_label); ?></option>
       <option style="padding-right: 10px;" value="featured" <?php selected( $value['post_type'], 'featured' ); ?>><?php echo esc_html($featured_label); ?></option>
       <option style="padding-right: 10px;" value="news" <?php selected( $value['post_type'], 'news' ); ?>><?php echo esc_html($news_label); ?></option>
      </select>
     </li>
     <li class="cf"><span class="label"><?php _e('Post order', 'tcd-w');  ?></span>
      <select class="cb_news_ticker_post_order" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_order]">
       <option class="non_featured_post" value="date" <?php selected($value['post_order'], 'date'); ?>><?php _e('Date', 'tcd-w'); ?></option>
       <option class="featured_post" value="menu_order" <?php selected($value['post_order'], 'menu_order'); ?>><?php _e('Admin order', 'tcd-w'); ?></option>
       <option value="rand" <?php selected($value['post_order'], 'rand'); ?>><?php _e('Random', 'tcd-w'); ?></option>
      </select>
     </li>
     <li class="cf"><span class="label"><?php _e('Background color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_bg_color]" value="<?php echo esc_attr( $value['post_bg_color'] ); ?>" data-default-color="#f4f4f4" class="c-color-picker"></li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><textarea class="full_width" cols="50" rows="2" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea(  $value['headline'] ); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon setting', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('URL', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_url]" value="<?php esc_attr_e( $value['button_url'] ); ?>" /></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="dp_options[mobile_contents_builder][<?php echo esc_attr($cb_index); ?>][button_animation_type]">
       <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
      </select>
     </li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Layer image', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php echo __('Layer image will be displayed at the four corners.', 'tcd-w'); ?></p>
   </div>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index ; ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e( 'Display layer image', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_layer_image'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="image_list">
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Left top', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js mobile_layer_image1_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image1'] ); ?>" id="mobile_layer_image1_<?php echo $cb_index ; ?>" name="dp_options[mobile_contents_builder][<?php echo $cb_index ; ?>][layer_image1]" class="cf_media_id">
        <div class="preview_field"><?php if($value['layer_image1']){ echo wp_get_attachment_image($value['layer_image1'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if( empty($value['layer_image1'])){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div><!-- END list item -->
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Right top', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js mobile_layer_image2_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image2'] ); ?>" id="mobile_layer_image2_<?php echo $cb_index ; ?>" name="dp_options[mobile_contents_builder][<?php echo $cb_index ; ?>][layer_image2]" class="cf_media_id">
        <div class="preview_field"><?php if($value['layer_image2']){ echo wp_get_attachment_image($value['layer_image2'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if( empty($value['layer_image2'])){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div><!-- END list item -->
    </div><!-- END image_list -->
    <div class="image_list">
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Left bottom', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js mobile_layer_image3_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image3'] ); ?>" id="mobile_layer_image3_<?php echo $cb_index ; ?>" name="dp_options[mobile_contents_builder][<?php echo $cb_index ; ?>][layer_image3]" class="cf_media_id">
        <div class="preview_field"><?php if($value['layer_image3']){ echo wp_get_attachment_image($value['layer_image3'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if( empty($value['layer_image3'])){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div><!-- END list item -->
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Right bottom', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js mobile_layer_image4_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image4'] ); ?>" id="mobile_layer_image4_<?php echo $cb_index ; ?>" name="dp_options[mobile_contents_builder][<?php echo $cb_index ; ?>][layer_image4]" class="cf_media_id">
        <div class="preview_field"><?php if($value['layer_image4']){ echo wp_get_attachment_image($value['layer_image4'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if( empty($value['layer_image4'])){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div><!-- END list item -->
    </div><!-- END image_list -->
   </div>

<?php
     // 特集記事　-------------------------------------------------------------
     } elseif ($cb_content_select == 'featured_post_list') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['headline'])) { $value['headline'] = ''; }
       if (!isset($value['headline_font_size'])) { $value['headline_font_size'] = '20'; }
       if (!isset($value['headline_font_type'])) { $value['headline_font_type'] = 'type3'; }
       if (!isset($value['headline_direction'])) { $value['headline_direction'] = ''; }
       if (!isset($value['headline_show_icon'])) { $value['headline_show_icon'] = ''; }

       if (!isset($value['sub_headline'])) { $value['sub_headline'] = ''; }
       if (!isset($value['sub_headline_font_size'])) { $value['sub_headline_font_size'] = '14'; }

       if (!isset($value['post_num_mobile'])) { $value['post_num_mobile'] = '4'; }

       if (!isset($value['large_title_font_size'])) { $value['large_title_font_size'] = '20'; }
       if (!isset($value['small_title_font_size'])) { $value['small_title_font_size'] = '15'; }
       if (!isset($value['desc_font_size'])) { $value['desc_font_size'] = '14'; }
       if (!isset($value['show_category'])) { $value['show_category'] = '1'; }
       if (!isset($value['show_post_num'])) { $value['show_post_num'] = '1'; }

       if (!isset($value['show_button'])) { $value['show_button'] = ''; }
       if (!isset($value['button_label'])) { $value['button_label'] = ''; }
       if (!isset($value['button_font_color'])) { $value['button_font_color'] = '#ffffff'; }
       if (!isset($value['button_border_color'])) { $value['button_border_color'] = '#950000'; }
       if (!isset($value['button_font_color_hover'])) { $value['button_font_color_hover'] = '#ffffff'; }
       if (!isset($value['button_bg_color_hover'])) { $value['button_bg_color_hover'] = '#780000'; }
       if (!isset($value['button_border_color_hover'])) { $value['button_border_color_hover'] = '#780000'; }
       if (!isset($value['button_animation_type'])) { $value['button_animation_type'] = 'type1'; }
       if (!isset($value['button_target'])) { $value['button_target'] = ''; }

?>

  <h3 class="cb_content_headline"><?php printf(__('%s post list', 'tcd-w'), $featured_label); ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php printf(__('Display %s post list', 'tcd-w'), $featured_label); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><textarea class="full_width" cols="50" rows="2" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea(  $value['headline'] ); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon setting', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $featured_label); ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_num_mobile]">
      <?php for($post_num=4; $post_num<= 20; $post_num++): ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($post_num); ?>" <?php selected( $value['post_num_mobile'], $post_num ); ?>><?php echo esc_html($post_num); ?></option>
      <?php endfor; ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of large size post title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][large_title_font_size]" value="<?php esc_attr_e( $value['large_title_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of small size post title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][small_title_font_size]" value="<?php esc_attr_e( $value['small_title_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of description', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Display category', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_category]" type="checkbox" value="1" <?php checked( '1', $value['show_category'] ); ?> /></li>
    <li class="cf"><span class="label"><?php _e('Display post number', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_post_num]" type="checkbox" value="1" <?php checked( '1', $value['show_post_num'] ); ?> /></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2 color_picker_bottom"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="dp_options[mobile_contents_builder][<?php echo esc_attr($cb_index); ?>][button_animation_type]">
       <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
      </select>
     </li>
    </ul>
   </div>

<?php
     // ギャラリー一覧　-------------------------------------------------------------
     } elseif ($cb_content_select == 'gallery_list') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['headline'])) { $value['headline'] = ''; }
       if (!isset($value['headline_font_size'])) { $value['headline_font_size'] = '20'; }
       if (!isset($value['headline_font_type'])) { $value['headline_font_type'] = 'type3'; }
       if (!isset($value['headline_direction'])) { $value['headline_direction'] = ''; }
       if (!isset($value['headline_show_icon'])) { $value['headline_show_icon'] = ''; }

       if (!isset($value['sub_headline'])) { $value['sub_headline'] = ''; }
       if (!isset($value['sub_headline_font_size'])) { $value['sub_headline_font_size'] = '14'; }

       if (!isset($value['desc'])) { $value['desc'] = ''; }
       if (!isset($value['desc_font_size'])) { $value['desc_font_size'] = '14'; }

       if (!isset($value['post_num_mobile'])) { $value['post_num_mobile'] = '4'; }

       if (!isset($value['show_category_sort_button'])) { $value['show_category_sort_button'] = 1; }
       if (!isset($value['show_category_sort_button_icon'])) { $value['show_category_sort_button_icon'] = ''; }
       if (!isset($value['all_label'])) { $value['all_label'] = __( 'ALL', 'tcd-w' );; }
       if (!isset($value['sort_button_font_size'])) { $value['sort_button_font_size'] = '16'; }

       if (!isset($value['category_ids'])) { $value['category_ids'] = ''; }

       if (!isset($value['category_direction'])) { $value['category_direction'] = ''; }
       if (!isset($value['category_font_size'])) { $value['category_font_size'] = '20'; }
       if (!isset($value['category_font_type'])) { $value['category_font_type'] = 'type3'; }
       if (!isset($value['post_font_color'])) { $value['post_font_color'] = '#ffffff'; }
       if (!isset($value['title_font_size'])) { $value['title_font_size'] = '16'; }
       if (!isset($value['animation_type'])) { $value['animation_type'] = 'type1'; }

       if (!isset($value['show_more_button'])) { $value['show_more_button'] = '1'; }
       if (!isset($value['more_label'])) { $value['more_label'] = 'MORE'; }
       if (!isset($value['show_more_label_icon'])) { $value['show_more_label_icon'] = ''; }
       if (!isset($value['load_button_font_size'])) { $value['load_button_font_size'] = '12'; }

?>

  <h3 class="cb_content_headline"><?php printf(__('%s list', 'tcd-w'), $gallery_label); ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php printf(__('Display %s list', 'tcd-w'), $gallery_label); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w'); ?></span><textarea class="full_width" cols="50" rows="2" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea(  $value['headline'] ); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon setting', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Category sort button setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_category_sort_button]" type="checkbox" value="1" <?php checked( $value['show_category_sort_button'], 1 ); ?>><?php _e( 'Display category sort button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_category_sort_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Display icon', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_category_sort_button_icon]" type="checkbox" value="1" <?php checked( $value['show_category_sort_button_icon'], 1 ); ?>></li>
     <li class="cf"><span class="label"><?php _e('Label of all button', 'tcd-w'); ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][all_label]" value="<?php esc_attr_e( $value['all_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sort_button_font_size]" value="<?php esc_attr_e( $value['sort_button_font_size'] ); ?>" /><span>px</span></li>
     <li class="cf">
      <span class="label"><?php _e('Category ID to display', 'tcd-w'); ?></span>
      <textarea class="full_width hankaku" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][category_ids]"><?php echo esc_textarea(  $value['category_ids'] ); ?></textarea>
      <div class="theme_option_message2">
       <p><?php _e('Please enter category id in each row.', 'tcd-w');  ?></p>
      </div>
     </li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $gallery_label); ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Number of post to display', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_num_mobile]">
      <option style="padding-right: 10px;" value="-1" <?php selected( $value['post_num_mobile'], '-1' ); ?>><?php _e('Display all post', 'tcd-w');  ?></option>
      <?php for($post_num=4; $post_num<= 40; $post_num++): if( ($post_num % 4) == 0 ){ ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($post_num); ?>" <?php selected( $value['post_num_mobile'], $post_num ); ?>><?php echo esc_html($post_num); ?></option>
      <?php }; endfor; ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Animation', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][animation_type]">
      <option style="padding-right: 10px;" value="type1" <?php selected( $value['animation_type'], 'type1' ); ?>><?php _e('Fade in', 'tcd-w');  ?></option>
      <option style="padding-right: 10px;" value="type2" <?php selected( $value['animation_type'], 'type2' ); ?>><?php _e('Slide up', 'tcd-w');  ?></option>
      <option style="padding-right: 10px;" value="type3" <?php selected( $value['animation_type'], 'type3' ); ?>><?php _e('Pop up', 'tcd-w');  ?></option>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font direction of category', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][category_direction]" type="checkbox" value="1" <?php checked( $value['category_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of category', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][category_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['category_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of category', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][category_font_size]" value="<?php esc_attr_e( $value['category_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_font_size]" value="<?php esc_attr_e( $value['title_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf color_picker_bottom"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][post_font_color]" value="<?php echo esc_attr( $value['post_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Load button setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_more_button]" type="checkbox" value="1" <?php checked( $value['show_more_button'], 1 ); ?>><?php _e( 'Display load button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_more_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][more_label]" value="<?php esc_attr_e( $value['more_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('Display icon', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_more_label_icon]" type="checkbox" value="1" <?php checked( $value['show_more_label_icon'], 1 ); ?>></li>
     <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][load_button_font_size]" value="<?php esc_attr_e( $value['load_button_font_size'] ); ?>" /><span>px</span></li>
    </ul>
   </div>

<?php
     // ギャラリーカテゴリー一覧　-------------------------------------------------------------
     } elseif ($cb_content_select == 'gallery_category_list') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['category_ids'])) { $value['category_ids'] = ''; }

       if (!isset($value['title_show_icon'])) { $value['title_show_icon'] = ''; }
       if (!isset($value['title_direction'])) { $value['title_direction'] = ''; }
       if (!isset($value['title_font_color'])) { $value['title_font_color'] = '#ffffff'; }
       if (!isset($value['title_font_type'])) { $value['title_font_type'] = 'type3'; }
       if (!isset($value['title_font_size'])) { $value['title_font_size'] = '32'; }
       if (!isset($value['sub_title_font_size'])) { $value['sub_title_font_size'] = '14'; }

?>

  <h3 class="cb_content_headline"><?php printf(__('%s list', 'tcd-w'), $gallery_category_label); ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php printf(__('Display %s list', 'tcd-w'), $gallery_category_label); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Category ID to display', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php _e('Please enter category id in each row.', 'tcd-w');  ?></p>
   </div>
   <textarea class="full_width hankaku" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][category_ids]"><?php echo esc_textarea(  $value['category_ids'] ); ?></textarea>

   <h4 class="theme_option_headline2"><?php printf(__('%s list setting', 'tcd-w'), $gallery_category_label); ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Icon of title', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_show_icon]" type="checkbox" value="1" <?php checked( $value['title_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font direction of title', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_direction]" type="checkbox" value="1" <?php checked( $value['title_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of title', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['title_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font color of title', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_font_color]" value="<?php echo esc_attr( $value['title_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
    <li class="cf"><span class="label"><?php _e('Font size of title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][title_font_size]" value="<?php esc_attr_e( $value['title_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][sub_title_font_size]" value="<?php esc_attr_e( $value['sub_title_font_size'] ); ?>" /><span>px</span></li>
   </ul>

<?php
     // バナーコンテンツ　-------------------------------------------------------------
     } elseif ($cb_content_select == 'banner_content') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['catch'])) { $value['catch'] = ''; }
       if (!isset($value['catch_font_size'])) { $value['catch_font_size'] = '30'; }
       if (!isset($value['catch_font_type'])) { $value['catch_font_type'] = 'type2'; }
       if (!isset($value['catch_font_color'])) { $value['catch_font_color'] = '#ffffff'; }

       if (!isset($value['desc'])) { $value['desc'] = ''; }
       if (!isset($value['desc_font_size'])) { $value['desc_font_size'] = '14'; }
       if (!isset($value['desc_font_type'])) { $value['desc_font_type'] = 'type2'; }
       if (!isset($value['desc_font_color'])) { $value['desc_font_color'] = '#ffffff'; }

       if (!isset($value['show_button'])) { $value['show_button'] = ''; }
       if (!isset($value['button_label'])) { $value['button_label'] = ''; }
       if (!isset($value['button_url'])) { $value['button_url'] = ''; }
       if (!isset($value['button_font_color'])) { $value['button_font_color'] = '#ffffff'; }
       if (!isset($value['button_border_color'])) { $value['button_border_color'] = '#950000'; }
       if (!isset($value['button_border_color_opacity'])) { $value['button_border_color_opacity'] = '1'; }
       if (!isset($value['button_font_color_hover'])) { $value['button_font_color_hover'] = '#ffffff'; }
       if (!isset($value['button_bg_color_hover'])) { $value['button_bg_color_hover'] = '#780000'; }
       if (!isset($value['button_border_color_hover'])) { $value['button_border_color_hover'] = '#780000'; }
       if (!isset($value['button_border_color_hover_opacity'])) { $value['button_border_color_hover_opacity'] = '1'; }
       if (!isset($value['button_animation_type'])) { $value['button_animation_type'] = 'type1'; }
       if (!isset($value['button_target'])) { $value['button_target'] = ''; }

       if (!isset($value['bg_image'])) { $value['bg_image'] = ''; }
       if (!isset($value['bg_use_overlay'])) { $value['bg_use_overlay'] = ''; }
       if (!isset($value['bg_overlay_color'])) { $value['bg_overlay_color'] = '#000000'; }
       if (!isset($value['bg_overlay_opacity'])) { $value['bg_overlay_opacity'] = '0.3'; }

       if (!isset($value['use_para'])) { $value['use_para'] = 1; }
?>

  <h3 class="cb_content_headline"><?php _e('Banner content', 'tcd-w'); ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display banner content', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
   <textarea class="full_width cb-repeater-label" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][catch]"><?php echo esc_textarea(  $value['catch'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][catch_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][catch_font_size]" value="<?php esc_attr_e( $value['catch_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][catch_font_color]" value="<?php echo esc_attr( $value['catch_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="3" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
     <select name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['desc_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_color]" value="<?php echo esc_attr( $value['desc_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('URL', 'tcd-w');  ?></span><input class="full_width" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_url]" value="<?php esc_attr_e( $value['button_url'] ); ?>" /></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#950000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2">
      <span class="label"><?php _e('Transparency of border', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_contents_builder][<?php echo esc_attr( $cb_index ); ?>][button_border_color_opacity]" value="<?php echo esc_attr( $value['button_border_color_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#780000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2">
      <span class="label"><?php _e('Transparency of border on mouseover', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_contents_builder][<?php echo esc_attr( $cb_index ); ?>][button_border_color_hover_opacity]" value="<?php echo esc_attr( $value['button_border_color_hover_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="dp_options[mobile_contents_builder][<?php echo esc_attr($cb_index); ?>][button_animation_type]">
       <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
      </select>
     </li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Background image', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '700'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js mobile_bg_image-<?php echo $cb_index; ?>">
     <input type="hidden" class="cf_media_id" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][bg_image]" id="mobile_bg_image-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['bg_image'] ); ?>">
     <div class="preview_field"><?php if ( $value['bg_image'] ) echo wp_get_attachment_image( $value['bg_image'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( empty($value['bg_image']) ) { echo ' hidden'; }; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e( 'Parallax effect for background image', 'tcd-w' ); ?></h4>
   <div class="theme_option_message2">
    <p><?php _e('You can express a three-dimensional effect and depth background.', 'tcd-w'); ?></p>
    <p><?php _e('If you use parallax effect on background, please upload very high height image.', 'tcd-w'); ?></p>
   </div>
   <p><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][use_para]" type="checkbox" value="1" <?php checked( $value['use_para'], 1 ); ?>><?php _e( 'Use parallax effect', 'tcd-w' ); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e( 'Overlay setting for background image', 'tcd-w' ); ?></h4>
   <p class="displayment_checkbox"><label><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][bg_use_overlay]" type="checkbox" value="1" <?php checked( $value['bg_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['bg_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][bg_overlay_color]" value="<?php echo esc_attr( $value['bg_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf">
      <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][bg_overlay_opacity]" value="<?php echo esc_attr( $value['bg_overlay_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
    </ul>
   </div>

<?php
     // フリースペース　-------------------------------------------------------------
     } elseif ($cb_content_select == 'free_space') {

       if (!isset($value['show_content'])) { $value['show_content'] = 1; }

       if (!isset($value['free_space'])) {
         $value['free_space'] = '';
       }

       if (!isset($value['content_width'])) { $value['content_width'] = 'type1'; }

       if (!isset($value['desc_font_size'])) { $value['desc_font_size'] = '14'; }

       if (!isset($value['margin_top'])) { $value['margin_top'] = '0'; }
       if (!isset($value['margin_bottom'])) { $value['margin_bottom'] = '0'; }
?>
  <h3 class="cb_content_headline"><?php _e('Free space', 'tcd-w');  ?></h3>
  <div class="cb_content">

   <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display free space', 'tcd-w'); ?></span><input name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Content width', 'tcd-w');  ?></h4>
   <ul class="design_radio_button">
    <?php foreach ( $content_width_options as $option ) { ?>
    <li>
     <input type="radio" id="content_width_<?php echo $cb_index; ?>_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][content_width]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $value['content_width'], $option['value'] ); ?> />
     <label for="content_width_<?php echo $cb_index; ?>_<?php esc_attr_e( $option['value'] ); ?>"><?php echo esc_html( $option['label'] ); ?></label>
    </li>
    <?php } ?>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Free space', 'tcd-w');  ?></h4>
   <?php
        wp_editor(
          $value['free_space'],
          'cb_wysiwyg_editor-' . $cb_index,
          array (
            'textarea_name' => 'dp_options[mobile_contents_builder][' . $cb_index . '][free_space]'
          )
       );
   ?>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Top space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][margin_top]" value="<?php esc_attr_e( $value['margin_top'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[mobile_contents_builder][<?php echo $cb_index; ?>][margin_bottom]" value="<?php esc_attr_e( $value['margin_bottom'] ); ?>" /><span>px</span></li>
   </ul>

<?php
     // ボタンの表示　-------------------------------------------------------------
     } else {
?>
  <h3 class="cb_content_headline"><?php echo esc_html($cb_content_select); ?></h3>
  <div class="cb_content">

<?php
     }
?>

   <ul class="button_list cf">
    <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>

  </div><!-- END .cb_content -->

</div><!-- END .cb_content_wrap -->

<?php

} // END mobile_the_cb_content_setting()

?>