// url
jQuery(document).ready(function($) {
    var data_url = $('body').attr('data_url');
    if (data_url) {
        $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    } else {
        var data_url = $('.main-page').attr('data_url');
        $('.megamenu .nav-menu li a[href^="'+data_url+'"]').parent().addClass('current-menu-item');
    }

    $('.products-ordering > label').click(function(){
        $(this).parent().toggleClass('show');
    });
});
// end url