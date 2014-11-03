jQuery(document).ready(function() {
	jQuery('.nav-toggle').click(function(){
		jQuery('#site-header nav').toggle();
	})
	
	jQuery('.flexslider').flexslider({
		controlNav: false,
		directionNav: false,  
	});
	
	jQuery('form').validate();
});