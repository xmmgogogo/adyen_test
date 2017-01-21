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

    $areaInfo =
        [
            "AS" => ['01', "Asia"] ,
            "EU" => ['02', "Europe"] ,
            "AF" => ['03', "Africa"] ,
            "NA" => ['04', "North America"] ,
            "SA" => ['05', "South America"] ,
            "CA" => ['06', "Central America"] ,
            "OC" => ['07', "Oceania"] ,
            "ME" => ['08', "Middle East"] ,
            "UN" => ['09', "Unknown Region"] ,
        ];


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
                    $areaSession[$val['status']] += $val['session'];
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

# 2 CONVERSION_SALES_CHANNEL_NORMALISED
/**
    statsType:CONVERSION_SALES_CHANNEL_NORMALISED
    region:
    granularity:day
    bdate:2017-01-13
    edate:2017-01-20
    cb:1484882795911
 *  Referer:https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml
 */
function conversionSalesChannelNormalised() {
    $types = [
        'Authorised' => 4623 ,
        'Completed'  => 16 ,
        'Abandoned'  => 463
    ];
    return '<?xml version="1.0" encoding="UTF-8" ?>
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
    <category label="eCommerce"/>
  </categories>
  <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1">
    <set value="90.6" toolText="Authorised, eCommerce, 90.6% (4623 sessions)"/>
  </dataset>
  <dataset seriesName="Completed" color="ffde00" showValues="0" includeInLegend="1">
    <set value="0.3" toolText="Completed, eCommerce, 0.3% (16 sessions)"/>
  </dataset>
  <dataset seriesName="Abandoned" color="F6780F" showValues="0" includeInLegend="1">
    <set value="9.1" toolText="Abandoned, eCommerce, 9.1% (463 sessions)"/>
  </dataset>
</chart>
';
}
function printInfo($info)
{
    header("Content-type: text/xml;charset=UTF-8");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".strlen($info));
    //header("Content-Disposition: attachment; filename=" . "fusion_chart.xml");
    echo $info;die;
}
# 3 MOBILE_ATV_PER_DEVICETYPE
/**
statsType:MOBILE_ATV_PER_DEVICETYPE
region:
granularity:day
bdate:2017-01-13
edate:2017-01-20
cb:1484882795913
 *  Referer:https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml
 */
function mobileATVPerDeviceType() {
    return '<?xml version="1.0" encoding="UTF-8" ?>
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
        <set value="58.01"/>
      </dataset>
    </chart>
    ';
}
# 4 CONVERSION_MOBILE_SHARE
/**
statsType:CONVERSION_MOBILE_SHARE
region:
granularity:day
bdate:2017-01-13
edate:2017-01-20
cb:1484882795916
 *  Referer:https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml
 */
function conversionMobileShare() {
    return '<?xml version="1.0" encoding="UTF-8" ?>
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
';
}

# 6 CONVERSION_MOBILE_DEVICETYPE_NORMALISED
/**
statsType:CONVERSION_MOBILE_DEVICETYPE_NORMALISED
region:
granularity:day
bdate:2017-01-13
edate:2017-01-20
cb:1484882796256
 *  Referer:https://ca-live.adyen.com/ca/ca/conversion/mobileconversion2.shtml
 */
function conversionMobileDeviceTypeNormalised() {
    return '<?xml version="1.0" encoding="UTF-8" ?>
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
      <dataset seriesName="Authorised" color="8DDA00" showValues="0" includeInLegend="1"/>
      <dataset seriesName="Completed" color="ffde00" showValues="0" includeInLegend="1"/>
      <dataset seriesName="Abandoned" color="F6780F" showValues="0" includeInLegend="1"/>
    </chart>
    ';
}

$params  = getInfo();
$referer = $params['Referer'];
$filename= parseUrl($referer);

//if ($filename == 'mobileconversion2') // mobileconversion2.shtml chartxml
{
    switch ($params['statsType']) {
        case 'MAP_WORLD_8REGION':
            $return = mapWorld8Region();
            break;
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
        //新增，添加区域读取，全球地区固定设置
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
        default:
            return $return = '';
    }
}
printInfo($return);