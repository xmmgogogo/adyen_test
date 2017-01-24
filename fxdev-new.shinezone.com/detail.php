<?php
require_once "functions/Functions.php";

$TransactionId    = isset($_GET['id'])?$_GET['id']:'';
$TransactionInfo  = getOnePayInfo($TransactionId);
$Currency         = isset($TransactionInfo['Currency'])?$TransactionInfo['Currency']:'USD';
$Symbol           = getCurrencySymbol($Currency);
?>

<!DOCTYPE html>
<!-- saved from url=(0064)https://payssion.com/account/payments/detail?id=GB22860711857814 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <title>Payssion: payment details</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--delete one fontfamily-->
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
    <link rel="stylesheet" href="./css/main.css">
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
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/fjcxobf2';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
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
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <!-- Start: Topbar -->
        <header id="topbar" class="alt">
            <div class="topbar-left inner_title">
                <span class="inner_title_1"><span style="display: block;float: left;margin-top: 10px;">交易详情</span></span>
            </div>
        </header>
        <!-- Begin: Content -->
        <section id="content" class="table-layout" style="background-color: #fff;">
            <div class="section row">
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px;">创建时间：</div>
                    <div class="col-xs-7 col-md-10"><?php echo $TransactionInfo['CreateDate'];?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px">交易号：</div>
                    <div class="col-xs-7 col-md-10"><?php echo $TransactionInfo['TransactionId'];?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px">支付方式：</div>
                    <div class="col-xs-7 col-md-10"><?php echo getPaymentTypes()[$TransactionInfo['PaymentMethod']];?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px">交易金额：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php
                            echo $Symbol . $TransactionInfo['TotalAmount'].' ' . $Currency;
                        ?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px">实付金额：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $Symbol . $TransactionInfo['TotalAmount'].' ' . $Currency;?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding:0px">费用：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $Symbol . $TransactionInfo['FeeAmount'].' ' . $Currency;?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding:0px">净额：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $Symbol . $TransactionInfo['NetAmount'].' ' . $Currency;?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding:0px">支付状态：</div>
                    <div class="col-xs-7 col-md-10">
                        <span class="label label-primary">
                            <?php echo getStatusSymbol($TransactionInfo['Status']);?>
                        </span></div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding:0px">应用名称：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $TransactionInfo['AppName'];?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px;">track_id：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $TransactionInfo['TrackId'];?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px;">subtrack_id：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $TransactionInfo['SubTrackId'];?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="content" style="border-bottom: 1px solid #eee;font-size: 14px;color: #888;padding:15px;">
                    <div class="col-xs-5 col-md-2" style=" text-align: right;padding: 0px;">交易说明：</div>
                    <div class="col-xs-7 col-md-10">
                        <?php echo $TransactionInfo['TradeInfo'];?>
                    </div>
                    <div style="clear: both"></div>
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

<script src="./js/jquery.confirm.js"></script>

<!-- Theme Javascript -->
<script src="./js/utility.js"></script>
<script src="./js/main.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init Theme Core
        Core.init();
    })
</script>
<script type="text/javascript">
    $("#refundbtn").confirm({
        text: "Are you sure to refund this payment?",
        confirm: function(button) {
        	$( "#CMD" ).val('REFUND');
        	$( "#refundform" ).submit();
        },
        cancel: function(button) {
        },
        confirmButton: "Yes",
        cancelButton: "No"
    });
</script>
<!-- END: PAGE SCRIPTS -->
</body></html>