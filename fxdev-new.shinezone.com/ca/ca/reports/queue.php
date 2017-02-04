<?php
require_once __DIR__ . "/../../../functions/Reports.php";
require_once __DIR__ . "/../payments/common.php";

/**
 * 导出hpp文件
 * @param $fileName
 */
function hpp_conversion_detail_report($fileName) {
    //导出目录结构MAP
    $map = [
        'Merchant'                   => 'account',
        'Date'                       => 'date',
        'Country'                    => 'area',
        'Payment Method'             => 'method',
        'Device'                     => 'device',
        'Device Category'            => 'devicecategory',
        'Browser'                    => 'browser',
        'Skin Code'                  => 'skincode',
        'Total Transactions'         => 'session',        //X
        'Total Amount (EN)'          => 'amount',         //X
        'Authorised'                 => 'Authorised',     //X
        'Completed'                  => 'Completed',      //X
        'Abandoned'                  => 'Abandoned',      //X
        'Redirected'                 => 'session',        //X
        'Redirected Returned'        => 'Authorised',     //X
        'Reserved1'                  => '',
        'Reserved2'                  => '',
        'Reserved3'                  => '',
        'Reserved4'                  => '',
        'Reserved5'                  => '',
        'Reserved6'                  => '',
        'Reserved7'                  => '',
        'Reserved8'                  => '',
        'Reserved9'                  => '',
        'Reserved10'                 => '',
        'Reserved11'                 => '',
        'Reserved12'                 => '',
    ];

    //调用数据
    $common = new common();
    $data = $common->getAreaSession('categoryId', '');

    //初始化，整个CSV文件
    $csvFile = $csvTitleStr = [];

    //1，生成标题
    foreach($map as $csvKey => $dbKey) {
        $csvTitleStr[] = $csvKey;
    }

    $csvFile[] = implode(',', $csvTitleStr);

    //2，生成一条数据
    foreach($data as $paymentInfo) {
        if($paymentInfo) {
            $tmp = [];
            foreach($paymentInfo as $info) {
                if(isset($tmp['session'])) {
                    $tmp['session'] += $info['session'];
                } else {
                    $tmp['session'] = $info['session'];
                }

                if(isset($tmp['amount'])) {
                    $tmp['amount'] += $info['amount'];
                } else {
                    $tmp['amount'] = $info['amount'];
                }

                $status = $info['status'];
                if(isset($tmp[$status])) {
                    $tmp[$status] += $info[$status];
                } else {
                    $tmp[$status] = $info[$status];
                }
            }

            $csvContentStr = [];
            foreach($map as $dbKey) {
                if($dbKey) {
                    if(isset($tmp[$dbKey])) {
                        $csvContentStr[] = $tmp[$dbKey];
                    } else {
                        $csvContentStr[] = $paymentInfo[0][$dbKey];
                    }
                } else {
                    $csvContentStr[] = '';
                }
            }

            $csvFile[] = implode(',', $csvContentStr);
        }
    }

//    $common->dump($csvFile);die;

    file_put_contents(DOWNLOAD_PATH . '/' . $fileName, implode(PHP_EOL, $csvFile));
}

