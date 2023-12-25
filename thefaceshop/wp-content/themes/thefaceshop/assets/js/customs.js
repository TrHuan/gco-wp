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

        // if ($(this).scrollTop() > 0 ) {
        //     $('.back-to-top').addClass('active');
        // } else {
        //     $('.back-to-top').removeClass('active');
        // }
    });

    // $('.back-to-top').click(function(){
    //     $('html, body').animate({scrollTop:0}, 400);
    // });    

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

    $('.menu-mobile .menu-open').click(function(e){
        e.preventDefault();

        $('.menu-mobile .menu-content').slideToggle('slow');

        $(this).parent().addClass('active')
    });

    $('.menu-mobile .menu-close').click(function(e){
        e.preventDefault();

        $('.menu-mobile .menu-content').slideToggle('slow');

        $(this).parent().removeClass('active')
    });

    $('.menu-mobile .menu-content .nav-menu li a .icon').click(function(e){
        e.preventDefault();

        $(this).parent().next().slideToggle('slow');

        $(this).toggleClass('active');
    });

    $('.products-list .nav-area a').click(function(e){
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.products-list .nav-area a').removeClass('active');
            $(this).addClass('active');

            var dat = $(this).attr('data-tab');

            if (dat == 'list-view') {
                $('.products-list .products').addClass('list-view');
            } else {
                $('.products-list .products').removeClass('list-view');
            }
        }
    });

    $('.main-product-thumbnail .thumb-menu .owl-item a').click(function(e){
        e.preventDefault();
        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.main-product-thumbnail .thumb-menu .owl-item a').removeClass('active');
            $(this).addClass('active');

            var dat = $(this).attr('href');

            $('.main-product-thumbnail .tab-content .tab-pane').removeClass('active');
            $('.main-product-thumbnail .tab-content ' + dat).addClass('active');

            $('.main-product-thumbnail .tab-content .tab-pane').removeClass('show');
            $('.main-product-thumbnail .tab-content ' + dat).addClass('show');
        }
    });

    $('.thumnail-desc .nav a').click(function(e){
        e.preventDefault();
        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.thumnail-desc .nav a').removeClass('active');
            $(this).addClass('active');

            var dat = $(this).attr('href');

            $('.thumnail-desc .tab-content .tab-pane').removeClass('active');
            $('.thumnail-desc .tab-content ' + dat).addClass('active');

            $('.thumnail-desc .tab-content .tab-pane').removeClass('show');
            $('.thumnail-desc .tab-content ' + dat).addClass('show');
        }
    });

    $(document).on('click', '.woocommerce-checkout-payment .nav .nav-link', function (e) {
        e.preventDefault();
        var ac = $(this).hasClass('active');

        if (!ac) {
            $('.woocommerce-checkout-payment .nav .nav-link').removeClass('active');
            $(this).addClass('active');

            var dat = $(this).attr('href');

            $('.woocommerce-checkout-payment .tab-pane').removeClass('active');
            $('.woocommerce-checkout-payment .tab-content ' + dat).addClass('active');

            $('.woocommerce-checkout-payment .tab-pane').removeClass('show');
            $('.woocommerce-checkout-payment .tab-content ' + dat).addClass('show');
        }
    });

    var urla = window.location.href;
    var kq_date = urla.indexOf('?orderby=date');
    var kq_price = urla.indexOf('?orderby=price');
    var kq_price_desc = urla.indexOf('?orderby=price-desc');    

    if (kq_price_desc !== -1) {
        var kq = 'Giá cao đến thấp';

        $('.main-products .products-ordering label').remove();
        $('.main-products .products-ordering').append('<label>'+kq+'</label>');
    } else if (kq_price !== -1) {
        var kq = 'Giá thấp đến cao';

        $('.main-products .products-ordering label').remove();
        $('.main-products .products-ordering').append('<label>'+kq+'</label>');
    } else if (kq_date !== -1) {
        var kq = 'Sản phẩm mới';

        $('.main-products .products-ordering label').remove();
        $('.main-products .products-ordering').append('<label>'+kq+'</label>');
    }

    $(document).on('click', '.products-ordering > label', function () {
        $(this).parent().toggleClass('show');
    });

    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    } else {
        var data_url = $('.main-page').attr('data_url');
        $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    }

    var blhe = $('.blog-activation.owl-carousel .owl-stage').height();
    $('.blog-activation.owl-carousel .owl-stage .single-blog').height(blhe);

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

    $(document).on('click', '.module_products .pro-actions .ajax_add_to_cart', function () {        
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

    $('.product-thumbnail .thumb-menu').owlCarousel({
        loop: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        margin: 15,
        smartSpeed: 1000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 3,
                autoplay: true,
                smartSpeed: 300
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    // $('.thumb-menu a').click(function(e){
    $(document).on('click', '.thumb-menu a', function (e) {
        e.preventDefault();
        $('.thumb-menu a').removeClass('active');
        $(this).addClass('active');

        var href = $(this).attr('href');

        console.log(href);

        $('.main-product-thumbnail .tab-pane').removeClass('active');
        $('.main-product-thumbnail .tab-pane').removeClass('show');
        $(href).addClass('active');
        $(href).addClass('show');
    });

    $(document).on('click', '.module_products .yith-wcqv-button', function () {
        setTimeout(function(){
            $('.product-thumbnail .thumb-menu').owlCarousel({
                loop: false,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                margin: 15,
                smartSpeed: 1000,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                        autoplay: true,
                        smartSpeed: 300
                    },
                    768: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        }, 2000);
    });

    $('.sidebar-box .menu li a .icon').click(function (e) {
        e.preventDefault();
        var hs = $(this).parent().hasClass('active');

        if (hs) {
            $(this).parent().removeClass('active');
            $(this).parent().next().slideUp();
        } else {
            $('.sidebar-box .menu-danh-muc-san-pham-container li a').removeClass('active');
            $(this).parent().addClass('active');
            $('.sidebar-box .menu-danh-muc-san-pham-container .sub-menu').slideUp();
            $(this).parent().next().slideDown();
        }
    });
});