<?php
include "config.php";
?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<link rel="shortcut icon" href="./ca/img/adyen/favicon.ico" type="image/ico"/>
<link rel="stylesheet" type="text/css" href="./ca/css/adyen/style.css?e057" />
<link rel="stylesheet" type="text/css" href="./ca/css/csr/csr.css?e057" />
<link rel="stylesheet" type="text/css" href="./ca/css/csr/grid.css?e057" />
<link rel="stylesheet" type="text/css" href="./ca/css/font.css?e057"/>
<link rel="stylesheet" type="text/css" href="./ca/css/grid.css?e057" />
<link rel="stylesheet" href="./ca/css/topnavigation.css?e057" type="text/css" />
<link rel="stylesheet" href="./ca/css/fontastic/styles.css?e057" type="text/css" />
<body class="no-menu backlink ca-ft-globalsearch">

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
        <a href="/ca/ca/overview/default.shtml">
            <img id="ca-mainlogo" style="height: 55px" src="https://ca-test.adyen.com/ca/css/csr/images/adyen-logo.condensed.hr.png?e057" alt="Logo" />
        </a>
        <img id="maintagline" src="https://ca-test.adyen.com/ca/img/adyen_tagline.png?e057" alt="Wherever people pay" />
    </div>
</div>
<div id="ca-bottombar"><div id="ca-bottombar2"></div></div>

<div id="ca-maincontent">
    <div id="ca-boxleft">
        <div id="menu">
            <ul class="nav">
                <li ><a href="#">Home</a></li>
                <li   class="activelink"  ><a href="showList_test.php">Payments</a></li>
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
                            <a href="/ca/ca/payments/configurations.shtml">
                                <i class="icon-pencil"></i>
                                Manage configurations                </a>
                            | &nbsp;
                            <strong>Default</strong>
                            | &nbsp;
                            <a href="/ca/ca/payments/setConfiguration.shtml?configurationId=2755">POS</a>
                        </div>
                        <form method="post" action="/ca/ca/payments/modifySearch.shtml?uxEvent=PAYMENT_LIST_SEARCH"><span style="vertical-align: middle;  line-height: 2em; font-size: 0.9em">
            <input type="hidden" name="formHash" value="145fSCuiO+yd58kZApByiEQKoj8ivw=" />
				Page 1
							<b> | </b>
			<a href="/ca/ca/payments/showList.shtml?clearFilter=true">
                clear all filters
                <i class="icon-filter csr-fcolor-red"></i>
            </a>
			<b> | </b>

				<input id="spotlightsearchbox" type="text" size="25" name="query" placeholder="&lt;search for payments&gt;" />
				<button type="submit" class="csr-icon-button csr-button">
                    <i class="icon-search"></i>
                </button>
						<b> | </b>
			<a href="export_csv.php" title="maximum of 1000 records">
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
                            <a href="/ca/ca/payments/modifyFilter.shtml?sortDirection=asc">
                                <i class="icon-sort-asc" style="vertical-align: sub;"></i>
                            </a>
                            date
                            <a href="/ca/ca/payments/filterDate.shtml?resourceKeyPrefix=creationDate&amp;displayWildcard=false&amp;filterField=creationDate"
                            >
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th colspan="2">amount</th>
                        <th>method
                            <a data-dialog="true" href="/ca/ca/payments/filterPMDetails.shtml?filterField=paymentDetails">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th>status
                            <a data-dialog="true" href="/ca/ca/payments/filterDropdown.shtml?resourceKeyPrefix=paymentStatus&amp;displayWildcard=false&amp;filterField=status">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                        <th>fraud score
                            <a data-dialog="true" href="/ca/ca/payments/filterFraud.shtml?resourceKeyPrefix=fraud&amp;displayWildcard=false&amp;filterField=fraud">
                                <i class="icon-filter "></i>
                            </a>
                        </th>
                    </tr>

                    </thead>
                    <tbody id="paymentTable">
                    <?php
                    //查询
                    $result = mysqli_query($conn, "select * from payment");
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['PSP Reference'] . "</td>";
                        echo "<td>" . $row['Merchant Reference'] . "</td>";
                        echo "<td>" . $row['Account'] . "</td>";
                        echo "<td>" . $row['Creation Date'] . "</td>";
                        echo "<td>" . $row['Value'] . "</td>";
                        echo "<td>" . $row['Payment Method'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['Fraud Scoring'] . "</td>";
                        echo "</tr>";
                    }

                    ?>

                    </tbody>

                </table>
                <p>
                    <!--<b>No payments found for this account and the current filter settings.</b>-->
                </p>
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
</body>
</html>

