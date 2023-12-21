/*-----------------------------------------------------------------------------------
 Theme Name: LEE
 Author: LEE
 Author URI: http://
 Version: 1.0.0
 Description: A Beautiful, Professional and Multipurpose Theme Made by LEE
 -----------------------------------------------------------------------------------*/

/* ----------------------------------------------------------------
 [Table of contents]
        - MobileMenu
        - PreLoader
        - AnimationScrollPage
        - CountTo
        - ParallaxBackground
        - Slider
        - InputFile
        - MegaMenu
        - ScrollToTop
        - LightBox
        - CustomTheme
        - PriceRange
        - CalcQuantity
        - Ads
        - ImageZoom

 ------------------------------------------------------------------*/

'use strict';


//action
$(window).on('load', function () {
    // MasonryItem.init();
    // TruncateLine.init();
});


$(document).ready(function () {


    MobileMenu.init();
    // PreLoader.init();
    // AnimationScrollPage.init();
    // CountTo.init();
    // ParallaxBackground.init();
    Slider.init();
    // InputFile.init();
    ScrollToTop.init();
    CustomTheme.init();
    PriceRange.init();
    // CalcQuantity.init();
    // MagicZoomPlus.init();
    // StickyScroll.init();
    // ToolTip.init();
    // Fancybox.init();
    // Barrating.init();
    NiceSelect.init();


});

// NiceSelect
var NiceSelect = function () {
    var _initInstances = function () {
        var el = $('[data-nice-select]');
        el.niceSelect();

    };

    return {
        init: function () {
            _initInstances();
        }


    };
}();


// Barrating
var Barrating = function () {
    var _initInstances = function () {
        var el = $('[data-rate]');
        el.barrating({
            theme: 'fontawesome-stars'
        });

    };

    return {
        init: function () {
            _initInstances();
        }


    };
}();


// TruncateLine
var TruncateLine = function () {
    var _initInstances = function () {
        var el = $('[data-truncate-lines]');
        el.each(function () {
            var lines = $(this).data('truncate-lines');
            console.log(lines);
            $(this).truncate({
                lines: lines
            });
        })

    };

    return {
        init: function () {
            _initInstances();
        },
        responsive: function () {
            _initInstances();
        }


    };
}();

// Fancybox
var Fancybox = function () {
    var _initInstances = function () {


    };

    return {
        init: function () {
            _initInstances();
        }

    };
}();

// ToolTip
var ToolTip = function () {

    var _initInstances = function () {

        $('[data-toggle="tooltip"]').tooltip({})

    };

    return {
        init: function () {
            _initInstances();
        }

    };
}();

// sticky scroll
var StickyScroll = function () {

    var _initInstances = function () {

        var obj = $('[data-layout="sticky"]');
        var shrinkHeader = 300;

        obj.stickOnScroll({
            topOffset: 0,
            bottomOffset: 5,
            footerElement: null,
            viewport: window,
            stickClass: 'stickOnScroll-on',
            setParentOnStick: false,
            setWidthOnStick: false,
            onStick: null,
            onUnStick: null
        });


        // obj.next().css({
        //     'position':'relative',
        //     'top': obj.outerHeight(true) + 'px',
        // });


        $(window).scroll(function () {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                obj.addClass('_shrink');
            }
            else {
                obj.removeClass('_shrink');
            }
        });

        var getCurrentScroll = function () {
            return window.pageYOffset || document.documentElement.scrollTop;
        }

    };

    return {
        init: function () {
            _initInstances();
        }

    };
}();


