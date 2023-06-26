<?php
     get_header();
     $options = get_design_plus_option();
     $catch = $options['archive_blog_header_catch'];
     $catch_font_type = $options['archive_blog_header_catch_font_type'];
     $catch_direction = $options['archive_blog_header_catch_direction'];
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
     // overwrite the data if category data exist
     $current_cat_id = '';
     if (is_category()) {
       $query_obj = get_queried_object();
       $current_cat_id = $query_obj->term_id;
       $term_meta = get_option( 'taxonomy_' . $current_cat_id, array() );
       if (!empty($term_meta['catch'])){
         $catch = $term_meta['catch'];
       }
       if (!empty($term_meta['image'])){
         $image_id = $term_meta['image'];
         $image = wp_get_attachment_image_src( $image_id, 'full' );
       }
       if (!empty($term_meta['use_overlay'])){
         if (!empty($term_meta['overlay_color'])){
           $overlay_color = hex2rgb($term_meta['overlay_color']);
           $overlay_color = implode(",",$overlay_color);
           if (!empty($term_meta['overlay_opacity'])){
             $overlay_opacity = $term_meta['overlay_opacity'];
           } else {
             $overlay_opacity = '0.3';
           }
         }
       }
     }
     if (!is_author()) {
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
<?php }; ?>

