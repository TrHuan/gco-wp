jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    var pos = $(window).scrollTop(); 
    $(window).scroll(function(){
        var windowpos = $(window).scrollTop();
        if (windowpos > pos) {
            // console.log('scrollDown');
            $(".header-stick").addClass("ani");
        } else {
            // console.log('scrollUp');
            $(".header-stick").addClass("active");
            $(".header-stick").removeClass("ani");
        }
        pos = windowpos;
    });

    $(window).on("scroll",function() {
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-stick').outerHeight();
        if (ht) {
            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > hb ) {
                // $('.header-stick').addClass('active');
            } 
            if ($(this).scrollTop() <= ht ) {
                $('.header-stick').removeClass('active');
            } 
        } else {
            hb = hghdsck;
            if ($(this).scrollTop() > hb ) {
                // $('.header-stick').addClass('active');
            } 
            if ($(this).scrollTop() <= 0 ) {
                $('.header-stick').removeClass('active');
            } 
        }     

        if ($(this).scrollTop() > 0 ) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');

            // setTimeout(function(){
            //     var hght = $('.header-top').outerHeight();
            //     var hghdsck = $('.header-stick').outerHeight();
            //     if (hght) {
            //         hb = parseInt(hght) + parseInt(hghdsck);
            //         $('.headers').outerHeight(hb);
            //     } else {
            //         $('.headers').outerHeight(hghdsck);
            //     }
            // }, 200);
        }
    });

    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop:0}, 400);
    });    

    var hght = $('.header-top').outerHeight();
    var hghdsck = $('.header-stick').outerHeight();
    if (hght) {
        hb = parseInt(hght) + parseInt(hghdsck);
        $('.headers').outerHeight(hb);
    } else {
        $('.headers').outerHeight(hghdsck);
    }

    $(window).resize(function(){
        setTimeout(function(){
            var hght = $('.header-top').outerHeight();
            var hghdsck = $('.header-stick').outerHeight();
            if (hght) {
                hb = parseInt(hght) + parseInt(hghdsck);
                $('.headers').outerHeight(hb);
            } else {
                $('.headers').outerHeight(hghdsck);
            }
        }, 200);        
    });
});

// js footer
jQuery(document).ready(function($) {
    var wh_win = $(window).width();
    if (wh_win <= 767) {
        $('.footer-box > .content-box').hide();
        $('.footer-box.active > .content-box').show();
    } else {
        $('.footer-box > .content-box').show();
    }
    
    $('.footer-box:not(.footer-socials) > .title-box').click(function(){
        var wh_win = $(window).width();
        if (wh_win <= 767) {
            var hsc = $(this).parent().hasClass('active');

            if (hsc) {
                $(this).parent().removeClass('active');
                $(this).next().slideToggle('slow');
            } else {
                $('.footer-box').removeClass('active');
                $('.footer-box > .content-box').hide();
                $(this).parent().addClass('active');
                $(this).next().slideToggle('slow');
            }
        }
    });

    $(window).resize(function(){
        var wh_win = $(window).width();
        if (wh_win > 767) {
            $('.footer-box .content-box').show();
        } else {
            $('.footer-box .content-box').hide();
            $('.footer-box.active .content-box').show();
        }
    });
});
// end js footer

