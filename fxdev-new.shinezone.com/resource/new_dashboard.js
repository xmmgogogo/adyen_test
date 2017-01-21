/**
 * var developersUrl
 * var applicationId
 */
jQuery(document).ready(function () {
	//get payout report
	function getPayoutReport(applicationId) {
		jQuery.ajax({
			type		: 'post',
			url			: developersUrl + 'reports/payout-ajax?search[id]=' + applicationId,
			dataType	: 'json',
			success		: function(result) {
				jQuery('#js-payout-report-loader').hide();
				if (result.html) {
					jQuery('#js-payout-report-container').html(result.html).show();
				}
			}
		});
	}
	
	(function($) {
		jQuery('.verification-button').on('click', function() {
			jQuery('.verification-ma').hide();
		});

		jQuery('#verification_resend').on('click', function(){
			jQuery('#verification_resend').hide();
			jQuery('#ajaxLoader').show();
			jQuery.ajax({
				type:'post',
				url:'/developers/account/verify-email',
				dataType:'json',
				success: function(response) {
					if(response.result == 'success') {
						jQuery('#ajaxLoader').hide();
						jQuery('.verification-paragraph').html('Verification email was sent to you.');
					} else {
						jQuery('.verification-paragraph').html('Email sending error. Please try again later.');
					}
				}
			});
		});
	})(jQuery);

	getPayoutReport(applicationId);
});