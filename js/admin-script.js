jQuery(document).ready(function($) {
	$(document).on('click', '.notice.storeone-theme-notice-dissmiss button.notice-dismiss', function(event) {
        event.preventDefault();
        console.log(storeone_admin_obj);
        $.ajax({
        	url: storeone_admin_obj.ajax_url,
        	type: 'POST',
        	data: {action: 'storeone_dissminss_notice'},
        })
        .done(function() {
        	console.log("success");
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });        
    });
});