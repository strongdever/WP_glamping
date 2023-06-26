<?php
     get_header();
     $options = get_design_plus_option();

     $image = null;
     if (!empty($options['header_image_404'])) {
       $image = wp_get_attachment_image_src($options['header_image_404'], 'full');
     }
     $title = $options['header_txt_404'];
     $sub_title = $options['header_sub_txt_404'];
     $font_color = $options['header_txt_color_404'];
     $shadow1 = $options['dropshadow_404_h'];
     $shadow2 = $options['dropshadow_404_v'];
     $shadow3 = $options['dropshadow_404_b'];
     $shadow4 = $options['dropshadow_404_c'];
     $show_image_overlay = $options['use_overlay_404'];
     $overlay_color_value = $options['overlay_color_404'];
     if(empty($overlay_color_value)) { $overlay_color_value = '#000000'; }
     $overlay_color_hex = hex2rgb($overlay_color_value);
     $overlay_color = implode(",",$overlay_color_hex);
     $overlay_opacity = $options['overlay_opacity_404'];
?>

<?php if (!empty($options['header_image_404'])) { ?>
<div id="page_404_header" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;">
<?php } else { ?>
<div id="page_404_header" style="background:#000;">
<?php }; ?>
 <div class="catch_area" style="text-shadow:<?php echo esc_attr($shadow1); ?>px <?php echo esc_attr($shadow2); ?>px <?php echo esc_attr($shadow3); ?>px <?php echo esc_attr($shadow4); ?>; color:<?php echo esc_attr($font_color); ?>; ">
  <h2 class="catch rich_font"><?php if($title){ echo nl2br(esc_html($title)); } else { echo '404 NOT FOUND'; }; ?></h2>
  <?php if ($sub_title) { ?>
  <p class="desc"><?php echo nl2br(esc_html($sub_title)); ?></p>
  <?php } ?>
 </div>
 <?php if(!$options['hide_footer_404']){ ?>
 <a id="page_404_button" href="#footer"></a>
 <?php }; ?>
 <?php if($show_image_overlay == '1') { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_attr($overlay_color); ?>,<?php echo esc_attr($overlay_opacity); ?>);"></div>
 <?php }; ?>
</div>

<?php get_footer(); ?>