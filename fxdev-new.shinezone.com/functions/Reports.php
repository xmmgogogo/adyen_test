<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
//date_default_timezone_set("Asia/Shanghai");
date_default_timezone_set("CET");

require_once __DIR__ . "/Debug.php";
require_once __DIR__ . "/XLog.php";
require_once __DIR__ . '/Mysql.php';

define("DOWNLOAD_PATH", __DIR__ . "/../ca/files/");

#    指定当前使用的DB配置
define('DB_NUMBER', 3);

XLog::info("Chart", sprintf("Start %s:%s", __FILE__, __LINE__));

$sqlDBConfig = include __DIR__ . '/Config.php';

XLog::info("Chart DbConfig Info", json_encode($sqlDBConfig));

foreach($sqlDBConfig as $dbNumber => $dbInfo)
{
    DB::setConnectionInfo($dbNumber, $dbInfo['host'], $dbInfo['port'], $dbInfo['user'], $dbInfo['pwd'], $dbInfo['dbName']);
}
# DB 初始化才有意义
require_once __DIR__ . "/Tools.php";
require_once __DIR__ . "/Download.php";

//https://fxdev-new.shinezone.com/ca/ca/data/funnel/report.php?
//format=JSON&startdate=2017-01-01&enddate=2017-02-01&granularity=1+day&formHash=524tpT0f5DpNviD3xxAOTDUaIninCE%3D&cb=1484903374503
// Full texts
function statDashboard()
{
    $post     = getPostInfo();
    $startDate= isset($post['startdate'])?$post['startdate']:'2016-11-01';
    $endDate  = isset($post['enddate'])?$post['enddate']:'2017-01-20';

    XLog::formatLog("statDashboard", json_encode($post), XLog::$errorFile);

    $dateArr  = parseDate($startDate,$endDate);

    $curTime  = date('Y-m-d H:i:s');

    $pageInfo = DB::fetchRow(DB_NUMBER, "
        SELECT SUM(`API`) AS API,SUM(`HPP`) AS HPP,SUM(`Abandoned`) AS Abandoned,SUM(`Received`) AS Received,
               SUM(`Refused`) AS Refused, SUM(`Error`) AS Error, SUM(`Authorised`) AS Authorised,
               SUM(`Cancelled`) AS Cancelled, SUM(`Expired`) AS Expired, SUM(`SentSettlement`) AS Sent,
               SUM(`Settled`) AS Settled, SUM(`Refunded`) AS Refunded, SUM(`FinalSettled`) AS FinalSettled,
               SUM(`RefundReversed`) AS RefundReversed, SUM(`Chargeback`) AS Chargeback,
               SUM(`ChargebackReversed`) AS ChargebackReversed
        FROM `dashboard`
        WHERE `CreateDate` <= '{$curTime}' AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        ");

    return $pageInfo;
}

//http://report.shinezone.com/ca/ca/reports/generate.php
//POST
//reportCode:chart_baseline_report
//    reportstartdate:2016-06-01
//    reportenddate:2017-02-01
//    format:JSON
//    formHash:272gcgG5eBAQkaSiT0Rl65+c9ZRoC0=
// Full texts
function statReceiveAuth()
{
    $post     = getPostInfo();
    $startDate= isset($post['reportstartdate'])?$post['reportstartdate']:'2016-11-01';
    $endDate  = isset($post['reportenddate'])?$post['reportenddate']:'2017-01-20';

    XLog::formatLog("statReceiveAuth", json_encode($post), XLog::$errorFile);

    $dateArr  = parseDate($startDate,$endDate);

    $curTime  = date('Y-m-d H:i:s');

    $pageInfo = DB::fetchAll(DB_NUMBER, "
        SELECT SUM(`Received`) AS total,SUM(`Authorised`) AS auths,date_format(`CreateDate`, '%Y-%m-%d') as `day`
        FROM `dashboard`
        WHERE `CreateDate` <= '{$curTime}' AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        GROUP BY `day`
        ");

    return $pageInfo;
}

/**
 * http://report.shinezone.com/ca/ca/data/transactions/summary.shtml?1485054813468
 * POST
 *
 * formHash:692OTWtUxIF9ezXKuMGwV687KpyXTQ=
 * granularity:day
 * startdate:2017-01-16 00:00:00
 * enddate:2017-01-23 00:00:00
 * previousPeriod:true
 *
 * formHash:648BV95o38xZYcw1RxOxoBpKWv4c9E=
granularity:month
startdate:2017-01-01 00:00:00
enddate:2017-02-01 00:00:00
previousPeriod:true
 *
 *
 *
 */
require_once "TransactionDay.php";
require_once "TransactionMonth.php";
require_once "TransactionWeek.php";
require_once "TransactionHour.php";
require_once "TransactionMinute.php";
function statTransactions()
{
    $post        = getPostInfo();
    $granularity = isset($post['granularity'])?$post['granularity']:'day';//'hour';//'week';//'month';//'day';
    if ($granularity == 'day') {
        return statDayTransactions();
    } else if ($granularity == 'month') {
        return statMonthTransactions();
    } else if ($granularity == 'week') {
        return statWeekTransactions();
    } else if ($granularity == 'hour') {
        return statHourTransactions();
    } else if ($granularity == 'minute') {
        return statMinuteTransactions();
    }
    return [
        'selectedPeriod' => [],
        'previousPeriod' => []
    ];
}

//riskreportdata.shtml
//reportType=statistics
//startdate=2016-12-23
//enddate=2017-01-22
//granularity=day
//&paymentMethod=&shopperInteraction=&countryFilter=
function statRiskStatistics()
{
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week

    //startdate=2016-12-19&enddate=2017-01-23
    //startdate=2016-08-01&enddate=2017-01-01
    //date_format(`CreateDate`, '%Y-%m-%d') as `day`
    //WEEK(`CreateDate`) as `week`

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    $data     = [];
    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);

        //$sql  = "
        //SELECT  COUNT(DISTINCT `MerchantAccount`) AS totalCount,
        //        date_format(`CreateDate`, '%Y-%m-%d') as `day`
        //FROM `payment`
        //WHERE `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        //GROUP BY `day`";
        //$totalInfo = DB::fetchAll(DB_NUMBER, $sql);
        //$totalNew  = [];
        //foreach($totalInfo as $total)
        //{
        //    $totalNew[$total['day']] = $total;
        //}

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }

        $sql  = "
        SELECT  SUM(`totalCount`) AS totalCount,SUM(`riskTransactionCount`) AS riskTransactionCount,
                SUM(`authorisedCount`) AS authorisedCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`refusedByRiskCount`) AS refusedByRiskCount,SUM(`refusedByRiskEurAmount`) AS refusedByRiskEurAmount,
                SUM(`refusedByBankCount`) AS refusedByBankCount,SUM(`refusedByBankEurAmount`) AS refusedByBankEurAmount,
                SUM(`chargebackCount`) AS chargebackCount,SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,
                SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,SUM(`chargebackEurAmount`) AS chargebackEurAmount,
                SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,date_format(`CreateDate`, '%Y-%m-%d') as `day`
        FROM `risk`
        WHERE  $condition
        GROUP BY `day`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['day']] = $item;
            }
            $days     = getLineDay($startTime, $endTime);
            foreach($days as $day)
            {
                $data[] = [
                    "date"                  => $day,
                    "totalCount"            => (int)(isset($pageNew[$day])?$pageNew[$day]['totalCount']:0),
                    "riskTransactionCount"  => (int)(isset($pageNew[$day])?$pageNew[$day]['riskTransactionCount']:0),
                    "authorisedCount"       => (int)(isset($pageNew[$day])?$pageNew[$day]['authorisedCount']:0),
                    "authorisedEurAmount"   => (int)(isset($pageNew[$day])?$pageNew[$day]['authorisedEurAmount']:0),
                    "refusedByRiskCount"    => (int)(isset($pageNew[$day])?$pageNew[$day]['refusedByRiskCount']:0),
                    "refusedByRiskEurAmount"=> (int)(isset($pageNew[$day])?$pageNew[$day]['refusedByRiskEurAmount']:0),
                    "refusedByBankCount"    => (int)(isset($pageNew[$day])?$pageNew[$day]['refusedByBankCount']:0),
                    "refusedByBankEurAmount"=> (int)(isset($pageNew[$day])?$pageNew[$day]['refusedByBankEurAmount']:0),
                    "chargebackCount"       => (int)(isset($pageNew[$day])?$pageNew[$day]['chargebackCount']:0),
                    "cancelledByRiskCount"  => (int)(isset($pageNew[$day])?$pageNew[$day]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount" => (int)(isset($pageNew[$day])?$pageNew[$day]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);

        //$sql  = "
        //SELECT  COUNT(DISTINCT `MerchantAccount`) AS totalCount,
        //        date_format(`CreateDate`, '%Y-%m-01') as `month`
        //FROM `payment`
        //WHERE `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        //GROUP BY `month`";
        //$totalInfo = DB::fetchAll(DB_NUMBER, $sql);
        //$totalNew  = [];
        //foreach($totalInfo as $total)
        //{
        //    $totalNew[$total['month']] = $total;
        //}

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }

        $sql  = "
        SELECT  SUM(`totalCount`) AS totalCount,SUM(`riskTransactionCount`) AS riskTransactionCount,
                SUM(`authorisedCount`) AS authorisedCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`refusedByRiskCount`) AS refusedByRiskCount,SUM(`refusedByRiskEurAmount`) AS refusedByRiskEurAmount,
                SUM(`refusedByBankCount`) AS refusedByBankCount,SUM(`refusedByBankEurAmount`) AS refusedByBankEurAmount,
                SUM(`chargebackCount`) AS chargebackCount,SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,
                SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,SUM(`chargebackEurAmount`) AS chargebackEurAmount,
                SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,date_format(`CreateDate`, '%Y-%m-01') as `month`
        FROM `risk`
        WHERE $condition
        GROUP BY `month`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['month']] = $item;
            }
            $months = getLineMonth($startTime, $endTime);
            foreach($months as $month)
            {
                $data[] = [
                    "date"                  => $month,
                    "totalCount"            => (int)(isset($pageNew[$month])?$pageNew[$month]['totalCount']:0),
                    "riskTransactionCount"  => (int)(isset($pageNew[$month])?$pageNew[$month]['riskTransactionCount']:0),
                    "authorisedCount"       => (int)(isset($pageNew[$month])?$pageNew[$month]['authorisedCount']:0),
                    "authorisedEurAmount"   => (int)(isset($pageNew[$month])?$pageNew[$month]['authorisedEurAmount']:0),
                    "refusedByRiskCount"    => (int)(isset($pageNew[$month])?$pageNew[$month]['refusedByRiskCount']:0),
                    "refusedByRiskEurAmount"=> (int)(isset($pageNew[$month])?$pageNew[$month]['refusedByRiskEurAmount']:0),
                    "refusedByBankCount"    => (int)(isset($pageNew[$month])?$pageNew[$month]['refusedByBankCount']:0),
                    "refusedByBankEurAmount"=> (int)(isset($pageNew[$month])?$pageNew[$month]['refusedByBankEurAmount']:0),
                    "chargebackCount"       => (int)(isset($pageNew[$month])?$pageNew[$month]['chargebackCount']:0),
                    "cancelledByRiskCount"  => (int)(isset($pageNew[$month])?$pageNew[$month]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount" => (int)(isset($pageNew[$month])?$pageNew[$month]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else if ($duration == 'week') {
        //SELECT STR_TO_DATE(CONCAT(YEARWEEK('2017-1-23'), ' Monday'), '%X%V %W')
        //SELECT STR_TO_DATE('201652 Monday', '%X%V %W')
        $dateArr  = parseDate($startTime, $endTime);

        //$sql  = "
        //SELECT  COUNT(DISTINCT `MerchantAccount`) AS totalCount, WEEK(`CreateDate`) as `weekday`,
        //        STR_TO_DATE(CONCAT(YEARWEEK(`CreateDate`), ' Monday'), '%X%V %W') AS `day`
        //FROM `payment`
        //WHERE `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        //GROUP BY `weekday`";
        //$totalInfo = DB::fetchAll(DB_NUMBER, $sql);
        //$totalNew  = [];
        //foreach($totalInfo as $total)
        //{
        //    $totalNew[$total['day']] = $total;
        //}

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }

        $sql  = "
        SELECT  SUM(`totalCount`) AS totalCount,SUM(`riskTransactionCount`) AS riskTransactionCount,
                SUM(`authorisedCount`) AS authorisedCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`refusedByRiskCount`) AS refusedByRiskCount,SUM(`refusedByRiskEurAmount`) AS refusedByRiskEurAmount,
                SUM(`refusedByBankCount`) AS refusedByBankCount,SUM(`refusedByBankEurAmount`) AS refusedByBankEurAmount,
                SUM(`chargebackCount`) AS chargebackCount,SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,
                SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,SUM(`chargebackEurAmount`) AS chargebackEurAmount,
                SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,WEEK(`CreateDate`) as `weekday`,
                STR_TO_DATE(CONCAT(YEARWEEK(`CreateDate`), ' Monday'), '%X%V %W') AS `day`
        FROM `risk`
        WHERE $condition
        GROUP BY `weekday`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['day']] = $item;
            }
            $weeks = getLineWeek($startTime, $endTime);
            foreach($weeks as $week)
            {
                $data[] = [
                    "date"                  => $week,
                    "totalCount"            => (int)(isset($pageNew[$week])?$pageNew[$week]['totalCount']:0),
                    "riskTransactionCount"  => (int)(isset($pageNew[$week])?$pageNew[$week]['riskTransactionCount']:0),
                    "authorisedCount"       => (int)(isset($pageNew[$week])?$pageNew[$week]['authorisedCount']:0),
                    "authorisedEurAmount"   => (int)(isset($pageNew[$week])?$pageNew[$week]['authorisedEurAmount']:0),
                    "refusedByRiskCount"    => (int)(isset($pageNew[$week])?$pageNew[$week]['refusedByRiskCount']:0),
                    "refusedByRiskEurAmount"=> (int)(isset($pageNew[$week])?$pageNew[$week]['refusedByRiskEurAmount']:0),
                    "refusedByBankCount"    => (int)(isset($pageNew[$week])?$pageNew[$week]['refusedByBankCount']:0),
                    "refusedByBankEurAmount"=> (int)(isset($pageNew[$week])?$pageNew[$week]['refusedByBankEurAmount']:0),
                    "chargebackCount"       => (int)(isset($pageNew[$week])?$pageNew[$week]['chargebackCount']:0),
                    "cancelledByRiskCount"  => (int)(isset($pageNew[$week])?$pageNew[$week]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount" => (int)(isset($pageNew[$week])?$pageNew[$week]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else {
        return '[]';
    }
    return $data;
}
//chargebackreportdata.shtml?ignoresaverequest=true&type=GET&format=JSON&
//reportType=overall_statistics&chargebackDateParameter=transaction&
//startdate=2016-12-23&enddate=2017-01-22&granularity=day
function statOverallStatistics() {
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'day'; // day month week

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }
    //date_format(`CreateDate`, '%Y-%m-%d') as `day`
    //WEEK(`CreateDate`) as `week`
    $data     = [];
    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }

        $sql  = "
        SELECT  SUM(`authorisedCount`) AS authorisedCount,SUM(`chargebackCount`) AS chargebackCount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`chargebackEurAmount`) AS chargebackEurAmount,SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,
                date_format(`CreateDate`, '%Y-%m-%d') as `day`
        FROM `risk`
        WHERE $condition
        GROUP BY `day`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['day']] = $item;
            }
            $days     = getLineDay($startTime, $endTime);
            foreach($days as $day)
            {
                $data[] = [
                    "date"                       => $day,
                    "authorisedCount"            => (int)(isset($pageNew[$day])?$pageNew[$day]['authorisedCount']:0),
                    "chargebackCount"            => (int)(isset($pageNew[$day])?$pageNew[$day]['chargebackCount']:0),
                    "fraudNotificationsCount"    => (int)(isset($pageNew[$day])?$pageNew[$day]['fraudNotificationsCount']:0),
                    "authorisedEurAmount"        => (int)(isset($pageNew[$day])?$pageNew[$day]['authorisedEurAmount']:0),
                    "chargebackEurAmount"        => (int)(isset($pageNew[$day])?$pageNew[$day]['chargebackEurAmount']:0),
                    "fraudNotificationsEurAmount"=> (int)(isset($pageNew[$day])?$pageNew[$day]['fraudNotificationsEurAmount']:0),
                    "cancelledByRiskCount"       => (int)(isset($pageNew[$day])?$pageNew[$day]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount"      => (int)(isset($pageNew[$day])?$pageNew[$day]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }
        $sql  = "
        SELECT  SUM(`authorisedCount`) AS authorisedCount,SUM(`chargebackCount`) AS chargebackCount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`chargebackEurAmount`) AS chargebackEurAmount,SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,
                date_format(`CreateDate`, '%Y-%m-01') as `month`
        FROM `risk`
        WHERE $condition
        GROUP BY `month`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['month']] = $item;
            }
            $months = getLineMonth($startTime, $endTime);
            foreach($months as $month)
            {
                $data[] = [
                    "date"                       => $month,
                    "authorisedCount"            => (int)(isset($pageNew[$month])?$pageNew[$month]['authorisedCount']:0),
                    "chargebackCount"            => (int)(isset($pageNew[$month])?$pageNew[$month]['chargebackCount']:0),
                    "fraudNotificationsCount"    => (int)(isset($pageNew[$month])?$pageNew[$month]['fraudNotificationsCount']:0),
                    "authorisedEurAmount"        => (int)(isset($pageNew[$month])?$pageNew[$month]['authorisedEurAmount']:0),
                    "chargebackEurAmount"        => (int)(isset($pageNew[$month])?$pageNew[$month]['chargebackEurAmount']:0),
                    "fraudNotificationsEurAmount"=> (int)(isset($pageNew[$month])?$pageNew[$month]['fraudNotificationsEurAmount']:0),
                    "cancelledByRiskCount"       => (int)(isset($pageNew[$month])?$pageNew[$month]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount"      => (int)(isset($pageNew[$month])?$pageNew[$month]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else if ($duration == 'week') {
        //SELECT STR_TO_DATE(CONCAT(YEARWEEK('2017-1-23'), ' Monday'), '%X%V %W')
        //SELECT STR_TO_DATE('201652 Monday', '%X%V %W')
        $dateArr  = parseDate($startTime, $endTime);

        if (!empty($condition)) {
            $condition      .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        } else {
            $condition       = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
        }
        $sql  = "
        SELECT  SUM(`authorisedCount`) AS authorisedCount,SUM(`chargebackCount`) AS chargebackCount,
                SUM(`fraudNotificationsCount`) AS fraudNotificationsCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
                SUM(`chargebackEurAmount`) AS chargebackEurAmount,SUM(`fraudNotificationsEurAmount`) AS fraudNotificationsEurAmount,
                SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,
                WEEK(`CreateDate`) as `weekday`,
                STR_TO_DATE(CONCAT(YEARWEEK(`CreateDate`), ' Monday'), '%X%V %W') AS `day`
        FROM `risk`
        WHERE $condition
        GROUP BY `weekday`";
        $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
        $pageNew  = [];
        if ($pageInfo) {
            foreach($pageInfo as $item)
            {
                $pageNew[$item['day']] = $item;
            }
            $weeks = getLineWeek($startTime, $endTime);
            foreach($weeks as $week)
            {
                $data[] = [
                    "date"                       => $week,
                    "authorisedCount"            => (int)(isset($pageNew[$week])?$pageNew[$week]['authorisedCount']:0),
                    "chargebackCount"            => (int)(isset($pageNew[$week])?$pageNew[$week]['chargebackCount']:0),
                    "fraudNotificationsCount"    => (int)(isset($pageNew[$week])?$pageNew[$week]['fraudNotificationsCount']:0),
                    "authorisedEurAmount"        => (int)(isset($pageNew[$week])?$pageNew[$week]['authorisedEurAmount']:0),
                    "chargebackEurAmount"        => (int)(isset($pageNew[$week])?$pageNew[$week]['chargebackEurAmount']:0),
                    "fraudNotificationsEurAmount"=> (int)(isset($pageNew[$week])?$pageNew[$week]['fraudNotificationsEurAmount']:0),
                    "cancelledByRiskCount"       => (int)(isset($pageNew[$week])?$pageNew[$week]['cancelledByRiskCount']:0),
                    "cancelledByRiskAmount"      => (int)(isset($pageNew[$week])?$pageNew[$week]['cancelledByRiskAmount']:0)
                ];
            }
        }
    } else {
        return '[]';
    }

    return $data;
}

//riskreport!getActiveIssuerCountries.shtml?
//ignoresaverequest=true&type=GET&startdate=2016-12-23&enddate=2017-01-22
//&granularity=day&formHash=498sED1MAatW9EUwXFknSsLfw1tang%3D&cb=1485072007578
//echo '[{"countryCode":"CN","countryName":"CHINA"}]';die;
//riskreport!getActiveIssuerCountries.php?ignoresaverequest=true&type=GET&
//startdate=2016-01-01&enddate=2017-01-01&granularity=month
function statRiskChargeBackCountries()
{
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week
    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'week') {
        $dateArr  = parseDate($startTime, $endTime);
    }

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    if (!empty($condition)) {
        $condition .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    } else {
        $condition  = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    }

    $sql  = "
    SELECT DISTINCT `Country` as Country
    FROM `risk`
    WHERE $condition
    ";
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
    $countries= [];
    if ($pageInfo)
    {
        foreach($pageInfo as $item)
        {
            if(isset($item['Country']) && $item['Country'])
            {
                $countryCode = $item['Country'];
                $countryName = strtoupper(country_code_to_country($countryCode));
                $countries[] = ['countryCode' => $countryCode,'countryName' => $countryName];
            }
        }
    }
    return $countries;
}

