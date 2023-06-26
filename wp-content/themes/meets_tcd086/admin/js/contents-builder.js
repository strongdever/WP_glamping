jQuery(document).ready(function($){

	// コンテンツビルダー ソータブル
	$('#contents_builder').sortable({
		handle: '.cb_move'
	});

	// コンテンツビルダー ソータブル
	$('#contents_builder ').sortable({
		handle: '.cb_move'
	});

	// コンテンツビルダー クローンインデックス
	var clone_next = 1;

	// コンテンツビルダー 行追加
	$('#cb_add_row_buttton_area .add_row').click(function(){
		var clone_html = $('#contents_builder-clone > .cb_row').get(0).outerHTML;
		clone_html = clone_html.replace(/cb_cloneindex/g, 'add_' + clone_next);
		clone_next++;
		$('#contents_builder').append(clone_html);
	});

	// コンテンツプルダウン変更
	$('#contents_builder').on('change', '.cb_content_select', function(){
		var $cb_column = $(this).closest('.cb_column');
		var cb_index = $cb_column.find('.cb_index').val();
		$cb_column.find('.cb_content_wrap').remove();

		if (!$(this).val() || !cb_index) return;

		var $clone = $('#contents_builder-clone > .cb_content-' + $(this).val());
		if (!$clone.length) return;
		$(this).hide();

		var clone_html = $clone.get(0).outerHTML;
		clone_html = clone_html.replace(/cb_cloneindex/g, cb_index);
		$cb_column.append(clone_html);
		$cb_column.find('.cb_content_wrap').addClass('open').show();

		// リッチエディターがある場合
		if ($cb_column.find('.cb_content .wp-editor-area').length) {
			// クローン元のリッチエディターをループ
			$clone.find('.cb_content .wp-editor-area').each(function(){
				// id
				var id_clone = $(this).attr('id');
				var id_new = id_clone.replace(/cb_cloneindex/g, cb_index);

				// クローン元のmceInitをコピー置換
				if (typeof tinyMCEPreInit.mceInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_clone]);
					mce_init_new.body_class = mce_init_new.body_class.replace(/cb_cloneindex/g, cb_index);
					mce_init_new.selector = mce_init_new.selector.replace(/cb_cloneindex/g, cb_index);
					tinyMCEPreInit.mceInit[id_new] = mce_init_new;

					// リッチエディター化
					tinymce.init(mce_init_new);
				}

				// クローン元のqtInitをコピー置換
				if (typeof tinyMCEPreInit.qtInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_clone]);
					qt_init_new.id = qt_init_new.id.replace(/cb_cloneindex/g, cb_index);
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
				if ($cb_column.find('.wp-editor-tabs .switch-tmce').length) {
					$cb_column.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
				}
			});
		}

		// WordPress Color Picker API
		$cb_column.find('.cb_content_wrap .c-color-picker').each(function(){
			// WordPress Color Picker 解除して再セット
			var $pickercontainer = $(this).closest('.wp-picker-container');
			var $clone = $(this).clone();
			$pickercontainer.after($clone).remove();
			$clone.wpColorPicker();
		});
	});

	// コンテンツ削除
	$('#contents_builder').on('click', '.cb_delete', function(){
		var del = true;
		var confirm_message = $(this).closest('#contents_builder').attr('data-delete-confirm');
		if (confirm_message) {
			del = confirm(confirm_message);
		}
		if (del) {
			$(this).closest('.cb_row').remove();
		}
	});

	// コンテンツの開閉
	$('#contents_builder').on('click', '.cb_content_headline', function(){
		$(this).parents('.cb_content_wrap').toggleClass('open');
		return false;
	});
	$('#contents_builder').on('click', 'a.close-content', function(){
		$(this).parents('.cb_content_wrap').toggleClass('open');
		return false;
	});

	// コンテント見出し変更
	$('#contents_builder').on('change keyup', '.change_content_headline', function(){
		var overview = [];
		$(this).closest('.cb_content_wrap').find('.change_content_headline').each(function(){
			overview.push($(this).val());
		});
		if (overview.length) {
			overview = overview.join(', ');
			overview = overview.replace(/\s+/gm, ' ').replace(/<.*?>/gm, '');
		}
		if (overview.length > 100) {
			overview = overview.substring(0, 99) + '…';
		}
		$(this).closest('.cb_content_wrap').find('.cb_content_headline span').text(overview);
	});
	$('#contents_builder .change_content_headline').trigger('change');

	// PR bg type
	$('#contents_builder').on('change', '.bg_type :radio', function(){
		if (this.checked) {
			var $cl = $(this).closest('.cb_content_wrap');
			$cl.find('[class*="bg_type-"]').hide();
			$cl.find('.bg_type-' + this.value).show();
		}
	});
	$('#contents_builder .bg_type :checked').trigger('change');

});
