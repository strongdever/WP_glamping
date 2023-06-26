<?php
/*
 * オプションの設定
 */


// hover effect
global $hover_type_options;
$hover_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Zoom in', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Zoom out', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Slide', 'tcd-w' )),
  'type4' => array('value' => 'type4','label' => __( 'Fade', 'tcd-w' )),
  'type5' => array('value' => 'type5','label' => __( 'No animation', 'tcd-w' ))
);
global $hover3_direct_options;
$hover3_direct_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Left to Right', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Right to Left', 'tcd-w' ))
);


//フォントタイプ
global $font_type_options;
$font_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Meiryo', 'tcd-w' ),'label_en' => 'Arial'),
  'type2' => array('value' => 'type2','label' => __( 'YuGothic', 'tcd-w' ),'label_en' => 'San Serif'),
  'type3' => array('value' => 'type3','label' => __( 'YuMincho', 'tcd-w' ),'label_en' => 'Times New Roman')
);


// ヘッダーの固定設定
global $header_fix_options;
$header_fix_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Normal position', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Fix at top after page scroll', 'tcd-w' )),
);
// ヘッダーの固定設定
global $header_fix_options2;
$header_fix_options2 = array(
  'type1' => array('value' => 'type1','label' => __( 'Normal header', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Fix logo area at top after page scroll', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Fix global menu at top after page scroll', 'tcd-w' )),
  'type4' => array('value' => 'type4','label' => __( 'Fix all header content at top after page scroll', 'tcd-w' ))
);


// レイアウトの設定
global $layout_options;
$layout_options = array(
 'type0' => array('value' => 'type0','label' => __( 'Use theme option setting', 'tcd-w' )),
 'type1' => array('value' => 'type1','label' => __( 'Don\'t display', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Display on right side', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Display on left side', 'tcd-w' )),
);


// ソーシャルボタンの設定
global $sns_type_options;
$sns_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Type1 (color)', 'tcd-w' ), 'img' => 'share_type1.jpg'),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Type2 (mono)', 'tcd-w' ), 'img' => 'share_type2.jpg'),
  'type3' => array( 'value' => 'type3', 'label' => __( 'Type3 (4 column - color)', 'tcd-w' ), 'img' => 'share_type3.jpg'),
  'type4' => array( 'value' => 'type4', 'label' => __( 'Type4 (4 column - mono)', 'tcd-w' ), 'img' => 'share_type4.jpg'),
  'type5' => array( 'value' => 'type5', 'label' => __( 'Type5 (official design)', 'tcd-w' ), 'img' => 'share_type5.jpg')
);


// ロード画面の表示設定
global $load_screen_options;
$load_screen_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Don\'t display load screen', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Display only on front page', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Display on front page and archive page', 'tcd-w' ))
);


// ローディングアイコンの種類の設定
global $load_icon_type;
$load_icon_type = array(
 'type1' => array('value' => 'type1','label' => __( 'Circle', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Square', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Dot', 'tcd-w' )),
 'type4' => array('value' => 'type4','label' => __( 'Logo', 'tcd-w' )),
 'type5' => array('value' => 'type5','label' => __( 'Catchphrase', 'tcd-w' ))
);


// フッターの固定メニュー 表示タイプ
global $footer_bar_display_options;
$footer_bar_display_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Fade In', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Slide In', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Hide', 'tcd-w' ))
);


// フッターの固定メニュー ボタンのタイプ
global $footer_bar_button_options;
$footer_bar_button_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Default', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Share', 'tcd-w' )),
  'type3' => array('value' => 'type3', 'label' => __( 'Telephone', 'tcd-w' ))
);


