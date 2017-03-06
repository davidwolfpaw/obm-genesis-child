/*
 * JAVASCRIPT FUNCTIONS
 *
 * This file should contain any JavaScript you want to add to the site.
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 */

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    (function( $ ) {

        "use strict";

        // Click function that will work on .class on mobile devices
        $(function() {

            $(document).ready(function(){
                $(document).on('touchstart click', '.class', function(e){
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

        });

    }(jQuery));

    /*
    One method for handling responsive jQuery
    */

    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* if is below 481px */
    if (responsive_viewport < 481) {

    } /* end smaller than 481px */

    /* if is larger than 481px */
    if (responsive_viewport > 481) {

    } /* end larger than 481px */

    /* if is below 960px */
    if (responsive_viewport < 960) {

        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });


        /* Load Sidr Menu */
        (function( $ ) {
            "use strict";
            $(function() {

                /* prepend menu icon */
                $('header .genesis-nav-menu, .nav-primary .genesis-nav-menu').addClass('responsive-menu').before('<div class="responsive-menu-icon-sidr"><span class="fa fa-bars"></span>menu</div>');

                $('.responsive-menu-icon-sidr').sidr({
                    source: '.nav-primary',
                    side: 'left',
                    speed: 200,
                    displace: true,
                    bind: 'touchstart click',
                    onOpen: function () {
                        $('.responsive-menu-icon-sidr span').addClass('fa-close');
                        $('.responsive-menu-icon-sidr span').removeClass('fa-bars');
                    },
                    onClose: function () {
                        $('.responsive-menu-icon-sidr span').addClass('fa-bars');
                        $('.responsive-menu-icon-sidr span').removeClass('fa-close');
                    },
                });

                // Close sidr menu on window resize
                $( window ).resize(function () {
                    $.sidr('close', 'sidr');
                });

                // Add overlay and close on overlay click
                $('.nav-primary').append('<div id="sidr-overlay"></div>');

                $('#sidr-overlay').click(function () {
                    $.sidr('close', 'sidr');
                });


            });

        }(jQuery));


    }

    /* Only for screens larger than 1030px */
    if (responsive_viewport > 1030) {

    }

}); /* end of as page load scripts */