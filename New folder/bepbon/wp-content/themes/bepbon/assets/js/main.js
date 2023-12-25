jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(document).on('click', '.ajax_add_to_cart', function (e) {
        e.preventDefault();
        // console.log('clicked');
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

    // $(document).on('click', '.cart-btn', function (e) {
    //     e.preventDefault();
    //     var whg = $(window).height();
    //     $('.cart-content').height(whg).delay(300).queue(function(next){
    //         $('.carts-content').addClass('active');
    //         next();
    //     });
    // });

    // $(document).on('click', '.cart-close', function () {
    //     $('.carts-content').removeClass('active');
    // });

    // $(window).resize(function(){
    //     var whg = $(window).height();
    //     $('.cart-content').height(whg);
    // });

    $('.products-ordering > label').click(function(){
        $(this).parent().toggleClass('show');
    });

    $(document).on('click', '.cart-container-list .cart_list .remove', function (e) { 
        e.preventDefault();       
        setTimeout(function(){
            setTimeout(function(){
                $('.notification-product .remove-product').addClass('active');

                setTimeout(function(){
                    $('.notification-product .remove-product').removeClass('active');
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.products .ajax_add_to_cart, .product-content-box .single_add_to_cart_button, .product-content-box .ajax_add_to_cart', function () {        
        setTimeout(function(){
            setTimeout(function(){
                $('.notification-product .add-product').addClass('active');

                setTimeout(function(){
                    $('.notification-product .add-product').removeClass('active');
                }, 2000);
            }, 400);
        }, 1000);
    });

});

jQuery(document).ready(function($) {

    $('.product-images .slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.product-images .slick-product-images-nav .ul',
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
    });
    $('.product-images .slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-images .slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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

    $('.lth-product-tabs .slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.lth-product-tabs .slick-product-images-nav .ul',
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
    });
    $('.lth-product-tabs .slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 10,
        slidesToScroll: 1,
        asNavFor: '.lth-product-tabs .slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 8,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 6,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
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

    $(".slick-categories").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
                    // vertical: false,
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
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-products").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    // vertical: false,
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
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-products-2").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
                    // vertical: false,
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
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

});

///////////////////////////////////////////////////////////////////////////

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
// jQuery(document).ready(function($) {
//     var wh_win = $(window).width();
//     if (wh_win <= 767) {
//         $('.footer-box > .content-box').hide();
//         $('.footer-box.active > .content-box').show();
//     } else {
//         $('.footer-box > .content-box').show();
//     }
    
//     $('.footer-box > .title-box').click(function(){
//         var wh_win = $(window).width();
//         if (wh_win <= 767) {
//             var hsc = $(this).parent().hasClass('active');

//             if (hsc) {
//                 $(this).parent().removeClass('active');
//                 $(this).next().slideToggle('slow');
//             } else {
//                 $('.footer-box').removeClass('active');
//                 $('.footer-box > .content-box').hide();
//                 $(this).parent().addClass('active');
//                 $(this).next().slideToggle('slow');
//             }
//         }
//     });

//     $(window).resize(function(){
//         var wh_win = $(window).width();
//         if (wh_win > 767) {
//             $('.footer-box .content-box').show();
//         } else {
//             $('.footer-box .content-box').hide();
//             $('.footer-box.active .content-box').show();
//         }
//     });
// });
// end js footer

// js menu mobile
jQuery(document).ready(function($) {
    $('.megamenu-mobile .close-box').click(function(e){
        e.preventDefault();
        $('.megamenu-mobile > .content-box').removeClass('active');
    });

    $('.megamenu.menu-mobile .content-box .icon').click(function(e){
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $(document).on('click', '.megamenu-mobile > .open-box a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.megamenu-mobile > .content-box').height(whg).delay(300).queue(function(next){
            $(this).addClass('active');
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();
        $('.megamenu-mobile .content-box').height(whg);
    });
});
// end js menu mobile

// js search
jQuery(document).ready(function($) {
    // $(document).on('click', '.search-box > .btn', function (e) {
    //     e.preventDefault();
    //     var whg = $(window).height();
    //     $('.search-box .content-box').height(whg).delay(300).queue(function(next){
    //         $('.search-box').addClass('active');
    //         next();
    //     });
    // });

    // $(window).resize(function(){
    //     var whg = $(window).height();

    //     $('.search-box .content-box').height(whg);
    // });
    
    // $('.search-box .content-box .search-close').click(function(){
    //     $('.search-box').removeClass('active');
    // });
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

    $(".slick-slidershow").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
                    // vertical: false,
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
                breakpoint: 576,
                settings: {
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-blogs").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
                    // vertical: false,
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
                breakpoint: 576,
                settings: {
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-features").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
                    // vertical: false,
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
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 1,
                }
            }
        ]
    });

    $(".slick-brand").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        // adaptiveHeight: true,
        // vertical: true,
        rows: 2,
        slidesPerRow: 6,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 2,
                    slidesPerRow: 5,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    // vertical: false,
                    rows: 2,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 2,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    // vertical: true,
                    rows: 1,
                    slidesPerRow: 2,
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
        
        $('.lth-popups.'+adat).addClass('active');

        var hg_pop = $('.' + adat + ' .popup-content .content').height();
        var hg_win = $(window).height();
        if (hg_pop > hg_win) {    
            $('.lth-popups .popup-content').outerHeight(hg_win - 40);
            $('.lth-popups .popups-content').outerHeight(hg_win - 40);
        } else {    
            $('.lth-popups .popup-content').outerHeight('auto');
            $('.lth-popups .popups-content').outerHeight(hg_pop);
        } 
    });
    ////////////////////
    $('.lth-popups .close-box').click(function(e){
        e.preventDefault();
        $('.lth-popups').removeClass('active');
    });
    // end popups
    $(window).resize(function(){
        setTimeout(function(){
            // popups
            var hg_pop = $('.lth-popups.active .popup-content .content').height();
            var hg_win = $(window).height();
            if (hg_pop > hg_win) {    
                $('.lth-popups .popup-content').outerHeight(hg_win - 40);
                $('.lth-popups .popups-content').outerHeight(hg_win - 40);
            } else {    
                $('.lth-popups .popup-content').outerHeight('auto');
                $('.lth-popups .popups-content').outerHeight(hg_pop);
            }
            // end popups
        }, 500);
        
    });
});
// end js popups

// countdown
/* html : <div class="clock" data-countdown="2030/01/01"></div> */
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
    $('.tab-title a').click(function(e){
        e.preventDefault();
        var hs = $(this).parent().hasClass('active');

        if (!hs) {
            var data_tab = $(this).attr('data_tab');
            $('.tab-title a').removeClass('active');
            $(this).addClass('active');
            $('.tab-content .tab-panel').removeClass('active');
            $('.tab-content .tab-panel.'+data_tab).addClass('active');
        }
    });
});
// end tab

// iframe
jQuery(document).ready(function($) {
    $('iframe').attr('title', 'iFrame')
});
// end iframe

// url
jQuery(document).ready(function($) {
    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.megamenu .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    } else {
        var data_url = $('.main-page').attr('data_url');
        $('.megamenu .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    }

    $('.slick-slidershow .image .icon-play').click(function(){
        $('.slick-slidershow .image').removeClass('active');
        $(this).parent().addClass('active');
        var data_src = $(this).next().attr('data_src');
        if (data_src) {
            $(this).next().children('iframe').attr('src', data_src);
        }
    });

    $('.slick-slidershow .video .icon-stop').click(function(){
        $('.slick-slidershow .image').removeClass('active');
        var scr = $(this).next().attr('src');
        $(this).parent().attr('data_src', scr);
        $(this).next().attr('src','');
    });

    $('.lth-toggle .entry-header ul a').click(function(e){
        e.preventDefault();

        var hs = $(this).parent().hasClass('active');

        if (hs) {
            $('.lth-toggle .entry-header ul li').removeClass('active');
            $('.lth-toggle .entry-header ul .content').hide();
        } else {
            $('.lth-toggle .entry-header ul li').removeClass('active');
            $(this).parent().addClass('active');
            $('.lth-toggle .entry-header ul .content').hide();
            $(this).next().show();
        }
    });

    $('.banner .image .icon-play').click(function(){
        $('.banner .image').removeClass('active');
        $(this).parent().addClass('active');
        var data_src = $(this).next().attr('data_src');
        if (data_src) {
            $(this).next().children('iframe').attr('src', data_src);
        }
    });

    $('.banner .video .icon-stop').click(function(){
        $('.banner .image').removeClass('active');
        var scr = $(this).next().attr('src');
        $(this).parent().attr('data_src', scr);
        $(this).next().attr('src','');
    });

    $('.main-products .sidebars a .icon, .menu-categories a .icon').click(function(e){
        e.preventDefault();

        $(this).parent().toggleClass('active');
        $(this).parent().next().slideToggle('slow');
    });

    $('.main-single-products .lth-product-tabs .nav-tabs a').click(function(e){
        e.preventDefault();

        var hsa = $(this).parent().hasClass('active');
        if (!hsa) {
            $('.main-single-products .lth-product-tabs .nav-tabs li').removeClass('active');
            $(this).parent().addClass('active');

            var data_tab = $(this).attr('data_tab');
            $('.tab-content .tab-pane').removeClass('active');
            $('.tab-content .tab-pane#'+data_tab).addClass('active');
        }
    });

    $('.main-single-products .entry-summary .post-btn .btn-buynow').click(function(){ 
        // setTimeout(function(){
            var name = $('.lth-popups.buynow .product-content-box .entry-summary .product_title').attr('data_title');
            var pr = $('.lth-popups.buynow .product-content-box .entry-summary .post-price').attr('data_price');
            var cu = $('.lth-popups.buynow .product-content-box .entry-summary .post-price ins .amount span').text();
            var gift = $('.lth-popups.buynow .product-content-box .entry-summary .post-gift ul').attr('data_gift');
            var gift_str = gift.slice(0,-2);
            var url = window.location.href;

            $('.lth-popups.buynow #your-product-name').attr('value', name);
            $('.lth-popups.buynow #your-product-cu').attr('value', cu);
            $('.lth-popups.buynow #your-product-price').attr('value', pr);
            $('.lth-popups.buynow #your-product-qty').attr('value', '1');
            $('.lth-popups.buynow #your-product-tong').attr('value', pr);
            $('.lth-popups.buynow #your-product-gift').attr('value', gift_str);
            $('.lth-popups.buynow #your-product-url').attr('value', url);
        // }, 500);
    });

    $('#datanumber').text($('#qtynumber').val());
    $('#qtynumber').on('input', function() {
        $('#datanumber').attr('data_number',$('#qtynumber').val());
        var pr = $('.lth-popups.buynow .product-content-box .entry-summary .post-price').attr('data_price');
        var nbpr = $('#datanumber').attr('data_number');
        var cu = $('.lth-popups.buynow .product-content-box .entry-summary .post-price ins .amount span').text();
        var kq = parseInt(pr) * parseInt(nbpr);
        $('.lth-popups.buynow .post-tong-price ins .amount').text(Number(kq).toLocaleString('en').split(',').join('.') + cu);
            $('.lth-popups.buynow #your-product-qty').attr('value', nbpr);
            $('.lth-popups.buynow #your-product-tong').attr('value', kq);
    });
    
});
// end url