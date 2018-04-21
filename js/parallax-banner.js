jQuery(document).ready(function() {
    jQuery('header[data-type="background"]').each(function () {
        var $bgobj = jQuery(this);

        jQuery(window).scroll(function() {
            var yPos = -(jQuery(window).scrollTop() / $bgobj.data('speed')); 
            
            // Put together our final background position
            var coords = '5% '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        });
    });
    // move the featured post as you scroll
    jQuery('.container[data-type="foreground"]').each(function () {
        var $fgobj = jQuery(this);

        jQuery(window).scroll(function() {
            var yPos = -(jQuery(window).scrollTop() / $fgobj.data('speed')); 
            
            // Put together our final background position
            var slide = -(yPos + 120) + 'px';

            // Move the background
            $fgobj.css({ top: slide });

        });
    });
});