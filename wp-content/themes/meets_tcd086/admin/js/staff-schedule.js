jQuery(function($){
	var $schedule_calendar = $('#schedule_calendar');

	// color picker init with change event
	var color_picker_change_timer = null
	var color_picker_init = function(el) {
		if (!el) el = '.schedule-color-picker';
		$(el).wpColorPicker({
			change: function(event){
				var self = this
				clearTimeout(color_picker_change_timer);
				color_picker_change_timer = setTimeout(function(){
					$(event.target).trigger('change')
				}, 200);
			}
		});
	};
	color_picker_init();

	// change month
	$schedule_calendar.on('click', '.prev, .next', function(){
		if ($schedule_calendar.hasClass('is-get-calender')) return false;
		$schedule_calendar.addClass('is-get-calender');

		var y = $schedule_calendar.find('.calender-year').val()
		var m = $schedule_calendar.find('.calender-month').val()

		if ($(this).hasClass('prev')) {
			if (m <= 1) {
				m = 12;
				y--;
			} else {
				m--;
			}
		} else {
			if (m >= 12) {
				m = 1;
				y++;
			} else {
				m++;
			}
		}

		// Ajax
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'get_admin_schedule_calender',
				nonce: $schedule_calendar.find('.calender-nonce').val(),
				post_id: $schedule_calendar.attr('data-post-id'),
				year: y,
				month: m
			},
			complete: function() {
				$schedule_calendar.removeClass('is-get-calender');
			},
			success: function(data, textStatus, XMLHttpRequest) {
				if (data.html) {
					$schedule_calendar.html(data.html);
					color_picker_init($schedule_calendar.find('.schedule-color-picker'));
				}
				if (data.message) {
					alert(data.message);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(TCD_MESSAGES.ajaxSubmitError);
			}
		});

		return false;
	});

	// change schedule
	$schedule_calendar.on('change', 'td :input', function(){
		var $td = $(this).closest('td');

		$td.css('backgroundColor', $td.find('.schedule-bg-color').val())

		// Ajax
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'save_admin_schedule_calender',
				nonce: $schedule_calendar.find('.calender-nonce').val(),
				post_id: $schedule_calendar.attr('data-post-id'),
				year: $schedule_calendar.find('.calender-year').val(),
				month: $schedule_calendar.find('.calender-month').val(),
				day: $td.attr('data-day'),
				bg_color: $td.find('.schedule-bg-color').val(),
				memo: $td.find('.schedule-memo').val()
			},
			complete: function() {
				$schedule_calendar.removeClass('is-get-calender');
			},
			success: function(data, textStatus, XMLHttpRequest) {
				if (data.message) {
					alert(data.message);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(TCD_MESSAGES.ajaxSubmitError);
			}
		});
	});

});
