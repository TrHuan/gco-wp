jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(document).on('click', '.ajax_add_to_cart', function (e) {
        e.preventDefault();
        console.log('clicked');
        $(this).delay(5000).queue(function(next){
            $(this).removeClass("added");
            $('.added_to_cart.wc-forward').remove();
            next();
        });
    });

    $(document).on('click', '.single_add_to_cart_button', function (e) {
        $(this).delay(8000).addClass("loading").queue(function(next){
            $(this).delay(800).removeClass("loading").queue(function(next){
                $(this).removeClass("added");
                $('.added_to_cart.wc-forward').remove();
                next();
            });
            next();
        });
    });

    $(document).on('click', '.cart-icon', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.cart-content').height(whg).delay(300).queue(function(next){
            $('.carts-content').addClass('active');
            next();
        });
    });

    $(document).on('click', '.cart-close', function () {
        $('.carts-content').removeClass('active');
    });

    $(window).resize(function(){
        var whg = $(window).height();
        $('.cart-content').height(whg);
    });

    $('.products-ordering > label').click(function(){
        // var sh = $(this).parent().addClass('show');

        // if (!sh) {
        //     $(this).parent().removeClass('show');
        // } else {
        //     $(this).parent().addClass('show');
        // }
        $(this).parent().toggleClass('show');
    });

});

jQuery(document).ready(function($) {
    $(window).on("scroll",function() {
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-stick').outerHeight();
        if (ht) {
            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > hb ) {
                $('.header-stick').addClass('active');
            } 
            if ($(this).scrollTop() <= ht ) {
                $('.header-stick').removeClass('active');
            } 
        } else {
            hb = hghdsck;
            if ($(this).scrollTop() > hb ) {
                $('.header-stick').addClass('active');
            } 
            if ($(this).scrollTop() <= 0 ) {
                $('.header-stick').removeClass('active');
            } 
        }     

        if ($(this).scrollTop() > 0 ) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });

    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop:0}, 400);
    });    

    setTimeout(function(){
        var hght = $('.header-top').outerHeight();
        var hghdsck = $('.header-stick').outerHeight();
        if (hght) {
            hb = parseInt(hght) + parseInt(hghdsck);
            $('header').outerHeight(hb);
        } else {
            $('header').outerHeight(hghdsck);
        }
    }, 2000);

    $(window).resize(function(){
        setTimeout(function(){
            var hght = $('.header-top').outerHeight();
            var hghdsck = $('.header-stick').outerHeight();
            if (hght) {
                hb = parseInt(hght) + parseInt(hghdsck);
                $('header').outerHeight(hb);
            } else {
                $('header').outerHeight(hghdsck);
            }
        }, 2000);        
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
    
    $('.footer-box > .title-box').click(function(){
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
    $(document).on('click', '.search-box .title-box .btn', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.search-box .content-box').height(whg).delay(300).queue(function(next){
            $('.search-box').addClass('active');
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();

        $('.search-box .content-box').height(whg);
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
                breakpoint: 576,
                settings: {
                    vertical: true,
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
        
        $('.lth-popups').addClass('active');
        $('.' + adat).show();
        var hg_pop = $('.' + adat).height();
        var hg_win = $(window).height();
        if (hg_pop > hg_win) {    
            $('.lth-popups .popups-box').height(hg_win - 30);
        } else {    
            $('.lth-popups .popups-box').height('auto');
        } 
    });
    ////////////////////
    var hg_pop = $('.art-popups-reviews .popups-content').height();
    var hg_win = $(window).height();
    if (hg_pop > hg_win) {    
        $('.art-popups-reviews .popups-box').height(hg_win - 30);
    } else {    
        $('.art-popups-reviews .popups-box').height('auto');
    } 
    ////////////////////
    $('.art-popups .popups-box').click(function(){
        $(this).parent().removeClass('active');
    });
    ////////////////////
    $('.art-popups .popups-content').click(function(e){
        e.stopPropagation();
    });
    // end popups
    $(window).resize(function(){
        // popups
        var hg_pop = $('.art-popups-reviews .popups-content').height();
        var hg_win = $(window).height();
        if (hg_pop > hg_win) {       
            $('.art-popups-reviews .popups-box').height(hg_win - 30);
        } else {   
            $('.art-popups-reviews .popups-box').height('auto');
        } 
        // end popups
    });
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
    $('iframe').attr('title', 'iFrame')
});
// end iframe