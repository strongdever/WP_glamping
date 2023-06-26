<?php

/**
 * 高速化処理
 *
 * @TODO キャッシュ系プラグイン等への対応
 */

/**
 * initialize
 *
 * @return void
 */
function tcd_acceleration_wp() {
	global $dp_options;

	// feed・管理画面・ajaxは終了
	if ( is_feed() || is_admin() || wp_doing_ajax() )
		return;

	if ( ! $dp_options ) $dp_options = get_design_plus_option();

	// テーマオプション高速化チェック
	if ( ! empty( $dp_options['use_js_optimization'] ) || ! empty( $dp_options['use_css_optimization'] ) || ! empty( $dp_options['use_html_optimization'] ) ) {
		// WordPressデフォルトで有効化になっているのshutdownアクションのwp_ob_end_flush_allを削除
		$priority = has_action( 'shutdown', 'wp_ob_end_flush_all' );
		if ( false === $priority )
			return;

		remove_action( 'shutdown', 'wp_ob_end_flush_all', $priority );

		// 全HTMLを取得するためのアクション
		add_action( 'template_redirect', 'tcd_acceleration_ob_start', 1 );
		add_action( 'shutdown', 'wp_ob_end_flush_all', 2 );

		// JS最適化
		if ( ! empty( $dp_options['use_js_optimization'] ) ) {
			add_filter( 'tcd_acceleration_html', 'tcd_acceleration_html_js_optimization' );
		}

		// CSS最適化
		if ( ! empty( $dp_options['use_css_optimization'] ) ) {
			add_filter( 'tcd_acceleration_html', 'tcd_acceleration_html_css_optimization' );
		}

		// HTML最適化
		if ( ! empty( $dp_options['use_html_optimization'] ) ) {
			add_filter( 'tcd_acceleration_html', 'tcd_acceleration_html_html_optimization' );
		}
	}
}
add_action( 'wp', 'tcd_acceleration_wp' );

/**
 * html操作するためのob_start用関数
 *
 * @return void
 */
function tcd_acceleration_ob_start() {
	global $tcd_acceleration_ob_level;
	ob_start();
	$tcd_acceleration_ob_level = ob_get_level();

	// ob_startしてからアクション追加する
	add_action( 'shutdown', 'tcd_acceleration_ob_end', 1 );
}

/**
 * HTML操作するためのob_get_contents用関数
 *
 * @return void
 */
function tcd_acceleration_ob_end() {
	global $tcd_acceleration_ob_level;

	// tcd_acceleration_ob_start()後でなければ終了
	if ( ! $tcd_acceleration_ob_level )
		return;

	// tcd_acceleration_ob_start後のob_startがあればフラッシュする
	while ( ob_get_level() > $tcd_acceleration_ob_level ) {
		ob_end_flush();
	}

	if ( WP_DEBUG ) {
		$debug_massage = "\n<!-- Memory usage before filter: " . ( floor( memory_get_usage() / ( 1024 * 1024 ) * 1000 ) / 1000 )."MB -->";
	}

	// バッファー取得
	$html = ob_get_contents();
	ob_end_clean();

	// フィルター
	$html = apply_filters( 'tcd_acceleration_html', $html );

	if ( WP_DEBUG ) {
		$debug_massage .= "\n<!-- Memory usage after filter: " . ( floor( memory_get_usage() / ( 1024 * 1024 ) * 1000 ) / 1000 )."MB -->";
		$debug_massage = apply_filters( 'tcd_acceleration_debug_massage', $debug_massage );

		$html = rtrim( $html ) . $debug_massage;
	}

	echo $html;
}

/**
 * JS最適化
 *
 * @param string $html HTML
 * @return string HTML
 */
