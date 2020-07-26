(function ($) {
    'use strict';
    wp.customizerRepeater = {

        init: function () {
            jQuery(document).on('click', '.iconpicker-items>i', function () {
                var iconClass = jQuery(this).attr('class').slice(3);
                var classInput = jQuery(this).parents('.iconpicker-popover').prev().find('.icon-select-field');
                classInput.val(iconClass);
                classInput.attr('value', iconClass);

                var iconPreview = classInput.parents('.icon-field-group').find('.icon-show');
                var iconElement = '<i class="fa '.concat(iconClass, '"><\/i>');
                iconPreview.empty();
                iconPreview.append(iconElement);

                // var th = jQuery(this).parent().parent().parent();
                jQuery(this).parents('.iconpicker-popover').removeClass('iconpicker-visible');
                classInput.trigger('change');
                //themefarmer-repeater  themefarmer-repeater-data
                //customizer_repeater_refresh_social_icons(th);
                return false;
            });
        },
        search: function ($searchField) {
            var itemsList = $searchField.parent().next().find('.iconpicker-items');
            var searchTerm = $searchField.val().toLowerCase();
            if (searchTerm.length > 0) {
                itemsList.children().each(function () {
                    if (jQuery(this).filter('[title*='.concat(searchTerm)).length > 0 || searchTerm.length < 1) {
                        jQuery(this).show();
                    } else {
                        jQuery(this).hide();
                    }
                });
            } else {
                itemsList.children().show();
            }
        },
        iconPickerToggle: function ($input) {
            var iconPicker = $input.parent().next();
            iconPicker.addClass('iconpicker-visible');
        }
    };

    jQuery(document).ready(function () {
        //wp.customizerRepeater.init();
        

        jQuery(document).on('keyup focusout', 'input#themefarmer-icon-search', function () {
            // console.log('search');
            // wp.customizerRepeater.search(jQuery(this));
            var itemsList = jQuery(this).parents('#themefarmer-icon-picker-plate-header').siblings('div#themefarmer-icon-picker-icons');
            var searchTerm = jQuery(this).val().toLowerCase();
            // console.log(itemsList.length);
            // console.log(searchTerm);
            if (searchTerm.length > 0) {
                itemsList.children().each(function () {
                    // console.log(jQuery(this).filter('data-index*="'+searchTerm+'"').length);
                    if (jQuery(this).filter('[data-index*='.concat(searchTerm)).length > 0 || searchTerm.length < 1) {
                        jQuery(this).show();
                    } else {
                        jQuery(this).hide();
                    }
                });
            } else {
                itemsList.children().show();
            }
        });

        jQuery(document).on('click', '.icon-select-field', function(event) {
            // console.log('clicked');
            //wp.customizerRepeater.iconPickerToggle(jQuery(this));
        });

        jQuery(document).on('click', '.icon-select-field', function(event) {
            // console.log('clicked');
            jQuery(this).addClass('icon-field-active');
            jQuery('div#themefarmer-icon-picker-plate').addClass('active');
            // jQuery('div#themefarmer-icon-picker-icons').focus();
        });

        jQuery(document).on('click', '#themefarmer-icon-picker-icons > i', function(event) {
            var icon  = jQuery(this).data('icon');
            var icon_field = jQuery('.icon-select-field.icon-field-active');
            icon_field.val(icon);
            var iconPreview = icon_field.parents('.icon-field-group').find('.icon-show');
            var iconElement = '<i class="fa '+icon+'"></i>';
            iconPreview.empty();
            iconPreview.append(iconElement);

            icon_field.trigger('change');
            icon_field.removeClass('icon-field-active');
            jQuery('div#themefarmer-icon-picker-plate').removeClass('active');
        });

        var hide_icon_pate = function(e){

        }

        jQuery(document).mouseup( function (e) {
            var container = jQuery('div#themefarmer-icon-picker-plate');

            if (!container.is(e.target) && container.has(e.target).length === 0){
                container.removeClass('active');
            }
        });

        /*jQuery('.icon-select-field').on('click', function () {
            
            
        });*/

        jQuery(document).mouseup( function (e) {
            var container = jQuery('.iconpicker-popover');

            if (!container.is(e.target)
                && container.has(e.target).length === 0)
            {
                container.removeClass('iconpicker-visible');
            }
        });

    });

})(jQuery);
