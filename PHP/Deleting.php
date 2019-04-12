<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/4/6
 * Time: 19:51
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$DBManage->connect("openLab");
if($DBManage->droptable($_POST['select_Name']))
{
    echo $_POST['select_Name']."删除成功！";
}
else
{
    echo $_POST['select_Name']."删除失败！";
}
