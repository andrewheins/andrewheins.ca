(function(d, w, fastActiveClassName, isFastActiveTarget) {
    if ((('ontouchstart' in w) || w.DocumentTouch && d instanceof DocumentTouch)) {
        var activeElement = null,
            clearActive = function() {
                if (activeElement) {
                    activeElement.classList.remove(fastActiveClassName);
                    activeElement = null;
                }
            },
            setActive = function(e) {
                clearActive();
                if (isFastActiveTarget(e)) {
                    activeElement = e.target;
                    activeElement.classList.add(fastActiveClassName);
                }
            };

        document.body.addEventListener('touchstart', setActive);
        document.body.addEventListener('touchmove', clearActive);
    }
})(document, window, 'fast-active', function(e) {
    return ['A', 'INPUT'].indexOf(e.target.tagName) > -1; // Put your conditional logic here
});