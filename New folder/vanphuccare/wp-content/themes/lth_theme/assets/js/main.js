jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(window).on("scroll",function() {
        var ht = $('.header-top').outerHeight();
        var hghdsck = $('.header-main').outerHeight();
        if (ht) {
            var wd = $(window).width();

            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > ht ) {
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
        var hghdsck = $('.header-stick').outerHeight();
        hb = parseInt(ht) + parseInt(hghdsck);
        $('header').outerHeight(hb);
    }, 2000);

    $(window).resize(function(){
        setTimeout(function() {
            var ht = $('.header-top').outerHeight();
            var hghdsck = $('.header-stick').outerHeight();
            hb = parseInt(ht) + parseInt(hghdsck);
            $('header').outerHeight(hb);
        }, 1000);
    });
});

jQuery(document).ready(function($) {

    var swiper_slidershow = new Swiper('.swiper-slidershow', {
        slidesPerView: 1,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
    });

    var swiper_team = new Swiper('.swiper-team', {
        slidesPerView: 4,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });

    setTimeout(function() {
        var swiper_testimonials = new Swiper('.swiper-testimonials', {
            slidesPerView: 1,
            slidesPerView: 'auto',
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }, 1000);

    var swiper_brands = new Swiper('.swiper-brands', {
        slidesPerView: 5,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 5,
            }
        }
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
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 
        
        $('.popups').addClass('active');
        $('.' + adat).addClass('show');
    });
    ////////////////////
    setTimeout(function(){
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 

        $('.popups').addClass('active');
    }, 2000);  
    ////////////////////
    $('.popups').click(function(e){
        e.preventDefault();

        $('.popups').removeClass('active');
        $('.popup-box').removeClass('show');
    });
    ////////////////////
    $('.popups .content-box').click(function(e){
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function(){
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 
    });

    $('.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit').click(function(){
        setTimeout(function(){
            var hg_pop = $('.popups.active .content-box').outerHeight();
            var hg_win = $(window).height();
            if (hg_pop >= hg_win) {    
                $('.popups .popups-box').height(hg_win - 30);
                $('.popups .popups-box').css({'top': '15px'});
            } else {    
                $('.popups .popups-box').height('auto');
                $('.popups .popups-box').css({'top': 'auto'});
            } 
        }, 2000);        
    });
});
// end js popups

// js tab
jQuery(document).ready(function($) {
    $('.title-tab .title').click(function(e){
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var tp = $(this).attr('data_tab');
            $('.title-tab .title').removeClass('active');
            $(this).addClass('active');
            $('.tab-panel').removeClass('active');
            $('.tab-panel.'+tp).addClass('active');
        }
    });
});
// end js tab

// menu mobile
jQuery(document).ready(function($) {
    $('.megamenus .close a').click(function(e){
        e.preventDefault();
        $('.megamenu-mobile .content-box').removeClass('active');
    });

    $(document).on('click', '.megamenu-mobile .open a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .content-box').height(whg).delay(300).queue(function(next){
            $('.megamenu-mobile .content-box').css({'top': '-' + whgtp + 'px'}).delay(300).queue(function(next){
                $(this).addClass('active');
                next();
            });
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .content-box').height(whg);
        $('.megamenu-mobile .content-box').css({'top': '-' + whgtp + 'px'});
    });
});
// end menu mobile

jQuery(document).ready(function($) {
    var wd = $(window).width();
    var wdcon = $('.lth-testimonials .container').width();
    var palef = (wd - wdcon) / 2;
    $('.lth-testimonials .module_content').css({'margin-left': palef});
    $('.swiper-testimonials .swiper-arrow.swiper-next').css({'right': palef});
    $('.swiper-testimonials .swiper-arrow.swiper-prev').css({'right': parseInt(palef) + parseInt(70)});

    $(window).resize(function(){
        setTimeout(function() {
            var wd = $(window).width();
            var wdcon = $('.lth-testimonials .container').width();
            var palef = (wd - wdcon) / 2;
            $('.lth-testimonials .module_content').css({'margin-left': palef});
            $('.swiper-testimonials .swiper-arrow.swiper-next').css({'right': palef});
            $('.swiper-testimonials .swiper-arrow.swiper-prev').css({'right': parseInt(palef) + parseInt(70)});
        }, 1000);
    });

    $('.lists-content .readmore a').click(function(e){
        e.preventDefault();
        $(this).parent().parent().addClass('active');
    });
});