<?php
include __DIR__ . "/../payments/common.php";

function getInfo()
{
    return array_merge($_GET, $_SERVER);
}

function parseUrl($url) {
    $urlArr = parse_url($url);
    $path = trim($urlArr['path'],"?/");
    $pathArr = explode('/', $path);
    $filename= array_pop($pathArr);

    return rtrim($filename, "\.shtml");
}

/**
    statsType:MAP_WORLD_8REGION
    region:
    granularity:day
    bdate:2017-01-13
    edate:2017-01-20
    cb:1484882795909
 *  Referer:https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml
 */
function mapWorld8Region()
{
    # 1 MAP_WORLD_8REGION
    $sessions = [
        "AS" => 0,
        "EU" => 0,
        "AF" => 0,
        "NA" => 0,
        "SA" => 0,
        "CA" => 0,
        "OC" => 0,
        "ME" => 0,
        "UN" => 0
    ];

//    $areaInfo =
//        [
//            "AS" => ['01', "Asia"] ,
//            "EU" => ['02', "Europe"] ,
//            "AF" => ['03', "Africa"] ,
//            "NA" => ['04', "North America"] ,
//            "SA" => ['05', "South America"] ,
//            "CA" => ['06', "Central America"] ,
//            "OC" => ['07', "Oceania"] ,
//            "ME" => ['08', "Middle East"] ,
//            "UN" => ['09', "Unknown Region"] ,
//        ];


    //引入通用库
    $common = new common();
    $sessionFetchAll = $common->getAreaSession('area');
    $sessionFetchAll = array_merge($sessions, $sessionFetchAll);
//    $common->dump($sessionFetchAll);

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
    <map animation="0" showLabels="0" showValues="0" showPlotBorder="0" yAxisMaxValue="0" showShadow="0" showBevel="0" fillColor="666666" hoverColor="AFD8F8" showCanvasBorder="0">
      <header>Sessions</header>
      <data>
        <entity id="01" label="AS" value="AS" color="daa300" link="j-drillDownOnRegion-FCMap_Asia3,MAP_AS,AS" toolText="{$sessionFetchAll['AS']} sessions from Asia" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="02" label="EU" value="EU" color="daa300" link="j-drillDownOnRegion-FCMap_Europe,MAP_EU,EU" toolText="{$sessionFetchAll['EU']} sessions from Europe" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="03" label="AF" value="AF" color="CCCCCC" link="j-drillDownOnRegion-FCMap_Africa,MAP_AF,AF" toolText="{$sessionFetchAll['AF']} sessions from Africa" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="04" label="NA" value="NA" color="6dda00" link="j-drillDownOnRegion-FCMap_NorthAmerica_WOCentral,MAP_NA,NA" toolText="{$sessionFetchAll['NA']} sessions from North America" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="05" label="SA" value="SA" color="da9100" link="j-drillDownOnRegion-FCMap_SouthAmerica,MAP_SA,SA" toolText="{$sessionFetchAll['SA']} sessions from South America" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="06" label="CA" value="CA" color="da9100" link="j-drillDownOnRegion-FCMap_CentralAmerica2,MAP_CA,CA" toolText="{$sessionFetchAll['CA']} sessions from Central America" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="07" label="OC" value="OC" color="da9100" link="j-drillDownOnRegion-FCMap_Oceania,MAP_OC,OC" toolText="{$sessionFetchAll['OC']} sessions from Oceania" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="08" label="ME" value="ME" color="da9100" link="j-drillDownOnRegion-FCMap_MiddleEast,MAP_ME,ME" toolText="{$sessionFetchAll['ME']} sessions from Middle East" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
        <entity id="09" label="UN" value="UN" color="CCCCCC" link="j-drillDownOnRegion-FCMap_Unknown,MAP_UN,UN" toolText="{$sessionFetchAll['UN']} sessions from Unknown Region" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>
      </data>
    </map>
EOF;
}

/**
 * 拉取每个州详情
 * 1，比如，亚洲详细国家列表
 * @return string
 */
