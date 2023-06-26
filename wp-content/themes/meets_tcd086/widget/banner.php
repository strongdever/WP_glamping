<?php

class tcd_banner_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcd_banner_widget',// ID
      __( 'Banner (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcd_banner_widget',
        'description' => __('Show AdSense at random in front page.', 'tcd-w')
      )
    );
  }

  function widget($args, $instance) {

    extract($args);

    // Before widget //
    if(!is_404()) {

    echo $before_widget;

    for ( $i = 1; $i <= 4; $i++ ) {
      if(isset($instance['banner_image'.$i])) {
        $image = wp_get_attachment_image_src( $instance['banner_image'.$i], 'full' );
      };
      if(!empty($image)) {
        if(isset($instance['banner_url'.$i])) {
          $url = $instance['banner_url'.$i];
        } else {
          $url = '';
        }
        if(isset($instance['banner_target'.$i])) {
          $target = $instance['banner_target'.$i];
        } else {
          $target = '';
        }
        if(isset($instance['banner_title'.$i])) {
          $title = $instance['banner_title'.$i];
        } else {
          $title = '';
        }
        if(isset($instance['banner_sub_title'.$i])) {
          $sub_title = $instance['banner_sub_title'.$i];
        } else {
          $sub_title = '';
        }
        if(isset($instance['banner_title_font_type'.$i])) {
          $title_font_type = $instance['banner_title_font_type'.$i];
        } else {
          $title_font_type = 'type2';
        }
        if(isset($instance['banner_sub_title_font_type'.$i])) {
          $sub_title_font_type = $instance['banner_sub_title_font_type'.$i];
        } else {
          $sub_title_font_type = 'type2';
        }
        if(isset($instance['banner_use_overlay'.$i])) {
          $use_overlay = $instance['banner_use_overlay'.$i];
        } else {
          $use_overlay = '';
        }
        if(isset($instance['banner_font_color'.$i])) {
          $font_color = $instance['banner_font_color'.$i];
        } else {
          $font_color = '#ffffff';
        }
        if(isset($instance['banner_title_font_size'.$i])) {
          $title_font_size = $instance['banner_title_font_size'.$i];
        } else {
          $title_font_size = '20';
        }
        if(isset($instance['banner_sub_title_font_size'.$i])) {
          $sub_title_font_size = $instance['banner_sub_title_font_size'.$i];
        } else {
          $sub_title_font_size = '14';
        }
        if(isset($instance['banner_overlay_color'.$i])) {
          $overlay_color = hex2rgb($instance['banner_overlay_color'.$i]);
          $overlay_color = implode(",",$overlay_color);
        } else {
          $overlay_color = hex2rgb('#000000');
          $overlay_color = implode(",",$overlay_color);
        }
?>
<a class="link animate_background num<?php echo $i; ?>" href="<?php if($url) { echo esc_url($url); }; ?>"<?php if($target) { echo ' target="_blank"'; }; ?>>
 <?php if($title || $sub_title) { ?>
 <div class="title_area" style="color:<?php if($font_color) { echo esc_attr($font_color); }; ?>;">
  <?php if($title) { ?>
  <h3 class="title rich_font_<?php if($title_font_type) { echo esc_attr($title_font_type); }; ?>" style="font-size:<?php if($title_font_size) { echo esc_attr($title_font_size); }; ?>px;"><span><?php echo nl2br(esc_html($title)); ?></span></h3>
  <?php }; ?>
  <?php if($sub_title) { ?>
  <p class="sub_title rich_font_<?php if($sub_title_font_type) { echo esc_attr($sub_title_font_type); }; ?>" style="font-size:<?php if($sub_title_font_size) { echo esc_attr($sub_title_font_size); }; ?>px;"><span><?php echo nl2br(esc_html($sub_title)); ?></span></p>
  <?php }; ?>
 </div>
 <?php }; ?>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background: -moz-linear-gradient(left,  rgba(<?php echo esc_attr($overlay_color); ?>,1) 0%, rgba(<?php echo esc_attr($overlay_color); ?>,0) 100%); background: -webkit-linear-gradient(left,  rgba(<?php echo esc_attr($overlay_color); ?>,1) 0%,rgba(<?php echo esc_attr($overlay_color); ?>,0) 100%); background: linear-gradient(to right,  rgba(<?php echo esc_attr($overlay_color); ?>,1) 0%,rgba(<?php echo esc_attr($overlay_color); ?>,0) 100%);"></div>
 <?php }; ?>
 <div class="image_wrap">
  <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
 </div>
</a>
<?php
      }
    };//end for

    // After widget //
    echo $after_widget;

    };

  }

  // Update Settings //
  function update($new_instance, $old_instance) {
    for ( $i = 1; $i <= 4; $i++ ) {
      $instance['banner_image'.$i] = strip_tags($new_instance['banner_image'.$i]);
      $instance['banner_url'.$i] = $new_instance['banner_url'.$i];
      $instance['banner_target'.$i] = $new_instance['banner_target'.$i];
      $instance['banner_font_color'.$i] = $new_instance['banner_font_color'.$i];
      $instance['banner_use_overlay'.$i] = $new_instance['banner_use_overlay'.$i];
      $instance['banner_overlay_color'.$i] = $new_instance['banner_overlay_color'.$i];
      $instance['banner_title'.$i] = $new_instance['banner_title'.$i];
      $instance['banner_sub_title'.$i] = $new_instance['banner_sub_title'.$i];
      $instance['banner_title_font_size'.$i] = $new_instance['banner_title_font_size'.$i];
      $instance['banner_sub_title_font_size'.$i] = $new_instance['banner_sub_title_font_size'.$i];
      $instance['banner_title_font_type'.$i] = $new_instance['banner_title_font_type'.$i];
      $instance['banner_sub_title_font_type'.$i] = $new_instance['banner_sub_title_font_type'.$i];
    }
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    for ( $i = 1; $i <= 4; $i++ ) {
      $defaults['banner_image'.$i] = '';
      $defaults['banner_url'.$i] = '';
      $defaults['banner_target'.$i] = '';
      $defaults['banner_font_color'.$i] = '#ffffff';
      $defaults['banner_use_overlay'.$i] = '1';
      $defaults['banner_overlay_color'.$i] = '#000000';
      $defaults['banner_title'.$i] = '';
      $defaults['banner_sub_title'.$i] = '';
      $defaults['banner_title_font_size'.$i] = '20';
      $defaults['banner_sub_title_font_size'.$i] = '14';
      $defaults['banner_title_font_type'.$i] = 'type2';
      $defaults['banner_sub_title_font_type'.$i] = 'type2';
    }
    $instance = wp_parse_args( (array) $instance, $defaults );
    global $font_type_options;
?>

<div class="tcd_ad_widget_box_wrap">

<?php for($i = 1; $i <= 4; $i++): ?>
<h3 class="tcd_ad_widget_headline"><?php _e('Banner','tcd-w'); ?><?php echo $i; ?></h3>
<div class="tcd_ad_widget_box">

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Title', 'tcd-w'); ?></h3>
   <textarea style="width:100%;" cols="50" rows="2" name="<?php echo $this->get_field_name('banner_title'.$i); ?>"><?php echo esc_textarea($instance['banner_title'.$i]); ?></textarea>
  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Subtitle', 'tcd-w'); ?></h3>
   <textarea style="width:100%;" cols="50" rows="2" name="<?php echo $this->get_field_name('banner_sub_title'.$i); ?>"><?php echo esc_textarea($instance['banner_sub_title'.$i]); ?></textarea>
  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Font type', 'tcd-w'); ?></h3>
   <ul class="option_list">
    <li class="cf">
     <span class="label"><?php _e('Title', 'tcd-w'); ?></span>
     <select style="max-width:100%;" name="<?php echo $this->get_field_name('banner_title_font_type'.$i); ?>">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $instance['banner_title_font_type'.$i], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
    <li class="cf">
     <span class="label"><?php _e('Subtitle', 'tcd-w'); ?></span>
     <select style="max-width:100%;" name="<?php echo $this->get_field_name('banner_sub_title_font_type'.$i); ?>">
      <?php foreach ( $font_type_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $instance['banner_sub_title_font_type'.$i], $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php } ?>
     </select>
    </li>
   </ul>
  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Font size setting', 'tcd-w'); ?></h3>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Title', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="<?php echo $this->get_field_name('banner_title_font_size'.$i); ?>" value="<?php esc_attr_e( $instance['banner_title_font_size'.$i] ); ?>" /><span>px</span></li>
    <li class="cf"><span class="label"><?php _e('Subtitle', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="<?php echo $this->get_field_name('banner_sub_title_font_size'.$i); ?>" value="<?php esc_attr_e( $instance['banner_sub_title_font_size'.$i] ); ?>" /><span>px</span></li>
   </ul>
  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Color setting', 'tcd-w'); ?></h3>
   <ul class="option_list">
    <li class="cf"><span class="label"><?php _e('Font color', 'tcd-w'); ?></span><input type="text" name="<?php echo $this->get_field_name('banner_font_color'.$i); ?>" value="<?php echo esc_attr( $instance['banner_font_color'.$i] ); ?>" data-default-color="#ffffff" class="color-picker"></li>
   </ul>

  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Image', 'tcd-w'); ?></h3>
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
   <h3 class="tcd_widget_headline"><?php _e('Link URL', 'tcd-w'); ?></h3>
   <input style="width:100%;" type="text" name="<?php echo $this->get_field_name('banner_url'.$i); ?>" value="<?php echo esc_url($instance['banner_url'.$i]); ?>" />
   <p>
    <input id="<?php echo $this->get_field_id('banner_target'.$i); ?>" name="<?php echo $this->get_field_name('banner_target'.$i); ?>" type="checkbox" value="1" <?php checked( '1', $instance['banner_target'.$i] ); ?> />
    <label for="<?php echo $this->get_field_id('banner_target'.$i); ?>"><?php _e( 'Open with new window', 'tcd-w' ); ?></label>
   </p>
  </div>

  <div class="tcd_widget_content">
   <h3 class="tcd_widget_headline"><?php _e('Overlay setting', 'tcd-w'); ?></h3>
   <p class="displayment_checkbox"><label><input name="<?php echo $this->get_field_name('banner_use_overlay'.$i); ?>" type="checkbox" value="1" <?php checked( $instance['banner_use_overlay'.$i], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
   <div style="<?php if($instance['banner_use_overlay'.$i] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <ul class="option_list" style="border-top:1px dotted #ddd; padding:8px 0 0 0;">
     <li class="cf"><span class="label"><?php _e('Color of overlay', 'tcd-w'); ?></span><input type="text" name="<?php echo $this->get_field_name('banner_overlay_color'.$i); ?>" value="<?php echo esc_attr( $instance['banner_overlay_color'.$i] ); ?>" data-default-color="#000000" class="color-picker"></li>
    </ul>
   </div><!-- END .header_slider_show_overlay -->
  </div>

</div>
<?php endfor; ?>

</div>

<?php

  } // end Widget Control Panel
} // end class


function register_tcd_banner_widget() {
	register_widget( 'tcd_banner_widget' );
}
add_action( 'widgets_init', 'register_tcd_banner_widget' );


?>