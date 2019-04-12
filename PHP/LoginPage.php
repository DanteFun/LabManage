<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/4/7
 * Time: 13:43
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$DBManage->connect("openLab");
if($_POST['optradio'])
{
    $IsTeacher = true;
}
else
{
    $IsTeacher = false;
}
if($_POST['submit'] == 'enter')
{
    $Login_Result = $DBManage->Login($_POST['name'],$_POST['password'],$IsTeacher);
    if($Login_Result == 1)
    {
        echo "用户存在！";
    }
    else if($Login_Result == -1)
    {
        echo "用户不存在！";
    }
    else
    {
        echo "用户名或密码错误！";
    }
}
else
{

}