<?php
     function tcd_head() {
       $options = get_design_plus_option();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/design-plus.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sns-botton.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1151px)" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1151px)" href="<?php echo get_template_directory_uri(); ?>/css/footer-bar.css?ver=<?php echo version_num(); ?>">

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.4.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.min.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/comment.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js?ver=<?php echo version_num(); ?>"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/simplebar.css?ver=<?php echo version_num(); ?>">
<script src="<?php echo get_template_directory_uri(); ?>/js/simplebar.min.js?ver=<?php echo version_num(); ?>"></script>

<?php if(is_mobile()) { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/footer-bar.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>

<?php
     if($options['header_fix'] != 'type1') {
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/header_fix.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>
<?php
     if($options['mobile_header_fix'] == 'type2') {
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/header_fix_mobile.js?ver=<?php echo version_num(); ?>"></script>
<?php };  ?>

<?php
     // ヘッダーメッセージ
     if($options['show_header_message'] && $options['show_header_message_close']) {
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  if ($.cookie('close_header_message') == 'on') {
    $('#header_message').hide();
  }
  $('#close_header_message').click(function() {
    $('#header_message').hide();
    $.cookie('close_header_message', 'on', {
      path:'/'
    });
  });
});
</script>
<?php }; ?>

<?php /* URLやモバイル等でcssが変わらないものをここで出力 */ ?>
<style type="text/css">
<?php
     // フォントタイプの設定　------------------------------------------------------------------
?>

