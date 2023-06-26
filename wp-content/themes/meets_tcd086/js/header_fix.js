jQuery(document).ready(function($){

  var header_message_height = 0;
  if($('#header_message').length){
    header_message_height = $('#header_message').innerHeight();
  }

  if($(window).scrollTop() > 200 + header_message_height) {
    $("body").addClass("header_fix");
  }

  $(window).scroll(function () {
    if($(this).scrollTop() > 600 + header_message_height) {
      $("body").addClass("header_fix");
    } else {
      if($("body").hasClass("header_fix")){
        $("body").removeClass("header_fix");
        $("body").addClass("header_fix_close");
      }
    };
    if($(this).scrollTop() < 200 + header_message_height) {
      $("body").removeClass("header_fix");
      $("body").removeClass("header_fix_close");
    }
  });


});