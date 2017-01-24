<?php
require_once __DIR__ . "/../../../functions/Reports.php";

$post  = getPostInfo();

// 文件下载
//download.php?fileName=hpp_conversion_detail_report_2017_01_23.csv
if (isset($post['fileName'])) {
    $fileName = $post['fileName'];
    downloadFile($fileName);die;
}

// 进入download界面
//reportSet=hpp_conversion_detail_report
//reportSet=Invoice-PDF
//reportSet=netfx
//reportSet=monthly_finance_report
$reportSet = isset($post['reportSet'])?$post['reportSet']:'';

if($reportSet == 'payments_accounting_report') {
    $type         = 'par';
    $downloadInfo = selectInfo($type);
    //var_dump($downloadInfo);die;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
<head>
    <title>Reports - Adyen PSP System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta content="TRUE" name="MSSmartTagsPreventParsing" />
    <link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>
    <link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326" />
    <link rel="alternate" title="Payments Per Hour RSS" href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="Authorised Volume RSS" href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="System Messages RSS" href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />

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
        adyen.base = adyen.base || "/ca/";
        adyen.jsbase = adyen.jsbase || "/ca/js";
        adyen.imgbase = adyen.imgbase || "/ca/img";
        adyen.cssbase = adyen.cssbase || "/ca/css";
        adyen.currentAccountType = adyen.currentAccountType || "Company";
        adyen.tz = adyen.tz || {};
        adyen.tz.amsterdamOffset = 3600000;
        adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
        adyen.config = adyen.config || {};
        adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
        adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

        adyen.config.navToDefault = "/ca/ca/accounts/choose.shtml";
        adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";
    </script>

    <!--[if lte IE 8]>
    <script type="text/javascript">
        document.createElement('section');
    </script>
    <![endif]-->

    <!--[if lte IE 8]><script src="/ca/js/lib/json2.js"></script><![endif]-->
    <script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
    <script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>
</head>

<body class="no-menu ca-with-backlink ca-ft-globalsearch">

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
                "formHash" : "364xPxbvuFAwIF7PNJh/FjmR3TSBK0=",
                "pageUrl" : "/ca/ca/reports/download.shtml"
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
                Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
            }

            setTimeout( function () {
                formContainer.addClass( classHidden );
                thankyouContainer.hide();
                commentsContainer.show();

            }, 5000 );
        } );

    } );
</script>

<script type="text/javascript">
    window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
</script>
<div id="ca-maincontent">
    <div id="ca-boxleft">
    </div>
    <div id="contentbg">
        <div id="content">
            <div id="contentwrapper">
                <div id="subcontent">

                    <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports" data-report-set="payments_accounting_report">
                        <colgroup>
                            <col style="width: auto;"/>
                            <col style="width: 230px;"/>
                            <col style="width: 120px;"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>Payment accounting </th>
                            <th colspan="2">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo formatReportDisplayList($downloadInfo);?>
                        </tbody>

                    </table>
                    <br/>



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
                    _paq.push(['setCustomVariable', 3, 'Section', 'reports', 'page']);
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
            <noscript><p><img src="/ca/ua?idsite=1&action_name=Reports" style="border:0;" alt="" /></p></noscript>


        </div>
    </div>
</div>