// js menu mobile
jQuery(document).ready(function($) {
    $('.menu-mobile-content .menu-close').click(function(){
        $('.menu-mobile-content').removeClass('active');
    });

    $('.megamenu.menu-mobile .content-box .icon').click(function(e){
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $(document).on('click', '.menu-mobile-title .title', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.menu-mobile-content').height(whg).delay(300).queue(function(next){
            $(this).addClass('active');
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();
        $('.menu-mobile-content').height(whg);
    });
});
// end js menu mobile

// js search
jQuery(document).ready(function($) {
    $(document).on('click', '.search-button .title-box .btn', function (e) {
        e.preventDefault();
        $('.search-box').addClass('active');
    });

    var wh = $(window).height();

    if (wh < 680) {
        $('.search-box .content-box').height(wh);

        $('.search-box .content-box .search-container').css({'display': 'block', 'padding': '30px 0'});

        $('.search-box .content-box .search-close').css({'margin-bottom': '20px'});
    }

    $(window).resize(function(){
        var whg = $(window).height();

        if (whg < 680) {
            $('.search-box .content-box').height(whg);

            $('.search-box .content-box .search-container').css({'display': 'block', 'padding': '30px 0'});

            $('.search-box .content-box .search-close').css({'margin-bottom': '20px'});
        } else {
            $('.search-box .content-box').height('680px');

            $('.search-box .content-box .search-container').css({'display': 'flex', 'padding': '30px 0 200px'});

            $('.search-box .content-box .search-close').css({'margin-bottom': '150px'});
        }
    });
    
    $('.search-box .content-box .search-close').click(function(){
        $('.search-box').removeClass('active');
    });
});
// end js search

// js logins
jQuery(document).ready(function($) {
    $(document).on('click', '.logins-box .user-icon a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.logins-box .user-content').height(whg).delay(300).queue(function(next){
            $('.logins-box .user-box').addClass('active');
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();
        $('.logins-box .user-content').height(whg);
    });
    
    $('.logins-box .user-close').click(function(){
        $('.logins-box .user-box').removeClass('active');
    });

    $('.lth-logins .user-box > ul > li > a').click(function(e){
        e.preventDefault();
        var ac = $(this).hasClass('active');

        if (!ac) {
            var lg = $(this).hasClass('login-title');
            var rg = $(this).hasClass('registration-title');

            if (lg) {
                $('.registrations-box').removeClass('active');
                $('.logins-box').addClass('active');
            } else if (rg) {
                $('.logins-box').removeClass('active');
                $('.registrations-box').addClass('active');
            }

            $('.lth-logins .user-box a').removeClass('active');
            $(this).addClass('active');
        }
    });
});
// end js logins

jQuery(document).ready(function($) {

    $(".slick-related-posts-3").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-related-posts-4").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-testimonials").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        rows: 1,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: false,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

//     $(".slick-brands").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: true,
//         infinite: true,
//         speed: 500,
//         rows: 1,
//         slidesPerRow: 4,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         adaptiveHeight: false,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 4,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 3,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 2,
//                 }
//             }
//         ]
//     });
//     

	    $(".slick-brands").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
        adaptiveHeight: false,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                   slidesToShow: 4,
       			   slidesToScroll: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                   slidesToShow: 3,
       			   slidesToScroll: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                   slidesToShow: 2,
       			   slidesToScroll: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                   slidesToShow: 2,
       			   slidesToScroll: 2,
                }
            }
        ]
    });

    $(".slick-categories").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-related-products-3").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-related-products-4").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".sidebar-box .slick-slider").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        vertical: true,
        rows: 5,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 5,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    vertical: false,
                    rows: 3,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                    rows: 3,
                    slidesPerRow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    vertical: false,
                    rows: 3,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $('.slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-product-images-nav ul',
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
    });
    $('.slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

});

