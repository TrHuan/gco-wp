// jQuery(document).ready(function($) {
//     $('html, body').animate({scrollTop:0}, 0);

//     $(document).on('click', '.ajax_add_to_cart', function (e) {
//         e.preventDefault();
//         console.log('clicked');
//         $(this).delay(5000).queue(function(next){
//             $(this).removeClass("added");
//             $('.added_to_cart.wc-forward').remove();
//             next();
//         });
//     });

//     $(document).on('click', '.single_add_to_cart_button', function (e) {
//         $(this).delay(8000).addClass("loading").queue(function(next){
//             $(this).delay(800).removeClass("loading").queue(function(next){
//                 $(this).removeClass("added");
//                 $('.added_to_cart.wc-forward').remove();
//                 next();
//             });
//             next();
//         });
//     });

//     $(document).on('click', '.cart-icon', function (e) {
//         e.preventDefault();
//         var whg = $(window).height();
//         $('.cart-content').height(whg).delay(300).queue(function(next){
//             $('.carts-content').addClass('active');
//             next();
//         });
//     });

//     $(document).on('click', '.cart-close', function () {
//         $('.carts-content').removeClass('active');
//     });

//     $(window).resize(function(){
//         var whg = $(window).height();
//         $('.cart-content').height(whg);
//     });

//     var urla = window.location.href;
//     var kq_date = urla.indexOf('?orderby=date');
//     var kq_price = urla.indexOf('?orderby=price');
//     var kq_price_desc = urla.indexOf('?orderby=price-desc');    

//     if (kq_price_desc !== -1) {
//         var kq = 'Giá cao đến thấp';

//         $('.main-products .products-ordering label').remove();
//         $('.main-products .products-ordering').append('<label>'+kq+'</label>');
//     } else if (kq_price !== -1) {
//         var kq = 'Giá thấp đến cao';

//         $('.main-products .products-ordering label').remove();
//         $('.main-products .products-ordering').append('<label>'+kq+'</label>');
//     } else if (kq_date !== -1) {
//         var kq = 'Sản phẩm mới';

//         $('.main-products .products-ordering label').remove();
//         $('.main-products .products-ordering').append('<label>'+kq+'</label>');
//     }

//     $(document).on('click', '.products-ordering > label', function () {
//         $(this).parent().toggleClass('show');
//     });

// });

// jQuery(document).ready(function($) {
//     $(window).on("scroll",function() {
//         var ht = $('.header-top').outerHeight();
//         var hghdsck = $('.header-stick').outerHeight();
//         if (ht) {
//             hb = parseInt(ht) + parseInt(hghdsck);
//             if ($(this).scrollTop() > hb ) {
//                 $('.header-stick').addClass('active');
//             } 
//             if ($(this).scrollTop() <= ht ) {
//                 $('.header-stick').removeClass('active');
//             } 
//         } else {
//             hb = hghdsck;
//             if ($(this).scrollTop() > hb ) {
//                 $('.header-stick').addClass('active');
//             } 
//             if ($(this).scrollTop() <= 0 ) {
//                 $('.header-stick').removeClass('active');
//             } 
//         }     

//         if ($(this).scrollTop() > 0 ) {
//             $('.back-to-top').addClass('active');
//         } else {
//             $('.back-to-top').removeClass('active');
//         }

//         setTimeout(function(){
//             var hght = $('.header-top').outerHeight();
//             var hghdsck = $('.header-stick').outerHeight();
//             if (hght) {
//                 hb = parseInt(hght) + parseInt(hghdsck);
//                 $('header').outerHeight(hb);
//             } else {
//                 $('header').outerHeight(hghdsck);
//             }
//         }, 1000);
//     });

//     $('.back-to-top').click(function(){
//         $('html, body').animate({scrollTop:0}, 400);
//     });    

