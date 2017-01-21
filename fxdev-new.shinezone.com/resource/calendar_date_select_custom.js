var CalendarDateSelectCustom = Class.create(CalendarDateSelect, {
	refreshCalendarGrid: function($super) {
		$super();
		if (this.today_cell) this.today_cell.removeClassName("today");
	},
	today: function(now) {
		var currDate = new Date();
		currDate.setTime(currDate.getTime() + (currDate.getTimezoneOffset() * 60 + reportTimeOffset) * 1000);

		var d = currDate; this.date = currDate;
		var o = $H({ day: d.getDate(), month: d.getMonth(), year: d.getFullYear(), hour: d.getHours(), minute: d.getMinutes()});
		if ( ! now ) o = o.merge({hour: "", minute:""});
		this.updateSelectedDate(o, true);
		this.refresh();
	}
});
