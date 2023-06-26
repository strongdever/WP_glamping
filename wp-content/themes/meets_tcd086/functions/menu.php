<?php
/**
 * Add data-megamenu attributes to the global navigation
 */
function nano_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {

  $options = get_design_plus_option();

  if ( 'global-menu' !== $args->theme_location ) return $item_output;

  if ( ! isset( $options['megamenu'][$item->ID] ) ) return $item_output;

  if ( 'type1' === $options['megamenu'][$item->ID] ) return $item_output;

  if ( 'type2' === $options['megamenu'][$item->ID] ) {
    return sprintf( '<a href="%s" class="megamenu_button type2" data-megamenu="js-megamenu%d">%s</a>', $item->url, $item->ID, $item->title );
  }
  if ( 'type3' === $options['megamenu'][$item->ID] ) {
    return sprintf( '<a href="%s" class="megamenu_button type3" data-megamenu="js-megamenu%d">%s</a>', $item->url, $item->ID, $item->title );
  }
  if ( 'type4' === $options['megamenu'][$item->ID] ) {
    return sprintf( '<a href="%s" class="megamenu_button type4" data-megamenu="js-megamenu%d">%s</a>', $item->url, $item->ID, $item->title );
  }

}

add_filter( 'walker_nav_menu_start_el', 'nano_walker_nav_menu_start_el', 10, 4 );


// Mega menu A -  Category post list ---------------------------------------------------------------
function render_megamenu_a( $id, $megamenus ) {
  global $post;
  $options = get_design_plus_option();
?>
<div class="megamenu_blog_list" id="js-megamenu<?php echo esc_attr( $id ); ?>">
 <div class="category_list_wrap">
  <ul class="category_list">
   <?php
        $i = 1;
        foreach ( $megamenus[$id] as $menu ) :
          if ( 'category' !== $menu->object ) continue;
          $cat_id = $menu->object_id;
          $cat_name = $menu->title;
          $url = $menu->url;
   ?>
   <li<?php if($i == 1) { echo ' class="active"'; }; ?>><a data-cat-id="mega_cat_id<?php echo esc_attr($cat_id); ?>" class="cat_id<?php echo esc_attr($cat_id); ?>" href="<?php echo esc_url($url); ?>"><?php echo esc_html($cat_name); ?></a></li>
   <?php $i++; endforeach; ?>
  </ul>
 </div>
 <div class="megamenu_blog_list_inner">
  <div class="post_list_area">
   <?php
        $post_list_num = 1;
        foreach ( $megamenus[$id] as $menu ) :
          if ( 'category' !== $menu->object ) continue;
            $cat_id = $menu->object_id;
            $post_num = '3';
            $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'tax_query' => array( array( 'taxonomy' => 'category', 'field' => 'term_id', 'terms' => $cat_id ) ) );
            $post_list = new wp_query($args);
            if($post_list->have_posts()):
   ?>
   <div class="post_list <?php if($post_list_num == 1) { echo 'active'; }; ?> clearfix mega_cat_id<?php echo esc_attr($cat_id); ?>">
    <?php
         $post_count = 1;
         // native ads --------------
         if($options['mega_menu_a_show_banner']){
           $banner_list = random_native_ads();
           if(!empty($banner_list)){
             $current_banner = 0;
             $total_banner = count($banner_list);
           }
         }
         while( $post_list->have_posts() ) : $post_list->the_post();
           if(has_post_thumbnail()) {
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size2' );
           } elseif($options['no_image1']) {
             $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
           } else {
             $image = array();
             $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
           }
    ?>
    <?php
         // native ads ------------------
         if( !empty($banner_list) && $options['mega_menu_a_show_banner'] && ($post_count == $options['mega_menu_a_banner_num']) ){
           $banner_num = $banner_list[$current_banner];
           if($total_banner <= $current_banner+1){
             $current_banner = 0;
           } else {
             $current_banner++;
           }
           $background_color = ($options['pr_banner_label_bg_color_use_main'.$banner_num] != 1) ? $options['pr_banner_label_bg_color'.$banner_num] : $options['main_color'];
           $banner_image = wp_get_attachment_image_src( $options['pr_banner_image'.$banner_num], 'size1');
    ?>
    <div class="item ad_item">
     <?php if ( $options['show_pr_banner_label'.$banner_num] && $options['pr_banner_label'.$banner_num] ) { ?>
     <p class="pr_label" style="background:<?php echo esc_attr($background_color); ?>;"><?php echo esc_html($options['pr_banner_label'.$banner_num]); ?></p>
     <?php }; ?>
     <a class="clearfix animate_background" href="<?php if($options['pr_banner_url'.$banner_num]) { echo esc_url($options['pr_banner_url'.$banner_num]); }; ?>" <?php if($options['pr_banner_target'.$banner_num]){ echo 'target="_blank"'; }; ?>>
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($banner_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <h4 class="title"><span><?php echo esc_html($options['pr_banner_title'.$banner_num]); ?></span></h4>
       <?php if($options['pr_banner_client'.$banner_num]){ ?>
       <p class="client"><?php echo esc_html($options['pr_banner_client'.$banner_num]); ?></p>
       <?php }; ?>
      </div>
     </a>
    </div>
    <?php }; // END native ad ?>
    <?php if( !empty($banner_list) && $options['mega_menu_a_show_banner'] && ($post_count == 3) ) { } else { ?>
    <div class="item">
     <a class="clearfix animate_background" href="<?php the_permalink(); ?>">
      <?php
           if ($options['mega_menu_a_show_new_icon']){
             $post_time = get_the_time('U');
             $days = $options['mega_menu_a_new_icon_days'];
             $last = time() - ($days * 24 * 60 * 60);
             if ($post_time > $last) {
      ?>
      <div class="new_icon"><?php echo esc_html($options['mega_menu_a_new_icon_label']); ?></div>
      <?php }; }; ?>
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <h4 class="title"><span><?php the_title_attribute(); ?></span></h4>
       <?php if ($options['mega_menu_a_show_date']){ ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></p><?php }; ?>
      </div>
     </a>
    </div>
    <?php }; ?>
    <?php $post_count++; endwhile; wp_reset_query(); ?>
   </div>
   <?php endif; // END end post list ?>
   <?php $post_list_num++; endforeach; ?>
  </div><!-- END post_list_area -->
 </div>
</div>
<?php
}

