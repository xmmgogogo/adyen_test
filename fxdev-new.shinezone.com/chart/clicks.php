<?php
require_once "../functions/Chart.php";

$clickInfo = searchClickInfo();

?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Test 3 Area</title>
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
<div class="container"><h1>Payment Systems</h1><span class="clear"></span>
    <div class="tabs_wrapper">
        <div class="tabs"><b class="clear"></b></div>
    </div>
    <div class="panel  moreTabs">
        <form id="params_form" action="clicks.php" method="post">
            <input type="hidden" name="search[s]" value="1">
            <input type="hidden" name="search[common]" value="">
            <table cellspacing="0" cellpadding="0" border="0" class="table4 mob_table payment_sys">
                <thead>
                <tr>
                    <td>Project</td>
                    <td>Country</td>
                    <td>Widget</td>
                    <td>Date from</td>
                    <td>Date to</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="application">
                    <select name="search[id]">
                        <?php echo reportSearchOptions();?>
                    </select></td>
                    <td class="country">
                    <select name="search[co_id]" style="width:120px">
                        <?php echo getPSCountryOption(); ?>
                    </select>
                    </td>
                    <td class="widgets">
                    <select name="search[w_id]" style="width:120px;">
                        <?php echo getPSWId(); ?>
                    </select>
                    </td>
                    <td class="date_from">
                        <input type="text" name="search[date_from]" value="<?php echo getSearchDate()['date_from']?>" size="8" maxlength="10" class="text">&nbsp;
                        <a href="#"
                            onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;">
                            <img src="../resource/calendar.gif" border="0"></a>
                    </td>
                    <td class="date_to">
                        <input type="text" name="search[date_to]" value="<?php echo getSearchDate()['date_to']?>" size="8" maxlength="10" class="text">&nbsp;
                        <a href="#"
                            onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;"><img
                                src="../resource/calendar.gif" border="0"></a>
                    </td>
                    <td class="last_with_button"><input type="submit" value="Search" class="but"></td>
                </tr>
                </tbody>
            </table>
        </form>
        <br>
        <strong>This report shows details about Payment Systems (Clicks, Conversions, Revenue) for selected widget and country</strong>
    </div>
    <div class="box3 underpanel">
        <table cellspacing="0" cellpadding="0" border="0" class="table1">
            <thead>
            <tr>
                <th>Payment system</th>
                <th>Clicks</th>
                <th>Conversions</th>
                <th>Revenue</th>
            </tr>
            </thead>
            <tbody>
            <?php echo displayClickInfo($clickInfo);?>
            </tbody>
        </table>
    </div>
</div>
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
</body>
</html>