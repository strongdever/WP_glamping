<?php

function load_icon(){
  $options = get_design_plus_option();
  if ($options['load_icon'] == 'type4') {
    $logo_image = wp_get_attachment_image_src( $options['load_type4_image'], 'full' );
    if($logo_image) {
      $image_width = $logo_image[1];
      $image_height = $logo_image[2];
      if($options['load_type4_image_retina']) {
        $image_width = round($image_width / 2);
        $image_height = round($image_height / 2);
      };
    };
    $logo_image_mobile = wp_get_attachment_image_src( $options['load_type4_image_mobile'], 'full' );
    if($logo_image_mobile) {
      $image_width_mobile = $logo_image_mobile[1];
      $image_height_mobile = $logo_image_mobile[2];
      if($options['load_type4_image_retina_mobile']) {
        $image_width_mobile = round($image_width_mobile / 2);
        $image_height_mobile = round($image_height_mobile / 2);
      };
    };
  };

?>
<?php if ($options['load_icon'] == 'type3') { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
  <i></i><i></i><i></i><i></i>
 </div>
</div>
<?php } elseif($options['load_icon'] == 'type4' || $options['load_icon'] == 'type5') { ?>
<div id="site_loader_overlay">
 <div id="site_loader_logo" class="cf <?php if(($options['load_icon'] == 'type4') && !$logo_image) { echo ' no_logo'; }; ?> <?php if(($options['load_icon'] == 'type4') && $logo_image_mobile) { echo ' has_mobile_logo'; }; ?> <?php if($options['load_icon'] == 'type5' && !$options['load_type5_catch']) { echo ' no_logo'; }; ?>">
  <div id="site_loader_logo_inner">
   <?php if($options['load_icon'] == 'type4') { ?>
   <?php if($logo_image) { ?><div class="logo_image"><img class="pc <?php if($options['use_load_logo_animation']) { echo 'use_logo_animation'; }; ?>" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="" title="" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>" /></div><?php }; ?>
   <?php if($logo_image_mobile) { ?><div class="logo_image"><img class="mobile <?php if($options['use_load_logo_animation']) { echo 'use_logo_animation'; }; ?>" src="<?php echo esc_attr($logo_image_mobile[0]); ?>?<?php echo esc_attr(time()); ?>" alt="" title="" width="<?php echo esc_attr($image_width_mobile); ?>" height="<?php echo esc_attr($image_height_mobile); ?>" /></div><?php }; ?>
   <?php }; ?>
   <?php if($options['load_icon'] == 'type5' && $options['load_type5_catch']){ ?>
   <div class="catch rich_font_<?php echo esc_attr($options['load_type5_catch_font_type']); ?>"><?php echo wp_kses_post(nl2br($options['load_type5_catch'])); ?></div>
   <?php }; ?>
   <?php if($options['loading_message']){ ?>
   <div class="message type2">
    <div class="message_inner clearfix">
     <?php if($options['load_icon'] == 'type4' || $options['load_icon'] == 'type5'){ ?>
     <div class="text rich_font_<?php echo esc_attr($options['loading_message_font_type']); ?>"><?php echo wp_kses_post(nl2br($options['loading_message'])); ?></div>
     <?php }; ?>
     <?php if(!$options['loading_message_no_dot']) { ?>
     <div class="dot_animation_wrap">
      <div class="dot_animation">
       <i></i><i></i><i></i>
      </div>
     </div>
     <?php }; ?>
    </div>
   </div>
   <?php }; ?>
  </div>
 </div>
</div>
<?php } else { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
 </div>
</div>
<?php }; ?>
<?php
}


?>