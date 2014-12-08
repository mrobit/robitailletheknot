require('./lib/header')();
require('./lib/nav')();
require('./lib/smooth-scroll').init();

var countdown = require('./lib/countdown.js');

document.addEventListener('DOMContentLoaded', function() {
    var countdownElement = document.querySelector('.countdown');

    countdown( new Date(2015, 5, 27), function(ts) {
        countdownElement.innerHTML = ts.toString();
    });
});

