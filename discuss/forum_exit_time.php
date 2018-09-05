<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/25
 * Time: 20:43
 */
session_start();
include_once "login_require.php";

    error_reporting(E_ERROR | E_PARSE);
    include ('connect.php');
    header('Content-type:text/html;charset=utf-8');
    date_default_timezone_set("Asia/Shanghai");
    $time=date('Y-m-d H:i:s');
    $user=$_SESSION['user'];

    mysqli_query($link,"insert into forum_exit_time (user,time) values('{$user}','{$time}')") or die("存入数据库失败" . mysqli_error());

    if(isset($_SESSION['user']) && $_SESSION['user']!=''){
        unset($_SESSION['user']);
        $url = '../index.php';
        header("location:$url");
    }
    mysqli_close($link);
    ?>