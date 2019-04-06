<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/30
 * Time: 14:44
 */
require_once 'DataBaseManage.php';
$DBManage = new DataBaseManage("localhost","root","UTF-8","root");
$DBManage->connect();
$DBManage->createDatabase($_POST["Databasename"]);