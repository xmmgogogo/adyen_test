<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . "/Debug.php";
require_once __DIR__ . "/XLog.php";
require_once __DIR__ . '/Mysql.php';

#    指定当前使用的DB配置
define('DB_NUMBER', 1);

XLog::info("Functions", sprintf("Start %s:%s", __FILE__, __LINE__));

$sqlDBConfig = include __DIR__ . '/Config.php';

XLog::info("Functions DbConfig Info", json_encode($sqlDBConfig));

function getParams()
{
    static $params;
    if (empty($params))
    {
        $params  = require_once __DIR__. "/Params.php";
    }
    return $params;
}

foreach($sqlDBConfig as $dbNumber => $dbInfo)
{
    DB::setConnectionInfo($dbNumber, $dbInfo['host'], $dbInfo['port'], $dbInfo['user'], $dbInfo['pwd'], $dbInfo['dbName']);
}

// 总参与人数
function getPayCount()
{
    return intval(DB::fetchOne(DB_NUMBER, 'SELECT count(*) FROM pay'));
}

function getPayPageInfo($page)
{
    if ($page > 0) $page--;

    $count    = getParams()['rowsPerPage'];
    $start    = $page*$count;

    $curTime  = date('Y-m-d H:i:s');

    $pageInfo = DB::fetchAll(DB_NUMBER, "SELECT * FROM pay WHERE `CreateDate` <= '{$curTime}' ORDER BY `CreateDate` DESC LIMIT {$start}, {$count}");

    if ($pageInfo == false) {
        return array();
    }

    return $pageInfo;
}

