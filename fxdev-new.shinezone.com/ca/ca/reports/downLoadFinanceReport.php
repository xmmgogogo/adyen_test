<?php
require_once 'PHPExcel.php';
require_once 'PHPExcel/Writer/Excel5.php';
require_once 'PHPExcel/IOFactory.php';
require_once __DIR__ . "/../payments/common.php";

$oldFileName = 'daily_finance_report.xls';
$newFileName = __DIR__ . '/../../files/testtest.xls';

//--------------------修改第3sheet数据（Open balances）--------------------
$OpenBalancesSheet3 = [
    [
        'MerchantAccount' => 'miniHK',
        'Register' => 'Captured',
        'Batch' => rand(1, 100),
        'bdate' => '2017/1/19',
        'edate' => '2017/2/19',
        'sl' => 'M',
        'Acquirer' => 'adyen',
        'Variant' => 'alipay',
        'Currency' => 'USD',
        'Amount' => rand(1000, 5000),
    ],
    [
        'MerchantAccount' => 'miniHK',
        'Register' => 'Captured',
        'Batch' => rand(1, 100),
        'bdate' => '2017/1/19',
        'edate' => '2017/2/19',
        'sl' => 'M',
        'Acquirer' => 'adyen',
        'Variant' => 'alipay',
        'Currency' => 'USD',
        'Amount' => rand(1000, 5000),
    ],
    [
        'MerchantAccount' => 'miniHK',
        'Register' => 'Captured',
        'Batch' => rand(1, 100),
        'bdate' => '2017/1/19',
        'edate' => '2017/2/19',
        'sl' => 'M',
        'Acquirer' => 'adyen',
        'Variant' => 'alipay',
        'Currency' => 'USD',
        'Amount' => rand(1000, 5000),
    ],
];


//调用数据
$common = new common();

$parameters = [
    'BookingDate1' => date('Y-m-d'),
    'BookingDate2' => date('Y-m-d', strtotime("+ 1 days")),
];

$sql = "select * from payment where BookingDate < :BookingDate1 and BookingDate <= :BookingDate2 and RecordType = 'Settled'";
$data = $common->sqlQuery($sql, $parameters);

$common->dump($data);die;
//--------------------修改第3sheet数据（Open balances）--------------------

//--------------------修改第6sheet数据（Balances）--------------------
$BalancesSheet6_1 = [
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
];

$BalancesSheet6_2 = [
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
];

