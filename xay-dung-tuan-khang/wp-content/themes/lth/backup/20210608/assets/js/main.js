jQuery(document).ready(function($) {

	$(".slick-testimonials").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

	$(".slick-brand").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        rows: 1,
        slidesToShow: 5,
        // slidesPerRow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.project-filter li').click(function(){
    	var ac = $(this).hasClass('active');

    	if (!ac) {
    		$('.project-filter li').removeClass('active');
    		$(this).addClass('active');

    		var dfx = $(this).attr('data-filter');

    		if (dfx == '.filter-item') {
    			$('.project-content .filter-item').css({'display': 'block'});
    		} else {
	    		$('.project-content .filter-item').css({'display': 'none'});
    			$('.project-content .filter-item' + dfx).css({'display': 'block'});
    		}
    	}
    });

    if ($('.rev_slider_wrapper #slider1').length) {
        $("#slider1").revolution({
            sliderType:"standard",
            sliderLayout:"auto",
            delay:5000,            
            navigationType:"bullet",
            navigationArrows:"0",
            navigationStyle:"preview3",            
            dottedOverlay:'yes',            
            hideTimerBar:"off",
            onHoverStop:"off",
            navigation: {
                arrows:{enable:true} 
            }, 
            gridwidth:1170,
            gridheight:800 
        });
    };

    $('.latest-project-area .single-project-item .icon-holder a').click(function(e){
        e.preventDefault();

        var hr = $(this).attr('href');

        $('.latest-project-area .popup-project img').attr('src','');
        $('.latest-project-area .popup-project img').attr('src',hr);

        $('.latest-project-area .popup-project').addClass('active');
    });

    $('.latest-project-area .pp_close').click(function(e){
        e.preventDefault();

        $('.latest-project-area .popup-project').removeClass('active');
    });

    $('.toggle-search').on('click', function() {
        $('.header-search').slideToggle(300);
    });

    $(".slick-team").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-fact-counter").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 500,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fa fa-angle-left"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fa fa-angle-right"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(window).on("scroll",function() {
        if ($(this).scrollTop() > 2616 ) {
            var ac = $('.single-fact-counter').hasClass('active');

            if (!ac) {            
                function animateNumber(finalNumber, duration = 200000, startNumber = 0, callback) {
                    let currentNumber = startNumber;
                    function updateNumber() {
                        if (currentNumber < finalNumber) {
                            let inc = Math.ceil(finalNumber / (duration / 17));
                            if (currentNumber + inc > finalNumber) {
                                currentNumber = finalNumber;
                                callback(currentNumber);
                            } else {
                                currentNumber += inc;
                                callback(currentNumber);
                                requestAnimationFrame(updateNumber);
                            }
                        }
                    }
                    requestAnimationFrame(updateNumber);
                }

                var t1 = $('#timer-1').attr('data-speed');
                animateNumber(t1, 3000, 0, function (number) {
                    const formattedNumber = number.toLocaleString();
                    document.getElementById('timer-1').innerText = formattedNumber;
                })

                var t2 = $('#timer-2').attr('data-speed');
                animateNumber(t2, 3000, 0, function (number) {
                    const formattedNumber = number.toLocaleString();
                    document.getElementById('timer-2').innerText = formattedNumber;
                })

                var t3 = $('#timer-3').attr('data-speed');
                animateNumber(t3, 3000, 0, function (number) {
                    const formattedNumber = number.toLocaleString();
                    document.getElementById('timer-3').innerText = formattedNumber;
                })

                var t4 = $('#timer-4').attr('data-speed');
                animateNumber(t4, 3000, 0, function (number) {
                    const formattedNumber = number.toLocaleString();
                    document.getElementById('timer-4').innerText = formattedNumber;
                })

                $('.single-fact-counter').addClass('active');
            }
        }
    });

    $(".slick-single-project").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '',
        nextArrow: '',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.products-list .products-ordering label').click(function(){
        $(this).parent().toggleClass('active');
    });

    $('.slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slick-product-images-nav .ul',
        dots: false,
        // focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
    });
    $('.slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
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

    $(".slick-products-related").slick({
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        rows: 1,
        // slidesPerRow: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });


    $(window).on("scroll",function() {
        var ht = $('.top-bar-area').outerHeight();
        var hghdsck = $('header').outerHeight();
        if (ht) {
            var wd = $(window).width();

            hb = parseInt(ht) + parseInt(hghdsck);
            if ($(this).scrollTop() > ht ) {
                $('header.stricky').addClass('active');
            } 
            if ($(this).scrollTop() <= ht ) {
                $('header.stricky').removeClass('active');
            } 
        } else {
            hb = hghdsck;
            if ($(this).scrollTop() > hb ) {
                $('header.stricky').addClass('active');
            } 
            if ($(this).scrollTop() <= 0 ) {
                $('header.stricky').removeClass('active');
            } 
        }     

        if ($(this).scrollTop() > 0 ) {
            $('.scroll-to-top').addClass('active');
        } else {
            $('.scroll-to-top').removeClass('active');
        }
    });

    $('.scroll-to-top').click(function(){
        $('html, body').animate({scrollTop:0}, 400);
    });


});