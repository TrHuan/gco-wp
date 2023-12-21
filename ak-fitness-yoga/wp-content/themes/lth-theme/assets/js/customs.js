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

    $(document).on('click', '.cart-btn', function (e) {
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
        $(this).parent().toggleClass('show');
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

    $(document).on('click', '.product-content-box .single_add_to_cart_button', function () {        
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


    $('.meanmenu-reveal').click(function(e){
        e.preventDefault();
        $('.mobile-menu .mean-bar').slideToggle('slow');
    });
    $('.mobile-menu a .icon').click(function(e){
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $(document).on('click', '.grid-list-view .tabs-area li a', function (e) {
        e.preventDefault();
        var hs = $(this).hasClass('active');
        var pgl = $(this).hasClass('list-view');

        if (!hs) {
            $('.grid-list-view .tabs-area li a').removeClass('active');
            $(this).addClass('active');
        }

        if (pgl) {
            $('.products-list .product').addClass('list-view');
        } else {
            $('.products-list .product').removeClass('list-view');
        }
    });

    $('.lth-product-tabs .nav-tabs > li > a').click(function(e){
        e.preventDefault();
        var hs = $(this).parent().hasClass('active');
        if (!hs) {
            $('.lth-product-tabs .nav-tabs > li').removeClass('active');
            $(this).parent().addClass('active');
        }
        var dta = $(this).attr('data_tab');
        $('.tab-content>.tab-pane').removeClass('active');
        $('.tab-content #'+dta).addClass('active');
    });
});

jQuery(document).ready(function($) {

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

    $(document).on('click', '.pro-actions .yith-wcqv-button', function () {
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
});