//     setTimeout(function(){
//         var hght = $('.header-top').outerHeight();
//         var hghdsck = $('.header-stick').outerHeight();
//         if (hght) {
//             hb = parseInt(hght) + parseInt(hghdsck);
//             $('header').outerHeight(hb);
//         } else {
//             $('header').outerHeight(hghdsck);
//         }
//     }, 1000);

//     $(window).resize(function(){
//         setTimeout(function(){
//             var hght = $('.header-top').outerHeight();
//             var hghdsck = $('.header-stick').outerHeight();
//             if (hght) {
//                 hb = parseInt(hght) + parseInt(hghdsck);
//                 $('header').outerHeight(hb);
//             } else {
//                 $('header').outerHeight(hghdsck);
//             }
//         }, 1000);        
//     });
// });

// // js footer
// jQuery(document).ready(function($) {
//     var wh_win = $(window).width();
//     if (wh_win <= 767) {
//         $('.footer-box > .content-box').hide();
//         $('.footer-box.active > .content-box').show();
//     } else {
//         $('.footer-box > .content-box').show();
//     }
    
//     $('.footer-box > .title-box').click(function(){
//         var wh_win = $(window).width();
//         if (wh_win <= 767) {
//             var hsc = $(this).parent().hasClass('active');

//             if (hsc) {
//                 $(this).parent().removeClass('active');
//                 $(this).next().slideToggle('slow');
//             } else {
//                 $('.footer-box').removeClass('active');
//                 $('.footer-box > .content-box').hide();
//                 $(this).parent().addClass('active');
//                 $(this).next().slideToggle('slow');
//             }
//         }
//     });

//     $(window).resize(function(){
//         var wh_win = $(window).width();
//         if (wh_win > 767) {
//             $('.footer-box .content-box').show();
//         } else {
//             $('.footer-box .content-box').hide();
//             $('.footer-box.active .content-box').show();
//         }
//     });
// });
// // end js footer

// // js menu mobile
// jQuery(document).ready(function($) {
//     $('.menu-mobile-content .menu-close').click(function(e){
//         e.preventDefault();
//         $('.menu-mobile-content').removeClass('active');
//     });

//     $('.megamenu.menu-mobile .content-box .icon').click(function(e){
//         e.preventDefault();
//         $(this).parent().next().slideToggle('slow');
//     });

//     $(document).on('click', '.megamenu.menu-mobile-title .menu-open', function (e) {
//         e.preventDefault();
//         var whg = $(window).height();
//         $('.menu-mobile-content').height(whg).delay(300).queue(function(next){
//             $(this).addClass('active');
//             next();
//         });
//     });

//     $(window).resize(function(){
//         var whg = $(window).height();
//         $('.menu-mobile-content').height(whg);
//     });
// });
// // end js menu mobile

// // js search
// // jQuery(document).ready(function($) {
// //     $(document).on('click', '.search-open .open-icon', function (e) {
// //         e.preventDefault();
// //         $('.search-box').toggleClass('active');
// //     });
    
// //     $('.search-close .open-icon').click(function(){
// //         $('.search-box').removeClass('active');
// //     });
// // });
// // end js search

// // js logins
// jQuery(document).ready(function($) {
//     $(document).on('click', '.logins-box .user-icon a', function (e) {
//         e.preventDefault();
//         var whg = $(window).height();
//         $('.logins-box .user-content').height(whg).delay(300).queue(function(next){
//             $('.logins-box .user-box').addClass('active');
//             next();
//         });
//     });

//     $(window).resize(function(){
//         var whg = $(window).height();
//         $('.logins-box .user-content').height(whg);
//     });
    
//     $('.logins-box .user-close').click(function(){
//         $('.logins-box .user-box').removeClass('active');
//     });

//     $('.lth-logins .user-box > ul > li > a').click(function(e){
//         e.preventDefault();
//         var ac = $(this).hasClass('active');

//         if (!ac) {
//             var lg = $(this).hasClass('login-title');
//             var rg = $(this).hasClass('registration-title');

