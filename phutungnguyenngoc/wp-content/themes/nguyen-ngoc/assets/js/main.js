(function($) {
    "use strict";
    
    /* jQuery MeanMenu */
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });
    
    /*--
	Header Search Toggle
    -----------------------------------*/
    var searchToggle = $('.menu-toggle');
    searchToggle.on('click', function() {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $(this).siblings('.main-menu').removeClass('open');
        } else {
            $(this).addClass('open');
            $(this).siblings('.main-menu').addClass('open');
        }
    })
    
    /* slider active */
    $('.slider-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    /* hover 3d init for tilt */
    if ($('.tilter').length > 0) {
        $('.tilter').tilt({
            maxTilt: 40,
            perspective: 800,
            easing: "cubic-bezier(.03,.98,.52,.99)",
            scale: 1,
            speed: 800,
            transition: true,
        });
    }
    
    /* testimonial active */
    $('.product-slider-active').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['SAU', 'TRƯỚC'],
        nav: true,
        item: 3,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    })
    /* latest-product-slider active */
    $('.latest-product-slider').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['SAU', 'TRƯỚC'],
        nav: true,
        item: 1,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    /* testimonial active */
    $('.product-accessories-active').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        nav: false,
        item: 5,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            },
            1500: {
                items: 4
            }
        }
    })
    
    /* testimonial active */
    $('.testimonial-active').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['SAU', 'TRƯỚC'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    /* cart */
    $(".icon-cart").on("click", function() {
        $(this).parent().find('.shopping-cart-content').slideToggle('medium');
    })
    
    /*---------------------
    shop grid list
    --------------------- */
    $('.view-mode li a').on('click', function() {
        var $proStyle = $(this).data('view');
        $('.view-mode li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.product-view').removeClass('product-grid product-list').addClass($proStyle);
    })
    
    /*--------------------------
    tab active
    ---------------------------- */
    var ProductDetailsSmall = $('.product-details-small a');
    
    ProductDetailsSmall.on('click', function(e) {
        e.preventDefault();
        
        var $href = $(this).attr('href');
        
        ProductDetailsSmall.removeClass('active');
        $(this).addClass('active');
        
        $('.product-details-large .tab-pane').removeClass('active');
        $('.product-details-large ' + $href).addClass('active');
    })
    
    /*------ Wow Active ----*/
    new WOW().init();
    
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    var CartPlusMinus = $('.cart-plus-minus');
    
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    
    
    /*--
    Menu Stick
    -----------------------------------*/
    var header = $('.transparent-bar');
    var win = $(window);
    
    win.on('scroll', function() {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
        } else {
            header.addClass('stick');
        }
    });
    
    /*---------------------
    sidebar sticky
    --------------------- */
    $('.sidebar-active').stickySidebar({
        topSpacing: 80,
        bottomSpacing: 30,
        minWidth: 991,
    });
    
    /*---------------------
    chosen
    --------------------- */
    $('.orderby').chosen({
        disable_search: true,
        width: "auto"
    });
    
    /* product-dec-slider active */
    $('.product-dec-slider').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        nav: true,
        item: 4,
        margin: 12,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    })
    
    /*---------------------
    price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');
    $(function() {
        sliderrange.slider({
            range: true,
            min: 1000000,
            max: 62000000,
            values: [10000000, 50000000],
            slide: function(event, ui) {
                amountprice.val(ui.values[0] + " vnđ - " + ui.values[1] + ' vnđ');
            }
        });
        amountprice.val(sliderrange.slider("values", 0) +
            " vnđ - " + sliderrange.slider("values", 1) + " vnđ");
    });
    
    
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();
    
    
    /*--- showlogin toggle function ----*/
    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });
    
    
    /*--- showlogin toggle function ----*/
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });
    
    
    /*--- showlogin toggle function ----*/
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    })
    
    /*--------------------------
     ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="icofont icofont-rounded-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    $('.nav-link.custom-control.custom-radio').on('click', function(e){
      e.preventDefault();
      var a = $(this).children('.custom-control-input').prop('value');
      $(this).children('.custom-control-input').prop('checked',true);
      console.log(a);
    });


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

    $(document).on('click', '.cart-btn .icon-cart', function (e) {
        e.preventDefault();
        $(this).parent().parent().next().slideToggle('slow');
    });
    
    $(".slick-products").slick({
        loop: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true,
        rows: 2,
        slidesPerRow: 3,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0">Sau</a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0">Trước</a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 2,
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 2,
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

    $('.products-ordering > label').click(function(){
        $(this).parent().toggleClass('show');
    });

    $('.view-mode > li a').click(function(e) {
        e.preventDefault();
    });

    

})(jQuery);

jQuery(document).ready(function($) {
    setTimeout(function(){
        // $(document).on('click', '.payment_methods_title li', function () {
        $('.payment_methods_title li').click(function(){
            var txt = $(this).attr('data_id');
            $('.payment_methods .wc_payment_method').css({'display': 'none'});
            $('#'+txt).css({'display': 'block'});       
        });

        $('.bank-title li').click(function(){
            var cl = $(this).hasClass('active');
            if (!cl) {
                var txt = $(this).attr('data_tab');
                $('.bank-title li').removeClass('active');
                $(this).addClass('active');
                $('.bank-content li').css({'display': 'none'});
                $('.bank-content li.'+txt).css({'display': 'block'});   
            }    
        });
    }, 2000); 
});