<?php
require_once "../functions/Chart.php";

$statInfo = getStatInfo();
$revenue  = statGetDayRevenue();
//var_dump();die;

?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Test</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="https://api.paymentwall.com/images/paymentwall.ico">
	<link rel="icon" type="image/ico" href="https://api.paymentwall.com/images/paymentwall.ico">
	<link rel="stylesheet" href="../resource/developers.min.css"><link rel="stylesheet" href="../resource/ps.css">
	<script src="../resource/prototype.min.js"></script>
	<script src="../resource/jquery-1.8.3.min.js"></script>
	<script>$.noConflict();</script>
	<script>
		var BaseUrl, isIE7, reportTimeOffset;
		BaseUrl = 'https://api.paymentwall.com/';
		isIE7 = false;
		if(document.all && navigator.appVersion.indexOf("MSIE") != -1) {
			isIE7 = true;
		}
		reportTimeOffset = 0;
	</script>
</head>
<body>
<div class="fade" id="fade" style="display: none;"></div>
<link href="../resource/default.css" rel="stylesheet" type="text/css">
<script src="../resource/calendar_date_select.js" type="text/javascript"></script>
<script src="../resource/calendar_date_select_custom.js" type="text/javascript"></script>
<script src="../resource/format_american.js" type="text/javascript"></script>
<script src="../resource/highcharts.js" type="text/javascript"></script>
<!-- Feed -->
<div class="feed-dashboard">
	<link href="../resource/feed_dashboard.css" rel="stylesheet" type="text/css">
	<link href="../resource/feed_updated.css" rel="stylesheet" type="text/css">

<script>
	var newsLoadDisabled = '1';
	var loadMoreNewsUrl = '/developers/home/more-news';
	var feature_enabled_new_developer_report_dashboard_with_feed = '1';
</script>
<script type="text/javascript" src="../resource/feed.js"></script>
	<script>
		var PS_IDS = null,
			$content = jQuery('.content');
		var parseParams = function (str) {
			var newData = [],
				data = str.split('&').map(function (kv) { return kv.split('=', 2); });
			data.forEach(function (item) {
				newData.push(item[1]);
			});
			return newData;
		};
		var prepareResponse = function(rsp) {
			if (rsp && !!rsp.html) {
				jQuery('.hide-on-empty').fadeIn();
				return rsp.html;
			} else {
				jQuery('.hide-on-empty').hide();
				return '<b>Already activated.</b>';
			}
		};
		$content.each(function (i, el) {
			if (jQuery(el).has('div.use-ps-script')) {
				var $anchors = jQuery(el).find('a');

				$anchors.each(function (index, anchor) {

					if (jQuery(anchor).data('script') == true) {

						var $target = jQuery(this);
						$target.attr('href', '#');
						$target.attr('class', 'show-ps-popup');

						$target.on('click', function (e) {
							e.preventDefault();

							var ids = e.target.dataset.ids.replace(/ /g, '');
							PS_IDS = ids.split(',').map(function (el) { return +el; });
							jQuery('#modal-ps-activation > div.header').html(e.target.dataset.header);
						});
					}
				});
			}
		});
		jQuery('a.show-ps-popup').on('click', function () {
			var that = this;
			var $oldText = jQuery(this).text();
			jQuery(this).html('').css({ background: 'transparent' });
			jQuery(this).append('<span id="show-ps-popup-preloader"><img src="../images/ajax-loader3.gif" alt=""/></span>');
			jQuery.ajax({
				type: 'POST',
				url : 'https://api.paymentwall.com/developers/payment-systems/activate-in-feed?get-ps-active-status=1',
				data: {
					ps_ids: PS_IDS
				},
				success: function (rsp) {
					jQuery('#show-ps-popup-preloader').hide();
					jQuery(that).html($oldText).css({ background: '#55c45f' });
					if (rsp && rsp.success) {
						jQuery('#ps-activation-data').html(prepareResponse(rsp));
						jQuery('#modal-overlay').css('opacity', 0.6).fadeIn();
						jQuery('#modal-ps-activation').fadeIn();
					}
				}
			});
		});
        jQuery('#modal-ps-activation-btn-close').on('click', function (event) {
            event.preventDefault();
            jQuery.ajax({
                type: 'POST',
                url: 'https://api.paymentwall.com/developers/payment-systems/close-feed-popup',
                success: function (rsp) {
                    jQuery('#modal-ps-activation').hide();
                }
            });
        });
		jQuery('#modal-ps-activation-btn-activate').on('click', function (event) {
			event.preventDefault();
            jQuery('#modal-ps-activation-btn-activate').hide();
            jQuery('.preloader-block').show();
            jQuery.ajax({
                type: 'POST',
                url: 'https://api.paymentwall.com/developers/payment-systems/activate-in-feed',
                data: {
                    a_ids: parseParams(jQuery('#ps-activation-form').serialize()),
                    ps_ids: PS_IDS
                },
                dataType: 'json',
                success: function (rsp) {
                    if (rsp && rsp.success) {
                        jQuery('.preloader-block').hide();
                        jQuery('#modal-ps-activation-btn-activate').show();
                        jQuery('#modal-ps-activation').fadeOut();
                        jQuery('#modal-ps-activation-success').fadeIn();
                        setTimeout(function () {
                            jQuery('#modal-ps-activation-success').fadeOut();
                            jQuery('#modal-overlay').fadeOut();
                        }, 5000);
                    } else {
                        jQuery('.preloader-block').hide();
                        jQuery('#modal-ps-activation-btn-activate').show();
                        alert('Please select at least one project.');
                    }
                }
            });

		});
	</script>