function tcd_acceleration_html_js_optimization( $html ) {
	// include
	if ( ! class_exists( '\\tcd\\acceleration\\JSMin' ) )
		get_template_part( 'functions/acceleration/class-jsmin' );

	// 全scriptタグ取得
	if ( preg_match_all( '#(<script.*?>)(.*?)(</script>)#imsu', $html, $matches ) ) {
		foreach( array_keys( $matches[0] ) as $key ) {
			if ( $matches[2][$key] ) {
				$js_min = \tcd\acceleration\JSMin::minify( $matches[2][$key] );
				if ( $js_min ) {
					$html = str_replace(
						$matches[0][$key],
						trim( $matches[1][$key] ) . $js_min . trim( $matches[3][$key] ),
						$html
					);
				}
			}
		}
	}

	return $html;
}

/**
 * CSS最適化
 *
 * @param string $html HTML
 * @return string HTML
 */
function tcd_acceleration_html_css_optimization( $html ) {
	// 共通cssキャッシュ url & path
	$css_cache_url = WP_CONTENT_URL . '/cache/tcd/common.css';
	$css_cache_path = WP_CONTENT_DIR . '/cache/tcd/common.css';
	$css_cache_dir = WP_CONTENT_DIR . '/cache/tcd';

	// プレビューは除外
	if ( is_preview() || is_customize_preview() )
		return $html;

	// 共通cssキャッシュurlと現アクセスのスキーマが異なる場合は除外
	$css_cache_url_is_ssl = ( 0 === stripos( $css_cache_url, 'https://' ) );
	if ( $css_cache_url_is_ssl !== is_ssl() )
		return $html;

	// 全styleタグ・linkタグ取得
	$r = preg_match_all( '#((<style[^>]*?>)(.*?)</style>\s+)|(<link[^>]*?(?:stylesheet|type=[\"\']text\/css[\"\'])[^>]*?>\s+)#imsu', $html, $matches );

	// 取得失敗
	if ( ! $r )
		return $html;

	// include
	if ( ! class_exists( '\\tcd\\acceleration\\CssMin' ) )
		get_template_part( 'functions/acceleration/class-cssmin' );

	// CssMinクラスオブジェクト
	$CssMin = new \tcd\acceleration\CssMin;

	// cssキャッシュ用オプション取得
	$tcd_css_cache = get_option( 'tcd_css_cache', array() );
	if ( ! is_array( $tcd_css_cache ) )
		$tcd_css_cache = array();

	// cssキャッシュ用オプションに共通cssキャッシュありで現設定と異なる場合はオプションリセット
	if ( ( isset( $tcd_css_cache['common']['css_url'] ) && $tcd_css_cache['common']['css_url'] !== $css_cache_url ) ||
		( isset( $tcd_css_cache['common']['css_path'] ) && $tcd_css_cache['common']['css_path'] !== $css_cache_path ) ) {
		$tcd_css_cache = array();
	}

	// css配列
	$cache_styles = array();
	$cache_imports = array();
	$inline_styles = array();

	// フラグ
	$is_first_style = true;
	$is_first_link = true;

	// linkでurlに含まれれていれば除外する文字列の配列
	$link_href_excludes = array(
		'dashicons.css',
		'dashicons.min.css',
		'admin-bar.css',
		'admin-bar.min.css',
		'footer-bar.css',
		'footer-bar.min.css'
	);
	$link_href_excludes = apply_filters( 'tcd_acceleration_html_css_optimization_link_href_excludes', $link_href_excludes );
	if ( ! is_array( $link_href_excludes ) )
		$link_href_excludes = array();

	// フロントページ
	if ( is_front_page() ) {
		$ts = current_time( 'timestamp', true );

		// 共通cssキャッシュありの場合、ファイル更新チェック
		// キャッシュ作成もしくは前回チェックから1時間以上経過している場合のみ
		if ( ! empty( $tcd_css_cache['common']['css_url'] ) &&
			! empty( $tcd_css_cache['common']['link_path'] ) &&
			! empty( $tcd_css_cache['common']['timestamp'] ) &&
			$tcd_css_cache['common']['timestamp'] + HOUR_IN_SECONDS < $ts ) {

			// 最終チェックのタイムスタンプ更新
			$tcd_css_cache['common']['timestamp'] = $ts;

			foreach( $tcd_css_cache['common']['link_path'] as $key => $link_path ) {
				if ( empty( $tcd_css_cache['common']['link_filemtime'][$key] ) )
					continue;
				// ファイル更新日時が異なる場合はオプションクリア
				if ( filemtime( $link_path ) != $tcd_css_cache['common']['link_filemtime'][$key] ) {
					$tcd_css_cache = array();
					break;
				}
			}
		}

		// 共通cssキャッシュなしの場合、共通cssキャッシュ生成
		if ( empty( $tcd_css_cache['common']['css_url'] ) ) {
			$tcd_css_cache = array();

			// キャッシュフォルダが無ければフォルダ作成
			if ( ! file_exists( $css_cache_dir ) ) {
				wp_mkdir_p( $css_cache_dir );
			}

			// キャッシュフォルダに書き込み権限ありの場合
			if ( is_writable( $css_cache_dir ) ) {
				$siteurl_wo_scheme = preg_replace( '#^https?:#', '', get_option( 'siteurl' ) );

				foreach( array_keys( $matches[0] ) as $key ) {
					// linkタグ
					if ( $matches[4][$key] ) {
						$link_href = null;

						// cssファイルのurl抽出
						if ( preg_match( '#[\s\"\']href=[\"\']([^\"\'\?]+)#imsu', $matches[4][$key], $matches2 ) ) {
							$link_href = $matches2[1];
						}

						// urlなし・拡張子が.css以外・WPサイト外の場合は処理しない
						if ( ! $link_href || '.css' !== substr( $link_href, -4 ) || false === strpos( $link_href, $siteurl_wo_scheme ) )
							continue;

						// 除外する文字列の配列
						foreach ( $link_href_excludes as $link_href_exclude ) {
							if ( false !== stripos( $link_href, $link_href_exclude ) )
								continue 2;
						}

						// urlからパスに置換
						$link_path = preg_replace( '#^https?:' . $siteurl_wo_scheme . '/#', ABSPATH, $link_href );

						// 読み込めない場合は処理しない
						if ( ! is_readable( $link_path ) )
							continue;

						// cssファイル読み込み
						$css = file_get_contents( $link_path, false );

						// cssファイル内のパス置換
						// 参考: https://github.com/mrclay/minify/blob/master/lib/Minify/CSS/UriRewriter.php
						$pattern = '/url\\(\\s*([\'"](.*?)[\'"]|[^\\)\\s]+)\\s*\\)/';
						if ( preg_match_all( $pattern, $css, $matches2 ) ) {
							$link_href_dir = dirname( $link_href ) . '/';

							foreach( array_keys( $matches2[0] ) as $key2 ) {
								// data: 記述は除外
								if ( false === strpos( $matches2[2][$key2], 'data:' ) ) {
									$_filename = trim( $matches2[2][$key2] ? $matches2[2][$key2] : $matches2[1][$key2] );
									$css = str_replace( $matches2[0][$key2], 'url(' . $link_href_dir . $_filename . ')', $css );
								}
							}
						}

						// @importを抜き出す
						if ( preg_match_all( '#@import\s+.*?;\s*#ims', $css, $matches2 ) ) {
							foreach( $matches2[0] as $value2 ) {
								$css = str_replace( $value2, '', $css );
								$cache_imports[] = trim( $value2 );
							}
						}

						// @charaset削除
						$css = preg_replace( '#@charset\s+.*?;#ims', '', $css );

						// .min.cssの場合はコメントと改行の削除のみ
						if ( '.min.css' === substr( $link_href, -8 ) ) {
							$css = preg_replace( '#(/\*.*?\*/|\n+)#ims', '', $css );
						// min化
						} else {
							$css = $CssMin->run( trim( $css ) );
						}

						// linkタグにmedia指定がある場合は全体を囲む
						if ( preg_match( '#[\s\"\']media=[\"\']([^\"\']+?)[\"\']#imsu', $matches[4][$key], $matches2 ) ) {
							$media = trim( $matches2[1] );
						} else {
							$media = 'all';
						}
						if ( $media && 'all' !== $media ) {
							$css = '@media ' . $media . '{' . $css . '}';
						}

						// 配列代入
						$cache_styles[$key] = $css;
						$css = null;

						// cssキャッシュ用オプションにセット
						$tcd_css_cache['common']['link'][$key] = trim( $matches[4][$key] );
						$tcd_css_cache['common']['link_href'][$key] = $link_href;
						$tcd_css_cache['common']['link_path'][$key] = $link_path;
						$tcd_css_cache['common']['link_filemtime'][$key] = filemtime( $link_path );

					// styleタグ
					} elseif ( $matches[1][$key] ) {
						// 現URL用styleは除外
						if ( strpos( $matches[2][$key], ' id="current-page-style"' ) ) {

						// その他は共通cssキャッシュに入れる
						} else {
							// min化して配列代入
							$cache_styles[$key] = $CssMin->run( trim( $matches[3][$key] ) );

							// styleタグにmedia指定がある場合は全体を囲む
							if ( preg_match( '#[\s\"\']media=[\"\']([^\"\']+?)[\"\']#imsu', $matches[1][$key], $matches2 ) ) {
								$media = trim( $matches2[1] );
							} else {
								$media = 'all';
							}
							if ( $media && 'all' !== $media ) {
								$cache_styles[$key] = '@media ' . $media . '{' . $cache_styles[$key] . '}';
							}

							// cssキャッシュ用オプションにセット
							$tcd_css_cache['common']['style'][$key] = trim( $matches[3][$key] );
						}
					}
				}

				// 共通css作成 @importは先頭に
				$css = implode( '', $cache_imports ) . implode( '', $cache_styles );
				$cache_imports = $cache_styles = null;

				// 共通cssキャッシュ ファイル保存
				if ( file_put_contents( $css_cache_path, $css ) ) {
					$tcd_css_cache['common']['css_url'] = $css_cache_url;
					$tcd_css_cache['common']['css_path'] = $css_cache_path;
					$tcd_css_cache['common']['timestamp'] = $ts;

				// 失敗した場合はオプションリセット
				} else {
					$tcd_css_cache = array();
				}
			}

			// cssキャッシュ用オプション保存
			update_option( 'tcd_css_cache', $tcd_css_cache );
		}
	}

	// 共通cssキャッシュあり
	if ( ! empty( $tcd_css_cache['common']['css_url'] ) ) {
		foreach( array_keys( $matches[0] ) as $key ) {
			// linkタグ
			if ( $matches[4][$key] ) {
				// オプションにurl配列が無ければスルー
				if ( empty( $tcd_css_cache['common']['link_href'] ) )
					continue;

				// cssファイルのurl抽出できなければスルー
				if ( ! preg_match( '#[\s\"\']href=[\"\']([^\"\'\?]+)#imsu', $matches[4][$key], $matches2 ) )
					continue;

				$link_href = $matches2[1];

				// 共通cssキャッシュに同じurlがある場合
				if ( in_array( $link_href, $tcd_css_cache['common']['link_href'], true ) ) {
					// 置換フラグ 最初のlinkタグの場所に共通cssのlinkタグ出力させる
					if ( $is_first_link ) {
						$is_first_link = false;
						$matches['replace'][$key] = '<link rel="stylesheet" href="' . esc_attr( $css_cache_url ) . '" type="text/css" media="all">';
					} else {
						$matches['remove'][$key] = true;
					}
				}

			// styleタグ
			} elseif ( $matches[1][$key] ) {
				// オプションのstyle配列に同じ内容のがある場合、置換フラグで削除
				if ( ! empty( $tcd_css_cache['common']['style'] ) &&
					in_array( trim( $matches[3][$key] ), $tcd_css_cache['common']['style'], true ) ) {
					$matches['remove'][$key] = true;

				// その他はstyle結合
				} else {
					// min化して配列代入
					$inline_styles[$key] = $CssMin->run( trim( $matches[3][$key] ) );

					// 置換フラグ 最初のstyleタグに差分style出力させる
					if ( $is_first_style ) {
						$is_first_style = false;
						$matches['replace_styles'][$key] = true;
					} else {
						$matches['remove'][$key] = true;
					}
				}
			}
		}

	// 共通cssキャッシュなし → インラインstyle結合のみ
	} else {
		foreach( array_keys( $matches[0] ) as $key ) {
			// linkタグはスルー
			if ( ! $matches[1][$key] )
				continue;

			// min化
			$inline_styles[$key] = $CssMin->run( trim( $matches[3][$key] ) );

			// styleタグにmedia指定がある場合は全体を囲む
			if ( preg_match( '#[\s\"\']media=[\"\']([^\"\']+?)[\"\']#imsu', $matches[1][$key], $matches2 ) ) {
				$media = trim( $matches2[1] );
			} else {
				$media = 'all';
			}
			if ( $media && 'all' !== $media ) {
				$inline_styles[$key] = '@media ' . $media . '{' . $inline_styles[$key] . '}';
			}

			// 置換フラグ 最初のstyleタグに結合style出力させる
			if ( $is_first_style ) {
				$is_first_style = false;
				$matches['replace_styles'][$key] = true;
			} else {
				$matches['remove'][$key] = true;
			}
		}
	}

	// 置換・削除
	foreach( array_keys( $matches[0] ) as $key ) {
		// 置換
		if ( ! empty( $matches['replace'][$key] ) ) {
			$html = str_replace( $matches[0][$key], $matches['replace'][$key] . "\n", $html );
		}

		// 結合インラインstyle出力
		if ( ! empty( $matches['replace_styles'][$key] ) ) {
			$inline_styles = array_filter( $inline_styles, 'strlen' );
			if ( $inline_styles ) {
				$html = str_replace( $matches[0][$key], '<style>' . implode( '', $inline_styles ) . '</style>' . "\n", $html );
			} else {
				$html = str_replace( $matches[0][$key], '', $html );
			}
		}

		// 削除
		if ( ! empty( $matches['remove'][$key] ) ) {
			$html = str_replace( $matches[0][$key], '', $html );
		}
	}

	return $html;
}