// Mega menu B - Featured post list ---------------------------------------------------------------
function render_megamenu_b( $id, $megamenus ) {
  global $post;
  $options = get_design_plus_option();
?>
<div class="megamenu_b_wrap" id="js-megamenu<?php echo esc_attr( $id ); ?>">
 <div class="megamenu_b">

  <?php
       // slider ----------------------------------------------------------------------------
       $slider_post_num = $options['mega_menu_b_post_num'];
       $post_order = $options['mega_menu_b_post_order'];
       $post_num = $slider_post_num + 4;
       if($post_order == 'rand'){
         $args = array('post_type' => 'featured', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => 'rand');
       } else {
         $args = array('post_type' => 'featured', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'));
       }
       $post_list = new WP_Query($args);
       if($post_list->have_posts()):
  ?>
  <div class="megamenu_slider">
   <?php
        $i = 1;
        while ($post_list->have_posts()) : $post_list->the_post();
        $category = wp_get_post_terms( $post->ID, 'featured_category' , array( 'orderby' => 'term_order' ));
        if ( $category && ! is_wp_error($category) ) {
          foreach ( $category as $cat ) :
            $cat_name = $cat->name;
            $cat_id = $cat->term_id;
            $cat_url = get_term_link($cat_id,'featured_category');
            break;
          endforeach;
        };
        $featured_num = get_post_meta($post->ID, 'featured_num', true);
        if(has_post_thumbnail()) {
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size2' );
        } elseif($options['no_image1']) {
          $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
        } else {
          $image = array();
          $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
        }
   ?>
   <?php if($i <= $slider_post_num){ ?>
   <article class="item">
    <?php if ( $options['mega_menu_b_show_category'] && $category && ! is_wp_error($category) ) { ?>
    <a class="category" href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
    <?php }; ?>
    <a class="link animate_background" href="<?php the_permalink(); ?>">
     <?php if ( $options['mega_menu_b_show_num'] ) { ?>
     <div class="num_area">
      <?php if ($options['featured_sub_title']){ ?><p class="sub_title"><?php echo esc_html($options['featured_sub_title']); ?></p><?php }; ?>
      <p class="featured_post_num"><?php echo esc_html($featured_num); ?></p>
     </div>
     <?php }; ?>
     <div class="image_wrap">
      <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
     </div>
     <div class="title_area">
      <h4 class="title"><span><?php the_title_attribute(); ?></span></h4>
     </div>
    </a>
   </article>
   <?php }; ?>
  <?php if($i == $slider_post_num){ ?>
  </div><!-- END .megamenu_slider -->
  <div class="post_list">
  <?php }; ?>
   <?php if($i > $slider_post_num){ ?>
   <article class="item">
    <?php if ( $options['mega_menu_b_show_category'] && $category && ! is_wp_error($category) ) { ?>
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
   <?php }; ?>
   <?php $i++; endwhile; wp_reset_query(); ?>
  </div><!-- END .post_list -->
  <?php endif; ?>

 </div><!-- END .megamenu_b -->
</div><!-- END .megamenu_b_wrap -->
<?php
}


// Mega menu C - Gallery category list ---------------------------------------------------------------
function render_megamenu_c( $id, $megamenus ) {
  global $post;
  $options = get_design_plus_option();
?>
<div class="megamenu_c_wrap" id="js-megamenu<?php echo esc_attr( $id ); ?>">

  <div class="category_list clearfix">
   <?php
        foreach ( $megamenus[$id] as $menu ) :
          if ( 'gallery_category' !== $menu->object ) continue;
          $cat_id = $menu->object_id;
          $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
          $category_data = get_term( $cat_id, 'gallery_category' );
          $headline = $category_data->name;
          $sub_headline = isset($custom_fields['sub_title']) ?  $custom_fields['sub_title'] : '';
          $short_desc = isset($custom_fields['short_desc']) ?  $custom_fields['short_desc'] : '';
          $headline_direction = $options['mega_menu_c_title_direction'];
          $headline_font_type = $options['mega_menu_c_title_font_type'];
          $url = $menu->url;
          $image_id = isset($custom_fields['list_image']) ?  $custom_fields['list_image'] : '';
          if(!empty($image_id)) {
            $image = wp_get_attachment_image_src($image_id, 'full');
          }
   ?>
   <article class="item">
    <a class="animate_background" href="<?php echo esc_url($url); ?>">
     <div class="design_headline large <?php if($headline_direction){ echo 'type2'; }; ?>">
      <h3><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo esc_html($headline); ?></span><?php if($sub_headline) { ?><span class="sub_title"><?php echo esc_html($sub_headline); ?></span><?php }; ?></h3>
     </div>
     <div class="image_wrap">
      <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
     </div>
     <?php if($short_desc){ ?>
     <div class="desc_area">
      <?php if($short_desc){ ?><p class="desc"><span><?php echo esc_html($short_desc); ?></span></p><?php }; ?>
     </div>
     <?php }; ?>
    </a>
   </article>
   <?php endforeach; ?>
  </div>

</div><!-- END .megamenu_c_wrap -->
<?php
}


?>