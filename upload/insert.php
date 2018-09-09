<?php
session_start();
include "connect.php";
date_default_timezone_set('PRC'); //用于设置时区
$leave_time=date("Y-m-d H-i-s",time());
$insertdata="insert into file_time(enter_time,leave_time,userid) values('{$_SESSION['enter_time']}','$leave_time',{$_SESSION['userid']})";
mysqli_query($connent, $insertdata);
session_destroy();//销毁session
echo "<script > window.location = \"../../index.php\"</script >";
?>
