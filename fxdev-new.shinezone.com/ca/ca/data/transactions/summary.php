<?php
//echo date('Y-m-d H:i:s') . "<br />";
//echo date('Y-m-d H:00:00', strtotime("-1 hour")) . "<br />";
//echo date('Y-m-d H:i:00', strtotime("-1 minute")) . "<br />";
//echo date('Y-m-d 00:00:00', strtotime("-1 week")) . "<br />";
//echo date('Y-m-01 00:00:00', strtotime("-1 month")) . "<br />";
//die;
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
header("Content-type: application/json;charset=UTF-8");
require_once __DIR__ . "/../../../../functions/Reports.php";

$statInfo = statTransactions();
echo json_encode($statInfo);die;

$json = '{"selectedPeriod":[{"date":1484521200000,"txs":1000},{"date":1484607600000,"txs":1012},{"date":1484694000000,"txs":861},{"date":1484780400000,"txs":1024},{"date":1484866800000,"txs":442},{"date":1484953200000,"txs":1221}],"previousPeriod":[{"date":1483916400000,"txs":247},{"date":1484002800000,"txs":243},{"date":1484089200000,"txs":246},{"date":1484175600000,"txs":248},{"date":1484262000000,"txs":235},{"date":1484348400000,"txs":249},{"date":1484434800000,"txs":248}]}';
echo json_encode(json_decode($json,true));die;