jQuery(document).ready(function($){

	var footerCta = $('#js-footer-cta');
	var pageTop = $('#js-pagetop')
	var activeClass = 'is-active';

	if ( footerCta.length ) {

    $('body').addClass('has_footer_cta');

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
        $('body').addClass('display_footer_cta');
				footerCta.addClass(activeClass);
        var footerCtaHeight = footerCta.height();
				pageTop.css('bottom', footerCtaHeight);
			} else {
				footerCta.removeClass(activeClass);
        $('body').removeClass('display_footer_cta');
			}
		});

    $(window).bind('resize orientationchange', function() {
      if (footerCta.hasClass(activeClass)) {
        var footerCtaHeight = footerCta.height();
				pageTop.css('bottom', footerCtaHeight);
      };
    });

		$('#js-footer-cta__close').click(function(event) {

      $('body').removeClass('has_footer_cta');
      $('body').removeClass('display_footer_cta');

			event.preventDefault();
			footerCta.remove();
			pageTop.css('bottom', 0);

      // Create session cookie
      $.cookie('tcdHideFooterCTA', 1);

		});
	}
});
