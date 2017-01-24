<?php

require_once __DIR__ . "/../../../../functions/Reports.php";

// 批量下载资源 TODO
//shtml?period=2017-01&reportSet=daily_finance_report
// e.g.  daily_finance_report-2017-01.zip
$post      = getPostInfo();
$reportSet = $post['reportSet'];
if ($reportSet== 'daily_finance_report')
{
    $type  = 'dfr';
    $period= $post['period'];
    $files = selectInfoByCond($type, $period);
    $fileName = "daily_finance_report_{$period}.zip";
    $zipFile  = DOWNLOAD_PATH.$fileName;
    //echo class_exists('ZipArchive');die;
    if (class_exists('ZipArchive'))
    {
        $zip = new ZipArchive;
        try {
            if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
            {
                foreach($files as $fileInfo) {

                    //$realPath = $fileInfo['FileName'];
                    //if (file_exists($realPath)) {

                    //}
                }
                $zip->close();
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();die;
        }
    }
    downloadFile($zipFile);
    die;
}


