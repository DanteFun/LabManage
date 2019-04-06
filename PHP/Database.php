<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/30
 * Time: 14:57
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
//$DBManage->selectAll("openLab","MyGuests");
$table_name = json_decode($_POST['table_name']);
$table_content = json_decode($_POST['table_content']);
$table_length = json_decode($_POST['table_length']);
$DBManage->connect("openLab");
$DBManage->ExcelToTable($table_name,$table_content,$table_length);

