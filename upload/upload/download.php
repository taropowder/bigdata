<?php
session_start();
date_default_timezone_set('PRC'); //设置时区
include_once "../connect.php";
//获取要下载的文件名
$file_data = $_GET['filename'];
$time = date("Y-m-d H-i-s");
$sql = "insert into download(name,time,userid) values('$file_name','$time',{$_SESSION['userid']})";
mysqli_query($connect, $sql);
header("location: $file_data"); 
exit; 
?>
