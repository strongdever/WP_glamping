<?php

class post_slider_widget extends WP_Widget {

  function __construct() {
    $options = get_design_plus_option();
    parent::__construct(
      'post_slider_widget',// ID
      __('Post slider (tcd ver)', 'tcd-w'),
      array(
        'classname' => 'post_slider_widget',
        'description' => __('Display post slider.', 'tcd-w'),
      )
    );
  }

  // Extract Args //
  function widget($args, $instance) {

    global $post;

    extract( $args );
    $post_num = $instance['post_num'];
    $post_type = $instance['post_type'];
    $post_order = $instance['post_order'];
    $show_category = $instance['show_category'];
    $show_banner = $instance['show_banner'];
    $show_banner_num = $instance['banner_num'];

    // Before widget //
    echo $before_widget;

    // Title of widget //

    // Widget output //
    if($post_type == 'recent_post') {
      $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order);
    } else {
      $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'meta_key' => $post_type, 'meta_value' => 'on');
    };

    $options = get_design_plus_option();
    $post_slider_query = new WP_Query($args);
?>
<div class="post_slider clearfix">
 <?php
      if ($post_slider_query->have_posts()) {
        $post_count = 1;
        // native ads --------------
        if($show_banner){
          $banner_list = random_native_ads();
          if(!empty($banner_list)){
            $current_banner = 0;
            $total_banner = count($banner_list);
          }
        }
        while ($post_slider_query->have_posts()) : $post_slider_query->the_post();
          $category = wp_get_post_terms( $post->ID, 'category' , array( 'orderby' => 'term_order' ));
          if ( $category && ! is_wp_error($category) ) {
            foreach ( $category as $cat ) :
              $cat_name = $cat->name;
              $cat_id = $cat->term_id;
              $cat_url = get_term_link($cat_id,'category');
              break;
            endforeach;
          };
          if(has_post_thumbnail()) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size2' );
          } elseif($options['no_image1']) {
            $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
          } else {
            $image = array();
            $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
          }
 ?>
 <article class="item">
  <?php if ( $show_category && $category && ! is_wp_error($category) ) { ?>
  <a class="category" href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
  <?php }; ?>
  <a class="link animate_background" href="<?php the_permalink(); ?>">
   <div class="image_wrap">
    <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   </div>
   <div class="title_area">
    <h4 class="title"><span><?php the_title_attribute(); ?></span></h4>
   </div>
  </a>
 </article>
 <?php
      // native ads ------------------
      if(!empty($banner_list) && $show_banner && ($post_count % $show_banner_num == 0) ){
        $banner_num = $banner_list[$current_banner];
        if($total_banner <= $current_banner+1){
          $current_banner = 0;
        } else {
          $current_banner++;
        }
        $background_color = ($options['pr_banner_label_bg_color_use_main'.$banner_num] != 1) ? $options['pr_banner_label_bg_color'.$banner_num] : $options['main_color'];
        $image = wp_get_attachment_image_src( $options['pr_banner_image'.$banner_num], 'size1');
 ?>
 <article class="item ads">
  <?php if ( $options['show_pr_banner_label'.$banner_num] && $options['pr_banner_label'.$banner_num] ) { ?>
  <p class="category pr_label" style="background:<?php echo esc_attr($background_color); ?>;"><?php echo esc_html($options['pr_banner_label'.$banner_num]); ?></p>
  <?php }; ?>
  <a class="link animate_background" href="<?php if($options['pr_banner_url'.$banner_num]) { echo esc_url($options['pr_banner_url'.$banner_num]); }; ?>" <?php if($options['pr_banner_target'.$banner_num]){ echo 'target="_blank"'; }; ?>>
   <div class="image_wrap">
    <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   </div>
   <div class="title_area">
    <h4 class="title"><span><?php echo esc_html($options['pr_banner_title'.$banner_num]); ?></span></h4>
    <?php if($options['pr_banner_client'.$banner_num]) { ?><p class="date client"><?php echo esc_html($options['pr_banner_client'.$banner_num]); ?></p><?php }; ?>
   </div>
  </a>
 </article>
 <?php }; // END native ad ?>
 <?php $post_count++; endwhile; wp_reset_query(); }; ?>
