<?php
require_once "../functions/Chart.php";


?>

<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Test5</title>
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
<script src="../resource/format_american.js" type="text/javascript"></script>
<div class="container"><h1>Payouts</h1><span class="clear"></span>
    <div class="panel bla">
        <form action="payouts.php" method="GET">
            <input type="hidden" name="search[s]" value="1">
            <input type="hidden" name="search[common]" value="">
            <table border="0" cellpadding="0" cellspacing="0" class="table4 mob_table revenue_table">
                <thead>
                <tr>
                    <td>Project</td>
                    <td>Month from</td>
                    <td>Month to</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="application">
                    <select name="search[id]">
                        <?php echo reportSearchOptions(); ?>
                    </select>
                    </td>
                    <td class="month_from">
                    <select name="search[date_from_Month]">
                        <?php echo getMonthOptions('date_from_Month'); ?>
                    </select>
                        <select name="search[date_from_Year]">
                            <?php echo getYearOptions('date_from_Year');?>
                        </select></td>
                    <td class="month_to">
                        <select name="search[date_to_Month]">
                            <?php echo getMonthOptions('date_to_Month'); ?>
                    </select>
                        <select name="search[date_to_Year]">
                            <?php echo getYearOptions('date_to_Year'); ?>
                        </select></td>
                    <td class="last_with_button"><input type="submit" value="Get Report" class="but"></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </form>
        <br><strong>This report shows Net Revenues earned each month and their payout schedule. <a
            href="https://api.paymentwall.com//developers/reports/payout-new/?ts=0">New Payout Report</a></strong></div>
    <div class="box3 underpanel" id="detailedtable">
        <div id="simple" style="display: block; padding:20px 0 30px 0;">
            <a class="but_link" href="#" id="simpleButton">Display detailed report</a>
        </div>
        <div>
            <table class="table1 sorting">
                <tbody>
                <tr>
                    <th class="topth" rowspan="2">Month</th>
                    <th class="topth" colspan="6">Money you are getting paid</th>
                </tr>
                <tr>
                    <th>Total Net Revenues</th>
                    <th>Estimated payout
                        <a class="addToolTip question" href="#"
                         tooltiptext="In many cases we can not pay all the amount for current month due to significant payout delays of some of the payment systems. We transfer money to you as soon as we collect them from payment system.">?</a>
                    </th>
                </tr>
                <tr>
                    <td align="right">December, 2016</td>
                    <td align="center">$221,933.67 <br></td>
                    <td class="pending nice_td">$65.58 <br></td>
                </tr>
                <tr>
                    <td align="right">February, 2017</td>
                    <td align="center"> -</td>
                    <td class="pending nice_td">$221,933.67 <br></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="display: none;" id="details">
        <div class="" style="position:relative;">
            <div id="deatil_but" style="display:none; margin: 30px 0 20px 0;">
                <a class="but_link" id="detailsButton" href="#">Display simple report</a></div>
            <div class=" box3 underpanel" style="padding-top: 10px;">
                <table cellpadding="0" cellspacing="0" border="0" class="table1">
                    <tbody>
                    <tr>
                        <th rowspan="2">Month</th>
                        <th rowspan="2">Total Net Revenues</th>
                        <th style="padding-bottom:0px;" colspan="3">Payout Schedule</th>
                    </tr>
                    <tr>
                        <th>Net 30</th>
                        <th>Net 60</th>
                        <th>Net 90</th>
                    </tr>
                    <tr>
                        <td valign="top" align="right" id="elem1" class="payoutHighlight"><strong>December,
                            2016</strong></td>
                        <td valign="top">$221,933.67</td>
                        <td id="net301" valign="top">$221,933.67</td>
                        <td id="net601" valign="top" align="center">-</td>
                        <td id="net901" valign="top" align="center">-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <script>var highlightConfig = [-2, -2, -2, -3, -4];
            function hilightMonth(num) {
                var elem = $('elem' + num);
                var net0 = $('net0' + (num + highlightConfig[0]));
                var net15 = $('net15' + (num + highlightConfig[1]));
                var net30 = $('net30' + (num + highlightConfig[2]));
                var net60 = $('net60' + (num + highlightConfig[3]));
                var net90 = $('net90' + (num + highlightConfig[4]));

                if (elem) {
                    elem.addClassName('highlight');
                }
                if (net0) {
                    net0.addClassName('highlight');
                }
                if (net15) {
                    net15.addClassName('highlight');
                }
                if (net30) {
                    net30.addClassName('highlight');
                }
                if (net60) {
                    net60.addClassName('highlight');
                }
                if (net90) {
                    net90.addClassName('highlight');
                }
            }
            function stopHilightMonth(num) {
                var elem = $('elem' + num);
                var net0 = $('net0' + (num + highlightConfig[0]));
                var net15 = $('net15' + (num + highlightConfig[1]));
                var net30 = $('net30' + (num + highlightConfig[2]));
                var net60 = $('net60' + (num + highlightConfig[3]));
                var net90 = $('net90' + (num + highlightConfig[4]));

                if (elem) {
                    elem.removeClassName('highlight');
                }
                if (net0) {
                    net0.removeClassName('highlight');
                }
                if (net15) {
                    net15.removeClassName('highlight');
                }
                if (net30) {
                    net30.removeClassName('highlight');
                }
                if (net60) {
                    net60.removeClassName('highlight');
                }
                if (net90) {
                    net90.removeClassName('highlight');
                }
            }
            </script>
            <br>
            <div class="left box3" style="margin-right:30px;"><h2 class="scheduled">Estimated payout</h2>
                <table class="table1 sorting" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <th>Payout date</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td align="right">12/01/2016</td>
                        <td align="right" class="nice_td">$65.58<br></td>
                    </tr>
                    <tr>
                        <td align="right">02/01/2017</td>
                        <td align="right" class="nice_td">$221,933.67<br></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="adjustments_popup" style="display:none;">
                <div class="fade"></div>
                <div class="popup popup2" id="adjustments_popup_in" style="width:600px;">

                </div>
            </div>

            <script type="text/javascript">

                function openAdjustmentPopup(time, dateStr) {
                    var url = '/developers/reports/payout-new-adjustments?id=' + 202467 + '&date=' + time;

                    new Ajax.Request(url, {
                        method: 'get',
                        onSuccess: function (transport) {
                            var response = transport.responseText.evalJSON();
                            if (response.result == 1) {
                                $('adjustments_popup_in').innerHTML = response.data;

                                $('adjustments_popup').show();
                                $('adjustments_popup_in').scrollTo();
                            }
                        }
                    });

                }

            </script>
        </div>
    </div>
    <script>
        function toggleReports() {
            $('simple').toggle();
            $('details').toggle();
            $('deatil_but').toggle();
            $('detailedtable').toggle();
        }

        if ($('detailsButton')) {
            $('detailsButton').observe('click', function (e) {
                e.stop();
                toggleReports();
            });
        }

        if ($('simpleButton')) {
            $('simpleButton').observe('click', function (e) {
                e.stop();
                toggleReports();
            });
        }
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
    <div id="theToolTip" style="left: -1000px; top: 403px; display: none;">In many cases we can not pay all the amount
        for current month due to significant payout delays of some of the payment systems. We transfer money to you as
        soon as we collect them from payment system.
    </div>
    <img id="ToolTipPointer" src="../resource/tip_bg1.gif" style="left: 386px; top: 395px; display: none;">
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