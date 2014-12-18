require('./lib/nav')();
require('./lib/mediaelement-and-player.js');
require('./lib/smooth-scroll').init();

(function($) {
    var countdown = require('./lib/countdown.js');

    $(document).on('ready', function() {
        var countdownElement = document.querySelector('.countdown');

        countdown( new Date(2015, 5, 27), function(ts) {
            countdownElement.innerHTML = ts.toString();
        });

        // Run the media element player.
        $('video,audio').mediaelementplayer();
    });
})(jQuery);

