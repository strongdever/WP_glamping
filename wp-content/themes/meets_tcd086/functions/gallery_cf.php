<?php

function gallery_meta_box() {
  add_meta_box(
    'gallery_meta_box',//ID of meta box
   __('Additional data', 'tcd-w'),//label
    'show_gallery_meta_box',//callback function
    'gallery',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'gallery_meta_box');

function show_gallery_meta_box() {
  global $post;

  $options = get_design_plus_option();
  $gallery_label = $options['gallery_label'] ? esc_html( $options['gallery_label'] ) : __( 'Gallery', 'tcd-w' );

  $gallery_link_button_label = get_post_meta($post->ID, 'gallery_link_button_label', true);
  $gallery_link_button_url = get_post_meta($post->ID, 'gallery_link_button_url', true);
  $gallery_link_button_target = get_post_meta($post->ID, 'gallery_link_button_target', true);
  $data_list = get_post_meta($post->ID, 'data_list', true);

  echo '<input type="hidden" name="gallery_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************
?>

<div class="tcd_custom_fields">

 <h3 class="theme_option_headline2"><?php printf(__('Image for %s list', 'tcd-w'), $gallery_label); ?></h3>
 <div class="theme_option_message2">
  <p><?php printf(__('This image will be used in %s list in front page and archive page.', 'tcd-w'), $gallery_label); ?></p>
  <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '480', '780'); ?></p>
 </div>
 <?php mlcf_media_form('gallery_list_image', __('Image', 'tcd-w')); ?>

 <h3 class="theme_option_headline2"><?php _e( 'Image list', 'tcd-w' ); ?></h3>
 <div class="theme_option_message2">
  <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '230', '150'); ?></p>
 </div>
 <div class="image_list">
  <div class="list_item">
   <h5 class="theme_option_headline4"><span><?php _e('Image', 'tcd-w');  ?>1</span></h5>
   <?php mlcf_media_form('gallery_image1', __('Image', 'tcd-w')); ?>
  </div><!-- END list item -->
  <div class="list_item">
   <h5 class="theme_option_headline4"><span><?php _e('Image', 'tcd-w');  ?>2</span></h5>
   <?php mlcf_media_form('gallery_image2', __('Image', 'tcd-w')); ?>
  </div><!-- END list item -->
 </div>
 <div class="image_list">
  <div class="list_item">
   <h5 class="theme_option_headline4"><span><?php _e('Image', 'tcd-w');  ?>3</span></h5>
   <?php mlcf_media_form('gallery_image3', __('Image', 'tcd-w')); ?>
  </div><!-- END list item -->
  <div class="list_item">
   <h5 class="theme_option_headline4"><span><?php _e('Image', 'tcd-w');  ?>4</span></h5>
   <?php mlcf_media_form('gallery_image4', __('Image', 'tcd-w')); ?>
  </div><!-- END list item -->
 </div>

 <?php // リスト ------------------------------------------------------------------------- ?>
 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php echo __('Data list', 'tcd-w'); ?></h3>
  <?php //繰り返しフィールド ----- ?>
  <div class="repeater-wrapper">
   <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
    <?php
         if ( $data_list ) :
           foreach ( $data_list as $key => $value ) :
    ?>
    <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
     <h4 class="theme_option_subbox_headline"><?php echo esc_html( ! empty( $data_list[$key]['headline'] ) ? $data_list[$key]['headline'] : __( 'New item', 'tcd-w' ) ); ?></h4>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
      <p><input class="repeater-label full_width" type="text" name="data_list[<?php echo esc_attr( $key ); ?>][headline]" value="<?php echo esc_attr( isset( $data_list[$key]['headline'] ) ? $data_list[$key]['headline'] : '' ); ?>" /></p>
      <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
      <p><input class="full_width" type="text" name="data_list[<?php echo esc_attr( $key ); ?>][desc]" value="<?php echo esc_attr( isset( $data_list[$key]['desc'] ) ? $data_list[$key]['desc'] : '' ); ?>" /></p>
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
     <h4 class="theme_option_subbox_headline"><?php echo esc_html( ! empty( $data_list[$key]['headline'] ) ? $data_list[$key]['headline'] : __( 'New item', 'tcd-w' ) ); ?></h4>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
      <p><input class="repeater-label full_width" type="text" name="data_list[<?php echo esc_attr( $key ); ?>][headline]" value="<?php echo esc_attr( isset( $data_list[$key]['headline'] ) ? $data_list[$key]['headline'] : '' ); ?>" /></p>
      <h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
      <p><input class="full_width" type="text" name="data_list[<?php echo esc_attr( $key ); ?>][desc]" value="<?php echo esc_attr( isset( $data_list[$key]['desc'] ) ? $data_list[$key]['desc'] : '' ); ?>" /></p>
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
 </div><!-- END .content -->

 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php _e( 'Link button', 'tcd-w' ); ?></h3>
  <ul class="option_list">
   <li class="cf"><span class="label"><?php _e('label', 'tcd-w'); ?></span><input class="full_width" type="text" name="gallery_link_button_label" value="<?php echo esc_attr( $gallery_link_button_label ); ?>" /></li>
   <li class="cf"><span class="label"><?php _e('URL', 'tcd-w'); ?></span><input class="full_width" type="text" name="gallery_link_button_url" value="<?php echo esc_attr( $gallery_link_button_url ); ?>"></li>
   <li class="cf"><span class="label"><?php _e('Open link in new window', 'tcd-w'); ?></span><input name="gallery_link_button_target" type="checkbox" value="1" <?php checked( $gallery_link_button_target, 1 ); ?>></li>
  </ul>
 </div><!-- END .content -->

</div><!-- END #tcd_custom_fields -->

<?php
}

function save_gallery_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['gallery_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['gallery_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array(
    'gallery_list_image','gallery_image1','gallery_image2','gallery_image3','gallery_image4',
    'gallery_link_button_label','gallery_link_button_url','gallery_link_button_target'
  );
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

  // repeater save or delete
  $cf_keys = array( 'data_list' );
  foreach ( $cf_keys as $cf_key ) {
    $old = get_post_meta( $post_id, $cf_key, true );

    if ( isset( $_POST[$cf_key] ) && is_array( $_POST[$cf_key] ) ) {
      $new = array_values( $_POST[$cf_key] );
    } else {
      $new = false;
    }

    if ( $new && $new != $old ) {
      update_post_meta( $post_id, $cf_key, $new );
    } elseif ( ! $new && $old ) {
      delete_post_meta( $post_id, $cf_key, $old );
    }
  }

}
add_action('save_post', 'save_gallery_meta_box');




?>
