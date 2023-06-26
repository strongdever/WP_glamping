jQuery(document).ready(function($){
	// 設定チェック
	if (typeof pagenow == 'undefined' || typeof lp_builder_setting == 'undefined') return;
	if (typeof lp_builder_setting.toggle_metaboxes_selector != 'string') lp_builder_setting.toggle_metaboxes_selector = '';

	// 固定ページ以外は終了
	if (pagenow != 'page') return;

	// ページテンプレート変更
	$('select#page_template').change(function(){
		// lpの場合
		if (this.value == lp_builder_setting.page_template_lp_slug) {
			$('#'+lp_builder_setting.meta_box_id).show().removeClass('closed');
			$(lp_builder_setting.toggle_metaboxes_selector).hide();
		} else {
			$('#'+lp_builder_setting.meta_box_id).hide();
			$(lp_builder_setting.toggle_metaboxes_selector).show();
			$(window).trigger('resize');
		}
	}).trigger('change');

	// LPビルダー ソータブル
	$('#lp_builder').sortable({
		handle: '.lpb_move'
	});

	// LPビルダー コンテンツ追加
	var clone_next = 0;
	$('#lpb_add_row_buttton_area .add_row_buttton').click(function(){
		var clone_html = $('#lp_builder-clone .lpb_row').get(0).outerHTML;
		clone_html = clone_html.replace(/lpb_content_cloneindex/g, 'add_' + clone_next);
		clone_next++;
		$('#lp_builder').append(clone_html);
	});

	// LPビルダー コンテンツプルダウン変更
	$('#lp_builder').on('change', '.lpb_content_select', function(){
		var $lpb_column = $(this).closest('.lpb_column');
		var lpb_index = $lpb_column.find('.lpb_index').val();
		$lpb_column.find('.lpb_content_wrap').remove();

		if (!$(this).val() || !lpb_index) return;

		var $clone = $('#lp_builder-clone > .lpb_content_wrap-' + $(this).val());
		if (!$clone.length) return;
		$(this).hide();

		var clone_html = $clone.get(0).outerHTML;
		clone_html = clone_html.replace(/lpb_content_cloneindex/g, lpb_index);
		$lpb_column.append(clone_html);
		$lpb_column.find('.lpb_content_wrap').addClass('open').show();

		// リッチエディターがある場合
		if ($lpb_column.find('.lpb_content .wp-editor-area').length) {
			// クローン元のリッチエディターをループ
			$clone.find('.lpb_content .wp-editor-area').each(function(){
				// id
				var id_clone = $(this).attr('id');
				var id_new = id_clone.replace(/lpb_content_cloneindex/g, lpb_index);

				// クローン元のmceInitをコピー置換
				if (typeof tinyMCEPreInit.mceInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_clone]);
					mce_init_new.body_class = mce_init_new.body_class.replace(/lpb_content_cloneindex/g, lpb_index);
					mce_init_new.selector = mce_init_new.selector.replace(/lpb_content_cloneindex/g, lpb_index);
					tinyMCEPreInit.mceInit[id_new] = mce_init_new;

					// リッチエディター化
					tinymce.init(mce_init_new);
				}

				// クローン元のqtInitをコピー置換
				if (typeof tinyMCEPreInit.qtInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_clone]);
					qt_init_new.id = qt_init_new.id.replace(/lpb_content_cloneindex/g, lpb_index);
					tinyMCEPreInit.qtInit[id_new] = qt_init_new;

					// テキスト入力のタグボタン有効化
					quicktags(tinyMCEPreInit.qtInit[id_new]);
					try {
						if (QTags.instances['0'].theButtons) {
							QTags.instances[id_new].theButtons = QTags.instances['0'].theButtons;
						}
					} catch(err) {
					}
				}

				// ビジュアルボタンがあればビジュアル/テキストをビジュアル状態に
				if ($lpb_column.find('.wp-editor-tabs .switch-tmce').length) {
					$lpb_column.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
				}
			});
		}

		// jscolorが含まれる場合jscolor化
		$lpb_column.find('.lpb_content_wrap input.color').each(function(){
			this.color = new jscolor.color(this);
		});

		// コンテンツ内テーブルリピーターソータブル
		if ($lpb_column.find('.lpb_content .lpb_table_repeater-sortable').length) {
			table_repeater_sortable();
		}
	});

	// LPビルダー コンテンツ削除
	$('#lp_builder').on('click', '.lpb_delete', function(){
		var del = true;
		var confirm_message = $(this).closest('#lp_builder').attr('data-delete-confirm');
		if (confirm_message) {
			del = confirm(confirm_message);
		}
		if (del) {
			$(this).closest('.lpb_row').remove();
		}
	});

	// LPビルダー コンテンツの開閉
	$('#lp_builder').on('click', '.lpb_content_headline', function(){
		$(this).parents('.lpb_content_wrap').toggleClass('open');
		return false;
	});
	$('#lp_builder').on('click', 'a.close-content', function(){
		$(this).parents('.lpb_content_wrap').toggleClass('open');
		return false;
	});

	// LPビルダー コンテンツ名の変更
	$('#lp_builder').on('change keyup', '.change_content_headline', function(){
		var overview = $(this).val();
		if (overview) {
			overview = overview.replace(/\s+/gm, ' ').replace(/<.*?>/gm, '');
		}
		if (overview.length > 100) {
			overview = overview.substring(0, 99) + '…';
		}
		$(this).closest('.lpb_content_wrap').find('.lpb_content_headline span').text(overview);
	});
	$('#lp_builder .change_content_headline').trigger('change');

	// LPビルダー コンテンツID選択
	$('#lp_builder').on('focus', '.lpb_content_id', function(){
		this.select();
	});

	// LPビルダー コンテンツ内テーブルリピーターソータブル
	var table_repeater_sortable = function(){
		$('#lp_builder .lpb_table_repeater-sortable').not('.ui-sortable').find('tbody').sortable({
			forceHelperSize: true,
			forcePlaceholderSize: true,
			distance: 10,
			start: function(event, ui) {
				$(ui.helper).find('th,td').each(function(i,b){
					$(this).width($(ui.placeholder).find('th,td').eq(i).width());
				});
				$(ui.placeholder).height($(ui.helper).height());
			}
		});
	};
	table_repeater_sortable();

	// LPビルダー コンテンツ内テーブルリピーター行追加
	var next_index = 10000;
	$('#lp_builder').on('click', '.lpb_table_repeater_wrapper .button-add-row', function(){
		var clone = $(this).attr('data-clone');
		var $repeater_container = $(this).closest('.lpb_table_repeater_wrapper').find('.lpb_table_repeater tbody');
		if (clone && $repeater_container.length) {
			next_index++;
			clone = clone.replace(/repeater_addindex/g, next_index);
			$repeater_container.append(clone.replace(/repeater_addindex/g, next_index));

			// jscolorが含まれる場合jscolor化
			$repeater_container.find('.lpb_table_repeater_item-'+next_index+' input.color').each(function(){
				this.color = new jscolor.color(this);
			});
		}
		return false;
	});

	// LPビルダー コンテンツ内テーブルリピーター行削除
	$('#lp_builder').on('click', '.lpb_table_repeater .button-delete-row', function(){
		var del = true;
		var confirm_message = $(this).closest('.lpb_table_repeater').attr('data-delete-confirm');
		if (confirm_message) {
			del = confirm(confirm_message);
		}
		if (del) {
			$(this).closest('tr').remove();
		}
		return false;
	});

	// 画像キャプション
	$('#lp_builder').on('change', '.lpb_content_wrap-image .lpb_image_show_caption:checkbox', function(){
		var $lpb_content = $(this).closest('.lpb_content');
		if (this.checked) {
			$lpb_content.find('.lpb_image_catch_wrap').show();
		} else {
			$lpb_content.find('.lpb_image_catch_wrap').hide();
		}
	});
	$('#lp_builder .lpb_content_wrap-image .lpb_image_show_caption:checkbox').trigger('change');

	// マップタイプ
	$('#lp_builder').on('change', '.lpb_content_wrap-access .lpb_access_map_type:radio', function(){
		var $lpb_content = $(this).closest('.lpb_content');
		var checked_value = $lpb_content.find('.lpb_access_map_type:checked').val();
		if (checked_value == 'type2') {
			$lpb_content.find('.lpb_access_map_type1_wrap').hide();
			$lpb_content.find('.lpb_access_map_type2_wrap').show();
		} else {
			$lpb_content.find('.lpb_access_map_type2_wrap').hide();
			$lpb_content.find('.lpb_access_map_type1_wrap').show();
		}
	});
	$('#lp_builder .lpb_content_wrap-access .lpb_access_map_type:radio:checked').trigger('change');
});
