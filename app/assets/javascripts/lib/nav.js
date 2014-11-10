module.exports = function() {
    var headerWrap = document.querySelector('.header-wrap'),
        breakpoint = 100,
        past = window.scrollY >= breakpoint;

    /**
     * Handles the scroll event on the window node.
     * @private
     * @return {Void}
     */
    var scrollHandler = function() {
        past = window.scrollY > breakpoint;

        past === true ? setShortNav() : removeShortNav();
    };

    /**
     * Set the 'short' nav class, so the nav shrinks down on scroll.
     * @private
     * @return {Void}
     */
    var setShortNav = function() {
        headerWrap.classList.add('short');
    };

    /**
     * Remove the 'short' nav class, so the nav resizes to the normal size.
     * @private
     * @return {Void}
     */
    var removeShortNav = function() {
        headerWrap.classList.remove('short');
    };

    // Add the "short" class if the window is automatically scrolled down on load.
    if ( past ) {
        Function.prototype.call(setShortNav);
    }

    if ( window.addEventListener ) {
        window.addEventListener('scroll', scrollHandler, true);
    } else {
        window.attachEvent('onscroll', scrollHandler);
    }

};