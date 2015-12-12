// Avoid `console` errors in browsers that lack a console.
(function () {
  var method;
  var noop = function () {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
}
}());

// search form in header
$( '.open-search' ).on( 'click', function() {
  $(this).toggleClass('open-search-opened');
  $('#searchform').toggleClass('searchform-show');
});

$( '.close-search' ).on( 'click', function() {
  $('.open-search').toggleClass('open-search-opened');
  $('#searchform').toggleClass('searchform-show');
});

// video lightbox
$( '#presentation a' ).on( 'click', function() {
  $('#bg-black').css({ 'display': "block" });
  $('#video-div').css({ 'display': "block" });
});
