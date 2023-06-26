<?php
     get_header();
     $options = get_design_plus_option();
     if ( !empty( get_search_query() ) ) {
       $catch = sprintf( __( 'Search result for %s', 'tcd-w' ), get_search_query() );
     } else {
       $catch = __( 'Search result', 'tcd-w' );
     }
     $catch_font_type = $options['archive_blog_header_catch_font_type'];
     $catch_direction = '';
     $catch_animation_type = $options['archive_blog_header_catch_animation_type'];
     $image_id = $options['archive_blog_header_bg_image'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src($image_id, 'full');
     }
     $use_overlay = $options['archive_blog_header_use_overlay'];
     if($use_overlay) {
       $overlay_color = hex2rgb($options['archive_blog_header_overlay_color']);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = $options['archive_blog_header_overlay_opacity'];
     }
?>
<div id="page_header" <?php if($image_id) { ?>style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center top; background-size:cover;"<?php }; ?>>
 <div id="page_header_inner">
  <?php if($catch){ ?>
  <h3 class="catch animation_<?php echo esc_attr($catch_animation_type); ?> rich_font_<?php echo esc_attr($catch_font_type); ?><?php if($catch_direction){ echo ' type2'; }; ?>"><?php if($catch_animation_type == 'type1') { echo sepText($catch); } else { echo '<span>' . wp_kses_post(nl2br($catch)) . '</span>'; }; ?></h3>
  <?php }; ?>
 </div>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
 <?php }; ?>
</div>

<div id="main_contents" class="no_side_content <?php if (!show_posts_nav()) { echo 'no_nav'; }; ?>">

  <?php if ( empty( get_search_query() ) ) { ?>

  <p id="no_post"><?php _e('Please enter search keyword.', 'tcd-w');  ?></p>

  <?php } else { ?>

 <?php if ( have_posts() ) : ?>

 <div id="blog_list">
  <?php
       while ( have_posts() ) : the_post();
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
   <a class="image_link animate_background" href="<?php the_permalink(); ?>">
    <div class="image_wrap">
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
   </a>
   <div class="title_area">
    <a class="title_link" href="<?php the_permalink(); ?>"><h3 class="title"><span><?php the_title(); ?></span></h3></a>
   </div>
  </article>
  <?php endwhile; ?>
 </div><!-- END #blog_list -->

 <?php get_template_part('template-parts/navigation'); ?>

 <?php else: ?>

 <p id="no_post"><?php _e('No matching result was found.', 'tcd-w');  ?></p>

 <?php endif; ?>

  <?php }; ?>

</div><!-- END #main_contents -->

<?php get_footer(); ?>