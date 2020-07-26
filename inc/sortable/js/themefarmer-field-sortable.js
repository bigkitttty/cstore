wp.customize.controlConstructor['storeone-sortable'] = wp.customize.Control.extend({

    // When we're finished loading continue processing
    ready: function() {

        'use strict';

        var control = this;
        control.initThemeFarmerControl();
    },

    initThemeFarmerControl: function() {

        'use strict';

        var control = this;

        // Set the sortable container.
        control.sortableContainer = control.container.find( 'ul.themefarmer-sortable' ).first();
        // console.log(control.sortableContainer);
        // Init sortable.
        control.sortableContainer.sortable({
            axis: 'y',
            items: '> li',
            stop: function() {
                control.updateValue();
            }
        }).disableSelection().find( 'li' ).each( function() {

            // Enable/disable options when we click on the eye of Thundera.
            jQuery( this ).find( 'i.visibility' ).click( function() {
                jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
            });
        }).click( function() {

            // Update value on click.
            control.updateValue();
        });
    },

    /**
     * Updates the sorting list
     */
    updateValue: function() {

        'use strict';

        var control = this,
            newValue = [];

        this.sortableContainer.find( 'li' ).each( function() {
            if ( ! jQuery( this ).is( '.invisible' ) ) {
                newValue.push( jQuery( this ).data( 'value' ) );
            }
        });
        control.setting.set( newValue );
    }
});