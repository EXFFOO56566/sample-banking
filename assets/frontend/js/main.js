$(function ($) {
    "use strict";
    var $window = $(window);

   /* Offset start */
   var html_body = $('html, body'),
   nav = $('nav'),
   navOffset = nav.offset().top,
   $window = $(window);


      /*======== Sticky header ===========*/
      $('.navbar-collapse a').on('click', function () {
        $(".navbar-collapse").collapse('hide');
    });

      //scrollspy menu
	$('body').scrollspy({
		target: '#navbarSupportedContent',
		offset: 80
	});

/* offset ends */

$('#mainHeader  a').click(function () {
   if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
       var target = $(this.hash);
       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
       if (target.length) {
           html_body.animate({
               scrollTop: target.offset().top - 30
           }, 1500);
           return false;
       }
   }
});

    
    //for scroll bottom to top js here
    if ($('.totop').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.totop').addClass('show');
                } else {
                    $('.totop').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('.totop').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    $window.scroll(function () {
        if ($window.scrollTop()) {
            $("#mainHeader").addClass('stiky');
        } else {
            $("#mainHeader").removeClass('stiky');
        }
    });



''
    jQuery(window).on('load', function () {

        /*---------------------------------------------------
            Site Preloader
        ----------------------------------------------------*/
        var $sitePreloaderSelector = $('.site-preloader');
        $sitePreloaderSelector.fadeOut(500);


    });



}(jQuery));



