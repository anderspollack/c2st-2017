console.log("hello there!");
console.log("is jQuery loaded?", typeof jQuery);
(function($) {
    console.log($('.primary-featured-excerpt'));
    console.log('something new!');
})(jQuery);
