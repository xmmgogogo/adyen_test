<?php
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

// Ref ID	Project	User ID	Datetime	Payment Method	Price	Currency	Purchased	Country of Location	Status	Payment Type	Pingback Status	Pingback Response
function download($pageInfo)
{
    $fileName = 'csv_' . date('Ymd_His') . '.csv';
    $header   = 'Ref Id,Project,User ID,Datetime,Payment method,Price,Currency,Purchased,Country of Location,Status,Payment Type,Pingback Status,Pingback Response';
    $output   = '';
    foreach($pageInfo as $value)
    {
        $date    = date('m/d/Y H:i a', $value['CreateDate']);
        $project = getSearchOptions()[$value['Project']];
        $response= str_replace(array("\r\n","\n"), chr(10), $value['PingbackResponse']);

        if (empty($output))
            $output =   "{$value['RefId']},{$project},{$value['UserId']},{$date},{$value['PaymentMethod']},{$value['Price']},".
                "{$value['Currency']},{$value['Purchased']},{$value['Country']},,".
                "{$value['PaymentType']},{$value['PingbackStatus']},\"$response\"";
        else
            $output .=  "\r\n{$value['RefId']},{$project},{$value['UserId']},{$date},{$value['PaymentMethod']},{$value['Price']},".
                "{$value['Currency']},{$value['Purchased']},{$value['Country']},,".
                "{$value['PaymentType']},{$value['PingbackStatus']},\"$response\"";
    }

    header("Content-type: application/vnd.ms-excel; charset=UTF-8");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".strlen($output));
    header("Content-Disposition: attachment; filename=" . $fileName);
    echo $header . "\r\n" . $output;//iconv("UTF-8", "GB2312", $header . "\r\n" . $output);
    exit;
}

function configCountry()
{
    $countries = require_once "Countries.php";
    return $countries;
}

function configMonth()
{
    return [
        '01' => 'January' ,
        '02' => 'February' ,
        '03' => 'March' ,
        '04' => 'April' ,
        '05' => 'May' ,
        '06' => 'June' ,
        '07' => 'July' ,
        '08' => 'August' ,
        '09' => 'September' ,
        '10' => 'October' ,
        '11' => 'November' ,
        '12' => 'December' ,
    ];
}


function parseDateTime($str)
{
    switch ($str) {
        case 'week' :
            $curTime   = computeTodayTime()['startTime'] - 1; //今天的开始时间
            $startTime = $curTime - 7 * 3600 * 24;
            return [
                'start' => date('Y-m-d H:i:s', computeTodayTime($startTime)['startTime']) ,
                'end'   => date('Y-m-d H:i:s', $curTime)
            ];
        case 'two_weeks' :
            $curTime   = computeTodayTime()['startTime'] - 1; //今天的开始时间
            $startTime = $curTime - 14 * 3600 * 24;
            return [
                'start' => date('Y-m-d H:i:s', computeTodayTime($startTime)['startTime']) ,
                'end'   => date('Y-m-d H:i:s', $curTime)
            ];
        case 'month' :
            $curTime   = computeTodayTime()['startTime'] - 1; //今天的开始时间
            $startTime = $curTime - 30 * 3600 * 24;
            return [
                'start' => date('Y-m-d H:i:s', computeTodayTime($startTime)['startTime']) ,
                'end'   => date('Y-m-d H:i:s', $curTime)
            ];
        case 'all' :
            return [
                'start' => '0000-00-00 00:00:00' ,
                'end'   => date('Y-m-d H:i:s')
            ];
        default    :
            return [
                'start' => '0000-00-00 00:00:00' ,
                'end'   => date('Y-m-d H:i:s')
            ];
    }
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

function getPostInfo()
{
    return array_merge($_POST, $_GET);
}