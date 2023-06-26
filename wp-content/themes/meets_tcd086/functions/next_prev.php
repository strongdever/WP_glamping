<?php

function next_prev_post_link() {

  $options = get_design_plus_option();
  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);

  if ($prev_post) {
    $post_id = $prev_post->ID;
    if(has_post_thumbnail($post_id)) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'size2' );
    } elseif($options['no_image1']) {
      $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
    } else {
      $image = array();
      $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image1.gif";
    }
?>
<div class="item prev_post clearfix">
 <a class="animate_background" href="<?php echo get_permalink($post_id); ?>">
  <div class="image_wrap">
   <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
  </div>
  <div class="title_area">
   <p class="title"><span><?php the_title_attribute('post='.$post_id); ?></span></p>
   <p class="nav"><?php echo __('Prev post', 'tcd-w'); ?></p>
  </div>
 </a>
</div>
<?php
  };
  if ($next_post) {
    $post_id = $next_post->ID;
    if(has_post_thumbnail($post_id)) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'size2' );
    } elseif($options['no_image1']) {
      $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
    } else {
      $image = array();
      $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image1.gif";
    }
?>
<div class="item next_post clearfix">
 <a class="animate_background" href="<?php echo get_permalink($post_id); ?>">
  <div class="image_wrap">
   <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
  </div>
  <div class="title_area">
   <p class="title"><span><?php the_title_attribute('post='.$post_id); ?></span></p>
   <p class="nav"><?php echo __('Next post', 'tcd-w'); ?></p>
  </div>
 </a>
</div>
<?php
  };

}


function next_prev_post_link2() {

  $options = get_design_plus_option();
  $prev_post = get_adjacent_post(true, '', true, 'gallery_category');
  $next_post = get_adjacent_post(true, '', false, 'gallery_category');

  if ($prev_post) {
    $post_id = $prev_post->ID;
?>
<div class="item prev_post clearfix">
 <a href="<?php echo get_permalink($post_id); ?>"><span><?php echo __('Prev post', 'tcd-w'); ?></span></a>
</div>
<?php
  };
  if ($next_post) {
    $post_id = $next_post->ID;
?>
<div class="item next_post clearfix">
 <a href="<?php echo get_permalink($post_id); ?>"><span><?php echo __('Next post', 'tcd-w'); ?></span></a>
</div>
<?php
  };

}


// add class to posts_nav_link()
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}
function posts_link_attributes_2() {
    return 'class="prev"';
}


?>