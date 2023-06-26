<?php

/**
 * 期間アクセス数テーブルを使用するフラグ
 */
if ( ! defined( 'USE_VIEWS_RANGE_TABLE' ) ) {
	define( 'USE_VIEWS_RANGE_TABLE', true );
}

/**
 * カスタムフィールドのアクセス数を使用するフラグ
 */
if ( ! defined( 'USE_VIEWS_CUSTOM_FIELD' ) ) {
	define( 'USE_VIEWS_CUSTOM_FIELD', true );
}

/**
 * カスタムフィールドのアクセス数をメタボックスで変更可能にするフラグ
 */
if ( ! defined( 'VIEWS_CUSTOM_FIELD_EDITABLE' ) ) {
	define( 'VIEWS_CUSTOM_FIELD_EDITABLE', false );
}

/**
 * カスタムフィールドのアクセス数をクイック編集で変更可能にするフラグ
 */
if ( ! defined( 'VIEWS_CUSTOM_FIELD_QUICKEDITABLE' ) ) {
	define( 'VIEWS_CUSTOM_FIELD_QUICKEDITABLE', false );
}

/**
 * カスタムフィールドのアクセス数を一覧カラムに表示するフラグ
 */
if ( ! defined( 'SHOW_VIEWS_CUSTOM_FIELD_ADMIN_COLMUN' ) ) {
	define( 'SHOW_VIEWS_CUSTOM_FIELD_ADMIN_COLMUN', true );
}


/**
 * アクセス数対象の投稿タイプを配列を返す
 */
function get_post_views_post_types() {
	$post_views_post_types = array( 'post');
	// $post_views_post_types = get_post_types( array( 'public' => true ), 'names' );
	return (array) apply_filters( 'get_post_views_post_types', $post_views_post_types );
}

/**
 * アクセス数出力関数
 *
 * @param string|int $post_id
 * @param string $view_range 期間指定 [ '' | day | daily | week | weekly | month | monthly | year | yearly ]
 */
function the_post_views( $post_id = null, $view_range = null ) {
	echo get_post_views( $post_id, $view_range );
}

/**
 * アクセス数取得関数
 *
 * @param string|int $post_id
 * @param string $view_range 期間指定 [ '' | day | daily | week | weekly | month | monthly | year | yearly ]
 *
 * @return int
 */
function get_post_views( $post_id = null, $view_range = null ) {
	if ( isset( $post_id->ID ) ) {
		$post_id = $post_id->ID;
	}
	if ( ! $post_id && ! empty( $GLOBALS['post']->ID ) ) {
		$post_id = $GLOBALS['post']->ID;
	}
	$post_id = (int) $post_id;
	if ( 0 >= $post_id ) return 0;

	$view_range = strtolower( $view_range );
	if ( ! in_array( $view_range, array( 'day', 'daily', 'week', 'weekly', 'month', 'monthly', 'year', 'yearly' ) ) ) {
		$view_range = '';
	}

	if ( ! $view_range && USE_VIEWS_CUSTOM_FIELD ) {
		return (int) get_post_meta( $post_id, '_views', true );
	}

	if ( USE_VIEWS_RANGE_TABLE && exists_table_views() ) {
		global $wpdb;

		// テーブル名
		$tablename = $wpdb->prefix . 'tcd_post_views';

		if ( ! $view_range ) {
			$sql = "SELECT COUNT(id) FROM {$tablename} WHERE post_id = {$post_id}";
			return (int) $wpdb->get_var( $sql );
		}

		// 期間指定値からfrom日時タイムスタンプ計算
		if ( in_array( $view_range, array( '24h', 'day', 'daily' ) ) ) {
			$from_ts = current_time( 'timestamp', true ) - DAY_IN_SECONDS;
		} elseif ( in_array( $view_range, array( 'week', 'weekly' ) ) ) {
			$from_ts = current_time( 'timestamp', true ) - WEEK_IN_SECONDS;
		} elseif ( in_array( $view_range, array( 'month', 'monthly' ) ) ) {
			$from_ts = strtotime( '-1 month', current_time( 'timestamp', true ) );
		} elseif ( in_array( $view_range, array( 'year', 'yearly' ) ) ) {
			$from_ts = current_time( 'timestamp', true ) - YEAR_IN_SECONDS;
		} else {
			$from_ts = 0;
		}

		if ( $from_ts ) {
			$sql = "SELECT COUNT(id) FROM {$tablename} WHERE post_id = {$post_id} AND datetime_gmt >= %s";
			return (int) $wpdb->get_var( $wpdb->prepare( $sql, date( 'Y-m-d H:i:s', $from_ts ) ) );
		} else {
			$sql = "SELECT COUNT(id) FROM {$tablename} WHERE post_id = {$post_id}";
			return (int) $wpdb->get_var( $sql );
		}
	}

	return 0;
}

