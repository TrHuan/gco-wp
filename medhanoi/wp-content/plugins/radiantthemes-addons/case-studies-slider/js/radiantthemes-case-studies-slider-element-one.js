jQuery(window).load(function(){
    jQuery(".rt-case-studies-slider.element-one.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: false,
			dots: true,
			mouseDrag: false,
			touchDrag: true,
			loop: jQuery(this).data("case-studies-mobileitem") ,
			autoplay: jQuery(this).data("case-studies-mobileitem") ,
			autoplayTimeout: jQuery(this).data("case-studies-mobileitem") ,
			responsive:{
		        0:{ items: jQuery(this).data("case-studies-mobileitem") },
		        321:{ items: jQuery(this).data("case-studies-mobileitem") },
		        480:{ items: jQuery(this).data("case-studies-tabitem") },
		        768:{ items: jQuery(this).data("case-studies-tabitem") },
		        992:{ items: jQuery(this).data("case-studies-desktopitem") },
		        1200:{ items: jQuery(this).data("case-studies-desktopitem") }
		    }
        });
        if ( jQuery(this).hasClass("has-fancybox") ) {
            jQuery(this).find(".fancybox").fancybox({
                animationEffect: "zoom-in-out",
                animationDuration: 500,
                zoomOpacity: "auto",
            });
        }
	});
});