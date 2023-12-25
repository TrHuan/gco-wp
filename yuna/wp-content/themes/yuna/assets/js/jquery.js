$(document).ready(function($){
  if($('header.top').length){
    $(window).scroll(function(){
      /*var anchor = $('header.top').offset().top;*/
      var anchor = $('header.top').offset().top;
      /*console.log(anchor);*/
      if(anchor >= 130){
          $('header.top').addClass('cmenu');
          $('.cate-list').removeClass('on');
      }
      else{
          $('header.top').removeClass('cmenu');
      }
    });
  }

  $('.more-btn').on('click', function(event) {
    event.preventDefault();
    $('.pdetail-content-wrap').toggleClass('open');
  });

  new WOW().init();

  if($('.to-top').length){
    $('.to-top').on('click',function(event){
        event.preventDefault();
    $('body, html').stop().animate({scrollTop:0},800)});
    $(window).scroll(function(){
        var anchor=$('.to-top').offset().top;
        if(anchor>1000){
            $('.to-top').css('opacity','1')
        }
        else{
            $('.to-top').css('opacity','0')
        }
    });
  }

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

  //Tooltip
  $('[data-toggle="tooltip"]').tooltip();

   /* nivoSlider */ 
  $("#slider").nivoSlider({ 
    effect: 'random',                 // Specify sets like: 'fold,fade,sliceDown' 
    slices: 15,                       // For slice animations 
    boxCols: 8,                       // For box animations 
    boxRows: 4,                       // For box animations 
    animSpeed: 1300,                   // Slide transition speed 
    pauseTime: 5000,                  // How long each slide will show 
    startSlide: 0,                    // Set starting Slide (0 index) 
    directionNav: true,               // Next & Prev navigation 
    controlNav: false,                 // 1,2,3... navigation 
    controlNavThumbs: false,          // Use thumbnails for Control Nav 
    pauseOnHover: true,               // Stop animation while hovering 
    manualAdvance: true,             // Force manual transitions
    prevText:'<i class="fa fa-angle-left icon"></i>',
    nextText:'<i class="fa fa-angle-right icon"></i>',
    // prevText:'<img src="../images/left.png" title="" alt="">',
    // nextText:'<img src="../images/right.png" title="" alt="">',
    randomStart: true,               // Start on a random slide 
    beforeChange: function(){},       // Triggers before a slide transition 
    afterChange: function(){},        // Triggers after a slide transition 
    slideshowEnd: function(){},       // Triggers after all slides have been shown 
    lastSlide: function(){},          // Triggers when last slide is shown 
    afterLoad: function(){}           // Triggers when slider has loaded 
  });

  $('.pdetail-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 700,
    autoplaySpeed: 4000,
    autoplay: true
  });
  $('.cate-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    variableWidth: true,
    nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
    prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 560,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
  $('.sale-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    nextArrow: '<button type="button" class="slick-next"><img src="images/right.png" alt="" title=""></button>',
    prevArrow: '<button type="button" class="slick-prev"><img src="images/left.png" alt="" title=""></button>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.blog-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 560,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.pdetail-reslider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 560,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.slider-qv').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots:true,
    fade: true,
    /*adaptiveHeight:true,*/
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: true,
    asNavFor: '.slider-navqv'
  });
  $('.slider-navqv').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-qv',
    dots: false,
    arrows: false,
    centerMode: true,
    centerPadding: '0',
    vertical: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 600,
      settings: {
        arrows: true
      }
    }]
  });

  $('.search-open').on('click', function(event) {
    event.preventDefault();
    $('.search-frm').toggleClass('on');
  });

  $(".button").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button.parent().find("input").val(newVal);
  });
  $('.nav-link .custom-control.custom-radio').on('click', function(e){
    e.preventDefault();
    /*var a = $(this).children('.custom-control-input').prop('value');*/
    $(this).children('.custom-control-input').prop('checked',true);
  });

  if($("[data-fancybox]").length){
    $("[data-fancybox]").fancybox({});
    if($('.linkyoutube').length) {
      var url = $('.linkyoutube').attr('href').replace('watch?v=', 'embed/');
      $('.linkyoutube').attr('href', url);
    }
    
  }

  /*slider range*/
  if($("#range").length) {
    $("#range").ionRangeSlider({
      hide_min_max: true,
      keyboard: true,
      min: 1000,
      max: 10000000,
      from: 400000,
      to: 7000000,
      type: 'double',
      step: 1000,
      prefix: "",
      postfix: " vnđ",
      grid: true
    });
  }

  $('.paside-chkbox li').on('click', function(event) {
      event.preventDefault();
      $(this).toggleClass('active').children('.custom-control-input').prop('checked', !($(this).children('.custom-control-input').is(':checked')));
  });
  $('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');

  $('.paside-radio li').on('click', function(event) {
      event.preventDefault();
      $('.paside-radio li').removeClass('active');
      $(this).toggleClass('active').children('.custom-control-input').prop('checked', true);
  });
  /*$('.paside-list li.active').children('.custom-control-input').prop('checked', 'true');*/
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
  });
});
/*
http://jsfiddle.net/LCB5W/
https://stackoverflow.com/questions/152975/how-do-i-detect-a-click-outside-an-element*/