function mapWorld8RegionDetail()
{
    //引入通用库
    $common = new common();
    $sessionFetchAll = $common->getAreaSession('country');
//    $common->dump($sessionFetchAll);

    //<entity id="025" label="GU" value="GU" color="CCCCCC" toolText="0 sessions from Guam" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>'

    $xmlCountry = '';
    foreach($sessionFetchAll as $country => $totalSession) {
        $xmlCountry .= '<entity id="1" label="1" value="1" color="CCCCCC" toolText="' . $totalSession . ' sessions from ' . $country . '" alpha="100" fontColor="0" fontBold="0" showLabel="1"/>';
    }

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<map animation="0" showLabels="0" showValues="0" showBorder="0" borderColor="000000" logoURL="../../img/world.gif" logoPosition="TL" logoAlpha="70" logoLink="j-drillDownOnRegion-FCMap_World8,MAP_WORLD_8REGION" yAxisMaxValue="0" showShadow="0" showBevel="0" fillColor="666666" hoverColor="AFD8F8" showCanvasBorder="0">
  <header>Sessions</header>
  <data>
    {$xmlCountry}
  </data>
</map>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
 */
function atvPerPaymentMethod() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethod = $common->getAreaSession('method', 'session');//共多少比
    $sessionFetchAllAmount = $common->getAreaSession('method', 'amount');//共多少钱

//    $common->dump($sessionFetchAllMethod);
//    $common->dump($sessionFetchAllAmount);

    $categoriesStr = $datasetStr = '';
    foreach($sessionFetchAllMethod as $key => $val) {
        $categoriesStr .= '<category label="' . $key . '"/>';
        $datasetStr .= '<set value="' . sprintf('%.2f', $sessionFetchAllAmount[$key] / $sessionFetchAllMethod[$key]) . '"/>';
    }

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Average Transaction Value per payment method" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="2" forceDecimals="1" numberSuffix=" EUR" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoriesStr}
  </categories>
  <dataset seriesName="" color="91B2FF" showValues="0" includeInLegend="1">
    {$datasetStr}
  </dataset>
</chart>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
 */
function conversionPerPaymentMethod() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethod = $common->getAreaSession('method', 'session');//共多少比
    $sessionFetchAllMethodStatus = $common->getAreaSession('method', 'session', 'status');//共多少满足条件的数量

//    $common->dump($sessionFetchAllMethod);
//    $common->dump($sessionFetchAllMethodStatus);

    $categoriesStr = $AuthorisedStr = $CompletedStr = $AbandonedStr = '';
    foreach($sessionFetchAllMethod as $key => $val) {
        //计算条数
        $categoriesStr .= '<category label="' . $key . '"/>';

        //分布计算单个完成率
        $Authorised = isset($sessionFetchAllMethodStatus[$key]['Authorised']) ? $sessionFetchAllMethodStatus[$key]['Authorised'] : 0;
        $AuthorisedStr .= '<set value="' . $Authorised . '" toolText="' . $key . ', ' . $Authorised . ' Authorised sessions 999%"/>' . PHP_EOL;

        $Abandoned = isset($sessionFetchAllMethodStatus[$key]['Abandoned']) ? $sessionFetchAllMethodStatus[$key]['Abandoned'] : 0;
        $AbandonedStr .= '<set value="' . $Abandoned . '" toolText="' . $key . ', ' . $Abandoned . ' Abandoned sessions 999%"/>' . PHP_EOL;

        $Completed = isset($sessionFetchAllMethodStatus[$key]['Completed']) ? $sessionFetchAllMethodStatus[$key]['Completed'] : 0;
        $CompletedStr .= '<set value="' . $Completed . '" toolText="' . $key . ', ' . $Completed . ' Completed sessions 999%"/>' . PHP_EOL;
    }

return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Sessions per payment method" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoriesStr}
  </categories>

  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    {$AuthorisedStr}
  </dataset>
  <dataset seriesName="Completed" color="ffde00" showValues="0" includeInLegend="1">
    {$CompletedStr}
  </dataset>
  <dataset seriesName="Abandoned" color="F6780F" showValues="0" includeInLegend="1">
    {$AbandonedStr}
  </dataset>
</chart>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
    array (
        'Visa' =>
        array (
        'AS' =>
            array (
            'Id' => 1,
            'amount' => '2000.00',
            'session' => 500,
            'country' => 'China',
            'area' => 'AS',
            'date' => '2017-01-19',
            'status' => 'Completed',
            'method' => 'Visa',
            'account' => 'ShinezoneHk',
            ),
            [...],
            [...],
        'NA' =>
        array (
        ...
        ),
    )
 */
function paymentMethodsMainCountries() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethod = $common->getAreaSession('method', 'session');//共多少满足条件的数量
    $sessionFetchAllMethodArea = $common->getAreaSession('method', '', 'country');//共多少满足条件的数量

//    $common->dump($sessionFetchAllMethod);
//    $common->dump($sessionFetchAllMethodArea);

    $totalSession = array_sum($sessionFetchAllMethod);
    $categoryStr = '';

    //遍历全部支付方式
    foreach($sessionFetchAllMethodArea as $payMethod => $payInfo) {
        $categoryStr .= '<category label="' . $payMethod . '" value="1" Alpha="30" hoverText="&lt;B&gt;' . $sessionFetchAllMethod[$payMethod] . ' sessions with ' . $payMethod . '&lt;/B&gt; (0.9%)">' . PHP_EOL;//TODO
        //遍历每种支付方式下面的全部地区
        foreach($payInfo as $area => $areaInfo) {
            //遍历全部地区下面的每笔订单
            $areaSession = [];
            foreach($areaInfo as $val) {
                if(isset($areaSession[$val['status']])) {
                    $areaSession[$val['status']] += $val['session'];
                } else {
                    $areaSession[$val['status']] = $val['session'];
                }
            }

            //1，统计数量
            $areaAbandoned = isset($areaSession['Abandoned']) ? $areaSession['Abandoned'] : 0;
            $areaAuthorised= isset($areaSession['Authorised']) ? $areaSession['Authorised'] : 0;
            $areaCompleted = isset($areaSession['Completed']) ? $areaSession['Completed'] : 0;
            $areaTotal = $areaAbandoned + $areaAuthorised + $areaCompleted;

            $TotalPercent = sprintf('%.1f', $areaTotal * 100 / $totalSession);
            $AbandonedPercent = sprintf('%.1f', $areaAbandoned * 100 / $areaTotal);
            $AuthorisedPercent = sprintf('%.1f', $areaAuthorised * 100 / $areaTotal);
            $CompletedPercent = sprintf('%.1f', $areaCompleted * 100 / $areaTotal);

            //2，拼接html
            $categoryStr .= '<category label="' . $area . '" value="' . $areaTotal . '" Alpha="40" hoverText="&lt;B&gt;' . $areaTotal . ' sessions in ' . $area . '&lt;/B&gt; (' . $TotalPercent . '%))">' . PHP_EOL;
                $categoryStr .= '<category label="Abandoned" value="' . $areaAbandoned . '" color="F6780F" hoverText="&lt;B&gt;' . $areaAbandoned . ' Abandoned sessions&lt;/B&gt; (' . $AbandonedPercent . '%))"/>' . PHP_EOL;
                $categoryStr .= '<category label="Authorised" value="' . $areaAuthorised . '" color="8DDA00" hoverText="&lt;B&gt;' . $areaAuthorised . ' Authorised sessions&lt;/B&gt; (' . $AuthorisedPercent . '%))"/>' . PHP_EOL;
                $categoryStr .= '<category label="Completed" value="' . $areaCompleted . '" color="ffde00" hoverText="&lt;B&gt;' . $areaCompleted . ' Completed sessions&lt;/B&gt; (' . $CompletedPercent . '%))"/>' . PHP_EOL;
            $categoryStr .= '</category>' . PHP_EOL;
        }

        $categoryStr .= '</category>' . PHP_EOL;
    }
return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="0" aboutMenuItemLabel="Adyen chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Sessions per payment method per country" showBorder="0" bgColor="FFFFFF,FFFFFF" showPlotBorder="1" plotBorderColor="CCCCCC" baseFontSize="9" yAxisMaxValue="0" paletteColors="86e1ff,86cdff,86b8ff,86a4ff,8690ff,9086ff,a486ff,b886ff,cd86ff,e186ff,f586ff" useHoverColor="1" hoverFillColor="EEEEEE">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="16"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <category label="Total" value="{$totalSession}" hoverText="&lt;B&gt;&lt;U&gt;4860 sessions total&lt;/U&gt;&lt;/B&gt;">
    {$categoryStr}
  </category>
</chart>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
 * array (
'Completed' =>
    array (
        '2017-01-19' => 830,
        '2017-01-20' => 10,
    ),
    'Authorised' =>
    array (
        '2017-01-19' => 100,
    ),
    'Abandoned' =>
    array (
        '2017-01-19' => 10,
    ),
)
 */
function conversionPerTimeInterval() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethodArea = $common->getAreaSession('status', 'session', 'date');//共多少满足条件的数量

//    $common->dump($sessionFetchAllMethodArea);

    //初始化
    $categoryStr = $dataset['Authorised'] = $dataset['Completed'] = $dataset['Abandoned'] = '';


    //设置日期
    $bdate = $_REQUEST['bdate'];
    $edate = $_REQUEST['edate'];

    $time1 = strtotime($bdate); // 自动为00:00:00 时分秒 两个时间之间的年和月份
    $time2 = strtotime($edate);

    $dateList = array();
    while( ($time1 = strtotime('+1 days', $time1)) <= $time2){
        $dateList[] = date('Y-m-d', $time1);
    }

    //1，生成标题
    foreach($dateList as $lastDate) {
        $dateVal = date('M d', strtotime($lastDate));
        $categoryStr .= '<category label="' . $dateVal . '"/>' . PHP_EOL;
    }

    //2，生成内容
    foreach($sessionFetchAllMethodArea as $status => $payInfo) {
        foreach($dateList as $curDate) {
            if(isset($payInfo[$curDate])) {
                $dataset[$status] .= '<set value="' . $payInfo[$curDate] . '" toolText="' . date('M d', strtotime($curDate)) . ', "/>' . PHP_EOL;
            } else {
                $dataset[$status] .= '<set value="' . 0 . '" toolText="' . date('M d', strtotime($curDate)) . ', "/>' . PHP_EOL;
            }
        }
    }

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Conversion over time" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoryStr}
  </categories>
  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    {$dataset['Authorised']}
  </dataset>
  <dataset seriesName="Completed" color="ffde00" showValues="0" includeInLegend="1">
    {$dataset['Completed']}
  </dataset>
  <dataset seriesName="Abandoned" color="F6780F" showValues="0" includeInLegend="1">
    {$dataset['Abandoned']}
  </dataset>
</chart>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
 * array (
    'ShinezoneHk' =>
    array (
        'Completed' => 840,
        'Authorised' => 100,
        'Abandoned' => 10,
    ),
    'miniHK' =>
    array (
        'Completed' => 10,
    ),
    )
 */
function conversionPerMerchant() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethodArea = $common->getAreaSession('account', 'session', 'status');//共多少满足条件的数量

//    $common->dump($sessionFetchAllMethodArea);

    //1，初始化
    $totalSession = 0;
    $categoryStr = '';

    //2，生成内容
    foreach($sessionFetchAllMethodArea as $account => $payInfo) {
        $accountTotalSessions = array_sum($payInfo);
        $totalSession += $accountTotalSessions;
        $categoryStr .= '<category label="' . $account . '" value="' . $accountTotalSessions . '" Alpha="30" hoverText="&lt;B&gt;' . $accountTotalSessions . ' sessions from ' . $account . '&lt;/B&gt; (100.0%)">' . PHP_EOL;

        foreach($payInfo as $status => $sessions) {
            $categoryStr .=  '<category label="' . $status . '" value="' . $sessions . '" color="F6780F" hoverText="&lt;B&gt;' . $sessions . ' ' . $status . ' sessions&lt;/B&gt; (9.7%)"/>' . PHP_EOL;
        }

        $categoryStr .=  '</category>' . PHP_EOL;
    }
    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="0" aboutMenuItemLabel="Adyen chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Conversion of accounts per merchant" showBorder="0" bgColor="FFFFFF,FFFFFF" showPlotBorder="1" plotBorderColor="CCCCCC" baseFontSize="9" yAxisMaxValue="0" paletteColors="86e1ff,86cdff,86b8ff,86a4ff,8690ff,9086ff,a486ff,b886ff,cd86ff,e186ff,f586ff" useHoverColor="1" hoverFillColor="EEEEEE">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="16"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <category label="Total" value="{$totalSession}" Alpha="40" hoverText="&lt;B&gt;&lt;U&gt;{$totalSession} sessions total&lt;/U&gt;&lt;/B&gt;">
    {$categoryStr}
  </category>
</chart>
EOF;
}

/**
 * Percentage of authorisation requests and Conversion per acquirer
array (
    'AdyenCUPExpressPay' =>
    array (
        0 =>
        array (
        'Id' => 1,
        'date' => '2017-01-22',
        'acquirer' => 'AdyenCUPExpressPay',
        'acount' => 0,
        'method' => 'CUP',
        'Request' => 1000,
        'Aurhorised' => 900,
        'Refused' => 100,
    ),
    1 =>
        array (
        ...
        ),
    ),
    'AdyenVisaExpressPay' =>
    array (
    ...
    ),
)
 *
 */
function conversionPerAcquiper() {
    //引入通用库
    $common = new common();
    $sessionFetchAllAcquiper = $common->getAcquirerAccount('acquirer', 'transaction', 'status');//共多少满足条件的数量

//    $common->dump($sessionFetchAllAcquiper);

    //1，初始化
    $categoriesStr = $AuthorisedStr['Authorised'] = $AuthorisedStr['Refused'] = '';

    //2，生成内容
    $statusList = ['Authorised', 'Refused'];

    foreach($sessionFetchAllAcquiper as $method => $payInfo) {
        //1，生成标题
        $categoriesStr .= '<category label="' . $method . '"/>';

        //2，当前总数
        $totalSessions = array_sum($payInfo);
        foreach($statusList as $status) {
            $sessions = isset($payInfo[$status]) ? $payInfo[$status] : 0;
            $TotalPercent = sprintf('%.2f', $sessions * 100 / $totalSessions);

            $AuthorisedStr[$status] .= '<set value="' . $TotalPercent . '" toolText="' . $status . ', ' . $method . ', ' . $TotalPercent . '% (' . $sessions . ' transactions)"/>' . PHP_EOL;
        }
    }

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Conversion per Acquirer" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="100" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoriesStr}
  </categories>
  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Authorised']}
  </dataset>
  <dataset seriesName="Refused" color="F6780F" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Refused']}
  </dataset>
</chart>
EOF;
}

/**
 * Payment Methods: Value, Volume and Conversion
 * 1，每种支付方式的数据组合
    array (
    'ShineZoneHK' =>
    array (
        'AdyenCUPExpressPay' =>
        array (
        0 =>
        array (
        'Id' => 1,
        'date' => '2017-01-22',
        'acquirer' => 'AdyenCUPExpressPay',
        'account' => 'ShineZoneHK',
        'method' => 'CUP',
        'status' => 'Authorised',
        'transaction' => 1000,
        ),
        ),
        'AdyenVisaExpressPay' =>
        array (
        0 =>
        array (
        'Id' => 2,
        'date' => '2017-01-22',
        'acquirer' => 'AdyenVisaExpressPay',
        'account' => 'ShineZoneHK',
        'method' => 'Visa',
        'status' => 'Refused',
        'transaction' => 10,
        ),
    ),
    'miniHK' =>
    array (
        'AdyenVisaExpressPay' =>
        array (
        0 =>
        array (
        'Id' => 5,
        'date' => '2017-01-20',
        'acquirer' => 'AdyenVisaExpressPay',
        'account' => 'miniHK',
        'method' => 'Visa',
        'status' => 'Authorised',
        'transaction' => 300,
        ),
        ),
        'AdyenCUPExpressPay' =>
        array (
        0 =>
        array (
        'Id' => 6,
        'date' => '2017-01-20',
        'acquirer' => 'AdyenCUPExpressPay',
        'account' => 'miniHK',
        'method' => 'CUP',
        'status' => 'Refused',
        'transaction' => 1000,
        ),
        ),
    ),
)
 */
function conversionPerAcquiperAccount() {
    //引入通用库
    $common = new common();
    $sessionFetchAllStatus = $common->getAcquirerAccount('status', 'transaction');//统计全部status，合并的总数
    $sessionFetchAllAcquiper = $common->getAcquirerAccount('account', '', 'acquirer');//共多少满足条件的数量

//    $common->dump($sessionFetchAllStatus);
//    $common->dump($sessionFetchAllAcquiper);

    //1，初始化
    $categoriesStr = $dataStr = [];

    foreach($sessionFetchAllAcquiper as $account => $payInfo) {
        foreach($payInfo as $acquirerName => $acquirerInfo) {
            //1，生成标题
            $categoriesStr[$acquirerName . '_' . $account] = '<category label="' . $acquirerName . '_' . $account . ' (' . $acquirerName . '_' . $account . ')"/>';

            foreach($acquirerInfo as $vInfo) {
                //2，生成内容
                $sessions = $vInfo['transaction'];
                $status = $vInfo['status'];
                $newAccount = $acquirerName . '_' . $account;
                $TotalPercent = sprintf('%.2f', $sessions * 100 / $sessionFetchAllStatus[$status]); //当前交易数量 / 当前status总量
                $dataStr[$status][] = '<set value="' . $TotalPercent . '" toolText="' . $status . ', ' . $newAccount . ' (' . $acquirerName . '), ' . $TotalPercent . '% (' . $sessions . ' transactions)"/>';
            }
        }
    }

    //2，组装数据
    $categoriesStr = implode(PHP_EOL, $categoriesStr);
    $AuthorisedStr['Authorised'] = implode(PHP_EOL, $dataStr['Authorised']);
    $AuthorisedStr['Refused'] = implode(PHP_EOL, $dataStr['Refused']);

    return <<<EOF
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Conversion per Acquirer Account" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="100" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoriesStr}
  </categories>
  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Authorised']}
  </dataset>
  <dataset seriesName="Refused" color="F6780F" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Refused']}
  </dataset>
</chart>
EOF;
}

/**
    array (
    'Visa' => 920,
    'alipay' => 40,
    )

    array (
    'Visa' =>
        array (
        'Completed' => 810,
        'Authorised' => 100,
        'Abandoned' => 10,
        ),
    'alipay' =>
        array (
        'Completed' => 40,
        ),
    )
 */
function conversionSalesChannelNormalised() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethodStatus = $common->getAreaSession('channel', 'session', 'status');//共多少满足条件的数量
    $statusList = ['Authorised', 'Abandoned', 'Completed'];

//    $common->dump($sessionFetchAllMethodStatus);

    //初始化
    $categoriesStr = $AuthorisedStr['Authorised'] = $AuthorisedStr['Abandoned'] = $AuthorisedStr['Completed'] = '';

    foreach($sessionFetchAllMethodStatus as $method => $payInfo) {
        //1，生成标题
        $categoriesStr .= '<category label="' . $method . '"/>';

        //2，当前总数
        $totalSessions = array_sum($payInfo);
        foreach($statusList as $status) {
            $sessions = isset($payInfo[$status]) ? $payInfo[$status] : 0;
            $TotalPercent = sprintf('%.2f', $sessions * 100 / $totalSessions);
            $AuthorisedStr[$status] .= '<set value="' . $sessions . '" toolText="' . $status . ', ' . $method . ', ' . $TotalPercent . '% (' . $sessions . ' sessions)"/>' . PHP_EOL;
        }
    }

    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Sales Channel Conversion" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="100" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    {$categoriesStr}
  </categories>
  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Authorised']}
  </dataset>
  <dataset seriesName="Completed" color="ffde00" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Completed']}
  </dataset>
  <dataset seriesName="Abandoned" color="F6780F" showValues="0" includeInLegend="1">
    {$AuthorisedStr['Abandoned']}
  </dataset>
</chart>
EOF;
}

