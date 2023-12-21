jQuery(document).ready(function($) {
    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.vk-header__menu-content .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
        $('.vk-header__menu-content .menu li a[href^="'+data_url+'"]').parent().addClass('current_page_item');         
    } else {
        var data_url = $('.main-page').attr('data_url');
        $('.vk-header__menu-content .menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
        $('.vk-header__menu-content .menu li a[href^="'+data_url+'"]').parent().addClass('current_page_item');
    }

    var url_page = window.location.href;
    var price = url_page.search('price');    
    if (price > 0) {
        var desc = url_page.search('desc');
        if (desc > 0) {
            $('.vk-sidebar__checkbox .products-ordering li input[value=price-desc]').parent().addClass('chosen');
        } else {
            $('.vk-sidebar__checkbox .products-ordering li input[value=price]').parent().addClass('chosen');
        }
    }

    $(document).on('click', '.single_add_to_cart_button.btn-buy-now', function () {  
        var data_link_cart = $(this).attr('data_link_cart');

        setTimeout(function(){
            setTimeout(function(){
                setTimeout(function(){
                    setTimeout(function(){        
                        window.location.replace(data_link_cart);
                    }, 1000);
                }, 2000);
            }, 400);
        }, 1000);
    });

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

    $('.vk-header__cat .vk-btn').click(function(e){
        var w = $(window).width();
        var bhs = $('body').hasClass('open-menu');

        if (w <= 991 && !bhs) {
            e.preventDefault();
            // var wmenu = $('#menu2').width();
            var h = $(window).height();
            // $('.main-wrapper').css({'transform': 'translateX('+wmenu+'px'});
            $('html').addClass('open-menu');
            $('body').height(h);
        }
    });

    $(document).on('click', '.open-menu .bg-menu', function () {
        var bhs = $('html').hasClass('open-menu');

        if (bhs) {
            // $('.main-wrapper').css({'transform': 'translateX(0px'});
            $('html').removeClass('open-menu');
            $('body').height('auto');
        }
    });
});