// js popups
jQuery(document).ready(function($) {
    // popups
    $('.btn-popup').click(function(e){
        e.preventDefault();

        var adat = $(this).attr('data_popup');
        
        var hg_pop = $('.' + adat).height();
        var hg_win = $(window).height();
        
        $('.lth-popups').addClass('active');
        $('.' + adat).addClass('show');
        if (hg_pop >= hg_win) {    
            $('.lth-popups .popups-box').height(hg_win - 30);
        } else {    
            $('.lth-popups .popups-box').height('auto');
        } 
    });
    ////////////////////
    var hg_pop = $('.lth-popups .show').height();
    var hg_win = $(window).height();
    if (hg_pop >= hg_win) {    
        $('.lth-popups .popups-box').height(hg_win - 30);
    } else {    
        $('.lth-popups .popups-box').height('auto');
    } 
    ////////////////////
    $('.lth-popups .popups-box').click(function(){
        $(this).parent().removeClass('active');
        $('.popup-box').removeClass('show');
    });
    ////////////////////
    $('.lth-popups .popups-content').click(function(e){
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function(){
        var hg_pop = $('.lth-popups .show').height();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.lth-popups .popups-box').height(hg_win - 30);
        } else {    
            $('.lth-popups .popups-box').height('auto');
        } 
    });

    // popups
    // $('.btn-popup-reviews, .customs-menus-box ul li:last-child a').click(function(e){
    //     e.preventDefault();
        
    //     $('.lth-popups-reviews').addClass('active');
    //     $('.popups-reviews').addClass('show');
    //     var hg_pop = $('.popups-reviews').height();
    //     var hg_win = $(window).height();
    //     if (hg_pop >= hg_win) {    
    //         $('.lth-popups-reviews .popups-box').height(hg_win - 30);
    //     } else {    
    //         $('.lth-popups-reviews .popups-box').height('auto');
    //     } 
    // });
    // ////////////////////
    // var hg_pop = $('.lth-popups-reviews .show').height();
    // var hg_win = $(window).height();
    // if (hg_pop >= hg_win) {    
    //     $('.lth-popups-reviews .popups-box').height(hg_win - 30);
    // } else {    
    //     $('.lth-popups-reviews .popups-box').height('auto');
    // } 
    // ////////////////////
    // $('.lth-popups-reviews .popups-box').click(function(){
    //     $(this).parent().removeClass('active');
    //     $('.popup-box').removeClass('show');
    // });
    // ////////////////////
    // $('.lth-popups-reviews .popups-content').click(function(e){
    //     e.stopPropagation();
    // });
    // ////////////////////
    // $(window).resize(function(){
    //     var hg_pop = $('.lth-popups-reviews .show').height();
    //     var hg_win = $(window).height();
    //     if (hg_pop >= hg_win) {    
    //         $('.lth-popups-reviews .popups-box').height(hg_win - 30);
    //     } else {    
    //         $('.lth-popups-reviews .popups-box').height('auto');
    //     } 
    // });
});
// end js popups

// countdown
jQuery(document).ready(function($) {
    $('.clock').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('%D:%H:%M:%S'));
        });
    });
});
// end countdown

// tab
jQuery(document).ready(function($) {
    $('.tab-box:not(.tab-box-2) .title').click(function(){
        var hs = $(this).parent().parent().hasClass('active');

        if (hs) {
            $(this).parent().parent().removeClass('active');
        } else {
            $('.tab-box').removeClass('active');
            $(this).parent().parent().addClass('active');
        }
    });

    $('.tab-box-2 .title').click(function(e){
        e.preventDefault();
        var hs = $(this).hasClass('active');

        if (!hs) {
            var cmfc = $(this).hasClass('comment-face-title');

            $('.tab-content .tab-panel').removeClass('active');

            if (cmfc) {
                $('.comments-facebook-box').addClass('active');
            } else {
                $('.comments-box').addClass('active');
            }

            $('.tab-box-2 .title').removeClass('active');
            $(this).addClass('active');
        }
    });
});
// end tab

// iframe
jQuery(document).ready(function($) {
    $('iframe').attr('title', 'iFrame');
});
// end iframe

jQuery(document).ready(function($) {
    $('#navbar-box-3 .banner-content .buttons .btn').click(function(e){
        var ac = $(this).parent().parent().hasClass('active');

        if (!ac) {
            $(this).parent().parent().addClass('active');
            $(this).text('Thu gọn');
        } else {
            $(this).parent().parent().removeClass('active');
            // $('html, body').animate({scrollTop: 1570}, 400);
            $('html, body').animate({
                scrollTop: $('#navbar-box-3').offset().top
            }, 500);
            $(this).text('Xem thêm');
        }
    });

    $('#navbar-box-4 .banner-content .buttons .btn').click(function(e){
        var ac = $(this).parent().parent().hasClass('active');

        if (!ac) {
            $(this).parent().parent().addClass('active');
            $(this).text('Thu gọn');
        } else {
            $(this).parent().parent().removeClass('active');
            // var hg = $('.lth-banners.style_07').outerHeight();
            // var hg2 = parseInt(1560) + parseInt(hg);
            // $('html, body').animate({scrollTop: hg2}, 400);
            $('html, body').animate({
                scrollTop: $('#navbar-box-4').offset().top
            }, 500);
            $(this).text('Xem thêm -');
        }
    });
});