function printInfo($info)
{
    header("Content-type: text/xml;charset=UTF-8");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".strlen($info));
    //header("Content-Disposition: attachment; filename=" . "fusion_chart.xml");
    echo $info;die;
}

/**
 *不明白意思 TODO
 */
function mobileATVPerDeviceType() {
    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="ATV per Device Type" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="2" forceDecimals="1" numberSuffix=" EUR" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    <category label="Other"/>
  </categories>
  <dataset seriesName="" color="91B2FF" showValues="0" includeInLegend="1">
    <set value="72.48"/>
  </dataset>
</chart>
EOF;
}

/**
 *不明白意思 TODO
 */
function conversionMobileShare() {
    return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked area chart" aboutMenuItemLink="http://www.adyen.com" showLabels="1" showValues="0" caption="Share of Total Authorisations per Device" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" lineColor="C2C4C4" plotBorderAlpha="0" baseFontColor="555555" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    <category label="Jan 13"/>
    <category label="Jan 14"/>
    <category label="Jan 15"/>
    <category label="Jan 16"/>
    <category label="Jan 17"/>
    <category label="Jan 18"/>
    <category label="Jan 19"/>
  </categories>
  <dataset seriesName="Blackberry" color="86e1ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, Blackberry, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, Blackberry, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="iPod" color="8690ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, iPod, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, iPod, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="iPhone" color="6254ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, iPhone, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, iPhone, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="Android Mobile" color="c675ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, Android Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, Android Mobile, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="Android Tablet" color="f586ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, Android Tablet, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, Android Tablet, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="iPad" color="efb0f5" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, iPad, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, iPad, 0.0% (0 authorisations)"/>
  </dataset>
  <dataset seriesName="Windows Mobile" color="86e1ff" showValues="0" includeInLegend="1">
    <set value="0.0" toolText="Jan 13, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 14, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 15, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 16, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 17, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 18, Windows Mobile, 0.0% (0 authorisations)"/>
    <set value="0.0" toolText="Jan 19, Windows Mobile, 0.0% (0 authorisations)"/>
  </dataset>
</chart>
EOF;
}

