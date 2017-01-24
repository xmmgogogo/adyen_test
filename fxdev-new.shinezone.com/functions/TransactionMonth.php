<?php

//https://ca-live.adyen.com/ca/ca/data/transactions/summary.shtml?1485155007351
//granularity:month
//startdate:2017-01-01 00:00:00
//enddate:2017-02-01 00:00:00
//previousPeriod:true
//{"selectedPeriod":[{"date":1483225200000,"txs":13525}],"previousPeriod":[{"date":1480546800000,"txs":9433}]}
function statMonthTransactions()
{
    $dateArr  = getTransactionDate();
    return [
        'selectedPeriod' => getMonthSelected($dateArr['selectedPeriod']),
        'previousPeriod' => getMonthSelected($dateArr['previousPeriod'])
    ];
}
function getMonthSelected($dateArr)
{
    //$curTime  = date('Y-m-d H:i:s');
    $selected = [];
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT count(`MerchantReferenceId`) AS total,
                   date_format(`BookingDate`, '%Y-%m-01') AS `month`
            FROM (
                SELECT DISTINCT `MerchantReferenceId` AS `MerchantReferenceId`, `BookingDate`
                FROM `payment`
                WHERE `BookingDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
                ) AS PM
            GROUP BY `month`
        ");
    $pageNew = [];
    if ($pageInfo) {

        foreach ($pageInfo as $item) {
            $pageNew[$item['month']] = $item;
        }
    }
    $months = getLineMonth($dateArr['start'], $dateArr['end']);
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