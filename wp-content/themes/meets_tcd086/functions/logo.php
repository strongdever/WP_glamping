<?php

//ヘッダーロゴ　---------------------------------------------------------------------------------------------
function header_logo(){

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = wp_get_attachment_image_src( $options['header_logo_image'], 'full' );
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['header_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = wp_get_attachment_image_src( $options['header_logo_image_mobile'], 'full' );
  if($logo_image_mobile) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if($options['header_logo_retina_mobile'] == 1) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

?>
<?php if( !is_front_page() || is_page() ) { ?>
<p class="logo">
<?php } else { ?>
<h1 class="logo">
<?php }; ?>
 <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
  <?php if( ($options['header_logo_type'] == 'type2') && $logo_image ){ ?>
  <img class="logo_image<?php if($logo_image_mobile){ echo ' pc'; }; ?>" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
  <?php if($logo_image_mobile){ ?><img class="logo_image mobile" src="<?php echo esc_attr($logo_image_mobile[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" /><?php }; ?>
  <?php } else { ?>
  <span class="logo_text"><?php echo esc_html($title); ?></span>
  <?php }; ?>
 </a>
<?php if( !is_front_page() ) { ?>
</p>
<?php } else { ?>
</h1>
<?php }; ?>

<?php
}


//フッターロゴ　---------------------------------------------------------------------------------------------
function footer_logo(){

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = wp_get_attachment_image_src( $options['footer_logo_image'], 'full' );
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['footer_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = wp_get_attachment_image_src( $options['footer_logo_image_mobile'], 'full' );
  if($logo_image_mobile) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if($options['footer_logo_retina_mobile'] == 1) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

?>

<h2 class="logo">
 <?php if( ($options['footer_logo_type'] == 'type2') && $logo_image ){ ?>
 <img class="logo_image<?php if($logo_image_mobile){ echo ' pc'; }; ?>" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
 <?php if($logo_image_mobile){ ?><img class="logo_image mobile" src="<?php echo esc_attr($logo_image_mobile[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" /><?php }; ?>
 <?php } else { ?>
 <span class="logo_text"><?php echo esc_html($title); ?></span>
 <?php }; ?>
</h2>

<?php
}


// トップページ専用
function index_header_logo(){

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = wp_get_attachment_image_src( $options['index_logo_image'], 'full' );
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['index_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = wp_get_attachment_image_src( $options['index_logo_image_mobile'], 'full' );
  if($logo_image_mobile) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if($options['index_logo_retina_mobile'] == 1) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

?>
<h1 class="logo">
 <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
  <?php if( ($options['index_logo_type'] == 'type2') && $logo_image ){ ?>
  <img class="logo_image<?php if($logo_image_mobile){ echo ' pc'; }; ?>" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
  <?php if($logo_image_mobile){ ?><img class="logo_image mobile" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" /><?php }; ?>
  <?php } else { ?>
  <span class="logo_text"><?php echo esc_html($title); ?></span>
  <?php }; ?>
 </a>
</h1>

<?php
}

//LPページ用ロゴ　---------------------------------------------------------------------------------------------
function lp_logo(){

  global $post;

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = get_post_meta($post->ID, 'page_logo_image', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_logo_image', true), 'full' ) : '';
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if(get_post_meta($post->ID, 'page_logo_use_letina', true)) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = get_post_meta($post->ID, 'page_logo_image_mobile', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_logo_image_mobile', true), 'full' ) : '';
  if($logo_image_mobile) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if(get_post_meta($post->ID, 'page_logo_use_letina_mobile', true)) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

  $page_logo_type = get_post_meta($post->ID, 'page_logo_type', true) ?  get_post_meta($post->ID, 'page_logo_type', true) : 'type1';

?>

<p class="logo">
 <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
  <?php if( ($page_logo_type == 'type2') && $logo_image ){ ?>
  <img class="logo_image<?php if($logo_image_mobile){ echo ' pc'; }; ?>" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
  <?php if($logo_image_mobile){ ?><img class="logo_image mobile" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" /><?php }; ?>
  <?php } else { ?>
  <span class="logo_text" style="font-size:<?php echo esc_html($options['lp_logo_font_size']); ?>px;"><?php echo esc_html($title); ?></span>
  <?php }; ?>
 </a>
</p>

<?php
}

?>