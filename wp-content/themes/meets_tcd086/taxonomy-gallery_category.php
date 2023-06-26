<?php
     get_header();
     $options = get_design_plus_option();
     $query_obj = get_queried_object();
     $cat_id = $query_obj->term_id;
     $cat_data = get_term($cat_id);
     $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
     $catch = isset($custom_fields['catch']) ?  $custom_fields['catch'] : '';
     $catch_font_type = $options['archive_gallery_header_catch_font_type'];
     $catch_direction = $options['archive_gallery_header_catch_direction'];
     $catch_animation_type = $options['archive_gallery_header_catch_animation_type'];
     $image_id = isset($custom_fields['header_image']) ?  $custom_fields['header_image'] : '';
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src($image_id, 'full');
     }
     $use_overlay = isset($custom_fields['header_use_overlay']) ?  $custom_fields['header_use_overlay'] : '';
     if($use_overlay) {
       $overlay_color = isset($custom_fields['header_overlay_color']) ?  $custom_fields['header_overlay_color'] : '#000000';
       $overlay_color = hex2rgb($overlay_color);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = isset($custom_fields['header_overlay_opacity']) ?  $custom_fields['header_overlay_opacity'] : '0.5';
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

 <?php
      // headline ------------------------------------------
      $headline = $cat_data->name;
      if($headline){
        $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
        $show_icon = $options['archive_gallery_headline_show_icon'];
        $sub_headline = isset($custom_fields['sub_title']) ?  $custom_fields['sub_title'] : '';
        $headline_direction = $options['archive_gallery_headline_direction'];
        $headline_font_type = $options['archive_gallery_headline_font_type'];
  ?>
 <div class="category_top_headline design_headline large <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
  <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
  <h3><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?></h3>
 </div>
 <?php }; ?>

 <?php
      $desc = isset($custom_fields['desc']) ?  $custom_fields['desc'] : '';
      if($desc){
 ?>
 <div id="gallery_desc">
  <p><?php echo wp_kses_post(nl2br($desc)); ?></p>
 </div>
 <?php }; ?>

 <?php
      // content list ------------------------------------------------------------------------------------------------------------
      $data_list = isset($custom_fields['data_list']) ?  $custom_fields['data_list'] : '';
      $data_list_layout = isset($custom_fields['data_list_layout']) ?  $custom_fields['data_list_layout'] : 'type1';
      if (!empty($data_list)) {
 ?>
 <div id="gallery_content_list" class="<?php echo esc_attr($data_list_layout); ?>">
  <?php
       foreach ( $data_list as $key => $value ) :
         $image_id = $value['image'];
         $desc = $value['desc'];
         $bg_color = isset($value['bg_color']) ?  $value['bg_color'] : '#f2f2f2';
         $font_color = isset($value['font_color']) ?  $value['font_color'] : '#000000';
         if($image_id && $desc){
           $image = wp_get_attachment_image_src($image_id, 'full');
  ?>
  <div class="item">
   <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center top; background-size:cover;"></div>
   <div class="desc" style="background:<?php echo esc_attr($bg_color); ?>; color:<?php echo esc_attr($font_color); ?>;">
    <div class="desc_inner">
     <p><?php echo wp_kses_post(nl2br($desc)); ?></p>
    </div>
   </div>
  </div>
  <?php }; endforeach; ?>
 </div>
 <?php }; ?>

 <div id="gallery_list">

  <?php
       // headline ------------------------------------------
       $headline = isset($custom_fields['archive_headline']) ?  $custom_fields['archive_headline'] : '';
       if($headline){
         $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
         $show_icon = $options['archive_gallery_list_headline_show_icon'];
         $sub_headline = isset($custom_fields['archive_sub_headline']) ?  $custom_fields['archive_sub_headline'] : '';
         $headline_direction = $options['archive_gallery_list_headline_direction'];
         $headline_font_type = $options['archive_gallery_list_headline_font_type'];
  ?>
  <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
   <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span></h3>
  </div>
  <?php }; ?>

  <?php
       // gallery list ------------------------------------------
       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
       $load_button_label = $options['archive_gallery_load_button_label'];
       $show_load_button_icon = $options['archive_gallery_show_load_button_icon'];
       $post_num = $options['archive_gallery_list_post_num'];
       if(is_mobile()){
         $post_num = $options['archive_gallery_list_post_num_mobile'];
       }
       $args = array( 'post_type' => 'gallery', 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page' => $post_num, 'tax_query' => array( array( 'taxonomy' => 'gallery_category', 'field' => 'term_id', 'terms' => $cat_id ) ) );
       $post_list_query = new wp_query($args);
       $all_post_count = $post_list_query->found_posts;
       if($post_list_query->have_posts()):
  ?>

  <div class="gallery_list_wrap animation_<?php echo esc_attr($options['archive_gallery_animation_type']); ?>"" style="display:block;">
   <div class="gallery_list no_category ajax_post_list">
    <?php
         while($post_list_query->have_posts()): $post_list_query->the_post();
           if(has_post_thumbnail()) {
             $image = get_post_meta($post->ID, 'gallery_list_image', true);
             if(empty($image)){
               $image = get_post_meta($post->ID, 'gallery_list_image', true);
               if(empty($image)){
                 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
               } else {
                 $image = wp_get_attachment_image_src( $image, 'full' );
               }
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
    <article class="item" style="opacity:1;">
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
   <?php if($options['archive_gallery_show_category_sort_button'] && ($all_post_count > $post_num)) { ?>
   <div class="entry-more" data-catid="<?php echo esc_attr($cat_id); ?>" data-offset-post="<?php echo esc_attr($post_num); ?>">
    <?php if($icon_image && $show_load_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
    <span><?php echo esc_html($load_button_label); ?></span>
   </div>
   <div class="entry-loading"><?php _e( 'LOADING...', 'tcd-w' ); ?></div>
   <?php }; ?>
  </div><!-- END .gallery_list_wrap -->

  <?php else: ?>

  <p id="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>

  <?php endif; ?>

 </div><!-- #gallery_list -->

 <?php
      // category list
      $gallery_category_list = get_terms( 'gallery_category', array( 'orderby' => 'order' ) );
      if($options['show_archive_gallery_category_list']){
        if ( $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
          $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
          $show_icon = $options['archive_gallery_category_list_title_show_icon'];
          if($icon_image && $show_icon){
            $icon_image_height = $icon_image[2];
            $margin_top = round($icon_image_height / 2);
          }
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