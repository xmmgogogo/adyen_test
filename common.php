<?php

include "config.php";

/**
 * 获取最近几天数据
 * @param $conn
 * @return array
 */
function getRecentListByDate($del = -14) {
    //获取链接
    $conn = getConn();

    $curDay = strtotime($del . 'day');

    $data = [];
    $lastDay = date('Y-m-d', $curDay);
    $nowDay = date('Y-m-d', $curDay) . ' 23:59:59';

    $where = "select * from payment WHERE creationDate < '{$nowDay}' and creationDate > '{$lastDay}'";
    $result = mysqli_query($conn, $where);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $data[] = $row['Value'];
    }

    return $data;
}

/**
 * 获取最近几天数据
 * @param $conn
 * @return array
 */
function getRecentListOrderByDate($limit = 10) {
    //获取链接
    $conn = getConn();

    $data = [];

    $where = "select * from payment WHERE 1 ORDER BY creationDate DESC limit " . $limit;
    $result = mysqli_query($conn, $where);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $data[] = $row;
    }

    return $data;
}

/**
 * 获取最近几天数据
 * @param $conn
 * @return array
 */
function getRecentList2($del = -14) {
    //获取链接
    $conn = getConn();

    $data = [];
    $nowDay = date('Y-m-d H:i:s');
    $lastDay = date('Y-m-d H:i:s', strtotime($del . 'day'));

    $where = "select * from payment WHERE creationDate < '{$nowDay}' and creationDate > '{$lastDay}'";
    $result = mysqli_query($conn, $where);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $data[] = $row;
    }

    return $data;
}

//TODO
function getConn() {
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

    return $conn;
}