<?php
require_once "../functions/Chart.php";

$offer    =  topOffer();

?>


<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Top Offers</title>
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
<script src="../resource/highcharts.js" type="text/javascript"></script>
<div class="container"><h1>Offers</h1><span class="clear"></span>
    <div class="tabs_wrapper">
        <div class="tabs"><b class="clear"></b></div>
    </div>
    <div class="panel  moreTabs">
        <form action="offers.php" method="GET" id="top_offers_form">
            <input type="hidden" name="search[common]" value="">
            <table border="0" cellpadding="0" cellspacing="0" class="table4 mob_table offers_table">
                <thead>
                <tr>
                    <td>Project</td>
                    <td>Period</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="application"><select name="search[id]">
                        <?php echo reportSearchOptions(); ?>
                    </select></td>
                    <td class="period">
                    <select name="search[period]" id="top_offers_period_select">
                        <?php echo getPeriod(); ?>
                    </select>
                    </td>
                    <td class="last_with_button">
                        <input type="submit" value="Get Report" class="but"></td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="search[s]" value="1"></form>
        <br><strong>This report shows rating of offers with top Revenues during selected period</strong></div>
    <div class="box3 underpanel"><strong>Top Offers</strong>
        <?php echo parseOffers($offer);?>
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