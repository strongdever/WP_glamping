<?php

function featured_meta_box() {
  add_meta_box(
    'featured_meta_box',//ID of meta box
   __('Additional data', 'tcd-w'),//label
    'show_featured_meta_box',//callback function
    'featured',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'featured_meta_box');

function show_featured_meta_box() {
  global $post;

  $featured_num = get_post_meta($post->ID, 'featured_num', true);
  $featured_catch = get_post_meta($post->ID, 'featured_catch', true);
  $data_list = get_post_meta($post->ID, 'data_list', true);

  echo '<input type="hidden" name="featured_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************
?>

<div class="tcd_custom_fields">

 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php _e( 'Post number', 'tcd-w' ); ?></h3>
  <input type="text" class="full_width" name="featured_num" value="<?php echo esc_html($featured_num); ?>" />
 </div><!-- END .content -->

 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h3>
  <div class="theme_option_message2">
   <p><?php echo __('This will be displayed in single page.', 'tcd-w'); ?></p>
  </div>
  <input type="text" class="full_width" name="featured_catch" value="<?php echo esc_html($featured_catch); ?>" />
 </div><!-- END .content -->

 <?php // リスト ------------------------------------------------------------------------- ?>
 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php echo __('Data list', 'tcd-w'); ?></h3>
  <div class="theme_option_message2">
   <p><?php echo __('This will be displayed in single page.', 'tcd-w'); ?></p>
  </div>
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

</div><!-- END #tcd_custom_fields -->

<?php
}

function save_featured_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['featured_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['featured_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
    'featured_num','featured_catch'
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
add_action('save_post', 'save_featured_meta_box');




?>
