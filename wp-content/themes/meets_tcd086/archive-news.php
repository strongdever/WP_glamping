<?php
     get_header();
     $options = get_design_plus_option();
     $catch = $options['archive_news_header_catch'];
     $catch_font_type = $options['archive_news_header_catch_font_type'];
     $catch_direction = $options['archive_news_header_catch_direction'];
     $catch_animation_type = $options['archive_news_header_catch_animation_type'];
     $image_id = $options['archive_news_header_bg_image'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src($image_id, 'full');
     }
     $use_overlay = $options['archive_news_header_use_overlay'];
     if($use_overlay) {
       $overlay_color = hex2rgb($options['archive_news_header_overlay_color']);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = $options['archive_news_header_overlay_opacity'];
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

 <?php
      // headline ------------------------------------------
      $headline = $options['archive_news_headline'];
      if($headline){
        $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
        $show_icon = $options['archive_news_headline_show_icon'];
        $sub_headline = $options['archive_news_sub_headline'];
        $headline_direction = $options['archive_news_headline_direction'];
        $headline_font_type = $options['archive_news_headline_font_type'];
  ?>
 <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
  <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
  <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span></h3>
 </div>
 <?php }; ?>

 <?php if ( have_posts() ) : ?>

 <div id="news_list">
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
  <article class="item<?php if(!$options['archive_news_show_thumbnail']){ echo ' no-image'; }; ?>">
   <a class="link animate_background" href="<?php the_permalink(); ?>">
    <?php if($options['archive_news_show_thumbnail']): ?>
    <div class="image_wrap">
     <?php if ($options['archive_news_show_date']){ ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></p><?php }; ?>
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
    <?php endif; ?>
    <div class="title_area">
     <?php if(!$options['archive_news_show_thumbnail'] && $options['archive_news_show_date']): ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></p><?php endif; ?>
     <h3 class="title"><span><?php the_title(); ?></span></h3>
     <p class="desc"><span><?php if($options['archive_news_show_thumbnail']){ echo trim_excerpt(100); }else{ echo trim_excerpt(150); }; ?></span></p>
    </div>
   </a>
  </article>
  <?php endwhile; ?>
 </div><!-- END #news_list -->

 <?php get_template_part('template-parts/navigation'); ?>

 <?php else: ?>

 <p id="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>

 <?php endif; ?>

</div><!-- END #main_contents -->

<?php get_footer(); ?>