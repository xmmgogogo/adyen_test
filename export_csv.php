<?php
/**
 * csv文件导出功能
 * 2017-1-6 mm
 */

include "common.php";
$common = new common();

//$result = [
//    ['柳绵绵', 1, 20],
//    ['lmj22', 1, 13],
//    ['lmj33', 0, 45],
//];

if(isset($_REQUEST['pos'])) {
    $payment = array('PSPReference', 'Merchant Reference', 'Account', 'creationDate', 'TimeZone', 'POS Transation Date', 'Unique Terminal ID', 'Value', 'Currency', 'paymentMethod', 'Status', 'Raw Acquirer Response', 'Issuer Country', 'Shopper Country', 'Entry Mode', 'CVM Performed', 'CVM Result', 'DCC Accepted', 'Offline');
} else {
    $payment = array('PSPReference', 'Merchant Reference', 'Account', 'creationDate', 'TimeZone', 'Value', 'Currency', 'paymentMethod', 'Status', 'Fraud Scoring');
}

//$str = "姓名,性别,年龄" . PHP_EOL;
$str = $str = implode(',', $payment)  . PHP_EOL;
$str = iconv('utf-8', 'gb2312' ,$str);

$result = $common->getOrderList("select * from payment");
foreach($result as $row)
{
    foreach($payment as $value) {
        $str .= $row[$value] . ',';
    }

    $str .= PHP_EOL; //用引文逗号分开
}

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