$(function () {
  
  $(".left-menu-drop").click(function () {
    $(".submission-menu").slideToggle();
  });

  $(".lightbox_trigger").click(function () {
    $('#lightbox_wrapper').animate({opacity: 'toggle'}, 400);
    $('#lightbox_wrapper').append($(this).siblings(".lightbox").clone())
    // $(this).siblings(".lightbox").fadeToggle();
    // $(this).parents('section').css('z-index', "1002")
  });
  $(document).on('click', "#lightbox_wrapper .bg",  function () {
    $('#lightbox_wrapper').html('')
    $('#lightbox_wrapper').animate({opacity: 'toggle'}, 400);
  });
  $(document).on('click', "#lightbox_wrapper .close_btn", function () {
    $('#lightbox_wrapper').html('')
    $('#lightbox_wrapper').animate({opacity: 'toggle'}, 400);
  });
});

function goBack() {
  window.history.back();
}
clearImages(0);
function clearImages(sub) {
  $(".artist_image").each((index, element) => {
    $(element).removeClass("active");
    if (sub == 0 && index == 0) {
      $(element).addClass("active");
    } else {
      $(".artist_image.image" + sub).addClass("active");
    }
  });
  $(".artist_thumb_image").each((index, element) => {
    $(element).removeClass("active");
    if (sub == 0 && index == 0) {
      $(element).addClass("active");
    } else {
      $(".artist_thumb_image.thumb" + sub).addClass("active");
    }
  });
}
$(".artist_thumb_image").click(function () {
  var id = $(this).data("id");
  clearImages(id);
});

$(document).ready(function () {
  var gaoptout = window.localStorage.getItem("gaoptout", 0);
  if (gaoptout == 1) {
    $(".jtpl-ga-opt-out-text").addClass("hidden");
    $(".jtpl-ga-opt-out-notification").removeClass("hidden");
  }
  ("use strict");
  $(".ga-opt-out-link").click(function () {
    $(".jtpl-ga-opt-out-text").addClass("hidden");
    $(".jtpl-ga-opt-out-notification").removeClass("hidden");
    window.localStorage.setItem("gaoptout", 1);
  });
});

$(function () {
  $(document).ready(function () {
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("fadeInUp");
      }
    });
    $(".width-animation").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("loaded");
      }
    });
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("fadeInUp");
      }
    });
    $(".width-animation").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("loaded");
      }
    });
  });

  var class_name = $("section").data("color");
  if (class_name == "white") {
    $("header .part1").removeClass("white").addClass("black");
  } else {
    $("header .part1").removeClass("black").addClass("white");
  }
  $(document).scroll(function () {
    $("section").each(function () {
      if (
        $(this).position().top <= $(document).scrollTop() &&
        $(this).position().top + $(this).outerHeight() > $(document).scrollTop()
      ) {
        var class_name = $(this).data("color");
        if (class_name == "white") {
          $("header .part1").removeClass("white").addClass("black");
        } else {
          $("header .part1").removeClass("black").addClass("white");
        }
      }
    });
  });
  $(window).scroll(function () {
    $(".fade-top").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > 400) {
        $(this).addClass("fadeInUp");
      } else {
        $(this).removeClass("fadeInUp");
      }
    });
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("fadeInUp");
      }
    });
    $(".width-animation").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("loaded");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 80) {
        $(this).addClass("fadeInUp");
      }
    });
  });
});

$(function () {
  $(".menu-trigger").click(function () {
    scpos = $(window).scrollTop();
    $(this).toggleClass("active");
    if ($(".g_nav").hasClass('active')) {
      $('.g_nav').toggleClass('active')
      setTimeout(function() {
        $('.g_nav').animate({opacity: 'toggle'}, 800);
      }, 1000)
    } else {
      $('.g_nav').toggleClass('active')
      $('.g_nav').animate({opacity: 'toggle'}, 800);
    }
  });

  $(".g_nav ul li a").click(function () {
  });
});

$(function () {
  var nav = $("#drag_menu");
  var nav2 = $("#drag_side");
  var navTop = 500;
  var showFlag = false;
  nav.css("opacity", "0");
  nav.css("top", "-100px");
  nav2.css("right", "-200px");
  $(window).scroll(function () {
    var winTop = $(this).scrollTop();
    if (winTop >= navTop) {
      if (showFlag == false) {
        showFlag = true;
        nav
          .addClass("fixed1")
          .stop()
          .animate({ top: "0" }, 200)
          .animate({ opacity: "1" }, 600);
        nav2.addClass("fixed2").stop().animate({ right: "0" }, 600);
      }
    } else if (winTop <= navTop) {
      if (showFlag) {
        showFlag = false;
        nav
          .addClass("fixed1")
          .stop()
          .animate({ opacity: "0" }, 600)
          .animate({ top: "-100px" }, 200, function () {
            nav.removeClass("fixed1");
          });
        nav2.stop().animate({ right: "-200px" }, 600, function () {
          nav2.removeClass("fixed2");
        });
      }
    }
  });
});