</body>
</html>
<?php
}
elseif ($reportSet == 'hpp_conversion_detail_report')
{
    $type         = 'hpp';
    $downloadInfo = selectInfo($type);
    //var_dump($downloadInfo);die;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
<head>
    <title>Reports - Adyen PSP System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta content="TRUE" name="MSSmartTagsPreventParsing" />
    <link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326" />

    <link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>

    <link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326" />

    <link rel="alternate" title="Payments Per Hour RSS" href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="Authorised Volume RSS" href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="System Messages RSS" href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
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
        adyen.base = adyen.base || "/ca/";
        adyen.jsbase = adyen.jsbase || "/ca/js";
        adyen.imgbase = adyen.imgbase || "/ca/img";
        adyen.cssbase = adyen.cssbase || "/ca/css";
        adyen.currentAccountType = adyen.currentAccountType || "Company";
        adyen.tz = adyen.tz || {};
        adyen.tz.amsterdamOffset = 3600000;
        adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
        adyen.config = adyen.config || {};
        adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.php?accountCode=ShineZone&amp;ignoresaverequest=true"
        adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.php?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

        adyen.config.navToDefault = "/ca/ca/accounts/choose.shtml";
        adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";
    </script>
    <!--[if lte IE 8]>
    <script type="text/javascript">
        document.createElement('section');
    </script>
    <![endif]-->
    <!--[if lte IE 8]><script src="/ca/js/lib/json2.js"></script><![endif]-->
    <script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
    <script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>
</head>
<body class="no-menu ca-with-backlink ca-ft-globalsearch">
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
                "formHash" : "273xXD44piTWZlSl267g+8/rWF2PUY=",
                "pageUrl" : "/ca/ca/reports/download.php"
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
                Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
            }

            setTimeout( function () {
                formContainer.addClass( classHidden );
                thankyouContainer.hide();
                commentsContainer.show();

            }, 5000 );
        } );

    } );
</script>
<script type="text/javascript">
    window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
</script>
<div id="ca-maincontent">
    <div id="ca-boxleft">
    </div>
    <div id="contentbg">
        <div id="content">
            <div id="contentwrapper">
                <div id="subcontent">
                    <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports" data-report-set="hpp_conversion_detail_report">
                        <colgroup>
                            <col style="width: auto;"/>
                            <col style="width: 230px;"/>
                            <col style="width: 120px;"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>HPP conversion details </th>
                            <th colspan="2">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo formatReportDisplayList($downloadInfo);?>
                        </tbody>
                    </table>
                    <br/>
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
<?php
}
//reportSet=monthly_finance_report&_=1485199139598
else if ($reportSet == 'monthly_finance_report') {
    $type         = 'mfr';
    $downloadInfo = selectInfo($type);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
<head>
    <title>Reports - Adyen PSP System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta content="TRUE" name="MSSmartTagsPreventParsing" />
    <link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326" />
    <link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>
    <link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326" />
    <link rel="alternate" title="Payments Per Hour RSS" href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="Authorised Volume RSS" href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <link rel="alternate" title="System Messages RSS" href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
    <script type="text/javascript">
        (function(console) {
            function printMe() {
                if(console && console.warn) {
                    console.warn("%c [JSS-SX01] This is a browser feature intended for developers.\n\t\t\tIf someone has requested you to copy-paste something in here,\n\t\t\tthey might be trying to hack or scam you.", "color:red;font-size:2em");
                } else {
                    setTimeout(printMe, 500);
                }
            }
            //printMe();
        }(window.console));
        (function(w) {
            try {var c = console; Object.defineProperty(w, "console", {get: function() { if(c._commandLineAPI) {throw "[JSS-SX02] Sorry, the script console is deactivated";} return c;},set: function(nc) {c = nc;}});} catch (ignore) {}})(window);
        adyen = window.adyen = window.adyen || {};
        adyen.base = adyen.base || "/ca/";
        adyen.jsbase = adyen.jsbase || "/ca/js";
        adyen.imgbase = adyen.imgbase || "/ca/img";
        adyen.cssbase = adyen.cssbase || "/ca/css";
        adyen.currentAccountType = adyen.currentAccountType || "Company";
        adyen.tz = adyen.tz || {};
        adyen.tz.amsterdamOffset = 3600000;
        adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
        adyen.config = adyen.config || {};
        adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
        adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

        adyen.config.navToDefault = "/ca/ca/accounts/choose.shtml";
        adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
        adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";


    </script>
    <!--[if lte IE 8]>
    <script type="text/javascript">
        document.createElement('section');
    </script>
    <![endif]-->
    <!--[if lte IE 8]><script src="/ca/js/lib/json2.js"></script><![endif]-->
    <script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
    <script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>
</head>
<body class="no-menu ca-with-backlink ca-ft-globalsearch">
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
                "formHash" : "3957OB1SfL7gW3mmUkjkBBdTKWtP4g=",
                "pageUrl" : "/ca/ca/reports/download.php"
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
                Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
            }

            setTimeout( function () {
                formContainer.addClass( classHidden );
                thankyouContainer.hide();
                commentsContainer.show();

            }, 5000 );
        } );

    } );
