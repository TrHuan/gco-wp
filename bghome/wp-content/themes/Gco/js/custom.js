/*
Sticky Header Function
*/

jQuery(function () {
  jQuery('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    var nav_height = $('.navbar').innerHeight();
    jQuery('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - nav_height
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });
  jQuery('body').scrollspy({
    target: '.sticky-nav',
    offset: 60
  })
});
jQuery(document).ready(function () {

  jQuery(window).load(function () {
    jQuery(".sticky-nav").sticky({ topSpacing: 0 });
  });

});

/*
Top Scroller Function
*/
jQuery(".top-scroll").hide();
jQuery(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 500) {
      jQuery('.top-scroll').fadeIn();
    } else {
      jQuery('.top-scroll').fadeOut();
    }
  });
  jQuery('a.top-scroll').click(function () {
    jQuery('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
});

jQuery(document).ready(function () {
  jQuery('.nav li.dropdown').hover(function () {
    jQuery(this).addClass('open');
  }, function () {
    jQuery(this).removeClass('open');
  });

});

(function () {
  var isWebkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
    isOpera = navigator.userAgent.toLowerCase().indexOf('opera') > -1,
    isIe = navigator.userAgent.toLowerCase().indexOf('msie') > -1;

  if ((isWebkit || isOpera || isIe) && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
        element;

      if (!(/^[A-z0-9_-]+$/.test(id))) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();

/*
//wow-animated
*/
jQuery(document).ready(function () {
  wow = new WOW({
    boxClass: 'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset: 100,        // distance to the element when triggering the animation (default is 0)
    mobile: true,             // trigger animations on mobile devices (true is default)
    live: true                // consatantly check for new WOW elements on the page (true is default)
  })
  wow.init();
});

/* Mobile Menu
---------------------------------------------------------------*/
jQuery(document).ready(function () {
  jQuery('#showmenu').click(function () {
    jQuery('#mobilenav').toggleClass('opened');
    jQuery('.panel-overlay').toggleClass('active');
    jQuery('.hamburger', this).toggleClass('is-active');
  });

  jQuery('.site-content').click(function () {
    jQuery('#mobilenav').removeClass('opened');
    jQuery(this).removeClass('active');
    jQuery('#showmenu .hamburger').removeClass('is-active');
  });

  jQuery('.menu_close').click(function () {
    jQuery('#mobilenav').toggleClass('opened');
    jQuery('.panel-overlay').removeClass('active');
    jQuery('#showmenu .hamburger').removeClass('is-active');
  });

  jQuery("#mobilenav ul.sub-menu").before('<span class="arrow"></span>');

  jQuery("body").on('click', '#mobilenav .arrow', function () {
    jQuery(this).parent('li').toggleClass('open');
    jQuery(this).parent('li').find('ul.sub-menu').first().slideToggle("normal");
  });
});

/* Category Menu
---------------------------------------------------------------*/
jQuery(document).ready(function () {
  jQuery(".sidebar ul.menu ul.sub-menu").before('<span class="arrow"></span>');

  jQuery("body").on('click', '.sidebar ul.menu .arrow', function () {
    jQuery(this).parent('li').toggleClass('open');
    jQuery(this).parent('li').find('ul.sub-menu').first().slideToggle("normal");
  });
});

/* woo Menu
---------------------------------------------------------------*/
jQuery(document).ready(function () {
  jQuery(".woo-sidebar ul.menu ul.sub-menu").before('<span class="arrow"></span>');

  jQuery("body").on('click', '.woo-sidebar ul.menu .arrow', function () {
    jQuery(this).parent('li').toggleClass('open');
    jQuery(this).parent('li').find('ul.sub-menu').first().slideToggle("normal");
  });
});

jQuery(document).ready(function ($) {
  $('#partner-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 0,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 2,
      },
      330: {
        items: 2,
      },
      768: {
        items: 4,
      },
      992: {
        items: 5,
      },
      1200: {
        items: 6,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('.sidebar .widget .owl-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 0,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 1,
      },
      1200: {
        items: 1,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('#blog-carousel').owlCarousel({
    loop: false,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 20,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 2,
      }
    }
  });
});


jQuery(document).ready(function ($) {
  $('#wpb_wiz_gallery').owlCarousel({
    loop: true,
    center: true,
    nav: false,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 15,
    autoplayTimeout: 9000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 3,
      },
      500: {
        items: 3,
      },
      768: {
        items: 3,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 3,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('#team_aboutus-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 20,
    autoplayTimeout: 9000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 4,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('#product-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 0,
    autoplayTimeout: 9000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 4,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('#viewed_product-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 20,
    autoplayTimeout: 9000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 4,
      }
    }
  });
});


jQuery(document).ready(function ($) {
  $('#relatedproduct-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 20,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      330: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 3,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('#relatedposts-carousel').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
    dots: false,
    lazyLoad: true,
    margin: 20,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      330: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 3,
      }
    }
  });
});

jQuery(document).ready(function ($) {
  var bannerslider = $('#banner-carousel');
  bannerslider.owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    loop: true,
    nav: true,
    navText: ["<i class='fal fa-long-arrow-left'></i>", "<i class='fal fa-long-arrow-right'></i>"],
    dots: true,
    lazyLoad: true,
    margin: 0,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    autoplay: true,
    video: true,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 1,
      },
      1200: {
        items: 1,
      }
    }
  });
  // End Hero slider initialize code
  // Start Reactivate css animation every time a slide is loaded
  bannerslider.on("translate.owl.carousel", function (event) {
    // selecting the current active item
    var item = event.item.index - 2;
    // first removing animation for all captions
    $('.box-infor-banner').removeClass('fadeInUp');
    $('.owl-item').not('.cloned').eq(item).find('.box-infor-banner').addClass(' fadeInUp');
  })
});

