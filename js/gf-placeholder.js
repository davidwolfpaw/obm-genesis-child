/**
 * jQuery.placeholder - Placeholder plugin for input fields
 * Written by Blair Mitchelmore (blair DOT mitchelmore AT gmail DOT com)
 * Licensed under the WTFPL (http://sam.zoy.org/wtfpl/).
 * Date: 2008/10/14
 *
 * @author Blair Mitchelmore
 * @version 1.0.1
 *
 **/

new function($) {

    $.fn.placeholder = function(settings) {

        settings = settings || {};

        var key = settings.dataKey || "placeholderValue";

        var attr = settings.attr || "placeholder";

        var className = settings.className || "placeholder";

        var values = settings.values || [];

        var block = settings.blockSubmit || false;

        var blank = settings.blankSubmit || false;

        var submit = settings.onSubmit || false;

        var value = settings.value || "";

        var position = settings.cursor_position || 0;



        return this.filter(":input").each(function(index) {

            $.data(this, key, values[index] || $(this).attr(attr));

        }).each(function() {

            if ($.trim($(this).val()) === "")

                $(this).addClass(className).val($.data(this, key));

        }).focus(function() {

            if ($.trim($(this).val()) === $.data(this, key))

                $(this).removeClass(className).val(value)

                if ($.fn.setCursorPosition) {

                  $(this).setCursorPosition(position);

                }

        }).blur(function() {

            if ($.trim($(this).val()) === value)

                $(this).addClass(className).val($.data(this, key));

        }).each(function(index, elem) {

            if (block)

                new function(e) {

                    $(e.form).submit(function() {

                        return $.trim($(e).val()) != $.data(e, key)

                    });

                }(elem);

            else if (blank)

                new function(e) {

                    $(e.form).submit(function() {

                        if ($.trim($(e).val()) == $.data(e, key))

                            $(e).removeClass(className).val("");

                        return true;

                    });

                }(elem);

            else if (submit)

                new function(e) { $(e.form).submit(submit); }(elem);

        });

    };

}(jQuery);






(function($){



var gf_placeholder = function() {



    $('.gform_wrapper .gplaceholder')

        .find('input, textarea').filter(function(i){

            var $field = $(this);



            if (this.nodeName == 'INPUT') {

                var type = this.type;

                return !(type == 'hidden' || type == 'file' || type == 'radio' || type == 'checkbox');

            }



            return true;

        })

        .each(function(){

            var $field = $(this);



            var id = this.id;

            var $labels = $('label[for=' + id + ']').hide();

            var label = $labels.last().text();



            if (label.length > 0 && label[ label.length-1 ] == '*') {

                label = label.substring(0, label.length-1) + ' *';

            }



            $field[0].setAttribute('placeholder', label);

        });



    var support = (!('placeholder' in document.createElement('input'))); // borrowed from Modernizr.com

    if ( support && jquery_placeholder_url )

        $.ajax({

            cache: true,

            dataType: 'script',

            url: jquery_placeholder_url,

            success: function() {

                $('input[placeholder], textarea[placeholder]').placeholder({

                    blankSubmit: true

                });

            },

            type: 'get'

        });

};



$(document).ready(function(){

    gf_placeholder();

    $(document).bind('gform_page_loaded', gf_placeholder);

});



})(jQuery);