//    date_start = "12/19/2016"
//    date_end   = "12/19/2016"
//    pm_id      = ""
//    payment_state = "0"
//    payer_name = ""
//    transaction_id= ""
//    track_id   = ""
//    subtrack_id= ""
//    CMD        = ""
//    https://payssion.com/account/payments?
//    page=2&date_start=12/19/2016&date_end=12/19/2016
//    &payer_name=&payment_state=0&pm_id=
//    &track_id=&subtrack_id=&c=1482730376
function search()
{
    $post     = getPostInfo();

    //var_dump($post);die;

    $page     = isset($post['page']) ? $post['page'] : 1;
    $cmd      = isset($post['CMD']) ? $post['CMD'] : "";
    $count    = getParams()['rowsPerPage'];
    $start    = ($page-1) * $count;
    $curTime  = date('Y-m-d H:i:s');

    $condition= " `CreateDate` <= '{$curTime}' ";

    // 添加 日期条件
    // 添加 支付方式条件
    $dateStart    = filter_var( $post['date_start'], FILTER_SANITIZE_STRING);
    // 添加 支付方式条件
    $dateEnd      = filter_var( $post['date_end'], FILTER_SANITIZE_STRING);
    if (isset($dateEnd) && $dateEnd || isset($dateStart) && $dateStart)
    {
        $dateArr   = parseDate($dateStart, $dateEnd);
        $condition.= " AND (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}') ";
    }
    // 添加 支付方式条件
    $paymentMethod = filter_var( $post['pm_id'], FILTER_SANITIZE_STRING);
    if (isset($paymentMethod) && $paymentMethod && in_array($paymentMethod, array_keys(getPaymentTypes())))
    {
        if (!empty($condition))
            $condition.= " AND `PaymentMethod` = '{$paymentMethod}' ";
        else
            $condition.= " `PaymentMethod` = '{$paymentMethod}' ";
    }
    // 添加 订单状态条件
    $paymentStatus = filter_var( $post['payment_state'], FILTER_VALIDATE_INT);
    if (isset($paymentStatus) && ($post['payment_state'] === 0  || in_array($paymentStatus, range(1, 4))))
    {
        if (!empty($condition))
            $condition.= " AND `Status` = $paymentStatus ";
        else
            $condition.= " `Status` = $paymentStatus ";
    }
    // 添加 支付者名称条件
    $payerName    = filter_var( $post['payer_name'], FILTER_SANITIZE_STRING);
    if (isset($payerName) && $payerName)
    {
        if (!empty($condition))
            $condition.= " AND `Payer` = '{$payerName}' ";
        else
            $condition.= " `Payer` = '{$payerName}' ";
    }

    // 添加 交易号条件
    $transactionId= filter_var( $post['transaction_id'], FILTER_SANITIZE_STRING);
    if (isset($transactionId) && $transactionId)
    {
        if (!empty($condition))
            $condition.= " AND `TransactionId` = '{$transactionId}' ";
        else
            $condition.= " `TransactionId` = '{$transactionId}' ";
    }

    // 添加 第三方支付订单号条件
    $trackId      = filter_var( $post['track_id'], FILTER_SANITIZE_STRING);
    if (isset($trackId) && $trackId)
    {
        if (!empty($condition))
            $condition.= " AND `TrackId` = '{$trackId}' ";
        else
            $condition.= " `TrackId` = '{$trackId}' ";
    }

    // 添加 游戏支付订单号条件
    $subTrackId   = filter_var( $post['subtrack_id'], FILTER_SANITIZE_STRING);
    if (isset($subTrackId) && $subTrackId)
    {
        if (!empty($condition))
            $condition.= " AND `SubTrackId` = '{$subTrackId}' ";
        else
            $condition.= " `SubTrackId` = '{$subTrackId}' ";
    }

    $sql      = "SELECT * FROM pay WHERE {$condition}  ORDER BY `CreateDate` DESC LIMIT {$start}, {$count}";
    $total    = intval(DB::fetchOne(DB_NUMBER, "SELECT count(*) FROM pay WHERE {$condition}"));
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);

    if ($pageInfo == false) {
        return array();
    }

    if ($cmd == 'DOWNLOAD_TRANS_CSV')
    {
        $pageInfo = DB::fetchAll(DB_NUMBER, "SELECT * FROM pay WHERE {$condition}  ORDER BY `CreateDate` DESC");
        download($pageInfo);
        exit();
    }

    return array('pageInfo' => $pageInfo, 'count' => $total);
}
function getNavPageInfo($total)
{
    $post        = getPostInfo();
    $count       = getParams()['rowsPerPage'];
    $pageNum     = ceil($total / $count);

    if ($pageNum <= 0 )
    {
        return '';
    }
    $displayPages= getParams()['displayPages'];

    $page        = isset($post['page']) ? $post['page'] : 0;
    $start       = isset($post['start']) ? $post['start'] : 0;
    $prev        = isset($post['prev']) ? $post['prev'] : 0;
    $nextFlag    = isset($post['next']) ? $post['next'] : 0;

    if (!$page || $page==1) {
        $curPage = 1;
        $start   = 1;
        $end     = min(($start + 5), $pageNum);
    } else {
        if ($prev) {
            $curPage = $page - 1;
            $start   = $curPage;
            $end     = min(($start + 5), $pageNum);
        } else if ($nextFlag) {
            $curPage = min(($page + 1), $pageNum);
            $start   = $curPage;
            $end     = min(($start + 5), $pageNum);
        } else {
            $curPage = $page;
            $end     = min(($start + 5), $pageNum);
        }
    }

    $pageInfo    = array(
        'date_start'    => isset($post['date_start']) ? $post['date_start'] : '' ,
        'date_end'      => isset($post['date_end']) ? $post['date_end'] : '' ,
        'payer_name'    => isset($post['payer_name']) ? $post['payer_name'] : '' ,
        'payment_state' => isset($post['payment_state']) ? $post['payment_state'] : '' ,
        'pm_id'         => isset($post['pm_id']) ? $post['pm_id'] : '' ,
        'track_id'      => isset($post['track_id']) ? $post['track_id'] : '' ,
        'subtrack_id'   => isset($post['subtrack_id']) ? $post['subtrack_id'] : '' ,
        'c'             => time()
    );
    $navPageInfo =  '';
    $navPageInfo .= '<nav>';
    $navPageInfo .= '<ul class="pagination" style="margin: 10px">';

    if ($start > 1)
    {
        $tmp         = $pageInfo;
        $tmp['page'] = $start;
        $tmp['prev'] = 1;
        $tmp['start']= $start;
        $tmp         = http_build_query($tmp);
        $navPageInfo .= '<li>';
        $navPageInfo .= '<a href="payments.php?'.$tmp.'">‹</a>';
        $navPageInfo .= '</li>';
    }

    $range       = range($start, $end);
    foreach($range as $thisPage)
    {
        $tmp         = $pageInfo;
        $tmp['page'] = $thisPage;
        $tmp['start']= $start;
        $queryStr    = http_build_query($tmp);
        if ($thisPage == $curPage)
        {
            $navPageInfo      .= '<li class="active">';
        } else {
            $navPageInfo      .= '<li>';
        }
        $navPageInfo      .= '<a href="payments.php?'.$queryStr.'">'.$thisPage.'</a>';
        $navPageInfo      .= '</li>';
    }
    if ($end < $pageNum)
    {
        $tmp         = $pageInfo;
        $tmp['page'] = $end;
        $tmp['start']= $end;
        $tmp['next'] = 1;
        $queryStr    = http_build_query($tmp);
        $navPageInfo      .= '<li>';
        $navPageInfo      .= '<a href="payments.php?'.$queryStr.'">›</a>';
        $navPageInfo      .= '</li>';
    }
    $navPageInfo .= '</ul>';
    $navPageInfo .= '</nav>';

    return $navPageInfo;
}
function getCurDate()
{
    $post     = getPostInfo();
    if (isset($post['date_start']) && $post['date_start'] || isset($post['date_end']) && $post['date_end'])
    {
        return array(
            'date_start'  => $post['date_start'] ,
            'date_end'    => $post['date_end'] ,
        );
    }
    return array(
        'date_start'  => '' ,
        'date_end'    => '' ,
    );
}

