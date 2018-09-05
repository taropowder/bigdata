<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午4:04
 */
session_start();
include_once "sqlhelper.php";
date_default_timezone_set('Asia/Shanghai');
if (isset($_SESSION['blogEnterTime'])){
    $mysqli = new sqlhelper();
    $userid = $_SESSION['userid'];
    $starttime = $_SESSION['blogEnterTime'];
    $time = date("Y-m-d H:i:s");
    $sql = "INSERT INTO blog_login (userid, login_time, logout_time) value ('$userid','$starttime','$time')";
    $mysqli->execute_dml($sql);
    $mysqli->close_sql();
    unset($_SESSION['blogEnterTime']);
    header("Location: ../index.php");
}