<?php
/**
 * 各种系统配置和公共方法
 *  2017-1-6 mm
 */

//后面主要使用普通的mysql调用原则 TODO
//后续调整为PDO模式，更有效合理

$mysql_server_name  = 'localhost';      //数据库服务器
$mysql_username     = 'root';           //数据库用户名
$mysql_password     = '';               //数据库密码
$mysql_database     = 'adyen';          //数据库名

//连接数据库
$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database) or die("error connecting") ;

//数据库输出编码 应该与你的数据库编码保持一致
mysqli_query($conn, "set names 'utf8'");