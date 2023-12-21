$(document).ready(function($) {
    if ($('header.top').length) {
        $(window).scroll(function() {
            /*var anchor = $('header.top').offset().top;*/
            var anchor = $('header.top').offset().top;
            /*console.log(anchor);*/
            if (anchor >= 130) {
                $('header.top').addClass('cmenu');
                $('.tmenu-cate').slideUp('fast');
            } else {
                $('header.top').removeClass('cmenu');
            }
        });
    }

    $('.tcate-tit').on('click', function(event) {
        event.preventDefault();
        $(this).next('.tmenu-cate').slideToggle('fast');
    });
    $('.popup-close').on('click', function(event) {
        event.preventDefault();
        console.log('aa');
        $('.top-popup').slideUp();
    });
    /*$('.more-btn').on('click', function(event) {
      event.preventDefault();
      $('.pdetail-content-wrap').toggleClass('open');
    });*/

    new WOW().init();

    if ($('.totop').length) {
        $('.totop').on('click', function(event) {
            event.preventDefault();
            $('body, html').stop().animate({ scrollTop: 0 }, 800)
        });
        $(window).scroll(function() {
            var anchor = $('.totop').offset().top;
            if (anchor > 1000) {
                $('.totop').css('opacity', '1')
            } else {
                $('.totop').css('opacity', '0')
            }
        });
    }

    $("#menu").mmenu({
        "extensions": [
            "pagedim-black",
            "shadow-panels"
        ]
        // options
        /*"offCanvas": {
                "position": "right"
            }*/
    }, {
        // configuration
        clone: true
    });

    /*$('.cate-slider').owlCarousel({
      items: 4,
      margin: 20,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 3000,
      smartSpeed: 400,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:true
          },
          600:{
              items:2,
              nav:false
          },
          1000:{
              items:4,
              nav:true,
              loop:false
          }
      }
    });*/

    $('.cate-slider.owl-carousel, .pdetail-reslider.owl-carousel').owlCarousel({
        items: 4,
        margin: 20,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 2000,
        smartSpeed: 400,
        rewind: true,
        navText: ['<i class="fas fa-long-arrow-alt-right"></i>', '<i class="fas fa-long-arrow-alt-left"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    $('.pslider.owl-carousel').owlCarousel({
        items: 2,
        margin: 20,
        autoplay: false,
        autoplayHoverPause: true,
        autoplayTimeout: 2000,
        smartSpeed: 400,
        rewind: true,
        /*navText: ['<i class="fas fa-long-arrow-alt-right"></i>','<i class="fas fa-long-arrow-alt-left"></i>'],*/
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    });


    $('.search-open').on('click', function(event) {
        event.preventDefault();
        $('.tsearch-wrap').toggleClass('on');
    });

    $(".button").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    $('.nav-link .custom-control.custom-radio').on('click', function(e) {
        e.preventDefault();
        /*var a = $(this).children('.custom-control-input').prop('value');*/
        $(this).children('.custom-control-input').prop('checked', true);
    });

    if ($("[data-fancybox]").length) {
        $("[data-fancybox]").fancybox({});
        if ($('.linkyoutube').length) {
            var url = $('.linkyoutube').attr('href').replace('watch?v=', 'embed/');
            $('.linkyoutube').attr('href', url);
        }

    }

    /*slider range*/
    if ($("#range").length) {
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 1000,
            max: 10000000,
            from: 400000,
            to: 7000000,
            type: 'double',
            step: 1000,
            prefix: "",
            postfix: " vnđ",
            grid: true
        });
    }

    $('.paside-chkbox li').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('active').children('.custom-control-input').prop('checked', !($(this).children('.custom-control-input').is(':checked')));
    });
    $('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');

    $('.paside-radio li').on('click', function(event) {
        event.preventDefault();
        $('.paside-radio li').removeClass('active');
        $(this).toggleClass('active').children('.custom-control-input').prop('checked', true);
    });
    /*$('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');*/
    if ($('.count-item span').length) {
        $('.count-item span').counterUp({
            delay: 40,
            time: 1200
        });
    }
});
/*
http://jsfiddle.net/LCB5W/
https://stackoverflow.com/questions/152975/how-do-i-detect-a-click-outside-an-element*/