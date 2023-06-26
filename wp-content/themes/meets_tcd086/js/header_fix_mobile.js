jQuery(document).ready(function($){

  var header_message_height = 0;
  if($('#header_message').length){
    header_message_height = $('#header_message').innerHeight();
  }

  if($(window).scrollTop() > 200 + header_message_height) {
    $("body").addClass("header_fix_mobile");
  }

  $(window).scroll(function () {
    if($(this).scrollTop() > 500 + header_message_height) {
      $("body").addClass("header_fix_mobile");
    } else {
      if($("body").hasClass("header_fix_mobile")){
        $("body").removeClass("header_fix_mobile");
        $("body").addClass("header_fix_close_mobile");
      }
    };
    if($(this).scrollTop() < 200 + header_message_height) {
      $("body").removeClass("header_fix_mobile");
      $("body").removeClass("header_fix_close_mobile");
    }
  });


});