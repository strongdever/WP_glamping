<?php

// カテゴリー編集用入力欄を出力 -------------------------------------------------------
function gallery_category_edit_extra_fields( $term ) {
	$term_meta = get_option( 'taxonomy_' . $term->term_id, array() );
	$term_meta = array_merge( array(
		'sub_title' => '',
		'index_title' => '',
		'catch' => '',
		'desc' => '',
		'short_desc' => '',
		'data_list' => '',
		'data_list_layout' => 'type1',
		'use_overlay' => '',
		'list_image' => null,
		'header_image' => null,
		'header_use_overlay' => '',
		'header_overlay_color' => '#000000',
		'header_overlay_opacity' => '0.3',
		'archive_headline' => __( 'Gallery', 'tcd-w' ),
		'archive_sub_headline' => '',
	), $term_meta );

  $options = get_design_plus_option();
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );
  $current_category_name = $term->name;

?>
<tr class="form-field">
	<th colspan="2">

<div class="custom_category_meta">
 <h3 class="ccm_headline"><?php _e( 'Basic setting', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Subtitle', 'tcd-w');  ?></h4>
  <div class="input_field">
   <input type="text" class="full_width" name="term_meta[sub_title]" value="<?php echo esc_attr($term_meta['sub_title']); ?>" />
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Title for front page category sort button', 'tcd-w');  ?></h4>
  <div class="input_field">
   <input type="text" class="full_width" name="term_meta[index_title]" value="<?php echo esc_attr($term_meta['index_title']); ?>" />
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Background image for category list', 'tcd-w' ); ?></h4>
  <div class="theme_option_message2">
   <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '343', '430'); ?></p>
  </div>
  <div class="input_field">
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js list_image">
				<input type="hidden" value="<?php if ( $term_meta['list_image'] ) echo esc_attr( $term_meta['list_image'] ); ?>" id="list_image" name="term_meta[list_image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $term_meta['list_image'] ) echo wp_get_attachment_image( $term_meta['list_image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $term_meta['list_image'] ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Description for category list', 'tcd-w');  ?></h4>
  <div class="input_field">
   <textarea class="full_width" cols="50" rows="2" name="term_meta[short_desc]"><?php echo esc_textarea(  $term_meta['short_desc'] ); ?></textarea>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php printf(__('Headline of %s post list', 'tcd-w'), $current_category_name); ?></h4>
  <div class="theme_option_message2">
   <p><?php echo __('This headline and subheadline will be displayed on right top of image area in single page.', 'tcd-w'); ?></p>
  </div>
  <div class="input_field">
   <input type="text" class="full_width" name="term_meta[archive_headline]" value="<?php echo esc_attr($term_meta['archive_headline']); ?>" />
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php printf(__('Subheadline of %s post list', 'tcd-w'), $current_category_name); ?></h4>
  <div class="input_field">
   <input type="text" class="full_width" name="term_meta[archive_sub_headline]" value="<?php echo esc_attr($term_meta['archive_sub_headline']); ?>" />
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->