function download($pageInfo)
{
    $fileName = 'csv_' . date('Ymd_His') . '.csv';
    $header   = 'Transaction ID,Create Date,App Name,Payer,Status,Payment Method,Currency,Total amount,Fee amount,Net amount,track_id,subtrack_id';
    $output   = '';
    $statusArr= [
        0     => 'Failed' ,
        1     => 'Complete' ,
        2     => 'Pending' ,
        3     => ''
    ];
    foreach($pageInfo as $value)
    {
        if (isset($statusArr[$value['Status']]))
        {
            $value['Status'] = $statusArr[$value['Status']];
        }
        if (empty($output))
            $output =   "{$value['TransactionId']},{$value['CreateDate']},{$value['AppName']},{$value['Payer']},".
                        "{$value['Status']},{$value['PaymentMethod']},{$value['Currency']},{$value['TotalAmount']},".
                        "{$value['FeeAmount']},{$value['NetAmount']},{$value['TrackId']},{$value['SubTrackId']}";
        else
            $output .=  "\n{$value['TransactionId']},{$value['CreateDate']},{$value['AppName']},{$value['Payer']},".
                        "{$value['Status']},{$value['PaymentMethod']},{$value['Currency']},{$value['TotalAmount']},".
                        "{$value['FeeAmount']},{$value['NetAmount']},{$value['TrackId']},{$value['SubTrackId']}";

    }
    header("Content-type: application/vnd.ms-excel; charset=UTF-8");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".strlen($output));
    header("Content-Disposition: attachment; filename=" . $fileName);
    echo iconv("UTF-8","GB2312", $header . "\n" . $output);
    //exit;
}

function getPayPages()
{
    $curTime  = date('Y-m-d H:i:s');
    $pageInfo = DB::fetchAll(DB_NUMBER, "SELECT * FROM pay WHERE `CreateDate` <= '{$curTime}' ORDER BY `CreateDate` DESC");
    if ($pageInfo != false) {
        return array();
    }

    return $pageInfo;
}

