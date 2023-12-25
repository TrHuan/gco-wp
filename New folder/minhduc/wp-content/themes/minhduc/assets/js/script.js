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

        $('.btn-searchs__headers').on('click', function(event) {
            $('.search-headerss__box').addClass('open-search__headers');
            $('body').addClass('overflow-hidden')
        });

        $('.btn-close__searchs').on('click', function(event) {
            $('.search-headerss__box').removeClass('open-search__headers');
            $('body').removeClass('overflow-hidden')
        });

    };

    var _scroll_menus = function() {
        var win = $(window);
        var heighttops = $('.header').outerHeight();
        var prevScrollpos = window.pageYOffset;
        var heightTopss = $('.top-headers').outerHeight();

        $('body').css('padding-top', heighttops);

        window.onscroll = function() {


            var currentScrollPos = window.pageYOffset;

            if (win.scrollTop() >= heighttops) {

                $('.header').addClass('scroll-fixed__headers');

                $('.header').css('top', (0 - heightTopss));

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

    var NumberUps = function() {
        $('.number-ups').each(function() {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 7000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    };


    var slideMains = function() {
        if ($('.banner-mains').length === 0) return;
        var swiper2 = new Swiper('.banner-mains', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            draggable: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });


        $(".showss-button-prev").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-prev").trigger("click");
        });

        $(".showss-button-next").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-next").trigger("click");
        });

    };

    var slidePartnerMains = function() {
        if ($('.sl-partner__mains').length === 0) return;
        var swiper2 = new Swiper('.sl-partner__mains', {
            slidesPerView: 5,
            loop: true,
            draggable: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                1440: {
                    slidesPerView: 5,
                    spaceBetween: 15
                }
            }
        });
    };

    var slideSeviceMains = function() {
        if ($('.sl-sevice__mains').length === 0) return;
        var swiper2 = new Swiper('.sl-sevice__mains', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            draggable: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            /*     autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
*/
        });


        $(".showss-button-prev").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-prev").trigger("click");
        });

        $(".showss-button-next").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-next").trigger("click");
        });

    };

    var slideEvalueMains = function() {
        if ($('.sl-feedback__mains').length === 0) return;
        var swiper2 = new Swiper('.sl-feedback__mains', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            draggable: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

        });
    };


    var sidebarPrds = function() {

        $('.list-sevice__sidebar').find("li").each(function() {
            if ($(this).find("ul>li").length > 0) {
                $(this).prepend('<p class="btn-side__bars"></p>');
            }
        });

        $(".active-seivce__sidebars").find(">ul").slideDown();

        $(".btn-side__bars").click(function() {
            $(this).parent("li").find(">ul").slideToggle();
            $(this).parent("li").toggleClass("active-seivce__sidebars");
        });

    };


    var allHeightssssss = async function() {
        var win = await $(window);

        $('.sl-deal__mains').each(function() {
            var highestBoxx = 0;
            $(this).find('.swiper-slide .items-prds__alls').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.swiper-slide .items-prds__alls').height(highestBoxx);
        });
        /*$('#details-intros__prds').modal('show');*/
    };


    var initWowJs = function() {
        new WOW().init();
    };


    return {
        _: function() {
            menuMobile();
            _scroll_menus();
            slideMains();
            slideSeviceMains();
            slideEvalueMains();
            sidebarPrds();
            NumberUps();
            slidePartnerMains();
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