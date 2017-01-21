var hideAllowed = true;
var status_mark_as_read = 1;
var status_hide = -1;

/**
 * Actions to be done with notifications
 *
 * @param is_active
 * @param myThis
 * @param id
 */
function afterReadMsgForNotifications(is_active, myThis, id, remove) {
	//only for element available in notification dropdown
	if (myThis.length) {
		//if notification is already marked as read and is going to be deleted -> don't change number of notifications
		var recountAllowed = myThis.css('display') == 'none' ? 0 : 1;

		if (!remove) {
			myThis.parents('.notification').addClass('read_msg');
		} else {
			myThis.parents('.notification').remove();
		}
		myThis.hide();
		var msgsNumber = jQuery('#counter_body').html();
		if (msgsNumber && msgsNumber > 1 && recountAllowed) {
			jQuery('#counter_body').html(msgsNumber - 1);
		} else if(recountAllowed) {
			jQuery('#notifications_div').next('.notifications-dropdown').remove();
			jQuery('#notifications_div').remove();
		}
		if (is_active) {
			var postBody = jQuery('.post[data-id=' + id + ']');
			if (postBody) {
				afterReadMsgForFeed(false, postBody.find('.read'), id);
			}
		}
	}
}

/**
 * @param is_active
 * @param myThis
 * @param id
 */
function afterReadMsgForFeed(is_active, myThis, id) {
	myThis.parent('.post').addClass('read_msg');
	myThis.remove();
	if (is_active) {
		var notificationBody = jQuery('.notification_body[data-id=' + id + ']');
		if (notificationBody) {
			afterReadMsgForNotifications(false, notificationBody.find('.mark_as_read'), id, false);
		}
	}
}

/**
 * @param myThis
 * @param id
 * @param status
 */
function sendChangeStatusRequest(myThis, id, status, is_notification) {
	jQuery.ajax({
		type: 'post',
		url: '/' + feedModule + '/home/hide',
		data: {id:id, status:status},
		dataType: 'json',
		success: function(result) {
			if (result.success) {
				if (status == status_mark_as_read) {
					if (is_notification) {
						afterReadMsgForNotifications(true, myThis, id, false);
					} else {
						afterReadMsgForFeed(true, myThis, id);
					}
				} else {
					myThis.parent('.post').remove();
					var notificationBody = jQuery('.notification_body[data-id=' + id + ']');
					if (notificationBody) {
						afterReadMsgForNotifications(false, notificationBody.find('.mark_as_read'), id, true);
					}
				}
				showNoFeedMessage();
			}
			hideAllowed = true;
		}
	});
}

/**
 * If there are no feed messages - show no-feed conntainer
 */
function showNoFeedMessage() {
	var msgsNumber = jQuery('.post').length;

	if (!msgsNumber) {
		//show no feed message (and hide FEED title)
		var feedTitleContainer	= jQuery('#feed_title');
		var noFeedContainer		= jQuery('.no-feed');
		if (feedTitleContainer.length && noFeedContainer.length) {
			feedTitleContainer.hide();
			noFeedContainer.show();
		}
	}
}

//hide msgs from feed
jQuery(document).on('click', '.to_hide', function() {
	if (hideAllowed) {
		hideAllowed = false;
		var myThis = jQuery(this);
		var id = myThis.parent('.post').attr('data-id');
		var status = myThis.attr('data-status') == 'read' ? status_mark_as_read : status_hide;

		sendChangeStatusRequest(myThis, id, status, false);
	}
});

//hide msgs from notifications
jQuery(document).on('click', '.mark_as_read', function() {
	if (hideAllowed) {
		hideAllowed = false;
		var myThis = jQuery(this);
		var id = myThis.parent('.notification_body').attr('data-id');

		sendChangeStatusRequest(myThis, id, status_mark_as_read, true);
	}
});