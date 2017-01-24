<?php
require_once __DIR__ . "/functions/Functions.php";

XLog::info("Payments", sprintf("Start %s:%s", __FILE__, __LINE__));

$result   = search();
$total    = $result['count'];
$result   = $result['pageInfo'];
$postInfo = getPostInfo();
?>

<!DOCTYPE html>
<!-- saved from url=(0068)file:///C:/Users/Administrator/Desktop/v2/Payssion_%20Dashboard.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->

    <title>Payssion: Payments</title>

    <!-- FullCalendar Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="./css/fullcalendar.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="./css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="./css/admin-forms.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!--private css-->
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="dashboard-page sb-l-o sb-r-c onload-check">

<!-------------------------------------------------------------+
  <body> Helper Classes:
---------------------------------------------------------------+
  '.sb-l-o' - Sets Left Sidebar to "open"
  '.sb-l-m' - Sets Left Sidebar to "minified"
  '.sb-l-c' - Sets Left Sidebar to "closed"

  '.sb-r-o' - Sets Right Sidebar to "open"
  '.sb-r-c' - Sets Right Sidebar to "closed"
---------------------------------------------------------------+
 Example: <body class="example-page sb-l-o sb-r-c">
 Results: Sidebar left Open, Sidebar right Closed
--------------------------------------------------------------->

<!-- Start: Main -->
<div id="main">
    <!-- Start: Header -->
    <script>
        window.intercomSettings = {
            app_id: "fjcxobf2",
            name: "lili",
            email: "lili@shinezone.com",
            phone: "13073381142",
            environment: "Live",
            created_at: 1476859724,
            state: "Active",
            app_status: "Active",
            app_created_at: 1477058099,
            balance_changed_at: 1482730052// Signup date as a Unix timestamp
        };
    </script>

    <!-- End: Header -->

    <!-----------------------------------------------------------------+
       "#sidebar_left" Helper Classes:
    -------------------------------------------------------------------+
       * Positioning Classes:
        '.affix' - Sets Sidebar Left to the fixed position

       * Available Skin Classes:
         .sidebar-dark (default no class needed)
         .sidebar-light
         .sidebar-light.light
    -------------------------------------------------------------------+
       Example: <aside id="sidebar_left" class="affix sidebar-light">
       Results: Fixed Left Sidebar with light/white background
    ------------------------------------------------------------------->
    <!-- Start: Sidebar -->
    <!-- End: Sidebar Left -->    <!-- End: Sidebar Left -->
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <!-- Start: Topbar -->
        <!-- Begin: Content -->
        <section id="content" class="table-layout" style="background-color: #fff;">
            <div class="section row">
                <div class="admin-form theme-primary mw1000 center-block">
                    <form id="search" method="post" action="payments.php">
                        <!-- .section-divider -->

                                    <input type="text" id="date_start" class="input-sm form-control"
                                           name="date_start" style="height: 42px"
                                           value="<?php echo getCurDate()['date_start']?>" placeholder="开始日期" >
                                    <
                                    <input type="text" id="date_end"
                                           name="date_end" style="height: 42px" class="input-sm form-control"
                                           value="<?php echo getCurDate()['date_end']?>" placeholder="结束日期" >
                        </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-12">
                                <label class="field select">
                                    <select id="pm_id" name="pm_id">
                                        <?php echo getSelectInfo();?>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xs-12">
                                <label class="field select">
                                    <select id="payment_state" name="payment_state">
                                        <option value="0" selected="">支付状态</option>
                                        <option value="1">已付款</option>
                                        <option value="6">未付款</option>
                                        <option value="2">付款失败</option>
                                        <option value="3">所有退款</option>
                                        <option value="4">已退款</option>
                                        <option value="5">退款处理中</option>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>
                        <div class="section row">
                            <div class="col-lg-3 col-md-3 col-xs-12" style="margin-bottom: 10px;">
                                <label class="field">
                                    <input type="text" name="payer_name" value="" class="gui-input" placeholder="付 款 人">
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12" style="margin-bottom: 10px;">
                                <label class="field">
                                    <input type="text" value="" name="transaction_id" class="gui-input" placeholder="交易号">
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12" style="margin-bottom: 10px;">
                                <label class="field">
                                    <input type="text" name="track_id" value="" class="gui-input" placeholder="track_id">
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12" style="margin-bottom: 10px;">
                                <label class="field">
                                    <input type="text" name="subtrack_id" value="" class="gui-input" placeholder="subtrack_id">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <input id="CMD" type="hidden" name="CMD" value="DOWNLOAD_TRANS_CSV">
                                <button id="searchbtn" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;搜索&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button id="downloadbtn" class="btn btn-default" style="margin-left: 15px;">下载交易记录</button>
                            </div>
                        </div>
                        <!-- end .section row section -->
                    </form>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-11 col-xs-12 search_result" style="text-align: right;">
                        共搜索到
                        <span style="color:#07c">
                            <?php echo $total;?>
                        </span>
                        条交易信息
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body pn">
                                <div class="box-body table-responsive no-padding" style="padding: 0px;margin:0px;">
                                    <table class="table table-hover table-striped" id="datatable">
                                        <thead>
                                        <tr><th>创建时间</th>
                                            <th>应用名称</th>
                                            <th>支付方式</th>
                                            <th>交易金额</th>
                                            <th>费用</th>
                                            <th>净额</th>
                                            <th>支付状态</th>
                                            <th>详情</th>
                                        </tr></thead>
                                        <tbody>
                                        <?php
                                            echo displayDetailList($result);
                                        ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="panel-footer" style="padding: 0px; text-align: right;border: 1px solid #eee;border-top: 0px;">
                                <?php echo getNavPageInfo($total); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->
</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src="./js/jquery-latest.min.js"></script>
<script src="./js/jquery-ui.min.js"></script>

<!-- Theme Javascript -->
<script src="./js/utility.js"></script>
<script src="./js/main.js"></script>

<!-- Calendar Js -->
<script type="text/javascript" src="js/calendar.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init Theme Core
        Core.init();
        /* @date picker
         ------------------------------------------------------------------ */
        $("#date_start").datepicker({
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false,
            beforeShow: function(input, inst) {
                var newclass = 'admin-form';
                var themeClass = $(this).parents('.admin-form').attr('class');
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass(themeClass)) {
                    inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                }
            }
        });
        $('#date_end').datepicker({
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false,
            beforeShow: function(input, inst) {
                var newclass = 'admin-form';
                var themeClass = $(this).parents('.admin-form').attr('class');
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass(themeClass)) {
                    inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                }
            }
        });
        $( "#downloadbtn" ).click(function() {
            $( "#CMD" ).val('DOWNLOAD_TRANS_CSV');
            $( "#search" ).submit();
        });
        $( "#searchbtn" ).click(function() {
            $( "#CMD" ).val('');
            $( "#search" ).submit();
        });

        $('.main').css("font-family", "Helvetica,Arial,sans-serif");
    });
</script>
<!-- END: PAGE SCRIPTS -->
</body></html>