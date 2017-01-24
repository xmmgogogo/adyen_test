<?php
header("Content-type: application/json;charset=UTF-8");
require_once __DIR__ . "/../../../functions/Reports.php";
require_once __DIR__ . "/../payments/common.php";

/**
 * 这里直接生成玩家paymentorder表的全部数据
 */
function payments_accounting_report_filtered() {
    //导出目录结构MAP
    $map = [
        'Company Account'                           => 'CompanyAccount',
        'Merchant Account'                          => 'MerchantAccount',
        'Psp Reference'                             => 'PspReferenceId',
        'Merchant Reference'                        => 'MerchantReferenceId',
        'Payment Method'                            => 'PaymentMethod',
        'Booking Date'                              => 'BookingDate',
        'TimeZone'                                  => 'TimeZone',
        'Main Currency'                             => 'MainCurrency',
        'Main Amount'                               => 'MainAmount',
        'Record Type'                               => 'RecordType',
        'Payment Currency'                          => 'PaymentCurrency',
        'Received (PC)'                             => 'ReceivedPC',
        'Authorised (PC)'                           => 'AuthorisedPC',
        'Captured (PC)'                             => 'CapturedPC',
        'Settlement Currency'                       => 'SettlementCurrency',
        'Payable (SC)'                              => 'PayableSC',
        'Commission (SC)'                           => 'CommissionSC',
        'Markup (SC)'                               => 'MarkupSC',
        'Scheme Fees (SC)'                          => 'SchemeFeesSC',
        'Interchange (SC)'                          => 'InterchangeSC',
        'Processing Fee Currency'                   => 'ProcessingFeeCurrency',
        'Processing Fee (FC)'                       => 'ProcessingFeeFC',
        'User Name'                                 => 'UserName',
        'Payment Method Variant'                    => 'PaymentMethodVariant',
        'Issuer Country'                            => 'IssuerCountry',
        'Shopper Country'                           => 'ShopperCountry',
        'Modification Merchant Reference'           => 'ModificationMerchantReference',
        'Settlement Batch'                          => 'SettlementBatch',
        'Unique Terminal Id'                        => 'UniqueTerminalID',
        'Payable Booking Date'                      => 'PayableBookingDate',
        'Reserved8'                                 => 'Reserved8',
        'Reserved9'                                 => 'Reserved9',
        'Reserved10'                                => 'Reserved10',
    ];

    //调用数据
    $common = new common();

    $reportstartdate    = $_POST['reportstartdate'];
    $reportenddate      = $_POST['reportenddate'];
    $journaltypecodes   = $_POST['journaltypecodes'];
    $format             = $_POST['format'];//TODO

    if(isset($_POST['reportstartdate']) && $_POST['reportenddate']) {
        $RecordTypeStr = '';
        foreach($journaltypecodes as $val) {
            if($RecordTypeStr) {
                $RecordTypeStr .= ", '{$val}'";
            } else {
                $RecordTypeStr .= "'{$val}'";
            }
        }

        $RecordTypeStr = '(' . $RecordTypeStr . ')';
        $where = "BookingDate <= :reportenddate and BookingDate >= :reportstartdate and RecordType in {$RecordTypeStr} order by RecordType";
        $parameters = [
            'reportenddate'     => $reportenddate,
            'reportstartdate'   => $reportstartdate,
        ];

        //初始化，整个CSV文件
        $csvFile = $csvTitleStr = [];

        //1，生成标题
        foreach($map as $csvKey => $dbKey) {
            $csvTitleStr[] = $csvKey;
        }

        $csvFile[] = implode(',', $csvTitleStr);

        $data = $common->getOrderListByConditionAndSql($where, $parameters);
        if($data) {
            //生成内容
            foreach($data as $paymentInfo) {
                $csvContentStr = [];
                foreach($map as $dbKey) {
                    $csvContentStr[] = $paymentInfo[$dbKey];
                }

                $csvFile[] = implode(',', $csvContentStr);
            }

        }

        return implode(PHP_EOL, $csvFile);
    }

    return [];
}

$post       = getPostInfo();
$reportCode = isset($post['reportCode'])?$post['reportCode']:'';
/** baselinereport.shtml使用
https://ca-live.adyen.com/ca/ca/reports/generate.shtml?ignoresaverequest=true&cb=1484986709510
POST
reportCode:chart_baseline_report
reportstartdate:2016-06-01
reportenddate:2017-02-01
format:JSON
formHash:272gcgG5eBAQkaSiT0Rl65+c9ZRoC0=
 */
