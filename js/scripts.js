/*
 * JAVASCRIPT FUNCTIONS
 *
 * This file should contain any JavaScript you want to add to the site.
 *
 * Child Theme Name: OBM-Geneis-Child for Genesis v2.1.2
 * Author: Orange Blossom Media
 * Url: http://orangeblossommedia.com/
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
            // Slide-Out Menu

                /* prepend menu icon */
                $('.nav-primary-wrap .wrap').prepend('<div id="mobile-header"><a class="responsive-menu-button fa fa-bars" href="#sidr"></a></div>');

                $('.responsive-menu-button').sidr({
                    name: 'sidr',
                    source: '.nav-primary',
                    side: 'left',
                    onOpen: function () {
                        $('.responsive-menu-button').addClass('fa fa-close');
                        $('.responsive-menu-button').removeClass('fa fa-bars');
                    },
                    onClose: function () {
                        $('.responsive-menu-button').addClass('fa fa-bars');
                        $('.responsive-menu-button').removeClass('fa fa-close');
                    },
                });


            });

        }(jQuery));


    }

    /* Only for screens larger than 1030px */
    if (responsive_viewport > 1030) {

    }

}); /* end of as page load scripts */