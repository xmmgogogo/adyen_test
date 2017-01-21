<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . "/Debug.php";
require_once __DIR__ . "/XLog.php";
require_once __DIR__ . '/Mysql.php';

#    指定当前使用的DB配置
define('DB_NUMBER', 2);

XLog::info("Chart", sprintf("Start %s:%s", __FILE__, __LINE__));

$sqlDBConfig = include __DIR__ . '/Config.php';

XLog::info("Chart DbConfig Info", json_encode($sqlDBConfig));

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

function getTransactions()
{
    return intval(DB::fetchOne(DB_NUMBER, 'SELECT count(*) FROM `payment` WHERE `Status` = 1'));
}

function getClicks()
{
    return intval(DB::fetchOne(DB_NUMBER, 'SELECT SUM(`Clicks`) AS clicks FROM `paymentsystem`'));
}

function getYearOptions($flag='date_from_Year')
{
    $curYear = date('Y');
    $years   = range($curYear-8, $curYear);
    $curYear = isset($post['search']) && isset($post['search'][$flag]) ? $post['search'][$flag] : $curYear;
    $display = '';
    foreach($years as $year)
    {
        if ($year == $curYear)
        {
            $display .= '<option label="'.$year.'" value="'.$year.'" selected>'.$year.'</option>';
        } else {
            $display .= '<option label="'.$year.'" value="'.$year.'">'.$year.'</option>';
        }
    }
    return $display;
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
function getMonthOptions($flag='date_from_Month')
{
    $months  = configMonth();
    $curMonth= date('M');
    $month   = isset($post['search']) && isset($post['search'][$flag]) ? $post['search'][$flag] : $curMonth;
    $display = '';
    foreach($months as $num => $name)
    {
        if ($month == $num)
        {
            $display .= '<option label="'.$name.'" value="'.$num.'" selected>'.$name.'</option>';
        } else {
            $display .= '<option label="'.$name.'" value="'.$num.'">'.$name.'</option>';
        }
    }
    return $display;
}
function reportDate()
{
    $post     = getPostInfo();
    $dateFrom = isset($post['search']) && isset($post['search']['date_from']) ? $post['search']['date_from'] : '';
    $dateTo   = isset($post['search']) && isset($post['search']['date_to']) ? $post['search']['date_to'] : '';

    if (!$dateFrom)
    {

    }
    #
    $curTime   = computeTodayTime()['startTime'] - 1; //今天的开始时间
    $startTime = $curTime - 7 * 3600 * 24;
    return [
        'start' => date('Y-m-d H:i:s', computeTodayTime($startTime)['startTime']) ,
        'end'   => date('Y-m-d H:i:s', $curTime)
    ];
}
function getSearchOptions()
{
    return [
        '0'     =>'All',
        '202673'=>'',
        '202467'=>'香港炫蹤網絡有限公司',
        '202936'=>'ShinezoneGame'
    ];
}
function reportSearchOptions()
{
    $select = getSearchOptions();
    $post   = getPostInfo();
    $id     = isset($post['search']) && isset($post['search']['id']) ? $post['search']['id'] : '0';
    $options= '';
    foreach($select as $key => $value)
    {
        if ($id == $key)
        {
            $options .=  '<option value="'.$key.'" selected>'.$value.'</option>';
        }
        else
        {
            $options .= '<option value="'.$key.'">'.$value.'</option>';
        }
    }
    return $options;
}
function getSearchUserId()
{
    $post   = getPostInfo();
    return isset($post['search']) && isset($post['search']['user_id']) ? $post['search']['user_id'] : '';
}
function getSearchRefId()
{
    $post   = getPostInfo();
    return isset($post['search']) && isset($post['search']['ref_id']) ? $post['search']['ref_id'] : '';
}
function getPeriod()
{
    $arr = [
        'week'      =>  'Last 7 Days' ,
        'two_weeks' =>  'Last 14 Days' ,
        'month'     =>  'Last 30 Days' ,
        'all'       =>  'All Time'
    ];
    $post   = getPostInfo();
    $period = isset($post['search']) && isset($post['search']['period']) ? $post['search']['period'] : 'all';
    $select = '';
    foreach($arr as $key => $value)
    {
        if ($period == $key)
        {
            $select .=  '<option value="'.$key.'" selected>'.$value.'</option>';
        }
        else
        {
            $select .=  '<option value="'.$key.'">'.$value.'</option>';
        }
    }
    return $select;
}
#  [
#      'search' => [
#          's'        =>  '1' ,
#          'common'   =>  '' ,
#          'id'       =>  '0' ,
#          'date_from'=>  '12/22/2016' ,
#          'date_to'  =>  '12/29/2016' ,
#      ]
#  ]

function getSearchDate()
{
    $post  = getPostInfo();
    if (isset($post['search']))
    {
        return [
            'date_from'=> isset($post['search']) && isset($post['search']['date_from'])?$post['search']['date_from']:'',
            'date_to'  => isset($post['search']) && isset($post['search']['date_to'])?$post['search']['date_to']:'',
        ];
    }
    #  默认是当前向前数七天
    else
    {
        $dateArr = computeTodayTime();
        $start   = $dateArr['startTime'] - 1 - 6 * 3600 * 24;
        return [
            'date_from'=> date('m/d/Y',$start),
            'date_to'  => date('m/d/Y'),
        ];
    }
}
function getTransactionType()
{
    $arr = [
        'Regular'  =>  'Payments' ,
        'blocked'   =>  'Blocked payments' ,
        'offers'    =>  'Offers'
    ];
    $post   = getPostInfo();
    $period = isset($post['search']) && isset($post['search']['transactionType']) ? $post['search']['transactionType'] : 'payments';
    $select = '';
    foreach($arr as $key => $value)
    {
        if ($period == $key)
        {
            $select .=  '<option value="'.$key.'" selected>'.$value.'</option>';
        }
        else
        {
            $select .=  '<option value="'.$key.'">'.$value.'</option>';
        }
    }
    return $select;
}
function getPingbackStatus()
{
    $arr = [
        'All'               =>  'All' ,
        'successful'        =>  'Successful' ,
        'failed_resent_auto'=>  'Failed, will be resent',
        'failed_not_resent' => 'Failed, will not be resent' ,
        'all_failed'        => 'All failed' ,
    ];
    $post   = getPostInfo();
    $period = isset($post['search']) && isset($post['search']['pingbackStatus']) ? $post['search']['pingbackStatus'] : 'All';
    $select = '';
    foreach($arr as $key => $value)
    {
        if ($period == $key)
        {
            $select .=  '<option value="'.$key.'" selected>'.$value.'</option>';
        }
        else
        {
            $select .=  '<option value="'.$key.'">'.$value.'</option>';
        }
    }
    return $select;
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
//array(1) { ["search"]=> array(4) { ["common"]=> string(0) "" ["id"]=> string(1) "0" ["period"]=> string(9) "two_weeks" ["s"]=> string(1) "1" } }
function topOffer()
{
    $post = getPostInfo();
    if (!isset($post['search']))
    {
        $post = [
            'search' => [
                'id'    => 0 ,
                'period'=> 'all'
            ]
        ];
    }
    $search = $post['search'];

    $period    = filter_var( $search['period'], FILTER_SANITIZE_STRING);
    $id        = filter_var( $search['id'], FILTER_VALIDATE_INT);
    $condition = "";
    // All
    if ($id === "0") {

    } else {
        $condition = " `Project` = {$id} ";
    }
    $dateArr   = parseDateTime($period);

    //var_dump($dateArr);die;
    if ($condition) {
        $condition  = " (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}') ";
    } else {
        $condition .= " AND (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}') ";
    }

    $condition.= " AND `Status` > 0 ";
    $sql      =  "SELECT SUM(`Price`) as amount, `PaymentMethod` as method FROM `payment` WHERE {$condition} GROUP BY `PaymentMethod`";
    $pageInfo =  DB::fetchAll(DB_NUMBER, $sql);

    if ($pageInfo == false) {
        return [];
    }

    return $pageInfo;
}

function parseOffers($offer)
{
    $display = '';
    if ($offer)
    {
        if (count($offer) == 1)
        {
            $text = 'The only offer was';
        } else {
            $text = 'The offer was ';
        }
        foreach($offer as $value)
        {
            $display .= '<br>' . $text;
            $display .= "<strong>{$value['method']}</strong> with amount of <strong>{$value['amount']}</strong>";
        }
    }
    return $display;
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

function searchClickInfo()
{
    $post     = getPostInfo();
    $post     = isset($post['search'])?$post['search']:[];
    //var_dump($post);die;
    $curTime  = date('Y-m-d');
    $condition= " `CreateDate` <= '{$curTime}' ";

    // 日期
    if (isset($post['date_from']) || isset($post['date_to']))
    {
        // 添加 日期条件
        // 添加 支付方式条件
        $dateStart    = filter_var( $post['date_from'], FILTER_SANITIZE_STRING);
        // 添加 支付方式条件
        $dateEnd      = filter_var( $post['date_to'], FILTER_SANITIZE_STRING);

        if (isset($dateEnd) && $dateEnd || isset($dateStart) && $dateStart)
        {
            $dateArr   = parseDate($dateStart, $dateEnd);
            $start     = date('Y-m-d', strtotime($dateArr['start']));
            $end       = date('Y-m-d', strtotime($dateArr['end']));
            $condition.= " AND (`CreateDate` BETWEEN '$start' AND '{$end}') ";
        }
    }
    else
    {
        $dateArr   = getSearchDate();
        $dateArr   = parseDate($dateArr['date_from'], $dateArr['date_to']);
        $start     = date('Y-m-d', strtotime($dateArr['start']));
        $end       = date('Y-m-d', strtotime($dateArr['end']));
        $condition.= " AND (`CreateDate` BETWEEN '{$start}' AND '{$end}') ";
    }

    // 国家
    if (isset($post['co_id']))
    {
        // 添加 交易id
        $country = filter_var( $post['co_id'], FILTER_VALIDATE_INT);
        if (isset($country) && !empty($country))
        {
            if (!empty($condition))
                $condition.= " AND `Country` = '{$country}' ";
            else
                $condition.= " `Country` = '{$country}' ";
        }
    }
    // 公司
    if (isset($post['id']))
    {
        // 添加 交易id
        $project = filter_var( $post['id'], FILTER_SANITIZE_STRING);//FILTER_VALIDATE_INT
        if (isset($project) && !empty($project))
        {
            if (!empty($condition))
                $condition.= " AND `Project` = '{$project}' ";
            else
                $condition.= " `Project` = '{$project}' ";
        }
    }

    //widgets
    if (isset($post['w_id']))
    {
        $widgetId = filter_var( $post['w_id'], FILTER_SANITIZE_STRING);//FILTER_VALIDATE_INT
        if (isset($widgetId) && !empty($widgetId))
        {
            if (!empty($condition))
                $condition.= " AND `WidgetId` = '{$widgetId}' ";
            else
                $condition.= " `WidgetId` = '{$widgetId}' ";
        }
    }
    $sql      = "SELECT `SubMethod` as name, SUM(`Price`) AS amount, COUNT(`Price`) AS clicks
                 FROM `payment`
                 WHERE {$condition} AND `Status` > 0
                 GROUP BY `SubMethod`
                 ";
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);

    $sql2     = "SELECT `SubMethod` as name, SUM(`Price`) AS amount, COUNT(`Price`) AS clicks
                 FROM `payment`
                 WHERE {$condition}
                 GROUP BY `SubMethod`
                 ";
    $totalInfo= DB::fetchAll(DB_NUMBER, $sql2);

    $return   = [];
    if ($pageInfo)
    {
        $totalTemp  = [];
        foreach($totalInfo as $item)
        {
            $totalTemp[$item['name']] = $item;
        }
        foreach($pageInfo as $value)
        {
            if (isset($totalTemp[$value['name']]))
            {
                $total      = $totalTemp[$value['name']]['amount'];
                $clicks     = $totalTemp[$value['name']]['clicks'];
                $conversion = round(($value['clicks'] / $totalTemp[$value['name']]['clicks'])*100, 2);
                $return[]   = [ 'name' => $value['name'],
                                'amount'=>$total,
                                'conversion' => $conversion,
                                'clicks' => $clicks];
            }
        }
    }
    if (empty($return)) {
        return [];
    }
    return $return;
}
function displayClickInfo($data)
{
    $display = '';
    foreach($data as $value)
    {
        $display .= '
        <tr>
            <td>'.$value['name'].'</td>
            <td align="center">'.$value['clicks'].'</td>
            <td align="center">'.$value['conversion'].'</td>
            <td align="center">$'.$value['amount'].'</td>
        </tr>
        ';
    }
    return $display;
}
function getWidgets()
{
    return configWId();
}
//    date_from  = "12/19/2016"
//    date_to    = "12/19/2016"
//    user_id    = ""
//    ref_id     = "0"
//    id         = ""
//    transactionType = ""
//    pingbackStatus  = ""
function search()
{
    $post     = getPostInfo();
    $post     = isset($post['search'])?$post['search']:[];
        //var_dump($post);die;
    $page     = isset($post['page']) ? $post['page'] : 1;
    $count    = getParams()['chartRowsPP'];
    $start    = ($page-1) * $count;
    $curTime  = date('Y-m-d H:i:s');

    $condition= " `CreateDate` <= '{$curTime}' ";

    if (isset($post['date_from']) || isset($post['date_to']))
    {
        // 添加 日期条件
        // 添加 支付方式条件
        $dateStart    = filter_var( $post['date_from'], FILTER_SANITIZE_STRING);
        // 添加 支付方式条件
        $dateEnd      = filter_var( $post['date_to'], FILTER_SANITIZE_STRING);

        if (isset($dateEnd) && $dateEnd || isset($dateStart) && $dateStart)
        {
            $dateArr   = parseDate($dateStart, $dateEnd);
            $condition.= " AND (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}') ";
        }
    }
    else
    {
        $dateArr   = getSearchDate();
        $dateArr   = parseDate($dateArr['date_from'], $dateArr['date_to']);
        $condition.= " AND (`CreateDate` BETWEEN '{$dateArr['start']}' AND '{$dateArr['end']}') ";
    }

    if (isset($post['user_id']))
    {
        // 添加 用户Id
        $userId       = filter_var( $post['user_id'], FILTER_SANITIZE_STRING);
        if (isset($userId) && $userId)
        {
            if (!empty($condition))
                $condition.= " AND `UserId` = '{$userId}' ";
            else
                $condition.= " `UserId` = '{$userId}' ";
        }
    }

    if (isset($post['ref_id']))
    {
        // 添加 交易id
        $refId = filter_var( $post['ref_id'], FILTER_SANITIZE_STRING);//FILTER_VALIDATE_INT
        if (isset($refId) && $refId)
        {
            if (!empty($condition))
                $condition.= " AND `RefId` = '{$refId}' ";
            else
                $condition.= " `RefId` = '{$refId}' ";
        }
    }

    if (isset($post['id']))
    {
        // 添加 支付者名称条件
        $companyId  = filter_var( $post['id'], FILTER_VALIDATE_INT);
        if (isset($companyId) && $companyId)
        {
            if (!empty($condition))
                $condition.= " AND `Project` = $companyId ";
            else
                $condition.= " `Project` = $companyId ";
        }
    }

    if (isset($post['transactionType']))
    {
        // 添加 交易号条件 payment blocked offer
        $transactionType= filter_var( $post['transactionType'], FILTER_SANITIZE_STRING);
        if (isset($transactionType) && $transactionType)
        {
            if (!empty($condition))
                $condition.= " AND `TransactionType` = '{$transactionType}' ";
            else
                $condition.= " `TransactionType` = '{$transactionType}' ";
        }
    }

    if (isset($post['pingbackStatus']))
    {
        // 添加
        $pingbackStatus    = filter_var( $post['pingbackStatus'], FILTER_SANITIZE_STRING);
        if (isset($pingbackStatus) && $pingbackStatus)
        {
            if ( $pingbackStatus != 'All' )
            {
                if (!empty($condition))
                    $condition.= " AND `PingbackStatus` = '{$pingbackStatus}' ";
                else
                    $condition.= " `PingbackStatus` = '{$pingbackStatus}' ";
            }
        }
    }

    $sql      = "SELECT * FROM `payment` WHERE {$condition}  ORDER BY `CreateDate` DESC LIMIT {$start}, {$count}";
    $total    = intval(DB::fetchOne(DB_NUMBER, "SELECT count(*) FROM `payment` WHERE {$condition}"));
    $pageInfo = DB::fetchAll(DB_NUMBER, $sql);

    if ($pageInfo == false) {
        return array('pageInfo' => [], 'count' => 0);
    }

    $cmd      = isset($post['CMD']) ? $post['CMD'] : "";
    if ($cmd == 'Export_To_CSV')
    {
        $pageInfo = DB::fetchAll(DB_NUMBER, "SELECT * FROM `payment` WHERE {$condition}  ORDER BY `CreateDate` DESC");
        download($pageInfo);
        exit();
    }

    return array('pageInfo' => $pageInfo, 'count' => $total);
}
function getNavPageInfo($total)
{
    $post        = getPostInfo();
    $post        = isset($post['search'])?$post['search']:[];
    $count       = getParams()['chartRowsPP'];
    $pageNum     = ceil($total / $count);

    if ($pageNum <= 0 )
    {
        return '';
    }
    $curPage     = isset($post['page']) ? $post['page'] : 1;
    $pageInfo    = array(
        'search[date_from]'     => isset($post['date_from']) ? $post['date_from'] : '' ,
        'search[date_to]'       => isset($post['date_to']) ? $post['date_to'] : '' ,
        'search[user_id]'       => isset($post['user_id']) ? $post['user_id'] : '' ,
        'search[ref_id]'        => isset($post['ref_id']) ? $post['ref_id'] : '' ,
        'search[id]'            => isset($post['id']) ? $post['id'] : '' ,
        'search[transactionType]'=> isset($post['transactionType']) ? $post['transactionType'] : 'payments' ,
        'search[pingbackStatus]' => isset($post['pingbackStatus']) ? $post['pingbackStatus'] : 'successful' ,
    );
    $navPageInfo =  '';
    $navPageInfo .= '<div class="paging paging2 clearfix">';
    $navPageInfo .= '<span class="total">Total: '.$total.'</span>';
    $displayPages=  getParams()['chartDP'];
    $startPage   =  floor($curPage / $displayPages) + 1;
    $endPage     =  min($pageNum, $startPage + $displayPages -1);
    $next        =  0;
    if ( ($endPage + 1) <= $pageNum )
    {
        $next        = $endPage + 1;
    }
    $range       = range($startPage, $endPage);
    foreach($range as $page)
    {
        $pageInfo['search[page]'] = $page;
        $queryStr         = http_build_query($pageInfo);
        if ($page == $curPage)
        {
            $navPageInfo      .= '<a href="transactions.php?'.$queryStr.'" class="cur">'.$page.'</a>';
        } else {
            $navPageInfo      .= '<a href="transactions.php?'.$queryStr.'">'.$page.'</a>';
        }
    }
    if ($next)
    {
        $pageInfo['search[page]'] = $next;
        $queryStr         = http_build_query($pageInfo);
        $navPageInfo      .= '<a href="transactions.php?'.$queryStr.'">'.$next.'</a>';
    }
    $navPageInfo .= '</div>';

    return $navPageInfo;
}

function getStatInfo()
{
    $revenues   = statGetAllRevenue()['amount'];
    $clicks     = getClicks();
    $transaction= getTransactions();
    $conversion = ( round($transaction/$clicks, 4) *100 ) . "%";
    $average    = round(($revenues / $transaction), 2);

    return [
        'TotalRevenues'  => $revenues ,
        'Transactions'   => $transaction ,
        'Clicks'         => $clicks ,
        'ConversionRate' => $conversion ,
        'AveragePurchase'=> $average
    ];
}

function statGetAllRevenue()
{
    $todayArr = parseDate(0,0);
    $pageInfo = DB::fetchRow(DB_NUMBER, "
        SELECT SUM(`Price`) AS amount
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}'
        ");

    return $pageInfo;
}
function statGetDayRevenue()
{
    $dateArr = getSearchDate();

    $start = date('Y-m-d H:i:s', strtotime($dateArr['date_from']));
    $end = date('Y-m-d H:i:s', strtotime($dateArr['date_to']));
    $todayArr = parseDate(0, 0);
    $pageInfo = DB::fetchAll(DB_NUMBER, "
        SELECT SUM(`Price`) AS amount, date_format(`CreateDate`, '%Y-%m-%d') as daynum
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}' AND `CreateDate` BETWEEN '{$start}' AND '{$end}'
        GROUP BY daynum
        ORDER BY daynum DESC
        ");

    $data     = [];
    foreach ($pageInfo as $value)
    {
        $data[$value['daynum']] = $value['amount'];
    }

    $return   = ['date'=>[],'data'=>[]];
    $startTime= strtotime($dateArr['start']);
    while(date('Ymd',strtotime($dateArr['start'])) <= date('Ymd', strtotime($dateArr['end'])))
    {
        $date             =  date('Y-m-d', strtotime($dateArr['start']));
        $dateArr['start'] =  date('Y-m-d H:i:s', strtotime($dateArr['start']) + 24*3600);
        $return['date'][] =  $date;
        $return['data'][] =  isset($data[$date]) ? $data[$date] : 0;
    }

    $hourInfo = DB::fetchAll(DB_NUMBER, "
        SELECT SUM(`price`) AS total, hour(`CreateDate`) AS intHour
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}' AND `CreateDate` BETWEEN '{$start}' AND '{$end}'
        GROUP BY intHour
        ");
    $hourArr  = [];
    foreach($hourInfo as $item)
    {
        $hourArr[$item['intHour']] = $item['total'];
    }
    $range    = range(0, 23);
    $hourInfo = [];
    foreach($range as $hour)
    {
        $hourInfo[$hour] = isset($hourArr[$hour])?$hourArr[$hour]:0;
    }

    $weekInfo = DB::fetchAll(DB_NUMBER, "
        SELECT SUM(`price`) AS total, weekday(`CreateDate`) AS intWeek
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}' AND `CreateDate` BETWEEN '{$start}' AND '{$end}'
        GROUP BY intWeek
        ");
    $weekArr  = [];
    foreach($weekInfo as $item)
    {
        $weekArr[$item['intWeek']] = $item['total'];
    }
    //var_dump($weekInfo);die;
    //{"name":"Sunday","data":[20942.97]}
    $range    = [
        0 => 'Monday',
        1 => 'Tuesday',
        2 => 'Wednesday' ,
        3 => 'Thursday' ,
        4 => 'Friday' ,
        5 => 'Saturday' ,
        6 => 'Sunday'
    ];
    $weekInfo = [];
    foreach($range as $key => $week)
    {
        $weekInfo[] = [
            'name'  => (string)$week ,
            'data'  => array(intval(isset($weekArr[$key])?$weekArr[$key]:0))
        ];
    }

    return [
        'time' => $startTime ,
        'data' => "[".implode(',',$return['data'])."]" ,
        'hour' => "[".implode(',',$hourInfo)."]" ,
        'week' => json_encode($weekInfo)
    ];
}
function statGetCountryRevenue()
{
    $dateArr = getSearchDate();
    $startTime= strtotime($dateArr['date_from']);

    $start = date('Y-m-d H:i:s', strtotime($dateArr['date_from']));
    $end   = date('Y-m-d H:i:s', strtotime($dateArr['date_to']));
    $todayArr = parseDate(0, 0);

    $countryInfo = DB::fetchAll(DB_NUMBER, "
        SELECT SUM(`price`) AS total, `Country`
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}' AND `CreateDate` BETWEEN '{$start}' AND '{$end}'
        GROUP BY `Country`
        ORDER BY total DESC
        ");
    $countryArr  = [];
    foreach($countryInfo as $item)
    {
        $countryArr[] = [
            'name' => $item['Country'],
            'data' => array(intval($item['total']))
        ];
    }
    $usersInfo = DB::fetchAll(DB_NUMBER, "
        SELECT COUNT(*) AS users, `Country`
        FROM `payment`
        WHERE `Status`=1 AND `CreateDate` <= '{$todayArr['end']}' AND `CreateDate` BETWEEN '{$start}' AND '{$end}'
        GROUP BY `Country`
        ORDER BY users DESC
        ");
    $usersArr  = [];
    $userHash  = [];
    foreach($usersInfo as $item)
    {
        $usersArr[] = [
            'name' => $item['Country'],
            'data' => array(intval($item['users']))
        ];
        $userHash[$item['Country']] = intval($item['users']);
    }

    $countryDetail = '';
    foreach($countryInfo as $item)
    {
        $countryDetail .= '<tr>
            <td>'.$item['Country'].'</td>
            <td align="right">'.$userHash[$item['Country']].'</td>
            <td align="right">$'.$item['total'].'</td>
        </tr>';
    }

    return [
        'time'    => $startTime ,
        'country' => json_encode($countryArr) ,
        'users'   => json_encode($usersArr) ,
        'detail'  => $countryDetail
    ];
}

function getPayoutInfo()
{
    $payoutInfo = DB::fetchAll(DB_NUMBER, "
        SELECT *
        FROM `payout`
        WHERE 1
        ORDER BY `Dateline` ASC
        LIMIT 7;
        ");
    $return     = '';
    if ($payoutInfo)
    {
        foreach($payoutInfo as $value)
        {
            $return .=
                '<tr><td>'.date('d/m/Y', strtotime($value['Dateline'])).'</td><td>$'.$value['Amount'].'<br></td></tr>';
        }
    }
    return $return;
}

function displayDetailList($result)
{
    $displayStr = '';
    $post       = getPostInfo();
    $post       = isset($post['search'])?$post['search']:[];
    $page       = isset($post['page']) ? $post['page'] : 1;
    $count      = 50 * ($page-1) + 1;
    foreach ($result as $value) {
        $displayStr.= '<tr>';
        $displayStr.= '<td class="dont_show"><b>'.$count.'</b></td>';// TODO
        $displayStr.= '<td class="ref_id">'.$value['RefId'].'</td>';
        $displayStr.= '<td class="app_name">'.getSearchOptions()[$value['Project']].'</td>';
        $displayStr.= '<td class="user_id">'.$value['UserId'].'</td>';
        $displayStr.= '<td class="nowrap">'.$value['PaymentMethod'].'</td>';
        $displayStr.= '<td class="price nice_td">'.$value['Price'].'</td>';
        $displayStr.= '<td class="currency">'.$value['Currency'].'</td>';
        $displayStr.= '<td class="price nice_td">'.$value['Price'].'</td>';
        $displayStr.= '<td class="price">'.$value['Currency'].'</td>';
        $displayStr.= '<td class="purchased">'.$value['Purchased'].'</td>';
        $displayStr.= '<td class="datetime">'.date('m/d/y H:i:s',strtotime($value['CreateDate'])).'</td>';
        $displayStr.= '<td class="country">'.$value['Country'].'</td>';
        $displayStr.= '<td></td>';
        $displayStr.= '<td>'.$value['PaymentType'].'</td>';
        $displayStr.= '<td class="pingback_status_type">'.$value['PingbackStatus'].'</td>';
        $displayStr.= '<td><a href="https://api.paymentwall.com/developers/reports/transaction-details?ref_id='.$value['RefId'].'">Details</a></td>';
        $displayStr.= '<td align="center">';
        $displayStr.= '<div class="js--action-block" data-item-id="'.$value['RefId'].'">';
        $displayStr.= '<b><a class="js--action-expand">[+]</a></b>';
        $displayStr.= '<b><a class="js--action-expanded" style="display: none;">[-]</a></b>';
        $displayStr.= '<br>';
        $displayStr.= '<div class="js--action-links" style="display: none;">';
        $displayStr.= '<a href="https://api.paymentwall.com/developers/crm?search[s]=1&amp;id=202467&amp;search[ref_id]=b105771415">Flag Transaction</a><br>';
        $displayStr.= '<a href="https://api.paymentwall.com/developers/crm?search[s]=1&amp;id=202467&amp;search[ref_id]=b105771415">Refund Transaction</a></div>';
        $displayStr.= '</div></td></tr>';
        $count++;
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

function getDownload()
{
    $post   = getPostInfo();
    $post['search[CMD]'] = 'Export_To_CSV';
    $pStr   = http_build_query($post);
    return  '<a class="but_link js-export-transactions-report"
       href="transactions.php?'.$pStr.'">Export to CSV</a>';
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

// Payment Systems
function getPSWId()
{
    $post   = getPostInfo();
    $wIds   = configWId();
    $return = '';
    $wId    = isset($post['search']) && isset($post['search']['w_id']) && $post['search']['w_id'] ? $post['search']['w_id'] : '';
    foreach($wIds as $key => $type)
    {
        if (!$key)
        {
            $return .= '<option></option>';
        } else {
            if ($wId == $key)
            {
                $return .= '<option value="'.$key.'" selected>'.$type.'</option>';
            } else {
                $return .= '<option value="'.$key.'">'.$type.'</option>';
            }
        }
    }

    return $return;
}
function configWId()
{
    return [
        0  => '' ,
        6  => 'Paymentwall Uni' ,
        5  => 'Paymentwall Multi' ,
        8  => 'Paymentwall Combo' ,
        2  => 'Offerwall Classic' ,
        13 => '2-Click Payments' ,
        17 => 'Paymentwall MobilePay+' ,
        18 => 'Paymentwall Mobile'
    ];
}

function getPSCountryOption()
{
    $countries  = configCountry();
    $return     = '';
    $post       = getPostInfo();
    $coId       = isset($post['search'])&&isset($post['search']['co_id'])?$post['search']['co_id']:1;
    foreach($countries as $key => $group)
    {
        if (is_array($group))
        {
            $return .= '<optgroup label="'.$key.'">';
            foreach($group as $cId => $cName)
            {
                if ($coId == $cName)
                {
                    $return .= '<option value="'.$cName.'" selected>'.$cName.'</option>';
                } else {
                    $return .= '<option value="'.$cName.'">'.$cName.'</option>';
                }
            }
            $return .= '</optgroup>';
        }
        else
        {
            if ($coId == $group)
            {
                if ($group == '') {
                    $return .= '<option value="'.$coId.'" selected>'.$group.'</option>';
                } else {
                    $return .= '<option value="'.$group.'" selected>'.$group.'</option>';
                }
            } else {
                $return .= '<option value="'.$group.'">'.$group.'</option>';
            }
        }
    }
    return $return;
}

function configCountry()
{
    $countries = require_once "Countries.php";
    return $countries;
}

function configRevenueTypes()
{
    return [
        'total'    => 'Total' ,
        'offers'   => 'Offers' ,
        'payments' => 'Payments Systems' ,
    ];
}
function getRevenueType()
{
    $post = getPostInfo();
    $revenueTypes= configRevenueTypes();
    $revenueType = isset($post['search'])&& isset($post['search']['revenue_type'])?$post['search']['revenue_type']:'';
    $return = '';
    foreach($revenueTypes as $key => $value)
    {
        if ($revenueType == $key)
        {
            $return .= '<option label="'.$value.'" value="'.$key.'" selected>'.$value.'</option>';
        } else {
            $return .= '<option label="'.$value.'" value="'.$key.'">'.$value.'</option>';
        }
    }
    return $return;
}

XLog::info("Functions ", " END ");