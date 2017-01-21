/**
 * @var developersUrl
 * @var vatReportsInclude
 */
jQuery(document).ready(function () {

	var usersReceiptDownloadAllowed = true;
	jQuery('.js-user-receipt-download').on('click', function(e) {
		e.preventDefault();

		var _this				= jQuery(this);
		var id					= _this.attr('data-id');
		var actionsContainer	= jQuery('#js-user-receipt-action-' + id);

		if (usersReceiptDownloadAllowed && id && actionsContainer) {
			usersReceiptDownloadAllowed = false;

			_this.hide();
			actionsContainer.show();

			jQuery.ajax({
				type		: 'post',
				url			: developersUrl + 'reports/receipt-export',
				data		: {id: id},
				dataType	: 'json',
				success		: function(result) {
					if (result.success) {
						actionsContainer.addClass('success').html('The report will be emailed to you shortly.');
					} else {
						actionsContainer.addClass('error').html('The report was not sent.');
					}
					usersReceiptDownloadAllowed = true;
				}
			});
		}
	});
});