// フッターの固定メニューのアイコン
global $footer_bar_icon_options;
$footer_bar_icon_options = array(
  'twitter' => array('value' => 'twitter'),
  'facebook' => array('value' => 'facebook'),
  'instagram' => array('value' => 'instagram'),
  'youtube' => array('value' => 'youtube'),
  'line' => array('value' => 'line'),
  'heart' => array('value' => 'heart'),
  'star1' => array('value' => 'star1'),
  'list2' => array('value' => 'list2'),
  'fire' => array('value' => 'fire'),
  'bubble' => array('value' => 'bubble'),
  'bell' => array('value' => 'bell'),
  'cart' => array('value' => 'cart'),
  'user' => array('value' => 'user'),
  'map' => array('value' => 'map'),
  'film' => array('value' => 'film'),
  'camera' => array('value' => 'camera'),
  'news' => array('value' => 'news'),
  'office' => array('value' => 'office'),
  'home' => array('value' => 'home'),
  'help' => array('value' => 'help'),
  'light' => array('value' => 'light'),
  'menu' => array('value' => 'menu'),
  'grid' => array('value' => 'grid'),
  'search' => array('value' => 'search'),
  'tel' => array('value' => 'tel'),
  'calendar' => array('value' => 'calendar'),
  'mail' => array('value' => 'mail'),
  'pdf' => array('value' => 'pdf'),
  'pencil' => array('value' => 'pencil'),
  'clock' => array('value' => 'clock'),
);


// 記事タイプ
global $post_type_options;
$post_type_options = array(
  'recent_post' => array('value' => 'recent_post','label' => __( 'All post', 'tcd-w' )),
  'recommend_post' => array('value' => 'recommend_post','label' => __( 'Recommend post1', 'tcd-w' )),
  'recommend_post2' => array('value' => 'recommend_post2','label' => __( 'Recommend post2', 'tcd-w' )),
  'pickup_post' => array('value' => 'pickup_post','label' => __( 'Pickup post', 'tcd-w' ))
);


// 記事の並び順
global $post_type_order_options;
$post_type_order_options = array(
  'date1' => array('value' => 'date1','label' => __( 'Date (DESC)', 'tcd-w' )),
  'date2' => array('value' => 'date2','label' => __( 'Date (ASC)', 'tcd-w' )),
  'rand' => array('value' => 'rand','label' => __( 'Random', 'tcd-w' ))
);


// スライダーやロードアイコンで使用
global $time_options;
$time_options = array(
  '1000' => array('value' => '1000','label' => sprintf(__('%s second', 'tcd-w'), 1)),
  '2000' => array('value' => '2000','label' => sprintf(__('%s second', 'tcd-w'), 2)),
  '3000' => array('value' => '3000','label' => sprintf(__('%s second', 'tcd-w'), 3)),
  '4000' => array('value' => '4000','label' => sprintf(__('%s second', 'tcd-w'), 4)),
  '5000' => array('value' => '5000','label' => sprintf(__('%s second', 'tcd-w'), 5)),
  '6000' => array('value' => '6000','label' => sprintf(__('%s second', 'tcd-w'), 6)),
  '7000' => array('value' => '7000','label' => sprintf(__('%s second', 'tcd-w'), 7)),
  '8000' => array('value' => '8000','label' => sprintf(__('%s second', 'tcd-w'), 8)),
  '9000' => array('value' => '9000','label' => sprintf(__('%s second', 'tcd-w'), 9)),
  '10000' => array('value' => '10000','label' => sprintf(__('%s second', 'tcd-w'), 10)),
  '11000' => array('value' => '11000','label' => sprintf(__('%s second', 'tcd-w'), 11)),
  '12000' => array('value' => '12000','label' => sprintf(__('%s second', 'tcd-w'), 12)),
  '13000' => array('value' => '13000','label' => sprintf(__('%s second', 'tcd-w'), 13)),
  '14000' => array('value' => '14000','label' => sprintf(__('%s second', 'tcd-w'), 14)),
  '15000' => array('value' => '15000','label' => sprintf(__('%s second', 'tcd-w'), 15))
);


// ロゴに画像を使うか否か
global $logo_type_options;
$logo_type_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Use text for logo', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Use image for logo', 'tcd-w' ))
);


// フッターの固定コンテンツ
global $fixed_footer_content_type_options;
$fixed_footer_content_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Template', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Free space', 'tcd-w' ))
);


