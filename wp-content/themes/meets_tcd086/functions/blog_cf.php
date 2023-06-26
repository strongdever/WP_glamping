<?php
function blog_meta_box() {
  $post_types = array ( 'post', 'page', 'news');
  add_meta_box(
    'blog_meta_box',//ID of meta box
    __('Other options', 'tcd-w'),//label
    'show_blog_meta_box',//callback function
    $post_types,// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'blog_meta_box');

function show_blog_meta_box() {
  global $post, $layout_options;

  $pagenation_type_option = array(
    'type1' => array( 'value' => 'type1', 'label' => __( 'Page numbers', 'tcd-w' ) ),
    'type2' => array( 'value' => 'type2', 'label' => __( 'Read more button', 'tcd-w' ) ),
    'type3' => array( 'value' => 'type3', 'label' => __( 'Use theme options settings', 'tcd-w' ) )
  );
  $pagenation_type = get_post_meta($post->ID, 'pagenation_type', true) ?  get_post_meta($post->ID, 'pagenation_type', true) : 'type3';

  $side_content_layout = get_post_meta($post->ID, 'side_content_layout', true) ?  get_post_meta($post->ID, 'side_content_layout', true) : 'type0';

  echo '<input type="hidden" name="blog_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //“ü—Í—“ ***************************************************************************************************************************************************************************************
?>
<div class="tcd_custom_fields">

  <?php global $pagenow; ?>

  <div class="tcd_cf_content">
   <h3 class="tcd_cf_headline"><?php _e( 'Pagenation type', 'tcd-w' ); ?></h3>
   <select name="pagenation_type">
    <?php foreach ($pagenation_type_option as $option) : ?>
    <option value="<?php echo esc_attr($option['value']); ?>" <?php selected( $pagenation_type, $option['value'] ); ?>><?php echo esc_html($option['label']); ?></option>
    <?php endforeach; ?>
   </select>
  </div><!-- END .content -->

  <div class="tcd_cf_content" <?php if ( 'post.php' === $pagenow && isset($_GET['post']) && 'page' === get_post_type($_GET['post']) || 'post-new.php' === $pagenow && isset($_GET['post_type']) && 'page' === $_GET['post_type']){ echo 'style="display:none;"'; }; ?> >
   <h3 class="tcd_cf_headline"><?php _e( 'Side content position', 'tcd-w' ); ?></h3>
   <select name="side_content_layout" id="side_content_layout">
    <?php $i = 1; foreach ( $layout_options as $option ) { if($i != 2){ ?>
    <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $side_content_layout, $option['value'] ); ?>><?php echo $option['label']; ?></option>
    <?php }; $i++; }; ?>
   </select>
  </div><!-- END .content -->

</div><!-- END #tcd_custom_fields -->

<?php
}

function save_blog_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['blog_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['blog_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array('pagenation_type','side_content_layout');
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
add_action('save_post', 'save_blog_meta_box');



?>