//             if (lg) {
//                 $('.registrations-box').removeClass('active');
//                 $('.logins-box').addClass('active');
//             } else if (rg) {
//                 $('.logins-box').removeClass('active');
//                 $('.registrations-box').addClass('active');
//             }

//             $('.lth-logins .user-box a').removeClass('active');
//             $(this).addClass('active');
//         }
//     });
// });
// // end js logins

// jQuery(document).ready(function($) {

//     $(".slick-slidershow").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         rows: 1,
//         slidesPerRow: 1,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-products-highlights").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         rows: 1,
//         slidesPerRow: 4,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 4,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 2,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-products").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         rows: 2,
//         slidesPerRow: 4,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     rows: 2,
//                     slidesPerRow: 4,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     rows: 2,
//                     slidesPerRow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 2,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-blogs").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         // rows: 1,
//         slidesToShow: 3,
//         // slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 576,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-achievements").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         // rows: 1,
//         slidesToShow: 3,
//         // slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-teams").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         // rows: 1,
//         slidesToShow: 4,
//         // slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 4,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 1,
//                 }
//             }
//         ]
//     });

//     $(".slick-other-products").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         // rows: 1,
//         slidesToShow: 4,
//         // slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 4,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     // rows: 1,
//                     slidesToShow: 1,
//                 }
//             }
//         ]
//     });

//     $('.slick-product-images-for .ul').slick({
//         loop: true,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         infinite: true,
//         speed: 500,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         // asNavFor: '.slick-product-images-nav ul',
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//     });
//     // $('.slick-product-images-nav .ul').slick({
//     //     loop: true,
//     //     slidesToShow: 4,
//     //     slidesToScroll: 1,
//     //     asNavFor: '.slick-product-images-for .ul',
//     //     dots: false,
//     //     focusOnSelect: true,
//     //     prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//     //     nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//     //     responsive: [
//     //         {
//     //             breakpoint: 1200,
//     //             settings: {
//     //                 slidesToShow: 4,
//     //             }
//     //         },
//     //         {
//     //             breakpoint: 992,
//     //             settings: {
//     //                 slidesToShow: 3,
//     //             }
//     //         },
//     //         {
//     //             breakpoint: 768,
//     //             settings: {
//     //                 slidesToShow: 3,
//     //             }
//     //         },
//     //         {
//     //             breakpoint: 480,
//     //             settings: {
//     //                 slidesToShow: 2,
//     //             }
//     //         }
//     //     ]
//     // });

//     $(".slick-videos-popup").slick({
//         loop: true,
//         autoplay: false,
//         autoplaySpeed: 3000,
//         dots: false,
//         infinite: true,
//         speed: 500,
//         adaptiveHeight: true,
//         // vertical: true,
//         rows: 1,
//         slidesPerRow: 1,
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//         nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             },
//             {
//                 breakpoint: 576,
//                 settings: {
//                     rows: 1,
//                     slidesPerRow: 1,
//                 }
//             }
//         ]
//     });

// });

// // js popups
// jQuery(document).ready(function($) {
//     // popups
//     $('.btn-popup').click(function(e){
//         e.preventDefault();

//         var adat = $(this).attr('data_popup');
        
//         $('.lth-popups').addClass('active');
//         $('.' + adat).show();
//         var hg_pop = $('.' + adat).height();
//         var hg_win = $(window).height();
//         if (hg_pop > hg_win) {    
//             $('.lth-popups .popups-box').height(hg_win - 30);
//         } else {    
//             $('.lth-popups .popups-box').height('auto');
//         } 
//     });
//     ////////////////////
//     var hg_pop = $('.art-popups-reviews .popups-content').height();
//     var hg_win = $(window).height();
//     if (hg_pop > hg_win) {    
//         $('.art-popups-reviews .popups-box').height(hg_win - 30);
//     } else {    
//         $('.art-popups-reviews .popups-box').height('auto');
//     } 
//     ////////////////////
//     $('.art-popups .popups-box').click(function(){
//         $(this).parent().removeClass('active');
//     });
//     ////////////////////
//     $('.art-popups .popups-content').click(function(e){
//         e.stopPropagation();
//     });
//     // end popups
//     $(window).resize(function(){
//         // popups
//         var hg_pop = $('.art-popups-reviews .popups-content').height();
//         var hg_win = $(window).height();
//         if (hg_pop > hg_win) {       
//             $('.art-popups-reviews .popups-box').height(hg_win - 30);
//         } else {   
//             $('.art-popups-reviews .popups-box').height('auto');
//         } 
//         // end popups
//     });
// });
// // end js popups

