jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(window).on("scroll",function() {
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-stick').outerHeight();
        if (ht) {
            var wd = $(window).width();

            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > ht ) {
                $('.headers').addClass('active');

                // if (wd > 991) {
                //     $('.megamenu').addClass('active');
                // }
            } 
            if ($(this).scrollTop() <= ht ) {
                $('.headers').removeClass('active');

                // if (wd > 991) {
                //     $('.megamenu').removeClass('active');
                // }
            } 
        } else {
            hb = hghdsck;
            if ($(this).scrollTop() > hb ) {
                $('.headers').addClass('active');

                // if (wd > 991) {
                //     $('.megamenu').addClass('active');
                // }
            } 
            if ($(this).scrollTop() <= 0 ) {
                $('.headers').removeClass('active');

                // if (wd > 991) {
                //     $('.megamenu').removeClass('active');
                // }
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

    var ht = $('.header-top').outerHeight();
    var hghdsck = $('.header-stick').outerHeight();
    hb = parseInt(ht) + parseInt(hghdsck);
    $('.headers').outerHeight(hb);

    $(window).resize(function(){
        setTimeout(function() {
            var ht = $('.header-top').outerHeight();
            var hghdsck = $('.header-stick').outerHeight();
            hb = parseInt(ht) + parseInt(hghdsck);
            $('.headers').outerHeight(hb);
        }, 200);
    });
});

jQuery(document).ready(function($) {

    // $(".slick-slidershow").slick({
    //     loop: true,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     dots: false,
    //     infinite: true,
    //     speed: 1000,
    //     rows: 1,
    //     slidesPerRow: 1,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     adaptiveHeight: true,
    //     prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-simple-left icon"></i></a>',
    //     nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-simple-right icon"></i></a>',
    //     responsive: [
    //         {
    //             breakpoint: 1200,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         }
    //     ]
    // });

    // $(".slick-features").slick({
    //     loop: true,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     dots: false,
    //     infinite: true,
    //     speed: 1000,
    //     rows: 1,
    //     slidesPerRow: 3,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     adaptiveHeight: true,
    //     prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
    //     nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
    //     responsive: [
    //         {
    //             breakpoint: 1200,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 3,
    //             }
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 2,
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 2,
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         }
    //     ]
    // });

    $(".slick-categories").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
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

    // $(".slick-blogs").slick({
    //     loop: true,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     dots: false,
    //     infinite: true,
    //     speed: 1000,
    //     rows: 1,
    //     slidesPerRow: 2,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     adaptiveHeight: true,
    //     prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-simple-left icon"></i></a>',
    //     nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-simple-right icon"></i></a>',
    //     responsive: [
    //         {
    //             breakpoint: 1200,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 2,
    //             }
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 576,
    //             settings: {
    //                 rows: 1,
    //                 slidesPerRow: 1,
    //             }
    //         }
    //     ]
    // });

    $(".slick-brands").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        slidesPerRow: 6,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesPerRow: 6,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesPerRow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesPerRow: 2,
                }
            }
        ]
    });

    $(".slick-teams").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 1000,
        rows: 1,
        slidesPerRow: 4,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
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

    $('.slick-services-library-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-services-library-nav',
        prevArrow: '<button class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></button>',
        nextArrow: '<button class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></button>',
    
    });
    $('.slick-services-library-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slick-services-library-for',
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
                    slidesToShow: 4,
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

});

// js popups
jQuery(document).ready(function($) {
    // popups
    $('.btn-popup').click(function(e){
        e.preventDefault();

        var adat = $(this).attr('data_popup');
        
        $('.lth-popups').addClass('active');
        $('.' + adat).addClass('show');
        var hg_pop = $('.' + adat).height();
        var hg_win = $(window).height();
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
});
// end js popups

// js tab
jQuery(document).ready(function($) {
    $('.title-tab a').click(function(e){
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var clnm = $(this).attr('class').replace('tab-title','');
            var clsnm = '.tab-content' + clnm;

            var natab = $(this).parent().parent().parent().attr('class');
            
            $('.' + natab + ' > ul > li > a').removeClass('active');
            $(this).addClass('active');
            $('.' + natab + ' > .tab-content').removeClass('active');
            $('.' + natab + ' > ' + clsnm).addClass('active');
        }
    });
});
// end js tab

jQuery(document).ready(function($) {
    $('.megamenu .icon-title').click(function(){
        var wd = $(window).width();

        if (wd > 991) {
            $(this).parent().toggleClass('active');
        } else {
            $('.megamenu-mobile').addClass('show');
        }
    });

    $('.megamenu .menu a .icon').click(function(e){
        e.preventDefault();

        $(this).parent().parent().toggleClass('show');
    });

    $('.megamenu-mobile .menu-close a').click(function(){
        $('.megamenu-mobile').removeClass('show');
        ('.megamenu').removeClass('active');
    });

    $('.search-icon').click(function(e){
        e.preventDefault();
        $('.search-box').addClass('active');
    });

    $('.search-close').click(function(){
        $('.search-box').removeClass('active');
    });

    var wd = $(window).width();
    var cowd = $('.container').width();
    var whr = (wd - cowd) / 2;
    var hg = $('.lth-breadcrumbs').height();
    var tp = parseInt(hg) - 40;

    var svhg = $('.lth-post-single').height();
    var hgwd = $(window).height();
    var sthg = parseInt(hg) + svhg - hgwd;

    var sbwd = $('.lth-sidebars').width();

    if (wd > 991) {
        $(window).on("scroll",function() {
            if ($(this).scrollTop() > tp) {
                $('.lth-sidebars').css({'width': sbwd, 'position': 'fixed', 'top': '90px', 'right': whr, 'z-index': '9999'});
            }

            if ($(this).scrollTop() > sthg) {
                $('.lth-sidebars').css({'position': 'absolute', 'top': 'auto', 'bottom': '0', 'right': '15px'});
            }

            if ($(this).scrollTop() < sthg) {
                $('.lth-sidebars').css({'position': 'fixed', 'top': '90px', 'bottom': 'auto', 'right': whr});
            } 

            if ($(this).scrollTop() < tp) {
                $('.lth-sidebars').css({'position': 'initial'});
            }
        });
    }

});