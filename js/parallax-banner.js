jQuery(document).ready(function() {
	jQuery('header[data-type="background"]').each(function () {
		var $bgobj = jQuery(this);

		jQuery(window).scroll(function() {
            var yPos = -(jQuery(window).scrollTop() / $bgobj.data('speed')); 
            
            // Put together our final background position
            var coords = '50% '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        });
	});
});