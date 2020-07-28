(function( $ ) {
	
	$(document).ready(function (){

		// Only needed on customizer page - theme options page handled using Redux core customization
		if( jQuery( 'body' ).hasClass( 'wp-customizer' ) ) {

			// ----------------------------------------------------------------------------------------------------------
			// 1. CUSTOMIZER PAGE
			// ----------------------------------------------------------------------------------------------------------

			// Add active class to customizer
			$('body.wp-customizer [id*="thinkup_customizer_section_themeoptions"] > h3').click(function(e){

				// Code to target title click event in theme options area

			});

			// Remove width classes
			$( 'body.wp-customizer [id*="thinkup_customizer_section_themeoptions"] .accordion-section > button' ).click(function(e){ 

				// Code to target button click event in theme options area

			});
		}

	});
})( jQuery );