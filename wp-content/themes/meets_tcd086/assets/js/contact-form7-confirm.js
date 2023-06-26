/*
 * Copyright (c) 2012 takashi shinohara
 * this Library is licensed. http://aulta.jp/library/
 * http://aulta.jp/library/wordpress/contactForm7Confirm.html
 * last update: 2012-02-15, 0.0.1.
 */
jQuery(document).ready(function(){
	
	var option = {
		pages : [
			{
				'path' : ['/misomaga/contact/'],
				'button' : {
					'areaClassName' : 'submit-button',	//	<p class="submit-button">[submit "送信する"]</p>
					'confirm' : '<input class="button-confirm" type="button" value="確認画面へ" />',	//	html
					'rewrite' : '<input class="button-rewrite" type="button" value="修正する" />'	//	html
				}
			}
		],
		validates : {
			required : {
				before : '',
				after : 'は必須項目です。'
			},
			email : {
				match : /^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/,
				before : '',
				after : 'が正しい形式ではありません'
			},
			tel : {
				match : /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/,
				before : '',
				after : 'が正しい形式ではありません'
			}
		}
	};
	
	var flg = false;
	for(var i in option.pages){
		var page = option.pages[i];
		for(var j in page.path){
			var path = page.path[j];
			if (path == document.location.pathname){
				flg = true;
				option.page = page;
				break;
			}
		}
	}
	if ( ! flg) return;

	jQuery('form.wpcf7-form')
	.each(function(){
		
		jQuery(this).find('.wpcf7-form-control-wrap')
		.each(function(){
			
			var child = jQuery(this).children(0);
			
			if (child.hasClass('wpcf7-text')){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child
				.change(function(){
					jQuery(this).parent().next().text(
						jQuery(this).val()
					);
				})
				.change()
				;
			} else if (child.get(0).tagName.toLowerCase() == 'textarea'){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child
				.change(function(){
					jQuery(this).parent().next().html(
						jQuery('<span>').text(jQuery(this).val()).html().replace(/\n/g, '<br />')
					);
				})
				.change()
				;
				
			} else if (child.hasClass('wpcf7-number')){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child
				.change(function(){
					jQuery(this).parent().next().text(
						jQuery(this).val()
					);
				})
				.change()
				;
			} else if (child.hasClass('wpcf7-select')){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child
				.change(function(){
					jQuery(this).parent().next().text(
						jQuery(this).find('option[value="' + jQuery(this).val() + '"]').text()
					);
				})
				.change()
				;
			} if (child.hasClass('wpcf7-radio')){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child.find('input[type="radio"]')
				.change(function(){
					jQuery(this).parents('.wpcf7-form-control-wrap').find('input[type="radio"]')
					.each(function(){
						if (this.checked){
							jQuery(this).parents('.wpcf7-form-control-wrap').next().text(
								jQuery(this).parent().text()
							);
						}
					});
				})
				.change()
				;
			} if (child.hasClass('wpcf7-checkbox')){
				jQuery(this)
				.after(
					jQuery('<span>').addClass('wpcf7-form-control-wrap-confirm')
				);
				child.find('input[type="checkbox"]')
				.change(function(){
					var a = [];
					jQuery(this).parents('.wpcf7-form-control-wrap').find('input[type="checkbox"]')
					.each(function(){
						if (this.checked){
							a.push(jQuery('<span>').text(jQuery(this).parent().text()).html());
						}
					});
					jQuery(this).parents('.wpcf7-form-control-wrap').next().html(
						a.join('<br />')
					);
				})
				.change()
				;
			}
			
		});
		
		jQuery('.wrap_error')
		.prepend(
			jQuery('<ul>').addClass('error-messages').hide()
		);
		
		jQuery(this).find('.' + option.page.button.areaClassName)
		.addClass('buttons-area');
		
		jQuery(this).find('.buttons-area')
		.prepend(
			option.page.button.rewrite
		)
		.after(
			jQuery('<p>')
			.addClass('buttons-area-confirm')
			.html(option.page.button.confirm)
		);
		
		jQuery(this).addClass('wpcf7-form-mode-edit');
		jQuery(this).find('.wpcf7-form-control-wrap-confirm').hide();
		jQuery(this).find('.wpcf7-form-control-wrap').show();
		jQuery(this).find('.buttons-area').hide();
		jQuery(this).find('.buttons-area-confirm').show();
		
		jQuery(this).submit(function(){
			jQuery(this).find('.buttons-area input[type="submit"]').hide();
		});
		
		jQuery(this).find('.buttons-area .button-rewrite')
		.click(function(){
			var form = jQuery(this).parents('form.wpcf7-form');
			form.addClass('wpcf7-form-mode-edit').removeClass('wpcf7-form-mode-confirm');
			form.find('.buttons-area input[type="submit"]').show();
			form.find('.wpcf7-response-output').empty().removeClass('wpcf7-mail-sent-ok');
			form.find('.wpcf7-form-control-wrap-confirm').hide();
			form.find('.wpcf7-form-control-wrap').show();
			form.find('.buttons-area').hide();
			form.find('.buttons-area-confirm').show();
			jQuery('html,body').animate({ scrollTop: form.offset().top - 30}, 'slow', null);
			return false;
		})
		;
		
		jQuery(this).find('.buttons-area-confirm .button-confirm')
		.click(function(){
			var form = jQuery(this).parents('form.wpcf7-form')
				, error = form.find('ul.error-messages');
			error.empty();
			form.find('table tr').removeClass('error');
			form.find('.wpcf7-form-control-wrap')
			.each(function(){
				var child = jQuery(this).children(0)
					, title = child.parents('tr').find('th').text();
				if (title.length == 0){
					title = child.parents('p').find('.title').text();
				}
				if (child.hasClass('wpcf7-text')){
					if (child.hasClass('wpcf7-validates-as-required') && child.val().length == 0){
						error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
						jQuery(this).addClass('error');
					} else if (child.hasClass('wpcf7-validates-as-email') && ( ! child.val().match(option.validates.email.match))){
						error.append(jQuery('<li>').text(option.validates.email.before + title.replace('必須', '') + option.validates.email.after));
						jQuery(this).addClass('error');
					} else if ((child.hasClass('wpcf7-validates-as-tel') && ( ! child.val().match(option.validates.tel.match))) && child.val().length != 0){
						error.append(jQuery('<li>').text(option.validates.email.before + title.replace('必須', '') + option.validates.tel.after));
						jQuery(this).addClass('error');
					}
				} else if (child.get(0).tagName.toLowerCase() == 'textarea'){
					if (child.hasClass('wpcf7-validates-as-required') && child.val().length == 0){
						error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
						jQuery(this).addClass('error');
					}
				} else if (child.hasClass('wpcf7-number')){
					if (child.hasClass('wpcf7-validates-as-required') && child.val().length == 0){
						error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
						jQuery(this).addClass('error');
					}
				} else if (child.hasClass('wpcf7-select')){
					if (child.hasClass('wpcf7-validates-as-required') && (( ! child.val()) || child.val().length == 0 || child.val() == '---')){
						error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
						jQuery(this).addClass('error');
					}
				} if (child.hasClass('wpcf7-radio')){
					if (child.hasClass('wpcf7-validates-as-required')){
						var flg = false;
						jQuery(this).find('input[type="radio"]')
						.each(function(){
							if (this.checked){
								flg = true;
								return;
							}
						});
						if ( ! flg){
							error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
							jQuery(this).addClass('error');
						}
					}
				} if (child.hasClass('wpcf7-checkbox')){
					if (child.hasClass('wpcf7-validates-as-required')){
						var flg = false;
						jQuery(this).find('input[type="checkbox"]')
						.each(function(){
							if (this.checked){
								flg = true;
								return;
							}
						});
						if ( ! flg){
							error.append(jQuery('<li>').text(option.validates.required.before + title.replace('必須', '') + option.validates.required.after));
							jQuery(this).addClass('error');
						}
					}
				}
			});
			if (error.children().length > 0){
				error.show();
			} else {
				form.addClass('wpcf7-form-mode-confirm').removeClass('wpcf7-form-mode-edit');
				form.find('.wpcf7-form-control-wrap').hide();
				form.find('.wpcf7-form-control-wrap-confirm').show();
				form.find('.buttons-area-confirm').hide();
				form.find('.buttons-area').show();
			}
			jQuery('html,body').animate({ scrollTop: form.offset().top - 80}, 'slow', null);
			return false;
		});
		
	});
	
});


jQuery(document).ready(function(){
  jQuery('.wpcf7-submit').click(function(e) {
    $('html,body').animate({scrollTop: $('form').offset().top - 80}, 'slow', null);
    //$('html,body').animate({scrollTop: position}, 700);
    $('.button-rewrite').hide();
  });
});