// Google Maps
global $gmap_marker_type_options;
$gmap_marker_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Use default marker', 'tcd-w' ), 'img' => 'gmap_marker_type1.jpg'),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Use custom marker', 'tcd-w' ), 'img' => 'gmap_marker_type2.jpg' )
);
global $gmap_custom_marker_type_options;
$gmap_custom_marker_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Text', 'tcd-w' ) ),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Image', 'tcd-w' ) )
);


// ページ分割ナビのタイプ
global $pagenation_type_options;
$pagenation_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Page numbers', 'tcd-w' ), 'img' => 'page_link_type1.jpg' ),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Read more button', 'tcd-w' ), 'img' => 'page_link_type2.jpg' )
);


// スライダーのアニメーション
global $slider_animation_options;
$slider_animation_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Zoom out', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Zoom in', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Move right', 'tcd-w' )),
  'type4' => array('value' => 'type4','label' => __( 'Move left', 'tcd-w' )),
  'type5' => array('value' => 'type5','label' => __( 'Move top', 'tcd-w' )),
  'type6' => array('value' => 'type6','label' => __( 'Move bottom', 'tcd-w' )),
  'type7' => array('value' => 'type7','label' => __( 'No animation', 'tcd-w' ))
);


// レイヤー画像のアニメーション
global $layer_image_animation_options;
$layer_image_animation_options = array(
  'type1' => array('value' => 'type1','label' => __( 'No animation', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Fade in', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Slide in', 'tcd-w' )),
);


// コンテンツの方向
global $content_direction_options;
$content_direction_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Align left', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Align center', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Align right', 'tcd-w' ))
);
// コンテンツの方向（縦方向）
global $content_direction_options2;
$content_direction_options2 = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Align top', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Align middle', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Align bottom', 'tcd-w' ))
);


// お知らせのno image設定
global $no_image_options;
$no_image_options = array(
  'display' => array('value' => 'display','label' => __( 'Display no image', 'tcd-w' )),
  'hide' => array('value' => 'hide','label' => __( 'Don\'t display no image', 'tcd-w' ))
);


// アイテムのタイプ
global $item_type_options;
$item_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Image', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Video', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Youtube', 'tcd-w' ))
);


// フッターコンテンツのタイプ
global $footer_content_type_options;
$footer_content_type_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Display footer button', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Display footer bar', 'tcd-w' ))
);


// スライダーのコンテンツタイプ
global $index_slider_content_type_options;
$index_slider_content_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Same as PC setting', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Display diffrent content in mobile size', 'tcd-w' )),
);


// スライダーのアイテムタイプ
global $slider_type_options;
$slider_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Image', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Video', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Youtube', 'tcd-w' )),
  'type4' => array('value' => 'type4','label' => __( 'Logo content', 'tcd-w' ))
);


// メガメニュー
global $megamenu_options;
$megamenu_options = array(
  'type1' => array('value' => 'type1', 'title' => __( 'Dropdown menu', 'tcd-w' ), 'label' => __( 'Dropdown menu', 'tcd-w' ), 'img' => 'megamenu1.jpg'),
  'type2' => array('value' => 'type2', 'title' => __( 'Mega menu A', 'tcd-w' ), 'label' => __( 'Mega menu A', 'tcd-w' ), 'img' => 'megamenu2.jpg'),
  'type3' => array('value' => 'type3', 'title' => __( 'Mega menu B', 'tcd-w' ), 'label' => __( 'Mega menu B', 'tcd-w' ), 'img' => 'megamenu3.jpg'),
  'type4' => array('value' => 'type4', 'title' => __( 'Mega menu C', 'tcd-w' ), 'label' => __( 'Mega menu C', 'tcd-w' ), 'img' => 'megamenu4.jpg'),
);


// パララックスの設定
global $para_options;
$para_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Use parallax effect', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Don\'t use parallax effect', 'tcd-w' ))
);


// サイトの説明文の表示設定
global $site_desc_options;
$site_desc_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Don\'t display site description', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Display only on front page', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Display on all page', 'tcd-w' ))
);