if ($reportCode == 'chart_baseline_report') {
    $statInfo = statReceiveAuth();
    //var_dump($statInfo);die;
    $statNew  = [];
    foreach($statInfo as $dayInfo)
    {
        $statNew[] = [
            "millisecondsutc" => (int)(strtotime($dayInfo['day']) . '000'),
            "day"             => (string)$dayInfo['day'],
            "auths"           => (int)$dayInfo['auths'],
            "payout_auths"    => 0,
            "total"           => (int)$dayInfo['total']
        ];
    }
    $return   = [
        "default" => [
            "title" => "Baseline",
            "rows"  => $statNew
        ]
    ];
    //echo json_encode($return);die;
    //$json = '{"default":{"title":"Baseline","rows":[{"millisecondsutc":1481756400000,"day":"2016-12-14","auths":2,"payout_auths":0,"total":2},{"millisecondsutc":1481842800000,"day":"2016-12-15","auths":1,"payout_auths":0,"total":1},{"millisecondsutc":1482274800000,"day":"2016-12-20","auths":2,"payout_auths":0,"total":2},{"millisecondsutc":1482361200000,"day":"2016-12-21","auths":183,"payout_auths":0,"total":183},{"millisecondsutc":1482447600000,"day":"2016-12-22","auths":559,"payout_auths":0,"total":560},{"millisecondsutc":1482534000000,"day":"2016-12-23","auths":912,"payout_auths":0,"total":919},{"millisecondsutc":1482620400000,"day":"2016-12-24","auths":1167,"payout_auths":0,"total":1173},{"millisecondsutc":1482706800000,"day":"2016-12-25","auths":1154,"payout_auths":0,"total":1159},{"millisecondsutc":1482793200000,"day":"2016-12-26","auths":1397,"payout_auths":0,"total":1407},{"millisecondsutc":1482879600000,"day":"2016-12-27","auths":1507,"payout_auths":0,"total":1514},{"millisecondsutc":1482966000000,"day":"2016-12-28","auths":907,"payout_auths":0,"total":909},{"millisecondsutc":1483052400000,"day":"2016-12-29","auths":836,"payout_auths":0,"total":841},{"millisecondsutc":1483138800000,"day":"2016-12-30","auths":806,"payout_auths":0,"total":808},{"millisecondsutc":1483225200000,"day":"2016-12-31","auths":812,"payout_auths":0,"total":815},{"millisecondsutc":1483311600000,"day":"2017-01-01","auths":808,"payout_auths":0,"total":810},{"millisecondsutc":1483398000000,"day":"2017-01-02","auths":814,"payout_auths":0,"total":820},{"millisecondsutc":1483484400000,"day":"2017-01-03","auths":816,"payout_auths":0,"total":818},{"millisecondsutc":1483570800000,"day":"2017-01-04","auths":488,"payout_auths":0,"total":490},{"millisecondsutc":1483657200000,"day":"2017-01-05","auths":433,"payout_auths":0,"total":436},{"millisecondsutc":1483743600000,"day":"2017-01-06","auths":542,"payout_auths":0,"total":543},{"millisecondsutc":1483830000000,"day":"2017-01-07","auths":249,"payout_auths":0,"total":249},{"millisecondsutc":1483916400000,"day":"2017-01-08","auths":247,"payout_auths":0,"total":262},{"millisecondsutc":1484002800000,"day":"2017-01-09","auths":243,"payout_auths":0,"total":246},{"millisecondsutc":1484089200000,"day":"2017-01-10","auths":246,"payout_auths":0,"total":248},{"millisecondsutc":1484175600000,"day":"2017-01-11","auths":248,"payout_auths":0,"total":249},{"millisecondsutc":1484262000000,"day":"2017-01-12","auths":235,"payout_auths":0,"total":235},{"millisecondsutc":1484348400000,"day":"2017-01-13","auths":249,"payout_auths":0,"total":251},{"millisecondsutc":1484434800000,"day":"2017-01-14","auths":248,"payout_auths":0,"total":248},{"millisecondsutc":1484521200000,"day":"2017-01-15","auths":1000,"payout_auths":0,"total":1002},{"millisecondsutc":1484607600000,"day":"2017-01-16","auths":1012,"payout_auths":0,"total":1020},{"millisecondsutc":1484694000000,"day":"2017-01-17","auths":861,"payout_auths":0,"total":862},{"millisecondsutc":1484780400000,"day":"2017-01-18","auths":1024,"payout_auths":0,"total":1029},{"millisecondsutc":1484866800000,"day":"2017-01-19","auths":442,"payout_auths":0,"total":449}]}}';
    echo json_encode($return);die;
}
// 直接生成并下载文件 Interactive payment accounting
//reportCode        :payments_accounting_report_filtered
//reportstartdate   :2017-01-22
//reportenddate     :2017-01-23
//journaltypecodes  :[Authorised,Cancelled,Refused] 多个数组
//format            :CSV, TSV, XML, XMLE, XHTML
else if ($reportCode == 'payments_accounting_report_filtered') {
    //生成数据
    $data = payments_accounting_report_filtered();

    if($data) {
        //TODO
        $fileName = 'report.csv';
        $toolFunction = new ToolFunction();
        $toolFunction::export_csv($fileName, $data);
    } else {
        echo "暂无数据，请选择合适的日期";
    }
}
// 直接生成并下载文件 TODO Interactive payment accounting
//reportCode:accountupdate_report
//reportstartdate:2017-01-22
//reportenddate:2017-01-23
//format:CSV JSON XHTML TSV
else if ($reportCode == 'accountupdate_report') {
//    accountupdate_reportarray(6) {
//    ["reportCode"]=>
//  string(20) "accountupdate_report"
//    ["reportstartdate"]=>
//  string(10) "2017-01-01"
//    ["reportenddate"]=>
//  string(10) "2017-01-23"
//    ["excludeDataSet_cardUpdatesWithDisplayableVariant"]=>
//  string(2) "on"
//    ["format"]=>
//  string(4) "JSON"
//    ["formHash"]=>
//  string(31) "817V3Ml2/FCNe760MqB/wA9CFtvPTE="
//}
    // TODO 取dashboard表数据
//    echo 'accountupdate_report';
//    var_dump($post);die;

    //临时不做，默认返回空
    echo <<<EOL
{"startAndEndDate":{
"title":"Scope",
"rows":[
{
"Start Date":"{$_POST['reportstartdate']}"
,"End Date":"{$_POST['reportenddate']}"
}
]}
,"cardUpdates":{
"title":"Account Updates",
"rows":[
]}
}
EOL;

}

