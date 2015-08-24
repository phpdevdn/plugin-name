(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-specific JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */
	 $(document).ready(function(){
	 	var frame,
	 	$blk=$('.image-brow');
	 	$.each($blk,function(index, el) {
		var $butt=$(this).find('.image-butt'),
		$img=$(this).find('.image-dis'),
		$inp=$(this).find('.image-in') ;
		$butt.on('click',function(evt){
		evt.preventDefault();
 		if ( frame ) {
	      frame.open();
	      return;
	    }
	    
	    // Create a new media frame
	    frame = wp.media({
	      title: 'Select or Upload Media',
	      button: {
	        text: 'Use this media'
	      },
	      multiple: true  // Set to true to allow multiple files to be selected
	    });
	    frame.open();
		
		frame.on('select',function(){
			var attachment = frame.state().get('selection').first().toJSON();
			console.log(attachment);
			$img.attr({ 'src' : attachment.url });
			$inp.attr({ 'value' : attachment.url });
		});
		});
	 	});

	
	})
	
})( jQuery );
