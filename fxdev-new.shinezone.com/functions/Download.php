<?php
function insertIntoDownload($data)
{
    try {
        $sql = "
        INSERT INTO `download` (`FileName`,`Type`,`Status`, `CreateDate`) VALUES
        ('{$data['FileName']}','{$data['Type']}','{$data['Status']}','{$data['CreateDate']}');
    ";
        DB::query(DB_NUMBER, $sql);
    } catch(Exception $e) {
        //不作为
    }

    return true;
}

function updateDownload($data)
{
    $sql =  "UPDATE `download` SET ";
    $kv  = "";
    foreach($data as $key => $value)
    {
        if ($key != 'Id')
        {
            if ($kv) {
                $kv .= ",`$key`=$value";
            } else {
                $kv  = "`$key`=$value";
            }
        }
    }
    $sql .= $kv . " WHERE `Id`={$data['Id']}";

    DB::query(DB_NUMBER, $sql);

    return true;
}

function selectInfo($type)
{
    $sql = "SELECT * FROM `download` WHERE `Type`='{$type}' ORDER BY `CreateDate` DESC LIMIT 10";
    $list= DB::fetchAll(DB_NUMBER, $sql);
    if ($list)
    {
        return $list;
    }
    return [];
}

// 批量下载专用
function selectInfoByCond($type, $like)
{
    $like= str_replace('-', '_', $like);
    $mohu= "%$like%";
    $sql = "SELECT * FROM `download`
            WHERE `Type`='{$type}' AND `FileName` LIKE '{$mohu}'
            ";
    $list= DB::fetchAll(DB_NUMBER, $sql);
    if ($list)
    {
        return $list;
    }
    return [];
}