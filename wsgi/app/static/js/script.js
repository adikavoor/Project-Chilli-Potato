$(document).ready(function() {

	// Initialize Masonry
	$('#content').masonry({
		columnWidth: 10,
		itemSelector: '.item',
		isFitWidth: true,
		isAnimated: !Modernizr.csstransitions
	}).imagesLoaded(function() {
		$(this).masonry('reload');
	});

});