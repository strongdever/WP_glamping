<?php

// カテゴリー編集用入力欄を出力 -------------------------------------------------------
function edit_category_custom_fields( $term ) {
	$term_meta = get_option( 'taxonomy_' . $term->term_id, array() );
	$term_meta = array_merge( array(
		'catch' => '',
		'image' => null,
		'use_overlay' => '',
		'overlay_color' => '#000000',
		'overlay_opacity' => '0.3',
	), $term_meta );
?>
<tr class="form-field">
	<th colspan="2">

<div class="custom_category_meta">
 <h3 class="ccm_headline"><?php _e( 'Category page header setting', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
  <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
  <div class="input_field">
   <textarea class="full_width" cols="50" rows="2" name="term_meta[catch]"><?php echo esc_textarea(  $term_meta['catch'] ); ?></textarea>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Background image', 'tcd-w' ); ?></h4>
  <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '1450', '600'); ?></p>
  <div class="input_field">
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js image">
				<input type="hidden" value="<?php if ( $term_meta['image'] ) echo esc_attr( $term_meta['image'] ); ?>" id="image" name="term_meta[image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $term_meta['image'] ) echo wp_get_attachment_image( $term_meta['image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $term_meta['image'] ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p class="displayment_checkbox"><label><input name="term_meta[use_overlay]" type="checkbox" value="1" <?php checked( $term_meta['use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
   <div style="<?php if($term_meta['use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ccc; padding-top:12px;">
     <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="term_meta[overlay_color]" value="<?php echo esc_attr( $term_meta['overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></li>
     <li class="cf"><span class="label"><?php _e('Transparency of overlay', 'tcd-w'); ?></span><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="term_meta[overlay_opacity]" value="<?php echo esc_attr( $term_meta['overlay_opacity'] ); ?>" /><p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p></li>
    </ul>
   </div><!-- END .blog_show_catch -->
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->

 </th>
</tr><!-- END .form-field -->
<?php
}
add_action( 'category_edit_form_fields', 'edit_category_custom_fields' );



// データを保存 -------------------------------------------------------
function save_category_custom_fields( $term_id ) {
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
add_action( 'edited_category', 'save_category_custom_fields' );




?>