// // countdown
// /* html : <div class="clock" data-countdown="2030/01/01"></div> */
// jQuery(document).ready(function($) {
//     $('.clock').each(function() {
//         var $this = $(this), finalDate = $(this).data('countdown');
//         $this.countdown(finalDate, function(event) {
//             $this.html(event.strftime('%D:%H:%M:%S'));
//         });
//     });
// });
// // end countdown

// // tab
// jQuery(document).ready(function($) {
//     $('.tab-menu .title').click(function(e){
//         e.preventDefault();
//         var hs = $(this).parent().hasClass('active');

//         if (!hs) {
//             var data_tab = $(this).attr('data_tab');
//             $('.nav-tabs li').removeClass('active');
//             $(this).parent().addClass('active');
//             $('.tab-content .tab-pane').removeClass('active');
//             $('#'+data_tab).addClass('active');
//         }
//     });
// });
// // end tab

// // iframe
// jQuery(document).ready(function($) {
//     $('iframe').attr('title', 'iFrame');
// });
// // end iframe

// jQuery(document).ready(function($) {
//     // $('.module_videos .content-image .icon-play').click(function (e) {
//     //     e.preventDefault();

//     //     var src = $(this).next().attr('src');

//     //     $('.module_videos .module_videos_popup iframe').attr('src', src);

//     //     $('.module_videos .module_videos_popup').addClass('active');
//     // });

//     // $('.module_videos .module_videos_popup .video-close').click(function (e) {
//     //     e.preventDefault();

//     //     $('.module_videos .module_videos_popup').removeClass('active');

//     //     $('.module_videos .module_videos_popup iframe').attr('src', '');
//     // });

//     $('.module_videos .content-image .icon-play').click(function (e) {
//         e.preventDefault();

//         $('.module_videos .slider_videos_popup').addClass('active');
//     });

//     $('.module_videos .slider_videos_popup .video-close').click(function (e) {
//         e.preventDefault();

//         $('.module_videos .slider_videos_popup').removeClass('active');

//         var lg = $('.module_videos .groups-box > *').length;

//         for (var i = 1; i <= lg; i++) {
//             var scr = $('.module_videos .slider_videos_popup .item-'+i+' iframe').attr('src');

//             $('.module_videos .slider_videos_popup .item-'+i+' iframe').attr('src', '');

//             $('.module_videos .slider_videos_popup .item-'+i+' iframe').attr('src', scr);
//         }
//     });


//     var data_url = $('body').attr('data_url');
//     if (data_url) {
//         $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
//     } else {
//         var data_url = $('.main-page').attr('data_url');
//         $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
//     }

//     $('.sidebar-box .menu li a .icon').click(function (e) {
//         e.preventDefault();
//         var hs = $(this).parent().hasClass('active');

//         if (hs) {
//             $(this).parent().removeClass('active');
//             $(this).parent().next().slideUp();
//         } else {
//             $('.sidebar-box .menu-danh-muc-san-pham-container li a').removeClass('active');
//             $(this).parent().addClass('active');
//             $('.sidebar-box .menu-danh-muc-san-pham-container .sub-menu').slideUp();
//             $(this).parent().next().slideDown();
//         }
//     });

//     $('.sidebar-box .menu-danh-muc-san-pham-container .current-menu-parent > a').addClass('active');
// });

