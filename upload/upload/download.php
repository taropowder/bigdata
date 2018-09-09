<?php
session_start();
date_default_timezone_set('PRC'); //设置时区
include_once "../connect.php";
//获取要下载的文件名
$file_data = $_GET['filename'];
//设置头信息
header('Content-Disposition:attachment;filename=' . basename($file_data));
header('Content-Length:' . filesize($file_data));
//读取文件并写入到输出缓冲
readfile($file_data);
$name_arr = preg_split('/\//',"$file_data");
$file_name = end($name_arr);
$time = date("Y-m-d H-i-s");
$sql = "insert into download(name,time,userid) values('$file_name','$time',{$_SESSION['userid']})";
mysqli_query($connect, $sql);
?>
