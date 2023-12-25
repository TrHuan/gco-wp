jQuery(document).ready(function($) {
    var win = $(window);
    var heighttops = $('.header').outerHeight();
    var prevScrollpos = window.pageYOffset;

    $('body').css('padding-top', heighttops);

    window.onscroll = function() {

        var currentScrollPos = window.pageYOffset;

        if (win.scrollTop() >= heighttops) {

            if (win.width() <= 768) {

                $('.header').addClass('mobile-fixed__headers');

                if (prevScrollpos > currentScrollPos) {

                    $('.header').css('top', 0);
                } else {

                    $('.header').css('top', (0 - (heighttops + 100)));
                }
                prevScrollpos = currentScrollPos;
            }

        } else {
            $('.header').css('top', 0);
        }
    }
    
});