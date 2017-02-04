<?php
include "common.php";
$common = new common();

//日期
$week = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];

$nowD = date('w');

//计算之前几天数据
$result = $day = $result2 = [];
for($i = 1; $i <= 14; $i++) {
    $del = 0 - $i;
    $key = date('w', strtotime($del . 'day'));
    $result[] = array_sum($common->getRecentListByDate($del));
    $day[] = $week[$key];
    $result2[] = [array_sum($common->getRecentListByDate($del)), $week[$key]];
}

krsort($result2);
//$common->dump($result2);

//最大值
$maxResult = max($result);

//计算最近几天记录
$getRecentListOrderByDate = $common->getRecentListOrderByDate();
//var_dump($getRecentListOrderByDate);

//计算昨天比上周同期提升多少
$lastDay = isset($result[12]) ? $result[12] : '';
$lastOldDay = isset($result[5]) ? $result[5] : '';
$mcaPayoutValue = sprintf('%.2f', ($lastDay - $lastOldDay) * 100 / $lastOldDay);
if($mcaPayoutValue > 0) {
    $mcaPayoutValue = "+" . $mcaPayoutValue;
}
?>
<html class="csr csr-t-adyen"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Mobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="./ca/css/mobile.css"/>
</head>

<body class="crc csr-page csr-mobile-page csr-menu-page">
<div class="csr-full-page-content"><div class="csr-full-page-content">
        <header class="mca-header">
            <div class="mca-header-top">
                <div class="mca-account-type">
                    Company account
                </div>
            </div>

            <div class="mca-accounts">
                <h1>
                    <a href="#">
                        ShineZoneHK
                    </a>
                </h1>

                <div>
                    <a class="mca-link mca-active" href="#">
                        •
                    </a>
                </div>
            </div>

            <div class="mca-widgets mca-hide-when-menu mca-widgets-Company">
                <div class="mca-widget-tile mca-authorisation-chart">
                    <div class="mca-widget-tile-content">
                        <div class="mca-vertical-bar-chart" style="height:100px;">
                            <?php
                            $i = 0;
                                foreach($result2 as $key => $value) {
                                    $height = $maxResult ? intval($value[0] / $maxResult * 100) : 0;
                                    echo '<div class="mca-vertical-bar mca-last-week" style="left: ' . $i . '%;height:' . $height . '%" title="' . $value[0] . '">
                                    <span class="mca-bar-label">' . $value[1] . '</span>
                                    </div>';
                                    $i += 7;
                                }

                            echo '<div class="mca-last-tx-count" style="height:100%"><span>' . $maxResult . '</span></div>';
                            ?>
                        </div>
                    </div>
                    <div class="mca-widget-label">Authorisation per day</div>
                </div>

                <div class="mca-widget-tile mca-expected-payout-tile">
                    <div class="mca-widget-tile-content">
                        <div class="mca-payout-value" style="clear:right">
                            <span class="ca-currency-sign">$</span>
                            <span>2270011.75</span>
                        </div>

                    </div>
                    <div class="mca-widget-label">
                        Total expected payout
                    </div>
                </div>

                <div class="mca-widget-tile mca-authrate-tile">
                    <div class="mca-widget-tile-content mca-tile-with-chart-and-value">
                        <div class="mca-payout-value">
                            <?php echo $mcaPayoutValue; ?>%
                        </div>
                    </div>

                    <div class="mca-widget-label">
                        <?php
                            echo "Auths on " . date('j M', time()) ." vs " . date('j M', strtotime('-7 days')) ."";
                        ?>
                    </div>
                </div>
                <div class="csr-clear"></div>
            </div>
        </header>

        <div class="csr-content">
            <nav class="mca-tabbed-navigation">
                <ol class="mca-navigation">
                    <li class="mca-active">
                        <a href="#" rev="async">
                            Payment list
                        </a>
                    </li>
                    <li>
                        <a href="#" rev="async">
                            Notifications
                        </a>
                    </li>
                </ol>
            </nav>
            <div class="csr-page-content mca-hide-when-menu">
                <div>
                    <div class="csr-page-content mca-hide-when-menu">
                        <div>
                            <div class="ca-mobile-paymentlist">
                                <ol class="iArrow">
                                    <?php
                                    foreach($getRecentListOrderByDate as $key => $value)
                                    echo <<<EOF
                        <li class="mca-payment">
                                        <div class="mca-payment-logo">
                                            <img src="reports/img/pm/{$value['paymentMethod']}.png" title="{$value['paymentMethod']}" alt="{$value['paymentMethod']}">
                                        </div>
                                        <div class="mca-payment-info">
                                            <div class="mca-payment-status">{$value['RecordType']}</div>
                                            <div>
                                                <span class="mca-payment-date">{$value['BookingDate']}</span>
                                                <span class="mca-payment-merchant">{$value['paymentMethod']}</span>
                                            </div>
                                        </div>
                                        <div class="mca-payment-amount">
                                <span class="mca-payment-amount-quantity">
                                {$value['MainAmount']}
                                </span>
                                <span class="mca-payment-amount-unit">
                                    {$value['MainCurrency']}
                                </span>
                                        </div>
                                    </li>
EOF;
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
    </div></div></body></html>
