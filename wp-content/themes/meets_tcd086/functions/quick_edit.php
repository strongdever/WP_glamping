<?php

// クイック編集に項目を追加
function custom_quick_edit( $column_name, $post_type ) {
  // クイック編集項目と$column_nameと同じではないため一致しているないため1度だけ出力させる
  static $print_nonce = true;
  if ( $print_nonce ) {
    $print_nonce = false;

    // seo
    if ( in_array( $post_type, array( 'post', 'page', 'news', 'gallery' ) ) ) {
      echo '<input type="hidden" name="seo_meta_box_nonce" value="', wp_create_nonce( 'seo.php' ), '" />';
?>
<fieldset class="inline-edit-col-left" style="clear:both;">
  <div class="inline-edit-col column-meta-seo">
    <div class="inline-edit-group">
      <label class="inline-edit-tcd-w_meta_title">
        <span class="title"><?php _e('Title tag', 'tcd-w'); ?></span>
        <span class="input-text-wrap"><input type="text" name="tcd-w_meta_title" value="" /></span>
      </label>
      <label class="inline-edit-tcd-w_meta_description">
        <span class="title" style="line-height:1.5;"><?php _e('Meta description tag', 'tcd-w');  ?></span>
        <span class="input-text-wrap"><textarea name="tcd-w_meta_description" rows="2" cols="30"></textarea></span>
    </div>
  </div>
</fieldset>
<?php
    }

    // recommend
    if ( $post_type == 'post' ) {
      echo '<input type="hidden" name="recommend_post_meta_box_nonce" value="', wp_create_nonce( 'recommend.php' ), '" />';
?>
<fieldset class="inline-edit-col-right">
  <div class="inline-edit-col column-recommend">
    <div class="inline-edit-group">
      <label style="line-height:1.5;"><input type="checkbox" name="recommend_post" value="on" /> <?php _e( 'Show this post for recommend post', 'tcd-w' );  ?></label>
      <label style="line-height:1.5;"><input type="checkbox" name="recommend_post2" value="on" /> <?php _e( 'Show this post for recommend post2', 'tcd-w' );  ?></label>
      <label style="line-height:1.5;"><input type="checkbox" name="featured_post" value="on" /> <?php _e( 'Show this post for featured post', 'tcd-w' );  ?></label>
    </div>
  </div>
</fieldset>
<?php
    }

  }
}
add_action( 'quick_edit_custom_box', 'custom_quick_edit', 10, 2 );

// クイック編集用js
function custom_quick_edit_js() {
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  var $wp_inline_edit = inlineEditPost.edit;
  inlineEditPost.edit = function(id) {
    $wp_inline_edit.apply(this, arguments);
    var $post_id = 0;
    if (typeof(id) == 'object') {
      $post_id = parseInt(this.getId(id));
    }
    if ($post_id > 0) {
      var $edit_row = $('#edit-' + $post_id);
      var $post_row = $('#post-' + $post_id);
      $post_row.find('.custom_quick_edit_values > div > div').each(function(){
        var key = $(this).attr('class');
        var value = $(this).text();
        var $input = $edit_row.find('[name="' + key + '"]');
        if ($input.is('textarea')) {
          $input.html(value);
        } else if ($input.attr('type') == 'checkbox') {
          if (value) {
            $input.attr('checked', 'checked');
          } else {
            $input.removeAttr('checked');
          }
        } else {
          $input.val(value);
        }
      });
    }
  };

<?php /* 行アクションの最後に不要な「 | 」が表示されるため削除 */  ?>
  var prev_pipe_delete =  function () {
    $('.row-actions .custom_quick_edit_values:not(.prev_pipe_deleted)').each(function(){
      var $prev = $(this).prev();
      $prev.html($prev.html().replace(/ \| $/, ''));
      $(this).addClass('prev_pipe_deleted');
    });
  };
  $('.wp-list-table').on('click', 'a.editinline', function(){
    setInterval(prev_pipe_delete, 5000);
  });
  prev_pipe_delete();
});
</script>
<style>
 .widefat th.column-post_id, .widefat td.column-post_id { padding-left:0; padding-right:0; width:2.75em; }
