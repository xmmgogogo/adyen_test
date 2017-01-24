<?php

function statDayTransactions()
{
    $dateArr  = getTransactionDate();
    return [
        'selectedPeriod' => getSelected($dateArr['selectedPeriod']),
        'previousPeriod' => getSelected($dateArr['previousPeriod'])
    ];
}
function getSelected($dateArr)
{
    //$curTime  = date('Y-m-d H:i:s');
    $selected = [];
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT count(`MerchantReferenceId`) AS total,
                   date_format(`BookingDate`, '%Y-%m-%d') AS `day`
            FROM (
                SELECT DISTINCT `MerchantReferenceId` AS `MerchantReferenceId`, `BookingDate`
                FROM `payment`
                WHERE `BookingDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}'
                ) AS PM
            GROUP BY `day`
        ");
    $pageNew = [];
    if ($pageInfo) {

        foreach ($pageInfo as $item) {
            $pageNew[$item['day']] = $item;
        }
    }
    $days = getLineDay2($dateArr['start'], $dateArr['end']);

    foreach($days as $day)
    {
        if (isset($pageNew[$day])) {
            $selected[] = [
                "date" => intval(strtotime($day) . '000'),
                "txs"  => (int)(isset($pageNew[$day]['total']) && $pageNew[$day]['total']?$pageNew[$day]['total']:0)
            ];
        } else {
            $selected[] = [
                "date" => intval(strtotime($day) . '000'),
                "txs"  => (int)(isset($pageNew[$day]['total']) && $pageNew[$day]['total']?$pageNew[$day]['total']:0)
            ];
        }
    }
    return $selected;
}