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

    // $(document).on('click', '.cart-icon', function (e) {
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

    $(window).resize(function(){
        var whg = $(window).height();
        $('.cart-content').height(whg);
    });

    var urla = window.location.href;
    var kq_date = urla.indexOf('?orderby=date');
    var kq_price = urla.indexOf('?orderby=price');
    var kq_price_desc = urla.indexOf('?orderby=price-desc'); 
    var kq_price_0_100 = urla.indexOf('?orderby=price-0-100');
    var kq_price_100_200 = urla.indexOf('?orderby=price-100-200');
    var kq_origin_vn = urla.indexOf('?orderby=origin-vn');
    var kq_origin_jp = urla.indexOf('?orderby=origin-jp');
    var kq_number_of_stoves_1 = urla.indexOf('?orderby=number-of-stoves-1');
    var kq_number_of_stoves_2 = urla.indexOf('?orderby=number-of-stoves-2');   

    if (kq_price_desc !== -1) {
        var kq = 'Giá cao đến thấp';

        $('.main-products .products-ordering-2 label').remove();
        $('.main-products .products-ordering-2').append('<label>'+kq+'</label>');
    } else if (kq_price !== -1) {
        var kq = 'Giá thấp đến cao';

        $('.main-products .products-ordering-2 label').remove();
        $('.main-products .products-ordering-2').append('<label>'+kq+'</label>');
    } else if (kq_date !== -1) {
        var kq = 'Sản phẩm mới';

        $('.main-products .products-ordering-2 label').remove();
        $('.main-products .products-ordering-2').append('<label>'+kq+'</label>');
    } else if (kq_price_0_100 !== -1) {
        var kq = '0 đến 100';

        $('.main-products .products-ordering-price label').remove();
        $('.main-products .products-ordering-price').append('<label>'+kq+'</label>');
    } else if (kq_price_100_200 !== -1) {
        var kq = '100 đến 200';

        $('.main-products .products-ordering-price label').remove();
        $('.main-products .products-ordering-price').append('<label>'+kq+'</label>');
    } else if (kq_origin_vn !== -1) {
        var kq = 'Việt Nam';

        $('.main-products .products-ordering-origin label').remove();
        $('.main-products .products-ordering-origin').append('<label>'+kq+'</label>');
    } else if (kq_origin_jp !== -1) {
        var kq = 'Nhật Bản';

        $('.main-products .products-ordering-origin label').remove();
        $('.main-products .products-ordering-origin').append('<label>'+kq+'</label>');
    } else if (kq_number_of_stoves_1 !== -1) {
        var kq = '1 bếp';

        $('.main-products .products-ordering-number-of-stoves label').remove();
        $('.main-products .products-ordering-number-of-stoves').append('<label>'+kq+'</label>');
    } else if (kq_number_of_stoves_2 !== -1) {
        var kq = '2 bếp';

        $('.main-products .products-ordering-number-of-stoves label').remove();
        $('.main-products .products-ordering-number-of-stoves').append('<label>'+kq+'</label>');
    }

    $(document).on('click', '.products-ordering > label', function () {
        $(this).parent().toggleClass('show');
    });

    $(document).on('click', '.cart-container-list .cart_list .remove', function () {        
        setTimeout(function(){
            $('footer').append('<span class="remove-product">Xóa sản phẩm thành công.</span>');

            setTimeout(function(){
                $('footer .remove-product').addClass('active');

                setTimeout(function(){
                    $('footer .remove-product').removeClass('active');

                    setTimeout(function(){
                        $('footer .remove-product').remove();
                    }, 1000);
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.module_products .post-btn .ajax_add_to_cart', function () {        
        setTimeout(function(){
            $('footer').append('<span class="add-product">Thêm vào giỏ hàng thành công.</span>');

            setTimeout(function(){
                $('footer .add-product').addClass('active');

                setTimeout(function(){
                    $('footer .add-product').removeClass('active');

                    setTimeout(function(){
                        $('footer .add-product').remove();
                    }, 1000);
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.single_add_to_cart_button', function () {        
        setTimeout(function(){
            $('footer').append('<span class="add-product">Thêm vào giỏ hàng thành công.</span>');

            setTimeout(function(){
                $('footer .add-product').addClass('active');

                setTimeout(function(){
                    $('footer .add-product').removeClass('active');

                    setTimeout(function(){
                        $('footer .add-product').remove();
                    }, 1000);
                }, 2000);
            }, 400);
        }, 1000);
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

        setTimeout(function(){
            var hght = $('.header-top').outerHeight();
            var hghdsck = $('.header-stick').outerHeight();
            if (hght) {
                hb = parseInt(hght) + parseInt(hghdsck);
                $('header').outerHeight(hb);
            } else {
                $('header').outerHeight(hghdsck);
            }
        }, 1000);
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
    }, 1000);

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
        }, 1000);        
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
    $('.menu-mobile-content .menu-close').click(function(e){
        e.preventDefault();
        $('.menu-mobile-content').removeClass('active');
    });

    $('.megamenu.megamenu-mobile .content-box .icon').click(function(e){
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $(document).on('click', '.megamenu.megamenu-mobile .menu-open a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        $('.megamenu-mobile .menu-mobile-content').height(whg).delay(300).queue(function(next){
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
// jQuery(document).ready(function($) {
//     $(document).on('click', '.search-open .open-icon', function (e) {
//         e.preventDefault();
//         $('.search-box').toggleClass('active');
//     });
    
//     $('.search-close .open-icon').click(function(){
//         $('.search-box').removeClass('active');
//     });
// });
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
        adaptiveHeight: true,
        rows: 1,
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
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

    $(".slick-products").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        // rows: 1,
        // slidesPerRow: 5,
        slidesToShow: 5,
        slidesToScroll: 1,
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
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
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
        adaptiveHeight: true,
        // rows: 1,
        // slidesPerRow: 3,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1774,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
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
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-products-3").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        // slidesPerRow: 6,
        slidesToShow: 6,
        slidesToScroll: 1,
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
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-brands").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 2,
        slidesPerRow: 6,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    // rows: 1,
                    slidesPerRow: 5,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    // rows: 1,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    // rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    // rows: 1,
                    slidesPerRow: 2,
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
        adaptiveHeight: true,
        // rows: 1,
        slidesToShow: 1,
        // slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    // rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    // rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    // rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    // rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 500,
        autoplay: false,
        autoplaySpeed: 3000,
        // asNavFor: '.slick-product-images-nav ul',
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
    });
    $('.slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '',
        nextArrow: '',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
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

    $(".slick-products-gia-dung").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        // slidesPerRow: 3,
        slidesToShow: 3,
        slidesToScroll: 1,
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
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
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
    $('.tab-menu .title').click(function(e){
        e.preventDefault();
        var hs = $(this).parent().hasClass('active');

        if (!hs) {
            var data_tab = $(this).attr('data_tab');
            $('.nav-tabs li').removeClass('active');
            $(this).parent().addClass('active');
            $('.tab-content .tab-pane').removeClass('active');
            $('#'+data_tab).addClass('active');
        }
    });
});
// end tab

// iframe
jQuery(document).ready(function($) {
    $('iframe').attr('title', 'iFrame');
});
// end iframe

// url
jQuery(document).ready(function($) {
    // var hr = window.location.href;
    // if (hr) {
    //     $('.categories-box .megamenu .menu li a[href^="'+hr+'"]').parent().addClass('menu-item-object-page');
    // }
});
// end url

jQuery(document).ready(function($) {
    $('.lth-product-tabs .detailed-reviews .btn-read-more').click(function(e){
        e.preventDefault();
        $('.lth-product-tabs .detailed-review').height('auto');
        $(this).hide();
    });

    $(document).on('click', '.lth-product-tabs .module__header .tabs-menu .title, .lth-single-product .module__header > a', function (e) {
        e.preventDefault();

        var target = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $('#'+target).offset().top - 85
        }, 500);
    });

    $('.main-carts .form-contact .form-group-radio-shipping .wpcf7-form-control').click(function(){
        var hsshp = $(this).parent().hasClass('your-choose-shipping');

        if (hsshp) {
            $('.main-carts .form-contact .form-group-address').addClass('active');
        } else {
            $('.main-carts .form-contact .form-group-address').removeClass('active');
        }
    });

    var heprd = $('.lth-product-tabs .module__content .detailed-review .content').outerHeight();
    if (heprd <= 1100) {
        $('.lth-product-tabs .module__content .detailed-review').css({'height':'auto', 'margin-bottom':'0'});
        $('.lth-product-tabs .detailed-reviews .btn-read-more').remove();
    }
});