</div>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget


  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['post_num'] = $new_instance['post_num'];
    $instance['post_type'] = $new_instance['post_type'];
    $instance['post_order'] = $new_instance['post_order'];
    $instance['show_category'] = $new_instance['show_category'];
    $instance['show_banner'] = $new_instance['show_banner'];
    $instance['banner_num'] = $new_instance['banner_num'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array('post_num' => 3, 'post_type' => 'recent_post', 'post_order' => 'rand', 'show_category' => '1', 'show_banner' => '', 'banner_num' => '3');
    $instance = wp_parse_args( (array) $instance, $defaults );
    $options = get_design_plus_option();
?>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Post type', 'tcd-w'); ?></h3>
 <select name="<?php echo $this->get_field_name('post_type'); ?>" class="widefat" style="width:100%;">
  <option value="recent_post" <?php selected('recent_post', $instance['post_type']); ?>><?php _e('All post', 'tcd-w'); ?></option>
  <option value="recommend_post" <?php selected('recommend_post', $instance['post_type']); ?>><?php _e('Recommend post1', 'tcd-w'); ?></option>
  <option value="recommend_post2" <?php selected('recommend_post2', $instance['post_type']); ?>><?php _e('Recommend post2', 'tcd-w'); ?></option>
  <option value="pickup_post" <?php selected('featured_post', $instance['post_type']); ?>><?php _e('Featured post', 'tcd-w'); ?></option>
 </select>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Number of post', 'tcd-w'); ?></h3>
 <select name="<?php echo $this->get_field_name('post_num'); ?>" class="widefat" style="width:100%;">
  <option value="2" <?php selected('2', $instance['post_num']); ?>>2</option>
  <option value="3" <?php selected('3', $instance['post_num']); ?>>3</option>
  <option value="4" <?php selected('4', $instance['post_num']); ?>>4</option>
  <option value="5" <?php selected('5', $instance['post_num']); ?>>5</option>
  <option value="6" <?php selected('6', $instance['post_num']); ?>>6</option>
  <option value="7" <?php selected('7', $instance['post_num']); ?>>7</option>
  <option value="8" <?php selected('8', $instance['post_num']); ?>>8</option>
  <option value="9" <?php selected('9', $instance['post_num']); ?>>9</option>
  <option value="10" <?php selected('10', $instance['post_num']); ?>>10</option>
 </select>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Post order', 'tcd-w'); ?></h3>
 <select name="<?php echo $this->get_field_name('post_order'); ?>" class="widefat" style="width:100%;">
  <option value="date" <?php selected('date', $instance['post_order']); ?>><?php _e('Post date', 'tcd-w'); ?></option>
  <option value="rand" <?php selected('rand', $instance['post_order']); ?>><?php _e('Random', 'tcd-w'); ?></option>
 </select>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Display setting', 'tcd-w'); ?></h3>
 <p>
  <input id="<?php echo $this->get_field_id('show_category'); ?>" name="<?php echo $this->get_field_name('show_category'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_category'] ); ?> />
  <label for="<?php echo $this->get_field_id('show_category'); ?>"><?php _e('Display category', 'tcd-w'); ?></label>
 </p>
</div>
<div class="tcd_widget_content">
 <h3 class="tcd_widget_headline"><?php _e('Native ads setting', 'tcd-w'); ?></h3>
 <p class="displayment_checkbox"><label><input name="<?php echo $this->get_field_name('show_banner'); ?>" type="checkbox" value="1" <?php checked( $instance['show_banner'], 1 ); ?>><?php _e( 'Display native ads', 'tcd-w' ); ?></label></p>
 <div style="<?php if($instance['show_banner'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
  <div class="theme_option_message2">
   <p><?php _e('Native ads will be displayed randomly at intervals of the number of articles set below.', 'tcd-w'); ?></p>
  </div>
  <p><input class="hankaku" style="width:70px;" type="number" max="9999" min="1" step="1" name="<?php echo $this->get_field_name('banner_num'); ?>" value="<?php echo esc_attr( $instance['banner_num'] ); ?>" /></p>
 </div>
</div>
<?php

  } // end function form

} // end class


function register_post_slider_widget() {
	register_widget( 'post_slider_widget' );
}
add_action( 'widgets_init', 'register_post_slider_widget' );


?>
