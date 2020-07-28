jQuery( window ).load( function() {

    /* === Switch Control === */

    jQuery( '.customize-control-switch .switch-option label' ).on(
        'click',
        function() {

            jQuery( this ).parents( '.customize-control' ).find( '.switch-option label' ).removeClass( 'selected' );

            jQuery( this ).addClass( 'selected' );

			var input_value = jQuery( this ).attr( 'value' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( input_value ).trigger( 'change' );
        }
    );

} ); // jQuery( document ).ready