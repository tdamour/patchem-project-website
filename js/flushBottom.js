 // Code found on http://stackoverflow.com/questions/10099422/flushing-footer-to-bottom-of-the-page-twitter-bootstrap
 // HenryW 
 $(document).ready(function() {
	// sets variable to the height of the window
   var docHeight = $(window).height();
   // footerHeight = current height 
   var footerHeight = $('#footer').height();
   // footerTop = footer position relative to the parent footerHeight
   var footerTop = $('#footer').position().top + footerHeight;
	// if footerTop is less than docHeight than add 10 to the remaining number of docHeight and footerTop. 
   if (footerTop < docHeight) {
    $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
   }
  });