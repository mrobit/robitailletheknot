module.exports = function() {
    var elem = document.createElement('div');

    // Taken from twbs transition.js
    var transEndEventNames = {
        WebkitTransition : 'webkitTransitionEnd',
        MozTransition    : 'transitionend',
        OTransition      : 'oTransitionEnd otransitionend',
        transition       : 'transitionend'
    };

    for (name in transEndEventNames) {
        if (elem.style[name]) {
            return transEndEventNames[name];
        }
    }
};