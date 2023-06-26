<?php
function support_meta_box() {
  add_meta_box(
    'support_meta_box',//ID of meta box
    __('Display setting', 'tcd-w'),//label
    'show_support_meta_box',//callback function
    'support',// post type
    'side'// context
  );
}
add_action('add_meta_boxes', 'support_meta_box');

function show_support_meta_box() {

  global $post;

  $show_date = get_post_meta($post->ID, 'show_date', true);

  echo '<input type="hidden" name="support_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //“ü—Í—“ ***************************************************************************************************************************************************************************************
?>

<ul>
 <li><label><input name="show_date" type="checkbox" value="1" <?php checked( $show_date, 1 ); ?>><?php _e('Display date', 'tcd-w'); ?></label></li>
</ul>

<?php
}

function save_support_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['support_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['support_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
    'show_date'
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

}
add_action('save_post', 'save_support_meta_box');



?>