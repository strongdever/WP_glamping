<?php

class profile_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'profile_widget',// ID
      __( 'Profile (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'profile_widget',
        'description' => __('Displays user profile.', 'tcd-w')
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {

    extract( $args );
    $author_id = $instance['user_id'];
    $desc = $instance['desc'];

    // Before widget //
    echo $before_widget;

    // Title of widget //

    // Widget output //
    $options = get_design_plus_option();

    if(!empty($author_id)){
      $user_data = get_userdata($author_id);
      if(!empty($user_data->show_author)) {
         $facebook = $user_data->facebook_url;
         $twitter = $user_data->twitter_url;
         $insta = $user_data->instagram_url;
         $pinterest = $user_data->pinterest_url;
         $youtube = $user_data->youtube_url;
         $contact = $user_data->contact_url;
         $author_url = get_author_posts_url($author_id);
         $user_url = $user_data->user_url;
?>
<div class="author_profile clearfix">
 <div class="avatar_area"><a class="animate_image" href="<?php echo esc_url($author_url); ?>"><?php echo wp_kses_post(get_avatar($author_id, 300)); ?></a></div>
 <div class="info">
  <div class="info_inner">
   <h4 class="name rich_font"><a href="<?php echo esc_url($author_url); ?>"><?php echo esc_html($user_data->display_name); ?></a></h4>
   <?php if($desc) { ?>
   <p class="desc"><span><?php echo esc_html($desc); ?></span></p>
   <?php }; ?>
   <?php if($facebook || $twitter || $insta || $pinterest || $youtube || $contact || $user_url) { ?>
   <ul class="author_link clearfix">
    <?php if($user_url) { ?><li class="user_url"><a href="<?php echo esc_url($user_url); ?>" target="_blank"><span><?php echo esc_url($user_url); ?></span></a></li><?php }; ?>
    <?php if($facebook) { ?><li class="facebook"><a href="<?php echo esc_url($facebook); ?>" rel="nofollow" target="_blank" title="Facebook"><span>Facebook</span></a></li><?php }; ?>
    <?php if($twitter) { ?><li class="twitter"><a href="<?php echo esc_url($twitter); ?>" rel="nofollow" target="_blank" title="Twitter"><span>Twitter</span></a></li><?php }; ?>
    <?php if($insta) { ?><li class="insta"><a href="<?php echo esc_url($insta); ?>" rel="nofollow" target="_blank" title="Instagram"><span>Instagram</span></a></li><?php }; ?>
    <?php if($pinterest) { ?><li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>" rel="nofollow" target="_blank" title="Pinterest"><span>Pinterest</span></a></li><?php }; ?>
    <?php if($youtube) { ?><li class="youtube"><a href="<?php echo esc_url($youtube); ?>" rel="nofollow" target="_blank" title="Youtube"><span>Youtube</span></a></li><?php }; ?>
    <?php if($contact) { ?><li class="contact"><a href="<?php echo esc_url($contact); ?>" rel="nofollow" target="_blank" title="Contact"><span>Contact</span></a></li><?php }; ?>
   </ul>
   <?php }; ?>
  </div>
 </div>
</div><!-- END .author_profile -->
<?php

      };
    };
    // After widget //
    echo $after_widget;

  } // end function widget


  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['user_id'] = strip_tags($new_instance['user_id']);
    $instance['desc'] = $new_instance['desc'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'user_id' => '', 'desc' => '');
    $instance = wp_parse_args( (array) $instance, $defaults );
?>
<div class="theme_option_message2" style="margin:20px 0 20px;">
 <p><?php _e('Please set information from user <a target="_blank" href="./profile.php">profile page</a>.', 'tcd-w');  ?></p>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('User', 'tcd-w'); ?></h3>
 <?php
      $users = get_users(array(
        'fields' => array('ID','display_name'),
        'role__not_in' => array('subscriber'),
        'orderby' => 'ID',
        'order' => 'ASC'
      ));
      if(!empty($users)){
 ?>
 <select name="<?php echo $this->get_field_name('user_id'); ?>" class="widefat" style="width:100%;">
  <?php
       foreach ( $users as $key => $user ) {
         $user_id = $user->ID;
  ?>
  <option style="padding-right: 10px;" value="<?php echo esc_attr($user_id); ?>" <?php selected( $instance['user_id'], $user_id ); ?>><?php echo esc_attr($user->display_name); ?></option>
  <?php }; ?>
 </select>
 <?php }; ?>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Description', 'tcd-w'); ?></h3>
 <p><textarea style="width:100%; height:150px;" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $instance['desc']; ?></textarea></p>
</div>
<?php

  } // end function form

} // end class


function register_profile_widget() {
	register_widget( 'profile_widget' );
}
add_action( 'widgets_init', 'register_profile_widget' );


?>
