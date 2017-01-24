<?php

//https://ca-live.adyen.com/ca/ca/data/transactions/summary.shtml?1485155001992
//formHash:626aj5IrRQljKrWwLn1WPjEzaafdoc=
//granularity:week
//startdate:2017-01-15 00:00:00
//enddate:2017-01-22 00:00:00
//previousPeriod:true
//{"selectedPeriod":[{"date":1484434800000,"txs":5808}],"previousPeriod":[{"date":1483830000000,"txs":1717}]}
function statHourTransactions()
{
    $dateArr  = getTransactionDate();
    return [
        'selectedPeriod' => getHourSelected($dateArr['selectedPeriod']),
        'previousPeriod' => getHourSelected($dateArr['previousPeriod'])
    ];
}
function getHourSelected($dateArr)
{
    //$curTime  = date('Y-m-d H:i:s');
    $selected = [];
    $pageInfo = DB::fetchAll(DB_NUMBER, "
        SELECT count(`MerchantReferenceId`) AS total,
               date_format(`BookingDate`, '%Y-%m-%d %H:00:00') AS `dayHour`
        FROM (
            SELECT DISTINCT `MerchantReferenceId` AS `MerchantReferenceId`, `BookingDate`
            FROM `payment`
            WHERE `BookingDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
            ) AS PM
        GROUP BY `dayHour`
    ");
    $pageNew = [];
    if ($pageInfo) {
        foreach ($pageInfo as $item) {
            $pageNew[$item['dayHour']] = $item;
        }
    }
    $hours  = getLineHour($dateArr['start'], $dateArr['end']);

    foreach($hours as $hour)
    {
        if (isset($pageNew[$hour])) {
            $selected[] = [
                "date" => intval(strtotime($hour) . '000'),
                "txs"  => (int)(isset($pageNew[$hour]['total']) && $pageNew[$hour]['total']?$pageNew[$hour]['total']:0)
            ];
        } else {
            $selected[] = [
                "date" => intval(strtotime($hour) . '000'),
                "txs"  => (int)(isset($pageNew[$hour]['total']) && $pageNew[$hour]['total']?$pageNew[$hour]['total']:0)
            ];
        }
    }
    return $selected;
}