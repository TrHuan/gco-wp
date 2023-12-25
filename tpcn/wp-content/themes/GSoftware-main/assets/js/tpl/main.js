jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(window).on("scroll",function() {
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-main').outerHeight();
        if (ht) {
            var wd = $(window).width();

            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > ht ) {
                $('.headers').addClass('active');
            } 
            if ($(this).scrollTop() <= ht ) {
                $('.headers').removeClass('active');
            } 
        } else {
            hb = hghdsck;
            if ($(this).scrollTop() > hb ) {
                $('.headers').addClass('active');
            } 
            if ($(this).scrollTop() <= 0 ) {
                $('.headers').removeClass('active');
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
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-main').outerHeight();
        hb = parseInt(ht) + parseInt(hghdsck);
        $('.headers').outerHeight(hb);
    }, 2000);

    $(window).resize(function(){
        setTimeout(function() {
            var ht = $('.header-top').outerHeight();
            var hghdsck = $('.header-main').outerHeight();
            hb = parseInt(ht) + parseInt(hghdsck);
            $('.headers').outerHeight(hb);
        }, 200);
    });
});

jQuery(document).ready(function($) {

    $(".slick-slidershow").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-slider-banners").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
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
        speed: 1000,
        rows: 2,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: false,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1199,
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

    $(".slick-products-new").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 4,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: false,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-features").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-testimonials").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-blogs").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-brands").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 6,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="typo-icon typo-icon-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="typo-icon typo-icon-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.slick-product-library-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-product-library-nav',
        // prevArrow: '<button class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></button>',
        // nextArrow: '<button class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></button>',
        prevArrow: '',
        nextArrow: '',
    });
    $('.slick-product-library-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slick-product-library-for',
        dots: false,
        // centerMode: true,
        // variableWidth: true,
        focusOnSelect: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
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

        var hg_pop = $('.' + adat + ' .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.lth-popups .popup-box').height(hg_win - 30);
            $('.lth-popups .popup-box').css({'top': '15px', 'left': '15px'});
        } else {    
            $('.lth-popups .popup-box').height('auto');
            $('.lth-popups .popup-box').css({'top': 'auto', 'left': 'auto'});
        } 
        
        $('.lth-popups').addClass('active');
        $('.' + adat).addClass('show');
    });
    ////////////////////
    var hg_pop = $('.lth-popups .show .content-box').outerHeight();
    var hg_win = $(window).height();
    if (hg_pop >= hg_win) {    
        $('.lth-popups .popup-box').height(hg_win - 30);
        $('.lth-popups .popup-box').css({'top': '15px', 'left': '15px'});
    } else {    
        $('.lth-popups .popup-box').height('auto');
        $('.lth-popups .popup-box').css({'top': 'auto', 'left': 'auto'});
    } 
    ////////////////////
    $('.lth-popups .popup-box .close-icon').click(function(e){
        e.preventDefault();

        $('.lth-popups').removeClass('active');
        $('.popup-box').removeClass('show');
    });
    ////////////////////
    $('.lth-popups .popups-content').click(function(e){
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function(){
        var hg_pop = $('.lth-popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.lth-popups .popup-box').height(hg_win - 30);
            $('.lth-popups .popup-box').css({'top': '15px', 'left': '15px'});
        } else {    
            $('.lth-popups .popup-box').height('auto');
            $('.lth-popups .popup-box').css({'top': 'auto', 'left': 'auto'});
        } 
    });
});
// end js popups

// js tab
jQuery(document).ready(function($) {
    $('.tab-box .title-box .title').click(function(e){
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var tp = $(this).attr('tab_data');
            $('.tab-box .title-box .title').removeClass('active');
            $(this).addClass('active');
            $('.tab-panel').removeClass('active');
            $('.'+tp).addClass('active');
        }
    });

    $('.tab-box-2 .title-box .title').click(function(){
        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.tab-box-2 .title-box .title').removeClass('active');
            $(this).addClass('active');
            $('.tab-panel .single-content').slideUp();
            $(this).parent().next().slideDown();
        } else {
            $('.tab-box-2 .title-box .title').removeClass('active');
            $('.tab-panel .single-content').slideUp();
        }
    });
});
// end js tab

jQuery(document).ready(function($) {
    $('.widget_nav_menu a .icon').click(function(e){
        e.preventDefault();

        var hc = $(this).parent().parent().hasClass('active');

        if (hc) {
            $(this).parent().parent().removeClass('active');
            $(this).parent().next().slideUp();
        } else {
            $('.widget_nav_menu ul li').removeClass('active');
            $(this).parent().parent().addClass('active');
            $(this).parent().next().slideDown();
        }
    });

    // $('.megamenu-mobile .menu-title').click(function(e){
    //     e.preventDefault();
    //     $('.megamenu-mobile-content').addClass('active');
    // });
    
    // $('.megamenu-mobile-content .close-title').click(function(e){
    //     e.preventDefault();
    //     $('.megamenu-mobile-content').removeClass('active');
    // });

    $('.search-icon').click(function(e){
        e.preventDefault();
        $('.search-box').addClass('active');
    });

    $('.search-box .close-title').click(function(e){
        e.preventDefault();
        $('.search-box').removeClass('active');
    });

    $('.module_products .content-qty span').click(function(){
        var hscc = $(this).hasClass('qty-minus');

        if (hscc) {
            var val = $(this).next().attr('value');
            
            if (val > 1) {
                val--;
            }

            $(this).next().attr('value', val);
        } else {
            var val = $(this).prev().attr('value');
            val++;

            $(this).prev().attr('value', val);
        }        
    });

    $('.products-ordering > label').click(function(){
        $(this).parent().toggleClass('show');
    });

    $('.products-result .result-ordering ul li input').click(function(){
        $(this).parent().toggleClass('show');
    });

    $('.lth-sidebars a .icon').click(function(e){
        e.preventDefault();

        var ac = $(this).parent().parent().hasClass('active');

        if (ac) {
            $(this).parent().parent().removeClass('active');
            $(this).parent().next().slideUp();
        } else {
            $('.lth-sidebars li').removeClass('active');
            $('.lth-sidebars .sub-menu').slideUp();
            $(this).parent().parent().addClass('active');
            $(this).parent().next().slideDown();
        }
        
    });

});