function getOnePayInfo($id)
{
    $curTime  = date('Y-m-d H:i:s');
    $pageInfo = DB::fetchRow(DB_NUMBER, "SELECT * FROM pay WHERE `CreateDate` <= '{$curTime}' AND `TransactionId`='{$id}'");

    if ($pageInfo == false) {
        return array();
    }

    return $pageInfo;
}

function statGetTodayIncome()
{
    $dateArr  = parseDate(0, 0);
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT SUM(`TotalAmount`) AS amount, `Currency` as currency
            FROM pay
            WHERE `Status`=1 AND (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}')
            GROUP BY currency;
            ");

//    $pageInfo = DB::fetchAll(DB_NUMBER, "
//            SELECT SUM(`TotalAmount`) AS amount, `Currency` as currency
//            FROM pay
//            WHERE `Status`=1 AND (`CreateDate` BETWEEN '2014-12-30 00:00:00' AND '2014-12-30 23:59:59')
//            GROUP BY currency;
//            ");

    return processStatData($pageInfo);
}

function processStatData($pageInfo)
{
    $total          = 0;
    $journalAccount = [];
    $approximate    = 0;
    foreach($pageInfo as $value)
    {
        if ($value['currency'] == 'USD')
        {
            $total            += $value['amount'];
            $journalAccount[] =  'USD ' . $value['amount'];
        } else {
            $currency         =  getExchangeRate($value['currency']);
            $usdValue         =  round(($value['amount']/$currency), 2);
            $total            += $usdValue;
            $journalAccount[] =  "{$value['currency']} {$value['amount']} ≈{$usdValue} USD";
            $approximate      = 1;
        }
    }
    return array('total' => $total, 'approximate' => $approximate , 'account' => $journalAccount);
}

