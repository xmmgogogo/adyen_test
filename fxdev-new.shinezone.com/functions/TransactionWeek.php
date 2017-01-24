<?php

//https://ca-live.adyen.com/ca/ca/data/transactions/summary.shtml?1485155001992
//formHash:626aj5IrRQljKrWwLn1WPjEzaafdoc=
//granularity:week
//startdate:2017-01-15 00:00:00
//enddate:2017-01-22 00:00:00
//previousPeriod:true
//{"selectedPeriod":[{"date":1484434800000,"txs":5808}],"previousPeriod":[{"date":1483830000000,"txs":1717}]}
function statWeekTransactions()
{
    $dateArr  = getTransactionDate();
    return [
        'selectedPeriod' => getWeekSelected($dateArr['selectedPeriod']),
        'previousPeriod' => getWeekSelected($dateArr['previousPeriod'])
    ];
}
function getWeekSelected($dateArr)
{
    //$curTime  = date('Y-m-d H:i:s');
    $selected = [];
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT count(`MerchantReferenceId`) AS total,
                   WEEK(`BookingDate`) as `weekday`,
                   STR_TO_DATE(CONCAT(YEARWEEK(`BookingDate`), ' Sunday'), '%X%V %W') AS `day`
            FROM (
                SELECT DISTINCT `MerchantReferenceId` AS `MerchantReferenceId`, `BookingDate`
                FROM `payment`
                WHERE `BookingDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
                ) AS PM
            GROUP BY `weekday`
        ");
    $pageNew = [];
    if ($pageInfo) {
        foreach ($pageInfo as $item) {
            $pageNew[$item['day']] = $item;
        }
    }
    $months = getLineWeek($dateArr['start'], $dateArr['end']);

    foreach($months as $month)
    {
        if (isset($pageNew[$month])) {
            $selected[] = [
                "date" => intval(strtotime($month) . '000'),
                "txs"  => (int)(isset($pageNew[$month]['total']) && $pageNew[$month]['total']?$pageNew[$month]['total']:0)
            ];
        } else {
            $selected[] = [
                "date" => intval(strtotime($month) . '000'),
                "txs"  => (int)(isset($pageNew[$month]['total']) && $pageNew[$month]['total']?$pageNew[$month]['total']:0)
            ];
        }
    }
    return $selected;
}