$BalancesSheet6_3 = [
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
    [
        'AccountCode' => 'ShineZone',
        'Register' => 'Authorised',
        'SL' => 'm',
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
];

//--------------------修改第6sheet数据（Balances）--------------------

//--------------------修改第7sheet数据（Mutations）--------------------
$MutationsSheet7_1 = [
    [
        'MerchantCode' => 'ShineZone',
        'Register' => 'Authorised',
        'JournalType' => 'Authorised',
        'SL' => 'M',
        'Count' => rand(1, 100),
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
    [
        'MerchantCode' => 'ShineZone',
        'Register' => 'Authorised',
        'JournalType' => 'Authorised',
        'SL' => 'M',
        'Count' => rand(1, 100),
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
    [
        'MerchantCode' => 'ShineZone',
        'Register' => 'Authorised',
        'JournalType' => 'Authorised',
        'SL' => 'M',
        'Count' => rand(1, 100),
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
];

$MutationsSheet7_2 = [
    [
        'MerchantCode' => 'ShineZone',
        'Register' => 'Authorised',
        'JournalType' => 'Authorised',
        'SL' => 'M',
        'Count' => rand(1, 100),
        'Currency' => 'USB',
        'Amount' => rand(0, 5000),
    ],
];

//--------------------修改第7sheet数据（Mutations）--------------------


//--------------------修改第8sheet数据（Payment Method Breakdown）--------------------
$PaymentMethodBreakdownSheet8_1 = [
    [
        'AccountCode' => 'ShineZoneHK',
        'PaymentMethod' => 'alipay',
        'SentForSettle_Count' => 955,
        'SentForSettle_Currency' => 'USB',
        'SentForSettle_Amount' => 198495,
        'SentForRefund_Count' => 0,
        'SentForRefund_Currency' => 'USB',
        'SentForRefund_Amount' => 198495,
    ],
];

//这里格式不一样
$PaymentMethodBreakdownSheet8_2 = [
    [
        'AccountCode' => 'ShineZoneHK',
        'PaymentMethod' => 'alipay',
        'Received' => 959,
        'Authorised' => 955,
        'Refused' => 4,
        'Error' => 0,
        'Chargeback' => 0,
    ],
];

//--------------------修改第8sheet数据（Payment Method Breakdown）--------------------


//--------------------修改第9sheet数据（Configuration）--------------------
$ConfigurationSheet9 = [
    [
        'AccountType' => 'company',
        'AccountCode' => 'ShineZone',
        'PrimaryCurrency' => 'USD',
        'ReportDate' => '2017/1/25',
        'Description' => 'ShineZone',
    ],
];
//--------------------修改第9sheet数据（Configuration）--------------------


//加载模板excel
$excel2 = PHPExcel_IOFactory::load($oldFileName);

//tips
//A 65 B 66

//--------------------修改第3sheet数据（Open balances）------------------------------
$excel2->setActiveSheetIndex(3 - 1);

//A的ASCII码是65，B 66
$sheet3_curLine = 10;
foreach($OpenBalancesSheet3 as $k1 => $vInfo1) {
    $sheet3_char = 66;//对应数字B

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}
//--------------------修改第3sheet数据（Open balances）------------------------------

//--------------------修改第6sheet数据（Balances）------------------------------
$excel2->setActiveSheetIndex(6 - 1);

//A的ASCII码是65，B 66
$sheet3_curLine = 6;
foreach($BalancesSheet6_1 as $k1 => $vInfo1) {
    $sheet3_char = 65;//对应数字A

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

$sheet3_curLine = 6;
foreach($BalancesSheet6_2 as $k1 => $vInfo1) {
    $sheet3_char = 73;//对应数字A

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

$sheet3_curLine = 6;
foreach($BalancesSheet6_3 as $k1 => $vInfo1) {
    $sheet3_char = 81;//对应数字Q

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}
//--------------------修改第6sheet数据（Balances）------------------------------

//--------------------修改第7sheet数据（Mutations）------------------------------
$excel2->setActiveSheetIndex(7 - 1);

//A的ASCII码是65，B 66
$sheet3_curLine = 6;
foreach($MutationsSheet7_1 as $k1 => $vInfo1) {
    $sheet3_char = 65;//对应数字A

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

$sheet3_curLine = 6;
foreach($MutationsSheet7_2 as $k1 => $vInfo1) {
    $sheet3_char = 75;//对应数字K

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

//--------------------修改第7sheet数据（Mutations）------------------------------

//--------------------修改第8sheet数据（Payment Method Breakdown）--------------------
$excel2->setActiveSheetIndex(8 - 1);

//A的ASCII码是65，B 66
$sheet3_curLine = 6;
foreach($PaymentMethodBreakdownSheet8_1 as $k1 => $vInfo1) {
    $sheet3_char = 66;//对应数字B

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

$sheet3_curLine = 6;
foreach($PaymentMethodBreakdownSheet8_2 as $k1 => $vInfo1) {
    $sheet3_char = 77;//对应数字M

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}
//--------------------修改第8sheet数据（Payment Method Breakdown）--------------------


//--------------------修改第9sheet数据（Configuration）--------------------
$excel2->setActiveSheetIndex(9 - 1);

//A的ASCII码是65，B 66
$sheet3_curLine = 3;
foreach($ConfigurationSheet9 as $k1 => $vInfo1) {
    $sheet3_char = 66;//对应数字B

    foreach($vInfo1 as $k2 => $v2) {
        $char = chr($sheet3_char);
        $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
        $sheet3_char++;
    }

    $sheet3_curLine++;
}

//--------------------修改第9sheet数据（Configuration）--------------------


//导出
$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
$objWriter->save($newFileName);

echo "OK - " . date('Y-m-d H:i:s');