function statGetMonthIncome()
{
    $curTime        =   time();
    $total          =   date( 't' , $curTime );
    $curMonth       =   date( 'n' , $curTime );
    $curDay         =   date( 'd' , $curTime );
    $curYear        =   date( 'Y' , $curTime );
    $start          =   "{$curYear}-{$curMonth}-{01} 00:00:00";
    $end            =   "{$curYear}-{$curMonth}-{$curDay} 23:59:59";
    $end            =   date('Y-m-d H:i:s');

    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT SUM(`TotalAmount`) AS amount, `Currency` as currency
            FROM pay
            WHERE `Status`=1 AND (`CreateDate` BETWEEN '{$start}' AND '{$end}')
            GROUP BY currency;
            ");

    return processStatData($pageInfo);
}
function statGetAllIncome()
{
    $todayArr = parseDate(0,0);
    $pageInfo = DB::fetchAll(DB_NUMBER, "
            SELECT SUM(`TotalAmount`) AS amount, `Currency` as currency
            FROM pay
            WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}'
            GROUP BY currency;
            ");

    return processStatData($pageInfo);
}
function statGetRemainIncome()
{
    $end      =   date('Y-m-d H:i:s');
    $pageInfo = DB::fetchRow(DB_NUMBER, "
            SELECT SUM(`WithdrawCash`) AS amount
            FROM stat
            WHERE `Dateline` <= '{$end}';
            ");
    return $pageInfo;
}
function formatAccountDisplay($account)
{
    $formatInfo = '';
    if ($account)
    {
        foreach($account as $item)
        {
            if (empty($formatInfo))
            {
                $formatInfo  = '<li class="list-item">'.$item.'</li>';
            }
            else
            {
                $formatInfo .= '<li class="list-item">'.$item.'</li>';
            }
        }
    }
    return $formatInfo;
}

function httpGet($url)
{
    $curlHandle = curl_init($url) ;
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    curl_setopt($curlHandle, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($curlHandle);
    $code   = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
    curl_close($curlHandle);

    if (!$output) {
        $output = file_get_contents($url);
    }
    return $output;
}

define('EXCHANGE_RATE_FILE', XLog::processFileName('/tmp/exchangeRate.cron', XLog::getSystemType()));

// 汇率定时刷新
function setExchangeRate()
{
    $url    = 'http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json';
    $return = httpGet($url);
    $result = [];
    if ( $return )
    {
        $exchangeRateArr = json_decode($return, true);
        if(isset($exchangeRateArr['list']) && isset($exchangeRateArr['list']['resources']))
        {
            $resources = $exchangeRateArr['list']['resources'];
            foreach( $resources as $value )
            {
                $quote    = $value['resource']['fields'];
                $currency = substr($quote['symbol'], 0, 3);
                $result[$currency]  = [$quote['price'],$quote['ts']];
            }
        }
    }
    file_put_contents(EXCHANGE_RATE_FILE, json_encode($result));
    return $result;
}

function getExchangeRate($currency)
{
    $exchangeRate    = file_get_contents(EXCHANGE_RATE_FILE);
    if (!$exchangeRate)
    {
        $exchangeRate = setExchangeRate();
    }
    $exchangeRate    = json_decode($exchangeRate, true);
    if (isset($exchangeRate[$currency]))
    {
        return $exchangeRate[$currency][0];
    }
    return 0;
}

function getCurrencySymbol($currency)
{
    switch ($currency) {
        case 'USD' :
            return '$';
        case 'CNY' :
            return '￥';
        default    :
            return '';
    }
}
# 0:未支付 1:支付完成 2:支付失败 3:退款中 4:退款完成
function getStatusSymbol($status)
{
    switch ($status) {
        case 0 :
            return '未付款';
        case 1 :
            return '已付款';
        case 2 :
            return '支付失败';
        case 3 :
            return '退款中';
        case 4 :
            return '退款完成';
        default    :
            return '未付款';
    }
}
function displayList($result)
{
    $displayStr    = '';
    foreach ($result as $value) {
        $displayStr .= '<tr>';
        $displayStr .= '<td>'.$value['CreateDate'].'</td>';
        $displayStr .= '<td>'.$value['AppName'].'</td>';
        $displayStr .= '<td>'.getPaymentTypes()[$value['PaymentMethod']].'</td>';
        $displayStr .= '<td><a href="https://payssion.com/account/payments/detail?id='.
            $value['TransactionId'].'" target="_parent">'.
            getCurrencySymbol($value['Currency']) .
            $value['TotalAmount'].' '.
            $value['Currency'].'</a></td>';

        if ($value['Status']==1)
        {
            $displayStr .= '<td><span class="label label-success">'.'已付款'.'</span></td>';
        }
        elseif ($value['Status']==0)
        {
            $displayStr .= '<td><span class="label label-primary">'.'未付款'.'</span></td>';
        }
        else
        {
            $displayStr .= '<td><span class="label label-danger">'.'过期'.'</span></td>';
        }

        $displayStr .= '<td>'.$value['TradeInfo'].'<br>track_id:<br>'.$value['TrackId'].'</td>';
        $displayStr .= '</tr>';
    }
    return $displayStr;
}

function displayDetailList($result)
{
    $displayStr    = '';
    foreach ($result as $value) {
        $displayStr .= '<tr>';
        $displayStr .= '<td>'.date('Y-m-d', strtotime($value['CreateDate'])).'</td>';
        $displayStr .= '<td>'.$value['AppName'].'</td>';
        $displayStr .= '<td>'.getPaymentTypes()[$value['PaymentMethod']].'</td>';
        $displayStr .= '<td>'.getCurrencySymbol($value['Currency'])."{$value['TotalAmount']} {$value['Currency']}".'</td>';
        $displayStr .= '<td>'.getCurrencySymbol($value['Currency'])."{$value['FeeAmount']} {$value['Currency']}".'</td>';
        $displayStr .= '<td><a href="https://payssion.com/account/payments/detail?id='.$value['TransactionId'].'" target="_parent">'.getCurrencySymbol($value['Currency']) .
                        $value['NetAmount'].' '.$value['Currency'].'</a></td>';
        // 支付状态
        if ($value['Status']==1)
        {
            $displayStr .= '<td><span class="label label-success">'.'已付款'.'</span></td>';
        }
        elseif ($value['Status']==0)
        {
            $displayStr .= '<td><span class="label label-primary">'.'未付款'.'</span></td>';
        }
        else
        {
            $displayStr .= '<td><span class="label label-danger">'.'过期'.'</span></td>';
        }
        $displayStr  .= '<td>'.$value['TradeInfo'].'<br>track_id:<br>'.$value['TrackId'].'</td>';
        $displayStr  .= '</tr>';
    }
    return $displayStr;
}
function parseDate($start, $end)
{
    $curTime  = computeTodayTime()['startTime']; //今天的开始时间
    $start    = empty($start) ? $curTime : strtotime($start);
    $end      = empty($end) ? $curTime : strtotime($end);

    if ($start && $start <= $curTime) {
        if (!$end) $end = $curTime;
        if ($end <= $start) $end = $start;

        return array(
            'start' => date('Y-m-d 00:00:00', $start) ,
            'end'   => date('Y-m-d 23:59:59', $end) ,
        );
    } else {
        return array(
            'start' => date('Y-m-d 00:00:00') ,
            'end'   => date('Y-m-d 23:59:59') ,
        );
    }
}
function getPaymentTypes()
{
    return array(
        'alipay_cn' => 'Alipay',
        'bitcoin'   => 'Bitcoin' ,
        'boleto_br' => 'Boleto' ,
        'cashu'     => 'CashU',
        'ideal_nl'  => 'iDeal',
        'neosurf'   => 'Neosurf',
        'onecard'   => 'OneCard' ,
        'paysafecard' => 'Paysafecard',
        'qiwi'      => 'QIWI' ,
        'sofort'    => 'SOFORT' ,
        'tenpay_cn' => 'Tenpay' ,
        'webmoney'  => 'WebMoney',
        'yamoney'   => 'Yandex.Money'
    );
}
function getPostInfo()
{
    return array_merge($_POST, $_GET);
}
function getSelectInfo()
{
    $post    = getPostInfo();
    if (isset($post['pm_id']) && $post['pm_id'])
    {
        $paymentId   = $post['pm_id'];
        $paymentInfo = '<option value="">支付方式</option>';
    }
    else
    {
        $paymentId   = '';
        $paymentInfo = '<option value="" selected>支付方式</option>';
    }
    $paymentTypes = getPaymentTypes();
    foreach($paymentTypes as $type => $name)
    {
        if ($type == $paymentId)
        {
            $paymentInfo .= '<option value="'.$type.'" selected>'.$name.'</option>';
        }
        else
        {
            $paymentInfo .= '<option value="'.$type.'">'.$name.'</option>';
        }
    }

    return $paymentInfo;
}
function computeTodayTime( $time = 0 )
{
    if ( $time <= 0 )
    {
        $time = getTimestamp();
    }

    //获取当前时区与格林威治时间相差多少秒
    $secondOfTimeZone = date( "Z" );

    //先把指定时间加上了时区相差的描述
    $time += $secondOfTimeZone;

    //计算起始时间和结束时间，并返回
    return array(
        "startTime" =>  ( $time - ( $time % 86400 ) - $secondOfTimeZone ) ,
        "endTime"   =>  ( $time - ( $time % 86400 ) - $secondOfTimeZone ) + 86399 ,
    );
}
function getTimestamp()
{
    $timestamp = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
    //测试状态模拟的时间, 可传入正数或负数
    if( isset( $_GET['testChangeTime'] ) )
    {
        $timestamp += (int)$_GET['testChangeTime'];
    }

    return $timestamp;
}


XLog::info("Functions ", " END ");