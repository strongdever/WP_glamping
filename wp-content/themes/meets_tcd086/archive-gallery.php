<?php
     get_header();
     $options = get_design_plus_option();
     $catch = $options['archive_gallery_header_catch'];
     $catch_font_type = $options['archive_gallery_header_catch_font_type'];
     $catch_direction = $options['archive_gallery_header_catch_direction'];
     $catch_animation_type = $options['archive_gallery_header_catch_animation_type'];
     $image_id = $options['archive_gallery_header_bg_image'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src($image_id, 'full');
     }
     $use_overlay = $options['archive_gallery_header_use_overlay'];
     if($use_overlay) {
       $overlay_color = hex2rgb($options['archive_gallery_header_overlay_color']);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = $options['archive_gallery_header_overlay_opacity'];
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

<div id="gallery_archive"<?php if (!show_posts_nav()) { echo ' class="no_nav"'; }; ?>>

 <div id="gallery_list">

  <?php
       // headline ------------------------------------------
       $headline = $options['archive_gallery_list_headline'];
       if($headline){
         $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
         $show_icon = $options['archive_gallery_list_headline_show_icon'];
         $sub_headline = $options['archive_gallery_list_sub_headline'];
         $headline_direction = $options['archive_gallery_list_headline_direction'];
         $headline_font_type = $options['archive_gallery_list_headline_font_type'];
  ?>
  <div class="archive_top_headline design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
   <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span></h3>
  </div>
  <?php }; ?>

  <?php if($options['archive_gallery_desc']){ ?>
  <div id="top_gallery_desc">
   <p><?php echo wp_kses_post(nl2br($options['archive_gallery_desc'])); ?></p>
  </div>
  <?php }; ?>

  <?php
       $gallery_category_list = get_terms( 'gallery_category', array( 'orderby' => 'order' ) );

       $post_num = $options['archive_gallery_list_post_num'];
       if(is_mobile()){
         $post_num = $options['archive_gallery_list_post_num_mobile'];
       }

       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
       $show_category_sort_button = $options['archive_gallery_show_category_sort_button'];
       $show_category_sort_button_icon = $options['archive_gallery_show_category_sort_button_icon'];

       $load_button_label = $options['archive_gallery_load_button_label'];
       $show_load_button_icon = $options['archive_gallery_show_load_button_icon'];

       // ソートボタン ------------------------------------------
       if($show_category_sort_button){
         if ( $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
  ?>
  <div class="gallery_category_sort_button">
   <ol>
    <li class="active">
     <a data-gallery-category="#gallery_cat_all" href="#">
      <?php if($icon_image && $show_category_sort_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
      <span><?php echo esc_html($options['archive_gallery_category_sort_button_all_label']); ?></span>
     </a>
    </li>
    <?php
         foreach ( $gallery_category_list as $cat ):
           $cat_id = $cat->term_id;
           $cat_name = $cat->name;
           $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
           $cat_name = isset($custom_fields['index_title']) ?  $custom_fields['index_title'] : $cat_name;
    ?>
    <li>
     <a href="#" data-gallery-category="#gallery_cat_<?php echo esc_attr($cat_id); ?>">
      <?php if($icon_image && $show_category_sort_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
      <span><?php echo esc_html($cat_name); ?></span>
     </a>
    </li>
    <?php endforeach; ?>
   </ol>
  </div>
  <?php endif; }; ?>

  <?php
       // 通常の記事一覧 -------------------------
  ?>
  <div class="gallery_list_wrap active animation_<?php echo esc_attr($options['archive_gallery_animation_type']); ?>" id="gallery_cat_all">
   <div class="gallery_list ajax_post_list">
    <?php
         $args = array( 'post_type' => 'gallery', 'posts_per_page' => $post_num, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC') );
         $post_list_query = new wp_query($args);
         $all_post_count = $post_list_query->found_posts;
         if($post_list_query->have_posts()):
           while ( $post_list_query->have_posts() ) : $post_list_query->the_post();
             if(has_post_thumbnail()) {
               $image = get_post_meta($post->ID, 'gallery_list_image', true);
               if(empty($image)){
                 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
               } else {
                 $image = wp_get_attachment_image_src( $image, 'full' );
               }
             } elseif($options['no_image1']) {
               $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
             } else {
               $image = array();
               $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
             }
             $cat_id = '';
             $category = wp_get_post_terms( $post->ID, 'gallery_category' , array( 'orderby' => 'term_order' ));
             if ( $category && ! is_wp_error($category) ) {
               foreach ( $category as $cat ) :
                 $cat_name = $cat->name;
                 $cat_id = $cat->term_id;
                 $cat_url = get_term_link($cat_id,'gallery_category');
                 break;
               endforeach;
             };
    ?>
    <article class="item" style="opacity:1;">
     <?php if ( $options['archive_gallery_list_show_category'] && $category && ! is_wp_error($category) ) { ?>
     <div class="category rich_font_<?php echo esc_attr($options['archive_gallery_list_category_font_type']); ?> <?php if($options['archive_gallery_list_category_direction']) { echo 'type2'; }; ?>">
      <a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
     </div>
     <?php }; ?>
     <a class="link animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <h3 class="title"><span><?php the_title(); ?></span></h3>
      </div>
     </a>
    </article>
    <?php
           endwhile;
         endif;
         wp_reset_postdata();
    ?>
   </div><!-- END .gallery_list -->
   <?php if($show_category_sort_button && ($all_post_count > $post_num)) { ?>
   <div class="entry-more" data-catid="" data-offset-post="<?php echo esc_attr($post_num); ?>">
    <?php if($icon_image && $show_load_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
    <span><?php echo esc_html($load_button_label); ?></span>
   </div>
   <div class="entry-loading"><?php _e( 'LOADING...', 'tcd-w' ); ?></div>
   <?php }; ?>
  </div><!-- END .gallery_list_wrap -->

  <?php
       // カテゴリー別　記事一覧 ---------------------------------------------------
       if ( $show_category_sort_button && $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
         foreach ( $gallery_category_list as $cat ):
           $cat_id = $cat->term_id;
           $cat_name = $cat->name;
           $cat_url = get_term_link($cat_id,'gallery_category');
           $args = array( 'post_type' => 'gallery', 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page' => $post_num, 'tax_query' => array( array( 'taxonomy' => 'gallery_category', 'field' => 'term_id', 'terms' => $cat_id ) ) );
           $post_list_query = new wp_query($args);
           $all_post_count = $post_list_query->found_posts;
           if($post_list_query->have_posts()):
  ?>
  <div class="gallery_list_wrap animation_<?php echo esc_attr($options['archive_gallery_animation_type']); ?>" id="gallery_cat_<?php echo $cat_id; ?>">
   <div class="gallery_list ajax_post_list">
    <?php
         while($post_list_query->have_posts()): $post_list_query->the_post();
           if(has_post_thumbnail()) {
             $image = get_post_meta($post->ID, 'gallery_list_image', true);
             if(empty($image)){
               $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
             } else {
               $image = wp_get_attachment_image_src( $image, 'full' );
             }
           } elseif($options['no_image1']) {
             $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
           } else {
             $image = array();
             $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
           }
    ?>
    <article class="item">
     <div class="category rich_font_<?php echo esc_attr($options['archive_gallery_list_category_font_type']); ?> <?php if($options['archive_gallery_list_category_direction']) { echo 'type2'; }; ?>">
      <a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
     </div>
     <a class="link animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <h3 class="title"><span><?php the_title(); ?></span></h3>
      </div>
     </a>
    </article>
    <?php endwhile; ?>
   </div><!-- END .gallery_list -->
   <?php if($all_post_count > $post_num) { ?>
   <div class="entry-more" data-catid="<?php echo esc_attr($cat_id); ?>" data-offset-post="<?php echo esc_attr($post_num); ?>">
    <?php if($icon_image && $show_load_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
    <span><?php echo esc_html($load_button_label); ?></span>
   </div>
   <div class="entry-loading"><?php _e( 'LOADING...', 'tcd-w' ); ?></div>
   <?php }; ?>
  </div><!-- END .gallery_list_wrap -->
  <?php
           endif; wp_reset_query();
         endforeach;
       endif;
  ?>

 </div><!-- #gallery_list -->

 <?php
      // category list
      $gallery_category_list = get_terms( 'gallery_category', array( 'orderby' => 'order' ) );
      if($options['show_archive_gallery_category_list']){
        if ( $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
          $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
          $show_icon = $options['archive_gallery_category_list_title_show_icon'];
 ?>
 <div class="gallery_category_list">
  <?php
       foreach ( $gallery_category_list as $cat ):
         $cat_id = $cat->term_id;
         $cat_name = $cat->name;
         $cat_url = get_term_link($cat_id,'gallery_category');
         $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
         $image_id = isset($custom_fields['list_image']) ?  $custom_fields['list_image'] : '';
         if(!empty($image_id)) {
           $image = wp_get_attachment_image_src($image_id, 'full');
         }
         $short_desc = isset($custom_fields['short_desc']) ?  $custom_fields['short_desc'] : '';
  ?>
  <div class="item">
   <a class="link animate_background" href="<?php echo esc_url($cat_url); ?>">
    <?php
         // headline ------------------------------------------
         $headline = $cat->name;
         if($headline){
           $sub_headline = isset($custom_fields['sub_title']) ?  $custom_fields['sub_title'] : '';
           $headline_direction = $options['archive_gallery_category_list_title_direction'];
           $headline_font_type = $options['archive_gallery_category_list_title_font_type'];
    ?>
    <div class="design_headline large <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?></h3>
    </div>
    <?php }; ?>
    <div class="image_wrap">
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
    <div class="desc_area">
     <?php if($short_desc){ ?><p class="desc"><span><?php echo esc_html($short_desc); ?></span></p><?php }; ?>
    </div>
   </a>
  </div>
  <?php endforeach; ?>
 </div>
 <?php endif; }; ?>

</div><!-- END #gallery_archive -->

<?php get_footer(); ?>