jQuery(document).ready(function($) {
    var pos = $(window).scrollTop(); 
    $(window).scroll(function(){
        var windowpos = $(window).scrollTop();
        if (windowpos > pos) {
            console.log('scrollDown');
            $(".lth-customs-menus").addClass("ani");
        } else {
            console.log('scrollUp');
            $(".lth-customs-menus").removeClass("ani");
        }
        pos = windowpos;
    });

    $(window).on("scroll",function() {
        var hght = $('.headers').outerHeight();
        var hgcsm = $('.lth-customs-menus').outerHeight();

        if ($(this).scrollTop() > hght ) {
            $('.lth-customs-menus').addClass('active');
            $('.main-container').css({'padding-top': hgcsm});
            $('.lth-customs-menus').css({'top': parseInt(hght)});
        } else {
            $('.lth-customs-menus').removeClass('active');
            $('.main-container').css({'padding-top': '0'});
        }
    });

    
    var position = 0;
    var i = 1;
    var lg = $('.customs-menus-box li').length;

    $(window).on("scroll",function() { 
        if (lg > 0) {
               
            var windowpos = $(window).scrollTop();

            if (i <= lg) {

                if (position < windowpos) {
                    // i++;

                    var sct = $('#navbar-box-'+i).offset().top - 144

                    if (sct < windowpos) {
                        j = i - 1;

                        $('.customs-menus-box a[href^="#navbar-box-'+j+'"]').removeClass('active');
                        $('.customs-menus-box a[href^="#navbar-box-'+i+'"]').addClass('active');
                
                        i++;
                    }

                } else {
                    if (position > windowpos) {
                        var sct = $('#navbar-box-'+i).offset().top - 144

                        if (sct > windowpos) {
                            j = i - 1;

                            $('.customs-menus-box a[href^="#navbar-box-'+i+'"]').removeClass('active');
                            $('.customs-menus-box a[href^="#navbar-box-'+j+'"]').addClass('active');

                            
                            i--; if (i < 1) { i = 1; }
                        }
                    }

                }
            } else {

                var k = i - 1;

                var sct = $('#navbar-box-'+k).offset().top - 144

                if (sct > windowpos) {
                    j = i - 1;

                    $('.customs-menus-box a[href^="#navbar-box-'+i+'"]').removeClass('active');
                    $('.customs-menus-box a[href^="#navbar-box-'+j+'"]').addClass('active');

                    
                    i--; if (i < 1) { i = 1; }
                }

            }

            position = windowpos;

        }
    });


    $(document).on('click', '.customs-menus-box a[href^="#"], .muc-luc-box a[href^="#"]', function (e) {
        e.preventDefault();  

        var atarget = $( $(this).attr('href') );		

        $('html, body').animate({scrollTop: atarget.offset().top - 144}, 500);		

    });

    $(document).on('click', '.customs-menus-box a', function (e) {
        e.preventDefault();

        var hr = $(this).attr('href');

        setTimeout(function(){ 
            $('.customs-menus-box a').removeClass('active');

            $('.customs-menus-box a[href^="' + hr + '"]').addClass('active'); 
        }, 600);
    });

    $('.muc-luc-box > ul > li > a').click(function(){
        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.muc-luc-box a').removeClass('active');
            $(this).addClass('active');
        }

        var sh = $(this).next().hasClass('show');

        if (!sh) {
            $('.muc-luc-box .sub-menu').hide();
            $(this).next().slideToggle('slow');
            $('.muc-luc-box .sub-menu').removeClass('show');
            $(this).next().addClass('show');
        } else {
            $('.muc-luc-box .sub-menu').hide();
            $('.muc-luc-box .sub-menu').removeClass('show');
            $('.muc-luc-box a').removeClass('active');
        }

        var sub = $(this).next().hasClass('sub-menu');

        if (sub) {
            var bg = $(this).hasClass('bg');
            if (!bg) {
                $('.muc-luc-box a').removeClass('bg');
                $(this).addClass('bg');
            } else {
                $('.muc-luc-box a').removeClass('bg');
            }
        } else {
            $('.muc-luc-box a').removeClass('bg');
        }
    });

    $('.muc-luc-box .sub-menu a').click(function(){
        var ac = $(this).hasClass('active');
        if (!ac) {
            $('.muc-luc-box .sub-menu a').removeClass('active');
            $(this).addClass('active');
        }
    });
});

