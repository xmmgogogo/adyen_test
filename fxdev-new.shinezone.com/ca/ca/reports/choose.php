<?php
require_once __DIR__."/../../../functions/Reports.php";

$post   = getPostInfo();
$reportCode  = isset($post['reportCode']) ? $post['reportCode'] :'';

if ( $reportCode == 'payments_accounting_report_filtered') {
//?configure=true&reportCode=payments_accounting_report_filtered
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"
          class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
    <head>
        <title>Report Parameters - Adyen PSP System</title>
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


        <script src="/ca/js/ps.pack.js?load=pluginspack&amp;9326" type="text/javascript"></script>
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
                    "formHash": "931gRApVgXwAuu1sX8/tWKWK0zgWZE=",
                    "pageUrl": "/ca/ca/reports/choose.php"
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


                    <link rel="stylesheet" href="/ca/css/adyen/ca.reportparams.css?9326" type="text/css"/>

                    <div data-dialog-width="700"></div>

                    <div id="subcontent">


                        <h2 class="csr-dialog-title">Interactive payment accounting</h2>


                        <p>Transaction status change details for selected statuses</p>

                        <form action="/ca/ca/reports/generate.php" method="POST">
                            <input type="hidden" name="reportCode" value="payments_accounting_report_filtered"/>
                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">
                                <p>
                                    <label>Start time of the report</label>
                                    <br/>
                                    <input class="csr-input-2" size="20" type="text" id="reportstartdate"
                                           name="reportstartdate" value="2017-01-22"/>
                                    <img alt="Calendar"
                                         onclick="new CalendarDateSelect( $(this).previous(), {valid_date_check:function(date) { return(date &lt;= (new Date()).stripTime()) }, time:false, year_range:10} );"
                                         src="/ca/img/calendar.gif" style="border:0px; cursor:pointer;"/>
                                    (format yyyy-MM-dd hh:mm:ss)
                                </p>
                                <p>
                                    <label>End time of the report</label>
                                    <br/>
                                    <input class="csr-input-2" size="20" type="text" id="reportenddate"
                                           name="reportenddate" value="2017-01-23"/>
                                    <img alt="Calendar"
                                         onclick="new CalendarDateSelect( $(this).previous(), {valid_date_check:function(date) { return(date &lt;= (new Date()).stripTime()) }, time:false, year_range:10} );"
                                         src="/ca/img/calendar.gif" style="border:0px; cursor:pointer;"/>
                                    (format yyyy-MM-dd hh:mm:ss)
                                </p>
                                <p>
                                    <label>Which events to report on</label>
                                    <br/>
                                    <select class="csr-selectbox-2 multiple" id="journaltypecodes"
                                            name="journaltypecodes[]" multiple="multiple" size="8">
                                        <option selected="selected" value="Authorised">Authorised</option>
                                        <option value="AuthorisedPending">AuthorisedPending</option>
                                        <option selected="selected" value="Cancelled">Cancelled</option>
                                        <option selected="selected" value="Refused">Refused</option>
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
                                        <option value="ChargebackExternallyWithInfo">ChargebackExternallyWithInfo
                                        </option>
                                        <option value="ChargebackReversed">ChargebackReversed</option>
                                        <option value="ChargebackReversedExternallyWithInfo">
                                            ChargebackReversedExternallyWithInfo
                                        </option>
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
                                </p>

                                <div style="margin-top:20px">
                                    <button type="submit" name="format" value="CSV" class="ca-format-button"
                                            title="Comma-Separated Values (CSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-csv">CSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>
                                    <button type="submit" name="format" value="TSV" class="ca-format-button"
                                            title="Tab-Separated Values (TSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-tsv">TSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>
                                    <button type="submit" name="format" value="XML" class="ca-format-button"
                                            title="eXtensible Markup Language (XML Alternative)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-xml">XML</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="XMLE" class="ca-format-button"
                                            title="eXtensible Markup Language (XML)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-4 ca-icon-file-xmle">XMLE</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>
                                    <button type="submit" name="format" value="XHTML" class="ca-format-button"
                                            title="(X)HTML Document">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-5 ca-icon-file-xhtml">XHTML</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>

                                </div>


                            </div>

                            <input type="hidden" name="formHash" value="631r0ReU9jhIS6jskuuwxan0BIxLBg="/>
                        </form>

                    </div>

                    <script type="text/javascript">

                    </script>
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
    //choose.shtml?configure=true&reportCode=accountupdate_report
} else if ($reportCode == 'accountupdate_report') {

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-true ajax-true csr-level-2" data-csr-level="2">
    <head>
        <title>Report Parameters - Adyen PSP System</title>
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




        <script src="/ca/js/ps.pack.js?load=pluginspack&amp;9326" type="text/javascript"></script>
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
                    "formHash" : "751i/FKECjLxBYhkY85MRuQODipAjA=",
                    "pageUrl" : "/ca/ca/reports/choose.php"
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
                    <link rel="stylesheet" href="/ca/css/adyen/ca.reportparams.css?9326" type="text/css" />
                    <div data-dialog-width="700"></div>
                    <div id="subcontent">
                        <h2 class="csr-dialog-title">Account updater</h2>
                        <p>Category breakdown of account updater results</p>
                        <form  action="/ca/ca/reports/generate.php"  method="POST">
                            <input type="hidden" name="reportCode" value="accountupdate_report" />
                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">
                                <p>
                                    <label>Start date</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportstartdate" name="reportstartdate" value="2017-01-01" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>
                                <p>
                                    <label>End date</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportenddate" name="reportenddate" value="2017-01-23" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>
                                <tr>
                                    <td>Exclude Account Updates by Card Type</td>
                                    <td><input type="checkbox" name="excludeDataSet_cardUpdatesWithDisplayableVariant" id="excludeDataSet_cardUpdatesWithDisplayableVariant"  checked="checked"  /></td>
                                </tr>

                                <div style="margin-top:20px">

                                    <button type="submit" name="format" value="JSON" class="ca-format-button" title="JavaScript Object Notation (JSON)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-4 ca-icon-file-json">JSON</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="XHTML" class="ca-format-button" title="(X)HTML Document">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-5 ca-icon-file-xhtml">XHTML</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="CSV" class="ca-format-button" title="Comma-Separated Values (CSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-csv">CSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="TSV" class="ca-format-button" title="Tab-Separated Values (TSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-tsv">TSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>

                                </div>
                            </div>
                            <input type="hidden" name="formHash" value="817V3Ml2/FCNe760MqB/wA9CFtvPTE=" />
                        </form>

                    </div>

                    <script type="text/javascript">

                    </script>


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
?>