<?php
     // 基本のフォントタイプ
     if($options['font_type'] == 'type1') {
?>
body, input, textarea { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['font_type'] == 'type2') { ?>
body, input, textarea { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; }
<?php } else { ?>
body, input, textarea { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; ?>

<?php
     // 見出しのフォントタイプ
     if($options['headline_font_type'] == 'type1') {
?>
.rich_font, .p-vertical { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['headline_font_type'] == 'type2') { ?>
.rich_font, .p-vertical { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
<?php } else { ?>
.rich_font, .p-vertical { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; ?>

.rich_font_type1 { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
.rich_font_type2 { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
.rich_font_type3 { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }

<?php
     // 本文のフォントタイプ
     if(is_single()) {
       if($options['content_font_type'] == 'type1') {
?>
.post_content, #next_prev_post { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['content_font_type'] == 'type2') { ?>
.post_content, #next_prev_post { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; }
<?php } else { ?>
.post_content, #next_prev_post { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php
     };
     // ウィジェットのフォントタイプ
     if($options['widget_headline_font_type'] == 'type1') {
?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['widget_headline_font_type'] == 'type2') { ?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; }
<?php } else { ?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; }; ?>

<?php
     // ヘッダー -------------------------------------------------------------------------------

     // ロゴ
?>
#header_logo .logo_text { font-size:<?php echo esc_html($options['header_logo_font_size']); ?>px; }
#footer_logo .logo_text { font-size:<?php echo esc_html($options['footer_logo_font_size']); ?>px; color:<?php echo esc_html($options['footer_logo_font_color']); ?>; }
#footer_logo a:hover .logo_text { color:<?php echo esc_html($options['footer_logo_font_color_hover']); ?>; }
#index_header_logo .logo_text { font-size:<?php echo esc_html($options['index_logo_font_size']); ?>px; color:<?php echo esc_html($options['index_logo_font_color']); ?>; }
#index_header_logo a:hover .logo_text { color:<?php echo esc_html($options['index_logo_font_color_hover']); ?>; }
@media screen and (max-width:1151px) {
  #header_logo .logo_text { font-size:<?php echo esc_html($options['header_logo_font_size_mobile']); ?>px; }
  #footer_logo .logo_text { font-size:<?php echo esc_html($options['footer_logo_font_size_mobile']); ?>px; }
  #index_header_logo .logo_text { font-size:<?php echo esc_html($options['index_logo_font_size_mobile']); ?>px; }
}
<?php
     // グローバルメニュー
     $global_menu_bg_color_hover = ($options['global_menu_bg_color_hover_use_main'] != 1) ? $options['global_menu_bg_color_hover'] : $options['main_color'];
     $global_menu_active_color = ($options['global_menu_active_color_use_sub'] != 1) ? $options['global_menu_active_color'] : $options['sub_color'];
     $global_menu_child_bg_color = ($options['global_menu_child_bg_color_use_main'] != 1) ? $options['global_menu_child_bg_color'] : $options['main_color'];
     $global_menu_child_bg_color_hover = ($options['global_menu_child_bg_color_hover_use_sub'] != 1) ? $options['global_menu_child_bg_color_hover'] : $options['sub_color'];
?>
#global_menu > ul > li > a:before { background:<?php echo esc_html($global_menu_bg_color_hover); ?>; }
#global_menu ul ul a { color:<?php echo esc_html($options['global_menu_child_font_color']); ?> !important; background:<?php echo esc_html($global_menu_child_bg_color); ?>; }
#global_menu ul ul a:hover { background:<?php echo esc_html($global_menu_child_bg_color_hover); ?>; }
#global_menu > ul > li.current-menu-item > a:before { background:<?php echo esc_html($global_menu_active_color); ?>; }
.pc .header_fix #header { background:rgba(255,255,255,1); }
.pc .header_fix #header.off_hover { background:rgba(255,255,255,<?php echo esc_attr($options['fix_header_bg_color_opacity']); ?>); }
.mobile .header_fix_mobile #header { background:rgba(255,255,255,1); }
.mobile .header_fix_mobile #header.off_hover { background:rgba(255,255,255,<?php echo esc_attr($options['fix_header_bg_color_opacity']); ?>); }
<?php
     // ドロワーメニュー
     $mobile_menu_font_color = hex2rgb($options['mobile_menu_font_color']);
     $mobile_menu_font_color = implode(",",$mobile_menu_font_color);
?>
#drawer_menu { background:<?php echo esc_html($options['mobile_menu_bg_color']); ?>; }
#mobile_menu a { color:<?php echo esc_html($options['mobile_menu_font_color']); ?>; border-color:<?php echo esc_html($options['mobile_menu_border_color']); ?>; }
#mobile_menu li li a { background:<?php echo esc_html($options['mobile_menu_sub_menu_bg_color']); ?>; }
#mobile_menu a:hover, #drawer_menu .close_button:hover, #mobile_menu .child_menu_button:hover { color:<?php echo esc_html($options['mobile_menu_font_color']); ?>; background:<?php echo esc_html($options['mobile_menu_bg_hover_color']); ?>; }
#footer_lang a, #mobile_menu .child_menu_button .icon:before, #mobile_menu .child_menu_button:hover .icon:before { color:<?php echo esc_html($options['mobile_menu_font_color']); ?>; }
#footer_lang a.active_menu { color:rgba(<?php echo esc_attr($mobile_menu_font_color); ?>,0.3); }
<?php
     // メガメニュー
?>
.megamenu_blog_list, .megamenu_blog_list .category_list li.active a { background:<?php echo esc_attr($options['mega_menu_a_bg_color']); ?>; }
.megamenu_blog_list .category_list_wrap { background:<?php echo esc_attr($options['mega_menu_a_menu_bg_color']); ?>; }
.megamenu_blog_list .title { font-size:<?php echo esc_attr($options['mega_menu_a_title_font_size']); ?>px; }
.megamenu_blog_list .new_icon { color:<?php echo esc_attr($options['mega_menu_a_new_icon_font_color']); ?>; background:<?php echo esc_attr($options['mega_menu_a_new_icon_bg_color']); ?>; }

.megamenu_b_wrap { background:<?php echo esc_attr($options['mega_menu_b_bg_color']); ?>; }
.megamenu_slider .title { font-size:<?php echo esc_attr($options['mega_menu_b_slider_title_font_size']); ?>px; }
.megamenu_b .post_list .title { font-size:<?php echo esc_attr($options['mega_menu_b_title_font_size']); ?>px; }

.megamenu_c_wrap { background:<?php echo esc_attr($options['mega_menu_c_bg_color']); ?>; }
.megamenu_c_wrap .category_list .design_headline .title { font-size:<?php echo esc_attr($options['mega_menu_c_title_font_size']); ?>px; }
.megamenu_c_wrap .category_list .design_headline .sub_title { font-size:<?php echo esc_attr($options['mega_menu_c_sub_title_font_size']); ?>px; }
.megamenu_c_wrap .category_list .desc { font-size:<?php echo esc_attr($options['mega_menu_c_desc_font_size']); ?>px; }
<?php
     // 言語ボタン
     $lang_bg_color_hover = ($options['lang_bg_color_hover_use_main'] != 1) ? $options['lang_bg_color_hover'] : $options['main_color'];
?>
.pc #header_lang ul ul a { background:<?php echo esc_attr($options['lang_bg_color']); ?>; }
.pc #header_lang ul ul a:hover { background:<?php echo esc_attr($lang_bg_color_hover); ?>; }
.mobile #header_lang ul a { background:<?php echo esc_attr($options['lang_bg_color']); ?>; }
.mobile #header_lang ul a:hover { background:<?php echo esc_attr($lang_bg_color_hover); ?>; border-color:<?php echo esc_attr($lang_bg_color_hover); ?>; }
<?php
     // メッセージ -----------------------------------------------------------------------------------
      if($options['show_header_message'] && $options['header_message']) {
?>
#header_message { background:<?php echo esc_attr($options['header_message_bg_color']); ?>; color:<?php echo esc_attr($options['header_message_font_color']); ?>; font-size:<?php echo esc_attr($options['header_message_font_size']); ?>px; }
#close_header_message:before { color:<?php echo esc_attr($options['header_message_font_color']); ?>; }
#header_message a { color:<?php echo esc_attr($options['header_message_link_font_color']); ?>; }
#header_message a:hover { color:<?php echo esc_attr($options['main_color']); ?>; }
@media screen and (max-width:750px) {
  #header_message { font-size:<?php echo esc_attr($options['header_message_font_size_mobile']); ?>px; }
}
<?php
      };
     // フッター -----------------------------------------------------------------------------------
     $copyright_bg_color = ($options['copyright_bg_color_use_main'] != 1) ? $options['copyright_bg_color'] : $options['main_color'];
     $return_top_bg_color = ($options['return_top_bg_color_use_main'] != 1) ? $options['return_top_bg_color'] : $options['main_color'];
     $return_top_bg_color_hover = ($options['return_top_bg_color_hover_use_sub'] != 1) ? $options['return_top_bg_color_hover'] : $options['sub_color'];
     $footer_banner_bg_color = hex2rgb($options['footer_banner_bg_color']);
     $footer_banner_bg_color = implode(",",$footer_banner_bg_color);
?>
#footer_banner .headline h4 {
  color:<?php echo esc_html($options['footer_banner_font_color']); ?>;
  background: -moz-linear-gradient(top, rgba(<?php echo esc_html($footer_banner_bg_color); ?>,1) 0%, rgba(<?php echo esc_html($footer_banner_bg_color); ?>,0) 100%);
  background: -webkit-linear-gradient(top, rgba(<?php echo esc_html($footer_banner_bg_color); ?>,1) 0%,rgba(<?php echo esc_html($footer_banner_bg_color); ?>,0) 100%);
  background: linear-gradient(to bottom, rgba(<?php echo esc_html($footer_banner_bg_color); ?>,1) 0%,rgba(<?php echo esc_html($footer_banner_bg_color); ?>,0) 100%);
}
#footer_banner .headline .title { font-size:<?php echo esc_html($options['footer_banner_title_font_size']); ?>px; }
#footer_banner .headline .sub_title { font-size:<?php echo esc_html($options['footer_banner_sub_title_font_size']); ?>px; }
#footer_logo .logo { font-size:<?php echo esc_html($options['footer_logo_font_size']); ?>px; }
#footer_message { font-size:<?php echo esc_html($options['footer_message_font_size']); ?>px; color:<?php echo esc_html($options['footer_message_font_color']); ?>;}
#copyright { color:<?php echo esc_html($options['copyright_font_color']); ?>; background:<?php echo esc_html($copyright_bg_color); ?>; }
#return_top a:before { color:<?php echo esc_html($options['return_top_font_color']); ?>; }
#return_top a { background:<?php echo esc_html($return_top_bg_color); ?>; }
#return_top a:hover { background:<?php echo esc_html($return_top_bg_color_hover); ?>; }
@media screen and (max-width:950px) {
  #footer_banner .headline .title { font-size:<?php echo esc_html($options['footer_banner_title_font_size_mobile']); ?>px; }
  #footer_banner .headline .sub_title { font-size:<?php echo esc_html($options['footer_banner_sub_title_font_size_mobile']); ?>px; }
}
@media screen and (max-width:750px) {
  #footer_logo .logo { font-size:<?php echo esc_html($options['footer_logo_font_size_mobile']); ?>px; }
  #footer_message { font-size:<?php echo esc_html($options['footer_message_font_size_mobile']); ?>px; }
}
<?php
     // サムネイルのホバーアニメーション設定　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     if($options['hover_type']!="type5"){

       // ズームイン ------------------------------------------------------------------------------
       if($options['hover_type']=="type1"){
?>
.author_profile .avatar_area img, .animate_image img, .animate_background .image {
  width:100%; height:auto;
  -webkit-transition: transform  0.5s ease;
  transition: transform  0.5s ease;
}
.author_profile a.avatar:hover img, .animate_image:hover img, .animate_background:hover .image {
  -webkit-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  transform: scale(<?php echo $options['hover1_zoom']; ?>);
}

<?php
     // ズームアウト ------------------------------------------------------------------------------
     } if($options['hover_type']=="type2"){
?>
.author_profile .avatar_area img, .animate_image img, .animate_background .image {
  width:100%; height:auto;
  -webkit-transition: transform  0.5s ease;
  transition: transform  0.5s ease;
  -webkit-transform: scale(<?php echo $options['hover2_zoom']; ?>);
  transform: scale(<?php echo $options['hover2_zoom']; ?>);
}
.author_profile a.avatar:hover img, .animate_image:hover img, .animate_background:hover .image {
  -webkit-transform: scale(1);
  transform: scale(1);
}

<?php
     // スライド ------------------------------------------------------------------------------
     } elseif($options['hover_type']=="type3"){
?>
.author_profile .avatar_area, .animate_image, .animate_background, .animate_background .image_wrap {
  background: <?php echo $options['hover3_bgcolor']; ?>;
}
.animate_image img, .animate_background .image {
  -webkit-width:calc(100% + 30px) !important; width:calc(100% + 30px) !important; height:auto; max-width:inherit !important; position:relative;
  <?php if($options['hover3_direct']=='type1'): ?>
  -webkit-transform: translate(-15px, 0px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, 0px); transition-property: opacity, translateX; transition: 0.5s;
  <?php else: ?>
  -webkit-transform: translate(-15px, 0px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, 0px); transition-property: opacity, translateX; transition: 0.5s;
  <?php endif; ?>
}
.animate_image:hover img, .animate_background:hover .image {
  opacity:<?php echo $options['hover3_opacity']; ?>;
  <?php if($options['hover3_direct']=='type1'): ?>
  -webkit-transform: translate(0px, 0px);
  transform: translate(0px, 0px);
  <?php else: ?>
  -webkit-transform: translate(-30px, 0px);
  transform: translate(-30px, 0px);
  <?php endif; ?>
}
.animate_image.square img {
  -webkit-width:calc(100% + 30px) !important; width:calc(100% + 30px) !important; height:auto; max-width:inherit !important; position:relative;
  <?php if($options['hover3_direct']=='type1'): ?>
  -webkit-transform: translate(-15px, -15px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, -15px); transition-property: opacity, translateX; transition: 0.5s;
  <?php else: ?>
  -webkit-transform: translate(-15px, -15px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, -15px); transition-property: opacity, translateX; transition: 0.5s;
  <?php endif; ?>
}
.animate_image.square:hover img {
  opacity:<?php echo $options['hover3_opacity']; ?>;
  <?php if($options['hover3_direct']=='type1'): ?>
  -webkit-transform: translate(0px, -15px);
  transform: translate(0px, -15px);
  <?php else: ?>
  -webkit-transform: translate(-30px, -15px);
  transform: translate(-30px, -15px);
  <?php endif; ?>
}
<?php
     // フェードアウト ------------------------------------------------------------------------------
     } elseif($options['hover_type']=="type4"){
?>
.author_profile .avatar_area, .animate_image, .animate_background, .animate_background .image_wrap {
  background: <?php echo $options['hover4_bgcolor']; ?>;
}
.author_profile a.avatar img, .animate_image img, .animate_background .image {
  -webkit-transition-property: opacity; -webkit-transition: 0.5s;
  transition-property: opacity; transition: 0.5s;
}
.author_profile a.avatar:hover img, .animate_image:hover img, .animate_background:hover .image {
  opacity: <?php echo $options['hover4_opacity']; ?>;
}
<?php }; }; // アニメーションここまで ?>

<?php
     // 色関連のスタイル　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
?>
a { color:#000; }

body { background:<?php echo esc_html($options['bg_color']); ?>; }

<?php
     // メインカラー ----------------------------------
     $main_color = $options['main_color'];
?>
#header_search .button label:hover:before, .gallery_category_sort_button ol li.active a, #header_lang_button:hover:before, #header_lang_button.active:before, .mobile #next_prev_post a:hover .title_area, #footer_lang a:hover
  { color:<?php echo esc_html($main_color); ?>; }

.page_navi a:hover, #submit_comment:hover, #cancel_comment_reply a:hover, #wp-calendar #prev a:hover, #wp-calendar #next a:hover, #wp-calendar td a:hover,
#gallery_nav a:hover, #post_pagination a:hover, #p_readmore .button:hover, .page_navi a:hover, #post_pagination a:hover,.c-pw__btn:hover, #post_pagination a:hover, #comment_tab li a:hover,
body.home .global_menu_button:hover span, body.home.header_fix_mobile .global_menu_button:hover span
  { background-color:<?php echo esc_html($main_color); ?>; }

.page_navi a:hover, #comment_textarea textarea:focus, .c-pw__box-input:focus, .page_navi a:hover, #post_pagination a:hover, .mobile #gallery_nav a:hover
  { border-color:<?php echo esc_html($main_color); ?>; }

<?php
     // テキストリンクのhoverカラー ----------------------------------
     $text_hover_color = $options['text_hover_color'];
?>
a:hover, #header_logo a:hover, #header_lang_button.active, #footer a:hover, #footer_social_link li a:hover:before, #bread_crumb a:hover, #bread_crumb li.home a:hover:after, #next_prev_post a:hover,
.single_copy_title_url_btn:hover, .tcdw_search_box_widget .search_area .search_button:hover:before,
#single_author_title_area .author_link li a:hover:before, .author_profile a:hover, .author_profile .author_link li a:hover:before, #post_meta_bottom a:hover, .cardlink_title a:hover,
.comment a:hover, .comment_form_wrapper a:hover, #searchform .submit_button:hover:before, .p-dropdown__title:hover:after
  { color:<?php echo esc_html($text_hover_color); ?>; }

.global_menu_button:hover span
  { background-color:<?php echo esc_html($text_hover_color); ?>; }

<?php
     // ウィジェットの見出し ----------------------------------
?>
.widget_headline { color:<?php echo esc_html($options['widget_font_color']); ?>; background:<?php echo esc_html($options['widget_bg_color']); ?>; }

<?php
     // 詳細ページのテキストカラー ----------------------------------
     $content_link_color = ($options['content_link_color_use_main'] != 1) ? $options['content_link_color'] : $options['main_color'];
     $content_link_hover_color = ($options['content_link_hover_color_use_sub'] != 1) ? $options['content_link_hover_color'] : $options['sub_color'];
?>
.post_content a, #featured_data_list a { color:<?php echo esc_html($content_link_color); ?>; }
.post_content a:hover, #featured_data_list a:hover { color:<?php echo esc_html($content_link_hover_color); ?>; }

<?php
     // 特集の記事番号 ----------------------------------
?>
.featured_post_num { color:<?php echo esc_html($options['featured_number_color']); ?>; }
<?php
     // カスタムCSS --------------------------------------------
     if($options['css_code']) {
       echo wp_kses_post($options['css_code']);
     };

     // クイックタグ --------------------------------------------
     if ( $options['use_quicktags'] ) :

     // 見出し
?>
.styled_h2 {
  font-size:<?php echo esc_attr($options['qt_h2_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h2_text_align']); ?>; color:<?php echo esc_attr($options['qt_h2_font_color']); ?>; <?php if($options['show_qt_h2_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h2_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h2_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h2_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h2_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h2_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h2_padding_top']); ?>px <?php echo esc_attr($options['qt_h2_padding_right']); ?>px <?php echo esc_attr($options['qt_h2_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h2_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h2_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h2_margin_bottom']); ?>px !important;
}
.styled_h3 {
  font-size:<?php echo esc_attr($options['qt_h3_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h3_text_align']); ?>; color:<?php echo esc_attr($options['qt_h3_font_color']); ?>; <?php if($options['show_qt_h3_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h3_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h3_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h3_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h3_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h3_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h3_padding_top']); ?>px <?php echo esc_attr($options['qt_h3_padding_right']); ?>px <?php echo esc_attr($options['qt_h3_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h3_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h3_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h3_margin_bottom']); ?>px !important;
}
.styled_h4 {
  font-size:<?php echo esc_attr($options['qt_h4_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h4_text_align']); ?>; color:<?php echo esc_attr($options['qt_h4_font_color']); ?>; <?php if($options['show_qt_h4_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h4_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h4_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h4_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h4_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h4_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h4_padding_top']); ?>px <?php echo esc_attr($options['qt_h4_padding_right']); ?>px <?php echo esc_attr($options['qt_h4_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h4_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h4_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h4_margin_bottom']); ?>px !important;
}
.styled_h5 {
  font-size:<?php echo esc_attr($options['qt_h5_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h5_text_align']); ?>; color:<?php echo esc_attr($options['qt_h5_font_color']); ?>; <?php if($options['show_qt_h5_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h5_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h5_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h5_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h5_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h5_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h5_padding_top']); ?>px <?php echo esc_attr($options['qt_h5_padding_right']); ?>px <?php echo esc_attr($options['qt_h5_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h5_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h5_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h5_margin_bottom']); ?>px !important;
}
<?php
     // ボタン
     for ( $i = 1; $i <= 3; $i++ ) {
       $qt_custom_button_border_color = hex2rgb($options['qt_custom_button_border_color' . $i]);
       $qt_custom_button_border_color = implode(",",$qt_custom_button_border_color);
       $qt_custom_button_border_color_hover = hex2rgb($options['qt_custom_button_border_color_hover' . $i]);
       $qt_custom_button_border_color_hover = implode(",",$qt_custom_button_border_color_hover);
?>
.q_custom_button<?php echo $i; ?> {
  color:<?php echo esc_attr($options['qt_custom_button_font_color' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color); ?>,<?php echo esc_attr($options['qt_custom_button_border_color_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1 { background:<?php echo esc_attr($options['qt_custom_button_bg_color' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:hover, .q_custom_button<?php echo $i; ?>:focus {
  color:<?php echo esc_attr($options['qt_custom_button_font_color_hover' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color_hover); ?>,<?php echo esc_attr($options['qt_custom_button_border_color_hover_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1:hover { background:<?php echo esc_attr($options['qt_custom_button_bg_color_hover' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:before { background:<?php echo esc_attr($options['qt_custom_button_bg_color_hover' . $i]); ?>; }
<?php }; ?>
<?php
     // 吹き出し
?>
.speech_balloon_left1 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color1'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color1'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color1'] ); ?> }
.speech_balloon_left1 .speach_balloon_text::before { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_border_color1'] ); ?> }
.speech_balloon_left1 .speach_balloon_text::after { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color1'] ); ?> }
.speech_balloon_left2 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color2'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color2'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color2'] ); ?> }
.speech_balloon_left2 .speach_balloon_text::before { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_border_color2'] ); ?> }
.speech_balloon_left2 .speach_balloon_text::after { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color2'] ); ?> }
.speech_balloon_right1 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color3'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color3'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color3'] ); ?> }
.speech_balloon_right1 .speach_balloon_text::before { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_border_color3'] ); ?> }
.speech_balloon_right1 .speach_balloon_text::after { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color3'] ); ?> }
.speech_balloon_right2 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color4'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color4'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color4'] ); ?> }
.speech_balloon_right2 .speach_balloon_text::before { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_border_color4'] ); ?> }
.speech_balloon_right2 .speach_balloon_text::after { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color4'] ); ?> }
<?php
     endif;
     // Google map
     $qt_gmap_marker_bg = ($options['qt_gmap_marker_bg_use_main'] != 1) ? $options['qt_gmap_marker_bg'] : $options['main_color'];
?>
.qt_google_map .pb_googlemap_custom-overlay-inner { background:<?php echo esc_attr($qt_gmap_marker_bg); ?>; color:<?php echo esc_attr($options['qt_gmap_marker_color']); ?>; }
.qt_google_map .pb_googlemap_custom-overlay-inner::after { border-color:<?php echo esc_attr($qt_gmap_marker_bg); ?> transparent transparent transparent; }
</style>

<?php /* URLやモバイル等でcssが変わるものはここで出力 ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ */ ?>
<style id="current-page-style" type="text/css">
<?php
     // トップページ -----------------------------------------------------------------------------
     if(is_front_page()) {

       // ヘッダーコンテンツ
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
       } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type2') ) {
         $index_slider = $options['mobile_index_slider'];
         $display_header_content = 'show';
       } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type1') ) {
         $index_slider = $options['index_slider'];
         $display_header_content = 'show';
       }

       if($display_header_content == 'show'){

         $i = 1;
         foreach ( $index_slider as $key => $value ) :

           if(is_mobile() && ($options['mobile_show_index_slider'] == 'type2')) {
             $catch_font_size_mobile = $value['catch_font_size'];
             $desc_font_size_mobile = $value['desc_font_size'];
           } else {
             $catch_font_size_mobile = $value['catch_font_size_mobile'];
             $desc_font_size_mobile = $value['desc_font_size_mobile'];
           }
           $button_font_color = ($value['button_animation_type'] != 'type1') ? $value['button_font_color'] : '#ffffff';
           $button_bg_color = $options['main_color'];
           $button_border_color = ($value['button_animation_type'] != 'type1') ? $value['button_border_color'] : $options['main_color'];
           $button_font_color_hover = ($value['button_animation_type'] != 'type1') ? $value['button_font_color_hover'] : '#ffffff';
           $button_bg_color_hover = ($value['button_animation_type'] != 'type1') ? $value['button_bg_color_hover'] : $options['sub_color'];
           $button_border_color_hover = ($value['button_animation_type'] != 'type1') ? $value['button_border_color_hover'] : $options['sub_color'];

           $button_border_color = hex2rgb($button_border_color);
           $button_border_color = implode(",",$button_border_color);
           $button_border_color_hover = hex2rgb($button_border_color_hover);
           $button_border_color_hover = implode(",",$button_border_color_hover);
?>
#header_slider .item<?php echo $i; ?> .catch { font-size:<?php echo esc_attr($value['catch_font_size']); ?>px; color:<?php echo esc_attr($value['catch_font_color']); ?>; }
#header_slider .item<?php echo $i; ?> .desc p { font-size:<?php echo esc_attr($value['desc_font_size']); ?>px; color:<?php echo esc_attr($value['desc_font_color']); ?>; }
#header_slider .item<?php echo $i; ?> .button { color:<?php echo esc_attr($button_font_color); ?>; border-color:rgba(<?php echo esc_attr($button_border_color); ?>,<?php echo esc_attr($value['button_border_color_opacity']); ?>); }
#header_slider .item<?php echo $i; ?> .button:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
#header_slider .item<?php echo $i; ?> .button.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; }
#header_slider .item<?php echo $i; ?> .button.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($value['button_border_color_opacity_hover']); ?>); }
#header_slider .item<?php echo $i; ?> .button.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:none; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($value['button_border_color_opacity_hover']); ?>); }
#header_slider .item<?php echo $i; ?> .button.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:none; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($value['button_border_color_opacity_hover']); ?>); }
@media screen and (max-width:750px) {
  #header_slider .item<?php echo $i; ?> .catch { font-size:<?php echo esc_attr($catch_font_size_mobile); ?>px; }
  #header_slider .item<?php echo $i; ?> .desc p { font-size:<?php echo esc_attr($desc_font_size_mobile); ?>px; }
}
<?php
           if($value['use_overlay'] == 1) {
             $overlay_color_base = hex2rgb($value['overlay_color']);
             $overlay_color = implode(",",$overlay_color_base);
?>
#header_slider .item<?php echo $i; ?> .overlay { background-color:rgba(<?php echo esc_attr($overlay_color); ?>,<?php echo esc_attr($value['overlay_opacity']); ?>); }
<?php
           };
         $i++;
         endforeach;
       };
?>
#main_contents_link span { font-size:<?php echo esc_attr($options['index_slider_message_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #main_contents_link span { font-size:<?php echo esc_attr($options['index_slider_message_font_size_mobile']); ?>px; }
}
<?php
       // トップページ　コンテンツビルダー -------------------------------------------------------------------------------------------------------------
       if ($options['contents_builder'] || $options['mobile_contents_builder']) :
         $content_count = 1;
         if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
           $contents_builder = $options['mobile_contents_builder'];
         } else {
           $contents_builder = $options['contents_builder'];
         }
         foreach($contents_builder as $content) :

           // デザインコンテンツ
           if ( $content['cb_content_select'] == 'design_content' && $content['show_content'] ) {

             if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
               $headline_font_size_mobile = $content['headline_font_size'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size'];
               $desc_font_size_mobile = $content['desc_font_size'];
             } else {
               $headline_font_size_mobile = $content['headline_font_size_mobile'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'];
               $desc_font_size_mobile = $content['desc_font_size_mobile'];
             }

             $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
             $button_bg_color = $options['main_color'];
             $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : $options['main_color'];
             $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
             $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
             $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];

             $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
             $icon_image_use_retina = $options['headline_icon_image_retina'];
             $show_icon = $content['headline_show_icon'];
             if($icon_image && $show_icon){
               $icon_image_width_mobile = round($icon_image[1] * 0.8);
             }
             if($icon_image && $show_icon){
               $icon_image_width = $icon_image[1];
               $icon_image_height = $icon_image[2];
               if($icon_image_use_retina){
                 $icon_image_width = round($icon_image[1] / 2);
                 $icon_image_height = round($icon_image[2] / 2);
               }
               $icon_image_width_mobile = round($icon_image_width * 0.8);
             }
?>
.design_content.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($content['headline_font_size']); ?>px; }
.design_content.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($content['sub_headline_font_size']); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.design_content.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.design_content.num<?php echo $content_count; ?> .desc { font-size:<?php echo esc_html($content['desc_font_size']); ?>px; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:<?php echo esc_attr($button_border_color); ?>; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.design_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
@media screen and (max-width:750px) {
  <?php if($icon_image && $show_icon){ ?>
  .design_content.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .design_content.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($headline_font_size_mobile); ?>px; }
  .design_content.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($sub_headline_font_size_mobile); ?>px; }
  .design_content.num<?php echo $content_count; ?> .desc { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; }
}
<?php
           // 特集記事一覧
           } elseif ( $content['cb_content_select'] == 'featured_post_list' && $content['show_content'] ) {

             if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
               $headline_font_size_mobile = $content['headline_font_size'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size'];
               $desc_font_size_mobile = $content['desc_font_size'];
               $large_title_font_size_mobile = $content['large_title_font_size'];
               $small_title_font_size_mobile = $content['small_title_font_size'];
             } else {
               $headline_font_size_mobile = $content['headline_font_size_mobile'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'];
               $desc_font_size_mobile = $content['desc_font_size_mobile'];
               $large_title_font_size_mobile = $content['large_title_font_size_mobile'];
               $small_title_font_size_mobile = $content['small_title_font_size_mobile'];
             }

             $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
             $button_bg_color = $options['main_color'];
             $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : $options['main_color'];
             $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
             $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
             $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];

             $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
             $icon_image_use_retina = $options['headline_icon_image_retina'];
             $show_icon = $content['headline_show_icon'];
             if($icon_image && $show_icon){
               $icon_image_width = $icon_image[1];
               $icon_image_height = $icon_image[2];
               if($icon_image_use_retina){
                 $icon_image_width = round($icon_image[1] / 2);
                 $icon_image_height = round($icon_image[2] / 2);
               }
               $icon_image_width_mobile = round($icon_image_width * 0.8);
             }
?>
.index_featured_list.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($content['headline_font_size']); ?>px; }
.index_featured_list.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($content['sub_headline_font_size']); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.index_featured_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.index_featured_list.num<?php echo $content_count; ?> .featured_list .item.large .title { font-size:<?php echo esc_html($content['large_title_font_size']); ?>px; }
.index_featured_list.num<?php echo $content_count; ?> .featured_list .item.small .title { font-size:<?php echo esc_html($content['small_title_font_size']); ?>px; }
.index_featured_list.num<?php echo $content_count; ?> .featured_list .desc { font-size:<?php echo esc_html($content['desc_font_size']); ?>px; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:<?php echo esc_attr($button_border_color); ?>; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.index_featured_list.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
@media screen and (max-width:750px) {
  <?php if($icon_image && $show_icon){ ?>
  .index_featured_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .index_featured_list.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($headline_font_size_mobile); ?>px; }
  .index_featured_list.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($sub_headline_font_size_mobile); ?>px; }
  .index_featured_list.num<?php echo $content_count; ?> .featured_list .item.large .title { font-size:<?php echo esc_html($large_title_font_size_mobile); ?>px; }
  .index_featured_list.num<?php echo $content_count; ?> .featured_list .item.small .title { font-size:<?php echo esc_html($small_title_font_size_mobile); ?>px; }
  .index_featured_list.num<?php echo $content_count; ?> .featured_list .desc { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; }
}
<?php
           // ギャラリー一覧
           } elseif ( $content['cb_content_select'] == 'gallery_list' && $content['show_content'] ) {

             if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
               $headline_font_size_mobile = $content['headline_font_size'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size'];
               $desc_font_size_mobile = $content['desc_font_size'];
               $title_font_size_mobile = $content['title_font_size'];
               $category_font_size_mobile = $content['category_font_size'];
               $sort_button_font_size_mobile = $content['sort_button_font_size'];
               $load_button_font_size_mobile = $content['load_button_font_size'];
             } else {
               $headline_font_size_mobile = $content['headline_font_size_mobile'];
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'];
               $desc_font_size_mobile = $content['desc_font_size_mobile'];
               $title_font_size_mobile = $content['title_font_size_mobile'];
               $category_font_size_mobile = $content['category_font_size_mobile'];
               $sort_button_font_size_mobile = $content['sort_button_font_size_mobile'];
               $load_button_font_size_mobile = $content['load_button_font_size_mobile'];
             }

             $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
             $icon_image_use_retina = $options['headline_icon_image_retina'];
             $show_icon = $content['headline_show_icon'];
             if($icon_image && $show_icon){
               $icon_image_width = $icon_image[1];
               $icon_image_height = $icon_image[2];
               if($icon_image_use_retina){
                 $icon_image_width = round($icon_image[1] / 2);
                 $icon_image_height = round($icon_image[2] / 2);
               }
               $icon_image_width_mobile = round($icon_image_width * 0.8);
             }

             $icon_image_small = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
             $icon_image_small_use_retina = $options['headline_icon_image_small_retina'];
             $show_category_icon = $content['show_category_sort_button'];
             $show_more_label_icon = $content['show_more_label_icon'];
             if($icon_image_small && $show_category_icon){
               $icon_image_small_width = $icon_image_small[1];
               $icon_image_small_height = $icon_image_small[2];
               if($icon_image_small_use_retina){
                 $icon_image_small_width = round($icon_image_small[1] / 2);
                 $icon_image_small_height = round($icon_image_small[2] / 2);
               }
               $icon_image_small_width_mobile = round($icon_image_small_width * 0.8);
             }
?>
.index_gallery_list.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($content['headline_font_size']); ?>px; }
.index_gallery_list.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($content['sub_headline_font_size']); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.index_gallery_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.index_gallery_list.num<?php echo $content_count; ?> .gallery_category_sort_button ol li { font-size:<?php echo esc_html($content['sort_button_font_size']); ?>px; }
<?php if($icon_image_small && $show_category_icon){ ?>
.index_gallery_list.num<?php echo $content_count; ?> .gallery_category_sort_button ol li img { width:<?php echo $icon_image_small_width; ?>px; height:auto; }
<?php }; ?>
.index_gallery_list.num<?php echo $content_count; ?> .entry-more span { font-size:<?php echo esc_html($content['load_button_font_size']); ?>px; }
<?php if($icon_image_small && $show_more_label_icon){ ?>
.index_gallery_list.num<?php echo $content_count; ?> .entry-more img { width:<?php echo $icon_image_small_width; ?>px; height:auto; }
<?php }; ?>
.index_gallery_list.num<?php echo $content_count; ?> .desc { font-size:<?php echo esc_html($content['desc_font_size']); ?>px; }
.index_gallery_list.num<?php echo $content_count; ?> .gallery_list .title { color:<?php echo esc_html($content['post_font_color']); ?>; font-size:<?php echo esc_html($content['title_font_size']); ?>px; }
.index_gallery_list.num<?php echo $content_count; ?> .gallery_list .category a { color:<?php echo esc_html($content['post_font_color']); ?>; border-color:<?php echo esc_html($content['post_font_color']); ?>; font-size:<?php echo esc_html($content['category_font_size']); ?>px; }
@media screen and (max-width:750px) {
  <?php if($icon_image && $show_icon){ ?>
  .index_gallery_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .index_gallery_list.num<?php echo $content_count; ?> .gallery_category_sort_button ol li { font-size:<?php echo esc_html($sort_button_font_size_mobile); ?>px; }
  <?php if($icon_image_small && $show_category_icon){ ?>
  .index_gallery_list.num<?php echo $content_count; ?> .gallery_category_sort_button ol li img { width:<?php echo $icon_image_small_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .index_gallery_list.num<?php echo $content_count; ?> .entry-more span { font-size:<?php echo esc_html($load_button_font_size_mobile); ?>px; }
  <?php if($icon_image_small && $show_more_label_icon){ ?>
  .index_gallery_list.num<?php echo $content_count; ?> .entry-more img { width:<?php echo $icon_image_small_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .index_gallery_list.num<?php echo $content_count; ?> .design_headline .title { font-size:<?php echo esc_html($headline_font_size_mobile); ?>px; }
  .index_gallery_list.num<?php echo $content_count; ?> .design_headline .sub_title { font-size:<?php echo esc_html($sub_headline_font_size_mobile); ?>px; }
  .index_gallery_list.num<?php echo $content_count; ?> .desc { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; }
  .index_gallery_list.num<?php echo $content_count; ?> .gallery_list .title { font-size:<?php echo esc_html($title_font_size_mobile); ?>px; }
  .index_gallery_list.num<?php echo $content_count; ?> .gallery_list .category a { font-size:<?php echo esc_html($category_font_size_mobile); ?>px; }
}
<?php
           // ギャラリーカテゴリー
           } elseif ( $content['cb_content_select'] == 'gallery_category_list' && $content['show_content'] ) {

              if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
                $title_font_size_mobile = $content['title_font_size'];
                $sub_title_font_size_mobile = $content['sub_title_font_size'];
              } else {
                $title_font_size_mobile = $content['title_font_size_mobile'];
                $sub_title_font_size_mobile = $content['sub_title_font_size_mobile'];
              }

              $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
              $icon_image_use_retina = $options['headline_icon_image_retina'];
              $show_icon = $content['title_show_icon'];
              if($icon_image && $show_icon){
                $icon_image_width = $icon_image[1];
                $icon_image_height = $icon_image[2];
                if($icon_image_use_retina){
                  $icon_image_width = round($icon_image[1] / 2);
                  $icon_image_height = round($icon_image[2] / 2);
                }
                $margin_top = round($icon_image_height / 2);
                $icon_image_width_mobile = round($icon_image_width * 0.8);
                $margin_top_mobile = round($icon_image_height * 0.8 / 2);
              }
?>
<?php if($icon_image && $show_icon){ ?>
.index_gallery_category_list.num<?php echo $content_count; ?> { margin-top:<?php echo $margin_top; ?>px; }
.index_gallery_category_list.num<?php echo $content_count; ?> .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.index_gallery_category_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.index_gallery_category_list.num<?php echo $content_count; ?> .title { color:<?php echo esc_html($content['title_font_color']); ?>; font-size:<?php echo esc_html($content['title_font_size']); ?>px; }
.index_gallery_category_list.num<?php echo $content_count; ?> .sub_title { color:<?php echo esc_html($content['title_font_color']); ?>; font-size:<?php echo esc_html($content['sub_title_font_size']); ?>px; }
@media screen and (max-width:950px) {
  <?php if($icon_image && $show_icon){ ?>
  .index_gallery_category_list.num<?php echo $content_count; ?> { margin-top:<?php echo $margin_top_mobile; ?>px; }
  .index_gallery_category_list.num<?php echo $content_count; ?> .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .index_gallery_category_list.num<?php echo $content_count; ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .index_gallery_category_list.num<?php echo $content_count; ?> .title { font-size:<?php echo esc_html($title_font_size_mobile); ?>px; }
  .index_gallery_category_list.num<?php echo $content_count; ?> .sub_title { font-size:<?php echo esc_html($sub_title_font_size_mobile); ?>px; }
}
<?php
           // バナーコンテンツ
           } elseif ( $content['cb_content_select'] == 'banner_content' && $content['show_content'] ) {
             if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
               $catch_font_size_mobile = $content['catch_font_size'];
               $desc_font_size_mobile = $content['desc_font_size'];
             } else {
               $catch_font_size_mobile = $content['catch_font_size_mobile'];
               $desc_font_size_mobile = $content['desc_font_size_mobile'];
             }
             $catch_font_size_middle = ($content['catch_font_size'] + $catch_font_size_mobile) / 2;

             $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
             $button_bg_color = $options['main_color'];
             $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : $options['main_color'];
             $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
             $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
             $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];

             $button_border_color = hex2rgb($button_border_color);
             $button_border_color = implode(",",$button_border_color);
             $button_border_color_hover = hex2rgb($button_border_color_hover);
             $button_border_color_hover = implode(",",$button_border_color_hover);
?>
.banner_content.num<?php echo $content_count; ?> .catch { color:<?php echo esc_html($content['catch_font_color']); ?>; font-size:<?php echo esc_html($content['catch_font_size']); ?>px; }
.banner_content.num<?php echo $content_count; ?> .desc { color:<?php echo esc_html($content['desc_font_color']); ?>; font-size:<?php echo esc_html($content['desc_font_size']); ?>px; }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:rgba(<?php echo esc_attr($button_border_color); ?>,<?php echo esc_attr($content['button_border_color_opacity']); ?>); }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; border:none; }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($content['button_border_color_hover_opacity']); ?>); }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($content['button_border_color_hover_opacity']); ?>); }
.banner_content.num<?php echo $content_count; ?> .cb_link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($content['button_border_color_hover_opacity']); ?>); }
@media screen and (max-width:1200px) {
  .banner_content.num<?php echo $content_count; ?> .catch { font-size:<?php echo esc_attr(ceil($catch_font_size_middle)); ?>px; }
}
@media screen and (max-width:750px) {
  .banner_content.num<?php echo $content_count; ?> .catch { font-size:<?php echo esc_html($catch_font_size_mobile); ?>px; }
  .banner_content.num<?php echo $content_count; ?> .desc { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; }
}
<?php
     // フリースペース
     } elseif ( $content['cb_content_select'] == 'free_space' && $content['show_content'] ) {
       if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
         $margin_top_mobile = $content['margin_top'];
         $margin_bottom_mobile = $content['margin_bottom'];
         $desc_font_size_mobile = $content['desc_font_size'];
       } else {
         $margin_top_mobile = $content['margin_top_mobile'];
         $margin_bottom_mobile = $content['margin_bottom_mobile'];
         $desc_font_size_mobile = $content['desc_font_size_mobile'];
       }
?>
.cb_free_space.num<?php echo $content_count; ?> { font-size:<?php echo esc_html($content['desc_font_size']); ?>px; margin-top:<?php echo esc_html($content['margin_top']); ?>px; margin-bottom:<?php echo esc_html($content['margin_bottom']); ?>px; }
@media screen and (max-width:750px) {
  .cb_free_space.num<?php echo $content_count; ?> { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; margin-top:<?php echo esc_html($margin_top_mobile); ?>px; margin-bottom:<?php echo esc_html($margin_bottom_mobile); ?>px; }
}
<?php
         };
         $content_count++;
         endforeach;
       endif; // END コンテンツビルダーここまで

     // ギャラリーアーカイブ -----------------------------------------------------------------------------
     } elseif(is_post_type_archive('gallery') || is_tax('gallery_category')) {

       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
       $icon_image_use_retina = $options['headline_icon_image_retina'];
       $show_icon = $options['archive_gallery_headline_show_icon'];
       $show_icon_list = $options['archive_gallery_list_headline_show_icon'];
       if($icon_image && $show_icon){
         $icon_image_width = $icon_image[1];
         $icon_image_height = $icon_image[2];
         if($icon_image_use_retina){
           $icon_image_width = round($icon_image[1] / 2);
           $icon_image_height = round($icon_image[2] / 2);
         }
         $margin_top = round($icon_image_height / 2);
         $icon_image_width_mobile = round($icon_image_width * 0.8);
         $margin_top_mobile = round($icon_image_height * 0.8 / 2);
       }

       $icon_image_small = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
       $headline_icon_image_small_retina = $options['headline_icon_image_small_retina'];
       $show_category_icon = $options['archive_gallery_show_category_sort_button_icon'];
       $show_load_icon = $options['archive_gallery_show_load_button_icon'];
       if($icon_image_small && $show_category_icon){
         $icon_image_small_width = $icon_image_small[1];
         $icon_image_small_height = $icon_image_small[2];
         if($headline_icon_image_small_retina){
           $icon_image_small_width = round($icon_image_small[1] / 2);
           $icon_image_small_height = round($icon_image_small[2] / 2);
         }
         $icon_image_small_width_mobile = round($icon_image_small_width * 0.5);
       }
?>
#page_header .catch { font-size:<?php echo esc_attr($options['archive_gallery_header_catch_font_size']); ?>px; color:<?php echo esc_attr($options['archive_gallery_header_catch_color']); ?>; }
<?php if($icon_image && $show_icon){ ?>
#gallery_archive .category_top_headline.design_headline { margin-top:-<?php echo $margin_top; ?>px; }
#gallery_archive .category_top_headline.design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
#gallery_archive .archive_top_headline.design_headline { margin-top:-<?php echo $margin_top; ?>px; }
#gallery_archive .archive_top_headline.design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
#gallery_archive .category_top_headline.design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_headline_font_size']); ?>px; }
#gallery_archive .category_top_headline.design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_sub_headline_font_size']); ?>px; }
#gallery_archive .archive_top_headline.design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_list_headline_font_size']); ?>px; }
#gallery_archive .archive_top_headline.design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_list_sub_headline_font_size']); ?>px; }
#top_gallery_desc { font-size:<?php echo esc_attr($options['archive_gallery_desc_font_size']); ?>px; }
#gallery_desc, #gallery_content_list .item .desc p { font-size:<?php echo esc_attr($options['archive_gallery_desc_font_size']); ?>px; }
.gallery_category_sort_button ol li { font-size:<?php echo esc_attr($options['archive_gallery_category_sort_button_font_size']); ?>px; }
<?php if($icon_image_small && $show_category_icon){ ?>
.gallery_category_sort_button ol li img { width:<?php echo $icon_image_small_width; ?>px; height:auto; }
<?php }; ?>
<?php if($icon_image && $show_icon){ ?>
#gallery_list .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
#gallery_list .design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_list_headline_font_size']); ?>px; }
#gallery_list .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_list_sub_headline_font_size']); ?>px; }
.gallery_list .category a { color:<?php echo esc_attr($options['archive_gallery_list_font_color']); ?>; border-color:<?php echo esc_attr($options['archive_gallery_list_font_color']); ?>; font-size:<?php echo esc_attr($options['archive_gallery_list_category_font_size']); ?>px; }
.gallery_list .title { color:<?php echo esc_attr($options['archive_gallery_list_font_color']); ?>; font-size:<?php echo esc_attr($options['archive_gallery_list_title_font_size']); ?>px; }
.gallery_list_wrap .entry-more span { font-size:<?php echo esc_attr($options['archive_gallery_category_load_button_font_size']); ?>px; }
<?php if($icon_image_small && $show_load_icon){ ?>
.gallery_list_wrap .entry-more img { width:<?php echo $icon_image_small_width; ?>px; height:auto; }
<?php }; ?>
<?php if($icon_image && $show_icon_list){ ?>
#gallery_archive .gallery_category_list { margin-top:<?php echo $margin_top; ?>px; }
.gallery_category_list .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.gallery_category_list .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.gallery_category_list .design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_category_list_title_font_size']); ?>px; color:<?php echo esc_attr($options['archive_gallery_category_list_title_font_color']); ?>; }
.gallery_category_list .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_category_list_sub_title_font_size']); ?>px; }
.gallery_category_list .desc { font-size:<?php echo esc_attr($options['archive_gallery_category_list_desc_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #page_header .catch { font-size:<?php echo esc_attr($options['archive_gallery_header_catch_font_size_mobile']); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  #gallery_archive .category_top_headline.design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  #gallery_archive .category_top_headline.design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  #gallery_archive .archive_top_headline.design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  #gallery_archive .archive_top_headline.design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  #gallery_archive .category_top_headline.design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_headline_font_size_mobile']); ?>px; }
  #gallery_archive .category_top_headline.design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_sub_headline_font_size_mobile']); ?>px; }
  #gallery_archive .archive_top_headline.design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_list_headline_font_size_mobile']); ?>px; }
  #gallery_archive .archive_top_headline.design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_list_sub_headline_font_size_mobile']); ?>px; }
  #top_gallery_desc { font-size:<?php echo esc_attr($options['archive_gallery_desc_font_size_mobile']); ?>px; }
  #gallery_desc, #gallery_content_list .item .desc p { font-size:<?php echo esc_attr($options['archive_gallery_desc_font_size_mobile']); ?>px; }
  .gallery_category_sort_button ol li { font-size:<?php echo esc_attr($options['archive_gallery_category_sort_button_font_size_mobile']); ?>px; }
  <?php if($icon_image_small && $show_category_icon){ ?>
  .gallery_category_sort_button ol li img { width:<?php echo $icon_image_small_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  <?php if($icon_image && $show_icon_list){ ?>
  #gallery_list .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  #gallery_list .design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_list_headline_font_size_mobile']); ?>px; }
  #gallery_list .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_list_sub_headline_font_size_mobile']); ?>px; }
  .gallery_list .category a { font-size:<?php echo esc_attr($options['archive_gallery_list_category_font_size_mobile']); ?>px; }
  .gallery_list .title { font-size:<?php echo esc_attr($options['archive_gallery_list_title_font_size_mobile']); ?>px; }
  .gallery_list_wrap .entry-more span { font-size:<?php echo esc_attr($options['archive_gallery_category_load_button_font_size_mobile']); ?>px; }
  <?php if($icon_image_small && $show_load_icon){ ?>
  .gallery_list_wrap .entry-more img { width:<?php echo $icon_image_small_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  <?php if($icon_image && $show_icon){ ?>
  #gallery_archive .gallery_category_list { margin-top:<?php echo $margin_top_mobile; ?>px; }
  .gallery_category_list .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .gallery_category_list .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .gallery_category_list .design_headline .title { font-size:<?php echo esc_attr($options['archive_gallery_category_list_title_font_size_mobile']); ?>px; }
  .gallery_category_list .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_gallery_category_list_sub_title_font_size_mobile']); ?>px; }
  .gallery_category_list .desc { font-size:<?php echo esc_attr($options['archive_gallery_category_list_desc_font_size_mobile']); ?>px; }
}
<?php
     // ギャラリー詳細ページ -----------------------------------------------------------------------------
     } elseif(is_singular('gallery')) {

       $icon_image_small = wp_get_attachment_image_src( $options['headline_icon_image_small'], 'full' );
       $headline_icon_image_small_retina = $options['headline_icon_image_small_retina'];
       $show_icon = $options['signle_gallery_close_button_show_icon'];
       if($icon_image_small && $show_icon){
         $icon_image_small_width = $icon_image_small[1];
         $icon_image_small_height = $icon_image_small[2];
         if($headline_icon_image_small_retina){
           $icon_image_small_width = round($icon_image_small[1] / 2);
           $icon_image_small_height = round($icon_image_small[2] / 2);
         }
         $icon_image_small_width_mobile = round($icon_image_small_width * 0.5);
       }
?>
#gallery_title { font-size:<?php echo esc_attr($options['single_gallery_title_font_size']); ?>px;  }
#gallery_content .post_content { font-size:<?php echo esc_attr($options['single_gallery_content_font_size']); ?>px; }
#gallery_featured_image .design_headline .title { font-size:<?php echo esc_attr($options['single_gallery_headline_font_size']); ?>px; }
#gallery_featured_image .design_headline .sub_title { font-size:<?php echo esc_attr($options['single_gallery_sub_headline_font_size']); ?>px; }
<?php if($icon_image_small && $show_icon){ ?>
#gallery_archive_link img { width:<?php echo $icon_image_small_width; ?>px; height:auto; }
<?php }; ?>
@media screen and (max-width:750px) {
  #gallery_title { font-size:<?php echo esc_attr($options['single_gallery_title_font_size_mobile']); ?>px;  }
  #gallery_content .post_content { font-size:<?php echo esc_attr($options['single_gallery_content_font_size_mobile']); ?>px; }
  #gallery_featured_image .design_headline .title { font-size:<?php echo esc_attr($options['single_gallery_headline_font_size_mobile']); ?>px; }
  #gallery_featured_image .design_headline .sub_title { font-size:<?php echo esc_attr($options['single_gallery_sub_headline_font_size_mobile']); ?>px; }
  <?php if($icon_image_small && $show_icon){ ?>
  #gallery_archive_link img { width:<?php echo $icon_image_small_width_mobile; ?>px; height:auto; }
  <?php }; ?>
}
<?php
     // 特集アーカイブ -----------------------------------------------------------------------------
     } elseif(is_post_type_archive('featured') || is_tax('featured_category')) {
       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
       $icon_image_use_retina = $options['headline_icon_image_retina'];
       $show_icon = $options['archive_featured_headline_show_icon'];
       if($icon_image && $show_icon){
         $icon_image_width = $icon_image[1];
         $icon_image_height = $icon_image[2];
         if($icon_image_use_retina){
           $icon_image_width = round($icon_image[1] / 2);
           $icon_image_height = round($icon_image[2] / 2);
         }
         $margin_top = round($icon_image_height / 2);
         $icon_image_width_mobile = round($icon_image_width * 0.8);
         $margin_top_mobile = round($icon_image_height * 0.8 / 2);
       }
?>
#page_header .catch { font-size:<?php echo esc_attr($options['archive_featured_header_catch_font_size']); ?>px; color:<?php echo esc_attr($options['archive_featured_header_catch_color']); ?>; }
<?php if($icon_image && $show_icon){ ?>
#main_contents .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
#main_contents .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
#main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_featured_headline_font_size']); ?>px; }
#main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_featured_sub_headline_font_size']); ?>px; }
.featured_list .item.large .title { font-size:<?php echo esc_attr($options['archive_featured_large_title_font_size']); ?>px; }
.featured_list .item.middle .title { font-size:<?php echo esc_attr($options['archive_featured_middle_title_font_size']); ?>px; }
.featured_list .item.small .title { font-size:<?php echo esc_attr($options['archive_featured_small_title_font_size']); ?>px; }
.featured_list .desc { font-size:<?php echo esc_attr($options['archive_featured_desc_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #page_header .catch { font-size:<?php echo esc_attr($options['archive_featured_header_catch_font_size_mobile']); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  #main_contents .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  #main_contents .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  #main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_featured_headline_font_size_mobile']); ?>px; }
  #main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_featured_sub_headline_font_size_mobile']); ?>px; }
  .featured_list .item.large .title { font-size:<?php echo esc_attr($options['archive_featured_large_title_font_size_mobile']); ?>px; }
  .featured_list .item.middle .title { font-size:<?php echo esc_attr($options['archive_featured_middle_title_font_size_mobile']); ?>px; }
  .featured_list .item.small .title { font-size:<?php echo esc_attr($options['archive_featured_small_title_font_size_mobile']); ?>px; }
  .featured_list .desc { font-size:<?php echo esc_attr($options['archive_featured_desc_font_size_mobile']); ?>px; }
}
<?php
     // 特集詳細ページ -----------------------------------------------------------------------------
     } elseif(is_singular('featured')) {
?>
#featured_post_title .title { font-size:<?php echo esc_attr($options['single_featured_title_font_size']); ?>px;  }
#article .post_content { font-size:<?php echo esc_attr($options['single_featured_content_font_size']); ?>px; }
#featured_data_list .top_area { background:<?php echo esc_attr($options['single_featured_list_headline_bg_color']); ?>; }
#featured_data_list .top_area .headline { color:<?php echo esc_attr($options['single_featured_list_headline_font_color']); ?>; font-size:<?php echo esc_attr($options['single_featured_list_headline_font_size']); ?>px; }
#featured_data_list .data_area { background:<?php echo esc_attr($options['single_featured_list_data_bg_color']); ?>; }
#featured_related_post .headline { font-size:<?php echo esc_attr($options['related_featured_headline_font_size']); ?>px; }
#featured_related_post .title { font-size:<?php echo esc_attr($options['related_featured_title_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #featured_post_title .title { font-size:<?php echo esc_attr($options['single_featured_title_font_size_mobile']); ?>px; }
  #article .post_content { font-size:<?php echo esc_attr($options['single_featured_content_font_size_mobile']); ?>px; }
  #featured_data_list .top_area .headline { font-size:<?php echo esc_attr($options['single_featured_list_headline_font_size_mobile']); ?>px; }
  #featured_related_post .headline { font-size:<?php echo esc_attr($options['related_featured_headline_font_size_mobile']); ?>px; }
  #featured_related_post .title { font-size:<?php echo esc_attr($options['related_featured_title_font_size_mobile']); ?>px; }
}
<?php
     // お知らせアーカイブ -----------------------------------------------------------------------------
     } elseif(is_post_type_archive('news')) {
       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
       $icon_image_use_retina = $options['headline_icon_image_retina'];
       $show_icon = $options['archive_news_headline_show_icon'];
       if($icon_image && $show_icon){
         $icon_image_width = $icon_image[1];
         $icon_image_height = $icon_image[2];
         if($icon_image_use_retina){
           $icon_image_width = round($icon_image[1] / 2);
           $icon_image_height = round($icon_image[2] / 2);
         }
         $margin_top = round($icon_image_height / 2);
         $icon_image_width_mobile = round($icon_image_width * 0.8);
         $margin_top_mobile = round($icon_image_height * 0.8 / 2);
       }
?>
#page_header .catch { font-size:<?php echo esc_attr($options['archive_news_header_catch_font_size']); ?>px; color:<?php echo esc_attr($options['archive_news_header_catch_color']); ?>; }
<?php if($icon_image && $show_icon){ ?>
#main_contents .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
#main_contents .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
#main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_news_headline_font_size']); ?>px; }
#main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_news_sub_headline_font_size']); ?>px; }
#news_list .title { font-size:<?php echo esc_attr($options['archive_news_title_font_size']); ?>px; }
#news_list .desc { font-size:<?php echo esc_attr($options['archive_news_desc_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #page_header .catch { font-size:<?php echo esc_attr($options['archive_news_header_catch_font_size_mobile']); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  #main_contents .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  #main_contents .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  #main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_news_headline_font_size_mobile']); ?>px; }
  #main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_news_sub_headline_font_size_mobile']); ?>px; }
  #news_list .title { font-size:<?php echo esc_attr($options['archive_news_title_font_size_mobile']); ?>px; }
  #news_list .desc { font-size:<?php echo esc_attr($options['archive_news_desc_font_size_mobile']); ?>px; }
}
<?php
     // お知らせ詳細ページ -----------------------------------------------------------------------------
     } elseif(is_singular('news')) {
?>
#post_title .title { font-size:<?php echo esc_attr($options['single_news_title_font_size']); ?>px;  }
#article .post_content { font-size:<?php echo esc_attr($options['single_news_content_font_size']); ?>px; }
#recent_news .headline { font-size:<?php echo esc_attr($options['recent_news_headline_font_size']); ?>px; }
#recent_news .title { font-size:<?php echo esc_attr($options['recent_news_title_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #post_title .title { font-size:<?php echo esc_attr($options['single_news_title_font_size_mobile']); ?>px; }
  #article .post_content { font-size:<?php echo esc_attr($options['single_news_content_font_size_mobile']); ?>px; }
  #recent_news .headline { font-size:<?php echo esc_attr($options['recent_news_headline_font_size_mobile']); ?>px; }
  #recent_news .title { font-size:<?php echo esc_attr($options['recent_news_title_font_size_mobile']); ?>px; }
}
<?php
     // ブログアーカイブ -----------------------------------------------------------------------------
     } elseif(is_archive() || is_home() || is_search()) {
       $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
       $icon_image_use_retina = $options['headline_icon_image_retina'];
       $show_icon = $options['archive_blog_headline_show_icon'];
       if($icon_image && $show_icon){
         $icon_image_width = $icon_image[1];
         $icon_image_height = $icon_image[2];
         if($icon_image_use_retina){
           $icon_image_width = round($icon_image[1] / 2);
           $icon_image_height = round($icon_image[2] / 2);
         }
         $margin_top = round($icon_image_height / 2);
         $icon_image_width_mobile = round($icon_image_width * 0.8);
         $margin_top_mobile = round($icon_image_height * 0.8 / 2);
       }
?>
#page_header .catch { font-size:<?php echo esc_attr($options['archive_blog_header_catch_font_size']); ?>px; color:<?php echo esc_attr($options['archive_blog_header_catch_color']); ?>; }
<?php if($icon_image && $show_icon){ ?>
#main_contents .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
#main_contents .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
#main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px; }
#main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_blog_sub_headline_font_size']); ?>px; }
#blog_list .title { font-size:<?php echo esc_attr($options['archive_blog_title_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #page_header .catch { font-size:<?php echo esc_attr($options['archive_blog_header_catch_font_size_mobile']); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  #main_contents .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  #main_contents .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  #main_contents .design_headline .title { font-size:<?php echo esc_attr($options['archive_blog_headline_font_size_mobile']); ?>px; }
  #main_contents .design_headline .sub_title { font-size:<?php echo esc_attr($options['archive_blog_sub_headline_font_size_mobile']); ?>px; }
  #blog_list .title { font-size:<?php echo esc_attr($options['archive_blog_title_font_size_mobile']); ?>px; }
}
<?php
     // ブログ詳細ページ -----------------------------------------------------------------------------
     } elseif(is_single()){
?>
#post_title .title { font-size:<?php echo esc_attr($options['single_blog_title_font_size']); ?>px;  }
#article .post_content { font-size:<?php echo esc_attr($options['single_blog_content_font_size']); ?>px; }
#related_post .headline { font-size:<?php echo esc_attr($options['related_post_headline_font_size']); ?>px; }
#related_post .title { font-size:<?php echo esc_attr($options['related_post_title_font_size']); ?>px; }
#comments .comment_headline { font-size:<?php echo esc_attr($options['comment_headline_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #post_title .title { font-size:<?php echo esc_attr($options['single_blog_title_font_size_mobile']); ?>px; }
  #article .post_content { font-size:<?php echo esc_attr($options['single_blog_content_font_size_mobile']); ?>px; }
  #related_post .headline { font-size:<?php echo esc_attr($options['related_post_headline_font_size_mobile']); ?>px; }
  #related_post .title { font-size:<?php echo esc_attr($options['related_post_title_font_size_mobile']); ?>px; }
  #comments .comment_headline { font-size:<?php echo esc_attr($options['comment_headline_font_size_mobile']); ?>px; }
}
<?php
     // バナーコンテンツ
     if ($options['show_single_blog_banner']){
       $single_blog_banner_title_bg_color = hex2rgb($options['single_blog_banner_title_bg_color']);
       $single_blog_banner_title_bg_color = implode(",",$single_blog_banner_title_bg_color);
?>
#single_banner_content .title_area { color:<?php echo esc_attr($options['single_blog_banner_title_font_color']); ?>; }
#single_banner_content .title { font-size:<?php echo esc_attr($options['single_blog_banner_title_font_size']); ?>px; }
#single_banner_content .sub_title { font-size:<?php echo esc_attr($options['single_blog_banner_sub_title_font_size']); ?>px; }
#single_banner_content .desc { font-size:<?php echo esc_attr($options['single_blog_banner_desc_font_size']); ?>px; }
#single_banner_content .image_wrap:before {
  background: -moz-linear-gradient(left, rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0.6) 0%, rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0) 100%);
  background: -webkit-linear-gradient(left, rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0.6) 0%,rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0) 100%);
  background: linear-gradient(to right, rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0.6) 0%,rgba(<?php echo esc_attr($single_blog_banner_title_bg_color); ?>,0) 100%);
}
@media screen and (max-width:750px) {
  #single_banner_content .title { font-size:<?php echo esc_attr($options['single_blog_banner_title_font_size_mobile']); ?>px; }
  #single_banner_content .sub_title { font-size:<?php echo esc_attr($options['single_blog_banner_sub_title_font_size_mobile']); ?>px; }
  #single_banner_content .desc { font-size:<?php echo esc_attr($options['single_blog_banner_desc_font_size_mobile']); ?>px; }
}
<?php }; ?>
<?php
     // 固定ページ --------------------------------------------------------------------
     } elseif(is_page()) {

       global $post;

       $page_header_catch_font_size = get_post_meta($post->ID, 'page_header_catch_font_size', true) ?  get_post_meta($post->ID, 'page_header_catch_font_size', true) : '28';
       $page_header_catch_font_size_mobile = get_post_meta($post->ID, 'page_header_catch_font_size_mobile', true) ?  get_post_meta($post->ID, 'page_header_catch_font_size_mobile', true) : '20';
       $page_header_catch_font_color = get_post_meta($post->ID, 'page_header_catch_font_color', true) ?  get_post_meta($post->ID, 'page_header_catch_font_color', true) : '#ffffff';

       $page_header_desc_font_size = get_post_meta($post->ID, 'page_header_desc_font_size', true) ?  get_post_meta($post->ID, 'page_header_desc_font_size', true) : '16';
       $page_header_desc_font_size_mobile = get_post_meta($post->ID, 'page_header_desc_font_size_mobile', true) ?  get_post_meta($post->ID, 'page_header_desc_font_size_mobile', true) : '14';
       $page_header_desc_font_color = get_post_meta($post->ID, 'page_header_desc_font_color', true) ?  get_post_meta($post->ID, 'page_header_desc_font_color', true) : '#ffffff';

       $page_header_type2_font_size = get_post_meta($post->ID, 'page_header_type2_font_size', true) ?  get_post_meta($post->ID, 'page_header_type2_font_size', true) : '24';
       $page_header_type2_font_size_mobile = get_post_meta($post->ID, 'page_header_type2_font_size_mobile', true) ?  get_post_meta($post->ID, 'page_header_type2_font_size_mobile', true) : '18';

       $page_content_font_size = get_post_meta($post->ID, 'page_content_font_size', true) ?  get_post_meta($post->ID, 'page_content_font_size', true) : '16';
       $page_content_font_size_mobile = get_post_meta($post->ID, 'page_content_font_size_mobile', true) ?  get_post_meta($post->ID, 'page_content_font_size_mobile', true) : '14';
?>
#page_header .catch, #page_full_header .catch { font-size:<?php echo esc_attr($page_header_catch_font_size); ?>px; color:<?php echo esc_attr($page_header_catch_font_color); ?>; }
#page_full_header .desc { font-size:<?php echo esc_attr($page_header_desc_font_size); ?>px; color:<?php echo esc_attr($page_header_desc_font_color); ?>; }
#page_header_type2 .title { font-size:<?php echo esc_attr($page_header_type2_font_size); ?>px; }
#article .post_content { font-size:<?php echo esc_attr($page_content_font_size); ?>px; }
@media screen and (max-width:750px) {
  #page_header .catch, #page_full_header .catch { font-size:<?php echo esc_attr($page_header_catch_font_size_mobile); ?>px; }
  #page_full_header .desc { font-size:<?php echo esc_attr($page_header_desc_font_size_mobile); ?>px; }
  #page_header_type2 .title { font-size:<?php echo esc_attr($page_header_type2_font_size_mobile); ?>px; }
  #article .post_content { font-size:<?php echo esc_attr($page_content_font_size_mobile); ?>px; }
}
<?php

       // LPページ --------------------------------------------------------------------
       if(is_page_template('page-lp.php')) {
         $lp_content = get_post_meta( $post->ID, 'lp_content', true );
         if ( $lp_content && is_array( $lp_content ) ) :
           foreach( $lp_content as $key => $content ) :
             // 画像コンテンツ -----------------------------------------------------------------
             if ( ($content['cb_content_select'] == 'image_content') && $content['show_content']) {

               $headline_font_size = $content['headline_font_size'] ?  $content['headline_font_size'] : '28';
               $headline_font_size_mobile = $content['headline_font_size_mobile'] ?  $content['headline_font_size_mobile'] : '20';
               $sub_headline_font_size = $content['sub_headline_font_size'] ?  $content['sub_headline_font_size'] : '14';
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'] ?  $content['sub_headline_font_size_mobile'] : '12';

               $desc_font_size = $content['desc_font_size'] ?  $content['desc_font_size'] : '16';
               $desc_font_size_mobile = $content['desc_font_size_mobile'] ?  $content['desc_font_size_mobile'] : '14';

               $top_space = $content['top_space'];
               $top_space_mobile = $content['top_space_mobile'];
               $bottom_space = $content['bottom_space'];
               $bottom_space_mobile = $content['bottom_space_mobile'];

               $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
               $button_bg_color = $options['main_color'];
               $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : $options['main_color'];
               $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
               $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
               $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];

               $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
               $icon_image_use_retina = $options['headline_icon_image_retina'];
               $show_icon = $content['headline_show_icon'];
               if($icon_image && $show_icon){
                 $icon_image_width = $icon_image[1];
                 $icon_image_height = $icon_image[2];
                 if($icon_image_use_retina){
                   $icon_image_width = round($icon_image[1] / 2);
                   $icon_image_height = round($icon_image[2] / 2);
                 }
                 $margin_top = round($icon_image_height / 2);
                 $icon_image_width_mobile = round($icon_image_width * 0.8);
                 $margin_top_mobile = round($icon_image_height * 0.8 / 2);
               }
?>
.lp_image_content.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space); ?>px; padding-bottom:<?php echo esc_attr($bottom_space); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.lp_image_content.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.lp_image_content.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.lp_image_content.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size); ?>px; }
.lp_image_content.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size); ?>px; }
.lp_image_content.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size); ?>px; }
.lp_image_content.num<?php echo $key; ?> .link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.lp_image_content.num<?php echo $key; ?> .link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:<?php echo esc_attr($button_border_color); ?>; }
.lp_image_content.num<?php echo $key; ?> .link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; }
.lp_image_content.num<?php echo $key; ?> .link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.lp_image_content.num<?php echo $key; ?> .link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.lp_image_content.num<?php echo $key; ?> .link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
@media screen and (max-width:750px) {
  .lp_image_content.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space_mobile); ?>px; padding-bottom:<?php echo esc_attr($bottom_space_mobile); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  .lp_image_content.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .lp_image_content.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .lp_image_content.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size_mobile); ?>px; }
  .lp_image_content.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size_mobile); ?>px; }
  .lp_image_content.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size_mobile); ?>px; }
}
<?php
             // デザインコンテンツ -----------------------------------------------------------------
             } elseif ( ($content['cb_content_select'] == 'design_content') && $content['show_content']) {

               $headline_font_size = $content['headline_font_size'] ?  $content['headline_font_size'] : '28';
               $headline_font_size_mobile = $content['headline_font_size_mobile'] ?  $content['headline_font_size_mobile'] : '20';
               $sub_headline_font_size = $content['sub_headline_font_size'] ?  $content['sub_headline_font_size'] : '14';
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'] ?  $content['sub_headline_font_size_mobile'] : '12';

               $desc_font_size = $content['desc_font_size'] ?  $content['desc_font_size'] : '16';
               $desc_font_size_mobile = $content['desc_font_size_mobile'] ?  $content['desc_font_size_mobile'] : '14';

               $top_space = $content['top_space'];
               $top_space_mobile = $content['top_space_mobile'];
               $bottom_space = $content['bottom_space'];
               $bottom_space_mobile = $content['bottom_space_mobile'];

               $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
               $button_bg_color = $options['main_color'];
               $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : $options['main_color'];
               $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
               $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
               $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];

               $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
               $icon_image_use_retina = $options['headline_icon_image_retina'];
               $show_icon = $content['headline_show_icon'];
               if($icon_image && $show_icon){
                 $icon_image_width = $icon_image[1];
                 $icon_image_height = $icon_image[2];
                 if($icon_image_use_retina){
                   $icon_image_width = round($icon_image[1] / 2);
                   $icon_image_height = round($icon_image[2] / 2);
                 }
                 $margin_top = round($icon_image_height / 2);
                 $icon_image_width_mobile = round($icon_image_width * 0.8);
                 $margin_top_mobile = round($icon_image_height * 0.8 / 2);
               }
