<?php
require_once __DIR__ . "/../../../../functions/Reports.php";

header("Content-type: application/json;charset=UTF-8");

$downloadHistory      = statDownloadInfo();

$data          = [];
$dailyFinanceReport = [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['dfr'])?$downloadHistory['dfr']:0 ,
];
$data['daily_finance_report'] = $dailyFinanceReport;
$disputeReport = [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['dispute'])?$downloadHistory['dispute']:0 ,
];
$data['dispute_report'] = $disputeReport;
$hppReport     = [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['hpp'])?$downloadHistory['hpp']:0 ,
];
$data['hpp_conversion_detail_report'] = $hppReport;
$invoicePDF    = [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['invoice'])?$downloadHistory['invoice']:0 ,
];
$data['Invoice-PDF']  = $invoicePDF;
$monthFinReport= [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['mfr'])?$downloadHistory['mfr']:0 ,
];
$data['monthly_finance_report']  = $monthFinReport;
$payAccountReport= [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => isset($downloadHistory['par'])?$downloadHistory['par']:0 ,
];
$data['payments_accounting_report']  = $payAccountReport;
$exchangeRateReport   = [
    'accountSpecific' => true ,
    'common'          => false ,
    'available'       => 2 ,
    'files'           => [
        "exchange_rate_report_2017_01_19.xml" ,
        "exchange_rate_report_2017_01_19.csv"
    ]
];
$data['exchange_rate_report']  = $exchangeRateReport;

echo json_encode($data);die;