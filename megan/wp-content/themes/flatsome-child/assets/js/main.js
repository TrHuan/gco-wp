jQuery(document).ready(function ($) {
    //     $(document).on('click', '.cart-container-list .cart_list .remove', function (e) {
    //         e.preventDefault();
    //         var wd = $(window).width();
    // //         if (wd < 850) {
    //             setTimeout(function(){
    //                 setTimeout(function(){
    //                     $('.notification-product .remove-product').addClass('active');

    //                     setTimeout(function(){
    //                         $('.notification-product .remove-product').removeClass('active');
    //                     }, 2000);
    //                 }, 400);
    //             }, 1000);
    // //         }
    //     });

    //     $(document).on('click', '.add-to-cart-button .ajax_add_to_cart, .product-content-box .single_add_to_cart_button, .product-content-box .ajax_add_to_cart', function () {
    //         var wd = $(window).width();
    // //         if (wd < 850) {
    //             setTimeout(function(){
    //                 setTimeout(function(){
    //                     $('.notification-product .add-product').addClass('active');

    //                     setTimeout(function(){
    //                         $('.notification-product .add-product').removeClass('active');
    //                     }, 2000);
    //                 }, 400);
    //             }, 1000);
    // //         }
    //     });

    //     $(window).on("scroll",function() {
    //         setTimeout(function(){
    //             var teshg = $('.portfolio-element-wrapper .flickity-slider > div').height();
    //             var teshg2 = parseInt(teshg) + 0;
    //             $('.portfolio-element-wrapper .flickity-viewport').css({'padding-top': teshg2});
    //         }, 1000);
    //     });

    // if (jQuery().slick) {
    //     var slick = jQuery(".swiper-slider");
    //     slick.each(function () {
    //         var item = jQuery(this).data('item'),
    //             item_lg = jQuery(this).data('item_lg'),
    //             item_md = jQuery(this).data('item_md'),
    //             item_sm = jQuery(this).data('item_sm'),
    //             item_mb = jQuery(this).data('item_mb'),
    //             row = jQuery(this).data('row'),
    //             arrows = jQuery(this).data('arrows'),
    //             dots = jQuery(this).data('dots'),
    //             vertical = jQuery(this).data('vertical');
    //         autoplay = jQuery(this).data('autoplay');
    //         jQuery(this).slick({
    //             loop: true,
    //             autoplay: autoplay,
    //             infinite: true,
    //             autoplaySpeed: 2000,
    //             vertical: vertical,
    //             rows: row,
    //             slidesToShow: item,
    //             slidesToScroll: 1,
    //             lazyLoad: 'ondemand',
    //             // verticalSwiping: true,
    //             dots: dots,
    //             arrows: arrows,
    //             prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
    //             nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
    //             responsive: [
    //                 {
    //                     breakpoint: 1200,
    //                     settings: {
    //                         slidesToShow: item_lg,
    //                         slidesToScroll: 1,
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 992,
    //                     settings: {
    //                         slidesToShow: item_md,
    //                         slidesToScroll: 1,
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 768,
    //                     settings: {
    //                         slidesToShow: item_sm,
    //                         slidesToScroll: 1,
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 576,
    //                     settings: {
    //                         slidesToShow: item_mb,
    //                         slidesToScroll: 1,
    //                     }
    //                 }
    //             ]
    //         });
    //     });
    // }

    $('.swiper-categories').slick({
        loop: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '',
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
                    slidesToShow: 2,
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

    $('.swiper-hinh-anh').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '',
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
                    slidesToShow: 2,
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