// sidebars post single
jQuery(document).ready(function($) {
    var wth = $(window).width();

    if (wth > 1499) {
        var wthco = $('.main-single .post-single-box').width();
        var wthco2 = $('.main-single .lth-post-single .sidebars-left').width();
        var wsb = wth - wthco - wthco2 - 170;
        $('.lth-post-single .sidebars').width(wsb);

        $(window).scroll(function(){
            var windowpos = $(window).scrollTop();

            if (windowpos > 145) {
                $('.lth-post-single .sidebars').addClass('active');
            } else {
                $('.lth-post-single .sidebars').removeClass('active');
            }

            var hps = $('.post-single-box').height();
            var hsbl = $('.sidebars-left .sidebar-box').height();
            var hsb = $('.sidebars .sidebar-box').height();
            var sctp = hps - hsb;
            var sctpl = hps - hsbl;

            var wthgr = $('.main-single .groups-box').width();
            var lf = wthgr - wthco + parseInt('215');

            if (windowpos > sctp) {
                $('.lth-post-single .sidebars').addClass('sctop');
                $('.lth-post-single .sidebars').css({'left': lf + 'px'});
            } else {
                $('.lth-post-single .sidebars').removeClass('sctop');
                $('.lth-post-single .sidebars').css({'left': 'auto'});
            }

            if (windowpos > sctpl) {
                $('.sidebars-left .lth-sidebars').addClass('sctop');
            } else {
                $('.sidebars-left .lth-sidebars').removeClass('sctop');
            }
        });
    } else if (wth > 991) {
        var wthco = $('.main-single .post-single-box').width();
        var wthco2 = $('.main-single .lth-post-single .sidebars-left').width();
        var wsb = wth - wthco - wthco2 - 80;
        $('.lth-post-single .sidebars').width(wsb);

        console.log(wthco);
        console.log(wthco2);
        console.log(wsb);

        $(window).scroll(function(){
            var windowpos = $(window).scrollTop();

            if (windowpos > 145) {
                $('.lth-post-single .sidebars').addClass('active');
            } else {
                $('.lth-post-single .sidebars').removeClass('active');
            }

            var hps = $('.post-single-box').height();
            var hsbl = $('.sidebars-left .sidebar-box').height();
            var hsb = $('.sidebars .sidebar-box').height();
            var sctp = hps - hsb;
            var sctpl = hps - hsbl;

            var wthgr = $('.main-single .groups-box').width();
            var lf = wthgr - wthco;

            if (windowpos > sctp) {
                $('.lth-post-single .sidebars').addClass('sctop');
                $('.lth-post-single .sidebars').css({'left': lf + 'px'});
            } else {
                $('.lth-post-single .sidebars').removeClass('sctop');
                $('.lth-post-single .sidebars').css({'left': 'auto'});
            }

            if (windowpos > sctpl) {
                $('.sidebars-left .lth-sidebars').addClass('sctop');
            } else {
                $('.sidebars-left .lth-sidebars').removeClass('sctop');
            }
        });
    }

    $(window).resize(function(){
        var wth = $(window).width();

        if (wth > 1499) {
            var wthco = $('.main-single .post-single-box').width();
            var wthco2 = $('.main-single .lth-post-single .sidebars-left').width();
            var wsb = wth - wthco - wthco2 - 170;
            $('.lth-post-single .sidebars').width(wsb);

            $(window).scroll(function(){
                var windowpos = $(window).scrollTop();

                if (windowpos > 145) {
                    $('.lth-post-single .sidebars').addClass('active');
                } else {
                    $('.lth-post-single .sidebars').removeClass('active');
                }

                var hps = $('.post-single-box').height();
                var hsbl = $('.sidebars-left .sidebar-box').height();
                var hsb = $('.sidebars .sidebar-box').height();
                var sctp = hps - hsb;
                var sctpl = hps - hsbl;

                var wthgr = $('.main-single .groups-box').width();
                var lf = wthgr - wthco + parseInt('215');

                if (windowpos > sctp) {
                    $('.lth-post-single .sidebars').addClass('sctop');
                    $('.lth-post-single .sidebars').css({'left': lf + 'px'});
                } else {
                    $('.lth-post-single .sidebars').removeClass('sctop');
                    $('.lth-post-single .sidebars').css({'left': 'auto'});
                }

                if (windowpos > sctpl) {
                    $('.sidebars-left .lth-sidebars').addClass('sctop');
                } else {
                    $('.sidebars-left .lth-sidebars').removeClass('sctop');
                }
            });
        } else if (wth > 991) {
            var wthco = $('.main-single .post-single-box').width();
            var wthco2 = $('.main-single .lth-post-single .sidebars-left').width();
            var wsb = wth - wthco - wthco2 - 80;
            $('.lth-post-single .sidebars').width(wsb);

            console.log(wthco);
            console.log(wthco2);
            console.log(wsb);

            $(window).scroll(function(){
                var windowpos = $(window).scrollTop();

                if (windowpos > 145) {
                    $('.lth-post-single .sidebars').addClass('active');
                } else {
                    $('.lth-post-single .sidebars').removeClass('active');
                }

                var hps = $('.post-single-box').height();
                var hsbl = $('.sidebars-left .sidebar-box').height();
                var hsb = $('.sidebars .sidebar-box').height();
                var sctp = hps - hsb;
                var sctpl = hps - hsbl;

                var wthgr = $('.main-single .groups-box').width();
                var lf = wthgr - wthco;

                if (windowpos > sctp) {
                    $('.lth-post-single .sidebars').addClass('sctop');
                    $('.lth-post-single .sidebars').css({'left': lf + 'px'});
                } else {
                    $('.lth-post-single .sidebars').removeClass('sctop');
                    $('.lth-post-single .sidebars').css({'left': 'auto'});
                }

                if (windowpos > sctpl) {
                    $('.sidebars-left .lth-sidebars').addClass('sctop');
                } else {
                    $('.sidebars-left .lth-sidebars').removeClass('sctop');
                }
            });
        }
    });

    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.megamenu .nav li a[href^="'+data_url+'"]').parent().addClass('current_page_item');
    }

    $('.lth-post-single .lth-sidebars .muc-luc-box .ez-toc-heading-level-2').click(function(){
        var ac = $(this).hasClass('active');
        if (ac) {
            $(this).removeClass('active');
        } else {
            $('.lth-post-single .lth-sidebars .muc-luc-box .ez-toc-heading-level-2').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('.lth-post-single .sidebars-left .lth-sidebars .sb-menu').click(function(){
        $('.lth-post-single .sidebars-left .lth-sidebars').addClass('active');
    });

    $('.lth-post-single .sidebars-left .lth-sidebars .sb-close').click(function(){
        $('.lth-post-single .sidebars-left .lth-sidebars').removeClass('active');
    });
    $('#ez-toc-container a.ez-toc-link').click(function(){
        if ($(window).width() < 767) {
            $('.lth-post-single .sidebars-left .lth-sidebars').removeClass('active');
        }
    });
	$('.lth-post-single .lth-sidebars .muc-luc-box .ez-toc-heading-level-2').click(function(){
        $('.lth-post-single .sidebars-left .lth-sidebars').removeClass('active');
    });
});
// end sidebars post single
// 
$(document).ready(function($){
  $(".menu-mobile nav ul.menu ul.sub-menu").before('<i class="arrow icofont-simple-down"></i>');

  $("body").on('click','.menu-mobile nav ul.menu .arrow', function(){
    $(this).parent('li').toggleClass('open');
    $(this).parent('li').find('ul.sub-menu').first().slideToggle( "normal" );
  });
});
