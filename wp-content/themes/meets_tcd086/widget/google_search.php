<?php


class google_search extends WP_Widget {

  function __construct() {
    parent::__construct(
      'google_search',// ID
      __( 'Google Custom Search (tcd-w ver)', 'tcd-w' ),
      array(
        'classname' => 'google_search',
        'description' => __('Displays Google Custom Search form.', 'tcd-w')
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {

    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $google_search_id = $instance['google_search_id'];

    // Before widget //
    echo $before_widget;

    // Title of widget //
    if ( $title ) { echo $before_title . $title . $after_title; }

    // Widget output //

?>
<form action="http://www.google.com/cse" method="get" id="searchform" class="searchform">
<div>
 <input id="s" type="text" value="" name="q" />
 <input id="searchsubmit" type="submit" name="sa" value="&#xe915;" />
 <input type="hidden" name="cx" value="<?php echo esc_attr($google_search_id); ?>" />
 <input type="hidden" name="ie" value="UTF-8" />
</div>
</form>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget


  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['google_search_id'] = $new_instance['google_search_id'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'title' => __('Search', 'tcd-w'), 'google_search_id' => '');
    $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p style="margin-bottom:30px;"><?php _e('If you wan\'t to use google custom search for your wordpress, enter your google custom search ID.<br /><a href="http://www.google.com/cse/" target="_blank">Read more about Google custom search page.</a>', 'tcd-w');  ?></p>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Title', 'tcd-w'); ?></h3>
 <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Google custom search ID', 'tcd-w');  ?></h3>
 <input class="widefat" name="<?php echo $this->get_field_name('google_search_id'); ?>'" type="text" value="<?php echo $instance['google_search_id']; ?>" />
</div>
<?php
  } // end function form

} // end class

// End class widget


function register_google_search() {
	register_widget( 'google_search' );
}
add_action( 'widgets_init', 'register_google_search' );


?>