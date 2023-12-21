$(document).ready(function($) {
    if ($('header.top').length) {
        $(window).scroll(function() {
            /*var anchor = $('header.top').offset().top;*/
            var anchor = $('header.top').offset().top;
            /*console.log(anchor);*/
            if (anchor >= 130) {
                $('header.top').addClass('cmenu');
                /*$('.cate-list').removeClass('on');
                $('.tcate-list').slideUp();*/
            } else {
                $('header.top').removeClass('cmenu');
            }
        });
    }
    // if ($('#example').length) {
    //     $('#example').barrating({
    //         theme: 'fontawesome-stars-o'
    //     });
    // }


    // $('.acc-change').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).prev('input').removeAttr('readonly').focus();
    // });

    // $('input[type="file"]').change(function(e) {
    //     var fileName = e.target.files[0].name;
    //     /*alert('The file "' + fileName +  '" has been selected.');*/
    //     $('.acc-img-wrap img').attr('src', 'images/' + fileName);
    // });


    /*$('.search-open').on('click', function(event) {
      event.preventDefault();
      $('.top-search').toggleClass('open');
    });
    $('.search-ip').on('focusin', function(event) {
      event.preventDefault();
      $('.top-search').addClass('open');
    });
    $('.search-ip').on('focusout', function(event) {
      event.preventDefault();
      $('.top-search').removeClass('open');
    });*/

    var w = $(window).width();
    if (w < 768) {
        $('.dropdown-acc').addClass('dropdown-menu');
        $('.acc-list').attr('data-toggle', 'dropdown');
    }
    $(window).resize(function(event) {
        var w = $(window).width();
        if (w < 768) {
            $('.dropdown-acc').addClass('dropdown-menu');
        }
    });

    $('.wire-menu').hover(function() {
        $('#nav-icon3').toggleClass('open');
    });

    //new WOW().init();

    // if($('.totop').length){
    //   $('.totop').on('click',function(event){
    //       event.preventDefault();
    //   $('body, html').stop().animate({scrollTop:0},800)});
    //   $(window).scroll(function(){
    //       var anchor=$('.totop').offset().top;
    //       if(anchor>1000){
    //           $('.totop').css('opacity','1')
    //       }
    //       else{
    //           $('.totop').css('opacity','0')
    //       }
    //   });
    // }

    $("#menu").mmenu({
        "extensions": [
            "pagedim-black",
            "shadow-panels"
        ]
        // options
        /*"offCanvas": {
                "position": "right"
            }*/
    }, {
        // configuration
        clone: true
    });

    $('.index-slider').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        infinite: true
    });

    $('.about-slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        infinite: true
    });

    $('.team-slider').slick({
        dots: false,
        arrows: false,
        nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
        prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        /*rows:2,*/
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                },
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                },
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.color-slider').slick({
        dots: false,
        arrows: false,
        nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
        prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
        autoplay: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.brand-slider').slick({
        dots: false,
        arrows: false,
        nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
        prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
        autoplay: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        rows: 2,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
                },
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                },
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.tes-slider, .bdetail-re-slider').slick({
        dots: false,
        arrows: false,
        nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
        prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
        autoplay: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        /*rows:2,*/
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                },
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /*$('.tes-slider').slick({
      dots: false,
      arrows:false,
      autoplay: true,
      infinite:true
    });*/

    $('.service-video').slick({
        dots: false,
        arrows: true,
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-left"></i></button>',
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-right"></i></button>',
        autoplay: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
    });


    $('.search-open').on('click', function(event) {
        event.preventDefault();
        $('.search-frm').toggleClass('open');
    });

    // $(".count").on("click", function() {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find("input").val();
    //     if ($button.text() == "+") {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } else {
    //         // Don't allow decrementing below zero
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } else {
    //             newVal = 0;
    //         }
    //     }
    //     $button.parent().find("input").val(newVal);
    // });
    // $('.nav-link .custom-control.custom-radio').on('click', function(e) {
    //     e.preventDefault();
    //     /*var a = $(this).children('.custom-control-input').prop('value');*/
    //     $(this).children('.custom-control-input').prop('checked', true);
    // });

    /*if($("[data-fancybox]").length){
      $("[data-fancybox]").fancybox({});
      if($('.linkyoutube').length) {
        var url = $('.linkyoutube').attr('href').replace('watch?v=', 'embed/');
        $('.linkyoutube').attr('href', url);
      }
      
    }*/

    $('.list').on('click', function(event) {
        event.preventDefault();
        $('.pro-row').addClass('list');
    });
    $('.grid').on('click', function(event) {
        event.preventDefault();
        $('.pro-row').removeClass('list');
    });

    // $('.paside-chkbox li').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).toggleClass('active').children('.custom-control-input').prop('checked', !($(this).children('.custom-control-input').is(':checked')));
    // });
    // $('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');

    // $('.paside-radio li').on('click', function(event) {
    //     event.preventDefault();
    //     $('.paside-radio li').removeClass('active');
    //     $(this).toggleClass('active').children('.custom-control-input').prop('checked', true);
    // });
    /*$('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');*/

    // $('.top-cate h2').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).next('.top-cate-list').slideToggle();
    // });
    $('.search-open').on('click', function(event) {
        event.preventDefault();
        $('.search-dropdown').toggleClass('on');
    });
    // $('.pdetail-seemore').on('click', function(event) {
    //     event.preventDefault();
    //     /*console.log('click');*/
    //     $(this).parent('.pdetail-wrap').toggleClass('open');
    // });
    // filter
    $('[data-sidebar="list"]').on('click', 'li', function(e) {
        e.preventDefault();
        var el = $(this);
        var data = el.data('value');

        el.siblings().removeClass('active');
        el.toggleClass('active');

        if (el.hasClass('active')) {
            console.log(data);
            $(this).parents('.vk-sidebar__list').siblings('input').val(data);
        }
        return false;
    });

    /* 1. Visualizing things on Hover - See next part for action on click */
    // $('#stars li').on('mouseover', function() {
    //     var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    //     // Now highlight all the stars that's not after the current hovered star
    //     $(this).parent().children('li.star').each(function(e) {
    //         if (e < onStar) {
    //             $(this).addClass('hover');
    //         } else {
    //             $(this).removeClass('hover');
    //         }
    //     });

    // }).on('mouseout', function() {
    //     $(this).parent().children('li.star').each(function(e) {
    //         $(this).removeClass('hover');
    //     });
    // });


    /* 2. Action to perform on click */
    // $('#stars li').on('click', function() {
    //     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    //     var stars = $(this).parent().children('li.star');

    //     for (i = 0; i < stars.length; i++) {
    //         $(stars[i]).removeClass('selected');
    //     }

    //     for (i = 0; i < onStar; i++) {
    //         $(stars[i]).addClass('selected');
    //     }
    // });
    // $('.star').each(function(index, el) {
    //     var rate = $(this).data('rate');
    //     /*console.log(rate);*/
    //     $(this).children('li').each(function(index) {
    //         if (index < rate) {
    //             $(this).addClass('rated')
    //         }
    //         /*console.log( index + ": " + $( this ).html() );*/
    //     });
    // });
    // $('.index-link a').click(function(e) {
    //     e.preventDefault();
    //     $('.on').removeClass('on');
    //     el = $(this);
    //     name = el.attr('href');
    //     if ($(window).width() >= 992) {
    //         pos = $(name).position().top + 80;
    //     } else {
    //         pos = $(name).position().top;
    //     }
    //     console.log(pos);
    //     el.addClass('on');
    //     $('html,body').stop().animate({ scrollTop: pos }, 600);
    //     return false;
    // });
    /*  console.log($('#saleday').position().top);*/


    // $('.acc-change').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).prev('input').removeAttr('readonly').focus();
    // });

    // $('input[type="file"]').change(function(e) {
    //     var fileName = e.target.files[0].name;
    //     alert('The file "' + fileName + '" has been selected.');
    //     $('.acc-img-wrap img').attr('src', './images/' + fileName);
    // });
    // $('.tcate-tit').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).next().slideToggle();
    // });
    // $('a.acc-detail').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).parents('.card').remove();
    // });
    /*$('.del-all').on('click', function(event) {
      event.preventDefault();
      $('.accordion').children('.card').remove();
    });*/

    // $('.filter-toggle').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).next('.vk-sidebar').slideToggle();
    // });
    // $('.pdetail-gen label.active').children('input').prop('checked', 'true');
    // $('.pdetail-gen label').on('click', function(event) {
    //     /*event.preventDefault();*/
    //     $('.pdetail-gen label').removeClass('active');
    //     $(this).addClass('active');
    // });

    // $('.login-chk').on('click', function(event) {
    //     event.preventDefault();
    //     $(this).toggleClass('active');
    // });

    CustomTheme.init();
});
// custom theme
var CustomTheme = function() {

    var _initInstances = function() {


        var activeList = function() {

            var activeListEl = $('[data-list="active"]');

            var activeListLoad = function() {

                activeListEl.each(function() {
                    var el = $(this);
                    var activeItem = el.find('.active');
                    var data = activeItem.data('value');
                    var input = el.closest('[data-list="active"]').siblings('input').first();

                    if (activeItem.length) {
                        input.val(data);
                    } else {
                        input.val(0);
                    }
                })


            }();

            var activeListHandle = function() {
                activeListEl.on('click', 'li', function(e) {
                    e.preventDefault();
                    var el = $(this);
                    var parent = el.closest('[data-list="active"]').siblings('input').first();
                    var data = el.data('value');

                    el.siblings().removeClass('active');
                    el.toggleClass('active');
                    // console.log(parent);

                    if (el.hasClass('active')) {
                        parent.val(data)
                    } else {
                        parent.val(0);
                    }

                    return false;
                })
            }();


        }();


        // disable event click a tag
        $('a').on("click", function(e) {
            if ($(this).attr('href') === undefined) {
                e.preventDefault();
                return false;
            }
        });


    }

    return {
        init: function() {
            _initInstances();
        }
    };
}();
/*
http://jsfiddle.net/LCB5W/
https://stackoverflow.com/questions/152975/how-do-i-detect-a-click-outside-an-element

https://codepen.io/altro-nvp2/pen/MmQBVd
http://www.landmarkmlp.com/js-plugin/owl.carousel/demos/transitions.html
https://codepen.io/radimby/pen/YpEJQP
*/