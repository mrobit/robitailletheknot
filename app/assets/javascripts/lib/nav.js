var transition = require('./transition')();

module.exports = function() {
    var Nav = (function() {

        /**
         * The nav object.
         *
         * @type {HTMLElement}
         */
        var nav = document.querySelector('.nav');

        /**
         * The sidebar element that contains the navigation.
         *
         * @type {HTMLElement}
         */
        var sidebar = document.querySelector('.sidebar');

        /**
         * The nav toggle switch.
         *
         * @type {HTMLElement}
         */
        var toggle = document.querySelector('.nav-toggle');

        /**
         * Return whether we're at a "mobile" width or not.
         *
         * @returns {boolean}
         */
        var isMobile = function() {
            return window.outerWidth <= 768;
        };

        /**
         * The public API
         *
         * @public
         * @type {Object}
         */
        var api = {};

        /**
         * Returns whether the sidebar is open or not.
         * @returns {boolean}
         */
        var isOpen = function() {
            return sidebar.classList.contains('--open');
        };

        /**
         * The click event handler on the navigation toggle switch.
         *
         * @param e
         */
        var toggleClickEventHandler = function(e) {
            e.preventDefault();

            return isOpen() ? closeNav() : openNav();
        };


        var openNav = function() {
            sidebar.classList.remove('--close');
            sidebar.classList.add('--open');
        };

        var closeNav = function() {
            sidebar.classList.remove('--open');
            sidebar.classList.add('--close');
        };

        // Remove any open/closed classes.
        var reset = function() {
            sidebar.classList.remove('--open');
            sidebar.classList.remove('--close');
        };

        var resizeEventHandler = function() {
            if (mobileState !== isMobile()) {
                reset();
                mobileState = isMobile();
            }
        };

        /**
         * Initialization function
         *
         * @return {Null}
         */
        api.init = function() {
            window.addEventListener('resize', resizeEventHandler);
            toggle.addEventListener('click', toggleClickEventHandler);
        };

        return api;
    })();

    document.addEventListener('DOMContentLoaded', Nav.init);
};