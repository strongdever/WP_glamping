<?php $options = get_design_plus_option(); ?>

 <?php
      // dont display footer in gallery single page
      if(!is_singular('gallery')) {
 ?>

 <?php
      if(is_page()){ 
        $page_hide_footer = get_post_meta($post->ID, 'page_hide_footer', true);
      } elseif(is_404()){ 
        $page_hide_footer = $options['hide_footer_404'];
      } else {
        $page_hide_footer = '';
      }
      if(!$page_hide_footer){
 ?>

 <?php
      // banner content -----------------------------------------
      if($options['show_footer_banner1'] || $options['show_footer_banner2'] || $options['show_footer_banner3']) {
 ?>
 <div id="footer_banner">
  <?php
       for($i = 1; $i <= 3; $i++) {
         if($options['show_footer_banner'.$i]) {
           $image = wp_get_attachment_image_src($options['footer_banner_image'.$i], 'full');
  ?>
  <div class="item">
   <a class="animate_background" href="<?php echo esc_html($options['footer_banner_url'.$i]); ?>">
    <div class="headline <?php if($options['footer_banner_font_direction']){ echo 'type2'; }; ?>">
     <h4><?php if($options['footer_banner_sub_title'.$i]) { ?><span class="sub_title"><?php echo esc_html($options['footer_banner_sub_title'.$i]); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_html($options['footer_banner_title_font_type']); ?>"><?php echo esc_html($options['footer_banner_title'.$i]); ?></span></h4>
    </div>
    <div class="image_wrap">
     <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
    </div>
   </a>
  </div>
  <?php }; }; ?>
 </div>
 <?php }; ?>

 <?php
      $bg_image = wp_get_attachment_image_src($options['footer_bg_image'], 'full');
      $bg_image_mobile = wp_get_attachment_image_src($options['footer_bg_image_mobile'], 'full');
      if($options['footer_bg_type'] == 'type2') {
        $bg_image = '';
        $video = $options['footer_bg_video'];
        if(!empty($video)) {
          if (!auto_play_movie()) {
            $video_image_id = $options['footer_bg_video_image'];
            if($video_image_id) {
              $bg_image = wp_get_attachment_image_src($video_image_id, 'full');
            }
          }
        }
      }
 ?>
 <footer id="footer">

  <div id="footer_top">
   <?php
        // video -----------------------------------------------------
        if($options['footer_bg_type'] == 'type2') {
          $video = $options['footer_bg_video'];
          if(!empty($video)) {
            if (auto_play_movie()) {
   ?>
   <video id="footer_video" src="<?php echo esc_url(wp_get_attachment_url($video)); ?>" playsinline autoplay loop muted></video>
   <?php }; }; }; ?>
   <div id="footer_top_inner">
    <?php
         // logo ------------------------
         if( $options['show_footer_logo']) {
    ?>
    <div id="footer_logo">
     <?php footer_logo(); ?>
    </div>
    <?php }; ?>
    <?php
         // message ------------------------
         if( $options['footer_message']) {
    ?>
    <p id="footer_message"><?php echo wp_kses_post(nl2br($options['footer_message'])); ?></p>
    <?php }; ?>
    <?php
         // message ------------------------
         if( $options['footer_message_sub']) {
    ?>
    <p id="footer_message_sub"><?php echo wp_kses_post(nl2br($options['footer_message_sub'])); ?></p>
    <?php }; ?>
	   <div class="cb_link_button cb_item"><a class="button_animation_type1" href="#"><span>ご予約・お問い合わせはこちら</span></a>
  </div>
   </div><!-- END #footer_top_inner -->
   <?php
        $use_overlay = $options['footer_bg_use_overlay'];
        if($use_overlay) {
          $overlay_color = hex2rgb($options['footer_bg_overlay_color']);
          $overlay_color = implode(",",$overlay_color);
          $overlay_opacity = $options['footer_bg_overlay_opacity'];
   ?>
   <div id="footer_overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
   <?php }; ?>
   <?php if(!empty($bg_image)) { ?>
   <div id="footer_bg_image" <?php if(!empty($bg_image_mobile)) { echo 'class="pc"'; }; ?> style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php }; ?>
   <?php if(!empty($bg_image_mobile)) { ?>
   <div id="footer_bg_image" class="mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php }; ?>
  </div>

  <div id="footer_bottom">
   <?php // footer menu -------------------------------------------- ?>
   <?php if (has_nav_menu('footer-menu')) { ?>
   <div id="footer_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu' , 'container' => '' , 'depth' => '1') ); ?>
   </div>
   <?php }; ?>
   <?php
        // footer sns ------------------------------------
        if($options['show_footer_sns']) {
          $facebook = $options['header_facebook_url'];
          $twitter = $options['header_twitter_url'];
          $insta = $options['header_instagram_url'];
          $pinterest = $options['header_pinterest_url'];
          $youtube = $options['header_youtube_url'];
          $contact = $options['header_contact_url'];
          $show_rss = $options['header_show_rss'];
   ?>
   <ul id="footer_sns" class="footer_sns clearfix">
    <?php if($insta) { ?><li class="insta"><a href="<?php echo esc_url($insta); ?>" rel="nofollow" target="_blank" title="Instagram"><span>Instagram</span></a></li><?php }; ?>
    <?php if($twitter) { ?><li class="twitter"><a href="<?php echo esc_url($twitter); ?>" rel="nofollow" target="_blank" title="Twitter"><span>Twitter</span></a></li><?php }; ?>
    <?php if($facebook) { ?><li class="facebook"><a href="<?php echo esc_url($facebook); ?>" rel="nofollow" target="_blank" title="Facebook"><span>Facebook</span></a></li><?php }; ?>
    <?php if($pinterest) { ?><li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>" rel="nofollow" target="_blank" title="Pinterest"><span>Pinterest</span></a></li><?php }; ?>
    <?php if($youtube) { ?><li class="youtube"><a href="<?php echo esc_url($youtube); ?>" rel="nofollow" target="_blank" title="Youtube"><span>Youtube</span></a></li><?php }; ?>
    <?php if($contact) { ?><li class="contact"><a href="<?php echo esc_url($contact); ?>" rel="nofollow" target="_blank" title="Contact"><span>Contact</span></a></li><?php }; ?>
    <?php if($show_rss) { ?><li class="rss"><a href="<?php esc_url(bloginfo('rss2_url')); ?>" rel="nofollow" target="_blank" title="RSS"><span>RSS</span></a></li><?php }; ?>
   </ul>
   <?php }; ?>
  </div><!-- END #footer_bottom -->

  <?php // copyright -------------------------------------------- ?>
  <p id="copyright"><?php echo wp_kses_post($options['copyright']); ?></p>

 </footer>

 <?php }; // END hide footer ?>

 <div id="return_top">
  <a href="#body"><span>TOP</span></a>
 </div>

 <?php
      // footer bar for mobile device -------------------
      if( is_mobile() && ($options['footer_bar_display'] != 'type3') && ($options['footer_bar_type'] == 'type1') && ($options['footer_cta_display'] == '5')) {
        get_template_part('template-parts/footer-bar');
      } elseif( is_mobile() && ($options['footer_bar_display'] != 'type3') && ($options['footer_bar_type'] == 'type2') && ($options['footer_cta_display'] == '5')) {
 ?>
 <div id="dp-footer-bar" class="type2">
  <?php
       for($i = 1; $i <= 2; $i++) {
         if($options['show_footer_button'.$i]) {
  ?>
  <a class="footer_button num<?php echo $i; ?>" href="<?php echo esc_html($options['footer_button_url'.$i]); ?>" <?php if($options['footer_button_target'.$i]){ echo 'target="_blank"'; }; ?>>
   <span><?php echo esc_html($options['footer_button_label'.$i]); ?></span>
  </a>
  <?php }; }; ?>
 </div>
 <?php
      }
      // footer cta -------------------
      if( $options['footer_cta_display'] != '5' && ! isset( $_COOKIE['tcdHideFooterCTA'] ) ) {
        if( ( is_front_page() && ! $options['footer_cta_hide_on_front'] ) || ! is_front_page() ) {
          get_template_part( 'template-parts/footer-cta' );
        }
      }
 ?>

 <?php }; // END if gallery single page ?>

</div><!-- #container -->

<?php // drawer menu -------------------------------------------- ?>
<?php if (has_nav_menu('global-menu')) { ?>
<div id="drawer_menu">
 <nav>
  <?php wp_nav_menu( array( 'menu_id' => 'mobile_menu', 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
 </nav>
 <?php
      // Search --------------------------------------------------------------------
      if( $options['show_header_search']) {
 ?>
 <div id="footer_search">
  <form role="search" method="get" id="footer_searchform" action="<?php echo esc_url(home_url()); ?>">
   <div class="input_area"><input type="text" value="" id="footer_search_input" name="s" autocomplete="off"></div>
   <div class="button"><label for="footer_search_button"></label><input type="submit" id="footer_search_button" value=""></div>
  </form>
 </div>
 <?php }; ?>
 <?php
      // Language link -------------------------------------------------
      if ($options['show_lang_button']) {
        $lang_button = $options['lang_button'];
        if(!empty($lang_button)){
 ?>
 <div id="footer_lang">
  <ul>
   <?php foreach ( $lang_button as $key => $value ) : ?>
   <li><a<?php if($value['active_button']){ echo ' class="active_menu"'; }; ?> href="<?php echo esc_url($value['url']); ?>"><?php if($value['name']){ echo esc_html($value['name']); }; ?></a></li>
   <?php endforeach; ?>
  </ul>
 </div>
 <?php }; }; ?>
 <div id="mobile_banner">
  <?php
       for($i=1; $i<= 3; $i++):
         if( $options['mobile_menu_ad_code'.$i] || $options['mobile_menu_ad_image'.$i] ) {
           if ($options['mobile_menu_ad_code'.$i]) {
  ?>
  <div class="banner">
   <?php echo $options['mobile_menu_ad_code'.$i]; ?>
  </div>
  <?php
       } else {
         $mobile_menu_image = wp_get_attachment_image_src( $options['mobile_menu_ad_image'.$i], 'full' );
  ?>
  <div class="banner">
   <a href="<?php echo esc_url( $options['mobile_menu_ad_url'.$i] ); ?>"<?php if($options['mobile_menu_ad_target'.$i] == 1) { ?> target="_blank"<?php }; ?>><img src="<?php echo esc_attr($mobile_menu_image[0]); ?>" alt="" title="" /></a>
  </div>
  <?php }; }; endfor; ?>
 </div><!-- END #footer_mobile_banner -->
</div>
<?php }; ?>

<?php
     // load script -----------------------------------------------------------
     if ($options['show_load_screen'] == 'type2') {
       if(is_front_page()){
         has_loading_screen();
       } else {
         no_loading_screen();
       }
     } elseif ($options['show_load_screen'] == 'type3') {
       if(is_front_page() || is_home() || is_archive() ){
         has_loading_screen();
       } else {
         no_loading_screen();
       }
     } else {
       no_loading_screen();
     };
?>

<?php
     // share button ----------------------------------------------------------------------
     if ( is_single() && ( $options['single_blog_show_sns_top'] || $options['single_blog_show_sns_btm'] || $options['single_news_show_sns_top'] || $options['single_news_show_sns_btm']) ) :
       if ( 'type5' == $options['sns_type_top'] || 'type5' == $options['sns_type_btm'] ) :
         if ( $options['show_twitter_top'] || $options['show_twitter_btm'] ) :
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
         endif;
         if ( $options['show_fblike_top'] || $options['show_fbshare_top'] || $options['show_fblike_btm'] || $options['show_fbshare_btm'] ) :
?>
<!-- facebook share button code -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
         endif;
         if ( $options['show_hatena_top'] || $options['show_hatena_btm'] ) :
?>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
         endif;
         if ( $options['show_pocket_top'] || $options['show_pocket_btm'] ) :
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
         endif;
         if ( $options['show_pinterest_top'] || $options['show_pinterest_btm'] ) :
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
         endif;
       endif;
     endif;
?>

<?php wp_footer(); ?>
</body>
</html>