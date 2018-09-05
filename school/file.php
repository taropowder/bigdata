<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午8:57
 */
include_once "login_require.php";
include_once "../sqlhelper.php";
if (isset($_GET['file'])){
    $file = $_GET['file'];
    $userid = 1;
    $time = date("Y-m-d H:i:s");
    $mysqli= new sqlhelper();
    $sql = "INSERT INTO data_school_file(userid, file_name, time) VALUE ('$userid','$file','$time')";
    $mysqli->execute_dml($sql);
    header("Location: file/$file");
}