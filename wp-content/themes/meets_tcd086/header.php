<?php $options = get_design_plus_option(); ?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php if($options['use_ogp']) { ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php }; ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
     if ( $options['favicon'] ) {
       $favicon_image = wp_get_attachment_image_src( $options['favicon'], 'full');
       if(!empty($favicon_image)) {
?>
<link rel="shortcut icon" href="<?php echo esc_url($favicon_image[0]); ?>">
<?php }; }; ?>
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>

<?php
     if ($options['show_load_screen'] == 'type2') {
       if(is_front_page()){
         load_icon();
       }
     } elseif ($options['show_load_screen'] == 'type3') {
       if(is_front_page() || is_home() || is_archive() ){
         load_icon();
       }
     };
?>

<div id="container">

 <?php
      // Message --------------------------------------------------------------------
      if($options['show_header_message'] && $options['header_message']) {
        if( (is_front_page() && $options['show_header_message_top']) || (!is_front_page() && $options['show_header_message_sub']) ) {
 ?>
 <div id="header_message" class="<?php echo esc_attr($options['header_message_width']); if($options['show_header_message_close']) { echo ' show_close_button'; }; ?>" <?php if($options['show_header_message_close'] && isset($_COOKIE['close_header_message'])) { echo 'style="display:none;"'; }; ?>>
  <div class="post_content clearfix">
   <?php echo apply_filters('the_content', $options['header_message'] ); ?>
  </div>
  <?php if($options['show_header_message_close']) { ?>
  <div id="close_header_message"></div>
  <?php }; ?>
 </div>
 <?php }; }; ?>

 <?php if( (is_page() && get_post_meta($post->ID, 'page_hide_header', true)) || (is_page() && get_post_meta($post->ID, 'page_header_type', true) == 'type2') || (is_singular('gallery') && !$options['single_gallery_show_header']) || is_404() && $options['hide_header_404']) { } else { ?>

 <header id="header">
  <?php
       // Logo --------------------------------------------------------------------
  ?>
  <div id="header_logo">
   <?php header_logo(); ?>
  </div>
  <?php
       // global menu ----------------------------------------------------------------
       if (has_nav_menu('global-menu')) {
  ?>
  <a class="global_menu_button" href="#"><span></span><span></span><span></span></a>
  <nav id="global_menu">
   <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
  </nav>
  <?php }; ?>
  <?php
       // Language link -------------------------------------------------
       if ($options['show_lang_button']) {
         $lang_button = $options['lang_button'];
         if(!empty($lang_button)){
  ?>
  <a href="#" id="header_lang_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
  <div id="header_lang">
   <ul>
    <?php
         $i = 1;
         foreach ( $lang_button as $key => $value ) :
           if($i == 1){
    ?>
    <li>
     <a<?php if($value['active_button']){ echo ' class="active_menu"'; }; ?> href="<?php echo esc_url($value['url']); ?>"><?php if($value['name']){ echo esc_html($value['name']); }; ?></a>
     <ul>
      <?php } else { ?>
      <li><a<?php if($value['active_button']){ echo ' class="active_menu"'; }; ?> href="<?php echo esc_url($value['url']); ?>"><?php if($value['name']){ echo esc_html($value['name']); }; ?></a></li>
      <?php }; ?>
      <?php $i++; endforeach; ?>
     </ul>
    </li>
   </ul>
  </div>
  <?php }; }; ?>
  <?php
       // Search --------------------------------------------------------------------
       if( is_page() && get_post_meta($post->ID, 'page_hide_search', true) ) { } else {
         if( $options['show_header_search']) {
  ?>
  <div id="header_search">
   <a id="header_search_button" href="#"></a>
   <form style="background:<?php echo esc_attr($options['search_form_bg_color']); ?>;" role="search" method="get" id="header_searchform" action="<?php echo esc_url(home_url()); ?>">
    <div class="input_area"><input type="text" value="" id="header_search_input" name="s" autocomplete="off"></div>
    <div class="button"><label for="header_search_button"></label><input type="submit" id="header_search_button" value=""></div>
   </form>
  </div>
  <?php }; }; ?>
  <?php get_template_part( 'template-parts/megamenu' ); ?>
 </header>

 <?php }; // END hide header ?>

 <?php
      //  Front page -------------------------------------------------------------------------
      if(is_front_page()) {

        $index_slider = '';
        $display_header_content = '';

        if(is_mobile() && ($options['mobile_show_index_slider'] == 'type2')){
          $device = 'mobile_';
        } else {
          $device = '';
        }

        if(!is_mobile() && $options['show_index_slider']) {
          $index_slider = $options['index_slider'];
          $display_header_content = 'show';
          $stop_animation = $options['stop_index_slider_animation'];
        } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type2') ) {
          $index_slider = $options['mobile_index_slider'];
          $display_header_content = 'show';
          $stop_animation = $options['mobile_stop_index_slider_animation'];
        } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type1') ) {
          $index_slider = $options['index_slider'];
          $stop_animation = $options['stop_index_slider_animation'];
          $display_header_content = 'show';
        }
 ?>
 <div id="index_header_logo" <?php if(!$stop_animation){ ?>class="use_animation first_animate_item"<?php }; ?>>
  <?php if( ($display_header_content == 'show') && $options[$device . 'show_index_logo']){ index_header_logo(); }; ?>
 </div>
 <?php if (has_nav_menu('global-menu')) { ?>
 <a class="global_menu_button <?php if(!$stop_animation){ ?>use_animation<?php }; ?>" href="#"><span></span><span></span><span></span></a>
 <?php }; ?>
 <?php
        //  Header slider -------------------------------------------------------------------------
        if($display_header_content == 'show'){
 ?>
 <div id="header_slider_wrap">
  <div id="header_slider">
   <?php
        $i = 1;
        $slider_item_total = count($index_slider);
        foreach ( $index_slider as $key => $value ) :
          $animation_type = $value['bg_image_animation_type'];
          $item_type = $value['slider_type'];
          if(is_mobile() && ($options['mobile_show_index_slider'] == 'type2') ) {
            $image = wp_get_attachment_image_src( $value['image'], 'full');
            $image_mobile = '';
            $desc_mobile = '';
            $center_logo_image = wp_get_attachment_image_src( $value['center_logo_image'], 'full' );
            $center_logo_image_width = $value['center_logo_image_width'];
            $center_logo_image_mobile = '';
            $center_logo_image_width_mobile = '';
            $hide_layer_image_mobile = '';
          } else {
            $image = wp_get_attachment_image_src( $value['image'], 'full');
            $image_mobile = wp_get_attachment_image_src( $value['image_mobile'], 'full');
            $desc_mobile = $value['desc_mobile'];
            $center_logo_image = wp_get_attachment_image_src( $value['center_logo_image'], 'full' );
            $center_logo_image_width = $value['center_logo_image_width'];
            $center_logo_image_mobile = wp_get_attachment_image_src( $value['center_logo_image_mobile'], 'full' );
            $center_logo_image_width_mobile = $value['center_logo_image_width_mobile'];
            $hide_layer_image_mobile = $value['hide_layer_image_mobile'];
          }
          $show_layer_image = $value['show_layer_image'];
          $layer_image1 = wp_get_attachment_image_src( $value['layer_image1'], 'full' );
          $layer_image2 = wp_get_attachment_image_src( $value['layer_image2'], 'full' );
          $layer_image3 = wp_get_attachment_image_src( $value['layer_image3'], 'full' );
          $layer_image4 = wp_get_attachment_image_src( $value['layer_image4'], 'full' );
          $layer_animation = $value['layer_image_animation_type'];
          $video = $value['video'];
          $youtube_url = $value['youtube'];
   ?>
   <div class="item <?php if( ($item_type == 'type2') && $video && auto_play_movie() ) { echo 'video'; } elseif( ($item_type == 'type3') && $youtube_url && auto_play_movie() ) { echo 'youtube'; } else { echo 'image_item'; }; ?> item<?php echo $i; ?> <?php if($i == 1){ echo 'first_item'; }; ?> slick-slide bg_animation_<?php echo esc_attr($animation_type); ?>">

    <?php if($show_layer_image){ ?>
    <div class="layer_image_wrap <?php if(!$stop_animation){ ?>animate_item <?php if($i == 1){ echo 'first_animate_item'; }; ?><?php }; ?> <?php if($hide_layer_image_mobile){ echo 'hide_in_mobile'; }; ?>">
     <?php
          if($layer_image1){ echo '<div class="layer_image animate_' . $layer_animation . ' left_top"><img src="' . esc_attr($layer_image1[0]) .'" alt="" title="" /></div>'; }
          if($layer_image2){ echo '<div class="layer_image animate_' . $layer_animation . ' right_top"><img src="' . esc_attr($layer_image2[0]) .'" alt="" title="" /></div>'; }
          if($layer_image3){ echo '<div class="layer_image animate_' . $layer_animation . ' left_bottom"><img src="' . esc_attr($layer_image3[0]) .'" alt="" title="" /></div>'; }
          if($layer_image4){ echo '<div class="layer_image animate_' . $layer_animation . ' right_bottom"><img src="' . esc_attr($layer_image4[0]) .'" alt="" title="" /></div>'; }
     ?>
    </div>
    <?php }; ?>

    <div class="caption">

     <?php if($center_logo_image) { ?>
     <h2 class="<?php if(!$stop_animation){ ?>animate_item <?php if($i == 1){ echo 'first_animate_item'; }; ?><?php }; ?> center_logo">
      <img <?php if($center_logo_image_mobile) { echo 'class="pc"'; }; ?> src="<?php echo esc_attr($center_logo_image[0]); ?>" alt="" title="" <?php if($center_logo_image_width){ ?>style="width:<?php echo esc_attr($center_logo_image_width); ?>px; height:auto;"<?php }; ?> />
      <?php if($center_logo_image_mobile) { ?>
      <img class="mobile" src="<?php echo esc_attr($center_logo_image_mobile[0]); ?>" alt="" title="" <?php if($center_logo_image_width_mobile){ ?>style="width:<?php echo esc_attr($center_logo_image_width_mobile); ?>px; height:auto;"<?php }; ?> />
      <?php }; ?>
     </h2>
     <?php }; ?>

     <?php if(!empty($value['catch'])){ ?>
     <h3 class="<?php if(!$stop_animation){ ?>animate_item <?php if($i == 1){ echo 'first_animate_item'; }; ?><?php }; ?> catch rich_font_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo wp_kses_post(nl2br($value['catch'])); ?></h3>
     <?php }; ?>

     <?php if(!empty($value['desc'])){ ?>
     <div class="<?php if(!$stop_animation){ ?>animate_item <?php if($i == 1){ echo 'first_animate_item'; }; ?><?php }; ?> desc <?php if(!$value['show_desc_mobile']) { echo 'hide_desc_mobile'; } else { echo 'animate_item_mobile'; }; ?>">
      <p<?php if($desc_mobile && $value['show_desc_mobile']){ echo ' class="pc"'; }; ?>><?php echo wp_kses_post(nl2br($value['desc'])); ?></p>
      <?php if($desc_mobile && $value['show_desc_mobile']) { ?><p class="mobile"><?php echo wp_kses_post(nl2br($desc_mobile)); ?></p><?php }; ?>
     </div>
     <?php }; ?>

     <?php if($value['show_button']){ ?>
     <a class="<?php if(!$stop_animation){ ?>animate_item <?php if($i == 1){ echo 'first_animate_item'; }; ?><?php }; ?> button button_animation_<?php echo esc_attr($value['button_animation_type']); ?>" href="<?php echo esc_attr($value['button_url']); ?>" <?php if($value['button_target']){ echo 'target="_blank"'; }; ?>><span><?php echo esc_html($value['button_label']); ?></span></a>
     <?php }; ?>

    </div><!-- END .caption -->

    <?php if($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>

    <?php if( ($item_type == 'type2') && $video && auto_play_movie() ) { ?>
    <video class="video_wrap" preload="auto" muted playsinline <?php if($slider_item_total == 1) { echo "loop"; }; ?>>
     <source src="<?php echo esc_url(wp_get_attachment_url($video)); ?>" type="video/mp4" />
    </video>
    <?php
         } elseif( ($item_type == 'type3') && $youtube_url && auto_play_movie() ) {
           if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $youtube_url, $matches)) {
    ?>
    <div class="video_wrap">
     <div class="youtube_inner">
      <iframe id="youtube-player-<?php echo $i; ?>" class="youtube-player slide-youtube" src="https://www.youtube.com/embed/<?php echo esc_attr($matches[1]); ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&<?php if($slider_item_total > 1) { echo "loop=0"; } else { echo "playlist=" . esc_attr($matches[1]); }; ?>&playsinline=1" frameborder="0"></iframe>
     </div>
    </div>
    <?php
           };
         } else {
    ?>
    <?php if($image) { ?><div class="bg_image <?php if($image_mobile) { echo 'pc'; }; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
    <?php if($image_mobile) { ?><div class="bg_image mobile" style="background:url(<?php echo esc_attr($image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
    <?php }; ?>

   </div><!-- END .item -->
   <?php
        $i++;
        endforeach;
   ?>
  </div><!-- END #header_slider -->
  <a id="main_contents_link" <?php if(!$stop_animation){ ?>class="use_animation"<?php }; ?> href="#index_content_builder"><span><?php echo esc_html($options[$device .'index_slider_message']); ?></span></a>
 </div><!-- END #header_slider_wrap -->
 <?php
        }; // END display_header_content
      }; // END front page
 ?>
