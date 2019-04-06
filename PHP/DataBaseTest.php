<?php
/**
 * Created by PhpStorm.
 * User: Fun
 * Date: 2019/3/24
 * Time: 14:11
 */
//  $DBManage = new DataBaseManage("www.dantefun.com","AssCrying1996@","UTF-8","root");
    require_once 'DataBaseManage.php';
    $DBManage = new DataBaseManage("localhost","root","UTF-8","root");
    $DBManage->connect("openLab");
    echo $_POST["Tablename"]
    //$DBManage->CreateTable($_POST["Tablename"],);