$(document).ready(function () {
  $(document).on("click", 'a[href^="#"]', function (event) {
    event.preventDefault();

    $("html, body").animate(
      {
        scrollTop: $($.attr(this, "href")).offset().top,
      },
      500
    );
  });
  $(".slicker_parts").slick({
    dots: false,
    pauseOnHover: false,
    autoplay: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: false,
    infinite: true,
    cssEase: "ease-in-out",
  }).on('afterChange',function(event, slick, currentSlide){
    $('#current_paging').html(currentSlide + 1)
  });
  $(".slicker_parts3").slick({
    dots: false,
    pauseOnHover: false,
    autoplay: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: false,
    infinite: true,
    cssEase: "ease-in-out",
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '7.2vw',
          slidesToShow: 1
        }
      },
    ]

  }).on('afterChange',function(event, slick, currentSlide){
    $('#current_paging').html(currentSlide + 1)
  });
  $(".slicker_parts1").slick({
    dots: false,
    pauseOnHover: false,
    autoplay: true,
    arrows: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    fade: false,
    infinite: true,
    asNavFor: '.slicker_parts2',
    cssEase: "ease-in-out",
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }]
  });
  // $(".slicker_parts2").slick({
  //   dots: false,
  //   pauseOnHover: false,
  //   autoplay: true,
  //   arrows: false,
  //   slidesToShow: 6,
  //   slidesToScroll: 1,
  //   fade: false,
  //   infinite: true,
  //   cssEase: "ease-in-out",
  //   asNavFor: '.slicker_parts1',
  //   centerMode: true,
  //   centerPadding: 0
  // });
  $('.layout_change_btn a').on('click', function() {
    var target = $(this).data('target')
    $('.layout_btn').removeClass('active')
    $(this).addClass('active')
    $('.layout_part').removeClass('active')
    $(target).addClass('active')
  })
  $(".img_block2 .img_wrapper").on("click", function () {
    var img_class = $(this).data("image");
    $(".img_block1 .active").removeClass("active");
    $("." + img_class).addClass("active");
  });

  $(".voice_readmore").click(function () {
    var parent = $(this).parent(".slicker_part");
    parent.children(".content").slideToggle(500);
    parent.children(".voice_readless").toggleClass("hidden");
    $(this).toggleClass("hidden");
  });
  $(".voice_readless").click(function () {
    var parent = $(this).parent(".slicker_part");
    parent.children(".content").slideToggle(500);
    setTimeout(function () {
      parent.children(".voice_readmore").toggleClass("hidden");
      parent.children(".voice_readless").toggleClass("hidden");
    }, 500);
  });
});

$("#faq_sec1 dt").click(function () {
  $(this).siblings("dd").slideToggle();
  $(this).toggleClass("active");
});

$(document).ready(function () {
  $('.toggle_btn').click(function() {
    $(this).siblings('.close_piece').slideToggle()
    $(this).toggleClass('active')
  })

  $(document).on("click", "dt.collapse", function () {
    $(this).siblings("dd").slideToggle();
    $(this).removeClass("collapse");
    $(this).addClass("uncollapse");
  });
  $(document).on("click", "dt.uncollapse", function () {
    $(this).siblings("dd").slideToggle();
    $(this).addClass("collapse");
    $(this).removeClass("uncollapse");
  });

  $("h1 .anim").each(function () {
    var elemPos = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll > elemPos - windowHeight) {
      $(this).addClass("letters");
      var id = $(this).attr("id");
      $(this).removeClass("anim");
      var textWrappers = document.querySelectorAll(".ml9 .letters");
      textWrappers.forEach((textWrapper) => {
        textWrapper.innerHTML = textWrapper.textContent.replace(
          /\S/g,
          "<span class='letter'>$&</span>"
        );
      });
      anime.timeline({ loop: false }).add({
        targets: `#${id} .letter`,
        scale: [0, 1],
        duration: 1500,
        elasticity: 600,
        delay: (el, i) => 45 * (i + 1),
      });
      $(this).removeClass("letters");
    }
  });
  $(window).scroll(function () {
    $(".anim").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight) {
        $(this).addClass("letters");
        var id = $(this).attr("id");
        $(this).removeClass("anim");
        var textWrappers = document.querySelectorAll(".ml9 .letters");
        textWrappers.forEach((textWrapper) => {
          textWrapper.innerHTML = textWrapper.textContent.replace(
            /\S/g,
            "<span class='letter'>$&</span>"
          );
        });
        anime.timeline({ loop: false }).add({
          targets: `#${id} .letter`,
          scale: [0, 1],
          duration: 1500,
          elasticity: 600,
          delay: (el, i) => 45 * (i + 1),
        });
        $(this).removeClass("letters");
      }
    });
  });
});
$(document).on("click", ".shopify-buy__btn", function () {
  alert("ok");
});
$(function () {
  $(".inviewfadeInUp").each(function () {
    var elemPos = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll > elemPos - windowHeight + 160) {
      $(this).addClass("fadeInUp");
    }
  });
  $(window).scroll(function () {
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp");
      }
    });
  });
});

$(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp2").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp2");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp2").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp2");
      }
    });
  });
});
$(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp3").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp3");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp3").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp3");
      }
    });
  });
});

$(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp4").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp4");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp4").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp4");
      }
    });
  });
});

$(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp5").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp5");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp5").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp5");
      }
    });
  });
});

$(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp6").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp6");
      }
    });
  });
});

$(window).resize(function () {
  $(window).scroll(function () {
    $(".inviewfadeInUp6").each(function () {
      var elemPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 160) {
        $(this).addClass("fadeInUp6");
      }
    });
  });
});

const iframe = document.getElementsByTagName("iframe");
iframe.onload = run;
// iframe.src="child.html";

function run() {
  const childDocument = iframe.contentWindow.document;
  const canvas = childDocument.getElementById("map-canvas");
  canvas.addEventListener("click", function (e) {
    console.log("#### DEBUG EVENT: ", e);
  });
}
