<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/24
 * Time: 14:11
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$DBManage->connect("openLab");
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/24
 * Time: 14:11
 * Describe: Create Table From User Interface.
 */

$temp_arr = array();
foreach($_POST as $x=>$x_value)
{
    array_push($temp_arr,$x_value);
}
array_pop($temp_arr);
array_shift($temp_arr);
if($DBManage->CreateTable($_POST['Tablename'],$temp_arr,count($temp_arr)))
{
    echo $_POST['Tablename']."建立成功";
}
else
{
    echo $_POST['Tablename']."建立失败";
}

//$temp_arr = $DBManage->selectAllTable();