/**
 * CSSキャッシュ削除
 * テーマオプション変更保存・プラグイン有効化・プラグイン無効化にフック
 *
 * @return void
 */
function tcd_acceleration_clear_css_cache() {
	// cssキャッシュ用オプション取得
	$tcd_css_cache = get_option( 'tcd_css_cache', array() );

	// 共通cssキャッシュあり
	if ( ! empty( $tcd_css_cache['common']['css_path'] ) ) {
		if ( file_exists( $tcd_css_cache['common']['css_path'] ) ) {
			@unlink( $tcd_css_cache['common']['css_path'] );
		}

		// cssキャッシュ用オプション保存
		update_option( 'tcd_css_cache', array() );
	}
}
add_action( 'update_option_dp_options', 'tcd_acceleration_clear_css_cache' );
add_action( 'activated_plugin', 'tcd_acceleration_clear_css_cache' );
add_action( 'deactivated_plugin', 'tcd_acceleration_clear_css_cache' );

/**
 * HTML最適化
 *
 * @param string $html HTML
 * @return string HTML
 */
function tcd_acceleration_html_html_optimization( $html ) {
	// include
	if ( ! class_exists( '\\tcd\\acceleration\\Minify_HTML' ) )
		get_template_part( 'functions/acceleration/class-minify-html' );

	$html_min = \tcd\acceleration\Minify_HTML::minify( $html, array(
		'xhtml' => false
	) );

	if ( $html_min )
		return $html_min;

	return $html;
}
