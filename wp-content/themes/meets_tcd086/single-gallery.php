<?php
     get_header();
     $options = get_design_plus_option();
?>
<div id="single_gallery" <?php if(!$options['single_gallery_show_header']){ echo 'class="hide_header"'; }; ?>>

 <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        $gallery_num = get_post_meta($post->ID, 'gallery_num', true);
        $category = wp_get_post_terms( $post->ID, 'gallery_category' , array( 'orderby' => 'term_order' ));
        if ( $category && ! is_wp_error($category) ) {
          foreach ( $category as $cat ) :
            $cat_name = $cat->name;
            $cat_id = $cat->term_id;
            $cat_url = get_term_link($cat_id,'gallery_category');
            $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
            $headline = isset($custom_fields['archive_headline']) ?  $custom_fields['archive_headline'] : '';
            $sub_headline = isset($custom_fields['archive_sub_headline']) ?  $custom_fields['archive_sub_headline'] : '';
            break;
          endforeach;
        };
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size5' );
 ?>

 <?php if($image) { ?>
 <div id="gallery_featured_image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;">
  <?php
       // headline ------------------------------------------
       if($headline){
         $headline_direction = $options['single_gallery_headline_direction'];
         $headline_font_type = $options['single_gallery_headline_font_type'];
  ?>
  <div class="design_headline <?php if($headline_direction){ echo 'type2'; }; ?>">
   <h3><a href="<?php echo esc_url($cat_url); ?>"><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span></a></h3>
  </div>
  <?php }; ?>
 </div>
 <?php }; ?>

 <article id="gallery_content">

  <div id="gallery_content_inner">

   <h1 id="gallery_title" class="title rich_font_<?php echo esc_attr($options['single_gallery_title_font_type']); ?> entry-title"><?php the_title(); ?></h1>

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

   <?php
        // image list ---------------------------------------------------------
        $gallery_image1 = get_post_meta($post->ID, 'gallery_image1', true);
        $gallery_image2 = get_post_meta($post->ID, 'gallery_image2', true);
        $gallery_image3 = get_post_meta($post->ID, 'gallery_image3', true);
        $gallery_image4 = get_post_meta($post->ID, 'gallery_image4', true);
        if($gallery_image1 || $gallery_image2 || $gallery_image3 || $gallery_image4){
          if($gallery_image1){
            $image1 = wp_get_attachment_image_src( $gallery_image1, 'full' );
          }
          if($gallery_image2){
            $image2 = wp_get_attachment_image_src( $gallery_image2, 'full' );
          }
          if($gallery_image3){
            $image3 = wp_get_attachment_image_src( $gallery_image3, 'full' );
          }
          if($gallery_image4){
            $image4 = wp_get_attachment_image_src( $gallery_image4, 'full' );
          }
   ?>
   <div id="gallery_image_list">
    <?php if($gallery_image1 || $gallery_image2){ ?>
    <div class="image_list">
     <?php if($gallery_image1){ ?><div class="item"><img src="<?php echo esc_attr($image1[0]); ?>" alt="" title="" /></div><?php }; ?>
     <?php if($gallery_image2){ ?><div class="item"><img src="<?php echo esc_attr($image2[0]); ?>" alt="" title="" /></div><?php }; ?>
    </div>
    <?php }; ?>
    <?php if($gallery_image3 || $gallery_image4){ ?>
    <div class="image_list">
     <?php if($gallery_image3){ ?><div class="item"><img src="<?php echo esc_attr($image3[0]); ?>" alt="" title="" /></div><?php }; ?>
     <?php if($gallery_image4){ ?><div class="item"><img src="<?php echo esc_attr($image4[0]); ?>" alt="" title="" /></div><?php }; ?>
    </div>
    <?php }; ?>
   </div>
   <?php }; ?>

   <?php
        // data list ------------------------------------------------------------------------------------------------------------
        $data_list = get_post_meta($post->ID, 'data_list', true);
        if (!empty($data_list)) {
        $featured_catch = get_post_meta($post->ID, 'featured_catch', true);
   ?>
   <div id="gallery_data_list">
    <dl>
     <?php
          foreach ( $data_list as $key => $value ) :
           $headline = $value['headline'];
           $desc = $value['desc'];
     ?>
     <?php if($headline) { echo '<dt><p>' . wp_kses_post($headline) . '</p></dt>'; }; ?>
     <?php if($desc) { echo '<dd><p>' . wp_kses_post($desc) . '</p></dd>'; }; ?>
     <?php endforeach; ?>
    </dl>
   </div>
   <?php }; ?>

   <?php
        // link button ---------------------------------------------------------
        $gallery_link_button_label = get_post_meta($post->ID, 'gallery_link_button_label', true);
        $gallery_link_button_url = get_post_meta($post->ID, 'gallery_link_button_url', true);
        $gallery_link_button_target = get_post_meta($post->ID, 'gallery_link_button_target', true);
        if($gallery_link_button_label && $gallery_link_button_url){
   ?>
   <a id="gallery_data_link" href="<?php echo esc_url($gallery_link_button_url); ?>" <?php if($gallery_link_button_target) { echo 'target="_blank"'; }; ?>><?php echo esc_html($gallery_link_button_label); ?></a>
   <?php }; ?>

  </div><!-- END #gallery_content_inner -->

  <?php $icon_image = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' ); ?>
  <a id="gallery_archive_link" href="<?php echo esc_url(get_post_type_archive_link('gallery')); ?>">
   <?php if($icon_image && $options['signle_gallery_close_button_show_icon']){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <span><?php echo esc_html($options['single_gallery_close_label']); ?></span>
  </a>

  <?php
       // page nav ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       if ($options['single_gallery_show_nav']) :
  ?>
  <div id="gallery_nav">
   <?php next_prev_post_link2(); ?>
   <a id="nav_center_link" href="<?php echo esc_url(get_post_type_archive_link('gallery')); ?>"></a>
  </div>
  <?php endif; ?>

 </article><!-- END #gallery_content -->

 <?php endwhile; endif; ?>

</div><!-- END #single_gallery -->
<?php get_footer(); ?>