<?php
     // Author profile ------------------------------------------------------------------------------------------------------------------------------
     if (is_author()) {
       $author_info = $wp_query->get_queried_object();
       $author_id = $author_info->ID;
       $user_data = get_userdata($author_id);
       if(!empty($user_data->show_author)) {
          $desc = $user_data->description;
          $facebook = $user_data->facebook_url;
          $twitter = $user_data->twitter_url;
          $insta = $user_data->instagram_url;
          $pinterest = $user_data->pinterest_url;
          $youtube = $user_data->youtube_url;
          $contact = $user_data->contact_url;
          $author_url = get_author_posts_url($author_id);
          $user_url = $user_data->user_url;
?>
<div class="author_profile clearfix">
 <div class="avatar_area"><?php echo wp_kses_post(get_avatar($author_id, 300)); ?></div>
 <div class="info">
  <div class="info_inner">
   <h4 class="name rich_font"><?php echo esc_html($user_data->display_name); ?></h4>
   <?php if($desc) { ?>
   <p class="desc"><span><?php echo esc_html($desc); ?></span></p>
   <?php }; ?>
   <?php if($facebook || $twitter || $insta || $pinterest || $youtube || $contact || $user_url) { ?>
   <ul class="author_link clearfix">
    <?php if($user_url) { ?><li class="user_url"><a href="<?php echo esc_url($user_url); ?>" target="_blank"><span><?php echo esc_url($user_url); ?></span></a></li><?php }; ?>
    <?php if($facebook) { ?><li class="facebook"><a href="<?php echo esc_url($facebook); ?>" rel="nofollow" target="_blank" title="Facebook"><span>Facebook</span></a></li><?php }; ?>
    <?php if($twitter) { ?><li class="twitter"><a href="<?php echo esc_url($twitter); ?>" rel="nofollow" target="_blank" title="Twitter"><span>Twitter</span></a></li><?php }; ?>
    <?php if($insta) { ?><li class="insta"><a href="<?php echo esc_url($insta); ?>" rel="nofollow" target="_blank" title="Instagram"><span>Instagram</span></a></li><?php }; ?>
    <?php if($pinterest) { ?><li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>" rel="nofollow" target="_blank" title="Pinterest"><span>Pinterest</span></a></li><?php }; ?>
    <?php if($youtube) { ?><li class="youtube"><a href="<?php echo esc_url($youtube); ?>" rel="nofollow" target="_blank" title="Youtube"><span>Youtube</span></a></li><?php }; ?>
    <?php if($contact) { ?><li class="contact"><a href="<?php echo esc_url($contact); ?>" rel="nofollow" target="_blank" title="Contact"><span>Contact</span></a></li><?php }; ?>
   </ul>
   <?php }; ?>
  </div>
 </div>
</div><!-- END .author_profile -->
<?php }; }; ?>

<div id="main_contents" class="no_side_content <?php if (!show_posts_nav()) { echo 'no_nav'; }; ?>">

 <?php
      // headline ------------------------------------------
      if (!is_author()) {
        $headline = $options['archive_blog_headline'];
        if($headline){
          $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
          $show_icon = $options['archive_blog_headline_show_icon'];
          $sub_headline = $options['archive_blog_sub_headline'];
          $headline_direction = $options['archive_blog_headline_direction'];
          $headline_font_type = $options['archive_blog_headline_font_type'];
          if (is_category()) {
            $headline = $title = $query_obj->name;
            $sub_headline = '';
            $headline_direction = '';
          } elseif(is_tag()) {
            $query_obj = get_queried_object();
            $headline = $title = $query_obj->name;
            $sub_headline = '';
            $headline_direction = '';
          } elseif ( is_day() ) {
            $headline = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F jS, Y', 'tcd-w' ) ) );
            $sub_headline = '';
            $headline_direction = '';
          } elseif ( is_month() ) {
            $headline = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F, Y', 'tcd-w') ) );
            $sub_headline = '';
            $headline_direction = '';
          } elseif ( is_year() ) {
            $headline = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'Y', 'tcd-w') ) );
            $sub_headline = '';
            $headline_direction = '';
          }
  ?>
 <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
  <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
  <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span></h3>
 </div>
 <?php }; }; ?>

 <?php if ( have_posts() ) : ?>

 <div id="blog_list">
  <?php
       $post_count = 1;
       // native ads --------------
       if($options['archive_blog_show_ads']){
         $banner_list = random_native_ads();
         if(!empty($banner_list)){
           $current_banner = 0;
           $total_banner = count($banner_list);
         }
       }
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
    <?php
         if ($options['archive_blog_show_category']){
           if(is_category()) {
    ?>
    <p class="category"><a href="<?php echo esc_url(get_term_link($query_obj->term_id,'category')); ?>"><?php echo esc_html($query_obj->name); ?></a></p>
    <?php
         } else {
           $blog_category = wp_get_post_terms( $post->ID, 'category' , array( 'orderby' => 'term_order' ));
           if ( $blog_category && ! is_wp_error($blog_category) ) {
             foreach ( $blog_category as $blog_cat ) :
               $blog_cat_name = $blog_cat->name;
               $blog_cat_id = $blog_cat->term_id;
               break;
             endforeach;
           };
    ?>
    <p class="category"><a href="<?php echo esc_url(get_term_link($blog_cat_id,'category')); ?>"><?php echo esc_html($blog_cat_name); ?></a></p>
    <?php }; }; ?>
    <a class="title_link" href="<?php the_permalink(); ?>"><h3 class="title"><span><?php the_title(); ?></span></h3></a>
    <?php if ($options['archive_blog_show_date']){ ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></p><?php }; ?>
   </div>
  </article>
  <?php
       // native ads ------------------
       if(!empty($banner_list) && $options['archive_blog_show_ads'] && ($post_count % $options['archive_blog_banner_num'] == 0) ){
         $banner_num = $banner_list[$current_banner];
         if($total_banner <= $current_banner+1){
           $current_banner = 0;
         } else {
           $current_banner++;
         }
         $background_color = ($options['pr_banner_label_bg_color_use_main'.$banner_num] != 1) ? $options['pr_banner_label_bg_color'.$banner_num] : $options['main_color'];
         $image = wp_get_attachment_image_src( $options['pr_banner_image'.$banner_num], 'size2');
  ?>
  <article class="item ad_item">
   <a class="image_link animate_background" href="<?php if($options['pr_banner_url'.$banner_num]) { echo esc_url($options['pr_banner_url'.$banner_num]); }; ?>" <?php if($options['pr_banner_target'.$banner_num]){ echo 'target="_blank"'; }; ?>>
    <div class="image_wrap">
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
   </a>
   <div class="title_area">
    <?php if ( $options['show_pr_banner_label'.$banner_num] && $options['pr_banner_label'.$banner_num] ) { ?>
    <p class="category pr_label"><?php echo esc_html($options['pr_banner_label'.$banner_num]); ?></p>
    <?php }; ?>
    <a class="title_link" href="<?php if($options['pr_banner_url'.$banner_num]) { echo esc_url($options['pr_banner_url'.$banner_num]); }; ?>" <?php if($options['pr_banner_target'.$banner_num]){ echo 'target="_blank"'; }; ?>><h3 class="title"><span><?php echo esc_html($options['pr_banner_title'.$banner_num]); ?></span></h3></a>
    <?php if($options['pr_banner_client'.$banner_num]) { ?><p class="date client"><?php echo esc_html($options['pr_banner_client'.$banner_num]); ?></p><?php }; ?>
   </div>
  </article>
  <?php }; // END native ad ?>
  <?php $post_count++; endwhile; ?>
 </div><!-- END #blog_list -->

 <?php get_template_part('template-parts/navigation'); ?>

 <?php else: ?>

 <p id="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>

 <?php endif; ?>

</div><!-- END #main_contents -->

<?php get_footer(); ?>