jQuery(document).ready(function($) {
    $('.intros-footers__bottoms h2').click(function(){
        var acif = $(this).parent().hasClass('active-intros__footers');
        if (acif) {
            $(this).parent().removeClass('active-intros__footers');
            $(this).parent().children().children('.menu').hide();
        } else {
            $('.intros-footers__bottoms .footer-box').removeClass('active-intros__footers');
            $('.intros-footers__bottoms .footer-box .menu').hide();
            $(this).parent().addClass('active-intros__footers');
            $(this).parent().children().children('.menu').show();
        }
    });
    
    $('.showrooms-list li').mouseover(function () {
        var id = $(this).attr('data-id');
        $('.showroom-detail').hide();
        $('.footer-info').hide();
        
        $('#'+id).show();
        
    });
    
    $('.footer-title').mouseover(function () {
        $('.showroom-detail').hide();
        $('.footer-info').show();
        
    });

    var prcat_url = window.location.href;
    var prcat_length = $('.trademark-tops__items .img-trademark__tops, .main-products .brands-box .menu li').length;
    for (var i = 0; i <= prcat_length; i++) { 
        var prcat_href = $('.trademark-tops__items .img-trademark__tops, .main-products .brands-box .menu-item a').eq(i).attr('href');
        var m = prcat_url.indexOf(prcat_href);
        if (m > 0) {
            $('.trademark-tops__items .img-trademark__tops[href^="'+prcat_href+'"], .main-products .brands-box .menu-item a[href^="'+prcat_href+'"]').parent().addClass('active');
        }
    }
});