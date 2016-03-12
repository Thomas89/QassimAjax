/*
	QassimAjax
	Anyone can create an AJAX form! And AJAX events.
	Version 1.0.0
	Plugin URL: http://wp-time.com/qassimajax-jquery-ajax-plugin/
	Written By Qassim Hassan
	Twitter: https://twitter.com/QQQHZ
    GitHub: https://github.com/QassimHassan/
	Websites: wp-time.com | qass.im | wp-plugins.in
	Dual licensed under the MIT and GPL licenses:
		http://www.opensource.org/licenses/mit-license.php
		http://www.gnu.org/licenses/gpl.html
	Copyright (c) 2016 - Qassim Hassan
*/

(function ( $ ) {
 
    $.fn.QassimAjax = function(options) {

        var QassimAjaxOptions = $.extend({
                resultWrap: 0,
                fadeEffect: 1,
                setEvent: 0,
                eventTo: 0,
                eventType: "GET",
                theMessage: 0
        }, options );

        if( QassimAjaxOptions.setEvent == 1 ){

            $(this).on('click', function (e) {

                var eventLink = $(this).attr("href");

                var getEvent = $(this).serialize();

                $.ajax({

                    type: QassimAjaxOptions.eventType,

                    url: eventLink,

                    data: getEvent,

                    cache: false,

                    success: function(displayevent) {

                        if( QassimAjaxOptions.eventTo == 0 ){

                            if( QassimAjaxOptions.theMessage == 0 ){
                                alert(displayevent);
                            }

                            else{
                                alert(QassimAjaxOptions.theMessage);
                            }

                        }
                        else{

                            if( QassimAjaxOptions.eventType == "POST" ){
                                $(QassimAjaxOptions.eventTo).html(displayevent);
                            }
                            else{
                                $(QassimAjaxOptions.eventTo).append(displayevent);
                            }
                            
                        }
                        
                    }

                });

                e.preventDefault();

                return false;

            });

        }

        if( QassimAjaxOptions.fadeEffect == 1 ){
            $(QassimAjaxOptions.resultWrap).css("display", "none");
        }

        $(this).on('submit', function (e) {

            if( QassimAjaxOptions.fadeEffect == 1 ){
                $(QassimAjaxOptions.resultWrap).css("display", "none");
            }

            var theResult = $(this).serialize();

            var formAction = $(this).attr("action");

            var methodType = $(this).attr("method");

            $.ajax({

                type: methodType,

                url: formAction,

                data: theResult,

                cache: false,

                success: function(displayResult) {

                    if( QassimAjaxOptions.resultWrap == 0 ){
                        alert(displayResult);
                    }
                    else{
                        if( QassimAjaxOptions.fadeEffect == 1 ){
                            $(QassimAjaxOptions.resultWrap).fadeIn().html(displayResult);
                        }else{
                            $(QassimAjaxOptions.resultWrap).html(displayResult);
                        }
                    }

                }

            });

            e.preventDefault();

        });

    };
 
}( jQuery ));