jQuery(document).ready(function ($) {
  // tab
  $(document).on('click', '#section-producttab .next-producttab', function (e) {
    let curTabTitle = document.querySelector("#section-producttab .navigation-producttab li.active"),
      nextTabTitle = curTabTitle.nextElementSibling
    if (nextTabTitle) nextTabTitle.querySelector('a').click()
    else $('#section-producttab .navigation-producttab li:eq(0) a').click()
  });
  $(document).on('click', '#section-producttab .prev-producttab', function (e) {
    let curTabTitle = document.querySelector("#section-producttab .navigation-producttab li.active"),
      prevTabTitle = curTabTitle.previousElementSibling
    if (prevTabTitle) prevTabTitle.querySelector('a').click()
    else $('#section-producttab .navigation-producttab li:eq(-1) a').click()
  });
});

jQuery(document).ready(function ($) {
  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
      opener: function (openerElement) {
        return openerElement.is('span') ? openerElement : openerElement.find('span');
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('.woocommerce-product-gallery__image a').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
      opener: function (openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });
});

jQuery(document).ready(function ($) {
  $('.box-service .infor-service .details-service a.quotes-service').click(function () {
    var title = $(this).attr('title');
    $("#field_service").val(title);
  });
  $('.service-register a').click(function () {
    var title = $(this).attr('title');
    $("#field_service").val(title);
  });
});

jQuery(document).ready(function ($) {
  $('#list_layout').click(function (event) { event.preventDefault(); $('.list-archive-products .colums-product').removeClass('item-colums-product'); $('.list-archive-products .colums-product').addClass('col-md-6 item-grid-product'); });
  $('#grid_layout').click(function (event) { event.preventDefault(); $('.list-archive-products .colums-product').removeClass('col-md-6 item-grid-product'); $('.list-archive-products .colums-product').addClass('item-colums-product'); });
});

jQuery(document).ready(function ($) {
  $('.compare-button > a').html('<i class="fal fa-random"></i>');
  $('.woocommerce a.yith-wcqv-button').html('<i class="fal fa-expand-arrows" title="Xem Nhanh"></i>');
  // $("#billing_first_name").attr("placeholder", "Full name");
});
jQuery(document).ready(function ($) {
  $('.filter-title').click(function () {
    $('ul.filter-items').toggle(800);
  });
});

jQuery(document).ready(function ($) {
  var $this = $('.woocommerce-product-details__short-description > ul');
  if ($this.find('li').length > 2) {
    $('.woocommerce-product-details__short-description > ul').append('<div class="details_short-description"><a href="javascript:;" class="showMore"></a></div>');
  }
  // If more than 2 Education items, hide the remaining
  $('.woocommerce-product-details__short-description > ul li').slice(0, 3).addClass('shown');
  $('.woocommerce-product-details__short-description > ul li').not('.shown').hide();
  $('.woocommerce-product-details__short-description > ul .showMore').on('click', function () {
    $('.woocommerce-product-details__short-description > ul li').not('.shown').toggle(300);
    $(this).toggleClass('showLess');
  });
});

jQuery(document).ready(function ($) {
  // $('.popup-youtube').magnificPopup({
  //   type: 'iframe'
  // });


  $('.product-content-image_gallery').slick({
    loop: true,
    autoplay: true,
    autoplaySpeed: 9000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    // fade: true,
    asNavFor: '.product-content-image_gallery_nav',
    prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
    nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
  });
  $('.product-content-image_gallery_nav').slick({
    loop: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.product-content-image_gallery',
    dots: false,
    focusOnSelect: true,
    prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
    nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  });
});

jQuery(document).ready(function ($) {
  var element = document.getElementById('timer_count_down');
  // var dataCountdown = element.getAttribute('data-id');

  // Set the date we're counting down to
  // var countDownDate = new Date(dataCountdown).getTime();

  // Update the count down every 1 second
  var x = setInterval(function () {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    // var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // document.querySelector("#days").innerHTML = days;
    // document.querySelector("#hours").innerHTML = hours;
    // document.querySelector("#minutes").innerHTML = minutes;
    // document.querySelector("#seconds").innerHTML = seconds;

    // If the count down is finished, write some text 
    // if (distance < 0) {
    //   clearInterval(x);
    //   document.getElementById("timer_count_down").innerHTML = "Hết thời gian khuyến mãi";
    // }
  }, 1000);
});;