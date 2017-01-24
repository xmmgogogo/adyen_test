<?php
/**
 * 基础订单查询页面
 * 2017-1-6 mm
 */

include "common.php";
$common = new common();

//分页
$pageFromNumber = 1;
if(isset($_REQUEST['pageNumber'])) {
    $pageFromNumber = intval($_REQUEST['pageNumber']);
}

//判断是否有分页
$isPageNext = false;
$curPage = $pageFromNumber;
//总页数
$totalOrderNum = $common->countOrderList();
if($totalOrderNum > $common->returnPageNum() * $pageFromNumber) {
    $isPageNext = $pageFromNumber + 1;
}

?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Payment List</title>
</head>
<link rel="shortcut icon" href="./ca/img/adyen/favicon.ico" type="image/ico"/>
<link rel="stylesheet" type="text/css" href="./ca/css/adyen/style.css" />
<link rel="stylesheet" type="text/css" href="./ca/css/csr/csr.css" />
<link rel="stylesheet" type="text/css" href="./ca/css/csr/grid.css" />
<link rel="stylesheet" type="text/css" href="./ca/css/font.css"/>
<link rel="stylesheet" type="text/css" href="./ca/css/grid.css" />
<link rel="stylesheet" href="./ca/css/topnavigation.css" type="text/css" />
<link rel="stylesheet" href="./ca/css/fontastic/styles.css" type="text/css" />

<script src="./ca/js/ps.pack.js" type="text/javascript"></script>
<script src="./ca/js/jquery.pack.js" type="text/javascript"></script>
<script src="./ca/js/adyen/adyen.pack.js" type="text/javascript" ></script>

<body class="no-menu backlink ca-ft-globalsearch" style="font-family:'Open Sans',sans-serif;font-size:14px;font-weight:300;margin:0;padding:0;line-height:20px;">

