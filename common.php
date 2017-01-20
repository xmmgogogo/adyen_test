<?php
/**
 * 添加公用方法类
 * 1-18
 */
require(dirname(__FILE__). "/Library/PDO.class.php");

class common {
    public $DB = null;

    public function __construct()
    {
        //引入配置文件
        $config = include "config.php";
        $this->initConn($config['mysql_server_name'], $config['mysql_database'], $config['mysql_username'], $config['mysql_password']);
    }

    public function initConn($mysql_server_name, $mysql_database, $mysql_username, $mysql_password) {
        if($this->DB === null) {
            $this->DB = new Db($mysql_server_name, $mysql_database, $mysql_username, $mysql_password);
        }
    }

    /**
     * 获取最近几天数据
     * @param $conn
     * @return array
     */
    public function getRecentListByDate($del = -114) {
        $curDay = strtotime($del . 'day');

        $data = [];
        $lastDay = date('Y-m-d', $curDay);
        $nowDay = date('Y-m-d', time()) . ' 23:59:59';

        $where = "select * from payment WHERE creationDate < :creationDate_l and creationDate > :creationDate_b";
        $result = $this->DB->query($where, array('creationDate_l' => $nowDay, 'creationDate_b' => $lastDay));

        foreach($result as $row) {
            $data[] = $row['Value'];
        }

        return $data;
    }

    /**
     * 获取最近几天数据
     * @param $conn
     * @return array
     */
    public function getRecentListOrderByDate($limit = 10) {
        $data = [];

        $where = "select * from payment WHERE 1 ORDER BY creationDate DESC limit " . $limit;
        $result = $this->DB->query($where, array());

        foreach($result as $row)
        {
            $data[] = $row;
        }

        return $data;
    }

    public function getOrderList($sql, $parameters = array()) {
        return $this->DB->query($sql, $parameters);
    }
}

//test
//$test = new common();
//$data = $test->getRecentListOrderByDate();
//var_dump($data);
