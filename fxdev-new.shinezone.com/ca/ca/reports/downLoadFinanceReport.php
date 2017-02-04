<?php
require_once 'PHPExcel.php';
require_once 'PHPExcel/Writer/Excel5.php';
require_once 'PHPExcel/IOFactory.php';
require_once __DIR__ . "/../payments/common.php";

$oldFileName = 'daily_finance_report.xls';
$newFileName = __DIR__ . '/../../files/testtest.xls';

//调用数据
$common = new common();

//reportCode:daily_finance_report
//reportdate:2017-01-22
//format:XLS
//queue:true
//formHash:0907bALHEeCjCpxNNtQb/svxaIJ85Y=

//报告日期
$reportDate = isset($_POST['reportdate']) ? $_POST['reportdate'] : date('Y-m-d');

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
/*
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
*/

/**
 * 每日报表
 * @param $common
 * @param $parameters
 * @return array
 */
function dailyFinanceReport_Mutations($common, $parameters) {
    $MutationsSheet7 = $MutationsSheet7_Bak = [];

    $where = 1;//直接写入
    $searchKey = ['RecordType', 'ReceivedPC', 'AuthorisedPC', 'CapturedPC', 'PayableSC', 'CommissionSC', 'MarkupSC', 'SchemeFeesSC', 'InterchangeSC', 'ProcessingFeeFC'];
    $searchDataK_1 = ['Received', 'Authorised', 'Captured', 'Payable', 'Commission', 'Markup', 'SchemeFees', 'Interchange', 'Fee'];
    $searchDataV_1 = ['ReceivedPC', 'AuthorisedPC', 'CapturedPC', 'PayableSC', 'CommissionSC', 'MarkupSC', 'SchemeFeesSC', 'InterchangeSC', 'ProcessingFeeFC'];

    $where .= " and BookingDate >= :BookingDate_s and BookingDate <= :BookingDate_e limit 0, 10000";//TODO
    $result = $common->sqlQuery("select " . implode(',', $searchKey) . " from payment WHERE {$where}", $parameters);
    $result = $common->formatArrayByCondition($result, 'RecordType', '');

    $reportExcelData = [];
    foreach($result as $recodeType => $resultInfo) {
        //遍历每种类型的订单，对应的全部FC状态
        foreach($resultInfo as $payInfo) {
            //遍历每种状态，进行收集
            foreach($searchDataV_1 as $serVNum => $serV){
//            if($payInfo[$serV]) {
                if(isset($reportExcelData[$recodeType][$searchDataK_1[$serVNum]])) {
                    $reportExcelData[$recodeType][$searchDataK_1[$serVNum]] += $payInfo[$serV];
                    $reportExcelData[$recodeType][$searchDataK_1[$serVNum] . '_num'] += 1;
                } else {
                    $reportExcelData[$recodeType][$searchDataK_1[$serVNum]] = $payInfo[$serV];
                    $reportExcelData[$recodeType][$searchDataK_1[$serVNum] . '_num'] = 1;
//                }
                }
            }
        }
    }

    //组装数据，写入excel表
    foreach($reportExcelData as $recodeType => $payInfo) {
        //遍历模板，拆分多个结构
        foreach($payInfo as $k => $v) {
            if(substr($k, -4) != '_num') {
                if($v != 0) {
                    if($k != 'Received') {
                        $MutationsSheet7[] = [
                            'MerchantCode'  => 'ShineZone',
                            'Register'      => $k,
                            'JournalType'   => $recodeType,
                            'SL'            => 'M',
                            'Count'         => $payInfo[$k . '_num'],
                            'Currency'      => 'USB',
                            'Amount'        => sprintf('%.2f', $v),
                        ];
                    } else {
                        $MutationsSheet7_Bak = [
                            'MerchantCode'  => 'ShineZone',
                            'Register'      => 'ReceivedRequest',
                            'JournalType'   => $recodeType,
                            'SL'            => 'M',
                            'Count'         => $payInfo[$k . '_num'],
                            'Currency'      => 'USB',
                            'Amount'        => sprintf('%.2f', $v),
                        ];
                    }
                }
            }
        }
    }

    return array_merge($MutationsSheet7, $MutationsSheet7_Bak);
}

/*
 *真实数据
 */

$MutationsSheet7_1 = $MutationsSheet7_2 = [];

//查询日期-日报表 | TODO 写死读取10000，不然会挂
//$parameters['BookingDate_s'] = $reportDate;
//$parameters['BookingDate_e'] = date('Y-m-d', strtotime('+1 days', strtotime($reportDate)));
//$MutationsSheet7_1 = dailyFinanceReport_Mutations($common, $parameters);
//
////查询日期-月报表
//$parameters['BookingDate_s'] = date('Y-m', strtotime($reportDate));
//$parameters['BookingDate_e'] = date('Y-m-d', strtotime('+1 days', strtotime($reportDate)));
//$MutationsSheet7_2 = dailyFinanceReport_Mutations($common, $parameters);

//$common->dump($MutationsSheet7_2);die;
//--------------------修改第7sheet数据（Mutations）--------------------


//--------------------修改第8sheet数据（Payment Method Breakdown）--------------------
/*
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
*/