?>
.lp_design_content.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space); ?>px; padding-bottom:<?php echo esc_attr($bottom_space); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.lp_design_content.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.lp_design_content.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.lp_design_content.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size); ?>px; }
.lp_design_content.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size); ?>px; }
.lp_design_content.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size); ?>px; }
.lp_design_content.num<?php echo $key; ?> .link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.lp_design_content.num<?php echo $key; ?> .link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:<?php echo esc_attr($button_border_color); ?>; }
.lp_design_content.num<?php echo $key; ?> .link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; }
.lp_design_content.num<?php echo $key; ?> .link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.lp_design_content.num<?php echo $key; ?> .link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
.lp_design_content.num<?php echo $key; ?> .link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:<?php echo esc_attr($button_border_color_hover); ?>; }
@media screen and (max-width:750px) {
  .lp_design_content.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space_mobile); ?>px; padding-bottom:<?php echo esc_attr($bottom_space_mobile); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  .lp_design_content.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .lp_design_content.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .lp_design_content.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size_mobile); ?>px; }
  .lp_design_content.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size_mobile); ?>px; }
  .lp_design_content.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size_mobile); ?>px; }
}
<?php
             // レイヤー画像コンテンツ -----------------------------------------------------------------
             } elseif ( ($content['cb_content_select'] == 'layer_image_content') && $content['show_content']) {

               $catch_font_size = $content['catch_font_size'] ?  $content['catch_font_size'] : '24';
               $catch_font_size_mobile = $content['catch_font_size_mobile'] ?  $content['catch_font_size_mobile'] : '20';
               $catch_font_color = $content['catch_font_color'] ?  $content['catch_font_color'] : '#ffffff';

               $desc_font_size = $content['desc_font_size'] ?  $content['desc_font_size'] : '16';
               $desc_font_size_mobile = $content['desc_font_size_mobile'] ?  $content['desc_font_size_mobile'] : '14';
               $desc_font_color = $content['desc_font_color'] ?  $content['desc_font_color'] : '#ffffff';

               $button_font_color = ($content['button_animation_type'] != 'type1') ? $content['button_font_color'] : '#ffffff';
               $button_bg_color = $options['main_color'];
               $button_border_color = ($content['button_animation_type'] != 'type1') ? $content['button_border_color'] : '#ffffff';
               $button_border_color_opacity = isset($content['button_border_color_opacity']) ?  $content['button_border_color_opacity'] : '1';
               $button_font_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_font_color_hover'] : '#ffffff';
               $button_bg_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_bg_color_hover'] : $options['sub_color'];
               $button_border_color_hover = ($content['button_animation_type'] != 'type1') ? $content['button_border_color_hover'] : $options['sub_color'];
               $button_border_color_hover_opacity = isset($content['button_border_color_hover_opacity']) ?  $content['button_border_color_hover_opacity'] : '1';
               $button_border_color = hex2rgb($button_border_color);
               $button_border_color = implode(",",$button_border_color);
               $button_border_color_hover = hex2rgb($button_border_color_hover);
               $button_border_color_hover = implode(",",$button_border_color_hover);

               if($content['image_blur'] == 'no_blur'){
                 $image_blur = "0";
               } else {
                 $image_blur = $content['image_blur'] ?  $content['image_blur'] : '0';
               }
               $content_height = $content['content_height'] ?  $content['content_height'] : '600';
               $content_height_mobile = $content['content_height_mobile'] ?  $content['content_height_mobile'] : '450';
?>
.layer_image_content.num<?php echo $key; ?> { height:<?php echo esc_html($content_height); ?>px; }
.layer_image_content.num<?php echo $key; ?> .catch { font-size:<?php echo esc_html($catch_font_size); ?>px; color:<?php echo esc_html($catch_font_color); ?>; }
.layer_image_content.num<?php echo $key; ?> .desc { font-size:<?php echo esc_html($desc_font_size); ?>px; color:<?php echo esc_html($desc_font_color); ?>; }
.layer_image_content.num<?php echo $key; ?> .link_button a:before { background:<?php echo esc_attr($button_bg_color_hover); ?>; }
.layer_image_content.num<?php echo $key; ?> .link_button a { color:<?php echo esc_html($button_font_color); ?>; border-color:rgba(<?php echo esc_attr($button_border_color); ?>,<?php echo esc_attr($button_border_color_opacity); ?>); }
.layer_image_content.num<?php echo $key; ?> .link_button a.button_animation_type1 { background:<?php echo esc_html($button_bg_color); ?>; border:none; }
.layer_image_content.num<?php echo $key; ?> .link_button a.button_animation_type1:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; background:<?php echo esc_attr($button_bg_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($button_border_color_hover_opacity); ?>); }
.layer_image_content.num<?php echo $key; ?> .link_button a.button_animation_type2:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($button_border_color_hover_opacity); ?>); }
.layer_image_content.num<?php echo $key; ?> .link_button a.button_animation_type3:hover { color:<?php echo esc_attr($button_font_color_hover); ?>; border-color:rgba(<?php echo esc_attr($button_border_color_hover); ?>,<?php echo esc_attr($button_border_color_hover_opacity); ?>); }
.layer_image_content.num<?php echo $key; ?> .bg_image { filter:blur(<?php echo esc_attr($image_blur); ?>px); margin:-<?php echo esc_attr($image_blur*2); ?>px; width:calc(100% + <?php echo esc_attr($image_blur*4); ?>px); height:calc(100% + <?php echo esc_attr($image_blur*4); ?>px); }
@media screen and (max-width:750px) {
  .layer_image_content.num<?php echo $key; ?> { height:<?php echo esc_html($content_height_mobile); ?>px; }
  .layer_image_content.num<?php echo $key; ?> .catch { font-size:<?php echo esc_html($catch_font_size_mobile); ?>px; }
  .layer_image_content.num<?php echo $key; ?> .desc { font-size:<?php echo esc_html($desc_font_size_mobile); ?>px; }
}
<?php
             // FAQ -----------------------------------------------------------------
             } elseif ( ($content['cb_content_select'] == 'faq') && $content['show_content']) {

               $headline_font_size = $content['headline_font_size'] ?  $content['headline_font_size'] : '28';
               $headline_font_size_mobile = $content['headline_font_size_mobile'] ?  $content['headline_font_size_mobile'] : '20';
               $sub_headline_font_size = $content['sub_headline_font_size'] ?  $content['sub_headline_font_size'] : '14';
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'] ?  $content['sub_headline_font_size_mobile'] : '12';

               $desc_font_size = $content['desc_font_size'] ?  $content['desc_font_size'] : '16';
               $desc_font_size_mobile = $content['desc_font_size_mobile'] ?  $content['desc_font_size_mobile'] : '14';

               $top_space = $content['top_space'];
               $top_space_mobile = $content['top_space_mobile'];
               $bottom_space = $content['bottom_space'];
               $bottom_space_mobile = $content['bottom_space_mobile'];

               $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
               $icon_image_use_retina = $options['headline_icon_image_retina'];
               $show_icon = $content['headline_show_icon'];
               if($icon_image && $show_icon){
                 $icon_image_width = $icon_image[1];
                 $icon_image_height = $icon_image[2];
                 if($icon_image_use_retina){
                   $icon_image_width = round($icon_image[1] / 2);
                   $icon_image_height = round($icon_image[2] / 2);
                 }
                 $margin_top = round($icon_image_height / 2);
                 $icon_image_width_mobile = round($icon_image_width * 0.8);
                 $margin_top_mobile = round($icon_image_height * 0.8 / 2);
               }

               $question_font_size = $content['question_font_size'] ?  $content['question_font_size'] : '20';
               $question_font_size_mobile = $content['question_font_size_mobile'] ?  $content['question_font_size_mobile'] : '18';
               $answer_font_size = $content['answer_font_size'] ?  $content['answer_font_size'] : '16';
               $answer_font_size_mobile = $content['answer_font_size_mobile'] ?  $content['answer_font_size_mobile'] : '14';
               $item_active_color = ($content['item_active_color_use_main'] != 1) ? $content['item_active_color'] : $options['main_color'];
?>
.lp_faq.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space); ?>px; padding-bottom:<?php echo esc_attr($bottom_space); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.lp_faq.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.lp_faq.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size); ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size); ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size); ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .faq_list .question { font-size:<?php echo esc_attr($question_font_size); ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .faq_list .answer { font-size:<?php echo esc_attr($answer_font_size); ?>px; }
.lp_faq.num<?php echo esc_attr($key); ?> .faq_list .question:hover { color:<?php echo esc_attr($item_active_color); ?>; }
.lp_faq.num<?php echo esc_attr($key); ?> .faq_list .question.active { color:<?php echo esc_attr($item_active_color); ?>; }
@media screen and (max-width:750px) {
  .lp_faq.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space_mobile); ?>px; padding-bottom:<?php echo esc_attr($bottom_space_mobile); ?>px;  }
  <?php if($icon_image && $show_icon){ ?>
  .lp_faq.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .lp_faq.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .lp_faq.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size_mobile); ?>px; }
  .lp_faq.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size_mobile); ?>px; }
  .lp_faq.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size_mobile); ?>px; }
  .lp_faq.num<?php echo esc_attr($key); ?> .faq_list .question { font-size:<?php echo esc_attr($question_font_size_mobile); ?>px; }
  .lp_faq.num<?php echo esc_attr($key); ?> .faq_list .answer { font-size:<?php echo esc_attr($answer_font_size_mobile); ?>px; }
}
<?php
             // フリースペース -----------------------------------------------------------------
             } elseif ( ($content['cb_content_select'] == 'free_space') && $content['show_content']) {

               $headline_font_size = $content['headline_font_size'] ?  $content['headline_font_size'] : '28';
               $headline_font_size_mobile = $content['headline_font_size_mobile'] ?  $content['headline_font_size_mobile'] : '20';
               $sub_headline_font_size = $content['sub_headline_font_size'] ?  $content['sub_headline_font_size'] : '14';
               $sub_headline_font_size_mobile = $content['sub_headline_font_size_mobile'] ?  $content['sub_headline_font_size_mobile'] : '12';

               $desc_font_size = $content['desc_font_size'] ?  $content['desc_font_size'] : '16';
               $desc_font_size_mobile = $content['desc_font_size_mobile'] ?  $content['desc_font_size_mobile'] : '14';

               $top_space = $content['top_space'];
               $top_space_mobile = $content['top_space_mobile'];
               $bottom_space = $content['bottom_space'];
               $bottom_space_mobile = $content['bottom_space_mobile'];

               $icon_image = wp_get_attachment_image_src( $options['headline_icon_image'], 'full' );
               $icon_image_use_retina = $options['headline_icon_image_retina'];
               $show_icon = $content['headline_show_icon'];
               if($icon_image && $show_icon){
                 $icon_image_width = $icon_image[1];
                 $icon_image_height = $icon_image[2];
                 if($icon_image_use_retina){
                   $icon_image_width = round($icon_image[1] / 2);
                   $icon_image_height = round($icon_image[2] / 2);
                 }
                 $margin_top = round($icon_image_height / 2);
                 $icon_image_width_mobile = round($icon_image_width * 0.8);
                 $margin_top_mobile = round($icon_image_height * 0.8 / 2);
               }
?>
.lp_free_space.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space); ?>px; padding-bottom:<?php echo esc_attr($bottom_space); ?>px; }
<?php if($icon_image && $show_icon){ ?>
.lp_free_space.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top; ?>px; }
.lp_free_space.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width; ?>px; height:auto; }
<?php }; ?>
.lp_free_space.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size); ?>px; }
.lp_free_space.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size); ?>px; }
.lp_free_space.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size); ?>px; }
@media screen and (max-width:750px) {
  .lp_free_space.num<?php echo esc_attr($key); ?> .lp_content_inner { padding-top:<?php echo esc_attr($top_space_mobile); ?>px; padding-bottom:<?php echo esc_attr($bottom_space_mobile); ?>px; }
  <?php if($icon_image && $show_icon){ ?>
  .lp_free_space.num<?php echo esc_attr($key); ?> .design_headline { margin-top:-<?php echo $margin_top_mobile; ?>px; }
  .lp_free_space.num<?php echo esc_attr($key); ?> .design_headline img { width:<?php echo $icon_image_width_mobile; ?>px; height:auto; }
  <?php }; ?>
  .lp_free_space.num<?php echo esc_attr($key); ?> .design_headline .title { font-size:<?php echo esc_attr($headline_font_size_mobile); ?>px; }
  .lp_free_space.num<?php echo esc_attr($key); ?> .design_headline .sub_title { font-size:<?php echo esc_attr($sub_headline_font_size_mobile); ?>px; }
  .lp_free_space.num<?php echo esc_attr($key); ?> .desc { font-size:<?php echo esc_attr($desc_font_size_mobile); ?>px; }
}
<?php
             }
           endforeach;
         endif;
       } // END LPページ