th.sortable.column-post_id a, th.sorted.column-post_id a { padding-left:0; padding-right:0; }
</style>
<?php
}
add_action( 'admin_footer-edit.php', 'custom_quick_edit_js' );

// クイック編集用でフォームに差し込む値
// get_inline_dataにはフィルターがないためpost_row_actionsで処理
function custom_quick_edit_values( $actions, $post ) {
	$meta_keys = array();

	// seo
    if ( in_array( $post->post_type, array( 'post', 'page', 'news', 'gallery' ) ) ) {
		$meta_keys = array_merge( $meta_keys, array( 'tcd-w_meta_title', 'tcd-w_meta_description' ) );
	}

    // recommend
    if ( $post->post_type == 'post' ) {
		$meta_keys = array_merge( $meta_keys,  array( 'recommend_post', 'recommend_post2', 'featured_post' ) );
	}

	if ( $meta_keys ) {
		$output = '';
		foreach( $meta_keys as $meta_key ) {
			$output .= '<div class="'.esc_attr( $meta_key ).'">'.esc_html( get_post_meta( $post->ID, $meta_key, true ) ).'</div>';
		}
		if ( $output ) {
			$actions['custom_quick_edit_values'] = '<div class="hidden">'.$output.'</div>';
		}
	}

	return $actions;
}
add_action( 'post_row_actions', 'custom_quick_edit_values', 99, 2 );
add_action( 'page_row_actions', 'custom_quick_edit_values', 99, 2 );


// 記事一覧に追加カラムが無い場合quick_edit_custom_boxアクションが動作しないためIDカラムを追加
function custom_quick_edit_manage_columns( $columns ) {
	// デフォルト以外のカラムがあれば終了
	$core_columns = array( 'cb' => true, 'date' => true, 'title' => true, 'categories' => true, 'tags' => true, 'comments' => true, 'author' => true );
	foreach ( $columns as $column_name => $column_display_name ) {
		if ( ! isset( $core_columns[$column_name] ) ) {
			return $columns;
		}
	}

	$new_columns = array();

	foreach ( $columns as $column_name => $column_display_name ) {
		// チェックボックスが無い場合タイトルの前にID追加
		if ( ! isset( $columns['cb'] ) && isset( $columns['title'] ) && $column_name == 'title') {
			$new_columns['post_id'] = 'ID';
		}

		$new_columns[$column_name] = $column_display_name;

		// チェックボックスの後ろにID追加
		if ( isset( $columns['cb'] ) && $column_name == 'cb' ) {
			$new_columns['post_id'] = 'ID';
		}
	}

	// IDが追加されていなければ追加
	if ( ! isset( $columns['post_id'] ) ) {
		$new_columns['post_id'] = 'ID';
	}

	return $new_columns;
}
function custom_quick_edit_manage_custom_column( $column_name, $post_id ) {
	if ( $column_name == 'post_id' ) {
		echo $post_id;
	}
}
add_filter( 'manage_posts_columns', 'custom_quick_edit_manage_columns', 100);
add_filter( 'manage_pages_columns', 'custom_quick_edit_manage_columns', 100);
add_action( 'manage_posts_custom_column', 'custom_quick_edit_manage_custom_column', 10, 2 );
add_action( 'manage_pages_custom_column', 'custom_quick_edit_manage_custom_column', 10, 2 );

/*
function custom_quick_edit_sortable_columns( $sortable_columns ) {
	$sortable_columns['post_id'] = 'ID';
	return $sortable_columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'custom_quick_edit_sortable_columns' );
add_filter( 'manage_edit-page_sortable_columns', 'custom_quick_edit_sortable_columns' );
*/

?>