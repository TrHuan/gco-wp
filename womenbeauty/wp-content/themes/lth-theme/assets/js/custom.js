jQuery(document).ready(function($) {
	$('.back-to-top').click(function(){
		$('html, body').animate({scrollTop:0}, 400);
	});

	$(window).on("scroll",function() {
        if ($(this).scrollTop() > 0 ) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });

    $(document).on('click', '.cart-container-list .cart_list .remove', function () {        
        setTimeout(function(){
            setTimeout(function(){
                $('.notification-product .remove-product').addClass('active');

                setTimeout(function(){
                    $('.notification-product .remove-product').removeClass('active');
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.ajax_add_to_cart', function () {        
        setTimeout(function(){
            setTimeout(function(){
                $('.notification-product .add-product').addClass('active');

                setTimeout(function(){
                    $('.notification-product .add-product').removeClass('active');
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

    $('.products-header .grid-list-view a').click(function(e){
        e.preventDefault();

        var hs = $(this).hasClass('active');

        if (!hs) {
            $('.products-header .grid-list-view a').removeClass('active');
            $(this).addClass('active');

            var hslv = $(this).hasClass('list-view');
            if (hslv) {
                $('.shop-area').addClass('list-view');
            } else {
                $('.shop-area').removeClass('list-view');
            }
        }
    });

    $('.slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-product-images-nav .ul',
        prevArrow: '',
        nextArrow: '',
    });
    $('.slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 3,
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
                    slidesToShow: 3,
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

    $(document).on('click', '.quick-view-pro .yith-wcqv-button', function () {
        setTimeout(function(){
            $('.slick-product-images-for .ul').slick({
                loop: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                asNavFor: '.slick-product-images-nav .ul',
                prevArrow: '',
                nextArrow: '',
            });
            $('.slick-product-images-nav .ul').slick({
                loop: true,
                slidesToShow: 3,
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
                            slidesToShow: 3,
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
        }, 2000);
    });

    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.primary-menu .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
        $('.primary-menu .menu li a[href^="'+data_url+'"]').parent().addClass('current_page_item');         
    } else {
        var data_url = $('.main-page').attr('data_url');
        $('.primary-menu .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
        $('.primary-menu .menu li a[href^="'+data_url+'"]').parent().addClass('current_page_item');
    }

    // tab phương thức thanh toán
    $(document).on('click', '.order_review .tab-title li', function () {
        var has = $(this).hasClass('active');

        if (!has) {
            var clt = $(this).attr('class');

            $('.order_review .tab-content li').removeClass('active');
            $('.order_review .tab-content li.'+clt).addClass('active');
            $('.order_review .tab-title li').removeClass('active');
            $(this).addClass('active');
        }
    });
});

(function($) {
    "use strict";

    // your code here

    var slider = function ($scope, $) {
        $(".slider-activation").owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            items: 1,
            autoplayTimeout: 10000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: true,
            autoHeight: true,
            lazyLoad: true,
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-slider.default', slider);
    });

    var blog = function ($scope, $) {
        $(".blog-activation").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            smartSpeed: 700,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-posts.default', blog);
    });

    var blog2 = function ($scope, $) {
        $(".single-deal-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            items:1,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 300
                },
                576: {
                    items: 2
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-posts.default', blog2);
    });

    var brand = function ($scope, $) {
        $(".brand-logo-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 500,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 300
                },
                340: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-brand.default', brand);
    });

    var tabproducts = function ($scope, $) {
        $(".our-pro-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                480: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-tab-products.default', tabproducts);
    });

    var tabproducts2 = function ($scope, $) {
        $(".tripple-pro-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                480: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-tab-products.default', tabproducts2);
    });

    var products = function ($scope, $) {
        $(".tripple-pro-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                480: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', products);
    });
    
    var countdown = function ($scope, $) {
        $('[data-countdown]').each(function () {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('<div class="count"><p>%D</p><span>Days</span></div><div class="count"><p>%H</p> <span>Hours</span></div><div class="count"><p>%M</p> <span>Mins</span></div><div class="count"> <p>%S</p> <span>Secs</span></div>'));
            });
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', countdown);
    });

    var productscountdown = function ($scope, $) {
        $(".single-deal-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            items:1,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 300
                },
                576: {
                    items: 2
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', productscountdown);
    });

    var products3 = function ($scope, $) {
        $(".single-deal-active").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 20,
            items:1,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 300
                },
                576: {
                    items: 2
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    };
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', products3);
    });

})(jQuery);