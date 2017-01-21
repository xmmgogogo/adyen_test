<?php
require_once "../functions/Chart.php";
$searchInfo = search();

?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Test2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://api.paymentwall.com/images/paymentwall.ico">
    <link rel="icon" type="image/ico" href="https://api.paymentwall.com/images/paymentwall.ico">
    <link rel="stylesheet" href="../resource/developers.min.css">
    <link rel="stylesheet" href="../resource/ps.css">
    <script src="../resource/prototype.min.js"></script>
    <script src="../resource/jquery-1.8.3.min.js"></script>
    <script>$.noConflict();</script>
    <script>
        var BaseUrl, isIE7, reportTimeOffset;
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
<link type="text/css" rel="stylesheet" href="../resource/crm.css">
<script src="../resource/tickets.js"></script>
<script type="text/javascript" src="../resource/textarea_maxlength.js"></script>
<script type="text/javascript" src="../resource/transactions.js"></script>
<style>
    table.transactions_result_sandbox {
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' height='150px' width='150px'><text x='0' y='15' fill='#e5e5e5' transform='rotate(45 10,30)' font-size='15' font-family='Arial'>Test Payments</text></svg>");
    }
</style>
<div class="container"><h1>Transactions&nbsp;/&nbsp;Live Payments&nbsp;|&nbsp;<a
        href="https://api.paymentwall.com/developers/reports/transactions-sandbox" style="font-size:24px!important;">Test
    Payments</a></h1><span class="clear"></span>
    <div class="tabs">
        <a class="cur2"
           href="transactions.php?&amp;search[date_from]=12/22/2016&amp;search[date_to]=12/29/2016">Transactions</a>
        <a href="https://api.paymentwall.com/developers/reports/reversals/?&amp;search[date_from]=12/22/2016&amp;search[date_to]=12/29/2016">Reversals</a>
        <a href="https://api.paymentwall.com/developers/reports/chargebacks/?&amp;search[date_from]=12/22/2016&amp;search[date_to]=12/29/2016">Chargebacks</a>
        <b class="clear"></b></div>
    <div class="panel ">
        <form id="search_and_csv" action="transactions.php" method="GET">
            <input type="hidden" name="search[s]" value="1"><input type="hidden" name="search[common]" value="">
            <table border="0" cellpadding="0" cellspacing="0" class="table4 mob_table transactions_table">
                <thead>
                <tr>
                    <td>Project</td>
                    <td>User id</td>
                    <td>Ref Id</td>
                    <td>Date from</td>
                    <td>Date to</td>
                    <td>Transaction type</td>
                    <td>Pingback Status</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="application"><select name="search[id]">
                        <?php echo reportSearchOptions();?>
                    </select></td>
                    <td class="user_id"><input type="text" name="search[user_id]" value="<?php echo getSearchUserId();?>" size="8"></td>
                    <td class="ref_id"><input type="text" name="search[ref_id]" value="<?php echo getSearchRefId();?>" size="8"></td>
                    <td class="date_from">
                        <div style="width:115px;">
                            <input type="text" name="search[date_from]" value="<?php echo getSearchDate()['date_from'];?>" size="8" maxlength="10" class="text">&nbsp;
                            <a href="#" onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;">
                                <img src="../resource/calendar.gif" border="0"></a></div>
                    </td>
                    <td class="date_to">
                        <div style="width:115px;">
                            <input type="text" name="search[date_to]" value="<?php echo getSearchDate()['date_to'];?>" size="8" maxlength="10" class="text">&nbsp;
                            <a href="#" onclick="new CalendarDateSelectCustom($(this).previous(), {time:false, year_range:10});return false;">
                                <img src="../resource/calendar.gif" border="0"></a></div>
                    </td>
                    <td class="transaction_type">
                        <select name="search[transactionType]">
                        <?php echo getTransactionType();?>
                    </select></td>
                    <td class="pingback_status_type"><select name="search[pingbackStatus]" style="width:150px;">
                        <?php echo getPingbackStatus();?>
                    </select></td>
                    <td class="last_with_button"><input type="submit" value="Get Report" class="but"></td>
                </tr>
                </tbody>
                <thead>
                <tr></tr>
                </thead>
                <tbody>
                <tr></tr>
                </tbody>
            </table>
        </form>
        <br><strong>This report shows payment transactions.</strong></div>
    <div class="box3 underpanel">
        <table cellspacing="0" cellpadding="0" border="0"
               class="table1 mob_table transactions_result highlightrows_hover">
            <thead>
            <tr>
                <th></th>
                <th>Ref Id</th>
                <th>Project</th>
                <th>User id</th>
                <th>Payment method</th>
                <th>Price <a
                        href="#"
                        class="addToolTip question" tooltiptext="Price of sold item">?</a></th>
                <th>Currency</th>
                <th>End-user Payment</th>
                <th>Currency</th>
                <th>Purchased</th>
                <th>Datetime</th>
                <th>Country of Location<a href="#" class="addToolTip question"
                        tooltiptext="Defined per IP, can be re-set by the merchant via API parameters">?</a></th>
                <th>Status</th>
                <th>Payment Type</th>
                <th>Pingback Status</th>
                <th>Pingback Details</th>
            </tr>
            </thead>
            <tbody>
            <?php echo displayDetailList($searchInfo['pageInfo']);?>
            </tbody>
        </table>
        <?php echo getNavPageInfo($searchInfo['count']);?>
    </div>
    <?php echo getDownload();?>
    <script>
        var developersUrl = 'https://api.paymentwall.com/developers/';
        var vatReportsInclude = 0;
    </script>
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