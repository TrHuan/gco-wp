var GUI = (function() {
    var win = $(window);
    var html = $('html,body');

    var menuMobile = function() {

        $(document).ready(function($) {
            $('.button-phone').on('click', function(event) {
                $('.animated-icon1').toggleClass('open');
                $('.bg-over-menu').toggleClass('show-over');
                $('#main-menu-mobile').toggleClass('active-menu-mobile');
                $('body').toggleClass('overflow-hidden')
                $('.close-menu-btn').addClass("active-close__menussss");
                $('.content-header').toggleClass("active-content__header");
            });
            $('.btn-menu__mopbiles').on('click', function(event) {
                $('.animated-icon1').toggleClass('open');
                $('.bg-over-menu').toggleClass('show-over');
                $('#main-menu-mobile').toggleClass('active-menu-mobile');
                $('body').toggleClass('overflow-hidden')
                $('.close-menu-btn').addClass("active-close__menussss");
                $('.content-header').toggleClass("active-content__header");
            });
            $('.bg-over-menu').on('click', function(event) {
                $('.animated-icon1').toggleClass('open');
                $('.bg-over-menu').toggleClass('show-over');
                $('#main-menu-mobile').removeClass('active-menu-mobile');
                $('body').toggleClass('overflow-hidden')
                $('.close-menu-btn').removeClass("active-close__menussss");
                $('.content-header').removeClass("active-content__header");
            });
            $('.close-menu-btn').on('click', function(event) {
                $('.animated-icon1').toggleClass('open');
                $('.bg-over-menu').toggleClass('show-over');
                $('#main-menu-mobile').removeClass('active-menu-mobile');
                $('body').toggleClass('overflow-hidden')
                $(this).removeClass("active-close__menussss");
                $('.content-header').removeClass("active-content__header");
            });
        });

        $('#main-menu-mobile .menu_clone').find("ul li").each(function() {
            if ($(this).find("ul>li").length > 0) {
                $(this).prepend('<i></i>');
            }
        });

        $('#main-menu-mobile .menu_clone ul').find('li i').click(function(event) {
            var ul = $(this).nextAll("ul");
            if (ul.is(":hidden")) {
                $(this).addClass('active');
                ul.slideDown(200);
            } else {
                $(this).removeClass('active');
                ul.slideUp();
            }
        });

    };

    var _scroll_menus = function() {
        var win = $(window);
        var heighttops = $('.header').outerHeight();
        var prevScrollpos = window.pageYOffset;

        $('body').css('padding-top', (heighttops + 10));

        window.onscroll = function() {


            var currentScrollPos = window.pageYOffset;

            if (win.scrollTop() >= heighttops) {

                $('.header').addClass('scroll-fixed__headers');

                if (win.width() <= 575) {


                    if (prevScrollpos > currentScrollPos) {

                        $('.header').css('top', 0);
                    } else {

                        $('.header').css('top', (0 - heighttops));
                    }
                    prevScrollpos = currentScrollPos;
                }

            } else {
                $('.header').css('top', 0);
                $('.header').removeClass('scroll-fixed__headers');
            }

        }

    };

    var slideAboutMains = function() {
        if ($('.sl-about__mains ').length === 0) return;
        var swiper2 = new Swiper('.sl-about__mains ', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            draggable: true,
        });
    };


    var slidePrdsPages = function() {
        if ($('.sl-prds__pages ').length === 0) return;
        var swiper2 = new Swiper('.sl-prds__pages ', {
            slidesPerView: 3,
            spaceBetween: 15,
            loop: true,
            draggable: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1440: {
                    slidesPerView: 3,
                    spaceBetween: 60
                }
            }
        });
    };


    var slideIngredients = function() {
        if ($('.sl-ingredients__pages ').length === 0) return;
        var swiper2 = new Swiper('.sl-ingredients__pages ', {
            slidesPerView: 4,
            spaceBetween: 65,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            draggable: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 35
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 35,
                },
                1440: {
                    slidesPerView: 4,
                    spaceBetween: 45,
                }
            }
        });

        $(".showss-button-prev").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-prev").trigger("click");
        });

        $(".showss-button-next").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-next").trigger("click");
        });
    };


    var loadZoomDdetials = function() {
        /* CloudZoom.quickStart();*/
        if ($(window).width() > 991) {
            $('.cloudzoom').each(function(index, el) {
                var url = $(el).attr('src');
                $(el).attr({
                    'data-cloudzoom': "autoInside: 767, zoomWidth: 200,zoomHeight: 200, zoomImage: '" + url + "',disableZoom: 'auto'",
                });
            });
            CloudZoom.quickStart();
        }
    }



    var numberUpDown = function() {

        $(document).on('click', '.up-btns', function(event) {
            event.preventDefault();
            var value = parseInt($(this).prev('input.number').val(), 10);
            value++;
            $(this).prev('input.number').val(value);
        });

        $(document).on('click', '.down-btns', function(event) {
            var value = parseInt($(this).next('input.number').val(), 10);
            value--;
            value = value < 1 ? 1 : value;
            $(this).next('input.number').val(value);
        });

    };

    var allHeightssssss = async function() {
        var win = await $(window);

        $('.sl-ingredients__pages').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-ingredient__slide .intros-ingredient__slides').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-ingredient__slide .intros-ingredient__slides').height(highestBoxx);
        });


        $('body').each(function() {
            var highestBoxx = 0;
            $(this).find('.item-prds__mains .names-prds__mains').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.item-prds__mains .names-prds__mains').height(highestBoxx);
        });


        $('.sl-ingredients__pages').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-ingredient__slide .title-ingredient__slides').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-ingredient__slide .title-ingredient__slides').height(highestBoxx);
        });


        $('.about-mains').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-about__mains ').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-about__mains ').height(highestBoxx);
        });

    };

    var linksMains = function() {

        $(".text-after__mains").on('click', function(eventsss) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 200
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash - 200;
                });
            } // End if
        });

    };


    var initWowJs = function() {
        new WOW().init();
    };


    /*  Mobile */

    return {
        _: function() {
            menuMobile();
            _scroll_menus();
            slidePrdsPages();
            slideIngredients();
            slideAboutMains();
            linksMains();
            allHeightssssss();
            initWowJs();
        }
    };
})();
$(document).ready(function() {
    // if (/Lighthouse/.test(navigator.userAgent)) {
    //     return;
    // }
    GUI._();
});