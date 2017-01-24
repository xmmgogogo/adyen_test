<?php
/**
 * 详情订单查询页面
 * 2017-1-6 mm
 */

include "common.php";
$common = new common();

if(isset($_REQUEST['pspReference']) && isset($_REQUEST['accountKey'])) {
    //accountKey=MerchantAccount.MiGameHK
    list(, $MerchantAccount) = explode('.', $_REQUEST['accountKey']);
    $result = $common->getOrderListByCondition(['PspReferenceId' => $_REQUEST['pspReference'], 'MerchantAccount' => $MerchantAccount]);

    $detailResult = [];
    foreach($result as $info) {
        $detailResult = $info;
    }
    if(!$detailResult) {
        die('no pspReference!');
    }
} else {
    die('no pspReference!');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-false ajax- csr-level-2" data-csr-level="2">
<head>
    <title>Payments - Adyen PSP System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta content="TRUE" name="MSSmartTagsPreventParsing" />

    <link rel="shortcut icon" href="ca/img/adyen/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="ca/css/adyen/style.css?9326" />
    <link rel="stylesheet" type="text/css" href="ca/css/csr/csr.css?9326" />
    <link rel="stylesheet" type="text/css" href="ca/css/csr/grid.css?9326" />
    <link rel="stylesheet" type="text/css" href="ca/css/font.css?9326"/>
    <link rel="stylesheet" type="text/css" href="ca/css/grid.css?9326" />

    <link href="ca/css/csr/grid.css?9326" type="text/css" rel="stylesheet" />
    <link href="ca/js/chart/charts/timeline/css/timeline_v2.css?9326" type="text/css" rel="stylesheet" />
    <link href="ca/js/chart/chartlib/css/modules.css?9326" type="text/css" rel="stylesheet" />

    <script type="text/javascript">
        (function(console) {
            function printMe() {
                if(console && console.warn) {
                    console.warn("%c [JSS-SX01] This is a browser feature intended for developers.\n\t\t\tIf someone has requested you to copy-paste something in here,\n\t\t\tthey might be trying to hack or scam you.", "color:red;font-size:2em");
                } else {
                    setTimeout(printMe, 500);
                }
            }
            printMe();
        }(window.console));
        (function(w) {
            try {var c = console; Object.defineProperty(w, "console", {get: function() { if(c._commandLineAPI) {throw "[JSS-SX02] Sorry, the script console is deactivated";} return c;},set: function(nc) {c = nc;}});} catch (ignore) {}})(window);
        adyen = window.adyen = window.adyen || {};
        adyen.base = adyen.base || "ca/";
        adyen.jsbase = adyen.jsbase || "ca/js";
        adyen.imgbase = adyen.imgbase || "ca/img";
        adyen.cssbase = adyen.cssbase || "ca/css";
        adyen.currentAccountType = adyen.currentAccountType || "Company";
        adyen.tz = adyen.tz || {};
        adyen.tz.amsterdamOffset = 3600000;
        adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
        adyen.config = adyen.config || {};
        adyen.config.bookmarksUrl = "ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
        adyen.config.bookmarksUrlWithVolumes = "ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

        adyen.config.navToDefault = "ca/ca/accounts/choose.shtml";
        adyen.config.navToPsp = "ca/ca/payments/showList.shtml";
        adyen.config.navToCompany = "ca/ca/payments/showList.shtml";
        adyen.config.navToMerchantAccount = "ca/ca/payments/showList.shtml";

        adyen.searchmodes= [
            {
                description: "Payment Search",
                type: "Payments",
                action: "ca/ca/payments/modifySearch.shtml?uxEvent=PAYMENT_POWER_SEARCH",
                hint: "payment",
                hotKey: "p"
            }
            , {
                description: "Bank Reference Search",
                type : "Bank Reference",
                action: "ca/ca/payments/merchantSearchOffer.shtml?uxEvent=M_OFFER_POWER_SEARCH",
                hint: "bankReference",
                hotKey: "b"
            }
        ];
    </script>
    <!--[if lte IE 8]>
    <script type="text/javascript">
        document.createElement('section');
    </script>
    <![endif]-->

    <!--[if lte IE 8]><script src="ca/js/lib/json2.js"></script><![endif]-->
    <script src="ca/js/ps.pack.js?load=pluginspack&amp;9326" type="text/javascript"></script>
    <script src="ca/js/jquery.pack.js?9326" type="text/javascript"></script>
    <!--[if lte IE 8]>
    <script src="ca/js/charts.pack.ie.js?9326" type="text/javascript" ></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="ca/js/charts.pack.js?9326" type="text/javascript" ></script>
    <!--<![endif]-->
    <script src="ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>
</head>

<body class="no-menu ca-with-backlink ca-chart-page ca-ft-globalsearch">

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


<div class="ca-get-feedback">
    <div class="ca-get-feedback__button">
        <i class="icon-commenting"></i>
        <span class="ca-get-feedback__button-text">Feedback</span>
    </div>
    <div class="ca-get-feedback__form-container util-hidden">
        <form action="" class="ca-get-feedback__form">
            <i class="icon-times-circle close-form-js"></i>
            <input type="hidden" name="score" class="csr-input-2 util-hidden" value="-1"/>
            <div class="ca-get-feedback__comments ">
                <label class="csr-label-2">What feedback do you have for us about this page?</label>
                <div class="ca-get-feedback__comments-email">For support requests, please email <a href="mailto:support@adyen.com">support@adyen.com</a></div>
                <textarea name="comment" class="csr-textarea-2"></textarea>
                <button type="button" class="csr-button-2 primary submit">Submit</button>
            </div>
            <div class="ca-get-feedback__thankyou util-hidden">
                Thank you for sharing your experiences.<br/>
                This window will close automatically in 5 seconds.            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    require( [ 'jquery', 'Constants', 'util/Ajax' ], function ( jq, Constants, Ajax ) {

        var form = jq( '.ca-get-feedback__form' ),
            button = jq( '.ca-get-feedback__button' ),
            formContainer = jq( '.ca-get-feedback__form-container' ),
            closeForm = jq( '.close-form-js' ),
            classHidden = 'util-hidden',
            classActive = 'active',
            ratingListItem = jq( '.rating-list li' ),
            ratingListItemCheckbox = ratingListItem.find( '.csr-input-checkbox-2' ),
            commentsContainer = jq( '.ca-get-feedback__comments' ),
            commentsButtonPrevious = commentsContainer.find( '.csr-button-2.previous' ),
            ratingContainer = jq( '.ca-get-feedback__rating' ),
            ratingButtonNext = ratingContainer.find( '.csr-button-2.next' ),
            submitButton = form.find( '.csr-button-2.submit' ),
            thankyouContainer = jq( '.ca-get-feedback__thankyou' );

        button.on( 'click', function () {
            formContainer.toggleClass( classHidden );
        } );

        closeForm.on( 'click', function () {
            formContainer.addClass( classHidden );
        } );

        ratingListItem.on( 'click', function () {
            var checkbox = jq( this ).find( '.csr-input-checkbox-2' );

            ratingListItemCheckbox.prop( 'checked', false );
            ratingListItem.removeClass( classActive );
            jq( this ).addClass( classActive );
            checkbox.prop( 'checked', true );
        } );

        commentsButtonPrevious.on( 'click', function () {
            commentsContainer.hide();
            ratingContainer.show();
        } );

        ratingButtonNext.on( 'click', function () {
            ratingContainer.hide();
            commentsContainer.show();
        } );

        submitButton.on( 'click', function () {

            var data = {
                "formHash" : "292DSPaI52SrJuQmgFmqmXbU730LUY=",
                "pageUrl" : "ca/ca/accounts/showTx.shtml"
            };
            commentsContainer.hide();
            thankyouContainer.show();

            var formData = form.serializeArray();

            while (formData.length > 0) {
                var item = formData.shift();
                if (item.name === 'score' || item.name === 'comment') {
                    data[item.name] = item.value;
                }
            }

            if (data.comment && data.pageUrl) {
                Ajax.post( "ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
            }

            setTimeout( function () {
                formContainer.addClass( classHidden );
                thankyouContainer.hide();
                commentsContainer.show();

            }, 5000 );
        } );

    } );
</script>

<div id="ca-topbar">
    <div class="iefillerdiv"></div>
</div>
<div id="ca-middlebarcontainer">
    <div id="ca-middlebar">
        <a href="ca/ca/overview/default.shtml">
            <img id="ca-mainlogo" style="height: 55px" src="ca/css/csr/images/adyen-logo.condensed.hr.png?9326" alt="Logo" />
        </a>
        <img id="maintagline" src="ca/img/adyen_tagline.png?9326" alt="Wherever people pay" />
    </div>
</div>
<div id="ca-bottombar"><div id="ca-bottombar2"></div></div>


<script type="text/javascript">
    window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
</script>
<div class="session">
    <ul class="link-list">
        <li class="link-userprofile">
            <div class="user-profile-icons">
                <i class="icon-user"></i>
            </div>
            <ul class="link-list-submenu">
                <li class="user-profile-name">
                    <i class="icon-sort-asc"></i>
                    admin
                </li>
                <li>
                    <a class="icon" href="ca/ca/config/edituser.shtml?changeOwnCredentials=true"> <i class="icon-lock"></i> <span> User Account Details </span> </a>
                </li>
                <li class="link-logout">
                    <a class="icon" href="ca/logoff.shtml" title="Sign Out"> <i class="icon-sign-out"></i> <span>Sign out</span> </a>
                </li>
                <li class="version-reference">
                    <a class="icon" href="ca/ca/accounts/choose.shtml?chooseUserAccount=true"> <i class="icon-bookmark"></i><span>Bookmarks</span></a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<!--
<div id="power-search">
    <form action="#" class="power-search-container" method="post">
        <input type="hidden" name="formHash" value="817oV81kNs5TiK+pe94N+6uxDEq8IE=" />
        <div class="power-search-query">
            <input type="search" accesskey="q" name="query" class="ps-new-query csr-input-2" id="ps-query" />
                        <span class="when-opened">
                                    <input type="submit" class="csr-button-2 secondary ps-search-button" value="search" />
                            </span>
        </div>
        <div class="power-search-tools when-opened">
            <div class="power-search-types">
            </div>
        </div>
    </form>
    <div class="power-search-inactive">
        <div class="power-search-options"></div>
        <div class="xpower-search-hint"></div>
    </div>
    <div style="display:none" class="template">
        <script type="text/template" id="ps-searchtype">
            <div class="ps-searchoption" data-type="searchType">
                <select name="searchType" class="csr-selectbox-2">
                    <option selected="selected" value="accountNumber">Account number/IBAN</option>
                    <option value="branchCode">Bank/Branch code</option>
                    <option value="description">Description</option>
                </select>
            </div>
        </script>
        <script type="text/template" id="ps-accountTypeCompany">
            <input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="Company"/>
        </script>
        <script type="text/template" id="ps-accountTypeMerchantAccount">
            <input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="MerchantAccount"/>
        </script>
        <script type="text/template" id="ps-offersearchtype">
            <select name="searchType" class="csr-selectbox-2"><option selected="selected" value="pspref">Psp reference</option><option value="merchantref">Merchant reference / Description</option><option value="email">Shopper e-mail</option></select>
        </script>
        <script type="text/template" id="ps-offertxtype">
            <select name="txTypeCode" class="csr-selectbox-2">
                <option value="Offer">Offer</option>
                <option value="Order">Order</option>
                <option value="Payment">Payment</option>
                <option value="Capture">Capture</option>
                <option value="Dispute">Dispute</option>
                <option value="DisputeEvent">DisputeEvent</option>
                <option value="BankInstruction">BankInstruction</option>
                <option value="BankStatement">BankStatement</option>
                <option value="CompanyPayout">CompanyPayout</option>
                <option value="MerchantPayout">MerchantPayout</option>
                <option value="EpaLine">EpaLine</option>
            </select>
        </script>
    </div>
    <div class="power-search-suggestions auto_complete" id="ps-suggestions"></div>
</div>
<div id="ca-merchantlogo">
    <a href="ca/ca/accounts/manage.shtml"><img height="30" width="130" src="ca/ca/image.shtml?name=accountLogo&amp;mimeType=image%2Fpng&amp;cachingId=Company.ShineZone" alt="merchantlogo"/></a>
</div>
<div id="ca-notification-icon-dock">
</div>

<div class="csr-back" id="backlink">
    <a href="ca/ca/payments/showList.shtml" data-event="MAINNAVBACK">
        <i class="icon-chevron-left"></i>
        <span>Back</span>
    </a>
</div>

<div id="ca-accountnavigation" class="size-2" data-widget="ca/TopNavigation" data-add-bookmark="ca/ca/config/modifyuseraccount.shtml?modification=add" data-remove-bookmark="ca/ca/config/modifyuseraccount.shtml?modification=remove">
    <link rel="stylesheet" href="ca/css/topnavigation.css?9326" type="text/css" />

    <div id="ca-top-navigation">

        <form action="ca/ca/accounts/preferences/save.shtml" method="post" data-widget="ui/SavePreference">
            <input type="hidden" name="formHash" value="288EyTbRxmti0dDeTj2ig4gvQpLqQw=" />

            <div class="ca-topnav-account-level  no-alternatives" style="z-index:0">

                <div class="ca-topnav-button-wrapper with-panel ">

                    <a class="csr-button-2 border with-panel " href="ca/ca/payments/showList.shtml?setActiveAccountKey=Company.ShineZone">
                        ShineZone
                        <i class="icon-chevron-right"></i>
                    </a>
                </div>

                <div class="ca-topnav-panel ">
                    <div class="ca-topnav-panel-column">
                        <div>
                            <a href="ca/ca/payments/showList.shtml?setActiveAccountKey=MerchantAccount.ShineZoneHK">
                                ShineZoneHK
                            </a>
                        </div>
                    </div>

                    <div class="ca-toggle-stickynavigation csr-panel-content separated" id="ca-toggle-stickynavigation">
                        <input type="hidden" name="preferences.ca_sticky_navigation" value="yes" />
                        <button type="submit" class="csr-button csr-link-button">
                            <i class="icon-square-o csr-fcolor-grey"></i>
                            Stay in the same section when I change accounts
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>                </div>
-->
<div id="ca-maincontent">
<div id="ca-boxleft">

    <div id="menu">
        <ul class="nav">
            <li ><a href="showList.php">Home</a></li>
            <li   class="activelink"  ><a href="showList.php">Payments</a></li>
            <!--
            <li ><a href="ca/ca/accounts/choose.shtml">Accounts</a></li>
            <li ><a href="ca/ca/reports/dashboard.shtml">Reports</a></li>
            <li ><a href="ca/ca/disputes/showList.shtml">Disputes</a></li>
            <li ><a href="ca/ca/skin/skinslive.shtml">Skins</a></li>
            <li ><a href="ca/ca/config/choose.shtml">Settings</a></li>
            <li ><a href="ca/ca/risk/choose.shtml">RevenueProtect</a></li>
            <li ><a href="ca/ca/pos/posoverview.shtml?accountCode=ShineZone&amp;accountTypeCode=Company">Point of sale</a></li>
            <li ><a href="ca/ca/revenueaccelerate/overview.shtml">RevenueAccelerate</a></li>
            <li ><a href="ca/ca/support/start.shtml">Support</a></li>
            -->
        </ul>

    </div></div>

<div id="contentbg">
<div id="content">
<div id="contentwrapper">

<div id="subcontent">

<h1 class="ca-pagetitle">Payment Details</h1>

<link rel="stylesheet" type="text/css" href="ca/css/adyen/card_style.css?9326"/>

<style type="text/css">
    #dialog {
        min-height: 0;
    }
    .pg-group + .pg-group {
        margin-top: 20px;
    }
</style>

<div id="ca-payments-cardstyle" class="clearfix">
<div class="ca-pd-head clearfix">

    <div class="csr-col three a">
        <span class="csr-label">PSP Ref</span>
            <span class="csr-value floatRight">
                                    <?php echo $detailResult['PspReferenceId'];?>
                            </span>
    </div>

    <div class="csr-col three a ca-tac">
        <?php
        if($detailResult['RecordType'] == 'Refused') {
            echo <<<EOL
<span class="ca-pd-amount csr-fcolor-red">
    {$detailResult['MainCurrency']} {$detailResult['MainAmount']}
</span>
EOL;
        } else {
            echo <<<EOL
<span class="ca-pd-amount csr-fcolor-green">
    {$detailResult['MainCurrency']} {$detailResult['MainAmount']}
</span>
EOL;
        }
        ?>


    </div>

    <div class="csr-col three a ca-pd-amount-extra">
    </div>
</div>

<div class="csr-clear"></div>

<div class="ca-pd-col-left">

<h3 class="ca-pd-status-widget csr-row">
        <span class="ca-pd-widget-heading">Status
            <?php
            if($detailResult['RecordType'] == 'Refused') {
                echo <<<EOL
<span class="csr-fcolor-red">{$detailResult['RecordType']}</span>
EOL;
            } else {
                echo <<<EOL
<span class="csr-fcolor-green">{$detailResult['RecordType']}</span>
EOL;
            }
            ?>

        </span>
</h3>

<style>
    .pg-card {
        border: 1px solid #eaeaea;
        border-radius: 15px;
        box-sizing: border-box;
        font-size: 12px;
        line-height: 20px;
        margin-bottom: 20px;
        padding: 15px;
        padding-bottom: 0px;
        padding-left: 20px;
        padding-top: 14px;
    }
    .pg-card-header > .columns {
        min-height: 1px;
    }
    .pg-card-header img {
        vertical-align: middle;
    }
    .pg-card-header,
    .pg-card-footer {
        margin-bottom: 15px;
    }
    .pg-card-footer {
        margin-top: -15px;
    }
    .pg-card-body-spacer {
        clear: both;
        height: 0;
    }
    .pg-card-body * + .pg-card-body-spacer {
        height: 15px;
    }
    .pg-card-co-brand-image {
        width: 31px;
    }
    .pg-card-flag-image {
        width: 19px;
        margin-top: -3px;
    }

    .pg-util-align-center {
        text-align: center;
    }
    .pg-util-align-right {
        text-align: right;
    }
</style>

<div class="pg-card">
    <div class="pg-card-header clearfix">
        <div class="columns three a clearfix">
            <img src="ca/img/pm/<?php echo $detailResult['PaymentMethod'];?>_small.png" alt="<?php echo $detailResult['PaymentMethod'];?>" />
            <div class="pg-card-header-space"></div>
        </div>
        <div class="columns three a">
            <div class="pg-util-align-center">
            </div>
        </div>
        <div class="columns three a clearfix">
            <div class="floatRight">
                <img class="pg-card-flag-image"
                     src="ca/img/countries-flat/<?php echo strtolower($detailResult['IssuerCountry']);?>.png"
                     alt="flag CN" />
                <span class="csr-value"><?php echo $detailResult['IssuerCountry'];?></span>
                <div class="pg-card-header-space"></div>
            </div>
        </div>
    </div>

    <div class="pg-card-body clearfix">
        <div class="pg-card-body-spacer"></div>
    </div>
</div>

<div class="ca-pd-widget clearfix csr-row">
    <h3>
        <i class="icon-shopping-cart csr-fcolor-green"></i>
        <span class="ca-pd-widget-heading">Shopper</span>
                                    <span class="ca-pd-shopper-country">
                        <img class="ca-pd-flag"
                             src="ca/img/countries-flat/<?php echo strtolower($detailResult['ShopperCountry']);?>.png"
                             alt="flag US"
                            />
                                        <?php echo $detailResult['ShopperCountry'];?>
                    </span>
    </h3>

    <div class="ca-pd-widget-content clearfix" style="position: relative;">
        <div class="csr-label columns three a">IP</div>
        <div class="csr-value columns three b">

            <a href="#shopperIP" data-dialog="yes"><?php echo $detailResult['IP'];?></a>

            <div id="shopperIP" style="display: none;">
                <div data-dialog-width="500">
                    <p>This interface includes links to third party sites. Using these features will result in user information being sent to third parties to allow you to use the relevant services of such third parties in aid of your fraud prevention efforts. Adyen does not accept any liability or responsibility for interactions with these third-parties; you use the services of such third parties at your own risk and account.</p>
                    <a class="ca-dialog-close" onclick="return wopen(this);" href="#"">Continue</a>
                </div>
            </div>
            <!--<a class="ca-pd-find-icon" href="modifySearch.php?timeFrom=2016-07-25+13%3A05&timeTo=2017-07-24+13%3A05&query=ipAddress%3A%2223.89.149.110%22" title="search on this value">
                <i class="icon-search"></i>
            </a>-->
        </div>
    </div>
</div>



<div class="ca-pd-widget clearfix csr-row">
    <h3>
        <i class="icon-adyen-information csr-fcolor-green"></i>
        <span class="ca-pd-widget-heading">Information</span>
    </h3>

    <div class="ca-pd-widget-content">
        <div class="columns three a csr-label">Creation Date</div>
        <div class="columns three b csr-value"><?php echo $detailResult['BookingDate'];?></div>

        <div class="columns three a csr-label">Delivery Date</div>
        <div class="columns three b csr-value">
            <?php echo $detailResult['BookingDate'];?>
        </div>

        <div class="csr-value columns three c">&nbsp;</div>

        <div class="columns three a csr-label">SkinCode</div>
        <div class="columns three b csr-value">
            <?php echo $detailResult['SkinCode'];?>
        </div>
        <div class="csr-value columns three c">&nbsp;</div>

        <div class="csr-label columns three a">Browser</div>
        <div class="columns three b csr-value">
            <?php echo $detailResult['Browser'];?>
        </div>

        <div class="csr-label columns three a">Device Type</div>
        <div class="columns three b csr-value">
            <?php echo $detailResult['DeviceType'];?>
        </div>
        <div class="columns three a csr-label">Shopper Paid</div>
        <div class="columns three b csr-value"><?php echo $detailResult['MainCurrency'];?> <?php echo $detailResult['MainAmount'];?></div>

    </div>
</div>
</div>
<div class="ca-pd-col-right">
    <div class="ca-pd-widget clearfix csr-row" style="padding-bottom: 0;">
        <h3>
        <?php
        if($detailResult['RecordType'] == 'Refused') {
            echo <<<EOL
<i class="icon-exclamation-triangle csr-fcolor-red"></i>
EOL;
        } else {
            echo <<<EOL
<i class="icon-check csr-fcolor-green"></i>
EOL;
        }
        ?>
            <span class="ca-pd-widget-heading">Processing</span>
        </h3>

        <div class="ca-pd-widget-content clearfix ca-por">
            <div class="columns three a csr-label">Acquirer Response</div>
            <?php
            if($detailResult['RecordType'] == 'Refused') {
                echo <<<EOL
<div class="columns three b csr-fcolor-red">
                Refused
            </div>
EOL;
            } else {
                echo <<<EOL
<div class="columns three b csr-fcolor-green">
                Approved
            </div>
EOL;
            }
            ?>


            <div class="columns three a csr-label">Authorisation Code</div>
            <div class="columns three b csr-value">
                n/a
            </div>

            <div class="csr-label columns three a">Shopper Interaction</div>
            <div class="csr-value columns three b">
                Ecommerce
            </div>

            <div class="columns three a csr-label">&nbsp;</div>
            <div class="columns three b csr-value">&nbsp;</div>
            <div class="columns three a csr-label">CVC/CVV</div>
            <div class="columns three b csr-fcolor-red">

            Unknown                                                            </div>

            <div style="display: none;">

                <span class="csr-label">CVC/CVV Result</span>
                            <span class="csr-value">
                                Unknown                            </span>
            </div>

            <div class="columns three a csr-label">AVS</div>
            <div class="columns three b csr-value">
            </div>
        </div>

        <div class="ca-pd-auth-status">
            <div class="columns three a ca-pd-secure" data-widget="#"><!--这里调用2个页面-->
                <div class="csr-label ca-db">3D Secure</div>

                <i class="icon-minus csr-fcolor-grey"></i>                                     </div>

            <div class="columns three a ca-pd-liability" data-widget="#"><!--这里调用2个页面-->
                <div class="csr-label ca-db">Liability Shift</div>

                <i class="icon-minus csr-fcolor-grey"></i>                                     </div>

            <div class="columns three a" style="border-right: 0;">
                <div class="csr-label ca-db">Fraud Scoring</div>
                <!--<a style="vertical-align: top;" href="ca/ca/accounts/showTxRisk.shtml?txType=Payment&amp;pspReference=1814851730829794&amp;accountKey=MerchantAccount.ShineZoneHK">
                </a>-->
                0
            </div>
        </div>
    </div>


    <div class="ca-pd-widget clearfix csr-row">
        <h3>
            <i class="icon-user csr-fcolor-green"></i>
            <span class="ca-pd-widget-heading">Merchant</span>
        </h3>

        <div class="ca-pd-widget-content">

            <div class="columns three a csr-label">
                Reference
            </div>
            <div class="columns three b csr-value ca-pd-merchant-url-ref">
                <?php echo $detailResult['MerchantReferenceId'];?>

                <!--<a class="ca-pd-find-icon" href="ca/ca/payments/modifySearch.shtml?timeFrom=2016-07-25+13%3A05&amp;timeTo=2017-07-24+13%3A05&amp;query=merchantReference%3A%22<?php echo $detailResult['MerchantReferenceId'];?>%22" title="search on this value">
                    <i class="icon-search"></i>
                </a>-->
            </div>

            <div class="columns three a csr-label">Account</div>
            <div class="columns three b csr-value">
                <a style="text-decoration: none" href="showList.php?filterValue=<?php echo $detailResult['MerchantAccount'];?>&filterField=MerchantAccount">
                    <?php echo $detailResult['MerchantAccount'];?>
                </a>
            </div>

        </div>
    </div>

</div>
<div class="csr-clear"></div>
</div>

<div class="ca-pd-toggle-classic">
    <div data-collapse="#ca-pd-field-style" class="ca-pd-button-wrapper" data-event="PDP_OPEN_CLASSIC">
        <h2 title="The classic view shows the same information as above, but uses the older table style">
            Classic view
        </h2>
    </div>
</div>
<div id="ca-pd-field-style" style="display:none">
    <table class="data csr-table csr-data-table">
        <tbody>
        <tr>
            <th class="row">Psp Reference</th>
            <td><?php echo $detailResult['PspReferenceId'];?>
            </td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Amount</th><td><?php echo $detailResult['MainCurrency'];?> <?php echo $detailResult['MainAmount'];?></td>
        </tr>
        <tr>
            <th class="row">
                <span class="floatLeft">Merchant Reference</span>
            <span class="floatRight">
           <!--
            <a href="ca/ca/payments/modifySearch.shtml?timeFrom=2016-07-25+13%3A05&amp;timeTo=2017-07-24+13%3A05&amp;query=merchantReference%3A%22<?php echo $detailResult['MerchantReferenceId'];?>%22" title="search on this value">
                <i class="icon-search"></i>
            </a>
            -->
        </span>
            </th>
            <td><?php echo $detailResult['MerchantReferenceId'];?></td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Account</th>
            <td><a style="text-decoration: none" href="showList.php?filterValue=<?php echo $detailResult['MerchantAccount'];?>&filterField=MerchantAccount"><?php echo $detailResult['MerchantAccount'];?></a></td>
        </tr>



        <tr><th class="row">Payment Method</th><td>
                <img style="vertical-align: middle" src="ca/img/pm/<?php echo $detailResult['PaymentMethod'];?>_small.png" title="<?php echo $detailResult['PaymentMethod'];?>" alt="<?php echo $detailResult['PaymentMethod'];?>"/>
            </td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">
                Fraud Scoring</th><td>
                0
                <!--<a href="ca/ca/accounts/showTxRisk.shtml?txType=Payment&amp;pspReference=1814851730829794&amp;accountKey=MerchantAccount.ShineZoneHK">0</a>-->
            </td>
        </tr>
        <tr>
            <th class="row">Payment Method Variant</th><td>
                (n/a) 		</td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">
                &nbsp;
            </th><td>
                &nbsp;
            </td>
        </tr>
        <tr><th class="row">Shopper Interaction</th><td>Ecommerce</td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">
                <span class="floatLeft">Shopper IP</span>
            <span class="floatRight">
                <!--
            <a href="ca/ca/payments/modifySearch.shtml?timeFrom=2016-07-25+13%3A05&amp;timeTo=2017-07-24+13%3A05&amp;query=ipAddress%3A%2223.89.149.110%22" title="search on this value">
                <i class="icon-search"></i>
            </a>-->
        </span>
            </th>
            <td>
                <a href="#shopperIP" data-dialog="yes"><?php echo $detailResult['IP'];?></a>

                <div id="shopperIP" style="display: none;">
                    <div data-dialog-width="500">
                        <p>This interface includes links to third party sites. Using these features will result in user information being sent to third parties to allow you to use the relevant services of such third parties in aid of your fraud prevention efforts. Adyen does not accept any liability or responsibility for interactions with these third-parties; you use the services of such third parties at your own risk and account.</p>
                        <a class="ca-dialog-close" onclick="return wopen(this);" href="#">Continue</a>
                    </div>
                </div>

            </td>
        </tr>
        <tr>
            <th class="row">Creation Date</th><td><?php echo $detailResult['BookingDate'];?></td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Shopper Country</th><td>
                <img style="vertical-align: middle" src="ca/img/countries/<?php echo strtolower($detailResult['ShopperCountry']);?>.png" alt="flag US"/>
                <?php echo $detailResult['ShopperCountry'];?></td>
        </tr>

        <tr>
            <th class="row">Delivery Date</th>
            <td>
                <?php echo $detailResult['BookingDate'];?>
            </td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">
                <span class="floatLeft">Shopper Reference</span>
            </th>
            <td></td>
        </tr>

        <tr>
            <th class="row">
                <span class="floatLeft">Shopper Email</span>
            </th>
            <td></td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">&nbsp;</th><td>&nbsp;</td>
        </tr>

        <tr>
            <th class="row">Acquirer Response</th><td>Approved</td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Acquirer Shopper Reference</th><td></td>
        </tr>
        <tr>
            <th class="row">Acquirer Reference</th>
            <td>
                <?php echo $detailResult['AcquirerReference'];?>
            </td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Issuer Country</th><td>
                <img style="vertical-align: middle" src="ca/img/countries/<?php echo strtolower($detailResult['IssuerCountry']);?>.png" alt="flag CN"/>
                <?php echo $detailResult['IssuerCountry'];?></td>
        </tr>

        <tr>
            <th class="row">SkinCode</th><td><?php echo $detailResult['SkinCode'];?></td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">&nbsp;</th><td>&nbsp;</td>
        </tr>
        <tr>
            <th class="row">Browser</th><td>
                <?php echo $detailResult['Browser'];?>
            </td>
            <td style="width:2em">&nbsp;</td>
            <th class="row">Device Type</th><td>
                <?php echo $detailResult['DeviceType'];?>
            </td>
        </tr>

        </tbody>
    </table>
</div>

<h2 data-collapse="#ca-transaction-cost" data-event="PDP_CLASSIC_TOGGLE_TRANSACTION_COST">Transaction Cost</h2>
<table class="data" id="ca-transaction-cost">
    <thead>
    <tr>
        <th>Fee Category</th><th>Cost</th><th>Amount</th>
    </tr>
    </thead>
    <tbody >
    <tr>
        <th class="row">Merchant Bank Fee</th>
        <td colspan="2">(n/a)</td>
    </tr>
    <tr>
        <th class="row">Scheme Fees</th>
        <td></td><td></td>
    </tr>
    <tr>
        <th class="row">Interchange</th>
        <td></td><td></td>
    </tr>
    <tr><td colspan="3"> </td>
    </tr>
    <tr>
        <th class="row">Total MSC</th>
        <td>&nbsp;</td>
        <td><b>(n/a)</b></td>
    </tr>
    </tbody>
</table>


<h2 data-collapse="#availableOperations" data-event="PDP_CLASSIC_TOGGLE_OPERATIONS">Operations</h2>
<div id="availableOperations">
    <table class="csr-table csr-data-table csr-data-input-table">
        <colgroup>
            <col style="width: 180px" />
            <col style="width: 200px" />
            <col style="width: 250px" />
            <col style="width: 100px;" />
        </colgroup>
        <form method="post"  action="" >
            <input type="hidden" name="pspReference" value="1814851730829794"/>
            <input type="hidden" name="txType" value="Payment"/>
            <input type="hidden" name="formHash" value="843ClP0yxPzGZSenS/fY20++R5G5d0=" />
            <caption>Submit Refund Request</caption>
            <tr>
                <th>Submit Refund Request</th>
                <td>
                    Amount <input type="text" name="guiAmount" value ="299.00" class="csr-input-text" />
                    USD
                    <input type="hidden" name="currencyCode" value ="USD" />
                </td>
                <td>
                    Reference<br/><input type="text" name="modificationMerchantReference" value ="<?php echo $detailResult['MerchantReferenceId'];?>" class="csr-input-text" />
                </td>
                <td><br/><input type="button" name="refund" value="Send Refund" class="csr-button csr-submit-button csr-reduce" onclick="javascript:alert('暂未开放');"/></td>
            </tr>
        </form>
        <script type="text/javascript">
            //<![CDATA[
            //return confirmRefundSubmit(this, 'USD')
            function confirmRefundSubmit ( form, currency) {
                var reference = form.elements['modificationMerchantReference'].value;
                var amount = form.elements['guiAmount'].value;
                var message = 'Are you sure you want to refund amount: ' + amount + ' ' + currency;
                if (reference) {
                    message += ' with reference: ' + reference;
                }
                message += ' ?';
                return confirm(message);
            }
            //]]>
        </script>

    </table>
</div>

<div style="display:none" id="tooltip3dSecure">
    Not applicable for this payment method.
</div>

<div style="display:none" id="tooltipLiabilityShift">

    This indicates whether the card issuer will bear the financial risk for card holder disputes.
    <br /><br /> This is not applicable for this payment method.

</div>

<script type="text/javascript">
    require(['jquery'], function(jq) {

        // By default we collapse the field style view
        jq('#ca-pd-field-style').slideUp();

        var newNameToggle = jq("#newConsumerNameToggle");
        var newNameLabel = jq("#newConsumerNameLabel");
        var newNameInput = jq("#newConsumerNameInput");

        if (newNameToggle && newNameLabel && newNameInput) {
            newNameToggle.on('click', function() {
                newNameLabel.slideToggle();
                newNameInput.slideToggle();
            });
        }

    });
</script>

<br />

<table class="data csr-table csr-list-table medium">
    <thead>
    <tr>
        <th>Item</th>
        <th>Reference</th>
        <th>Status</th>
        <th>Amount</th>
        <th>Creation Date</th>
        <th>Created By</th>
        <th>Acquirer Reference</th>
        <th>ARN</th>
        <th>Settlement Batch</th>
    </tr>
    </thead>
    <tbody>

    <?php
        //Submit Refund Request
        echo <<<EOL
    <tr title="1814851730829794">
        <td>Payment</td>
        <td>{$detailResult['MerchantReferenceId']}</td>
        <td>
            {$detailResult['RecordType']}
        </td>
        <td>{$detailResult['MainCurrency']} {$detailResult['MainAmount']}</td>
        <td>{$detailResult['BookingDate']}</td>
        <td>
            {$detailResult['Email']}
        </td>
        <td>{$detailResult['AcquirerReference']}</td>
        <td></td>
        <td></td>
    </tr>
EOL;

    $AuthorisedTime = [];
    foreach($result as $info) {
        if($info['RecordType'] == 'Authorised') {
            $AuthorisedTime = $info;
        }
    }

    //这里是不是总数超过1条就默认有下面的
    if($detailResult['RecordType'] != 'Refused' && $AuthorisedTime) {
        echo <<<EOL
    <tr title="1814851730829794">
        <td><img src="./ca/img/sublevel.png" alt="sub"/>Capture</td>
        <td>{$AuthorisedTime['MerchantReferenceId']}</td>
        <td></td>
        <td>{$AuthorisedTime['MainCurrency']} {$AuthorisedTime['MainAmount']}</td>
        <td>{$AuthorisedTime['BookingDate']}</td>
        <td>
            {$AuthorisedTime['Email']}
        </td>
        <td>{$AuthorisedTime['AcquirerReference']}</td>
        <td></td>
        <td></td>
    </tr>
EOL;
    }
    ?>
    </tbody>
</table>

<table class="data csr-table csr-list-table narrow">
    <caption>History</caption>
    <thead>
    <tr><th>JournalType</th><th>date</th></tr>
    </thead>
    <tbody>
    <?php
    foreach($result as $info) {
        echo <<<EOL
    <tr class="std">
        <td id="tx-history-1">
            {$info['RecordType']}
        </td>
        <td>{$info['BookingDate']}</td>
    </tr>
EOL;
    }
    ?>

    </tbody>
</table>

<table class="data csr-table csr-list-table narrow">
    <caption>Balance</caption>
    <thead>
    <tr>
        <th>AccountType</th>
        <th>RegisterType</th>
        <th>Currency</th>
        <th class="r csr-type-number">Debit</th>
        <th class="r csr-type-number">Credit</th>
    </tr>
    </thead>
    <tbody>

    <!--开始整理Balance数据-->
    <?php
    $trList = [];
    foreach($result as $info) {
        if($info['CapturedPC']) {
            $trList['Captured'] = $info['CapturedPC'];
        }

        if($info['CapturedPC']) {
            $trList['Commision'] = $info['CommissionSC'];
        }

        if($info['CapturedPC']) {
            $trList['Fee'] = abs($info['ProcessingFeeFC']);
        }

        if($info['CapturedPC']) {
            $trList['Offer'] = $info['OfferFC'];
        }

        if($info['CapturedPC']) {
            $trList['Payable'] = $info['PayableSC'];
            if(isset($trList['Captured'])) {
                unset($trList['Captured']);
            }
        }
    }

    foreach($trList as $key => $val) {
        echo <<<EOL
    <tr class="alt">
        <td>MerchantAccount</td>
        <td>{$key}</td>
        <td>USD</td>
        <td class="r csr-type-number"></td>
        <td class="r csr-type-number">{$val}</td>
    </tr>
EOL;

    }
    ?>
    </tbody>
</table>

<script type="text/javascript">
    jQuery("form.prevent-double-submission").on("submit", function() {
        jQuery(this).find("input[type=submit]").prop("disabled",true);
    });
</script>
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

<script type="text/javascript">
    var _paq = _paq || [];
    (function(d) {
        _paq.push(["setDomains", ["*.adyen.com"]]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        _paq.push(['setTrackerUrl', '/ca/ua']);
        _paq.push(['setSiteId', 1]);
        _paq.push(['setUserId', 'admin@Company.ShineZone']);
        _paq.push(['enableHeartBeatTimer', 30]);
        _paq.push(['setCustomVariable', 1, 'UserType', 'Company', 'visit']);
        _paq.push(['setCustomVariable', 2, 'AccountLevel', 'Company', 'page']);
        _paq.push(['setCustomVariable', 3, 'Section', 'payments', 'page']);
        var g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src='/ca/ua/js'; s.parentNode.insertBefore(g,s);
        require(['jquery', 'util/Analytics'], function(jq, Analytics) {
            Analytics.addTracker(function(cat, act, name, val) {
                _paq.push(['trackEvent', cat, act, name, val]);
            });
            jq(window).keydown(function(evt) {
                var code = evt.keyCode || evt.which;
                if (evt.ctrlKey && code == 70) {
                    _paq.push(['trackEvent', 'Navigation', 'Keyboard', 'Ctrl-F']);
                } else if (evt.metaKey && code == 70) {
                    _paq.push(['trackEvent', 'Navigation', 'Keyboard', 'Meta-F']);
                }
            });
        })

        var oldOnError = window.onerror;

        window.onerror = function (msg, url, lineNo, columnNo, error) {
            _paq.push(['trackEvent', 'JS', 'Error', msg + '@' + url + ':' + (lineNo||'?') + ',' + (columnNo||'?')]);
            if (typeof oldOnError === "function") {
                return oldOnError(msg, url, lineNo, columnNo, error);
            }
            return false;
        };
    })(document);
</script>
<noscript><p><img src="ca/ua?idsite=1&action_name=Payments" style="border:0;" alt="" /></p></noscript>
</div>
</div>
</div>
</body>
</html>