/**
 * アクセス数ランキング記事一覧取得関数
 *
 * @param string $view_range 期間指定 [ '' | day | daily | week | weekly | month | monthly | year | yearly ]
 * @param string $query_args WP_Queryの引数指定
 * @param string $output     出力形式 [ ''（WP_Query以外） | WP_Query ]
 *
 * @return WP_Query|array
 *
 * 期間アクセス数テーブルからランキング一覧作成する場合（期間指定ありもしくはカスタムフィールドアクセス数未使用）戻り値のpost->viewsにアクセス数が入ります。またアクセス数が0のものは戻り値に含まれません。
 */
function get_posts_views_ranking( $view_range = null, $query_args = array(), $output = null ) {
	$query_args_defaults = array(
		'ignore_sticky_posts' => 1,
	);
	$query_args = wp_parse_args( (array) $query_args, $query_args_defaults );

	$view_range = strtolower( $view_range );
	if ( ! in_array( $view_range, array( 'day', 'daily', 'week', 'weekly', 'month', 'monthly', 'year', 'yearly' ) ) ) {
		$view_range = '';
	}

	$output = strtolower( $output );

	if ( ! $view_range && USE_VIEWS_CUSTOM_FIELD ) {
		// カスタムフィールドアクセス数降順
		$query_args2 = $query_args; 
		$query_args2['meta_key'] = '_views';
		$query_args2['orderby'] = 'meta_value_num';
		$query_args2['order'] = 'DESC';
		if ( isset( $query_args2['meta_value'] ) ) {
			unset( $query_args2['meta_value'] );
		}

		$_wp_query = new WP_Query( $query_args2 );

		// ランダム対応
		if ( ! empty( $query_args['orderby'] ) && 'rand' === $query_args['orderby'] && $_wp_query->posts ) {
			mt_shuffle( $_wp_query->posts );
		}

		if ( 'wp_query' === $output ) {
			return $_wp_query;
		} else {
			return (array) $_wp_query->posts;
		}
	}

	if ( USE_VIEWS_RANGE_TABLE && exists_table_views() ) {
		// 期間指定をグローバル変数にセット
		$GLOBALS['_view_range'] = $view_range;

		// posts_clausesフィルター追加
		add_filter( 'posts_clauses', '_get_posts_views_ranking_posts_clauses', 999, 2 );

		// WP Query実行
		$_wp_query = new WP_Query( $query_args );

		// posts_clausesフィルター削除
		remove_filter( 'posts_clauses', '_get_posts_views_ranking_posts_clauses', 999, 2 );

		// グローバル変数の期間指定を削除
		unset( $GLOBALS['_view_range'] );

		// ランダム対応
		if ( !empty( $query_args['orderby'] ) && 'rand' === $query_args['orderby'] && $_wp_query->posts ) {
			mt_shuffle( $_wp_query->posts );
		}

		if ( 'wp_query' === $output ) {
			return $_wp_query;
		} else {
			return (array) $_wp_query->posts;
		}
	}

	if ( 'wp_query' === $output ) {
		$_wp_query = new WP_Query();
		return $_wp_query;
	} else {
		return array();
	}
}