/**
array (
'Completed' => 850,
'Authorised' => 100,
'Abandoned' => 10,
)
 */
function conversionMobileDeviceTypeNormalised() {
    //引入通用库
    $common = new common();
    $sessionFetchAllMethodStatus = $common->getAreaSession('status', 'session');//共多少满足条件的数量

//    $common->dump($sessionFetchAllMethodStatus);

    $Completed = isset($sessionFetchAllMethodStatus['Completed']) ? $sessionFetchAllMethodStatus['Completed'] : 0;
    $Authorised = isset($sessionFetchAllMethodStatus['Authorised']) ? $sessionFetchAllMethodStatus['Authorised'] : 0;
    $Abandoned = isset($sessionFetchAllMethodStatus['Abandoned']) ? $sessionFetchAllMethodStatus['Abandoned'] : 0;

return <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="0" showValues="0" caption="Conversion per Device type" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" showToolTip="1" yAxisMaxValue="100" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="0" useRoundEdges="0">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" isHTML="1"/>
      <style name="captionFont" type="Font" size="12"/>
      <style name="subCaptionFont" type="Font" size="10"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories/>
  <dataset seriesName="Authorised" color="8DDA00" showValues="{$Authorised}" includeInLegend="1"/>
  <dataset seriesName="Completed" color="ffde00" showValues="{$Completed}" includeInLegend="1"/>
  <dataset seriesName="Abandoned" color="F6780F" showValues="{$Abandoned}" includeInLegend="1"/>
</chart>
EOF;
}


