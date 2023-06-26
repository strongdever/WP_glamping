<?php

class tcd_ad_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcd_ad_widget',// ID
      __( 'AdSense (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcd_ad_widget',
        'description' => __('Show AdSense at random in front page.', 'tcd-w')
      )
    );
  }

  function widget($args, $instance) {

    extract($args);

    // Before widget //
    if(!is_404()) {

    echo $before_widget;

      $banner_code1 = $instance['banner_code1'];
      $banner_image1 = wp_get_attachment_image_src( $instance['banner_image1'], 'full' );
      $banner_url1 = $instance['banner_url1'];
      $banner_code2 = $instance['banner_code2'];
      $banner_image2 = wp_get_attachment_image_src( $instance['banner_image2'], 'full' );
      $banner_url2 = $instance['banner_url2'];
      $banner_code3 = $instance['banner_code3'];
      $banner_image3 = wp_get_attachment_image_src( $instance['banner_image3'], 'full' );
      $banner_url3 = $instance['banner_url3'];

      if ($banner_code3 || $banner_image3) { 
        $random = rand(0,2);
      } elseif ($banner_code2 || $banner_image2) {
        $random = rand(0,1);
      } elseif ($banner_code1 || $banner_image1) {
        $random = rand(0,0);
      } else {
        $random = '';
      };

      if($random==0){
        if ($banner_code1) { echo $banner_code1; } else { echo '<a href="' . esc_url($banner_url1) . '" target="_blank"><img src="' . esc_attr($banner_image1[0]) . '" alt="" /></a>' . "\n"; };
      } elseif($random==1){
        if ($banner_code2) { echo $banner_code2; } else { echo '<a href="' . esc_url($banner_url2) . '" target="_blank"><img src="' . esc_attr($banner_image2[0]) . '" alt="" /></a>' . "\n"; };
      } elseif($random==2){
        if ($banner_code3) { echo $banner_code3; } else { echo '<a href="' . esc_url($banner_url3) . '" target="_blank"><img src="' . esc_attr($banner_image3[0]) . '" alt="" /></a>' . "\n"; };
      };

    // After widget //
    echo $after_widget;

    };

  }

  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['banner_code1'] = $new_instance['banner_code1'];
    $instance['banner_image1'] = strip_tags($new_instance['banner_image1']);
    $instance['banner_url1'] = $new_instance['banner_url1'];
    $instance['banner_code2'] = $new_instance['banner_code2'];
    $instance['banner_image2'] = strip_tags($new_instance['banner_image2']);
    $instance['banner_url2'] = $new_instance['banner_url2'];
    $instance['banner_code3'] = $new_instance['banner_code3'];
    $instance['banner_image3'] = strip_tags($new_instance['banner_image3']);
    $instance['banner_url3'] = $new_instance['banner_url3'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'banner_code1' => '', 'banner_image1' => '', 'banner_url1' => '', 'banner_code2' => '', 'banner_image2' => '', 'banner_url2' => '', 'banner_code3' => '', 'banner_image3' => '', 'banner_url3' => '' );
    $instance = wp_parse_args( (array) $instance, $defaults );
?>

<p><?php _e('One out of three AdSense will be displayed at random in front page.','tcd-w'); ?></p>

<div class="tcd_ad_widget_box_wrap">

<?php for($i = 1; $i <= 3; $i++): ?>
<h3 class="tcd_ad_widget_headline"><?php _e('AdSense','tcd-w'); ?><?php echo $i; ?></h3>
<div class="tcd_ad_widget_box">
  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Register AdSense code', 'tcd-w'); ?></h3>
   <p><?php _e('If you are using Google AdSense or similar kind of AdSense, enter all code below.', 'tcd-w');  ?></p>
   <p><textarea style="width:100%; height:150px;" id="<?php echo $this->get_field_id('banner_code'.$i); ?>" name="<?php echo $this->get_field_name('banner_code'.$i); ?>"><?php echo $instance['banner_code'.$i]; ?></textarea></p>
  </div>
  <p class="widget_notice"><?php _e('If you want to register banner image and affiliate code individually, leave the field above blank and use the field below.', 'tcd-w');  ?></p>
  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Register AdSense image', 'tcd-w'); ?></h3>
   <div class="widget_media_upload cf cf_media_field hide-if-no-js <?php echo $this->get_field_id('banner_image'.$i); ?>">
    <input type="hidden" value="<?php echo $instance['banner_image'.$i]; ?>" id="<?php echo $this->get_field_id('banner_image'.$i); ?>" name="<?php echo $this->get_field_name('banner_image'.$i); ?>" class="cf_media_id">
    <div class="preview_field"><?php if($instance['banner_image'.$i]){ echo wp_get_attachment_image($instance['banner_image'.$i], 'medium'); }; ?></div>
    <div class="buttton_area">
     <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
     <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$instance['banner_image'.$i]){ echo 'hidden'; }; ?>">
    </div>
   </div>
  </div>
  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Register affiliate code or link url for registered image', 'tcd-w'); ?></h3>
   <input style="width:100%;" type="text" class="img" name="<?php echo $this->get_field_name('banner_url'.$i); ?>" id="<?php echo $this->get_field_id('banner_url'.$i); ?>" value="<?php echo $instance['banner_url'.$i]; ?>" />
  </div>
</div>
<?php endfor; ?>

</div>

<?php

  } // end Widget Control Panel
} // end class


function register_tcdw_ad_widget() {
	register_widget( 'tcd_ad_widget' );
}
add_action( 'widgets_init', 'register_tcdw_ad_widget' );


?>