//Image Zoom
var MagicZoomPlus = function () {
    var _initInstances = function (){
        var mzOptions = {
            textHoverZoomHint: 'Hover to zoom123',
            textExpandHint: 'Click to expand1321'
        };
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// preloader
var PreLoader = function () {
    var _initInstances = function () {
        $('.animsition').animsition({
            // loadingClass: 'loader',
            inDuration: 900,
            outDuration: 500,
            linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([href^="javascript:void(0);"]):not([href^="callto:"]):not([href^="mailto:"])',
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

//Mmenu
var MobileMenu = function () {
    var _initInstances = function () {

        var mobileMenu = $("#menu");

        if (mobileMenu.length) {
            mobileMenu.mmenu({
                "extensions": [
                    // "fx-panels-zoom",
                    "pagedim-black",
                    // "theme-dark"
                ],
                "offCanvas": {
                    // "position": "right"
                },
                "navbars": [
                    {
                        "position": "bottom",
                        "content": [
                            "<a class='fa fa-envelope' href='#/'></a>",
                            "<a class='fa fa-twitter' href='#/'></a>",
                            "<a class='fa fa-facebook' href='#/'></a>"
                        ]
                    }
                ]
            });
        }

    };


    return {
        init: function () {
            _initInstances();
        }
    };
}();

// animation scroll page
var AnimationScrollPage = function () {
    var _initInstances = function () {

        var anchor = $('[data-animation]');

        anchor.waypoint(function (direction) {


            var el = $(this.element);
            var animationName = el.data('animation');
            var animationDuration = el.data('animation-duration');
            var animationDelay = el.data('animation-delay');

            el.css('opacity', 1);
            if (animationDuration) {

                el.css({
                    "-webkit-animation-duration":animationDuration + "s",
                    "animation-duration":animationDuration + "s"
                })
            }

            if (animationDelay) {

                el.css({
                    "-webkit-animation-delay":animationDelay + "s",
                    "animation-delay":animationDelay + "s"
                })
            }

            el.addClass('animated ' + animationName);
        }, {
            offset: '90%',
            triggerOnce: true
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// count to
var CountTo = function () {
    var _initInstances = function () {
        var el = $('.vk-countto');
        el.waypoint({
            handler: function (direction) {
                $(this.element).countTo({
                    refreshInterval: 50,
                    formatter: function (value, options) {
                        return numeral(value).format('0,0');
                    }
                });
            },
            offset: '100%',
            triggerOnce: true,
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// parallax background
var ParallaxBackground = function () {
    var _initInstances = function () {
        $('.vk-parallax').attr('data-stellar-background-ratio', '0.3');
        $.stellar({
            verticalOffset: 0,
            horizontalScrolling: false,
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// slider
var Slider = function () {

    var sliderSyncing = function () {

        var settingNav = {
            items: 4
        }
        sliderSync("#sync1", "#sync2", {}, settingNav);

    }


    var sliderDefault = function () {
        var slider = $('[data-slider]');
        slider.addClass('vk-slider owl-carousel');

        $('[data-slider="brand"]').owlCarousel({
            items: 6,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            autoplayTimeout: 4000,

            nav: true,
            navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
            navClass: ['vk-btn prev vk-arrow', 'vk-btn next vk-arrow'],
            dots: false,

            responsive: {
                0: {items: 3, nav: false,},
                576: {items: 3,},
                768: {items: 4,},
                992: {items: 5,},
                1200: {items: 6, nav: true,},
            }
        })


        var blogSlider = $('[data-slider="blog"]');
        blogSlider.owlCarousel({
            items: 1,
            autoplay: true,
            autoplayTimeout: 5000,

            nav: false,
            navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
            navClass: ['vk-btn prev vk-arrow', 'vk-btn next vk-arrow'],
            dots: false,

            responsive: {
                0: { items: 1,},
                576: { items: 2,},
                768: { items: 1,},
                992: { items: 1,},
                1200: { items: 1,},
            }
        })
        $('.vk-blog__nav').on('click','.vk-btn',function(e){
            e.preventDefault();
            if($(this).hasClass('_prev')){
                blogSlider.trigger('prev.owl.carousel');
            }else{
                blogSlider.trigger('next.owl.carousel');
            }
        })

        var data_url_img = $('[data-slider="banner"]').attr('data-url-img');
        $('[data-slider="banner"]').owlCarousel({
            items: 1,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            autoplayTimeout: 4000,

            nav: true,
            navText: ['<img src="'+data_url_img+'/images/ar-3.png" />', '<img src="'+data_url_img+'/images/ar-4.png" />'],
            navClass: ['vk-btn prev vk-arrow', 'vk-btn next vk-arrow'],
            dots: false,

            responsive: {
                0: { nav: false,},
                576: {nav: false,},
                768: {nav: false,},
                992: {nav: false,},
                1200: {nav: true,},
            }
        })

        $('[data-slider="relate"]').owlCarousel({
            // animateOut: 'fadeOut',
            // autoplay: true,
            // autoplayTimeout: 5000,

            nav: true,
            navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
            navClass: ['vk-btn prev vk-arrow', 'vk-btn next vk-arrow'],
            dots: false,

            responsive: {
                0: {items: 2,},
                576: {items: 2,},
                768: {items: 3,},
                992: {items: 4,},
            }
        })


    }


    var _initInstances = function () {

        sliderSyncing();
        sliderDefault();


    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// masonry item
var MasonryItem = function () {
    var masonry = '[data-layout="masonry"]';
    var masonryItem = '[data-layout="masonry-item"]'
    var masonryFix = '[data-layout="masonry-fix"]';

    var buttonFilterDefault = '[data-filter-button="default"]';
    var buttonFilterFix = '[data-filter-button="filter-fix"]';

    var filterFix = function () {

        var delayFilter = function () {
            $(masonryFix).isotope({
                filter: '.first',
            })
        }

        setTimeout(delayFilter, 100);
        $(buttonFilterFix)

            .on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue)
                $(masonryFix).isotope({
                    filter: filterValue,
                });

                return false;
            })
            .on('change', function () {

                // get filter value from option value
                var filterValue = this.value;
                $(masonryFix).isotope({
                    filter: filterValue,

                });

                return false;
            });

    }

    var masonryLayout = function () {
        $(masonry).isotope({
            // options...
            itemSelector: masonryItem,
            masonry: {
                columnWidth: masonryItem,
            }
        });

        //filter items on button click
        $(buttonFilterDefault)
            .on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue);
                $(masonry).isotope({
                    filter: filterValue,

                });

                return false;
            })
            .on('change', function () {
                // get filter value from option value
                var filterValue = this.value;
                // console.log(filterValue);
                $(masonry).isotope({
                    filter: filterValue,

                });

                return false;
            });
    };

    var _initInstances = function () {
        masonryLayout();
        filterFix();

    };

    return {
        init: function () {
            _initInstances();
        },

        responsive: function () {

        }
    };
}();


// google maps

if ($('[data-map="true"]').length) {
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyC2Gs0Rw7L416l5ghD0zrUWf8FGibwT7Ds&callback=initMap";
    document.getElementsByTagName('head')[0].appendChild(script);

    var initMap = function () {
        var myLatLng = {lat: 38.5397102, lng: -93.6881803};
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel: false,
            zoom: 4
        });
        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'HELLO WORLD!'
        });
    };

}


// input file
var InputFile = function () {
    var _initInstances = function () {
        var inputs = document.querySelectorAll('.vk-input-file');
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function (e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
                console.log(fileName);
            });

            // Firefox bug fix
            input.addEventListener('focus', function () {
                input.classList.add('has-focus');
            });
            input.addEventListener('blur', function () {
                input.classList.remove('has-focus');
            });
        });
    }
    return {
        init: function () {
            _initInstances();
        }
    };
}();

//scroll up
var ScrollToTop = function () {

    var _initInstances = function () {
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-up"></i>',
            scrollSpeed: 500,
            zIndex: 1,

        });

        $('[data-scroll-to^="#"]').on('click', function (event) {

            var target = $(this.getAttribute('data-scroll-to'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top

                }, 1000);


            }

        });

        // var obj = $('[data-scroll-to]');
        //
        // $(window).on('scroll', function () {
        //
        //     var scroll = $(window).scrollTop();
        //
        //     if (obj.length){
        //
        //         obj.each(function(){
        //
        //             var target = $(this).attr('href');
        //
        //             if (scroll > $(target).offset().top){
        //                 $(this).hide();
        //             }
        //             else {
        //                 $(this).css('opacity',1 - scroll / $(target).offset().top);
        //                 $(this).show();
        //             }
        //         });
        //     }
        //
        // });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// price range
var PriceRange = function () {
    var _initInstances = function () {
        var slider_range = $('#slider-range');
        var min = slider_range.data('min');
        var max = slider_range.data('max');

        var amount1 = slider_range.siblings('#amount1');
        var amount2 = slider_range.siblings('#amount2');

        var text_amount1 = slider_range.siblings('.vk-range__show').find('#text_amount1');
        var text_amount2 = slider_range.siblings('.vk-range__show').find('#text_amount2');

        slider_range.slider({
            range: true,
            min: min,
            max: max,
            values: [min+max*0.1, max - max * 0.1],
            slide: function (event, ui) {
                amount1.val(ui.values[0]);
                amount2.val(ui.values[1]);

                //value
                text_amount1.text(numeral(ui.values[0]).format('0,0'));
                text_amount2.text(numeral(ui.values[1]).format('0,0'));
            }
        });

        //value
        amount1.val(slider_range.slider("values", 0));
        amount2.val(slider_range.slider("values", 1));
        //text
        text_amount1.text(numeral(slider_range.slider("values", 0)).format('0,0'));
        text_amount2.text(numeral(slider_range.slider("values", 1)).format('0,0'));
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// calculator quantity
var CalcQuantity = function () {
    var _initInstances = function () {

        $("[data-calculator] .vk-btn").on("click", function () {

            var $button = $(this);

            var oldValue = $button.siblings("input").val();

            if ($button.attr('data-index') == "plus") {

                var newVal = parseFloat(oldValue) + 1;

            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }

            $button.siblings("input").val(newVal);

            return false;
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// custom theme
var CustomTheme = function () {

    var _initInstances = function () {

        $('[data-sidebar="list"]').on('click','li',function(e){
            e.preventDefault();
            var el = $(this);
            var data = el.data('value');

            el.siblings().removeClass('active');
            el.toggleClass('active');

            if(el.hasClass('active')){
                console.log(data);
            }

            return false;
        })

        // disable event click a tag
        $('a').on("click", function (e) {
            if ($(this).attr('href') === undefined) {
                e.preventDefault();
                return false;
            }
        });

    }

    return {
        init: function () {
            _initInstances();
        }
    };
}();









