$(window).on("load", function() {

    $('#preloader').delay(350).fadeOut('slow');

    if ($('.wow').length) {
      new WOW({ mobile: false }).init();
    }

  }
);

$(document).on("ready", function() {



  // ONE PAGE SCROLL
    if ($('.home').length) {
        $(document).on("scroll", onScroll);
        //smoothscroll
        $('.backtop, .home-down, .nav-menu li a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            $('.nav-menu li a').each(function () {
                $(this).removeClass('selected');
                if ($(window).width() < 768) {
                    $('.nav-menu').slideUp();
                }
            })
            $(this).addClass('selected');
            var target = this.hash
                , //  menu = target;
                $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });

        function onScroll(event) {
            var scrollPos = $(document).scrollTop();
            $('.nav-menu li a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr("href"));
                if (refElement.position().top - 73 <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('.nav-menu li a').removeClass("selected");
                    currLink.addClass("selected");
                }
                else {
                    currLink.removeClass("selected");
                }
            });
        }
    }


    //NAVBAR SHOW - HIDE
    if ($('.home').length) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var homeheight = $(".home").height() - 73;
            if (scroll > homeheight) {
                //$("header").addClass("nav-fixed");
            }
            else {
                //$("header").removeClass("nav-fixed");
            }
        });
    }


    // HOME PAGE HEIGHT
    if ($('.home').length) {
        function centerInit() {
            var hometext = $('.home')
            hometext.css({
                //"height": $(window).height() + "px"
            });
        }
        centerInit();
        $(window).resize(centerInit);
    }

    // CUSTOM SCROLLBAR
    if ($('.scroll-out, .nav-scroll').length) {
      $(function () {
          $('.scroll-out, .nav-scroll').perfectScrollbar({
              suppressScrollX: true
              , wheelSpeed: 100
          });
      });
    }

  }
);