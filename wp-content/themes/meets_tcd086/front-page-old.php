<?php
     $options = get_design_plus_option();
     get_header();
?>
<div id="index_content_builder">

 <?php
      // 画像スライダー ------------------------------------------
      if($options['show_image_carousel']){
        $image_carousel = $options['image_carousel'];
        if(!empty($image_carousel)){
          $total = count($image_carousel);
 ?>
 <div id="index_image_carousel" <?php if($total < 5){ echo 'class="type2"'; }; ?>>
  <?php
        foreach ( $image_carousel as $key => $value ) :
          if($value['image']){
            $image = wp_get_attachment_image_src( $value['image'], 'full' );
            echo '<div class="item" style="background:url(' . esc_attr($image[0]) . ') no-repeat center center; background-size:cover;"></div>';
          }
        endforeach;
  ?>
 </div>
 <?php
        };
      }
 ?>

 <?php
      // 通常のコンテンツを読み込む ------------------------------------------------------------------------------
      if( (!is_mobile() && $options['index_content_type'] == 'type2') || (is_mobile() && $options['mobile_index_content_type'] == 'type3') ){
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        $page_content_width = get_post_meta($post->ID, 'page_content_width', true) ?  get_post_meta($post->ID, 'page_content_width', true) : '1030';
 ?>
 <div id="page_contents" style="width:<?php echo esc_attr($page_content_width); ?>px;">
  <article id="article">
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
 </div>
 <?php
        endwhile; endif;
      } else {
 ?>

<?php
     // コンテンツビルダー
     if ($options['contents_builder'] || $options['mobile_contents_builder']) :
       $content_count = 1;
       if(is_mobile() && $options['mobile_index_content_type'] == 'type2') {
         $contents_builder = $options['mobile_contents_builder'];
       } else {
         $contents_builder = $options['contents_builder'];
       }
       foreach($contents_builder as $content) :

         // デザインコンテンツ --------------------------------------------------------------------------------
         if ( $content['cb_content_select'] == 'design_content' && $content['show_content'] ) {
?>
<div class="design_content num<?php echo $content_count; ?> white_content <?php if(!$content['show_button']){ echo 'no_button'; }; ?>" id="cb_content_<?php echo $content_count; ?>">

 <?php
      // レイヤー画像
      if($content['show_layer_image']){
        $layer_image1 = wp_get_attachment_image_src( $content['layer_image1'], 'full' );
        $layer_image2 = wp_get_attachment_image_src( $content['layer_image2'], 'full' );
        $layer_image3 = wp_get_attachment_image_src( $content['layer_image3'], 'full' );
        $layer_image4 = wp_get_attachment_image_src( $content['layer_image4'], 'full' );
        if($layer_image1){ echo '<div class="layer_image left_top"><img src="' . esc_attr($layer_image1[0]) .'" alt="" title="" /></div>'; }
        if($layer_image2){ echo '<div class="layer_image right_top"><img src="' . esc_attr($layer_image2[0]) .'" alt="" title="" /></div>'; }
        if($layer_image3){ echo '<div class="layer_image left_bottom"><img src="' . esc_attr($layer_image3[0]) .'" alt="" title="" /></div>'; }
        if($layer_image4){ echo '<div class="layer_image right_bottom"><img src="' . esc_attr($layer_image4[0]) .'" alt="" title="" /></div>'; }
      };
 ?>

 <div class="design_content_inner">

  <?php
       // ニュースティッカー
       if($content['show_news']){
         $post_type = $content['post_type'];
         if(is_mobile()){
           $post_num = $content['post_num_mobile'];
         } else {
           $post_num = $content['post_num'];
         }
         $post_order = $content['post_order'];
         if($post_order == 'rand'){
           $args = array( 'post_type' => $post_type, 'posts_per_page' => $post_num, 'orderby' => 'rand' );
         } elseif($post_type == 'featured') {
           $args = array('post_type' => 'featured', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'));
         } else {
           $args = array( 'post_type' => $post_type, 'posts_per_page' => $post_num );
         }
         $post_list_query = new wp_query($args);
         if($post_list_query->have_posts()):
  ?>
  <div class="news_ticker cb_item" style="background:<?php echo esc_attr($content['post_bg_color']); ?>;">
   <?php
        while($post_list_query->have_posts()): $post_list_query->the_post();
          if($post_type == 'featured'){
            $category = wp_get_post_terms( $post->ID, 'featured_category' , array( 'orderby' => 'term_order' ));
          } elseif($post_type == 'news') {
            $category = '';
          } elseif($post_type == 'post') {
            $category = wp_get_post_terms( $post->ID, 'category' , array( 'orderby' => 'term_order' ));
          } else {
            $category = '';
          }
          if ($category) {
            foreach ( $category as $cat ) :
              $cat_name = $cat->name;
              $cat_id = $cat->term_id;
              if($post_type == 'featured'){
                $cat_url = get_term_link($cat_id,'featured_category');
              } elseif($post_type == 'news'){
                $cat_url = get_term_link($cat_id,'news_category');
              } else {
                $cat_url = get_term_link($cat_id,'category');
              }
              break;
            endforeach;
          };
   ?>
   <article class="item">
     <?php if($post_type != 'featured'){ ?>
     <p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></p>
     <?php }; ?>
     <?php if ($category) { ?>
     <p class="category"><a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a></p>
     <?php }; ?>
     <p class="title"><a href="<?php the_permalink(); ?>"><span><?php the_title_attribute(); ?></span></a></p>
   </article>
   <?php endwhile; ?>
  </div><!-- END .news_ticker -->
  <?php endif; wp_reset_query(); }; ?>

  <?php
       // headline ------------------------------------------
       $headline = $content['headline'];
       if($headline){
         $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
         $show_icon = $content['headline_show_icon'];
         $sub_headline = $content['sub_headline'];
         $headline_direction = $content['headline_direction'];
         $headline_font_type = $content['headline_font_type'];
   ?>
  <div class="design_headline cb_item <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
   <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
  </div>
  <?php }; ?>

  <?php if(!empty($content['desc'])) { ?>
  <p class="desc cb_item"><?php echo wp_kses_post(nl2br($content['desc'])); ?></p>
  <?php }; ?>

  <?php if($content['show_button']){ ?>
  <div class="cb_link_button cb_item">
   <a class="button_animation_<?php echo esc_attr($content['button_animation_type']); ?>" href="<?php echo esc_attr($content['button_url']); ?>" <?php if($content['button_target']){ echo 'target="_blank"'; }; ?>><span><?php echo esc_html($content['button_label']); ?></span></a>
  </div>
  <?php }; ?>

 </div><!-- END .design_content_inner -->

</div><!-- END .design_content -->

<?php
         // 特集記事一覧 --------------------------------------------------------------------------------
         } elseif ( $content['cb_content_select'] == 'featured_post_list' && $content['show_content'] ) {
?>
<div class="index_featured_list num<?php echo $content_count; ?> white_content <?php if(!$content['show_button']){ echo 'no_button'; }; ?>" id="cb_content_<?php echo $content_count; ?>">

 <div class="index_featured_list_inner">

  <?php
       // headline ------------------------------------------
       $headline = $content['headline'];
       if($headline){
         $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
         $show_icon = $content['headline_show_icon'];
         $sub_headline = $content['sub_headline'];
         $headline_direction = $content['headline_direction'];
         $headline_font_type = $content['headline_font_type'];
   ?>
  <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
   <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
  </div>
  <?php }; ?>

  <?php
       // 特集記事一覧
       if(is_mobile()){
         $post_num = $content['post_num_mobile'];
       } else {
         $post_num = $content['post_num'];
       }
       $args = array( 'post_type' => 'featured', 'posts_per_page' => $post_num, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC') );
       $post_list_query = new wp_query($args);
       if($post_list_query->have_posts()):
  ?>
  <div class="featured_list">
   <?php
        $i = 1;
        while($post_list_query->have_posts()): $post_list_query->the_post();
          if(has_post_thumbnail()) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size2' );
          } elseif($options['no_image1']) {
            $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
          } else {
            $image = array();
            $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
          }
          $featured_num = get_post_meta($post->ID, 'featured_num', true);
          $featured_category = wp_get_post_terms( $post->ID, 'featured_category' , array( 'orderby' => 'term_order' ));
          if ( $featured_category && ! is_wp_error($featured_category) ) {
            foreach ( $featured_category as $featured_cat ) :
              $featured_cat_name = $featured_cat->name;
              $featured_cat_id = $featured_cat->term_id;
              break;
            endforeach;
          };
   ?>
   <article class="item <?php if($i == 1){ echo 'large'; } else { echo 'small'; }; ?>">
    <?php if ($content['show_category']){ ?>
    <p class="category"><a href="<?php echo esc_url(get_term_link($featured_cat_id,'featured_category')); ?>"><?php echo esc_html($featured_cat_name); ?></a></p>
    <?php }; ?>
    <a class="link animate_background" href="<?php the_permalink(); ?>">
     <div class="image_wrap">
      <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
     </div>
     <div class="title_area">
      <?php if ($content['show_post_num']){ ?>
      <div class="num_area">
       <?php if ($options['featured_sub_title']){ ?><p class="sub_title"><?php echo esc_html($options['featured_sub_title']); ?></p><?php }; ?>
       <p class="featured_post_num"><?php echo esc_html($featured_num); ?></p>
      </div>
      <?php }; ?>
      <h3 class="title"><span><?php the_title(); ?></span></h3>      
      <p class="desc"><span><?php echo trim_excerpt(100); ?></span></p>      
     </div>
    </a>
   </article>
   <?php $i++; endwhile; ?>
  </div><!-- END .featured_list -->
  <?php endif; wp_reset_query(); ?>

  <?php if($content['show_button']){ ?>
  <div class="cb_link_button">
   <a class="button_animation_<?php echo esc_attr($content['button_animation_type']); ?>" href="<?php echo esc_url(get_post_type_archive_link('featured')); ?>"><?php echo esc_html($content['button_label']); ?></a>
  </div>
  <?php }; ?>

 </div><!-- END .index_featured_list_inner -->

</div><!-- END .index_featured_list -->

<?php
         // ギャラリー一覧 --------------------------------------------------------------------------------
         } elseif ( $content['cb_content_select'] == 'gallery_list' && $content['show_content'] ) {
?>
<div class="index_gallery_list num<?php echo $content_count; ?> white_content" id="cb_content_<?php echo $content_count; ?>">

 <div class="index_gallery_list_inner">

  <?php
       // headline ------------------------------------------
       $headline = $content['headline'];
       if($headline){
         $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
         $show_icon = $content['headline_show_icon'];
         $sub_headline = $content['sub_headline'];
         $headline_direction = $content['headline_direction'];
         $headline_font_type = $content['headline_font_type'];
   ?>
  <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
   <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
   <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
  </div>
  <?php }; ?>

  <?php if(!empty($content['desc'])) { ?>
  <p class="desc"><?php echo wp_kses_post(nl2br($content['desc'])); ?></p>
  <?php }; ?>

  <?php
       $category_ids = $content['category_ids'];
       $category_ids = str_replace(["\r\n", "\r", "\n"], "\n", $category_ids);
       $category_ids = explode("\n", $category_ids);
       $gallery_category_list = get_terms( 'gallery_category', array( 'orderby' => 'ID', 'include' => $category_ids ) );

       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
       $show_more_button = $content['show_more_button'];
       $show_more_label_icon = $content['show_more_label_icon'];
       $more_label = $content['more_label'];
       $cat_direction = $content['category_direction'];
       $cat_font_type = $content['category_font_type'];
       $show_category_sort_button = $content['show_category_sort_button'];
       $show_category_sort_button_icon = $content['show_category_sort_button_icon'];
       if(is_mobile()){
         $post_num = $content['post_num_mobile'];
       } else {
         $post_num = $content['post_num'];
       }

       // ソートボタン ------------------------------------------
       if($show_category_sort_button){
         if ( $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
  ?>
  <div class="gallery_category_sort_button">
   <ol>
    <li class="active">
     <a data-gallery-category="#gallery_cat_all" href="#">
      <?php if($icon_image && $show_category_sort_button_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
      <span><?php echo esc_html($content['all_label']); ?></span>
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
<div class="gallery_list_wrap active animation_<?php echo esc_attr($content['animation_type']); ?>" id="gallery_cat_all">
  <?php
       // ギャラリー一覧 -----------------------------------------
       $args = array( 'post_type' => 'gallery', 'posts_per_page' => $post_num, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC') );
       $post_list_query = new wp_query($args);
       $all_post_count = $post_list_query->found_posts;
       if($post_list_query->have_posts()):
  ?>
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
     <?php if ( $category && ! is_wp_error($category) ) { ?>
     <div class="category rich_font_<?php echo esc_attr($content['category_font_type']); ?> <?php if($content['category_direction']) { echo 'type2'; }; ?>">
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
    <?php endwhile; ?>
   </div><!-- END .gallery_list -->
   <?php if($show_more_button && ($all_post_count > $post_num)) { ?>
   <div class="entry-more" data-catid="" data-offset-post="<?php echo esc_attr($post_num); ?>">
    <?php if($icon_image && $show_more_label_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
    <span><?php echo esc_html($more_label); ?></span>
   </div>
   <div class="entry-loading"><?php _e( 'LOADING...', 'tcd-w' ); ?></div>
   <?php }; ?>
  </div><!-- END .gallery_list_wrap -->
  <?php endif; wp_reset_query(); ?>

  <?php
       // カテゴリー別　ギャラリー一覧 ---------------------------------------------------
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
  <div class="gallery_list_wrap animation_<?php echo esc_attr($content['animation_type']); ?>" id="gallery_cat_<?php echo $cat_id; ?>">
   <div class="gallery_list ajax_post_list">
    <?php
         while($post_list_query->have_posts()): $post_list_query->the_post();
           if(has_post_thumbnail()) {
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
           } elseif($options['no_image1']) {
             $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
           } else {
             $image = array();
             $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
           }
    ?>
    <article class="item">
     <div class="category rich_font_<?php echo esc_attr($content['category_font_type']); ?> <?php if($content['category_direction']) { echo 'type2'; }; ?>">
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
   <?php if($show_more_button && ($all_post_count > $post_num)) { ?>
   <div class="entry-more" data-catid="<?php echo esc_attr($cat_id); ?>" data-offset-post="<?php echo esc_attr($post_num); ?>">
    <?php if($icon_image && $show_more_label_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
    <span><?php echo esc_html($more_label); ?></span>
   </div>
   <div class="entry-loading"><?php _e( 'LOADING...', 'tcd-w' ); ?></div>
   <?php }; ?>
  </div><!-- END .gallery_list_wrap -->
  <?php
           endif; wp_reset_query();
         endforeach;
       endif;
  ?>

 </div><!-- END .index_gallery_list_inner -->

</div><!-- END .index_gallery_list -->

<?php
         // ギャラリーカテゴリー一覧 --------------------------------------------------------------------------------
         } elseif ( $content['cb_content_select'] == 'gallery_category_list' && $content['show_content'] ) {
           $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
           $show_icon = $content['title_show_icon'];
?>
<div class="index_gallery_category_list num<?php echo $content_count; ?>" id="cb_content_<?php echo $content_count; ?>">

 <div class="index_gallery_category_list_inner">
  <?php

       $category_ids = $content['category_ids'];
       $category_ids = str_replace(["\r\n", "\r", "\n"], "\n", $category_ids);
       $category_ids = explode("\n", $category_ids);

       $gallery_category_list = get_terms( 'gallery_category', array( 'orderby' => 'ID', 'include' => $category_ids ) );
       $headline_direction = $content['title_direction'];
       $headline_font_type = $content['title_font_type'];
       if ( $gallery_category_list && ! is_wp_error( $gallery_category_list ) ) :
         foreach ( $gallery_category_list as $cat ):
           $cat_id = $cat->term_id;
           $custom_fields = get_option( 'taxonomy_' . $cat_id, array() );
           $category_data = get_term( $cat_id, 'gallery_category' );
           $headline = $category_data->name;
           $sub_headline = isset($custom_fields['sub_title']) ?  $custom_fields['sub_title'] : '';
           $url = get_term_link($cat_id,'gallery_category');
           $image_id = isset($custom_fields['list_image']) ?  $custom_fields['list_image'] : '';
           if(!empty($image_id)) {
             $image = wp_get_attachment_image_src($image_id, 'full');
           }
  ?>
  <article class="item">
   <a class="animate_background" href="<?php echo esc_url($url); ?>">
    <div class="design_headline large <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?></h3>
    </div>
    <div class="image_wrap">
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
   </a>
  </article>
  <?php
         endforeach;
       endif;
  ?>
 </div><!-- END .index_gallery_category_list_inner -->

</div><!-- END .index_gallery_category_list -->

<?php
         // バナーコンテンツ --------------------------------------------------------------------------------
         } elseif ( $content['cb_content_select'] == 'banner_content' && $content['show_content'] ) {
?>
<div class="banner_content num<?php echo $content_count; ?>" id="cb_content_<?php echo $content_count; ?>">

 <div class="banner_contents_inner">

   <?php if(!empty($content['catch'])) { ?>
   <h2 class="catch rich_font_<?php echo esc_attr($content['catch_font_type']); ?>"><?php echo wp_kses_post(nl2br($content['catch'])); ?></h2>
   <?php }; ?>

   <?php if(!empty($content['desc'])) { ?>
   <p class="desc"><?php echo wp_kses_post(nl2br($content['desc'])); ?></p>
   <?php }; ?>

   <?php if($content['show_button']){ ?>
   <div class="cb_link_button">
    <a class="button_animation_<?php echo esc_attr($content['button_animation_type']); ?>" href="<?php echo esc_attr($content['button_url']); ?>" <?php if($content['button_target']){ echo 'target="_blank"'; }; ?>><span><?php echo esc_html($content['button_label']); ?></span></a>
   </div>
   <?php }; ?>

 </div><!-- END .banner_contents_inner -->

 <?php
      if($content['bg_use_overlay']){
        $bg_overlay_color = $content['bg_overlay_color'] ? $content['bg_overlay_color'] : '#000000';
        $bg_overlay_color = hex2rgb($bg_overlay_color);
        $bg_overlay_color = implode(",",$bg_overlay_color);
        $bg_overlay_opacity = $content['bg_overlay_opacity'] ? $content['bg_overlay_opacity'] : '0.3';
 ?>
 <div class="overlay" style="background:rgba(<?php echo $bg_overlay_color; ?>,<?php echo $bg_overlay_opacity; ?>)"></div>
 <?php }; ?>

 <?php
      $bg_image = $content['bg_image'] ? wp_get_attachment_image_src( $content['bg_image'], 'full' ) : '';
      $bg_image_mobile = $content['bg_image_mobile'] ? wp_get_attachment_image_src( $content['bg_image_mobile'], 'full' ) : '';
      if($bg_image) {
 ?>
 <div class="bg_image" data-parallax-image="<?php echo esc_attr($bg_image[0]); ?>" <?php if($bg_image_mobile) { ?>data-parallax-mobile-image="<?php echo esc_attr($bg_image_mobile[0]); ?>"<?php }; ?> <?php if(!$content['use_para']){ echo 'data-parallax-speed="0"'; }; ?>></div>
 <?php }; ?>

</div><!-- END .banner_content -->

<?php
     // フリースペース -----------------------------------------------------
     } elseif ( $content['cb_content_select'] == 'free_space' && $content['show_content'] ) {
       if (!empty($content['free_space'])) {
?>
<div class="cb_free_space cb_content num<?php echo $content_count; ?> <?php echo esc_attr($content['content_width']); ?>" id="cb_content_<?php echo $content_count; ?>">

  <div class="post_content clearfix">
   <?php echo apply_filters('the_content', $content['free_space'] ); ?>
  </div>

</div><!-- END .cb_free_space -->
<?php
           };
         };
       $content_count++;
       endforeach;
     endif;

// コンテンツビルダーここまで

     }; // END index_content_type
?>
</div><!-- END #index_content_builder -->
<?php get_footer(); ?>