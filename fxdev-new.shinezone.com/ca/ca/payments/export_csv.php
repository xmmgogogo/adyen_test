<?php
/**
 * csv文件导出功能
 * 2017-1-6 mm
 */

include "common.php";
$common = new common();

//字段映射
$csvDownLoadMap = array(
    'PspReferenceId'        => 'PSP Reference',
    'MerchantReferenceId'   => 'Merchant Reference',
    'CompanyAccount'        => 'CompanyAccount',        //用不到
    'MerchantAccount'       => 'Account',
    'BookingDate'           => 'Creation Date',
    'TimeZone'              => 'TimeZone',
    'POSTransationDate'     => 'POS Transation Date',
    'UniqueTerminalID'      => 'Unique Terminal ID',
    'MainAmount'            => 'Value',
    'PaymentCurrency'       => 'Currency',
    'PaymentMethod'         => 'Payment Method',
    'Status'                => 'Status',                //复合字段
    'RawAcquirerResponse'   => 'Raw Acquirer Response',
    'IssuerCountry'         => 'Issuer Country',
    'ShopperCountry'        => 'Shopper Country',
    'EntryMode'             => 'Entry Mode',
    'CVMPerformed'          => 'CVM Performed',
    'CVMResult'             => 'CVM Result',
    'DCCAccepted'           => 'DCC Accepted',
    'Offline'               => 'Offline',
    'FraudScoring'          => 'Fraud Scoring',
);

if(isset($_REQUEST['pos'])) {
    $payment = array('PspReferenceId', 'MerchantReferenceId', 'MerchantAccount', 'BookingDate', 'TimeZone', 'POSTransationDate', 'UniqueTerminalID', 'MainAmount', 'PaymentCurrency', 'PaymentMethod', 'Status', 'RawAcquirerResponse', 'IssuerCountry', 'ShopperCountry', 'EntryMode', 'CVMPerformed', 'CVMResult', 'DCCAccepted', 'Offline');
} else {
    $payment = array('PspReferenceId', 'MerchantReferenceId', 'MerchantAccount', 'BookingDate', 'TimeZone', 'MainAmount', 'PaymentCurrency', 'PaymentMethod', 'Status', 'FraudScoring');
}

//$str = "姓名,性别,年龄" . PHP_EOL;
//1，先进行标题行替换
foreach($payment as $val) {

}
$str = implode(',', $payment)  . PHP_EOL;
$str = iconv('utf-8', 'gb2312' , $str);

//排序
$orderBy = '';
if(isset($_REQUEST['sortDirection'])) {
    $orderBy = ' order by BookingDate ' . $_REQUEST['sortDirection'];
    unset($_REQUEST['sortDirection']);
}

$result = $common->getOrderList("select * from payment where 1", $_REQUEST, $orderBy);
foreach($result as $row)
{
    foreach($payment as $value) {
        $str .= $row[$value] . ',';
    }

    $str .= PHP_EOL; //用引文逗号分开
}

$common->dump($result);die;
$filename = 'paymentlist(' . date('YmdHi') . ').csv'; //设置文件名

export_csv($filename, $str); //导出

function export_csv($filename, $data)
{
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}