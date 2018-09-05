<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/25
 * Time: 19:26
 */

session_start();
include_once "login_require.php";
error_reporting(E_ERROR | E_PARSE);
header('content-type:text/html;charset=utf8');
if(isset($_SESSION['user']))
{
    echo "<script>alert('你还没有退出！不能再次进入！');window.location.href='forum_exit_time.php'</script>";
}
else{
    $_SESSION['user']=$_SESSION['username'];
    include ('connect.php');
    $user=$_SESSION['user'];
    date_default_timezone_set("Asia/Shanghai");
    $time=date('Y-m-d H:i:s');

    mysqli_query($link,"insert into forum_enter_time (user,time) values('{$user}','{$time}')") or die("存入数据库失败" . mysqli_error());
    $url='forum.php';
    header("location:$url");
}
mysqli_close($link);
