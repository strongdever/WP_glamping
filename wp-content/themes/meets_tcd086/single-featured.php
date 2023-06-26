<?php
     get_header();
     $options = get_design_plus_option();
?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="single_featured">

 <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        $featured_num = get_post_meta($post->ID, 'featured_num', true);
        $category = wp_get_post_terms( $post->ID, 'featured_category' , array( 'orderby' => 'term_order' ));
        if ( $category && ! is_wp_error($category) ) {
          foreach ( $category as $cat ) :
            $cat_name = $cat->name;
            $cat_id = $cat->term_id;
            $cat_url = get_term_link($cat_id,'featured_category');
            break;
          endforeach;
        };
 ?>

  <article id="article">

   <?php if($page == '1') { // ***** only show on first page ***** ?>

   <div id="featured_post_title">
    <?php if ( $options['single_featured_show_num'] || $options['single_featured_show_category']) { ?>
    <div class="num_area">
     <?php if ( $options['single_featured_show_num'] ) { ?>
     <?php if ($options['featured_sub_title']){ ?><p class="sub_title"><?php echo esc_html($options['featured_sub_title']); ?></p><?php }; ?>
     <p class="featured_post_num"><?php echo esc_html($featured_num); ?></p>
     <?php }; ?>
     <?php if ( $category && $options['single_featured_show_category'] && ! is_wp_error($category) ) { ?>
     <a class="category" href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
     <?php }; ?>
    </div>
    <?php }; ?>
    <h1 class="title rich_font_<?php echo esc_attr($options['single_featured_title_font_type']); ?> entry-title"><?php the_title(); ?></h1>
    <ul class="meta_top clearfix">
     <?php if ( $options['single_featured_show_date']){ ?>
     <li class="date"><time class="entry-date published" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></li>
     <?php
          if ( $options['single_featured_show_update']){
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
        if($options['single_featured_show_image'] && has_post_thumbnail()) {
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size3' );
   ?>
   <div id="featured_post_image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php }; ?>

   <div id="featured_post_area">

   <?php
        // sns button top ------------------------------------------------------------------------------------------------------------------------
        if($options['single_featured_show_sns_top']) {
   ?>
   <div class="single_share clearfix" id="single_share_top">
    <?php get_template_part('template-parts/sns-btn-top'); ?>
   </div>
   <?php }; ?>

   <?php
        // copy title&url button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_featured_show_copy_top']) {
   ?>
   <div class="single_copy_title_url" id="single_copy_title_url_top">
    <button class="single_copy_title_url_btn" data-clipboard-text="<?php echo esc_attr( strip_tags( get_the_title() ) . ' ' . get_permalink() ); ?>" data-clipboard-copied="<?php echo esc_attr( __( 'COPIED Title&amp;URL', 'tcd-w' ) ); ?>"><?php _e( 'COPY Title&amp;URL', 'tcd-w' ); ?></button>
   </div>
   <?php }; ?>

   <?php
        // banner top ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['featured_single_top_ad_code'] || $options['featured_single_top_ad_image'] ) {
   ?>
   <div id="single_banner_top" class="single_banner">
    <?php
         if ($options['featured_single_top_ad_code']) {
           echo $options['featured_single_top_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['featured_single_top_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['featured_single_top_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_top -->
   <?php
          };
        };
   ?>

   <?php } else { // second page --- ?>
   <div id="featured_post_area">
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
        // data list ------------------------------------------------------------------------------------------------------------
        $data_list = get_post_meta($post->ID, 'data_list', true);
        if (!empty($data_list)) {
        $featured_catch = get_post_meta($post->ID, 'featured_catch', true);
   ?>
   <div id="featured_data_list">
    <div class="top_area">
     <?php if ( $options['single_featured_list_show_num']) { ?>
     <div class="num_area">
      <?php if ($options['featured_sub_title']){ ?><p class="sub_title"><?php echo esc_html($options['featured_sub_title']); ?></p><?php }; ?>
      <p class="featured_post_num"><?php echo esc_html($featured_num); ?></p>
     </div>
     <?php }; ?>
     <?php if($featured_catch){ ?>
     <h3 class="headline rich_font"><span><?php echo wp_kses_post(nl2br($featured_catch)); ?></span></h3>
     <?php }; ?>
    </div>
    <div class="data_area">
     <table>
      <?php
           foreach ( $data_list as $key => $value ) :
            $headline = $value['headline'];
            $desc = $value['desc'];
      ?>
      <tr>
      <?php if($headline) { echo '<th><p>' . wp_kses_post($headline) . '</p></th>'; }; ?>
      <?php if($desc) { echo '<td><p>' . wp_kses_post($desc) . '</p></td>'; }; ?>
      </tr>
      <?php endforeach; ?>
     </table>
    </div>
   </div>
   <?php }; ?>

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

   <?php
        // sns button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_featured_show_sns_btm']) {
   ?>
   <div class="single_share clearfix" id="single_share_bottom">
    <?php get_template_part('template-parts/sns-btn-btm'); ?>
   </div>
   <?php }; ?>

   <?php
        // copy title&url button ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if($options['single_featured_show_copy_btm']) {
   ?>
   <div class="single_copy_title_url" id="single_copy_title_url_bottom">
    <button class="single_copy_title_url_btn" data-clipboard-text="<?php echo esc_attr( strip_tags( get_the_title() ) . ' ' . get_permalink() ); ?>" data-clipboard-copied="<?php echo esc_attr( __( 'COPIED Title&amp;URL', 'tcd-w' ) ); ?>"><?php _e( 'COPY Title&amp;URL', 'tcd-w' ); ?></button>
   </div>
   <?php }; ?>

   <?php
        // page nav ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if ($options['single_featured_show_nav']) :
   ?>
   <div id="next_prev_post">
    <?php next_prev_post_link(); ?>
   </div>
   <?php endif; ?>

   <?php
        // banner bottom ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['featured_single_bottom_ad_code'] || $options['featured_single_bottom_ad_image'] ) {
   ?>
   <div id="single_banner_bottom" class="single_banner">
    <?php
         if ($options['featured_single_bottom_ad_code']) {
           echo $options['featured_single_bottom_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['featured_single_bottom_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['featured_single_bottom_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_bottom -->
   <?php
          };
        };
   ?>

   <?php
        // mobile banner ------------------------------------------------------------------------------------------------------------------------
        if(is_mobile()) {
          if( $options['featured_single_mobile_ad_code'] || $options['featured_single_mobile_ad_image'] ) {
   ?>
   <div id="single_banner_bottom" class="single_banner">
    <?php
         if ($options['featured_single_mobile_ad_code']) {
           echo $options['featured_single_mobile_ad_code'];
         } else {
         $banner_image = wp_get_attachment_image_src( $options['featured_single_mobile_ad_image'], 'full' );
    ?>
    <a href="<?php echo esc_url( $options['featured_single_mobile_ad_url'] ); ?>" target="_blank"><img class="single_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" /></a>
    <?php }; ?>
   </div><!-- END #single_banner_bottom -->
   <?php
          };
        };
   ?>

   </div><!-- END #featured_post_area -->

  </article><!-- END #article -->

  <?php endwhile; endif; ?>

  <?php
       // related post ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
       if ($options['show_related_featured']){
         if ( $category && ! is_wp_error($category) ) {
           $post_num = $options['related_featured_num'];
           if(is_mobile()){
             $post_num = $options['related_featured_num_mobile'];
           }
           $args = array( 'post_type' => 'featured', 'post__not_in' => array($post->ID), 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page' => $post_num, 'tax_query' => array( array( 'taxonomy' => 'featured_category', 'field' => 'term_id', 'terms' => $cat_id ) ) );
           $related_post_list = new wp_query($args);
           if($related_post_list->have_posts()):
  ?>
  <div id="featured_related_post">
   <h3 class="headline rich_font"><span><?php echo wp_kses_post(nl2br($options['related_featured_headline'])); ?></span></h3>
   <div class="featured_list type4">
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
    <article class="item small">
     <?php if ($options['related_featured_show_category']){ ?>
     <p class="category"><a href="<?php echo esc_url(get_term_link($featured_cat_id,'featured_category')); ?>"><?php echo esc_html($featured_cat_name); ?></a></p>
     <?php }; ?>
     <a class="link animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <?php if ($options['related_featured_show_num']){ ?>
       <div class="num_area">
        <?php if ($options['featured_sub_title']){ ?><p class="sub_title"><?php echo esc_html($options['featured_sub_title']); ?></p><?php }; ?>
        <p class="featured_post_num"><?php echo esc_html($featured_num); ?></p>
       </div>
       <?php }; ?>
       <h3 class="title"><span><?php the_title(); ?></span></h3>
      </div>
     </a>
    </article>
    <?php endwhile; wp_reset_query(); ?>
   </div><!-- END .featured_list -->
  </div><!-- END #featured_related_post -->
  <?php
           endif;
         };
       };
  ?>

</div><!-- END #single_featured -->
<?php get_footer(); ?>