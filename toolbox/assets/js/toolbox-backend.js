jQuery(window).load(function() {

	// Accordion - Fix Bootstrap Toggle Issue
	jQuery('#thinkup-documentation .menu-item-handle').click(function() {
	    if(jQuery(this).closest('.menu-item').hasClass('menu-item-edit-inactive')) {

	        jQuery(this).closest('.menu-item').removeClass('menu-item-edit-inactive');
	        jQuery(this).closest('.menu-item').addClass('menu-item-edit-active');

			jQuery(this).closest('.menu-item').find('.menu-item-settings').fadeIn(300);

	    } else {			

	        jQuery(this).closest('.menu-item').addClass('menu-item-edit-inactive');
	        jQuery(this).closest('.menu-item').removeClass('menu-item-edit-active');

			jQuery(this).closest('.menu-item').find('.menu-item-settings').fadeOut(300);

		}


	});

});