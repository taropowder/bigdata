<?php
//连接到数据库
include_once "../sqlhelper.php";
$servername=$database_host ;
$username=$database_user;
$userpassword=$database_pass;
$dbname = $database_db ;

$connect=new mysqli($servername,$username,$userpassword,$dbname);

/*
***********数据测试*************
if($connect->connect_error){
	die("连接失败: " . $connent->connect_error);
}
else
{
	echo "连接成功<br>";
}
*/
?>