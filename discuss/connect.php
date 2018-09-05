<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/19
 * Time: 18:54
 */
include_once "../sqlhelper.php";
$link = new MySQLi($database_host,$database_user,$database_pass,$database_db,3306);
if($link -> connect_errno){
    die('连接错误' . $link -> connect_error);
}
$link -> set_charset('utf8');
?>