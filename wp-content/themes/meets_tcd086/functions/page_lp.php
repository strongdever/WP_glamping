<?php

function lp_meta_box() {
  $options = get_design_plus_option();
  add_meta_box(
    'lp_meta_box',//ID of meta box
    __('LP page setting', 'tcd-w'),//label
    'show_lp_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'lp_meta_box');

function show_lp_meta_box() {

  global $post, $font_type_options;

  // コンテンツビルダー
  $lp_content = get_post_meta( $post->ID, 'lp_content', true );

  echo '<input type="hidden" name="lp_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************
?>

<div class="tcd_custom_field_wrap contents_builder_wrap">

 <div class="theme_option_message">
  <?php echo __( '<p>STEP1: Click add content button.<br />STEP2: Select content from dropdown menu.<br />STEP3: Input data and save the option.</p><br /><p>You can change order by dragging MOVE button and you can delete content by clicking DELETE button.</p>', 'tcd-w' ); ?>
  <?php echo __( '<p>Margins will be automatically adjusted and displayed where the content is not set. You do not have to enter all the content.</p>', 'tcd-w' ); ?>
  <h4 class="content_builder_headline"><?php _e( 'Content image', 'tcd-w' ); ?></h4>
  <ul class="design_button_list cf rebox_group">
   <li><a href="<?php bloginfo('template_url'); ?>/admin/img/lp_page_image_content.jpg" title="<?php _e( 'Image content', 'tcd-w' ); ?>"><?php _e( 'Image content', 'tcd-w' ); ?></a></li>
   <li><a href="<?php bloginfo('template_url'); ?>/admin/img/lp_page_design_content.jpg" title="<?php _e( 'Design content', 'tcd-w' ); ?>"><?php _e( 'Design content', 'tcd-w' ); ?></a></li>
   <li><a href="<?php bloginfo('template_url'); ?>/admin/img/lp_page_image_carousel.jpg" title="<?php _e( 'Image carousel', 'tcd-w' ); ?>"><?php _e( 'Image carousel', 'tcd-w' ); ?></a></li>
   <li><a href="<?php bloginfo('template_url'); ?>/admin/img/lp_page1.jpg" title="<?php _e( 'Complete image', 'tcd-w' ); ?>1"><?php _e( 'Complete image', 'tcd-w' ); ?>1</a></li>
   <li><a href="<?php bloginfo('template_url'); ?>/admin/img/lp_page2.jpg" title="<?php _e( 'Complete image', 'tcd-w' ); ?>2"><?php _e( 'Complete image', 'tcd-w' ); ?>2</a></li>
  </ul>
 </div>


 <?php
      // コンテンツビルダーはここから -----------------------------------------------------------------
 ?>
 <div class="contents_builder">
  <p class="cb_message"><?php _e( 'Click Add content button to start content builder', 'tcd-w' ); ?></p>
  <?php
       if ( $lp_content && is_array( $lp_content ) ) :
         foreach( $lp_content as $key => $content ) :
           $cb_index = 'cb_' . $key . '_' . mt_rand( 0, 999999 );
  ?>
  <div class="cb_row">
   <ul class="cb_button cf">
    <li><span class="cb_move"><?php _e( 'Move', 'tcd-w' ); ?></span></li>
    <li><span class="cb_delete"><?php _e( 'Delete', 'tcd-w' ); ?></span></li>
   </ul>
   <div class="cb_column_area cf">
    <div class="cb_column">
     <input type="hidden" class="cb_index" value="<?php echo $cb_index; ?>">
     <?php
          lp_content_select( $cb_index, $content['cb_content_select'] );
          if ( ! empty( $content['cb_content_select'] ) ) :
            lp_content_content_setting( $cb_index, $content['cb_content_select'], $content );
          endif;
     ?>
    </div><!-- END .cb_column -->
   </div><!-- END .cb_column_area -->
  </div><!-- END .cb_row -->
  <?php
         endforeach;
       endif;
  ?>
 </div><!-- END .contents_builder -->
 <ul class="button_list cf cb_add_row_buttton_area">
  <li><input type="button" value="<?php _e( 'Add content', 'tcd-w' ); ?>" class="button-ml add_row"></li>
 </ul>

 <?php // コンテンツビルダー追加用 非表示 ?>
 <div class="contents_builder-clone hidden">
  <div class="cb_row">
   <ul class="cb_button cf">
    <li><span class="cb_move"><?php _e( 'Move', 'tcd-w' ); ?></span></li>
    <li><span class="cb_delete"><?php _e( 'Delete', 'tcd-w' ); ?></span></li>
   </ul>
   <div class="cb_column_area cf">
    <div class="cb_column">
     <input type="hidden" class="cb_index" value="cb_cloneindex">
       <?php lp_content_select( 'cb_cloneindex' ); ?>
    </div><!-- END .cb_column -->
   </div><!-- END .cb_column_area -->
  </div><!-- END .cb_row -->
  <?php
       foreach ( lp_get_contents() as $key => $value ) :
         lp_content_content_setting( 'cb_cloneindex', $key );
       endforeach;
  ?>
 </div><!-- END .contents_builder-clone -->

</div><!-- END .tcd_custom_field_wrap -->
<?php
}

function save_lp_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['lp_meta_box_nonce']) || !wp_verify_nonce($_POST['lp_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('show_scroll_button','show_content_border','show_child_page_content');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

	// コンテンツビルダー 整形保存
	if ( ! empty( $_POST['lp_content'] ) && is_array( $_POST['lp_content'] ) ) {
		$cb_contents = lp_get_contents();
		$cb_data = array();

		foreach ( $_POST['lp_content'] as $key => $value ) {
			// クローン用はスルー
			if ( 'cb_cloneindex' === $key ) continue;

			// コンテンツデフォルト値に入力値をマージ
			if ( ! empty( $value['cb_content_select'] ) && isset( $cb_contents[$value['cb_content_select']]['default'] ) ) {
				$value = array_merge( (array) $cb_contents[$value['cb_content_select']]['default'], $value );
			}

			// 画像コンテンツ
			if ( 'image_content' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

				$value['headline'] = sanitize_textarea_field($value['headline']);
				$value['headline_font_size'] = absint( $value['headline_font_size'] );
				$value['headline_font_size_mobile'] = absint( $value['headline_font_size_mobile'] );
				$value['headline_font_type'] = sanitize_text_field( $value['headline_font_type'] );
        if ( ! isset( $value['headline_direction'] ) )
          $value['headline_direction'] = null;
          $value['headline_direction'] = ( $value['headline_direction'] == 1 ? 1 : 0 );
        if ( ! isset( $value['headline_show_icon'] ) )
          $value['headline_show_icon'] = null;
          $value['headline_show_icon'] = ( $value['headline_show_icon'] == 1 ? 1 : 0 );

				$value['sub_headline'] = sanitize_textarea_field($value['sub_headline']);
				$value['sub_headline_font_size'] = absint( $value['sub_headline_font_size'] );
				$value['sub_headline_font_size_mobile'] = absint( $value['sub_headline_font_size_mobile'] );

				$value['image1'] = sanitize_text_field( $value['image1'] );
				$value['image2'] = sanitize_text_field( $value['image2'] );
				$value['image3'] = sanitize_text_field( $value['image3'] );
				$value['image_layout'] = sanitize_text_field( $value['image_layout'] );

				$value['desc1'] = $value['desc1'];
				$value['desc2'] = $value['desc2'];
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_size_mobile'] = wp_filter_nohtml_kses( $value['desc_font_size_mobile'] );

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_url'] = wp_filter_nohtml_kses( $value['button_url'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );

        if ( ! isset( $value['show_border'] ) )
          $value['show_border'] = null;
          $value['show_border'] = ( $value['show_border'] == 1 ? 1 : 0 );

        $value['top_space'] = wp_filter_nohtml_kses( $value['top_space'] );
        $value['top_space_mobile'] = wp_filter_nohtml_kses( $value['top_space_mobile'] );
        $value['bottom_space'] = wp_filter_nohtml_kses( $value['bottom_space'] );
        $value['bottom_space_mobile'] = wp_filter_nohtml_kses( $value['bottom_space_mobile'] );

        $value['show_layer_image'] = ! empty( $value['show_layer_image'] ) ? 1 : 0;
        $value['layer_image1'] = wp_filter_nohtml_kses( $value['layer_image1'] );
        $value['layer_image2'] = wp_filter_nohtml_kses( $value['layer_image2'] );
        $value['layer_image3'] = wp_filter_nohtml_kses( $value['layer_image3'] );
        $value['layer_image4'] = wp_filter_nohtml_kses( $value['layer_image4'] );

			// デザインコンテンツ
			} elseif ( 'design_content' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

				$value['headline'] = sanitize_textarea_field($value['headline']);
				$value['headline_font_size'] = absint( $value['headline_font_size'] );
				$value['headline_font_size_mobile'] = absint( $value['headline_font_size_mobile'] );
				$value['headline_font_type'] = sanitize_text_field( $value['headline_font_type'] );
        if ( ! isset( $value['headline_direction'] ) )
          $value['headline_direction'] = null;
          $value['headline_direction'] = ( $value['headline_direction'] == 1 ? 1 : 0 );
        if ( ! isset( $value['headline_show_icon'] ) )
          $value['headline_show_icon'] = null;
          $value['headline_show_icon'] = ( $value['headline_show_icon'] == 1 ? 1 : 0 );

				$value['sub_headline'] = sanitize_textarea_field($value['sub_headline']);
				$value['sub_headline_font_size'] = absint( $value['sub_headline_font_size'] );
				$value['sub_headline_font_size_mobile'] = absint( $value['sub_headline_font_size_mobile'] );

				$value['desc1'] = $value['desc1'];
				$value['desc2'] = $value['desc2'];
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_size_mobile'] = wp_filter_nohtml_kses( $value['desc_font_size_mobile'] );

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_url'] = wp_filter_nohtml_kses( $value['button_url'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );

        if ( ! isset( $value['show_border'] ) )
          $value['show_border'] = null;
          $value['show_border'] = ( $value['show_border'] == 1 ? 1 : 0 );

        $value['top_space'] = wp_filter_nohtml_kses( $value['top_space'] );
        $value['top_space_mobile'] = wp_filter_nohtml_kses( $value['top_space_mobile'] );
        $value['bottom_space'] = wp_filter_nohtml_kses( $value['bottom_space'] );
        $value['bottom_space_mobile'] = wp_filter_nohtml_kses( $value['bottom_space_mobile'] );

				$item_list = array();
				if ( $value['item_list'] && is_array( $value['item_list'] ) ) {
					foreach( array_values( $value['item_list'] ) as $repeater_value ) {
						$item_list[] = array_merge( $cb_contents[$value['cb_content_select']]['item_list_default'], $repeater_value );
					}
				}

        $value['show_layer_image'] = ! empty( $value['show_layer_image'] ) ? 1 : 0;
        $value['layer_image1'] = wp_filter_nohtml_kses( $value['layer_image1'] );
        $value['layer_image2'] = wp_filter_nohtml_kses( $value['layer_image2'] );
        $value['layer_image3'] = wp_filter_nohtml_kses( $value['layer_image3'] );
        $value['layer_image4'] = wp_filter_nohtml_kses( $value['layer_image4'] );

			// 画像カルーセル
			} elseif ( 'image_carousel' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

				$item_list = array();
				if ( $value['item_list'] && is_array( $value['item_list'] ) ) {
					foreach( array_values( $value['item_list'] ) as $repeater_value ) {
						$item_list[] = array_merge( $cb_contents[$value['cb_content_select']]['item_list_default'], $repeater_value );
					}
				}

			// レイヤー画像コンテンツ
			} elseif ( 'layer_image_content' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

				$value['show_layer_image'] = ! empty( $value['show_layer_image'] ) ? 1 : 0;

        $value['image_layout'] = wp_filter_nohtml_kses( $value['image_layout'] );
        $value['image_layout2'] = wp_filter_nohtml_kses( $value['image_layout2'] );
        $value['text_layout'] = wp_filter_nohtml_kses( $value['text_layout'] );
        $value['text_layout2'] = wp_filter_nohtml_kses( $value['text_layout2'] );
        $value['image_layout_mobile'] = wp_filter_nohtml_kses( $value['image_layout_mobile'] );
        $value['image_layout2_mobile'] = wp_filter_nohtml_kses( $value['image_layout2_mobile'] );
        $value['text_layout2_mobile'] = wp_filter_nohtml_kses( $value['text_layout2_mobile'] );
        $value['catch_layout'] = wp_filter_nohtml_kses( $value['catch_layout'] );
        $value['catch_layout_mobile'] = wp_filter_nohtml_kses( $value['catch_layout_mobile'] );

        $value['catch'] = wp_filter_nohtml_kses( $value['catch'] );
        $value['catch_font_size'] = wp_filter_nohtml_kses( $value['catch_font_size'] );
        $value['catch_font_size_mobile'] = wp_filter_nohtml_kses( $value['catch_font_size_mobile'] );
        $value['catch_font_type'] = wp_filter_nohtml_kses( $value['catch_font_type'] );
        $value['catch_font_color'] = wp_filter_nohtml_kses( $value['catch_font_color'] );

        $value['desc'] = wp_filter_nohtml_kses( $value['desc'] );
        $value['desc_mobile'] = wp_filter_nohtml_kses( $value['desc_mobile'] );
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_size_mobile'] = wp_filter_nohtml_kses( $value['desc_font_size_mobile'] );
        $value['desc_font_color'] = wp_filter_nohtml_kses( $value['desc_font_color'] );

        if ( ! isset( $value['show_button'] ) )
          $value['show_button'] = null;
          $value['show_button'] = ( $value['show_button'] == 1 ? 1 : 0 );
        $value['button_label'] = wp_filter_nohtml_kses( $value['button_label'] );
        $value['button_url'] = wp_filter_nohtml_kses( $value['button_url'] );
        $value['button_target'] = ! empty( $value['button_target'] ) ? 1 : 0;
        $value['button_font_color'] = wp_filter_nohtml_kses( $value['button_font_color'] );
        $value['button_border_color'] = wp_filter_nohtml_kses( $value['button_border_color'] );
        $value['button_border_color_opacity'] = wp_filter_nohtml_kses( $value['button_border_color_opacity'] );
        $value['button_font_color_hover'] = wp_filter_nohtml_kses( $value['button_font_color_hover'] );
        $value['button_bg_color_hover'] = wp_filter_nohtml_kses( $value['button_bg_color_hover'] );
        $value['button_border_color_hover'] = wp_filter_nohtml_kses( $value['button_border_color_hover'] );
        $value['button_border_color_hover_opacity'] = wp_filter_nohtml_kses( $value['button_border_color_hover_opacity'] );
        $value['button_animation_type'] = wp_filter_nohtml_kses( $value['button_animation_type'] );

        $value['bg_image'] = wp_filter_nohtml_kses( $value['bg_image'] );
        $value['bg_image_mobile'] = wp_filter_nohtml_kses( $value['bg_image_mobile'] );
        $value['bg_use_overlay'] = ! empty( $value['bg_use_overlay'] ) ? 1 : 0;
        $value['bg_overlay_color'] = wp_filter_nohtml_kses( $value['bg_overlay_color'] );
        $value['bg_overlay_opacity'] = wp_filter_nohtml_kses( $value['bg_overlay_opacity'] );
        $value['image_blur'] = wp_filter_nohtml_kses( $value['image_blur'] );

        $value['image'] = wp_filter_nohtml_kses( $value['image'] );
        $value['image_mobile'] = wp_filter_nohtml_kses( $value['image_mobile'] );
        $value['animation_type'] = wp_filter_nohtml_kses( $value['animation_type'] );

        $value['content_width'] = wp_filter_nohtml_kses( $value['content_width'] );
        $value['content_height'] = wp_filter_nohtml_kses( $value['content_height'] );
        $value['content_height_mobile'] = wp_filter_nohtml_kses( $value['content_height_mobile'] );

			// FAQコンテンツ
			} elseif ( 'faq' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

				$value['headline'] = sanitize_textarea_field($value['headline']);
				$value['headline_font_size'] = absint( $value['headline_font_size'] );
				$value['headline_font_size_mobile'] = absint( $value['headline_font_size_mobile'] );
				$value['headline_font_type'] = sanitize_text_field( $value['headline_font_type'] );
        if ( ! isset( $value['headline_direction'] ) )
          $value['headline_direction'] = null;
          $value['headline_direction'] = ( $value['headline_direction'] == 1 ? 1 : 0 );
        if ( ! isset( $value['headline_show_icon'] ) )
          $value['headline_show_icon'] = null;
          $value['headline_show_icon'] = ( $value['headline_show_icon'] == 1 ? 1 : 0 );

				$value['sub_headline'] = sanitize_textarea_field($value['sub_headline']);
				$value['sub_headline_font_size'] = absint( $value['sub_headline_font_size'] );
				$value['sub_headline_font_size_mobile'] = absint( $value['sub_headline_font_size_mobile'] );

				$value['desc'] = sanitize_textarea_field($value['desc']);
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_size_mobile'] = wp_filter_nohtml_kses( $value['desc_font_size_mobile'] );

				$item_list = array();
				if ( $value['item_list'] && is_array( $value['item_list'] ) ) {
					foreach( array_values( $value['item_list'] ) as $repeater_value ) {
						$item_list[] = array_merge( $cb_contents[$value['cb_content_select']]['item_list_default'], $repeater_value );
					}
				}
				$value['item_list'] = $item_list;
        $value['item_active_color'] = wp_filter_nohtml_kses( $value['item_active_color'] );
        if ( ! isset( $value['item_active_color_use_main'] ) )
          $value['item_active_color_use_main'] = null;
          $value['item_active_color_use_main'] = ( $value['item_active_color_use_main'] == 1 ? 1 : 0 );
				$value['question_font_size'] = absint( $value['question_font_size'] );
				$value['question_font_size_mobile'] = absint( $value['question_font_size_mobile'] );
        $value['answer_font_size'] = wp_filter_nohtml_kses( $value['answer_font_size'] );
        $value['answer_font_size_mobile'] = wp_filter_nohtml_kses( $value['answer_font_size_mobile'] );

        if ( ! isset( $value['show_border'] ) )
          $value['show_border'] = null;
          $value['show_border'] = ( $value['show_border'] == 1 ? 1 : 0 );

        $value['top_space'] = wp_filter_nohtml_kses( $value['top_space'] );
        $value['top_space_mobile'] = wp_filter_nohtml_kses( $value['top_space_mobile'] );
        $value['bottom_space'] = wp_filter_nohtml_kses( $value['bottom_space'] );
        $value['bottom_space_mobile'] = wp_filter_nohtml_kses( $value['bottom_space_mobile'] );

			// フリースペース
			} elseif ( 'free_space' === $value['cb_content_select'] ) {

				$value['show_content'] = ! empty( $value['show_content'] ) ? 1 : 0;

        $value['content_width'] = wp_filter_nohtml_kses( $value['content_width'] );

				$value['headline'] = sanitize_textarea_field($value['headline']);
				$value['headline_font_size'] = absint( $value['headline_font_size'] );
				$value['headline_font_size_mobile'] = absint( $value['headline_font_size_mobile'] );
				$value['headline_font_type'] = sanitize_text_field( $value['headline_font_type'] );
        if ( ! isset( $value['headline_direction'] ) )
          $value['headline_direction'] = null;
          $value['headline_direction'] = ( $value['headline_direction'] == 1 ? 1 : 0 );
        if ( ! isset( $value['headline_show_icon'] ) )
          $value['headline_show_icon'] = null;
          $value['headline_show_icon'] = ( $value['headline_show_icon'] == 1 ? 1 : 0 );

				$value['sub_headline'] = sanitize_textarea_field($value['sub_headline']);
				$value['sub_headline_font_size'] = absint( $value['sub_headline_font_size'] );
				$value['sub_headline_font_size_mobile'] = absint( $value['sub_headline_font_size_mobile'] );

				$value['desc'] = $value['desc'];
        $value['desc_font_size'] = wp_filter_nohtml_kses( $value['desc_font_size'] );
        $value['desc_font_size_mobile'] = wp_filter_nohtml_kses( $value['desc_font_size_mobile'] );

        if ( ! isset( $value['show_border'] ) )
          $value['show_border'] = null;
          $value['show_border'] = ( $value['show_border'] == 1 ? 1 : 0 );

        if ( ! isset( $value['show_border'] ) )
          $value['show_border'] = null;
          $value['show_border'] = ( $value['show_border'] == 1 ? 1 : 0 );

        $value['top_space'] = wp_filter_nohtml_kses( $value['top_space'] );
        $value['top_space_mobile'] = wp_filter_nohtml_kses( $value['top_space_mobile'] );
        $value['bottom_space'] = wp_filter_nohtml_kses( $value['bottom_space'] );
        $value['bottom_space_mobile'] = wp_filter_nohtml_kses( $value['bottom_space_mobile'] );

			}

			$cb_data[] = $value;
		}

		if ( $cb_data ) {
			update_post_meta( $post_id, 'lp_content', $cb_data );
		} else {
			delete_post_meta( $post_id, 'lp_content' );
		}
	}
}
add_action('save_post', 'save_lp_meta_box');


/**
 * コンテンツビルダー コンテンツ一覧取得
 */
function lp_get_contents() {
	return array(
    // 画像コンテンツ
		'image_content' => array(
			'name' => 'image_content',
			'label' => __( 'Image content', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'headline' => '',
				'headline_font_size' => 28,
				'headline_font_size_mobile' => 20,
				'headline_font_type' => 'type3',
				'headline_direction' => '',
				'headline_show_icon' => '',
				'sub_headline' => '',
				'sub_headline_font_size' => 14,
				'sub_headline_font_size_mobile' => 12,
				'image1' => '',
				'image2' => '',
				'image3' => '',
				'image_layout' => 'type1',
				'desc1' => '',
				'desc2' => '',
				'desc_font_size' => 16,
				'desc_font_size_mobile' => 14,
				'show_button' => '',
				'button_label' => '',
				'button_url' => '',
				'button_font_color' => '#ffffff',
				'button_border_color' => '#950000',
				'button_font_color_hover' => '#ffffff',
				'button_bg_color_hover' => '#780000',
				'button_border_color_hover' => '#780000',
				'button_animation_type' => 'type1',
				'button_target' => '',
				'show_border' => '',
				'top_space' => 115,
				'top_space_mobile' => 40,
				'bottom_space' => 115,
				'bottom_space_mobile' => 40,
				'show_layer_image' => '',
				'layer_image1' => '',
				'layer_image2' => '',
				'layer_image3' => '',
				'layer_image4' => '',
			)
		),
    // デザインコンテンツ
		'design_content' => array(
			'name' => 'design_content',
			'label' => __( 'Design content', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'headline' => '',
				'headline_font_size' => 28,
				'headline_font_size_mobile' => 20,
				'headline_font_type' => 'type3',
				'headline_direction' => '',
				'headline_show_icon' => '',
				'sub_headline' => '',
				'sub_headline_font_size' => 14,
				'sub_headline_font_size_mobile' => 12,
				'desc1' => '',
				'desc2' => '',
				'desc_font_size' => 16,
				'desc_font_size_mobile' => 14,
				'show_button' => '',
				'button_label' => '',
				'button_url' => '',
				'button_font_color' => '#ffffff',
				'button_border_color' => '#950000',
				'button_font_color_hover' => '#ffffff',
				'button_bg_color_hover' => '#780000',
				'button_border_color_hover' => '#780000',
				'button_animation_type' => 'type1',
				'button_target' => '',
				'show_border' => '',
				'top_space' => 115,
				'top_space_mobile' => 40,
				'bottom_space' => 115,
				'bottom_space_mobile' => 40,
				'show_layer_image' => '',
				'layer_image1' => '',
				'layer_image2' => '',
				'layer_image3' => '',
				'layer_image4' => '',
				'item_list' => array(),
			),
			'item_list_default' => array(
				'desc' => '',
				'bg_color' => '#ffffff',
				'font_color' => '#000000',
				'image' => '',
			)
		),
    // 画像カルーセル
		'image_carousel' => array(
			'name' => 'image_carousel',
			'label' => __( 'Image carousel', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'item_list' => array(),
			),
			'item_list_default' => array(
				'image' => '',
			)
		),
    // レイヤー画像コンテンツ
		'layer_image_content' => array(
			'name' => 'layer_image_content',
			'label' => __( 'Layer image content', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'show_layer_image' => '',
				'image_layout' => 'type1',
				'image_layout2' => 'type3',
				'image_layout_mobile' => 'type1',
				'image_layout2_mobile' => 'type3',
				'text_layout' => 'type3',
				'text_layout2' => 'type2',
				'text_layout2_mobile' => 'type2',
				'catch_layout' => 'type1',
				'catch_layout_mobile' => 'type2',
				'image' => false,
				'image_mobile' => false,
				'animation_type' => 'type2',
				'catch' => '',
				'catch_font_size' => 24,
				'catch_font_size_mobile' => 20,
				'catch_font_type' => 'type2',
				'catch_font_color' => '#ffffff',
				'desc' => '',
				'desc_mobile' => '',
				'desc_font_size' => 16,
				'desc_font_size_mobile' => 14,
				'desc_font_color' => '#ffffff',
				'show_button' => '',
				'button_label' => '',
				'button_url' => '',
				'button_font_color' => '#ffffff',
				'button_border_color' => '#ffffff',
				'button_border_color_opacity' => '1',
				'button_font_color_hover' => '#ffffff',
				'button_bg_color_hover' => '#780000',
				'button_border_color_hover' => '#780000',
				'button_border_color_hover_opacity' => '1',
				'button_animation_type' => 'type1',
				'button_target' => '',
				'bg_image' => false,
				'bg_image_mobile' => false,
				'bg_use_overlay' => '',
				'bg_overlay_color' => '#000000',
				'bg_overlay_opacity' => '0.3',
				'image_blur' => 'no_blur',
				'content_width' => 500,
				'content_height' => 600,
				'content_height_mobile' => 400,
			)
		),
    // FAQ
		'faq' => array(
			'name' => 'faq',
			'label' => __( 'FAQ', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'headline' => '',
				'headline_font_size' => 28,
				'headline_font_size_mobile' => 20,
				'headline_font_type' => 'type3',
				'headline_direction' => '',
				'headline_show_icon' => '',
				'sub_headline' => '',
				'sub_headline_font_size' => 14,
				'sub_headline_font_size_mobile' => 12,
				'desc' => '',
				'desc_font_size' => 16,
				'desc_font_size_mobile' => 14,
				'item_list' => array(),
				'item_active_color' => '#999999',
				'item_active_color_use_main' => '1',
				'question_font_size' => 16,
				'question_font_size_mobile' => 14,
				'answer_font_size' => 16,
				'answer_font_size_mobile' => 14,
				'show_border' => '',
				'top_space' => 115,
				'top_space_mobile' => 40,
				'bottom_space' => 115,
				'bottom_space_mobile' => 40,
			),
			'item_list_default' => array(
				'question' => '',
				'answer' => '',
			),
		),
    // フリースペース
		'free_space' => array(
			'name' => 'free_space',
			'label' => __( 'Free space', 'tcd-w' ),
			'default' => array(
				'show_content' => 1,
				'content_width' => 'type1',
				'headline' => '',
				'headline_font_size' => 28,
				'headline_font_size_mobile' => 20,
				'headline_font_type' => 'type3',
				'headline_direction' => '',
				'headline_show_icon' => '',
				'sub_headline' => '',
				'sub_headline_font_size' => 14,
				'sub_headline_font_size_mobile' => 12,
				'desc' => '',
				'desc_font_size' => 16,
				'desc_font_size_mobile' => 14,
				'show_border' => '',
				'top_space' => 115,
				'top_space_mobile' => 40,
				'bottom_space' => 115,
				'bottom_space_mobile' => 40,
			)
		)
	);
}

/**
 * コンテンツビルダー用 コンテンツ選択プルダウン
 */
function lp_content_select( $cb_index = 'cb_cloneindex', $selected = null ) {
	$cb_contents = lp_get_contents();

	if ( $selected && isset( $cb_contents[$selected] ) ) {
		$add_class = ' hidden';
	} else {
		$add_class = '';
	}

	$out = '<select name="lp_content[' . esc_attr( $cb_index ) . '][cb_content_select]" class="cb_content_select' . $add_class . '">';
	$out .= '<option value="">' . __( 'Choose the content', 'tcd-w' ) . '</option>';

	foreach ( $cb_contents as $key => $value ) {
		$out .= '<option value="' . esc_attr( $key ) . '"' . selected( $key, $selected, false ) . '>' . esc_html( $value['label'] ) . '</option>';
	}

	$out .= '</select>';

	echo $out;
}

/**
 * コンテンツビルダー用 コンテンツ設定
 */
function lp_content_content_setting( $cb_index = 'cb_cloneindex', $cb_content_select = null, $value = array() ) {

  global $post, $font_type_options, $content_width_options, $content_direction_options, $content_direction_options2, $text_align_options;

	$cb_contents = lp_get_contents();

  $page_content_width = get_post_meta($post->ID, 'page_content_width', true) ?  get_post_meta($post->ID, 'page_content_width', true) : '1200';

	// 不明なコンテンツの場合は終了
	if ( ! $cb_content_select || ! isset( $cb_contents[$cb_content_select] ) ) return false;

	// コンテンツデフォルト値に入力値をマージ
	if ( isset( $cb_contents[$cb_content_select]['default'] ) ) {
		$value = array_merge( (array) $cb_contents[$cb_content_select]['default'], $value );
	}
?>
  <div class="cb_content_wrap cf <?php echo esc_attr( $cb_content_select ); ?>">

  <?php
      // 画像コンテンツ -------------------------------------------------------------------------
      if ( 'image_content' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
   </div>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><textarea class="cb-repeater-label full_width" cols="50" rows="2" name="lp_content[<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea($value['headline']); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span></label><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size_mobile]" value="<?php esc_attr_e( $value['headline_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="lp_content[<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size_mobile]" value="<?php esc_attr_e( $value['sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description (above image)', 'tcd-w');  ?></h4>
   <?php wp_editor( $value['desc1'], 'cb_wysiwyg_editor-desc1-' . $cb_index, array ( 'textarea_name' => 'lp_content[' . $cb_index . '][desc1]' ) ); ?>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size_mobile]" value="<?php esc_attr_e( $value['desc_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Large image', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1030', '540'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js">
     <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][image1]" id="image1-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['image1'] ); ?>">
     <div class="preview_field"><?php if ( $value['image1'] ) echo wp_get_attachment_image( $value['image1'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( ! $value['image1'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Small image', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '515', '315'); ?></p>
   </div>

   <div class="image_list">
    <div class="list_item">
     <h4 class="theme_option_headline4"><span><?php _e('Left image', 'tcd-w'); ?></span></h4>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js">
       <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][image2]" id="image2-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['image2'] ); ?>">
       <div class="preview_field"><?php if ( $value['image2'] ) echo wp_get_attachment_image( $value['image2'], 'medium' ); ?></div>
       <div class="buttton_area">
        <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
        <input type="button" class="cfmf-delete-img button<?php if ( ! $value['image2'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
       </div>
      </div>
     </div>
    </div>
    <div class="list_item">
     <h4 class="theme_option_headline4"><span><?php _e('Right image', 'tcd-w'); ?></span></h4>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js">
       <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][image3]" id="image3-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['image3'] ); ?>">
       <div class="preview_field"><?php if ( $value['image3'] ) echo wp_get_attachment_image( $value['image3'], 'medium' ); ?></div>
       <div class="buttton_area">
        <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
        <input type="button" class="cfmf-delete-img button<?php if ( ! $value['image3'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
       </div>
      </div>
     </div>
    </div>
   </div><!-- END .image_list -->

   <h4 class="theme_option_headline2"><?php _e('Layout of image', 'tcd-w'); ?></h4>
   <ul class="design_radio_button">
    <li>
     <input type="radio" id="image_layout_type1_<?php echo $cb_index; ?>" name="lp_content[<?php echo $cb_index; ?>][image_layout]" value="type1" <?php checked( $value['image_layout'], 'type1' ); ?> />
     <label for="image_layout_type1_<?php echo $cb_index; ?>"><?php _e('Display large image on top', 'tcd-w');  ?></label>
    </li>
    <li>
     <input type="radio" id="image_layout_type2_<?php echo $cb_index; ?>" name="lp_content[<?php echo $cb_index; ?>][image_layout]" value="type2" <?php checked( $value['image_layout'], 'type2' ); ?> />
     <label for="image_layout_type2_<?php echo $cb_index; ?>"><?php _e('Display small image on top', 'tcd-w');  ?></label>
    </li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description (below image)', 'tcd-w');  ?></h4>
   <?php wp_editor( $value['desc2'], 'cb_wysiwyg_editor-desc2' . $cb_index, array ( 'textarea_name' => 'lp_content[' . $cb_index . '][desc2]' ) ); ?>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('URL', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_url]" value="<?php esc_attr_e( $value['button_url'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="checkbox" value="1" <?php checked( $value['button_target'], 1 ); ?>></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="lp_content[<?php echo esc_attr($cb_index); ?>][button_animation_type]">
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
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e( 'Display layer image', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_layer_image'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="image_list">
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Left top', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js layer_image1_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image1'] ); ?>" id="layer_image1_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image1]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image2_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image2'] ); ?>" id="layer_image2_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image2]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image3_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image3'] ); ?>" id="layer_image3_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image3]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image4_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image4'] ); ?>" id="layer_image4_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image4]" class="cf_media_id">
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

   <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display border under content', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="checkbox" value="1" <?php checked( $value['show_border'], 1 ); ?>></li>
    <li class="cf"><span class="label"><?php _e('Top space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space]" value="<?php esc_attr_e( $value['top_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Top space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space_mobile]" value="<?php esc_attr_e( $value['top_space_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space]" value="<?php esc_attr_e( $value['bottom_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space_mobile]" value="<?php esc_attr_e( $value['bottom_space_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->


  <?php
      // デザインコンテンツ -------------------------------------------------------------------------
      elseif ( 'design_content' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
   </div>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><textarea class="cb-repeater-label full_width" cols="50" rows="2" name="lp_content[<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea($value['headline']); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span></label><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size_mobile]" value="<?php esc_attr_e( $value['headline_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="lp_content[<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size_mobile]" value="<?php esc_attr_e( $value['sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description (above content list)', 'tcd-w');  ?></h4>
   <?php wp_editor( $value['desc1'], 'cb_wysiwyg_editor-desc1-' . $cb_index, array ( 'textarea_name' => 'lp_content[' . $cb_index . '][desc1]' ) ); ?>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size_mobile]" value="<?php esc_attr_e( $value['desc_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <?php // リピーターここから -------------------------- ?>
   <h4 class="theme_option_headline2"><?php _e('Content list setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php _e('Click add item button to start this option.<br />You can change order by dragging each headline of option field.', 'tcd-w');  ?></p>
   </div>
   <div class="repeater-wrapper">
    <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
     <?php
          if ( $value['item_list'] && is_array( $value['item_list'] ) ) :
            foreach ( $value['item_list'] as $repeater_key => $repeater_value ) :
               $repeater_value = array_merge( $cb_contents[$cb_content_select]['item_list_default'], $repeater_value );
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'Content', 'tcd-w' ); echo esc_html( $repeater_key + 1 ); ?></h4>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('Background and font color will not be applyed in mobile device.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
       <textarea class="repeater-label large-text" cols="50" rows="5" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][desc]"><?php echo esc_textarea(  $repeater_value['desc'] ); ?></textarea>
       <h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
       <input type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][bg_color]" value="<?php echo esc_attr( isset( $repeater_value['bg_color'] ) ? $repeater_value['bg_color'] : '#ffffff' ); ?>" data-default-color="#ffffff" class="c-color-picker">
       <h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
       <input type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][font_color]" value="<?php echo esc_attr( isset( $repeater_value['font_color'] ) ? $repeater_value['font_color'] : '#000000' ); ?>" data-default-color="#000000" class="c-color-picker">
       <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>">
         <input type="hidden" value="<?php if ( $repeater_value['image'] ) echo esc_attr( $repeater_value['image'] ); ?>" id="lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][image]" class="cf_media_id">
         <div class="preview_field"><?php if ( $repeater_value['image'] ) echo wp_get_attachment_image( $repeater_value['image'], 'medium'); ?></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $repeater_value['image'] ) echo 'hidden'; ?>">
         </div>
        </div>
       </div>
       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete item', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
            endforeach;
          endif;

          $repeater_key = 'addindex';
          $repeater_value = $cb_contents[$cb_content_select]['item_list_default'];
          ob_start();
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'New content', 'tcd-w' ); ?></h4>
      <div class="sub_box_content">
       <div class="theme_option_message2" style="margin-top:20px;">
        <p><?php _e('Background and font color will not be applyed in mobile device.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
       <textarea class="repeater-label large-text" cols="50" rows="5" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][desc]"></textarea>
       <h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
       <input type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][bg_color]" value="#ffffff" data-default-color="#ffffff" class="c-color-picker">
       <h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
       <input type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][font_color]" value="#000000" data-default-color="#000000" class="c-color-picker">
       <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>">
         <input type="hidden" value="" id="lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][image]" class="cf_media_id">
         <div class="preview_field"></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button hidden">
         </div>
        </div>
       </div>
       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete item', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
          $clone = ob_get_clean();
     ?>
    </div><!-- END .repeater -->
    <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
   </div><!-- END .repeater-wrapper -->
   <?php // リピーターここまで -------------------------- ?>

   <h4 class="theme_option_headline2"><?php _e('Description (below content list)', 'tcd-w');  ?></h4>
   <?php wp_editor( $value['desc2'], 'cb_wysiwyg_editor-desc2' . $cb_index, array ( 'textarea_name' => 'lp_content[' . $cb_index . '][desc2]' ) ); ?>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('URL', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_url]" value="<?php esc_attr_e( $value['button_url'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="checkbox" value="1" <?php checked( $value['button_target'], 1 ); ?>></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="lp_content[<?php echo esc_attr($cb_index); ?>][button_animation_type]">
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
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e( 'Display layer image', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_layer_image'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="image_list">
     <div class="list_item">
      <h5 class="theme_option_headline4"><span><?php _e('Left top', 'tcd-w');  ?></span></h5>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js layer_image1_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image1'] ); ?>" id="layer_image1_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image1]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image2_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image2'] ); ?>" id="layer_image2_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image2]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image3_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image3'] ); ?>" id="layer_image3_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image3]" class="cf_media_id">
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
       <div class="cf cf_media_field hide-if-no-js layer_image4_<?php echo $cb_index ; ?>">
        <input type="hidden" value="<?php echo esc_attr( $value['layer_image4'] ); ?>" id="layer_image4_<?php echo $cb_index ; ?>" name="lp_content[<?php echo $cb_index; ?>][layer_image4]" class="cf_media_id">
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

   <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display border under content', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="checkbox" value="1" <?php checked( $value['show_border'], 1 ); ?>></li>
    <li class="cf"><span class="label"><?php _e('Top space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space]" value="<?php esc_attr_e( $value['top_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Top space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space_mobile]" value="<?php esc_attr_e( $value['top_space_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space]" value="<?php esc_attr_e( $value['bottom_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space_mobile]" value="<?php esc_attr_e( $value['bottom_space_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->


  <?php
      // 画像カルーセル -------------------------------------------------------------------------
      elseif ( 'image_carousel' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <?php // リピーターここから -------------------------- ?>
   <h4 class="theme_option_headline2"><?php _e('Image setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php _e('Click add item button to start this option.<br />You can change order by dragging each headline of option field.', 'tcd-w');  ?></p>
    <p><?php _e('Image carousel will be used if registered item is more than 5. Please use as mini image gallery.', 'tcd-w');  ?></p>
   </div>
   <div class="repeater-wrapper">
    <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
     <?php
          if ( $value['item_list'] && is_array( $value['item_list'] ) ) :
            foreach ( $value['item_list'] as $repeater_key => $repeater_value ) :
               $repeater_value = array_merge( $cb_contents[$cb_content_select]['item_list_default'], $repeater_value );
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'Image', 'tcd-w' ); echo esc_html( $repeater_key + 1 ); ?></h4>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>">
         <input type="hidden" value="<?php if ( $repeater_value['image'] ) echo esc_attr( $repeater_value['image'] ); ?>" id="lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][image]" class="cf_media_id">
         <div class="preview_field"><?php if ( $repeater_value['image'] ) echo wp_get_attachment_image( $repeater_value['image'], 'medium'); ?></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $repeater_value['image'] ) echo 'hidden'; ?>">
         </div>
        </div>
       </div>
       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete item', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
            endforeach;
          endif;

          $repeater_key = 'addindex';
          $repeater_value = $cb_contents[$cb_content_select]['item_list_default'];
          ob_start();
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'New image', 'tcd-w' ); ?></h4>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>">
         <input type="hidden" value="" id="lp_content<?php echo $cb_index; ?>_item_list_image<?php echo esc_attr( $repeater_key ); ?>" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][image]" class="cf_media_id">
         <div class="preview_field"></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button hidden">
         </div>
        </div>
       </div>
       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete item', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
          $clone = ob_get_clean();
     ?>
    </div><!-- END .repeater -->
    <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
   </div><!-- END .repeater-wrapper -->
   <?php // リピーターここまで -------------------------- ?>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->

  <?php
      // レイヤー画像コンテンツ -------------------------------------------------------------------------
      elseif ( 'layer_image_content' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e('Background image', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js">
     <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][bg_image]" id="bg_image-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['bg_image'] ); ?>">
     <div class="preview_field"><?php if ( $value['bg_image'] ) echo wp_get_attachment_image( $value['bg_image'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( ! $value['bg_image'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Background image (mobile)', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '750', '1200'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js">
     <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][bg_image_mobile]" id="bg_image_mobile-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['bg_image_mobile'] ); ?>">
     <div class="preview_field"><?php if ( $value['bg_image_mobile'] ) echo wp_get_attachment_image( $value['bg_image_mobile'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( ! $value['bg_image_mobile'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e( 'Overlay setting for background image', 'tcd-w' ); ?></h4>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][bg_use_overlay]" type="checkbox" value="1" <?php checked( $value['bg_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['bg_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][bg_overlay_color]" value="<?php echo esc_attr( $value['bg_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf">
      <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="lp_content[<?php echo $cb_index; ?>][bg_overlay_opacity]" value="<?php echo esc_attr( $value['bg_overlay_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Image blur for background image', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php _e('The higher the number image will be blurry.', 'tcd-w');  ?></p>
   </div>
   <select name="lp_content[<?php echo $cb_index; ?>][image_blur]">
    <?php for($i=1; $i<= 10; $i++): ?>
    <option style="padding-right: 10px;" value="<?php echo esc_attr($i); ?>" <?php selected( $value['image_blur'], $i ); ?>><?php echo esc_html($i); ?></option>
    <?php endfor; ?>
    <option style="padding-right: 10px;" value="no_blur" <?php selected( $value['image_blur'], 'no_blur' ); ?>><?php _e('No image blur', 'tcd-w'); ?></option>
   </select>

   <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
   <textarea class="full_width cb-repeater-label" cols="50" rows="3" name="lp_content[<?php echo $cb_index; ?>][catch]"><?php echo esc_textarea(  $value['catch'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font type', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo $cb_index; ?>][catch_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][catch_font_size]" value="<?php esc_attr_e( $value['catch_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][catch_font_size_mobile]" value="<?php esc_attr_e( $value['catch_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][catch_font_color]" value="<?php echo esc_attr( $value['catch_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="3" name="lp_content[<?php echo $cb_index; ?>][desc]"><?php echo esc_textarea(  $value['desc'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_color]" value="<?php echo esc_attr( $value['desc_font_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description (mobile)', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="3" name="lp_content[<?php echo $cb_index; ?>][desc_mobile]"><?php echo esc_textarea(  $value['desc_mobile'] ); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size_mobile]" value="<?php esc_attr_e( $value['desc_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="lp_content[<?php echo $cb_index; ?>][show_button]" type="checkbox" value="1" <?php checked( $value['show_button'], 1 ); ?>><?php _e( 'Display button', 'tcd-w' ); ?></label></p>
   <div style="<?php if($value['show_button'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <div class="theme_option_message2 cb_button_animation_type1">
     <p><?php _e('Main color will be apply for default background color, and sub color will be apply for mouseover background color.<br>You can change both color from "Color setting" section in "Basic setting" theme option menu.', 'tcd-w'); ?></p>
    </div>
    <div class="theme_option_message2 cb_button_animation_type2">
     <p><?php _e('Default background color will be transparent when you use swipe animation.', 'tcd-w'); ?></p>
    </div>
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('label', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_label]" value="<?php esc_attr_e( $value['button_label'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('URL', 'tcd-w');  ?></span><input class="full_width" type="text" name="lp_content[<?php echo $cb_index; ?>][button_url]" value="<?php esc_attr_e( $value['button_url'] ); ?>" /></li>
     <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][button_target]" type="checkbox" value="1" <?php checked( $value['button_target'], 1 ); ?>></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color]" value="<?php echo esc_attr( $value['button_font_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color]" value="<?php echo esc_attr( $value['button_border_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2">
      <span class="label"><?php _e('Transparency of border', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="lp_content[<?php echo esc_attr( $cb_index ); ?>][button_border_color_opacity]" value="<?php echo esc_attr( $value['button_border_color_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Font color of on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_font_color_hover]" value="<?php echo esc_attr( $value['button_font_color_hover'] ); ?>" data-default-color="#ffffff" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Background color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_bg_color_hover]" value="<?php echo esc_attr( $value['button_bg_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2"><span class="label"><?php _e('Border color on mouseover', 'tcd-w'); ?></span><input type="text" name="lp_content[<?php echo $cb_index; ?>][button_border_color_hover]" value="<?php echo esc_attr( $value['button_border_color_hover'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf cb_button_animation_type2">
      <span class="label"><?php _e('Transparency of border on mouseover', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="lp_content[<?php echo esc_attr( $cb_index ); ?>][button_border_color_hover_opacity]" value="<?php echo esc_attr( $value['button_border_color_hover_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
     <li class="cf"><span class="label"><?php _e('Hover effect', 'tcd-w');  ?></span>
      <select class="cb_button_animation" name="lp_content[<?php echo esc_attr($cb_index); ?>][button_animation_type]">
       <option style="padding-right: 10px;" value="type1" <?php selected( $value['button_animation_type'], 'type1' ); ?>><?php _e('No hover effect', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type2" <?php selected( $value['button_animation_type'], 'type2' ); ?>><?php _e('Swipe animation', 'tcd-w');  ?></option>
       <option style="padding-right: 10px;" value="type3" <?php selected( $value['button_animation_type'], 'type3' ); ?>><?php _e('Diagonal swipe animation', 'tcd-w');  ?></option>
      </select>
     </li>
    </ul>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Display setting for layer image', 'tcd-w'); ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="hidden" value="0"></p>
   <p class="show_layer_image_button"><label><input name="lp_content[<?php echo $cb_index; ?>][show_layer_image]" type="checkbox" value="1" <?php checked( $value['show_layer_image'], 1 ); ?>><?php _e('Display layer image', 'tcd-w'); ?></label></p>

   <div class="layer_image_option" style="<?php if($value['show_layer_image']){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>">

   <h4 class="theme_option_headline2"><?php _e('Layer image', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '600', '600'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js">
     <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][image]" id="image-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['image'] ); ?>">
     <div class="preview_field"><?php if ( $value['image'] ) echo wp_get_attachment_image( $value['image'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( ! $value['image'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Layer image (mobile)', 'tcd-w'); ?></h4>
   <div class="theme_option_message2">
    <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '600', '600'); ?></p>
   </div>
   <div class="image_box cf">
    <div class="cf cf_media_field hide-if-no-js">
     <input type="hidden" class="cf_media_id" name="lp_content[<?php echo $cb_index; ?>][image_mobile]" id="image_mobile-<?php echo $cb_index; ?>" value="<?php echo esc_attr( $value['image_mobile'] ); ?>">
     <div class="preview_field"><?php if ( $value['image_mobile'] ) echo wp_get_attachment_image( $value['image_mobile'], 'medium' ); ?></div>
     <div class="buttton_area">
      <input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
      <input type="button" class="cfmf-delete-img button<?php if ( ! $value['image_mobile'] ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w'); ?>">
     </div>
    </div>
   </div>

   <h4 class="theme_option_headline2"><?php _e('Animation for layer image', 'tcd-w'); ?></h4>
   <select name="lp_content[<?php echo esc_attr( $cb_index ); ?>][animation_type]">
    <option style="padding-right: 10px;" value="type1" <?php selected( $value['animation_type'], 'type1' ); ?>><?php _e('No animation', 'tcd-w'); ?></option>
    <option style="padding-right: 10px;" value="type2" <?php selected( $value['animation_type'], 'type2' ); ?>><?php _e('Fade in', 'tcd-w'); ?></option>
    <option style="padding-right: 10px;" value="type3" <?php selected( $value['animation_type'], 'type3' ); ?>><?php _e('Slide in from left', 'tcd-w'); ?></option>
    <option style="padding-right: 10px;" value="type4" <?php selected( $value['animation_type'], 'type4' ); ?>><?php _e('Slide in from right', 'tcd-w'); ?></option>
   </select>

   </div><!-- END .show_layer_image -->

   <h4 class="theme_option_headline2"><?php _e('Display position setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf layer_image_option" style="<?php if($value['show_layer_image']){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>"><span class="label"><?php _e('Horizontal position of layer image', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][image_layout]">
      <?php foreach ( $content_direction_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['image_layout'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; ?>
     </select>
    </li>
    <li class="cf layer_image_option" style="<?php if($value['show_layer_image']){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>"><span class="label"><?php _e('Vertical position of layer image', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][image_layout2]">
      <?php foreach ( $content_direction_options2 as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['image_layout2'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Horizontal position of text content', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][text_layout]">
      <?php foreach ( $content_direction_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['text_layout'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Vertical position of text content', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][text_layout2]">
      <?php foreach ( $content_direction_options2 as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['text_layout2'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Catchphrase alignment', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][catch_layout]">
      <?php foreach ( $text_align_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_layout'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf layer_image_option" style="<?php if($value['show_layer_image']){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>"><span class="label"><?php _e('Horizontal position of layer image (mobile)', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][image_layout_mobile]">
      <?php foreach ( $content_direction_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['image_layout_mobile'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; ?>
     </select>
    </li>
    <li class="cf layer_image_option" style="<?php if($value['show_layer_image']){ echo 'display:block;'; } else { echo 'display:none;'; }; ?>"><span class="label"><?php _e('Vertical position of layer image (mobile)', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][image_layout2_mobile]">
      <?php foreach ( $content_direction_options2 as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['image_layout2_mobile'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Vertical position of text content (mobile)', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][text_layout2_mobile]">
      <?php foreach ( $content_direction_options2 as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['text_layout2_mobile'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Catchphrase alignment (mobile)', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo esc_attr($cb_index); ?>][catch_layout_mobile]">
      <?php foreach ( $text_align_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['catch_layout_mobile'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Content size setting', 'tcd-w');  ?></h4>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Height of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][content_height]" value="<?php esc_attr_e( $value['content_height'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Height of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][content_height_mobile]" value="<?php esc_attr_e( $value['content_height_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Width of text content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][content_width]" value="<?php esc_attr_e( $value['content_width'] ); ?>" /><span>px</span></li>
   </ul>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->

  <?php
      // FAQ -------------------------------------------------------------------------
      elseif ( 'faq' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
   </div>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><textarea class="cb-repeater-label full_width" cols="50" rows="2" name="lp_content[<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea($value['headline']); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span></label><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size_mobile]" value="<?php esc_attr_e( $value['headline_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="lp_content[<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size_mobile]" value="<?php esc_attr_e( $value['sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
   <textarea class="large-text" cols="50" rows="5" name="lp_content[<?php echo $cb_index; ?>][desc]"><?php echo esc_textarea($value['desc']); ?></textarea>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size_mobile]" value="<?php esc_attr_e( $value['desc_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <?php // リピーターここから -------------------------- ?>
   <h4 class="theme_option_headline2"><?php _e('Question list setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php _e( 'Click add new question button to add question.<br />You can change order by dragging question header.', 'tcd-w' ); ?></p>
   </div>
   <div class="repeater-wrapper">
    <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
     <?php
          if ( $value['item_list'] && is_array( $value['item_list'] ) ) :
            foreach ( $value['item_list'] as $repeater_key => $repeater_value ) :
               $repeater_value = array_merge( $cb_contents[$cb_content_select]['item_list_default'], $repeater_value );
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'Question', 'tcd-w' ); echo esc_html( $repeater_key + 1 ); ?></h4>
      <div class="sub_box_content">

       <h4 class="theme_option_headline2"><?php _e( 'Question', 'tcd-w' ); ?></h4>
       <input class="repeater-label large-text" type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][question]" value="<?php echo esc_html($repeater_value['question']); ?>" />

       <h4 class="theme_option_headline2"><?php _e( 'Answer', 'tcd-w' ); ?></h4>
       <textarea class="large-text" cols="50" rows="5" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][answer]"><?php echo esc_textarea(  $repeater_value['answer'] ); ?></textarea>

       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete question', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
            endforeach;
          endif;

          $repeater_key = 'addindex';
          $repeater_value = $cb_contents[$cb_content_select]['item_list_default'];
          ob_start();
     ?>
     <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $repeater_key ); ?>">
      <h4 class="theme_option_subbox_headline"><?php _e( 'New question', 'tcd-w' ); ?></h4>
      <div class="sub_box_content">

       <h4 class="theme_option_headline2"><?php _e( 'Question', 'tcd-w' ); ?></h4>
       <input class="repeater-label large-text" type="text" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][question]" value="<?php echo esc_html($repeater_value['question']); ?>" />

       <h4 class="theme_option_headline2"><?php _e( 'Answer', 'tcd-w' ); ?></h4>
       <textarea class="large-text" cols="50" rows="5" name="lp_content[<?php echo $cb_index; ?>][item_list][<?php echo esc_attr( $repeater_key ); ?>][answer]"><?php echo esc_textarea(  $repeater_value['answer'] ); ?></textarea>

       <ul class="button_list cf">
        <li><a class="close_sub_box button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
        <li class="delete-row"><a class="button-delete-row button-ml red_button" href="#"><?php echo __( 'Delete content', 'tcd-w' ); ?></a></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php
          $clone = ob_get_clean();
     ?>
    </div><!-- END .repeater -->
    <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add question', 'tcd-w' ); ?></a>
   </div><!-- END .repeater-wrapper -->
   <?php // リピーターここまで -------------------------- ?>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][item_active_color_use_main]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf">
     <span class="label"><?php _e('Color of active question', 'tcd-w'); ?></span>
     <div class="use_main_color">
      <input type="text" name="lp_content[<?php echo $cb_index; ?>][item_active_color]" value="<?php echo esc_attr( $value['item_active_color'] ); ?>" data-default-color="#999999" class="c-color-picker">
     </div>
     <div class="use_main_color_checkbox">
      <label>
       <input name="lp_content[<?php echo $cb_index; ?>][item_active_color_use_main]" type="checkbox" value="1" <?php checked( $value['item_active_color_use_main'], 1 ); ?>>
       <span><?php _e('Apply main color', 'tcd-w'); ?></span>
      </label>
     </div>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of question', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][question_font_size]" value="<?php esc_attr_e( $value['question_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of question (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][question_font_size_mobile]" value="<?php esc_attr_e( $value['question_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of answer', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][answer_font_size]" value="<?php esc_attr_e( $value['answer_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of answer (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][answer_font_size_mobile]" value="<?php esc_attr_e( $value['answer_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display border under content', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="checkbox" value="1" <?php checked( $value['show_border'], 1 ); ?>></li>
    <li class="cf"><span class="label"><?php _e('Top space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space]" value="<?php esc_attr_e( $value['top_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Top space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space_mobile]" value="<?php esc_attr_e( $value['top_space_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space]" value="<?php esc_attr_e( $value['bottom_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space_mobile]" value="<?php esc_attr_e( $value['bottom_space_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->

  <?php
      // フリースペース -------------------------------------------------------------------------
      elseif ( 'free_space' === $cb_content_select ) :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_contents[$cb_content_select]['label'] ); ?></h3>
  <div class="cb_content">

   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="hidden" value="0"></p>
   <p><label><input name="lp_content[<?php echo $cb_index; ?>][show_content]" type="checkbox" value="1" <?php checked( $value['show_content'], 1 ); ?>><?php printf(__('Display %s', 'tcd-w'), $cb_contents[$cb_content_select]['label']); ?></label></p>

   <h4 class="theme_option_headline2"><?php _e('Content width', 'tcd-w');  ?></h4>
   <ul class="design_radio_button">
    <?php foreach ( $content_width_options as $option ) { ?>
    <li>
     <input type="radio" id="content_width_<?php echo $cb_index; ?>_<?php esc_attr_e( $option['value'] ); ?>" name="lp_content[<?php echo $cb_index; ?>][content_width]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $value['content_width'], $option['value'] ); ?> />
     <label for="content_width_<?php echo $cb_index; ?>_<?php esc_attr_e( $option['value'] ); ?>"><?php echo esc_html( $option['label'] ); ?></label>
    </li>
    <?php } ?>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Headline setting', 'tcd-w');  ?></h4>
   <div class="theme_option_message2">
    <p><?php echo __('The icon image can be set in <a href="./admin.php?page=theme_options" target="_blank">theme option</a> basic menu.', 'tcd-w'); ?></p>
   </div>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="hidden" value="0"></p>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><textarea class="cb-repeater-label full_width" cols="50" rows="2" name="lp_content[<?php echo $cb_index; ?>][headline]"><?php echo esc_textarea($value['headline']); ?></textarea></li>
    <li class="cf"><span class="label"><?php _e('Icon', 'tcd-w'); ?></span></label><input name="lp_content[<?php echo $cb_index; ?>][headline_show_icon]" type="checkbox" value="1" <?php checked( $value['headline_show_icon'], 1 ); ?>><?php _e( 'Display icon', 'tcd-w' ); ?></label></li>
    <li class="cf"><span class="label"><?php _e('Font direction', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][headline_direction]" type="checkbox" value="1" <?php checked( $value['headline_direction'], 1 ); ?>><?php _e( 'Display vertically', 'tcd-w' ); ?></li>
    <li class="cf"><span class="label"><?php _e('Font type of headline', 'tcd-w');  ?></span>
     <select name="lp_content[<?php echo $cb_index; ?>][headline_font_type]">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $value['headline_font_type'], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf"><span class="label"><?php _e('Font size of headline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size]" value="<?php esc_attr_e( $value['headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of headline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][headline_font_size_mobile]" value="<?php esc_attr_e( $value['headline_font_size_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subheadline', 'tcd-w'); ?></span><input type="text" class="full_width" name="lp_content[<?php echo $cb_index; ?>][sub_headline]" value="<?php echo esc_attr(  $value['sub_headline'] ); ?>" /></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size]" value="<?php esc_attr_e( $value['sub_headline_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size of subheadline (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][sub_headline_font_size_mobile]" value="<?php esc_attr_e( $value['sub_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Free space', 'tcd-w');  ?></h4>
   <?php wp_editor( $value['desc'], 'cb_wysiwyg_editor-desc-' . $cb_index, array ( 'textarea_name' => 'lp_content[' . $cb_index . '][desc]' ) ); ?>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size]" value="<?php esc_attr_e( $value['desc_font_size'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][desc_font_size_mobile]" value="<?php esc_attr_e( $value['desc_font_size_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <h4 class="theme_option_headline2"><?php _e('Other setting', 'tcd-w');  ?></h4>
   <p class="hidden"><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="hidden" value="0"></p>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Display border under content', 'tcd-w'); ?></span><input name="lp_content[<?php echo $cb_index; ?>][show_border]" type="checkbox" value="1" <?php checked( $value['show_border'], 1 ); ?>></li>
    <li class="cf"><span class="label"><?php _e('Top space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space]" value="<?php esc_attr_e( $value['top_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Top space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][top_space_mobile]" value="<?php esc_attr_e( $value['top_space_mobile'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space]" value="<?php esc_attr_e( $value['bottom_space'] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Bottom space of content (mobile)', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="lp_content[<?php echo $cb_index; ?>][bottom_space_mobile]" value="<?php esc_attr_e( $value['bottom_space_mobile'] ); ?>" /><span>px</span></li>
   </ul>

   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div><!-- END .cb_content -->

  <?php
       // ボタンを表示 ----------------------------------------------------------------------------
       else :
  ?>
  <h3 class="cb_content_headline"><?php echo esc_html( $cb_content_select ); ?></h3>
  <div class="cb_content">
   <ul class="button_list cf">
    <li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
   </ul>
  </div>
  <?php endif; ?>

  </div><!-- END .cb_content_wrap -->
<?php
}

/**
 * クローン用のリッチエディター化処理をしないようにする
 * クローン後のリッチエディター化はjsで行う
 */
function cb_tiny_mce_before_init( $mceInit, $editor_id ) {
  if ( strpos( $editor_id, 'cb_cloneindex' ) !== false ) {
    $mceInit['wp_skip_init'] = true;
  }
  return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'cb_tiny_mce_before_init', 10, 2 );

