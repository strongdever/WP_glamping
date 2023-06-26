<?php
$options = get_design_plus_option(); 

// 使用するコンテンツの番号
$cta_index = $options['footer_cta_display'];

// $cta_index が4（ランダム表示）の時、表示するCTAをランダムで決定する
if ( '4' === $cta_index ) {
	
	// ランダム表示に使用するCTA配列を取得する
	$cta_in_random_display = get_footer_cta_in_random_display();	

	// CTA配列が空の場合、CTAを表示しない
	if ( ! $cta_in_random_display ) {
		
		return;

	// 配列の要素が1つのみの場合、乱数の生成を行わない
	} elseif ( 1 === count( $cta_in_random_display ) ) {

		$cta_index = $cta_in_random_display[0];
	
	// CTA配列から、今回表示するCTAを決定する
	} else {

		$cta_index = rand( 1, count( $cta_in_random_display ) );

	}
}

$cta_type = $options['footer_cta_type' . $cta_index];
$catch = $options['footer_cta_' . $cta_type . '_catch' . $cta_index];
$label = $options['footer_cta_' . $cta_type . '_btn_label' . $cta_index];
$url = $options['footer_cta_' . $cta_type . '_btn_url' . $cta_index];
$target = $options['footer_cta_' . $cta_type . '_btn_target' . $cta_index];
?>
<div id="js-footer-cta" class="p-footer-cta p-footer-cta--<?php echo esc_attr( $cta_index ); ?> footer_cta_<?php echo esc_attr($cta_type); ?>">

 <?php
      if($cta_type == 'type3') {
      $image = wp_get_attachment_image_src( $options['footer_cta_' . $cta_type . '_image' . $cta_index], 'full');
      $image_mobile = wp_get_attachment_image_src( $options['footer_cta_' . $cta_type . '_image_sp' . $cta_index], 'full');
 ?>
 <div class="image_wrap <?php if($options['footer_cta_' . $cta_type . '_edge_angle' . $cta_index] != 0){ echo 'use_angle'; }; ?>">
  <div class="image_wrap_inner">
   <?php if($catch) { ?>
   <h3 class="catch"><?php echo wp_kses_post(nl2br($catch)); ?></h3>
   <?php }; ?>
   <div class="overlay"></div>
   <?php if($image) { ?><div class="image <?php if($image_mobile) { echo 'pc'; }; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
   <?php if($image_mobile) { ?><div class="image mobile" style="background:url(<?php echo esc_attr($image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
  </div>
 </div>
 <?php if($url) { ?>
 <div class="button_wrap">
  <a id="js-footer-cta__btn" href="<?php echo esc_url($url); ?>" <?php if($target){ echo 'target="_blank"'; }; ?>><span><?php echo esc_html($label); ?></span></a>
 </div>
 <?php }; ?>

 <?php } else { ?>

 <?php if($catch) { ?>
 <h3 class="catch"><?php echo wp_kses_post(nl2br($catch)); ?></h3>
 <?php }; ?>
 <?php if($url) { ?>
 <a id="js-footer-cta__btn" href="<?php echo esc_url($url); ?>" <?php if($target){ echo 'target="_blank"'; }; ?>><span><?php echo esc_html($label); ?></span></a>
 <?php }; ?>

 <?php }; ?>

 <div id="js-footer-cta__close"></div>
</div>
