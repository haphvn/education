/**
 * Created by haph on 12/21/15.
 */

(function ($) {
    Drupal.behaviors.myModuleBehavior = {
        attach: function (context, settings) {
            // This jQuery code ensures that this element
            // is only processed once.  It is basically saying:
            // 1) Find all elements with this class, that do not
            // have the processed class on it
            // 2) Iterate through them
            // 3) Add the myCustomBehavior-processed class (so that it will not
            // be processed again).
            $('input.myCustomBehavior', context).once('myCustomBehavior', function () {
                // Apply the myCustomBehaviour effect to the elements only once.
                //alert('OK');
            });
        }
    };
})(jQuery);
