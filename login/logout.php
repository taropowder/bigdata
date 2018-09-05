<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午2:16
 */
session_start();
header('Content-type:text/html;charset=utf-8');
date_default_timezone_set('Asia/Shanghai');
include_once "../sqlhelper.php";
if(isset($_SESSION['username'])){
    $userid = $_SESSION['userid'];
    $logintime = $_SESSION['logintime'];
    $logouttmie = date("Y-m-d H:i:s");
    $mysqli  = new sqlhelper();
    $sql = "INSERT INTO data_login (userid, logintime, logouttime) VALUE ('$userid','$logintime','$logouttmie')";
    $res=$mysqli->execute_dml($sql);
    if ($res == 1){
        echo "注销成功";
    }
    $mysqli->close_sql();
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据
    header('location:../index.php');
}