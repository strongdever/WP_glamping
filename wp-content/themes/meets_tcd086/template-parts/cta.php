<?php
$options = get_design_plus_option();

// 使用するコンテンツの番号
$cta_index = $options['cta_display'];

// $cta_index が4（ランダム表示）の時、表示するCTAをランダムで決定する
if ( '4' === $cta_index ) {
	
	// ランダム表示に使用するCTA配列を取得する
	$cta_in_random_display = get_cta_in_random_display();	

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

// 使用するコンテンツのタイプ
$cta_type = $options['cta_type' . $cta_index];
$catch = $options['cta_' . $cta_type . '_catch' . $cta_index];
$url = $options['cta_' . $cta_type . '_url' . $cta_index];
$target = $options['cta_' . $cta_type . '_target' . $cta_index];
$image = wp_get_attachment_image_src( $options['cta_' . $cta_type . '_image' . $cta_index], 'full');
$image_mobile = wp_get_attachment_image_src( $options['cta_' . $cta_type . '_image_sp' . $cta_index], 'full');
?>
<?php 
// スマホ表示の時、スマホ専用画像が登録されていればそれを、されていなければPC用画像を表示する
?>
<div id="js-cta"  class="p-entry__cta p-cta--<?php echo esc_attr( $cta_index ); ?> cta_<?php echo esc_attr($cta_type); ?>">

 <?php if($cta_type == 'type1'){ ?>

 <a id="js-cta__btn" class="animate_background <?php if(empty($url)){ echo 'no_link'; }; ?>" href="<?php if($url) { echo esc_url($url); } else { echo '#'; }; ?>" <?php if ($target) { echo 'target="_blank"'; } ?>>
  <?php if($catch) { ?>
  <h3 class="catch"><?php echo wp_kses_post(nl2br($catch)); ?></h3>
  <?php }; ?>
  <div class="overlay"></div>
  <div class="image_wrap">
   <?php if($image) { ?><div class="image <?php if($image_mobile) { echo 'pc'; }; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
   <?php if($image_mobile) { ?><div class="image mobile" style="background:url(<?php echo esc_attr($image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
  </div>
 </a>

 <?php } else { ?>

 <div class="image_wrap">
  <?php if($image) { ?><div class="image <?php if($image_mobile) { echo 'pc'; }; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
  <?php if($image_mobile) { ?><div class="image mobile" style="background:url(<?php echo esc_attr($image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
 </div>
 <a id="js-cta__btn" class="link <?php if(empty($url)){ echo 'no_link'; }; ?>" href="<?php if($url) { echo esc_url($url); } else { echo '#'; }; ?>" <?php if ($target) { echo 'target="_blank"'; } ?>>
  <?php if($catch) { ?>
  <h3 class="catch"><?php echo wp_kses_post(nl2br($catch)); ?></h3>
  <?php }; ?>
 </a>

 <?php }; ?>

</div>
