jQuery(document).ready(function(e) {
    // ul last li
    jQuery('ul').each(function(){ jQuery(this).find('li:last').addClass('last'); });
    // ul first li
    jQuery('ul').each(function(){ jQuery(this).find('li:first').addClass('first'); });
    /*Slider*/
    var owl_slider;
    owl_slider = jQuery("#owl-slider");
    owl_slider.owlCarousel({
        autoplay : true,
        loop: true,
        items: 1,
        nav:true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        //lazyLoad: true,
        autoplayHoverPause: true
    });
    var owl_popular;
    owl_popular = jQuery("#owl-popular");
    owl_popular.owlCarousel({
        autoplay : true,
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        //lazyLoad: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav: false,
            },
            600:{
                items:3,
                nav: false,
            },
            1000:{
                items:5,
            }
        }
    });
    jQuery(window).scroll(function(){
        var height = 280;
        if (jQuery(window).scrollTop() < height) {
            jQuery('.wrapper-main-menu').removeClass('menu-fixed');
            jQuery('#ewheader').removeClass('menu-fixed');
        } else {
            jQuery('.wrapper-main-menu').addClass('menu-fixed');
            jQuery('#ewheader').addClass('menu-fixed');
        }
    });
    /*Scroll to Top*/
    jQuery('.scrollTo').on('click', scrollToTop);
    function scrollToTop() {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = jQuery('body');
        offset = element.offset();
        offsetTop = offset.top;
        jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    }
    /*Menu mobile*/
    jQuery(".navbar-toggle").click(function(){
        jQuery('body').addClass('mnopen');
    })
    jQuery(".close-menu").click(function(){
        jQuery('body').removeClass('mnopen');
    })
    // Button share
    //var post_img = jQuery('meta[property="og:image"]').attr('content');
    var post_title = jQuery('meta[property="og:title"]').attr('content').replace(" | Kênh thông tin tuyển sinh", "");
    var post_url = jQuery('meta[property="og:url"]').attr('content').replace("", "");
    //facebook
    jQuery('a.btn_facebook').click(function(e) {
        var url = 'https://www.facebook.com/sharer/sharer.php?u=' + urlEncode(post_url) + '&t=' + post_title;
        var newwindow = window.open(url, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710');
        if (window.focus) {
            newwindow.focus();
        }
        e.preventDefault();
    });
    //google+
    jQuery('a.btn_google').click(function(e) {
        var url = 'https://plus.google.com/share?url=' + urlEncode(post_url);
        var newwindow = window.open(url, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=520');
        if (window.focus) {
            newwindow.focus();
        }
        e.preventDefault();
    });
    //twitter
    jQuery('a.btn_twitter').click(function(e) {
        var url = 'https://twitter.com/intent/tweet?source=webclient&text=' + post_title + '+' + urlEncode(post_url);
        var newwindow = window.open(url, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710');
        if (window.focus) {
            newwindow.focus();
        }
        e.preventDefault();
    });
    jQuery('#reload').click(function() {
        location.reload();
    });
});
function urlEncode(str){
    str = (str + '').toString();
    return encodeURIComponent(str).replace(/#!/g, '%23').replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}
//For box scroll comment single
var isFullBox=false;
function showFullBoxComment(){
    if(!jQuery('.box_comment_fixed').hasClass('hide_box_comment'))
        isFullBox =! isFullBox;
    jQuery('.box_comment_fixed').removeClass('hide_box_comment');
    if(isFullBox){
        jQuery('.box_comment_fixed').addClass('full_box_comment');
    }
    else{
        jQuery('.box_comment_fixed').removeClass('full_box_comment');
    }
}

function closeBoxComment(){
    jQuery('.box_comment_fixed').addClass('hide_box_comment');
}