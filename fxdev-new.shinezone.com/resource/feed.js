var loadMoreNews = function() {
	if (!newsLoadDisabled) {
//		jQuery('#img_loader').show();
		newsLoadDisabled = true;
		var id = jQuery('#main_feed_container').find('.main_feed').last().attr('data-id');
		var url = (loadMoreNewsUrl !== 'undefined') ? loadMoreNewsUrl : 'home/more-news';
		jQuery.ajax({
			type: 'post',
			url: url,
			data: {last_id:id},
			dataType: 'json',
			success: function(result) {
				if (result.html) {
					jQuery('#main_feed_container').append(result.html);
					newsLoadDisabled = false;
				}
//				jQuery('#img_loader').hide();
			}
		});
	}
}
if (!feature_enabled_new_developer_report_dashboard_with_feed || feature_enabled_new_developer_report_dashboard_with_feed === 'undefined') {
	var win = jQuery(window);
	var doc = jQuery(document);

	win.scroll(function(e) {
		if (win.scrollTop() >= (doc.height() - win.height()) * 0.7) {
			loadMoreNews();
		}
	});
} else {
	var feed = jQuery(".container-feed");

	feed.scroll(function() {
		if(jQuery(this).scrollTop() + jQuery(this).innerHeight() >= this.scrollHeight * 0.8) {
			loadMoreNews();
		}
	});
}
