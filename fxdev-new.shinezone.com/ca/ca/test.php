<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/23
 * Time: 15:12
 */
date_default_timezone_set("UTC");

require_once "../../functions/Reports.php";


//var_dump(statTransactions());die;


echo date('Y-m-d H:i:s') ."<br />";//2017-01-16 23:00:00 2016-12-31 23:00:00
date_default_timezone_set("CET");
echo date('Y-m-d H:i:s') ."<br />";//2017-01-16 23:00:00 2016-12-31 23:00:00
date_default_timezone_set("UTC +1");
echo date('Y-m-d H:i:s') ."<br />";

die;

echo date('Y-m-d H:i:s', 1480546800) ."<br />";//2017-01-17 23:00:00 2016-11-30 23:00:00
echo date('Y-m-d H:i:s', 1484780400) ."<br />";//2017-01-18 23:00:00
echo date('Y-m-d H:i:s', 1484866800) ."<br />";//2017-01-19 23:00:00
echo date('Y-m-d H:i:s', 1484953200) ."<br />";//2017-01-20 23:00:00
echo date('Y-m-d H:i:s', 1485039600) ."<br />";//2017-01-21 23:00:00

echo date('Y-m-d H:i:s', 1480546800) ."<br />";//2017-01-09 23:00:00
echo date('Y-m-d H:i:s', 1484089200) ."<br />";//2017-01-10 23:00:00
echo date('Y-m-d H:i:s', 1484175600) ."<br />";//2017-01-11 23:00:00
echo date('Y-m-d H:i:s', 1484262000) ."<br />";//2017-01-12 23:00:00
echo date('Y-m-d H:i:s', 1484348400) ."<br />";//2017-01-13 23:00:00
echo date('Y-m-d H:i:s', 1484434800) ."<br />";//2017-01-14 23:00:00
echo date('Y-m-d H:i:s', 1484521200) ."<br />";//2017-01-15 23:00:00
die;
//{"selectedPeriod":[
//{"date":1484607600000,"txs":1012},
//{"date":1484694000000,"txs":861},
//{"date":1484780400000,"txs":1024},
//{"date":1484866800000,"txs":442},
//{"date":1484953200000,"txs":1221},
//{"date":1485039600000,"txs":1287}],
//"previousPeriod":[
//{"date":1484002800000,"txs":243},
//{"date":1484089200000,"txs":246},
//{"date":1484175600000,"txs":248},
//{"date":1484262000000,"txs":235},
//{"date":1484348400000,"txs":249},
//{"date":1484434800000,"txs":248},
//{"date":1484521200000,"txs":1000}
//]}
