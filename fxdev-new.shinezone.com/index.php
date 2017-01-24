<?php
require_once __DIR__ . "/functions/Functions.php";

XLog::info("Index", sprintf("Start %s:%s", __FILE__, __LINE__));

$page = isset($_GET['page'])?$_GET['page'] : '1';
$count= getParams()['rowsPerPage'];

XLog::info("Index Params", sprintf("page:%s $count:%s", $page, $count));

$result = getPayPageInfo($page);

XLog::info("Index getPayPageInfo result", var_export($result, true));

$todayInfo = statGetTodayIncome();
$monthInfo = statGetMonthIncome();
$totalInfo = statGetAllIncome();
$remainInfo= statGetRemainIncome();

$remain    = $totalInfo['total'] - $remainInfo['amount'];
$remain    = empty($remain) ? "\$USD $remain" : "≈\$USD $remain";

$todayTotal= ($todayInfo['approximate']==1) ? "≈\$USD {$todayInfo['total']}" : "\$USD {$todayInfo['total']}";
$monthTotal= ($monthInfo['approximate']==1) ? "≈\$USD {$monthInfo['total']}" : "\$USD {$monthInfo['total']}";
$allTotal  = ($totalInfo['approximate']==1) ? "≈\$USD {$totalInfo['total']}" : "\$USD {$totalInfo['total']}";

?>

<!DOCTYPE html>
<!-- saved from url=(0068)file:///C:/Users/Administrator/Desktop/v2/Payssion_%20Dashboard.html -->
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  
  <title>Payssion: Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="css/admin-forms.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <!--private css-->
  <link rel="stylesheet" href="css/admin.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
    (function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/fjcxobf2';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
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
    <section >
      <!-- Start: Topbar -->
      
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">      
          <!-- dashboard tiles -->
          <div class="row">
            <div class="col-sm-3 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-footer br-t p12">
                  <span class="ts13">
                    今天交易
                  </span>
                </div>
                <div class="panel-body">
                  <span class="fs30 mt5 mbn">
                    <?php echo $todayTotal;?>
                    <span class="fs_usd">USD</span></span>
                  <div onclick="show_detail(this)">
                    <a class="more"><img src="./images/more.png"></a>
                  </div>
                  <ul class="list-group dropdown-persist" style="display: none">
                    <?php echo formatAccountDisplay($todayInfo['account']);?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-footer br-t p12">
                  <span class="ts13">本月交易</span>
                </div>
                <div class="panel-body">
                  <span class="fs30 mt5 mbn">
                    <?php echo $monthTotal;?>
                    <span class="fs_usd">USD</span></span>
                  <div onclick="show_detail(this)">
                    <a class="more">
                      <img src="./images/more.png"></a>
                  </div>
                  <ul class="list-group dropdown-persist" style="display: none">
                    <?php echo formatAccountDisplay($monthInfo['account']);?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-footer br-t p12">
                  <span class="ts13">
                     帐户余额
                  </span>
                </div>
                <div class="panel-body">
                  <a href="index.php" data-toggle="tooltip" title="" data-original-title="This amount is calculated on today&#39;s forex rates. Please note the amount is not what you own actually but somewhat estimated.">
                    <span class="fs30 mt5 mbn">
                      <?php echo $remain;?>
                    </span><span class="fs_usd">USD</span>
                  </a>
                  <div onclick="show_detail(this)"><a class="more"><img src="./images/more.png"></a></div>
                  <ul class="list-group dropdown-persist" style="display: none">
                    <?php echo formatAccountDisplay($monthInfo['account']);?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xl-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-footer br-t p12" style="border-top: 0px solid #ddd;">
                  <span class="ts13">帐户总收入</span>
                </div>
                <div class="panel-body">
                  <a href="index.php" data-toggle="tooltip" title="" data-original-title="This amount is calculated on today&#39;s forex rates. Please note the amount is not what you own actually but somewhat estimated.">
                    <span class="fs30 mt5 mbn">
                      <?php echo $allTotal;?>
                    </span><span class="fs_usd">USD</span>
                  </a>
                  <div onclick="show_detail(this)"><a class="more"><img src="./images/more.png"></a></div>
                  <ul class="list-group dropdown-persist" style="display: none">
                    <?php echo formatAccountDisplay($totalInfo['account']);?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Admin-panels -->
          <div class="admin-panels ui-sortable animated fadeIn">
            <div class="row">
              <!--<div class="row">-->
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-title" style="background-color: #f9f9f9;height: 50px;padding-left:15px;line-height: 50px;border: 1px solid #eee;border-bottom: 0px;font-size: 14px;">
                    <span style="font-weight:bold;">最近10笔交易</span>
                    <button onclick="window.location.href='payments.php'" class="btn btn-default pull-right" style="margin: 8px 15px ;padding: 5px 12px;">所有交易</button>
                    </div>
                    <div class="panel-body pn">
                      <div class="box-body table-responsive no-padding" style="padding: 0px;margin:0px;">
                      <table class="table table-hover table-striped" id="datatable">
                        <thead>
                          <tr><th>创建时间</th>
                          <th>应用名称</th>
                          <th>支付方式</th>
                          <th>交易金额</th>
                          <th>支付状态</th>
                          <th>详情</th>
                        </tr></thead>
                       <tbody>
                        <?php
                            echo displayList($result);
                        ?>
                        </tbody>
                        </table>
                    </div><!-- /.box-body -->
                    </div>
                  </div>
                </div>
              <!--</div>-->
            </div>
            <!-- end: .row -->
          </div>
        </div>
        <!-- end: .tray-center -->
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

  <script type="text/javascript">
  jQuery(document).ready(function() {
      // Init Theme Core
      Core.init();
      // Init Admin Panels on widgets inside the ".admin-panels" container
      $('.admin-panels').adminpanel({
        grid: '.admin-grid',
        draggable: true,
        preserveGrid: true,
        // mobile: true,
        onStart: function() {
          // Do something before AdminPanels runs
        },
        onFinish: function() {
          $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');
        },
        onSave: function() {
          $(window).trigger('resize');
        }
      });
  })
  function show_detail(target){
    var dis = $(target).next("ul").css("display");
    if("none"==dis){
      $(target).next("ul").slideDown();
    }else{
      $(target).next("ul").slideUp();
    }
  }

jQuery(function () {
    jQuery('[data-toggle=tooltip]').tooltip();
});
  </script>
  <!-- END: PAGE SCRIPTS -->
</div>
</body>
</html>