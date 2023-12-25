jQuery(document).ready(function(){

    // Back to top
    if (jQuery('#back-to-top').length) {
        jQuery("#back-to-top").on('click', function() {
            jQuery('html, body').animate({
                scrollTop: jQuery('html, body').offset().top,
            }, 1000);
        });
    }

    // Popup Mobile
    jQuery('.popup-plush').click(function() {
        jQuery('.popup-content').stop(true, false).slideToggle();
        jQuery(this).toggleClass('active');
    });

});