//https://ca-live.adyen.com/ca/ca/reports/chartxml.shtml?
//statsType=TRANSACTION_BREAKDOWN_PER_TIME_INTERVAL&granularity=day&
//bdate=2017-01-09&showLabels=false&showValues=false&showPercentValues=false&
//showPercentInToolTip=false&enableRotation=false&showZeroPies=false
function transactionBreakDownPerTimeInterval()
{
    return '<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen chart" aboutMenuItemLink="http://www.adyen.com" showLabels="1" showValues="0" caption="Chargeback and Refusal Rates" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" baseFontColor="555555" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="1" useRoundEdges="1">
    <styles>
        <definition>
            <style name="myHTMLFont" type="Font" Color="555555" isHTML="1"/>
            <style name="captionFont" type="Font" size="12" Color="555555"/>
            <style name="subCaptionFont" type="Font" size="10" Color="555555"/>
            <style name="dataLablesFont" type="Font" size="10" Color="555555"/>
        </definition>
        <application>
            <apply toObject="TOOLTIP" styles="myHTMLFont"/>
            <apply toObject="CAPTION" styles="captionFont"/>
            <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
            <apply toObject="DATALABLES" styles="dataLabelsFont"/>
        </application>
    </styles>
    <header>Sessions</header>
    <categories>
        <category label="wk46"/>
        <category label="wk47"/>
        <category label="wk48"/>
        <category label="wk49"/>
        <category label="wk50"/>
        <category label="wk51"/>
        <category label="wk52"/>
        <category label="wk01"/>
        <category label="wk02"/>
        <category label="wk03"/>
    </categories>
    <dataset seriesName="Chargeback Rate" color="F6780F" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
    </dataset>
    <dataset seriesName="RefusedByRisk Rate" color="ffde00" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
    </dataset>
    <dataset seriesName="RefusedByBank Rate" color="91B2FF" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
        <set value="0.00"/>
    </dataset>
    <dataset seriesName="Authorisations" color="8DDA00" showValues="0" includeInLegend="1" parentYAxis="S" renderAs="Area">
        <set value="0"/>
        <set value="0"/>
        <set value="0"/>
        <set value="0"/>
        <set value="0"/>
        <set value="1"/>
        <set value="0"/>
        <set value="0"/>
        <set value="0"/>
        <set value="0"/>
    </dataset>
</chart>';die;
}
//https://ca-live.adyen.com/ca/ca/reports/chartxml.shtml?
//statsType=ECP_PER_TIME_INTERVAL&granularity=day&
//bdate=2017-01-09&lang=$lang&showLabels=false&showValues=false&
//showPercentValues=false&showPercentInToolTip=false&enableRotation=false&showZeroPies=false
function ecpPerTimeInterval()
{
    return '<?xml version="1.0" encoding="UTF-8" ?>
<chart animation="1" palette="3" aboutMenuItemLabel="Adyen stacked column chart" aboutMenuItemLink="http://www.adyen.com" showLabels="1" showValues="0" caption="ECP Levels" showBorder="0" bgColor="FFFFFF" bgAlpha="0" canvasBorderColor="FFFFFF" plotBorderAlpha="0" baseFontColor="555555" showToolTip="1" yAxisMaxValue="0" showPercentValues="0" showPercentInToolTip="0" enableSmartLabels="1" plotGradientColor=" " decimals="1" numberSuffix="%" use3DLighting="0" overlapColumns="0" showSum="0" showCanvasBg="0" divLineColor="666666" showLegend="1" useRoundEdges="1" yAxisName="Excessive Chargeback Program Rate">
  <styles>
    <definition>
      <style name="myHTMLFont" type="Font" Color="555555" isHTML="1"/>
      <style name="captionFont" type="Font" size="12" Color="555555"/>
      <style name="subCaptionFont" type="Font" size="10" Color="555555"/>
      <style name="dataLablesFont" type="Font" size="10" Color="555555"/>
    </definition>
    <application>
      <apply toObject="TOOLTIP" styles="myHTMLFont"/>
      <apply toObject="CAPTION" styles="captionFont"/>
      <apply toObject="SUBCAPTION" styles="subCaptionFont"/>
      <apply toObject="DATALABLES" styles="dataLabelsFont"/>
    </application>
  </styles>
  <header>Sessions</header>
  <categories>
    <category label="Jan 9"/>
    <category label="Jan 10"/>
    <category label="Jan 11"/>
    <category label="Jan 12"/>
    <category label="Jan 13"/>
    <category label="Jan 14"/>
    <category label="Jan 15"/>
    <category label="Jan 16"/>
    <category label="Jan 17"/>
    <category label="Jan 18"/>
    <category label="Jan 19"/>
    <category label="Jan 20"/>
    <category label="Jan 21"/>
    <category label="Jan 22"/>
    <category label="Jan 23"/>
  </categories>
  <dataset seriesName="MasterCard ECP" color="F6780F" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
    <set value="0.0" toolText="Jan 9: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 10: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 11: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 12: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 13: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 14: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 15: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 16: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 17: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 18: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 19: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 20: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 21: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 22: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 23: 0.00% MasterCard ECP (0 program chargebacks / 0 program settlements)"/>
  </dataset>
  <dataset seriesName="Visa International ECP" color="AFD8F8" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
    <set value="0.0" toolText="Jan 9: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 10: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 11: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 12: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 13: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 14: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 15: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 16: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 17: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 18: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 19: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 20: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 21: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 22: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 23: 0.00% Visa International ECP (0 program chargebacks / 0 program settlements)"/>
  </dataset>
  <dataset seriesName="Visa Domestic ECP" color="ffde00" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
    <set value="0.0" toolText="Jan 9: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 10: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 11: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 12: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 13: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 14: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 15: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 16: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 17: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 18: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 19: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 20: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 21: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 22: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 23: 0.00% Visa Domestic ECP (0 program chargebacks / 0 program settlements)"/>
  </dataset>
  <dataset seriesName="Discover ECP" color="598900" showValues="0" includeInLegend="1" parentYAxis="P" renderAs="Line">
    <set value="0.0" toolText="Jan 9: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 10: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 11: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 12: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 13: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 14: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 15: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 16: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 17: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 18: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 19: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 20: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 21: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 22: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
    <set value="0.0" toolText="Jan 23: 0.00% Discover ECP (0 program chargebacks / 0 program settlements)"/>
  </dataset>
</chart>';
}