</script>
<script type="text/javascript">
    window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
</script>
<div id="ca-maincontent">
    <div id="ca-boxleft">
    </div>
    <div id="contentbg">
        <div id="content">
            <div id="contentwrapper">
                <div id="subcontent">
                    <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports" data-report-set="monthly_finance_report">
                        <colgroup>
                            <col style="width: auto;"/>
                            <col style="width: 230px;"/>
                            <col style="width: 120px;"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>Monthly finance </th>
                            <th colspan="2">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo formatReportDisplayList($downloadInfo);?>
                        </tbody>
                    </table>
                    <br/>
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
<?php
}
//reportSet=daily_finance_report
else if ($reportSet == 'daily_finance_report') {
    $type         = 'dfr';
    $downloadInfo = selectInfo($type);
    $displayDfrList = '';
    $tmpArr       = [];
    if ($downloadInfo)
    {
        foreach($downloadInfo as $item)
        {
            list($file, $extension) = explode('.', $item['FileName']);
            $date         = date('Y-m', strtotime(str_replace('_','-',substr($file,-10))));
            $fileRealName = DOWNLOAD_PATH . $item['FileName'];
            $size         = 0;
            if (file_exists($fileRealName))
            {
                $size     = filesize($fileRealName);
            }
            if (isset($tmpArr[$date])) {
                $tmpArr[$date] .= '
                    <tr data-daily-group="daily_finance_report-'.$date.'">
                    <td>
                    <a href="/ca/ca/reports/download.php?fileName='.$item['FileName'].'" title="'.$item['FileName'].'">
                    '.$item['FileName'].'</a></td>
                    <td>'.$item['CreateDate'].' CET</td>
                    <td class="align-right" title="'.$size.' bytes">'.sizeFormat($size).'</td>
                    </tr>
                ';
            } else {
                $tmpArr[$date] .= '
                    <tr><th>
                    <h2 style="margin:0" data-collapse="[data-daily-group=daily_finance_report-'.$date.']?defaultState=close">
                    '.$date.'
                    </h2></th>
                    <td colspan="2" class="align-right"><a class="csr-button-2 secondary" href="/ca/ca/reports/download/period.php?period='.$date.'&amp;reportSet=daily_finance_report">Download (zip)</a></td>
                    </tr>
                    <tr data-daily-group="daily_finance_report-'.$date.'">
                    <td>
                    <a href="/ca/ca/reports/download.php?fileName='.$item['FileName'].'" title="'.$item['FileName'].'">
                    '.$item['FileName'].'</a></td>
                    <td>'.$item['CreateDate'].' CET</td>
                    <td class="align-right" title="'.$size.' bytes">'.sizeFormat($size).'</td>
                    </tr>
                ';
            }
        }
        foreach($tmpArr as $list)
        {
            $displayDfrList .= ' <tbody>'.$list.'</tbody>';
        }
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
    <head>
        <title>Reports - Adyen PSP System</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta content="TRUE" name="MSSmartTagsPreventParsing" />
        <link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
        <link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326" />

        <link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326" />


        <link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326" />
        <link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>

        <link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326" />

        <link rel="alternate" title="Payments Per Hour RSS" href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
        <link rel="alternate" title="Authorised Volume RSS" href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
        <link rel="alternate" title="System Messages RSS" href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />




        <script type="text/javascript">
            (function(console) {
                function printMe() {
                    if(console && console.warn) {
                        console.warn("%c [JSS-SX01] This is a browser feature intended for developers.\n\t\t\tIf someone has requested you to copy-paste something in here,\n\t\t\tthey might be trying to hack or scam you.", "color:red;font-size:2em");
                    } else {
                        setTimeout(printMe, 500);
                    }
                }
                //printMe();
            }(window.console));
            (function(w) {
                try {var c = console; Object.defineProperty(w, "console", {get: function() { if(c._commandLineAPI) {throw "[JSS-SX02] Sorry, the script console is deactivated";} return c;},set: function(nc) {c = nc;}});} catch (ignore) {}})(window);
            adyen = window.adyen = window.adyen || {};
            adyen.base = adyen.base || "/ca/";
            adyen.jsbase = adyen.jsbase || "/ca/js";
            adyen.imgbase = adyen.imgbase || "/ca/img";
            adyen.cssbase = adyen.cssbase || "/ca/css";
            adyen.currentAccountType = adyen.currentAccountType || "Company";
            adyen.tz = adyen.tz || {};
            adyen.tz.amsterdamOffset = 3600000;
            adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
            adyen.config = adyen.config || {};
            adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
            adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

            adyen.config.navToDefault = "/ca/ca/accounts/choose.shtml";
            adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
            adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
            adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";


        </script>



        <!--[if lte IE 8]>
        <script type="text/javascript">
            document.createElement('section');
        </script>
        <![endif]-->



        <!--[if lte IE 8]><script src="/ca/js/lib/json2.js"></script><![endif]-->




        <script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
        <script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>


    </head>
    <body class="no-menu ca-with-backlink ca-ft-globalsearch">
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
                    "formHash" : "264+rNJ4ShWwfmim0nNN6C61Jk4wTg=",
                    "pageUrl" : "/ca/ca/reports/download.php"
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
                    Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
                }

                setTimeout( function () {
                    formContainer.addClass( classHidden );
                    thankyouContainer.hide();
                    commentsContainer.show();

                }, 5000 );
            } );

        } );
    </script>
    <script type="text/javascript">
        window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
    </script>
    <div id="ca-maincontent">
        <div id="ca-boxleft">
        </div>
        <div id="contentbg">
            <div id="content">
                <div id="contentwrapper">
                    <div id="subcontent">
                        <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports" data-report-set="daily_finance_report">
                            <colgroup>
                                <col style="width: auto;"/>
                                <col style="width: 230px;"/>
                                <col style="width: 120px;"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>Daily finance </th>
                                <th colspan="2">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <?php echo $displayDfrList;?>
                        </table>
                        <br/>
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

