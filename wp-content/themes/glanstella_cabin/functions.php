<?php
/**
 * GLANSTELLA-CABIN functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gramercy-Village
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function glanstella_cabin_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'glanstella_cabin_setup' );

/**
 * Enqueue scripts and styles.
 */
function glanstella_cabin_scripts() {
	if (!is_admin()) {
		// バンドル版のjQueryをロードしない
		wp_deregister_script('jquery');

		// CSSロード
		wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/jquery/css/jquery-ui.min.css', array(), '1.13.1');
		wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), '6.1.1');
		wp_enqueue_style('glanstella-cabin', get_template_directory_uri() . '/style.css', array('jquery-ui', 'fontawesome'), '1.0.0');

		// JSロード
		wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/jquery/js/jquery-3.6.0.min.js', array(), '3.6.0', true);
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/jquery/js/jquery-ui.min.js', array('jquery'), '1.13.1', true);
		wp_enqueue_script('glanstella-cabin', get_template_directory_uri() . '/js/glanstella-cabin.js', array('jquery', 'jquery-ui'), '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'glanstella_cabin_scripts');

/**
 * 不要なヘッダーを削除
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);

/**
 * ショートコード
 */
function do_span($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'content' => '',
	], $atts, 'span' );

	return '<span class="' . $atts['class'] . '">' . $atts['content'] . '</span>';
}
add_shortcode('span', 'do_span');

function do_bold($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'content' => '',
	], $atts, 'bold' );

	return '<span class="bold ' . $atts['class'] . '">' . $atts['content'] . '</span>';
}
add_shortcode('bold', 'do_bold');

function do_br($atts) {
	$atts = shortcode_atts([
		'class' => '',
	], $atts, 'br' );

	return '<br class="' . $atts['class'] . '">';
}
add_shortcode('br', 'do_br');

/**
 * テーマ用関数
 */
function img_srcset($filename, $ext = 'webp', $id = false, $class = false, $lazyload = true) : string{
	$results = ['img'];

	// id設定
	if (!empty($id)) {
		$results[] = 'id="' . $id . '"';
	}

	// class設定
	if (!empty($class)) {
		$classes = array_map('trim', explode(' ', $class));
		// LazyLoad設定
		if ($lazyload) {
			$classes[] = 'lazyload';
		}
		$classes = array_unique($classes);
		$results[] = 'class="' . implode(' ', $classes) . '"';
	} else {
		// LazyLoad設定
		if ($lazyload) {
			$results[] = 'class="lazyload"';
		}
	}

	// レスポンシブ対応
	$files = [];
	$files[] = get_template_directory_uri() . '/images/' . $filename . '.' . $ext . ' 1x';
	$files[] = get_template_directory_uri() . '/images/' . $filename . '@2x.' . $ext . ' 2x';
	$files[] = get_template_directory_uri() . '/images/' . $filename . '@3x.' . $ext . ' 3x';
	$files[] = get_template_directory_uri() . '/images/' . $filename . '@4x.' . $ext . ' 4x';
	if ($lazyload) {
		$results[] = 'data-srcset="' . implode(', ', $files) . '"';
	} else {
		$results[] = 'srcset="' . implode(', ', $files) . '"';
	}

	// imgタグ合成
	return '<' . implode(' ', $results) . '>';
}
function img_srcset_abs($filename, $ext = 'webp', $id = false, $class = false, $lazyload = true) : string{
	$results = ['img'];

	// id設定
	if (!empty($id)) {
		$results[] = 'id="' . $id . '"';
	}

	// class設定
	if (!empty($class)) {
		$classes = array_map('trim', explode(' ', $class));
		// LazyLoad設定
		if ($lazyload) {
			$classes[] = 'lazyload';
		}
		$classes = array_unique($classes);
		$results[] = 'class="' . implode(' ', $classes) . '"';
	} else {
		// LazyLoad設定
		if ($lazyload) {
			$results[] = 'class="lazyload"';
		}
	}

	// レスポンシブ対応
	$files = [];
	$files[] = $filename . '-320x320.' . $ext . ' 1x';
	$files[] = $filename . '-640x640.' . $ext . ' 2x';
	$files[] = $filename . '-960x960.' . $ext . ' 3x';
	$files[] = $filename . '-1280x1280.' . $ext . ' 4x';
	if ($lazyload) {
		$results[] = 'data-srcset="' . implode(', ', $files) . '"';
	} else {
		$results[] = 'srcset="' . implode(', ', $files) . '"';
	}

	// imgタグ合成
	return '<' . implode(' ', $results) . '>';
}

function img_src($filename, $ext = 'webp', $id = false, $class = false, $lazyload = true) : string{
	$results = ['img'];

	// id設定
	if (!empty($id)) {
		$results[] = 'id="' . $id . '"';
	}

	// class設定
	if (!empty($class)) {
		$classes = array_map('trim', explode(' ', $class));
		// LazyLoad設定
		if ($lazyload) {
			$classes[] = 'lazyload';
		}
		$classes = array_unique($classes);
		$results[] = 'class="' . implode(' ', $classes) . '"';
	} else {
		// LazyLoad設定
		if ($lazyload) {
			$results[] = 'class="lazyload"';
		}
	}

	// レスポンシブ対応
	$files = [];
	$files[] = get_template_directory_uri() . '/images/' . $filename . '.' . $ext . ' 1x';
	if ($lazyload) {
		$results[] = 'data-src="' . implode(', ', $files) . '"';
	} else {
		$results[] = 'src="' . implode(', ', $files) . '"';
	}

	// imgタグ合成
	return '<' . implode(' ', $results) . '>';
}
function img_src_abs($filename, $ext = 'webp', $id = false, $class = false, $lazyload = true) : string{
	$results = ['img'];

	// id設定
	if (!empty($id)) {
		$results[] = 'id="' . $id . '"';
	}

	// class設定
	if (!empty($class)) {
		$classes = array_map('trim', explode(' ', $class));
		// LazyLoad設定
		if ($lazyload) {
			$classes[] = 'lazyload';
		}
		$classes = array_unique($classes);
		$results[] = 'class="' . implode(' ', $classes) . '"';
	} else {
		// LazyLoad設定
		if ($lazyload) {
			$results[] = 'class="lazyload"';
		}
	}

	// レスポンシブ対応
	$files = [];
	$files[] = $filename . '-320x320.' . $ext . ' 1x';
	if ($lazyload) {
		$results[] = 'data-src="' . implode(', ', $files) . '"';
	} else {
		$results[] = 'src="' . implode(', ', $files) . '"';
	}

	// imgタグ合成
	return '<' . implode(' ', $results) . '>';
}
function img_src_abs4x($filename, $ext = 'webp', $id = false, $class = false, $lazyload = true) : string{
	$results = ['img'];

	// id設定
	if (!empty($id)) {
		$results[] = 'id="' . $id . '"';
	}

	// class設定
	if (!empty($class)) {
		$classes = array_map('trim', explode(' ', $class));
		// LazyLoad設定
		if ($lazyload) {
			$classes[] = 'lazyload';
		}
		$classes = array_unique($classes);
		$results[] = 'class="' . implode(' ', $classes) . '"';
	} else {
		// LazyLoad設定
		if ($lazyload) {
			$results[] = 'class="lazyload"';
		}
	}

	// レスポンシブ対応
	$files = [];
	$files[] = $filename . '.' . $ext;
	if ($lazyload) {
		$results[] = 'data-src="' . implode(', ', $files) . '"';
	} else {
		$results[] = 'src="' . implode(', ', $files) . '"';
	}

	// imgタグ合成
	return '<' . implode(' ', $results) . '>';
}
