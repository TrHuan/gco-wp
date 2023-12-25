jQuery(function ($) {
    // $("header").load("header.html");
    // $("footer").load("footer.html");

    var url = $('body').attr('data_url');

        $('.banner-slider').owlCarousel({
            animateOut: 'zoomOutLeft',
            loop:true,
            autoplay: true,
            items:1,
            dots: false,
            nav: true,
            navText: ['<img src="' + url + '/assets/images/icon/left-arrow.png" alt="Icon" width="24" height="45">','<img src="' + url + '/assets/images/icon/right-arrow.png" alt="Icon" width="24" height="45">'],
            responsive:{
                0:  { items:1, center:true },
                480:{ items:1 },
                678:{ items:1 },
                960:{ items:1 }
            }
        });

    $('.product-slider').owlCarousel({
        loop:true,
        autoplay: true,
        items:4,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<img src="' + url + '/assets/images/icon/prev-1.png" alt="Icon" width="50" height="50">','<img src="' + url + '/assets/images/icon/next-1.png" alt="Icon" width="50" height="50">'],
        responsive:{
            0:  { items:1, center:true },
            480:{ items:2 },
            678:{ items:2 },
            960:{ items:4 }
        }
    });

    $('.news-slider').owlCarousel({
        loop:true,
        autoplay: true,
        items:4,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<img src="' + url + '/assets/images/icon/left-ar.png" alt="Icon">','<img src="' + url + '/assets/images/icon/right-arr.png alt="Icon"">'],
        responsive:{
            0:  { items:1, center:true },
            480:{ items:2 },
            678:{ items:2 },
            960:{ items:2 }
        }
    });

    //slider image product
    $(document).ready(function () {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 1; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            pagination: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: 4,
                dots: false,
                autoplay: false,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                margin: 10,
                nav: true,
                navText: ['<img src="' + url + '/assets/images/icon/left-ar.png" alt="Icon">','<img src="' + url + '/assets/images/icon/right-arr.png" alt="Icon">'],
                responsiveRefreshRate: 100,
                responsive: {
                    0: {
                        items: 4
                    },
                    420: {
                        items: 4
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 4
                    },
                    1300: {
                        items: 4
                    },
                    1590: {
                        items: 4
                    }
                }
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });


    // menu mobile
    jQuery(document).ready(function ($) {
        var $lateral_menu_trigger = $('#cd-menu-trigger'),
            $content_wrapper = $('.cd-main-content'),
            $navigation = $('header');

        //open-close lateral menu clicking on the menu icon
        $lateral_menu_trigger.on('click', function (event) {
            event.preventDefault();

            $lateral_menu_trigger.toggleClass('is-clicked');
            $navigation.toggleClass('lateral-menu-is-open');
            $content_wrapper.toggleClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
                $('body').toggleClass('overflow-hidden');
            });
            $('#cd-lateral-nav').toggleClass('lateral-menu-is-open');

            //check if transitions are not supported - i.e. in IE9
            if ($('html').hasClass('no-csstransitions')) {
                $('body').toggleClass('overflow-hidden');
            }
        });

        //close lateral menu clicking outside the menu itself
        $content_wrapper.on('click', function (event) {
            if (!$(event.target).is('#cd-menu-trigger, #cd-menu-trigger span')) {
                $lateral_menu_trigger.removeClass('is-clicked');
                $navigation.removeClass('lateral-menu-is-open');
                $content_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                    $('body').removeClass('overflow-hidden');
                });
                $('#cd-lateral-nav').removeClass('lateral-menu-is-open');
                //check if transitions are not supported
                if ($('html').hasClass('no-csstransitions')) {
                    $('body').removeClass('overflow-hidden');
                }
            }
        });

        //open (or close) submenu items in the lateral menu. Close all the other open submenu items.
        $('.item-has-children').children('.arrow').on('click', function (event) {
            event.preventDefault();
            $(this).parent('.item-has-children').toggleClass('li-active');
            $(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.item-has-children').siblings('.item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);
        });
    });

    new WOW().init();

    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 4000
        });
    });

    $(function () {
        $('.add').on('click',function(){
            var $qty=$(this).closest('.action-number').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('.minus').on('click',function(){
            var $qty=$(this).closest('.action-number').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $qty.val(currentVal - 1);
            }
        });
    });

    $(document).ready(function() {
        $("input[name='bank']").click(function() {
            var test = $(this).val();

            $(".desc-bank").hide();
            $("#bankInfo-" + test).show();
        });
    });

    

    $('.slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-product-images-nav ul',
        prevArrow: '',
        nextArrow: '',    
        // prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fa fa-chevron-left icon"></i></a>',
        // nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fa fa-chevron-right icon"></i></a>',
    });
    $('.slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fa fa-chevron-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fa fa-chevron-right icon"></i></a>',
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

    $(".slick-related-products").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 1,
        // slidesPerRow: 4,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '',
        nextArrow: '',    
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
                    slidesToShow: 1,
                }
            }
        ]
    });

    // $('<div class="quantity-nav"><button class="quantity-button quantity-down"><span class="icon minus fa fa-minus"></span></button><button class="quantity-button quantity-up"><span class="icon plus fa fa-plus"></span></button></div>').insertAfter('.woocommerce-cart-form .product-quantity input');
    // $('.woocommerce-cart-form .product-quantity .quantity').each(function () {
    //     var spinner = $(this),
    //     input = spinner.find('input[type="number"]'),
    //     btnUp = spinner.find('.quantity-up'),
    //     btnDown = spinner.find('.quantity-down'),
    //     min = input.attr('min'),
    //     max = input.attr('max');

    //     btnUp.on('click', function () {
    //         var oldValue = parseFloat(input.val());
    //         if (max) {
    //             if (oldValue >= max) {
    //                 var newVal = oldValue;
    //             } else {
    //                 var newVal = oldValue + 1;
    //             }
    //         } else {
    //             var newVal = oldValue + 1;
    //         }
    //         spinner.find("input").val(newVal);
    //         spinner.find("input").trigger("change");
    //     });

    //     btnDown.on('click', function () {
    //         var oldValue = parseFloat(input.val());
    //         if (oldValue <= min) {
    //             var newVal = oldValue;
    //         } else {
    //             var newVal = oldValue - 1;
    //         }
    //         spinner.find("input").val(newVal);
    //         spinner.find("input").trigger("change");
    //     });
    // });

    $(document).on('click', '.woocommerce-checkout .bank-tab-title li > input', function () {
        var act = $(this).parent().hasClass('active');

        if (!act) {
            var actt = $(this).attr('bank_data');
            $('.woocommerce-checkout .bank-tab-title li').removeClass('active')
            $(this).parent().addClass('active');
            $('.woocommerce-checkout .bank-tab-content li').removeClass('active');
            $('.woocommerce-checkout .bank-tab-content li[bank_data="' + actt + '"]').addClass('active');
        }
    });
    
    // $(document).on('click', '.methods-title li input', function () {
    $('.methods-title li input').click( function () {

        console.log('qqqq');
        var met = $(this).parent().hasClass('active');

        if (!met) {
            var meth = $(this).attr('data_method');
            $('.methods-title li').removeClass('active');
        }
    });
});