<?php
}
//reportSet=dispute_report
else if ($reportSet == 'dispute_report') {
    $type = 'dispute';
    $downloadInfo = selectInfo($type);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"
          class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
    <head>
        <title>Reports - Adyen PSP System</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="content-style-type" content="text/css"/>
        <meta http-equiv="imagetoolbar" content="no"/>
        <meta content="TRUE" name="MSSmartTagsPreventParsing"/>


        <link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
        <link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326"/>

        <link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326"/>


        <link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326"/>
        <link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>

        <link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326"/>

        <link rel="alternate" title="Payments Per Hour RSS"
              href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
              type="application/rss+xml"/>
        <link rel="alternate" title="Authorised Volume RSS"
              href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
              type="application/rss+xml"/>
        <link rel="alternate" title="System Messages RSS"
              href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
              type="application/rss+xml"/>
        <script type="text/javascript">
            (function (console) {
                function printMe() {
                    if (console && console.warn) {
                        console.warn("%c [JSS-SX01] This is a browser feature intended for developers.\n\t\t\tIf someone has requested you to copy-paste something in here,\n\t\t\tthey might be trying to hack or scam you.", "color:red;font-size:2em");
                    } else {
                        setTimeout(printMe, 500);
                    }
                }

                //printMe();
            }(window.console));
            (function (w) {
                try {
                    var c = console;
                    Object.defineProperty(w, "console", {
                        get: function () {
                            if (c._commandLineAPI) {
                                throw "[JSS-SX02] Sorry, the script console is deactivated";
                            }
                            return c;
                        }, set: function (nc) {
                            c = nc;
                        }
                    });
                } catch (ignore) {
                }
            })(window);
            adyen = window.adyen = window.adyen || {};
            adyen.base = adyen.base || "/ca/";
            adyen.jsbase = adyen.jsbase || "/ca/js";
            adyen.imgbase = adyen.imgbase || "/ca/img";
            adyen.cssbase = adyen.cssbase || "/ca/css";
            adyen.currentAccountType = adyen.currentAccountType || "Company";
            adyen.tz = adyen.tz || {};
            adyen.tz.amsterdamOffset = 3600000;
            adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
            adyen.config = adyen.config || {};
            adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
            adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

            adyen.config.navToDefault = "/ca/ca/accounts/choose.php";
            adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
            adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
            adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";
        </script>


        <!--[if lte IE 8]>
        <script type="text/javascript">
            document.createElement('section');
        </script>
        <![endif]-->


        <!--[if lte IE 8]>
        <script src="/ca/js/lib/json2.js"></script><![endif]-->
        <script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
        <script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript"></script>
    </head>
    <body class="no-menu ca-with-backlink ca-ft-globalsearch">

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
                    <div class="ca-get-feedback__comments-email">For support requests, please email <a
                            href="mailto:support@adyen.com">support@adyen.com</a></div>
                    <textarea name="comment" class="csr-textarea-2"></textarea>
                    <button type="button" class="csr-button-2 primary submit">Submit</button>
                </div>
                <div class="ca-get-feedback__thankyou util-hidden">
                    Thank you for sharing your experiences.<br/>
                    This window will close automatically in 5 seconds.
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        require(['jquery', 'Constants', 'util/Ajax'], function (jq, Constants, Ajax) {

            var form = jq('.ca-get-feedback__form'),
                button = jq('.ca-get-feedback__button'),
                formContainer = jq('.ca-get-feedback__form-container'),
                closeForm = jq('.close-form-js'),
                classHidden = 'util-hidden',
                classActive = 'active',
                ratingListItem = jq('.rating-list li'),
                ratingListItemCheckbox = ratingListItem.find('.csr-input-checkbox-2'),
                commentsContainer = jq('.ca-get-feedback__comments'),
                commentsButtonPrevious = commentsContainer.find('.csr-button-2.previous'),
                ratingContainer = jq('.ca-get-feedback__rating'),
                ratingButtonNext = ratingContainer.find('.csr-button-2.next'),
                submitButton = form.find('.csr-button-2.submit'),
                thankyouContainer = jq('.ca-get-feedback__thankyou');

            button.on('click', function () {
                formContainer.toggleClass(classHidden);
            });

            closeForm.on('click', function () {
                formContainer.addClass(classHidden);
            });

            ratingListItem.on('click', function () {
                var checkbox = jq(this).find('.csr-input-checkbox-2');

                ratingListItemCheckbox.prop('checked', false);
                ratingListItem.removeClass(classActive);
                jq(this).addClass(classActive);
                checkbox.prop('checked', true);
            });

            commentsButtonPrevious.on('click', function () {
                commentsContainer.hide();
                ratingContainer.show();
            });

            ratingButtonNext.on('click', function () {
                ratingContainer.hide();
                commentsContainer.show();
            });

            submitButton.on('click', function () {

                var data = {
                    "formHash": "403+JqpHZX8NOPJpTVMYLCZdHJeMjo=",
                    "pageUrl": "/ca/ca/reports/download.php"
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
                    Ajax.post("/ca/ca/customer-excellence/pagefeedback/submit.shtml", data);
                }

                setTimeout(function () {
                    formContainer.addClass(classHidden);
                    thankyouContainer.hide();
                    commentsContainer.show();

                }, 5000);
            });

        });
    </script>

    <script type="text/javascript">
        window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount = "Company.ShineZone");
    </script>
    <div id="ca-maincontent">
        <div id="ca-boxleft">
        </div>
        <div id="contentbg">
            <div id="content">
                <div id="contentwrapper">
                    <div id="subcontent">
                        <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports"
                               data-report-set="dispute_report">
                            <colgroup>
                                <col style="width: auto;"/>
                                <col style="width: 230px;"/>
                                <col style="width: 120px;"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>Dispute transaction details</th>
                                <th colspan="2">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php echo formatReportDisplayList($downloadInfo); ?>
                            </tbody>
                        </table>
                        <br/>
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
<?php
}
//reportSet=Invoice-PDF
else if ($reportSet=== 'Invoice-PDF') {
    $type         = 'invoice';
    $downloadInfo = '
        <tr><td><a href="/ca/ca/reports/download.php?fileName=invoice-201612005934.Company.ShineZone-HK_YX.pdf"
        title="invoice-201612005934.Company.ShineZone-HK_YX.pdf">
        invoice-201612005934.Company.ShineZone-HK_YX.pdf
        </a></td>
        <td>2017-01-06 14:42:45 CET</td>
        <td class="align-right" title="56986 bytes">55.7 K</td></tr>
    ';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
<head>
<title>Reports - Adyen PSP System</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no" />
<meta content="TRUE" name="MSSmartTagsPreventParsing" />


<link rel="shortcut icon" href="/ca/img/adyen/favicon.ico" type="image/ico"/>
<link rel="stylesheet" type="text/css" href="/ca/css/adyen/style.css?9326" />

<link rel="stylesheet" type="text/css" href="/ca/css/csr/csr.css?9326" />


<link rel="stylesheet" type="text/css" href="/ca/css/csr/grid.css?9326" />
<link rel="stylesheet" type="text/css" href="/ca/css/font.css?9326"/>

<link rel="stylesheet" type="text/css" href="/ca/css/grid.css?9326" />

<link rel="alternate" title="Payments Per Hour RSS" href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
<link rel="alternate" title="Authorised Volume RSS" href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />
<link rel="alternate" title="System Messages RSS" href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D" type="application/rss+xml" />




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
adyen.base = adyen.base || "/ca/";
adyen.jsbase = adyen.jsbase || "/ca/js";
adyen.imgbase = adyen.imgbase || "/ca/img";
adyen.cssbase = adyen.cssbase || "/ca/css";
adyen.currentAccountType = adyen.currentAccountType || "Company";
adyen.tz = adyen.tz || {};
adyen.tz.amsterdamOffset = 3600000;
adyen.tz.userTimeZoneCode = "Europe/Amsterdam";
adyen.config = adyen.config || {};
adyen.config.bookmarksUrl = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&amp;ignoresaverequest=true"
adyen.config.bookmarksUrlWithVolumes = "/ca/ca/accounts/bookmarksJSON.shtml?accountCode=ShineZone&ignoresaverequest=true&retrieveStats=true";

adyen.config.navToDefault = "/ca/ca/accounts/choose.php";
adyen.config.navToPsp = "/ca/ca/reports/dashboard.shtml";
adyen.config.navToCompany = "/ca/ca/reports/dashboard.shtml";
adyen.config.navToMerchantAccount = "/ca/ca/reports/dashboard.shtml";


</script>



<!--[if lte IE 8]>
<script type="text/javascript">
document.createElement('section');
</script>
<![endif]-->



<!--[if lte IE 8]><script src="/ca/js/lib/json2.js"></script><![endif]-->




<script src="/ca/js/jquery.pack.js?9326" type="text/javascript"></script>
<script src="/ca/js/adyen/adyen.pack.js?9326" type="text/javascript" ></script>


</head>



<body class="no-menu ca-with-backlink ca-ft-globalsearch">

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
"formHash" : "950CfW1FSGI7VXLN6X6iEIKJRx81/I=",
"pageUrl" : "/ca/ca/reports/download.php"
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
Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
}

setTimeout( function () {
formContainer.addClass( classHidden );
thankyouContainer.hide();
commentsContainer.show();

}, 5000 );
} );

} );
</script>

<script type="text/javascript">
window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.ShineZone");
</script>
<div id="ca-maincontent">
<div id="ca-boxleft">
</div>
<div id="contentbg">
<div id="content">
<div id="contentwrapper">
<div id="subcontent">
    <table class="csr-table-2 csr-list-table-2 condensed" id="main-reports" data-report-set="Invoice-PDF">
        <colgroup>
            <col style="width: auto;"/>
            <col style="width: 230px;"/>
            <col style="width: 120px;"/>
        </colgroup>
        <thead>
        <tr>
            <th>Invoice PDF </th>
            <th colspan="2">
            </th>
        </tr>
        </thead>
        <tbody>
        <?php echo $downloadInfo;?>
        </tbody>
    </table>
    <br/>
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
<?php
//reportSet=netfx
} else if ($reportSet == 'netfx') {
    $type         = 'netfx';
    $downloadInfo = selectInfo($type);
?>

<?php
}
?>