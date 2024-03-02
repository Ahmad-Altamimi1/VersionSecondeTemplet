$(window).on('load', function(){
    "use strict";
    /*=========================================================================
            Preloader
    =========================================================================*/
    $("#preloader").delay(750).fadeOut('slow');
});

/*=========================================================================
            Home Slider
=========================================================================*/
$(document).ready(function() {
    "use strict";

    /*=========================================================================
            Slick sliders
    =========================================================================*/
 $('.post-carousel-lg').slick({
    dots: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    cssEase: 'linear',
    speed: 500,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 368,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
            }
        }
    ]
});

var slickNextButton = $('.slick-next');

    $('.post-carousel-featured').slick({
      dots: true,
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1440,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true,
            arrows: false,
          }
        }
        ,
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        }
      ]
    });

    $('.post-carousel-twoCol').slick({
      dots: false,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
          }
        }
      ]
    });
    // Custom carousel nav
    $('.carousel-topNav-prevt').click(function () {
        $('.post-carousel-twoCol').slick('slickPrev');
    });

    $('.carousel-topNav-nextt').click(function () {
        $('.post-carousel-twoCol').slick('slickNext');
    });


    $('.carousel-topNav-prevtrrr').click(function () {
        $('.post-carousel-widgettr').slick('slickPrev');
    });

    $('.carousel-topNav-nextrrr').click(function () {
        $('.post-carousel-twoCol').slick('slickNext');
    });


    // ...

    // Custom carousel nav for post-carousel-widget
    $('.carousel-botNav-prevo').click(function () {
        $('.post-carousel-featured').slick('slickPrev');
    });

    $('.carousel-botNav-nexto').click(function () {
        $('.post-carousel-featured').slick('slickNext');

    });






    $('.post-carousel-widget').slick({
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            slidesToScroll: 1,
          }
        }
      ]
    });
    $('.post-carousel-widgettr').slick({
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            slidesToScroll: 1,
          }
        }
      ]
    });
    // Custom carousel nav
    // $('.carousel-botNav-prev').click(function(){
    //   $('.post-carousel-widget').slick('slickPrev');
    // } );
    // $('.carousel-botNav-next').click(function(){
    //   $('.post-carousel-widget').slick('slickNext');
    // } );
    $('.carousel-botNav-prevw').click(function () {
        $('.post-carousel-widget').slick('slickPrev');
    });

    $('.carousel-botNav-nextw').click(function () {
        $('.post-carousel-widget').slick('slickNext');
    });
    /*=========================================================================
            Sticky header
    =========================================================================*/
    var $header = $(".header-default, .header-personal nav, .header-classic .header-bottom"),
      $clone = $header.before($header.clone().addClass("clone"));

    $(window).on("scroll", function() {
      var fromTop = $(window).scrollTop();
      $('body').toggleClass("down", (fromTop > 300));
    });

});

$(function(){
    "use strict";

    /*=========================================================================
            Sticky Sidebar
    =========================================================================*/
    $('.sidebar').stickySidebar({
        topSpacing: 60,
        bottomSpacing: 30,
        containerSelector: '.main-content',
    });

    /*=========================================================================
            Vertical Menu
    =========================================================================*/
    $( ".submenu" ).before( '<i class="icon-arrow-down switch"></i>' );

    $(".vertical-menu li i.switch").on( 'click', function() {
        var $submenu = $(this).next(".submenu");
        $submenu.slideToggle(300);
        $submenu.parent().toggleClass("openmenu");
    });

    /*=========================================================================
            Canvas Menu
    =========================================================================*/
    $("button.burger-menu").on( 'click', function() {
      $(".canvas-menu").toggleClass("open");
      $(".main-overlay").toggleClass("active");
    });

    $(".canvas-menu .btn-close, .main-overlay").on( 'click', function() {
      $(".canvas-menu").removeClass("open");
      $(".main-overlay").removeClass("active");
    });

    /*=========================================================================
            Popups
    =========================================================================*/
    $("button.search").on( 'click', function() {
      $(".search-popup").addClass("visible");
    });

    $(".search-popup .btn-close").on( 'click', function() {
      $(".search-popup").removeClass("visible");
    });

    $(document).keyup(function(e) {
          if (e.key === "Escape") { // escape key maps to keycode `27`
            $(".search-popup").removeClass("visible");
        }
    });

    /*=========================================================================
            Tabs loader
    =========================================================================*/
    $('button[data-bs-toggle="tab"]').on( 'click', function() {
      $(".tab-pane").addClass("loading");
      $('.lds-dual-ring').addClass("loading");
      setTimeout(function () {
          $(".tab-pane").removeClass("loading");
          $('.lds-dual-ring').removeClass("loading");
      }, 500);
    });

    /*=========================================================================
            Social share toggle
    =========================================================================*/
    $('.post button.toggle-button').each( function() {
      $(this).on( 'click', function(e) {
        $(this).next('.social-share .icons').toggleClass("visible");
        $(this).toggleClass('icon-close').toggleClass('icon-share');
      });
    });

    /*=========================================================================
    Spacer with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('spacer');

    for (var i = 0; i < list.length; i++) {
      var size = list[i].getAttribute('data-height');
      list[i].style.height = "" + size + "px";
    }

    /*=========================================================================
    Background Image with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('data-bg-image');

    for (var i = 0; i < list.length; i++) {
      var bgimage = list[i].getAttribute('data-bg-image');
      list[i].style.backgroundImage  = "url('" + bgimage + "')";
    }

});


$(document).ready(function () {
  let base = document.baseURI;

  $("#textA").bind({
      copy: function () {
          navigator.clipboard.writeText(base).then(
              () => {
                  /* clipboard successfully set */
              },
              () => {
                  /* clipboard write failed */
              }
          );
      },
      cut: function () {
          navigator.clipboard.writeText(base).then(
              () => {
                  /* clipboard successfully set */
              },
              () => {
                  /* clipboard write failed */
              }
          );
      },
  });
});
tns({
    mode: 'carousel', // or 'gallery'
    mouseDrag: true,
    navPosition: "bottom",
    gutter: 10,
    controlsContainer: "#custom_controlsContainer",
    nextButton: '#prev',
    nextButton: '#next', // String selector
    arrowKeys: true, // keyboard support
    lazyload: false,
    lazyloadSelector: ".tns-lazy",
    responsive: {
      "350": {
        "items": 1,
        "controls": true,
        "edgePadding": 30
      },
      "500": {
        "items": 2
      }
    },
  });
