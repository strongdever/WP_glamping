<?php
$options = get_design_plus_option();

function tcd_footer_cta_scripts() {

	wp_enqueue_script( 'muum-inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array( 'jquery' ), version_num(), true );
	wp_enqueue_script( 'muum-footer-cta', get_template_directory_uri() . '/js/footer-cta.js', array( 'jquery' ), version_num(), true );
	wp_enqueue_script( 'muum-admin-footer-cta', get_template_directory_uri() . '/admin/js/footer-cta.js', array( 'jquery' ), version_num(), true );
	wp_localize_script( 'muum-admin-footer-cta', 'tcd_footer_cta', array( 'admin_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => wp_create_nonce( 'tcd_footer_cta_nonce' ) ) );


}
if ( '5' !== $options['footer_cta_display'] ) {
	add_action( 'wp_enqueue_scripts', 'tcd_footer_cta_scripts' );
}

function tcd_admin_footer_cta_scripts() {

	wp_enqueue_script( 'muum-footer-cta', get_template_directory_uri() . '/admin/js/footer-cta.js', array( 'jquery' ), version_num(), true );
	wp_localize_script( 'muum-footer-cta', 'tcd_footer_cta', array( 'admin_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => wp_create_nonce( 'tcd_footer_cta_nonce' ), 'confirm_text' => __( 'Are you sure to reset these values?', 'tcd-w' ) ) );

}
add_action( 'admin_enqueue_scripts', 'tcd_admin_footer_cta_scripts' );

// インプレッション、クリック率、コンバージョン率の管理
function tcd_footer_cta_impression() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_footer_cta_nonce', 'security' );

	// 表示しているフッターCTAの番号
	$cta_index = $options['footer_cta_display'];

	// ランダム表示の場合、渡されたcta_indexを使用する
	if ( '4' === $cta_index ) {
		$cta_index = strval( intval( $_POST['cta_index'] ) );
	}

	// 表示しているフッターCTAのインプレッションとクリック数、コンバージョンを取得
	$cta_impression = get_option( 'tcd_footer_cta_impression' . $cta_index, 0 );
	$cta_click = get_option( 'tcd_footer_cta_click' . $cta_index, 0 );
	$cta_conversion = get_option( 'tcd_footer_cta_conversion' . $cta_index, 0 );

	// インプレッションのカウントを1増やす
	$cta_impression++;

	// クリック率の計算
	if ( 0 !== $cta_impression ) {
		$cta_ctr = floor( 10000 * $cta_click / $cta_impression ) / 100;
	} else {
		$cta_ctr = 0;
	}

	// コンバージョン率の計算
	if ( 0 !== $cta_impression ) {
		$cta_cvr = floor( 10000 * $cta_conversion / $cta_impression ) / 100;
	} else {
		$cta_cvr = 0;
	}

	// データを更新
	update_option( 'tcd_footer_cta_impression' . $cta_index, $cta_impression );
	update_option( 'tcd_footer_cta_ctr' . $cta_index, $cta_ctr );
	update_option( 'tcd_footer_cta_cvr' . $cta_index, $cta_cvr );

	die();
}
add_action( 'wp_ajax_tcd_footer_cta_impression', 'tcd_footer_cta_impression' );
add_action( 'wp_ajax_nopriv_tcd_footer_cta_impression', 'tcd_footer_cta_impression' );

// クリック数、クリック率、Cookie の管理
function tcd_footer_cta_click() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_footer_cta_nonce', 'security' );

	// 表示しているフッターCTAの番号
	$cta_index = $options['footer_cta_display'];

	// ランダム表示の場合、渡されたcta_indexを使用する
	if ( '4' === $cta_index ) {
		$cta_index = strval( intval( $_POST['cta_index'] ) );
	}

	// Cookie の上書き
	if ( isset( $_COOKIE['tcd_footer_cta'] ) ) {
		setcookie( 'tcd_footer_cta', '', time() - 3600, '/' );
	}

	// Cookie を30日間に設定
	setcookie( 'tcd_footer_cta', $cta_index, time() + 60*60*24*30, '/' );

	// 表示しているフッターCTAのインプレッションとクリック数を取得
	$cta_impression = get_option( 'tcd_footer_cta_impression' . $cta_index, 0 );
	$cta_click = get_option( 'tcd_footer_cta_click' . $cta_index, 0 );

	// 表示しているフッターCTAのクリック率(Click-through rate)
	$cta_ctr = get_option( 'tcd_footer_cta_ctr' . $cta_index, 0 );

	// クリック数のカウントを1増やす
	$cta_click++;

	// クリック率の計算
	if ( 0 !== $cta_impression ) {
		$cta_ctr = floor( 10000 * $cta_click / $cta_impression ) / 100;
	} else {
		$cta_ctr = 0;
	}

	// データを更新
	update_option( 'tcd_footer_cta_click' . $cta_index, $cta_click );
	update_option( 'tcd_footer_cta_ctr' . $cta_index, $cta_ctr );

	die();
}
add_action( 'wp_ajax_tcd_footer_cta_click', 'tcd_footer_cta_click' );
add_action( 'wp_ajax_nopriv_tcd_footer_cta_click', 'tcd_footer_cta_click' );

// コンバージョン、コンバージョン率の管理
function tcd_footer_cta_conversion() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_footer_cta_nonce', 'security' );

	if ( isset( $_COOKIE['tcd_footer_cta'] ) ) {
	
		// コンバージョンを計測するフッターCTAの番号
		$cta_index = strval( intval( $_COOKIE['tcd_footer_cta'] ) );
		
		// Cookie の削除
		setcookie( 'tcd_footer_cta', '', time() - 3600, '/' );

		// コンバージョンを計測するフッターCTAのインプレッション、コンバージョンを取得
		$cta_impression = get_option( 'tcd_footer_cta_impression' . $cta_index, 0 );
		$cta_conversion = get_option( 'tcd_footer_cta_conversion' . $cta_index, 0 );

		// コンバージョンのカウントを1増やす
		$cta_conversion++;
	}

	// コンバージョン率の計算 (Conversion Rate)
	if ( 0 !== $cta_impression ) {
		$cta_cvr = floor( 10000 * $cta_conversion / $cta_impression ) / 100;
	} else {
		$cta_cvr = 0;
	}

	// データを更新
	update_option( 'tcd_footer_cta_conversion' . $cta_index, $cta_conversion );
	update_option( 'tcd_footer_cta_cvr' . $cta_index, $cta_cvr );

	die();
}
add_action( 'wp_ajax_tcd_footer_cta_conversion', 'tcd_footer_cta_conversion' );
add_action( 'wp_ajax_nopriv_tcd_footer_cta_conversion', 'tcd_footer_cta_conversion' );

function tcd_footer_cta_reset() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_footer_cta_nonce', 'security' );

	// リセットするフッターCTAの番号
	$cta_index = strval( intval( $_POST['cta_index'] ) );

	// インプレッション、クリック数、クリック率をリセット
	update_option( 'tcd_footer_cta_impression' . $cta_index, 0 );
	update_option( 'tcd_footer_cta_click' . $cta_index, 0 );
	update_option( 'tcd_footer_cta_ctr' . $cta_index, 0 );
	update_option( 'tcd_footer_cta_conversion' . $cta_index, 0 );
	update_option( 'tcd_footer_cta_cvr' . $cta_index, 0 );

	die();
}
add_action( 'wp_ajax_tcd_footer_cta_reset', 'tcd_footer_cta_reset' );
add_action( 'wp_ajax_nopriv_tcd_footer_cta_reset', 'tcd_footer_cta_reset' );

// ランダム表示に使用するCTA配列を取得する
function get_footer_cta_in_random_display() {
	
	$options = get_design_plus_option();

	$cta_in_random_display = array();

	for ( $i = 1; $i <= 3; $i++) {
		if ( $options['footer_cta_random' . $i] ) {
			$cta_in_random_display[] = $i;
		}
	}

	return $cta_in_random_display;
}

// head 要素にフッターCTAのスタイルを書き出す
// スタイルを適用するクラスの先頭に .p-footer-cta--{$i} を置くことで、CTA-A?C全てのスタイルを書きだす
function add_footer_cta_styles() {

	$options = get_design_plus_option();
	//if ( '5' === $options['cta_display'] ) return;
?>
<?php echo '<style type="text/css">'. "\n"; ?>
<?php
     for ( $i = 1; $i <= 3; $i++ ) :
       if ( $options['footer_cta_type' . $i] == 'type1') :
         $catch_font_color = $options['footer_cta_type1_catch_font_color' . $i];
         $catch_font_size = $options['footer_cta_type1_catch_font_size' . $i];
         $catch_font_size_mobile = $options['footer_cta_type1_catch_font_size_mobile' . $i];
         $button_font_size = $options['footer_cta_type1_btn_font_size' . $i];
         $button_font_size_mobile = $options['footer_cta_type1_btn_font_size_mobile' . $i];
         $button_font_color = $options['footer_cta_type1_btn_font_color' . $i];
         $button_font_color_hover = $options['footer_cta_type1_btn_font_color_hover' . $i];
         $button_bg_color = $options['footer_cta_type1_btn_bg_color' . $i];
         $button_bg_color_hover = $options['footer_cta_type1_btn_bg_color_hover' . $i];
         $close_font_color = $options['footer_cta_type1_close_font_color' . $i];
         $close_font_color_hover = $options['footer_cta_type1_close_font_color_hover' . $i];
         $bg_color = hex2rgb($options['footer_cta_type1_bg_color' . $i]);
         $bg_color = implode(",",$bg_color);
         $bg_opacity = $options['footer_cta_type1_bg_opacity' . $i];
?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 { background:rgba(<?php echo esc_html($bg_color); ?>,<?php echo esc_html($bg_opacity); ?>); }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 .catch { color:<?php echo esc_html($catch_font_color); ?>; font-size:<?php echo esc_html($catch_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__btn { color:<?php echo esc_html($button_font_color); ?>; background:<?php echo esc_html($button_bg_color); ?>; font-size:<?php echo esc_html($button_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__btn:hover { color:<?php echo esc_html($button_font_color_hover); ?>; background:<?php echo esc_html($button_bg_color_hover); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__close:before { color:<?php echo esc_html($close_font_color); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__close:hover:before { color:<?php echo esc_html($close_font_color_hover); ?>; }
@media only screen and (max-width: 1050px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 .catch { font-size:<?php echo esc_html($catch_font_size_mobile); ?>px; }
}
@media only screen and (max-width: 750px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__btn { font-size:<?php echo esc_html($button_font_size_mobile); ?>px; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__btn:after { color:<?php echo esc_html($close_font_color); ?>; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type1 #js-footer-cta__btn:hover:after { color:<?php echo esc_html($close_font_color_hover); ?>; }
}
<?php
       elseif ( $options['footer_cta_type' . $i] == 'type2') :
         $catch_font_color = $options['footer_cta_type2_catch_font_color' . $i];
         $catch_font_size = $options['footer_cta_type2_catch_font_size' . $i];
         $catch_font_size_mobile = $options['footer_cta_type2_catch_font_size_mobile' . $i];
         $button_font_size = $options['footer_cta_type2_btn_font_size' . $i];
         $button_font_size_mobile = $options['footer_cta_type2_btn_font_size_mobile' . $i];
         $button_font_color = $options['footer_cta_type2_btn_font_color' . $i];
         $button_font_color_hover = $options['footer_cta_type2_btn_font_color_hover' . $i];
         $button_bg_color = $options['footer_cta_type2_btn_bg_color' . $i];
         $button_bg_color_hover = $options['footer_cta_type2_btn_bg_color_hover' . $i];
         $close_font_color = $options['footer_cta_type2_close_font_color' . $i];
         $close_font_color_hover = $options['footer_cta_type2_close_font_color_hover' . $i];
         $bg_color = hex2rgb($options['footer_cta_type2_bg_color' . $i]);
         $bg_color = implode(",",$bg_color);
         $bg_opacity = $options['footer_cta_type2_bg_opacity' . $i];
         $border_color = hex2rgb($options['footer_cta_type2_border_color' . $i]);
         $border_color = implode(",",$border_color);
         $border_color_opacity = $options['footer_cta_type2_border_opacity' . $i];
         $show_border = $options['footer_cta_type2_show_border' . $i];
?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 { background:rgba(<?php echo esc_html($bg_color); ?>,<?php echo esc_html($bg_opacity); ?>); <?php if($show_border){ ?>border-top:1px solid rgba(<?php echo esc_html($border_color); ?>,<?php echo esc_html($border_color_opacity); ?>);<?php }; ?> }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 .catch { color:<?php echo esc_html($catch_font_color); ?>; font-size:<?php echo esc_html($catch_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__btn { color:<?php echo esc_html($button_font_color); ?>; background:<?php echo esc_html($button_bg_color); ?>; font-size:<?php echo esc_html($button_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__btn:hover { color:<?php echo esc_html($button_font_color_hover); ?>; background:<?php echo esc_html($button_bg_color_hover); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__close:before { color:<?php echo esc_html($close_font_color); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__close:hover:before { color:<?php echo esc_html($close_font_color_hover); ?>; }
@media only screen and (max-width: 1050px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 .catch { font-size:<?php echo esc_html($catch_font_size_mobile); ?>px; }
}
@media only screen and (max-width: 750px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__btn { font-size:<?php echo esc_html($button_font_size_mobile); ?>px; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__btn:after { color:<?php echo esc_html($close_font_color); ?>; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type2 #js-footer-cta__btn:hover:after { color:<?php echo esc_html($close_font_color_hover); ?>; }
}
<?php
       elseif ( $options['footer_cta_type' . $i] == 'type3') :
         $catch_font_color = $options['footer_cta_type3_catch_font_color' . $i];
         $catch_font_size = $options['footer_cta_type3_catch_font_size' . $i];
         $catch_font_size_mobile = $options['footer_cta_type3_catch_font_size_mobile' . $i];
         $button_font_size = $options['footer_cta_type3_btn_font_size' . $i];
         $button_font_size_mobile = $options['footer_cta_type3_btn_font_size_mobile' . $i];
         $button_font_color = $options['footer_cta_type3_btn_font_color' . $i];
         $button_font_color_hover = $options['footer_cta_type3_btn_font_color_hover' . $i];
         $button_bg_color = $options['footer_cta_type3_btn_bg_color' . $i];
         $button_bg_color_hover = $options['footer_cta_type3_btn_bg_color_hover' . $i];
         $close_font_color = $options['footer_cta_type3_close_font_color' . $i];
         $close_font_color_hover = $options['footer_cta_type3_close_font_color_hover' . $i];
         $bg_color = hex2rgb($options['footer_cta_type3_bg_color' . $i]);
         $bg_color = implode(",",$bg_color);
         $bg_opacity = $options['footer_cta_type3_bg_opacity' . $i];
         $border_color = hex2rgb($options['footer_cta_type3_border_color' . $i]);
         $border_color = implode(",",$border_color);
         $border_color_opacity = $options['footer_cta_type3_border_opacity' . $i];
         $edge_angle = $options['footer_cta_type3_edge_angle' . $i];
         $show_border = $options['footer_cta_type3_show_border' . $i];
         $overlay_color = hex2rgb($options['footer_cta_type3_overlay_color' . $i]);
         $overlay_color = implode(",",$overlay_color);
         $overlay_color_opacity = $options['footer_cta_type3_overlay_opacity' . $i];
?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 { background:rgba(<?php echo esc_html($bg_color); ?>,<?php echo esc_html($bg_opacity); ?>); <?php if($show_border){ ?>border-top:1px solid rgba(<?php echo esc_html($border_color); ?>,<?php echo esc_html($border_color_opacity); ?>);<?php }; ?> }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .catch { color:<?php echo esc_html($catch_font_color); ?>; font-size:<?php echo esc_html($catch_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__btn { color:<?php echo esc_html($button_font_color); ?>; background:<?php echo esc_html($button_bg_color); ?>; font-size:<?php echo esc_html($button_font_size); ?>px; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__btn:hover { color:<?php echo esc_html($button_font_color_hover); ?>; background:<?php echo esc_html($button_bg_color_hover); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__close:before { color:<?php echo esc_html($close_font_color); ?>; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__close:hover:before { color:<?php echo esc_html($close_font_color_hover); ?>; }
<?php if($edge_angle > 0){ ?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap { -webkit-transform: skew(-<?php echo absint($edge_angle); ?>deg); transform: skew(-<?php echo absint($edge_angle); ?>deg); -webkit-transform-origin: top right; transform-origin: top right; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap_inner { -webkit-transform: skew(<?php echo absint($edge_angle); ?>deg); transform: skew(<?php echo absint($edge_angle); ?>deg); -webkit-transform-origin: top right; transform-origin: top right; }
<?php } else { ?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap { -webkit-transform: skew(<?php echo absint($edge_angle); ?>deg); transform: skew(<?php echo absint($edge_angle); ?>deg); -webkit-transform-origin: bottom right; transform-origin: bottom right; }
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap_inner { -webkit-transform: skew(-<?php echo absint($edge_angle); ?>deg); transform: skew(-<?php echo absint($edge_angle); ?>deg); -webkit-transform-origin: bottom right; transform-origin: bottom right; }
<?php }; ?>
.p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .overlay { background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_color_opacity); ?>); }
@media only screen and (max-width: 1050px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .catch { font-size:<?php echo esc_html($catch_font_size_mobile); ?>px; }
}
@media only screen and (max-width: 750px) {
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__btn { font-size:<?php echo esc_html($button_font_size_mobile); ?>px; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__btn:after { color:<?php echo esc_html($close_font_color); ?>; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 #js-footer-cta__btn:hover:after { color:<?php echo esc_html($close_font_color_hover); ?>; }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap { -webkit-transform: skew(0deg); transform: skew(0deg); }
  .p-footer-cta--<?php echo esc_html($i); ?>.footer_cta_type3 .image_wrap_inner { -webkit-transform: skew(0deg); transform: skew(0deg); }
}
<?php
       endif;
     endfor;
?>
<?php echo '</style>'. "\n". "\n"; ?>
<?php
}
add_action( 'wp_head', 'add_footer_cta_styles' );
