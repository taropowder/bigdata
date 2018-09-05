<?php
//连接到数据库
include_once "../sqlhelper.php";
$servername=$database_host ;
$username=$database_user;
$userpassword=$database_pass;
$dbname = $database_db ;

$connect=new mysqli($servername,$username,$userpassword,$dbname);

?>