// riskreport!getActivePaymentMethods.shtml?
// ignoresaverequest=true&type=GET&
// startdate=2016-12-23&enddate=2017-01-22&granularity=day
// riskreport!getActivePaymentMethods.shtml?ignoresaverequest=true&type=GET&
// startdate=2016-01-01&enddate=2017-01-01&granularity=month
function statRiskChargeBackPaymentMethod()
{
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'week') {
        $dateArr  = parseDate($startTime, $endTime);
    }

    if (!empty($condition)) {
        $condition .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    } else {
        $condition  = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    }

    $sql  = "
    SELECT DISTINCT `PaymentMethod` as PaymentMethod
    FROM `risk`
    WHERE $condition
    ";
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
    $payments = [];
    if ($pageInfo)
    {
        foreach($pageInfo as $item)
        {
            if(isset($item['PaymentMethod']) && $item['PaymentMethod'])
            {
                $payments[] = $item['PaymentMethod'];
            }
        }
    }
    return $payments;
}

//https://ca-live.adyen.com/ca/ca/data/riskreportdata.shtml?
//ignoresaverequest=true&type=GET&format=JSON&
//startdate=2016-08-01&enddate=2017-01-01&granularity=month&
//reportType=fraudScoreDistribution&paymentMethod=&shopperInteraction=&countryFilter=
//
//{"fraudScoreDistribution":[
//{"fraudScore":50,"totalCount":1,"chargebackCount":0,"authorisedCount":1,"refusedByRiskCount":0,
// "refusedByBankCount":0,"cancelledByRiskCount":0}]}
function statFraudScoreDistribution() {
    $post       = getPostInfo();
    $reportType = isset($post['reportType'])?$post['reportType']:'';

    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week

    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'week') {
        $dateArr  = parseDate($startTime, $endTime);
    }

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    if (!empty($condition)) {
        $condition .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    } else {
        $condition  = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    }

    $sql  = "
    SELECT DISTINCT `PaymentMethod` as PaymentMethod
    FROM `risk`
    WHERE $condition
    ";
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);
    $payments = [];
    if ($pageInfo)
    {
        foreach($pageInfo as $item)
        {
            if(isset($item['PaymentMethod']) && $item['PaymentMethod'])
            {
                $payments[] = $item['PaymentMethod'];
            }
        }
    }
    //return $payments;
    //return '{"fraudScoreDistribution":[{"fraudScore":10,"totalCount":1,"chargebackCount":0,"authorisedCount":1,"refusedByRiskCount":0,"refusedByBankCount":0,"cancelledByRiskCount":0}]}';
    return '{"fraudScoreDistribution":[]}';
}