/**
 * 每日报表
 * @param $common
 * @param $parameters
 * @return array
 */
function dailyFinanceReport_Breakdown($common, $parameters) {
    $data_1 = $data_2 = [];

    $where = 1;//直接写入
    $searchKey = ['MerchantAccount', 'RecordType', 'PaymentMethod', 'MainAmount'];
    $searchDataV_1 = ['SentForSettle', 'SentForRefund'];
    $searchDataV_2 = ['Received', 'Authorised', 'Refused', 'Error', 'Chargeback'];

    $where .= " and BookingDate >= :BookingDate_s and BookingDate <= :BookingDate_e";
    $result = $common->sqlQuery("select " . implode(',', $searchKey) . " from payment WHERE {$where}", $parameters);
    $result = $common->formatArrayByCondition($result, 'PaymentMethod', '');

    $reportExcelData = $reportExcelData_2 = [];
    foreach($result as $recodeType => $resultInfo) {
        //遍历每种类型的订单，对应的全部FC状态
        foreach($resultInfo as $payInfo) {
            //服务于统计1，遍历每种状态，进行收集
            if(in_array($payInfo['RecordType'], $searchDataV_1)) {
                $serV = $payInfo['RecordType'];
                if(isset($reportExcelData[$recodeType][$serV])) {
                    $reportExcelData[$recodeType][$serV] += $payInfo['MainAmount'];
                    $reportExcelData[$recodeType][$serV . '_num'] += 1;
                } else {
                    $reportExcelData[$recodeType][$serV] = $payInfo['MainAmount'];
                    $reportExcelData[$recodeType][$serV . '_num'] = 1;
                }
            }

            //服务于统计2
            if(in_array($payInfo['RecordType'], $searchDataV_2)) {
                $serV = $payInfo['RecordType'];
                if(isset($reportExcelData_2[$recodeType][$serV])) {
                    $reportExcelData_2[$recodeType][$serV] += 1;
                } else {
                    $reportExcelData_2[$recodeType][$serV] = 1;
                }
            }
        }
    }

    //组装数据，写入excel表
    foreach($reportExcelData as $recodeType => $payInfo) {
        //遍历模板，拆分多个结构
        $data_1[] = [
            'AccountCode'               => 'ShineZoneHK',
            'PaymentMethod'             => $recodeType,
            'SentForSettle_Count'       => isset($payInfo['SentForSettle_num']) ? $payInfo['SentForSettle_num'] : 0,
            'SentForSettle_Currency'    => 'USB',
            'SentForSettle_Amount'      => isset($payInfo['SentForSettle']) ? $payInfo['SentForSettle'] : 0,
            'SentForRefund_Count'       => isset($payInfo['SentForRefund_num']) ? $payInfo['SentForRefund_num'] : 0,
            'SentForRefund_Currency'    => 'USB',
            'SentForRefund_Amount'      => isset($payInfo['SentForRefund']) ? $payInfo['SentForRefund'] : 0,
        ];
    }

    foreach($reportExcelData_2 as $recodeType => $payInfo) {
        //遍历模板，拆分多个结构
        $data_2[] = [
            'AccountCode'               => 'ShineZoneHK',
            'PaymentMethod'             => $recodeType,
            'Received'                  => isset($payInfo['Received']) ? $payInfo['Received'] : 0,
            'Authorised'                => isset($payInfo['Authorised']) ? $payInfo['Authorised'] : 0,
            'Refused'                   => isset($payInfo['Refused']) ? $payInfo['Refused'] : 0,
            'Error'                     => isset($payInfo['Error']) ? $payInfo['Error'] : 0,
            'Chargeback'                => isset($payInfo['Chargeback']) ? $payInfo['Chargeback'] : 0,
        ];
    }

    return [
        'sheet8_1' => $data_1,
        'sheet8_2' => $data_2,
    ];
}

$PaymentMethodBreakdownSheet8_1 = $PaymentMethodBreakdownSheet8_2 = [];

//查询日期-日报表
$parameters['BookingDate_s'] = $reportDate;
$parameters['BookingDate_e'] = date('Y-m-d', strtotime('+1 days', strtotime($reportDate)));
$PaymentMethodBreakdownSheet8 = dailyFinanceReport_Breakdown($common, $parameters);
$PaymentMethodBreakdownSheet8_1 = $PaymentMethodBreakdownSheet8['sheet8_1'];
$PaymentMethodBreakdownSheet8_2 = $PaymentMethodBreakdownSheet8['sheet8_2'];

//$common->dump($PaymentMethodBreakdownSheet8);
//die;
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

    if(is_array($vInfo1)) {
        foreach($vInfo1 as $k2 => $v2) {
            $char = chr($sheet3_char);
            $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
            $sheet3_char++;
        }
    }

    $sheet3_curLine++;
}

$sheet3_curLine = 6;
foreach($MutationsSheet7_2 as $k1 => $vInfo1) {
    $sheet3_char = 75;//对应数字K

    if(is_array($vInfo1)) {
        foreach($vInfo1 as $k2 => $v2) {
            $char = chr($sheet3_char);
            $excel2->getActiveSheet()->setCellValue($char . $sheet3_curLine, $v2);
            $sheet3_char++;
        }
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