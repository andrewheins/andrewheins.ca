$(document).ready(function () {
  if( $('body').hasClass('single') ) {
    var scrollEventFired = false;
    // Google Analytics Events
      // Trigger event on interval, measures engagement
      var ctr = 0, 
      interval = setInterval(function() {
        _gaq.push(['_trackEvent', 'Blog', '40 sec timer']);
        if (ctr === 5) {
          clearInterval(interval);
        } else {
          ctr++;
        }
      }, 40000);

      // If user scrolls beyond x px, likely engaged.
      $(window).on('scroll', function() {
        if(!scrollEventFired) {
          var scrolledpx = parseInt($(window).scrollTop());
          if (scrolledpx > 500) {
            _gaq.push(['_trackEvent', 'Blog', 'Scroll Limit']);
          }
        }
      });

      // Send event on comment submission
      $('#commentform').on('submit', function() {
        _gaq.push(['_trackEvent', 'Blog', 'Comment Submission']);
      });
  }
});
