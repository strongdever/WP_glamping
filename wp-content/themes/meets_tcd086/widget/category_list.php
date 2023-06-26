<?php

class category_list_widget extends WP_Widget {

  // Constructor //
  function __construct() {
    parent::__construct(
      'category_list_widget',// ID
      __( 'Category list (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'category_list_widget',
        'description' => __('Displays designed category list.', 'tcd-w')
      )
    );
  }

 // Extract Args //
 function widget($args, $instance) {
  extract( $args );
   $title = apply_filters('widget_title', $instance['title']); // the widget title
   $exclude_cat_num = $instance['exclude_cat_num']; // category id to exclude
   $show_count = $instance['show_count'];
   $hierarchical = $instance['hierarchical'];

   // Before widget //
   echo $before_widget;

   // Title of widget //
   if ( $title ) { echo $before_title . $title . $after_title; }

   // Widget output //
?>
<ul>
 <?php
      if($show_count == '1') {
        $string = wp_list_categories(array('title_li' =>'','show_count' => 1, 'echo' => 0, 'hierarchical' => $hierarchical, 'exclude' => $exclude_cat_num));
        $string = preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i','<li$1><a$2 class="clearfix"><span class="title">$3</span></a>',$string);
        $string = preg_replace('/<\/a>\s*\((\d+)\)/','<span class="count">$1</span></a>',$string);
      } else {
        $string = wp_list_categories(array('title_li' =>'','show_count' => 0, 'echo' => 0, 'hierarchical' => $hierarchical, 'exclude' => $exclude_cat_num));
      };
      echo $string;
 ?>
</ul>
<?php

   // After widget //
   echo $after_widget;

} // end function widget


 // Update Settings //
 function update($new_instance, $old_instance) {
  $instance['title'] = strip_tags($new_instance['title']);
  $instance['exclude_cat_num'] = $new_instance['exclude_cat_num'];
  $instance['show_count'] = $new_instance['show_count'];
  $instance['hierarchical'] = $new_instance['hierarchical'];
  return $instance;
 }

 // Widget Control Panel //
 function form($instance) {
  $defaults = array( 'title' => __('Category list', 'tcd-w'), 'exclude_cat_num' => '', 'show_count' => '1', 'hierarchical' => '1');
  $instance = wp_parse_args( (array) $instance, $defaults );
?>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Title', 'tcd-w'); ?></h3>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Exclude category', 'tcd-w'); ?></h3>
 <p><?php _e('Enter a comma-seperated list of category ID numbers, example 2,4,10<br />(Don\'t enter comma for last number).', 'tcd-w'); ?></p>
 <input class="widefat" id="<?php echo $this->get_field_id('exclude_cat_num'); ?>" name="<?php echo $this->get_field_name('exclude_cat_num'); ?>'" type="text" value="<?php echo $instance['exclude_cat_num']; ?>" />
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Display setting', 'tcd-w'); ?></h3>
 <p><label for="<?php echo $this->get_field_id('show_count'); ?>"><input id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_count'] ); ?> /><?php _e('Display post count', 'tcd-w'); ?></label></p>
 <p><label for="<?php echo $this->get_field_id('hierarchical'); ?>"><input id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['hierarchical'] ); ?> /><?php _e('Show hierarchical menu', 'tcd-w'); ?></label></p>
</div>
<?php

  } // end function form
} // end class


function register_category_list_widget() {
	register_widget( 'category_list_widget' );
}
add_action( 'widgets_init', 'register_category_list_widget' );


?>