/**
 * アクセス数ランキング記事一覧取得用posts_clausesフィルター
 */
function _get_posts_views_ranking_posts_clauses( $clauses, $wp_query ) {
	if ( USE_VIEWS_RANGE_TABLE && exists_table_views() ) {
		// グローバル変数に期間指定があれば
		if ( isset( $GLOBALS['_view_range'] ) ) {
			$view_range = $GLOBALS['_view_range'];

			global $wpdb;

			// テーブル名
			$tablename = $wpdb->prefix . 'tcd_post_views';

			// fields
			$clauses['fields'] .= ", COUNT(DISTINCT post_views.id) AS views";

			// join
			$clauses['join'] .= " INNER JOIN {$tablename} AS post_views ON ({$wpdb->posts}.ID = post_views.post_id)";

			// groupby
			$clauses['groupby'] = "{$wpdb->posts}.ID";

			// orderby
			$clauses['orderby'] = "views DESC, " . $clauses['orderby'];

			// 期間指定値からfrom日時タイムスタンプ計算
			if ( in_array( $view_range, array( '24h', 'day', 'daily' ) ) ) {
				$from_ts = current_time( 'timestamp', true ) - DAY_IN_SECONDS;
			} elseif ( in_array( $view_range, array( 'week', 'weekly' ) ) ) {
				$from_ts = current_time( 'timestamp', true ) - WEEK_IN_SECONDS;
			} elseif ( in_array( $view_range, array( 'month', 'monthly' ) ) ) {
				$from_ts = strtotime( '-1 month', current_time( 'timestamp', true ) );
			} elseif ( in_array( $view_range, array( 'year', 'yearly' ) ) ) {
				$from_ts = current_time( 'timestamp', true ) - YEAR_IN_SECONDS;
			} else {
				$from_ts = null;
			}

			if ( $from_ts ) {
				// where
				$clauses['where'] .= " AND post_views.datetime_gmt >= '" . date( 'Y-m-d H:i:s', $from_ts ) . "'";
			}
		}
	}

	return $clauses;
}

/**
 * shuffle()の偏り対策
 */
if ( ! function_exists( 'mt_shuffle' ) ) :
	function mt_shuffle( array &$array ) {
		$array = array_values( $array );
		for ( $i = count( $array ) - 1; $i > 0; --$i ) {
			$j = mt_rand( 0, $i );
			if ( $i !== $j ) {
				list( $array[$i], $array[$j] ) = array( $array[$j], $array[$i] );
			}
		}
	}
endif;

/**
 * アクセス数メタボックス追加
 */
