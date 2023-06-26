<?php
/*
Template Name:LP page
*/
__('LP page', 'tcd-w');
?>
<?php
     get_header();
     $options = get_design_plus_option();
     $page_hide_header_image = get_post_meta($post->ID, 'page_hide_header_image', true);
     $page_content_width = get_post_meta($post->ID, 'page_content_width', true) ?  get_post_meta($post->ID, 'page_content_width', true) : '1030';
     $page_header_type = get_post_meta($post->ID, 'page_header_type', true) ?  get_post_meta($post->ID, 'page_header_type', true) : 'type1';
     if(!$page_hide_header_image){
       // 通常のヘッダー ----------------------------------
       if($page_header_type == 'type1' || $page_header_type == 'type2'){
         $page_header_catch = get_post_meta($post->ID, 'page_header_catch', true);
         $page_header_catch_font_color = get_post_meta($post->ID, 'page_header_catch_font_color', true) ?  get_post_meta($post->ID, 'page_header_catch_font_color', true) : '#ffffff';
         $page_header_catch_font_type = get_post_meta($post->ID, 'page_header_catch_font_type', true) ?  get_post_meta($post->ID, 'page_header_catch_font_type', true) : 'type3';
         $page_header_catch_direction = get_post_meta($post->ID, 'page_header_catch_direction', true);
         $page_header_catch_animation_type = get_post_meta($post->ID, 'page_header_catch_animation_type', true) ?  get_post_meta($post->ID, 'page_header_catch_animation_type', true) : 'type1';
         $page_header_desc = get_post_meta($post->ID, 'page_header_desc', true);
         $page_header_desc_mobile = get_post_meta($post->ID, 'page_header_desc_mobile', true);
         $page_header_show_desc_mobile = get_post_meta($post->ID, 'page_header_show_desc_mobile', true);
         $bg_image = get_post_meta($post->ID, 'page_header_bg_image', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_header_bg_image', true), 'full' ) : '';
         $bg_image_mobile = get_post_meta($post->ID, 'page_header_bg_image_mobile', true) ? wp_get_attachment_image_src( get_post_meta($post->ID, 'page_header_bg_image_mobile', true), 'full' ) : '';
         $use_overlay = get_post_meta($post->ID, 'page_header_use_overlay', true);
         if($use_overlay) {
           $overlay_color = get_post_meta($post->ID, 'page_header_overlay_color', true) ?  get_post_meta($post->ID, 'page_header_overlay_color', true) : '#000000';
           $overlay_color = hex2rgb($overlay_color);
           $overlay_color = implode(",",$overlay_color);
           $overlay_opacity = get_post_meta($post->ID, 'page_header_overlay_opacity', true) ?  get_post_meta($post->ID, 'page_header_overlay_opacity', true) : '0.3';
         }
         if($page_header_type == 'type1'){
?>
<div id="page_header">
 <div id="page_header_inner">
  <?php if($page_header_catch){ ?>
  <h1 class="catch animation_<?php echo esc_attr($page_header_catch_animation_type); ?> rich_font_<?php echo esc_attr($page_header_catch_font_type); ?><?php if($page_header_catch_direction){ echo ' type2'; }; ?>"><?php if($page_header_catch_animation_type == 'type1') { echo sepText($page_header_catch); } else { echo '<span>' . wp_kses_post(nl2br($page_header_catch)) . '</span>'; }; ?></h1>
  <?php }; ?>
 </div>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
 <?php }; ?>
 <?php if($bg_image) { ?>
 <div class="bg_image<?php if($bg_image_mobile) { echo ' pc'; }; ?>" style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
 <?php if($bg_image_mobile) { ?>
 <div class="bg_image mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
</div>
<?php
         // 全画面ヘッダー ----------------------------------
         } else {
?>
<div id="page_full_header">
 <?php if(get_post_meta($post->ID, 'page_show_logo', true)){ ?>
 <div id="lp_logo" class="animate_item">
  <?php lp_logo(); ?>
 </div>
 <?php }; ?>
 <div id="page_full_header_inner">
  <?php if($page_header_catch){ ?>
  <h1 class="catch animate_item rich_font_<?php echo esc_attr($page_header_catch_font_type); ?>"><?php echo wp_kses_post(nl2br($page_header_catch)); ?></h1>
  <?php }; ?>
  <?php if($page_header_desc){ ?>
  <p class="desc animate_item <?php if(!$page_header_show_desc_mobile){ echo 'hide_desc_mobile'; }; ?>"><span<?php if($page_header_desc_mobile){ echo ' class="pc"'; }; ?>><?php echo wp_kses_post(nl2br($page_header_desc)); ?></span><?php if($page_header_desc_mobile){ ?><span class="mobile"><?php echo wp_kses_post(nl2br($page_header_desc_mobile)); ?></span><?php }; ?></p>
  <?php }; ?>
 </div>
 <a class="animate_item" id="lp_contents_link" href="#lp_page_content"></a>
 <?php if($use_overlay) { ?>
 <div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div>
 <?php }; ?>
 <?php if($bg_image) { ?>
 <div class="bg_image<?php if($bg_image_mobile) { echo ' pc'; }; ?>" style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
 <?php if($bg_image_mobile) { ?>
 <div class="bg_image mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div>
 <?php }; ?>
</div>
<?php
         };

       // タイトルのみヘッダー
       } else {
         $page_header_type2_font_type = get_post_meta($post->ID, 'page_header_type2_font_type', true) ?  get_post_meta($post->ID, 'page_header_type2_font_type', true) : 'type2';
         $page_header_type2_font_color = get_post_meta($post->ID, 'page_header_type2_font_color', true) ?  get_post_meta($post->ID, 'page_header_type2_font_color', true) : '#ffffff';
         $page_header_type2_bg_color = get_post_meta($post->ID, 'page_header_type2_bg_color', true) ?  get_post_meta($post->ID, 'page_header_type2_bg_color', true) : '#b60000';
?>
<div id="page_header_type2" style="color:<?php echo esc_attr($page_header_type2_font_color); ?>; background:<?php echo esc_attr($page_header_type2_bg_color); ?>;">
 <h1 class="title rich_font_<?php echo esc_attr($page_header_type2_font_type); ?>"><?php the_title(); ?></h1>
</div>
<?php
       };
     };
?>

<div id="lp_page_content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php
       // コンテンツビルダー
       $lp_content = get_post_meta( $post->ID, 'lp_content', true );
       if ( $lp_content && is_array( $lp_content ) ) :
         foreach( $lp_content as $key => $content ) :

           // 画像コンテンツ -----------------------------------------------------------------
           if ( ($content['cb_content_select'] == 'image_content') && $content['show_content']) {
             $headline = $content['headline'];
  ?>
  <div class="lp_content lp_image_content num<?php echo esc_attr($key); ?> <?php if($content['show_border']){ echo 'show_border'; }; ?> <?php if(!$headline){ echo 'no_headline'; }; ?>" id="lp_image_content_<?php echo $key; ?>">
   <div class="lp_content_inner" style="width:<?php echo esc_attr($page_content_width); ?>px;">

    <?php
         // 見出し
         if($headline){
           $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
           $show_icon = $content['headline_show_icon'];
           $sub_headline = $content['sub_headline'];
           $headline_direction = $content['headline_direction'];
           $headline_font_type = $content['headline_font_type'];
    ?>
    <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
    </div>
    <?php }; ?>

    <?php
         // 説明文
         if(!empty($content['desc1'])) {
    ?>
    <div class="desc desc1 post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc1'] ); ?>
    </div>
    <?php }; ?>

    <?php
         // 画像一覧
         $image_layout = isset($content['image_layout']) ? $content['image_layout'] : 'type1';
         $image1 = isset($content['image1']) ? wp_get_attachment_image_src( $content['image1'], 'full' ) : '';
         $image2 = isset($content['image2']) ? wp_get_attachment_image_src( $content['image2'], 'full' ) : '';
         $image3 = isset($content['image3']) ? wp_get_attachment_image_src( $content['image3'], 'full' ) : '';
         if($image1 || $image2 || $image3) {
    ?>
    <div class="image_area layout_<?php echo esc_attr($image_layout); ?>">
     <?php if($image1){ ?><div class="image large"><img src="<?php echo esc_attr($image1[0]); ?>" alt="" title=""></div><?php }; ?>
     <?php if($image2){ ?><div class="image small"><img src="<?php echo esc_attr($image2[0]); ?>" alt="" title=""></div><?php }; ?>
     <?php if($image3){ ?><div class="image small"><img src="<?php echo esc_attr($image3[0]); ?>" alt="" title=""></div><?php }; ?>
    </div>
    <?php }; ?>

    <?php
         // 説明文
         if(!empty($content['desc2'])) {
    ?>
    <div class="desc desc2 post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc2'] ); ?>
    </div>
    <?php }; ?>

    <?php
         // リンクボタン
         if($content['show_button']){
            $button_animation_type = isset($content['button_animation_type']) ?  $content['button_animation_type'] : 'type1';
    ?>
    <div class="link_button animate_item">
     <a class="button_animation_<?php echo esc_attr($button_animation_type); ?>" href="<?php echo esc_url($content['button_url']); ?>" <?php if($content['button_target']){ echo 'target="_blank"'; }; ?>><?php echo esc_html($content['button_label']); ?></a>
    </div>
    <?php }; ?>

   </div><!-- END .lp_content_inner -->

   <?php
        // レイヤー画像
        if($content['show_layer_image']){
          $layer_image1 = $content['layer_image1'] ? wp_get_attachment_image_src( $content['layer_image1'], 'full' ) : '';
          $layer_image2 = $content['layer_image2'] ? wp_get_attachment_image_src( $content['layer_image2'], 'full' ) : '';
          $layer_image3 = $content['layer_image3'] ? wp_get_attachment_image_src( $content['layer_image3'], 'full' ) : '';
          $layer_image4 = $content['layer_image4'] ? wp_get_attachment_image_src( $content['layer_image4'], 'full' ) : '';
          if($layer_image1){ echo '<div class="layer_image left_top"><img src="' . esc_attr($layer_image1[0]) .'" alt="" title="" /></div>'; }
          if($layer_image2){ echo '<div class="layer_image right_top"><img src="' . esc_attr($layer_image2[0]) .'" alt="" title="" /></div>'; }
          if($layer_image3){ echo '<div class="layer_image left_bottom"><img src="' . esc_attr($layer_image3[0]) .'" alt="" title="" /></div>'; }
          if($layer_image4){ echo '<div class="layer_image right_bottom"><img src="' . esc_attr($layer_image4[0]) .'" alt="" title="" /></div>'; }
        };
   ?>

  </div><!-- END .lp_image_content -->

  <?php
        // デザインコンテンツ -----------------------------------------------------------------
        } elseif ( ($content['cb_content_select'] == 'design_content') && $content['show_content']) {
         $headline = $content['headline'];
  ?>
  <div class="lp_content lp_design_content num<?php echo esc_attr($key); ?> <?php if($content['show_border']){ echo 'show_border'; }; ?> <?php if(!$headline){ echo 'no_headline'; }; ?>" id="lp_design_content_<?php echo $key; ?>">
   <div class="lp_content_inner" style="width:<?php echo esc_attr($page_content_width); ?>px;">

    <?php
         // 見出し
         if($headline){
           $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
           $show_icon = $content['headline_show_icon'];
           $sub_headline = $content['sub_headline'];
           $headline_direction = $content['headline_direction'];
           $headline_font_type = $content['headline_font_type'];
    ?>
    <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
    </div>
    <?php }; ?>

    <?php
         // 説明文
         if(!empty($content['desc1'])) {
    ?>
    <div class="desc desc1 post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc1'] ); ?>
    </div>
    <?php }; ?>

    <?php
         // コンテンツ一覧
         $data_list = isset($content['item_list']) ?  $content['item_list'] : '';
         if (!empty($data_list)) {
    ?>
    <div class="content_list">
     <?php
          foreach ( $data_list as $key => $value ) :
            $image_id = $value['image'];
            $desc = $value['desc'];
            $bg_color = isset($value['bg_color']) ?  $value['bg_color'] : '#ffffff';
            $font_color = isset($value['font_color']) ?  $value['font_color'] : '#000000';
            if($image_id && $desc){
              $image = wp_get_attachment_image_src($image_id, 'full');
     ?>
     <div class="item">
      <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center top; background-size:cover;"></div>
      <div class="desc" style="background:<?php echo esc_attr($bg_color); ?>; color:<?php echo esc_attr($font_color); ?>;">
       <div class="desc_inner">
        <p><?php echo wp_kses_post(nl2br($desc)); ?></p>
       </div>
      </div>
     </div>
     <?php }; endforeach; ?>
    </div>
    <?php }; ?>

    <?php
         // 説明文
         if(!empty($content['desc2'])) {
    ?>
    <div class="desc desc2 post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc2'] ); ?>
    </div>
    <?php }; ?>

    <?php
         // リンクボタン
         if($content['show_button']){
            $button_animation_type = isset($content['button_animation_type']) ?  $content['button_animation_type'] : 'type1';
    ?>
    <div class="link_button animate_item">
     <a class="button_animation_<?php echo esc_attr($button_animation_type); ?>" href="<?php echo esc_url($content['button_url']); ?>" <?php if($content['button_target']){ echo 'target="_blank"'; }; ?>><?php echo esc_html($content['button_label']); ?></a>
    </div>
    <?php }; ?>

   </div><!-- END .lp_content_inner -->

   <?php
        // レイヤー画像
        $layer_image1 = $content['layer_image1'] ? wp_get_attachment_image_src( $content['layer_image1'], 'full' ) : '';
        $layer_image2 = $content['layer_image2'] ? wp_get_attachment_image_src( $content['layer_image2'], 'full' ) : '';
        $layer_image3 = $content['layer_image3'] ? wp_get_attachment_image_src( $content['layer_image3'], 'full' ) : '';
        $layer_image4 = $content['layer_image4'] ? wp_get_attachment_image_src( $content['layer_image4'], 'full' ) : '';
        if($layer_image1){
          echo '<div class="layer_image left_top"><img src="' . esc_attr($layer_image1[0]) .'" alt="" title="" /></div>';
        }
        if($layer_image2){
          echo '<div class="layer_image right_top"><img src="' . esc_attr($layer_image2[0]) .'" alt="" title="" /></div>';
        }
        if($layer_image3){
          echo '<div class="layer_image left_bottom"><img src="' . esc_attr($layer_image3[0]) .'" alt="" title="" /></div>';
        }
        if($layer_image4){
          echo '<div class="layer_image right_bottom"><img src="' . esc_attr($layer_image4[0]) .'" alt="" title="" /></div>';
        }
   ?>

  </div><!-- END .lp_design_content -->

  <?php
        // 画像カルーセル -----------------------------------------------------------------
        } elseif ( ($content['cb_content_select'] == 'image_carousel') && $content['show_content']) {
          $data_list = isset($content['item_list']) ?  $content['item_list'] : '';
          if (!empty($data_list)) {
           $total = count($data_list);
  ?>
  <div class="lp_image_carousel num<?php echo esc_attr($key); ?> <?php if($total < 5){ echo 'type2'; }; ?>" id="lp_image_carousel_<?php echo $key; ?>">

    <?php
         foreach ( $data_list as $key => $value ) :
          if($value['image']){
            $image = wp_get_attachment_image_src( $value['image'], 'full' );
            echo '<div class="item" style="background:url(' . esc_attr($image[0]) . ') no-repeat center center; background-size:cover;"></div>';
          }
        endforeach;
    ?>

  </div><!-- END .lp_image_carousel -->
  <?php }; ?>

  <?php
        // レイヤー画像コンテンツ -----------------------------------------------------------------
        } elseif ( ($content['cb_content_select'] == 'layer_image_content') && $content['show_content']) {
          $image = $content['image'] ? wp_get_attachment_image_src( $content['image'], 'full' ) : '';
          $image_mobile = $content['image_mobile'] ? wp_get_attachment_image_src( $content['image_mobile'], 'full' ) : '';
  ?>
  <div class="lp_content layer_image_content inview num<?php echo $key; ?> image_layout_<?php echo esc_attr($content['image_layout']); ?> image_layout2_<?php echo esc_attr($content['image_layout2']); ?> image_layout_mobile_<?php echo esc_attr($content['image_layout_mobile']); ?> image_layout2_mobile_<?php echo esc_attr($content['image_layout2_mobile']); ?> text_layout_<?php echo esc_attr($content['text_layout']); ?> text_layout2_<?php echo esc_attr($content['text_layout2']); ?> text_layout2_mobile_<?php echo esc_attr($content['text_layout2_mobile']); ?> catch_layout_<?php echo esc_attr($content['catch_layout']); ?> catch_layout_mobile_<?php echo esc_attr($content['catch_layout_mobile']); ?> animation_<?php echo esc_attr($content['animation_type']); ?> <?php if(empty($image)){ echo 'no_layer_image'; }; ?>" id="layer_image_content_<?php echo $key; ?>">
   <div class="lp_content_inner" style="width:<?php echo esc_attr($page_content_width); ?>px;">

    <div class="content" style="width:<?php echo esc_attr($content['content_width']); ?>px;">

     <?php if(!empty($content['catch'])) { ?>
     <h4 class="catch animate_item rich_font_<?php echo esc_attr($content['catch_font_type']); ?>"><?php echo wp_kses_post(nl2br($content['catch'])); ?></h4>
     <?php }; ?>

     <?php if(!empty($content['desc'])) { ?>
     <div class="desc animate_item">
      <p <?php if($content['desc_mobile']) { echo 'class="pc"'; }; ?>><?php echo wp_kses_post(nl2br($content['desc'])); ?></p>
      <?php if(!empty($content['desc_mobile'])) { ?>
      <p class="mobile"><?php echo wp_kses_post(nl2br($content['desc_mobile'])); ?></p>
      <?php }; ?>
     </div>
     <?php }; ?>

     <?php
          if($content['show_button']){
             $button_animation_type = isset($content['button_animation_type']) ?  $content['button_animation_type'] : 'type1';
     ?>
     <div class="link_button animate_item">
      <a class="button_animation_<?php echo esc_attr($button_animation_type); ?>" href="<?php echo esc_url($content['button_url']); ?>" <?php if($content['button_target']){ echo 'target="_blank"'; }; ?>><?php echo esc_html($content['button_label']); ?></a>
     </div>
     <?php }; ?>

    </div>

   </div><!-- END .lp_content_inner -->

   <?php if($content['show_layer_image'] && $image) { ?>
   <div class="layer_image animate_item">
    <img <?php if($image_mobile) { echo 'class="pc"'; }; ?> src="<?php echo esc_attr($image[0]); ?>" alt="" title="">
    <?php if($image_mobile) { ?><img class="mobile" src="<?php echo esc_attr($image_mobile[0]); ?>" alt="" title=""><?php }; ?>
   </div>
   <?php }; ?>

   <?php
        if($content['bg_use_overlay']){
          $bg_overlay_color = $content['bg_overlay_color'] ? $content['bg_overlay_color'] : '#000000';
          $bg_overlay_color = hex2rgb($bg_overlay_color);
          $bg_overlay_color = implode(",",$bg_overlay_color);
          $bg_overlay_opacity = $content['bg_overlay_opacity'] ? $content['bg_overlay_opacity'] : '0.3';
   ?>
   <div class="overlay" style="background:rgba(<?php echo $bg_overlay_color; ?>,<?php echo $bg_overlay_opacity; ?>)"></div>
   <?php }; ?>

   <?php
        $bg_image = $content['bg_image'] ? wp_get_attachment_image_src( $content['bg_image'], 'full' ) : '';
        $bg_image_mobile = $content['bg_image_mobile'] ? wp_get_attachment_image_src( $content['bg_image_mobile'], 'full' ) : '';
        if($bg_image) {
   ?>
   <div class="bg_image <?php if($bg_image_mobile) { echo 'pc'; }; ?>" style="background:url(<?php echo esc_attr($bg_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php if($bg_image_mobile) { ?><div class="bg_image mobile" style="background:url(<?php echo esc_attr($bg_image_mobile[0]); ?>) no-repeat center center; background-size:cover;"></div><?php }; ?>
   <?php }; ?>

  </div><!-- END .layer_image_content -->

  <?php
       // FAQ -----------------------------------------------------------------
       } elseif ( ($content['cb_content_select'] == 'faq') && $content['show_content']) {
         $headline = $content['headline'];
  ?>
  <div class="lp_content lp_faq num<?php echo esc_attr($key); ?> <?php if($content['show_border']){ echo 'show_border'; }; ?> <?php if(!$headline){ echo 'no_headline'; }; ?>" id="lp_faq_<?php echo $key; ?>">
   <div class="lp_content_inner" style="width:<?php echo esc_attr($page_content_width); ?>px;">

    <?php
         // 見出し
         if($headline){
           $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
           $show_icon = $content['headline_show_icon'];
           $sub_headline = $content['sub_headline'];
           $headline_direction = $content['headline_direction'];
           $headline_font_type = $content['headline_font_type'];
    ?>
    <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
    </div>
    <?php }; ?>

    <?php if(!empty($content['desc'])) { ?>
    <div class="desc post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc'] ); ?>
    </div>
    <?php }; ?>

    <?php if (!empty($content['item_list']) && is_array( $content['item_list'] ) ) : ?>
    <div class="faq_list">
     <?php
          foreach ( $content['item_list'] as $key => $value ) :
            $question = $value['question'];
            $answer = $value['answer'];
     ?>
     <div class="item">
      <?php if($question) { ?>
      <h4 class="question"><?php echo wp_kses_post(nl2br($question)); ?></h4>
      <?php }; ?>
      <?php if($answer) { ?>
      <div class="answer post_content" style="display:none;">
       <p><?php echo wp_kses_post(nl2br($answer)); ?></p>
      </div>
      <?php }; ?>
     </div>
     <?php endforeach; ?>
    </div><!-- END .faq_list -->
    <?php endif; ?>

   </div><!-- END .lp_content_inner -->

  </div><!-- END .lp_faq -->

  <?php
       // フリースペース -----------------------------------------------------------------
       } elseif ( ($content['cb_content_select'] == 'free_space') && $content['show_content']) {
         $headline = $content['headline'];
  ?>
  <div class="lp_content lp_free_space <?php echo esc_attr($content['content_width']); ?> num<?php echo esc_attr($key); ?> <?php if($content['show_border']){ echo 'show_border'; }; ?> <?php if(!$headline){ echo 'no_headline'; }; ?>" id="lp_free_space_<?php echo $key; ?>">
   <div class="lp_content_inner" style="width:<?php echo esc_attr($page_content_width); ?>px;">

    <?php
         // 見出し
         if($headline){
           $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
           $show_icon = $content['headline_show_icon'];
           $sub_headline = $content['sub_headline'];
           $headline_direction = $content['headline_direction'];
           $headline_font_type = $content['headline_font_type'];
    ?>
    <div class="design_headline <?php if(!$show_icon){ echo 'no_icon'; }; ?> <?php if($headline_direction){ echo 'type2'; }; ?>">
     <?php if($icon_image && $show_icon){ ?><img src="<?php echo esc_attr($icon_image[0]); ?>" alt="" title="" /><?php }; ?>
     <h3><?php if($sub_headline) { ?><span class="sub_title"><?php echo wp_kses_post(nl2br($sub_headline)); ?></span><?php }; ?><span class="title rich_font_<?php echo esc_attr($headline_font_type); ?>"><?php echo wp_kses_post(nl2br($headline)); ?></span></h3>
    </div>
    <?php }; ?>

    <?php if(!empty($content['desc'])) { ?>
    <div class="desc post_content clearfix">
     <?php echo apply_filters('the_content', $content['desc'] ); ?>
    </div>
    <?php }; ?>

   </div><!-- END .lp_content_inner -->
  </div><!-- END .lp_free_space -->

  <?php
           };
         endforeach; // END 並び替え
       endif;
  ?>

  <?php endwhile; endif; ?>

</div><!-- END #lp_page_contents -->
<?php get_footer(); ?>