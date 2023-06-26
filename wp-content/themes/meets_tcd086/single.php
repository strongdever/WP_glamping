<?php
     get_header();
     $options = get_design_plus_option();
     $side_content_layout = get_post_meta($post->ID, 'side_content_layout', true) ?  get_post_meta($post->ID, 'side_content_layout', true) : 'type0';
?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="main_contents" class="layout_<?php if($side_content_layout == 'type0'){ echo esc_attr($options['single_blog_sidebar']); } else { echo esc_attr($side_content_layout); }; ?>">

 <div id="main_col">

 <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        $category = wp_get_post_terms( $post->ID, 'category' , array( 'orderby' => 'term_order' ));
        if ( $category && ! is_wp_error($category) ) {
          foreach ( $category as $cat ) :
            $cat_name = $cat->name;
            $cat_id = $cat->term_id;
            $cat_url = get_term_link($cat_id,'category');
            break;
          endforeach;
        };
 ?>

  <article id="article">

   <?php if($page == '1') { // ***** only show on first page ***** ?>

   <div id="post_title">
    <?php if ( $category && $options['single_blog_show_category'] && ! is_wp_error($category) ) { ?>
    <a class="category" href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
    <?php }; ?>
    <h1 class="title rich_font_<?php echo esc_attr($options['single_blog_title_font_type']); ?> entry-title"><?php the_title(); ?></h1>
    <ul class="meta_top clearfix">
     <?php if ( $options['single_blog_show_date']){ ?>
     <li class="date"><time class="entry-date published" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></li>
     <?php
          if ( $options['single_blog_show_update']){
            $post_date = get_the_time('Ymd');
            $modified_date = get_the_modified_date('Ymd');
            if($post_date < $modified_date){
     ?>
     <li class="update"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_date('Y.m.d'); ?></time></li>
     <?php
            };
          };
     ?>
     <?php }; ?>
    </ul>
   </div>

   <?php
        if($options['single_blog_show_image'] && has_post_thumbnail()) {
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size2' );
   ?>
   <div id="post_image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php }; ?>

   <?php
        // sns button top ------------------------------------------------------------------------------------------------------------------------
        if($options['single_blog_show_sns_top']) {
   ?>
   <div class="single_share clearfix" id="single_share_top">
    <?php get_template_part('template-parts/sns-btn-top'); ?>
   </div>
   <?php }; ?>

   <?php
        // copy title&url button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_blog_show_copy_top']) {
   ?>
   <div class="single_copy_title_url" id="single_copy_title_url_top">
    <button class="single_copy_title_url_btn" data-clipboard-text="<?php echo esc_attr( strip_tags( get_the_title() ) . ' ' . get_permalink() ); ?>" data-clipboard-copied="<?php echo esc_attr( __( 'COPIED Title&amp;URL', 'tcd-w' ) ); ?>"><?php _e( 'COPY Title&amp;URL', 'tcd-w' ); ?></button>
   </div>
   <?php }; ?>

   <?php
        // banner top ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['single_top_ad_code'] || $options['single_top_ad_image'] ) {
   ?>
   <div id="single_banner_top" class="single_banner">
    <?php
         if ($options['single_top_ad_code']) {
           echo $options['single_top_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['single_top_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['single_top_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_top -->
   <?php
          };
        };
   ?>

   <?php }; // ***** END only show on first page ***** ?>

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
        // CTA -----------------------------
        if ( $options['cta_display'] != '5') { get_template_part( 'template-parts/cta' ); }
   ?>

   <?php
        // sns button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_blog_show_sns_btm']) {
   ?>
   <div class="single_share clearfix" id="single_share_bottom">
    <?php get_template_part('template-parts/sns-btn-btm'); ?>
   </div>
   <?php }; ?>

   <?php
        // copy title&url button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_blog_show_copy_btm']) {
   ?>
   <div class="single_copy_title_url" id="single_copy_title_url_bottom">
    <button class="single_copy_title_url_btn" data-clipboard-text="<?php echo esc_attr( strip_tags( get_the_title() ) . ' ' . get_permalink() ); ?>" data-clipboard-copied="<?php echo esc_attr( __( 'COPIED Title&amp;URL', 'tcd-w' ) ); ?>"><?php _e( 'COPY Title&amp;URL', 'tcd-w' ); ?></button>
   </div>
   <?php }; ?>

   <?php
        // meta ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if ($options['single_blog_show_meta_box']) {
   ?>
   <ul id="post_meta_bottom" class="clearfix">
    <?php if ($options['single_blog_show_meta_author']) : ?><li class="post_author"><?php _e("Author","tcd-w"); ?>: <?php if (function_exists('coauthors_posts_links')) { coauthors_posts_links(', ',', ','','',true); } else { the_author_posts_link(); }; ?></li><?php endif; ?>
    <?php if ($options['single_blog_show_meta_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
    <?php if ($options['single_blog_show_meta_tag']): ?><?php the_tags('<li class="post_tag">',', ','</li>'); ?><?php endif; ?>
    <?php if ($options['single_blog_show_meta_comment']) : if (comments_open()){ ?><li class="post_comment"><?php _e("Comment","tcd-w"); ?>: <a href="#comments"><?php comments_number( '0','1','%' ); ?></a></li><?php }; endif; ?>
   </ul>
   <?php }; ?>

   <?php
        // page nav ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if ($options['single_blog_show_nav']) :
   ?>
   <div id="next_prev_post">
    <?php next_prev_post_link(); ?>
   </div>
   <?php endif; ?>

  </article><!-- END #article -->

   <?php
        // banner bottom ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['single_bottom_ad_code'] || $options['single_bottom_ad_image'] ) {
   ?>
   <div id="single_banner_bottom" class="single_banner">
    <?php
         if ($options['single_bottom_ad_code']) {
           echo $options['single_bottom_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['single_bottom_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['single_bottom_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_bottom -->
   <?php
          };
        };
   ?>

   <?php
        // mobile banner ------------------------------------------------------------------------------------------------------------------------
        if(is_mobile()) {
          if( $options['single_mobile_ad_code'] || $options['single_mobile_ad_image'] ) {
   ?>
   <div id="single_banner_bottom" class="single_banner">
    <?php
         if ($options['single_mobile_ad_code']) {
           echo $options['single_mobile_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['single_mobile_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['single_mobile_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_bottom -->
   <?php
          };
        };
   ?>

   <?php
        // Author profile ------------------------------------------------------------------------------------------------------------------------------
        $author_id = get_the_author_meta('ID');
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
    <a class="avatar_area animate_image" href="<?php echo esc_url($author_url); ?>"><?php echo wp_kses_post(get_avatar($author_id, 300)); ?></a>
    <div class="info">
     <div class="info_inner">
      <h4 class="name rich_font"><a href="<?php echo esc_url($author_url); ?>"><span class="author"><?php echo esc_html($user_data->display_name); ?></span></a></h4>
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
   <?php }; ?>

  <?php endwhile; endif; ?>

  <?php
       // banner content ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       if ($options['show_single_blog_banner']){
         $image = wp_get_attachment_image_src( $options['single_blog_banner_image'], 'full' );
         if($image && $options['single_blog_banner_url']){
  ?>
  <div id="single_banner_content">
   <a class="animate_background" href="<?php echo esc_url($options['single_blog_banner_url']); ?>" <?php if($options['single_blog_banner_target']){ echo 'target="_blank"'; }; ?>>
    <div class="image_wrap">
     <?php if($options['single_blog_banner_title'] || $options['single_blog_banner_sub_title']) { ?>
     <div class="title_area">
      <?php if($options['single_blog_banner_title']) { ?>
      <h3 class="title rich_font_<?php echo esc_attr($options['single_blog_banner_title_font_type']); ?>"><span><?php echo nl2br(esc_html($options['single_blog_banner_title'])); ?></span></h3>
      <?php }; ?>
      <?php if($options['single_blog_banner_sub_title']) { ?>
      <p class="sub_title"><span><?php echo nl2br(esc_html($options['single_blog_banner_sub_title'])); ?></span></p>
      <?php }; ?>
     </div>
     <?php }; ?>
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
    <?php if($options['single_blog_banner_desc']){ ?>
    <div class="desc">
     <p><?php echo wp_kses_post(nl2br($options['single_blog_banner_desc'])); ?></p>
    </div>
    <?php }; ?>
   </a>
  </div>
  <?php }; }; ?>

  <?php
       // related post ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       if ($options['show_related_post']){
         $categories = get_the_category($post->ID);
         if ($categories) {
           $post_num = $options['related_post_num'];
           if(is_mobile()){
             $post_num = $options['related_post_num_mobile'];
           }
           $category_ids = array();
           foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
           $args = array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=> $post_num, 'orderby' => 'rand');
           $related_post_list = new wp_query($args);
           if($related_post_list->have_posts()):
  ?>
  <div id="related_post">
   <h3 class="headline rich_font"><span><?php echo wp_kses_post(nl2br($options['related_post_headline'])); ?></span></h3>
   <div class="post_list">
    <?php
         while( $related_post_list->have_posts() ) : $related_post_list->the_post();
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
     <a class="animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <h4 class="title"><span><?php the_title(); ?></span></h4>
     </a>
    </article>
    <?php endwhile; wp_reset_query(); ?>
   </div><!-- END .post_list -->
  </div><!-- END #related_post -->
  <?php
           endif;
         };
       };
  ?>

  <?php
       // comment ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       if ($options['single_blog_show_comment'] || $options['single_blog_show_trackback']) { comments_template('', true); };
  ?>

 </div><!-- END #main_col -->

 <?php
      // widget ------------------------
      if($side_content_layout == 'type0'){
        if($options['single_blog_sidebar'] != 'type1'){
          get_sidebar();
         };
      } else {
        if($side_content_layout != 'type1'){
          get_sidebar();
         };
      }
 ?>

</div><!-- END #main_contents -->
<?php get_footer(); ?>