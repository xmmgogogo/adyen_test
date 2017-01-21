<?php
/**
 * 各种系统配置和公共方法
 *  2017-1-6 mm
 */

$rootConfig = require(__DIR__ . '/../../../functions/Config.php');
if(isset($rootConfig[3])) {
    return array(
//        'mysql_server_name'  => 'localhost',      //数据库服务器
//        'mysql_username'     => 'root',           //数据库用户名
//        'mysql_password'     => '',               //数据库密码
//        'mysql_database'     => 'adyen',          //数据库名

    //覆盖使用新配置文件
        'mysql_server_name'  => $rootConfig[3]['host'],             //数据库服务器
        'mysql_port'         => $rootConfig[3]['port'],             //数据库用户名
        'mysql_username'     => $rootConfig[3]['user'],             //数据库用户名
        'mysql_password'     => $rootConfig[3]['pwd'],              //数据库密码
        'mysql_database'     => $rootConfig[3]['dbName'],           //数据库名
    );
} else {
    die('adyen config 3 not read in ' . __FILE__);
}



