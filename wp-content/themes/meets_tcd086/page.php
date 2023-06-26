<?php
     get_header();
     $options = get_design_plus_option();
     $page_hide_header_image = get_post_meta($post->ID, 'page_hide_header_image', true);
     $page_content_width = get_post_meta($post->ID, 'page_content_width', true) ?  get_post_meta($post->ID, 'page_content_width', true) : '1030';
     $page_header_type = get_post_meta($post->ID, 'page_header_type', true) ?  get_post_meta($post->ID, 'page_header_type', true) : 'type1';
     if(!$page_hide_header_image){
       // 通常のヘッダー ----------------------------------
       if($page_header_type == 'type1' || $page_header_type == 'type2'){
         $page_header_catch = get_post_meta($post->ID, 'page_header_catch', true);
         $page_header_catch_font_color = get_post_meta($post->ID, 'page_header_catch_font_color', true) ?  get_post_meta($post->ID, 'page_header_catch_font_color', true) : '#ffffff';
         $page_header_catch_font_type = get_post_meta($post->ID, 'page_header_catch_font_type', true) ?  get_post_meta($post->ID, 'page_header_catch_font_type', true) : 'type3';
         $page_header_catch_direction = get_post_meta($post->ID, 'page_header_catch_direction', true);
         $page_header_catch_animation_type = get_post_meta($post->ID, 'page_header_catch_animation_type', true) ?  get_post_meta($post->ID, 'page_header_catch_animation_type', true) : 'type1';
         $page_header_desc = get_post_meta($post->ID, 'page_header_desc', true);
         $page_header_desc_mobile = get_post_meta($post->ID, 'page_header_desc_mobile', true);
         $page_header_show_desc_mobile = get_post_meta($post->ID, 'page_header_show_desc_mobile', true);
         $bg_image = get_post_meta($post->ID, 'page_header_bg_image', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_header_bg_image', true), 'full' ) : '';
         $bg_image_mobile = get_post_meta($post->ID, 'page_header_bg_image_mobile', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_header_bg_image_mobile', true), 'full' ) : '';
         $use_overlay = get_post_meta($post->ID, 'page_header_use_overlay', true);
         if($use_overlay) {
           $overlay_color = get_post_meta($post->ID, 'page_header_overlay_color', true) ?  get_post_meta($post->ID, 'page_header_overlay_color', true) : '#000000';
           $overlay_color = hex2rgb($overlay_color);
           $overlay_color = implode(",",$overlay_color);
           $overlay_opacity = get_post_meta($post->ID, 'page_header_overlay_opacity', true) ?  get_post_meta($post->ID, 'page_header_overlay_opacity', true) : '0.3';
         }
         if($page_header_type == 'type1'){
?>
<div id="page_header">
 <div id="page_header_inner">
  <?php if($page_header_catch){ ?>
  <h1 class="catch animation_<?php echo esc_attr($page_header_catch_animation_type); ?> rich_font_<?php echo esc_attr($page_header_catch_font_type); ?><?php if($page_header_catch_direction){ echo ' type2'; }; ?>"><?php if($page_header_catch_animation_type == 'type1') { echo sepText($page_header_catch); } else { echo '<span>' . wp_kses_post(nl2br($page_header_catch)) . '</span>'; }; ?></h1>
  <?php }; ?>
 </div>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
 <?php }; ?>
 <?php if($bg_image) { ?>
 <div class="bg_image<?php if($bg_image_mobile) { echo ' pc'; }; ?>" style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
 <?php if($bg_image_mobile) { ?>
 <div class="bg_image mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
</div>
<?php
         // 全画面ヘッダー ----------------------------------
         } else {
?>
<div id="page_full_header">
 <?php if(get_post_meta($post->ID, 'page_show_logo', true)){ ?>
 <div id="lp_logo" class="animate_item">
  <?php lp_logo(); ?>
 </div>
 <?php }; ?>
 <div id="page_full_header_inner">
  <?php if($page_header_catch){ ?>
  <h1 class="catch animate_item rich_font_<?php echo esc_attr($page_header_catch_font_type); ?>"><?php echo wp_kses_post(nl2br($page_header_catch)); ?></h1>
  <?php }; ?>
  <?php if($page_header_desc){ ?>
  <p class="desc animate_item <?php if(!$page_header_show_desc_mobile){ echo 'hide_desc_mobile'; }; ?>"><span<?php if($page_header_desc_mobile){ echo ' class="pc"'; }; ?>><?php echo wp_kses_post(nl2br($page_header_desc)); ?></span><?php if($page_header_desc_mobile){ ?><span class="mobile"><?php echo wp_kses_post(nl2br($page_header_desc_mobile)); ?></span><?php }; ?></p>
  <?php }; ?>
 </div>
 <a class="animate_item" id="lp_contents_link" href="#lp_page_content"></a>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
 <?php }; ?>
 <?php if($bg_image) { ?>
 <div class="bg_image<?php if($bg_image_mobile) { echo ' pc'; }; ?>" style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
 <?php if($bg_image_mobile) { ?>
 <div class="bg_image mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
</div>
<?php
         };

       // タイトルのみヘッダー
       } else {
         $page_header_type2_font_type = get_post_meta($post->ID, 'page_header_type2_font_type', true) ?  get_post_meta($post->ID, 'page_header_type2_font_type', true) : 'type2';
         $page_header_type2_font_color = get_post_meta($post->ID, 'page_header_type2_font_color', true) ?  get_post_meta($post->ID, 'page_header_type2_font_color', true) : '#ffffff';
         $page_header_type2_bg_color = get_post_meta($post->ID, 'page_header_type2_bg_color', true) ?  get_post_meta($post->ID, 'page_header_type2_bg_color', true) : '#b60000';
?>
<div id="page_header_type2" style="color:<?php echo esc_attr($page_header_type2_font_color); ?>; background:<?php echo esc_attr($page_header_type2_bg_color); ?>;">
 <h1 class="title rich_font_<?php echo esc_attr($page_header_type2_font_type); ?>"><?php the_title(); ?></h1>
</div>
<?php
       };
     };
?>

 <div id="page_contents" style="width:<?php echo esc_attr($page_content_width); ?>px;">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="article">

   <?php // post content ------------------------------------------------------------------------------------------------------------------------ ?>
   <div class="post_content clearfix">
    <?php
         the_content();
         if ( ! post_password_required() ) {
           $pagenation_type = get_post_meta($post->ID, 'pagenation_type', true);
           if($pagenation_type == 'type3') {
             $pagenation_type = $options['pagenation_type'];
           };
           if ( $pagenation_type == 'type2' ) {
             if ( $page < $numpages && preg_match( '/href="(.*?)"/', _wp_link_page( $page + 1 ), $matches ) ) :
    ?>
    <div id="p_readmore">
     <a class="button" href="<?php echo esc_url( $matches[1] ); ?>#article"><?php _e( 'Read more', 'tcd-w' ); ?></a>
     <p class="num"><?php echo $page . ' / ' . $numpages; ?></p>
    </div>
    <?php
             endif;
           } else {
             custom_wp_link_pages();
           }
         }
    ?>
   </div>

  </article>

  <?php endwhile; endif; ?>

</div><!-- END #page_contents -->

<?php get_footer(); ?>