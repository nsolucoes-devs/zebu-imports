(function ($)
  { "use strict"
  
/* 1. Proloder */
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });

/* 2. sticky And Scroll UP */
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 150) {
        $(".header-sticky").removeClass("sticky-bar");
        $('.wp-btn').css({'bottom': '52px', 'transition': '0.5s'});
        $('#back-top').fadeOut(500);
        $('.search-bar').css('display', 'block');
      } else {
        $(".header-sticky").addClass("sticky-bar");
        $('#back-top').fadeIn(500);
        $('.wp-btn').css({'bottom': '110px', 'transition': '0.7s'});
        $('.search-bar').css('display', 'none');
      }
    });

  // Scroll Up
    $('#back-top a').on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  
})(jQuery);



function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if(element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}


$(document).ready(function () {

    if ($('.bbb_viewed_slider').length) {
        var viewedSlider = $('.bbb_viewed_slider');

        viewedSlider.owlCarousel(
            {
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: false,
                dots: false,
                responsive:
                {
                    0: { items: 1 },
                    575: { items: 2 },
                    768: { items: 3 },
                    991: { items: 4 },
                    1199: { items: 6 }
                }
            });

        if ($('.bbb_viewed_prev').length) {
            var prev = $('.bbb_viewed_prev');
            prev.on('click', function () {
                viewedSlider.trigger('prev.owl.carousel');
            });
        }

        if ($('.bbb_viewed_next').length) {
            var next = $('.bbb_viewed_next');
            next.on('click', function () {
                viewedSlider.trigger('next.owl.carousel');
            });
        }
    }

    if ($('.teste').length) {
        var viewedSlider = $('.teste');
        viewedSlider.owlCarousel({
            loop: true,
            margin: 50,
            autoplay: true,
            autoplayTimeout: 6000,
            nav: false,
            dots: false,
            responsive: {
                0: { items: 1 },
                768: { items: 2 }
            }
        });
    }



});