$params  = getInfo();
$referer = isset($params['Referer']) ? $params['Referer'] : '';
$filename = $referer ? parseUrl($referer) : '';

//if ($filename == 'mobileconversion2') // mobileconversion2.shtml chartxml
{
    switch ($params['statsType']) {
        case 'MAP_WORLD_8REGION':
            $return = mapWorld8Region();
            break;
        //新增，添加区域读取，全球地区固定设置，以下服务于 mobileconversion2.shtml
        case 'CONVERSION_SALES_CHANNEL_NORMALISED':
            $return = conversionSalesChannelNormalised();
            break;
        case 'MOBILE_ATV_PER_DEVICETYPE':
            $return = mobileATVPerDeviceType();
            break;
        case 'CONVERSION_MOBILE_SHARE':
            $return = conversionMobileShare();
            break;
        case 'CONVERSION_MOBILE_DEVICETYPE_NORMALISED':
            $return = conversionMobileDeviceTypeNormalised();
            break;
        //新增，添加区域读取，全球地区固定设置，以下服务于 paymentmethods2.shtml
        case 'ATV_PER_PAYMENTMETHOD':
            $return = atvPerPaymentMethod();
            break;
        case 'CONVERSION_PER_PAYMENTMETHOD':
            $return = conversionPerPaymentMethod();
            break;
        case 'PAYMENT_METHODS_MAIN_COUNTRIES':
            $return = paymentMethodsMainCountries();
            break;
        case 'MAP_AS':
        case 'MAP_EU':
        case 'MAP_AF':
        case 'MAP_NA':
        case 'MAP_SA':
        case 'MAP_CA':
        case 'MAP_OC':
        case 'MAP_ME':
        case 'MAP_UN':
            $return = mapWorld8RegionDetail();
            break;
        //新增，添加区域读取，全球地区固定设置，以下服务于 overview2.shtml
        case 'CONVERSION_PER_COUNTRY':
            $return = conversionPerPaymentMethod();
            break;
        case 'CONVERSION_PER_TIMEINTERVAL':
            $return = conversionPerTimeInterval();
            break;
        case 'CONVERSION_PER_MERCHANT':
            $return = conversionPerMerchant();
            break;
        //新增，添加区域读取，全球地区固定设置，以下服务于 acquirer2.shtml
        case 'CONVERSION_PER_ACQUIRER':
            $return = conversionPerAcquiper();
            break;
        case 'CONVERSION_PER_ACQUIRER_ACCOUNT':
            $return = conversionPerAcquiperAccount();
            break;
        //overview default
        case 'TRANSACTION_BREAKDOWN_PER_TIME_INTERVAL':
            $return = transactionBreakDownPerTimeInterval();
            break;
        case 'ECP_PER_TIME_INTERVAL' :
            $return = ecpPerTimeInterval();
            break;
        default:
            return $return = '';
    }
}

printInfo($return);