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

    // var _scroll_menus = function() {
    //     var win = $(window);
    //     var heighttops = $('.header').outerHeight();
    //     var prevScrollpos = window.pageYOffset;

    //     $('body').css('padding-top', heighttops);

    //     window.onscroll = function() {

    //         var currentScrollPos = window.pageYOffset;

    //         if (win.scrollTop() >= heighttops) {

    //             if (win.width() <= 768) {

    //                 $('.header').addClass('mobile-fixed__headers');

    //                 if (prevScrollpos > currentScrollPos) {

    //                     $('.header').css('top', 0);
    //                 } else {

    //                     $('.header').css('top', (0 - (heighttops + 100)));
    //                 }
    //                 prevScrollpos = currentScrollPos;
    //             }

    //         } else {
    //             $('.header').css('top', 0);
    //         }
    //     }

    // };

    

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
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            draggable: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                576: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                992: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                1200: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                1440: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });
    };

    var slideGroupsPrds = function() {
        if ($('.sl-prds__groups').length === 0) return;
        var swiper2 = new Swiper('.sl-prds__groups', {
            slidesPerView: 2,
            spaceBetween: 5,
            loop: false,
//             autoplay: {
//                 delay: 2500,
//                 disableOnInteraction: false,
//             },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            draggable: true,
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
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                1440: {
                    slidesPerView: 2,
                    spaceBetween: 5
                }
            }
        });

        $(".showss-button-prev").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper-container .swiper-button-prev").trigger("click");
        });

        $(".showss-button-next").click(function() {
            $(this).parent(".group-btns__showss").parent().find(".swiper-container .swiper-button-next").trigger("click");
        });
    };



    var showPrdsDetails1 = function() {
        if ($('.sl-prds__details').length === 0) return;
        var swiper2 = new Swiper('.sl-prds__details', {
            slidesPerView: 1,
            spaceBetween: 0,
            draggable: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    };


    var checkLocalShips = function() {

        $(".items-ship__checks .check-circle__alls").click(function() {
            $(this).parent().find(".form-ship__checks").slideDown();
            $(".items-ship__checks .check-circle__alls").not(this).parent().find(".form-ship__checks").slideUp();;
        });
    };




    var showroomFooter = function() {
        $(".active-showsrooms__footers").find(".intros-showsroom__footers").slideDown();

        $(".titles-showsrooms__footers").click(function() {
            $(this).parent().find(".intros-showsroom__footers").slideToggle();
            $(this).parent().toggleClass("active-showsrooms__footers");
            $(".titles-showsrooms__footers").not(this).parent().removeClass("active-showsrooms__footers");
            $(".titles-showsrooms__footers").not(this).parent().find(".intros-showsroom__footers").slideUp();

        });

    };

    var bgBodyPages = function() {

        if ($("body").find(".pages-alls__whites").length > 0) {
            $("body").css("background-color", "#ffffff");
        }

        if ($("body").find(".pages-alls__blues").length > 0) {
            $("body").css("background-color", "#CBEBF5");
        }
    }

    var showIntrosFoters = function() {
        $(".btn-box__footers").click(function() {
            $(this).parent().find(".content-box__footers").fadeToggle();
            $(this).parent().toggleClass("active-intros__footers");
            $(".btn-box__footers").not(this).parent().removeClass("active-intros__footers");
            $(".btn-box__footers").not(this).parent().find(".content-box__footers").fadeOut();

        });

    };



    var allHeightssssss = async function() {
        var win = await $(window);

        $('.list-gift__details').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-gift__details .names-gift__details').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-gift__details .names-gift__details').height(highestBoxx);
        });

        $('.nav-prds__houseware').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-nav__houseware').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-nav__houseware').height(highestBoxx);
        });

        $('.sl-prds__groups').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-prd__groups .names-prds__groups').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-prd__groups .names-prds__groups').height(highestBoxx);
        });

        $('.container').each(function() {
            var highestBoxx = 0;
            $(this).find('.items-prds__sales').each(function() {
                if ($(this).height() > highestBoxx) {
                    highestBoxx = $(this).height();
                }
            })
            $(this).find('.items-prds__sales').height(highestBoxx);
        });


    };

    var textAllsPages = function() {
        var heightTextAlls = $('.intros-text__alls').outerHeight();

        if (heightTextAlls > 470) {
            $(".text-alls__pages").addClass("hidden-texts");
        } else {
            $(".text-alls__pages").removeClass("hidden-texts");
        };

        $(".see-text__alls").click(function() {
            $(this).parent(".text-alls__pages").toggleClass("active-all__hidden");
            $(".see-text__alls").not(this).parent(".text-alls__pages").removeClass("active-all__hidden");

        });

    };


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

    /*  Mobile */

    return {
        _: function() {
            // _scroll_menus();
            menuMobile();
            slideMains();
            showPrdsDetails1();
            showroomFooter();
            showIntrosFoters();
            slideGroupsPrds();
            bgBodyPages();
            allHeightssssss();
            textAllsPages();
            numberUpDown();
            checkLocalShips();
        }
    };
})();
$(document).ready(function() {
    // if (/Lighthouse/.test(navigator.userAgent)) {
    //     return;
    // }
    GUI._();
});

// Custom
// jQuery(document).ready(function(){
//     jQuery(window).bind('scroll', function() {
//     var navHeight = jQuery( window ).height() - 100;
//          if (jQuery(window).scrollTop() > navHeight) {
//             jQuery('.header').addClass('fixed-header');
//         }
//         else {
//             jQuery('.header').removeClass('fixed-header');
//         }
//     });
// });


// End
jQuery(".comment-form #author").on("invalid", function(event) {
    alert('Chưa nhập Tên!');
});
jQuery(".comment-form #email").on("invalid", function(event) {
    alert('Chưa nhập địa chỉ Email!');
});
jQuery(".comment-form #comment").on("invalid", function(event) {
    alert('Hãy để lại nhận xét của bạn!');
});