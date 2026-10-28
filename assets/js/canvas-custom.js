/* Offcanvas file */

(function($) {
    "use strict";
    var KEYCODE_TAB = 9;
    // collapse sidebar - start
      // --------------------------------------------------
      $(document).ready(function () {
        $(".menu-btn").on("click", function(e) {
            var element = document.querySelector( '.offcanvas__block' );
            var focusable = element.querySelectorAll( 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            var firstFocusable = focusable[0];
            var lastFocusable = focusable[focusable.length - 1];
            tab_focus( firstFocusable, lastFocusable );
        });
        $(function() {
        $(".canvas-btn").on("click", function(e) {
            e.preventDefault();
            $(".canvas-header").toggleClass("activate");
            $(this).attr( 'aria-expanded', $(".canvas-header").hasClass("activate") ? 'true' : 'false' );
            var element = document.querySelector( '.offcanvas__wrapper' );
            var focusable = element.querySelectorAll( 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            var firstFocusable = focusable[0];
            var lastFocusable = focusable[focusable.length - 1];
            tab_focus( firstFocusable, lastFocusable );
        });

        $('.canvas-header').on("click", function(e) {
            if ( $(e.target).parents().hasClass('offcanvas__block') ) {
                $(".canvas-header").addClass("activate");
            } else {
                closePanel();
            }
        });

        function closePanel() {
            $(".canvas-header").removeClass("activate");
            $(".canvas-btn").attr( 'aria-expanded', 'false' );
            var focusClass = $(".canvas-header.close-btn").data( 'focus' );
            $( '.' + focusClass ).focus();
        }

        // Escape closes the panel.
        $(document).on('keydown', function(e) {
            if ( ( e.key === 'Escape' || e.keyCode === 27 ) && $(".canvas-header").hasClass("activate") ) {
                closePanel();
            }
        });
    });

        
        
        //Focus trap in popup.
     
        function tab_focus( firstFocusable, lastFocusable ) {
            $(document).on('keydown', function(e) {
                if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                    if ( e.shiftKey ) /* shift + tab */ {
                        if (document.activeElement === firstFocusable) {
                            lastFocusable.focus();
                            e.preventDefault();
                        }
                    } else /* tab */ {
                        if (document.activeElement === lastFocusable) {
                            firstFocusable.focus();
                            e.preventDefault();
                        }
                    }
                }
            });
        }
      });
    
})(jQuery);