// クイックタグ カスタムボタンタイプ
global $qt_custom_button_type_options;
$qt_custom_button_type_options = array(
	'type1' => array(
		'value' => 'type1',
		'label' => __( 'Flat button', 'tcd-w' )
	),
	'type2' => array(
		'value' => 'type2',
		'label' => __( 'Rounded button', 'tcd-w' )
	),
	'type3' => array(
		'value' => 'type3',
		'label' => __( 'Oval button', 'tcd-w' )
	)
);


// クイックタグ カスタムボタンサイズ
global $qt_custom_button_size_options;
$qt_custom_button_size_options = array(
	'type1' => array(
		'value' => 'type1',
		'label' => __( 'Small size button - Width:130px Height:40px', 'tcd-w' )
	),
	'type2' => array(
		'value' => 'type2',
		'label' => __( 'Medium size button - Width:240px Height:60px', 'tcd-w' )
	),
	'type3' => array(
		'value' => 'type3',
		'label' => __( 'Large size button - Width:400px Height:70px', 'tcd-w' )
	)
);


// テキストの方向
global $text_align_options;
$text_align_options = array(
 'left' => array('value' => 'left', 'label' => __( 'Align left', 'tcd-w' )),
 'center' => array('value' => 'center', 'label' => __( 'Align center', 'tcd-w' )),
 'right' => array('value' => 'right', 'label' => __( 'Align right', 'tcd-w' ))
);


// テキストの方向2
global $text_direction_options;
$text_direction_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Display horizontally', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Display vertically', 'tcd-w' )),
);


// コンテンツの横幅
global $content_width_options;
$content_width_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Normal content width', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Full screen width', 'tcd-w' ))
);


// 見出しのアニメーションのタイプ
global $headline_animation_options;
$headline_animation_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Animate letter one by one', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Animate all words from bottom to upward', 'tcd-w' ))
);


// マーケティング関連 -------------------------------------------------------------------------------------------


// 記事下CTAのタイプ
global $cta_type_options;
$cta_type_options = array(
	'type1' => array( 
		'value' => 'type1', 
		'label' => __( 'Type1', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/cta1.jpg'
	),
	'type2' => array( 
		'value' => 'type2', 
		'label' => __( 'Type2', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/cta2.jpg'
	),
	'type3' => array( 
		'value' => 'type3', 
		'label' => __( 'Type3', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/cta3.jpg'
	),
);


// 記事下CTAタイプ2のレイアウト
global $cta_type3_layout_options;
$cta_type3_layout_options = array(
	'type1' => array( 
		'value' => 'type1', 
		'label' => __( 'Type1 (left: image, right: text)', 'tcd-w' ),
	),
	'type2' => array( 
		'value' => 'type2', 
		'label' => __( 'Type2 (left: text, right: image)', 'tcd-w' ),
	)
);


// 表示するCTAのセレクトボックス（記事下・フッター兼用）
global $cta_display_options;
$cta_display_options = array(
	1 => array( 
		'value' => 1, 
		'label' => 'CTA-A'
	),
	2 => array( 
		'value' => 2, 
		'label' => 'CTA-B'
	),
	3 => array( 
		'value' => 3, 
		'label' => 'CTA-C'
	),
	4 => array(
		'value' => 4,
		'label' => __( 'Random display', 'tcd-w' )
	),
	5 => array(
		'value' => 5,
		'label' => __( 'Hidden', 'tcd-w' )
	)
);


// フッターCTAのタイプ
global $footer_cta_type_options;
$footer_cta_type_options = array(
	'type1' => array(
		'value' => 'type1',
		'label' => __( 'Type1', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/footer_cta1.jpg'
	),
	'type2' => array(
		'value' => 'type2',
		'label' => __( 'Type2', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/footer_cta2.jpg'
	),
	'type3' => array(
		'value' => 'type3',
		'label' => __( 'Type3', 'tcd-w' ),
		'image' => get_template_directory_uri() . '/admin/img/footer_cta3.jpg'
	)
);



?>