?>
<?php

     // 404ページ -----------------------------------------------------------------------------
     } elseif( is_404()) {
       $title_font_size_pc = ( ! empty( $options['header_txt_size_404'] ) ) ? $options['header_txt_size_404'] : 38;
       $sub_title_font_size_pc = ( ! empty( $options['header_sub_txt_size_404'] ) ) ? $options['header_sub_txt_size_404'] : 16;
       $title_font_size_mobile = ( ! empty( $options['header_txt_size_404_mobile'] ) ) ? $options['header_txt_size_404_mobile'] : 28;
       $sub_title_font_size_mobile = ( ! empty( $options['header_sub_txt_size_404_mobile'] ) ) ? $options['header_sub_txt_size_404_mobile'] : 14;
?>
#page_404_header .catch { font-size:<?php echo esc_html($title_font_size_pc); ?>px; }
#page_404_header .desc { font-size:<?php echo esc_html($sub_title_font_size_pc); ?>px; }
@media screen and (max-width:750px) {
  #page_404_header .catch { font-size:<?php echo esc_html($title_font_size_mobile); ?>px; }
  #page_404_header .desc { font-size:<?php echo esc_html($sub_title_font_size_mobile); ?>px; }
}
<?php
     }; //END page setting

     // カスタムCSS --------------------------------------------
     if(is_single() || is_page()) {
       global $post;
       $custom_css = get_post_meta($post->ID, 'custom_css', true);
       if($custom_css) {
         echo $custom_css;
       };
     }

     // ロード画面 -----------------------------------------
     get_template_part('functions/loader');
     if($options['load_icon'] == 'type4' || $options['load_icon'] == 'type5'){
?>
#site_loader_logo_inner .message { font-size:<?php echo esc_html($options['loading_message_font_size']); ?>px; color:<?php echo esc_html($options['loading_message_color']); ?>; }
#site_loader_logo_inner i { background:<?php echo esc_html($options['loading_message_color']); ?>; }
<?php
     if($options['load_icon'] == 'type5'){
       $load_type5_catch_font_size_middle = ($options['load_type5_catch_font_size'] + $options['load_type5_catch_font_size_sp']) / 2;
?>
#site_loader_logo_inner .catch { font-size:<?php echo esc_html($options['load_type5_catch_font_size']); ?>px; color:<?php echo esc_html($options['load_type5_catch_color']); ?>; }
@media screen and (max-width:1100px) {
  #site_loader_logo_inner .catch { font-size:<?php echo esc_attr(ceil($load_type5_catch_font_size_middle)); ?>px; }
}
<?php }; ?>
@media screen and (max-width:750px) {
  #site_loader_logo_inner .message { font-size:<?php echo esc_html($options['loading_message_font_size_sp']); ?>px; }
  <?php if($options['load_icon'] == 'type5'){ ?>
  #site_loader_logo_inner .catch { font-size:<?php echo esc_html($options['load_type5_catch_font_size_sp']); ?>px; }
  <?php }; ?>
}
<?php
     };

     //フッターバー --------------------------------------------
     if(is_mobile()) {
       if($options['footer_bar_type'] == 'type1' && $options['footer_bar_display'] != 'type3'){
         $footer_bar_border_color = hex2rgb($options['footer_bar_border_color']);
         $footer_bar_border_color = implode(",",$footer_bar_border_color);
?>
#dp-footer-bar { background:<?php echo esc_attr($options['footer_bar_bg_color']); ?>; color:<?php echo esc_html($options['footer_bar_font_color']); ?>; }
.dp-footer-bar-item a { border-color:rgba(<?php echo esc_attr($footer_bar_border_color); ?>,<?php echo esc_html($options['footer_bar_border_color_opacity']); ?>); color:<?php echo esc_html($options['footer_bar_font_color']); ?>; }
.dp-footer-bar-item a:hover { border-color:<?php echo esc_html($options['footer_bar_bg_color_hover']); ?>; background:<?php echo esc_html($options['footer_bar_bg_color_hover']); ?>; }
<?php
       } elseif($options['footer_bar_type'] == 'type2' && $options['footer_bar_display'] != 'type3'){
         for($i = 1; $i <= 2; $i++) {
           if($options['show_footer_button'.$i]) {
             $footer_button_bg_color = ($options['footer_button_bg_color_use_main'.$i] != 1) ? $options['footer_button_bg_color'.$i] : $options['main_color'];
             $footer_button_bg_color_hover = ($options['footer_button_bg_color_hover_use_sub'.$i] != 1) ? $options['footer_button_bg_color_hover'.$i] : $options['sub_color'];
?>
#dp-footer-bar a.footer_button.num<?php echo $i; ?> { font-size:<?php echo esc_attr($options['footer_button_font_size']); ?>px; color:<?php echo esc_attr($options['footer_button_font_color'.$i]); ?>; background:<?php echo esc_attr($footer_button_bg_color); ?>; }
#dp-footer-bar a.footer_button.num<?php echo $i; ?>:hover { background:<?php echo esc_attr($footer_button_bg_color_hover); ?>; }
<?php
           }
         };
       };
     };
