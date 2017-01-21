<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . "/Debug.php";
require_once __DIR__ . "/XLog.php";
require_once __DIR__ . '/Mysql.php';

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

//https://fxdev-new.shinezone.com/ca/ca/data/funnel/report.php?
//format=JSON&startdate=2017-01-01&enddate=2017-02-01&granularity=1+day&formHash=524tpT0f5DpNviD3xxAOTDUaIninCE%3D&cb=1484903374503
// Full texts
function statDashboard()
{
    $post     = getPostInfo();
    $startDate= isset($post['startdate'])?$post['startdate']:'2016-11-01';
    $endDate  = isset($post['enddate'])?$post['enddate']:'2017-01-20';
    $dateArr  = parseDate($startDate,$endDate);

    $curTime  = date('Y-m-d H:i:s');

    $pageInfo = DB::fetchRow(DB_NUMBER, "
        SELECT SUM(`API`) AS API,SUM(`HPP`) AS HPP,SUM(`Abandoned`) AS Abandoned,SUM(`Received`) AS Received,
               SUM(`Refused`) AS Refused, SUM(`Error`) AS Error, SUM(`Authorised`) AS Authorised,
               SUM(`Cancelled`) AS Cancelled, SUM(`Expired`) AS Expired, SUM(`SentSettlement`) AS Sent,
               SUM(`Settled`) AS Settled, SUM(`Refunded`) AS Refunded, SUM(`FinalSettled`) AS FinalSettled,
               SUM(`RefundReversed`) AS RefundReversed, SUM(`Chargeback`) AS Chargeback,
               SUM(`ChargebackReversed`) AS ChargebackReversed,
        FROM `dashboard`
        WHERE `CreateDate` <= '{$curTime}' AND `CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
        ");

    return $pageInfo;
}

XLog::info("Functions ", " END ");