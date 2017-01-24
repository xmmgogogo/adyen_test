<?php

//https://ca-live.adyen.com/ca/ca/data/transactions/summary.shtml?1485155001992
//formHash:626aj5IrRQljKrWwLn1WPjEzaafdoc=
//granularity:week
//startdate:2017-01-15 00:00:00
//enddate:2017-01-22 00:00:00
//previousPeriod:true
//{"selectedPeriod":[{"date":1484434800000,"txs":5808}],"previousPeriod":[{"date":1483830000000,"txs":1717}]}
function statMinuteTransactions()
{
    $dateArr  = getTransactionDate();
    return [
        'selectedPeriod' => getMinuteSelected($dateArr['selectedPeriod']),
        'previousPeriod' => getMinuteSelected($dateArr['previousPeriod'])
    ];
}
function getMinuteSelected($dateArr)
{
    //$curTime  = date('Y-m-d H:i:s');
    $selected = [];
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT count(`MerchantReferenceId`) AS total,
                   date_format(`BookingDate`, '%Y-%m-%d %H:%I:00') AS `minute`
            FROM (
                SELECT DISTINCT `MerchantReferenceId` AS `MerchantReferenceId`, `BookingDate`
                FROM `payment`
                WHERE `BookingDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
                ) AS PM
            GROUP BY `minute`
        ");
    $pageNew = [];
    if ($pageInfo) {
        foreach ($pageInfo as $item) {
            $pageNew[$item['minute']] = $item;
        }
    }
    $minutes = getLineMinute($dateArr['start'], $dateArr['end']);
    foreach($minutes as $minute)
    {
        if (isset($pageNew[$minute])) {
            $selected[] = [
                "date" => intval(strtotime($minute) . '000'),
                "txs"  => (int)(isset($pageNew[$minute]['total']) && $pageNew[$minute]['total']?$pageNew[$minute]['total']:0)
            ];
        } else {
            $selected[] = [
                "date" => intval(strtotime($minute) . '000'),
                "txs"  => (int)(isset($pageNew[$minute]['total']) && $pageNew[$minute]['total']?$pageNew[$minute]['total']:0)
            ];
        }
    }
    return $selected;
}