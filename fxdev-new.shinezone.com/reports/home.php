<?php

?>

<!DOCTYPE html>
<!-- saved from url=(0055)https://ca-live.adyen.com/ca/ca/reports/dashboard.shtml -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"
      class="csr-t-adyen csr csr-condensed ajax-false ajax- csr-level-2 js chrome chrome55 chrome55_0 windows notouch"
      data-csr-level="2">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>High level overview - Adyen PSP System</title>

    <meta http-equiv="content-style-type" content="text/css">
    <meta http-equiv="imagetoolbar" content="no">
    <meta content="TRUE" name="MSSmartTagsPreventParsing">

    <link rel="shortcut icon" href="https://ca-live.adyen.com/ca/img/adyen/favicon.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="../ca/css/style.css">
    <link rel="stylesheet" type="text/css" href="../ca/css/csr/csr.css">
    <link rel="stylesheet" type="text/css" href="../ca/css/csr/grid.css">
    <link rel="stylesheet" type="text/css" href="../ca/css/font.css">

    <link rel="alternate" title="Payments Per Hour RSS"
          href="https://ca-live.adyen.com/reports/token/rss/lasttx/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
          type="application/rss+xml">
    <link rel="alternate" title="Authorised Volume RSS"
          href="https://ca-live.adyen.com/reports/token/rss/authorisedtxrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
          type="application/rss+xml">
    <link rel="alternate" title="System Messages RSS"
          href="https://ca-live.adyen.com/reports/token/rss/systemmessagesrss/Company/ShineZone/?user=admin%40Company.ShineZone&amp;amp%3Bkey=1481614226166&amp;amp%3Btoken=rMfe%2Fs%2F8oAugc%2B9JJVIwGoFYPfk%3D"
          type="application/rss+xml">

    <link href="../ca/css/timeline_v2.css" type="text/css" rel="stylesheet">
    <link href="../ca/css/cwfCore.css" type="text/css" rel="stylesheet">
    <link href="../ca/css/datepicker.css" type="text/css" rel="stylesheet" >

    <script type="text/javascript" async="" defer="" src="../ca/js/js.js"></script>
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
        adyen.base = adyen.base || "../ca/";
        adyen.jsbase = adyen.jsbase || "../ca/js";
        adyen.imgbase = adyen.imgbase || "../ca/img";
        adyen.cssbase = adyen.cssbase || "../ca/css";
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


        adyen.searchmodes = [
            {
                description: "Payment Search",
                type: "Payments",
                action: "/ca/ca/payments/modifySearch.shtml?uxEvent=PAYMENT_POWER_SEARCH",
                hint: "payment",
                hotKey: "p"
            }
            , {
                description: "Bank Reference Search",
                type: "Bank Reference",
                action: "/ca/ca/payments/merchantSearchOffer.shtml?uxEvent=M_OFFER_POWER_SEARCH",
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


    <!--[if lte IE 8]>
    <script src="../ca/js/lib/json2.js"></script><![endif]-->


    <script src="../ca/js/ps.pack.js" type="text/javascript"></script>
    <script type="text/javascript" src="../ca/js/pluginspack.js"></script>
    <script src="../ca/js/jquery.pack.js" type="text/javascript"></script>
    <!--[if lte IE 8]>
    <script src="../ca/js/charts.pack.ie.js?9326" type="text/javascript"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="../ca/js/charts.pack.js" type="text/javascript"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="../ca/js/adyen/adyen.pack.js" ></script>
    <script type="text/javascript" src="../ca/js/util/Browser.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/util/Ajax.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/jqueryExtended.js" data-define="true"></script>


    <script type="text/javascript" src="../ca/js/ReportsAvailableForDownload.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/QueryString.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/TopNavigation.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/FunnelMediator.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/ActionCommander.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/Timeline.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/DataFetcher.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/DataFormatter.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/ViewCreator.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/AxisComponent.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineFacade.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineEvents.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/domUtils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/observableCode.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/Dataset.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/DataConstants.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/UIConstants.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/BasicMediator.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/cssutils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/widgetScales.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/widgetAxes.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/stringutils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/uiComponentsFetcher.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timeline_v7.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineState.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineData.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineUI_v7.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/calendarUI_v7.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/object2csv.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/dateUtils_CET.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/d3utils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/formats.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/chartbase.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/appstateevents.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineConstants.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineUtils_v7.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/reformatTimeline.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/timelineControls_v7.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/formatTicks.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/svgutils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/chartBaseEvents.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/objectutils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/worldevents.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/funnelDataFormatter.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/funnelChart.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/funnelFigures.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/funnelChartRollover.js" data-define="true"></script>

    <script type="text/javascript" src="../ca/js/barChart.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/axisRollover.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/WidgetConstants.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/axisBaseView.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/baseView.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/barDrawingUtils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/lineDrawingUtils.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/tooltipCode.js" data-define="true"></script>
    <script type="text/javascript" src="../ca/js/basicTooltip.js" data-define="true"></script>
</head>


<body class="no-menu ca-with-backlink ca-chart-page ca-ft-globalsearch form-page">

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


<script type="text/javascript">
    require(['jquery', 'Constants', 'util/Ajax'], function (jq, Constants, Ajax) {
        alert('require');
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
                "formHash": "482XdDuWvPjSSyCPIXnwwmOFfYCRyE=",
                "pageUrl": "/ca/ca/reports/dashboard.shtml"
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


    <div id="contentbg">
        <div id="content">
            <div id="contentwrapper">


                <link rel="stylesheet" href="../ca/css/reporting.css" type="text/css">
                <script src="../ca/js/calendar_date_select.js" type="text/javascript"></script>

                <div id="subcontent" data-widget="pg/reportOverviewAdyenBranded" class="csr-ui-widget-bound">

                    <h1 class="ca-pagetitle">
                        High level overview
                    </h1>

                    <section class="ca-report-with-sidepanel">

                        <div class="ca-report-sidepanel">
                            <a class="csr-button-2 secondary" data-tutorial="reportsUI">Launch tutorial</a>
                        </div>


                        <div data-widget="ui/Favorites?sortable=favorites"
                             data-save-url="/ca/ca/reports/dashboard/submit.shtml?formHash=608wg2g8uANEOpxlMQjFtfjvU42Zps%3D"
                             class="ca-portal csr-2 csr-ui-widget-bound">

                            <div class="ca-report-selected">
                                <div class="ca-report-selected-margin clearfix ui-sortable"
                                     data-favorites="selectedFavorites" data-area-id="ca-reports-column">
                                    <div class="ca-report-widget-placeholder  show">
                                        <span>Select your favorite reports<br>to be listed here</span></div>
                                </div>
                            </div>

                            <link href="../ca/css/funnelReports.css" type="text/css" rel="stylesheet">

                            <script type="text/javascript">
                                adyen.config = adyen.config || {};

                                adyen.formHash = '101xj5KLKWeGq1oUctdkr6zihduOcE=';

                                adyen.config.funnelDataUrl = '/ca/ca/data/funnel/report.shtml';

                            </script>


                            <section class="ca-report-with-sidepanel funnel">

                                <div data-widget="chart/widgetFramework/composed/funnel/FunnelMediator"
                                     id="funnelMediator" class="funnel-mediator-widget csr-ui-widget-bound"
                                     data-actions="">

                                    <div id="actionCommander" data-widget="chart/widgetFramework/core/ActionCommander"
                                         data-actions="[
                                        {&quot;source&quot;:&quot;timeline1&quot;, &quot;event&quot;:&quot;timelineTimespanSet&quot;, &quot;target&quot;:&quot;funnelDataFetcher&quot;, &quot;callMethod&quot;:&quot;onTimeData&quot;}
             ]" class="csr-ui-widget-bound"></div>


                                    <div id="timeline1" data-widget="chart/widgetFramework/components/Timeline"
                                         class="funnel-timeline csr-ui-widget-bound">
                                        <div id="timelineComponent" class="timeline-component">

                                            <div id="timelineUI" class="timeline-ui">

                                                <div id="timelineModeButtonsHolder" class="mode-buttons-holder">
                                                    <button id="monthsBtn" class="csr-button mode months disabled"
                                                            data-action="">Months
                                                    </button>


                                                </div>


                                                <div id="timelineConfigUI" class="chart-options-holder timeline-config">
                                                    <table class="chart-options-table csr-table csr-data-table csr-data-input-table">
                                                        <tbody>
                                                        <tr>
                                                            <td class="chart-options-cell drop">
                                                                <div class="field-dropdown timeline">
                                                                    <select id="timelineChartGranularity"
                                                                            class="field-dropdown-select"
                                                                            name="filter.timeSliceType">

                                                                        <option class="tl-config-opt" data-rel="6"
                                                                                value="default">Show in...
                                                                        </option>
                                                                        <option class="tl-config-opt" data-rel="1"
                                                                                value="minute">Minutes
                                                                        </option>
                                                                        <option class="tl-config-opt" data-rel="2"
                                                                                value="hour">Hours
                                                                        </option>
                                                                        <option class="tl-config-opt" data-rel="3"
                                                                                value="day">Days
                                                                        </option>
                                                                        <option class="tl-config-opt" data-rel="4"
                                                                                value="week">Weeks
                                                                        </option>
                                                                        <option class="tl-config-opt" data-rel="5"
                                                                                value="month">Months
                                                                        </option>

                                                                    </select>
                                                                    <span class="icon-sort-desc"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div id="timelinePresets" class="preset-periods">


                                                    <div class="chart-options-cell">

                                                        <div class="field-dropdown timeline-presets">
                                                            <select id="timelinePresetsSelect"
                                                                    class="field-dropdown-select">

                                                                <option class="tl-preset-opt">Jump to...</option>

                                                            </select>
                                                            <span class="icon-sort-desc"></span>
                                                        </div>


                                                    </div>
                                                </div>


                                                <div id="calendarUI" class="calendar-holder calendar-ui">
                                                    <table class="csr-table csr-data-table csr-data-input-table">
                                                        <tbody>
                                                        <tr>
                                                            <td width="30px">From</td>
                                                            <td>
                                                                <input id="datepickStart" name="bdate" type="text">
                                                                <i class="icon-calendar datepick-icon"
                                                                   id="datepickStart-icon"></i>
                                                            </td>
                                                            <td width="5px"></td>
                                                            <td width="30px" class="date-picker-input-2">To</td>
                                                            <td>
                                                                <input id="datepickEnd" name="edate" type="text">
                                                                <i class="icon-calendar datepick-icon"
                                                                   id="datepickEnd-icon"></i>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="checkMessage" class="datepick-error"></div>
                                                </div>


                                            </div>


                                            <div id="timelineHolder" class="timeline-holder">
                                                <svg class="chartbase-svg timeline" width="1150" height="70">
                                                    <defs>
                                                        <filter id="f1" x="0" y="0">
                                                            <fegaussianblur in="SourceGraphic"
                                                                            stdDeviation="2 0"></fegaussianblur>
                                                        </filter>
                                                    </defs>
                                                    <g class="chartbase-holder" transform="translate(15,30)">
                                                        <g class="x axis" transform="translate(0,-20)">
                                                            <g class="tick" transform="translate(0,0)"
                                                               style="opacity: 1; display: block;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;">2016
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(84.78142076770837,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(175.40983607112076,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(263.1147541066812,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(353.7431694100936,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(441.4480874456539,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(532.0765027490664,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(622.7049180524788,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(710.4098360880392,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(801.0382513914515,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(888.7431694270119,0)"
                                                               style="opacity: 1; display: none;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(979.3715847304243,0)"
                                                               style="opacity: 1; display: block;">
                                                                <line y2="20" x2="0"></line>
                                                                <text dy=".71em" y="5" x="0" dx="6"
                                                                      style="text-anchor: start;">2017
                                                                </text>
                                                            </g>
                                                            <path class="domain" d="M0,20V0H1070V20"></path>
                                                        </g>
                                                        <g class="y axis"></g>
                                                        <g class="block" transform="translate(0,0)">
                                                            <rect class="date-box" x="3" y="3" width="78.78142076770837"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="42.390710383854184"
                                                                  y="22.5" text-anchor="middle">Feb
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(84.78142076770837,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.6284153034124"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.3142076517062"
                                                                  y="22.5" text-anchor="middle">Mar
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(175.40983607112076,0)">
                                                            <rect class="date-box" x="3" y="3" width="81.70491803556041"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="43.852459017780205"
                                                                  y="22.5" text-anchor="middle">Apr
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(263.1147541066812,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.62841530341245"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.314207651706226"
                                                                  y="22.5" text-anchor="middle">May
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(353.7431694100936,0)">
                                                            <rect class="date-box" x="3" y="3" width="81.7049180355603"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="43.85245901778015"
                                                                  y="22.5" text-anchor="middle">Jun
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(441.4480874456539,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.62841530341251"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.314207651706255"
                                                                  y="22.5" text-anchor="middle">Jul
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(532.0765027490664,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.62841530341234"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.31420765170617"
                                                                  y="22.5" text-anchor="middle">Aug
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(622.7049180524788,0)">
                                                            <rect class="date-box" x="3" y="3" width="81.70491803556047"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="43.852459017780234"
                                                                  y="22.5" text-anchor="middle">Sep
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(710.4098360880392,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.62841530341223"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.31420765170611"
                                                                  y="22.5" text-anchor="middle">Oct
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(801.0382513914515,0)">
                                                            <rect class="date-box" x="3" y="3" width="81.70491803556047"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="43.852459017780234"
                                                                  y="22.5" text-anchor="middle">Nov
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(888.7431694270119,0)">
                                                            <rect class="date-box" x="3" y="3" width="84.62841530341234"
                                                                  height="29"></rect>
                                                            <text class="date-box-text month" x="45.31420765170617"
                                                                  y="22.5" text-anchor="middle">Dec
                                                            </text>
                                                        </g>
                                                        <g class="block" transform="translate(979.3715847304243,0)">
                                                            <rect class="date-box selected" x="3" y="3"
                                                                  width="83.16666666666667" height="29"></rect>
                                                            <text class="date-box-text month selected"
                                                                  x="44.583333333333336" y="22.5" text-anchor="middle">
                                                                Jan
                                                            </text>
                                                        </g>
                                                        <g class="brush"
                                                           style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                            <rect class="background" x="0" width="1070" height="35"
                                                                  style="visibility: hidden; cursor: crosshair;"></rect>
                                                            <rect class="extent" x="979.3715847304243"
                                                                  width="90.62841530341257" height="35"
                                                                  style="cursor: move; fill: none; stroke: rgb(76, 76, 76);"></rect>
                                                            <g class="resize e"
                                                               transform="translate(1070.0000000338368,0)"
                                                               style="cursor: ew-resize;">
                                                                <rect x="-3" width="6" height="6"
                                                                      style="visibility: hidden;"></rect>
                                                            </g>
                                                            <g class="resize w"
                                                               transform="translate(979.3715847304243,0)"
                                                               style="cursor: ew-resize;">
                                                                <rect x="-3" width="6" height="6"
                                                                      style="visibility: hidden;"></rect>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div><!-- #timelineHolder -->

                                            <div id="timelineControlsUI" class="timeline-controls-ui">

                                                <div id="timelineControls" class="jump-period-buttons">
                                                    <button id="jumpBackBtn" class="csr-button jump period back"
                                                            data-text="Jump timeline back" data-event="JUMP-PERIOD-BACK"
                                                            title="Select previous period" style="display: none;"><i
                                                            class="icon-chevron-left"></i>previous 31 days
                                                    </button>
                                                    <button id="jumpExtentStartBtn"
                                                            class="csr-button jump period extent-start"
                                                            title="Start timeline from start of current selection"
                                                            data-event="JUMP-PERIOD-EXTENT-START"><i
                                                            class="icon-arrow-right"></i>|
                                                    </button>
                                                    <button id="jumpExtentEndBtn"
                                                            class="csr-button jump period extent-end"
                                                            title="Start timeline from end of current selection"
                                                            data-event="JUMP-PERIOD-EXTENT-END">|<i
                                                            class="icon-arrow-left"></i></button>
                                                    <button id="jumpFwdBtn" class="csr-button jump period fwd"
                                                            data-text="Jump timeline forward"
                                                            data-event="JUMP-PERIOD-FWD" title="Select next period"
                                                            style="display: none;">&gt;next 31 days
                                                    </button>
                                                </div>

                                                <div id="amsTimeWarning" class="ams-time-warning"
                                                     style="display: none;">Times shown are in Amsterdam CE(S)T&nbsp;&nbsp;</div>

                                                <button id="outputURL"
                                                        class="csr-button csr-link-button csr-reduce output-url"
                                                        title="Append current timeline parameters to the URL in the address bar (CTRL+U)">
                                                    Add-to-URL
                                                </button>

                                            </div>

                                            <div id="timelineLoader" class="clock-holder" style="display: none;">
                                                <div class="loader-bar"></div>
                                            </div>


                                        </div>
                                    </div>
                                    <div data-widget="chart/widgetFramework/core/DataFetcher" data-src="funnelDataUrl"
                                         id="funnelDataFetcher" class="csr-ui-widget-bound"></div>
                                    <div id="funnelDataFormatter" data-widget="chart/widgetFramework/core/DataFormatter"
                                         data-formatter="composed/funnel/funnelDataFormatter"
                                         data-dataset="funnelDataFetcher" data-timeline="timeline1"
                                         class="csr-ui-widget-bound"></div>
                                    <div class="funnel-view-holder">
                                        <div data-widget="chart/widgetFramework/core/ViewCreator"
                                             class="funnel-chart csr-ui-widget-bound" id="funnelChart"
                                             data-formatter="funnelDataFormatter" data-timeline="timeline1"
                                             style="width: 790px; height: 620px;">
                                            <svg class="chartbase-svg funnelChart funnelChart" width="790px"
                                                 height="620px">
                                                <g class="main-group" transform="translate(100,30)">
                                                    <g class="axis-elements-holder">
                                                        <g class="x axis count" opacity="1"
                                                           transform="translate(0,560)">
                                                            <g class="tick" transform="translate(0,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">0K
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(68,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">1
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(136,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">2
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(204,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">3
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(272,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">4
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(340,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">5
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(408,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">6
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(476,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">7
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(544,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">8
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(612,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">9
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(680,0)"
                                                               style="opacity: 1; visibility: visible;">
                                                                <line y2="-560" x2="0"></line>
                                                                <text dy=".71em" y="3" x="0" transform="translate(0,7)"
                                                                      style="text-anchor: middle;">10
                                                                </text>
                                                            </g>
                                                            <path class="domain" d="M0,-560V0H680V-560"></path>
                                                        </g>
                                                        <g class="y axis journaltypecode" opacity="1"
                                                           transform="translate(0,0)">
                                                            <g class="tick" transform="translate(0,548.0851063829788)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Final Settled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,528.22695035461)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,508.3687943262412)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,488.5106382978724)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Chargeback
                                                                    Reversed
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,468.6524822695036)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Chargeback
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,448.7943262411348)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Refund Reversed
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,428.936170212766)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Refunded
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,409.0780141843972)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Settled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,389.2198581560284)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Sent For
                                                                    Settlement
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,369.3617021276596)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,349.5035460992908)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,329.645390070922)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,309.7872340425532)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,289.9290780141844)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Expired
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,270.07092198581563)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Cancelled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,250.21276595744683)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Authorised
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,230.35460992907804)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,210.49645390070924)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,190.63829787234044)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Error
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,170.78014184397165)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Refused
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,150.92198581560285)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Received
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,131.06382978723406)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,111.20567375886526)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,91.34751773049646)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,71.48936170212767)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,51.63120567375887)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">Abandoned
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,31.773049645390074)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">HPP
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,11.914893617021278)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" transform="translate(-5,0)"
                                                                      y="0" style="text-anchor: end;">API
                                                                </text>
                                                            </g>
                                                            <path class="domain" d="M0,0H0V560H0"></path>
                                                        </g>
                                                    </g>
                                                    <g class="chart-elements-holder">
                                                        <g class="bar" transform="translate(0,540.1418439716313)">
                                                            <rect class="final-settled" height="16" width="659"
                                                                  x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,520.2836879432625)">
                                                            <rect class="spacer2" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,500.42553191489367)">
                                                            <rect class="spacer1" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,480.56737588652487)">
                                                            <rect class="chargeback-reversed" height="16" width="0"
                                                                  x="659"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,460.7092198581561)">
                                                            <rect class="chargeback" height="16" width="0"
                                                                  x="659"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,440.8510638297873)">
                                                            <rect class="refund-reversed" height="16" width="0"
                                                                  x="659"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,420.9929078014185)">
                                                            <rect class="refunded" height="16" width="0" x="659"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,401.1347517730497)">
                                                            <rect class="settled" height="16" width="659" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,381.2765957446809)">
                                                            <rect class="sent-for-settlement" height="16" width="591"
                                                                  x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,361.4184397163121)">
                                                            <rect class="spacer11" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,341.5602836879433)">
                                                            <rect class="spacer10" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,321.7021276595745)">
                                                            <rect class="spacer9" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,301.8439716312057)">
                                                            <rect class="spacer8" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,281.9858156028369)">
                                                            <rect class="expired" height="16" width="0" x="591"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,262.1276595744681)">
                                                            <rect class="cancelled" height="16" width="0"
                                                                  x="591"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,242.26950354609932)">
                                                            <rect class="authorised" height="16" width="591"
                                                                  x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,222.41134751773052)">
                                                            <rect class="spacer13" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,202.55319148936172)">
                                                            <rect class="spacer12" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,182.69503546099293)">
                                                            <rect class="error" height="16" width="0" x="591"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,162.83687943262413)">
                                                            <rect class="refused" height="16" width="3" x="591"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,142.97872340425533)">
                                                            <rect class="received" height="16" width="594" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,123.12056737588654)">
                                                            <rect class="spacer18" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,103.26241134751774)">
                                                            <rect class="spacer17" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,83.40425531914894)">
                                                            <rect class="spacer16" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,63.54609929078015)">
                                                            <rect class="spacer15" height="16" width="0" x="0"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,43.68794326241135)">
                                                            <rect class="abandoned" height="16" width="48"
                                                                  x="594"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,23.829787234042556)">
                                                            <rect class="hpp" height="16" width="641" x="1"></rect>
                                                        </g>
                                                        <g class="bar" transform="translate(0,3.9716312056737593)">
                                                            <rect class="api" height="16" width="1" x="0"></rect>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>

                                        <div data-widget="chart/widgetFramework/core/ViewCreator"
                                             class="funnel-figures csr-ui-widget-bound" id="funnelFigures"
                                             data-formatter="funnelDataFormatter" data-timeline="timeline1"
                                             style="width: 250px; height: 620px;">


                                            <svg class="chartbase-svg funnelFigures funnelFigures" width="250px"
                                                 height="620px">
                                                <g class="main-group" transform="translate(100,30)">
                                                    <g class="axis-elements-holder">
                                                        <g class="x axis" opacity="0.000001"
                                                           transform="translate(0,0)"></g>
                                                        <g class="y axis journaltypecode" opacity="1"
                                                           transform="translate(-80,0)">
                                                            <g class="tick" transform="translate(0,548.0851063829788)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Final Settled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,528.22695035461)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,508.3687943262412)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,488.5106382978724)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Chargeback Reversed
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,468.6524822695036)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Chargeback
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,448.7943262411348)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Refund Reversed
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,428.936170212766)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Refunded
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,409.0780141843972)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Settled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,389.2198581560284)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Sent For Settlement
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,369.3617021276596)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,349.5035460992908)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,329.645390070922)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,309.7872340425532)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,289.9290780141844)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Expired
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,270.07092198581563)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Cancelled
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,250.21276595744683)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Authorised
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,230.35460992907804)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,210.49645390070924)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,190.63829787234044)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Error
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,170.78014184397165)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Refused
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,150.92198581560285)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                    Received
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,131.06382978723406)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,111.20567375886526)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,91.34751773049646)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,71.48936170212767)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;"></text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,51.63120567375887)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">Abandoned
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,31.773049645390074)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">HPP
                                                                </text>
                                                            </g>
                                                            <g class="tick" transform="translate(0,11.914893617021278)"
                                                               style="opacity: 1;">
                                                                <line x2="0" y2="0"></line>
                                                                <text dy=".32em" x="-3" y="0"
                                                                      style="text-anchor: start;">API
                                                                </text>
                                                            </g>
                                                            <path class="domain" d="M0,0H0V560H0"></path>
                                                        </g>
                                                    </g>
                                                    <g class="chart-elements-holder">
                                                        <g class="bar" transform="translate(0,540.1418439716313)">
                                                            <text class="final-settled" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                9,690
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,520.2836879432625)">
                                                            <text class="spacer2" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,500.42553191489367)">
                                                            <text class="spacer1" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,480.56737588652487)">
                                                            <text class="chargeback-reversed" x="125"
                                                                  y="7.9432624113475185" dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,460.7092198581561)">
                                                            <text class="chargeback" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,440.8510638297873)">
                                                            <text class="refund-reversed" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,420.9929078014185)">
                                                            <text class="refunded" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,401.1347517730497)">
                                                            <text class="settled" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                9,690
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,381.2765957446809)">
                                                            <text class="sent-for-settlement" x="125"
                                                                  y="7.9432624113475185" dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                8,690
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,361.4184397163121)">
                                                            <text class="spacer11" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,341.5602836879433)">
                                                            <text class="spacer10" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,321.7021276595745)">
                                                            <text class="spacer9" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,301.8439716312057)">
                                                            <text class="spacer8" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,281.9858156028369)">
                                                            <text class="expired" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,262.1276595744681)">
                                                            <text class="cancelled" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,242.26950354609932)">
                                                            <text class="authorised" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                8,690
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,222.41134751773052)">
                                                            <text class="spacer13" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,202.55319148936172)">
                                                            <text class="spacer12" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,182.69503546099293)">
                                                            <text class="error" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                0
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,162.83687943262413)">
                                                            <text class="refused" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                52
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,142.97872340425533)">
                                                            <text class="received" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 500; fill: rgb(0, 0, 0);">
                                                                8,742
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,123.12056737588654)">
                                                            <text class="spacer18" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,103.26241134751774)">
                                                            <text class="spacer17" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,83.40425531914894)">
                                                            <text class="spacer16" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,63.54609929078015)">
                                                            <text class="spacer15" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);"></text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,43.68794326241135)">
                                                            <text class="abandoned" x="125" y="7.9432624113475185"
                                                                  dy=".35em" opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                704
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,23.829787234042556)">
                                                            <text class="hpp" x="125" y="7.9432624113475185" dy=".35em"
                                                                  opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                9,431
                                                            </text>
                                                        </g>
                                                        <g class="bar" transform="translate(0,3.9716312056737593)">
                                                            <text class="api" x="125" y="7.9432624113475185" dy=".35em"
                                                                  opacity="1"
                                                                  style="text-anchor: end; font-weight: 300; fill: rgb(77, 77, 79);">
                                                                15
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>

                                        <div data-widget="chart/widgetFramework/core/ViewCreator"
                                             class="funnel-chart-rollover csr-ui-widget-bound" id="funnelChartRollover"
                                             data-formatter="funnelDataFormatter" style="width: 1020px; height: 620px;">


                                            <svg class="chartbase-svg funnelChartRollover funnelChartRollover"
                                                 width="1020px" height="620px"
                                                 style="background-color: rgba(0, 0, 0, 0);">
                                                <g class="main-group" transform="translate(100,30)">
                                                    <g class="chart-elements-holder">
                                                        <g class="bar rollover"
                                                           transform="translate(0,540.1418439716313)">
                                                            <rect data-id="final-settled" height="16"
                                                                  width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,520.2836879432625)"
                                                           style="display: none;">
                                                            <rect data-id="spacer2" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,500.42553191489367)"
                                                           style="display: none;">
                                                            <rect data-id="spacer1" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,480.56737588652487)">
                                                            <rect data-id="chargeback-reversed" height="16"
                                                                  width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,460.7092198581561)">
                                                            <rect data-id="chargeback" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,440.8510638297873)">
                                                            <rect data-id="refund-reversed" height="16"
                                                                  width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,420.9929078014185)">
                                                            <rect data-id="refunded" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,401.1347517730497)">
                                                            <rect data-id="settled" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,381.2765957446809)">
                                                            <rect data-id="sent-for-settlement" height="16"
                                                                  width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,361.4184397163121)"
                                                           style="display: none;">
                                                            <rect data-id="spacer11" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,341.5602836879433)"
                                                           style="display: none;">
                                                            <rect data-id="spacer10" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,321.7021276595745)"
                                                           style="display: none;">
                                                            <rect data-id="spacer9" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,301.8439716312057)"
                                                           style="display: none;">
                                                            <rect data-id="spacer8" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,281.9858156028369)">
                                                            <rect data-id="expired" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,262.1276595744681)">
                                                            <rect data-id="cancelled" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,242.26950354609932)">
                                                            <rect data-id="authorised" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,222.41134751773052)"
                                                           style="display: none;">
                                                            <rect data-id="spacer13" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,202.55319148936172)"
                                                           style="display: none;">
                                                            <rect data-id="spacer12" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,182.69503546099293)">
                                                            <rect data-id="error" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,162.83687943262413)">
                                                            <rect data-id="refused" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,142.97872340425533)">
                                                            <rect data-id="received" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,123.12056737588654)"
                                                           style="display: none;">
                                                            <rect data-id="spacer18" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,103.26241134751774)"
                                                           style="display: none;">
                                                            <rect data-id="spacer17" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,83.40425531914894)"
                                                           style="display: none;">
                                                            <rect data-id="spacer16" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,63.54609929078015)"
                                                           style="display: none;">
                                                            <rect data-id="spacer15" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,43.68794326241135)">
                                                            <rect data-id="abandoned" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,23.829787234042556)">
                                                            <rect data-id="hpp" height="16" width="910"></rect>
                                                        </g>
                                                        <g class="bar rollover"
                                                           transform="translate(0,3.9716312056737593)">
                                                            <rect data-id="api" height="16" width="910"></rect>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>


                                        <div class="borders-blockers-holder">

                                            <div class="funnel-border blocker sessions-blocker"
                                                 style="top: 242px;"></div>
                                            <div class="funnel-border blocker conversion-blocker"
                                                 style="top: 380px;"></div>
                                            <div class="funnel-border blocker authorised-blocker"
                                                 style="top: 480px;"></div>
                                            <div class="funnel-border blocker settlement-blocker"
                                                 style="top: 680px;"></div>

                                            <div class="funnel-border sessions">
                                                <h2>Sessions</h2>
                                            </div>


                                            <div class="funnel-border conversion-received" style="top: 284px;">
                                                <h2>Conversion</h2>
                                            </div>


                                            <div class="funnel-border settlement" style="top: 530px;">
                                                <h2>Settlement</h2>
                                            </div>


                                        </div>


                                        <div class="reports-list">

                                            <div class="report-group ecommerce-group">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml"
                                                   class="report-item mobile-conversion disabled"
                                                   data-journaltype="hpp api" style="opacity: 1;">Mobile Conversion</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/paymentmethods2.shtml"
                                                   class="report-item hpp-pm-comparison disabled" data-journaltype="hpp"
                                                   style="opacity: 1;">HPP Payment Methods</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/overview2.shtml"
                                                   class="report-item conversion-overview disabled"
                                                   data-journaltype="hpp api" style="opacity: 1;">Conversion
                                                    Overview</a>
                                            </div>

                                            <div class="report-group conversion-group" style="top: 140px;">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/transactionsreport.shtml"
                                                   class="report-item tx-report disabled" data-journaltype="received"
                                                   style="opacity: 1;">Transaction Report</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/acquirer2.shtml"
                                                   class="report-item acquirer-conversion disabled"
                                                   data-journaltype="received" style="opacity: 1;">Acquirer
                                                    Conversion</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/riskreport.shtml"
                                                   class="report-item risk-report disabled" data-journaltype="refused"
                                                   style="opacity: 1;">Risk Report</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/retryreport.shtml"
                                                   class="report-item retry-report" data-journaltype="error"
                                                   style="opacity: 1;">Retry Report</a>
                                            </div>

                                            <div class="report-group authorised-group" style="top: 261px;">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/baselinereport.shtml"
                                                   class="report-item baseline-report disabled"
                                                   data-journaltype="authorised" style="opacity: 1;">Baseline Report</a>
                                            </div>

                                            <div class="report-group settlement-group" style="top: 377px;">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?reportCode=exchange_rate_report&amp;configure=true"
                                                   data-dialog="yes" class="report-item exchange-rate disabled"
                                                   data-journaltype="settled" style="opacity: 1;">Exchange Rate
                                                    Report</a>
                                                <a class="report-item chargeback-report disabled"
                                                   data-journaltype="chargeback"
                                                   href="https://ca-live.adyen.com/ca/ca/risk/chargebackreport2.shtml"
                                                   style="opacity: 1;">Chargeback Report</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/ecpreport.shtml"
                                                   class="report-item ecp-report disabled" data-journaltype="chargeback"
                                                   style="opacity: 1;">ECP Report</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/mfpreport.shtml"
                                                   class="report-item mfp-report disabled" data-journaltype="chargeback"
                                                   style="opacity: 1;">MFP Report</a>
                                            </div>

                                            <div class="report-group final-group" style="top: 514px;">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=daily_finance_report&amp;configure=true"
                                                   data-dialog="yes" class="report-item daily-finance disabled"
                                                   data-journaltype="final-settled" style="opacity: 1;">Daily Finance
                                                    Report</a>
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=monthly_finance_report&amp;configure=true"
                                                   data-dialog="yes" class="report-item monthly-finance disabled"
                                                   data-journaltype="final-settled" style="opacity: 1;">Monthly Finance
                                                    Report</a>
                                            </div>

                                        </div>


                                        <div class="funnel-explain">This chart shows Tx volumes from the Monthly Finance
                                            Report. It also shows where other reports fit within the payment process.
                                        </div>


                                    </div>

                                </div>


                            </section>

                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-Performance"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#Performance-6?userPreference=Rep-Performance-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    Performance
                                </h2>


                                <div class="ca-report-widget-container clearfix" id="Performance-6"
                                     data-favorites="Performance">


                                    <div class="csr-col three a">
                                        <div data-id="accountupdate_report"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Account updater">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=accountupdate_report"
                                                   data-dialog="yes">
                                                    Account updater
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Category breakdown of account updater results">
                                                Category breakdown of account updater results
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=accountupdate_report"
                                                   data-dialog="yes">
                                                    Download
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="retryreport" class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Auto-retries">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/retryreport.shtml">
                                                    Auto-retries
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of the flow of automatically retried transactions through the original and retry acquirers">
                                                Overview of the flow of automatically retried transactions through the
                                                original and retry acquirers
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="acquirerconversion"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Card acquirer authorizations">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/acquirer2.shtml">
                                                    Card acquirer authorizations
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of the authorization rate performance of all acquirers and BINs">
                                                Overview of the authorization rate performance of all acquirers and BINs
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="main_conversion_overview"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="HPP conversion">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/overview2.shtml">
                                                    HPP conversion
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of sessions and transactions initiated through the HPP and directory lookup">
                                                Overview of sessions and transactions initiated through the HPP and
                                                directory lookup
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="hpp_conversion_detail_report"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="HPP conversion details">
                                                HPP conversion details
                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Conversion totals per skin code, payment method, device and browser">
                                                Conversion totals per skin code, payment method, device and browser
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=hpp_conversion_detail_report&amp;configure=true">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="hpp_conversion_detail_report"><span
                                                        title="1">1</span></span>
                                                </a>

                                                <a class="csr-button ca-report-button" data-dialog="true"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/configureschedule.shtml?reportCode=hpp_conversion_detail_report%20#subscribe-hpp_conversion_detail_report">
                                                    Subscribe
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="hpp_payment_method_comparison"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="HPP payment method comparison">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/paymentmethods2.shtml">
                                                    HPP payment method comparison
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Payment method breakdown for transactions initiated through the HPP and directory lookup">
                                                Payment method breakdown for transactions initiated through the HPP and
                                                directory lookup
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="mobileconversion"
                                             class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Mobile conversion">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml">
                                                    Mobile conversion
                                                    [ECOM]
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of sessions and transactions initiated through the mobile HPP and directory lookup">
                                                Overview of sessions and transactions initiated through the mobile HPP
                                                and directory lookup
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="harp_report" class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Optimization explorer">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/optimizationexplorer.shtml">
                                                    Optimization explorer
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Discover optimization opportunities through custom authorization rate breakdowns">
                                                Discover optimization opportunities through custom authorization rate
                                                breakdowns
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="harp_builder" class="ca-report-widget ca-reportgroup-Performance">

                                            <h3 class="ca-report-name" title="Optimization explorer builder">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/harpreportbuilder.shtml">
                                                    Optimization explorer builder
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Tool to create customized optimization explorer trees.">
                                                Tool to create customized optimization explorer trees.
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-Risk"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#Risk-4?userPreference=Rep-Risk-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    Risk
                                </h2>


                                <div class="ca-report-widget-container clearfix" id="Risk-4" data-favorites="Risk">


                                    <div class="csr-col three a">
                                        <div data-id="chargebackreport2" class="ca-report-widget ca-reportgroup-Risk">

                                            <h3 class="ca-report-name" title="Chargeback">
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/chargebackreport2.shtml">
                                                    Chargeback
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of transactions that resulted in a chargeback or notification of fraud">
                                                Overview of transactions that resulted in a chargeback or notification
                                                of fraud
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="dispute_report" class="ca-report-widget ca-reportgroup-Risk">

                                            <h3 class="ca-report-name" title="Dispute transaction details">
                                                Dispute transaction details
                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Disputed transactions, including dispute reason details">
                                                Disputed transactions, including dispute reason details
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=dispute_report&amp;configure=true">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="dispute_report"><span
                                                        title="1">1</span></span>
                                                </a>

                                                <a class="csr-button ca-report-button" data-dialog="true"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/configureschedule.shtml?reportCode=dispute_report%20#subscribe-dispute_report">
                                                    Subscribe
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="mainreport" class="ca-report-widget ca-reportgroup-Risk">

                                            <h3 class="ca-report-name" title="Risk">
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/riskreport.shtml">
                                                    Risk
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of the performance of RevenueProtect">
                                                Overview of the performance of RevenueProtect
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="ecpreport" class="ca-report-widget ca-reportgroup-Risk">

                                            <h3 class="ca-report-name" title="Visa/MC chargeback programs report (ECP)">
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/ecpreport.shtml">
                                                    Visa/MC chargeback programs report (ECP)
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Indication of ECP program status based on chargeback performance">
                                                Indication of ECP program status based on chargeback performance
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="mfpreport" class="ca-report-widget ca-reportgroup-Risk">

                                            <h3 class="ca-report-name"
                                                title="Visa/MC merchant fraud programs report (MFP)">
                                                <a href="https://ca-live.adyen.com/ca/ca/risk/mfpreport.shtml">
                                                    Visa/MC merchant fraud programs report (MFP)
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Indication of MFP program status based on chargeback performance">
                                                Indication of MFP program status based on chargeback performance
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-Downloads"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#Downloads-5?userPreference=Rep-Downloads-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    Downloads
                                </h2>

                                <a style="position:absolute;right: 40px; top: 0px;z-index:100; line-height: 32px; font-size: 12px"
                                   href="https://ca-live.adyen.com/ca/ca/reports/download.shtml" data-dialog="yes">Show
                                    all downloads</a>

                                <div class="ca-report-widget-container clearfix" id="Downloads-5"
                                     data-favorites="Downloads">


                                    <div class="csr-col three a">
                                        <div data-id="invoice-pdf" class="ca-report-widget ca-reportgroup-Downloads">

                                            <h3 class="ca-report-name" title="Invoice PDF">
                                                Invoice PDF
                                            </h3>

                                            <div class="ca-report-description" title="">

                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/download.shtml?reportSet=Invoice-PDF">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="Invoice-PDF"><span
                                                        title="1">1</span></span>
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-Finance"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#Finance-2?userPreference=Rep-Finance-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    Finance
                                </h2>


                                <div class="ca-report-widget-container clearfix" id="Finance-2"
                                     data-favorites="Finance">


                                    <div class="csr-col three a">
                                        <div data-id="chart_baseline_report"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Baseline">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/baselinereport.shtml">
                                                    Baseline
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Authorization rate for received transactions: baseline authorization rate, transactions by volume, aggregations by month.">
                                                Authorization rate for received transactions: baseline authorization
                                                rate, transactions by volume, aggregations by month.
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="daily_finance_report"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Daily finance">
                                                Daily finance
                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Daily financial summary, with detailed reporting on payments by status, open balances, and payout details">
                                                Daily financial summary, with detailed reporting on payments by status,
                                                open balances, and payout details
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=daily_finance_report&amp;configure=true">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="daily_finance_report"
                                                        style="display: none;"><span title=""></span></span>
                                                </a>

                                                <a class="csr-button ca-report-button" data-dialog="true"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/configureschedule.shtml?reportCode=daily_finance_report%20#subscribe-daily_finance_report">
                                                    Subscribe
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="exchange_rate_report"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Exchange rate">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=exchange_rate_report"
                                                   data-dialog="yes">
                                                    Exchange rate
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Currency and exchange rate information for all supported currencies">
                                                Currency and exchange rate information for all supported currencies
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=exchange_rate_report"
                                                   data-dialog="yes">
                                                    Download
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="payments_accounting_report_filtered"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Interactive payment accounting">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=payments_accounting_report_filtered"
                                                   data-dialog="yes">
                                                    Interactive payment accounting
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Transaction status change details for selected statuses">
                                                Transaction status change details for selected statuses
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=payments_accounting_report_filtered"
                                                   data-dialog="yes">
                                                    Download
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="monthly_finance_report"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Monthly finance">
                                                Monthly finance
                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Monthly financial summary, with detailed reporting on payments by status, open balances, and payout details">
                                                Monthly financial summary, with detailed reporting on payments by
                                                status, open balances, and payout details
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=monthly_finance_report&amp;configure=true">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="monthly_finance_report"><span
                                                        title="4">4</span></span>
                                                </a>

                                                <a class="csr-button ca-report-button" data-dialog="true"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/configureschedule.shtml?reportCode=monthly_finance_report%20#subscribe-monthly_finance_report">
                                                    Subscribe
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="netfx" class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="NETFX">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=netfx"
                                                   data-dialog="yes">
                                                    NETFX
                                                </a>

                                            </h3>

                                            <div class="ca-report-description" title="NETFX">
                                                NETFX
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/download.shtml?reportSet=netfx">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="netfx" style="display: none;"><span
                                                        title=""></span></span>
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="payments_accounting_report"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Payment accounting">
                                                Payment accounting
                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Transaction status change details">
                                                Transaction status change details
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button" data-dialog="yes"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/queue.shtml?reportCode=payments_accounting_report&amp;configure=true">
                                                    Download <span
                                                        class="csr-fcolor-medium-grey ca-number-of-available-reports"
                                                        data-download-available="payments_accounting_report"><span
                                                        title="1">1</span></span>
                                                </a>

                                                <a class="csr-button ca-report-button" data-dialog="true"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/configureschedule.shtml?reportCode=payments_accounting_report%20#subscribe-payments_accounting_report">
                                                    Subscribe
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                        <div data-id="transactionsreport"
                                             class="ca-report-widget ca-reportgroup-Finance">

                                            <h3 class="ca-report-name" title="Transactions">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/transactionsreport.shtml">
                                                    Transactions
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Overview of current and historical authorization rate performance for all transactions">
                                                Overview of current and historical authorization rate performance for
                                                all transactions
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-UserManagement"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#UserManagement-3?userPreference=Rep-UserManagement-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    User Management
                                </h2>


                                <div class="ca-report-widget-container clearfix" id="UserManagement-3"
                                     data-favorites="UserManagement">


                                    <div class="csr-col three a">
                                        <div data-id="company_users"
                                             class="ca-report-widget ca-reportgroup-UserManagement">

                                            <h3 class="ca-report-name" title="Users within a company">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=company_users"
                                                   data-dialog="yes">
                                                    Users within a company
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Reports on the users of a company">
                                                Reports on the users of a company
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=company_users"
                                                   data-dialog="yes">
                                                    Download
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                            <div class="ca-reports-list animate-size clearfix ca-reportgroup-Deprecated"
                                 style="position:relative">

                                <h2 class="ca-report-group-name js-track-uncollapse-deprecated-panel ui-collapse-bound csr-collapse-link csr-uncollapsed"
                                    data-collapse="#Deprecated-1?userPreference=Rep-Deprecated-C"><i
                                        class="csr-collapse-caret icon-caret-up"></i>
                                    Deprecated
                                </h2>


                                <div style="" class="ca-report-widget-container clearfix" id="Deprecated-1"
                                     data-favorites="Deprecated">

                                    <div class="deprecation-notice dashboard-notice">
                                        The charts &amp; reports in this section will be deprecated as of January 2017.
                                    </div>


                                    <div class="csr-col three a">
                                        <div data-id="conversionoptimization_report"
                                             class="ca-report-widget ca-reportgroup-Deprecated">

                                            <h3 class="ca-report-name" title="Conversion optimization report">
                                                <a href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=conversionoptimization_report"
                                                   data-dialog="yes">
                                                    Conversion optimization report
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Will be replaced by: auto-retries, RevenueAccelerate">
                                                Will be replaced by: auto-retries, RevenueAccelerate
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <a class="csr-button ca-report-button"
                                                   href="https://ca-live.adyen.com/ca/ca/reports/choose.shtml?configure=true&amp;reportCode=conversionoptimization_report"
                                                   data-dialog="yes">
                                                    Download
                                                </a>


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="mobileshareconversion"
                                             class="ca-report-widget ca-reportgroup-Deprecated">

                                            <h3 class="ca-report-name" title="Mobile authorisation share">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/mobileshare.shtml">
                                                    Mobile authorisation share
                                                    [ECOM]
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Will be replaced by: mobile conversion">
                                                Will be replaced by: mobile conversion
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="csr-col three a">
                                        <div data-id="skinconversion"
                                             class="ca-report-widget ca-reportgroup-Deprecated">

                                            <h3 class="ca-report-name" title="Skin Comparison">
                                                <a href="https://ca-live.adyen.com/ca/ca/conversion/selectskins.shtml">
                                                    Skin Comparison
                                                    [ECOM]
                                                </a>

                                            </h3>

                                            <div class="ca-report-description"
                                                 title="Will be replaced by: HPP conversion">
                                                Will be replaced by: HPP conversion
                                            </div>

                                            <div class="ca-report-controls  clearfix">


                                                <i class="icon-star" title="Remove from favorites"
                                                   data-favorites-action="unfavorite"></i>
                                                <i class="icon-star-o" title="Add to favorites"
                                                   data-favorites-action="favorite"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="csr-clear"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <script type="text/javascript">
                    adyen.config = adyen.config || {};
                    adyen.config.downloadableReportsUrl = "/ca/ca/reports/download/json.shtml";
                    require(['ca/reports/ReportsAvailableForDownload'], function (ad) {
                        ad.init();
                    });
                </script>


                <script type="text/javascript">
                    define('pg/reportOverviewAdyenBranded', ['jquery', 'util/Analytics', 'Constants'], function (jQuery, Analytics, Constants) {

                        jQuery(window).load(function () {

                            var track = jQuery('[class*="js-track-"]');
                            if (track.length > 0) {
                                track.each(function () {
                                    var el = jQuery(this);
                                    var action = el.attr('class').match(/js\-track\-[a-zA-Z0-9-]+/g)[0];
                                    if (action) {
                                        action = ("" + action).replace('js-track-', '');

                                        el.click(function (e) {
                                            console.log(action);
                                            Analytics.trackEvent('reportOverviewAdyenBranded', action);
                                        });
                                    }
                                });
                            }

                        });

                        return function () {
                        };

                    });
                </script>


                <div class="bbarl">
                    <div class="bbarr">
                        <div class="bbar">
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                require(['util/Analytics'], function (A) {
                    A.pageView({label: document.title, url: document.location.pathname, user_level: 'C'});
                });
            </script>


            <script type="text/javascript">
                var _paq = _paq || [];
                (function (d) {
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
                    var g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                    g.type = 'text/javascript';
                    g.async = true;
                    g.defer = true;
                    g.src = '/ca/ua/js';
                    s.parentNode.insertBefore(g, s);
                    require(['jquery', 'util/Analytics'], function (jq, Analytics) {
                        Analytics.addTracker(function (cat, act, name, val) {
                            _paq.push(['trackEvent', cat, act, name, val]);
                        });
                        jq(window).keydown(function (evt) {
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
                        _paq.push(['trackEvent', 'JS', 'Error', msg + '@' + url + ':' + (lineNo || '?') + ',' + (columnNo || '?')]);
                        if (typeof oldOnError === "function") {
                            return oldOnError(msg, url, lineNo, columnNo, error);
                        }
                        return false;
                    };
                })(document);
            </script>
            <noscript>&lt;p&gt;&lt;img src="/ca/ua?idsite=1&amp;action_name=High+level+overview" style="border:0;"
                alt="" /&gt;&lt;/p&gt;</noscript>


        </div>
    </div>
</div>


<div id="chartRolloverHolder" class="widget-tooltip"
     style="position: absolute; pointer-events: none; top: 504.936px; left: 464px; opacity: 0;">
    <div class="baseline-rollover-tooltip d3-tip n">
        <div class="tooltip-holder">
            <table>
                <tbody>
                <tr>
                    <td class="tooltip-value">Error:</td>
                </tr>
                <tr>
                    <td>
                        <div>A payment attempt was validated and received correctly, but an error occurred while
                            communicating with the financial institution.<br>The payment is assigned an error state.<br>This
                            is a final state.
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>