<style type="text/css">
    .ca-get-feedback,
    .ca-get-feedback * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .ca-get-feedback {
        position: fixed;
        bottom: 15px;
        left: 15px;
        z-index: 1000001;
    }

    .ca-get-feedback__button {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        padding: 10px 20px;

        background: #4c4c4c;
        color: #ffffff;
        cursor: pointer;
        line-height: 20px;
    }

    .ca-get-feedback__button .icon-commenting {
        font-size: 18px;
    }

    .ca-get-feedback__button-text {
        display: none;
        margin-left: 5px;
    }

    .ca-get-feedback__button:hover .ca-get-feedback__button-text {
        position: relative;
        top: -3px;

        display: inline-block;
    }

    .ca-get-feedback__form-container {
        position: absolute;
        top: -210px;

        border: 1px solid #cfcfcf;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        height: 200px;
        padding: 25px 20px 15px 20px;
        width: 390px;

        background: #ffffff;
    }

    .ca-get-feedback__form {
        position: relative;

        height: 100%;
    }

    .ca-get-feedback__form .icon-times-circle {
        position: absolute;
        top: -12.5px;
        right: -12.5px;

        color: #4c4c4c;
        cursor: pointer;
        font-size: 16px;
    }

    .ca-get-feedback__form .csr-button-2.submit,
    .ca-get-feedback__form .csr-button-2.next {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .ca-get-feedback__form .csr-button-2.previous {
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .ca-get-feedback__form .csr-label-2 {
        font-size: 14px;
        padding: 0;
        width: 100%;
    }

    .ca-get-feedback__comments .csr-textarea-2 {
        margin-top: 10px;
        width: 100%;
    }

    .ca-get-feedback__comments-email {
        font-size: 11px;
    }

    .ca-get-feedback__rating .rating-list {
        border-left: 1px solid #4c4c4c;
        margin: 20px 0 0 0;
        padding: 0;

        list-style: none;
    }

    .ca-get-feedback__rating .rating-list li {
        border: 1px solid #4c4c4c;
        border-left: 0;
        float: left;
        width: 10%;

        cursor: pointer;
        line-height: 30px;
        list-style-type: none;
        text-align: center;
    }

    .ca-get-feedback__rating .rating-list li:hover {
        background: #eeeeee;
    }

    .ca-get-feedback__rating .rating-list li.active {
        background: #024d63;
        color: #ffffff;
    }

    .util-hidden {
        display: none;
    }

</style>

<div id="ca-topbar">
    <div class="iefillerdiv"></div>
</div>
<div id="ca-middlebarcontainer">
    <div id="ca-middlebar">
        <a href="#">
            <img id="ca-mainlogo" style="height: 55px" src="https://ca-test.adyen.com/ca/css/csr/images/adyen-logo.condensed.hr.png" alt="Logo" />
        </a>
        <img id="maintagline" src="https://ca-test.adyen.com/ca/img/adyen_tagline.png" alt="Wherever people pay" />
    </div>
</div>
<div id="ca-bottombar"><div id="ca-bottombar2"></div></div>

<div id="ca-maincontent">
    <div id="ca-boxleft">
        <div id="menu">
            <ul class="nav">
                <li ><a href="#">Home</a></li>
                <li   class="activelink"  ><a href="showList.php">Payments</a></li>
                <!--
                <li ><a href="/ca/ca/accounts/choose.shtml">Accounts</a></li>
                <li ><a href="/ca/ca/reports/dashboard.shtml">Reports</a></li>
                <li ><a href="/ca/ca/disputes/showList.shtml">Disputes</a></li>
                <li ><a href="/ca/ca/skin/skins.shtml">Skins</a></li>
                <li ><a href="/ca/ca/config/choose.shtml">Settings</a></li>
                <li ><a href="/ca/ca/risk/choose.shtml">RevenueProtect</a></li>
                <li ><a href="/ca/ca/postfm/showposterminals.shtml?accountCode=FutureGame&amp;accountTypeCode=Company">Point-of-Sale</a></li>
                <li ><a href="/ca/ca/revenueaccelerate/overview.shtml">RevenueAccelerate</a></li>
                <li ><a href="/ca/ca/support/start.shtml">Support</a></li>
                -->
            </ul>
        </div>
    </div>
    <div id="contentbg">
    <div id="content">
        <div id="contentwrapper">

            <div id="subcontent">
                <h1 class="ca-pagetitle">Payment List</h1>
                <table class="data wide highlight csr-table csr-list-table csr-configurable-table">
                    <caption class="list-filter csr-list-filter">
                        <div class="csr-configuration-list util-float-left">
                            <a href="#" onclick="alert('暂无设置');">
                                <i class="icon-pencil"></i>
                                Manage configurations                </a>
                            | &nbsp;

                            <?php
                            if(!isset($_REQUEST['pos'])) {
                                echo '<strong>Default</strong> | &nbsp;<a href="showList_pos.php?pos">POS</a>';
                            } else {
                                echo '<a href="showList.php">Default</a> | &nbsp;<strong>POS</strong>';
                            }
                            ?>
                        </div>
                        <form method="get" action="showList.php">
                            <input  type="hidden" size="25" name="filterField" value="PspReferenceId" />
                            <span style="vertical-align: middle;  line-height: 2em; font-size: 0.9em">
                Page <?php echo $curPage;?>
                                <?php
                                if($isPageNext) {
                                    echo '<a style="padding:0 5px;" href="showList.php?pageNumber=' . $isPageNext . '"><i class="icon-caret-right"></i></a>';
                                }
                                ?>
                            <b> | </b>
            <a href="showList.php?clearFilter=true">
                clear all filters
                <i class="icon-filter csr-fcolor-red"></i>
            </a>
            <b> | </b>

                <!--<input id="spotlightsearchbox" type="text" size="25" name="query" placeholder="&lt;search for payments&gt;" />-->
                <input id="spotlightsearchbox" type="text" size="25" name="filterValue" placeholder="&lt;search for payments&gt;" />
                <button type="submit" class="csr-icon-button csr-button">
                    <i class="icon-search"></i>
                </button>
                        <b> | </b>
            <?php
            if(!isset($_REQUEST['pos'])) {
                echo '<a href="export_csv.php?' . $_SERVER['QUERY_STRING'] . '" title="maximum of 1000 records">';
            } else {
                echo '<a href="export_csv.php?pos&' . $_SERVER['QUERY_STRING'] . ' title="maximum of 1000 records">';
            }
            ?>
                download as CSV
                <i class="icon-file-o"></i>
            </a>
                </span></form>
                    </caption>
                    <thead>
                    <tr>
                        <th>
                            psp reference
                        </th>
                        <th>merchant reference</th>
                        <th>account</th>
                        <th title="">
                            <a href="showList.php?sortDirection=<?php echo isset($_REQUEST['sortDirection']) && $_REQUEST['sortDirection'] == 'asc' ? 'desc' : 'asc'; ?>">
                                <i class="icon-sort-asc" style="vertical-align: sub;"></i>
                            </a>
                            date
                            <a href="filterDate.php">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th colspan="2">amount</th>
                        <th>method
                            <a data-dialog="true" href="#" onclick="openMethodPro()">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th>status
                            <a data-dialog="true" href="#" onclick="openStatusPro()">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th>fraud score
                            <a data-dialog="true" href="#">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                    </tr>

                    </thead>
                    <tbody id="paymentTable">
                    <?php

                    //基础字段设置
                    $where = 1;//直接写入
                    $parameters = array();
                    $orderBy = '';

                    if(isset($_REQUEST['filterField']) && $_REQUEST['filterField'] && $_REQUEST['filterValue']) {
                        if($_REQUEST['filterField'] == 'BookingDate') {
                            $where .= " and BookingDate >= :creationDate_l and BookingDate <= :creationDate_b";
                            $parameters = array('creationDate_l' => $_REQUEST['filterValue'], 'creationDate_b' => $_REQUEST['filterValue2']);
                        } else {
                            $where .= ' and ' . $_REQUEST['filterField'] . " = :name";
                            $parameters = array('name' => $_REQUEST['filterValue']);
                        }
                    }

                    //排序
                    if(isset($_REQUEST['sortDirection'])) {
                        $orderBy = ' order by BookingDate ' . $_REQUEST['sortDirection'];
                    }

                    //查询
                    $isEmpty = true;
                    $result = $common->getOrderList("select * from payment WHERE {$where}", $parameters, $orderBy, $pageFromNumber);

                    //先默认用LOW的方法，遍历实现
                    $filterResultTmp = $filterResult = array();
                    foreach($result as $row)
                    {
                        $filterResultTmp[$row['MerchantReferenceId']] = $row;
                    }

                    foreach($filterResultTmp as $row)
                    {
                        echo "<tr>";
                        //<a href="showTx.php?txType=Payment&pspReference=4714851753119565&accountKey=MerchantAccount.ShineZoneHK">
                        echo "<td><a href='showTx.php?txType=Payment&pspReference=" . $row['PspReferenceId'] . "&accountKey=MerchantAccount." . $row['MerchantAccount'] . "'>" . $row['PspReferenceId'] . "</a></td>";
                        echo "<td>" . $row['MerchantReferenceId'] . "</td>";
                        echo "<td>" . $row['CompanyAccount'] . "</td>";
                        echo "<td>" . $row['BookingDate'] . "</td>";
                        echo "<td colspan=\"2\">" . $row['MainAmount'] . "</td>";
                        echo "<td>" . $row['PaymentMethod'] . "</td>";
                        echo "<td>" . $row['RecordType'] . "</td>";
                        echo "<td>0</td>";
                        echo "</tr>";

                        global $isEmpty;
                        $isEmpty = false;
                    }
                    ?>

                    </tbody>
                </table>

                <!--分页代码-->
                <div class="paging footer-paging">
                    Page <?php echo $curPage;?>
                    <?php
                    if($isPageNext) {
                        echo '<a style="padding:0 5px;" href="showList.php?pageNumber=' . $isPageNext . '"><i class="icon-caret-right"></i></a>';
                    }
                    ?>
                </div>

                <?php
                if($isEmpty) {
                    echo "<p><b>No payments found for this account and the current filter settings.</b></p>";
                }
                ?>
            </div>

            <div class="bbarl">
                <div class="bbarr">
                    <div class="bbar">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<div id="dialog-overlay" data-rel-hide="true" style="display: none;"></div>

<div id="dialog-status" style="display: none;">
    <div id="dialog" class="dialog csr-dialog" style="display: block; top: 52px;">
        <div class="dialog-content"><div id="content">
                <div id="contentwrapper">
                    <div id="subcontent">
                        <h1 class="ca-pagetitle">Set a Filter on Payment Status</h1>
                        <p style="width: 450px">Select the status of the payments you want to display. Setting this filter limits the search results to one month.</p>
                        <div>
                            <form method="get" action="showList.php">
                                <select name="filterValue">
                                    <option value=""></option>
                                    <option value="Authorised">Authorised</option>
                                    <option value="AuthorisedPending">AuthorisedPending</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Refused">Refused</option>
                                    <option value="RefusedPayout">RefusedPayout</option>
                                    <option value="SentForSettle">SentForSettle</option>
                                    <option value="Settled">Settled</option>
                                    <option value="SettledInstallment">SettledInstallment</option>
                                    <option value="SettledInInstallments">SettledInInstallments</option>
                                    <option value="SettledBulk">SettledBulk</option>
                                    <option value="SettledExternally">SettledExternally</option>
                                    <option value="SettledExternallyWithInfo">SettledExternallyWithInfo</option>
                                    <option value="CaptureFailed">CaptureFailed</option>
                                    <option value="SentForRefund">SentForRefund</option>
                                    <option value="RefundAuthorised">RefundAuthorised</option>
                                    <option value="Refunded">Refunded</option>
                                    <option value="RefundedInstallment">RefundedInstallment</option>
                                    <option value="RefundedInInstallments">RefundedInInstallments</option>
                                    <option value="RefundedBulk">RefundedBulk</option>
                                    <option value="RefundedExternally">RefundedExternally</option>
                                    <option value="RefundedExternallyWithInfo">RefundedExternallyWithInfo</option>
                                    <option value="RefundedReversed">RefundedReversed</option>
                                    <option value="RefundFailed">RefundFailed</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Chargeback">Chargeback</option>
                                    <option value="ChargebackExternally">ChargebackExternally</option>
                                    <option value="ChargebackExternallyWithInfo">ChargebackExternallyWithInfo</option>
                                    <option value="ChargebackReversed">ChargebackReversed</option>
                                    <option value="ChargebackReversedExternallyWithInfo">ChargebackReversedExternallyWithInfo</option>
                                    <option value="SentForPayout">SentForPayout</option>
                                    <option value="PayoutAuthorised">PayoutAuthorised</option>
                                    <option value="PayoutError">PayoutError</option>
                                    <option value="PayoutFailed">PayoutFailed</option>
                                    <option value="PaidOut">PaidOut</option>
                                    <option value="PaidOutExternally">PaidOutExternally</option>
                                    <option value="PaidOutExternallyWithInfo">PaidOutExternallyWithInfo</option>
                                    <option value="PaidOutReversed">PaidOutReversed</option>
                                    <option value="Received">Received</option>
                                    <option value="ReceivedPayout">ReceivedPayout</option>
                                    <option value="HandledExternally">HandledExternally</option>
                                    <option value="Error">Error</option>
                                </select>
                                <input type="hidden" name="filterField" value="status">
                                <br><br>
                                <input class="csr-button csr-submit-button" type="submit" value="Submit">
                            </form>
                        </div>

                        <p style="width: 450px">
                            Entering the blank status clears the filter.		</p>

                    </div>

                    <div class="bbarl">
                        <div class="bbarr">
                            <div class="bbar">
                            </div>
                        </div>
                    </div>
                </div>


                <script type="text/javascript">
                    require( [ 'util/Analytics' ], function ( A ) {
                        A.pageView( {label: document.title, url: document.location.pathname, user_level: 'C'} );
                    } );
                </script>

            </div>
        </div>
        <div style="position: absolute; right: 10px; top: 5px; cursor: pointer; z-index: 9999;" onclick="closeStatusPro()">×</div>
    </div>
</div>

<div id="dialog-method" style="display: none;">
    <div id="dialog" class="dialog csr-dialog" style="display: block; top: 52px;">
        <div class="dialog-content">
            <div id="content">
                <div id="contentwrapper">
                    <div id="subcontent">
                        <h1 class="ca-pagetitle">Set a Filter on Payment Details</h1>
                        <h3>Set a Filter on Card/Account number</h3>
                        <p style="width: 450px">By entering a card number or account number and selecting the type of payment, you can retrieve only the payments which where made using this card or account.</p>
                        <div>
                            <form method="get" action="showList.php" autocomplete="off">
                                <input type="text" name="filterValue" size="40" autocomplete="nope">
                                <select name="filterValue2">
                                    <option value="creditcard">Credit Card</option>
                                    <option value="ideal">iDeal</option>
                                    <option value="elv">ELV</option>
                                </select>
                                <input type="hidden" name="filterField" value="pan">
                                <br><br>
                                <input class="csr-button csr-submit-button" type="submit" value="Submit">
                            </form>
                        </div>
                        <p style="width: 450px">
                            Entering the blank search term clears the filter.	</p>
                        <h3>Set a Filter on Payment Method</h3>
                        <p style="width: 450px">Select the payment method of the payments you want to display.</p>
                        <div>
                            <form method="get" action="showList.php">
                                <select name="filterValue">
                                    <option value=""></option>
                                    <option value="amex" style="background-image: url('/ca/img/pm/amex_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> amex</option>
                                    <option value="bankTransfer_IBAN" style="background-image: url('/ca/img/pm/bankTransfer_IBAN_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> bankTransfer_IBAN</option>
                                    <option value="bcmc" style="background-image: url('/ca/img/pm/bcmc_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> bcmc</option>
                                    <option value="diners" style="background-image: url('/ca/img/pm/diners_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> diners</option>
                                    <option value="directEbanking" style="background-image: url('/ca/img/pm/directEbanking_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> directEbanking</option>
                                    <option value="discover" style="background-image: url('/ca/img/pm/discover_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> discover</option>
                                    <option value="dotpay" style="background-image: url('/ca/img/pm/dotpay_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> dotpay</option>
                                    <option value="ebanking_FI" style="background-image: url('/ca/img/pm/ebanking_FI_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> ebanking_FI</option>
                                    <option value="giropay" style="background-image: url('/ca/img/pm/giropay_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> giropay</option>
                                    <option value="ideal" style="background-image: url('/ca/img/pm/ideal_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> ideal</option>
                                    <option value="maestro" style="background-image: url('/ca/img/pm/maestro_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> maestro</option>
                                    <option value="mc" style="background-image: url('/ca/img/pm/mc_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> mc</option>
                                    <option value="sepadirectdebit" style="background-image: url('/ca/img/pm/sepadirectdebit_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> sepadirectdebit</option>
                                    <option value="visa" style="background-image: url('/ca/img/pm/visa_tiny.png'); background-repeat: no-repeat; padding-left: 30px; padding-top: 1px; height: 13px;"> visa</option>
                                </select>
                                <input type="hidden" name="filterField" value="paymentMethod">
                                <br><br>
                                <input class="csr-button csr-submit-button" type="submit" value="Submit">
                            </form>
                        </div>
                        <p style="width: 450px">
                            Entering the blank payment method clears the filter.	</p>
                    </div>

                    <div class="bbarl">
                        <div class="bbarr">
                            <div class="bbar">
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    require( [ 'util/Analytics' ], function ( A ) {
                        A.pageView( {label: document.title, url: document.location.pathname, user_level: 'C'} );
                    } );
                </script>

            </div>
        </div>
        <div style="position: absolute; right: 10px; top: 5px; cursor: pointer; z-index: 9999;" onclick="closeMethodPro()">×</div>
    </div>
</div>

<script type="text/javascript">
    /******method*******/
    function openMethodPro() {
        document.getElementById('dialog-overlay').style.display = 'block';
        document.getElementById('dialog-method').style.display = 'block';
        document.getElementById('dialog-status').style.display = 'none';
    }

    function closeMethodPro() {
        document.getElementById('dialog-overlay').style.display = 'none';
        document.getElementById('dialog-method').style.display = 'none';
    }

    /******status*******/
    function openStatusPro() {
        document.getElementById('dialog-overlay').style.display = 'block';
        document.getElementById('dialog-status').style.display = 'block';
        document.getElementById('dialog-method').style.display = 'none';
    }

    function closeStatusPro() {
        document.getElementById('dialog-overlay').style.display = 'none';
        document.getElementById('dialog-status').style.display = 'none';
    }
</script>
</body>
</html>

