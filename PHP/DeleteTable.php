<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/4/6
 * Time: 13:48
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$DBManage->connect("openLab");
$temp_arr = $DBManage->selectAllTable();
echo json_encode($temp_arr);