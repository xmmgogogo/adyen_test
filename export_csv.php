<?php

include "config.php";

//$result = [
//    ['柳绵绵', 1, 20],
//    ['lmj22', 1, 13],
//    ['lmj33', 0, 45],
//];

if(isset($_REQUEST['pos'])) {
    $payment = ['PSP Reference', 'Merchant Reference', 'Account', 'Creation Date', 'TimeZone', 'POS Transation Date', 'Unique Terminal ID', 'Value', 'Currency', 'Payment Method', 'Status', 'Raw Acquirer Response', 'Issuer Country', 'Shopper Country', 'Entry Mode', 'CVM Performed', 'CVM Result', 'DCC Accepted', 'Offline'];
} else {
    $payment = ['PSP Reference', 'Merchant Reference', 'Account', 'Creation Date', 'TimeZone', 'Value', 'Currency', 'Payment Method', 'Status', 'Fraud Scoring'];
}

//$str = "姓名,性别,年龄" . PHP_EOL;
$str = $str = implode(',', $payment)  . PHP_EOL;
$str = iconv('utf-8', 'gb2312' ,$str);

//foreach($result as $row)
//{
//    $name = iconv('utf-8','gb2312',$row[0]); //中文转码
//    $sex = iconv('utf-8','gb2312',$row[1]);
//    $str .= $name.",".$sex.",".$row[2]."\n"; //用引文逗号分开
//}

$result = mysqli_query($conn, "select * from payment");
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
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