jQuery(document).ready(function(e){e("html, body").animate({scrollTop:0},0),e(document).on("click",".ajax_add_to_cart",function(i){i.preventDefault(),console.log("clicked"),e(this).delay(5e3).queue(function(i){e(this).removeClass("added"),e(".added_to_cart.wc-forward").remove(),i()})}),e(document).on("click",".single_add_to_cart_button",function(i){e(this).delay(8e3).addClass("loading").queue(function(i){e(this).delay(800).removeClass("loading").queue(function(i){e(this).removeClass("added"),e(".added_to_cart.wc-forward").remove(),i()}),i()})}),e(document).on("click",".cart-icon",function(i){i.preventDefault();var o=e(window).height();e(".cart-content").height(o).delay(300).queue(function(i){e(".carts-content").addClass("active"),i()})}),e(document).on("click",".cart-close",function(){e(".carts-content").removeClass("active")}),e(window).resize(function(){var i=e(window).height();e(".cart-content").height(i)});var i=window.location.href,o=i.indexOf("?orderby=date"),t=i.indexOf("?orderby=price");if(-1!==i.indexOf("?orderby=price-desc")){var s="Giá cao đến thấp";e(".main-products .products-ordering label").remove(),e(".main-products .products-ordering").append("<label>"+s+"</label>")}else if(-1!==t){s="Giá thấp đến cao";e(".main-products .products-ordering label").remove(),e(".main-products .products-ordering").append("<label>"+s+"</label>")}else if(-1!==o){s="Sản phẩm mới";e(".main-products .products-ordering label").remove(),e(".main-products .products-ordering").append("<label>"+s+"</label>")}e(document).on("click",".products-ordering > label",function(){e(this).parent().toggleClass("show")})}),jQuery(document).ready(function(e){e(window).on("scroll",function(){var i=e(".header-top").outerHeight(),o=e(".header-stick").outerHeight();i?(hb=parseInt(i)+parseInt(o),e(this).scrollTop()>hb&&e(".header-stick").addClass("active"),e(this).scrollTop()<=i&&e(".header-stick").removeClass("active")):(hb=o,e(this).scrollTop()>hb&&e(".header-stick").addClass("active"),e(this).scrollTop()<=0&&e(".header-stick").removeClass("active")),e(this).scrollTop()>0?e(".back-to-top").addClass("active"):e(".back-to-top").removeClass("active"),setTimeout(function(){var i=e(".header-top").outerHeight(),o=e(".header-stick").outerHeight();i?(hb=parseInt(i)+parseInt(o),e("header").outerHeight(hb)):e("header").outerHeight(o)},1e3)}),e(".back-to-top").click(function(){e("html, body").animate({scrollTop:0},400)}),setTimeout(function(){var i=e(".header-top").outerHeight(),o=e(".header-stick").outerHeight();i?(hb=parseInt(i)+parseInt(o),e("header").outerHeight(hb)):e("header").outerHeight(o)},1e3),e(window).resize(function(){setTimeout(function(){var i=e(".header-top").outerHeight(),o=e(".header-stick").outerHeight();i?(hb=parseInt(i)+parseInt(o),e("header").outerHeight(hb)):e("header").outerHeight(o)},1e3)})}),jQuery(document).ready(function(e){e(window).width()<=767?(e(".footer-box > .content-box").hide(),e(".footer-box.active > .content-box").show()):e(".footer-box > .content-box").show(),e(".footer-box > .title-box").click(function(){e(window).width()<=767&&(e(this).parent().hasClass("active")?(e(this).parent().removeClass("active"),e(this).next().slideToggle("slow")):(e(".footer-box").removeClass("active"),e(".footer-box > .content-box").hide(),e(this).parent().addClass("active"),e(this).next().slideToggle("slow")))}),e(window).resize(function(){e(window).width()>767?e(".footer-box .content-box").show():(e(".footer-box .content-box").hide(),e(".footer-box.active .content-box").show())})}),jQuery(document).ready(function(e){e(".menu-mobile-content .menu-close").click(function(i){i.preventDefault(),e(".menu-mobile-content").removeClass("active")}),e(".megamenu.menu-mobile .content-box .icon").click(function(i){i.preventDefault(),e(this).parent().next().slideToggle("slow")}),e(document).on("click",".megamenu.menu-mobile-title .menu-open",function(i){i.preventDefault();var o=e(window).height();e(".menu-mobile-content").height(o).delay(300).queue(function(i){e(this).addClass("active"),i()})}),e(window).resize(function(){var i=e(window).height();e(".menu-mobile-content").height(i)})}),jQuery(document).ready(function(e){e(document).on("click",".logins-box .user-icon a",function(i){i.preventDefault();var o=e(window).height();e(".logins-box .user-content").height(o).delay(300).queue(function(i){e(".logins-box .user-box").addClass("active"),i()})}),e(window).resize(function(){var i=e(window).height();e(".logins-box .user-content").height(i)}),e(".logins-box .user-close").click(function(){e(".logins-box .user-box").removeClass("active")}),e(".lth-logins .user-box > ul > li > a").click(function(i){if(i.preventDefault(),!e(this).hasClass("active")){var o=e(this).hasClass("login-title"),t=e(this).hasClass("registration-title");o?(e(".registrations-box").removeClass("active"),e(".logins-box").addClass("active")):t&&(e(".logins-box").removeClass("active"),e(".registrations-box").addClass("active")),e(".lth-logins .user-box a").removeClass("active"),e(this).addClass("active")}})}),jQuery(document).ready(function(e){e(".slick-slidershow").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,rows:1,slidesPerRow:1,slidesToShow:1,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{rows:1,slidesPerRow:1}},{breakpoint:992,settings:{rows:1,slidesPerRow:1}},{breakpoint:768,settings:{rows:1,slidesPerRow:1}},{breakpoint:480,settings:{rows:1,slidesPerRow:1}}]}),e(".slick-products-highlights").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,rows:1,slidesPerRow:4,slidesToShow:1,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{rows:1,slidesPerRow:4}},{breakpoint:992,settings:{rows:1,slidesPerRow:3}},{breakpoint:768,settings:{rows:1,slidesPerRow:2}},{breakpoint:480,settings:{rows:1,slidesPerRow:1}}]}),e(".slick-products").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,rows:2,slidesPerRow:4,slidesToShow:1,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{rows:2,slidesPerRow:4}},{breakpoint:992,settings:{rows:2,slidesPerRow:3}},{breakpoint:768,settings:{rows:1,slidesPerRow:2}},{breakpoint:480,settings:{rows:1,slidesPerRow:1}}]}),e(".slick-blogs").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,slidesToShow:3,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{slidesToShow:3}},{breakpoint:992,settings:{slidesToShow:2}},{breakpoint:768,settings:{slidesToShow:2}},{breakpoint:576,settings:{slidesToShow:1}}]}),e(".slick-achievements").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,slidesToShow:3,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{slidesToShow:3}},{breakpoint:992,settings:{slidesToShow:3}},{breakpoint:768,settings:{slidesToShow:2}},{breakpoint:480,settings:{slidesToShow:1}}]}),e(".slick-teams").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,slidesToShow:4,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{slidesToShow:4}},{breakpoint:992,settings:{slidesToShow:3}},{breakpoint:768,settings:{slidesToShow:2}},{breakpoint:480,settings:{slidesToShow:1}}]}),e(".slick-other-products").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,slidesToShow:4,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{slidesToShow:4}},{breakpoint:992,settings:{slidesToShow:3}},{breakpoint:768,settings:{slidesToShow:2}},{breakpoint:480,settings:{slidesToShow:1}}]}),e(".slick-product-images-for .ul").slick({loop:!0,slidesToShow:1,slidesToScroll:1,infinite:!0,speed:500,autoplay:!1,autoplaySpeed:3e3,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>'}),e(".slick-videos-popup").slick({loop:!0,autoplay:!1,autoplaySpeed:3e3,dots:!1,infinite:!0,speed:500,adaptiveHeight:!0,rows:1,slidesPerRow:1,slidesToShow:1,slidesToScroll:1,prevArrow:'<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',nextArrow:'<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',responsive:[{breakpoint:1200,settings:{rows:1,slidesPerRow:1}},{breakpoint:992,settings:{rows:1,slidesPerRow:1}},{breakpoint:768,settings:{rows:1,slidesPerRow:1}},{breakpoint:576,settings:{rows:1,slidesPerRow:1}}]})}),jQuery(document).ready(function(e){e(".btn-popup").click(function(i){i.preventDefault();var o=e(this).attr("data_popup");e(".lth-popups").addClass("active"),e("."+o).show();var t=e("."+o).height(),s=e(window).height();t>s?e(".lth-popups .popups-box").height(s-30):e(".lth-popups .popups-box").height("auto")});var i=e(".art-popups-reviews .popups-content").height(),o=e(window).height();i>o?e(".art-popups-reviews .popups-box").height(o-30):e(".art-popups-reviews .popups-box").height("auto"),e(".art-popups .popups-box").click(function(){e(this).parent().removeClass("active")}),e(".art-popups .popups-content").click(function(e){e.stopPropagation()}),e(window).resize(function(){var i=e(".art-popups-reviews .popups-content").height(),o=e(window).height();i>o?e(".art-popups-reviews .popups-box").height(o-30):e(".art-popups-reviews .popups-box").height("auto")})}),jQuery(document).ready(function(e){e(".clock").each(function(){var i=e(this),o=e(this).data("countdown");i.countdown(o,function(e){i.html(e.strftime("%D:%H:%M:%S"))})})}),jQuery(document).ready(function(e){e(".tab-menu .title").click(function(i){if(i.preventDefault(),!e(this).parent().hasClass("active")){var o=e(this).attr("data_tab");e(".nav-tabs li").removeClass("active"),e(this).parent().addClass("active"),e(".tab-content .tab-pane").removeClass("active"),e("#"+o).addClass("active")}})}),jQuery(document).ready(function(e){e("iframe").attr("title","iFrame")}),jQuery(document).ready(function(e){if(e(".module_videos .content-image .icon-play").click(function(i){i.preventDefault(),e(".module_videos .slider_videos_popup").addClass("active")}),e(".module_videos .slider_videos_popup .video-close").click(function(i){i.preventDefault(),e(".module_videos .slider_videos_popup").removeClass("active");for(var o=e(".module_videos .groups-box > *").length,t=1;t<=o;t++){var s=e(".module_videos .slider_videos_popup .item-"+t+" iframe").attr("src");e(".module_videos .slider_videos_popup .item-"+t+" iframe").attr("src",""),e(".module_videos .slider_videos_popup .item-"+t+" iframe").attr("src",s)}}),i=e("body").attr("data_url"))e('.megamenu .nav-menu li a[href^="'+i+'"]').parent().addClass("current-menu-item");else{var i=e(".main-page").attr("data_url");e('.megamenu .nav-menu li a[href^="'+i+'"]').parent().addClass("current-menu-item")}e(".sidebar-box .menu li a .icon").click(function(i){i.preventDefault(),e(this).parent().hasClass("active")?(e(this).parent().removeClass("active"),e(this).parent().next().slideUp()):(e(".sidebar-box .menu-danh-muc-san-pham-container li a").removeClass("active"),e(this).parent().addClass("active"),e(".sidebar-box .menu-danh-muc-san-pham-container .sub-menu").slideUp(),e(this).parent().next().slideDown())}),e(".sidebar-box .menu-danh-muc-san-pham-container .current-menu-parent > a").addClass("active")});