$post  = getPostInfo();
//reportCode=hpp_conversion_detail_report&configure=true 1
//queue.php?reportCode=monthly_finance_report&amp;configure=true 2
//reportCode=payments_accounting_report&amp;configure=true 3
//queue.php?reportCode=daily_finance_report&amp;configure=true
//queue.php?reportCode=dispute_report&amp;configure=true
$endDate      = date("Y-m-d", strtotime("now"));
$startDate    = date('Y-m-d', strtotime("now -1 day"));
$reportCode   = isset($post['reportCode'])?$post['reportCode']:'';
if ($reportCode == 'hpp_conversion_detail_report')
{
    if (isset($post['reportstartdate']) && isset($post['reportenddate']) && $post['queue'] == 'true')
    {
        // reportCode : hpp_conversion_detail_report
        // reportstartdate : "2017-01-22"
        // reportenddate : "2017-01-23"
        // format : "CSV" "XLS_GEN" XML
        // queue  : true
        // HPP 文件下载 TODO 生成文件
        //var_dump($post);die;

        $format        = $post['format'];
        $fileExtension = generateFileExtension($format);
        $fileName = 'hpp_conversion_detail_report_' . date('Y_m_d') . '.' . $fileExtension;

        //开始组装数据，生成文件 |TODO目前只有CSV
        hpp_conversion_detail_report($fileName, $fileExtension, $format);

        $data = [
            'FileName' => $fileName,
            'Type'     => 'hpp' ,
            'Status'   => 0 ,
            'CreateDate'=> date('Y-m-d H:i:s')
        ];
        insertIntoDownload($data);

        header("Location: {$_SERVER['HTTP_REFERER']}#hpp_conversion_detail_report");
    }

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
                "formHash" : "696t+PzR3xcq3AOBYs89nzde5WrAgA=",
                "pageUrl" : "/ca/ca/reports/queue.php"
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
                    <h2 class="csr-dialog-title">HPP conversion details</h2>
                    <p>Conversion totals per skin code, payment method, device and browser</p>
                    <form  action="/ca/ca/reports/queue.php"  method="POST">
                        <input type="hidden" name="reportCode" value="hpp_conversion_detail_report" />
                        <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">
                            <p>
                                <label>Day to run the report from</label>
                                <br />
                                <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportstartdate" name="reportstartdate" value="<?php echo $startDate; ?>" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                            </p>
                            <p>
                                <label>Day to run the report till</label>
                                <br />
                                <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportenddate" name="reportenddate" value="<?php echo $endDate; ?>" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                            </p>
                            <div style="margin-top:20px">

                                <button type="submit" name="format" value="CSV" class="ca-format-button" title="Comma-Separated Values (CSV)">
                                    <span class="ca-icon">
                                            <i class="icon-adyen-document"></i>
                    <span class="ca-icon-file-format-container">
                        <span class="ca-icon-file-format format-length-3 ca-icon-file-csv">CSV</span>
                    </span>
                </span>
                                    <span class="label">Generate</span>
                                </button>
                                <button type="submit" name="format" value="XLS_GEN" class="ca-format-button" title="Microsoft Excel (XLSX)">
                                    <span class="ca-icon">
                                                                    <i class="icon-adyen-document"></i>
                    <span class="ca-icon-file-format-container">
                        <span class="ca-icon-file-format format-length-4 ca-icon-file-xlsx">XLSX</span>
                    </span>
                </span>
                                    <span class="label">Generate</span>
                                </button>
                                <button type="submit" name="format" value="XML" class="ca-format-button" title="eXtensible Markup Language (XML Alternative)">
                                    <span class="ca-icon">
                                            <i class="icon-adyen-document"></i>
                    <span class="ca-icon-file-format-container">
                        <span class="ca-icon-file-format format-length-3 ca-icon-file-xml">XML</span>
                    </span>
                </span>
                                    <span class="label">Generate</span>
                                </button>

                            </div>

                            <div class="ca-queue-message"><i class="icon-clock-o"></i> This report will take some time to generate</div>

                        </div>

                        <input type="hidden" name="queue" value="true" />
                        <input type="hidden" name="formHash" value="777kpMjgIa4Zhk9GfHISbkpLTaZXNw=" />
                    </form>
                    <div class="ca-earlier-reports">
                        <h2 data-collapse=".ca-download-list?target=parent" data-collapse-style="chevron">Earlier generated reports</h2>

                        <div class="ca-download-list" data-include="/ca/ca/reports/download.php?reportSet=hpp_conversion_detail_report #subcontent">
                            <div style="position:relative"><i class="clock"></i></div>
                        </div>
                    </div>
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
} else if ($reportCode == 'monthly_finance_report') {
    if (isset($post['reportdate']) && isset($post['format']) && $post['queue'] == 'true')
    {
    // reportCode : monthly_finance_report reportCode
    // includeMerchantLevelBalances false or true
    // reportdate : "2017-01-22"
    // format XLS PDF
    // queue  : true
    // HPP 文件下载 TODO 生成文件
    //var_dump($post);die;
        $format        = $post['format'];
        $fileExtension = generateFileExtension($format);
        $data = [
            'FileName' => 'monthly_finance_report_'.date('Y_m').'.' . $fileExtension ,
            'Type'     => 'mfr' ,
            'Status'   => 0 ,
            'CreateDate'=> date('Y-m-d H:i:s')
        ];
        insertIntoDownload($data);
        header("Location: {$_SERVER['HTTP_REFERER']}#Finance-2");
    }
?>
    <!DOCTYPE html>
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
                    "formHash" : "705UsbjmOutSCRQd18Tuq5fbT9NPP8=",
                    "pageUrl" : "/ca/ca/reports/queue.shtml"
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






                        <h2 class="csr-dialog-title">Monthly finance</h2>


                        <p>Monthly financial summary, with detailed reporting on payments by status, open balances, and payout details</p>

                        <form  action="/ca/ca/reports/queue.php"  method="POST">
                            <input type="hidden" name="reportCode" value="monthly_finance_report" />
                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">

                                <p>
                                    <label>Select a day in the desired month</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportdate" name="reportdate" value="<?php echo $startDate;?>" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>
                                <p>
                                    <label>Include per-merchant balances and mutations when running on company level</label>
                                    <br />
                                    <input type="radio" id="includeMerchantLevelBalances" name="includeMerchantLevelBalances"
                                           checked  value="false" />No
                                    <input type="radio" id="includeMerchantLevelBalances" name="includeMerchantLevelBalances"
                                           value="true" />Yes
                                </p>

                                <div style="margin-top:20px">

                                    <button type="submit" name="format" value="XLS" class="ca-format-button" title="Microsoft Excel (XLS)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-xls">XLS</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="PDF" class="ca-format-button" title="Portable Document Format (PDF)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-pdf">PDF</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>

                                </div>

                                <div class="ca-queue-message"><i class="icon-clock-o"></i> This report will take some time to generate</div>

                            </div>

                            <input type="hidden" name="queue" value="true" />
                            <input type="hidden" name="formHash" value="818Kk3FIWWGXbYmg6HdHpgduWgdN8k=" />
                        </form>
                        <div class="ca-earlier-reports">
                            <h2 data-collapse=".ca-download-list?target=parent" data-collapse-style="chevron">Earlier generated reports</h2>
                            <div class="ca-download-list" data-include="/ca/ca/reports/download.php?reportSet=monthly_finance_report #subcontent">
                                <div style="position:relative"><i class="clock"></i></div>
                            </div>
                        </div>
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
} else if ($reportCode == 'payments_accounting_report') {
    //这里是服务于Payment accounting这里的下载内容
//    ["reportCode"]=>
//  string(26) "payments_accounting_report"
//    ["reportdate"]=>
//  string(10) "2017-01-23"
//    ["format"]=>
//  string(3) "CSV"
//    ["queue"]=>
//  string(4) "true"
//    ["formHash"]=>
//  string(31) "274uZ2ag+MspZKehj2l/QH2OwcUe1g="

    if(isset($_POST['reportdate']) && isset($_POST['reportCode'])) {
        //导出目录结构MAP
        $map = [
            'Company Account'                           => 'CompanyAccount',
            'Merchant Account'                          => 'MerchantAccount',
            'Psp Reference'                             => 'PspReferenceId',
            'Merchant Reference'                        => 'MerchantReferenceId',
            'Payment Method'                            => 'PaymentMethod',
            'Booking Date'                              => 'BookingDate',
            'TimeZone'                                  => 'TimeZone',
            'Main Currency'                             => 'MainCurrency',
            'Main Amount'                               => 'MainAmount',
            'Record Type'                               => 'RecordType',
            'Payment Currency'                          => 'PaymentCurrency',
            'Received (PC)'                             => 'ReceivedPC',
            'Authorised (PC)'                           => 'AuthorisedPC',
            'Captured (PC)'                             => 'CapturedPC',
            'Settlement Currency'                       => 'SettlementCurrency',
            'Payable (SC)'                              => 'PayableSC',
            'Commission (SC)'                           => 'CommissionSC',
            'Markup (SC)'                               => 'MarkupSC',
            'Scheme Fees (SC)'                          => 'SchemeFeesSC',
            'Interchange (SC)'                          => 'InterchangeSC',
            'Processing Fee Currency'                   => 'ProcessingFeeCurrency',
            'Processing Fee (FC)'                       => 'ProcessingFeeFC',
            'User Name'                                 => 'UserName',
            'Payment Method Variant'                    => 'PaymentMethodVariant',
            'Issuer Country'                            => 'IssuerCountry',
            'Shopper Country'                           => 'ShopperCountry',
            'Modification Merchant Reference'           => 'ModificationMerchantReference',
            'Settlement Batch'                          => 'SettlementBatch',
            'Unique Terminal Id'                        => 'UniqueTerminalID',
            'Payable Booking Date'                      => 'PayableBookingDate',
            'Reserved8'                                 => 'Reserved8',
            'Reserved9'                                 => 'Reserved9',
            'Reserved10'                                => 'Reserved10',
        ];

        //调用数据
        $common = new common();

        $reportstartdate    = $_POST['reportdate'];
        $format             = $_POST['format'];//TODO

        if(isset($_POST['reportdate']) && $_POST['reportdate']) {
            $where = "BookingDate <= :reportenddate";
            $parameters = [
                'reportenddate' => $reportstartdate,
            ];

            $data = $common->getOrderListByConditionAndSql($where, $parameters);
            if($data) {
                //初始化，整个CSV文件
                $csvFile = $csvTitleStr = [];

                //1，生成标题
                foreach($map as $csvKey => $dbKey) {
                    $csvTitleStr[] = $csvKey;
                }

                $csvFile[] = implode(',', $csvTitleStr);

                //生成内容

                foreach($data as $paymentInfo) {
                    $csvContentStr = [];
                    foreach($map as $dbKey) {
                        $csvContentStr[] = $paymentInfo[$dbKey];
                    }

                    $csvFile[] = implode(',', $csvContentStr);
                }


                $format        = $post['format'];
                $fileExtension = generateFileExtension($format);
                $fileName = 'payments_accounting_report_' . date('Y_m_d') . '.' . $fileExtension;

                //生成文件
                file_put_contents(DOWNLOAD_PATH . '/' . $fileName, implode(PHP_EOL, $csvFile));

                $data = [
                    'FileName' => $fileName,
                    'Type'     => 'par' ,
                    'Status'   => 0 ,
                    'CreateDate'=> date('Y-m-d H:i:s')
                ];
                insertIntoDownload($data);
            }
        }

        header("Location: {$_SERVER['HTTP_REFERER']}#hpp_conversion_detail_report");
    }
?>

    <!DOCTYPE html>

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
                    "formHash" : "742fG2ETm/6x/uFyV/jplyVKN5KvEc=",
                    "pageUrl" : "/ca/ca/reports/queue.shtml"
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






                        <h2 class="csr-dialog-title">Payment accounting</h2>


                        <p>Transaction status change details</p>

                        <form  action="/ca/ca/reports/queue.php"  method="POST">
                            <input type="hidden" name="reportCode" value="payments_accounting_report" />


                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">

                                <p>
                                    <label>Day to run the report for</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportdate" name="reportdate" value="2017-01-23" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>

                                <div style="margin-top:20px">

                                    <button type="submit" name="format" value="CSV" class="ca-format-button" title="Comma-Separated Values (CSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-csv">CSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="XLS_GEN" class="ca-format-button" title="Microsoft Excel (XLSX)">
                                        <span class="ca-icon">
                                                                        <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-4 ca-icon-file-xlsx">XLSX</span>
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

                                <div class="ca-queue-message"><i class="icon-clock-o"></i> This report will take some time to generate</div>

                            </div>

                            <input type="hidden" name="queue" value="true" />
                            <input type="hidden" name="formHash" value="274uZ2ag+MspZKehj2l/QH2OwcUe1g=" />
                        </form>

                        <div class="ca-earlier-reports">
                            <h2 data-collapse=".ca-download-list?target=parent" data-collapse-style="chevron">Earlier generated reports</h2>

                            <div class="ca-download-list" data-include="/ca/ca/reports/download.php?reportSet=payments_accounting_report #subcontent">
                                <div style="position:relative"><i class="clock"></i></div>
                            </div>
                        </div>
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
                <noscript><p><img src="/ca/ua?idsite=1&action_name=Report+Parameters" style="border:0;" alt="" /></p></noscript>


            </div>
        </div>
    </div>


    </body>
    </html>

<?php
} else if ($reportCode == 'daily_finance_report') {
//reportCode daily_finance_report
//reportdate
//format  PDF XLS TODO 生成文件
    if (isset($post['reportdate']) && isset($post['format']) && $post['queue'] == 'true')
    {
        //主要服务Finance - Daily finance
        //reportCode:daily_finance_report
        //reportdate:2017-01-22
        //format:XLS
        //queue:true
        //formHash:0907bALHEeCjCpxNNtQb/svxaIJ85Y=

        $format        = $post['format'];

        //生成文件


        //存入文件log
        $fileExtension = generateFileExtension($format);
        $data = [
            'FileName' => 'daily_finance_report_'.date('Y_m_d').'.'. $fileExtension,
            'Type'     => 'dfr' ,
            'Status'   => 0 ,
            'CreateDate'=> date('Y-m-d H:i:s')
        ];
        insertIntoDownload($data);
        header("Location: {$_SERVER['HTTP_REFERER']}#Finance-2");
    }
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
                    "formHash" : "246QHeAGEI65MKGhf+byEBT2CIn5Dk=",
                    "pageUrl" : "/ca/ca/reports/queue.php"
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
                        <h2 class="csr-dialog-title">Daily finance</h2>
                        <p>Daily financial summary, with detailed reporting on payments by status, open balances, and payout details</p>
                        <form  action="/ca/ca/reports/queue.php"  method="POST">
                            <input type="hidden" name="reportCode" value="daily_finance_report" />
                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">
                                <p>
                                    <label>Select a day in the desired month</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportdate" name="reportdate" value="2017-01-22" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>

                                <div style="margin-top:20px">

                                    <button type="submit" name="format" value="XLS" class="ca-format-button" title="Microsoft Excel (XLS)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-xls">XLS</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="PDF" class="ca-format-button" title="Portable Document Format (PDF)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-pdf">PDF</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>
                                </div>
                                <div class="ca-queue-message"><i class="icon-clock-o"></i> This report will take some time to generate</div>
                            </div>
                            <input type="hidden" name="queue" value="true" />
                            <input type="hidden" name="formHash" value="0907bALHEeCjCpxNNtQb/svxaIJ85Y=" />
                        </form>
                        <div class="ca-earlier-reports">
                            <h2 data-collapse=".ca-download-list?target=parent" data-collapse-style="chevron">Earlier generated reports</h2>

                            <div class="ca-download-list" data-include="/ca/ca/reports/download.php?reportSet=daily_finance_report #subcontent">
                                <div style="position:relative"><i class="clock"></i></div>
                            </div>
                        </div>
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
//Dispute transaction details
//reportCode:dispute_report
else if ($reportCode == 'dispute_report') {
    //reportCode  dispute_report TODO 生成文件
    //reportdate  2017-01-22
    //format      CSV XLS_GEN TSV
    //queue       true
    if (isset($post['reportdate']) && isset($post['format']) && $post['queue'] == 'true')
    {
        $format        = $post['format'];
        $fileExtension = generateFileExtension($format);
        $data = [
            'FileName' => 'dispute_report_'.date('Y_m_d').'.'. $fileExtension,
            'Type'     => 'dispute' ,
            'Status'   => 0 ,
            'CreateDate'=> date('Y-m-d H:i:s')
        ];
        insertIntoDownload($data);
        header("Location: {$_SERVER['HTTP_REFERER']}#Risk-4");
    }
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
                    "formHash" : "424Sh39JOqZ2RrRa6H1nITV//kea7I=",
                    "pageUrl" : "/ca/ca/reports/queue.php"
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
                        <h2 class="csr-dialog-title">Dispute transaction details</h2>
                        <p>Disputed transactions, including dispute reason details</p>
                        <form  action="/ca/ca/reports/queue.php"  method="POST">
                            <input type="hidden" name="reportCode" value="dispute_report" />
                            <div class="ca-report-params-popup" data-dialog-class="ca-report-params-popup">
                                <p>
                                    <label>Day to run the report for</label>
                                    <br />
                                    <input class="csr-input-2" placeholder="yyyy-MM-dd" style="width:100%" type="text" id="reportdate" name="reportdate" value="2017-01-22" data-dateinput='{"min":"-10y","max":"+10y"}'/>
                                </p>

                                <div style="margin-top:20px">

                                    <button type="submit" name="format" value="CSV" class="ca-format-button" title="Comma-Separated Values (CSV)">
                                        <span class="ca-icon">
                                                <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-3 ca-icon-file-csv">CSV</span>
                        </span>
                    </span>
                                        <span class="label">Generate</span>
                                    </button>


                                    <button type="submit" name="format" value="XLS_GEN" class="ca-format-button" title="Microsoft Excel (XLSX)">
                                        <span class="ca-icon">
                                                                        <i class="icon-adyen-document"></i>
                        <span class="ca-icon-file-format-container">
                            <span class="ca-icon-file-format format-length-4 ca-icon-file-xlsx">XLSX</span>
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
                                <div class="ca-queue-message"><i class="icon-clock-o"></i> This report will take some time to generate</div>
                            </div>
                            <input type="hidden" name="queue" value="true" />
                            <input type="hidden" name="formHash" value="310Br/SsJ/LA47qoK3Pxo+XneilQr8=" />
                        </form>

                        <div class="ca-earlier-reports">
                            <h2 data-collapse=".ca-download-list?target=parent" data-collapse-style="chevron">Earlier generated reports</h2>

                            <div class="ca-download-list" data-include="/ca/ca/reports/download.php?reportSet=dispute_report#subcontent">
                                <div style="position:relative"><i class="clock"></i></div>
                            </div>
                        </div>
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