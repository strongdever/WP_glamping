<?php
$options = get_design_plus_option();

function tcd_cta_scripts() {

	wp_enqueue_script( 'force-inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array( 'jquery' ), version_num(), true );
	wp_enqueue_script( 'force-cta', get_template_directory_uri() . '/admin/js/cta.js', array( 'jquery' ), version_num(), true );
	wp_localize_script( 'force-cta', 'tcd_cta', array( 'admin_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => wp_create_nonce( 'tcd_cta_nonce' ) ) );

}

if ( '5' !== $options['cta_display'] ) {  
	add_action( 'wp_enqueue_scripts', 'tcd_cta_scripts' );
}

function tcd_admin_cta_scripts() {

	wp_enqueue_script( 'force-cta', get_template_directory_uri() . '/admin/js/cta.js', array( 'jquery' ), version_num(), true );
	wp_localize_script( 'force-cta', 'tcd_cta', array( 'admin_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => wp_create_nonce( 'tcd_cta_nonce' ), 'confirm_text' => __( 'Are you sure to reset these values?', 'tcd-w' ) ) );

}
add_action( 'admin_enqueue_scripts', 'tcd_admin_cta_scripts' );

// インプレッション、クリック率、コンバージョン率の管理
function tcd_cta_impression() {

	$options = get_design_plus_option();
	$cta_keys = array( '1', '2', '3' );

	// verify the nonce
	check_ajax_referer( 'tcd_cta_nonce', 'security' );

	// 表示している記事下CTAの番号
	$cta_index = $options['cta_display'];

	// ランダム表示の場合、渡されたcta_indexを使用する
	if ( '4' === $cta_index ) {
		$cta_index = strval( intval( $_POST['cta_index'] ) );
	}

	// 表示している記事下CTAのインプレッション、クリック数、コンバージョンを取得
	$cta_impression = get_option( 'tcd_cta_impression' . $cta_index, 0 );
	$cta_click = get_option( 'tcd_cta_click' . $cta_index, 0 );
	$cta_conversion = get_option( 'tcd_cta_conversion' . $cta_index, 0 );

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
	update_option( 'tcd_cta_impression' . $cta_index, $cta_impression );
	update_option( 'tcd_cta_ctr' . $cta_index, $cta_ctr );
	update_option( 'tcd_cta_cvr' . $cta_index, $cta_cvr );

	die();
}
add_action( 'wp_ajax_tcd_cta_impression', 'tcd_cta_impression' );
add_action( 'wp_ajax_nopriv_tcd_cta_impression', 'tcd_cta_impression' );

// クリック数、クリック率、Cookie の管理
function tcd_cta_click() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_cta_nonce', 'security' );

	// 表示している記事下CTAの番号
	$cta_index = $options['cta_display'];
	
	// ランダム表示の場合、渡されたcta_indexを使用する
	if ( '4' === $cta_index ) {
		$cta_index = strval( intval( $_POST['cta_index'] ) );
	}

	// Cookie の上書き
	if ( isset( $_COOKIE['tcd_cta'] ) ) {
		setcookie( 'tcd_cta', '', time() - 3600, '/' );
	}

	// Cookie を 30日間に設定
	setcookie( 'tcd_cta', $cta_index, time() + 60*60*24*30, '/' );

	// 表示している記事下CTAのインプレッション、クリック数を取得
	$cta_impression = get_option( 'tcd_cta_impression' . $cta_index, 0 );
	$cta_click = get_option( 'tcd_cta_click' . $cta_index, 0 );

	// クリック数のカウントを1増やす
	$cta_click++;

	// クリック率の計算 (Click-through Rate)
	if ( 0 !== $cta_impression ) {
		$cta_ctr = floor( 10000 * $cta_click / $cta_impression ) / 100;
	} else {
		$cta_ctr = 0;
	}

	// データを更新
	update_option( 'tcd_cta_click' . $cta_index, $cta_click );
	update_option( 'tcd_cta_ctr' . $cta_index, $cta_ctr );

	die();
}
add_action( 'wp_ajax_tcd_cta_click', 'tcd_cta_click' );
add_action( 'wp_ajax_nopriv_tcd_cta_click', 'tcd_cta_click' );

// コンバージョン、コンバージョン率の管理
function tcd_cta_conversion() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_cta_nonce', 'security' );

	if ( isset( $_COOKIE['tcd_cta'] ) ) {
	
		// コンバージョンを計測する記事下CTAの番号
		$cta_index = strval( intval( $_COOKIE['tcd_cta'] ) );
		
		// Cookie の削除
		setcookie( 'tcd_cta', '', time() - 3600, '/' );

		// コンバージョンを計測する記事下CTAのインプレッション、コンバージョンを取得
		$cta_impression = get_option( 'tcd_cta_impression' . $cta_index, 0 );
		$cta_conversion = get_option( 'tcd_cta_conversion' . $cta_index, 0 );

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
	update_option( 'tcd_cta_conversion' . $cta_index, $cta_conversion );
	update_option( 'tcd_cta_cvr' . $cta_index, $cta_cvr );

	die();
}
add_action( 'wp_ajax_tcd_cta_conversion', 'tcd_cta_conversion' );
add_action( 'wp_ajax_nopriv_tcd_cta_conversion', 'tcd_cta_conversion' );

function tcd_cta_reset() {

	$options = get_design_plus_option();

	// verify the nonce
	check_ajax_referer( 'tcd_cta_nonce', 'security' );

	// リセットする記事下CTAの番号
	$cta_index = strval( intval( $_POST['cta_index'] ) );

	// インプレッション、クリック数、クリック率をリセット
	update_option( 'tcd_cta_impression' . $cta_index, 0 );
	update_option( 'tcd_cta_click' . $cta_index, 0 );
	update_option( 'tcd_cta_ctr' . $cta_index, 0 );
	update_option( 'tcd_cta_conversion' . $cta_index, 0 );
	update_option( 'tcd_cta_cvr' . $cta_index, 0 );

	die();
}
add_action( 'wp_ajax_tcd_cta_reset', 'tcd_cta_reset' );
add_action( 'wp_ajax_nopriv_tcd_cta_reset', 'tcd_cta_reset' );

// ランダム表示に使用するCTA配列を取得する
function get_cta_in_random_display() {
	
	$options = get_design_plus_option();

	$cta_in_random_display = array();

	for ( $i = 1; $i <= 3; $i++) {
		if ( $options['cta_random' . $i] ) {
			$cta_in_random_display[] = $i;
		}
	}

	return $cta_in_random_display;
}

// head 要素に記事下CTAのスタイルを書き出す
// スタイルを適用するクラスの先頭に .p-cta--{$i} を置くことで、CTA-A?C全てのスタイルを書きだす
function add_cta_styles() {

	$options = get_design_plus_option();
	if ( ! is_single() || ( is_single () && '5' === $options['cta_display'] ) ) return;
?>
<style>
<?php 
for ( $i = 1; $i <= 3; $i++ ) {
	switch ( $options['cta_type' . $i] ) :
		case 'type1' :
    $overlay_color = hex2rgb($options['cta_type1_overlay' . $i]);
    $overlay_color = implode(",",$overlay_color);
?>
.p-cta--<?php echo $i; ?>.cta_type1 a .catch { font-size:<?php echo esc_html( $options['cta_type1_catch_font_size' . $i] ); ?>px; color: <?php echo esc_html( $options['cta_type1_catch_font_color' . $i] ); ?>; }
.p-cta--<?php echo $i; ?>.cta_type1 a:hover .catch { color: <?php echo esc_html( $options['cta_type1_catch_font_color_hover' . $i] ); ?>; }
.p-cta--<?php echo $i; ?>.cta_type1 .overlay { background:rgba(<?php echo esc_attr($overlay_color); ?>,<?php echo esc_html( $options['cta_type1_overlay_opacity' . $i] ); ?>); }
<?php
			break;
		case 'type2' :
?>
.p-cta--<?php echo $i; ?>.cta_type2 .link { background: <?php echo esc_html( $options['cta_type2_catch_bg_color' . $i] ); ?>; }
.p-cta--<?php echo $i; ?>.cta_type2 a .catch { font-size:<?php echo esc_html( $options['cta_type2_catch_font_size' . $i] ); ?>px; color: <?php echo esc_html( $options['cta_type2_catch_font_color' . $i] ); ?>; }
.p-cta--<?php echo $i; ?>.cta_type2 a:hover .catch { color: <?php echo esc_html( $options['cta_type2_catch_font_color_hover' . $i] ); ?>; }
<?php
			break;
		case 'type3' :
?>
.p-cta--<?php echo $i; ?>.cta_type3 a .catch { font-size:<?php echo esc_html( $options['cta_type3_catch_font_size' . $i] ); ?>px; color: <?php echo esc_html( $options['cta_type3_catch_font_color' . $i] ); ?>; }
.p-cta--<?php echo $i; ?>.cta_type3 a:hover .catch { color: <?php echo esc_html( $options['cta_type3_catch_font_color_hover' . $i] ); ?>; }
<?php
			break;
	endswitch;
}
?>
</style>
<?php
}
add_action( 'wp_head', 'add_cta_styles' );