<!-- /Feed -->
	<div class="container container-dashboard">
		<span class="clear"></span>
		<div class="panel bla">
			<h1>Dashboard</h1>
			<form action="reports.php" method="GET">
				<input type="hidden" name="search[s]" value="1">
				<input type="hidden" name="search[common]" value="">
				<table border="0" cellpadding="0" cellspacing="0" class="table4 mob_table perfomance_dashboard">
					<tbody>
					<tr>
						<td class="application">
							<select name="search[id]">
								<?php echo reportSearchOptions(); ?>
							</select>
						</td>
						<td class="date_from">
							<input type="text" name="search[date_from]" value="<?php echo getSearchDate()['date_from'];?>" onclick="new CalendarDateSelectCustom($(this), {time:false, year_range:10});return false;" size="8" maxlength="10" class="text">
						</td>
						<td class="date_to">
							<input type="text" name="search[date_to]" value="<?php echo getSearchDate()['date_to'];?>" onclick="new CalendarDateSelectCustom($(this), {time:false, year_range:10});return false;" size="8" maxlength="10" class="text">
						</td>
						<td class="last_with_button"><input type="submit" value="Search" class="but"></td>
					</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="container-table">
			<table class="table7 performance"><tbody>
			<tr>
				<th style="width:20%">Total Revenues</th>
				<th style="width:20%">Transactions
					<a href="#" class="addToolTip question" tooltiptext="Total number of completed transactions">?</a></th>
				<th style="width:20%">Clicks
					<a href="#" class="addToolTip question"
					   tooltiptext="Total number of users clicking the &#39;continue&#39; button on step 2 after selecting the payment method">?</a></th>
				<th style="width:20%">Conversion Rate<a href="#"
					class="addToolTip question"
					tooltiptext="Completions divided by clicks multiplied by 100 : (Completions/Clicks)*100">?</a></th>
				<th style="width:20%">Average purchase<a href="#" class="addToolTip question" tooltiptext="Total revenue divided by completions">?</a></th>
			</tr>
			<tr>
				<td>$<?php echo $statInfo['TotalRevenues'];?></td>
				<td><?php echo $statInfo['Transactions'];?></td>
				<td><?php echo $statInfo['Clicks'];?></td>
				<td><?php echo $statInfo['ConversionRate'];?></td>
				<td>$<?php echo $statInfo['AveragePurchase'];?></td>
			</tr>
				</tbody>
			</table>
		</div>
		<link href="../resource/new_dashboard.css" rel="stylesheet" type="text/css">
		<script src="../resource/new_dashboard.js" type="text/javascript"></script>
		<script src="../resource/highcharts.js" type="text/javascript"></script>
		<div id="total" style="clear: both;"></div>
		<div id="hourly_charts" style="clear: both;"></div>
	<div id="payout_report">
		<div class="box3" style="">
			<h2 class="scheduled">Scheduled payout</h2>
			<div id="js-payout-report-loader" style="display: none;">
				<img src="../resource/loader_blue.gif">
			</div>
			<div id="js-payout-report-container" style="">
				<div>
				<table class="table1 sorting" cellspacing="0" cellpadding="0" border="0" style="width:100%">
				<tbody>
					<tr>
						<th>Payout date</th>
						<th>Amount</th>
					</tr>
					<tr></tr>
					<?php echo getPayoutInfo();?>
				</tbody></table>
				</div>
			</div>
		</div>
	</div>
	<div id="week_daily_charts"></div>

