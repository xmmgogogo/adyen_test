<?php

require_once "../functions/Chart.php";

$statCountry = statGetCountryRevenue();

?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tets6</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://api.paymentwall.com/images/paymentwall.ico">
    <link rel="icon" type="image/ico" href="https://api.paymentwall.com/images/paymentwall.ico">
    <link rel="stylesheet" href="../resource/developers.min.css">
    <link rel="stylesheet" href="../resource/ps.css">
    <script src="../resource/prototype.min.js"></script>
    <script src="../resource/jquery-1.8.3.min.js"></script>
    <script>$.noConflict();</script>
    <script>var BaseUrl, isIE7, reportTimeOffset;
    BaseUrl = 'https://api.paymentwall.com/';
    isIE7 = false;
    if (document.all && navigator.appVersion.indexOf("MSIE") != -1) {
        isIE7 = true;
    }
    reportTimeOffset = 0;</script>
</head>
<body>
<div class="fade" id="fade" style="display: none;"></div>
<link href="../resource/default.css" rel="stylesheet" type="text/css">
<script src="../resource/calendar_date_select.js" type="text/javascript"></script>
<script src="../resource/calendar_date_select_custom.js" type="text/javascript"></script>
<script src="../resource/format_american.js" type="text/javascript"></script>
<script src="../resource/highcharts.js" type="text/javascript"></script>
<div class="container"><h1>Countries</h1><span class="clear"></span>
    <div class="tabs_wrapper">
        <div class="tabs"><b class="clear"></b></div>
    </div>
    <div class="panel  moreTabs">
        <form action="international.php" method="GET">
            <input type="hidden"
                                                                                                         name="search[common]"
                                                                                                         value="">
            <table border="0" cellpadding="0" cellspacing="0" class="table4 mob_table international">
                <thead>
                <tr>
                    <td>Project</td>
                    <td>Date from</td>
                    <td>Date to</td>
                    <td>Revenue</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="application"><select name="search[id]">
                        <?php echo reportSearchOptions();?>
                    </select></td>
                    <td class="date_from">
                        <input type="text" name="search[date_from]" value="<?php echo getSearchDate()['date_from'] ?>" size="8"
                                                 maxlength="10" class="text">&nbsp;<a
                            href="#"
                            onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;"><img
                                src="../resource/calendar.gif" border="0"></a></td>
                    <td class="date_to"><input type="text" name="search[date_to]" value="<?php echo getSearchDate()['date_to'] ?>" size="8"
                                               maxlength="10" class="text">&nbsp;<a
                            href="#"
                            onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;"><img
                                src="../resource/calendar.gif" border="0"></a></td>
                    <td class="revenue"><select name="search[revenue_type]">
                        <?php echo getRevenueType();?>
                    </select></td>
                    <td><input type="submit" value="Get Report" class="but"></td>
                    <td><input type="button" value="Show detailed view" class="but" id="switch" style="margin: 5px;">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="search[s]" value="1"></form>
        <br><strong>This report shows Revenue and Users distribution by country</strong></div>
    <div id="revenue" style="min-width: 400px; height: 400px; margin-bottom: 50px; margin-top: 30px"></div>
    <div id="users" style="min-width: 400px; height: 400px; margin-bottom: 50px; margin-top: 30px">

    </div>
    <b class="clear"></b>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            // HIGHROLLER - HIGHCHARTS UTC OPTIONS
            Highcharts.setOptions(
                    {"global": {"useUTC": false}}
            );


            // HIGHROLLER - HIGHCHARTS 'Revenue, USD' column chart
            var revenue = new Highcharts.Chart(
                    {
                        "chart": {"renderTo": "revenue", "type": "column", "zoomType": "x", "spacingRight": 20},
                        "events": ["seelction:"],
                        "title": {"text": "Revenue, USD"},
                        "series": <?php echo $statCountry['country']; ?>,
                        "credits": {"enabled": false},
                        "yAxis": {
                            "title": {"text": "Revenue, USD"},
                            "plotLines": [{"color": "#808080", "width": 1, "value": 0}]
                        },
                        "plotOptions": {
                            "series": {
                                "pointStart": 0,
                                "marker": {"enabled": false, "states": {"hover": {"enabled": true, "radius": 3}}},
                                "pointPadding": 0.02,
                                "groupPadding": 0.03
                            }
                        },
                        "xAxis": {"type": "datetime", "labels": {"enabled": false}, "lineColor": "transparent"},
                        "tooltip": {"backgroundColor": "white", "headerFormat": ""},
                        "legend": {
                            "enabled": true,
                            "layout": "horizontal",
                            "align": "center",
                            "verticalAlign": "bottom",
                            "itemStyle": {"color": "#222"},
                            "backgroundColor": {
                                "linearGradient": [0, 0, 0, 25],
                                "stops": [[0, "rgb(217, 217, 217)"], [1, "rgb(255, 255, 255)"]]
                            }
                        }
                    }
            );

        });
        jQuery(document).ready(function () {

            // HIGHROLLER - HIGHCHARTS UTC OPTIONS
            Highcharts.setOptions(
                    {"global": {"useUTC": false}}
            );


            // HIGHROLLER - HIGHCHARTS 'Users' column chart
            var users = new Highcharts.Chart(
                    {
                        "chart": {"renderTo": "users", "type": "column", "zoomType": "x", "spacingRight": 20},
                        "events": ["seelction:"],
                        "title": {"text": "Users"},
                        "series": <?php echo $statCountry['users'];?>,
                        "credits": {"enabled": false},
                        "yAxis": {
                            "title": {"text": "Users"},
                            "plotLines": [{"color": "#808080", "width": 1, "value": 0}]
                        },
                        "plotOptions": {
                            "series": {
                                "pointStart": 0,
                                "marker": {"enabled": false, "states": {"hover": {"enabled": true, "radius": 3}}},
                                "pointPadding": 0.02,
                                "groupPadding": 0.03
                            }
                        },
                        "xAxis": {"type": "datetime", "labels": {"enabled": false}, "lineColor": "transparent"},
                        "tooltip": {"backgroundColor": "white", "headerFormat": ""},
                        "legend": {
                            "enabled": true,
                            "layout": "horizontal",
                            "align": "center",
                            "verticalAlign": "bottom",
                            "itemStyle": {"color": "#222"},
                            "backgroundColor": {
                                "linearGradient": [0, 0, 0, 25],
                                "stops": [[0, "rgb(217, 217, 217)"], [1, "rgb(255, 255, 255)"]]
                            }
                        }
                    }
            );

        });
    </script>
    <div class="box3 underpanel" id="scheme" style="display:none;">
        <table cellpadding="0" cellspacing="0" border="0" class="table1">
            <thead>
            <tr>
                <th>
                    <a href="https://api.paymentwall.com/developers/reports/international/?sort[field]=country&amp;sort[order]=desc&amp;search%5Bcommon%5D=&amp;search%5Bid%5D=0&amp;search%5Bdate_from%5D=12%2F22%2F2016&amp;search%5Bdate_to%5D=12%2F29%2F2016&amp;search%5Brevenue_type%5D=total&amp;search%5Bs%5D=1&amp;search%5Ba_id%5D%5B0%5D=202673&amp;search%5Ba_id%5D%5B1%5D=202467&amp;search%5Ba_id%5D%5B2%5D=202936">Country</a>
                </th>
                <th>
                    <a href="https://api.paymentwall.com/developers/reports/international/?sort[field]=users&amp;sort[order]=desc&amp;search%5Bcommon%5D=&amp;search%5Bid%5D=0&amp;search%5Bdate_from%5D=12%2F22%2F2016&amp;search%5Bdate_to%5D=12%2F29%2F2016&amp;search%5Brevenue_type%5D=total&amp;search%5Bs%5D=1&amp;search%5Ba_id%5D%5B0%5D=202673&amp;search%5Ba_id%5D%5B1%5D=202467&amp;search%5Ba_id%5D%5B2%5D=202936">Users</a>
                </th>
                <th>
                    <a href="https://api.paymentwall.com/developers/reports/international/?sort[field]=revenue&amp;sort[order]=asc&amp;search%5Bcommon%5D=&amp;search%5Bid%5D=0&amp;search%5Bdate_from%5D=12%2F22%2F2016&amp;search%5Bdate_to%5D=12%2F29%2F2016&amp;search%5Brevenue_type%5D=total&amp;search%5Bs%5D=1&amp;search%5Ba_id%5D%5B0%5D=202673&amp;search%5Ba_id%5D%5B1%5D=202467&amp;search%5Ba_id%5D%5B2%5D=202936">Revenue</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php echo $statCountry['detail'];?>
            </tbody>
        </table>
    </div>
    <b class="clear"></b>
    <script>
        jQuery(function ($) {
            $('#switch').toggle(function () {
                $('#revenue').fadeToggle();
                $('#users').fadeToggle();
                $('#scheme').fadeToggle();
                $(this).val('Hide detailed view');
            }, function () {
                $('#revenue').fadeToggle();
                $('#users').fadeToggle();
                $('#scheme').fadeToggle();
                $(this).val('Show detailed view');
            });
        });
    </script>
    <script src="../resource/popeasy.js"></script>
    <script>if (typeof define === 'function') {
        var define_backup = define;
        define = null;
    }</script>
    <script src="../resource/password.js"></script>
    <script>if (typeof define_backup === 'function') {
        define = define_backup;
    }</script>
    <script src="../resource/main.js"></script>
    <script>var feedModule = 'developers';</script>
    <script src="../resource/feed_notifications.js"></script>
    <script src="../resource/tabs.js"></script>
    <script src="../resource/antifraud.js"></script>
    <script src="../resource/tooltip.min.js"></script>
    <div id="theToolTip"></div>
    <img id="ToolTipPointer" src="../resource/tip_bg1.gif">
    <script>var developersUrl = 'https://api.paymentwall.com/developers/';
    function trackPixelDisplay(pixelType) {
        var d, expires, cname, cookie;

        d = new Date();
        d.setTime(d.getTime() + (31 * 24 * 60 * 60 * 1000));
        expires = "expires=" + d.toGMTString();
        cname = 'tppd_' + pixelType;
        cookie = cname + "=" + 1 + "; " + expires + "; path=/";

        document.cookie = cookie;
    }
    </script>
</div>
</body>
</html>