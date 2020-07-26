jQuery(document).ready(function($) {
    'use strict';
    var this_obj = storeone_companion_install;

    $(document).on('click', '.storeone-plugin-install', function(event) {
        event.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        button.text(this_obj.installing + '...').addClass('updating-message');
        wp.updates.installPlugin({
            slug: slug,
            success: function(data) {
                button.attr('href', data.activateUrl);
                button.text(this_obj.activating + '...');
                button.removeClass('button-secondary updating-message storeone-plugin-install');
                button.addClass('button-primary storeone-plugin-activate');
                button.trigger('click');
            },
            error: function(data) {
                console.log('error', data);
                button.removeClass('updating-message');
                button.text(this_obj.error);
            },
        });
    });

    $(document).on('click', '.storeone-plugin-activate', function(event) {
        event.preventDefault();
        var button = $(this);
        var url = button.attr('href');
        if (typeof url !== 'undefined') {
            // Request plugin activation.
            jQuery.ajax({
                async: true,
                type: 'GET',
                url: url,
                beforeSend: function() {
                    button.text(this_obj.activating + '...');
                    button.removeClass('button-secondary');
                    button.addClass('button-primary activate-now updating-message');
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    });


    $(document).on('click', '.action-watch', function(event) {
        event.preventDefault();
        var action_id = $(this).parents('.action').attr('id');
        var $icon =   $(this).children('.dashicons');
        if(action_id){
            $.ajax({
                url: this_obj.ajax_url,
                type: 'POST',
                data: {action: 'storeone_update_rec_acts', action_id:action_id},
                success:function(data) {
                    if($icon.hasClass('dashicons-visibility')){
                        $icon.removeClass('dashicons-visibility');
                        $icon.addClass('dashicons-hidden');
                    }else{
                        $icon.removeClass('dashicons-hidden');
                        $icon.addClass('dashicons-visibility');
                    }
                }
            });
        }
        
    });

    $(document).on('click', '#companion-install-dismiss', function(event) {
        event.preventDefault();
        var $container = $(this).parent();
        var $icon_child = $(this).children('i.fa'); 
        if($icon_child.hasClass('fa-refresh')){
            return;
        }

        $icon_child.removeClass('fa-times').addClass('fa-refresh fa-spin');
        $.ajax({
            url: this_obj.ajax_url,
            type: 'POST',
            data: {action: 'storeone_hide_customizer_companion_notice'},
            success:function(data) {
                $container.remove();
            }
        });
    });
    
    
});