function add_views_meta_box() {
	add_meta_box(
		'views',
		__( 'Views', 'tcd-w' ),
		'show_views_meta_box',
		get_post_views_post_types(),
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_views_meta_box' );

/**
 * アクセス数メタボックス表示
 */
function show_views_meta_box() {
	global $post;

	if ( USE_VIEWS_CUSTOM_FIELD && VIEWS_CUSTOM_FIELD_EDITABLE ) :
?>
<input type="hidden" name="views_meta_box_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />
<p>
	<input type="number" name="_views" value="<?php echo intval( get_post_meta( $post->ID, '_views', true ) ); ?>" class="large-text" readonly="readonly" />
	<label><input type="checkbox" name="edit_views" value="1" /><?php _e( 'Edit views', 'tcd-w' ); ?></label>
</p>
<script>
jQuery(document).ready(function($){
	$(':checkbox[name="edit_views"]').change(function(){
		if (this.checked) {
			$(this).closest('.inside').find('input[name="_views"]').removeAttr('readonly');
		} else {
			$(this).closest('.inside').find('input[name="_views"]').attr('readonly', 'readonly');
		}
	});
});
</script>
<?php
	endif;

	$html = '';

	if ( USE_VIEWS_CUSTOM_FIELD && ! VIEWS_CUSTOM_FIELD_EDITABLE ) {
		$html .= '<tr><td>' . __( 'Total views', 'tcd-w' ) . '</td><td class="textright">' . intval( get_post_meta( $post->ID, '_views', true ) ) . "</td></tr>\n";
	} elseif ( ! USE_VIEWS_CUSTOM_FIELD && USE_VIEWS_RANGE_TABLE ) {
		$html .= '<tr><td>' . __( 'Total views', 'tcd-w' ) . '</td><td class="textright">' . get_post_views( $post->ID, '' ) . "</td></tr>\n";
	}

	if ( USE_VIEWS_RANGE_TABLE ) {
		$html .= '<tr><td>' . __( 'Daily views', 'tcd-w' ) . '</td><td class="textright">' . get_post_views( $post->ID, 'daily' ) . "</td></tr>\n";
		$html .= '<tr><td>' . __( 'Weekly views', 'tcd-w' ) . '</td><td class="textright">' . get_post_views( $post->ID, 'weekly' ) . "</td></tr>\n";
		$html .= '<tr><td>' . __( 'Monthly views', 'tcd-w' ) . '</td><td class="textright">' . get_post_views( $post->ID, 'monthly' ) . "</td></tr>\n";
		$html .= '<tr><td>' . __( 'Yearly views', 'tcd-w' ) . '</td><td class="textright">' . get_post_views( $post->ID, 'yearly' ) . "</td></tr>\n";
	}

	if ( $html ) {
		echo "<table class=\"widefat\">\n" . $html . "</table>\n";
	}
}

/**
 * アクセス数メタボックス保存
 */
function save_views_meta_box( $post_id ) {
	if ( ! USE_VIEWS_CUSTOM_FIELD ) {
		return $post_id;
	}

	// verify nonce
	if ( ! isset( $_POST['views_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['views_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// save
	if ( ! empty( $_POST['edit_views'] ) && isset( $_POST['_views'] ) ) {
		update_post_meta( $post_id, '_views', intval( $_POST['_views'] ) );
	} elseif ( '' === get_post_meta( $post_id, '_views', true ) ) {
		update_post_meta( $post_id, '_views', 0 );
	}

	return $post_id;
}
add_action( 'save_post', 'save_views_meta_box' );


/**
 * カスタムフィールドのアクセス数をクイック編集で変更可能にするフラグ
 */
if ( VIEWS_CUSTOM_FIELD_QUICKEDITABLE && USE_VIEWS_CUSTOM_FIELD ) :

	/**
	 * クイック編集に項目を追加
	 */
	function views_quick_edit_custom_box( $column_name, $post_type ) {
		if ( ! in_array( $post_type, get_post_views_post_types() ) ) {
			return false;
		}

		// 1度だけ出力させる
		static $print_nonce = true;
		if ( $print_nonce ) {
			$print_nonce = false;
?>
<input type="hidden" name="views_meta_box_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />
<fieldset class="inline-edit-col-right">
	<div class="inline-edit-col column-views">
		<div class="inline-edit-group">
			<label class="inline-edit-views" style="float:left;margin-right:1em;">
				<span class="title"><?php _e( 'Views', 'tcd-w' ); ?></span>
				<span class="input-text-wrap"><input type="number" name="_views" value="" readonly="readonly" style="width:6em;" />
			</label>
			<label class="inline-edit-views" style="padding-top:0.2em;">
				<input type="checkbox" name="edit_views" value="1" /> <?php _e( 'Edit views', 'tcd-w' ); ?>
			</label>
		</div>
	</div>
</fieldset>
<?php
		}
	}
	add_action( 'quick_edit_custom_box', 'views_quick_edit_custom_box', 20, 2 );

	/**
	 * クイック編集用でフォームに差し込む値
	 * get_inline_dataにはフィルターがないためpost_row_actionsで処理
	 * quick_edit.php内の処理より後に実行し、$actions['custom_quick_edit_values']に追記すること
	 */
	function views_custom_quick_edit_values( $actions, $post ) {
		if ( ! in_array( $post->post_type, get_post_views_post_types() ) ) {
			return $actions;
		}

		if ( ! isset( $actions['custom_quick_edit_values'] ) ) {
			$actions['custom_quick_edit_values'] = '';
		}
		$actions['custom_quick_edit_values'] .= '<div class="hidden"><div class="_views">' . esc_html( intval( get_post_meta( $post->ID, '_views', true ) ) ) . '</div></div>';
		return $actions;
	}
	add_action( 'post_row_actions', 'views_custom_quick_edit_values', 100, 2 );
	add_action( 'page_row_actions', 'views_custom_quick_edit_values', 100, 2 );

	/**
	 * クイック編集用js
	 * 別途quick_edit.phpのjs出力が必要
	 */
	function views_quick_edit_js() {
?>
<script>
jQuery(function($){
	$(':checkbox[name="edit_views"]').change(function(){
		if (this.checked) {
			$(this).closest('.column-views').find('input[name="_views"]').removeAttr('readonly');
		} else {
			$(this).closest('.column-views').find('input[name="_views"]').attr('readonly', 'readonly');
		}
	});
});
</script>
	<?php
	}
	add_action( 'admin_footer-edit.php', 'views_quick_edit_js' );

endif;


/**
 * カスタムフィールドのアクセス数を一覧カラムに表示するフラグ
 */
if ( SHOW_VIEWS_CUSTOM_FIELD_ADMIN_COLMUN && USE_VIEWS_CUSTOM_FIELD ) :

	/**
	 * 一覧カラムinit
	 */
	function views_admin_colmun_init() {
		foreach ( get_post_views_post_types() as $post_type ) {
			add_filter( 'manage_' . $post_type . '_posts_columns', 'cf_views_posts_columns', 10 );
			add_action( 'manage_' . $post_type . '_posts_custom_column', 'cf_views_posts_custom_column', 10, 2 );
			add_filter( 'manage_edit-' . $post_type . '_sortable_columns', 'cf_views_sortable_columns', 10 );
		}

		add_action( 'parse_query', 'cf_views_sortable_columns_query', 20 );
	}
	add_action( 'admin_init', 'views_admin_colmun_init' );

	/**
	 * 一覧カラム追加
	 */
	function cf_views_posts_columns( $columns ){
		$columns['views'] = __( 'Views', 'tcd-w' );
		return $columns;
	}

	/**
	 * 一覧カラム表示
	 */
	function cf_views_posts_custom_column( $column_name, $post_id ){
		if ( 'views' === $column_name ) {
			echo intval( get_post_meta( $post_id, '_views', true ) );
		}
	}

	/**
	 * 一覧ソートカラム
	 */
	function cf_views_sortable_columns( $sortable_columns ) {
		$sortable_columns['views'] = 'views';
		return $sortable_columns;
	}

	/**
	 * ソートクエリー
	 */
	function cf_views_sortable_columns_query( $wp_query ) {
		// 管理画面のメインクエリー以外は終了
		if ( ! is_admin() || ! $wp_query->is_main_query() ) return;

		// アクセス数ソート
		if ( isset( $_REQUEST['orderby'] ) && 'views' === $_REQUEST['orderby'] ) {
			$wp_query->set( 'orderby', 'meta_value_num' );
			$wp_query->set( 'meta_key', '_views' );
		}
	}

endif;


/**
 * 期間アクセス数テーブル存在チェック
 */
function exists_table_views() {
	global $wpdb;

	// テーブル名
	$tablename = $wpdb->prefix . 'tcd_post_views';

	// テーブルあり
	if ( $wpdb->get_var( "show tables like '{$tablename}'" ) == $tablename ) {
		return true;
	}

	return false;
}

/**
 * 期間アクセス数テーブルを使用するフラグ
 */
if ( USE_VIEWS_RANGE_TABLE ) :

	/**
	 * テーブル作成
	 */
	function create_table_views() {
		// セキュリティ確保の為権限チェック
		if ( ! current_user_can( 'edit_themes' ) ) {
			return false;
		}

		global $wpdb;

		// テーブル名
		$tablename = $wpdb->prefix . 'tcd_post_views';

		// テーブルあり
		if ( $wpdb->get_var( "show tables like '{$tablename}'" ) == $tablename ) {
			return true;
		}

		// テーブルが存在しなければテーブル作成
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE `{$tablename}` (
			`id` bigint unsigned NOT NULL AUTO_INCREMENT,
			`post_id` bigint unsigned NOT NULL DEFAULT '0',
			`datetime_gmt` datetime DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `post_id` (`post_id`),
			KEY `datetime_gmt` (`datetime_gmt`)
		) {$charset_collate} ;";

		dbDelta( $sql );

		if ( $wpdb->get_var( "show tables like '{$tablename}' ") == $tablename ) {
			return true;
		}

		return false;
	}
	add_action( 'admin_init', 'create_table_views' );

	/**
	 * レコード追加
	 */
	function insert_table_views( $post_id ) {
		if ( ! exists_table_views() ) return false;

		global $wpdb;

		// テーブル名
		$tablename = $wpdb->prefix . 'tcd_post_views';

		$post_id = (int) $post_id;
		if ( 0 < $post_id ) {
			return $wpdb->insert(
				$tablename,
				array(
					'post_id' => $post_id,
					'datetime_gmt' => current_time( 'mysql', true )
				),
				array(
					'%d',
					'%s'
				)
			);
		}

		return false;
	}

endif;


/**
 * キャッシュ系プラグイン対策でajaxでのアクセス数カウントアップ用js出力
 */
function views_wp_footer() {
	$post_views_post_types = get_post_views_post_types();
	$views_count_up = false;

	if ( $post_views_post_types ) { 
		if ( is_singular( $post_views_post_types ) ) {
			$views_count_up = true;
		}
	} else {
		if ( is_singular() || is_front_page() || is_home() ) {
			$views_count_up = true;
		}
	}

	if ( $views_count_up ) {
		wp_reset_query();
		$queried_object = get_queried_object();
		if ( ! empty( $queried_object->ID ) ) {
?>
<script>
jQuery(function($) {
	jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>',{ action: 'views_count_up', post_id: <?php echo (int) $queried_object->ID; ?>, nonce: '<?php echo wp_create_nonce( 'views_count_up' ); ?>'});
});
</script>
<?php
		}
	}
}
add_action( 'wp_footer', 'views_wp_footer', 20 );


/**
 * ajaxでのアクセス数カウントアップ
 */
function ajax_views_count_up() {
	if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) return;

	if ( isset( $_POST['post_id'], $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'views_count_up' ) ) {
		$post_id = (int) $_POST['post_id'];
		if ( 0 < $post_id && in_array( get_post_status( $post_id ), array( 'publish', 'private' ) ) ) {
			if ( USE_VIEWS_RANGE_TABLE ) {
				insert_table_views( $post_id );
			}
			if ( USE_VIEWS_CUSTOM_FIELD ) {
				update_post_meta( $post_id, '_views', intval( get_post_meta( $post_id, '_views', true ) ) + 1 );
			}
			echo 'Done';
		} else {
			echo 'Failure';
		}
		exit();
	}
}
add_action( 'wp_ajax_views_count_up', 'ajax_views_count_up' );
add_action( 'wp_ajax_nopriv_views_count_up', 'ajax_views_count_up' );