<script type="text/javascript">
	var developersUrl = '';
	var applicationId = '';
	jQuery(document).ready(function() {
		// HIGHROLLER - HIGHCHARTS UTC OPTIONS
		Highcharts.setOptions(
		   {"global":{"useUTC":false}}
		);
		// HIGHROLLER - HIGHCHARTS 'Total revenue' line chart
		var total = new Highcharts.Chart({
			"chart":{"renderTo":"total","type":"line","zoomType":"x","spacingRight":20},
			"events":["selection:"],
			"title":{"text":"Total revenue"},
			"series":[{
				"name":"Revenue",
				"data":<?php echo $revenue['data'];?>,
				"type":"area"}],
			"credits":{"enabled":false},
			"yAxis":{"title":{"text":"Revenue"}},
			"plotOptions":{
				"series":{
					"pointInterval":86400000,
					"pointStart":<?php echo $revenue['time'] . '000';?>,
					"marker":{
						"enabled":true,
						"states":{"hover":{"enabled":true,"radius":3}},
						"radius":1.4}},
				"area":{"marker":{"enabled":false},"shadow":false,"lineWidth":1},
				"states":{"hover":{"lineWidth":1}}},
			"xAxis":{"type":"datetime","title":{"text":"Date"},"labels":{"enabled":true}},
			"tooltip":{"backgroundColor":"white","shared":true},
			"legend":{"enabled":false}
		});
	});
	jQuery(document).ready(function() {
		// HIGHROLLER - HIGHCHARTS UTC OPTIONS
		Highcharts.setOptions(
		   {"global":{"useUTC":false}}
		);
		// HIGHROLLER - HIGHCHARTS 'Time of the day' line chart
		var hourly_charts = new Highcharts.Chart({
			"chart":{"renderTo":"hourly_charts","type":"line","zoomType":"x","spacingRight":20},
			"events":["selection:"],
			"title":{"text":"Time of the day"},
			"series":[{
				"name":"Revenue",
				"data":<?php echo $revenue['hour'];?>}],
			"credits":{"enabled":false},
			"yAxis":{"title":{"text":"Revenue"}},
			"plotOptions":{
				"series":{
					"pointStart":0,
					"marker":{
						"enabled":false,
						"states":{"hover":{"enabled":true,"radius":3}}}}},
			"xAxis":{
				"type":"datetime",
				"title":{"text":"Hours"},
				"tickInterval":2,
				"categories":["0:00","1:00","2:00","3:00","4:00","5:00","6:00","7:00","8:00","9:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"]},
			"tooltip":{"backgroundColor":"white"},
			"legend":{"enabled":false}}
		);
	});
	jQuery(document).ready(function() {
		// HIGHROLLER - HIGHCHARTS UTC OPTIONS
		Highcharts.setOptions(
		   {"global":{"useUTC":false}}
		);
		// HIGHROLLER - HIGHCHARTS 'Day of week' column chart
		var week_daily_charts = new Highcharts.Chart({
			"chart":{"renderTo":"week_daily_charts","type":"column","zoomType":"x","spacingRight":20},
			"events":["selection:"],
			"title":{"text":"Day of week"},
			"series":<?php echo $revenue['week']; ?>,
			"credits":{"enabled":false},
			"yAxis":{"title":{"text":"Revenue"},"plotLines":[{"color":"#808080","width":1,"value":0}]},
			"plotOptions":{
				"series":{
					"pointStart":0,
					"marker":{"enabled":false,"states":{"hover":{"enabled":true,"radius":3}}},
					"pointPadding":0.02,
					"groupPadding":0.03}},
			"xAxis":{"type":"datetime","labels":{"enabled":false},"title":{"text":"Day of week"}},
			"tooltip":{"backgroundColor":"white","headerFormat":""},
			"legend":{
				"enabled":true,
				"backgroundColor":{
					"linearGradient":[0,0,0,25],
					"stops":[[0,"rgb(217, 217, 217)"],[1,"rgb(255, 255, 255)"]]}}
		});
	});
	</script>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		var dashboard	= jQuery(".container-dashboard");
		var feed		= jQuery(".container-feed");
		feed.height(dashboard.height());
	});
</script>
<script src="../resource/popeasy.js"></script>
<script>if (typeof define === 'function') {var define_backup = define;define = null;}</script>
<script src="../resource/password.js"></script>
<script>if (typeof define_backup === 'function') {define = define_backup;}</script>
<script src="../resource/main.js"></script>
<script>var feedModule = 'developers';</script>
<script src="../resource/feed_notifications.js"></script>
<script src="../resource/tabs.js"></script>
<script src="../resource/antifraud.js"></script>
<script src="../resource/tooltip.min.js"></script>

<div id="theToolTip" style="left: -1000px; top: 280px; display: none;">Total number of completed transactions</div>
<img id="ToolTipPointer" src="../resource/tip_bg1.gif" style="left: 1270px; top: 272px; display: none;">

<script>
	var developersUrl = 'https://api.paymentwall.com/developers/';
	function trackPixelDisplay(pixelType) {
		var d, expires, cname, cookie;

		d = new Date();
		d.setTime(d.getTime() + (31*24*60*60*1000));
		expires = "expires=" + d.toGMTString();
		cname = 'tppd_' + pixelType;
		cookie = cname + "=" + 1 + "; " + expires + "; path=/";

		document.cookie = cookie;
	}
</script>
</body>
</html>