//chargebackreportdata.shtml?ignoresaverequest=true&type=GET&format=JSON&
//reportType=country_statistics&chargebackDateParameter=chargeback&
//startdate=2016-01-01&enddate=2017-01-01&granularity=month&
//paymentMethod=&shopperInteraction=&countryFilter=&hasRegionData=true
//{"country_statistics":
//[{"countryName":"CHINA","authorisedCount":1,"authorisedEurAmount":96,"chargebackCount":0,"chargebackEurAmount":0,
//"nofCount":0,"nofEurAmount":0,"cancelledByRiskCount":0,"cancelledByRiskAmount":0}]}'
function chargeBackCountryStatistics() {
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week

    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'week') {
        $dateArr  = parseDate($startTime, $endTime);
    }

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    if (!empty($condition)) {
        $condition .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    } else {
        $condition  = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    }
    //[{"countryName":"CHINA","authorisedCount":1,"authorisedEurAmount":96,"chargebackCount":0,"chargebackEurAmount":0,
    //"nofCount":0,"nofEurAmount":0,"cancelledByRiskCount":0,"cancelledByRiskAmount":0}]}'
    $sql  = "
    SELECT  SUM(`authorisedCount`) AS authorisedCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
            SUM(`chargebackCount`) AS chargebackCount,SUM(`chargebackEurAmount`) AS chargebackEurAmount,
            SUM(`nofCount`) AS nofCount,SUM(`nofEurAmount`) AS nofEurAmount,
            SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,
            `Country` as code
    FROM `risk`
    WHERE $condition
    GROUP BY code
    ";
    $pageInfo           = DB::fetchAll(DB_NUMBER, $sql);
    $countryStatistics  = [];
    if ($pageInfo)
    {
        foreach($pageInfo as $item)
        {
            $countryStatistics[] = [
                'countryName'           => (string)(isset($item['pm'])?strtoupper(country_code_to_country($item['code'])):''),
                'authorisedCount'       => intval(isset($item['authorisedCount']) && $item['authorisedCount']?$item['authorisedCount']:0),
                'authorisedEurAmount'   => intval(isset($item['authorisedEurAmount']) && $item['authorisedEurAmount']?$item['authorisedEurAmount']:0),
                'chargebackCount'       => intval(isset($item['chargebackCount']) && $item['chargebackCount']?$item['chargebackCount']:0),
                'chargebackEurAmount'   => intval(isset($item['chargebackEurAmount']) && $item['chargebackEurAmount']?$item['chargebackEurAmount']:0),
                'nofCount'              => intval(isset($item['nofCount']) && $item['nofCount']?$item['nofCount']:0),
                'nofEurAmount'          => intval(isset($item['nofEurAmount']) && $item['nofEurAmount']?$item['nofEurAmount']:0),
                'cancelledByRiskCount'  => intval(isset($item['cancelledByRiskCount']) && $item['cancelledByRiskCount']?$item['cancelledByRiskCount']:0),
                'cancelledByRiskAmount' => intval(isset($item['cancelledByRiskAmount']) && $item['cancelledByRiskAmount']?$item['cancelledByRiskAmount']:0),
            ];
        }
    }
    return $countryStatistics;
    //echo '{"country_statistics":[{"countryName":"CHINA","authorisedCount":1,"authorisedEurAmount":96,"chargebackCount":0,"chargebackEurAmount":0,"nofCount":0,"nofEurAmount":0,"cancelledByRiskCount":0,"cancelledByRiskAmount":0}]}';die;
}
//{"payment_method_statistics":
//[
//{"pm":"cup",
//"authorisedCount":1,
//"authorisedEurAmount":96,
//"chargebackCount":0,"
//chargebackEurAmount":0,
//"nofCount":0,
//"nofEurAmount":0,
//"cancelledByRiskCount":0,
//"cancelledByRiskAmount":0}]}
//chargebackreportdata.shtml?ignoresaverequest=true&type=GET&format=JSON&
//reportType=payment_method_statistics&
//chargebackDateParameter=chargeback&startdate=2016-01-01&enddate=2017-01-01&
//granularity=month&paymentMethod=&shopperInteraction=&countryFilter=
function chargeBackPaymentMethodStatistics() {
    $post     = getPostInfo();
    $startTime= isset($post['startdate'])?$post['startdate']:'2016-12-19';//'2016-08-01';//'2016-12-23';
    $endTime  = isset($post['enddate'])?$post['enddate']:'2017-01-23';//'2017-01-01';//'2017-01-22';
    $duration = isset($post['granularity'])?$post['granularity']:'week';//'month';//'day'; // day month week

    if ($duration == 'day') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'month') {
        $endTime  = date('Y-m-d', strtotime("$endTime -1 day"));
        $dateArr  = parseDate($startTime, $endTime);
    }
    if ($duration == 'week') {
        $dateArr  = parseDate($startTime, $endTime);
    }

    $condition = '';
    if (isset($post['paymentMethod']) && trim($post['paymentMethod']))
    {
        $paymentMethod = trim($post['paymentMethod']);
        if (!empty($condition)) {
            $condition .= " AND `PaymentMethod`='{$paymentMethod}' ";
        } else {
            $condition  = " `PaymentMethod`='{$paymentMethod}' ";
        }
    }
    if (isset($post['shopperInteraction']) && trim($post['shopperInteraction']))
    {
        $shopperInteraction = trim($post['shopperInteraction']);
        if (!empty($condition)) {
            $condition      .= " AND `Shopper`='{$shopperInteraction}' ";
        } else {
            $condition       = " `Shopper`='{$shopperInteraction}' ";
        }
    }
    if (isset($post['countryFilter']) && trim($post['countryFilter']))
    {
        $countryFilter = trim($post['countryFilter']);
        if (!empty($condition)) {
            $condition      .= " AND `Country`='{$countryFilter}' ";
        } else {
            $condition       = " `Country`='{$countryFilter}' ";
        }
    }

    if (!empty($condition)) {
        $condition .= " AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    } else {
        $condition  = " `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}' ";
    }

    $sql  = "
    SELECT  SUM(`authorisedCount`) AS authorisedCount,SUM(`authorisedEurAmount`) AS authorisedEurAmount,
            SUM(`chargebackCount`) AS chargebackCount,SUM(`chargebackEurAmount`) AS chargebackEurAmount,
            SUM(`nofCount`) AS nofCount,SUM(`nofEurAmount`) AS nofEurAmount,
            SUM(`cancelledByRiskCount`) AS cancelledByRiskCount,SUM(`cancelledByRiskAmount`) AS cancelledByRiskAmount,
            `PaymentMethod` as pm
    FROM `risk`
    WHERE $condition
    GROUP BY pm
    ";
    $pageInfo                = DB::fetchAll(DB_NUMBER, $sql);
    $paymentMethodStatistics = [];
    if ($pageInfo)
    {
        foreach($pageInfo as $item)
        {
            $paymentMethodStatistics[] = [
                'pm'                    => (string)(isset($item['pm'])?$item['pm']:''),
                'authorisedCount'       => intval(isset($item['authorisedCount']) && $item['authorisedCount']?$item['authorisedCount']:0),
                'authorisedEurAmount'   => intval(isset($item['authorisedEurAmount']) && $item['authorisedEurAmount']?$item['authorisedEurAmount']:0),
                'chargebackCount'       => intval(isset($item['chargebackCount']) && $item['chargebackCount']?$item['chargebackCount']:0),
                'chargebackEurAmount'   => intval(isset($item['chargebackEurAmount']) && $item['chargebackEurAmount']?$item['chargebackEurAmount']:0),
                'nofCount'              => intval(isset($item['nofCount']) && $item['nofCount']?$item['nofCount']:0),
                'nofEurAmount'          => intval(isset($item['nofEurAmount']) && $item['nofEurAmount']?$item['nofEurAmount']:0),
                'cancelledByRiskCount'  => intval(isset($item['cancelledByRiskCount']) && $item['cancelledByRiskCount']?$item['cancelledByRiskCount']:0),
                'cancelledByRiskAmount' => intval(isset($item['cancelledByRiskAmount']) && $item['cancelledByRiskAmount']?$item['cancelledByRiskAmount']:0),
            ];
        }
    }
    return $paymentMethodStatistics;
    //echo '{"payment_method_statistics":[{"pm":"cup","authorisedCount":1,"authorisedEurAmount":96,"chargebackCount":0,"chargebackEurAmount":0,"nofCount":0,"nofEurAmount":0,"cancelledByRiskCount":0,"cancelledByRiskAmount":0}]}';die;
}

function statAuthoristionsLast24Hours()
{
    $endTime   = date('Y-m-d H:i:00');
    $startTime = date('Y-m-d H:i:00', strtotime("$endTime -24 month"));

    $sql  = "
    SELECT  COUNT(DISTINCT `MerchantReferenceId`) AS total
    FROM `payment`
    WHERE `BookingDate` BETWEEN '{$startTime}' AND '{$endTime}' AND
          `RecordType` = 'Authorised'
    ";
    $pageInfo                = DB::fetchRow(DB_NUMBER, $sql);
    if ($pageInfo)
    {
        return $pageInfo['total'];
    }
    return 0;
}

// 统计下载信息
function statDownloadInfo()
{
    $sql  = "
    SELECT  COUNT(DISTINCT `FileName`) AS total, `Type` as type
    FROM `download`
    GROUP BY `Type`
    ";
    $pageInfo                = DB::fetchAll(DB_NUMBER, $sql);
    if ($pageInfo)
    {
        $pageNew = [];
        foreach($pageInfo as $item)
        {
            $pageNew[$item['type']] = intval(isset($item['total'])?$item['total']:0);
        }
        return $pageNew;
    }
    return [];
}

XLog::info("Functions ", " END ");