jQuery(document).ready(function($) {

	// インプレッション、クリック率、コンバージョン率
	$('#js-footer-cta').on('inview', function(event, isinview) {

		var cta_index;
		if ($(this).hasClass('p-footer-cta--1')) {
			cta_index = 1;
		} else if ($(this).hasClass('p-footer-cta--2')) {
			cta_index = 2;
		} else {
			cta_index = 3;
		}

		if (isinview) {
			$.ajax({
				type: 'post',
				url: tcd_footer_cta.admin_url,
				data: {
					'action' : 'tcd_footer_cta_impression',
					'security' : tcd_footer_cta.ajax_nonce,
					'cta_index' : cta_index
				},
				success: function(response) {
					//console.log('success');
				},
				error: function() {
					//console.log('error');
				},
				complete: function() {
					//console.log('complete');
				}
			});
			// 1度の表示でカウントは1回までのため、inview をオフにする
			$('#js-footer-cta').off('inview');
		}
	});

	// クリック数、クリック率、Cookie
	$('#js-footer-cta__btn').click(function() {

		var cta_index;
		var cta = $(this).parents('#js-footer-cta');

		if (cta.hasClass('p-footer-cta--1')) {
			cta_index = 1;
		} else if (cta.hasClass('p-footer-cta--2')) {
			cta_index = 2;
		} else {
			cta_index = 3;
		}

		$.ajax({
			type: 'post',
			url: tcd_footer_cta.admin_url,
			data: {
				'action' : 'tcd_footer_cta_click',
				'security' : tcd_footer_cta.ajax_nonce,
				'cta_index' : cta_index
			},
			success: function(response) {
				//console.log('success');
			},
			error: function() {
				//console.log('error');
			},
			complete: function() {
				//console.log('complete');
			}
		});
	});

	// コンバージョン、コンバージョン率
	$('#js-footer-cta-conversion').on('inview', function(event, isinview) {

		var cta_index;

		if (isinview) {
			$.ajax({
				type: 'post',
				url: tcd_footer_cta.admin_url,
				data: {
					'action' : 'tcd_footer_cta_conversion',
					'security' : tcd_footer_cta.ajax_nonce,
				},
				success: function(response) {
					//console.log('success');
				},
				error: function() {
					//console.log('error');
				},
				complete: function() {
					//console.log('complete');
				}
			});
			// inview をオフにする
			$('#js-footer-cta-conversion').off('inview');
		}
	});

	// リセット
	$('.js-footer-cta-reset').click(function(event) {

		var table = $(this).parents('.c-ab-table');

		event.preventDefault();

		if (window.confirm(tcd_footer_cta.confirm_text)) {

			// リセットする記事下CTAの番号			
			var cta_index = $(this).data('footer-cta-index');

			$.ajax({
				type: 'post',
				url: tcd_footer_cta.admin_url,
				data: {
					'action' : 'tcd_footer_cta_reset',
					'security' : tcd_footer_cta.ajax_nonce,
					'cta_index' : cta_index
				},
				success: function(response) {
					
					// 見た目上の値を変更すべきテーブルの行を取得
					var abTableRow = table.find('.c-ab-table__row').eq(cta_index);
					
					// インプレッション、クリック数、クリック率の数値を0にする
					abTableRow.find('.c-ab-table__impression').text('0');
					abTableRow.find('.c-ab-table__click').text('0');
					abTableRow.find('.c-ab-table__ctr').text('0%');
					abTableRow.find('.c-ab-table__conversion').text('0');
					abTableRow.find('.c-ab-table__cvr').text('0%');
					
					//console.log('success');
				},
				error: function() {
					//console.log('error');
				},
				complete: function() {
					//console.log('complete');
				}
			});

		}

	});

});
