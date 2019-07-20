(function($) {
    const $previous = $('.previous-supporters');
    const $next = $('.next-supporters');
    const $items = $('.supporter-carousel__items');
    const rowHeight = $('.supporter-carousel__items').innerHeight();
    let position = 0;

    function showPrevious() {
        const height = $items[0].scrollHeight;
        clearTimeout(delayedNext);
        $items.animate({ opacity: 0 }, 500, () => {
            position -= rowHeight;
            if (position < 0) {
                position = height - rowHeight;
            }
            $items.scrollTop(position);
            $items.animate({ opacity: 1 }, 500, () => {
                delayedNext = setTimeout(() => {
                    showNext();
                }, 3000)
            });
        });
    }

    function showNext() {
        const height = $items[0].scrollHeight;
        clearTimeout(delayedNext);
        $items.animate({ opacity: 0 }, 500, () => {
            position += rowHeight
            if (position > height - rowHeight) {
                position = 0;
            }
            $items[0].scrollTop = position;
            $items.animate({ opacity: 1 }, 500, () => {
                delayedNext = setTimeout(() => {
                    showNext();
                }, 3000)
            });
        });
    }

    $previous.click(showPrevious);
    $next.click(showNext)

    let delayedNext = setTimeout(() => {
        showNext();
    }, 3000);

})(jQuery);
