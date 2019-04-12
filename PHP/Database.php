<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/30
 * Time: 14:57
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$table_name = json_decode($_POST['table_name']);
$table_content = json_decode($_POST['table_content']);
$table_length = json_decode($_POST['table_length']);
$DBManage->connect("openLab");
if($DBManage->ExcelToTable($table_name,$table_content,$table_length))
{
    echo $table_name."导入成功！";
}
else
{
    echo $table_name."导入失败！";
}