<div class="custom_category_meta">
 <h3 class="ccm_headline"><?php _e( 'Category page setting', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Header catchphrase', 'tcd-w');  ?></h4>
  <div class="input_field">
   <textarea class="full_width" cols="50" rows="2" name="term_meta[catch]"><?php echo esc_textarea(  $term_meta['catch'] ); ?></textarea>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Header background image', 'tcd-w' ); ?></h4>
  <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
  <div class="input_field">
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js header_image">
				<input type="hidden" value="<?php if ( $term_meta['header_image'] ) echo esc_attr( $term_meta['header_image'] ); ?>" id="header_image" name="term_meta[header_image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $term_meta['header_image'] ) echo wp_get_attachment_image( $term_meta['header_image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $term_meta['header_image'] ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Header overlay setting', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p class="hidden"><input name="term_meta[header_use_overlay]" type="hidden" value="0"></p>
   <p class="displayment_checkbox"><label><input name="term_meta[header_use_overlay]" type="checkbox" value="1" <?php checked( $term_meta['header_use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
   <div style="<?php if($term_meta['header_use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="term_meta[header_overlay_color]" value="<?php echo esc_attr( $term_meta['header_overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf">
      <span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span>
      <input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="term_meta[header_overlay_opacity]" value="<?php echo esc_attr( $term_meta['header_overlay_opacity'] ); ?>" />
      <div class="theme_option_message2" style="clear:both; margin:7px 0 0 0;">
       <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
      </div>
     </li>
    </ul>
   </div><!-- END .blog_show_catch -->
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
  <div class="input_field">
   <textarea class="full_width" cols="50" rows="5" name="term_meta[desc]"><?php echo esc_textarea(  $term_meta['desc'] ); ?></textarea>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Content list', 'tcd-w');  ?></h4>
  <div class="theme_option_message2">
   <p><?php _e('Click add item button to start this option.<br />You can change order by dragging each headline of option field.', 'tcd-w');  ?></p>
  </div>
  <div class="input_field">
  <?php
       //繰り返しフィールド -----
       $data_list = $term_meta['data_list'];
  ?>
  <div class="repeater-wrapper">
   <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
    <?php
         if ( $data_list ) :
           foreach ( $data_list as $key => $value ) :
    ?>
    <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
     <h4 class="theme_option_subbox_headline"><?php echo esc_html( ! empty( $data_list[$key]['desc'] ) ? $data_list[$key]['desc'] : __( 'New item', 'tcd-w' ) ); ?></h4>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
      <textarea class="repeater-label full_width" cols="50" rows="5" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][desc]"><?php echo esc_textarea( isset( $data_list[$key]['desc'] ) ? $data_list[$key]['desc'] : '' ); ?></textarea>
      <h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
      <input type="text" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][bg_color]" value="<?php echo esc_textarea( isset( $data_list[$key]['bg_color'] ) ? $data_list[$key]['bg_color'] : '#f2f2f2' ); ?>" data-default-color="#f2f2f2" class="c-color-picker">
      <h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
      <input type="text" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][font_color]" value="<?php echo esc_textarea( isset( $data_list[$key]['font_color'] ) ? $data_list[$key]['font_color'] : '#000000' ); ?>" data-default-color="#000000" class="c-color-picker">
      <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js gallery_category_image<?php echo esc_attr( $key ); ?>">
        <input type="hidden" value="<?php if ( $data_list[$key]['image'] ) echo esc_attr( $data_list[$key]['image'] ); ?>" id="gallery_category_image<?php echo esc_attr( $key ); ?>" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][image]" class="cf_media_id">
        <div class="preview_field"><?php if ( $data_list[$key]['image'] ) echo wp_get_attachment_image( $data_list[$key]['image'], 'medium'); ?></div>
        <div class="button_area">
         <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $data_list[$key]['image'] ) echo 'hidden'; ?>">
        </div>
       </div>
      </div>
      <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php
           endforeach;
         endif;
         $key = 'addindex';
         ob_start();
    ?>
    <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
     <h4 class="theme_option_subbox_headline"><?php echo __( 'New item', 'tcd-w' ); ?></h4>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
      <textarea class="repeater-label full_width" cols="50" rows="5" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][desc]"></textarea>
      <h4 class="theme_option_headline2"><?php _e( 'Background color', 'tcd-w' ); ?></h4>
      <input type="text" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][bg_color]" value="#f2f2f2" data-default-color="#f2f2f2" class="c-color-picker">
      <h4 class="theme_option_headline2"><?php _e( 'Font color', 'tcd-w' ); ?></h4>
      <input type="text" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][font_color]" value="#000000" data-default-color="#000000" class="c-color-picker">
      <h4 class="theme_option_headline2"><?php _e( 'Image', 'tcd-w' ); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js gallery_category_image<?php echo esc_attr( $key ); ?>">
        <input type="hidden" value="" id="gallery_category_image<?php echo esc_attr( $key ); ?>" name="term_meta[data_list][<?php echo esc_attr( $key ); ?>][image]" class="cf_media_id">
        <div class="preview_field"></div>
        <div class="button_area">
         <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button hidden">
        </div>
       </div>
      </div>
      <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php
         $clone = ob_get_clean();
    ?>
   </div><!-- END .repeater -->
   <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
  </div><!-- END .repeater-wrapper -->
  <?php //繰り返しフィールドここまで ----- ?>
  <h4 class="theme_option_headline2"><?php echo __('Layout of content list', 'tcd-w'); ?></h4>
  <ul class="design_radio_button">
   <li>
    <input type="radio" id="gallery_category_data_list_layout_type1" name="term_meta[data_list_layout]" value="type1" <?php checked( $term_meta['data_list_layout'], 'type1' ); ?> />
    <label for="gallery_category_data_list_layout_type1"><?php echo __('Display image first', 'tcd-w'); ?></label>
   </li>
   <li>
    <input type="radio" id="gallery_category_data_list_layout_type2" name="term_meta[data_list_layout]" value="type2" <?php checked( $term_meta['data_list_layout'], 'type2' ); ?> />
    <label for="gallery_category_data_list_layout_type2"><?php echo __('Display description first', 'tcd-w'); ?></label>
   </li>
  </ul>

  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->

</div><!-- END .custom_category_meta -->

 </th>
</tr><!-- END .form-field -->
<?php
}
add_action( 'gallery_category_edit_form_fields', 'gallery_category_edit_extra_fields' );


// データを保存 -------------------------------------------------------
function gallery_category_save_extra_fileds( $term_id ) {
  $new_meta = array();
  if ( isset( $_POST['term_meta'] ) ) {
		$current_term_id = $term_id;
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$new_meta[$key] = $_POST['term_meta'][$key];
			}
		}
	}
  update_option( "taxonomy_$current_term_id", $new_meta );
}
add_action( 'edited_gallery_category', 'gallery_category_save_extra_fileds' );