?>
</style>

<?php
     // JavaScriptの設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

     // トップページ
     if(is_front_page()) {

       $index_slider = '';
       $display_header_content = '';

       if(!is_mobile() && $options['show_index_slider']) {
         $index_slider = $options['index_slider'];
         $display_header_content = 'show';
         $device = '';
       } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type2') ) {
         $index_slider = $options['mobile_index_slider'];
         $display_header_content = 'show';
         $device = 'mobile_';
       } elseif(is_mobile() && ($options['mobile_show_index_slider'] == 'type1') ) {
         $index_slider = $options['index_slider'];
         $display_header_content = 'show';
         $device = '';
       }

       if($display_header_content == 'show'){
         wp_enqueue_style('slick-style', get_template_directory_uri() . '/js/slick.css', '', '1.0.0');
         wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '1.0.0', true);
         $index_slider_time = $options[$device . 'index_slider_time'];
         if($options['show_load_screen'] == 'type1'){
?>
<script type="text/javascript">
jQuery(document).ready(function($){
<?php get_template_part('functions/slider_ini'); ?>
});
</script>
<?php
         };
       }; // END $display_header_content

?>
<script type="text/javascript">
jQuery(document).ready(function($){

  <?php // 矢印メッセージ ------------------------------- ?>
  $("#main_contents_link").off('click');
  $("#main_contents_link").on('click',function() {
    var myHref= $(this).attr("href");
    if($("html").hasClass("mobile") && $("body").hasClass("use_mobile_header_fix")) {
      var myPos = $(myHref).offset().top - 60;
    } else if($("html").hasClass("mobile")) {
      var myPos = $(myHref).offset().top;
    } else if($("body").hasClass("use_header_fix")) {
      var myPos = $(myHref).offset().top - 80;
    } else {
      var myPos = $(myHref).offset().top;
    }
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });

  <?php
       // 画像カルーセル ----------------------------------------
       if($options['show_image_carousel']){
         $image_carousel = $options['image_carousel'];
         if(!empty($image_carousel)){
  ?>
  var winW = $(window).width();
  $('#index_image_carousel .item').each(function () {
    $(this).css('width', (winW / 3) );
  });
  $(window).on('resize', function(){
    var winW = $(window).width();
    $('#index_image_carousel .item').each(function () {
      $(this).css('width', (winW / 3) );
    });
  });
  <?php
        $total = count($image_carousel);
        if($total > 4){
          wp_enqueue_style('slick-style', get_template_directory_uri() . '/js/slick.css', '', '1.0.0');
          wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '1.0.0', true);
  ?>
  $('#index_image_carousel').slick({
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    speed: 12000,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    pauseOnHover: false,
  });
  <?php }; }; }; ?>

  <?php
       // コンテンツビルダー
       if ($options['contents_builder'] || $options['mobile_contents_builder']) :
         $dc_flag = false;
         $gallery_flag = false;
         if(is_mobile() && ($options['mobile_index_content_type'] == 'type2') ) {
           $contents_builder = $options['mobile_contents_builder'];
         } else {
           $contents_builder = $options['contents_builder'];
         }
         foreach($contents_builder as $content) :
           // デザインコンテンツ
           if ( $content['cb_content_select'] == 'design_content' && $content['show_content'] && $content['show_news'] && ($dc_flag == false) ) {
             wp_enqueue_style('slick-style', get_template_directory_uri() . '/js/slick.css', '', '1.0.0');
             wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '1.0.0', true);
             $dc_flag = true;
  ?>

  if( $('.design_content .news_ticker').length ){
    $('.design_content .news_ticker').slick({
      infinite: true,
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      swipeToSlide: false,
      adaptiveHeight: false,
      pauseOnHover: true,
      autoplay: true,
      fade: false,
      vertical: true,
      easing: 'easeOutExpo',
      speed: 700,
      autoplaySpeed: 5000
    });
  };

  <?php
           // ギャラリー一覧
           } elseif ( $content['cb_content_select'] == 'gallery_list' && $content['show_content'] && ($gallery_flag == false)) {
             $gallery_flag = true;
  ?>

  <?php
       // ソート機能
       if($content['show_category_sort_button']){
  ?>
  $('.gallery_category_sort_button a[href^="#"]').on('click',function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).parent().siblings().removeClass('active');
    $(this).parent().addClass('active');
    var gallery_category_id = $(this).attr('data-gallery-category');
    if(gallery_category_id){
      $('.index_gallery_list .gallery_list').find('.item').removeClass('animate').removeAttr('style');
      $('.index_gallery_list .gallery_list_wrap').removeClass('active');
      $(gallery_category_id).addClass('active');
      $(gallery_category_id).find(".item").each(function(i){
        $(this).delay(i *300).queue(function(next) {
          $(this).addClass('animate');
          next();
        });
      });
    }
  });
  <?php }; ?>

  <?php
       // AJAXロード
  ?>
  var offsetPost = '',
      catid = '',
      flag = false;

  $(document).on("click", ".entry-more", function() {

    offsetPost = Number($(this).attr('data-offset-post'));
    catid = $(this).data('catid');
    current_button = $(this);

    if (!flag) {
      entry_loading = current_button.closest('.gallery_list_wrap').find('.entry-loading');
      gallery_list = current_button.closest('.gallery_list_wrap').find('.gallery_list');
      current_button.addClass("is-hide");
      entry_loading.addClass("is-show");
      flag = true;
      $.ajax({
        type: "POST",
        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
        data: {
          action: 'get_gellery_items',
          offset_post_num: offsetPost,
          post_cat_id: catid
        },
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        if (data.html) {
          gallery_list.append(data.html);
          $(".ajax_item",gallery_list).each(function(i) {
            $(this).css('opacity','0').show();
            $(this).delay(i * 300).queue(function(next) {
              $(this).addClass('animate').fadeIn();
              $(this).removeClass('ajax_item');
              next();
            });
          });
        }

        entry_loading.removeClass("is-show");

        if (data.remain) {
          current_button.removeClass("is-hide");
        }

        offsetPost += 4;
        current_button.attr('data-offset-post',offsetPost);
        flag = false;
      }).fail(function(jqXHR, textStatus, errorThrown) {
        entry_loading.removeClass("is-show");
        console.log('fail loading');
      });
    }
  });

  <?php
         };
         endforeach;
       endif; // END コンテンツビルダーここまで
  ?>

});
</script>
<?php
     }; // END front page

     // 固定ページ ----------------------------------------------------------
     if(is_page()) {
       global $post;
       $page_hide_footer = get_post_meta($post->ID, 'page_hide_footer', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  $(window).on('scroll load', function(i) {
    var scTop = $(this).scrollTop();
    var scBottom = scTop + $(this).height();
    $('.inview').each( function(i) {
      var thisPos = $(this).offset().top + 100;
      if ( thisPos < scBottom ) {
        $(this).addClass('animate');
      }
    });
    $('.inview_group').each( function(i) {
      var thisPos = $(this).offset().top + 100;
      if ( thisPos < scBottom ) {
        $(".animate_item",this).each(function(i){
          $(this).delay(i * 300).queue(function(next) {
            $(this).addClass('animate');
            next();
          });
        });
      }
    });
    <?php if($page_hide_footer){ ?>
    var docHeight = $(document).innerHeight();
    var windowHeight = $(this).innerHeight();
    var pageBottom = docHeight - windowHeight;
    if(pageBottom <= scTop + 200) {
      $('.inview').each( function(i) {
        $(this).addClass('animate');
      });
    }
    <?php }; ?>
  });

  <?php
       // 全画面ヘッダー
       $page_header_type = get_post_meta($post->ID, 'page_header_type', true) ?  get_post_meta($post->ID, 'page_header_type', true) : 'type1';
       if($page_header_type == 'type2'){
  ?>
  var winH = $(window).innerHeight();
  $('#page_full_header').css('height', winH);
  $(window).on('resize', function(){
    var winH = $(window).innerHeight();
    $('#page_full_header').css('height', winH);
  });

  $("#page_full_header .animate_item").each(function(i){
    $(this).delay(i * 600).queue(function(next) {
      $(this).addClass('animate');
      next();
    });
  });

  $("#lp_contents_link").off('click');
  $("#lp_contents_link").on('click',function() {
    var myHref= $(this).attr("href");
    var myPos = $(myHref).offset().top;
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });
  <?php }; ?>

});
</script>
<?php
     };

     // メガメニュー　スライダー ------------------------------------------------------------
     wp_enqueue_style('slick-style', get_template_directory_uri() . '/js/slick.css', '', '1.0.0');
     wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '1.0.0', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  if( $('.megamenu_slider').length ){
    $('.megamenu_slider').slick({
      infinite: true,
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: false,
      pauseOnHover: false,
      autoplay: true,
      fade: false,
      easing: 'easeOutExpo',
      speed: 700,
      autoplaySpeed: 5000,
    });
  };

});
</script>
<?php
     // スライダーウィジェット --------------------
     if ( is_active_widget(false, false, 'post_slider_widget', true) ) {
       wp_enqueue_style('slick-style', get_template_directory_uri() . '/js/slick.css', '', '1.0.0');
       wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '1.0.0', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  if( $('.post_slider_widget').length ){
    $('.post_slider_widget .post_slider').slick({
      infinite: true,
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: false,
      pauseOnHover: false,
      autoplay: true,
      fade: false,
      easing: 'easeOutExpo',
      speed: 700,
      autoplaySpeed: 5000,
    });
  }

});
</script>
<?php
     } // スライダーウィジェット


     // ギャラリー詳細ページ -----------------------------------------------------------------------------
     if(is_singular('gallery')) {
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  $('#gallery_content, #gallery_featured_image').addClass('animate');

  var winH = $(window).innerHeight();
  var content_height = $('#gallery_content_inner').innerHeight();
  if ( winH < (content_height + 120) ) {
    $('body').addClass('change_gallery_height');
  } else {
    $('body').removeClass('change_gallery_height');
  };
  var timer = 0;
  $(window).on('resize', function(){
    if (timer > 0) {
      clearTimeout(timer);
    }
    timer = setTimeout(function () {
      var winH = $(window).innerHeight();
      var content_height = $('#gallery_content_inner').innerHeight();
      if ( winH < (content_height + 120) ) {
        $('body').addClass('change_gallery_height');
      } else {
        $('body').removeClass('change_gallery_height');
      };
    }, 200);
  });

});
</script>
<?php
     };

     // ギャラリーアーカイブページ -----------------------------------------------------------------------------
     if( (is_post_type_archive('gallery') && $options['archive_gallery_show_category_sort_button']) || (is_tax('gallery_category') && $options['archive_gallery_show_category_sort_button']) ) {
?>
<script type="text/javascript">
jQuery(document).ready(function($){

<?php if(is_post_type_archive('gallery')){ ?>
  // category sort
  $('.gallery_category_sort_button a[href^="#"]').on('click',function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).parent().siblings().removeClass('active');
    $(this).parent().addClass('active');
    var gallery_category_id = $(this).attr('data-gallery-category');
    if(gallery_category_id){
      $('#gallery_archive .gallery_list').find('.item').removeClass('animate').removeAttr('style');
      $('#gallery_archive .gallery_list_wrap').removeClass('active');
      $(gallery_category_id).addClass('active');
      $(gallery_category_id).find(".item").each(function(i){
        $(this).delay(i *300).queue(function(next) {
          $(this).addClass('animate');
          next();
        });
      });
    }
  });
<?php }; ?>

  // AJAX loading
  var offsetPost = '',
      catid = '',
      flag = false;

  $(document).on("click", ".entry-more", function() {

    offsetPost = Number($(this).attr('data-offset-post'));
    catid = $(this).data('catid');
    current_button = $(this);

    if (!flag) {
      entry_loading = current_button.closest('.gallery_list_wrap').find('.entry-loading');
      gallery_list = current_button.closest('.gallery_list_wrap').find('.gallery_list');
      current_button.addClass("is-hide");
      entry_loading.addClass("is-show");
      flag = true;
      $.ajax({
        type: "POST",
        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
        data: {
          action: 'get_gellery_items',
          offset_post_num: offsetPost,
          post_cat_id: catid
        },
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        if (data.html) {
          gallery_list.append(data.html);
          $(".ajax_item",gallery_list).each(function(i) {
            $(this).css('opacity','0').show();
            $(this).delay(i * 300).queue(function(next) {
              $(this).addClass('animate').fadeIn();
              $(this).removeClass('ajax_item');
              next();
            });
          });
        }

        entry_loading.removeClass("is-show");

        if (data.remain) {
          current_button.removeClass("is-hide");
        }

        offsetPost += 4;
        current_button.attr('data-offset-post',offsetPost);
        flag = false;
      }).fail(function(jqXHR, textStatus, errorThrown) {
        entry_loading.removeClass("is-show");
        console.log('fail loading');
      });
    }
  });

});
</script>
<?php
     };

     // LPページ --------------------------------------------------------------------
     if(is_page_template('page-lp.php')) {
       $page_hide_footer = get_post_meta($post->ID, 'page_hide_footer', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  <?php
       $lp_content = get_post_meta( $post->ID, 'lp_content', true );

       // 画像カルーセル
       if ( $lp_content && is_array( $lp_content ) ) :
         foreach( $lp_content as $key => $content ) :
           if ( ($content['cb_content_select'] == 'image_carousel') && $content['show_content']) {
             wp_enqueue_style('slick-style', get_template_directory_uri().'/js/slick.css', '', '1.0.0');
             wp_enqueue_script('slick-script', get_template_directory_uri().'/js/slick.min.js', '', '1.0.0', true);
             $data_list = isset($content['item_list']) ?  $content['item_list'] : '';
             if(!empty($data_list)){
  ?>
  var winW = $(window).width();
  $('.lp_image_carousel.num<?php echo esc_attr($key); ?> .item').each(function () {
    $(this).css('width', (winW / 3) );
  });
  $(window).on('resize', function(){
    var winW = $(window).width();
    $('.lp_image_carousel.num<?php echo esc_attr($key); ?> .item').each(function () {
      $(this).css('width', (winW / 3) );
    });
  });
  <?php
               $total = count($data_list);
               if($total > 4){
  ?>
  $('.lp_image_carousel.num<?php echo esc_attr($key); ?>').slick({
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    speed: 12000,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    pauseOnHover: false,
  });
  <?php
               }
             }
           }
         endforeach;
       endif;
  ?>

  $(window).bind('scroll load', function(i) {
    var scTop = $(this).scrollTop();
    var scBottom = scTop + $(this).height();
    $('.inview').each( function(i) {
      var thisPos = $(this).offset().top + 100;
      if ( thisPos < scBottom ) {
        $(this).addClass('animate');
        $(".animate_item",this).each(function(i){
          $(this).delay(i * 500).queue(function(next) {
            $(this).addClass('animate');
            next();
          });
        });
      }
    });
    <?php if($page_hide_footer){ ?>
    var docHeight = $(document).innerHeight();
    var windowHeight = $(this).innerHeight();
    var pageBottom = docHeight - windowHeight;
    if(pageBottom <= scTop) {
      $('.inview').each( function(i) {
        $(this).addClass('animate');
      });
    }
    <?php }; ?>
  });

  $('.faq_list .question').on('click', function() {
    $('.faq_list .question').not($(this)).removeClass('active');
    if( $(this).hasClass('active') ){
      $(this).removeClass('active');
    } else {
      $(this).addClass('active');
    }
    $(this).next('.answer').slideToggle(600 ,'easeOutExpo');
    $('.faq_list .answer').not($(this).next('.answer')).slideUp(600 ,'easeOutExpo');
  });


});
</script>
<?php
     };

     // フッターの動画 --------------------------------------------
     if( $options['footer_bg_type'] == 'type2' && !is_singular('gallery') && !(is_page() && get_post_meta($post->ID, 'page_hide_footer', true)) ) {
       $video = $options['footer_bg_video'];
       if(!empty($video)) {
         if (auto_play_movie()) {
?>
<script type="text/javascript">
(function($) {

  function footer_video_resize(){
    var winW = $(window).width();
    var footer_height = $('#footer_top').innerHeight();
    var footer_width = $(window).width();
    var video = $('#footer_video')[0];
    var video_width = video.videoWidth;
    var video_height = video.videoHeight;
    var scaleW = footer_width / video_width;
    var scaleH = footer_height / video_height;
    var fixScale = Math.max(scaleW, scaleH);
    var setW = video_width * fixScale;
    var setH = video_height * fixScale;
    var moveX = Math.floor((footer_width - setW) / 2);
    var moveY = Math.floor((footer_height - setH) / 2);
    $('#footer_video').css({
      'width': setW,
      'height': setH,
      'left' : moveX,
      'top' : moveY
    });
  }

  $(window).bind('load', function(){
    footer_video_resize();
  });

  $(window).on('resize', function(){
    footer_video_resize();
  });

})(jQuery);
</script>
<?php
         };
       };
     };

     // 404 --------------------------------------------
     if(is_404()) {
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  $('#page_404_header').addClass('animate');
  $("#page_404_button").off('click');
  $("#page_404_button").on('click',function() {
    var myHref= $(this).attr("href");
    var myPos = $(myHref).offset().top;
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });
  var winH = $(window).innerHeight();
  $('#page_404_header').css('height', winH);
  $(window).on('resize', function(){
    var winH = $(window).innerHeight();
    $('#page_404_header').css('height', winH);
  });
});
</script>
<?php
     };

     // カスタムスクリプト--------------------------------------------
     if($options['script_code']) {
       echo $options['script_code'];
     };
     if(is_single() || is_page()) {
       global $post;
       $custom_script = get_post_meta($post->ID, 'custom_script', true);
       if($custom_script) {
         echo $custom_script;
       };
     };
?>

<?php
     }; // END function tcd_head()
     add_action("wp_head", "tcd_head");
?>