jQuery(document).ready(function($){

	// リピーター ソータブル
	$('.repeater_wrap .repeater_sortable').sortable({
		handle: '.repeater_move'
	});

	// リピーター アコーディオンの開閉
	$('.repeater_wrap').on('click', '.repeater_headline', function(){
		$(this).parents('.repeater').toggleClass('open');
		return false;
	});
	$('.repeater_wrap').on('click', '.repeater_headline a', function(){
		$(this).parents('.repeater').toggleClass('open');
		return false;
	});

	// リピーター タブ名
	$('.repeater_wrap').on('change keyup', '.repeater .index_label:input', function(){
		$(this).closest('.repeater').find('span.index_label').text($(this).val());
	});

	// リピーター 追加ボタン
	$('.repeater_wrap').on('click', '.add_repeater', function(){
		var $wrap = $(this).closest('.repeater_wrap');
		var html = $wrap.find('.add_repeater_clone').html();
		var next_index = parseInt($wrap.attr('data-rows')) || 1000;

		next_index++;
		$wrap.find('.repeater_sortable').append(html.replace(/addindex/g, next_index));
		$wrap.attr('data-rows', next_index);

		// リッチエディターがある場合
		if (html.indexOf('wp-editor-area') > -1) {
			var $clone_editors = $wrap.find('.add_repeater_clone')
			var $row = $wrap.find('.repeater-'+next_index);

			// クローン元のリッチエディターをループ
			$wrap.find('.add_repeater_clone .wp-editor-area').each(function(){
				// id
				var id_clone = $(this).attr('id');
				var id_new = id_clone.replace(/addindex/g, next_index);

				// クローン元のmceInitをコピー置換
				if (typeof tinyMCEPreInit.mceInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var mce_init_new = $.extend(true, {}, tinyMCEPreInit.mceInit[id_clone]);
					mce_init_new.body_class = mce_init_new.body_class.replace(/addindex/g, next_index);
					mce_init_new.selector = mce_init_new.selector.replace(/addindex/g, next_index);
					tinyMCEPreInit.mceInit[id_new] = mce_init_new;

					// リッチエディター化
					tinymce.init(mce_init_new);
				}

				// クローン元のqtInitをコピー置換
				if (typeof tinyMCEPreInit.qtInit[id_clone] != 'undefined') {
					// オブジェクトを=で代入すると参照渡しになるため$.extendを利用
					var qt_init_new = $.extend(true, {}, tinyMCEPreInit.qtInit[id_clone]);
					qt_init_new.id = qt_init_new.id.replace(/addindex/g, next_index);
					tinyMCEPreInit.qtInit[id_new] = qt_init_new;

					// リッチエディター化
					quicktags(tinyMCEPreInit.qtInit[id_new]);
				}

				// ビジュアル/テキストをビジュアル状態に
				$row.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
			});
		}

		$(this).blur();
		return false;
	});

	// リピーター 削除ボタン
	$('.repeater_wrap').on('click', '.repeater_delete', function(){
		var del = true;
		if ($(this).attr('data-confirm')) {
			del = confirm($(this).attr('data-confirm'));
		}
		if (del) {
			$(this).closest('.repeater').fadeOut('fast', function(){
				$(this).remove();
			});
		}
		return false;
	});

	// リピーター ショートコードフォーカス
	$('.repeater_short_code input:text').focus(function(){
		this.select();
	});

});