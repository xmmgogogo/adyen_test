<?php
define('CUR_PATH', __DIR__);
/**
 * string php_uname([string $mode]);
 * PATH_SEPARATOR[;] PHP_OS[WINNT/WIN32] DIRECTORY_SEPARATOR[\\]
 *
 * 功能：返回当前PHP所运行的系统的信息
 * @param string $mode
 *       'a':  返回所有信息
 *       's':  操作系统的名称，如FreeBSD
 *       'n':  主机的名称,如cnscn.org
 *       'r':  版本名，如5.1.2-RELEASE
 *       'v':  操作系统的版本号
 *       'm': 核心类型，如i386
 * @return string Windows NT FAXING-ZHAOFEI 6.1 build 7601 (Windows 7 Ultimate Edition Service Pack 1) i586
 */
class XLog
{
    public static $title = "{%s}[%s]<%s>";
    public static $errorFile = '/tmp/error.log';
    public static function getSystemType()
    {
        if (strtolower(substr(php_uname('s'), 0, 3)) == 'win')
        {
            return 1;
        }
        return 0;
    }
    public static function processFileName($filename, $flag)
    {
        if ($flag)
        {
            $temp = explode('/', $filename);
            return CUR_PATH . "/../logs/" . trim(array_pop($temp));
        }
        return $filename;
    }
    public static function info($title, $body)
    {
        $title = str_pad($title, 48, ' ', STR_PAD_RIGHT);
        $file  = "/tmp/info.log";
        $file  = XLog::processFileName($file, XLog::getSystemType());
        error_log("{$title}". date('Y-m-d H:i:s') . "\n{$body}" . PHP_EOL , 3 , $file);
        error_log("-----------------------------------------------------------------------------------------------------". PHP_EOL, 3, $file);
    }

    public static function formatLog($title, $body, $file)
    {
        $file  = XLog::processFileName($file, XLog::getSystemType());
        $title = str_pad($title, 48, ' ', STR_PAD_RIGHT);
        error_log("{$title}". date('Y-m-d H:i:s') . "\n{$body}" . PHP_EOL , 3 , $file);
        error_log("-----------------------------------------------------------------------------------------------------". PHP_EOL, 3, $file);
    }
}