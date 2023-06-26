jQuery(document).ready(function($){

	/**
	 * スマホ用固定フッターバー
	 */
	if ($(".dp-footer-bar-share").length) {
		$(".dp-footer-bar-share, #modal-overlay").on("click", function() {
			$("#modal-content, #modal-overlay").toggleClass("hide");
			return false;
		});	
		$("#modal-overlay, #modal-content").on("touchmove", function(e) {
			e.preventDefault();
		});
	}

	var footerBar = $("#dp-footer-bar");

	if ( footerBar.length ) {

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {
				footerBar.addClass('active');
        var footerBarHeight = footerBar.height();
        $('body.show_footer_bar #container').css("padding-bottom",footerBarHeight);
/*
        $('body.show_footer_bar #return_top').css("-webkit-transform","translateY(-" + footerBarHeight +"px)");
        $('body.show_footer_bar #return_top').css("transform","translateY(-" + footerBarHeight +"px)");
*/
			} else {
				footerBar.removeClass('active');
/*
        $('body.show_footer_bar #return_top').css("-webkit-transform","translateY(100%)");
        $('body.show_footer_bar #return_top').css("transform","translateY(100%)");
*/
			}
		});

    $(window).bind("resize orientationchange", function() {
      if(footerBar.hasClass('active')) {
        var footerBarHeight = footerBar.height();
        $('body.show_footer_bar #container').css("padding-bottom",footerBarHeight);
/*
        $('body.show_footer_bar #return_top').css("-webkit-transform","translateY(-" + footerBarHeight +"px)");
        $('body.show_footer_bar #return_top').css("transform","translateY(-" + footerBarHeight +"px)");
*/
      };
    });

	}



});
